<?php

namespace App\Models;

use CodeIgniter\Model;

class AlternatifModel extends Model
{
    protected $table = 'tb_alternatif';
    protected $primaryKey = 'id_alternatif';

    protected $allowedFields = [
        'id_kriteria',
        'id_subkriteria',
        'nama_wisata',
        'deskripsi',
        'foto',
        'sumber_foto'
    ];

    protected $useTimestamps = false;

    // Ambil semua data untuk perhitungan SAW
    public function getDataAlternatif()
    {
        return $this->select('tb_alternatif.*, tb_kriteria.nama_kriteria, tb_subkriteria.nilai')
                    ->join('tb_kriteria', 'tb_kriteria.id_kriteria = tb_alternatif.id_kriteria', 'left')
                    ->join('tb_subkriteria', 'tb_subkriteria.id_subkriteria = tb_alternatif.id_subkriteria', 'left')
                    ->where('tb_subkriteria.id_kriteria', 1)
                    ->findAll();
    }

    // Ambil semua wisata + nama_subkriteria (untuk halaman user - tanpa filter)
    public function getAllWithNamaSubkriteria($limit = 9)
    {
        return $this->select('tb_alternatif.*, tb_subkriteria.nama_subkriteria')
                    ->join('tb_subkriteria', 'tb_subkriteria.id_subkriteria = tb_alternatif.id_subkriteria')
                    ->orderBy('tb_alternatif.id_alternatif', 'DESC')
                    ->paginate($limit);
    }

    // Ambil wisata yang difilter berdasarkan id_subkriteria (kategori)
    public function getAllWithNamaSubkriteriaByKategori($id_subkriteria, $limit = 9)
    {
        return $this->select('tb_alternatif.*, tb_subkriteria.nama_subkriteria')
                    ->join('tb_subkriteria', 'tb_subkriteria.id_subkriteria = tb_alternatif.id_subkriteria')
                    ->where('tb_alternatif.id_subkriteria', $id_subkriteria)
                    ->orderBy('tb_alternatif.id_alternatif', 'DESC')
                    ->paginate($limit);
    }
}
