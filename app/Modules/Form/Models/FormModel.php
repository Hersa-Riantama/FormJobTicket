<?php

namespace Modules\Form\Models;

use CodeIgniter\Model;

class FormModel extends Model
{
    protected $table = 'tbl_tiket';
    protected $primaryKey = 'id_tiket';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'kode_form',
        'id_kategori',
        'tgl_selesai',
        'id_user',
        'nomor_job',
        'id_buku',
        'jml_qrcode',
        'id_editor',
        'id_koord',
        'id_multimedia',
        'id_admin',
        'approved_multimedia',
        'approved_order_koord',
        'approved_order_admin',
        'approved_acc_koord',
        'approved_acc_manager',
        'tgl_selesai',
        'tgl_upload',
        'tgl_order_editor',
        'tgl_order_koord',
        'tgl_acc_multimedia',
        'tgl_acc_koord',
        'tgl_acc_manager',
        'tgl_acc_admin',
        'catatan'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Fungsi untuk validasi data sebelum insert
    public function validationRules()
    {
        return [
            'id_kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori Wajib pilih salah satu!'
                ],
            ],
            'id_user' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'User Wajib pilih'
                ],
            ],
            'nomor_job' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor Job Wajib diisi',
                ],
            ],
            'id_buku' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Buku Wajib pilih salah satu',
                ],
            ],
            'jml_qrcode' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah QRCode wajib diisi',
                    'numeric' => 'Jumlah QRCode harus berupa angka',
                ],
            ],
            'tgl_selesai' => [
                'rules' => 'permit_empty|valid_date',
                'errors' => [
                    'valid_date' => 'Tanggal Selesai harus berupa tanggal valid',
                ],
            ],
            'tgl_upload' => [
                'rules' => 'permit_empty|valid_date',
                'errors' => [
                    'valid_date' => 'Tanggal upload harus berupa tanggal valid',
                ],
            ],
            'kelengkapan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kelengkapan Wajib dipilih salah satu!',
                ],
            ],
        ];
    }

    // (Opsional) Hash password sebelum disimpan
    public function getTiket()
    {
        return $this->findAll();
    }

    public function getTiketWithDetails()
    {
        return $this->select('tbl_tiket.*, tbl_kategori.nama_kategori, tbl_buku.judul_buku')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_tiket.id_kategori', 'left')
            ->join('tbl_buku', 'tbl_buku.id_buku = tbl_tiket.id_buku', 'left')
            ->findAll();
    }
}
