<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

class CustomErrorController extends Controller
{
    public function show404()
    {
        // Redirect ke halaman dashboard jika 404
        return redirect()->to('https://beautyofindonesia.com/id')->setStatusCode(301);
    }
}
