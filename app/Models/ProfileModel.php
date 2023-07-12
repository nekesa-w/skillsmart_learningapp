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
        $builder->where('tbl_students.user_id', $user_id);
        $builder->join('tbl_students', 'tbl_students.user_id = tbl_users.user_id');
        $query = $builder->get()->getResultArray();

        return $query;
    }
}
