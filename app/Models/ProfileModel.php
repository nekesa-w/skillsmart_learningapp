<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{

    function ProfileDetails(int $user_id)
    {

        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_users');
        $builder->select('*');
        $query = $builder->get()->getResultArray();

        return $query;
    }
}
