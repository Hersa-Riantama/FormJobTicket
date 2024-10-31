<?php

namespace Modules\Auth\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table            = 'tbl_user';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['nama', 'nomor_induk', 'email', 'no_tlp', 'jk', 'password', 'avatar', 'verifikasi', 'status_user', 'level_user'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    public function validationRules()
    {
        return [
            'nama' => [
                'rules' => 'required|min_length[3]|alpha_space',
                'errors' => [
                    'required' => 'Nama harus diisi.',
                    'min_length' => 'Nama minimal terdiri dari 3 huruf.',
                    'alpha_space' => 'Nama hanya boleh mengandung huruf dan spasi.',
                ],
            ],
            'nomor_induk' => [
                'rules' => 'required|alpha_numeric|is_unique[tbl_user.nomor_induk]',
                'errors' => [
                    'required' => 'Nomor induk harus diisi.',
                    'alpha_numeric' => 'Nomor induk hanya boleh terdiri dari huruf dan angka.',
                    'is_unique' => 'Nomor induk sudah terdaftar.',
                ],
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[tbl_user.email]',
                'errors' => [
                    'required' => 'Email harus diisi.',
                    'valid_email' => 'Email tidak valid.',
                    'is_unique' => 'Email sudah terdaftar.',
                ],
            ],
            'no_tlp' => [
                'rules' => 'required|regex_match[/^0[0-9]+$/]|min_length[10]|max_length[13]',
                'errors' => [
                    'required' => 'Nomor telepon harus diisi.',
                    'regex_match' => 'Nomor telepon tidak valid.',
                    'min_length' => 'Nomor telepon minimal 10 digit.',
                    'max_length' => 'Nomor telepon maksimal 13 digit.',
                ],
            ],
            'jk' => [
                'rules' => 'required|in_list[Laki-Laki,Perempuan]',
                'errors' => [
                    'required' => 'Jenis kelamin harus dipilih.',
                    'in_list' => 'Jenis kelamin tidak valid.',
                ],
            ],
            'level_user' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level User harus dipilih.',
                ],
            ],
            'password' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Password harus diisi.',
                    'min_length' => 'Password minimal terdiri dari 6 karakter.',
                ],
            ],
        ];
    }

    public function validationRules1()
    {
        return [
            'nama' => 'required|min_length[3]|alpha_space',
            'nomor_induk' => 'required|alpha_numeric|is_unique[tbl_user.nomor_induk]',
            'email' => 'required|valid_email|is_unique[tbl_user.email]',
            'no_tlp' => 'required|numeric',
            'jk' => 'required|in_list[Laki-Laki,Perempuan]',
            'password' => 'required|min_length[6]',
            'level_user' => 'required',
        ];
    }
    public function getPegawai()
    {
        return $this->findAll();
    }
}
