<?php

namespace App\Models;

use CodeIgniter\Model;

class Anggota_Model extends Model
{
    protected $table      = 'anggota';
    protected $primaryKey = 'No_Anggota';
    protected $useAutoIncrement = false;
    protected $allowedFields = ['No_Anggota', 'Nama', 'Kelas', 'Alamat'];

    public function getAnggota($No_Anggota = false)
    {
        if ($No_Anggota == false) {
            return $this->findAll();
        }

        return $this->where(['No_Anggota' => $No_Anggota])->first();
    }

    public function search($keyword)
    {
        return $this->table('anggota')->like('No_Anggota', $keyword)->orLike('Nama', $keyword)->orLike('Kelas', $keyword)->orLike('Alamat', $keyword);
    }

    public function add($import)
    {
        $this->db->table('anggota')->insert($import);
    }
}
