<?php

namespace App\Models;

use CodeIgniter\Model;

class PinjamModel extends Model
{
    protected $table      = 'pinjam';
    protected $primaryKey = 'no_pinjam';

    protected $allowedFields = ['no_pinjam', 'no_anggota', 'NIB', 'waktu_pinjam', 'waktu_kembali'];

    public function getPinjam($no_pinjam = false)
    {
        if ($no_pinjam == false) {
            return $this->findAll();
        }

        return $this->where(['no_pinjam' => $no_pinjam])->first();
    }

    public function search($keyword)
    {
        return $this->table('Pinjam')->like('no_pinjam', $keyword)->orLike('No_Anggota', $keyword)->orLike('nama', $keyword)->orLike('NIB', $keyword)->orLike('judul_buku', $keyword)->orLike('waktu_pinjam', $keyword)->orLike('waktu_kembali', $keyword);
    }

    public function add($import)
    {
        $this->db->table('Pinjam')->insert($import);
    }

    // public function no_pinjam()
    // {
    //     $no_pinjam = $this->db->table('pinjam')
    //         ->select('RIGHT(no_pinjam,3) as no_pinjam', false)
    //         ->orderBy('no_pinjam', 'DESC')
    //         ->limit(1)->get()->getRowArray();

    //     if ($no_pinjam['no_pinjam'] == null) {
    //         $no = 1;
    //     } else {
    //         $no = intval($no_pinjam['no_pinjam']) + 1;
    //     }

    //     $tgl = date('Ymd');
    //     $batas = str_pad($no, 3, "0", STR_PAD_LEFT);
    //     $no_pinjam = $tgl . $batas;
    //     return $no_pinjam;
    // }
}
