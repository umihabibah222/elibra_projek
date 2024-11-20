<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPenerbit;
use CodeIgniter\HTTP\ResponseInterface;

class Penerbit extends BaseController
{
    protected $ModelPenerbit;
    public function __construct()
    {
        helper('form');
        $this->ModelPenerbit = new ModelPenerbit;
    }
    public function index()
    {
        $data = [
            'menu' => 'datamaster',
            'submenu' => 'penerbit',
            'judul' => 'Penerbit',
            'page' => 'v_penerbit',
            'penerbit' => $this->ModelPenerbit->AllData(),
        ];
        return view('v_template_admin',$data);
    }
}
