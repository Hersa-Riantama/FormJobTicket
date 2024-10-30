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

    // Fungsi untuk validasi data sebelum insert
    // public function validationRules()
    // {
    //     return [
    //         'nama' => [
    //             'rules' => 'required|min_length[3]|alpha_space',
    //             'errors' => [
    //                 'required' => 'Nama Wajib Diisi',
    //                 'min_length' => 'Nama Minimal 3 Huruf',
    //                 'alpha_space' => 'Nama Hanya Huruf dan Spasi',
    //             ]
    //         ],
    //         'nomor_induk' => [
    //             'rules' => 'required|alpha_numeric|is_unique[tbl_user.nomor_induk]',
    //             'errors' => [
    //                 'required' => 'Nomor Induk Wajib Diisi',
    //                 'alpha_numeric' => 'Nomor Induk Hanya Huruf & Angka',
    //                 'is_unique' => 'Nomor Induk Sudah Terdaftar',
    //             ]
    //         ],
    //         'email' => [
    //             'rules' => 'required|valid_email|is_unique[tbl_user.email]',
    //             'errors' => [
    //                 'required' => 'Email Wajib Diisi',
    //                 'valid_email' => 'Email Tidak Valid',
    //                 'is_unique' => 'Email Sudah Terdaftar',
    //             ]
    //         ],
    //         'no_tlp' => [
    //             'rules' => 'required|numeric',
    //             'errors' => [
    //                 'required' => 'No.Telepon Wajib Diisi',
    //                 'numeric' => 'No.Telepon Bukan Angka',
    //             ]
    //         ],
    //         'jk' => [
    //             'rules' => 'required|in_list[Laki-Laki,Perempuan]',
    //             'errors' => [
    //                 'required' => 'Jenis Kelamin Wajib Diisi',
    //                 'in_list' => 'Jenis Kelamin Tidak Terdaftar',
    //             ]
    //         ],
    //         'password' => [
    //             'rules' => 'required|min_length[6]',
    //             'errors' => [
    //                 'required' => 'Password Wajib Diisi',
    //                 'min_length' => 'Password Minimal Terdiri Dari 6 Karakter',
    //             ]
    //         ],
    //         'level_user' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'Level User Wajib Diisi', // Changed from Password to Level User
    //             ]
    //         ],
    //     ];
    // }

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
    public function getPegawai()
    {
        return $this->findAll();
    }
}
