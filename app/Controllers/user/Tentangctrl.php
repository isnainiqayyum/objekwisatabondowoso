<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
use App\Models\TentangModel;

class Tentangctrl extends BaseController
{
    protected $TentangModel;

    public function __construct()
    {
        $this->TentangModel = new TentangModel();
    }

    public function index()
    {
        $tentang = $this->TentangModel->getTentangDepan();

        $deskripsi = !empty($tentang) ? strip_tags($tentang[0]['deskripsi_tentang']) : 'Deskripsi tidak tersedia.';

        $data = [
            'title' => 'Tentang',
            'deskripsi_tentang' => $deskripsi,
            'tentang' => $tentang // ← INI YANG WAJIB ADA
        ];

        return view('user/tentang/index', $data);
    }
}
