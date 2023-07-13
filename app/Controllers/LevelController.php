<?php

namespace App\Controllers;

use App\Models\CompletedLevelModel;
use App\Models\CourseXPModel;
use App\Models\LevelModel;
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
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('login');
        } else {

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
    }

    function getcontent()
    {
        $level_id = $this->request->getPost('get_content');
        return redirect()->to(base_url() . 'level_content/' . $level_id);
    }


    public function level_content($level_id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('login');
        } else {

            $uri = current_url(true);
            $level_id = $uri->getSegment(2);

            $getlevelcontent = new LevelModel();
            $data['details'] = $getlevelcontent->LevelContent($level_id);

            $level_content = $data['details'][0]['content'];
            $data['sentences'] = explode(PHP_EOL, $level_content);

            return view('main/level_content', $data);
        }
    }

    function markcomplete()
    {
        $level_id = $this->request->getPost('mark_complete');
        $user_id = session()->get('user_id');

        $getlevel = new LevelModel();
        $data = $getlevel->MarkComplete($level_id, $user_id);

        $course_id = ($data['0']['course_id']);
        $xp_gained = '100';

        $userxp = new UserModel();
        $find_user_xp = $userxp->where('user_id', $user_id)->findAll();

        if (count($find_user_xp) > 0) {

            $coursexp = new CourseXPModel();
            $find_course_xp = $coursexp->where('course_id', $course_id)->where('user_id', $user_id)->findAll();
            $currentcoursexp = $find_course_xp[0]['xp_points'];
            $old_course_xp_point = $find_course_xp[0]['xp_points'];
            $new_course_xp_point = $old_course_xp_point + $xp_gained;

            $course_xp_id = $find_course_xp[0]['course_xp_id'];
            $course_data['xp_points'] = $new_course_xp_point;
            $updatecoursexp = $coursexp->update($course_xp_id, $course_data);

            $old_level_xp_point = $find_user_xp[0]['xp_points'];
            $new_level_xp_point = $old_level_xp_point + $xp_gained;

            $level_data['xp_points'] = $new_level_xp_point;
            $updatelevelxp = $userxp->update($find_user_xp[0]['user_id'], $level_data);

            $values = [
                'user_id' => $user_id,
                'course_id' => $course_id,
                'level_id' => $level_id,
                'xp_points' => $xp_gained
            ];

            $marklevelcomplete = new CompletedLevelModel();
            $query = $marklevelcomplete->insert($values);

            $newuserxp = session()->set('xp_points', $new_level_xp_point);

            return redirect()->to('courses')->with('success', 'Success! Level marked complete!');
        } else {
            return  redirect()->to('courses')->with('fail', 'Something went wrong. Level not marked complete.');
        }
    }
}
