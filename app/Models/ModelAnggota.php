<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAnggota extends Model
{
    public function ProfileAnggota($id_anggota)
    {
        return $this->db->table('tbl_anggota')
        ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_anggota.id_prodi')
        ->where('id_anggota', $id_anggota)
        ->get()->getRowArray();
    }
}
