<?php

namespace App\Controllers;

use App\Models\ModelAuth;
use App\Models\ModelProdi;

class Auth extends BaseController
{
    protected $ModelAuth;
    protected $ModelProdi;

    public function __construct() 
    {
        helper('form'); 
        $this->ModelAuth = new ModelAuth(); 
        $this->ModelProdi = new ModelProdi(); 
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
            'page' => 'v_daftar_anggota',
            'prodi' => $this->ModelProdi->AllData(),
        ];
        return view('v_template_login', $data);
    }

    public function Daftar()
    {
        if ($this->validate([
            'id_prodi'=> [
                'label' => 'Prodi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Belum Dipilih !',
                ]
            ],
            'nim'=> [
                'label' => 'NIM',
                'rules' => 'required|is_unique[tbl_anggota.nim]',
                'errors' => [
                    'required' => '{field} Masih Kosong!',
                    'is_unique' => '{field} Sudah Terdaftar !',
                ]
            ],
            'nama_anggota'=> [
                'label' => 'Nama Anggota',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong!',
                ]
            ],   
            'jenis_kelamin'=> [
                'label' => 'jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong!',
                ]
            ],   
            'email'=> [
                'label' => 'Email',
                'rules' => 'required|is_unique[tbl_anggota.email]',
                'errors' => [
                    'required' => '{field} Masih Kosong!',
                    'is_unique' => '{field} Sudah Terdaftar Masukan Email lain!', 
                ]
            ],  
            'no_hp'=> [
                'label' => 'No Handphone',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong!',
                ]
            ],   
            'password'=> [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong!',
                ]
            ],
            'ulangi_password'=> [
                'label' => 'Ulangi Password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} Masih Kosong!',
                    'matches' => '{field} Tidak Sama Dengan Password Sebelumnya !',
                ]
            ],

        ])) {
                // jka lolos validasi
                $data= [
                    'id_prodi'=> $this->request->getPost('id_prodi'),
                    'nim'=> $this->request->getPost('nim'),
                    'nama_anggota'=> $this->request->getPost('nama_anggota'),
                    'jenis_kelamin'=> $this->request->getPost('jenis_kelamin'),
                    'email'=> $this->request->getPost('email'),
                    'no_hp'=> $this->request->getPost('no_hp'),
                    'password'=> $this->request->getPost('password'),
                ];
                $this->ModelAuth->Daftar($data);
                session()->setFlashdata('pesan', 'Akun Berhasil Terdaftar , Silahkan Login Kembali !');
                return redirect()->to(base_url('Auth/Register'));
        }else {
                // jika tidak lolos validasi
                session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
                return redirect()->to(base_url('Auth/Register'))->withInput('validation', \Config\Services::validation());
        }
    }
}
