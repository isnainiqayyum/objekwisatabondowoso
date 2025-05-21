<?php

namespace App\Models;

use CodeIgniter\Model;

class RekomendasiModel extends Model
{
    protected $table = 'tb_rekomendasi';
    protected $primaryKey = 'id_rekomendasi';

    protected $allowedFields = [
        'nama_lengkap',      // <== tambahkan ini
        'objek_wisata',
        'jarak_tempuh',
        'harga_tiket',
        'jam_kunjung',
        'fasilitas',
        'akses_kendaraan',
        'hasil_1',
        'hasil_2',
        'hasil_3',
        'waktu',
    ];

    protected $useTimestamps = false;

    // Simpan hasil rekomendasi
    public function saveRekomendasi($data)
    {
        return $this->insert($data);
    }

    // Ambil semua data rekomendasi untuk admin
    public function getAllRekomendasi()
    {
        return $this->orderBy('waktu', 'DESC')->findAll();
    }

    // Ambil satu data jika perlu
    public function getRekomendasiById($id)
    {
        return $this->find($id);
    }
}
