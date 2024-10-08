<?php

namespace Modules\Buku\Controllers;

use App\Modules\Buku\Models\BukuModel;
use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\CLI\Console;

class Buku extends BaseController
{
    use ResponseTrait;
    protected $folder_directory = "Modules\\Buku\\Views\\";
    protected $model;

    public function __construct()
    {
        // Load PegawaiModel untuk digunakan dalam method controller
        $this->model = new BukuModel;
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
        return $this->respond($data, 200);
    }
    public function index()
    {
        // $authHeader = $this->request->getHeader('Authorization');
        // if ($authHeader && $authHeader->getValue() === $this->value) {

        // }else {
        //     return $this->failUnauthorized('Anda Tidak Memiliki Kunci Akses');
        // }
        $model = new BukuModel();
        $data = $model->getBuku();
        if ($this->request->isAJAX()) {
            // Respond with JSON for AJAX requests (e.g., for your DataTables or API use)
            return $this->respond(['buku' => $data]);
        }
        $Vdata = [
            'buku' => $data,
            'judul' => 'List Buku',
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
        $data = [
            'judul' => 'List Buku',
        ];
        return view($this->folder_directory . 'data_buku', $data);
    }
}
