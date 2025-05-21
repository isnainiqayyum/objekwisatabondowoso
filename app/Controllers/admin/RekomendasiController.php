<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RekomendasiModel;

class RekomendasiController extends BaseController
{
    protected $rekomendasiModel;

    public function __construct()
    {
        $this->rekomendasiModel = new RekomendasiModel();
    }

    // Tampilkan daftar riwayat rekomendasi
    public function riwayat()
    {
        $data = [
            'judul' => 'Riwayat Rekomendasi',
            'rekomendasi' => $this->rekomendasiModel->getAllRekomendasi()
        ];

        return view('admin/rekomendasi/riwayat', $data);
    }
}
