<?php

namespace Modules\Form\Controllers;

use App\Controllers\BaseController;

class Form extends BaseController
{
    protected $folder_directory = "Modules\\Form\\Views\\";

    public function index()
    {
        return view($this->folder_directory . 'index');
    }
    public function form()
    {
        $data = [
            'judul' => 'Form Job Ticket',
        ];
        return view($this->folder_directory . 'form', $data);
    }
    public function data_form()
    {
        $data = [
            'judul' => 'List Form',
        ];
        return view($this->folder_directory . 'data_form', $data);
    }
}
