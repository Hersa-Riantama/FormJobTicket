<?php

namespace Modules\Kategori\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use Modules\Auth\Models\AuthModel;
use Modules\Kategori\Models\KategoriModel;

class Kategori extends BaseController
{
    use ResponseTrait;
    protected $folder_directory = "Modules\\Kategori\\Views\\";
    protected $model;
    protected $AuthModel;

    public function __construct()
    {
        $this->AuthModel = new AuthModel();
    }

    public function index()
    {
        $data = [
            'judul' => 'Kelola Kategori',
        ];
        return view($this->folder_directory . 'index', $data);
    }

    public function data_kategori()
    {
        $AuthModel = new AuthModel();
        $kategorimodel = new KategoriModel();
        // Ambil data user berdasarkan ID dari sesi
        $userId = session()->get('id_user');
        if (!empty($userId)) {
            // Ambil data user dari database berdasarkan id_user
            $userData = $AuthModel->find($userId);
            if ($userData && isset($userData['level_user'])) {
                $allowUser = ['Admin Sistem'];
                if (!in_array($userData['level_user'], $allowUser)) {
                    echo '<script>alert("Access Denied!!"); history.back();</script>';
                    return;
                }
            } else {
                echo '<script>alert("Level user tidak ditemukan."); history.back();</script>';
                return;
            }
        } else {
            echo '<script>alert("User not found or session invalid."); history.back();</script>';
            return;
        }
        $userData = $AuthModel->find($userId);
        $data = $kategorimodel->getKategori();
        if ($this->request->isAJAX()) {
            // Respond with JSON for AJAX requests (e.g., for your DataTables or API use)
            return $this->response->setJSON(['kategori' => $data]);
        }
        $Vdata = [
            'kategori' => $data,
            'judul' => 'Kelola Kategori',
            'userData' => $userData,
        ];
        return view($this->folder_directory . 'data_kategori', $Vdata);
    }
}
