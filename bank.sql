-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2021 at 10:40 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `name` varchar(100) NOT NULL,
  `accno` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `balance` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`name`, `accno`, `email`, `balance`) VALUES
('Arun', 1628, 'Arun@gmail.com', 659000),
('Joseph', 1793, 'Joseph@gmail.com', 311000),
('Balaji', 1919, 'Balaji@gmail.com', 0),
('Jack', 3404, 'Jack@gmail.com', 10000),
('Rakesh', 5440, 'Rakesh@gmail.com', 100000),
('Aakash', 5548, 'Aakash@gmail.com', 100000),
('Janani', 5759, 'Jannai@gmail.com', 500000),
('Manoj', 8061, 'Manoj@gmail.com', 560000),
('Karthikeyan', 8277, 'Karthi@gmail.com', 150000),
('Deepthi', 9591, 'Deepthi@gmail.com', 1000000),
('Annamalai', 9816, 'Annamalai@gmail.com', 550000);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `fromno` int(100) NOT NULL,
  `fromname` varchar(100) NOT NULL,
  `tono` int(100) NOT NULL,
  `toname` varchar(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `dte` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`fromno`, `fromname`, `tono`, `toname`, `amount`, `dte`, `time`) VALUES
(1628, 'Arun', 1793, 'Joseph', 10000, '2021-07-20', '09:21:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`accno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
