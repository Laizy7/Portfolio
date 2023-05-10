-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Bulan Mei 2023 pada 04.48
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukkfinal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fu`
--

CREATE TABLE `fu` (
  `id_fu` int(11) NOT NULL,
  `nama_fu` varchar(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `fu`
--

INSERT INTO `fu` (`id_fu`, `nama_fu`, `keterangan`, `gambar`) VALUES
(4, 'Restoran', 'Di lantai 2', 'Restoran1.jpg'),
(6, 'Kolam', 'Di lantai 1', 'Kolam.jpg'),
(7, 'Bar', 'Di lantai 6', 'Bar.jpg'),
(8, 'Sauna', 'Di lantai 1', 'Sauna.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(3) NOT NULL,
  `tipe_kamar` varchar(50) NOT NULL,
  `fasilitas` varchar(255) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `tipe_kamar`, `fasilitas`, `jumlah`, `gambar`) VALUES
(1, 'Superior', 'Kamar 30m2, Shower Panas Dingin, AC Shapph, TV LED 30 Inch', 50, 'Superior1.jpg'),
(3, 'Deluxe', 'Kamar 40m2, Shower Panas Dingin, AC Shapph, Sofa, TV LED 40 Inch', 50, 'Deluxe.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rsv`
--

CREATE TABLE `rsv` (
  `id_rsv` int(11) NOT NULL,
  `nama_pemesan` varchar(20) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `nama_tamu` varchar(20) NOT NULL,
  `tipe_kamar` enum('Superior','Deluxe') NOT NULL,
  `jumlah` int(3) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `tgl_dibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Menunggu','Masuk','Keluar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `rsv`
--

INSERT INTO `rsv` (`id_rsv`, `nama_pemesan`, `no_hp`, `nama_tamu`, `tipe_kamar`, `jumlah`, `check_in`, `check_out`, `tgl_dibuat`, `status`) VALUES
(1, 'tamu1', '0822', 'tamu1', 'Superior', 2, '2022-05-10', '2022-05-15', '2022-05-10 10:37:32', 'Keluar'),
(19, 'tamu1', '1', 'tamu1', 'Superior', 2, '2022-05-12', '2022-05-14', '2022-05-12 08:03:48', 'Keluar'),
(20, 'a', '1', 'a', 'Superior', 4, '2022-05-13', '2022-05-14', '2022-05-12 08:05:09', 'Keluar'),
(21, 'aa', '1', 'aa', 'Superior', 2, '2022-05-12', '2022-05-14', '2022-05-12 08:15:46', 'Keluar'),
(22, 'a', '1', 'a', 'Superior', 2, '2022-05-13', '2022-05-14', '2022-05-12 08:16:54', 'Keluar'),
(23, 'a', '1', 'a', 'Superior', 2, '2022-05-12', '2022-05-14', '2022-05-12 08:17:26', 'Keluar'),
(24, 'a', '1', 'a', 'Superior', 2, '2022-05-12', '2022-05-14', '2022-05-12 08:42:11', 'Keluar'),
(25, 'a', '1', 'a', 'Superior', 2, '2022-05-12', '2022-05-14', '2022-05-12 08:54:23', 'Keluar'),
(26, 'Tamu1', '0811123123', 'tamu1', 'Superior', 2, '2022-05-12', '2022-05-13', '2022-05-12 08:55:56', 'Keluar'),
(27, 'Tes1', '0811123123', 'tamu1', 'Superior', 5, '2023-05-11', '2023-05-12', '2023-05-10 04:47:27', 'Keluar');

--
-- Trigger `rsv`
--
DELIMITER $$
CREATE TRIGGER `balikin` AFTER UPDATE ON `rsv` FOR EACH ROW BEGIN
	IF New.status = 'Keluar' THEN
		UPDATE kamar set jumlah = jumlah + OLD.jumlah * 2 - OLD.jumlah
    WHERE tipe_kamar = OLD.tipe_kamar;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `masuk` AFTER INSERT ON `rsv` FOR EACH ROW BEGIN
	UPDATE kamar set jumlah = jumlah - NEW.jumlah
    WHERE tipe_kamar = NEW.tipe_kamar;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `level` enum('Admin','Resepsionis','Tamu') NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `password`, `no_hp`, `level`, `foto`) VALUES
(1, 'admin', 'admin', '0811', 'Admin', 'admin2.jpg'),
(4, 'tamu1', 'tamu1', '0811123123', 'Tamu', 'guest.png'),
(5, 'rsp', 'rsp', '082192', 'Resepsionis', 'rsp.jpg'),
(10, 'tamu2', 'tamu2', '1111', 'Tamu', 'guest.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `fu`
--
ALTER TABLE `fu`
  ADD PRIMARY KEY (`id_fu`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indeks untuk tabel `rsv`
--
ALTER TABLE `rsv`
  ADD PRIMARY KEY (`id_rsv`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `fu`
--
ALTER TABLE `fu`
  MODIFY `id_fu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `rsv`
--
ALTER TABLE `rsv`
  MODIFY `id_rsv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
