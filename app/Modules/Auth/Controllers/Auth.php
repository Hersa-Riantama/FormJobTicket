<?php

namespace Modules\Auth\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    protected $folder_directory = "Modules\\Auth\\Views\\";

    public function index()
    {
        return view($this->folder_directory . 'index');
    }

    public function login()
    {
        return view($this->folder_directory . 'login');
    }

    public function daftar()
    {
        return view($this->folder_directory . 'daftar');
    }
}
