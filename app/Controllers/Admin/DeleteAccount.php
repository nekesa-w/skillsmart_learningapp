<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class DeleteAccount extends BaseController
{



    public function delete_account()
    {

        return view('admin/delete_account');
    }
}
