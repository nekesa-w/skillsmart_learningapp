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
        $query = $builder->get()->getResultArray();

        return $query;
    }
}
