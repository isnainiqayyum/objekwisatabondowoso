<?php

namespace App\Controllers\user;

use App\Controllers\user\BaseController;
use App\Models\KategoriModel;
use App\Models\ArtikelModel;
use App\Models\TentangModel;
use App\Models\KategoriWisataModel;

class SearchCtrl extends BaseController
{
    private $KategoriModel;
    private $ArtikelModel;
    private $TentangModel;
    private $KategoriWisataModel;

    public function __construct()
    {
        $this->KategoriModel = new KategoriModel();
        $this->ArtikelModel = new ArtikelModel();
        $this->TentangModel = new TentangModel();
        $this->KategoriWisataModel = new KategoriWisataModel();
    }

    public function search()
{
    $lang = session()->get('lang') ?? 'en';
    $keyword = $this->request->getGet('q');
    $new_keyword = $keyword;

    $current_lang_segment = $this->request->uri->getSegment(1);

    // Tambahkan '#' di depan keyword
    $keyword_with_hash = '#' . $keyword;

    // Ambil segmen slug kategori wisata dari URL
    $keyword_artikel = $this->request->uri->getSegment(3) ?? 'default-slug';

    // Tentukan prefix berdasarkan bahasa (artikel untuk 'id' dan article untuk 'en')
    $url_prefix = $lang === 'id' ? 'artikel' : 'article';

    if ($current_lang_segment !== $lang) {
        // Use urlencode for keyword to ensure it's passed correctly in the URL
        return redirect()->to(base_url("{$lang}/{$url_prefix}/{$new_keyword}"));
    }

    $nama_tentang = $this->TentangModel->getNamaTentang(); // Fetches `nama_tentang`

    // Get today's date to filter articles by publish date
    $today = date('Y-m-d');

    // Pass today's date to the search model method to filter by `tgl_publish`
    $artikelResults = $this->ArtikelModel->searchArtikel($keyword, $today);

    $current_url = uri_string(); // Mengambil segmen URL saat ini

    $title = $keyword ? "$keyword - $nama_tentang" : "Hasil Pencarian - $nama_tentang";

    // Data passed to the view
    $data = [
        'kategori' => $this->KategoriModel->getKategori(),
        'artikel' => $artikelResults,
        'tentang' => $this->TentangModel->getTentangDepan(),
        'title' => $title,
        'kategoriwisata' => $this->KategoriWisataModel->getKategoriWisata(),
        'lang' => $lang
    ];

    return view('user/search', $data);
}

}
