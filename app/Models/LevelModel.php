<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\BaseBuilder;

class LevelModel extends Model
{
    protected $table = 'tbl_levels';
    protected $primaryKey = 'level_id';
    protected $allowedFields = ['course_id', 'level_title', 'xp_requirement'];

    function AllLevelDetails()
    {
        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_levels');
        $builder->select('*');
        $query = $builder->get()->getResultArray();

        return $query;
    }

    function LevelContent($level_id)
    {
        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_levels');
        $builder->select('*');
        $builder->where('tbl_levels.level_id', $level_id);
        $builder->join('tbl_courses', 'tbl_courses.course_id = tbl_levels.course_id');
        $query = $builder->get()->getResultArray();

        return $query;
    }

    function MarkComplete($level_id)
    {
        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_levels');
        $builder->select('*');
        $builder->where('tbl_levels.level_id', $level_id);
        $builder->join('tbl_courses', 'tbl_courses.course_id = tbl_levels.course_id');
        $query = $builder->get()->getResultArray();

        return $query;
    }

    function LevelDetails($course_id)
    {
        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_levels');
        $builder->select('*');
        $builder->where('tbl_levels.course_id', $course_id);
        $builder->join('tbl_courses', 'tbl_courses.course_id = tbl_levels.course_id');
        $query = $builder->get()->getResultArray();

        return $query;
    }

    function CourseDetails($course_id)
    {
        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_courses');
        $builder->select('*');
        $builder->where('tbl_courses.course_id', $course_id);
        $query = $builder->get()->getResultArray();

        return $query;
    }

    function CompletedLevelsCount($course_id, $user_id)
    {
        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_completed_levels');
        $builder->select('*');
        $builder->join('tbl_users', 'tbl_users.user_id = tbl_completed_levels.user_id');
        $builder->where('tbl_users.user_id', $user_id);
        $builder->where('tbl_completed_levels.course_id', $course_id);
        $query = $builder->countAllResults();

        return $query;
    }

    function CompletedLevels($course_id, $user_id)
    {
        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_completed_levels');
        $builder->select('*');
        $builder->join('tbl_users', 'tbl_users.user_id = tbl_completed_levels.user_id');
        $builder->join('tbl_levels', 'tbl_levels.level_id = tbl_completed_levels.level_id');
        $builder->where('tbl_users.user_id', $user_id);
        $builder->where('tbl_completed_levels.course_id', $course_id);
        $query = $builder->get()->getResultArray();

        return $query;
    }

    function OngoingLevels($course_id, $user_id, $currentcoursexp)
    {
        $db      = \Config\Database::connect();

        $query = $db->table('tbl_levels')->where('tbl_levels.course_id', $course_id)->where('tbl_levels.xp_requirement >', $currentcoursexp);
        $query->whereNotIn('level_id', function ($subquery) use ($user_id) {
            $subquery->select('level_id')->from('tbl_completed_levels');
            $subquery->join('tbl_users', 'tbl_users.user_id = tbl_completed_levels.user_id');
            $subquery->where('tbl_users.user_id', $user_id);
        });

        $results = $query->get()->getResultArray();

        return $results;
    }

    function CurrentLevel($course_id, $user_id, $currentcoursexp)
    {
        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_levels');
        $builder->select('*');
        $builder->where('tbl_levels.course_id', $course_id);
        $builder->join('tbl_course_xp', 'tbl_course_xp.course_id = tbl_levels.course_id');
        $builder->join('tbl_users', 'tbl_users.user_id = tbl_course_xp.user_id');
        $builder->where('tbl_users.user_id', $user_id);
        $builder->where('tbl_levels.xp_requirement', $currentcoursexp);

        $query = $builder->get()->getResultArray();

        return $query;
    }

    function DeleteLevel($level_id)
    {
        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_levels');
        $builder->where('tbl_levels.level_id', $level_id);
        $builder->delete();
    }


    function LevelDetailsById($level_id)
    {
        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_levels');
        $builder->select('*');
        $builder->where('tbl_levels.level_id', $level_id);
        $query = $builder->get()->getResultArray();

        return $query;
    }

    function CountLevels()
    {

        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_levels');
        $builder->select('*');
        $query = $builder->countAllResults();

        return $query;
    }
}
