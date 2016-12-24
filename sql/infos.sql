-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 Des 2016 pada 07.26
-- Versi Server: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `organisasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `infos`
--

CREATE TABLE `infos` (
  `no` int(11) NOT NULL,
  `website_name` varchar(100) NOT NULL,
  `acronym` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `office_address` text NOT NULL,
  `phone` varchar(30) NOT NULL,
  `phone_alt` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `logo_link` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
