-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jul 2022 pada 03.20
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(35) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('Perpustakaan SMANJA', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `No_Anggota` int(11) NOT NULL,
  `Nama` varchar(36) NOT NULL,
  `Kelas` enum('10','11','12') NOT NULL,
  `Alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`No_Anggota`, `Nama`, `Kelas`, `Alamat`) VALUES
(0, 'Nama', '10', 'Alamat'),
(11, 'Asrop', '10', 'pemalang'),
(23, 'Teguh Novianto', '11', 'pemalang'),
(29, 'Heri Setyawan', '10', 'pemalang'),
(4444, 'aspro', '11', 'karangdadap'),
(8980, 'bagas', '10', 'UKM Kesenian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `NIB` varchar(11) NOT NULL,
  `jenis_buku` enum('fiksi','non fiksi') NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `no_pengarang` int(4) NOT NULL,
  `no_penerbit` int(4) NOT NULL,
  `tahun_terbit` int(4) NOT NULL,
  `edisi` int(1) NOT NULL,
  `stok` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`NIB`, `jenis_buku`, `judul_buku`, `no_pengarang`, `no_penerbit`, `tahun_terbit`, `edisi`, `stok`) VALUES
('11111', 'non fiksi', 'E Bisnis', 3333, 22222, 2022, 1, 100),
('5555', 'fiksi', 'Aku Bukan Bonekamu', 1111, 1212, 2022, 1, 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kembali`
--

CREATE TABLE `kembali` (
  `no_pinjam` int(4) NOT NULL,
  `No_Anggota` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `NIB` varchar(11) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `waktu_pinjam` date NOT NULL,
  `waktu_kembali` date NOT NULL,
  `denda` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam`
--

CREATE TABLE `pinjam` (
  `no_pinjam` int(4) NOT NULL,
  `no_anggota` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `NIB` int(11) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `waktu_pinjam` date NOT NULL,
  `waktu_kembali` date NOT NULL,
  `denda` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`No_Anggota`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`NIB`);

--
-- Indeks untuk tabel `kembali`
--
ALTER TABLE `kembali`
  ADD KEY `no_pinjam` (`no_pinjam`),
  ADD KEY `No_Anggota` (`No_Anggota`),
  ADD KEY `NIB` (`NIB`),
  ADD KEY `no_pinjam_2` (`no_pinjam`);

--
-- Indeks untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`no_pinjam`),
  ADD KEY `no_anggota` (`no_anggota`),
  ADD KEY `NIB` (`NIB`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `no_pinjam` int(4) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  ADD CONSTRAINT `pinjam_ibfk_1` FOREIGN KEY (`no_anggota`) REFERENCES `anggota` (`No_Anggota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
