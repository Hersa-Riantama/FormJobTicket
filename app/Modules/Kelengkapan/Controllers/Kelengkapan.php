<?php

namespace Modules\Kelengkapan\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class Kelengkapan extends BaseController
{
    use ResponseTrait;
    protected $folder_directory = "Modules\\Kelengkapan\\Views\\";
    protected $model;

    public function index()
    {
        return view($this->folder_directory . 'index');
    }
    public function create()
    {
        // $authHeader = $this->request->getHeader('Authorization');
        // if ($authHeader && $authHeader->getValue() === $this->value) {
        // }else {
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
            'id_tiket' => esc($this->request->getVar('id_tiket')),
            'nama_kelengkapan' => esc($this->request->getVar('nama_kelengkapan')),
        ]);
        $response = [
            'Pesan' => 'Tiket Berhasil ditambahkan'
        ];
        return $this->respondCreated($response);
    }
    public function update($id_tiket = null, $id_kelengkapan = null)
    {
        // $authHeader = $this->request->getHeader('Authorization');
        // if ($authHeader && $authHeader->getValue() === $this->value) {
        // }else {
        //     return $this->failUnauthorized('Anda Tidak Memiliki Kunci Akses');
        // }
        $id_kelengkapan = base64_decode($id_kelengkapan);
        $rules = $this->model->validationRules();
        if (!$this->validate($rules)) {
            $response = [
                'pesan' => $this->validator->getErrors()
            ];
            return $this->failValidationErrors($response);
        }
        $data = [
            'nama_kelengkapan' => esc($this->request->getVar('nama_kelengkapan'))
        ];
        if ($this->model->update($id_kelengkapan, $data)) {
            $response = [
                'pesan' => 'Data Kelengkapan berhasil diperbarui'
            ];
            return $this->respondUpdated($response);
        } else {
            return $this->fail('Gagal memperbarui data kelengkapan');
        }
    }
    public function delete($id_kelengkapan = null)
    {
        // $authHeader = $this->request->getHeader('Authorization');
        // // Mengecek apakah Authorization header valid
        // if ($authHeader && $authHeader->getValue() === $this->value) {
        // } else {
        //     // Jika Authorization header tidak valid
        //     return $this->failUnauthorized('Anda Tidak Memiliki Kunci Akses');
        // }
        $id_kelengkapan = base64_decode($id_kelengkapan);
        $kelengkapan = $this->model->find($id_kelengkapan);
        if (!$kelengkapan) {
            return $this->failNotFound('Data Kelengkapan tidak ditemukan');
        }
        $this->model->delete($id_kelengkapan);
        $response = [
            'pesan' => 'Data Kelengkapan berhasil di hapus'
        ];
        return $this->respondDeleted($response);
    }
}
