<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Buku_Model;

class Buku extends Controller
{
    protected $modbuku;
    public function __construct()
    {
        $this->modbuku = new Buku_Model();
    }
    public function index()
    {
        $currentPage = $this->request->getVar('page_buku') ? $this->request->getVar('page_buku') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $getdata = $this->modbuku->search($keyword);
        } else {
            $getdata = $this->modbuku;
        }

        $data = [
            'title' => 'Hal | Daftar Buku',
            'dataBuku' => $getdata->paginate(4, 'buku'),
            'pager' => $this->modbuku->pager,
            'currentPage' => $currentPage
        ];
        return view('buku/index', $data);
    }
    public function tambah()
    {
        $data = [
            'title' => 'Hal | Tambah Daftar Buku'
        ];

        return view('buku/tambah', $data);
    }

    public function save()
    {
        $this->modbuku->save([
            'NIB' => $this->request->getVar('NIB'),
            'jenis_buku'   => $this->request->getVar('jenis_buku'),
            'judul_buku'   => $this->request->getVar('judul_buku'),
            'no_pengarang' => $this->request->getVar('no_pengarang'),
            'no_penerbit'    => $this->request->getVar('no_penerbit'),
            'tahun_terbit' => $this->request->getVar('tahun_terbit'),
            'edisi'        => $this->request->getVar('edisi'),
            'stok'         => $this->request->getVar('stok')
        ]);

        session()->setFlashdata('message', 'Data sukses ditambahkan!');

        return redirect()->to('/buku');
    }

    public function delete($NIB)
    {
        $this->modbuku->delete($NIB);
        session()->setFlashdata('message', 'Data berhasil dihapus!');
        return redirect()->to('/buku');
    }

    public function edit($NIB)
    {
        $data = [
            'title' => 'Hal | Edit Daftar Buku',
            'Buku' => $this->modbuku->getBuku($NIB)
        ];
        return view('buku/edit', $data);
    }

    public function update($NIB)
    {
        $this->modbuku->getBuku($this->request->getVar('NIB'));

        $this->modbuku->save([
            'NIB' => $NIB,
            'jenis_buku'   => $this->request->getVar('jenis_buku'),
            'judul_buku'   => $this->request->getVar('judul_buku'),
            'no_pengarang' => $this->request->getVar('no_pengarang'),
            'no_terbit'    => $this->request->getVar('no_terbit'),
            'tahun_terbit' => $this->request->getVar('tahun_terbit'),
            'edisi'        => $this->request->getVar('edisi'),
            'stok'         => $this->request->getVar('stok')
        ]);

        session()->setFlashdata('message', 'Data sukses diupdate!');

        return redirect()->to('/buku');
    }

    public function print()
    {
        $data = [
            'buku' => $this->modbuku->getBuku()
        ];

        return view('buku/print', $data);
    }
    public function excel()
    {
        $data = [
            'buku' => $this->modbuku->getBuku()
        ];

        return view('buku/excel', $data);
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
                'NIB' =>  $excel['1'],
                'jenis_buku' =>  $excel['2'],
                'judul_buku' =>  $excel['3'],
                'no_pengarang' =>  $excel['4'],
                'no_penerbit' =>  $excel['5'],
                'tahun_terbit' =>  $excel['6'],
                'edisi' =>  $excel['7'],
                'judul_buku' =>  $excel['8'],

            ];
            $this->modbuku->add($import);
        }
        session()->setFlashdata('message', 'Data berhasil di import !!');
        return redirect()->to('/buku');
    }
}
