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
use Modules\Kelengkapan\Models\KelengkapanModel;
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
        $tgl_selesai = esc(date('Y-m-d', strtotime($this->request->getVar('tgl_selesai'))));
        $tgl_upload = esc(date('Y-m-d', strtotime($this->request->getVar('tgl_upload'))));

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
                'tgl_selesai' => $tgl_selesai,
                'tgl_upload' => $tgl_upload,
                'id_editor' => $id_editor,
                'id_koord' => $id_koord,
                'id_multimedia' => $id_multimedia,
            ]);
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
            'Pesan' => 'Tiket Berhasil ditambahkan'
        ];
        return $this->response->setJSON($response);
    }

    public function updateForm($id_tiket = null)
    {
        $AuthModel = new AuthModel();
        $GrupModel = new GrupModel();

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
        $id_tiket = $this->request->getVar('id_tiket');
        $id_kategori_array = $this->request->getVar('id_kategori');
        log_message('info', 'id_tiket: ' . $id_tiket);
        log_message('info', 'id_kategori: ' . print_r($id_kategori_array, true));
        if (is_array($id_kategori_array) && count($id_kategori_array) > 0) {
            // Hapus duplikasi dari array id_kategori
            $id_kategori_unique = array_unique($id_kategori_array);

            // Konversi array unik menjadi JSON
            $id_kategori_json = json_encode($id_kategori_unique);
            if (json_last_error() === JSON_ERROR_NONE) {
                $cobaupdate = [
                    'id_kategori' => $id_kategori_json,
                    'id_editor' => $id_editor,
                    'id_koord' => $id_koord,
                    'id_multimedia' => $id_multimedia
                ];
                if ($this->model->update($id_tiket, $cobaupdate) === false) {
                    log_message('error', 'Failed to update id_kategori for id_tiket: ' . $id_tiket);
                    return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update categories.']);
                }
            } else {
                log_message('error', 'Invalid JSON format for id_kategori: ' . json_last_error_msg());
                return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid JSON format.']);
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
        if ($userData['level_user'] == 'Editor') {
            $editorId = $GrupModel->where('id_editor', $userId)->first();
            $koordId = $editorId['id_koord'];
            $editor = $UserModel->find($userId);
            $koord = $UserModel->find($koordId);
            $namaEditor = $editor['nama'];
            $namaKoord = $koord['nama'];
            $namaMultimedia = '';
        } else if ($userData['level_user'] == 'Koord Editor') {
            $namaKoord = $userData['nama'];
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
                        editor.nama as editor_nama, koord.nama as koord_nama, multimedia.nama as multimedia_nama, tbl_status_kelengkapan.tahap_kelengkapan');
        $builder->join('tbl_kelengkapan', 'tbl_tiket.id_tiket = tbl_kelengkapan.id_tiket', 'left');
        $builder->join('tbl_status_kelengkapan', 'tbl_tiket.id_tiket = tbl_status_kelengkapan.id_tiket', 'left');
        $builder->join('tbl_buku', 'tbl_tiket.id_buku = tbl_buku.id_buku', 'left');
        $builder->join('tbl_user', 'tbl_tiket.id_user = tbl_user.id_user', 'left');
        $builder->join('tbl_user as editor', 'tbl_tiket.id_editor = editor.id_user', 'left');
        $builder->join('tbl_user as koord', 'tbl_tiket.id_koord = koord.id_user', 'left');
        $builder->join('tbl_user as multimedia', 'tbl_tiket.id_multimedia = multimedia.id_user', 'left');
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
        $tiket = $this->model->find($id_tiket);
        if (!$tiket) {
            return $this->failNotFound('Data tiket tidak ditemukan');
        }
        $this->model->delete($id_tiket);
        $response = [
            'pesan' => 'Data tiket Berhasil di Hapus'
        ];
        return $this->respondDeleted($response, 200);
    }
    public function approveTicket()
    {
        $id_tiket = $this->request->getVar('id_tiket');
        $approval_type = $this->request->getVar('approval_type');
        $approvalDate = date('Y-m-d');

        $db = \Config\Database::connect();
        $builder = $db->table('tbl_tiket');

        // Tentukan kolom mana yang perlu di-update berdasarkan tipe approval
        if ($approval_type === 'Koord Editor') {
            $builder->set('approved_order_koord', 'Y');
            $builder->set('tgl_order_koord',$approvalDate);
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
}
