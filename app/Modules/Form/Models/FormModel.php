<?php

namespace Modules\Form\Models;

use CodeIgniter\Model;

class FormModel extends Model
{
    protected $table            = 'tbl_tiket';
    protected $primaryKey       = 'id_tiket';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'kode_form',
        'id_kategori',
        'tgl_selesai',
        'id_user',
        'nomor_job',
        'id_buku',
        'jml_qrcode'
    ];

    // protected bool $allowEmptyInserts = false;
    // protected bool $updateOnlyChanged = true;

    // protected array $casts = [];
    // protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Fungsi untuk validasi data sebelum insert
    public function validationRules()
    {
        return [
            'id_kategori' =>  'required',
            'id_user' =>  'required',
            'nomor_job' =>  'required',
            'id_buku' =>  'required',
            'jml_qrcode' =>  'required',
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
