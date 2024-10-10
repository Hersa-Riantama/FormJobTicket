<?php

namespace Modules\Kategori\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table            = 'tbl_kategori';
    protected $primaryKey       = 'id_kategori';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['nama_kategori'];

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
            'nama_kategori' => 'required|min_length[3]',
        ];
    }

    // (Opsional) Hash password sebelum disimpan
    public function getKategori()
    {
        return $this->findAll();
    }
}