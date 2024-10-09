<?php

namespace Modules\User\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'tbl_user';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['nama', 'nomor_induk', 'email','no_tlp','jk','password','avatar','verifikasi','status_user','level_user' ];

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
            'nama' => 'required|min_length[3]',
            'nomor_induk' => 'required|is_unique[tbl_user.nomor_induk]', 
            'email' => 'required|valid_email|is_unique[tbl_user.email]',
            'no_tlp' => 'required|numeric',
            'jk' => 'required|in_list[Laki-Laki,Perempuan]',
            'password' => 'required|min_length[6]',
            'level_user' => 'required',
        ];
    }

    // (Opsional) Hash password sebelum disimpan
    public function getUser()
    {
        return $this->findAll();
    }
}
