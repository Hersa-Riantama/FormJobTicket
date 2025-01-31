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
        $user['verifikasi'] = 'R';
        $user['status_user'] = 'suspend';
        $model->update($id_user, $user);

        // Response sukses
        return $this->response->setJSON([
            'Status' => 'success'
        ]);
    }

    public function profil()
    {
        $AuthModel = new AuthModel();
        // Ambil data user berdasarkan ID dari sesi
        $userId = session()->get('id_user');

        if (!empty($userId)) {
            // Ambil data user dari database berdasarkan id_user
            $userData = $AuthModel->find($userId);
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
            'judul' => 'profil',
            'userData' => $userData,
        ];
        return view($this->folder_directory . 'profil', $Udata);
    }

    public function updateProfil()
    {
        // Aturan validasi
        $rules = $this->model->validationRules();

        // Jika validasi gagal
        if (!$this->validate($rules)) {
            $response = [
                'Status' => 'error',
                'Errors' => $this->validator->getErrors(), // Return specific field errors
            ];
            return $this->response->setJSON($response, 400);
        }

        // Jika validasi berhasil, proses data input
        $data = [
            'nama' => esc($this->request->getVar('nama')),
            'nomor_induk' => esc($this->request->getVar('nomor_induk')),
            'email' => esc($this->request->getVar('email')),
            'no_tlp' => esc($this->request->getVar('no_tlp')),
            'jk' => esc($this->request->getVar('jk')),
            'level_user' => esc($this->request->getVar('level_user')),
            'password' => md5(esc($this->request->getVar('password'))),
            'avatar' => "avatar.png",
        ];

        $this->model->insert($data);

        // Response berhasil
        $response = [
            'Status' => 'success',
            'Pesan' => 'Data User Berhasil ditambahkan',
        ];
        return $this->response->setJSON($response)->setStatusCode(200);
    }

    public function uploadAvatar()
    {
        $file = $this->request->getFile('upload');

        if ($file->isValid() && !$file->hasMoved()) {
            $idUser = session()->get('id_user');
            $newName = 'user_' . $idUser . '.' . $file->getExtension();
            $uploadPath = FCPATH . 'assets/img/avatars/';

            // 🔥 Cek jika file lama ada, hapus terlebih dahulu
            $oldAvatar = $this->model->find($idUser)['avatar'];
            if ($oldAvatar && file_exists($uploadPath . $oldAvatar)) {
                unlink($uploadPath . $oldAvatar);
            }

            // 🆕 Simpan file baru
            $file->move($uploadPath, $newName);

            // 📝 Update database dengan nama file baru
            $this->model->update($idUser, ['avatar' => $newName]);

            return $this->response->setJSON(['status' => 'success', 'filename' => $newName]);
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Upload gagal!']);
    }
}
