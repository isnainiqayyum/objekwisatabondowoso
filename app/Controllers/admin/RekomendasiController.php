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
        $search = $this->request->getGet('search'); // Ambil keyword dari input form

        if ($search) {
            // Jika ada pencarian, ambil data yang sesuai
            $rekomendasi = $this->rekomendasiModel
                ->like('nama_lengkap', $search)
                ->findAll();
        } else {
            // Jika tidak ada pencarian, ambil semua data
            $rekomendasi = $this->rekomendasiModel->findAll();
        }

        $data = [
            'judul' => 'Riwayat Rekomendasi',
            'rekomendasi' => $rekomendasi,
            'search' => $search // Kirim ke view untuk mengisi kembali input pencarian
        ];

        return view('admin/rekomendasi/riwayat', $data);
    }
}
