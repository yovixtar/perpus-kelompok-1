<?php

namespace App\Models;

use CodeIgniter\Model;

class Buku_Model extends Model
{
    protected $table      = 'buku';
    protected $primaryKey = 'NIB';
    protected $useAutoIncrement = false;
    protected $allowedFields = ['NIB', 'jenis_buku', 'judul_buku', 'no_pengarang', 'no_penerbit', 'tahun_terbit', 'edisi', 'stok'];

    public function getBuku($NIB = false)
    {
        if ($NIB == false) {
            return $this->findAll();
        }

        return $this->where(['NIB' => $NIB])->first();
    }

    public function search($keyword)
    {
        return $this->table('buku')->like('NIB', $keyword)->orLike('jenis_buku', $keyword)->orLike('judul_buku', $keyword)->orLike(
            'no_pengarang',
            $keyword
        )->orLike('no_penerbit', $keyword)->orLike(
            'tahun_terbit',
            $keyword
        )->orLike('edisi', $keyword)->orLike('stok', $keyword);
    }

    public function add($import)
    {
        $this->db->table('buku')->insert($import);
    }
}
