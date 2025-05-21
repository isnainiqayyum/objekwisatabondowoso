<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;
use App\Models\AlternatifModel;
use App\Models\TentangModel;
use App\Models\SubKriteriaModel; // Tambahkan ini

class Home extends BaseController
{
    protected $artikelModel;
    protected $alternatifModel;
    protected $tentangModel;
    protected $subKriteriaModel; // Tambahkan ini

    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
        $this->alternatifModel = new AlternatifModel();
        $this->tentangModel = new TentangModel();
        $this->subKriteriaModel = new SubKriteriaModel(); // Inisialisasi
    }


    public function index()
{
    $data = [
        'title' => 'Beranda',
        'randomArtikel' => $this->artikelModel
            ->select('id, judul_artikel, deskripsi, foto, sumber_foto, tanggal_publish')
            ->orderBy('RAND()')
            ->findAll(6),
        'randomWisata' => $this->alternatifModel
            ->select('id_alternatif, nama_wisata, deskripsi, foto')
            ->orderBy('RAND()')
            ->findAll(6),
        'tentang' => $this->tentangModel->findAll(),
        'kategoriWisata' => $this->subKriteriaModel
            ->where('id_kriteria', 1)
            ->findAll(),
    ];

    return view('user/home/index', $data);
}


    public function redirectToHome()
    {
        return redirect()->to('/');
    }
}
