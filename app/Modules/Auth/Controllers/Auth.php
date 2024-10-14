<?php

namespace Modules\Auth\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use Modules\Auth\Models\AuthModel;

class Auth extends BaseController
{
    use ResponseTrait;
    protected $folder_directory = "Modules\\Auth\\Views\\";
    protected $model;

    public function __construct()
    {
        $this->model = new AuthModel();
        $this->session = session();
    }

    public function getUserById()
    {
        // Periksa apakah user sudah login
        if (!$this->session->has('logged_in') || !$this->session->get('logged_in')) {
            return $this->respond(['status' => 'error', 'message' => 'User not logged in'], 401);
        }

        // Ambil ID user dari session
        $userId = $this->session->get('id_user');

        // Panggil model untuk mengambil data berdasarkan ID
        $userModel = new AuthModel();
        $userData = $userModel->find($userId);

        if ($userData) {
            return $this->respond(['status' => 'success', 'data' => $userData], 200);
        } else {
            return $this->respond(['status' => 'error', 'message' => 'User not found'], 404);
        }
    }

    public function Flogin()
    {
        // Ambil data inputan dari request
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]'
        ]);

        if (!$validation->run(compact('email', 'password'))) {
            // Jika validasi gagal, kembalikan error
            $errors = $validation->getErrors();
            $response = [
                'Pesan' => 'Validasi gagal',
                'Status' => 'error',
                'Errors' => $errors  // Menyertakan pesan error spesifik
            ];
            return $this->response->setJSON($response)->setStatusCode(400);
        }

        // Cari user berdasarkan email di database
        $user = $this->model->where('email', $email)->first();
        if (!$user) {
            // Jika user tidak ditemukan di database
            $response = [
                'Pesan' => 'User tidak ditemukan',
                'Status' => 'error'
            ];
            return $this->response->setJSON($response)->setStatusCode(404);
        }
        $passmd5 = md5($password);
        // Verifikasi password dengan password yang ada di database
        if ($passmd5 !== ($user['password'])) {
            // Jika password tidak cocok
            $response = [
                'Pesan' => 'Password salah',
                'Status' => 'error'
            ];
            return $this->response->setJSON($response)->setStatusCode(401);
        }

        // Cek status verifikasi user di database
        if ($user['verifikasi'] == 'N') {
            // Jika user belum diverifikasi
            return $this->fail('User belum diverifikasi');
        }
        // Response berhasil
        $response = [
            'Pesan' => 'Berhasil Login',
            'Status' => 'success'
        ];

        // Set session
        $this->session->set([
            'id_user' => $user['id_user'],
            'logged_in' => true
        ]);
        return $this->response->setJSON($response)->setStatusCode(200);
        // // Ambil nilai Authorization header
        // $authHeader = $this->request->getHeader('Authorization');
        // // Cek apakah header Authorization ada dan nilai key cocok
        // if ($authHeader && $authHeader->getValue() === $this->value) {
        // } else {
        //     // Jika header Authorization tidak valid
        //     return $this->failUnauthorized('Anda tidak memiliki kunci akses');
        // }
    }

    public function regis()
    {
        // Validasi input data
        $rules = $this->model->validationRules();

        // Jika validasi gagal
        if (!$this->validate($rules)) {
            $response = [
                'Pesan' => $this->validator->getErrors()
            ];
            return $this->response->setJSON($response, 400);
        }
        // Insert data into database
        $data = [
            'nama' => esc($this->request->getVar('nama')),
            'nomor_induk' => esc($this->request->getVar('nomor_induk')),
            'email' => esc($this->request->getVar('email')),
            'no_tlp' => esc($this->request->getVar('no_tlp')),
            'jk' => esc($this->request->getVar('jk')),
            'level_user' => esc($this->request->getVar('level_user')),
            'password' => md5(esc($this->request->getVar('password'))),
        ];
        $this->model->insert($data);
        // Response berhasil
        $response = [
            'Pesan' => 'Data User Berhasil ditambahkan',
            'Status' => 'success',
        ];
        return $this->response->setJSON($response)->setStatusCode(200);
        // // Ambil nilai Authorization header
        // $authHeader = $this->request->getHeader('Authorization');

        // // Cek apakah header Authorization ada dan nilai key cocok
        // if ($authHeader && $authHeader->getValue() === $this->value) {
        // } else {
        //     // Jika header Authorization tidak valid
        //     return $this->failUnauthorized('Anda Tidak Memiliki Kunci Akses');
        // }
    }


    public function index()
    {
        return view($this->folder_directory . 'index');
    }

    public function login()
    {
        return view($this->folder_directory . 'login');
    }

    public function daftar()
    {
        return view($this->folder_directory . 'daftar');
    }
}
