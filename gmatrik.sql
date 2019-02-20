-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2019 at 11:13 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gmatrik`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminmatrikulasi`
--

CREATE TABLE `adminmatrikulasi` (
  `id_adminmatrikulasi` int(5) NOT NULL,
  `id_user` int(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminmatrikulasi`
--

INSERT INTO `adminmatrikulasi` (`id_adminmatrikulasi`, `id_user`, `nama`, `gender`) VALUES
(1, 1, 'Derry', 'Ikhwan');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pulang`
--

CREATE TABLE `jadwal_pulang` (
  `id_pekan` int(4) NOT NULL,
  `tanggal` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `shubuh` int(1) NOT NULL,
  `dzuhur` int(1) NOT NULL,
  `ashar` int(1) NOT NULL,
  `maghrib` int(1) NOT NULL,
  `isya` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(8) NOT NULL,
  `id_user` int(6) NOT NULL,
  `id_pembina` int(5) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `angkatan` int(2) NOT NULL,
  `kota_asal` varchar(25) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `id_user`, `id_pembina`, `nama`, `gender`, `angkatan`, `kota_asal`, `telepon`, `aktif`) VALUES
(18101001, 375, 13, 'Tia Nurafifah Handayani', 'Akhwat', 18, 'Bekasi', '0857978676', 1),
(18101020, 233, 8, 'Muhammad Ala Zuhair', 'Ikhwan', 18, 'Bogor', '08966854698', 1),
(18101023, 108, 8, 'Daffa Febrian Putra Ram', 'Ikhwan', 18, 'Jakarta', '08966852735', 1),
(18101041, 394, 8, 'Yusuf Ahmad En', 'Ikhwan', 18, 'Palembang', '08529706823', 1),
(18101046, 120, 15, 'Dimas Rizky Satria', 'Ikhwan', 18, 'Serang', '081287333357', 1),
(18101066, 159, 13, 'Ghaissani Nursabrina Wi', 'Akhwat', 18, 'Malang', '08968673943', 1),
(18101069, 243, 8, 'Muhammad Farras', 'Ikhwan', 18, 'Bandung', '08966876358', 1),
(18101078, 218, 13, 'Maulidisya Aulia Fahmi', 'Akhwat', 18, 'Yogyakarta', '08575856723', 1),
(18101098, 117, 14, 'Dilla Vindi Jhelvita', 'Akhwat', 18, 'Yogyakarta', '08953443210', 1),
(18101118, 64, 14, 'Amanda Dwi Noviyanti', 'Akhwat', 18, 'Bogor', '081288169582', 1),
(18101136, 213, 8, 'M Inggi Pratama', 'Ikhwan', 18, 'Depok', '08966825743', 1),
(18101139, 212, 8, 'M Habibullah Harahap', 'Ikhwan', 18, 'Kediri', '085785468485', 1),
(18101140, 174, 13, 'Hasna Salsabila', 'Akhwat', 18, 'Depok', '0894325794', 1),
(18101181, 145, 15, 'Farras Nurkamal', 'Ikhwan', 18, 'Bekasi', '082297010986', 1),
(18101182, 172, 13, 'Hanifah', 'Akhwat', 18, 'Makasar', '08546747564', 1),
(18101194, 26, 15, 'Abdullah Difa', 'Ikhwan', 18, 'Bogor', '085882251605', 1),
(18101195, 340, 13, 'Salsabila Dwiayu Fajria', 'Akhwat', 18, 'Bogor', '081869851', 1),
(18102002, 89, 13, 'Asfa Asfia', 'Akhwat', 18, 'Banten', '08189809721', 1),
(18102017, 90, 8, 'Athfali Muhamad Rahman', 'Ikhwan', 18, 'Banten', '089235674356', 1),
(18102042, 50, 15, 'Akbar Kurnia Reqil', 'Ikhwan', 18, 'Bogor', '089662741271', 1),
(18102048, 147, 13, 'Fatimah Amirah Sayiva', 'Akhwat', 18, 'Bogor', '085768576453', 1),
(18102074, 133, 13, 'Fadhilah Istiqamah', 'Akhwat', 18, 'Bandung', '08966874908', 1),
(18103005, 24, 15, 'Abdul Rozak Sidiq', 'Ikhwan', 18, 'Tangerang', '081210874137', 1),
(18103006, 277, 13, 'Nafisah Rahma Novanti', 'Akhwat', 18, 'Bandung', '0898769878', 1),
(18103007, 92, 15, 'Aulia Raihan Hafiz', 'Ikhwan', 18, 'Sukabumi', '082110903414', 1),
(18103013, 38, 15, 'Agisni Abimanyu', 'Ikhwan', 18, 'Bogor', '081312963045', 1),
(18103023, 124, 13, 'Dwi Sintia Wiranti', 'Akhwat', 18, 'Manado', '08937962535', 1),
(18103028, 189, 13, 'Intan Noor Savitri', 'Akhwat', 18, 'Makasar', '08579862212', 1),
(18103033, 30, 13, 'Ade Nurul Hita Alfiani', 'Akhwat', 18, 'Bandung', '08966510872', 1),
(18103072, 365, 13, 'Sulistina', 'Akhwat', 18, 'Bogor', '0857857465', 1),
(18103073, 206, 14, 'Lisa Monika', 'Akhwat', 18, 'Belitung', '083179038439', 1),
(18104001, 84, 8, 'Ari Dezan Alfarishi', 'Ikhwan', 18, 'Bandung', '08966510872', 1),
(18104002, 270, 14, 'Nabila Azzahra', 'Akhwat', 18, 'Dumai', '081319210286', 1),
(18104019, 162, 13, 'Gira Arinta', 'Akhwat', 18, 'Bogor', '0854754286', 1),
(18104021, 207, 14, 'Listia Fitriani Lestari', 'Akhwat', 18, 'Belitung', '085769389264', 1),
(18108006, 113, 14, 'Dewi Sartika Wokanubun', 'Akhwat', 18, 'Papua', '082239642466', 1),
(18108017, 291, 13, 'Nurhasana Puarada', 'Akhwat', 18, 'Bandung', '08966874823', 1),
(18108021, 95, 14, 'Ayu Astianti', 'Akhwat', 18, 'Papua', '085774848185', 1),
(18108024, 294, 13, 'Nursia Rumain', 'Akhwat', 18, 'Bengkulu', '0852896654', 1),
(18108025, 290, 13, 'Nurhabibah Werfete', 'Akhwat', 18, 'Lampung', '0856474665', 1),
(181040017, 286, 13, 'Nur Hafizah', 'Akhwat', 18, 'Bogor', '0894078267', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pekan`
--

CREATE TABLE `pekan` (
  `id_pekan` int(5) NOT NULL,
  `pekan` int(2) NOT NULL,
  `id_semester` int(1) NOT NULL,
  `tanggal_dari` date NOT NULL,
  `tanggal_sampai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pekan`
--

INSERT INTO `pekan` (`id_pekan`, `pekan`, `id_semester`, `tanggal_dari`, `tanggal_sampai`) VALUES
(1, 1, 1, '2018-09-21', '2018-09-27'),
(2, 2, 1, '2018-09-28', '2018-10-04'),
(3, 3, 1, '2018-10-05', '2018-10-11'),
(4, 4, 1, '2018-10-12', '2018-10-18'),
(5, 5, 1, '2018-10-19', '2018-10-25'),
(6, 6, 1, '2018-10-26', '2018-11-01'),
(7, 7, 1, '2018-11-02', '2018-11-08'),
(8, 8, 1, '2018-11-09', '2018-11-15'),
(9, 9, 1, '2018-11-16', '2018-11-22'),
(10, 10, 1, '2018-11-23', '2018-11-29'),
(11, 11, 1, '2018-11-30', '2018-12-06'),
(12, 12, 1, '2018-12-07', '2018-12-13'),
(13, 13, 1, '2018-12-14', '2018-12-20'),
(14, 14, 1, '2018-12-21', '2018-12-27'),
(15, 15, 1, '2018-12-28', '2019-01-03'),
(16, 16, 1, '2019-01-04', '2019-01-10');

-- --------------------------------------------------------

--
-- Table structure for table `pembina_mahasiswa`
--

CREATE TABLE `pembina_mahasiswa` (
  `id_pembina` int(5) NOT NULL,
  `id_user` int(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gelar` varchar(10) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `kota_asal` varchar(25) NOT NULL,
  `telepon` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembina_mahasiswa`
--

INSERT INTO `pembina_mahasiswa` (`id_pembina`, `id_user`, `nama`, `gelar`, `gender`, `kota_asal`, `telepon`) VALUES
(8, 11, 'Rizki Akbar Choirullah', 'S.E.I', 'Ikhwan', 'Bandung', '08966510872'),
(13, 16, 'Lilik Hardianti', 'S.Si', 'Akhwat', 'Bogor', '08966517243'),
(14, 403, 'Alfrida Yulistia', 'S.E', 'Akhwat', 'Lampung', '085283923563'),
(15, 411, 'Moh. Bintang Pamuncak', 'S.E.I', 'Ikhwan', 'Jakarta', '08864257341');

-- --------------------------------------------------------

--
-- Table structure for table `pimpinan`
--

CREATE TABLE `pimpinan` (
  `id_pimpinan` int(5) NOT NULL,
  `id_user` int(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `jabatan` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pimpinan`
--

INSERT INTO `pimpinan` (`id_pimpinan`, `id_user`, `nama`, `gender`, `jabatan`) VALUES
(1, 4, 'Hasan Ishaq', 'Ikhwan', 'Kepala Matrikulasi'),
(2, 402, 'Arip Rahman', 'Ikhwan', 'Wakil Kepala Matrikulasi');

-- --------------------------------------------------------

--
-- Table structure for table `presensi_shalat`
--

CREATE TABLE `presensi_shalat` (
  `nim` int(8) NOT NULL,
  `id_pekan` int(4) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `shubuh` int(1) DEFAULT NULL,
  `dzuhur` int(1) DEFAULT NULL,
  `ashar` int(1) DEFAULT NULL,
  `maghrib` int(1) DEFAULT NULL,
  `isya` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `presensi_tahsin`
--

CREATE TABLE `presensi_tahsin` (
  `id_tahsin` int(5) NOT NULL,
  `nim` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `presensi_talim`
--

CREATE TABLE `presensi_talim` (
  `id_talim` int(5) NOT NULL,
  `nim` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id_semester` int(3) NOT NULL,
  `angkatan` int(2) NOT NULL,
  `semester` int(1) NOT NULL,
  `tanggal_dari` date NOT NULL,
  `tanggal_sampai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id_semester`, `angkatan`, `semester`, `tanggal_dari`, `tanggal_sampai`) VALUES
(1, 18, 1, '2018-09-17', '2019-01-13');

-- --------------------------------------------------------

--
-- Table structure for table `tahsin`
--

CREATE TABLE `tahsin` (
  `id_tahsin` int(5) NOT NULL,
  `id_pekan` int(5) NOT NULL,
  `id_pembina` int(5) NOT NULL,
  `tahsin` varchar(14) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `talim`
--

CREATE TABLE `talim` (
  `id_talim` int(5) NOT NULL,
  `id_pekan` int(4) NOT NULL,
  `id_pembina` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `udzur_shalat`
--

CREATE TABLE `udzur_shalat` (
  `id_udzur` int(8) NOT NULL,
  `id_pekan` int(4) NOT NULL,
  `nim` int(8) NOT NULL,
  `tanggal` date NOT NULL,
  `shubuh` int(1) NOT NULL,
  `dzuhur` int(1) NOT NULL,
  `ashar` int(1) NOT NULL,
  `maghrib` int(1) NOT NULL,
  `isya` int(1) NOT NULL,
  `udzur` varchar(12) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `diajukan` datetime NOT NULL,
  `disetujui` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `udzur_tahsin`
--

CREATE TABLE `udzur_tahsin` (
  `id_udzur` int(8) NOT NULL,
  `id_tahsin` int(5) NOT NULL,
  `nim` int(8) NOT NULL,
  `udzur` varchar(12) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `diajukan` datetime NOT NULL,
  `disetujui` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `udzur_talim`
--

CREATE TABLE `udzur_talim` (
  `id_udzur` int(8) NOT NULL,
  `id_talim` int(5) NOT NULL,
  `nim` int(8) NOT NULL,
  `udzur` varchar(12) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `diajukan` datetime NOT NULL,
  `disetujui` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(6) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `password_default` int(1) NOT NULL,
  `level` int(1) NOT NULL,
  `terakhir_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `password_default`, `level`, `terakhir_login`) VALUES
(1, 'adminmatrik', 'bismillah', 0, 1, '2019-02-20 16:28:03'),
(3, '18000372', 'mahasiswa123', 0, 3, NULL),
(4, 'hasan', 'hasan123', 0, 4, '2019-02-19 10:30:01'),
(11, 'Rizki', 'akbar123', 0, 2, '2019-02-20 16:28:51'),
(16, 'Lilik', 'lilik123', 0, 2, '2019-02-10 08:40:31'),
(24, '18103005', 'jVDD9568nl', 1, 3, NULL),
(26, '18101194', '39IejNY0kq', 1, 3, NULL),
(30, '18103033', '802l94FVUt', 1, 3, '2019-02-07 07:53:01'),
(38, '18103013', 'pPw1XREMme', 1, 3, NULL),
(50, '18102042', '100hIQYyLz', 1, 3, '2019-02-19 06:41:34'),
(64, '18101118', '5v22Nv208J', 1, 3, '2019-02-20 16:30:13'),
(84, '18104001', '8M3303OD89', 1, 3, '2019-02-10 08:27:30'),
(89, '18102002', 'hY59zE12Oq', 1, 3, NULL),
(90, '18102017', 'dzVub7u04C', 1, 3, NULL),
(92, '18103007', 'JW13awB5JB', 1, 3, NULL),
(95, '18108021', '26XEGr3XBn', 1, 3, NULL),
(108, '18101023', 'vNIwc0P5FG', 1, 3, NULL),
(113, '18108006', 'u001gi64sV', 1, 3, NULL),
(117, '18101098', 'SM9JF80JQ7', 1, 3, NULL),
(120, '18101046', '9J9QM4320f', 1, 3, NULL),
(124, '18103023', 'I2p5X8R5Xw', 1, 3, NULL),
(133, '18102074', 'fH8YLL5aKe', 1, 3, '2019-02-03 06:52:28'),
(145, '18101181', 'b1ltrtev28', 1, 3, NULL),
(147, '18102048', 'XqgJ6wBuCZ', 1, 3, '2019-02-03 11:21:52'),
(159, '18101066', 'c9c0k93901', 1, 3, NULL),
(162, '18104019', 'DPo42Hax7H', 1, 3, '2019-02-03 11:26:16'),
(172, '18101182', '3VJh68c15j', 1, 3, NULL),
(174, '18101140', 'E53AHR5Tj8', 1, 3, NULL),
(189, '18103028', 'I3wVBUF07K', 1, 3, NULL),
(206, '18103073', 'SdVgCna1b0', 1, 3, '2019-02-19 06:47:46'),
(207, '18104021', '8r2i4Azy17', 1, 3, NULL),
(212, '18101139', 'RiAQ1cfEUx', 1, 3, NULL),
(213, '18101136', '291xQ1I6xV', 1, 3, NULL),
(218, '18101078', 'Fi28E7SI1u', 1, 3, NULL),
(233, '18101020', 'tMd9N7Ma00', 1, 3, NULL),
(243, '18101069', '4Fl5MtX989', 1, 3, NULL),
(270, '18104002', 'pg5HceCpzz', 1, 3, NULL),
(277, '18103006', 'j91NOeunU7', 1, 3, NULL),
(286, '181040017', '8hAF36RLOQ', 1, 3, NULL),
(290, '18108025', 'y9DKGpWy8V', 1, 3, NULL),
(291, '18108017', 'ixf3g25KLX', 1, 3, NULL),
(294, '18108024', 'RyMr3vGSat', 1, 3, '2019-02-10 08:39:20'),
(340, '18101195', '90j9Z7fJDb', 1, 3, NULL),
(365, '18103072', '4sBnXqp23d', 1, 3, NULL),
(375, '18101001', 'R75obhKivZ', 1, 3, NULL),
(394, '18101041', '5Dr26i6LV9', 1, 3, NULL),
(402, 'ariprahman', 'ariprahman123', 0, 4, '2019-02-19 09:48:52'),
(403, 'alfrida', 'alfrida123', 0, 2, '2019-02-20 16:30:55'),
(411, 'bintang', 'bintang123', 0, 2, '2019-02-19 10:46:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminmatrikulasi`
--
ALTER TABLE `adminmatrikulasi`
  ADD PRIMARY KEY (`id_adminmatrikulasi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `jadwal_pulang`
--
ALTER TABLE `jadwal_pulang`
  ADD KEY `id_pekan` (`id_pekan`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD UNIQUE KEY `id_user_2` (`id_user`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pembina` (`id_pembina`);

--
-- Indexes for table `pekan`
--
ALTER TABLE `pekan`
  ADD PRIMARY KEY (`id_pekan`),
  ADD KEY `id_semester` (`id_semester`);

--
-- Indexes for table `pembina_mahasiswa`
--
ALTER TABLE `pembina_mahasiswa`
  ADD PRIMARY KEY (`id_pembina`),
  ADD UNIQUE KEY `id_user_2` (`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pimpinan`
--
ALTER TABLE `pimpinan`
  ADD PRIMARY KEY (`id_pimpinan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `presensi_shalat`
--
ALTER TABLE `presensi_shalat`
  ADD KEY `nim` (`nim`),
  ADD KEY `id_pekan` (`id_pekan`);

--
-- Indexes for table `presensi_tahsin`
--
ALTER TABLE `presensi_tahsin`
  ADD KEY `id_tahsin` (`id_tahsin`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `presensi_talim`
--
ALTER TABLE `presensi_talim`
  ADD KEY `id_talim` (`id_talim`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indexes for table `tahsin`
--
ALTER TABLE `tahsin`
  ADD PRIMARY KEY (`id_tahsin`),
  ADD KEY `id_pekan` (`id_pekan`),
  ADD KEY `id_pembina` (`id_pembina`);

--
-- Indexes for table `talim`
--
ALTER TABLE `talim`
  ADD PRIMARY KEY (`id_talim`),
  ADD KEY `id_pekan` (`id_pekan`),
  ADD KEY `id_pembina` (`id_pembina`);

--
-- Indexes for table `udzur_shalat`
--
ALTER TABLE `udzur_shalat`
  ADD PRIMARY KEY (`id_udzur`),
  ADD KEY `id_pekan` (`id_pekan`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `udzur_tahsin`
--
ALTER TABLE `udzur_tahsin`
  ADD PRIMARY KEY (`id_udzur`),
  ADD KEY `id_tahsin` (`id_tahsin`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `udzur_talim`
--
ALTER TABLE `udzur_talim`
  ADD PRIMARY KEY (`id_udzur`),
  ADD KEY `id_talim` (`id_talim`),
  ADD KEY `nim` (`nim`);

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
-- AUTO_INCREMENT for table `adminmatrikulasi`
--
ALTER TABLE `adminmatrikulasi`
  MODIFY `id_adminmatrikulasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pekan`
--
ALTER TABLE `pekan`
  MODIFY `id_pekan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `pembina_mahasiswa`
--
ALTER TABLE `pembina_mahasiswa`
  MODIFY `id_pembina` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `pimpinan`
--
ALTER TABLE `pimpinan`
  MODIFY `id_pimpinan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id_semester` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tahsin`
--
ALTER TABLE `tahsin`
  MODIFY `id_tahsin` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `talim`
--
ALTER TABLE `talim`
  MODIFY `id_talim` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `udzur_shalat`
--
ALTER TABLE `udzur_shalat`
  MODIFY `id_udzur` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `udzur_tahsin`
--
ALTER TABLE `udzur_tahsin`
  MODIFY `id_udzur` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `udzur_talim`
--
ALTER TABLE `udzur_talim`
  MODIFY `id_udzur` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=431;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `adminmatrikulasi`
--
ALTER TABLE `adminmatrikulasi`
  ADD CONSTRAINT `adminmatrikulasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `jadwal_pulang`
--
ALTER TABLE `jadwal_pulang`
  ADD CONSTRAINT `jadwal_pulang_ibfk_1` FOREIGN KEY (`id_pekan`) REFERENCES `pekan` (`id_pekan`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`id_pembina`) REFERENCES `pembina_mahasiswa` (`id_pembina`);

--
-- Constraints for table `pekan`
--
ALTER TABLE `pekan`
  ADD CONSTRAINT `pekan_ibfk_1` FOREIGN KEY (`id_semester`) REFERENCES `semester` (`id_semester`);

--
-- Constraints for table `pembina_mahasiswa`
--
ALTER TABLE `pembina_mahasiswa`
  ADD CONSTRAINT `pembina_mahasiswa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `pimpinan`
--
ALTER TABLE `pimpinan`
  ADD CONSTRAINT `pimpinan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `presensi_shalat`
--
ALTER TABLE `presensi_shalat`
  ADD CONSTRAINT `presensi_shalat_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`),
  ADD CONSTRAINT `presensi_shalat_ibfk_2` FOREIGN KEY (`id_pekan`) REFERENCES `pekan` (`id_pekan`);

--
-- Constraints for table `presensi_tahsin`
--
ALTER TABLE `presensi_tahsin`
  ADD CONSTRAINT `presensi_tahsin_ibfk_1` FOREIGN KEY (`id_tahsin`) REFERENCES `tahsin` (`id_tahsin`),
  ADD CONSTRAINT `presensi_tahsin_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `presensi_talim`
--
ALTER TABLE `presensi_talim`
  ADD CONSTRAINT `presensi_talim_ibfk_1` FOREIGN KEY (`id_talim`) REFERENCES `talim` (`id_talim`),
  ADD CONSTRAINT `presensi_talim_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `tahsin`
--
ALTER TABLE `tahsin`
  ADD CONSTRAINT `tahsin_ibfk_1` FOREIGN KEY (`id_pekan`) REFERENCES `pekan` (`id_pekan`),
  ADD CONSTRAINT `tahsin_ibfk_2` FOREIGN KEY (`id_pembina`) REFERENCES `pembina_mahasiswa` (`id_pembina`);

--
-- Constraints for table `talim`
--
ALTER TABLE `talim`
  ADD CONSTRAINT `talim_ibfk_1` FOREIGN KEY (`id_pekan`) REFERENCES `pekan` (`id_pekan`),
  ADD CONSTRAINT `talim_ibfk_2` FOREIGN KEY (`id_pembina`) REFERENCES `pembina_mahasiswa` (`id_pembina`);

--
-- Constraints for table `udzur_shalat`
--
ALTER TABLE `udzur_shalat`
  ADD CONSTRAINT `udzur_shalat_ibfk_1` FOREIGN KEY (`id_pekan`) REFERENCES `pekan` (`id_pekan`),
  ADD CONSTRAINT `udzur_shalat_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `udzur_tahsin`
--
ALTER TABLE `udzur_tahsin`
  ADD CONSTRAINT `udzur_tahsin_ibfk_1` FOREIGN KEY (`id_tahsin`) REFERENCES `tahsin` (`id_tahsin`),
  ADD CONSTRAINT `udzur_tahsin_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `udzur_talim`
--
ALTER TABLE `udzur_talim`
  ADD CONSTRAINT `udzur_talim_ibfk_1` FOREIGN KEY (`id_talim`) REFERENCES `talim` (`id_talim`),
  ADD CONSTRAINT `udzur_talim_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
