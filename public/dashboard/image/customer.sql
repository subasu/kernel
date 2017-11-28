-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2017 at 04:22 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customer`
--

-- --------------------------------------------------------

--
-- Table structure for table `corder`
--

CREATE TABLE `corder` (
  `oid` int(12) NOT NULL,
  `uid` int(12) NOT NULL,
  `gid` int(12) NOT NULL,
  `odes` varchar(200) COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `gid` int(12) NOT NULL,
  `gname` varchar(12) COLLATE utf8mb4_persian_ci NOT NULL,
  `path` varchar(100) COLLATE utf8mb4_persian_ci NOT NULL,
  `des` varchar(200) COLLATE utf8mb4_persian_ci NOT NULL,
  `gcost` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`gid`, `gname`, `path`, `des`, `gcost`) VALUES
(1, 'Galaxy S', 'img\\Galaxy S.jpg', 'Samsung Galaxy S', 250000),
(2, 'Galaxy S II', 'img\\Galaxy S II.jpg', 'Samsung Galaxy S II', 300000),
(3, 'Galaxy S III', 'img\\Galaxy S III.jpg', 'Samsung Galaxy S III', 400000),
(4, 'Galaxy S IV', 'img\\Galaxy S IV.jpg', 'Samsung Galaxy S IV', 500000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(12) NOT NULL,
  `fname` varchar(12) COLLATE utf8mb4_persian_ci NOT NULL,
  `lname` varchar(12) COLLATE utf8mb4_persian_ci NOT NULL,
  `uname` varchar(12) COLLATE utf8mb4_persian_ci NOT NULL,
  `pass` varchar(12) COLLATE utf8mb4_persian_ci NOT NULL,
  `admin` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `fname`, `lname`, `uname`, `pass`, `admin`) VALUES
(1, 'milad', 'hashemi', 'admin', 'admin', 1),
(2, 'asghar', 'akbari', 'a_akbari13', '123abc', 0),
(3, 'asdqw', 'dsfsd', 'fdsf32r', 'sdf32r432', 0),
(4, 'peyman', 'faramarzi', 'p_f111', '3544dds543ww', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `corder`
--
ALTER TABLE `corder`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `corder`
--
ALTER TABLE `corder`
  MODIFY `oid` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `gid` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
