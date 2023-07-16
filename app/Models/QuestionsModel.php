<?php

namespace App\Models;

use CodeIgniter\Model;

class QuestionsModel extends Model
{
    protected $table = 'tbl_questions';
    protected $primaryKey = 'question_id';
    protected $allowedFields = ['level_id', 'course_id', 'question_title', 'correct_answer', 'option_1', 'option_2', 'option_3', 'option_4'];

    function QuestionsByLevel($level_id)
    {

        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_questions');
        $builder->select('*');
        $builder->where('tbl_questions.level_id', $level_id);
        $query = $builder->get()->getResultArray();

        return $query;
    }

    function CountQuestionsByLevel($level_id)
    {

        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_questions');
        $builder->select('*');
        $builder->where('tbl_questions.level_id', $level_id);
        $query = $builder->countAllResults();

        return $query;
    }
}
