<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Libraries\Hash;
use CodeIgniter\I18n\Time;
use DateTime;

class AuthController extends BaseController
{

    public function __construct()
    {
        helper(['url', 'form']);
    }


    public function register()
    {
        return view('auth/register');
    }

    public function save()
    {
        $dob = $this->request->getPost('dob');
        $dobobject = (object)$dob;
        echo $dobobject->getAge();
        //$over10 = ($dobobject->diff($now)->y > 18) ? false : true;

        /*
        $validation = $this->validate([
            'first_name' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Your first name is required',
                ],
            ],
            'last_name' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Your last name is required',
                ],
            ],
            'dob' => [
                'rules'  => 'required||callback_validate_age',
                'errors' => [
                    'required' => 'Your date of birth is required',
                    'validate_age' => 'You must be 10 years and above to make an account',
                ],
            ],
            'email' => [
                'rules'  => 'required|valid_email|is_unique[tbl_users.email]',
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => 'Email is not valid',
                    'is_unique' => 'Email already taken',
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
            return view('auth/register', ['validation' => $this->validator]);
        } else {
            //Register user in database
            $first_name = $this->request->getPost('first_name');
            $last_name = $this->request->getPost('last_name');
            $gender = $this->request->getPost('gender');
            $dob = $this->request->getPost('dob');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $role = 'user';
            //$code = uniqid();
            //$user_email = $email;

            $values = [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'gender' => $gender,
                'dob' => $dob,
                'email' => $email,
                'password' => Hash::make($password),
                'role' => $role
            ];

            
            $message = "Please activate your account. " . anchor('user/activate/' . $code, 'Activate Now', '');

            $email = \Config\Services::email();

            $email->setFrom('activate@skillsmart.com', 'Activate Account');
            $email->setTo($user_email);

            $email->setSubject('Activate Account | Skillsmart');
            $email->setMessage($message);

            $email->send();

            $email->printDebugger(['headers']);


            $userModel = new UserModel();
            $query = $userModel->insert($values);
            if (!$query) {
                return  redirect()->to('register')->with('fail', 'Something went wrong. Please try again.');
            } else {
                return  redirect()->to('register')->with('success', 'Account created successfully. Please verify email.');
            }
            
        }
        */
    }
}
