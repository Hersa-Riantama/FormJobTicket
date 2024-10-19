<?php

namespace Modules\Buku\Controllers;

use App\Modules\Buku\Models\BukuModel;
use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\CLI\Console;
use Modules\Auth\Models\AuthModel;

class Buku extends BaseController
{
    use ResponseTrait;
    protected $folder_directory = "Modules\\Buku\\Views\\";
    protected $model;
    protected $AuthModel;

    public function __construct()
    {
        // Load PegawaiModel untuk digunakan dalam method controller
        $this->model = new BukuModel();
        $this->AuthModel = new AuthModel();
    }
    public function show($id_buku = null)
    {
        $data = [
            'pesan' => 'Berhasil Mendapatkan Data Buku',
            'data_buku' => $this->model->find($id_buku)
        ];
        if ($data['data_buku'] == null) {
            return $this->failNotFound('Data Buku Tidak ditemukan');
        }
        return $this->response->setJSON($data, 200);
    }
    public function index()
    {
        // $authHeader = $this->request->getHeader('Authorization');
        // if ($authHeader && $authHeader->getValue() === $this->value) {

        // }else {
        //     return $this->failUnauthorized('Anda Tidak Memiliki Kunci Akses');
        // }
        $model = new BukuModel();
        $AuthModel = new AuthModel();
        $data = $model->getBuku();
        // Ambil data user berdasarkan ID dari sesi
        $userId = session()->get('id_user');
        if (!empty($userId)) {
            // Ambil data user dari database berdasarkan id_user
            $userData = $AuthModel->find($userId);
            if ($userData && isset($userData['level_user'])) {
                $allowUser = ['Admin Sistem', 'Editor', 'Koord Editor'];
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
        if ($this->request->isAJAX()) {
            return $this->response->setJSON(['buku' => $data]);
        }
        $Vdata = [
            'buku' => $data,
            'judul' => 'Kelola Buku',
            'userData' => $userData,
        ];
        return view($this->folder_directory . 'data_buku', $Vdata);
    }
    public function create()
    {
        // $authHeader = $this->request->getHeader('Authorization');
        // if ($authHeader && $authHeader->getValue() === $this->value) {
        // }else {
        //     // Jika header Authorization tidak valid
        //     return $this->failUnauthorized('Anda Tidak Memiliki Kunci Akses');
        // }
        $AuthModel = new AuthModel();
        // Ambil data user berdasarkan ID dari sesi
        $userId = session()->get('id_user');
        if (!empty($userId)) {
            // Ambil data user dari database berdasarkan id_user
            $userData = $AuthModel->find($userId);
            if ($userData && isset($userData['level_user'])) {
                $allowUser = ['Admin Sistem', 'Editor', 'Koord Editor'];
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
        $rules = $this->model->validationRules();
        if (!$this->validate($rules)) {
            $response = [
                'pesan' => $this->validator->getErrors()
            ];
            return $this->failValidationErrors($response);
        }
        $this->model->insert([
            'kode_buku' => esc($this->request->getVar('kode_buku')),
            'judul_buku' => esc($this->request->getVar('judul_buku')),
            'pengarang' => esc($this->request->getVar('pengarang')),
            'target_terbit' => esc($this->request->getVar('target_terbit')),
            'warna' => esc($this->request->getVar('warna')),
        ]);
        // Response berhasil
        $response = [
            'Pesan' => 'Data Buku Berhasil ditambahkan'
        ];
        return $this->respondCreated($response);
    }
    public function update($id_buku = null)
    {
        // $authHeader = $this->request->getHeader('Authorization');
        // // Mengecek apakah Authorization header valid
        // if ($authHeader && $authHeader->getValue() === $this->value) {

        // } else {
        //     // Jika Authorization header tidak valid
        //     return $this->failUnauthorized('Anda Tidak Memiliki Kunci Akses');
        // }
        $buku = $this->model->find($id_buku);
        if ($buku == null) {
            return $this->failNotFound('Data Buku dengan ID tersebut tidak ditemukan');
        }
        log_message('debug', 'ID Buku yang diterima: ' . $id_buku);
        $buku = [
            'kode_buku' => esc($this->request->getVar('kode_buku')),
            'judul_buku' => esc($this->request->getVar('judul_buku')),
            'pengarang' => esc($this->request->getVar('pengarang')),
            'target_terbit' => esc($this->request->getVar('target_terbit')),
            'warna' => esc($this->request->getVar('warna')),
        ];
        $this->model->update($id_buku, $buku);
        return $this->respondUpdated([
            'pesan' => 'Data Buku Berhasil di update',
            'data_buku' => $buku
        ]);
    }
    public function delete($id_buku = null)
    {
        // $authHeader = $this->request->getHeader('Authorization');
        // // Mengecek apakah Authorization header valid
        // if ($authHeader && $authHeader->getValue() === $this->value) {
        // } else {
        //     // Jika Authorization header tidak valid
        //     return $this->failUnauthorized('Anda Tidak Memiliki Kunci Akses');
        // }
        $buku = $this->model->find($id_buku);
        if (!$buku) {
            return $this->failNotFound('Data Buku tidak ditemukan');
        }
        $this->model->delete($id_buku);
        $response = [
            'pesan' => 'Data Buku berhasil dihapus'
        ];
        return $this->respondDeleted($response, 200);
    }
    public function data_buku()
    {
        $AuthModel = new AuthModel();
        // Ambil data user berdasarkan ID dari sesi
        $userId = session()->get('id_user');
        if (!empty($userId)) {
            // Ambil data user dari database berdasarkan id_user
            $userData = $AuthModel->find($userId);
            if ($userData && isset($userData['level_user'])) {
                $allowUser = ['Admin Sistem', 'Editor', 'Koord Editor'];
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
            'judul' => 'Kelola Buku',
            'userData' => $userData,
        ];
        return view($this->folder_directory . 'data_buku', $data);
    }
}
