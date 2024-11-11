<?php

namespace Modules\Kelengkapan\Models;

use CodeIgniter\Model;

class KelengkapanModel extends Model
{
    protected $table            = 'tbl_kelengkapan';
    protected $primaryKey       = 'id_kelengkapan';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id_tiket', 'nama_kelengkapan'];

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
            'id_tiket' => 'required|min_length[3]',
            'nama_kelengkapan' =>  'required',
        ];
    }

    // (Opsional) Hash password sebelum disimpan
    public function getKelengkapan()
    {
        return $this->findAll();
    }
}
