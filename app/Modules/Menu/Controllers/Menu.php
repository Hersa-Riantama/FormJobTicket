<?php

namespace Modules\Menu\Controllers;

use App\Controllers\BaseController;
use App\Modules\Buku\Models\BukuModel;
use CodeIgniter\API\ResponseTrait;
use Modules\Auth\Models\AuthModel;
use Modules\Form\Models\FormModel;
use Modules\Grup\Models\GrupModel;
use Modules\Kategori\Models\KategoriModel;
use Modules\User\Models\UserModel;
use PhpParser\NodeVisitor\FirstFindingVisitor;

class Menu extends BaseController
{
    use ResponseTrait;
    protected $folder_directory = "Modules\\Menu\\Views\\";
    protected $model;
    protected $AuthModel;
    protected $GrupModel;
    protected $format = 'json';

    public function __construct()
    {
        $this->AuthModel = new AuthModel();
        $this->GrupModel = new GrupModel();
    }

    public function index()
    {
        $user = new UserModel();
        $kategori = new KategoriModel();
        $buku = new BukuModel();
        $form = new FormModel();
        // Ambil data user berdasarkan ID dari sesi
        $userId = session()->get('id_user');
        // $userData = $AuthModel->find($userId);

        if (!empty($userId)) {
            // Ambil data user dari database berdasarkan id_user
            $userData = $user->find($userId);
            if ($userData && isset($userData['level_user'])) {
                $allowUser = ['Admin Sistem', 'Tim Multimedia', 'Editor', 'Koord Editor', 'Manager Platform'];
                if (!in_array($userData['level_user'], $allowUser)) {
                    echo '<script>alert("Access Denied!!"); history.back();</script>';
                    return;
                }
                $levelUser = $userData['level_user'];
                $done = 0;
                $onProgress = 0;
                switch ($levelUser) {
                    case 'Admin Sistem':
                        // Admin Sistem hanya menghitung tiket yang approved_order_admin = 'Y'
                        $done = $form
                            ->Where('approved_order_editor !=', 'R')
                            ->where('approved_order_admin', 'Y')
                            ->countAllResults();
                        $onProgress = $form
                            ->Where('approved_order_editor !=', 'R')
                            ->groupStart()
                            ->orWhere('approved_order_admin', 'N')
                            ->orWhere('approved_order_admin', 'R')
                            ->groupEnd()
                            ->countAllResults();
                        break;

                    case 'Tim Multimedia':
                        // Tim Multimedia menghitung tiket berdasarkan approval multimedia
                        $done = $form
                            ->Where('approved_order_editor !=', 'R')
                            ->where('approved_multimedia', 'Y')
                            ->countAllResults();
                        $onProgress = $form
                            ->Where('approved_order_editor !=', 'R')
                            ->groupStart()
                            ->orWhere('approved_multimedia', 'N')
                            ->orWhere('approved_multimedia', 'R')
                            ->groupEnd()
                            ->countAllResults();
                        break;

                    case 'Editor':
                        // Editor menghitung tiket berdasarkan approval editor
                        $done = $form
                            ->Where('approved_order_editor !=', 'R')
                            ->where('approved_order_editor', 'Y')
                            ->countAllResults();
                        $onProgress = $form
                            ->Where('approved_order_editor !=', 'R')
                            ->groupStart()
                            ->orWhere('approved_order_editor', 'N')
                            ->orWhere('approved_order_editor', 'R')
                            ->groupEnd()
                            ->countAllResults();
                        break;

                    case 'Koord Editor':
                        // Koord Editor menghitung tiket berdasarkan approval editor dan koordinator
                        $done = $form
                            ->Where('approved_order_editor !=', 'R')
                            ->where('approved_order_koord', 'Y')
                            ->where('approved_acc_koord', 'Y')
                            ->countAllResults();
                        $onProgress = $form
                            ->Where('approved_order_editor !=', 'R')
                            ->groupStart()
                            ->orWhere('approved_order_koord', 'N')
                            ->orWhere('approved_order_koord', 'R')
                            ->orWhere('approved_acc_koord', 'N')
                            ->orWhere('approved_acc_koord', 'R')
                            ->groupEnd()
                            ->countAllResults();
                        break;

                    case 'Manager Platform':
                        $done = $form
                            ->Where('approved_order_editor !=', 'R')
                            ->where('approved_acc_manager', 'Y')
                            ->countAllResults();
                        $onProgress = $form
                            ->Where('approved_order_editor !=', 'R')
                            ->groupStart()
                            ->orWhere('approved_acc_manager', 'N')
                            ->orWhere('approved_acc_manager', 'R')
                            ->groupEnd()
                            ->countAllResults();
                        break;

                    default:
                        // Jika level_user tidak dikenali, atur $done dan $onProgress ke 0
                        $done = 0;
                        $onProgress = 0;
                        break;
                }
            } else {
                echo '<script>alert("Level user tidak ditemukan."); history.back();</script>';
                return;
            }
        } else {
            return redirect()->to('/login');
        }
        // if ($userData && isset($userData['level_user']) && $userData['level_user'] === 'Admin Sistem') {
        //     $done = $form
        //     ->Where('approved_order_editor !=', 'R') // Mengecualikan jika approved_order_editor = 'R'
        //     ->Where('approved_order_admin', 'Y')
        //     ->countAllResults();
        //     $onProgress = $form
        //         ->Where('approved_order_editor !=', 'R') // Mengecualikan jika approved_order_editor = 'R'
        //         ->groupStart()
        //         ->orWhere('approved_order_admin', 'N')
        //         ->orWhere('approved_order_admin', 'R')
        //         ->groupEnd()
        //         ->countAllResults();
        // }
        // $done = $form
        //     ->where('approved_multimedia', 'Y')
        //     ->Where('approved_order_editor', 'Y')
        //     ->Where('approved_order_koord', 'Y')
        //     ->Where('approved_order_admin', 'Y')
        //     ->Where('approved_acc_koord', 'Y')
        //     ->Where('approved_acc_manager', 'Y')
        //     ->countAllResults();

        // $onProgress = $form
        //     ->Where('approved_order_editor !=', 'R') // Mengecualikan jika approved_order_editor = 'R'
        //     ->groupStart() // Mulai grup kondisi untuk OR
        //     ->where('approved_order_editor', 'N')
        //     ->orwhere('approved_multimedia', 'N')
        //     ->orwhere('approved_multimedia', 'R')
        //     ->orWhere('approved_order_koord', 'N')
        //     ->orWhere('approved_order_koord', 'R')
        //     ->orWhere('approved_order_admin', 'N')
        //     ->orWhere('approved_order_admin', 'R')
        //     ->orWhere('approved_acc_koord', 'N')
        //     ->orWhere('approved_acc_koord', 'R')
        //     ->orWhere('approved_acc_manager', 'N')
        //     ->orWhere('approved_acc_manager', 'R')
        //     ->groupEnd() // Tutup grup kondisi
        //     ->countAllResults();


        $data = [
            'judul' => 'Dashboard',
            'user' => $user->countAllResults(),
            'kategori' => $kategori->countAllResults(),
            'buku' => $buku->countAllResults(),
            'form' => $form->countAllResults(),
            'done' => $done,
            'onProgress' => $onProgress,
            'userData' => $userData,
        ];
        return view($this->folder_directory . 'index', $data);
    }

