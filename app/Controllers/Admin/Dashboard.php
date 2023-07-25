<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CompletedLevelModel;
use App\Models\CourseModel;
use App\Models\LevelModel;
use App\Models\QuestionModel;
use App\Models\QuizModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('login');
        } else {
            $courses = new CourseModel();
            $users = new UserModel();
            $levels = new LevelModel();
            $questions = new QuestionModel();
            $quiz = new QuizModel();

            $usersData = $users->select('DATEDIFF(CURDATE(), dob) / 365 as age, SUM(daily_xp_points) as xp_points')
                ->groupBy('age')
                ->findAll();

            $ages = [];
            $xpPoints = [];

            foreach ($usersData as $userData) {
                $ages[] = $userData['age'];
                $xpPoints[] = $userData['xp_points'];
            }

            $quizzesavg = $quiz->findAll();
            $coursesavg = $courses->findAll();

            $averagePercentages = [];

            foreach ($coursesavg as $course) {
                $totalPercentage = 0;
                $quizCount = 0;

                foreach ($quizzesavg as $quiz) {
                    if ($quiz['course_id'] == $course['course_id']) {
                        $totalPercentage += $quiz['percentage'];
                        $quizCount++;
                    }
                }

                if ($quizCount > 0) {
                    $averagePercentage = $totalPercentage / $quizCount;
                    $averagePercentages[$course['course_title']] = $averagePercentage;
                }
            }

            $completedLevelModel = new CompletedLevelModel();
            $courseModel = new CourseModel();

            // Get the XP points distribution by course
            $data = $completedLevelModel->select('course_id, SUM(xp_points) AS total_points')
                ->groupBy('course_id')
                ->findAll();

            $chartData = [];

            foreach ($data as $item) {
                $course = $courseModel->find($item['course_id']);
                $chartData[] = [
                    'label' => $course['course_title'],
                    'value' => $item['total_points'],
                ];
            }

            $data = [
                'levels' => $levels->CountLevels(),
                'users' => $users->CountUsers(),
                'courses' => $courses->CountCourses(),
                'questions' => $questions->CountQuestions(),
                'genderCounts' => $users->select('gender, COUNT(*) as count')->groupBy('gender')->findAll(),
                'ages' => $ages,
                'xpPoints' => $xpPoints,
                'averagePercentages' => $averagePercentages,
                'chartData' => $chartData,
            ];
            return view('admin/dashboard', $data);
        }
    }
}
