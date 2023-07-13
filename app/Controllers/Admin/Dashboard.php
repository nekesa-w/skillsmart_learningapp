<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('login');
            if (!(session()->get('role' == 'admin'))) {
                return view('courses');
            }
        } else {
            return view('admin/dashboard');
        }
    }
}
