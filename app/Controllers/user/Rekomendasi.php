<?php

namespace App\Controllers\user;

use App\Models\KriteriaModel;
use App\Models\PenilaianModel;
use App\Models\RekomendasiModel;
use App\Models\AlternatifModel;
use App\Models\SubkriteriaModel;

class Rekomendasi extends BaseController
{
    protected $kriteriaModel;
    protected $subkriteriaModel;
    protected $alternatifModel;
    protected $penilaianModel;
    public function __construct()
    {
        $this->kriteriaModel = new KriteriaModel();
        $this->subkriteriaModel = new SubkriteriaModel();
        $this->alternatifModel = new AlternatifModel();
        $this->penilaianModel = new PenilaianModel();
    }
    public function index()
    {
        $data = [
            'judul' => 'Form Rekomendasi Wisata',
        ];
        return view('user/rekomendasi/index', $data);
    }

    public function hasil()
    {
        $request = $this->request;
        $kriteria = $this->kriteriaModel->orderBy('id_kriteria')->findAll();

        // Ambil input nama lengkap user
        $namaLengkap = $request->getPost('nama') ?? '';

        // Ambil input lainnya
        $input = [
            'objek_wisata' => $request->getPost('objek'),
            'jarak_tempuh' => $request->getPost('jarak'),
            'harga_tiket' => $request->getPost('harga'),
            'jam_kunjung' => $request->getPost('jam'),
            'fasilitas' => $request->getPost('fasilitas') ?? [],
            'akses' => $request->getPost('akses') ?? [],
        ];

        $db = \Config\Database::connect();

        // Ambil data penilaian untuk SAW
        $dataPenilaian = $db->table('tb_penilaian p')
            ->select('p.id_alternatif, k.id_kriteria, k.nama_kriteria, k.bobot, k.tipe, s.nilai,s.nama_subkriteria,af.nama_wisata,af.deskripsi,af.foto,af.sumber_foto')
            ->join('tb_alternatif af', 'af.id_alternatif = p.id_alternatif')
            ->join('tb_kriteria k', 'k.id_kriteria = p.id_kriteria')
            ->join('tb_subkriteria s', 's.id_subkriteria = p.id_subkriteria')
            ->get()->getResultArray();

        // Ambil daftar objek wisata
        $wisataFormat = [];
        foreach ($dataPenilaian as $dp) {
            $wisataFormat[$dp["id_alternatif"]][str_replace(" ", "_", strtolower($dp["nama_kriteria"]))] = $dp["nama_subkriteria"];
            $wisataFormat[$dp["id_alternatif"]]["id_alternatif"] = $dp["id_alternatif"];
            $wisataFormat[$dp["id_alternatif"]]["nama_wisata"] = $dp["nama_wisata"];
            $wisataFormat[$dp["id_alternatif"]]["deskripsi"] = $dp["deskripsi"];
            $wisataFormat[$dp["id_alternatif"]]["foto"] = $dp["foto"];
            $wisataFormat[$dp["id_alternatif"]]["sumber_foto"] = $dp["sumber_foto"];

        }
        

        $kriteriaKhusus = [];
        foreach ($kriteria as $i => $k) {
            $kriteriaKhusus[$i] = in_array(strtolower($k['nama_kriteria']), ['fasilitas', 'akses kendaraan']);
        }

        // Filter objek wisata sesuai input user
        $matriksKeputusan = [];
        $matriksKeputusanSemua = [];
        foreach ($wisataFormat as $w) {


            $fasilitasRaw = $db->table('tb_penilaian as p')
                ->select("nama_subkriteria")
                ->join("tb_kriteria as k", 'k.id_kriteria = p.id_kriteria')
                ->join("tb_subkriteria as sk", 'sk.id_subkriteria = p.id_subkriteria')
                ->where("id_alternatif", $w["id_alternatif"])
                ->where("k.nama_kriteria", "Fasilitas")
                ->get()->getResultArray();
            $fasilitas = array_column($fasilitasRaw, 'nama_subkriteria');
            $aksesKendaraanRaw = $db->table('tb_penilaian as p')
                ->select("nama_subkriteria")
                ->join("tb_kriteria as k", 'k.id_kriteria = p.id_kriteria')
                ->join("tb_subkriteria as sk", 'sk.id_subkriteria = p.id_subkriteria')
                ->where("id_alternatif", $w["id_alternatif"])
                ->where("k.nama_kriteria", "Akses Kendaraan")
                ->get()->getResultArray();
            $aksesKendaraan = array_column($aksesKendaraanRaw, 'nama_subkriteria');

            $wisataFasilitas = $fasilitas;
            $wisataAkses = $aksesKendaraan;

            $matchFasilitas = count(array_intersect($input['fasilitas'], $wisataFasilitas)) > 0;
            $matchAkses = count(array_intersect($input['akses'], $wisataAkses)) > 0;

            $barisNilai = [];
            foreach ($kriteria as $k) {
                $nilai = 0;
                if (in_array(strtolower($k['nama_kriteria']), ['fasilitas', 'akses kendaraan'])) {
                    $penilaianList = $this->penilaianModel
                        ->where('id_alternatif', $w['id_alternatif'])
                        ->where('id_kriteria', $k['id_kriteria'])
                        ->findAll();

                    foreach ($penilaianList as $penilaian) {
                        if (isset($penilaian['id_subkriteria'])) {
                            $sub = $this->subkriteriaModel->find($penilaian['id_subkriteria']);
                            if ($sub && isset($sub['nilai'])) {
                                $nilai += $sub['nilai'];
                            }
                        }
                    }
                } else {

                    $penilaian = $this->penilaianModel
                        ->where('id_alternatif', $w['id_alternatif'])
                        ->where('id_kriteria', $k['id_kriteria'])
                        ->first();

                    if ($penilaian && isset($penilaian['id_subkriteria'])) {
                        $sub = $this->subkriteriaModel->find($penilaian['id_subkriteria']);
                        if ($sub && isset($sub['nilai'])) {
                            $nilai = $sub['nilai'];
                        }
                    }
                }

                $barisNilai[] = $nilai;
            }

            $matriksKeputusanSemua[] = [
                'id_alternatif' => $w['id_alternatif'],
                'nama_wisata' => $w['nama_wisata'],
                'nilai' => $barisNilai,
            ];

            $prioritas = (
                $w['objek_wisata'] == $input['objek_wisata'] &&
                $w['jarak_tempuh'] == $input['jarak_tempuh'] &&
                $w['harga_tiket'] == $input['harga_tiket'] &&
                $w['jam_kunjung'] == $input['jam_kunjung']
            );
            $bukanPrioritas = (
                $w['objek_wisata'] == $input['objek_wisata'] ||
                $w['jarak_tempuh'] == $input['jarak_tempuh'] ||
                $w['harga_tiket'] == $input['harga_tiket'] ||
                $w['jam_kunjung'] == $input['jam_kunjung']
            );

            // ubah disini jika ingin menambah data yg akan ditampilkan
            if ($prioritas && $matchFasilitas && $matchAkses) {
                $matriksKeputusan[] = [
                    'id_alternatif' => $w['id_alternatif'],
                    'nama_wisata' => $w['nama_wisata'],
                    "deskripsi" => $w['deskripsi'],
                    "foto" => $w['foto'],
                    "sumber_foto" => $w['sumber_foto'],
                    "prioritas" => true,
                    'nilai' => $barisNilai,
                ];
            } else if ($bukanPrioritas && $matchFasilitas && $matchAkses) {
                $matriksKeputusan[] = [
                    'id_alternatif' => $w['id_alternatif'],
                    'nama_wisata' => $w['nama_wisata'],
                    "deskripsi" => $w['deskripsi'],
                    "foto" => $w['foto'],
                    "sumber_foto" => $w['sumber_foto'],
                    "prioritas" => false,
                    'nilai' => $barisNilai,
                ];
            }
        }

        if (empty($matriksKeputusan)) {
            return view('user/rekomendasi/hasil', [
                'judul' => 'Hasil Rekomendasi',
                'rekomendasi' => [],
                'pesan' => 'Tidak ada wisata yang cocok dengan pilihan Anda.'
            ]);
        }


        $max = [];
        $min = [];
        foreach ($kriteria as $i => $k) {
            $kolom = array_column(array_column($matriksKeputusanSemua, 'nilai'), $i);
            if (count($kolom) > 0) {
                $max[$i] = max($kolom);
                $min[$i] = min($kolom);
            } else {
                $max[$i] = 0;
                $min[$i] = 0;
            }
        }


        // Matriks Normalisasi
        $matriksNormalisasi = [];
        foreach ($matriksKeputusan as $row) {
            $normalisasi = [];
            foreach ($row['nilai'] as $i => $nilai) {
                if (isset($kriteriaKhusus[$i]) && $kriteriaKhusus[$i]) {
                    $normalisasi[] = $nilai;
                    continue;
                }

                $tipe = strtolower($kriteria[$i]['tipe'] ?? '');
                if ($tipe === 'benefit') {
                    $normalisasi[] = ($max[$i] != 0) ? round($nilai / $max[$i], 4) : 0;
                } elseif ($tipe === 'cost') {
                    $normalisasi[] = ($nilai != 0) ? round($min[$i] / $nilai, 4) : 0;
                } else {
                    $normalisasi[] = 0;
                }
            }

            $matriksNormalisasi[] = [
                'id_alternatif' => $row['id_alternatif'],
                'nama_wisata' => $row['nama_wisata'],
                'prioritas' => $row['prioritas'],
                "deskripsi" => $row['deskripsi'],
                "foto" => $row['foto'],
                "sumber_foto" => $row['sumber_foto'],
                'nilai' => $normalisasi,
            ];
        }




        // Hitung skor akhir
        $skorAkhir = [];
        foreach ($matriksNormalisasi as $row) {
            $vi = 0;
            foreach ($row['nilai'] as $i => $nilaiNormal) {
                $bobot = $kriteria[$i]['bobot'] ?? 0;
                $vi += $nilaiNormal * $bobot;
            }
            $skorAkhir[] = [
                'id_alternatif' => $row['id_alternatif'],
                'nama' => $row['nama_wisata'],
                'prioritas' => $row['prioritas'],
                "deskripsi" => $row['deskripsi'],
                "foto" => $row['foto'],
                "sumber_foto" => $row['sumber_foto'],
                'skor' => round($vi, 4),
            ];
        }

        $skorTertinggiPrioritas = 0;
        foreach ($skorAkhir as $row) {
            if ($row['prioritas'] > 0 && $row['skor'] > $skorTertinggiPrioritas) {
                $skorTertinggiPrioritas = $row['skor'];
            }
        }

        // Urutkan semua data: yang memenuhi dua kondisi akan berada di atas
        usort($skorAkhir, function ($a, $b) use ($skorTertinggiPrioritas) {
            // Cek apakah a dan b memenuhi dua kondisi
            $aPrioritasDanSkor = ($a['prioritas'] > 0 && $a['skor'] >= $skorTertinggiPrioritas);
            $bPrioritasDanSkor = ($b['prioritas'] > 0 && $b['skor'] >= $skorTertinggiPrioritas);

            // Kalau salah satu memenuhi, letakkan di atas
            if ($aPrioritasDanSkor && !$bPrioritasDanSkor)
                return -1;
            if (!$aPrioritasDanSkor && $bPrioritasDanSkor)
                return 1;

            // Kalau dua-duanya sama (sama2 memenuhi atau tidak), urutkan berdasarkan skor
            return $b['skor'] <=> $a['skor'];
        });

        $top3 = array_slice($skorAkhir, 0, 3);

        // Simpan hasil ke tabel tb_rekomendasi
        $rekomendasiModel = new RekomendasiModel();
        $rekomendasiModel->saveRekomendasi([
            'nama_lengkap' => $namaLengkap,
            'objek_wisata' => $input['objek_wisata'],
            'jarak_tempuh' => $input['jarak_tempuh'],
            'harga_tiket' => $input['harga_tiket'],
            'jam_kunjung' => $input['jam_kunjung'],
            'fasilitas' => implode(',', $input['fasilitas']),
            'akses_kendaraan' => implode(',', $input['akses']),
            'hasil_1' => $top3[0]['nama'] ?? null,
            'hasil_2' => $top3[1]['nama'] ?? null,
            'hasil_3' => $top3[2]['nama'] ?? null,
            'waktu' => date('Y-m-d H:i:s'),
        ]);

        return view('user/rekomendasi/hasil', [
            'judul' => 'Hasil Rekomendasi',
            'rekomendasi' => $top3,
            'pesan' => null
        ]);
    }
}
