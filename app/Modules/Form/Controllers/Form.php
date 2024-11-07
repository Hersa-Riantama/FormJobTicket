<?php

namespace Modules\Form\Controllers;

use App\Controllers\BaseController;
use App\Modules\Buku\Models\BukuModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Database\MySQLi\Builder;
use Modules\Auth\Controllers\Auth;
use Modules\Auth\Models\AuthModel;
use Modules\Form\Models\FormModel;
use Modules\Grup\Models\GrupModel;
use Modules\Kategori\Models\KategoriModel;
use Modules\Kelengkapan\Models\KelengkapanModel;
use Modules\Status_Kelengkapan\Controllers\StatusKelengkapan;
use Modules\Status_Kelengkapan\Models\StatusKelengkapanModel;
use Modules\User\Models\UserModel;
use PhpParser\JsonDecoder;

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

    public function index()
    {
        $GrupModel = new GrupModel();
        $UserModel = new UserModel();
        // Ambil data user berdasarkan ID dari sesi
        $userId = session()->get('id_user');

        if (!empty($userId)) {
            // Ambil data user dari database berdasarkan id_user
            $userData = $UserModel->find($userId);
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
            return redirect()->to('/login');
        }
        // Set nilai default
        $namaKoord = $namaEditor = $namaMultimedia = $namaAdmin = '';

        // Tentukan nilai berdasarkan level user
        switch ($userData['level_user']) {
            case 'Editor':
                $editorId = $GrupModel->where('id_editor', $userId)->first();
                $koordId = $editorId['id_koord'];
                $namaEditor = $UserModel->find($userId)['nama'];
                $namaKoord = $UserModel->find($koordId)['nama'];
                break;
            case 'Koord Editor':
                $namaKoord = $userData['nama'];
                break;
            case 'Tim Multimedia':
                $namaMultimedia = $userData['nama'];
                break;
            case 'Admin Sistem':
                $namaAdmin = $userData['nama'];
                break;
        }

        // Siapkan data untuk view
        $data = [
            'judul' => 'Form QR Code',
            'userData' => $userData,
            'namaKoord' => $namaKoord,
            'namaEditor' => $namaEditor,
            'namaMultimedia' => $namaMultimedia,
            'namaAdmin' => $namaAdmin,
        ];

        return view($this->folder_directory . 'formc2', $data);
    }

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
                'Status' => 'error',
                'pesan' => $this->validator->getErrors()
            ];
            return $this->response->setJSON($response, 400);
        }
        $kode_buku = esc($this->request->getVar('id_buku'));
        $bukuModel = new BukuModel();
        $AuthModel = new AuthModel();
        $GrupModel = new GrupModel();
        $buku = $bukuModel->where('kode_buku', $kode_buku)->first();
        if (!$buku) {
            return $this->response->setJSON(['pesan' => 'Buku tidak ditemukan']);
        }
        $id_buku = $buku['id_buku'];

        $id_user = session()->get('id_user');
        $userData = $AuthModel->find($id_user);
        if ($userData['level_user'] !== 'Editor') {
            $response = [
                'Pesan' => 'Anda tidak memiliki izin untuk menambahkan tiket'
            ];
            return $this->response->setJSON($response);
        }
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
        $tgl_selesai_input = $this->request->getVar('tgl_selesai');
        $tgl_upload_input = $this->request->getVar('tgl_upload');

        $id_kategori_array = $this->request->getVar('id_kategori');
        // Hapus duplikasi dari array id_kategori
        $id_kategori_unique = array_unique($id_kategori_array);

        // Konversi array unik menjadi JSON
        $id_kategori_json = json_encode($id_kategori_unique);
        if (json_last_error() === JSON_ERROR_NONE) {
            // JSON valid, lanjutkan insert ke database
            if (!empty($tgl_selesai_input)) {
                $tgl_selesai = esc(date('Y-m-d', strtotime($tgl_selesai_input)));
            } else {
                $tgl_selesai = null; // Atau bisa juga tidak mengatur variabel ini
            }

            // Cek apakah input tgl_upload tidak kosong
            if (!empty($tgl_upload_input)) {
                $tgl_upload = esc(date('Y-m-d', strtotime($tgl_upload_input)));
            } else {
                $tgl_upload = null; // Atau bisa juga tidak mengatur variabel ini
            }
            $data = [
                'id_kategori' => $id_kategori_json,
                'id_buku' => esc($id_buku),
                'jml_qrcode' => esc($this->request->getVar('jml_qrcode')),
                'id_user' => $id_user,
                'nomor_job' => esc($this->request->getVar('nomor_job')),
                'catatan' => esc($this->request->getVar('catatan')),
                'id_editor' => $id_editor,
                'id_koord' => $id_koord,
                'id_multimedia' => $id_multimedia,
            ];

            // Hanya masukkan tgl_selesai dan tgl_upload jika tidak null
            if ($tgl_selesai !== null) {
                $data['tgl_selesai'] = $tgl_selesai;
            }
            if ($tgl_upload !== null) {
                $data['tgl_upload'] = $tgl_upload;
            }

            $this->model->insert($data);
        } else {
            // JSON tidak valid, tangani kesalahan
            echo 'Invalid JSON format';
        }

        $id_tiket = $this->model->getInsertID();

        $kelengkapanModel = new KelengkapanModel();
        $kelengkapans = $this->request->getVar('kelengkapan');

        if (is_array($kelengkapans) && count($kelengkapans) > 0) {
            // Hapus duplikat dari array
            $uniqueKelengkapans = array_unique($kelengkapans);

            // Ubah ke JSON
            $jsonKelengkapan = json_encode($uniqueKelengkapans);

            // Periksa apakah data sudah ada di database berdasarkan id_tiket
            $existing = $kelengkapanModel->where(['id_tiket' => $id_tiket])->first();

            if (!$existing) {
                // Jika belum ada, insert data baru
                $kelengkapanModel->insert([
                    'id_tiket' => $id_tiket,
                    'nama_kelengkapan' => $jsonKelengkapan
                ]);
            }
        }

        // Insert status kelengkapan into tbl_status_kelengkapan
        $statusKelengkapanModel = new StatusKelengkapanModel();
        $tahap_kelengkapan_array = $this->request->getVar('tahap_kelengkapan');

        if (is_array($tahap_kelengkapan_array) && count($tahap_kelengkapan_array) > 0) {
            // Hapus duplikat dari array
            $uniqueTahapKelengkapans = array_unique($tahap_kelengkapan_array);

            // Ubah ke JSON
            $jsonTahapKelengkapan = json_encode($uniqueTahapKelengkapans);

            // Periksa apakah data sudah ada di database berdasarkan id_tiket
            $existing = $statusKelengkapanModel->where(['id_tiket' => $id_tiket])->first();

            if (!$existing) {
                // Jika belum ada, insert data baru
                $statusKelengkapanModel->insert([
                    'id_tiket' => $id_tiket,
                    'tahap_kelengkapan' => $jsonTahapKelengkapan,
                    'status_kelengkapan' => 'Y'
                ]);
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
            'Status' => 'success',
            'Pesan' => 'Tiket Berhasil ditambahkan'
        ];
        return $this->response->setJSON($response);
    }

    public function updateForm($id_tiket = null)
    {
        $AuthModel = new AuthModel();
        $GrupModel = new GrupModel();
        $BukuModel = new BukuModel();

        $id_user = session()->get('id_user');
        $userData = $AuthModel->find($id_user);

        if ($userData['level_user'] == 'Editor') {
            $editorId = $GrupModel->where('id_editor', $id_user)->first();
            $id_editor = $editorId['id_editor'];
            $id_koord = $editorId['id_koord'];
            // $id_multimedia = 0;
        } else if ($userData['level_user'] == 'Tim Multimedia') {
            // $id_editor = 0;
            // $id_koord = 0;
            $id_multimedia = session()->get('id_user');
        }
        $id_tiket = $this->request->getVar('id_tiket');
        $kode_buku = $this->request->getVar('id_buku');
        $bukuData = $BukuModel->where('kode_buku', $kode_buku)->first();
        $id_buku = $bukuData ? $bukuData['id_buku'] : null;
        $input_catatan = $this->request->getVar('catatan');
        $catatan = null;
        $id_kategori_array = $this->request->getVar('id_kategori');
        if (is_array($id_kategori_array) && count($id_kategori_array) > 0) {
            // Hapus duplikasi dari array id_kategori
            $id_kategori_unique = array_unique($id_kategori_array);

            // Konversi array unik menjadi JSON
            $id_kategori_json = json_encode($id_kategori_unique);
            if (json_last_error() !== JSON_ERROR_NONE) {
                log_message('error', 'Invalid JSON format for id_kategori: ' . json_last_error_msg());
                return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid JSON format.']);
            }

            // Ambil input tgl_selesai dan tgl_upload
            $tgl_selesai_input = $this->request->getVar('tgl_selesai');
            $tgl_upload_input = $this->request->getVar('tgl_upload');

            $tgl_selesai = !empty($tgl_selesai_input) ? esc(date('Y-m-d', strtotime($tgl_selesai_input))) : null;
            $tgl_upload = !empty($tgl_upload_input) ? esc(date('Y-m-d', strtotime($tgl_upload_input))) : null;

            // Menentukan apakah level user boleh mengedit catatan
            if (in_array($userData['level_user'], ['Editor', 'Tim Multimedia'])) {
                $catatan = !empty($input_catatan) ? esc($input_catatan) : null;
                $id_buku = !empty($id_buku) ? esc($id_buku) : null;
            }

            // Persiapan data untuk update
            $cobaupdate = [
                'id_kategori' => $id_kategori_json,
                'catatan' => $catatan,
                'id_buku' => $id_buku,
            ];

            // Tambahkan data tambahan berdasarkan level_user
            if ($userData['level_user'] == 'Editor') {
                $cobaupdate['id_editor'] = $id_editor;
                $cobaupdate['id_koord'] = $id_koord;
            } elseif ($userData['level_user'] == 'Tim Multimedia') {
                $cobaupdate['id_multimedia'] = $id_multimedia;
                if ($tgl_selesai !== null)
                    $cobaupdate['tgl_selesai'] = $tgl_selesai;
                if ($tgl_upload !== null)
                    $cobaupdate['tgl_upload'] = $tgl_upload;
            }

            // Eksekusi update
            if ($this->model->update($id_tiket, $cobaupdate) === false) {
                log_message('error', 'Failed to update id_kategori for id_tiket: ' . $id_tiket);
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update categories.']);
            }
        } else {
            log_message('warning', 'No categories provided for id_tiket: ' . $id_tiket);
            return $this->response->setJSON(['status' => 'error', 'message' => 'No categories provided.']);
        }
        $id_tiket = $this->model->getInsertID();
        $id_tiket = $this->request->getVar('id_tiket');

        $kelengkapanModel = new KelengkapanModel();
        $kelengkapans = $this->request->getVar('kelengkapan');

        if (is_array($kelengkapans) && count($kelengkapans) > 0) {
            // Hapus duplikat dari array
            $uniqueKelengkapans = array_unique($kelengkapans);

            // Ubah ke JSON
            $jsonKelengkapan = json_encode($uniqueKelengkapans);

            // Periksa apakah data sudah ada di database berdasarkan id_tiket
            $existing = $kelengkapanModel->where(['id_tiket' => $id_tiket])->first();

            if ($existing) {
                // Jika belum ada, insert data baru
                $kelengkapanModel->update($existing['id_kelengkapan'], [
                    'nama_kelengkapan' => $jsonKelengkapan
                ]);
            } else {
                $kelengkapanModel->insert([
                    'id_tiket' => $id_tiket,
                    'nama_kelengkapan' => $jsonKelengkapan
                ]);
            }
        }

        // Insert status kelengkapan into tbl_status_kelengkapan
        $statusKelengkapanModel = new StatusKelengkapanModel();
        $tahap_kelengkapan_array = $this->request->getVar('tahap_kelengkapan');

        if (is_array($tahap_kelengkapan_array) && count($tahap_kelengkapan_array) > 0) {
            // Hapus duplikat dari array
            $uniqueTahapKelengkapans = array_unique($tahap_kelengkapan_array);

            // Ubah ke JSON
            $jsonTahapKelengkapan = json_encode($uniqueTahapKelengkapans);

            // Periksa apakah data sudah ada di database berdasarkan id_tiket
            $existing = $statusKelengkapanModel->where(['id_tiket' => $id_tiket])->first();

            if ($existing) {
                // Jika belum ada, insert data baru
                $statusKelengkapanModel->update($existing['id_status_kelengkapan'], [
                    'tahap_kelengkapan' => $jsonTahapKelengkapan,
                ]);
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
            'status' => 'success',
            'Pesan' => 'Tiket Berhasil diupdate'
        ];
        return $this->response->setJSON($response);
    }

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
        $GrupModel = new GrupModel();
        $UserModel = new UserModel();
        // Ambil data user berdasarkan ID dari sesi
        $userId = session()->get('id_user');

        if (!empty($userId)) {
            // Ambil data user dari database berdasarkan id_user
            $userData = $UserModel->find($userId);
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
            return redirect()->to('/login');
        }
        // Set nilai default
        $namaKoord = $namaEditor = $namaMultimedia = $namaAdmin = '';

        // Tentukan nilai berdasarkan level user
        switch ($userData['level_user']) {
            case 'Editor':
                $editorId = $GrupModel->where('id_editor', $userId)->first();
                $koordId = $editorId['id_koord'];
                $namaEditor = $UserModel->find($userId)['nama'];
                $namaKoord = $UserModel->find($koordId)['nama'];
                break;
            case 'Koord Editor':
                $namaKoord = $userData['nama'];
                break;
            case 'Tim Multimedia':
                $namaMultimedia = $userData['nama'];
                break;
            case 'Admin Sistem':
                $namaAdmin = $userData['nama'];
                break;
        }

        // Siapkan data untuk view
        $data = [
            'judul' => 'Form QR Code',
            'userData' => $userData,
            'namaKoord' => $namaKoord,
            'namaEditor' => $namaEditor,
            'namaMultimedia' => $namaMultimedia,
            'namaAdmin' => $namaAdmin,
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
            return redirect()->to('/login');
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

    public function detailForm($id_tiket)
    {
        $AuthModel = new AuthModel();
        // Ambil data user berdasarkan ID dari sesi
        $userId = session()->get('id_user');
        // $UserModel = new UserModel();

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
            return redirect()->to('/login');
        }

        $decodedId = base64_decode($id_tiket);
        // Validate id_tiket (example: ensure it's an integer)
        if (!is_numeric($decodedId) || $decodedId <= 0) {
            return $this->response->setJSON(['error' => 'ID Tiket tidak valid'], 400);
        }

        $db = \Config\Database::connect();

        // Ambil data tiket dan buku berdasarkan id_tiket
        $builder = $db->table('tbl_tiket');
        $builder->select('tbl_tiket.*, tbl_buku.kode_buku, tbl_buku.judul_buku, tbl_buku.pengarang, tbl_buku.target_terbit, 
                        tbl_buku.warna, tbl_kelengkapan.nama_kelengkapan, tbl_user.nama as user_nama, tbl_user.email as user_email, 
                        editor.nama as editor_nama, koord.nama as koord_nama, multimedia.nama as multimedia_nama, admin.nama as admin_nama,
                        tbl_status_kelengkapan.tahap_kelengkapan');
        $builder->join('tbl_kelengkapan', 'tbl_tiket.id_tiket = tbl_kelengkapan.id_tiket', 'left');
        $builder->join('tbl_status_kelengkapan', 'tbl_tiket.id_tiket = tbl_status_kelengkapan.id_tiket', 'left');
        $builder->join('tbl_buku', 'tbl_tiket.id_buku = tbl_buku.id_buku', 'left');
        $builder->join('tbl_user', 'tbl_tiket.id_user = tbl_user.id_user', 'left');
        $builder->join('tbl_user as editor', 'tbl_tiket.id_editor = editor.id_user', 'left');
        $builder->join('tbl_user as koord', 'tbl_tiket.id_koord = koord.id_user', 'left');
        $builder->join('tbl_user as multimedia', 'tbl_tiket.id_multimedia = multimedia.id_user', 'left');
        $builder->join('tbl_user as admin', 'tbl_tiket.id_admin = admin.id_user', 'left');
        $builder->where('tbl_tiket.id_tiket', $decodedId);

        $query = $builder->get();
        $tiketData1 = $query->getRow();
        $tiketData = (array) $tiketData1;
        $kategori = json_decode($tiketData['id_kategori'], true);
        $kelengkapan = json_decode($tiketData['nama_kelengkapan'], true);
        $tahap = json_decode($tiketData['tahap_kelengkapan'], true);


        // Jika data tidak ditemukan
        if (!$tiketData) {
            return $this->response->setJSON(['error' => 'Data tidak ditemukan'], 404);
        }
        // return $this->response->setJSON($tiketData);
        $AuthModel = new AuthModel();
        $userId = session()->get('id_user');
        $userData = $AuthModel->find($userId);

        // Data yang akan diteruskan ke view
        $data = [
            'judul' => 'Detail Tiket',
            'userData' => $userData,
            'tiketData' => $tiketData,
            'kategori' => $kategori,
            'kelengkapan' => $kelengkapan,
            'tahap' => $tahap,
        ];

        // Tampilkan view detailForm
        return view($this->folder_directory . 'detailForm', $data);
    }

    public function delete($id_tiket = null)
    {
        if ($id_tiket === null) {
            $id_tiket = $this->request->getVar('id_tiket');
        }
        $modelKelengkapan = new KelengkapanModel();
        $modelStatsKelengkapan = new StatusKelengkapanModel();

        // Cek apakah tiket ada
        $tiket = $this->model->find($id_tiket);
        if (!$tiket) {
            return $this->failNotFound('Data tiket tidak ditemukan');
        }

        // Hapus data dari tbl_kelengkapan berdasarkan id_tiket
        $kelengkapanDeleted = $modelKelengkapan->where('id_tiket', $id_tiket)->delete();

        // Hapus data dari tbl_status_kelengkapan berdasarkan id_tiket
        $statusKelengkapanDeleted = $modelStatsKelengkapan->where('id_tiket', $id_tiket)->delete();

        // Hapus tiket
        $this->model->delete($id_tiket);

        // Cek dan hapus kelengkapan terkait
        $kelengkapanModel = new KelengkapanModel();
        $cekKelengkapan = $kelengkapanModel->where('id_tiket', $id_tiket)->findAll(); // Ambil semua kelengkapan terkait
        if ($cekKelengkapan) {
            foreach ($cekKelengkapan as $kelengkapan) {
                $kelengkapanModel->delete($kelengkapan['id']); // Hapus berdasarkan ID
            }
        }

        // Cek dan hapus status kelengkapan terkait
        $statusKelengkapanModel = new StatusKelengkapanModel(); // Pastikan ini adalah model yang benar
        $cekStatus = $statusKelengkapanModel->where('id_tiket', $id_tiket)->findAll(); // Ambil semua status terkait
        if ($cekStatus) {
            foreach ($cekStatus as $status) {
                $statusKelengkapanModel->delete($status['id']); // Hapus berdasarkan ID
            }
        }

        $response = [
            'pesan' => 'Data tiket berhasil dihapus',
            'kelengkapan_deleted' => $kelengkapanDeleted,
            'status_kelengkapan_deleted' => $statusKelengkapanDeleted
        ];

        return $this->response->setJSON($response, 200);
    }

    public function approveTicketD()
    {
        $id_tiket = $this->request->getVar('id_tiket');
        $approval_type = $this->request->getVar('approval_type');
        $approvalDate = date('Y-m-d');

        $db = \Config\Database::connect();
        $builder = $db->table('tbl_tiket');

        // Tentukan kolom mana yang perlu di-update berdasarkan tipe approval
        if ($approval_type === 'Koord Editor') {
            $builder->set('approved_order_koord', 'Y');
            $builder->set('tgl_order_koord', $approvalDate);
            $builder->where('id_tiket', $id_tiket);
            $updated = $builder->update();
            if ($updated) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Ticket approved successfully']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update ticket status']);
            }
        } elseif ($approval_type === 'Acc Koord Editor') {
            $builder->set('approved_acc_koord', 'Y');
            $builder->set('tgl_acc_koord', $approvalDate);
            $builder->where('id_tiket', $id_tiket);
            $updated = $builder->update();
            if ($updated) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Ticket approved successfully']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update ticket status']);
            }
        } elseif ($approval_type === 'Admin Sistem') {
            $builder->set('approved_order_admin', 'Y');
            $builder->set('tgl_acc_admin', $approvalDate);
            $builder->where('id_tiket', $id_tiket);
            $updated = $builder->update();
            if ($updated) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Ticket approved successfully']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update ticket status']);
            }
        } elseif ($approval_type === 'Tim Multimedia') {
            $builder->set('approved_multimedia', 'Y');
            $builder->set('tgl_acc_multimedia', $approvalDate);
            $builder->where('id_tiket', $id_tiket);
            $updated = $builder->update();
            if ($updated) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Ticket approved successfully']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update ticket status']);
            }
        } elseif ($approval_type === 'Manager Platform') {
            $builder->set('approved_acc_manager', 'Y');
            $builder->set('tgl_acc_manager', $approvalDate);
            $builder->where('id_tiket', $id_tiket);
            $updated = $builder->update();
            if ($updated) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Ticket approved successfully']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update ticket status']);
            }
        }
        return $this->response->setJSON(['status' => 'success', 'Pesan' => 'Tiket Berhasil di Approve']);
    }
    public function approveTicket()
    {
        $id_tiket = $this->request->getVar('id_tiket');
        $status = $this->request->getVar('status');
        $userLevel = session()->get('level_user');
        $approvalDate = date('Y-m-d');

        $db = \Config\Database::connect();
        $builder = $db->table('tbl_tiket');

        // Tentukan kolom mana yang perlu di-update berdasarkan tipe approval
        if ($userLevel === 'Admin Sistem') {
            $builder->set('approved_order_admin', $status);
            if ($status === 'Y') {
                $builder->set('tgl_acc_admin', $approvalDate);  // Set tanggal approval hanya jika di-approve
            } else {
                $builder->set('tgl_acc_admin', null);  // Jika tidak di-approve, kosongkan tanggal
            }
            $builder->where('id_tiket', $id_tiket);
            $updated = $builder->update();
            if ($updated) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Ticket approved successfully']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update ticket status']);
            }
        } else if ($userLevel === 'Tim Multimedia') {
            $builder->set('approved_multimedia', $status);
            if ($status === 'Y') {
                $builder->set('tgl_acc_multimedia', $approvalDate);  // Set tanggal approval hanya jika di-approve
            } else {
                $builder->set('tgl_acc_multimedia', null);  // Jika tidak di-approve, kosongkan tanggal
            }
            $builder->where('id_tiket', $id_tiket);
            $updated = $builder->update();
            if ($updated) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Ticket approved successfully']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update ticket status']);
            }
        } else if ($userLevel === 'Manager Platform') {
            $builder->set('approved_acc_manager', $status);
            if ($status === 'Y') {
                $builder->set('tgl_acc_manager', $approvalDate);  // Set tanggal approval hanya jika di-approve
            } else {
                $builder->set('tgl_acc_manager', null);  // Jika tidak di-approve, kosongkan tanggal
            }
            $builder->where('id_tiket', $id_tiket);
            $updated = $builder->update();
            if ($updated) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Ticket approved successfully']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update ticket status']);
            }
        } else if ($userLevel === 'Editor') {
            $builder->set('approved_order_editor', $status);
            if ($status === 'Y') {
                $builder->set('tgl_order_editor', $approvalDate);  // Set tanggal approval hanya jika di-approve
            } else {
                $builder->set('tgl_order_editor', null);  // Jika tidak di-approve, kosongkan tanggal
            }
            $builder->where('id_tiket', $id_tiket);
            $updated = $builder->update();
            if ($updated) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Ticket approved successfully']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update ticket status']);
            }
        }
        return $this->response->setJSON(['status' => 'success', 'Pesan' => 'Tiket Berhasil di Approve']);
    }
    public function approvedOrderKoord()
    {
        $id_tiket = $this->request->getVar('id_tiket');
        $status = $this->request->getVar('status');
        $userLevel = session()->get('level_user');
        $approvalDate = date('Y-m-d');

        $db = \Config\Database::connect();
        $builder = $db->table('tbl_tiket');

        // Tentukan kolom mana yang perlu di-update berdasarkan tipe approval
        if ($userLevel === 'Koord Editor') {
            $builder->set('approved_order_koord', $status);
            if ($status === 'Y') {
                $builder->set('tgl_order_koord', $approvalDate);  // Set tanggal approval hanya jika di-approve
            } else {
                $builder->set('tgl_order_koord', null);  // Jika tidak di-approve, kosongkan tanggal
            }
            $builder->where('id_tiket', $id_tiket);
            $updated = $builder->update();
            if ($updated) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Ticket approved successfully']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update ticket status']);
            }
        }
        return $this->response->setJSON(['status' => 'success', 'Pesan' => 'Tiket Berhasil di Approve']);
    }
    public function approvedAccKoord()
    {
        $id_tiket = $this->request->getVar('id_tiket');
        $status = $this->request->getVar('status');
        $userLevel = session()->get('level_user');
        $approvalDate = date('Y-m-d');

        $db = \Config\Database::connect();
        $builder = $db->table('tbl_tiket');

        // Tentukan kolom mana yang perlu di-update berdasarkan tipe approval
        if ($userLevel === 'Koord Editor') {
            $builder->set('approved_acc_koord', $status);
            if ($status === 'Y') {
                $builder->set('tgl_acc_koord', $approvalDate);  // Set tanggal approval hanya jika di-approve
            } else {
                $builder->set('tgl_acc_koord', null);  // Jika tidak di-approve, kosongkan tanggal
            }
            $builder->where('id_tiket', $id_tiket);
            $updated = $builder->update();
            if ($updated) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Ticket approved successfully']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update ticket status']);
            }
        }
        return $this->response->setJSON(['status' => 'success', 'Pesan' => 'Tiket Berhasil di Approve']);
    }
    public function disapproveTicket()
    {
        $id_tiket = $this->request->getVar('id_tiket');
        $userLevel = session()->get('level_user');
        $disapprovalDate = date('Y-m-d');

        $db = \Config\Database::connect();
        $builder = $db->table('tbl_tiket');

        // Tentukan kolom mana yang perlu di-update berdasarkan tipe approval
        if ($userLevel === 'Editor') {
            $builder->set('approved_order_editor', 'R');
            $builder->set('tgl_order_editor', $disapprovalDate);
            $builder->where('id_tiket', $id_tiket);
            $updated = $builder->update();
            if ($updated) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Ticket approved successfully']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update ticket status']);
            }
        }
        return $this->response->setJSON(['status' => 'success', 'Pesan' => 'Tiket Berhasil di Approve']);
    }
}
