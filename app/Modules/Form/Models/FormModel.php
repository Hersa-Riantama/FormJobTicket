<?php

namespace Modules\Form\Models;

use CodeIgniter\Model;

class FormModel extends Model
{
    protected $table            = 'tbl_tiket';
    protected $primaryKey       = 'id_tiket';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['kode_form','id_kategori',
                                    'tgl_order','id_user',
                                    'nomor_job','id_buku'];

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
            'tgl_order' =>  'required',
            'id_user' =>  'required',
            'nomor_job' =>  'required',
            'id_buku' =>  'required',
        ];
    }

    // (Opsional) Hash password sebelum disimpan
    public function getTiket()
    {
        return $this->findAll();
    }
}
