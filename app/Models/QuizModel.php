<?php

namespace App\Models;

use CodeIgniter\Model;

class QuizModel extends Model
{
    protected $table = 'tbl_quizzes';
    protected $primaryKey = 'quiz_id';
    protected $allowedFields = ['user_id', 'course_id', 'percentage'];

    function QuizComplete($course_id)
    {
        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_quizzes');
        $builder->select('*');
        $builder->where('tbl_quizzes.course_id', $course_id);
        $query = $builder->countAllResults();

        return $query;
    }

    function QuizDetails($course_id)
    {
        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_quizzes');
        $builder->select('*');
        $builder->where('tbl_quizzes.course_id', $course_id);
        $query = $builder->get()->getResultArray();

        return $query;
    }
}
