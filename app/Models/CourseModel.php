<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model
{
    function CourseDetails()
    {

        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_courses');
        $builder->select('*');
        $builder->join('tbl_levels', 'tbl_levels.course_id = tbl_courses.course_id');
        $query = $builder->get()->getResultArray();

        return $query;
    }
}
