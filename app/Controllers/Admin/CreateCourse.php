<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class CreateCourse extends BaseController
{



    public function create_course()
    {

        return view('admin/create_course');
    }
}
