<?php

namespace App\Controllers;

use App\Models\ModelAuth;

class Auth extends BaseController
{
    protected $ModelAuth;

    public function __construct() 
    {
        helper('form'); 
        $this->ModelAuth = new ModelAuth(); 
    }

    public function index(): string
    {
        $data = [
            'judul' => 'Login',
            'page' => 'v_login'
        ];
        return view('v_template_login', $data);
    }
    public function LoginUser()
    {
        $data = [
            'judul' => 'Login Admin',
            'page' => 'v_login_user'
        ];
        return view('v_template_login', $data);
    }
    public function cekLoginUser()
    {
        
        if ($this->validate([
            'email'=> [
                'label' => 'E-Mail',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} Masih Kosong!',
                    'valid_email' => '{field} Harus format E-Mail yang benar!',
                ]
            ],
            'password'=> [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong!',
                ]
            ]
        ])) {
            // Mengambil input dari form
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            // Mengecek login user
            $cek_login = $this->ModelAuth->LoginUser($email, $password);
            if ($cek_login) {
                // jika login berhasil
                session()->set('nama_user', $cek_login['nama_user']);
                session()->set('email', $cek_login['email']);
                session()->set('level', $cek_login['level']);
                return redirect()->to(base_url('Admin'));
            }else{
                // Jika login gagal karena password atau email
                session()->setFlashdata('pesan', 'E-Mail atau Password salah!');
                return redirect()->to(base_url('Auth/LoginUser'));
            }
        }else{
             // Jika validasi gagal atau tidak valid 
             session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
             return redirect()->to(base_url('Auth/LoginUser'));
        }
    }


    public function loginAnggota()
    {
        $data = [
            'judul' => 'Login Anggota',
            'page' => 'v_login_anggota'
        ];
        return view('v_template_login', $data);
    }

    public function LogOut()
    {
        session()->remove('nama_user');
        session()->remove('email');
        session()->remove('level');
        session()->setFlashdata('pesan', 'LogOut Berhasil !');
        return redirect()->to(base_url('/Auth/LoginUser'));
    }

    public function Register()
    {
        $data = [
            'judul' => 'Daftar Anggota',
            'page' => 'v_daftar_anggota'
        ];
        return view('v_login_anggota', $data);
    }
}
