<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PinjamModel;

class Pinjam extends Controller
{
    protected $modpinjam;
    public function __construct()
    {
        $this->modpinjam = new PinjamModel();
    }
    public function index()
    {
        $currentPage = $this->request->getVar('page_peminjaman') ? $this->request->getVar('page_peminjaman') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $getdata = $this->modpinjam->search($keyword);
        } else {
            $getdata = $this->modpinjam;
        }

        $data = [
            'title' => 'Hal | Daftar Peminjaman',
            'dataPinjam' => $getdata->paginate(4, 'peminjaman'),
            'pager' => $this->modpinjam->pager,
            'currentPage' => $currentPage
        ];
        return view('pinjam/index', $data);
    }
    public function tambah()
    {
        $data = [
            'title' => 'Hal | Tambah Daftar Peminjam'
        ];

        return view('pinjam/tambah', $data);
    }

    public function save()
    {
        $this->modpinjam->save([
            'no_pinjam'     => $this->request->getVar('no_pinjam'),
            'no_anggota'    => $this->request->getVar('No_Anggota'),
            'nama'          => $this->request->getVar('nama'),
            'NIB'           => $this->request->getVar('NIB'),
            'judul_buku'    => $this->request->getVar('judul_buku'),
            'waktu_pinjam'  => $this->request->getVar('waktu_pinjam'),
            'waktu_kembali' => $this->request->getVar('waktu_kembali')
        ]);

        session()->setFlashdata('message', 'Data sukses ditambahkan!');

        return redirect()->to('/pinjam');
    }

    public function delete($no_pinjam)
    {
        $this->modpinjam->delete($no_pinjam);
        session()->setFlashdata('message', 'Data berhasil dihapus!');
        return redirect()->to('/pinjam');
    }

    public function edit($no_pinjam)
    {
        $data = [
            'title' => 'Hal | Edit Daftar Peminjam',
            'pinjam' => $this->modpinjam->getPinjam($no_pinjam)
        ];
        return view('pinjam/edit', $data);
    }

    public function update($no_pinjam)
    {
        $this->modpinjam->getPinjam($this->request->getVar('No_Anggota'));

        $this->modpinjam->save([
            'no_pinjam'     => $no_pinjam,
            'No_Anggota'    => $this->request->getVar('No_Anggota'),
            'nama'          => $this->request->getVar('nama'),
            'NIB'           => $this->request->getVar('NIB'),
            'judul_buku'    => $this->request->getVar('judul_buku'),
            'waktu_pinjam'  => $this->request->getVar('waktu_pinjam'),
            'waktu_kembali' => $this->request->getVar('waktu_kembali')

        ]);

        session()->setFlashdata('message', 'Data sukses diupdate!');

        return redirect()->to('/pinjam');
    }

    public function print()
    {
        $data = [
            'pinjam' => $this->modpinjam->getPinjam()
        ];

        return view('pinjam/print', $data);
    }
    public function excel()
    {
        $data = [
            'pinjam' => $this->modpinjam->getPinjam()
        ];

        return view('pinjam/excel', $data);
    }

    public function import()
    {
        $file = $this->request->getFile('file_excel');
        $ext = $file->getClientExtension();

        if ($ext == 'xls') {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }

        $spreadsheet = $reader->load($file);
        $sheet = $spreadsheet->getActiveSheet()->toArray();

        foreach ($sheet as $x => $excel) {
            //skip field tabel
            if ($x == 0) {
                continue;
            }

            $import = [
                'no_pinjam'    =>  $excel['1'],
                'No_Anggota'   =>  $excel['2'],
                'nama'         =>  $excel['3'],
                'NIB'          =>  $excel['4'],
                'judul_buku'   =>  $excel['5'],
                'waktu_pinjam' =>  $excel['6'],
                'waktu_kembali' =>  $excel['7'],

            ];
            $this->modpinjam->add($import);
        }
        session()->setFlashdata('message', 'Data berhasil di import !!');
        return redirect()->to('/pinjam');
    }
}
