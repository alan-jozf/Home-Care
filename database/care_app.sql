-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2021 at 01:15 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `care_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(5) NOT NULL,
  `L_id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `L_id`, `name`, `status`) VALUES
(1, 1, 'Alan Joseph', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `C_id` int(5) NOT NULL,
  `L_id` int(5) NOT NULL,
  `P_id` int(5) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`C_id`, `L_id`, `P_id`, `quantity`) VALUES
(53, 15, 2, 3),
(54, 15, 3, 20),
(78, 12, 4, 1),
(79, 12, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `dt_id` int(2) NOT NULL,
  `dt_name` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`dt_id`, `dt_name`, `status`) VALUES
(1, 'Thiruvananthapuram', 1),
(2, 'Kollam', 1),
(3, 'Pathanamthitta', 1),
(4, 'Alapuzha', 1),
(5, 'Kottayam', 1),
(6, 'Idukki', 1),
(7, 'Ernakulam', 1),
(8, 'Thrissur', 1),
(9, 'Palakad', 1),
(10, 'Malapuram', 1),
(11, 'Kozhikode', 1),
(12, 'Wayanad', 1),
(13, 'Kannur', 1),
(14, 'Kasargod', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dp`
--

CREATE TABLE `dp` (
  `dp_id` int(5) NOT NULL,
  `L_id` int(5) NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dp`
--

INSERT INTO `dp` (`dp_id`, `L_id`, `image`, `status`) VALUES
(1, 1, 'alan.jpg', 1),
(33, 11, '3377ffd767bf454ea55ec9488f56c714.jpg', 1),
(34, 12, '0fc902e07391a5d7190c5b1a108b6b37.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `L_id` int(5) NOT NULL,
  `PhoneNo` varchar(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `user_type` varchar(20) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`L_id`, `PhoneNo`, `email`, `password`, `user_type`, `status`) VALUES
(1, '9947900268', 'alanpezhumkattil@gmail.com', '87e55fbd71dbf849561b24cdb5144a91', 'admin', 1),
(11, '7777777777', 'hari@gmail.com', 'cea50d07cf7d85354a579f13eb9e3281', 'volunteer', 1),
(12, '4444444444', 'amal@hjk.nm', 'cea50d07cf7d85354a579f13eb9e3281', 'user', 1),
(13, '3333333333', 'adhin@fgh.nm', 'cea50d07cf7d85354a579f13eb9e3281', 'mstaff', 1),
(14, '9999999999', 'jessy@gjk.bv', 'cea50d07cf7d85354a579f13eb9e3281', 'pnchOfficr', 1),
(15, '5555555555', 'aby@ghgg.mm', 'cea50d07cf7d85354a579f13eb9e3281', 'user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `medical_staff`
--

CREATE TABLE `medical_staff` (
  `M_id` int(5) NOT NULL,
  `L_id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `hname` varchar(40) NOT NULL,
  `sd_id` int(5) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medical_staff`
--

INSERT INTO `medical_staff` (`M_id`, `L_id`, `name`, `hname`, `sd_id`, `dob`, `gender`) VALUES
(7, 13, 'Adhin', 'Mtrust', 6, '1987-07-08', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `mrequest`
--

CREATE TABLE `mrequest` (
  `MR_id` int(5) NOT NULL,
  `L_id` int(5) NOT NULL,
  `Reason` varchar(20) NOT NULL,
  `Urgency` varchar(10) NOT NULL,
  `Date` varchar(12) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mrequest`
--

INSERT INTO `mrequest` (`MR_id`, `L_id`, `Reason`, `Urgency`, `Date`, `status`) VALUES
(1, 12, 'Headache', 'Severe', '2021-01-14', 1),
(2, 15, 'Feaver', 'Moderate', '2021-01-14', 1),
(3, 12, 'Cough', 'Moderate', '2021-01-15', 1),
(5, 15, 'Cough', 'Moderate', '2021-01-26', 1),
(11, 12, 'Cough', 'Severe', '2021-01-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `myorder`
--

CREATE TABLE `myorder` (
  `O_id` int(5) NOT NULL,
  `L_id` int(5) NOT NULL,
  `P_id` int(5) NOT NULL,
  `quantity` int(5) NOT NULL,
  `Date` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `myorder`
--

INSERT INTO `myorder` (`O_id`, `L_id`, `P_id`, `quantity`, `Date`) VALUES
(17, 15, 4, 50, '01/25/2021'),
(38, 12, 2, 1, '01/29/2021'),
(40, 12, 3, 1, '01/29/2021');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `P_id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` int(5) NOT NULL,
  `quantity` int(5) NOT NULL,
  `category` varchar(20) NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`P_id`, `name`, `price`, `quantity`, `category`, `image`, `status`) VALUES
(1, 'Egg', 8, 85, 'Food', 'Screenshot_20201003-145051_Instagram.jpg', 1),
(2, 'Milk', 50, 99, 'Food', 'Screenshot_20201005-144846_WhatsApp.jpg', 1),
(3, 'Rice', 50, 995, 'Grocery', 'attachment_68686820.jpg', 1),
(4, 'Onion', 25, 1000, 'Vegitable', 'Onion-alternative_1200.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `punchayat_officer`
--

CREATE TABLE `punchayat_officer` (
  `P_id` int(5) NOT NULL,
  `L_id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `hname` varchar(20) NOT NULL,
  `sd_id` int(5) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `punchayat_officer`
--

INSERT INTO `punchayat_officer` (`P_id`, `L_id`, `name`, `hname`, `sd_id`, `dob`, `gender`) VALUES
(7, 14, 'Jessy', 'Koottickal', 11, '1971-05-09', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `subdist`
--

CREATE TABLE `subdist` (
  `sd_id` int(5) NOT NULL,
  `dt_id` int(2) NOT NULL,
  `sd_name` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subdist`
--

INSERT INTO `subdist` (`sd_id`, `dt_id`, `sd_name`, `status`) VALUES
(1, 1, 'Thiruvananthapuram', 1),
(2, 1, 'Chirayinkeezhu', 1),
(3, 1, 'Neyyattinkara', 1),
(4, 1, 'Nedumangadu', 1),
(5, 1, 'Varkala', 1),
(6, 1, 'Kattakada', 1),
(7, 5, 'Kottayam', 1),
(8, 5, 'Meenachil', 1),
(9, 5, 'Changanassery', 1),
(10, 5, 'Vaikom', 1),
(11, 5, 'Kanjirapally', 1);

-- --------------------------------------------------------

--
-- Table structure for table `symptom`
--

CREATE TABLE `symptom` (
  `Sy_id` int(5) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_otp`
--

CREATE TABLE `tbl_otp` (
  `id` int(5) NOT NULL,
  `L_id` int(5) NOT NULL,
  `otp_data` int(6) NOT NULL,
  `otp_random` varchar(61) NOT NULL,
  `otp_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `Tr_id` int(5) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `U_id` int(5) NOT NULL,
  `L_id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `hname` varchar(20) NOT NULL,
  `sd_id` int(5) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`U_id`, `L_id`, `name`, `hname`, `sd_id`, `dob`, `gender`) VALUES
(7, 12, 'Amal', 'kanimangalam', 4, '1991-05-06', 'Male'),
(8, 15, 'Aby', 'karikkattoor', 10, '1987-08-08', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE `volunteer` (
  `V_id` int(5) NOT NULL,
  `L_id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `hname` varchar(20) NOT NULL,
  `sd_id` int(5) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`V_id`, `L_id`, `name`, `hname`, `sd_id`, `dob`, `gender`) VALUES
(6, 11, 'Hari', 'Helikum', 11, '1997-02-05', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `L_id` (`L_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`C_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`dt_id`);

--
-- Indexes for table `dp`
--
ALTER TABLE `dp`
  ADD PRIMARY KEY (`dp_id`),
  ADD KEY `L_id` (`L_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`L_id`);

--
-- Indexes for table `medical_staff`
--
ALTER TABLE `medical_staff`
  ADD PRIMARY KEY (`M_id`),
  ADD KEY `L_id` (`L_id`);

--
-- Indexes for table `mrequest`
--
ALTER TABLE `mrequest`
  ADD PRIMARY KEY (`MR_id`),
  ADD KEY `L_id` (`L_id`);

--
-- Indexes for table `myorder`
--
ALTER TABLE `myorder`
  ADD PRIMARY KEY (`O_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`P_id`);

--
-- Indexes for table `punchayat_officer`
--
ALTER TABLE `punchayat_officer`
  ADD PRIMARY KEY (`P_id`),
  ADD KEY `L_id` (`L_id`);

--
-- Indexes for table `subdist`
--
ALTER TABLE `subdist`
  ADD PRIMARY KEY (`sd_id`),
  ADD KEY `dt_id` (`dt_id`);

--
-- Indexes for table `symptom`
--
ALTER TABLE `symptom`
  ADD PRIMARY KEY (`Sy_id`);

--
-- Indexes for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `L_id` (`L_id`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`Tr_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`U_id`),
  ADD KEY `L_id` (`L_id`);

--
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`V_id`),
  ADD KEY `L_id` (`L_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `C_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `dp`
--
ALTER TABLE `dp`
  MODIFY `dp_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `L_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `medical_staff`
--
ALTER TABLE `medical_staff`
  MODIFY `M_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mrequest`
--
ALTER TABLE `mrequest`
  MODIFY `MR_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `myorder`
--
ALTER TABLE `myorder`
  MODIFY `O_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `P_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `punchayat_officer`
--
ALTER TABLE `punchayat_officer`
  MODIFY `P_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `symptom`
--
ALTER TABLE `symptom`
  MODIFY `Sy_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `Tr_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `U_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `V_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`L_id`) REFERENCES `login` (`L_id`);

--
-- Constraints for table `dp`
--
ALTER TABLE `dp`
  ADD CONSTRAINT `dp_ibfk_1` FOREIGN KEY (`L_id`) REFERENCES `login` (`L_id`);

--
-- Constraints for table `medical_staff`
--
ALTER TABLE `medical_staff`
  ADD CONSTRAINT `medical_staff_ibfk_1` FOREIGN KEY (`L_id`) REFERENCES `login` (`L_id`);

--
-- Constraints for table `mrequest`
--
ALTER TABLE `mrequest`
  ADD CONSTRAINT `mrequest_ibfk_1` FOREIGN KEY (`L_id`) REFERENCES `login` (`L_id`);

--
-- Constraints for table `punchayat_officer`
--
ALTER TABLE `punchayat_officer`
  ADD CONSTRAINT `punchayat_officer_ibfk_1` FOREIGN KEY (`L_id`) REFERENCES `login` (`L_id`);

--
-- Constraints for table `subdist`
--
ALTER TABLE `subdist`
  ADD CONSTRAINT `subdist_ibfk_1` FOREIGN KEY (`dt_id`) REFERENCES `district` (`dt_id`);

--
-- Constraints for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  ADD CONSTRAINT `tbl_otp_ibfk_1` FOREIGN KEY (`L_id`) REFERENCES `login` (`L_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`L_id`) REFERENCES `login` (`L_id`);

--
-- Constraints for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD CONSTRAINT `volunteer_ibfk_1` FOREIGN KEY (`L_id`) REFERENCES `login` (`L_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
