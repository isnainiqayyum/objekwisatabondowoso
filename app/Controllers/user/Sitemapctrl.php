<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;
use App\Models\PenulisModel;
use App\Models\KategoriWisataModel;
use App\Models\TempatWisataModel;

class Sitemapctrl extends BaseController
{
    public function index()
    {
        // Inisialisasi model
        $artikelModel = new ArtikelModel();
        $penulisModel = new PenulisModel();
        $kategoriWisataModel = new KategoriWisataModel();
        $tempatWisataModel = new TempatWisataModel();

        // Ambil data dari database
        $artikelData = $artikelModel->where('tgl_publish <=', date('Y-m-d'))->findAll();
        $tempatWisataData = $tempatWisataModel->getAllWisata();
        $kategoriWisataData = $kategoriWisataModel->findAll();

        // Data untuk halaman statis
        $data = [
            'pages' => [
                ['name' => 'Beranda', 'url' => base_url('id')],
                ['name' => 'Home', 'url' => base_url('en')],
                ['name' => 'Tentang Kami', 'url' => base_url('id/tentang')],
                ['name' => 'About Us', 'url' => base_url('en/about')],
                ['name' => 'Wisata', 'url' => base_url('id/wisata')],
                ['name' => 'Destinations', 'url' => base_url('en/destinations')],
                ['name' => 'Oleh-oleh', 'url' => base_url('id/oleh-oleh')],
                ['name' => 'Souvenirs', 'url' => base_url('en/souvenirs')],
                ['name' => 'Kategori Artikel', 'url' => base_url('kategori/semua-artikel')],
                ['name' => 'Categories', 'url' => base_url('categories/all-article')],
            ],
            'articles' => [],
            'wisata' => [],
            'souvenirs' => [],
            'kategori_wisata' => [],
            'kategori_oleh' => []
        ];

        // Tambahkan artikel
        foreach ($artikelData as $artikel) {
            $data['articles'][] = [
                'name' => $artikel->judul_artikel, 
                'url_id' => base_url('id/artikel/detail/' . $artikel->slug),
                'url_en' => base_url('en/article/details/' . $artikel->slug_en)
            ];
        }

        // Tambahkan wisata
        foreach ($tempatWisataData as $tempatWisata) {
            $data['wisata'][] = [
                'name' => $tempatWisata['nama_wisata_ind'],
                'url_id' => base_url('id/wisata/detail/' . $tempatWisata['slug_wisata_ind']),
                'url_en' => base_url('en/destinations/details/' . $tempatWisata['slug_wisata_eng'])
            ];
        }

        // Tambahkan kategori wisata
        foreach ($kategoriWisataData as $kategoriWisata) {
            $data['kategori_wisata'][] = [
                'name' => $kategoriWisata->nama_kategori_wisata,
                'url_id' => base_url('id/wisata/kategori-wisata/' . $kategoriWisata->slug_kategori_wisata),
                'url_en' => base_url('en/destinations/destinations-category/' . $kategoriWisata->slug_kategori_wisata_en)
            ];
        }

        return view('sitemap', ['data' => $data]);
    }
}
