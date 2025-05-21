<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;
use App\Models\PenulisModel;
use App\Models\KategoriWisataModel;
use App\Models\TempatWisataModel;

class Sitemapcontroller extends BaseController
{
    public function generate()
    {
        // Inisialisasi model
        $artikelModel = new ArtikelModel();
        $penulisModel = new PenulisModel();
        $kategoriWisataModel = new KategoriWisataModel();
        $tempatWisataModel = new TempatWisataModel();

        // Ambil data dari database
        $artikelData = $artikelModel->where('tgl_publish <=', date('Y-m-d'))->findAll();
        $penulisData = $penulisModel->findAll();
        $kategoriWisataData = $kategoriWisataModel->findAll();
        $tempatWisataData = $tempatWisataModel->getAllWisata();

        // Data untuk halaman statis dalam bentuk array URL
        $data = [
            'home_id' => base_url('id'),
            'home_en' => base_url('en'),
            'about_id' => base_url('id/tentang'),
            'about_en' => base_url('en/about'),

            // Static pages
            'wisata_id' => base_url('id/wisata'),
            'wisata_en' => base_url('en/destinations'),
            'souvenirs_id' => base_url('id/oleh-oleh'),
            'souvenirs_en' => base_url('en/souvenirs'),
            'kategori_id' => base_url('kategori/semua-artikel'),
            'kategori_en' => base_url('categories/all-article'),
        ];

        // detail artikel
        foreach ($artikelData as $artikel) {
            $data['articles_id'][] = base_url('id/artikel/detail/' . $artikel->slug);
            $data['articles_en'][] = base_url('en/article/details/' . $artikel->slug_en);
        }

        // detail wisata
        foreach ($tempatWisataData as $tempatWisata) {
            $data['detail_wisata_id'][] = base_url('id/wisata/detail/' . $tempatWisata['slug_wisata_ind']);
            $data['detail_wisata_en'][] = base_url('en/destinations/details/' . $tempatWisata['slug_wisata_eng']);
        }

        // kategori wisata
        foreach ($kategoriWisataData as $kategoriWisata) {
            $data['kategori_wisata_id'][] = base_url('id/wisata/kategori-wisata/' . $kategoriWisata->slug_kategori_wisata);
            $data['kategori_wisata_en'][] = base_url('en/destinations/destinations-category/' . $kategoriWisata->slug_kategori_wisata_en);
        }

        return view('sitemapp', ['data' => $data]);
    }
}