    public function beranda()
    {
        $data = [
            'judul' => 'Form Job Ticket',
        ];
        return view($this->folder_directory . 'beranda', $data);
    }

    public function checkUserStatus()
    {
        $userId = session()->get('id_user'); // Ambil ID user dari session

        $grupModel = new GrupModel();
        $userModel = new UserModel();
        $userData = $userModel->find($userId);

        // Pastikan userData tidak null dan level_user ada
        if ($userData && isset($userData['level_user']) && strcasecmp($userData['level_user'], 'Editor') == 0) {
            // Jika level_user diizinkan, cek apakah user terdaftar
            $userExists = $grupModel->where('id_editor', $userId)->first();

            // Tampilkan modal jika pengguna tidak terdaftar
            if (!$userExists) {
                return $this->respond(['showModal' => true, 'canCloseModal' => false]);
            }
        }

        return $this->respond(['showModal' => false]);
    }

    public function registerSelection()
    {
        $request = $this->request->getJSON();

        // Validasi input
        if (empty($request->id_koord)) {
            return $this->respond(['status' => 'error', 'message' => 'ID koord. Editor diperlukan.'], 400);
        }

        $userId = session()->get('id_user');
        $idKoord = $request->id_koord;

        // Simpan pilihan ke database menggunakan model
        $grupModel = new GrupModel();
        $data = [
            'id_editor' => $userId,
            'id_koord' => $idKoord,
        ];

        if ($grupModel->insert($data)) {
            return $this->respond(['status' => 'success', 'message' => 'Pilihan berhasil disimpan!']);
        } else {
            return $this->respond(['status' => 'error', 'message' => 'Gagal menyimpan pilihan: ' . implode(', ', $grupModel->errors())], 400);
        }
    }

    public function getKoord()
    {
        $userModel = new UserModel();
        $koord = $userModel->where('level_user', 'Koord Editor')->findAll(); // Ambil semua data grup

        return $this->respond($koord); // Kembalikan data dalam format JSON
    }
}
