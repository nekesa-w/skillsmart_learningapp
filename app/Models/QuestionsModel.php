<?php

namespace App\Models;

use CodeIgniter\Model;

class QuestionsModel extends Model
{
    protected $table = 'tbl_questions';
    protected $primaryKey = 'question_id';
    protected $allowedFields = ['level_id', 'course_id', 'question_content', 'question_title', 'correct_answer', 'option_1', 'option_2', 'option_3', 'option_4'];
}
