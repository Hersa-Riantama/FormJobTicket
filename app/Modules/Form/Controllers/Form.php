<?php

namespace Modules\Form\Controllers;

use App\Controllers\BaseController;
use App\Modules\Buku\Models\BukuModel;
use CodeIgniter\API\ResponseTrait;
use Modules\Auth\Controllers\Auth;
use Modules\Auth\Models\AuthModel;
use Modules\Form\Models\FormModel;
use Modules\Grup\Models\GrupModel;
use Modules\Kategori\Models\KategoriModel;
use Modules\User\Models\UserModel;

class Form extends BaseController
{
    use ResponseTrait;
    protected $model;
    protected $AuthModel;
    protected $UserModel;
    protected $folder_directory = "Modules\\Form\\Views\\";

    public function __construct()
    {
        $this->model = new FormModel(); // Inisialisasi model
        $this->AuthModel = new AuthModel();
        $this->UserModel = new UserModel();
        $this->session = session();
    }

    public function index() {}

    public function getBukuOptions()
    {
        $bukuModel = new BukuModel();
        $data = $bukuModel->findAll(); // Fetch all buku data
        return $this->response->setJSON($data);
    }

    public function getBukuDetails($kode_buku)
    {
        $bukuModel = new BukuModel();
        $data = $bukuModel->where('kode_buku', $kode_buku)->first();
        return $this->response->setJSON($data);
    }

    public function createForm()
    {
        $rules = $this->model->validationRules();
        if (!$this->validate($rules)) {
            $response = [
                'pesan' => $this->validator->getErrors()
            ];
            return $this->response->setJSON($response);
        }
        $kode_buku = esc($this->request->getVar('id_buku'));
        $bukuModel = new BukuModel();
        $AuthModel = new AuthModel();
        $UserModel = new UserModel();
        $GrupModel = new GrupModel();
        $buku = $bukuModel->where('kode_buku', $kode_buku)->first();
        if (!$buku) {
            return $this->response->setJSON(['pesan' => 'Buku tidak ditemukan']);
        }
        $id_buku = $buku['id_buku'];

        $id_user = session()->get('id_user');
        $userData = $AuthModel->find($id_user);

        if ($userData['level_user'] == 'Editor') {
            $editorId = $GrupModel->where('id_editor', $id_user)->first();
            $id_editor = $editorId['id_editor'];
            $id_koord = $editorId['id_koord'];
            $id_multimedia = 0;
        } else if ($userData['level_user'] == 'Tim Multimedia') {
            $id_editor = 0;
            $id_koord = 0;
            $id_multimedia = session()->get('id_user');
        }

        $id_kategori_array = $this->request->getVar('id_kategori');
        // Hapus duplikasi dari array id_kategori
        $id_kategori_unique = array_unique($id_kategori_array);

        // Konversi array unik menjadi JSON
        $id_kategori_json = json_encode($id_kategori_unique);
        if (json_last_error() === JSON_ERROR_NONE) {
            // JSON valid, lanjutkan insert ke database
            $this->model->insert([
                'id_kategori' => $id_kategori_json,
                'id_buku' => esc($id_buku),
                'jml_qrcode' => esc($this->request->getVar('jml_qrcode')),
                'id_user' => $id_user,
                'nomor_job' => esc($this->request->getVar('nomor_job')),
                'id_editor' => $id_editor,
                'id_koord' => $id_koord,
                'id_multimedia' => $id_multimedia,
            ]);
        } else {
            // JSON tidak valid, tangani kesalahan
            echo 'Invalid JSON format';
        }

        $id_tiket = $this->model->getInsertID();

        // Insert kelengkapan into tbl_kelengkapan
        $kelengkapanModel = new \Modules\Kelengkapan\Models\KelengkapanModel();
        $kelengkapans = $this->request->getVar('kelengkapan');
        if (is_array($kelengkapans) && count($kelengkapans) > 0) {
            foreach ($kelengkapans as $kelengkapan) {
                if (!empty($kelengkapan)) {
                    // Periksa apakah data sudah ada di database
                    $existing = $kelengkapanModel->where([
                        'id_tiket' => $id_tiket,
                        'nama_kelengkapan' => esc($kelengkapan)
                    ])->first();

                    if (!$existing) {
                        $kelengkapanModel->insert([
                            'id_tiket' => $id_tiket,
                            'nama_kelengkapan' => esc($kelengkapan)
                        ]);
                    }
                }
            }
        }

        // Insert status kelengkapan into tbl_status_kelengkapan
        $statusKelengkapanModel = new \Modules\Status_Kelengkapan\Models\StatusKelengkapanModel();
        $tahap_kelengkapan_array = $this->request->getVar('tahap_kelengkapan'); // Match the form name

        // Ensure tahap_kelengkapan is correctly inserted
        if (!empty($tahap_kelengkapan_array) && is_array($tahap_kelengkapan_array)) {
            foreach ($tahap_kelengkapan_array as $tahap_kelengkapan) {
                // Cek jika data sudah ada
                $existing = $statusKelengkapanModel->where([
                    'id_tiket' => $id_tiket,
                    'tahap_kelengkapan' => esc($tahap_kelengkapan)
                ])->first();

                if (!$existing) {
                    $statusKelengkapanModel->insert([
                        'id_tiket' => $id_tiket,
                        'tahap_kelengkapan' => esc($tahap_kelengkapan),
                        'status_kelengkapan' => 'Y'
                    ]);
                }
            }
        } else {
            // Insert default values if no status_kelengkapan is provided
            $statusKelengkapanModel->insert([
                'id_tiket' => $id_tiket,
                'tahap_kelengkapan' => 'N', // Default to 'N' if no checkbox is selected
                'status_kelengkapan' => 'N'
            ]);
        }
        $response = [
            'Pesan' => 'Tiket Berhasil ditambahkan'
        ];
        return $this->response->setJSON($response);
    }
    // $authHeader = $this->request->getHeader('Authorization');
    // if ($authHeader && $authHeader->getValue() === $this->value) {
    // }else {
    //     return $this->failUnauthorized('Anda Tidak Memiliki Kunci Akses');
    // }
    public function getKategori()
    {
        $kategoriModel = new KategoriModel();  // Pastikan KategoriModel sudah di-load
        $kategori = $kategoriModel->getKategori();

        if ($kategori) {
            return $this->response->setJSON($kategori);  // Mengembalikan JSON
        } else {
            return $this->response->setJSON(['error' => 'No categories found'], 404);  // Error handling
        }
    }

