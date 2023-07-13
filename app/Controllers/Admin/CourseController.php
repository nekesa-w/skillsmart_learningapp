<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CourseModel;

class CourseController extends BaseController
{

    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function admin_create_course()
    {
        $validation = $this->validate([
            'course_title' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Course title is required',
                ],
            ],
            'dimension' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Course dimension is required',
                ],
            ],
            'desc' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Course description is required',
                ],
            ],
        ]);

        if (!$validation) {
            return view('admin/create_course', ['validation' => $this->validator]);
        } else {

            //Register user in database
            $course_title = $this->request->getPost('course_title');
            $dimension = $this->request->getPost('dimension');
            $desc = $this->request->getPost('desc');

            $values = [
                'course_title' => $course_title,
                'dimension' => $dimension,
                'desc' => $desc,
            ];

            $courseModel = new CourseModel();
            $query = $courseModel->insert($values);

            if (!$query) {
                return  redirect()->to('create_course')->with('fail', 'Something went wrong. Course was not created. Please try again.');
            } else {
                return  redirect()->to('create_course')->with('success', 'Course created successfully');
            }
        }
    }

    public function create_course()
    {

        return view('admin/create_course');
    }

    public function view_course()
    {
        $course = new CourseModel();
        $data['courses'] = $course->CourseDetails();

        return view('admin/view_course', $data);
    }
}
