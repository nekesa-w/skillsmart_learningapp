<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model
{
    protected $table = 'tbl_courses';
    protected $primaryKey = 'course_id';
    protected $allowedFields = ['course_title', 'dimension', 'desc', 'number_of_levels'];

    function CourseDetails()
    {

        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_courses');
        $builder->select('*');
        $query = $builder->get()->getResultArray();

        return $query;
    }

    function CourseIdDetails()
    {

        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_courses');
        $builder->select('course_id');
        $query = $builder->get()->getResultArray();

        return $query;
    }

    function CourseDetailsbyId($course_id)
    {

        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_courses');
        $builder->select('*');
        $builder->where('tbl_courses.course_id', $course_id);
        $query = $builder->get()->getResultArray();

        return $query;
    }

    function DeleteCourse($course_id)
    {
        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_courses');
        $builder->where('tbl_courses.course_id', $course_id);
        $builder->delete();
    }


    function CountCourses()
    {

        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_courses');
        $builder->select('*');
        $query = $builder->countAllResults();

        return $query;
    }
}
