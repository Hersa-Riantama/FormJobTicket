<?php

namespace Modules\User\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use Modules\Auth\Models\AuthModel;
use Modules\User\Models\UserModel;

class User extends BaseController
{
    use ResponseTrait;
    protected $folder_directory = "Modules\\User\\Views\\";
    protected $model;
    protected $AuthModel;

    public function __construct()
    {
        // Load PegawaiModel untuk digunakan dalam method controller
        $this->model = new UserModel();
        $this->AuthModel = new AuthModel();
    }

    public function index()
    {
        return view($this->folder_directory . 'index');
    }
    public function tampil()
    {
        $AuthModel = new AuthModel();
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
            return redirect()->to('/login');
        }
        $model = new UserModel();
        $data = $model->getUser();
        if ($this->request->isAJAX()) {
            return $this->response->setJSON(['user' => $data]);
        }
        $Udata = [
            'user' => $data,
            'judul' => 'Kelola User',
            'userData' => $userData,
        ];
        return view($this->folder_directory . 'data_user', $Udata);
    }
    public function verifyUser($id_user = null)
    {
        // $authHeader = $this->request->getHeader('Authorization');
        // if ($authHeader && $authHeader->getValue() === $this->value) { 
        // }else {
        //     return $this->failNotFound('Anda Tidak Memiliki Kunci Akses');
        // }
        // Ambil model user
        log_message('info', 'Verifikasi user dengan ID: ' . $id_user);
        $model = new UserModel();

        // Cari user berdasarkan ID
        $user = $model->find($id_user);

        // Jika user tidak ditemukan
        if (!$user) {
            return $this->response->setJSON([
                'Pesan' => 'User tidak ditemukan',
                'Status' => 'error'
            ], 404);
        }

        // Ubah status verifikasi user menjadi 'Y' (verified)
        $user['verifikasi'] = 'Y';
        $user['status_user'] = 'aktif';
        $model->update($id_user, $user);

        // Response sukses
        return $this->response->setJSON([
            'Pesan' => 'User berhasil diverifikasi',
            'Status' => 'success'
        ]);
    }

    public function getKoord()
    {
        $userModel = new UserModel();
        $koord = $userModel->where('level_user', 'Koord Editor')->findAll(); // Ambil semua data grup

        return $this->respond($koord); // Kembalikan data dalam format JSON
    }

    public function suspendUser($id_user)
    {
        log_message('info', 'Suspend user dengan ID: ' . $id_user);
        $model = new UserModel();

        // Cari user berdasarkan ID
        $user = $model->find($id_user);

        // Jika user tidak ditemukan
        if (!$user) {
            return $this->response->setJSON([
                'Pesan' => 'User tidak ditemukan',
                'Status' => 'error'
            ], 404);
        }

        // Ubah status verifikasi user menjadi 'N' (unverified)
        $user['verifikasi'] = 'N';
        $user['status_user'] = 'nonaktif';
        $model->update($id_user, $user);

        // Response sukses
        return $this->response->setJSON([
            'Pesan' => 'User berhasil disuspend',
            'Status' => 'success'
        ]);
    }
}
