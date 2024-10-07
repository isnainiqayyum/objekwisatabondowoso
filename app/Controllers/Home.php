<?php

namespace App\Controllers;

use App\Models\ProfilModel;
use App\Models\ArtikelModel;

class Home extends BaseController
{
    // Halaman utama
    public function index()
    {
        // Di sini Anda bisa mengambil data dari model jika perlu
        return view('home');
    }

    // Halaman Tentang
    public function tentang()
    {
        // Jika ada data yang perlu diambil dari database, gunakan model
        // $profilModel = new ProfilModel();
        // $data['profil'] = $profilModel->findAll();
        
        return view('tentang'); // Kirim $data jika ada
    }

    // Halaman Artikel
    public function artikel()
    {
        return view('artikel',);
    }

    // Halaman Artikel 1 (Jika ini halaman berbeda)
    public function artikel1()
    {
        return view('artikel1', );
    }

    // Halaman Produk
    public function produk()
    {
        return view('produk');
    }

    // Halaman Produk 1
    public function produk1()
    {
        return view('produk1');
    }

    // Halaman Aktivitas
    public function aktivitas()
    {
        return view('aktivitas');
    }

    // Halaman Aktivitas 1
    public function aktivitas1()
    {
        return view('aktivitas1');
    }

    // Halaman Kontak
    public function kontak()
    {
        return view('kontak');
    }
}
