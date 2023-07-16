<?php

namespace App\Controllers;

class MainController extends BaseController
{
    public function index()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('courses');
        } else {
            return view('main/index');
        }
    }

    public function about_us()
    {
        return view('main/about_us');
    }
}
