-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jul 2024 pada 10.03
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujikom_08092024_andre`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_andre`
--

CREATE TABLE `tb_barang_andre` (
  `ID_Barang` int(11) NOT NULL,
  `NamaBarang` varchar(30) NOT NULL,
  `Satuan` char(20) NOT NULL,
  `HargaSatuan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_barang_andre`
--

INSERT INTO `tb_barang_andre` (`ID_Barang`, `NamaBarang`, `Satuan`, `HargaSatuan`) VALUES
(3671, 'Indomie Ayam Bawang', 'Bungkus', 2500),
(3672, 'Gula', '1 Kg', 12000),
(3673, 'Telur Ayam Negeri', 'Pack isi 6', 30000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_penjualan_andre`
--

CREATE TABLE `tb_detail_penjualan_andre` (
  `ID_Penjualan` int(11) NOT NULL,
  `ID_Barang` int(11) NOT NULL,
  `Kuantitas` smallint(6) NOT NULL,
  `Sub_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_detail_penjualan_andre`
--

INSERT INTO `tb_detail_penjualan_andre` (`ID_Penjualan`, `ID_Barang`, `Kuantitas`, `Sub_total`) VALUES
(876123, 3673, 1, 25000),
(876136, 3671, 2, 90000),
(876136, 3672, 2, 90000),
(876136, 3673, 3, 90000),
(876137, 3672, 2, 7500),
(876137, 3671, 3, 7500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kasir_andre`
--

CREATE TABLE `tb_kasir_andre` (
  `ID_Kasir` int(11) NOT NULL,
  `Username` char(10) NOT NULL,
  `NamaKasir` varchar(30) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `NomorHP` char(15) NOT NULL,
  `NomorKTP` char(20) NOT NULL,
  `Password` varchar(62) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kasir_andre`
--

INSERT INTO `tb_kasir_andre` (`ID_Kasir`, `Username`, `NamaKasir`, `Alamat`, `NomorHP`, `NomorKTP`, `Password`) VALUES
(1010, 'andre', 'Andre Farhan Saputra', 'Jl. AMD Babakan Pocis, Bakti Jaya, Setu', '087733932416', '3674072901020002', '$2y$10$0ZbQkkZoUhwyl3XwgcjEkOPlY2yWScFUgj9j3w/FlyZtkA6hv2cIG'),
(1011, 'budi', 'Budi Maryadi', 'Tangerang Selatan', '081265653434', '5674820808710003', '$2y$10$GFXU.JOsb9nNJjHLDQA0UOWVz5BCzG2nFi6lTOUT35xwc234Dc2Oi'),
(1013, 'adi', 'Adi Suharso', 'semarang', '04884848', '456465446', '$2y$10$wyiUpIevz3SnIsNz891T6.OBwYJKT2Rg6dconHXRuw7Yza3XpVikS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjualan_andre`
--

CREATE TABLE `tb_penjualan_andre` (
  `ID_Penjualan` int(11) NOT NULL,
  `WaktuTransaksi` datetime NOT NULL,
  `Total` float NOT NULL,
  `ID_Shift` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_penjualan_andre`
--

INSERT INTO `tb_penjualan_andre` (`ID_Penjualan`, `WaktuTransaksi`, `Total`, `ID_Shift`) VALUES
(876123, '2024-07-08 07:36:14', 30000, 1),
(876136, '2024-07-08 15:00:49', 119000, 3),
(876137, '2024-07-08 15:00:58', 31500, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_shift_andre`
--

CREATE TABLE `tb_shift_andre` (
  `ID_Shift` int(11) NOT NULL,
  `ID_Kasir` int(11) NOT NULL,
  `WaktuBuka` datetime NOT NULL,
  `SaldoAwal` double NOT NULL,
  `JumlahPenjualan` double NOT NULL,
  `SaldoAkhir` double NOT NULL,
  `WaktuTutup` datetime DEFAULT NULL,
  `Status` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_shift_andre`
--

INSERT INTO `tb_shift_andre` (`ID_Shift`, `ID_Kasir`, `WaktuBuka`, `SaldoAwal`, `JumlahPenjualan`, `SaldoAkhir`, `WaktuTutup`, `Status`) VALUES
(1, 1010, '2024-07-08 07:00:00', 100000, 30000, 130000, '2024-07-08 14:01:51', 'Tutup'),
(3, 1010, '2024-07-08 14:16:13', 50000, 0, 50000, NULL, 'Buka');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang_andre`
--
ALTER TABLE `tb_barang_andre`
  ADD PRIMARY KEY (`ID_Barang`);

--
-- Indeks untuk tabel `tb_detail_penjualan_andre`
--
ALTER TABLE `tb_detail_penjualan_andre`
  ADD KEY `ID_Penjualan` (`ID_Penjualan`),
  ADD KEY `ID_Barang` (`ID_Barang`);

--
-- Indeks untuk tabel `tb_kasir_andre`
--
ALTER TABLE `tb_kasir_andre`
  ADD PRIMARY KEY (`ID_Kasir`);

--
-- Indeks untuk tabel `tb_penjualan_andre`
--
ALTER TABLE `tb_penjualan_andre`
  ADD PRIMARY KEY (`ID_Penjualan`),
  ADD KEY `ID_Shift` (`ID_Shift`);

--
-- Indeks untuk tabel `tb_shift_andre`
--
ALTER TABLE `tb_shift_andre`
  ADD PRIMARY KEY (`ID_Shift`),
  ADD KEY `ID_Kasir` (`ID_Kasir`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang_andre`
--
ALTER TABLE `tb_barang_andre`
  MODIFY `ID_Barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3675;

--
-- AUTO_INCREMENT untuk tabel `tb_kasir_andre`
--
ALTER TABLE `tb_kasir_andre`
  MODIFY `ID_Kasir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1014;

--
-- AUTO_INCREMENT untuk tabel `tb_penjualan_andre`
--
ALTER TABLE `tb_penjualan_andre`
  MODIFY `ID_Penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=876138;

--
-- AUTO_INCREMENT untuk tabel `tb_shift_andre`
--
ALTER TABLE `tb_shift_andre`
  MODIFY `ID_Shift` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_detail_penjualan_andre`
--
ALTER TABLE `tb_detail_penjualan_andre`
  ADD CONSTRAINT `tb_detail_penjualan_andre_ibfk_1` FOREIGN KEY (`ID_Penjualan`) REFERENCES `tb_penjualan_andre` (`ID_Penjualan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_penjualan_andre_ibfk_2` FOREIGN KEY (`ID_Barang`) REFERENCES `tb_barang_andre` (`ID_Barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_penjualan_andre`
--
ALTER TABLE `tb_penjualan_andre`
  ADD CONSTRAINT `tb_penjualan_andre_ibfk_1` FOREIGN KEY (`ID_Shift`) REFERENCES `tb_shift_andre` (`ID_Shift`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_shift_andre`
--
ALTER TABLE `tb_shift_andre`
  ADD CONSTRAINT `tb_shift_andre_ibfk_1` FOREIGN KEY (`ID_Kasir`) REFERENCES `tb_kasir_andre` (`ID_Kasir`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
