<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class QuestionController extends BaseController
{

    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function admin_create_question()
    {
        //Register user in database
        $string_level_id = $this->request->getPost('level_id');
        $content = $this->request->getPost('content');

        $level_id = (int)$string_level_id;

        $values = [
            'level_id' => $level_id,
            'content' => $content,
        ];

        $questionModel = new QuestionModel();
        $query = $questionModel->insert($values);

        $coursemodel = new CourseModel();
        $find_course = $coursemodel->where('course_id', $course_id)->findAll();
        $number_of_questions = $find_course[0]['number_of_questions'];
        $newnumber_of_questions = $number_of_questions + 1;
        $course_data['number_of_questions'] = $newnumber_of_questions;

        $updatenumber_of_questions = $coursemodel->update($course_id, $course_data);

        if (!$query) {
            return  redirect()->to('create_question')->with('fail', 'Something went wrong. Question was not created. Please try again.');
        } else {
            return  redirect()->to('view_question')->with('success', 'Question created successfully');
        }
    }

    public function create_question()
    {
        $question = new QuestionModel();
        $data['questions'] = $question->AllQuestionDetails();

        return view('admin/create_question', $data);
    }

    public function view_question()
    {
        $question = new QuestionModel();
        $data['question'] = $question->AllQuestionDetails();

        return view('admin/view_question', $data);
    }

    function updatequestiongetId()
    {
        $question_id = $this->request->getPost('update_question');
        return redirect()->to(base_url() . 'update_question/' . $question_id);
    }

    public function update_question()
    {
        $uri = current_url(true);
        $question_id = $uri->getSegment(2);

        $question = new QuestionModel();
        $data['questions'] = $question->QuestionContent($question_id);

        $question = new QuestionModel();
        $data['questions'] = $question->AllQuestionDetails();

        return view('admin/update_question', $data);
    }

    public function admin_update_question()
    {
        $course_id = $this->request->getPost('course_id');
        $question_title = $this->request->getPost('question_title');
        $content = $this->request->getPost('content');
        $xp_requirement = $this->request->getPost('xp_requirement');
        $question_id = $this->request->getPost('question_id');

        $values = [
            'course_id' => $course_id,
            'question_title' => $question_title,
            'xp_requirement' => $xp_requirement,
            'content' => $content
        ];

        $questionModel = new QuestionModel();
        $updatequestion = $questionModel->update($question_id, $values);

        if ($updatequestion) {
            return  redirect()->to('view_question')->with('success', 'Question updated successfully');
        } else {
            return  redirect()->to('view_question')->with('fail', 'Something went wrong. Question was not updated. Please try again.');
        }
    }

    function deletequestiongetId()
    {
        $question_id = $this->request->getPost('delete_question');
        return redirect()->to(base_url() . 'delete_question/' . $question_id);
    }

    public function delete_question()
    {
        $uri = current_url(true);
        $question_id = $uri->getSegment(2);

        $getquestion = new QuestionModel();
        $data['questions'] = $getquestion->QuestionDetailsById($question_id);

        return view('admin/delete_question', $data);
    }

    public function admin_delete_question()
    {
        $course_id = $this->request->getPost('course_id');
        $question_id = $this->request->getPost('question_id');

        $getquestion = new QuestionModel();
        $delete = $getquestion->DeleteQuestion($question_id);

        $coursemodel = new CourseModel();
        $find_course = $coursemodel->where('course_id', $course_id)->findAll();
        $number_of_questions = $find_course[0]['number_of_questions'];
        $newnumber_of_questions = $number_of_questions - 1;
        $course_data['number_of_questions'] = $newnumber_of_questions;

        $updatenumber_of_questions = $coursemodel->update($course_id, $course_data);

        if ($delete) {
            return  redirect()->to('view_question')->with('fail', 'Question not deleted.');
        } else {
            return  redirect()->to('view_question')->with('success', 'Question was deleted successfully.');
        }
    }
}
