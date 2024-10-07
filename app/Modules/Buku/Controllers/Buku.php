<?php

namespace Modules\Buku\Controllers;

use App\Controllers\BaseController;

class Buku extends BaseController
{
    protected $folder_directory = "Modules\\Buku\\Views\\";

    public function index()
    {
        return view($this->folder_directory . 'index');
    }
    public function data_buku()
    {
        $data = [
            'judul' => 'List Buku',
        ];
        return view($this->folder_directory . 'data_buku', $data);
    }
}
