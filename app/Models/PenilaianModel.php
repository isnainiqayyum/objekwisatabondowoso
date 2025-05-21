<?php

namespace App\Models;

use CodeIgniter\Model;

class PenilaianModel extends Model
{
    protected $table = 'tb_penilaian';
    protected $primaryKey = 'id_penilaian';
    protected $allowedFields = [
        'id_alternatif',
        'id_kriteria',      // tambahkan ini supaya bisa diupdate/insert
        'id_subkriteria',
        'nilai'
    ];

    protected $useTimestamps = false;

    // Ambil semua penilaian berdasarkan id_alternatif
    public function getPenilaianByAlternatif($id_alternatif)
    {
        return $this->where('id_alternatif', $id_alternatif)->findAll();
    }

    // Update kolom id_kriteria di tb_penilaian berdasarkan id_subkriteria (opsional)
    public function updateIdKriteria()
    {
        $builder = $this->db->table($this->table);
        $builder->join('tb_subkriteria s', 'tb_penilaian.id_subkriteria = s.id_subkriteria');
        $builder->set('tb_penilaian.id_kriteria', 's.id_kriteria', false);
        return $builder->update();
    }

    // Ambil penilaian lengkap dengan nama kriteria dan subkriteria (opsional)
    public function getPenilaianDetailByAlternatif($id_alternatif)
    {
        return $this->select('tb_penilaian.*, tb_kriteria.nama_kriteria, tb_subkriteria.nama_subkriteria')
                    ->join('tb_kriteria', 'tb_penilaian.id_kriteria = tb_kriteria.id_kriteria')
                    ->join('tb_subkriteria', 'tb_penilaian.id_subkriteria = tb_subkriteria.id_subkriteria')
                    ->where('tb_penilaian.id_alternatif', $id_alternatif)
                    ->findAll();
    }
}
