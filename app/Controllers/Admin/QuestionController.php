<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\QuestionModel;
use App\Models\LevelModel;

class QuestionController extends BaseController
{

    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function create_question()
    {
        $levels = new LevelModel();
        $data['levels'] = $levels->AllLevelDetails();

        return view('admin/create_question', $data);
    }

    public function admin_create_question()
    {
        $string_level_id = $this->request->getPost('level_id');
        $paragraph = $this->request->getPost('paragraph');
        $question_title = $this->request->getPost('question_title');
        $correct_answer = $this->request->getPost('correct_answer');
        $option_1 = $this->request->getPost('option_1');
        $option_2 = $this->request->getPost('option_2');
        $option_3 = $this->request->getPost('option_3');
        $option_4 = $this->request->getPost('option_4');

        $level_id = (int)$string_level_id;

        $values = [
            'level_id' => $level_id,
            'paragraph' => $paragraph,
            'question_title' => $question_title,
            'correct_answer' => $correct_answer,
            'option_1' => $option_1,
            'option_2' => $option_2,
            'option_3' => $option_3,
            'option_4' => $option_4
        ];

        $questionModel = new QuestionModel();
        $query = $questionModel->insert($values);

        if (!$query) {
            return  redirect()->to('create_question')->with('fail', 'Something went wrong. Question was not created. Please try again.');
        } else {
            return  redirect()->to('view_question')->with('success', 'Question created successfully');
        }
    }

    public function view_question()
    {
        $question = new QuestionModel();
        $data['questions'] = $question->AllQuestionDetails();

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

        $levels = new LevelModel();
        $data['levels'] = $levels->AllLevelDetails();

        return view('admin/update_question', $data);
    }

    public function admin_update_question()
    {
        $question_id = $this->request->getPost('question_id');
        $level_id = $this->request->getPost('level_id');
        $paragraph = $this->request->getPost('paragraph');
        $question_title = $this->request->getPost('question_title');
        $correct_answer = $this->request->getPost('correct_answer');
        $option_1 = $this->request->getPost('option_1');
        $option_2 = $this->request->getPost('option_2');
        $option_3 = $this->request->getPost('option_3');
        $option_4 = $this->request->getPost('option_4');

        $values = [
            'level_id' => $level_id,
            'paragraph' => $paragraph,
            'question_title' => $question_title,
            'correct_answer' => $correct_answer,
            'option_1' => $option_1,
            'option_2' => $option_2,
            'option_3' => $option_3,
            'option_4' => $option_4
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
        $question_id = $this->request->getPost('question_id');

        $getquestion = new QuestionModel();
        $delete = $getquestion->DeleteQuestion($question_id);

        if ($delete) {
            return  redirect()->to('view_question')->with('fail', 'Question not deleted.');
        } else {
            return  redirect()->to('view_question')->with('success', 'Question was deleted successfully.');
        }
    }
}
