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

    function updatecoursegetId()
    {
        $course_id = $this->request->getPost('update_course');
        return redirect()->to(base_url() . 'update_course/' . $course_id);
    }

    public function update_course()
    {
        $uri = current_url(true);
        $course_id = $uri->getSegment(2);

        $course = new CourseModel();
        $data['courses'] = $course->CourseDetailsbyId($course_id);

        return view('admin/update_course', $data);
    }

    public function admin_update_course()
    {
        //Update user in database
        $course_title = $this->request->getPost('course_title');
        $dimension = $this->request->getPost('dimension');
        $desc = $this->request->getPost('desc');
        $course_id = $this->request->getPost('course_id');

        $values = [
            'course_title' => $course_title,
            'dimension' => $dimension,
            'desc' => $desc
        ];

        $courseModel = new CourseModel();
        $updatecourse = $courseModel->update($course_id, $values);

        if ($updatecourse) {
            return  redirect()->to('view_course')->with('success', 'Course updated successfully');
        } else {
            return  redirect()->to('view_course')->with('fail', 'Something went wrong. Course was not updated. Please try again.');
        }
    }

    function deletecoursegetId()
    {
        $course_id = $this->request->getPost('delete_course');
        return redirect()->to(base_url() . 'delete_course/' . $course_id);
    }

    public function delete_course()
    {
        $uri = current_url(true);
        $course_id = $uri->getSegment(2);

        $getcourse = new CourseModel();
        $data['courses'] = $getcourse->CourseDetailsbyId($course_id);

        return view('admin/delete_course', $data);
    }

    public function admin_delete_course()
    {
        $course_id = $this->request->getPost('course_id');
        $getcourse = new CourseModel();

        $delete = $getcourse->DeleteCourse($course_id);

        if ($delete) {
            return  redirect()->to('view_course')->with('fail', 'Course not deleted.');
        } else {
            return  redirect()->to('view_course')->with('success', 'Course was deleted successfully.');
        }
    }
}
