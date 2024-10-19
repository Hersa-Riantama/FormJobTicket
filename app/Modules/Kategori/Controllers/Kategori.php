<?php

namespace Modules\Kategori\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use Modules\Auth\Models\AuthModel;
use Modules\Kategori\Models\KategoriModel;

class Kategori extends BaseController
{
    use ResponseTrait;
    protected $folder_directory = "Modules\\Kategori\\Views\\";
    protected $model;
    protected $AuthModel;

    public function __construct()
    {
        $this->model = new KategoriModel();
        $this->AuthModel = new AuthModel();
    }

    public function index()
    {
        $data = [
            'judul' => 'Kelola Kategori',
        ];
        return view($this->folder_directory . 'index', $data);
    }

    public function show($id_kategori = null)
    {
        $data = [
            'pesan' => 'Berhasil Mendapatkan Data Kategori',
            'data_kategori' => $this->model->find($id_kategori)
        ];
        if ($data['data_kategori'] == null) {
            return $this->failNotFound('Data Kategori Tidak ditemukan');
        }
        return $this->response->setJSON($data, 200);
    }

    public function data_kategori()
    {
        $AuthModel = new AuthModel();
        $kategorimodel = new KategoriModel();
        // Ambil data user berdasarkan ID dari sesi
        $userId = session()->get('id_user');
        if (!empty($userId)) {
            // Ambil data user dari database berdasarkan id_user
            $userData = $AuthModel->find($userId);
            if ($userData && isset($userData['level_user'])) {
                $allowUser = ['Admin Sistem'];
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
        $userData = $AuthModel->find($userId);
        $data = $kategorimodel->getKategori();
        if ($this->request->isAJAX()) {
            // Respond with JSON for AJAX requests (e.g., for your DataTables or API use)
            return $this->response->setJSON(['kategori' => $data]);
        }
        $Vdata = [
            'kategori' => $data,
            'judul' => 'Kelola Kategori',
            'userData' => $userData,
        ];
        return view($this->folder_directory . 'data_kategori', $Vdata);
    }
    public function update($id_kategori = null)
    {
        // $authHeader = $this->request->getHeader('Authorization');
        // // Mengecek apakah Authorization header valid
        // if ($authHeader && $authHeader->getValue() === $this->value) {

        // } else {
        //     // Jika Authorization header tidak valid
        //     return $this->failUnauthorized('Anda Tidak Memiliki Kunci Akses');
        // }
        $kategori = $this->model->find($id_kategori);
        if ($kategori == null) {
            return $this->failNotFound('Data kategori dengan ID tersebut tidak ditemukan');
        }
        log_message('debug', 'ID kategori yang diterima: ' . $id_kategori);
        $kategori = [
            'nama_kategori' => esc($this->request->getVar('nama_kategori')),
        ];
        $this->model->update($id_kategori, $kategori);
        return $this->respondUpdated([
            'pesan' => 'Data Kategori Berhasil di update',
            'data_kategori' => $kategori
        ]);
    }
    public function delete($id_kategori = null)
    {
        // $authHeader = $this->request->getHeader('Authorization');
        // // Mengecek apakah Authorization header valid
        // if ($authHeader && $authHeader->getValue() === $this->value) {
        // } else {
        //     // Jika Authorization header tidak valid
        //     return $this->failUnauthorized('Anda Tidak Memiliki Kunci Akses');
        // }
        $kategori = $this->model->find($id_kategori);
        if (!$kategori) {
            return $this->failNotFound('Data kategori tidak ditemukan');
        }
        $this->model->delete($id_kategori);
        $response = [
            'pesan' => 'Data kategori berhasil dihapus'
        ];
        return $this->respondDeleted($response, 200);
    }
}
