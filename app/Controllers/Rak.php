<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;


use App\Models\ModelRak;
class Rak extends BaseController
{
    protected $ModelRak;
    public function __construct()
    {
        helper('form');
        $this->ModelRak = new ModelRak;
    }

    public function index()
    {
        $data = [
            'judul' => 'Rak',
            'page' => 'v_rak',
            'rak' => $this->ModelRak->AllData(),
        ];
        return view('v_template_admin',$data);
    }

    public function AddData()
    {
        $data= [
            'nama_rak'=> $this->request->getPost('nama_rak'),
            'lorong_rak'=> $this->request->getPost('lorong_rak')
        ];
        $this->ModelRak->AddData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambah');
        return redirect()->to(base_url('Rak'));
    }

    public function EditData($id_rak)
    {
        $data= [
            'id_rak' => $id_rak,
            'nama_rak'=> $this->request->getPost('nama_rak'),
            'lorong_rak'=> $this->request->getPost('lorong_rak')
        ];
        $this->ModelRak->EditDataData($data);
        session()->setFlashdata('pesan', 'Data Berhasil DiUpdate');
        return redirect()->to(base_url('Rak'));
    }
}
