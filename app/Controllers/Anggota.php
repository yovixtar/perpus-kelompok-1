<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Anggota_Model;

class Anggota extends Controller
{
    protected $modanggota;
    public function __construct()
    {
        $this->modanggota = new Anggota_Model();
    }
    public function index()
    {
        $currentPage = $this->request->getVar('page_anggota') ? $this->request->getVar('page_anggota') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $getdata = $this->modanggota->search($keyword);
        } else {
            $getdata = $this->modanggota;
        }

        $data = [
            'title' => 'Hal | Daftar Anggota',
            'dataAnggota' => $getdata->paginate(15, 'anggota'),
            'pager' => $this->modanggota->pager,
            'currentPage' => $currentPage
        ];
        return view('anggota/index', $data);
    }
    public function tambah()
    {
        $data = [
            'title' => 'Hal | Tambah Daftar Anggota'
        ];

        return view('anggota/tambah', $data);
    }

    public function save()
    {
        $this->modanggota->save([
            'No_Anggota' => $this->request->getVar('No_Anggota'),
            'Nama'      => $this->request->getVar('Nama'),
            'Kelas'     => $this->request->getVar('Kelas'),
            'Alamat'    => $this->request->getVar('Alamat'),

        ]);

        session()->setFlashdata('message', 'Data sukses ditambahkan!');

        return redirect()->to('/anggota');
    }

    public function delete($No_Anggota)
    {
        $this->modanggota->delete($No_Anggota);
        session()->setFlashdata('message', 'Data berhasil dihapus!');
        return redirect()->to('/anggota');
    }

    public function edit($No_Anggota)
    {
        $data = [
            'title' => 'Hal | Edit Daftar Anggota',
            'Anggota' => $this->modanggota->getAnggota($No_Anggota)
        ];
        return view('anggota/edit', $data);
    }

    public function update($No_Anggota)
    {
        // $this->modanggota->getAnggota($this->request->getVar('No_Anggota'));

        $this->modanggota->update($No_Anggota,[

            'No_Anggota' => $this->request->getVar('No_Anggota'),
            'Nama'      => $this->request->getVar('Nama'),
            'Kelas'     => $this->request->getVar('Kelas'),
            'Alamat'    => $this->request->getVar('Alamat'),

        ]);

        session()->setFlashdata('message', 'Data sukses diupdate!');

        return redirect()->to('/anggota');
    }

    public function print()
    {
        $data = [
            'anggota' => $this->modanggota->getAnggota()
        ];

        return view('anggota/print', $data);
    }
    public function excel()
    {
        $data = [
            'anggota' => $this->modanggota->getAnggota()
        ];

        return view('anggota/excel', $data);
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
                'No_Anggota' =>  $excel['1'],
                'Nama' =>  $excel['2'],
                'Kelas' =>  $excel['3'],
                'Alamat' =>  $excel['4'],


            ];
            $this->modanggota->add($import);
        }
        session()->setFlashdata('message', 'Data berhasil di import !!');
        return redirect()->to('/anggota');
    }
}
