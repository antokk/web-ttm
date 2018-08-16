-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2018 at 12:46 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ttm`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(10) NOT NULL,
  `kode_kabko` char(5) NOT NULL,
  `id_lokasi` char(9) NOT NULL,
  `id_kelas` char(9) NOT NULL,
  `semester` int(2) NOT NULL,
  `id_mk` int(4) NOT NULL,
  `id_tutor` char(10) NOT NULL,
  `pertemuan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `fasilitator_upbjj` char(8) NOT NULL,
  `fasilitator_pokjar` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kabko`
--

CREATE TABLE `kabko` (
  `kode_kabko` char(5) NOT NULL,
  `nama_kabko` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kabko`
--

INSERT INTO `kabko` (`kode_kabko`, `nama_kabko`) VALUES
('32054', 'KAB. CIREBON'),
('32068', 'KAB. BANDUNG BARAT'),
('32125', 'KAB. MAJALENGKA'),
('32133', 'KAB. SUMEDANG'),
('32141', 'KAB. INDRAMAYU'),
('32156', 'KAB. SUBANG'),
('32164', 'KAB. PURWAKARTA'),
('32172', 'KAB. KARAWANG'),
('32714', 'KOTA CIMAHI'),
('32716', 'KOTA TASIKMALAYA'),
('32736', 'KOTA BANDUNG'),
('32737', 'KAB. BANDUNG'),
('32744', 'KOTA CIREBON');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` char(9) NOT NULL,
  `nama_kelas` char(4) NOT NULL,
  `id_lokasi` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `id_lokasi`) VALUES
('KLS24001', 'A1', 'LKSI24002'),
('KLS24002', 'A2', 'LKSI24002'),
('KLS24003', 'A3', 'LKSI24002'),
('KLS24004', 'A4', 'LKSI24002'),
('KLS24005', 'A5', 'LKSI24002'),
('KLS24006', 'A1', 'LKSI24001'),
('KLS24007', 'A2', 'LKSI24001'),
('KLS24008', 'A3', 'LKSI24001'),
('KLS24009', 'A4', 'LKSI24001'),
('KLS24010', 'A5', 'LKSI24001'),
('KLS24011', 'A1', 'LKSI24003'),
('KLS24012', 'A2', 'LKSI24003'),
('KLS24013', 'A3', 'LKSI24003'),
('KLS24014', 'A4', 'LKSI24003'),
('KLS24015', 'A5', 'LKSI24003'),
('KLS24016', 'A1', 'LKSI24004'),
('KLS24017', 'A2', 'LKSI24004'),
('KLS24018', 'A3', 'LKSI24004'),
('KLS24019', 'A4', 'LKSI24004'),
('KLS24020', 'A5', 'LKSI24004');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_tutorial`
--

CREATE TABLE `lokasi_tutorial` (
  `id_lokasi` char(9) NOT NULL,
  `nama_lokasi` varchar(80) NOT NULL,
  `kode_kabko` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi_tutorial`
--

INSERT INTO `lokasi_tutorial` (`id_lokasi`, `nama_lokasi`, `kode_kabko`) VALUES
('LKSI24001', 'SMPN 12 (PGPAUD-MS)', '32736'),
('LKSI24002', 'SMPN 12 (PGPAUD-AKPMM)', '32736'),
('LKSI24003', 'SMPN Cirebon', '32054'),
('LKSI24004', 'SMPN 2 Kota Cirebon', '32054');

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id_mk` int(4) NOT NULL,
  `kode_mk` char(8) NOT NULL,
  `nama_mk` varchar(40) NOT NULL,
  `semester` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id_mk`, `kode_mk`, `nama_mk`, `semester`) VALUES
(1, 'PAUD4201', 'Penalaran', '1'),
(2, 'PAUD4203', 'Metode Penelitian', '5'),
(3, 'PAUD4201', 'Penalaran', '3'),
(4, 'PAUD4203', 'Metode Penelitian', '7');

-- --------------------------------------------------------

--
-- Table structure for table `m_jenis_surat`
--

CREATE TABLE `m_jenis_surat` (
  `kode_jenis_surat` char(1) NOT NULL,
  `nama_jenis_surat` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_sifat_surat`
--

CREATE TABLE `m_sifat_surat` (
  `kode_sifat_surat` char(1) NOT NULL,
  `nama_sifat_surat` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `peragaan_mk`
--

CREATE TABLE `peragaan_mk` (
  `id_peragaan_mk` char(5) NOT NULL,
  `kode_mk` char(8) NOT NULL,
  `nama_mk` varchar(40) NOT NULL,
  `id_tutor` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester` char(2) NOT NULL,
  `nama_semester` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester`, `nama_semester`) VALUES
('1', 'Semester 1'),
('2', 'Semester 2'),
('3', 'Semester 3'),
('4', 'Semester 4'),
('5', 'Semester 5'),
('6', 'Semester 6'),
('7', 'Semester 7'),
('8', 'Semester 8');

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE `tutor` (
  `id_tutor` char(10) NOT NULL,
  `nip` char(20) NOT NULL,
  `nama_lengkap` varchar(35) NOT NULL,
  `namasingkat` varchar(15) NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`id_tutor`, `nip`, `nama_lengkap`, `namasingkat`, `jenis_kelamin`, `tgl_lahir`, `alamat`, `telepon`, `email`) VALUES
('TTR24001', '199406242017TKT0708', 'Dwi Anto, A.M.d', 'Anto', 'L', '1994-06-24', 'Cilengkrang 2, Cibiru, Kota Bandung', '085607505445', 'antok@ecampus.ut.ac.id');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` char(8) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `nip` char(20) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`, `nip`, `level`) VALUES
('USR24001', 'antok', '123', 'Dwi Anto, A.Md', '199406242017TKT0708', 'Super Admin'),
('USR24002', 'krisna', 'krisna', 'Krisna Barata, S.Kom', '123456789', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `kabko`
--
ALTER TABLE `kabko`
  ADD PRIMARY KEY (`kode_kabko`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `lokasi_tutorial`
--
ALTER TABLE `lokasi_tutorial`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id_mk`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semester`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`id_tutor`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id_mk` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
