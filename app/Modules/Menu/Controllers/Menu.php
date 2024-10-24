<?php

namespace Modules\Menu\Controllers;

use App\Controllers\BaseController;
use App\Modules\Buku\Models\BukuModel;
use CodeIgniter\API\ResponseTrait;
use Modules\Auth\Models\AuthModel;
use Modules\Form\Models\FormModel;
use Modules\Grup\Models\GrupModel;
use Modules\Kategori\Models\KategoriModel;
use Modules\User\Models\UserModel;
use PhpParser\NodeVisitor\FirstFindingVisitor;

class Menu extends BaseController
{
    use ResponseTrait;
    protected $folder_directory = "Modules\\Menu\\Views\\";
    protected $model;
    protected $AuthModel;
    protected $GrupModel;
    protected $format = 'json';

    public function __construct()
    {
        $this->AuthModel = new AuthModel();
        $this->GrupModel = new GrupModel();
    }
    public function index()
    {
        $user = new UserModel();
        $kategori = new KategoriModel();
        $buku = new BukuModel();
        $form = new FormModel();
        // Ambil data user berdasarkan ID dari sesi
        $userId = session()->get('id_user');
        // $userData = $AuthModel->find($userId);

        if (!empty($userId)) {
            // Ambil data user dari database berdasarkan id_user
            $userData = $user->find($userId);
            if ($userData && isset($userData['level_user'])) {
                $allowUser = ['Admin Sistem', 'Tim Multimedia', 'Editor', 'Koord Editor', 'Manager Platform'];
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
            'judul' => 'Form QR Code',
        ];
        return view($this->folder_directory . 'beranda', $data);
    }

    public function checkUserStatus()
    {
        $userId = session()->get('id_user'); // Ambil ID user dari session

        $grupModel = new GrupModel();
        $userModel = new UserModel();
        $userData = $userModel->find($userId);

        // Pastikan userData tidak null dan level_user ada
        if ($userData && isset($userData['level_user']) && strcasecmp($userData['level_user'], 'Editor') == 0) {
            // Jika level_user diizinkan, cek apakah user terdaftar
            $userExists = $grupModel->where('id_editor', $userId)->first();

            // Tampilkan modal jika pengguna tidak terdaftar
            if (!$userExists) {
                return $this->respond(['showModal' => true, 'canCloseModal' => false]);
            }
        }

        return $this->respond(['showModal' => false]);
    }

    public function registerSelection()
    {
        $request = $this->request->getJSON();

        // Validasi input
        if (empty($request->id_koord)) {
            return $this->respond(['status' => 'error', 'message' => 'ID koord. Editor diperlukan.'], 400);
        }

        $userId = session()->get('id_user');
        $idKoord = $request->id_koord;

        // Simpan pilihan ke database menggunakan model
        $grupModel = new GrupModel();
        $data = [
            'id_editor' => $userId,
            'id_koord' => $idKoord,
        ];

        if ($grupModel->insert($data)) {
            return $this->respond(['status' => 'success', 'message' => 'Pilihan berhasil disimpan!']);
        } else {
            return $this->respond(['status' => 'error', 'message' => 'Gagal menyimpan pilihan: ' . implode(', ', $grupModel->errors())], 400);
        }
    }

    public function getKoord()
    {
        $userModel = new UserModel();
        $koord = $userModel->where('level_user', 'Koord Editor')->findAll(); // Ambil semua data grup

        return $this->respond($koord); // Kembalikan data dalam format JSON
    }
}