    public function form()
    {
        $AuthModel = new AuthModel();
        $GrupModel = new GrupModel();
        $UserModel = new UserModel();
        // Ambil data user berdasarkan ID dari sesi
        $userId = session()->get('id_user');

        if (!empty($userId)) {
            // Ambil data user dari database berdasarkan id_user
            $userData = $AuthModel->find($userId);
            if ($userData && isset($userData['level_user'])) {
                $allowUser = ['Admin Sistem', 'Tim Multimedia', 'Editor', 'Koord Editor', 'Manager Platform'];
                if (!in_array($userData['level_user'], $allowUser)) {
                    echo '<script>alert("Access Denied!!"); history.back();</script>';
                    return;
                }
            } else {
                echo '<script>alert("Level user tidak ditemukan."); history.back();</script>';
                return;
            }
        } else {
            echo '<script>alert("User not found or session invalid."); history.back();</script>';
            return;
        }
        if ($userData['level_user'] == 'Editor') {
            $editorId = $GrupModel->where('id_editor', $userId)->first();
            $koordId = $editorId['id_koord'];
            $editor = $UserModel->find($userId);
            $koord = $UserModel->find($koordId);
            $namaEditor = $editor['nama'];
            $namaKoord = $koord['nama'];
            $namaMultimedia = '';
        } else if ($userData['level_user'] == 'Koord Editor') {
            // $koordId = $GrupModel->where('id_koord', $userId)->first();
            // $editorId = $koordId['id_editor'];
            $koord = $UserModel->find($userId);
            // $editor = $UserModel->find($editorId);
            $namaKoord = $koord['nama'];
            $namaEditor = '';
            $namaMultimedia = '';
        } else if ($userData['level_user'] == 'Tim Multimedia') {
            $namaKoord = '';
            $namaEditor = '';
            $namaMultimedia = $userData['nama'];
        } else {
            $namaKoord = '';
            $namaEditor = '';
            $namaMultimedia = '';
        }
        $data = [
            'judul' => 'Form QR Code',
            'userData' => $userData,
            'namaKoord' => $namaKoord,
            'namaEditor' => $namaEditor,
            'namaMultimedia' => $namaMultimedia,
        ];
        return view($this->folder_directory . 'form', $data);
    }

