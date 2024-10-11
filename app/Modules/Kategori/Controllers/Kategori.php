<?php

namespace Modules\Kategori\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use Modules\Kategori\Models\KategoriModel;

class Kategori extends BaseController
{
    use ResponseTrait;
    protected $folder_directory = "Modules\\Kategori\\Views\\";
    protected $model;

    public function index()
    {
        $data = [
            'judul' => 'Kelola Kategori',
        ];
        return view($this->folder_directory . 'index', $data);
    }

    public function data_kategori()
    {
        $kategorimodel = new KategoriModel();
        $data = $kategorimodel->getKategori();
        if ($this->request->isAJAX()) {
            // Respond with JSON for AJAX requests (e.g., for your DataTables or API use)
            return $this->respond(['kategori' => $data]);
        }
        $Vdata = [
            'kategori' => $data,
            'judul' => 'Kelola Kategori',
        ];
        return view($this->folder_directory . 'data_kategori', $Vdata);
    }
}
