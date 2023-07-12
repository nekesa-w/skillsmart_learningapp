<?php
namespace App\Models;

use CodeIgniter\Model;

class LevelModel extends Model
{
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
        $builder->where('tbl_completed_levels.course_id', $course_id);
        $builder->join('tbl_students', 'tbl_students.student_id = tbl_completed_levels.student_id');
        $query = $builder->countAllResults();

        return $query;
    }

    function CompletedLevels($course_id)
    {

        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_completed_levels');
        $builder->select('*');
        $builder->join('tbl_levels', 'tbl_levels.level_id = tbl_completed_levels.level_id');
        $builder->where('tbl_completed_levels.course_id', $course_id);
        $query = $builder->get()->getResultArray();

        return $query;
    }


    function OngoingLevels($course_id)
    {

        $db      = \Config\Database::connect();


        $builder = $db->table('tbl_levels');
        $builder->select('*');
        $builder->where('tbl_levels.course_id', $course_id);
        $builder->join('tbl_courses', 'tbl_courses.course_id = tbl_levels.course_id');
        $query = $builder->get()->getResultArray();


        $builder = $db->table('tbl_levels');
        $builder->select('*');
        $builder->where('tbl_levels.course_id', $course_id);
        $builder->join('tbl_completed_levels', 'tbl_levels.level_id = tbl_completed_levels.level_id', 'left');
        $builder->where('tbl_completed_levels.level_id', NULL);
        $query = $builder->get()->getResultArray();

        return $query;
    }
}
