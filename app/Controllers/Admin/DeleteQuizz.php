<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class DeleteQuizz extends BaseController
{



    public function delete_quizz()
    {

        return view('admin/delete_quizz');
    }
}
