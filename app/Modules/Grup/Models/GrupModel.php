<?php

namespace Modules\Grup\Models;

use CodeIgniter\Model;

class GrupModel extends Model
{
    protected $table            = 'tbl_grup';
    protected $primaryKey       = 'id_grup';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id_koord', 'id_editor'];

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
            'id_koord' => 'required',
            'id_editor' => 'required',
        ];
    }

    // (Opsional) Hash password sebelum disimpan
    public function getGrup()
    {
        return $this->findAll();
    }
}
