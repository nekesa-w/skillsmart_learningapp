<?php

namespace App\Models;

use CodeIgniter\Model;

class AnswersModel extends Model
{
    protected $table = 'tbl_answers';
    protected $primaryKey = 'answer_id';
    protected $allowedFields = ['question_id', 'user_id', 'answer'];
}
