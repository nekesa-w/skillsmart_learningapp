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

    function DeleteUser($user_id)
    {
        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_users');
        $builder->where('tbl_users.user_id', $user_id);
        $builder->delete();
    }

    function CountUsers()
    {

        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_users');
        $builder->select('*');
        $query = $builder->countAllResults();

        return $query;
    }

    function Leaderboard()
    {

        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_users');
        $builder->select('*');
        $builder->where('status', 1);
        $builder->where('role', 'user');
        $builder->orderBy('xp_points', 'DESC');
        $builder->limit(3);
        $query = $builder->get()->getResultArray();

        return $query;
    }

    function getUserRanking($user_id)
    {
        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_users');
        $builder->select('xp_points');
        $builder->where('user_id', $user_id);
        $query = $builder->get();

        $row = $query->getRow();
        $xp_points = $row->xp_points;

        // Count the number of rows with higher XP points
        $builder = $db->table('tbl_users');
        $builder->where('xp_points >', $xp_points);
        $query = $builder->countAllResults();

        $position = $query + 1;

        return $position;
    }

    function CompletedLevelsUserCount($user_id)
    {
        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_completed_levels');
        $builder->select('*');
        $builder->join('tbl_users', 'tbl_users.user_id = tbl_completed_levels.user_id');
        $builder->where('tbl_users.user_id', $user_id);
        $query = $builder->countAllResults();

        return $query;
    }
}
