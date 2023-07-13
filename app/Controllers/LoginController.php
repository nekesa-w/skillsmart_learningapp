<?php

namespace App\Controllers;

use App\Models\UserModel;

class LoginController extends BaseController
{
    public function index()
    {
        helper(['form']);
        return view('auth/login');
    }

    public function loginAuth()
    {
        $session = session();
        $userModel = new UserModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $userModel->where('email', $email)->first();

        if ($data) {

            $pass = $data['password'];

            $authenticatePassword = password_verify($password, $pass);

            if ($authenticatePassword) {

                $ses_data = [
                    'user_id' => $data['user_id'],
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'gender' => $data['gender'],
                    'role' => $data['role'],
                    'dob' => $data['dob'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];

                $session->set($ses_data);

                if ($ses_data['role'] == 'admin') {
                    return redirect()->to('dashboard');
                } elseif ($ses_data['role'] == 'user') {
                    return redirect()->to('index');
                }
            } else {
                return  redirect()->to('login')->with('fail', 'Incorrect password.');
            }
        } else {
            return redirect()->to('login')->with('fail', 'Incorrect email.');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('index');
    }
}
