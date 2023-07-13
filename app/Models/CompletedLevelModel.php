<?php

namespace App\Models;

use CodeIgniter\Model;

class CompletedLevelModel extends Model
{
    protected $table = 'tbl_completed_levels';
    protected $primaryKey = 'completed_level_id';
    protected $allowedFields = ['user_id', 'level_id', 'course_id', 'xp_points'];
}
