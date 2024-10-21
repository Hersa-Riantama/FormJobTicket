<?php

namespace Modules\Grup\Controllers;

use App\Controllers\BaseController;

class Grup extends BaseController
{
    protected $folder_directory = "Modules\\Grup\\Views\\";

    public function index()
    {
        return view($this->folder_directory . 'index');
    }
}