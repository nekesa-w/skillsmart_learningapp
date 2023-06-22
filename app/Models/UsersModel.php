<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'tbl_users';
    protected $primarykey = 'user_id';
    protected $allowedfields = ['user_id', 'role', 'password', 'last_name', 'gender', 'first_name', 'email', 'dob'];
}
