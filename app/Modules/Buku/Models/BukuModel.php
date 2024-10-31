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
            'kode_buku' => [
                'rules' => 'required|min_length[3]|is_unique[tbl_buku.kode_buku]',
                'errors' => [
                    'required' => 'Kode buku harus diisi',
                    'min_length' => 'Kode buku minimal 3 karakter',
                    'is_unique' => 'Kode Buku sudah terdaftar'
                ],
            ],
            'judul_buku' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul buku harus diisi',
                ],
            ],
            'pengarang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pengarang harus diisi',
                ],
            ],
            'target_terbit' => [
                'rules' => 'required|valid_date[Y,4]',
                'errors' => [
                    'required' => 'Target terbit harus diisi',
                    'valid_date' => 'Target terbit harus YYYY.',
                ],
            ],
            'warna' => [
                'rules' => 'required',
                'errors' => [
                    'required'  => 'Warna wajib dipilih',
                ],
            ],
        ];
    }
    public function validationRulesUpdate()
    {
        return [
            'kode_buku' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Kode buku harus diisi',
                    'min_length' => 'Kode buku minimal 3 karakter'
                ],
            ],
            'judul_buku' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul buku harus diisi',
                ],
            ],
            'pengarang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pengarang harus diisi',
                ],
            ],
            'target_terbit' => [
                'rules' => 'required|valid_date[Y,4]',
                'errors' => [
                    'required' => 'Target terbit harus diisi',
                    'valid_date' => 'Target terbit harus YYYY.',
                ],
            ],
            'warna' => [
                'rules' => 'required',
                'errors' => [
                    'required'  => 'Warna wajib dipilih',
                ],
            ],
        ];
    }

    // (Opsional) Hash password sebelum disimpan
    public function getBuku()
    {
        return $this->findAll();
    }
}
