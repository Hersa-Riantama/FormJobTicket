<?php

namespace Modules\User\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use Modules\User\Models\UserModel;

class User extends BaseController
{
    use ResponseTrait;
    protected $folder_directory = "Modules\\User\\Views\\";
    protected $model;

    public function __construct()
    {
        // Load PegawaiModel untuk digunakan dalam method controller
        $this->model = new UserModel();
    }

    public function index()
    {
        return view($this->folder_directory . 'index');
    }
    public function tampil()
    {
        $model = new UserModel();
        $data = $model->getUser();
        if ($this->request->isAJAX()) {
            return $this->response->setJSON((['user' => $data]));
        }
        $Udata = [
            'user' => $data,
            'judul' => 'Kelola User',
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
}
