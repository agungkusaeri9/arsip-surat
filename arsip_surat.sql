-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 08, 2023 at 04:02 AM
-- Server version: 5.7.39-0ubuntu0.18.04.2
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arsip_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposisi_surat`
--

CREATE TABLE `disposisi_surat` (
  `id_disposisi` int(11) NOT NULL,
  `id_surat_masuk` int(11) NOT NULL,
  `id_klasifikasi` int(11) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `id_sifat_surat` int(11) NOT NULL,
  `batas_waktu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi`
--

CREATE TABLE `klasifikasi` (
  `id_klasifikasi` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `klasifikasi`
--

INSERT INTO `klasifikasi` (`id_klasifikasi`, `nama`, `jabatan`) VALUES
(1, '1112', '11112');

-- --------------------------------------------------------

--
-- Table structure for table `sifat_surat`
--

CREATE TABLE `sifat_surat` (
  `id_sifat_surat` int(11) NOT NULL,
  `sifat_surat` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sifat_surat`
--

INSERT INTO `sifat_surat` (`id_sifat_surat`, `sifat_surat`) VALUES
(1, 'Rahasia');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(11) NOT NULL,
  `judul_surat` varchar(100) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `tempat_waktu` varchar(100) NOT NULL,
  `tanggal_dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id_surat`, `judul_surat`, `nomor_surat`, `isi`, `tempat_waktu`, `tanggal_dibuat`) VALUES
(1, 'SURAT KETERANGAN AKTIF MENGAJAR SEMESTER 1 TAHUNPELAJARAN 2022/2023', '800/ 28/418.20.1.72.10.04 /2022', '<p>Yang bertanda tangan di bawah ini :<br />\r\nNama&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: DIDIK KRISDIANTO,S.Pd.SD<br />\r\nNIP Pangkat/Gol. Ruang&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: 19810508 201001 1 021 Penata TK 1 / IIId<br />\r\nJabatan&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Kepala Sekolah<br />\r\nUnit Kerja&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:&nbsp;SDN Kalipang 4</p>\r\n\r\n<p>Menerangkan dengan sebenarnya, bahwa :<br />\r\nNama&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: ADI PRAYOGO,S.Pd<br />\r\nNIP Pangkat/Gol. Ruang&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: 19821027201408 1 001 Penata Muda TK1 / III b<br />\r\nUnit Kerja&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: SDN Kalipang 4</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Adalah benar-benar aktif melaksanakan tugas tatap muka penuh 24 jam per minggu sesuai SK Pembagian Belajar Mengajar (PBM) Semester I Tahun Pelajaran 2022/2023. Saya menjamin kebenaran dan bertanggungjawab penuh serta siap diberikan sanksi baik administrasif maupun pidana jika ditemukan ketidakbenaran atas hal tersebut diatas. Demikian surat keterangan ini dibuat dengan sesungguhnya dan sebenar-benarnya serta dapat dipergunakan sebagai dasar proses verifikasi keaktifan dan pengusulan SK Tunjangan Profesi Semester 2 Tahun 2022.</p>\r\n', 'Kediri, 12 Desember 2022', '2023-03-07 22:29:50');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_surat_keluar` int(11) NOT NULL,
  `no_agenda` int(11) NOT NULL,
  `pengirim` varchar(50) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_surat_keluar`, `no_agenda`, `pengirim`, `no_surat`, `isi`, `tanggal_surat`, `tanggal_diterima`, `keterangan`, `file`) VALUES
(1, 11, '11', '123', '113', '2023-01-13', '2023-01-14', '11', 'Sertifikat_Kompetensi_dan_Penghargaan.pdf'),
(2, 234234, 'asdfgasd', '12', 'gasdgasd', '2023-01-27', '2023-01-26', 'asdfasdfasd', ''),
(5, 23123, 'sdasdgf', '12312', 'asdgfasdgasdgasdfgasd', '2023-01-28', '2023-01-18', 'asdfasdg', ''),
(6, 23423, 'asdgasd', 'g123123', 'asdgsdgsdgasdg', '2023-01-27', '2023-01-25', 'asdgasdgasdg', 'SPTJM_Mahasiswa_MSIB_Angkatan_4_(1)_(1).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_surat_masuk` int(11) NOT NULL,
  `no_agenda` int(11) NOT NULL,
  `pengirim` varchar(50) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_surat_masuk`, `no_agenda`, `pengirim`, `no_surat`, `isi`, `tanggal_surat`, `tanggal_diterima`, `keterangan`, `file`) VALUES
(1, 223121, 'asdfasd13', '123121', 'asdfasdfasdfasd1', '2023-01-20', '2023-01-18', 'asdfasdfasd', ''),
(3, 12312, 'asdf', 'asdfasd', 'gasdgasdgasdgasdg', '2023-01-18', '2023-01-19', 'asdfasdfasdf', ''),
(4, 21412, 'agasdg', '12312312', 'asegsadgasdg', '2023-01-21', '2023-02-02', 'asdfasdfsd', 'Piagam_Penghargaan_Agung_Kusaeri-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin') NOT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `level`, `gambar`) VALUES
(1, 'Admin 2', 'admin', '$2a$12$BNxPbfpIx22cyheY7BOZS.1OZJgpH5Dqbt03xSu1brqAb3eNWMgAq', 'admin', ''),
(8, 'asdfasdfasdf', 'asdfasdfasd', '$2y$10$upAQX3P2o/YhvT57in39IOE/qYYr0h6SOmpna8cKGDJrQT0ZhmWwu', 'admin', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisi_surat`
--
ALTER TABLE `disposisi_surat`
  ADD PRIMARY KEY (`id_disposisi`),
  ADD KEY `id_sifat_surat` (`id_sifat_surat`),
  ADD KEY `id_klasifikasi` (`id_klasifikasi`),
  ADD KEY `id_surat_masuk` (`id_surat_masuk`);

--
-- Indexes for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD PRIMARY KEY (`id_klasifikasi`);

--
-- Indexes for table `sifat_surat`
--
ALTER TABLE `sifat_surat`
  ADD PRIMARY KEY (`id_sifat_surat`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_surat_keluar`),
  ADD UNIQUE KEY `no_surat` (`no_surat`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_surat_masuk`),
  ADD UNIQUE KEY `no_surat` (`no_surat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disposisi_surat`
--
ALTER TABLE `disposisi_surat`
  MODIFY `id_disposisi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
  MODIFY `id_klasifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sifat_surat`
--
ALTER TABLE `sifat_surat`
  MODIFY `id_sifat_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_surat_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_surat_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
