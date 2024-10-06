<?php

namespace App\Controllers;

use App\Models\DailyXPModel;
use App\Models\UserModel;
use DateTime;

class LoginController extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function index()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('courses');
        } else {
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

                $now = new DateTime(date('Y-m-d'));
                $data['last_login'] = $userModel->LastLogin($user_id);

                $lastLoginDateString = $data['last_login'][0]['last_login_date'];

                if ($lastLoginDateString) {
                    $lastLoginDate = DateTime::createFromFormat('Y-m-d', $lastLoginDateString);
                    $interval = $lastLoginDate->diff($now);

                    if ($interval->days > 0) {

                        $dailyxpuser = new DailyXPModel();

                        $currentdailyxp = $userModel->daily_xp_points;

                        $nowString = $now->format('Y-m-d');

                        $values = [
                            'user_id' => $user_id,
                            'date' => $nowString,
                            'daily_xp' => $currentdailyxp
                        ];

                        $query = $dailyxpuser->insert($values);

                        $userModel->resetXpPoints($userModel->user_id);
                    }

                    $userModel->updateLastLoginDate($user_id, $now->format('Y-m-d'));
                } else {
                    $userModel->updateLastLoginDate($user_id, $now->format('Y-m-d'));
                }

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

    public function forgotpassword()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('courses');
        } else {
            helper(['form']);
            return view('auth/forgotpassword');
        }
    }

    public function forgotpasswordAuth()
    {
        $user = new UserModel();

        $user_email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $user->where('email', $user_email)->first();

        if (!$data) {
            return  redirect()->to('forgotpasword')->with('fail', 'Email not found. Please try again');
        } else {

            $user_id = $data['user_id'];

            $message = "Please change your password. " . anchor('newpassword/' . $user_id, 'Change Now', '');

            $email = \Config\Services::email();

            $email->setFrom('skillssmart5@gmail.com', 'Skill Smart');
            $email->setTo($user_email);

            $email->setSubject('Change password | Skillsmart');
            $email->setMessage($message);

            $email->send();

            $email->printDebugger(['headers']);

            return  redirect()->to('login')->with('success', 'Email found. Please change password using link sent to email.');
        }
    }

    public function newpassword($user_id)
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('courses');
        } else {
            helper(['form']);
            return view('auth/newpassword');
        }
    }

    public function passwordsave()
    {
        $validation = $this->validate([
            'email' => [
                'rules'  => 'required|valid_email',
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => 'Email is not valid'
                ],
            ],
            'password' => [
                'rules'  => 'required|min_length[5]|max_length[30]',
                'errors' => [
                    'required' => 'Password is required.',
                    'min_length' => 'Password must have at least 5 characters in length',
                    'max_length' => 'Password must not have more than 30 characters in length',
                ],
            ],
            'confirmpassword' => [
                'rules'  => 'required|matches[password]',
                'errors' => [
                    'required' => 'Confirm password is required',
                    'matches' => 'Confirm Password must match Password',
                ],
            ],
        ]);

        if (!$validation) {
            return view('auth/newpassword', ['validation' => $this->validator]);
        } else {
            $uri = current_url(true);
            $user_id = $uri->getSegment(2);

            $user_email = $this->request->getVar('email');
            $password = $this->request->getPost('password');

            $user = new UserModel();
            $find_user = $user->where('email', $user_email)->findAll();

            if (count($find_user) > 0) {
                $temp_data['password'] = password_hash("$password", PASSWORD_DEFAULT);
                $change_password = $user->update($find_user[0]['user_id'], $temp_data);

                return  redirect()->to('login')->with('success', 'Password changed successfully. Please login.');
            } else {
                return  redirect()->to('login')->with('fail', 'Password not changed. Please try again.');
            }
        }
    }
}
