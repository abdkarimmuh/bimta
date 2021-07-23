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
(1, 'Rizal Inside', '082274369581', 1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `chat_mhs`
--

CREATE TABLE `chat_mhs` (
  `id_chatmhs` int(11) NOT NULL,
  `dosen_penerima` int(3) NOT NULL,
  `mhs_pengirim` varchar(10) NOT NULL,
  `id_subject` int(10) NOT NULL,
  `topik_pesan` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `tgl` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_mhs`
--

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
(1, '197808091997021001', 'Dosen Pembimbing 1', '08170513214', 'dospem1', 'dosen', 'dosen'),
(2, '199812141986031002', 'Dosen Pembimbing 2', '085274369585','dospem2', 'dosen', 'dosen');

-- --------------------------------------------------------

--
-- Table structure for table `evaluasi`
--

CREATE TABLE `evaluasi` (
  `id_evaluasi` int(10) NOT NULL,
  `nim_mhs` varchar(10) NOT NULL,
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


-- --------------------------------------------------------

--
-- Table structure for table `file_mahasiswa`
--

CREATE TABLE `file_mahasiswa` (
  `id_file` int(10) NOT NULL,
  `file` varchar(1000) NOT NULL,
  `type` varchar(20) NOT NULL,
  `size` int(10) NOT NULL,
  `mhs_pengirim` varchar(10) NOT NULL,
  `id_subject` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_mahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `judul_ta`
--

CREATE TABLE `judul_ta` (
  `id_ta` int(5) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `judul1` text NOT NULL,
  `judul2` text NOT NULL,
  `judul3` text NOT NULL,
  `judul_kaprodi` text,
  `judul_akhir` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `judul_ta`
--

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
(1, 'Kepala Program Studi BM', '197608091997021001', '082334567891', 1, 'kaprodi', 'kaprodi', 'kaprodi');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(10) NOT NULL,
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
('4317030005', 'Mahasiswa 1', 2018, 1, 1, 'Edit_pas.jpg', 'mahasiswa1', 'mahasiswa', 'mahasiswa'),
('9999999999', 'Mahasiswa 2', 2021, 1, 2, 'default.jpg', 'mahasiswa2', 'mahasiswa', 'mahasiswa');
-- --------------------------------------------------------

--
-- Table structure for table `pesan_tambahan`
--

CREATE TABLE `pesan_tambahan` (
  `id_pesantambahan` int(10) NOT NULL,
  `dosen_pengirim` int(3) NOT NULL,
  `mhs_penerima` varchar(10) NOT NULL,
  `topik_pesan` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `tgl` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan_tambahan`
--

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
(1, 'Broadband Multimedia', 'D-IV');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id_subject` int(10) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `status_bimbingan` varchar(20) NOT NULL,
  `tgl` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

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
