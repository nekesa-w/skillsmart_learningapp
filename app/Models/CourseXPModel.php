<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseXPModel extends Model
{
    protected $table = 'tbl_course_xp';
    protected $primaryKey = 'course_xp_id';
    protected $allowedFields = ['user_id', 'course_id', 'xp_points'];
}
