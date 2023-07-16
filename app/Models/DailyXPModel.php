<?php

namespace App\Models;

use CodeIgniter\Model;

class DailyXPModel extends Model
{
    protected $table = 'tbl_daily_xp';
    protected $primaryKey = 'daily_xp_id';
    protected $allowedFields = ['user_id', 'date', 'daily_xp'];
}
