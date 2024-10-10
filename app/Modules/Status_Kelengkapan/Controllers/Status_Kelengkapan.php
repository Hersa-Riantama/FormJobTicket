<?php

namespace Modules\Status_Kelengkapan\Controllers;

use App\Controllers\BaseController;

class StatusKelengkapan extends BaseController
{
    protected $folder_directory = "Modules\\Status_Kelengkapan\\Views\\";

    public function index()
    {
        return view($this->folder_directory . 'index');
    }
}