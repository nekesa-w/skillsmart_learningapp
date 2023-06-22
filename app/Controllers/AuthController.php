<?php

namespace App\Controllers;

class AuthController extends BaseController
{
    public function _construct()
    {
        helper(['url', 'form']);
    }


    public function login()
    {
        return view('auth/login');
    }


    public function register()
    {
        return view('auth/register');
    }

    public function save()
    {
        $validation = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'password' => 'required|min_length[5]|max_length[30]',
            'confirmpassword' => 'required|min_length[5]|max_length[30]',
            'email' => 'required|valid email|is_unique[tbl_users.email]'
        ]);

        if (!$validation) {
            return view('register', ['validation' => $this->validator]);
        } else {
            echo 'Form Validated';
        }
    }
}
