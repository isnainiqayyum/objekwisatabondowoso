<?php

namespace App\Controllers\user;

use App\Models\RekomendasiModel;
use App\Models\AlternatifModel;

class Rekomendasi extends BaseController
{
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

        // Ambil input nama lengkap user
        $namaLengkap = $request->getPost('nama') ?? '';

        // Ambil input lainnya
        $input = [
            'objek_wisata' => $request->getPost('objek'),
            'jarak_tempuh' => $request->getPost('jarak'),
            'harga_tiket'  => $request->getPost('harga'),
            'jam_kunjung'  => $request->getPost('jam'),
            'fasilitas'    => $request->getPost('fasilitas') ?? [],
            'akses'        => $request->getPost('akses') ?? [],
        ];

        $db = \Config\Database::connect();

        // Ambil data penilaian untuk SAW
        $dataPenilaian = $db->table('tb_penilaian p')
            ->select('p.id_objekwisata, k.id_kriteria, k.nama_kriteria, k.bobot, k.tipe, s.nilai')
            ->join('tb_kriteria k', 'k.id_kriteria = p.id_kriteria')
            ->join('tb_subkriteria s', 's.id_subkriteria = p.id_subkriteria')
            ->get()->getResultArray();

        // Ambil daftar objek wisata
        $wisata = $db->table('tb_objekwisata')->get()->getResultArray();

        // Filter objek wisata sesuai input user
        $filtered = [];
        foreach ($wisata as $w) {
            $match = (
                $w['id_objekwisata'] == $input['objek_wisata'] &&
                $w['jarak_tempuh'] == $input['jarak_tempuh'] &&
                $w['harga_tiket'] == $input['harga_tiket'] &&
                $w['jam_kunjung'] == $input['jam_kunjung']
            );

            $wisataFasilitas = explode(',', $w['fasilitas']);
            $wisataAkses = explode(',', $w['akses_kendaraan']);

            $matchFasilitas = count(array_intersect($input['fasilitas'], $wisataFasilitas)) > 0;
            $matchAkses = count(array_intersect($input['akses'], $wisataAkses)) > 0;

            if ($match && $matchFasilitas && $matchAkses) {
                $filtered[$w['id_objekwisata']] = $w['nama_wisata'];
            }
        }

        if (empty($filtered)) {
            return view('user/rekomendasi/hasil', [
                'judul' => 'Hasil Rekomendasi',
                'rekomendasi' => [],
                'pesan' => 'Tidak ada wisata yang cocok dengan pilihan Anda.'
            ]);
        }

        // Bangun matriks keputusan SAW
        $matrix = [];
        $kriteriaInfo = [];
        foreach ($dataPenilaian as $row) {
            if (isset($filtered[$row['id_objekwisata']])) {
                $matrix[$row['id_objekwisata']]['nama'] = $filtered[$row['id_objekwisata']];
                $matrix[$row['id_objekwisata']]['nilai'][$row['id_kriteria']] = $row['nilai'];
                $kriteriaInfo[$row['id_kriteria']] = [
                    'bobot' => $row['bobot'],
                    'jenis' => $row['tipe'] // pastikan ini sesuai nama kolom tipe kriteria, bisa 'Benefit' atau 'Cost'
                ];
            }
        }

        // Normalisasi matriks
        $normalisasi = [];
        foreach ($kriteriaInfo as $id_kriteria => $info) {
            $column = array_column(array_map(fn($m) => $m['nilai'][$id_kriteria], $matrix), null);
            $max = max($column);
            $min = min($column);

            foreach ($matrix as $id_wisata => $m) {
                $value = $m['nilai'][$id_kriteria];
                $normal = ($info['jenis'] == 'Benefit') ? $value / $max : $min / $value;
                $normalisasi[$id_wisata][$id_kriteria] = $normal;
            }
        }

        // Hitung skor akhir
        $skorAkhir = [];
        foreach ($normalisasi as $id_wisata => $nilaiKriteria) {
            $total = 0;
            foreach ($nilaiKriteria as $id_kriteria => $n) {
                $total += $n * $kriteriaInfo[$id_kriteria]['bobot'];
            }
            $skorAkhir[] = [
                'id' => $id_wisata,
                'nama' => $matrix[$id_wisata]['nama'],
                'skor' => round($total, 4)
            ];
        }

        // Urutkan dan ambil 3 teratas
        usort($skorAkhir, fn($a, $b) => $b['skor'] <=> $a['skor']);
        $top3 = array_slice($skorAkhir, 0, 3);

        // Simpan hasil ke tabel tb_rekomendasi
        $rekomendasiModel = new RekomendasiModel();
        $rekomendasiModel->saveRekomendasi([
            'nama_pengunjung' => $namaLengkap,
            'objek_wisata'    => $input['objek_wisata'],
            'jarak_tempuh'    => $input['jarak_tempuh'],
            'harga_tiket'     => $input['harga_tiket'],
            'jam_kunjung'     => $input['jam_kunjung'],
            'fasilitas'       => implode(',', $input['fasilitas']),
            'akses_kendaraan' => implode(',', $input['akses']),
            'hasil_1'         => $top3[0]['nama'] ?? null,
            'hasil_2'         => $top3[1]['nama'] ?? null,
            'hasil_3'         => $top3[2]['nama'] ?? null,
            'waktu'           => date('Y-m-d H:i:s'),
        ]);

        return view('user/rekomendasi/hasil', [
            'judul' => 'Hasil Rekomendasi',
            'rekomendasi' => $top3,
            'pesan' => null
        ]);
    }
}
