<?php

namespace Modules\FormC2\Controllers;

use App\Controllers\BaseController;

class FormC2 extends BaseController
{
    protected $folder_directory = "Modules\\FormC2\\Views\\";

    public function index()
    {
        return view($this->folder_directory . 'index');
    }
}