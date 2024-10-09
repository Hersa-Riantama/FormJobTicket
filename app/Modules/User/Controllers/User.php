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
            'judul' => 'List User',
        ];
        return view($this->folder_directory . 'data_user', $Udata);
    }
    public function verifyUser($id_user)
    {
        // $authHeader = $this->request->getHeader('Authorization');
        // if ($authHeader && $authHeader->getValue() === $this->value) { 
        // }else {
        //     return $this->failNotFound('Anda Tidak Memiliki Kunci Akses');
        // }
        $user = $this->model->find($id_user);

            if (!$user) {
                return $this->failNotFound('User tidak ditemukan');
            }
    
            $user['verifikasi'] = 'Y'; // Ubah status verifikasi menjadi 1
            $user['status_user'] = 'aktif'; // Ubah status user menjadi aktif
    
            if ($this->model->save($user)) {
                return $this->response->setJSON(['pesan' => 'Verifikasi berhasil']);
            } else {
                return $this->fail(['pesan' => 'Verifikasi gagal']);
        }  
    }
}
