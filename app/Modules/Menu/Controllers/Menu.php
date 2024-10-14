<?php

namespace Modules\Menu\Controllers;

use App\Controllers\BaseController;
use App\Modules\Buku\Models\BukuModel;
use CodeIgniter\API\ResponseTrait;
use Modules\Auth\Models\AuthModel;
use Modules\Form\Models\FormModel;
use Modules\Kategori\Models\KategoriModel;
use Modules\User\Models\UserModel;

class Menu extends BaseController
{
    use ResponseTrait;
    protected $folder_directory = "Modules\\Menu\\Views\\";
    protected $model;
    protected $AuthModel;

    public function __construct()
    {
        $this->AuthModel = new AuthModel();
    }
    public function index()
    {
        $AuthModel = new AuthModel();
        $user = new UserModel();
        $kategori = new KategoriModel();
        $buku = new BukuModel();
        $form = new FormModel();
        // Ambil data user berdasarkan ID dari sesi
        $userId = session()->get('id_user');
        $userData = $AuthModel->find($userId);
        $data = [
            'judul' => 'Dashboard',
            'user' => $user->countAllResults(),
            'kategori' => $kategori->countAllResults(),
            'buku' => $buku->countAllResults(),
            'form' => $form->countAllResults(),
            'userData' => $userData,
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
