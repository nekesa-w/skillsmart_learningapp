<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class DeleteLevel extends BaseController
{



    public function delete_level()
    {

        return view('admin/delete_level');
    }
}
