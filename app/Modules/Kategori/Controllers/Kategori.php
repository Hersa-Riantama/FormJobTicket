<?php

namespace Modules\Kategori\Controllers;

use App\Controllers\BaseController;

class Kategori extends BaseController
{
    protected $folder_directory = "Modules\\Kategori\\Views\\";

    public function index()
    {
        return view($this->folder_directory . 'index');
    }
}