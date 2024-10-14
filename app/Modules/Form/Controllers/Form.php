<?php

namespace Modules\Form\Controllers;

use App\Controllers\BaseController;
use App\Modules\Buku\Models\BukuModel;
use Modules\Auth\Models\AuthModel;
use Modules\Form\Models\FormModel;
use Modules\Kategori\Models\KategoriModel;

class Form extends BaseController
{
    protected $model;
    protected $AuthModel;
    protected $folder_directory = "Modules\\Form\\Views\\";

    public function __construct()
    {
        $this->model = new FormModel(); // Inisialisasi model
        $this->AuthModel = new AuthModel();
        $this->session = session();
    }

    public function index() {}

    public function getBukuOptions()
    {
        $bukuModel = new BukuModel();
        $data = $bukuModel->findAll(); // Fetch all buku data
        return $this->response->setJSON($data);
    }

    public function getBukuDetails($kode_buku)
    {
        $bukuModel = new BukuModel();
        $data = $bukuModel->where('kode_buku', $kode_buku)->first();
        return $this->response->setJSON($data);
    }

    public function createForm()
    {
        $rules = $this->model->validationRules();
        if (!$this->validate($rules)) {
            $response = [
                'pesan' => $this->validator->getErrors()
            ];
            return $this->response->setJSON($response);
        }
        $kode_buku = esc($this->request->getVar('id_buku'));
        $bukuModel = new BukuModel();
        $buku = $bukuModel->where('kode_buku', $kode_buku)->first();
        if (!$buku) {
            return $this->response->setJSON(['pesan' => 'Buku tidak ditemukan']);
        }
        $id_buku = $buku['id_buku'];

        // Get selected id_kategori from checkboxes
        $id_kategoris = $this->request->getVar('id_kategori'); // This should be an array
        // Check if id_kategori is provided
        if (empty($id_kategoris) || !is_array($id_kategoris)) {
            return $this->response->setJSON(['pesan' => 'id_kategori is required']);
        }
        // Loop through the selected id_kategori and insert them into tbl_tiket
        foreach ($id_kategoris as $id_kategori) {
            // Make sure id_kategori is a number or valid value
            if (!is_numeric($id_kategori)) {
                return $this->response->setJSON(['pesan' => 'Invalid id_kategori value' . $id_kategori]);
            }
        }
        // Get selected kelengkapan from checkboxes
        $kelengkapans = $this->request->getVar('kelengkapan'); // This should be an array
        if (empty($kelengkapans) || !is_array($kelengkapans)) {
            return $this->response->setJSON(['pesan' => 'kelengkapan is required']);
        }

        // Get selected status_kelengkapan from checkboxes
        $status_kelengkapan_array = $this->request->getVar('status_kelengkapan'); // Array of status_kelengkapan
        // $tgl_order = date('y-m-d', strtotime($this->request->getVar('tgl_selesai')));
        $this->model->insert([
            'id_kategori' => esc($id_kategori),
            'id_buku' => esc($id_buku),
            'jml_qrcode' => esc($this->request->getVar('jml_qrcode')),
            'id_user' => esc($this->request->getVar('id_user')),
            'nomor_job' => esc($this->request->getVar('nomor_job')),

        ]);
        $id_tiket = $this->model->getInsertID();
        // Insert into tbl_kelengkapan (without status_kelengkapan)
        $kelengkapanModel = new \Modules\Kelengkapan\Models\KelengkapanModel();
        if (is_array($kelengkapans) && count($kelengkapans) > 0) {
            foreach ($kelengkapans as $kelengkapan) {
                $kelengkapanModel->insert([
                    'id_tiket' => $id_tiket,
                    'nama_kelengkapan' => esc($kelengkapan), // Only insert kelengkapan name
                ]);
            }
        }

        // Insert into tbl_status_kelengkapan (if status is provided)
        $statusKelengkapanModel = new \Modules\Status_Kelengkapan\Models\StatusKelengkapanModel();
        $tahap_kelengkapan = esc($this->request->getVar('tahap_kelengkapan'));

        // Insert tahap_kelengkapan and status_kelengkapan if available
        if (!empty($tahap_kelengkapan) || !empty($status_kelengkapan_array)) {
            foreach ($status_kelengkapan_array as $index => $status_kelengkapan) {
                // Insert into tbl_status_kelengkapan
                $statusKelengkapanModel->insert([
                    'id_tiket' => $id_tiket,
                    'tahap_kelengkapan' => !empty($tahap_kelengkapan) ? $tahap_kelengkapan : 'N',
                    'status_kelengkapan' => !empty($status_kelengkapan) ? esc($status_kelengkapan) : 'N',
                ]);
            }
        } else {
            // If no tahap_kelengkapan or status_kelengkapan provided, insert default values
            $statusKelengkapanModel->insert([
                'id_tiket'           => $id_tiket,
                'tahap_kelengkapan'  => 'N', // Default tahap to 'N'
                'status_kelengkapan' => 'N'  // Default status to 'N'
            ]);
        }
        $response = [
            'Pesan' => 'Tiket Berhasil ditambahkan'
        ];
        return $this->response->setJSON($response);
    }
    // $authHeader = $this->request->getHeader('Authorization');
    // if ($authHeader && $authHeader->getValue() === $this->value) {
    // }else {
    //     return $this->failUnauthorized('Anda Tidak Memiliki Kunci Akses');
    // }
    public function getKategori()
    {
        $kategoriModel = new KategoriModel();  // Pastikan KategoriModel sudah di-load
        $kategori = $kategoriModel->getKategori();

        if ($kategori) {
            return $this->response->setJSON($kategori);  // Mengembalikan JSON
        } else {
            return $this->response->setJSON(['error' => 'No categories found'], 404);  // Error handling
        }
    }

    public function form()
    {
        $AuthModel = new AuthModel();
        // Ambil data user berdasarkan ID dari sesi
        $userId = session()->get('id_user');
        $userData = $AuthModel->find($userId);
        $data = [
            'judul' => 'Form QR Code',
            'userData' => $userData,
        ];
        return view($this->folder_directory . 'form', $data);
    }
    public function data_form()
    {
        $model = new FormModel();
        $AuthModel = new AuthModel();
        // Ambil data user berdasarkan ID dari sesi
        $userId = session()->get('id_user');
        $userData = $AuthModel->find($userId);
        $data = $model->getTiket();
        if ($this->request->isAJAX()) {
            return $this->response->setJSON(['tiket' => $data]);
        }
        $Tdata = [
            'tiket' => $data,
            'judul' => 'Kelola Tiket',
            'userData' => $userData,
        ];
        return view($this->folder_directory . 'data_form', $Tdata);
    }
    public function listTiket()
    {
        $tiketModel = new FormModel();
        $tiket = $tiketModel->getTiketWithDetails();

        // Debug output
        return $this->response->setJSON($tiket);
    }
}
