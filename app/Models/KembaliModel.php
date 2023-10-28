<?php

namespace App\Models;

use CodeIgniter\Model;

class KembaliModel extends Model
{
    protected $table      = 'kembali';
    protected $primaryKey = 'no_pinjam';
    protected $useAutoIncrement = false;
    protected $allowedFields = ['no_pinjam', 'No_Anggota', 'nama', 'NIB', 'judul_buku', 'waktu_pinjam', 'waktu_kembali', 'denda'];

    public function getKembali($no_pinjam = false)
    {
        if ($no_pinjam == false) {
            return $this->findAll();
        }

        return $this->where(['no_pinjam' => $no_pinjam])->first();
    }

    public function search($keyword)
    {
        return $this->table('Kembali')->like('no_pinjam', $keyword)->orLike('No_Anggota', $keyword)->orLike('nama', $keyword)->orLike('NIB', $keyword)->orLike('judul_buku', $keyword)->orLike('waktu_pinjam', $keyword)->orLike('waktu_kembali', $keyword)->orLike('denda', $keyword);
    }

    public function add($import)
    {
        $this->db->table('Kembali')->insert($import);
    }
}
