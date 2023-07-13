<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class CreateQuizz extends BaseController
{



    public function create_quizz()
    {

        return view('admin/create_quizz');
    }
}
