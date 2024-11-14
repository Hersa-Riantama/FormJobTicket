<?php

namespace Modules\FormC2\Models;

use CodeIgniter\Model;

class FormC2Model extends Model
{
    protected $table = 'tbl_tiket_c2';
    protected $primaryKey = 'id_tiket_c2';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_buku',
        'id_tiket',
        'no',
        'no_halaman',
        'no_konten',
        'no_hal_rev',
        'ekstensi_konten'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Fungsi untuk validasi data sebelum insert
    // public function validationRules()
    // {
    //     return [
    //         'no' => [
    //             'rules' => 'permit_empty',
    //             'errors' => [

    //             ],
    //         ],
    //         'no_halaman' => [
    //             'rules' => 'required|numeric',
    //             'errors' => [
    //                 'required' => 'No Halaman Wajib diisi',
    //                 'numeric' => 'No Halaman harus berupa angka',
    //             ],
    //         ],
    //         'no_konten' => [
    //             'rules' => 'required|numeric',
    //             'errors' => [
    //                 'required' => 'No Konten wajib diisi',
    //                 'numeric' => 'No Konten harus berupa angka',
    //             ],
    //         ],
    //         'no_hal_rev' => [
    //             'rules' => 'permit_empty',
    //             'errors' => [

    //             ],
    //         ],
    //         'ekstensi_konten' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'valid_date' => 'Ekstensi Konten Wajib dipilih salah satu!',
    //             ],
    //         ],
    //     ];
    // }
}
