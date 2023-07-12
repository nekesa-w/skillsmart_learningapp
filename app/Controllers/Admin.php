<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        return view('admin/dashboard');
    }

    public function index2()
    {
        return view('admin/dashboard2');
    }
}
