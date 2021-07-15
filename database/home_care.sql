-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2021 at 07:14 PM
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
-- Database: `home_care`
--

-- --------------------------------------------------------

--
-- Table structure for table `active`
--

CREATE TABLE `active` (
  `id` int(5) NOT NULL,
  `sd_id` int(5) NOT NULL,
  `active` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `active`
--

INSERT INTO `active` (`id`, `sd_id`, `active`) VALUES
(1, 11, 13784),
(2, 10, 8546),
(3, 9, 2587),
(4, 8, 7785),
(5, 7, 3210);

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
(160, 12, 2, 2),
(163, 12, 12, 1),
(164, 12, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat_bot`
--

CREATE TABLE `chat_bot` (
  `cb_id` int(11) NOT NULL,
  `queries` varchar(300) NOT NULL,
  `replies` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_bot`
--

INSERT INTO `chat_bot` (`cb_id`, `queries`, `replies`) VALUES
(1, 'HIIII||HAIIIII||Hello||Hola||Hlo||Hai||Koi||hey||hy', 'Hello, how are you.'),
(2, 'How are you', 'Good to see you again!'),
(3, 'what is your name||what is your name ?||whats your name||whats your name ?', 'My name is Bot'),
(4, 'what should I call you', 'You can call me Bot'),
(5, 'Where are you from||Where are you from ?', 'I m from India'),
(6, 'See you later||Have a Good Day||Bye||by||bi||bei||good bye||good by||thank you||tnk u||thanks||thankz', 'Sad to see you are going. Have a nice day'),
(7, 'ok||oky||okey||kk|thanks||thank you||tnq||thankz||fine||happy||hapy||hpy||', 'Ok see you again!'),
(8, 'others||Medical||Shopping||Orders||Payment||othrs||oters||otrs||other||help||hlp||chat||call|||care||customer||costomer||costamar||custumer|', 'Choose any above given choices given for faster response');

-- --------------------------------------------------------

--
-- Table structure for table `chat_link`
--

CREATE TABLE `chat_link` (
  `op_id` int(5) NOT NULL,
  `cl_id` int(5) NOT NULL,
  `link` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_link`
--

INSERT INTO `chat_link` (`op_id`, `cl_id`, `link`) VALUES
(9, 1, 'MedicalRequest.php'),
(11, 3, 'MedicalRequest.php'),
(13, 4, 'BuyMedicine.php'),
(14, 5, 'BookVaccine.php'),
(16, 6, 'Shopping.php'),
(18, 7, 'myOrder.php');

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `ms_id` int(10) NOT NULL,
  `L_id` int(10) NOT NULL,
  `message` varchar(300) NOT NULL,
  `date` varchar(30) NOT NULL,
  `toWhom` varchar(20) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`ms_id`, `L_id`, `message`, `date`, `toWhom`) VALUES
(18, 12, 'call me. its urgent', '05-06-2021 17:12:PM', 'admin'),
(28, 15, 'Payment is not working', '06-06-2021 10:12:AM', 'admin'),
(29, 12, 'testing ( ;', '08-06-2021 15:59:PM', 'admin'),
(36, 12, ' bbcbvcb', '10-06-2021 03:39:AM', 'admin'),
(37, 12, 'bcvxbcvb', '10-06-2021 03:39:AM', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `chat_optn`
--

CREATE TABLE `chat_optn` (
  `cq_id` int(5) NOT NULL,
  `op_id` int(5) NOT NULL,
  `options` varchar(300) NOT NULL,
  `link` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_optn`
--

INSERT INTO `chat_optn` (`cq_id`, `op_id`, `options`, `link`) VALUES
(1, 1, 'Medical', 0),
(1, 2, 'Shopping', 0),
(1, 3, 'Orders', 0),
(1, 4, 'Payment', 0),
(1, 5, 'Others', 0),
(2, 9, 'Connect to Doctor', 1),
(2, 11, 'New Medical Request', 1),
(2, 12, 'Urgent Call Back', 0),
(2, 13, 'Buy Medicine', 0),
(2, 14, 'Book Vaccine', 0),
(3, 16, 'Yes', 1),
(4, 18, 'Show me order history', 1),
(5, 20, 'Money Lost', 0),
(5, 21, 'Error in payment', 0);

-- --------------------------------------------------------

--
-- Table structure for table `chat_qstn`
--

CREATE TABLE `chat_qstn` (
  `from_optn` int(5) NOT NULL DEFAULT 0,
  `cq_id` int(5) NOT NULL,
  `question` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_qstn`
--

INSERT INTO `chat_qstn` (`from_optn`, `cq_id`, `question`) VALUES
(0, 1, 'Hello there, What support are you looking at ?'),
(1, 2, 'Here is some medical related services, Choose any!'),
(2, 3, 'Can I take you to the Shopping page!'),
(3, 4, 'Here are some Order related Queries, Choose any!'),
(4, 5, 'Have you face any of these Payment related Queries!'),
(5, 6, 'If you are facing any problem \r\nor Have a suggestion,\r\nLeave a message to our executive,\r\nWe will call back you as soon as possible!'),
(12, 8, 'OK, We will contact you immediately'),
(20, 12, 'Sorry for your loss, Leave a message to our executive, We will call back you as soon as possible!'),
(21, 13, 'Leave a message to our executive, We will call back you as soon as possible!'),
(13, 16, 'Site is under maintenance! \r\nSorry for the inconvenience.\r\nHope to reach you soon. '),
(14, 17, 'Site is under maintenance! \r\nSorry for the inconvenience.\r\nHope to reach you soon. ');

-- --------------------------------------------------------

--
-- Table structure for table `count`
--

CREATE TABLE `count` (
  `id` int(10) NOT NULL,
  `sd_id` int(5) NOT NULL DEFAULT 11,
  `date` varchar(30) NOT NULL,
  `tested` int(10) NOT NULL,
  `confirmed` int(10) NOT NULL,
  `recovery` int(10) NOT NULL,
  `active` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `count`
--

INSERT INTO `count` (`id`, `sd_id`, `date`, `tested`, `confirmed`, `recovery`, `active`) VALUES
(1, 11, '09-07-2021', 7655, 1256, 2366, 14000),
(2, 11, '10-07-2021', 5642, 987, 657, 11256),
(3, 11, '11-07-2021', 6541, 2412, 2500, 12100),
(4, 11, '12-07-2021', 8456, 1998, 3512, 15523),
(5, 11, '13-07-2021', 7845, 2100, 4566, 10333),
(6, 11, '14-07-2021', 4730, 894, 1233, 6412),
(7, 11, '15-07-2021', 3649, 784, 2007, 5019),
(8, 11, '16-07-2021', 2896, 456, 524, 13784);

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
(34, 12, '2b0fc808406a6219f08c485f90d98f6f.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `hp_id` int(5) NOT NULL,
  `hp_name` varchar(200) DEFAULT NULL,
  `pn_id` int(5) NOT NULL,
  `L_id` int(5) NOT NULL,
  `stock` varchar(5) NOT NULL DEFAULT '0',
  `aloted` varchar(5) NOT NULL DEFAULT '0',
  `booked` varchar(5) NOT NULL DEFAULT '0',
  `completed` varchar(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hospital_vdaily`
--

CREATE TABLE `hospital_vdaily` (
  `hpvs_id` int(11) NOT NULL,
  `hp_id` int(11) NOT NULL,
  `date` varchar(50) DEFAULT NULL,
  `total` varchar(5) NOT NULL DEFAULT '0',
  `booked` varchar(5) NOT NULL DEFAULT '0',
  `completed` varchar(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, '9947900268', 'alanpezhumkattil@gmail.com', 'cea50d07cf7d85354a579f13eb9e3281', 'admin', 1),
(11, '7777777777', 'hari@gmail.com', 'cea50d07cf7d85354a579f13eb9e3281', 'volunteer', 1),
(12, '8136815972', 'alanjozff@gmail.com', 'cea50d07cf7d85354a579f13eb9e3281', 'user', 1),
(13, '3333333333', 'adhin@gmail.nm', 'cea50d07cf7d85354a579f13eb9e3281', 'mstaff', 1),
(14, '9999999999', 'jessy@gmail.bv', 'cea50d07cf7d85354a579f13eb9e3281', 'pnchOfficr', 1),
(15, '5555555555', 'alansmathew@mca.ajce.in', 'cea50d07cf7d85354a579f13eb9e3281', 'user', 1),
(17, '6898658958', 'alanjdasd@fdsf.mn', 'b0f5af209f25459a1a293d36230cb7b2', 'user', 1),
(18, '8848568444', 'ajkaka@rdas.bnmj', 'cea50d07cf7d85354a579f13eb9e3281', 'user', 1),
(19, '6845895689', 'bxZNBxn@fff.mj', 'cea50d07cf7d85354a579f13eb9e3281', 'mstaff', 1),
(20, '6856856856', 'ddaadsds@wee.mjk', 'cea50d07cf7d85354a579f13eb9e3281', 'pnchOfficr', 1),
(21, '8845685214', 'ggfdxxx@weew.bnm', 'cea50d07cf7d85354a579f13eb9e3281', 'volunteer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `map`
--

CREATE TABLE `map` (
  `id` int(5) NOT NULL,
  `sd_id` int(5) NOT NULL,
  `place` varchar(50) NOT NULL,
  `lati` varchar(30) NOT NULL,
  `longi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `map`
--

INSERT INTO `map` (`id`, `sd_id`, `place`, `lati`, `longi`) VALUES
(3, 7, 'Kottayam', '9.5947087', '76.4855729'),
(4, 8, 'Meenachil', '9.7058566', '76.7867332'),
(5, 9, 'Changanassery', '9.4345377', '76.5022945'),
(6, 10, 'Vaikom', '9.732547', '76.3633941'),
(7, 11, 'Kanjirapally', '9.5563581', '76.7696942');

-- --------------------------------------------------------

--
-- Table structure for table `medical_staff`
--

CREATE TABLE `medical_staff` (
  `M_id` int(5) NOT NULL,
  `L_id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `hname` varchar(40) NOT NULL,
  `pn_id` int(5) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medical_staff`
--

INSERT INTO `medical_staff` (`M_id`, `L_id`, `name`, `hname`, `pn_id`, `dob`, `gender`) VALUES
(7, 13, 'Adhin', 'Koottickal CHC', 3, '1987-07-08', 'Male'),
(8, 19, 'dsad', 'Medical Trust', 2, '1985-11-11', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `medicineodr`
--

CREATE TABLE `medicineodr` (
  `bm_id` int(5) NOT NULL,
  `L_id` int(5) NOT NULL,
  `mdname` varchar(200) NOT NULL,
  `qntty` varchar(20) NOT NULL,
  `measure` varchar(20) NOT NULL,
  `descrp` varchar(100) DEFAULT NULL,
  `purpose` varchar(100) DEFAULT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicineodr`
--

INSERT INTO `medicineodr` (`bm_id`, `L_id`, `mdname`, `qntty`, `measure`, `descrp`, `purpose`, `date`) VALUES
(2, 12, 'Paracetamol', '10', 'Pills', '500', 'Feaver', '10-07-2021 23:01:PM'),
(4, 12, 'Dart', '10', 'Pills', 'Nill', 'Headache', '10-07-2021 23:02:PM'),
(17, 12, 'Dolo', '10', 'Pills', '650', 'Feaver', '10-07-2021 23:03:PM');

-- --------------------------------------------------------

--
-- Table structure for table `medicineslipodr`
--

CREATE TABLE `medicineslipodr` (
  `mds_id` int(5) NOT NULL,
  `L_id` int(5) NOT NULL,
  `slip` varchar(300) NOT NULL,
  `descrp` varchar(200) DEFAULT NULL,
  `purpose` varchar(100) DEFAULT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicineslipodr`
--

INSERT INTO `medicineslipodr` (`mds_id`, `L_id`, `slip`, `descrp`, `purpose`, `date`) VALUES
(17, 12, 'MyCard (10).jpg', NULL, 'Antioplasty', '10-07-2021 23:47:PM');

-- --------------------------------------------------------

--
-- Table structure for table `mrequest`
--

CREATE TABLE `mrequest` (
  `MR_id` int(5) NOT NULL,
  `L_id` int(5) NOT NULL,
  `Reason` varchar(20) NOT NULL,
  `Urgency` varchar(10) NOT NULL,
  `Date` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mrequest`
--

INSERT INTO `mrequest` (`MR_id`, `L_id`, `Reason`, `Urgency`, `Date`, `status`) VALUES
(1, 12, 'Headache', 'Severe', '14-01-2021 15:12:PM', 1),
(2, 15, 'Feaver', 'Moderate', '14-01-2021 15:32:PM', 1),
(5, 15, 'Cough', 'Moderate', '26-01-2021 17:12:PM', 1),
(11, 12, 'Cough', 'Severe', '29-01-2021 10:12:AM', 1),
(12, 12, 'Headache', 'Severe', '23-04-2021 21:12:PM', 1),
(14, 12, 'Fever', 'Severe', '16-06-2021 19:09:PM', 1),
(15, 12, 'Dry Cough', 'Severe', '17-06-2021 02:26:AM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `myorder`
--

CREATE TABLE `myorder` (
  `O_id` int(5) NOT NULL,
  `L_id` int(5) NOT NULL,
  `P_id` int(5) NOT NULL,
  `quantity` int(5) NOT NULL,
  `Date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `myorder`
--

INSERT INTO `myorder` (`O_id`, `L_id`, `P_id`, `quantity`, `Date`) VALUES
(17, 15, 4, 3, '01-25-2021 17:12:PM'),
(90, 12, 2, 2, '09-06-2021 16:01:PM'),
(91, 12, 4, 1, '09-06-2021 16:01:PM'),
(105, 18, 2, 1, '18-06-2021 15:38:PM'),
(106, 18, 4, 1, '18-06-2021 15:38:PM'),
(109, 18, 12, 2, '18-06-2021 15:50:PM');

-- --------------------------------------------------------

--
-- Table structure for table `pin_number`
--

CREATE TABLE `pin_number` (
  `pin_id` int(5) NOT NULL,
  `pin` varchar(6) NOT NULL,
  `pn_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pin_number`
--

INSERT INTO `pin_number` (`pin_id`, `pin`, `pn_id`) VALUES
(1, '686514', 3),
(2, '686507', 2),
(5, '686513', 7),
(6, '686581', 12),
(7, '686507', 5),
(8, '686509', 1),
(9, '686543', 6);

-- --------------------------------------------------------

--
-- Table structure for table `prodt_category`
--

CREATE TABLE `prodt_category` (
  `pcat_id` int(5) NOT NULL,
  `category` varchar(30) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodt_category`
--

INSERT INTO `prodt_category` (`pcat_id`, `category`, `status`) VALUES
(1, 'Grocery', 1),
(2, 'Fruit & Vegitable', 1),
(3, 'Personal Care', 1),
(4, 'Diary & Bakery', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `P_id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` int(5) NOT NULL,
  `quantity` int(5) NOT NULL,
  `pcat_id` int(5) NOT NULL,
  `image` varchar(300) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`P_id`, `name`, `description`, `price`, `quantity`, `pcat_id`, `image`, `status`) VALUES
(2, 'Milk', '500 ml', 25, 97, 4, 'Screenshot_20201005-144846_WhatsApp.jpg', 1),
(3, 'Rice', '10 kg', 350, 1004, 1, 'attachment_68686820.jpg', 1),
(4, 'Onion', '1 kg', 35, 6, 2, 'Onion-alternative_1200.jpg', 1),
(12, 'Coconut', 'upto 700 g', 40, 498, 1, 'coconut.jpg', 1),
(13, 'Tea', '100 g', 54, 200, 1, 'avt.jpeg', 1),
(14, 'Salt', '1 kg', 65, 200, 1, 'annapurna-salt-1kg-500x500.png', 1),
(15, 'wheet powder', '1 kg', 42, 100, 1, 'download (1).jpg', 1),
(16, 'Apple', '1 kg', 100, 300, 2, 'apple.jpg', 1),
(17, 'Strawberry', '500 mg', 120, 200, 2, 'st.jpg', 1),
(18, 'Kiwi', '1 kg', 85, 250, 2, 'kiwi.jpeg', 1),
(19, 'Carrot', '500 mg', 35, 100, 2, 'carrot.jpg', 1),
(20, 'Beens', '500 mg', 25, 100, 2, 'beens.jpg', 1),
(21, 'Amul Ghee', '500 mg', 410, 20, 4, 'amul.jpg', 1),
(22, 'Chocolate', '100 mg', 50, 50, 4, 'c.jpg', 1),
(23, 'Cake', '100 mg', 40, 30, 4, 'cake.jpg', 1),
(24, 'Lifebuoy', '62 g', 50, 20, 3, 'd.jpg', 1),
(25, 'Dates', '200 mg', 90, 300, 4, 'dates.jpg', 1),
(26, 'Face Wash', '100 mg', 100, 20, 3, 'gar.jpg', 1),
(28, 'Pears', '100 mg', 50, 20, 3, 'p.jpg', 1),
(29, 'Park Avenue', '100 mg', 200, 20, 3, 'parka.jpg', 1),
(30, 'Rice Powder', '1 kg', 75, 30, 1, 'rice-powder-500x500.jpg', 1),
(31, 'Sanitizer', '100 ml', 100, 30, 3, 's.jpg', 1),
(32, 'Sugar', '500 mg', 80, 40, 1, 'sugar-sugar-by-kerala-foods-1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `punchayat`
--

CREATE TABLE `punchayat` (
  `pn_id` int(5) NOT NULL,
  `sd_id` int(5) NOT NULL,
  `pn_name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `punchayat`
--

INSERT INTO `punchayat` (`pn_id`, `sd_id`, `pn_name`, `status`) VALUES
(1, 11, 'Erumely', 0),
(2, 11, 'Kanjirappally', 0),
(3, 11, 'Koottickal', 0),
(4, 11, 'Koruthodu', 0),
(5, 11, 'Parathodu', 0),
(6, 11, 'Manimala', 0),
(7, 11, 'Mundakkayam', 0),
(8, 8, 'Thalanadu', 0),
(9, 8, 'Thalappalam', 0),
(10, 8, 'Thidanadu', 0),
(11, 8, 'Thekkoy', 0),
(12, 8, 'Poonjar', 0),
(13, 8, 'Poonjar Thekkekkara', 0),
(14, 8, 'Melukavu', 0),
(15, 8, 'Monnilavu', 0),
(16, 10, 'Udayanapuram', 0),
(17, 10, 'Chempu', 0),
(18, 10, 'T.V. Puram', 0),
(19, 10, 'Thalayazham', 0),
(20, 10, 'Maravanthuruthu', 0),
(21, 10, 'Vechoor', 0);

-- --------------------------------------------------------

--
-- Table structure for table `punchayat_officer`
--

CREATE TABLE `punchayat_officer` (
  `P_id` int(5) NOT NULL,
  `L_id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `hname` varchar(20) NOT NULL,
  `pn_id` int(5) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `punchayat_officer`
--

INSERT INTO `punchayat_officer` (`P_id`, `L_id`, `name`, `hname`, `pn_id`, `dob`, `gender`) VALUES
(7, 14, 'Jessy', 'Koottickal', 3, '1971-05-09', 'Female'),
(8, 20, 'djsakdkash', 'hczxchjx', 7, '1968-11-02', 'Female');

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
-- Table structure for table `tbl_otp`
--

CREATE TABLE `tbl_otp` (
  `id` int(5) NOT NULL,
  `L_id` int(5) NOT NULL,
  `otp_data` int(6) NOT NULL,
  `otp_random` varchar(61) NOT NULL,
  `otp_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_otp`
--

INSERT INTO `tbl_otp` (`id`, `L_id`, `otp_data`, `otp_random`, `otp_time`) VALUES
(13, 11, 424239, 'UkLSsIdGy7XAN9bmfJoaehQM65pn4FCRT2Dug1zlwjYqB3HPvWiZV8cx0tKOr', '21-04-20 02:42:48'),
(15, 12, 261790, 'EQf0A4yjlTWtIiXnhC5VueZgv1aSM3bOPsxr2HF9NBmDURpqzocYG76kdJwKL', '21-06-09 10:00:53'),
(19, 15, 239057, 'HEkLKX2aGvFRAyCDi9lm6uMtp5qo8gxVzhSsPf7e1Ud34NJwIjZBcQOnWrTb0', '21-06-18 07:14:47');

-- --------------------------------------------------------

--
-- Table structure for table `test_qstn`
--

CREATE TABLE `test_qstn` (
  `tq_id` int(5) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `question` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_qstn`
--

INSERT INTO `test_qstn` (`tq_id`, `Type`, `question`, `status`) VALUES
(1, 'Serious', 'Are you experiencing any of these serious symptoms ?', 1),
(2, 'MostCommon', 'Do you have any of the following most common symptoms ?', 1),
(3, 'LessCommon', 'These are some less common symptoms, Are you experiencing any of these ?', 1),
(4, 'Disease', 'Have you ever had any of the following:', 1);

-- --------------------------------------------------------

--
-- Table structure for table `test_symptom`
--

CREATE TABLE `test_symptom` (
  `Sy_id` int(5) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_symptom`
--

INSERT INTO `test_symptom` (`Sy_id`, `Type`, `Description`, `status`) VALUES
(1, 'MostCommon', 'Fever', 1),
(2, 'MostCommon', 'Dry Cough', 1),
(3, 'MostCommon', 'Tiredness', 1),
(4, 'MostCommon', 'Headache', 1),
(5, 'MostCommon', 'Loss of taste or smell', 1),
(6, 'LessCommon', 'Aches and pains\r\n', 1),
(7, 'LessCommon', 'Sore throat', 1),
(8, 'LessCommon', 'Diarrhoea', 1),
(9, 'LessCommon', 'Conjunctivitis', 1),
(10, 'LessCommon', 'A rash on skin', 1),
(11, 'Serious', 'Difficulty or shortness of breathing', 1),
(12, 'Serious', 'Chest pain or pressure', 1),
(13, 'Serious', 'Loss of speech or movement', 1),
(14, 'Disease', 'Lung Disease', 1),
(15, 'Disease', 'Kidney Disorder', 1),
(16, 'Disease', 'Heart Disease', 1),
(17, 'Disease', 'Diabetes', 0),
(18, 'Disease', 'Hypertension', 1),
(19, 'LessCommon', 'Discolouration of fingers or toes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `test_treatment`
--

CREATE TABLE `test_treatment` (
  `Tr_id` int(5) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_treatment`
--

INSERT INTO `test_treatment` (`Tr_id`, `Type`, `Description`, `status`) VALUES
(1, 'SelfCare', 'Use Mask', 1),
(2, 'SelfCare', 'Clean your hands often', 1),
(3, 'SelfCare', 'Avoid touching your eyes, nose and mouth', 1),
(4, 'SelfCare', 'Cough or sneeze in your bent elbow - not your hands!', 1),
(5, 'SelfCare', 'Limit social gatherings and time spent in crowded places', 1),
(6, 'SelfCare', 'Avoid close contact with someone who is sick', 1),
(7, 'SelfCare', 'Clean and disinfect frequently touched objects and surfaces', 1),
(8, 'SelfCare', 'Everyone should keep a healthy lifestyle at home. Maintain a healthy diet, sleep, stay active', 1),
(9, 'MoreCare', 'You should take rest, drink plenty of fluid, and eat nutritious food', 1),
(10, 'MoreCare', 'Stay in a separate room from other family members, and use a dedicated bathroom if possible', 1),
(11, 'MoreCare', 'Clean and disinfect frequently touched surfaces', 1),
(12, 'MoreCare', 'Children need extra love and attention from adults during difficult times\r\n', 1),
(13, 'MoreCare', 'It is normal to feel sad, stressed, or confused during a crisis. \r\n    Make social contact with loved ones through the phone or internet. \r\n    Talking to people you trust, such as friends and family, can help', 1),
(14, 'Serious', 'Seek immediate medical attention if you have serious symptoms', 1),
(15, 'Serious', 'Always call before visiting your doctor or health facility', 1),
(16, 'SelfCare', 'On average it takes 5–6 days from when someone is infected with the virus for symptoms to show, however it can take up to 14 days. So keep a healthy lifestyle', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `U_id` int(5) NOT NULL,
  `L_id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `hname` varchar(20) NOT NULL,
  `pn_id` int(5) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`U_id`, `L_id`, `name`, `hname`, `pn_id`, `dob`, `gender`) VALUES
(7, 12, 'Amal', 'kanimangalam', 3, '1997-05-06', 'Male'),
(8, 15, 'Aby', 'karikkattoor', 3, '1987-08-08', 'Male'),
(9, 17, 'vcxcv', 'cvxcv', 2, '2000-12-02', 'Female'),
(10, 18, 'zXzXzx', 'zxczxczxc', 7, '1986-12-02', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE `volunteer` (
  `V_id` int(5) NOT NULL,
  `L_id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `hname` varchar(20) NOT NULL,
  `pn_id` int(5) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`V_id`, `L_id`, `name`, `hname`, `pn_id`, `dob`, `gender`) VALUES
(6, 11, 'Hari', 'Helikum', 3, '1997-02-05', 'Male'),
(7, 21, 'dfsfsdf', 'xzczxc', 7, '1987-11-11', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `v_status`
--

CREATE TABLE `v_status` (
  `vs_id` int(5) NOT NULL,
  `L_id` int(5) NOT NULL,
  `aadhaar` varchar(11) DEFAULT NULL,
  `dose1` varchar(20) DEFAULT NULL,
  `dose2` varchar(20) DEFAULT NULL,
  `slot` varchar(20) DEFAULT NULL,
  `hpvs_id` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active`
--
ALTER TABLE `active`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `chat_bot`
--
ALTER TABLE `chat_bot`
  ADD PRIMARY KEY (`cb_id`);

--
-- Indexes for table `chat_link`
--
ALTER TABLE `chat_link`
  ADD PRIMARY KEY (`cl_id`),
  ADD KEY `op_id` (`op_id`);

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`ms_id`);

--
-- Indexes for table `chat_optn`
--
ALTER TABLE `chat_optn`
  ADD PRIMARY KEY (`op_id`),
  ADD KEY `cq_id` (`cq_id`);

--
-- Indexes for table `chat_qstn`
--
ALTER TABLE `chat_qstn`
  ADD PRIMARY KEY (`cq_id`);

--
-- Indexes for table `count`
--
ALTER TABLE `count`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`hp_id`),
  ADD KEY `L_id` (`L_id`);

--
-- Indexes for table `hospital_vdaily`
--
ALTER TABLE `hospital_vdaily`
  ADD PRIMARY KEY (`hpvs_id`),
  ADD KEY `hp_id` (`hp_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`L_id`);

--
-- Indexes for table `map`
--
ALTER TABLE `map`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sd_id` (`id`);

--
-- Indexes for table `medical_staff`
--
ALTER TABLE `medical_staff`
  ADD PRIMARY KEY (`M_id`),
  ADD KEY `L_id` (`L_id`);

--
-- Indexes for table `medicineodr`
--
ALTER TABLE `medicineodr`
  ADD PRIMARY KEY (`bm_id`);

--
-- Indexes for table `medicineslipodr`
--
ALTER TABLE `medicineslipodr`
  ADD PRIMARY KEY (`mds_id`);

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
-- Indexes for table `pin_number`
--
ALTER TABLE `pin_number`
  ADD PRIMARY KEY (`pin_id`),
  ADD KEY `pn_id` (`pn_id`);

--
-- Indexes for table `prodt_category`
--
ALTER TABLE `prodt_category`
  ADD PRIMARY KEY (`pcat_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`P_id`);

--
-- Indexes for table `punchayat`
--
ALTER TABLE `punchayat`
  ADD PRIMARY KEY (`pn_id`),
  ADD KEY `sd_id` (`sd_id`);

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
-- Indexes for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `L_id` (`L_id`);

--
-- Indexes for table `test_qstn`
--
ALTER TABLE `test_qstn`
  ADD PRIMARY KEY (`tq_id`);

--
-- Indexes for table `test_symptom`
--
ALTER TABLE `test_symptom`
  ADD PRIMARY KEY (`Sy_id`);

--
-- Indexes for table `test_treatment`
--
ALTER TABLE `test_treatment`
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
-- Indexes for table `v_status`
--
ALTER TABLE `v_status`
  ADD PRIMARY KEY (`vs_id`),
  ADD KEY `L_id` (`L_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active`
--
ALTER TABLE `active`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `C_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `chat_bot`
--
ALTER TABLE `chat_bot`
  MODIFY `cb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chat_link`
--
ALTER TABLE `chat_link`
  MODIFY `cl_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `ms_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `chat_optn`
--
ALTER TABLE `chat_optn`
  MODIFY `op_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `chat_qstn`
--
ALTER TABLE `chat_qstn`
  MODIFY `cq_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `count`
--
ALTER TABLE `count`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dp`
--
ALTER TABLE `dp`
  MODIFY `dp_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `hp_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `hospital_vdaily`
--
ALTER TABLE `hospital_vdaily`
  MODIFY `hpvs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `L_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `map`
--
ALTER TABLE `map`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `medical_staff`
--
ALTER TABLE `medical_staff`
  MODIFY `M_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `medicineodr`
--
ALTER TABLE `medicineodr`
  MODIFY `bm_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `medicineslipodr`
--
ALTER TABLE `medicineslipodr`
  MODIFY `mds_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mrequest`
--
ALTER TABLE `mrequest`
  MODIFY `MR_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `myorder`
--
ALTER TABLE `myorder`
  MODIFY `O_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `pin_number`
--
ALTER TABLE `pin_number`
  MODIFY `pin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `prodt_category`
--
ALTER TABLE `prodt_category`
  MODIFY `pcat_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `P_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `punchayat`
--
ALTER TABLE `punchayat`
  MODIFY `pn_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `punchayat_officer`
--
ALTER TABLE `punchayat_officer`
  MODIFY `P_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `test_qstn`
--
ALTER TABLE `test_qstn`
  MODIFY `tq_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `test_symptom`
--
ALTER TABLE `test_symptom`
  MODIFY `Sy_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `test_treatment`
--
ALTER TABLE `test_treatment`
  MODIFY `Tr_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `U_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `V_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `v_status`
--
ALTER TABLE `v_status`
  MODIFY `vs_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`L_id`) REFERENCES `login` (`L_id`);

--
-- Constraints for table `chat_link`
--
ALTER TABLE `chat_link`
  ADD CONSTRAINT `chat_link_ibfk_1` FOREIGN KEY (`op_id`) REFERENCES `chat_optn` (`op_id`);

--
-- Constraints for table `chat_optn`
--
ALTER TABLE `chat_optn`
  ADD CONSTRAINT `chat_optn_ibfk_1` FOREIGN KEY (`cq_id`) REFERENCES `chat_qstn` (`cq_id`);

--
-- Constraints for table `dp`
--
ALTER TABLE `dp`
  ADD CONSTRAINT `dp_ibfk_1` FOREIGN KEY (`L_id`) REFERENCES `login` (`L_id`);

--
-- Constraints for table `hospital`
--
ALTER TABLE `hospital`
  ADD CONSTRAINT `hospital_ibfk_1` FOREIGN KEY (`L_id`) REFERENCES `medical_staff` (`L_id`);

--
-- Constraints for table `hospital_vdaily`
--
ALTER TABLE `hospital_vdaily`
  ADD CONSTRAINT `hospital_vdaily_ibfk_1` FOREIGN KEY (`hp_id`) REFERENCES `hospital` (`hp_id`);

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
-- Constraints for table `pin_number`
--
ALTER TABLE `pin_number`
  ADD CONSTRAINT `pin_number_ibfk_1` FOREIGN KEY (`pn_id`) REFERENCES `punchayat` (`pn_id`);

--
-- Constraints for table `punchayat`
--
ALTER TABLE `punchayat`
  ADD CONSTRAINT `punchayat_ibfk_1` FOREIGN KEY (`sd_id`) REFERENCES `subdist` (`sd_id`);

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

--
-- Constraints for table `v_status`
--
ALTER TABLE `v_status`
  ADD CONSTRAINT `v_status_ibfk_1` FOREIGN KEY (`L_id`) REFERENCES `login` (`L_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
