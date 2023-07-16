<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class QuizController extends BaseController
{

    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function admin_create_quiz()
    {
        //Register user in database
        $string_level_id = $this->request->getPost('level_id');
        $content = $this->request->getPost('content');

        $level_id = (int)$string_level_id;

        $values = [
            'level_id' => $level_id,
            'content' => $content,
        ];

        $quizModel = new QuizModel();
        $query = $quizModel->insert($values);

        $coursemodel = new CourseModel();
        $find_course = $coursemodel->where('course_id', $course_id)->findAll();
        $number_of_quizs = $find_course[0]['number_of_quizs'];
        $newnumber_of_quizs = $number_of_quizs + 1;
        $course_data['number_of_quizs'] = $newnumber_of_quizs;

        $updatenumber_of_quizs = $coursemodel->update($course_id, $course_data);

        if (!$query) {
            return  redirect()->to('create_quiz')->with('fail', 'Something went wrong. Quiz was not created. Please try again.');
        } else {
            return  redirect()->to('view_quiz')->with('success', 'Quiz created successfully');
        }
    }

    public function create_quiz()
    {
        $quiz = new QuizModel();
        $data['quizs'] = $quiz->AllQuizDetails();

        return view('admin/create_quiz', $data);
    }

    public function view_quiz()
    {
        $quiz = new QuizModel();
        $data['quiz'] = $quiz->AllQuizDetails();

        return view('admin/view_quiz', $data);
    }

    function updatequizgetId()
    {
        $quiz_id = $this->request->getPost('update_quiz');
        return redirect()->to(base_url() . 'update_quiz/' . $quiz_id);
    }

    public function update_quiz()
    {
        $uri = current_url(true);
        $quiz_id = $uri->getSegment(2);

        $quiz = new QuizModel();
        $data['quizs'] = $quiz->QuizContent($quiz_id);

        $quiz = new QuizModel();
        $data['quizs'] = $quiz->AllQuizDetails();

        return view('admin/update_quiz', $data);
    }

    public function admin_update_quiz()
    {
        $course_id = $this->request->getPost('course_id');
        $quiz_title = $this->request->getPost('quiz_title');
        $content = $this->request->getPost('content');
        $xp_requirement = $this->request->getPost('xp_requirement');
        $quiz_id = $this->request->getPost('quiz_id');

        $values = [
            'course_id' => $course_id,
            'quiz_title' => $quiz_title,
            'xp_requirement' => $xp_requirement,
            'content' => $content
        ];

        $quizModel = new QuizModel();
        $updatequiz = $quizModel->update($quiz_id, $values);

        if ($updatequiz) {
            return  redirect()->to('view_quiz')->with('success', 'Quiz updated successfully');
        } else {
            return  redirect()->to('view_quiz')->with('fail', 'Something went wrong. Quiz was not updated. Please try again.');
        }
    }

    function deletequizgetId()
    {
        $quiz_id = $this->request->getPost('delete_quiz');
        return redirect()->to(base_url() . 'delete_quiz/' . $quiz_id);
    }

    public function delete_quiz()
    {
        $uri = current_url(true);
        $quiz_id = $uri->getSegment(2);

        $getquiz = new QuizModel();
        $data['quizs'] = $getquiz->QuizDetailsById($quiz_id);

        return view('admin/delete_quiz', $data);
    }

    public function admin_delete_quiz()
    {
        $course_id = $this->request->getPost('course_id');
        $quiz_id = $this->request->getPost('quiz_id');

        $getquiz = new QuizModel();
        $delete = $getquiz->DeleteQuiz($quiz_id);

        $coursemodel = new CourseModel();
        $find_course = $coursemodel->where('course_id', $course_id)->findAll();
        $number_of_quizs = $find_course[0]['number_of_quizs'];
        $newnumber_of_quizs = $number_of_quizs - 1;
        $course_data['number_of_quizs'] = $newnumber_of_quizs;

        $updatenumber_of_quizs = $coursemodel->update($course_id, $course_data);

        if ($delete) {
            return  redirect()->to('view_quiz')->with('fail', 'Quiz not deleted.');
        } else {
            return  redirect()->to('view_quiz')->with('success', 'Quiz was deleted successfully.');
        }
    }
}
