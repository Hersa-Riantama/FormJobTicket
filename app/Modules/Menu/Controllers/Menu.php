<?php

namespace Modules\Menu\Controllers;

use App\Controllers\BaseController;
use App\Modules\Buku\Models\BukuModel;
use Modules\Form\Models\FormModel;
use Modules\User\Models\UserModel;

class Menu extends BaseController
{
    protected $folder_directory = "Modules\\Menu\\Views\\";

    public function index()
    {
        $user = new UserModel();
        $form = new FormModel();
        $buku = new BukuModel();
        $data = [
            'judul' => 'Dashboard',
            'user' => $user->countAllResults(),
            'form' => $form->countAllResults(),
            'buku' => $buku->countAllResults(),
        ];
        return view($this->folder_directory . 'index', $data);
    }
}
