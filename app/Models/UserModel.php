<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tbl_users';
    protected $primaryKey = 'user_id';
  
    protected $allowedFields = ['first_name', 'last_name', 'gender', 'dob', 'email', 'password', 'role', 'status', 'link'];

    public function getUser(){
        return $this->findAll();
    }

}


