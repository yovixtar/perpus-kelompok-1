<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\KembaliModel;

class Kembali extends Controller
{
    protected $modkembali;
    public function __construct()
    {
        $this->modkembali = new KembaliModel();
    }
    public function index()
    {
        $currentPage = $this->request->getVar('page_pengembalian') ? $this->request->getVar('page_pengembalian') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $getdata = $this->modkembali->search($keyword);
        } else {
            $getdata = $this->modkembali;
        }

        $data = [
            'title' => 'Hal | Daftar kembali',
            'dataKembali' => $getdata->paginate(4, 'kembali'),
            'pager' => $this->modkembali->pager,
            'currentPage' => $currentPage
        ];
        return view('kembali/index', $data);
    }


    public function delete($no_pinjam)
    {
        $this->modkembali->delete($no_pinjam);
        session()->setFlashdata('message', 'Data berhasil dihapus!');
        return redirect()->to('/kembali');
    }


    public function print()
    {
        $data = [
            'pinjam' => $this->modkembali->getKembali()
        ];

        return view('kembali/print', $data);
    }
    public function excel()
    {
        $data = [
            'pinjam' => $this->modkembali->getKembali()
        ];

        return view('kembali/excel', $data);
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
                'denda'         => $excel['8']
            ];
            $this->modkembali->add($import);
        }
        session()->setFlashdata('message', 'Data berhasil di import !!');
        return redirect()->to('/kembali');
    }
}
