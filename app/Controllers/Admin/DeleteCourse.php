<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class DeleteCourse extends BaseController
{



    public function delete_course()
    {

        return view('admin/delete_course');
    }
}
