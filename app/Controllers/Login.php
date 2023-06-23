<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function post()
    {
        return view('controllerUserData');
    }


    public function forgotpassword()
    {
        return view('forgotpassword');
    }

    public function postforgot()
    {
        return view('newpassword');
    }
}
