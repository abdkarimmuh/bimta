-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 20, 2021 at 11:15 PM
-- Server version: 5.7.26
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `bimta`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_prodi`
--

CREATE TABLE `admin_prodi` (
  `id_admin` int(3) NOT NULL,
  `nm_admin` varchar(30) NOT NULL,
  `no_telp` char(12) NOT NULL,
  `id_prodi` int(2) NOT NULL,
  `username` char(10) NOT NULL,
  `password` char(10) NOT NULL,
  `status_user` varchar(5) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_prodi`
--

INSERT INTO `admin_prodi` (`id_admin`, `nm_admin`, `no_telp`, `id_prodi`, `username`, `password`, `status_user`) VALUES
(1, 'Rizal Inside', '082274369581', 1, 'admin', 'admin', 'admin'),
(16, 'Dirman', '081234567891', 11, 'dirman', 'dirman', 'admin'),
(17, 'Hilman Wijaya', '087712343211', 13, 'hilman', 'hilman', 'admin'),
(18, 'Rizka', '0987', 1, '8e41413d9c', '082018', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `chat_mhs`
--

CREATE TABLE `chat_mhs` (
  `id_chatmhs` int(10) NOT NULL,
  `dosen_penerima` int(3) NOT NULL,
  `mhs_pengirim` int(10) NOT NULL,
  `id_subject` int(10) NOT NULL,
  `topik_pesan` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `tgl` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_mhs`
--

INSERT INTO `chat_mhs` (`id_chatmhs`, `dosen_penerima`, `mhs_pengirim`, `id_subject`, `topik_pesan`, `pesan`, `tgl`) VALUES
(2, 1, 1405102097, 5, 'Judul TA', 'Pak bagaimana dengan judul saya apakah bisa saya lanjutkan?', '2018-07-31 23:56:23'),
(3, 1, 1505102099, 26, 'Meneruskan judul TA pilihan kaprodi', 'Baik pak akan saya lanjutkan judul tersebut', '2018-08-05 23:55:53'),
(8, 9, 1505101201, 20, 'Judul Tidak Sinkron', 'Pak apakah judul saya bisa untuk saya lanjutkan dalam tugas akhir saya? Trims pak sebelumnya.', '2018-07-31 23:58:13'),
(9, 1, 1505102077, 27, 'Ketetapan Judul Kaprodi', 'Apakah judul yang disetujui oleh kaprodi bisa saya lanjutkan pak?', '2018-07-31 23:58:34'),
(12, 1, 1505102099, 26, 'Kesimpulan bab 5', 'Pak saya mau tnya bagian kesimpulan harus dibuat dalam bentuk poin2 kah?', '2018-08-05 23:55:31'),
(14, 1, 1505102099, 26, 'Saran dalam bentuk ringkasan', 'Pak saya ingin bertanya apakah saran bisa dibuat dalam bentuk ringkasan saja?', '2018-08-05 22:40:12'),
(15, 1, 1505102099, 26, 'Revisi kesimpulan', 'Pak saya telah merevisi bagian kesimpulan saya', '2018-08-06 10:33:21'),
(17, 10, 1505102124, 28, 'Konsultasi judul pilihan kaprodi', 'Pak saya ingin bertanya apakah judul pilihan dari kaprodi bisa saya lanjutkan?', '2018-08-07 12:24:30'),
(18, 13, 15051, 31, 'Perumusan judul', 'Bu saya ingin tanya judul saya sudah bisa dilanjut', '2018-08-13 14:11:22');

-- --------------------------------------------------------

--
-- Table structure for table `comment_bimbingan`
--

CREATE TABLE `comment_bimbingan` (
  `id_comment` int(10) NOT NULL,
  `pengirim` enum('mahasiswa','dosen') NOT NULL,
  `comment` text NOT NULL,
  `id_chatmhs` int(5) NOT NULL,
  `tgl` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_read` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_bimbingan`
--

INSERT INTO `comment_bimbingan` (`id_comment`, `pengirim`, `comment`, `id_chatmhs`, `tgl`, `status_read`) VALUES
(1, 'dosen', 'Ok diterima. Lanjutkan!', 3, '2018-08-02 18:14:48', '1'),
(3, 'mahasiswa', 'Oh iya pak apakah bisa saya ganti basis web menjadi cloud saja?', 3, '2018-08-03 10:44:30', '1'),
(4, 'dosen', 'Boleh. Malah lebih bagus seperti itu.', 3, '2018-08-01 11:35:23', '1'),
(5, 'dosen', 'Ok lanjut ya.', 2, '2018-07-31 22:44:27', '0'),
(24, 'mahasiswa', 'Trims byk pak atas sarannya.', 3, '2018-08-01 23:45:22', '1'),
(33, 'dosen', 'Ok', 3, '2018-08-01 14:09:42', '1'),
(35, 'dosen', 'Ya harus', 12, '2018-08-02 18:14:57', '1'),
(36, 'dosen', 'Silahkan', 9, '2018-08-01 23:44:49', '0'),
(38, 'mahasiswa', 'Iya pak', 3, '2018-08-06 00:57:17', '1'),
(53, 'mahasiswa', 'Ok trims byk pak', 12, '2018-08-06 00:57:37', '1'),
(58, 'dosen', 'Bisa. Tapi tolong diperjelas isinya.', 14, '2018-08-06 17:58:12', '1'),
(59, 'dosen', 'Sama2', 12, '2018-08-06 10:31:22', '1'),
(60, 'mahasiswa', 'Ok', 12, '2018-08-06 11:49:31', '1'),
(65, 'dosen', 'Ok diterima', 15, '2018-08-06 15:26:34', '1'),
(68, 'mahasiswa', 'Iya trims pak', 15, '2021-06-14 17:31:47', '1'),
(72, 'mahasiswa', 'ok pak', 14, '2020-06-11 18:58:05', '1'),
(74, 'mahasiswa', 'Bagaimana pak?', 17, '2018-08-07 12:38:27', '1'),
(75, 'dosen', 'Ok lanjutkan', 17, '2018-08-07 12:51:47', '1'),
(76, 'mahasiswa', 'Trims pak', 17, '2021-06-14 17:42:20', '1'),
(80, 'mahasiswa', 'Ok pak', 15, '2021-06-14 17:31:47', '1'),
(81, 'mahasiswa', 'bagaimana bu', 18, '2018-08-13 14:12:58', '1'),
(82, 'dosen', 'ok ', 18, '2018-08-13 14:13:38', '1'),
(83, 'mahasiswa', 'Test', 15, '2021-06-14 17:31:47', '1'),
(84, 'mahasiswa', 'tes', 18, '2021-06-14 17:34:45', '0');

-- --------------------------------------------------------

--
-- Table structure for table `comment_tambahan`
--

CREATE TABLE `comment_tambahan` (
  `id_comment` int(10) NOT NULL,
  `pengirim` enum('dosen','mahasiswa') NOT NULL,
  `comment` text NOT NULL,
  `id_pesantambahan` int(10) NOT NULL,
  `tgl` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_read` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_tambahan`
--

INSERT INTO `comment_tambahan` (`id_comment`, `pengirim`, `comment`, `id_pesantambahan`, `tgl`, `status_read`) VALUES
(1, 'mahasiswa', 'Baik pak akan saya lengkapi materi UML nya', 1, '2018-08-02 00:36:08', '1'),
(2, 'dosen', 'Ok kirim kembali filenya kalau sudah selesai', 1, '2018-08-02 00:36:08', '1'),
(3, 'mahasiswa', 'Baik pak akan saya lengkapi', 2, '2018-08-02 00:36:35', '1'),
(11, 'mahasiswa', 'Ok pak', 1, '2018-08-02 18:34:10', '1'),
(19, 'mahasiswa', 'Iya pak', 4, '2018-08-06 00:31:45', '1'),
(22, 'dosen', 'Ok ditunggu revisinya', 4, '2018-08-06 01:00:35', '1'),
(23, 'dosen', 'Sip', 1, '2018-08-06 01:01:09', '1'),
(24, 'mahasiswa', 'Iya pak', 1, '2018-08-06 10:30:37', '1'),
(27, 'dosen', 'Ok', 2, '2018-08-06 10:54:32', '0'),
(31, 'dosen', 'Ok', 1, '2018-08-06 11:08:21', '1'),
(38, 'mahasiswa', 'Ok pak', 9, '2018-08-07 12:58:07', '0'),
(40, 'dosen', 'ok', 11, '2018-08-13 14:16:05', '1'),
(41, 'mahasiswa', 'ok', 11, '2018-08-13 14:16:47', '1'),
(42, 'mahasiswa', 'OK (2)\r\n', 1, '2020-06-11 18:37:18', '0'),
(43, 'mahasiswa', 'OK paaaaaak ', 1, '2020-06-11 18:37:31', '0');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(3) NOT NULL,
  `nip_dosen` char(18) NOT NULL,
  `nm_dosen` varchar(50) NOT NULL,
  `no_telp` char(12) DEFAULT NULL,
  `username` char(10) NOT NULL,
  `password` char(10) NOT NULL,
  `status_user` varchar(5) NOT NULL DEFAULT 'dosen'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nip_dosen`, `nm_dosen`, `no_telp`, `username`, `password`, `status_user`) VALUES
(1, '197808091997021001', 'Dr. Bonny Matahari, Dipl.Ing., M.Eng.', '08170513214', 'dosen', 'dosen', 'dosen'),
(7, '199812141986031002', 'Drs. Jenny', '085274369585','jenny', 'jenny', 'dosen'),
(9, '199706182005011001', 'Syahrul, S.T., M.T.', '081334567893', 'syahrul', 'syahrul', 'dosen'),
(10, '199398761997021001', 'Ismail Marjan, M.Kom.', '087774369583','ismail', 'ismail', 'dosen'),
(12, '199772761997021001', 'Ruddin, S.T., M.T.', '081212344322', 'ruddin', 'ruddin', 'dosen'),
(13, '876555', 'Dr. Waty MIT', '9876', '0bf173a883', '082018', 'dosen');

-- --------------------------------------------------------

--
-- Table structure for table `evaluasi`
--

CREATE TABLE `evaluasi` (
  `id_evaluasi` int(10) NOT NULL,
  `nim_mhs` int(10) NOT NULL,
  `status_bimbingan` enum('telah selesai','tidak selesai') NOT NULL,
  `evaluasi_judul` enum('ok','kurang') NOT NULL,
  `evaluasi_pendahuluan` enum('ok','kurang') NOT NULL,
  `evaluasi_pustaka` enum('ok','kurang') NOT NULL,
  `evaluasi_metodologi` enum('ok','kurang') NOT NULL,
  `evaluasi_pembahasan` enum('ok','kurang') NOT NULL,
  `evaluasi_kesimpulan` enum('ok','kurang') NOT NULL,
  `tgl_evaluasi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluasi`
--

INSERT INTO `evaluasi` (`id_evaluasi`, `nim_mhs`, `status_bimbingan`, `evaluasi_judul`, `evaluasi_pendahuluan`, `evaluasi_pustaka`, `evaluasi_metodologi`, `evaluasi_pembahasan`, `evaluasi_kesimpulan`, `tgl_evaluasi`) VALUES
(1, 1505102099, 'telah selesai', 'ok', 'ok', 'ok', 'ok', 'ok', 'ok', '2018-08-03 15:23:53'),
(8, 1405102097, 'telah selesai', 'ok', 'ok', 'ok', 'kurang', 'ok', 'ok', '2018-08-06 00:51:44'),
(9, 1505102077, 'telah selesai', 'ok', 'kurang', 'ok', 'ok', 'ok', 'ok', '2018-08-07 13:20:50'),
(10, 15051, 'telah selesai', 'ok', 'kurang', 'kurang', 'kurang', 'kurang', 'kurang', '2018-08-13 14:18:38'),
(11, 1505102105, 'telah selesai', 'ok', 'ok', 'ok', 'kurang', 'ok', 'ok', '2021-06-14 17:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `file_mahasiswa`
--

CREATE TABLE `file_mahasiswa` (
  `id_file` int(10) NOT NULL,
  `file` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `size` int(10) NOT NULL,
  `mhs_pengirim` int(10) NOT NULL,
  `id_subject` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_mahasiswa`
--

INSERT INTO `file_mahasiswa` (`id_file`, `file`, `type`, `size`, `mhs_pengirim`, `id_subject`) VALUES
(2, '78191-ta-continue.docx', 'application/vnd.open', 938, 1505102099, 6),
(3, '84993-laporan-magang.docx', 'application/vnd.open', 355, 1505102099, 10),
(5, '88216-10kisahislami.docx', 'application/vnd.open', 332, 1505101201, 20),
(6, '85255-mahasiswa.pdf', 'application/pdf', 1043, 1505102099, 26),
(7, '3097-proposal.docx', 'application/vnd.open', 69, 1505102124, 28),
(8, '63705-10kisahislami.docx', 'application/vnd.open', 332, 15051, 31);

-- --------------------------------------------------------

--
-- Table structure for table `judul_ta`
--

CREATE TABLE `judul_ta` (
  `id_ta` int(5) NOT NULL,
  `nim` int(10) NOT NULL,
  `judul1` text NOT NULL,
  `judul2` text NOT NULL,
  `judul3` text NOT NULL,
  `judul_kaprodi` text,
  `judul_akhir` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `judul_ta`
--

INSERT INTO `judul_ta` (`id_ta`, `nim`, `judul1`, `judul2`, `judul3`, `judul_kaprodi`, `judul_akhir`) VALUES
(1, 1505102099, 'Perancangan dan Pembuatan Portal Bimbingan Tugas Akhir Mahasiswa Politeknik Negeri Rahasia Berbasis Web', 'Perancangan dan Pembuatan Sistem Informasi Rekam Medis Praktek Dokter Berbasis Web', 'Perancangan dan Pembuatan Aplikasi Rekam Medis pada Praktek Dokter dengan Visual Basic', 'Perancangan dan Pembuatan Portal Bimbingan Tugas Akhir Mahasiswa Politeknik Negeri Rahasia Berbasis Web', 'Perancangan dan Pembuatan Portal Bimbingan Tugas Akhir Mahasiswa Politeknik Negeri Rahasia Berbasis Cloud'),
(3, 1405102097, 'Perancangan dan Pembuatan Sistem Informasi pada Sekolah Bhayangkari', 'Perancangan dan Pembuatan Portal Berita Disperindag', 'Perancangan dan Pembuatan Smarthome Berbasis Arduino', 'Perancangan dan Pembuatan Smarthome Berbasis Arduino', 'Perancangan dan Pembuatan Sistem Informasi pada Sekolah Bhayangkari Berbasis Cloud'),
(5, 1505101201, 'Perancangan dan Pembuatan Sistem Informasi Rekam Medis Berbasis Android', 'Perancangan dan Pembuatan Sistem Informasi Rekam Medis Berbasis Web', 'Perancangan dan Pembuatan Sistem Informasi Kantin Polmed Berbasis Android', 'Perancangan dan Pembuatan Sistem Informasi Kantin Polmed Berbasis Android', 'Perancangan dan Pembuatan Sistem Informasi Kantin Polmed Berbasis Android'),
(6, 1505102105, 'Perancangan dan Pembuatan Portal Bintalfisdis Berbasis Web', 'Perancangan dan Pembuatan Sistem Informasi Barang di Swalayan Berbasis Android', 'Perancangan dan Pembuatan Sistem Informasi Barang di Swalayan Berbasis Cloud', NULL, NULL),
(7, 1505102077, 'Perancangan dan Pembuatan Portal Berita Berbasis Web', 'Perancangan dan Pembuatan Portal Berita Disperindag Berbasis Cloud', 'Perancangan dan Pembuatan Portal Berita HMPS POLMED Berbasis Web', 'Perancangan dan Pembuatan Portal Berita Berbasis Web', 'Perancangan dan Pembuatan Portal Berita Berbasis Web'),
(8, 1505102124, 'Rancang Bangun Aplikasi Membaca Qur\'an Berbasis Android', 'Rancang Bangun Sistem Informasi Kantor Pajak Berbasis Web', 'Perancangan dan Pembuatan Website Disperindag Berbasis Cloud', 'Rancang Bangun Aplikasi Membaca Qur\'an Berbasis Android', 'Rancang Bangun Aplikasi Membaca Qur\'an Berbasis Android'),
(9, 1505102086, 'Perancangan dan Pembuatan Sistem Informasi Swalayan Berbasis Web', 'Perancangan dan Pembuatan Sistem Informasi Akademik Berbasis Web', 'Perancangan dan Pembuatan Sistem Informasi Sekolah Berbasis Cloud', NULL, NULL),
(10, 15051, 'Perancangan 1', 'Pembuatan', 'Portal', 'Pembuatan', NULL),
(11, 1223343212, 'Sistem Informasi Ternak', 'Sistem Informasi Mobil', 'Sistem Informasi SPP', 'Sistem Informasi SPP', 'Sistem Informasi SPP');

-- --------------------------------------------------------

--
-- Table structure for table `kaprodi`
--

CREATE TABLE `kaprodi` (
  `id_kaprodi` int(2) NOT NULL,
  `nm_kaprodi` varchar(50) NOT NULL,
  `nip_kaprodi` char(18) NOT NULL,
  `no_telp` char(12) DEFAULT NULL,
  `id_prodi` int(2) NOT NULL,
  `username` char(8) NOT NULL,
  `password` char(8) NOT NULL,
  `status_user` varchar(7) NOT NULL DEFAULT 'kaprodi'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kaprodi`
--

INSERT INTO `kaprodi` (`id_kaprodi`, `nm_kaprodi`, `nip_kaprodi`, `no_telp`, `id_prodi`, `username`, `password`, `status_user`) VALUES
(1, 'Alam Semesta, S.Kom. M.Kom.', '197608091997021001', '082334567891', 1, 'kaprodi', 'kaprodi', 'kaprodi'),
(10, 'Gerhana Bulan, M.T.', '19713338830001', '082274369581', 11, 'gerhana', 'gerhana', 'kaprodi');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(11) NOT NULL,
  `nm_mhs` varchar(30) NOT NULL,
  `th_bimbingan` year(4) NOT NULL,
  `id_prodi` int(2) NOT NULL,
  `id_dosen` int(3) NOT NULL,
  `foto` varchar(30) NOT NULL DEFAULT 'default.jpg',
  `username` char(10) NOT NULL,
  `password` char(10) NOT NULL,
  `status_user` varchar(9) NOT NULL DEFAULT 'mahasiswa'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nm_mhs`, `th_bimbingan`, `id_prodi`, `id_dosen`, `foto`, `username`, `password`, `status_user`) VALUES
(15051, 'Lina Watyna', 2018, 1, 13, 'Edit_pas.jpg', 'lina', 'lina', 'mahasiswa'),
(1223343212, 'Rando Kartiko', 2021, 1, 10, 'default.jpg', 'c029572f33', '062021', 'mahasiswa'),
(1234567892, 'Jaka Randona', 2021, 1, 10, 'default.jpg', 'c900d36552', '062021', 'mahasiswa'),
(1405102097, 'Ade Kakak', 2018, 1, 1, 'default.jpg', 'ade', 'ade', 'mahasiswa'),
(1505101201, 'Juni Sebelum Juli', 2018, 11, 9, 'jesica.JPG', 'juni', 'juni', 'mahasiswa'),
(1505102077, 'Bintang Kejora', 2018, 1, 1, 'jesica.JPG', 'e7bd7a24b2', '072018', 'mahasiswa'),
(1505102086, 'Asri Bumiku\r\n', 2018, 1, 10, '2.jpg', 'asri', 'asri', 'mahasiswa'),
(1505102099, 'Meylin Inside', 2018, 1, 1, 'hijab.jpg', 'mhs', 'mhs', 'mahasiswa'),
(1505102105, 'Bulan Purnama', 2018, 11, 7, 'default.jpg', 'bulan', 'bulan', 'mahasiswa'),
(1505102124, 'Mentari Panas', 2018, 1, 10, 'Pas-Foto-1.jpg', 'panas', 'panas', 'mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `pesan_tambahan`
--

CREATE TABLE `pesan_tambahan` (
  `id_pesantambahan` int(10) NOT NULL,
  `dosen_pengirim` int(3) NOT NULL,
  `mhs_penerima` int(10) NOT NULL,
  `topik_pesan` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `tgl` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan_tambahan`
--

INSERT INTO `pesan_tambahan` (`id_pesantambahan`, `dosen_pengirim`, `mhs_penerima`, `topik_pesan`, `pesan`, `tgl`) VALUES
(1, 1, 1505102099, 'Perbanyak materi UML di bab 2', 'Saya rasa materi UML kamu kurang lengkap. Tolong ditambahkan', '2018-08-02 00:30:03'),
(2, 1, 1405102097, 'Tambahkan penjelasan tentang cloud', 'Bab 2 kamu kurang jelas materi cloudnya.', '2018-08-02 00:33:02'),
(3, 7, 1505101201, 'Bab 3 salah dalam analisis', 'Tolong kamu perbaiki analisis di bab 3 kamu', '2018-08-02 17:14:02'),
(4, 1, 1505102099, 'Tambah desain perancangan', 'Tolong bab 3 dilengkapi bagian perancangannya', '2018-08-02 17:21:25'),
(7, 1, 1505102077, 'Analisis salah', 'Analisis kamu masih salah. Diperbaiki ya!', '2018-08-06 11:12:12'),
(8, 1, 1505102077, 'Lengkapi bagian abstrak', 'Abstrak kamu kurang jelas. Tolong diperbaiki', '2018-08-06 11:37:30'),
(9, 10, 1505102124, 'Judul dibuat lebih spesifik', 'Tolong diperjelas judulnya ya. Terlihat kurang spesifik.', '2018-08-07 12:45:47'),
(11, 13, 15051, 'Judul ok', 'ok', '2018-08-13 14:15:39'),
(13, 1, 1505102099, 'Bimbingan Terakhir', 'Selamat sidang yee', '2020-06-11 18:46:18'),
(14, 10, 1223343212, 'Lanjut bab2', 'bab2', '2021-06-14 17:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(2) NOT NULL,
  `nama_prodi` varchar(30) NOT NULL,
  `jenjang` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama_prodi`, `jenjang`) VALUES
(1, 'Manajemen Informatika', 'D-III'),
(10, 'Teknik Konversi Energi', 'D-III'),
(11, 'Teknik Mesin', 'D-III'),
(13, 'Teknik Elektronika', 'D-III'),
(14, 'Teknik Komputer', 'D-III'),
(16, 'Desain grafis', 'D-III');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id_subject` int(10) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `nim` int(10) NOT NULL,
  `status_bimbingan` varchar(20) NOT NULL,
  `tgl` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id_subject`, `subject`, `nim`, `status_bimbingan`, `tgl`) VALUES
(4, 'Pengajuan Judul', 1505102099, 'Bimbingan Judul', '2018-07-11 23:07:20'),
(5, 'Pengajuan Judul TA', 1405102097, 'Bimbingan Judul', '2018-07-13 00:18:52'),
(6, 'Pengajuan Proposal', 1505102099, 'Bimbingan 1', '2018-07-13 00:32:21'),
(8, 'Pengajuan Proposal', 1405102097, 'Bimbingan 1', '2018-07-13 15:44:03'),
(9, 'Revisi Proposal', 1505102099, 'Bimbingan 2', '2018-07-15 23:42:04'),
(10, 'Bab 2 Tinjauan Pustaka', 1505102099, 'Bimbingan 3', '2018-07-17 23:59:58'),
(11, 'Revisi Bab 2', 1505102099, 'Bimbingan 4', '2018-07-21 09:58:48'),
(12, 'Revisi Bab 2', 1505102099, 'Bimbingan 5', '2018-07-24 23:48:42'),
(13, 'Bab 3 Perancangan', 1505102099, 'Bimbingan 6', '2018-07-24 23:48:42'),
(14, 'Revisi Bab 3', 1505102099, 'Bimbingan 7', '2018-07-24 23:49:26'),
(15, 'Bab 4 Hasil dan Pembahasan', 1505102099, 'Bimbingan 8', '2018-07-24 23:49:26'),
(16, 'Revisi Bab 4', 1505102099, 'Bimbingan 9', '2018-07-24 23:50:09'),
(20, 'Pengajuan Judul', 1505101201, 'Bimbingan Judul', '2018-07-26 19:11:28'),
(24, 'Pengajuan Judul', 1505102105, 'Bimbingan Judul', '2018-07-27 10:08:34'),
(26, 'Bab 5 Kesimpulan', 1505102099, 'Bimbingan 10', '2018-07-27 10:13:56'),
(27, 'Pengajuan Judul Akhir', 1505102077, 'Bimbingan Judul', '2018-07-27 22:35:55'),
(28, 'Konsultasi mengenai judul terpilih', 1505102124, 'Bimbingan Judul', '2018-08-07 12:19:52'),
(29, 'Pengajuan Proposal', 1505101201, 'Bimbingan 1', '2018-08-09 00:42:00'),
(30, 'Pengajuan Proposal', 1505102124, 'Bimbingan 1', '2018-08-09 00:51:56'),
(31, 'Pengajuan Judul', 15051, 'Bimbingan Judul', '2018-08-13 14:10:22'),
(32, 'kk', 15051, 'Bimbingan 1', '2021-06-14 17:34:16'),
(33, 'BAB 1', 1223343212, 'Bimbingan 1', '2021-06-14 17:40:51'),
(34, 'BAB 2', 1223343212, 'Bimbingan 2', '2021-06-14 17:44:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_prodi`
--
ALTER TABLE `admin_prodi`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `chat_mhs`
--
ALTER TABLE `chat_mhs`
  ADD PRIMARY KEY (`id_chatmhs`),
  ADD KEY `dosen_penerima` (`dosen_penerima`),
  ADD KEY `mhs_pengirim` (`mhs_pengirim`),
  ADD KEY `id_subject` (`id_subject`);

--
-- Indexes for table `comment_bimbingan`
--
ALTER TABLE `comment_bimbingan`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_chatmhs` (`id_chatmhs`);

--
-- Indexes for table `comment_tambahan`
--
ALTER TABLE `comment_tambahan`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_pesantambahan` (`id_pesantambahan`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `evaluasi`
--
ALTER TABLE `evaluasi`
  ADD PRIMARY KEY (`id_evaluasi`),
  ADD KEY `nim_mhs` (`nim_mhs`);

--
-- Indexes for table `file_mahasiswa`
--
ALTER TABLE `file_mahasiswa`
  ADD PRIMARY KEY (`id_file`),
  ADD KEY `mhs_pengirim` (`mhs_pengirim`),
  ADD KEY `id_subject` (`id_subject`);

--
-- Indexes for table `judul_ta`
--
ALTER TABLE `judul_ta`
  ADD PRIMARY KEY (`id_ta`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `kaprodi`
--
ALTER TABLE `kaprodi`
  ADD PRIMARY KEY (`id_kaprodi`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `pesan_tambahan`
--
ALTER TABLE `pesan_tambahan`
  ADD PRIMARY KEY (`id_pesantambahan`),
  ADD KEY `dosen_pengirim` (`dosen_pengirim`),
  ADD KEY `mhs_penerima` (`mhs_penerima`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id_subject`),
  ADD KEY `nim` (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_prodi`
--
ALTER TABLE `admin_prodi`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `chat_mhs`
--
ALTER TABLE `chat_mhs`
  MODIFY `id_chatmhs` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `comment_bimbingan`
--
ALTER TABLE `comment_bimbingan`
  MODIFY `id_comment` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `comment_tambahan`
--
ALTER TABLE `comment_tambahan`
  MODIFY `id_comment` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `evaluasi`
--
ALTER TABLE `evaluasi`
  MODIFY `id_evaluasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `file_mahasiswa`
--
ALTER TABLE `file_mahasiswa`
  MODIFY `id_file` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `judul_ta`
--
ALTER TABLE `judul_ta`
  MODIFY `id_ta` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kaprodi`
--
ALTER TABLE `kaprodi`
  MODIFY `id_kaprodi` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pesan_tambahan`
--
ALTER TABLE `pesan_tambahan`
  MODIFY `id_pesantambahan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id_subject` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_prodi`
--
ALTER TABLE `admin_prodi`
  ADD CONSTRAINT `admin_prodi_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`);

--
-- Constraints for table `chat_mhs`
--
ALTER TABLE `chat_mhs`
  ADD CONSTRAINT `chat_mhs_ibfk_2` FOREIGN KEY (`dosen_penerima`) REFERENCES `dosen` (`id_dosen`),
  ADD CONSTRAINT `chat_mhs_ibfk_3` FOREIGN KEY (`mhs_pengirim`) REFERENCES `mahasiswa` (`nim`),
  ADD CONSTRAINT `chat_mhs_ibfk_4` FOREIGN KEY (`id_subject`) REFERENCES `subject` (`id_subject`);

--
-- Constraints for table `comment_bimbingan`
--
ALTER TABLE `comment_bimbingan`
  ADD CONSTRAINT `comment_bimbingan_ibfk_1` FOREIGN KEY (`id_chatmhs`) REFERENCES `chat_mhs` (`id_chatmhs`);

--
-- Constraints for table `comment_tambahan`
--
ALTER TABLE `comment_tambahan`
  ADD CONSTRAINT `comment_tambahan_ibfk_1` FOREIGN KEY (`id_pesantambahan`) REFERENCES `pesan_tambahan` (`id_pesantambahan`);

--
-- Constraints for table `evaluasi`
--
ALTER TABLE `evaluasi`
  ADD CONSTRAINT `evaluasi_ibfk_1` FOREIGN KEY (`nim_mhs`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `file_mahasiswa`
--
ALTER TABLE `file_mahasiswa`
  ADD CONSTRAINT `file_mahasiswa_ibfk_3` FOREIGN KEY (`mhs_pengirim`) REFERENCES `mahasiswa` (`nim`),
  ADD CONSTRAINT `file_mahasiswa_ibfk_4` FOREIGN KEY (`id_subject`) REFERENCES `subject` (`id_subject`);

--
-- Constraints for table `judul_ta`
--
ALTER TABLE `judul_ta`
  ADD CONSTRAINT `judul_ta_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `kaprodi`
--
ALTER TABLE `kaprodi`
  ADD CONSTRAINT `kaprodi_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`),
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`);

--
-- Constraints for table `pesan_tambahan`
--
ALTER TABLE `pesan_tambahan`
  ADD CONSTRAINT `pesan_tambahan_ibfk_1` FOREIGN KEY (`dosen_pengirim`) REFERENCES `dosen` (`id_dosen`),
  ADD CONSTRAINT `pesan_tambahan_ibfk_2` FOREIGN KEY (`mhs_penerima`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);
