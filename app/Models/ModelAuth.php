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
}
