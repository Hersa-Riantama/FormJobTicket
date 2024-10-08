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
            return view($this->folder_directory . 'data_buku',$Vdata);
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
            // Ambil rules validasi dari model
            $rules = $this->model->validationRules();
            
            // Validasi input
            if (!$this->validate($rules)) {
                $response = [
                    'pesan' => $this->validator->getErrors()
                ];
                return $this->failValidationErrors($response);
            }
            $Data = $this->model->find($id_buku);
            if (!$Data) {
                $response = [
                    'Pesan' => 'Data Pegawai dengan ID tersebut tidak ditemukan'
                ];
                return $this->failNotFound('Data Pegawai dengan ID tersebut tidak ditemukan');
            }
            $this->model->update($id_buku, [
                'kode_buku' => esc($this->request->getVar('kode_buku')),
                'judul_buku' => esc($this->request->getVar('judul_buku')),
                'pengarang' => esc($this->request->getVar('pengarang')),
                'target_terbit' => esc($this->request->getVar('target_terbit')),
                'warna' => esc($this->request->getVar('target_terbit')),
            ]);

            $response = [
                'Pesan' => 'Data Pegawai Berhasil dirubah'
            ];
            return $this->respond($response);
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
