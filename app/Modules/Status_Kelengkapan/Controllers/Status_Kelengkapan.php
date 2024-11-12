<?php

namespace Modules\Status_Kelengkapan\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use Modules\Status_Kelengkapan\Models\StatusKelengkapanModel;

class StatusKelengkapan extends BaseController
{
    use ResponseTrait;
    protected $folder_directory = "Modules\\Status_Kelengkapan\\Views\\";
    protected $model;

    public function index()
    {
        return view($this->folder_directory . 'index');
    }

    public function create()
    {
        $rules = $this->model->validationRules();
        if (!$this->validate($rules)) {
            $response = [
                'pesan' => $this->validator->getErrors()
            ];
            return $this->failValidationErrors($response);
        }
        $this->model->insert([
            'id_tiket' => esc($this->request->getVar('id_tiket')),
            'tahap_kelengkapan' => esc($this->request->getVar('tahap_kelengkapan')),
            'status_kelengkapan' => esc($this->request->getVar('status_kelengkapan')),
        ]);
        $response = [
            'pesan' => 'Status Kelengkapan Berhasil ditambahkan'
        ];
        return  $this->respondCreated($response);
    }

    public function updateTahapKelengkapan($id_status_kelengkapan = null, $id_tiket = null)
    {
        $statusKelengkapanModel = new StatusKelengkapanModel();
        $Tiket = $statusKelengkapanModel->find($id_tiket);
        if (!$Tiket) {
            return $this->respond(['debug' => $id_tiket, 'error' => 'Tiket tidak ditemukan'], 404);
        }
        $tahap_kelengkapan = esc($this->request->getVar('tahap_kelengkapan'));
        $status_kelengkapan = esc($this->request->getVar('status_kelengkapan'));
        if (!empty($tahap_kelengkapan)) {
            $statusKelengkapanModel->where('id_status_kelengkapan', $id_status_kelengkapan)->set([
                'tahap_kelengkapan' => $tahap_kelengkapan,
                'status_kelengkapan' => !empty($status_kelengkapan) ? $status_kelengkapan : 'N',
            ])->update();
            $response = [
                'pesan' => 'Tahap Kelengkapan berhasil diperbarui untuk id_tiket:' . $id_status_kelengkapan,
            ];
            return $this->respond($response);
        } else {
            return $this->failValidationErrors('Tahap kelengkapan harus diisi.');
        }
    }
    public function delete($id_status_kelengkapan = null)
    {
        $id_status_kelengkapan = base64_decode($id_status_kelengkapan);
        $statKelengkapan = $this->model->find($id_status_kelengkapan);
        if (!$statKelengkapan) {
            return $this->failNotFound('Data Status Kelengkapan tidak ditemukan');
        }
        $this->model->delete($id_status_kelengkapan);
        $response = [
            'pesan' => 'Data Status Kelengkapan berhasil di hapus'
        ];
        return $this->respondDeleted($response);
    }
}
