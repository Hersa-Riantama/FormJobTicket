<?php

namespace Modules\Buku\Controllers;

use App\Modules\Buku\Models\BukuModel;
use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class Buku extends BaseController
{
    use ResponseTrait;
    protected $folder_directory = "Modules\\Buku\\Views\\";

    public function __construct()
    {
        // Load PegawaiModel untuk digunakan dalam method controller
        $this->model = new BukuModel;
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
            return $this->respond($data);
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
        $id_buku = base64_decode($id_buku);
            // Ambil rules validasi dari model
            $rules = $this->model->validationRules();
            
            // Validasi input
            if (!$this->validate($rules)) {
                $response = [
                    'pesan' => $this->validator->getErrors()
                ];
                return $this->failValidationErrors($response);
            }

            // Data untuk update
            $data = [
                'kode_buku' => esc($this->request->getVar('kode_buku')),
                'judul_buku' => esc($this->request->getVar('judul_buku')),
                'pengarang' => esc($this->request->getVar('pengarang')),
                'target_terbit' => esc($this->request->getVar('target_terbit')),
                'warna' => esc($this->request->getVar('warna')),
            ];

            // Update data buku berdasarkan id_buku
            if ($this->model->update($id_buku, $data)) {
                // Response berhasil
                $response = [
                    'pesan' => 'Data Buku Berhasil diperbarui'
                ];
                return $this->respondUpdated($response);
            } else {
                // Jika gagal update
                return $this->fail('Gagal memperbarui data buku');
            }
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
        $id_buku = base64_decode($id_buku);
            $buku = $this->model->find($id_buku);
            if (!$buku) {
                return $this->failNotFound('Data Buku tidak ditemukan');
            }
            $this->model->delete($id_buku);
            $response = [
                'pesan' => 'Data Buku berhasil dihapus'
            ];
            return $this->respondDeleted($response,200);
    }
    public function data_buku()
    {
        $data = [
            'judul' => 'List Buku',
        ];
        return view($this->folder_directory . 'data_buku', $data);
    }
}
