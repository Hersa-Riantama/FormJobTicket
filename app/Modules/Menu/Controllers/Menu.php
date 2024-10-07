<?php

namespace Modules\Menu\Controllers;

use App\Controllers\BaseController;

class Menu extends BaseController
{
    protected $folder_directory = "Modules\\Menu\\Views\\";

    public function index()
    {
        $data = [
            'judul' => 'Dashboard',
        ];
        return view($this->folder_directory . 'index', $data);
    }
}
