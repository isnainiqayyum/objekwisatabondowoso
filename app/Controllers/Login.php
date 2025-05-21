<?php
namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
{
    // Cek apakah sudah ada session 'logged_in'
    if (session()->get('logged_in')) {
        $role = session()->get('role');
        if ($role == 'admin') {
            return redirect()->to(base_url('admin/dashboard'));
        } elseif ($role == 'user') {
            return redirect()->to(base_url('user/home'));
        }
    }
    
    // Jika belum login, tampilkan halaman login
    return view('login');
}

    public function process()
{
    $userModel = new UserModel();
    $username = $this->request->getVar('username');
    $password = $this->request->getVar('password');

    $user = $userModel->where('username', $username)->first();

    if ($user) {
        // Coba verifikasi menggunakan password_verify (hash modern)
        if (password_verify($password, $user['password'])) {
            // Login sukses
        } 
        // Coba verifikasi manual SHA256 sebagai backup
        elseif (hash('sha256', $password) === $user['password']) {
            // Jika password cocok dengan hash lama, update ke password_hash()
            $newHash = password_hash($password, PASSWORD_DEFAULT);
            $userModel->update($user['id'], ['password' => $newHash]);
        } 
        else {
            session()->setFlashdata('error', 'Password salah.');
            return redirect()->back();
        }

        // Set session setelah login sukses
        session()->set([
            'username'  => $user['username'],
            'role'      => $user['role'],
            'logged_in' => true
        ]);

        // Arahkan berdasarkan role
        if ($user['role'] === 'admin') {
            return redirect()->to(base_url('admin/dashboard'));
        } elseif ($user['role'] === 'user') {
            return redirect()->to(base_url('user/home'));
        } else {
            session()->setFlashdata('error', 'Role tidak dikenali.');
            return redirect()->to(base_url('login'));
        }
    } else {
        session()->setFlashdata('error', 'Username tidak ditemukan.');
        return redirect()->back();
    }
}

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }

    // Fungsi untuk reset password
    public function resetPassword($username)
    {
        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();

        if ($user) {
            // Generate password baru (misalnya, password sementara)
            $newPassword = 'NewPassword123';  // Anda bisa menggantinya sesuai kebutuhan

            // Hash password baru
            $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);

            // Update password di database
            $userModel->update($user['id'], [
                'password' => $newPasswordHash
            ]);

            // Kirim notifikasi atau beri pesan jika diperlukan
            session()->setFlashdata('success', 'Password berhasil direset.');
            return redirect()->to(base_url('login'));
        } else {
            session()->setFlashdata('error', 'Username tidak ditemukan.');
            return redirect()->to(base_url('login'));
        }
    }

}
