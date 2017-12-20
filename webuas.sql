-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 03, 2016 at 04:01 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webuas`
--

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE IF NOT EXISTS `matkul` (
  `id_matkul` int(5) NOT NULL AUTO_INCREMENT,
  `nama_matkul` varchar(50) NOT NULL,
  `sks` varchar(50) NOT NULL,
  PRIMARY KEY (`id_matkul`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`id_matkul`, `nama_matkul`, `sks`) VALUES
(1, 'MATEMATIKA DASAR 2', '3'),
(2, 'METODE NUMERIK', '3'),
(3, 'WEB DESAIN', '3'),
(4, 'ORGANISASI KOMPUTER', '4'),
(5, 'INTERAKSI MANUSIA KOMPUTER', '3'),
(6, 'ANALISIS DESAIN SISTEM', '3'),
(7, 'KOMUNIKASI DATA', '3');

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE IF NOT EXISTS `mhs` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_mhs` varchar(50) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `id_dosen` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`id`, `id_mhs`, `nama_mhs`, `fakultas`, `jurusan`, `id_dosen`) VALUES
(2, '11140910000032', 'Siti Nurul', 'FST', 'TEKNIK INFORMATIKA', '121'),
(3, '11140910000041', 'Lulut Dwi Putri', 'FST', 'TEKNIK INFORMATIKA', '108'),
(5, '11140910000050', 'Yulianti', 'FST', 'TEKNIK INFORMATIKA', '111'),
(6, '11140910000037', 'Resti Putri Aulia', 'FST', 'TEKNIK INFORMATIKA', '110'),
(7, '11140910000043', 'Juniko Dwi Putra', 'FST', 'TEKNIK INFORMATIKA', '110'),
(8, '11140910000044', 'Jabal Tursina', 'FST', 'TEKNIK INFORMATIKA', '105'),
(9, '11140910000033', 'Angger Pursan', 'FST', 'TEKNIK INFORMATIKA', '105'),
(10, '11140910000027', 'Alfat Nursyahban', 'FST', 'TEKNIK INFORMATIKA', '105'),
(12, '11140910000034', 'Tasya Nabilah Putri', 'FST', 'TEKNIK INFORMATIKA', '110'),
(13, '11140910000026', 'Bambang Supriadi', 'FST', 'TEKNIK INFORMATIKA', '110');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
  `id_nilai` int(10) NOT NULL AUTO_INCREMENT,
  `id_mhs` varchar(50) NOT NULL,
  `id_dosen` varchar(50) NOT NULL,
  `formatif` int(5) NOT NULL,
  `uts` int(5) NOT NULL,
  `uas` int(5) NOT NULL,
  `nilai` int(5) NOT NULL,
  `huruf` varchar(50) NOT NULL,
  `ipk` varchar(20) NOT NULL,
  `predikat` varchar(50) NOT NULL,
  PRIMARY KEY (`id_nilai`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_mhs`, `id_dosen`, `formatif`, `uts`, `uas`, `nilai`, `huruf`, `ipk`, `predikat`) VALUES
(1, '11140910000032', '122', 95, 95, 100, 97, 'A', '4.0', 'Sangat Baik'),
(2, '11140910000027', '105', 80, 90, 85, 85, 'A', '4.0', 'Sangat Baik'),
(3, '11140910000033', '105', 90, 80, 70, 79, 'B', '3.5', 'Baik'),
(4, '11140910000044', '105', 95, 90, 80, 88, 'A', '4.0', 'Sangat Baik');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` enum('Admin','Dosen','Mahasiswa') NOT NULL,
  `id_matkul` int(5) DEFAULT NULL,
  `pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `email`, `status`, `id_matkul`, `pic`) VALUES
('1', 'Lulut dan Nurul', 'admin', '1234', 'admin@web.net', 'Admin', NULL, ''),
('132', 'Levi', 'levi', '1234', 'levi@uinjkt.ac.id', 'Dosen', NULL, ''),
('11140910000032', 'Siti Nurul', 'nurul', '1234', 'nurul@gmail.com', 'Mahasiswa', NULL, ''),
('11140910000041', 'Lulut Dwi Putri', 'lulut', '1234', 'lulut@gmail', 'Mahasiswa', NULL, 'gambar-05-40-18'),
('11140910000099', 'jean', 'jean', '1234', 'jean@gmail.com', 'Mahasiswa', NULL, ''),
('11140910000011', 'lala', 'lala', '1234', 'lala@lala.com', 'Mahasiswa', NULL, ''),
('', '', '', '', '', 'Admin', NULL, ''),
('', '', '', '', '', 'Admin', NULL, ''),
('', '', '', '', '', 'Admin', NULL, ''),
('', '', '', '', '', 'Admin', NULL, ''),
('110', 'Neni', 'neni', '1234', 'neni@gmail.com', 'Dosen', 4, ''),
('115', 'Husni Teja Sukmana', 'husni', '1234', 'husni@gmail.com', 'Dosen', 6, ''),
('108', 'Irmatul Hasanah', 'irma', '1234', 'irma@gmail.com', 'Dosen', 1, ''),
('105', 'Hendra Bayu', 'hendra', '1234', 'hendra@gmail.com', 'Dosen', 3, ''),
('111', 'Arini', 'arini', '1234', 'arini@gmail.com', 'Dosen', 7, ''),
('11140910000050', 'Yulianti', 'yuli', '1234', 'yuli@gmail.com', 'Mahasiswa', NULL, ''),
('11140910000037', 'Resti Putri Aulia', 'resti', '1234', 'resti@gmail.com', 'Mahasiswa', NULL, ''),
('11140910000043', 'Juniko Dwi Putra', 'jun', '1234', 'jun@gmail.com', 'Mahasiswa', NULL, ''),
('11140910000044', 'Jabal Tursina', 'jabal', '1234', 'jabal@gmail.com', 'Mahasiswa', NULL, ''),
('11140910000033', 'Angger Pursan', 'angger', '1234', 'angger@gmail.com', 'Mahasiswa', NULL, ''),
('11140910000027', 'Alfat Nursyahban', 'alfat', '1234', 'alfat@gmail.com', 'Mahasiswa', NULL, ''),
('11140910000034', 'Tasya Nabilah Putri', 'tasya', '1234', 'tasya@gmail.com', 'Mahasiswa', NULL, ''),
('11140910000026', 'Bambang Supriadi', 'bambang', '1234', 'bambang@gmail.com', 'Mahasiswa', NULL, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
