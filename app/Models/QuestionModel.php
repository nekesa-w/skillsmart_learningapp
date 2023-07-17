<?php

namespace App\Models;

use CodeIgniter\Model;

class QuestionModel extends Model
{
    protected $table = 'tbl_questions';
    protected $primaryKey = 'question_id';
    protected $allowedFields = ['level_id', 'paragraph', 'question_title', 'correct_answer', 'option_1', 'option_2', 'option_3', 'option_4'];

    function AllQuestionDetails()
    {
        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_questions');
        $builder->select('*');
        $query = $builder->get()->getResultArray();

        return $query;
    }

    function CountQuestionContentByCourse($course_id)
    {
        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_questions');
        $builder->select('*');
        $builder->join('tbl_levels', 'tbl_levels.level_id = tbl_questions.level_id');
        $builder->join('tbl_courses', 'tbl_courses.course_id = tbl_levels.course_id');
        $builder->where('tbl_courses.course_id', $course_id);
        $query = $builder->countAllResults();

        return $query;
    }

    function QuestionContentByCourse($course_id)
    {
        return $this->select('*')
            ->join('tbl_levels', 'tbl_levels.level_id = tbl_questions.level_id')
            ->join('tbl_courses', 'tbl_courses.course_id = tbl_levels.course_id')
            ->where('tbl_courses.course_id', $course_id);
    }

    function QuestionContentByLevel($level_id)
    {
        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_questions');
        $builder->select('*');
        $builder->join('tbl_levels', 'tbl_levels.level_id = tbl_questions.level_id');
        $builder->where('tbl_levels.level_id', $level_id);
        $query = $builder->get()->getResultArray();

        return $query;
    }

    function QuestionContent($question_id)
    {
        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_questions');
        $builder->select('*');
        $builder->where('tbl_questions.question_id', $question_id);
        $builder->join('tbl_levels', 'tbl_levels.level_id = tbl_questions.level_id');
        $query = $builder->get()->getResultArray();

        return $query;
    }

    function QuestionDetailsById($question_id)
    {
        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_questions');
        $builder->select('*');
        $builder->where('tbl_questions.question_id', $question_id);
        $query = $builder->get()->getResultArray();

        return $query;
    }

    function DeleteQuestion($question_id)
    {
        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_questions');
        $builder->where('tbl_questions.question_id', $question_id);
        $builder->delete();
    }
}
