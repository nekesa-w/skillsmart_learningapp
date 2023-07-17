<?php

namespace App\Controllers;

use App\Models\AnswersModel;
use App\Models\CompletedLevelModel;
use App\Models\CourseXPModel;
use App\Models\LevelModel;
use App\Models\QuestionModel;
use App\Models\UserModel;

class LevelController extends BaseController
{
    function getlevels()
    {
        $course_id = $this->request->getPost('get_level');
        return redirect()->to(base_url() . 'levels/' . $course_id);
    }

    public function levels($course_id)
    {
        $courseprogress = $this->request->getPost('courseprogress');

        $uri = current_url(true);
        $course_id = $uri->getSegment(2);

        $user_id = session()->get('user_id');
        $getlevels = new LevelModel();

        $coursexp = new CourseXPModel();
        $find_course_xp = $coursexp->where('course_id', $course_id)->where('user_id', $user_id)->findAll();
        $currentcoursexp = $find_course_xp[0]['xp_points'];

        $data['levels'] = $getlevels->LevelDetails($course_id);
        $data['courses'] = $getlevels->CourseDetails($course_id);
        $data['progress'] = $getlevels->CompletedLevelsCount($course_id, $user_id);
        $data['completed'] = $getlevels->CompletedLevels($course_id, $user_id);
        $data['ongoing'] = $getlevels->OngoingLevels($course_id, $user_id, $currentcoursexp);
        $data['current'] = $getlevels->CurrentLevel($course_id, $user_id, $currentcoursexp);

        if ($data['courses'][0]['number_of_levels'] != 0) {
            $data['percent'] =   ($data['progress'] / $data['courses'][0]['number_of_levels']) * 100;
            return view('main/levels', $data);
        } else {
            return view('main/levels', $data);
        }
    }

    function getcontent()
    {
        $page = 1;
        $level_id = $this->request->getPost('get_content');
        return redirect()->to(base_url() . 'level_content/' . $level_id . '/' . $page);
    }

    public function level_content()
    {
        $user_id = session()->get('user_id');

        $uri = current_url(true);
        $level_id = $uri->getSegment(2);
        $page = $uri->getSegment(3);

        $levelModel = new LevelModel();
        $level_details = $levelModel->LevelContent($level_id);

        $returnCompletedRows = $levelModel->CompletedLevelsUser($level_id, $user_id);

        $questionModel = new QuestionModel();
        $countquestions = $questionModel->where('level_id', $level_id)->countAllResults();

        $data = [
            'questions' => $questionModel->where('level_id', $level_id)->paginate(1, 'group1'),
            'pager' => $questionModel->pager,
            'currentPage' => $questionModel->pager->getCurrentPage('group1'),
            'totalPages'  => $questionModel->pager->getPageCount('group1'),
            'level_details' => $level_details,
            'level_id' => $level_id,
            'returnCompletedRows' => $returnCompletedRows,
            'countquestions' => $countquestions
        ];

        return view('main/level_content', $data);
    }

    public function submitanswer($question_id)
    {
        $selectedAnswer = $this->request->getPost('answer' . $question_id);

        session()->set('selectedAnswer' . $question_id, $selectedAnswer);

        $correctAnswer = $this->request->getPost('correctanswer' . $question_id);

        $new_selectedAnswer = preg_replace("/\s+/", "", $selectedAnswer);
        $new_correctAnswer = preg_replace("/\s+/", "", $correctAnswer);

        $isCorrect = ($new_selectedAnswer === $new_correctAnswer);
        session()->set('isCorrect' . $question_id, $isCorrect);

        $numCorrectAnswers = session()->get('numCorrectAnswers');
        if ($isCorrect) {
            $numCorrectAnswers++;
        } else {
            $numCorrectAnswers--;
        }

        session()->set('numCorrectAnswers', $numCorrectAnswers);

        return redirect()->back();
    }

    function markcomplete()
    {
        $level_id = $this->request->getPost('level_id');
        $user_id = session()->get('user_id');

        $allSessions = session()->get();

        foreach ($allSessions as $sessionName => $sessionValue) {
            if (strpos($sessionName, 'selectedAnswer') === 0) {
                session()->remove($sessionName);
            }
        }

        foreach ($allSessions as $sessionName => $sessionValue) {
            if (strpos($sessionName, 'isCorrect') === 0) {
                session()->remove($sessionName);
            }
        }

        session()->remove('numCorrectAnswers');

        $getlevel = new LevelModel();
        $data = $getlevel->MarkComplete($level_id, $user_id);

        $course_id = ($data['0']['course_id']);
        $xp_gained = '100';

        $userxp = new UserModel();
        $find_user_xp = $userxp->where('user_id', $user_id)->findAll();

        if (count($find_user_xp) > 0) {

            $coursexp = new CourseXPModel();
            $find_course_xp = $coursexp->where('course_id', $course_id)->where('user_id', $user_id)->findAll();
            $old_course_xp_point = $find_course_xp[0]['xp_points'];
            $new_course_xp_point = $old_course_xp_point + $xp_gained;

            $course_xp_id = $find_course_xp[0]['course_xp_id'];
            $course_data['xp_points'] = $new_course_xp_point;
            $updatecoursexp = $coursexp->update($course_xp_id, $course_data);

            $old_level_xp_point = $find_user_xp[0]['xp_points'];
            $new_level_xp_point = $old_level_xp_point + $xp_gained;

            $level_data['xp_points'] = $new_level_xp_point;
            $updatelevelxp = $userxp->update($find_user_xp[0]['user_id'], $level_data);

            $currentdailyxp = $find_user_xp[0]['daily_xp_points'];
            $old_daily_xp_point = $find_user_xp[0]['daily_xp_points'];
            $new_daily_xp_point = $old_daily_xp_point + $xp_gained;

            $updatedailyxp = $userxp->updateXpPoints($user_id, $new_daily_xp_point);

            $data['user'] = $userxp->UserDetailsbyId($user_id);
            $dailyxp = $data['user'][0]['daily_xp_points'];
            session()->set('daily_xp_points', $dailyxp);

            $values = [
                'user_id' => $user_id,
                'course_id' => $course_id,
                'level_id' => $level_id,
                'xp_points' => $xp_gained
            ];

            $marklevelcomplete = new CompletedLevelModel();
            $query = $marklevelcomplete->insert($values);

            $newuserxp = session()->set('xp_points', $new_level_xp_point);

            $completedlevels = $userxp->CompletedLevelsUserCount($user_id);
            session()->set('complete_levels', $completedlevels);

            return redirect()->to('courses')->with('success', 'Success! Level marked complete!');
        } else {
            return  redirect()->to('courses')->with('fail', 'Something went wrong. Level not marked complete.');
        }
    }
}
