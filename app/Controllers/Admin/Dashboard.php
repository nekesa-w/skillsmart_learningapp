<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CourseModel;
use App\Models\LevelModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('login');
        } else {
            $courses = new CourseModel();
            $users = new UserModel();
            $levels = new LevelModel();

            $data['levels'] = $levels->CountLevels();
            $data['users'] = $users->CountUsers();
            $data['courses'] = $courses->CountCourses();
            return view('admin/dashboard', $data);
        }
    }
}
