<?php

namespace App\Controllers;

use App\Models\UserModel;

class LoginController extends BaseController
{
    public function index()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('courses');
        } else {
            helper(['form']);
            return view('auth/login');
        }
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
                    'activation_date' => $data['activation_date'],
                    'xp_points' => $data['xp_points'],
                    'isLoggedIn' => TRUE,
                    'complete_levels' => 0
                ];

                $session->set($ses_data);

                $user_id = session()->get('user_id');
                $completedlevels = $userModel->CompletedLevelsUserCount($user_id);

                session()->set('complete_levels', $completedlevels);

                if ($ses_data['role'] == "admin") {
                    return redirect()->to('dashboard');
                } elseif ($ses_data['role'] == "user") {
                    return redirect()->to('courses');
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
