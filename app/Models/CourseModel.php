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
}
