<?php

namespace App\Controllers\admin;

use App\Models\ArtikelModel;
use CodeIgniter\Config\Services;

class Artikel extends BaseController
{
    protected $artikelModel;

    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $data = [
            'all_data_artikel' => $this->artikelModel->getAll(),
            'validation' => \Config\Services::validation()
        ];

        return view('admin/artikel/index', $data);
    }

    public function tambah()
    {
        return view('admin/artikel/tambah', [
            'validation' => \Config\Services::validation()
        ]);
    }

    public function proses_tambah()
    {
        $validationRules = [
            'foto' => [
                'rules' => 'uploaded[foto]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih foto terlebih dahulu',
                    'is_image' => 'File yang anda pilih bukan gambar',
                    'mime_in' => 'File yang anda pilih wajib berekstensikan jpg/jpeg/png'
                ]
            ],
            'judul_artikel' => 'required',
            'deskripsi' => 'required',
            'sumber_foto' => 'permit_empty',
            'tanggal_publish' => 'required|valid_date'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $file = $this->request->getFile('foto');
        $newName = null;
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('./assets-baru/img/foto_artikel/', $newName);

            $this->resizeImage('./assets-baru/img/foto_artikel/' . $newName, 572, 572);
        }

        $data = [
            'judul_artikel' => $this->request->getPost('judul_artikel'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'foto' => $newName,
            'sumber_foto' => $this->request->getPost('sumber_foto'),
            'tanggal_publish' => $this->request->getPost('tanggal_publish'),
        ];

        $this->artikelModel->insert($data);

        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to(base_url('admin/artikel/index'));
    }

    public function edit($id)
    {
        $artikelData = $this->artikelModel->getById($id);

        if (!$artikelData) {
            session()->setFlashdata('error', 'Data tidak ditemukan');
            return redirect()->to(base_url('admin/artikel'));
        }

        // pastikan $artikelData berupa objek
        if (is_array($artikelData)) {
            $artikelData = (object) $artikelData;
        }

        return view('admin/artikel/edit', [
            'artikelData' => $artikelData,
            'validation' => \Config\Services::validation()
        ]);
    }

    public function proses_edit($id)
    {
        $artikelData = $this->artikelModel->getById($id);

        if (!$artikelData) {
            session()->setFlashdata('error', 'Data tidak ditemukan');
            return redirect()->to(base_url('admin/artikel'));
        }

        if (is_array($artikelData)) {
            $artikelData = (object) $artikelData;
        }

        $validationRules = [
            'foto' => [
                'rules' => 'is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'is_image' => 'File yang anda pilih bukan gambar',
                    'mime_in' => 'File yang anda pilih wajib berekstensikan jpg/jpeg/png'
                ]
            ],
            'judul_artikel' => 'required',
            'deskripsi' => 'required',
            'sumber_foto' => 'permit_empty',
            'tanggal_publish' => 'required|valid_date'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $data = [
            'judul_artikel' => $this->request->getPost('judul_artikel'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'sumber_foto' => $this->request->getPost('sumber_foto'),
            'tanggal_publish' => $this->request->getPost('tanggal_publish'),
        ];

        $file = $this->request->getFile('foto');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            if ($artikelData->foto && file_exists('./assets-baru/img/foto_artikel/' . $artikelData->foto)) {
                unlink('./assets-baru/img/foto_artikel/' . $artikelData->foto);
            }

            $newName = $file->getRandomName();
            $file->move('./assets-baru/img/foto_artikel/', $newName);
            $this->resizeImage('./assets-baru/img/foto_artikel/' . $newName, 572, 572);
            $data['foto'] = $newName;
        }

        $this->artikelModel->update($id, $data);

        session()->setFlashdata('success', 'Data berhasil diperbarui');
        return redirect()->to(base_url('admin/artikel'));
    }


    public function delete($id)
    {
        $artikelData = $this->artikelModel->getById($id);

        if (!$artikelData) {
            session()->setFlashdata('error', 'Data tidak ditemukan');
            return redirect()->to(base_url('admin/artikel/index'));
        }

        if ($artikelData->foto && file_exists('./assets-baru/img/foto_artikel/' . $artikelData->foto)) {
            unlink('./assets-baru/img/foto_artikel/' . $artikelData->foto);
        }

        $this->artikelModel->delete($id);

        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to(base_url('admin/artikel/index'));
    }

    private function resizeImage($file, $width, $height)
    {
        $image = Services::image()
            ->withFile($file)
            ->fit($width, $height, 'center')
            ->save($file);
    }
}
