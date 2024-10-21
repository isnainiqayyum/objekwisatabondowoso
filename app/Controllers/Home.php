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

    // Halaman Artikel 2 (Jika ini halaman berbeda)
    public function artikel2()
    {
        return view('artikel2', );
    }

    // Halaman Artikel 3 (Jika ini halaman berbeda)
    public function artikel3()
    {
        return view('artikel3', );
    }

    // Halaman Artikel 4 (Jika ini halaman berbeda)
    public function artikel4()
    {
        return view('artikel4', );
    }

    // Halaman Artikel 5 (Jika ini halaman berbeda)
    public function artikel5()
    {
        return view('artikel5', );
    }

    // Halaman Artikel 6 (Jika ini halaman berbeda)
    public function artikel6()
    {
        return view('artikel6', );
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

    // Halaman Produk 2
    public function produk2()
    {
        return view('produk2');
    }

    // Halaman Produk 3
    public function produk3()
    {
        return view('produk3');
    }

    // Halaman Produk 4
    public function produk4()
    {
        return view('produk4');
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

    // Halaman Aktivitas 2
    public function aktivitas2()
    {
        return view('aktivitas2');
    }

    // Halaman Aktivitas 3
    public function aktivitas3()
    {
        return view('aktivitas3');
    }

    // Halaman Kontak
    public function kontak()
    {
        return view('kontak');
    }
}
