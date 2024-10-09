<?php

namespace Modules\User\Controllers;

use App\Controllers\BaseController;
use Modules\User\Models\UserModel;

class User extends BaseController
{
    protected $folder_directory = "Modules\\User\\Views\\";
    protected $model;

    public function __construct()
    {
        // Load PegawaiModel untuk digunakan dalam method controller
        $this->model = new UserModel();
    }

    public function index()
    {
        return view($this->folder_directory . 'index');
    }
    public function tampil()
    {
        $model = new UserModel();
        $data = $model->getUser();
        if ($this->request->isAJAX()) {
            return $this->response->setJSON((['user' => $data]));
        }
        $Udata = [
            'user' => $data,
            'judul' => 'List User',
        ];
        return view($this->folder_directory . 'data_user', $Udata);
    }
}
