<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CourseModel;
use App\Models\LevelModel;

class LevelController extends BaseController
{

    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function admin_create_level()
    {
        //Register user in database
        $string_course_id = $this->request->getPost('course_id');
        $level_title = $this->request->getPost('level_title');
        $content = $this->request->getPost('content');
        $xp_requirement = $this->request->getPost('xp_requirement');

        $course_id = (int)$string_course_id;

        $values = [
            'course_id' => $course_id,
            'level_title' => $level_title,
            'content' => $content,
            'xp_requirement' => $xp_requirement,
        ];

        $levelModel = new LevelModel();
        $query = $levelModel->insert($values);

        $coursemodel = new CourseModel();
        $find_course = $coursemodel->where('course_id', $course_id)->findAll();
        $number_of_levels = $find_course[0]['number_of_levels'];
        $newnumber_of_levels = $number_of_levels + 1;
        $course_data['number_of_levels'] = $newnumber_of_levels;

        $updatenumber_of_levels = $coursemodel->update($course_id, $course_data);

        if (!$query) {
            return  redirect()->to('create_level')->with('fail', 'Something went wrong. Level was not created. Please try again.');
        } else {
            return  redirect()->to('create_level')->with('success', 'Level created successfully');
        }
    }

    public function create_level()
    {
        $course = new CourseModel();
        $data['courses'] = $course->CourseDetails();

        return view('admin/create_level', $data);
    }

    public function view_level()
    {
        $level = new LevelModel();
        $data['levels'] = $level->AllLevelDetails();

        return view('admin/view_level', $data);
    }
}
