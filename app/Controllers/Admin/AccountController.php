<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Libraries\Hash;

class AccountController extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function create_account()
    {
        return view('admin/create_account');
    }

    public function admin_create_account()
    {
        $validation = $this->validate([
            'first_name' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'First name is required',
                ],
            ],
            'last_name' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Last name is required',
                ],
            ],
            'dob' => [
                'rules'  => 'required|validate_age',
                'errors' => [
                    'required' => 'Date of birth is required',
                    'validate_age' => 'You must be at least 13 years to make an account',
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
            return view('admin/create_account', ['validation' => $this->validator]);
        } else {

            //Register user in database
            $first_name = $this->request->getPost('first_name');
            $last_name = $this->request->getPost('last_name');
            $gender = $this->request->getPost('gender');
            $dob = $this->request->getPost('dob');
            $user_email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $link = uniqid();

            $values = [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'gender' => $gender,
                'dob' => $dob,
                'email' => $user_email,
                'password' => password_hash("$password", PASSWORD_DEFAULT),
                'link' => $link
            ];

            $message = "Please activate your account. " . anchor('activate/' . $values['link'], 'Activate Now', '');

            $accountModel = new UserModel();
            $query = $accountModel->insert($values);

            if (!$query) {
                return  redirect()->to('create_account')->with('fail', 'Something went wrong. Account was not created. Please try again.');
            } else {
                $email = \Config\Services::email();

                $email->setFrom('skillssmart5@gmail.com', 'Skill Smart');
                $email->setTo($user_email);

                $email->setSubject('Activate your account | Skillsmart');
                $email->setMessage($message);

                $email->send();

                $email->printDebugger(['headers']);

                return  redirect()->to('view_account')->with('success', 'Account created successfully');
            }
        }
    }

    public function view_account()
    {
        $user = new UserModel();
        $data['users'] = $user->UserDetails();

        return view('admin/view_account', $data);
    }

    function updateusergetId()
    {
        $user_id = $this->request->getPost('update_user');
        return redirect()->to(base_url() . 'update_account/' . $user_id);
    }

    public function update_account()
    {
        $uri = current_url(true);
        $user_id = $uri->getSegment(2);

        $getuser = new UserModel();
        $data['details'] = $getuser->UserDetailsbyId($user_id);

        return view('admin/update_account', $data);
    }

    public function admin_update_account()
    {
        //Update user in database
        $first_name = $this->request->getPost('first_name');
        $last_name = $this->request->getPost('last_name');
        $gender = $this->request->getPost('gender');
        $user_id = $this->request->getPost('user_id');

        $values = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'gender' => $gender
        ];

        $accountModel = new UserModel();
        $updateuser = $accountModel->update($user_id, $values);

        if ($updateuser) {
            return  redirect()->to('view_account')->with('success', 'Account updated successfully');
        } else {
            return  redirect()->to('view_account')->with('fail', 'Something went wrong. Account was not updated. Please try again.');
        }
    }

    function deleteusergetId()
    {
        $user_id = $this->request->getPost('delete_user');
        return redirect()->to(base_url() . 'delete_account/' . $user_id);
    }

    public function delete_account()
    {
        $uri = current_url(true);
        $user_id = $uri->getSegment(2);

        $getuser = new UserModel();
        $data['details'] = $getuser->UserDetailsbyId($user_id);

        return view('admin/delete_account', $data);
    }

    public function admin_delete_account()
    {
        $user_id = $this->request->getPost('user_id');
        $getuser = new UserModel();

        $delete = $getuser->DeleteUser($user_id);

        if ($delete) {
            return  redirect()->to('view_account')->with('fail', 'Account not deleted.');
        } else {
            return  redirect()->to('view_account')->with('success', 'Account was deleted successfully.');
        }
    }
}
