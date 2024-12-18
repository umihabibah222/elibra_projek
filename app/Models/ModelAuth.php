<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
   
    // Fungsi untuk login user
    public function LoginUser($email, $password)
    {
        return $this->db->table('tbl_user')
        ->where([
            'email' => $email,
            'password' => $password,
        ])->get()->getRowArray();
    }

    public function Daftar($data)
    {
        $this->db->table('tbl_anggota')->insert($data);
    }

    // Fungsi untuk login anggota
    public function LoginAnggota($nim, $password)
    {
        return $this->db->table('tbl_anggota')
        ->where([
            'nim' => $nim,
            'password' => $password,
        ])->get()->getRowArray();
    }
}
