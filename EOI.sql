-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: ictstu-db1.cc.swin.edu.au
-- Generation Time: May 31, 2023 at 10:38 PM
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
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) DEFAULT NULL,
  `DOB` date NOT NULL,
  `Gender` enum('Male','Female','Other') DEFAULT NULL,
  `Street_Address` varchar(100) DEFAULT NULL,
  `Suburb_Town` varchar(50) DEFAULT NULL,
  `State` varchar(50) DEFAULT NULL,
  `Postcode` varchar(10) DEFAULT NULL,
  `Email_Address` varchar(100) DEFAULT NULL,
  `Phone_Number` varchar(20) DEFAULT NULL,
  `Skill_01` varchar(50) DEFAULT NULL,
  `Skill_02` varchar(50) DEFAULT NULL,
  `Skill_03` varchar(50) DEFAULT NULL,
  `OtherSkills` text,
  `Status` enum('New','Current','Final') DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `EOI`
--

INSERT INTO `EOI` (`EOInumber`, `Job_Reference`, `First_Name`, `Last_Name`, `DOB`, `Gender`, `Street_Address`, `Suburb_Town`, `State`, `Postcode`, `Email_Address`, `Phone_Number`, `Skill_01`, `Skill_02`, `Skill_03`, `OtherSkills`, `Status`) VALUES
(1, '', '', '', '0000-00-00', 'Female', '', '', 'Please Select', '', '', '', NULL, NULL, NULL, '', 'New'),
(2, 'JD123', 'Nina', 'Lam', '2004-08-19', 'Female', '24 Wakefield St', 'Hawthorn', 'VIC', '3122', 'ninayal198@gmail.com', '0405145303', NULL, NULL, NULL, '', 'New');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `EOI`
--
ALTER TABLE `EOI`
  ADD PRIMARY KEY (`EOInumber`),
  ADD UNIQUE KEY `Email_Address` (`Email_Address`,`Phone_Number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `EOI`
--
ALTER TABLE `EOI`
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
