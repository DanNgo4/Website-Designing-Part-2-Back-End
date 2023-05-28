-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: ictstu-db1.cc.swin.edu.au
-- Generation Time: May 22, 2023 at 12:52 PM
-- Server version: 5.5.68-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s104204262_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `EOI`
--

CREATE TABLE `EOI` (
  `EOInumber` int(11) NOT NULL,
  `Job_Reference` varchar(50) DEFAULT NULL,
  `First_Name` varchar(50) DEFAULT NULL,
  `Last_Name` varchar(50) DEFAULT NULL,
   'dob' DATE NOT NULL,
  'Gender' VARCHAR(10) NOT NULL,
  `Street_Address` varchar(100) DEFAULT NULL,
 `Suburb_Town` varchar(50) DEFAULT NULL,
  `State` varchar(50) DEFAULT NULL,
  `Postcode` varchar(10) DEFAULT NULL,
  `Email_Address` varchar(100) DEFAULT NULL,
  `Phone_Number` varchar(20) DEFAULT NULL,
  `Skill_01` varchar(50) DEFAULT NULL,
  `Skill_02` varchar(50) DEFAULT NULL,
  `Skill_03` varchar(50) DEFAULT NULL,
  `Skill_04` varchar(50) DEFAULT NULL,
  `Skill_05` varchar(50) DEFAULT NULL,
  `OtherSkills` text,
  `Status` enum('New','Current','Final') DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `EOI`
--
ALTER TABLE `EOI`
  ADD PRIMARY KEY (`EOInumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `EOI`
--
ALTER TABLE `EOI`
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
