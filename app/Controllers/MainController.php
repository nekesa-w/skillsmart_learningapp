<?php

namespace App\Controllers;

use App\Models\CourseModel;
use App\Models\CourseProgressModel;
use App\Models\LevelModel;
use App\Models\ProfileModel;

class MainController extends BaseController
{

    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return view('main/index');
        } else {
            return redirect()->to('courses');
        }
    }

    public function about_us()
    {
        return view('main/about_us');
    }

    public function courses()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('login');
        } else {
            $courses = new CourseModel();
            $data['courses'] = $courses->CourseDetails();
            return view('main/courses', $data);
        }
    }

    public function profile()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('login');
        } else {
            $profile = new ProfileModel();

            $user_id = session()->get('user_id');
            $data['details'] = $profile->ProfileDetails($user_id);

            return view('main/profile', $data);
        }
    }
}
