<?php

namespace App\Controllers;

use App\Models\CourseModel;
use App\Models\ProfileModel;
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
}
