<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function index()
    {
        $data = ['title' => 'Halaman Dashboard'];
        return view('dashboard', $data);
    }
    public function about()
    {
        $data = ['title' => 'Halaman About'];
        return view('about', $data);
    }
    public function contact()
    {
        $data = ['title' => 'Halaman Contact'];
        return view('contact', $data);
    }
    public function buku()
    {
        $data = ['title' => 'Daftar Buku'];
        return redirect()->to('buku');
    }
    public function anggota()
    {
        $data = ['title' => 'Daftar Anggota'];
        return redirect()->to('anggota/index');
    }
    public function peminjaman()
    {
        $data = ['title' => 'pinjam'];
        return redirect()->to('pinjam/index');
    }
    public function pengembalian()
    {
        $data = ['title' => 'kembali'];
        return redirect()->to('kembali/index');
    }
    public function denda()
    {
        $data = ['title' => 'Denda Buku'];
        return view('denda', $data);
    }
}
