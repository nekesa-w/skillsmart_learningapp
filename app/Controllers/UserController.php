<?php

namespace App\Controllers;

use App\Models\CourseModel;
use App\Models\ProfileModel;
use App\Models\CourseXPModel;
use App\Models\LevelModel;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function courses()
    {
        $user_id = session()->get('user_id');

        $courses = new CourseModel();
        $data['courses'] = $courses->CourseDetails();

        $leaderboard = new UserModel();
        $data['leaderboard'] = $leaderboard->Leaderboard();

        $daily_xp_points = new UserModel();
        $test['daily_xp_points'] = $daily_xp_points->DailyXP($user_id);
        $data['daily_xp_points'] = $test['daily_xp_points'][0]['daily_xp_points'];

        return view('main/courses', $data);
    }

    public function profile()
    {
        $user_id = session()->get('user_id');

        $profile = new ProfileModel();
        $data['details'] = $profile->ProfileDetails($user_id);

        $leaderboard = new UserModel();
        $data['leaderboard'] = $leaderboard->Leaderboard();

        $ranking = new UserModel();
        $data['ranking'] = $ranking->getUserRanking($user_id);

        return view('main/profile', $data);
    }

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
}
