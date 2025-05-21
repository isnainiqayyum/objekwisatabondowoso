<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\TentangModel;

class Tentang extends BaseController
{
    public function edit()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $model = new TentangModel();

        if ($this->request->getMethod() === 'post') {
            try {
                $data = [
                    'nama_tentang'         => $this->request->getPost('nama_tentang'),
                    'deskripsi_tentang'    => $this->request->getPost('deskripsi_tentang'),
                    'deskripsi_tentang_en' => $this->request->getPost('deskripsi_tentang_en'),
                    'alamat'               => $this->request->getPost('alamat'),
                    'no_telp'              => $this->request->getPost('no_telp'),
                    'email'                => $this->request->getPost('email'),
                    'instagram'            => $this->request->getPost('instagram'),
                    'tiktok'               => $this->request->getPost('tiktok'),
                    'youtube'              => $this->request->getPost('youtube'),
                    'footer'               => $this->request->getPost('footer'),
                    'username'             => $this->request->getPost('username'),
                    'slogan'               => $this->request->getPost('slogan'),
                ];

                $passwordInput = $this->request->getPost('password');
                if (!empty($passwordInput)) {
                    $data['password'] = password_hash($passwordInput, PASSWORD_DEFAULT);
                }

                $oldFotoTentang = $this->request->getPost('old_foto_tentang');
                $newFotoTentang = $this->request->getFile('foto_tentang');

                if ($newFotoTentang && $newFotoTentang->isValid() && !$newFotoTentang->hasMoved()) {
                    if (!empty($oldFotoTentang) && file_exists(FCPATH . 'assets-baru/img/' . $oldFotoTentang)) {
                        unlink(FCPATH . 'assets-baru/img/' . $oldFotoTentang);
                    }

                    $fotoName = $newFotoTentang->getRandomName();
                    $newFotoTentang->move(FCPATH . 'assets-baru/img/', $fotoName);
                    $data['foto_tentang'] = $fotoName;
                } else {
                    $data['foto_tentang'] = $oldFotoTentang;
                }

                $username_pengguna = session()->get('username');
                $model->where('username', $username_pengguna)->set($data)->update();

                if ($model->affectedRows() > 0) {
                    session()->setFlashdata('success', 'Profil berhasil diubah.');

                    if ($data['username'] !== $username_pengguna) {
                        return redirect()->to(base_url('logout'));
                    }

                    return redirect()->to(base_url('admin/tentang/edit'));
                } else {
                    session()->setFlashdata('error', 'Tidak ada perubahan data.');
                }
            } catch (\Exception $e) {
                session()->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
                return redirect()->to(base_url('admin/tentang/edit'));
            }
        }

        // Ambil data berdasarkan username saat ini
        $username_pengguna = session()->get('username');
        $tentang = $model->where('username', $username_pengguna)->first();

        $data['tentang_pengguna'] = $tentang ?? []; // View akan pakai key-value langsung, bukan index 0

        return view('admin/tentang/edit', $data);
    }
}
