<?php
namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table = 'tbl_students';
    protected $primaryKey = 'student_id';
    protected $allowedFields = ['user_id', 'enrollment_date', 'level', 'xp_points'];
}
