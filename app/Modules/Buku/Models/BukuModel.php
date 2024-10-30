<?php

namespace App\Modules\Buku\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table            = 'tbl_buku';
    protected $primaryKey       = 'id_buku';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['kode_buku', 'judul_buku', 'pengarang', 'target_terbit', 'warna'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Fungsi untuk validasi data sebelum insert
    public function validationRules()
    {
        return [
            'kode_buku' => 'required|min_length[3]|is_unique[tbl_buku.kode_buku]',
            'judul_buku' => 'required',
            'pengarang' => 'required',
            'target_terbit' => 'required',
            'warna' => 'required',
        ];
    }
    public function validationRulesUpdate()
    {
        return [
            'kode_buku' => 'required|min_length[3]',
            'judul_buku' => 'required',
            'pengarang' => 'required',
            'target_terbit' => 'required',
            'warna' => 'required',
        ];
    }

    // (Opsional) Hash password sebelum disimpan
    public function getBuku()
    {
        return $this->findAll();
    }
}