    public function data_form()
    {
        $model = new FormModel();
        $AuthModel = new AuthModel();
        $KategoriModel = new KategoriModel();
        $BukuModel = new BukuModel();
        $UserModel = new UserModel();

        $userId = session()->get('id_user');
        if (!empty($userId)) {
            $userData = $AuthModel->find($userId);
            if ($userData && isset($userData['level_user'])) {
                $allowUser = ['Admin Sistem', 'Tim Multimedia', 'Editor', 'Koord Editor', 'Manager Platform'];
                if (!in_array($userData['level_user'], $allowUser)) {
                    echo '<script>alert("Access Denied!!"); history.back();</script>';
                    return;
                }
            } else {
                echo '<script>alert("Level user tidak ditemukan."); history.back();</script>';
                return;
            }
        } else {
            echo '<script>alert("User not found or session invalid."); history.back();</script>';
            return;
        }

        // Ambil data tiket, kategori, buku, dan user dari database
        $data = $model->getTiket();
        $kategoriData = $KategoriModel->findAll();
        $bukuData = $BukuModel->findAll();
        $userDataList = $UserModel->findAll();

        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'tiket' => $data,
                'kategori' => $kategoriData,
                'buku' => $bukuData,
                'user' => $userDataList
            ]);
        }

        $Tdata = [
            'tiket' => $data,
            'judul' => 'Kelola Tiket',
            'userData' => $userData,
        ];

        return view($this->folder_directory . 'data_form', $Tdata);
    }

    public function listTiket()
    {
        $tiketModel = new FormModel();
        $tiket = $tiketModel->getTiketWithDetails();

        // Debug output
        return $this->response->setJSON($tiket);
    }
    public function detailForm($id_tiket = null)
    {
        $AuthModel = new AuthModel();
        $tiketModel = new FormModel();
        $userId = session()->get('id_user');
        $userData = $AuthModel->find($userId);
        $tiket = $tiketModel->find($id_tiket);
        if (!$tiket) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Tiket not found");
        }
        $data = [
            'tiket' => $tiket,
            'judul' => 'Detail Tiket',
            'userData' => $userData,
        ];
        return view($this->folder_directory . 'detailForm', $data);
    }
    public function delete($id_tiket = null)
    {
        $tiket = $this->model->find($id_tiket);
        if (!$tiket) {
            return $this->failNotFound('Data kategori tidak ditemukan');
        }
        $this->model->delete($id_tiket);
        $response = [
            'pesan' => 'Data Kategori Berhasil di Hapus'
        ];
        return $this->respondDeleted($response, 200);
    }

    // data_form() Lama
    // public function data_form()
    // {
    //     $model = new FormModel();
    //     $AuthModel = new AuthModel();
    //     // Ambil data user berdasarkan ID dari sesi
    //     $userId = session()->get('id_user');
    //     if (!empty($userId)) {
    //         // Ambil data user dari database berdasarkan id_user
    //         $userData = $AuthModel->find($userId);
    //         if ($userData && isset($userData['level_user'])) {
    //             $allowUser = ['Admin Sistem', 'Admin Multimedia', 'Editor', 'Koord Editor', 'Manager Platform'];
    //             if (!in_array($userData['level_user'], $allowUser)) {
    //                 return $this->response->setJSON([
    //                     'error' => 'Access Denied'
    //                 ], 403);
    //             }
    //         } else {
    //             return $this->response->setJSON([
    //                 'error' => 'Level user tidak ditemukan.'
    //             ], 400);
    //         }
    //     } else {
    //         return $this->response->setJSON([
    //             'error' => 'User not found or session invalid.'
    //         ], 400);
    //     }
    //     $data = $model->getTiket();
    //     if ($this->request->isAJAX()) {
    //         return $this->response->setJSON(['tiket' => $data]);
    //     }
    //     $Tdata = [
    //         'tiket' => $data,
    //         'judul' => 'Kelola Tiket',
    //         'userData' => $userData,
    //     ];
    //     return view($this->folder_directory . 'data_form', $Tdata);
    // }
}
