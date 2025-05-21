<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KriteriaModel;
use App\Models\SubkriteriaModel;
use App\Models\AlternatifModel;
use App\Models\PenilaianModel;

class Perhitungan extends BaseController
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
        $kriteria = $this->kriteriaModel->orderBy('id_kriteria')->findAll();
        $alternatif = $this->alternatifModel->findAll();

        // Label kriteria: C1, C2, ...
        $kriteriaLabels = [];
        foreach ($kriteria as $index => $k) {
            $kriteriaLabels[$index] = 'C' . ($index + 1);
        }

        // Tandai kriteria khusus
        $kriteriaKhusus = [];
        foreach ($kriteria as $i => $k) {
            $kriteriaKhusus[$i] = in_array(strtolower($k['nama_kriteria']), ['fasilitas', 'akses kendaraan']);
        }

        // Matriks Keputusan
        $matriksKeputusan = [];
        foreach ($alternatif as $alt) {
            $barisNilai = [];
            foreach ($kriteria as $k) {
                $nilai = 0;

                if (in_array(strtolower($k['nama_kriteria']), ['fasilitas', 'akses kendaraan'])) {
                    $penilaianList = $this->penilaianModel
                        ->where('id_alternatif', $alt['id_alternatif'])
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
                        ->where('id_alternatif', $alt['id_alternatif'])
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

            $matriksKeputusan[] = [
                'id_alternatif' => $alt['id_alternatif'],
                'nama_wisata' => $alt['nama_wisata'],
                'nilai' => $barisNilai,
            ];
        }

        // Hitung max dan min tiap kolom
        $max = [];
        $min = [];
        foreach ($kriteria as $i => $k) {
            $kolom = array_column(array_column($matriksKeputusan, 'nilai'), $i);
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
                'nama_wisata' => $row['nama_wisata'],
                'skor' => round($vi, 4),
            ];
        }

        // Urutkan dan beri ranking
        usort($skorAkhir, fn($a, $b) => $b['skor'] <=> $a['skor']);
        foreach ($skorAkhir as $rank => &$item) {
            $item['ranking'] = $rank + 1;
        }
        unset($item);

        // Simpan hasil ke database
        $db = \Config\Database::connect();
        $builder = $db->table('tb_hasilperhitungan');
        $builder->truncate();

        foreach ($skorAkhir as $item) {
            $normalisasiRow = array_filter($matriksNormalisasi, fn($nr) => $nr['id_alternatif'] == $item['id_alternatif']);
            $normalisasiRow = reset($normalisasiRow);

            $dataInsert = [
                'id_alternatif' => $item['id_alternatif'],
                'nilai_normalisasi' => json_encode($normalisasiRow['nilai']),
                'skor_akhir' => $item['skor'],
                'ranking' => $item['ranking'],
                'tanggal' => date('Y-m-d H:i:s'),
            ];

            $builder->insert($dataInsert);
        }

        return view('admin/perhitungan/index', [
        'kriteria' => $kriteria,
        'kriteriaLabels' => $kriteriaLabels,
        'matriksKeputusan' => $matriksKeputusan,
        'matriksNormalisasi' => $matriksNormalisasi,
        'skorAkhir' => $skorAkhir,
    ]);
}
}