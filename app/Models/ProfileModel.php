<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{

    function ProfileDetails($user_id)
    {

        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_users');
        $builder->select('*');
        $builder->where('tbl_users.user_id', $user_id);
        $query = $builder->get()->getResultArray();

        return $query;
    }
}
