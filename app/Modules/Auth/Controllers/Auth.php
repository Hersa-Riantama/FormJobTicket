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

        // Cari user berdasarkan email di database
        $user = $this->model->where('email', $email)->first();
        if (!$user || md5($password) !== $user['password']) {
            $errors = $validation->getErrors();
            // Jika user tidak ditemukan di database
            $response = [
                'Pesan' => 'Email atau password salah',
                'Status' => 'error',
                'Errors' => $errors
            ];
            return $this->response->setJSON($response)->setStatusCode(404);
        }
        // Cek status verifikasi user di database
        if ($user['verifikasi'] == 'N') {
            // Jika user belum diverifikasi
            $response = [
                'Pesan' => 'User belum diverifikasi',
                'Status' => 'error'
            ];
            return $this->response->setJSON($response)->setStatusCode(403);
        }
        if ($user['verifikasi'] == 'R') {
            // Jika user belum diverifikasi
            $response = [
                'Pesan' => 'Akun Anda disuspend',
                'Status' => 'error'
            ];
            return $this->response->setJSON($response)->setStatusCode(403);
        }
        // Set session
        $this->session->set([
            'id_user' => $user['id_user'],
            'level_user' => $user['level_user'],
            'logged_in' => true
        ]);

        // Response berhasil
        $response = [
            'Pesan' => 'Berhasil Login',
            'Status' => 'success'
        ];
        return $this->response->setJSON($response)->setStatusCode(200);
    }

    public function regis()
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
        ];

        $this->model->insert($data);

        // Response berhasil
        $response = [
            'Status' => 'success',
            'Pesan' => 'Data User Berhasil ditambahkan',
        ];
        return $this->response->setJSON($response)->setStatusCode(200);
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
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
