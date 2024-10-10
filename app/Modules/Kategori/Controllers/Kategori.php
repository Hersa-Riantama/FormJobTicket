<?php

namespace Modules\Kategori\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class Kategori extends BaseController
{
    use ResponseTrait;
    protected $folder_directory = "Modules\\Kategori\\Views\\";
    protected $model;

    public function index()
    {
        $data = [
            'judul' => 'Kelola Kategori',
        ];
        return view($this->folder_directory . 'index', $data);
    }
}
