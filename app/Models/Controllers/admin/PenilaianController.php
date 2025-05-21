<?php

namespace App\Controllers\Admin;

use App\Models\PenilaianModel;
use App\Models\AlternatifModel;
use App\Models\SubkriteriaModel;
use App\Models\KriteriaModel;
use CodeIgniter\Controller;

class PenilaianController extends Controller
{
    protected $penilaianModel;
    protected $alternatifModel;
    protected $subkriteriaModel;
    protected $kriteriaModel;
    protected $validation;

    public function __construct()
    {
        $this->penilaianModel   = new PenilaianModel();
        $this->alternatifModel  = new AlternatifModel();
        $this->subkriteriaModel = new SubkriteriaModel();
        $this->kriteriaModel    = new KriteriaModel();
        $this->validation       = \Config\Services::validation();
    }

    public function index()
{
    $penilaianModel = new PenilaianModel();
    $subkriteriaModel = new SubkriteriaModel();
    $kriteriaModel = new KriteriaModel();
    $alternatifModel = new AlternatifModel();

    $data = [
        'penilaian' => $penilaianModel->findAll(),
        'subkriteria' => $subkriteriaModel->findAll(),
        'kriteria' => $kriteriaModel->findAll(),
        'alternatif' => $alternatifModel->findAll(),
        'title' => 'Daftar Penilaian',
    ];

    return view('admin/penilaian/index', $data);
}

    public function create()
    {
        return view('admin/penilaian/create', [
            'alternatif'  => $this->alternatifModel->findAll(),
            'subkriteria' => $this->subkriteriaModel->findAll(),
            'kriteria'    => $this->kriteriaModel->findAll(),
            'validation'  => $this->validation,
        ]);
    }

    public function store()
    {
        $id_alternatif   = $this->request->getPost('id_alternatif');
        $subkriteriaInput = $this->request->getPost('subkriteria');

        if (!$id_alternatif || !$subkriteriaInput) {
            return redirect()->back()->withInput()->with('errors', ['Form belum lengkap.']);
        }

        // Hapus penilaian lama terlebih dahulu untuk alternatif ini
        $this->penilaianModel->where('id_alternatif', $id_alternatif)->delete();

        foreach ($subkriteriaInput as $id_kriteria => $subk_values) {
            if (is_array($subk_values)) {
                // Multi subkriteria (misal: fasilitas, akses)
                foreach ($subk_values as $id_sub) {
                    $sub = $this->subkriteriaModel->find($id_sub);
                    if ($sub) {
                        $this->penilaianModel->insert([
                            'id_alternatif'   => $id_alternatif,
                            'id_kriteria'     => $id_kriteria,
                            'id_subkriteria'  => $id_sub,
                            'nilai'           => $sub['nilai'], // ambil dari nilai mentah subkriteria
                        ]);
                    }
                }
            } else {
                // Subkriteria tunggal (misal: objek wisata, jarak, harga, jam kunjung)
                $sub = $this->subkriteriaModel->find($subk_values);
                if ($sub) {
                    $this->penilaianModel->insert([
                        'id_alternatif'   => $id_alternatif,
                        'id_kriteria'     => $id_kriteria,
                        'id_subkriteria'  => $subk_values,
                        'nilai'           => $sub['nilai'],
                    ]);
                }
            }
        }

        return redirect()->to('/admin/penilaian')->with('success', 'Penilaian berhasil disimpan.');
    }

    public function edit($id)
    {
        $penilaian = $this->penilaianModel->find($id);

        if (!$penilaian) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data penilaian tidak ditemukan.');
        }

        return view('admin/penilaian/edit', [
            'penilaian'   => $penilaian,
            'alternatif'  => $this->alternatifModel->findAll(),
            'subkriteria' => $this->subkriteriaModel->findAll(),
            'kriteria'    => $this->kriteriaModel->findAll(),
            'validation'  => $this->validation,
        ]);
    }

    public function update($id)
    {
        $data = $this->request->getPost();

        $rules = [
            'id_alternatif'   => 'required|integer',
            'id_subkriteria'  => 'required|integer',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to("/admin/penilaian/edit/")->withInput()->with('errors', $this->validator->getErrors());
        }

        $sub = $this->subkriteriaModel->find($data['id_subkriteria']);
        if (!$sub) {
            return redirect()->to("/admin/penilaian/edit/")->with('error', 'Subkriteria tidak ditemukan.');
        }

        $data['id_kriteria'] = $sub['id_kriteria'];
        $data['nilai'] = $sub['nilai']; // nilai diambil dari subkriteria

        $this->penilaianModel->update($id, $data);

        return redirect()->to('/admin/penilaian/index')->with('success', 'Penilaian berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->penilaianModel->delete($id);
        return redirect()->to('/admin/penilaian')->with('success', 'Penilaian berhasil dihapus.');
    }
}
