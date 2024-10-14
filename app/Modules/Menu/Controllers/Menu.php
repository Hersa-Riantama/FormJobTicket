<?php

namespace Modules\Menu\Controllers;

use App\Controllers\BaseController;
use App\Modules\Buku\Models\BukuModel;
use CodeIgniter\API\ResponseTrait;
use Modules\Form\Models\FormModel;
use Modules\Kategori\Models\KategoriModel;
use Modules\User\Models\UserModel;

class Menu extends BaseController
{
    use ResponseTrait;
    protected $folder_directory = "Modules\\Menu\\Views\\";
    protected $model;

    public function index()
    {
        $user = new UserModel();
        $kategori = new KategoriModel();
        $buku = new BukuModel();
        $form = new FormModel();
        $data = [
            'judul' => 'Dashboard',
            'user' => $user->countAllResults(),
            'kategori' => $kategori->countAllResults(),
            'buku' => $buku->countAllResults(),
            'form' => $form->countAllResults(),
        ];
        return view($this->folder_directory . 'index', $data);
    }

    public function beranda()
    {
        $data = [
            'judul' => 'Beranda',
        ];
        return view($this->folder_directory . 'beranda', $data);
    }
}
