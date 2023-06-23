<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function post()
    {
        return view('auth/controllerUserData');
    }


    public function forgotpassword()
    {
        return view('auth/forgotpassword');
    }

    public function postforgot()
    {
        return view('auth/newpassword');
    }

    public function postchange()
    {
        return view('auth/passwordchanged');
    }
}
