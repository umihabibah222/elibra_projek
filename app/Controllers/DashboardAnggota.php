<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardAnggota extends BaseController
{
    public function index()
    {
        $data = [
            'menu' => 'dashboard',
            'submenu' => '',
            'judul' => 'Dashboard Anggota',
            'page' => 'v_dashboard_anggota',

        ];
        return view('v_template_anggota',$data);
    
    }
}
