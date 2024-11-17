<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
   
    // Fungsi untuk login user
    public function LoginUser($email, $password)
    {
        $user = $this->where('email', $email)->first();
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }


}
