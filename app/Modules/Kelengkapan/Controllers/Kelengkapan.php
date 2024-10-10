<?php

namespace Modules\Kelengkapan\Controllers;

use App\Controllers\BaseController;

class Kelengkapan extends BaseController
{
    protected $folder_directory = "Modules\\Kelengkapan\\Views\\";

    public function index()
    {
        return view($this->folder_directory . 'index');
    }
}