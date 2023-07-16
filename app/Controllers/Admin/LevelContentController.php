<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LevelModel;
use App\Models\QuestionsModel;

class LevelContentController extends BaseController
{

    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function admin_create_question()
    {
        $validation = $this->validate([
            'question_title' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Question title is required',
                ],
            ],
            'dimension' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Question dimension is required',
                ],
            ],
            'desc' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Question description is required',
                ],
            ],
        ]);

        if (!$validation) {
            return view('admin/create_question', ['validation' => $this->validator]);
        } else {

            //Register user in database
            $question_title = $this->request->getPost('question_title');
            $dimension = $this->request->getPost('dimension');
            $desc = $this->request->getPost('desc');

            $values = [
                'question_title' => $question_title,
                'dimension' => $dimension,
                'desc' => $desc,
            ];

            $questionsModel = new QuestionsModel();
            $query = $questionsModel->insert($values);

            if (!$query) {
                return  redirect()->to('create_question')->with('fail', 'Something went wrong. Question was not created. Please try again.');
            } else {
                return  redirect()->to('view_question')->with('success', 'Question created successfully');
            }
        }
    }

    public function create_question()
    {

        return view('admin/create_question');
    }

    public function view_question()
    {
        $question = new QuestionsModel();
        $data['questions'] = $question->QuestionDetails();

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

        $question = new QuestionsModel();
        $data['questions'] = $question->QuestionDetailsbyId($question_id);

        return view('admin/update_question', $data);
    }

    public function admin_update_question()
    {
        //Update user in database
        $question_title = $this->request->getPost('question_title');
        $dimension = $this->request->getPost('dimension');
        $desc = $this->request->getPost('desc');
        $question_id = $this->request->getPost('question_id');

        $values = [
            'question_title' => $question_title,
            'dimension' => $dimension,
            'desc' => $desc
        ];

        $questionsModel = new QuestionsModel();
        $updatequestion = $questionsModel->update($question_id, $values);

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

        $getquestion = new QuestionsModel();
        $data['questions'] = $getquestion->QuestionDetailsbyId($question_id);

        return view('admin/delete_question', $data);
    }

    public function admin_delete_question()
    {
        $question_id = $this->request->getPost('question_id');
        $getquestion = new QuestionsModel();

        $delete = $getquestion->DeleteQuestion($question_id);

        if ($delete) {
            return  redirect()->to('view_question')->with('fail', 'Question not deleted.');
        } else {
            return  redirect()->to('view_question')->with('success', 'Question was deleted successfully.');
        }
    }
}
