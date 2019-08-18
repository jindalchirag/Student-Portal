-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2019 at 10:46 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digital_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `cardno` varchar(20) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `sid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `cardno`, `UserName`, `Password`, `status`, `sid`) VALUES
(1, '141684197', 'e3a214873911a417fe414006f0be1bb6', 'chirag', 1, 1),
(2, '3676169167', 'potta', 'potta', 1, 2),
(3, '', 'div', 'div', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `personal_details`
--

CREATE TABLE `personal_details` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `aadhar` varchar(20) NOT NULL,
  `blood` varchar(100) NOT NULL,
  `caste` varchar(100) NOT NULL,
  `subcaste` varchar(100) NOT NULL,
  `pancard` varchar(100) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `branch_name` text NOT NULL,
  `account_number` varchar(20) NOT NULL,
  `ifsc` varchar(100) NOT NULL,
  `guardian` varchar(100) DEFAULT NULL,
  `place` text,
  `number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_details`
--

INSERT INTO `personal_details` (`id`, `sid`, `fname`, `mname`, `email`, `aadhar`, `blood`, `caste`, `subcaste`, `pancard`, `bank_name`, `branch_name`, `account_number`, `ifsc`, `guardian`, `place`, `number`) VALUES
(1, 2, 'P. Naveen Kumar', 'P. Swarupa Rani', 'sid99.smiles@gmail.com', '2081 6017 2658', 'A+', 'OBC', 'Padmashali', 'EFAPP 3391J', 'Bank of India', 'IIITM CAMPUS', '946210110002660', 'BKID0009462', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `batch` text NOT NULL,
  `rollno` text NOT NULL,
  `email` text NOT NULL,
  `yoa` int(11) NOT NULL,
  `yop` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `backlog` int(11) NOT NULL,
  `name` text NOT NULL,
  `number` int(11) NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `pincode` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `sid`, `batch`, `rollno`, `email`, `yoa`, `yop`, `sem`, `backlog`, `name`, `number`, `address`, `city`, `state`, `pincode`, `image`) VALUES
(0, 1, 'BCS', '2017BCS-013', 'bcs_201713@iiitm.ac.in', 2017, 2021, 8, 0, 'Chirag Jindal', 1234567890, 'Hanuman Garh', 'Firozabad', 'Uttar Pradesh', 283203, 'face-0.jpg'),
(1, 2, 'B.Tech CSE', '2017BCS-022', 'bcs_201722@iiitm.ac.in', 2017, 2021, 8, 0, 'Pottapatri Pradyumn Kumar', 1919018797, 'Flat No. 203, 1-1379/190-191, SRT 66 and 67, Hilton Heights, Jawahar Nagar, Ashok Nagar X Roads', 'Hyderabad', 'Telangana', 500020, 'ppk.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_details`
--
ALTER TABLE `personal_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_details`
--
ALTER TABLE `personal_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
