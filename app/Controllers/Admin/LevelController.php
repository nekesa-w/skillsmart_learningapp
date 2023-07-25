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

    public function create_level()
    {
        $course = new CourseModel();
        $data['courses'] = $course->CourseDetails();

        return view('admin/create_level', $data);
    }

    public function admin_create_level()
    {
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
            return  redirect()->to('view_level')->with('success', 'Level created successfully');
        }
    }

    public function view_level()
    {
        $level = new LevelModel();
        $data['levels'] = $level->AllLevelDetails();

        return view('admin/view_level', $data);
    }

    function updatelevelgetId()
    {
        $level_id = $this->request->getPost('update_level');
        return redirect()->to(base_url() . 'update_level/' . $level_id);
    }

    public function update_level()
    {
        $uri = current_url(true);
        $level_id = $uri->getSegment(2);

        $level = new LevelModel();
        $data['levels'] = $level->LevelContent($level_id);

        $course = new CourseModel();
        $data['courses'] = $course->CourseDetails();

        return view('admin/update_level', $data);
    }

    public function admin_update_level()
    {
        //Update level in database
        $course_id = $this->request->getPost('course_id');
        $level_title = $this->request->getPost('level_title');
        $content = $this->request->getPost('content');
        $xp_requirement = $this->request->getPost('xp_requirement');
        $level_id = $this->request->getPost('level_id');

        $values = [
            'course_id' => $course_id,
            'level_title' => $level_title,
            'xp_requirement' => $xp_requirement,
            'content' => $content
        ];

        $levelModel = new LevelModel();
        $updatelevel = $levelModel->update($level_id, $values);

        if ($updatelevel) {
            return  redirect()->to('view_level')->with('success', 'Level updated successfully');
        } else {
            return  redirect()->to('view_level')->with('fail', 'Something went wrong. Level was not updated. Please try again.');
        }
    }

    function deletelevelgetId()
    {
        $level_id = $this->request->getPost('delete_level');
        return redirect()->to(base_url() . 'delete_level/' . $level_id);
    }

    public function delete_level()
    {
        $uri = current_url(true);
        $level_id = $uri->getSegment(2);

        $getlevel = new LevelModel();
        $data['levels'] = $getlevel->LevelDetailsById($level_id);

        return view('admin/delete_level', $data);
    }

    public function admin_delete_level()
    {
        $course_id = $this->request->getPost('course_id');
        $level_id = $this->request->getPost('level_id');

        $getlevel = new LevelModel();
        $delete = $getlevel->DeleteLevel($level_id);

        $coursemodel = new CourseModel();
        $find_course = $coursemodel->where('course_id', $course_id)->findAll();
        $number_of_levels = $find_course[0]['number_of_levels'];
        $newnumber_of_levels = $number_of_levels - 1;
        $course_data['number_of_levels'] = $newnumber_of_levels;

        $updatenumber_of_levels = $coursemodel->update($course_id, $course_data);

        if ($delete) {
            return  redirect()->to('view_level')->with('fail', 'Level not deleted.');
        } else {
            return  redirect()->to('view_level')->with('success', 'Level was deleted successfully.');
        }
    }
}
