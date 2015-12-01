-- phpMyAdmin SQL Dump
-- version 4.3.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 01, 2015 at 09:18 PM
-- Server version: 5.5.42
-- PHP Version: 5.4.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `631_group0`
--
CREATE DATABASE IF NOT EXISTS `631_group0` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `631_group0`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('srikanth', 'emich');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `email` varchar(50) NOT NULL,
  `pid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` bigint(20) unsigned NOT NULL,
  `pid` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `date_time` datetime NOT NULL,
  `totalprice` double NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` varchar(10) NOT NULL,
  `make` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `year` varchar(4) NOT NULL,
  `description` varchar(10) NOT NULL,
  `category` varchar(20) NOT NULL,
  `subcategory` varchar(20) NOT NULL,
  `price` double NOT NULL,
  `seller` varchar(20) NOT NULL,
  `stock` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `email` varchar(50) NOT NULL,
  `pid` varchar(10) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `star` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(20) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `pcardtype` varchar(10) NOT NULL,
  `pcardno` varchar(20) NOT NULL,
  `pcardexp` varchar(10) NOT NULL,
  `scardtype` varchar(10) NOT NULL,
  `scardno` varchar(20) NOT NULL,
  `scardexp` varchar(10) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `username`, `password`, `fname`, `lname`, `dob`, `phone`, `street`, `city`, `state`, `zip`, `pcardtype`, `pcardno`, `pcardexp`, `scardtype`, `scardno`, `scardexp`, `status`) VALUES
('achinni@rock.com', 'aditya', '1234', 'Aditya', 'Chinni', '1993-11-21', '911', 'QL', 'Canton', 'Indiana', '14578', 'AMEX', '11223344', '12/2100', 'SBI', '12341234', '11/3000', 'a'),
('slavu1@emich.edu', 'slavu', '123456', 'Srikanth', 'Lavu', '1988-10-23', '2489795670', '1467, Gregory Street', 'Ypsilanti', 'Michigan', '48197', 'VISA', '1234567890123456', '12/15', '', '', '', 'a'),
('srikanth.lavu88@gmail.com', 'nani', '1234', 'Sri', 'Nani', '0000-00-00', '', 'Pray Harrold, EMU', 'Ypsilanti', 'Michigan', '48197', 'visa', '1234', '10/2018', 'amex', '1111', '11/2020', 'a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`email`,`pid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`,`pid`,`email`), ADD UNIQUE KEY `oid` (`oid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`email`,`pid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
