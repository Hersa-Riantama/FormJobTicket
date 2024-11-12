<?php

namespace Modules\Status_Kelengkapan\Models;

use CodeIgniter\Model;

class StatusKelengkapanModel extends Model
{
    protected $table            = 'tbl_status_kelengkapan';
    protected $primaryKey       = 'id_status_kelengkapan';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id_tiket', 'tahap_kelengkapan', 'status_kelengkapan'];

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
            'tahap_kelengkapan' =>  'required',
            'status_kelengkapan' =>  'required',
        ];
    }

    // (Opsional) Hash password sebelum disimpan
    public function getStatKelengkapan()
    {
        return $this->findAll();
    }
}
