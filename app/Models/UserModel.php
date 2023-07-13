<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tbl_users';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['first_name', 'last_name', 'gender', 'dob', 'email', 'password', 'role', 'status', 'link', 'activation_date', 'xp_points'];

    function UserDetails()
    {

        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_users');
        $builder->select('*');
        $builder->where('tbl_users.role', "user");
        $query = $builder->get()->getResultArray();

        return $query;
    }

    function UserDetailsbyId($user_id)
    {

        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_users');
        $builder->select('*');
        $builder->where('tbl_users.user_id', $user_id);
        $query = $builder->get()->getResultArray();

        return $query;
    }
}
