<?php

namespace Modules\Form\Controllers;

use App\Controllers\BaseController;

class Form extends BaseController
{
    protected $folder_directory = "Modules\\Form\\Views\\";

    public function index()
    {
        return view($this->folder_directory . 'index');
    }
    public function createForm()
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
            $tgl_order = date('y-m-d', strtotime($this->request->getVar('tgl_order')));
            $this->model->insert([
                'kode_form' => esc($this->request->getVar('kode_form')),
                'id_kategori' => esc($this->request->getVar('id_kategori')),
                'tgl_order' => esc($tgl_order),
                'id_user' => esc($this->request->getVar('id_user')),
                'nomor_job' => esc($this->request->getVar('nomor_job')),
                'id_buku' => esc($this->request->getVar('id_buku')),
            ]);
            $id_tiket = $this->model->getInsertID();
            $kelengkapanModel = new \Modules\Kelengkapan\Models\Kelengkapan();
            $kelengkapan = $this->request->getVar('kelengkapan');
            if (is_array($kelengkapan) && count($kelengkapan)> 0) {
                foreach ($kelengkapan as $nama_kelengkapan){
                    $kelengkapanModel->insert([
                        'id_tiket' => $id_tiket,
                        'nama_kelengkapan' => esc($nama_kelengkapan),
                    ]);
                }
            }
            $statusKelengkapanModel = new \Modules\Status_Kelengkapan\Models\Status_Kelengkapan();
            $tahap_kelengkapan = esc($this->request->getVar('tahap_kelengkapan'));
            $status_kelengkapan = esc($this->request->getVar('status_kelengkapan'));
            if (!empty($tahap_kelengkapan) && !empty($status_kelengkapan)) {
                $statusKelengkapanModel->insert([
                    'id_tiket' => $id_tiket,
                    'tahap_kelengkapan' => !empty($tahap_kelengkapan)? $tahap_kelengkapan : 'N',
                    'status_kelengkapan' => !empty($status_kelengkapan)? $status_kelengkapan : 'N',
                ]);
            }else {
                $statusKelengkapanModel->insert([
                    'id_tiket'           => $id_tiket, 
                    'tahap_kelengkapan'   => 'N',
                    'status_kelengkapan'  => 'N'
                ]);
            }
            $response = [
                'Pesan' => 'Tiket Berhasil ditambahkan'
            ];
            return $this->respondCreated($response);
    }
    public function form()
    {
        $data = [
            'judul' => 'Form Job Ticket',
        ];
        return view($this->folder_directory . 'form', $data);
    }
    public function data_form()
    {
        $data = [
            'judul' => 'List Form',
        ];
        return view($this->folder_directory . 'data_form', $data);
    }
}
