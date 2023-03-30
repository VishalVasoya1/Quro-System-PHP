-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2021 at 07:46 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qurosystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` varchar(20) NOT NULL,
  `aname` varchar(40) NOT NULL,
  `aemail` varchar(40) NOT NULL,
  `apass` varchar(40) NOT NULL,
  `amno` varchar(15) NOT NULL,
  `agender` varchar(10) NOT NULL,
  `aimg` varchar(100) NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `aname`, `aemail`, `apass`, `amno`, `agender`, `aimg`, `stamp`) VALUES
('9999', 'Vishal Vasoya', 'admin@BajarangDal.com', '123', '7285052158', 'Male', 'PicsArt_12-17-01.03.23.jpg', '2021-06-06 05:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cid` varchar(20) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `pid` varchar(50) NOT NULL,
  `pname` varchar(150) NOT NULL,
  `pprice` varchar(20) NOT NULL,
  `qty` varchar(20) NOT NULL,
  `total` varchar(20) NOT NULL,
  `pstock` varchar(20) NOT NULL,
  `psize` varchar(10) NOT NULL,
  `pcolor` varchar(10) NOT NULL,
  `psizedetail` varchar(10) NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cid`, `uid`, `pid`, `pname`, `pprice`, `qty`, `total`, `pstock`, `psize`, `pcolor`, `psizedetail`, `stamp`) VALUES
('0804d1', '1623664106566', '686ab3', 'Blutooth Hands Free For Men', '1000', '1', '1000', '120', '0', '0', '0', '2021-06-20 16:49:11');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` varchar(50) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`, `stamp`) VALUES
('b9ca9f', 'Fashion', '2021-06-15 09:59:54'),
('d1bcc1', 'Mobile', '2021-06-15 10:55:02');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `cid` varchar(50) NOT NULL,
  `ctitle` varchar(150) NOT NULL,
  `cdesc` varchar(500) NOT NULL,
  `oid` varchar(30) DEFAULT NULL,
  `img` varchar(150) DEFAULT NULL,
  `id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mno` varchar(15) NOT NULL,
  `type` varchar(50) NOT NULL,
  `rstatus` varchar(100) NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`cid`, `ctitle`, `cdesc`, `oid`, `img`, `id`, `name`, `email`, `mno`, `type`, `rstatus`, `stamp`) VALUES
('899931', 'How then', 'How To Delete', '1496716582', 'phone.png', '1623664106566', 'Vishal Vasoya', 'vasoyavishal33@gmail.com', '7285052158', 'USER', '0', '2021-06-19 03:39:34'),
('8baaa6', 't-shirt', 'this t-shirt not allow\r\nquality issue in this product \r\nduplicate sales', '', 'allon solly.jpg', '1623654657611', 'Kartik', 'kartik123@gmail.com', '7405777542', 'EMPLOYEE', '1', '2021-06-15 05:23:53'),
('9eced6', 'Visdhsl ', 'dvk', '', '', '1623654657611', 'Kartik', 'kartik123@gmail.com', '7405777542', 'EMPLOYEE', '0', '2021-06-20 16:24:57'),
('db78c1', 'Vishal', 'Vasoya', '', 'download (5).jfif', '1623655880526', 'milan zadafiay', 'Milan123@gmail.com', '9016007434', 'EMPLOYEE', '0', '2021-06-20 10:43:35'),
('e9b03a', 'How then', 'How To Delete', '1496716582', 'phone.png', '1623664106566', 'Vishal Vasoya', 'vasoyavishal33@gmail.com', '7285052158', 'USER', '0', '2021-06-19 03:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `complain_replay`
--

CREATE TABLE `complain_replay` (
  `crid` varchar(15) NOT NULL,
  `rdesc` text NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `cid` varchar(50) NOT NULL,
  `id` text NOT NULL,
  `name` text NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complain_replay`
--

INSERT INTO `complain_replay` (`crid`, `rdesc`, `status`, `cid`, `id`, `name`, `stamp`) VALUES
('44a280', 'this product is not duplicate this is tha original product....\r\n', '1', '8baaa6', '9999', 'Vishal Vasoya', '2021-06-15 05:25:39');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `did` varchar(25) NOT NULL,
  `dname` varchar(50) NOT NULL,
  `vacancy` varchar(5) NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`did`, `dname`, `vacancy`, `stamp`) VALUES
('3ab7a5', 'Stock Manager', '10', '2021-05-08 10:16:48'),
('b092af', 'Payment Manager', '10', '2021-05-08 10:16:59');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `eid` varchar(100) NOT NULL,
  `ename` varchar(100) NOT NULL,
  `eemail` varchar(100) NOT NULL,
  `emno` varchar(15) NOT NULL,
  `epass` varchar(30) NOT NULL,
  `egender` varchar(10) NOT NULL,
  `eimg` varchar(200) NOT NULL,
  `eoccupation` varchar(150) NOT NULL,
  `eexp` int(5) NOT NULL,
  `eskills` varchar(150) NOT NULL,
  `esalary` varchar(7) NOT NULL,
  `etime` varchar(5) NOT NULL,
  `otime` varchar(5) NOT NULL,
  `aadharno` varchar(15) NOT NULL,
  `aadhar1` varchar(150) NOT NULL,
  `aadhar2` varchar(150) NOT NULL,
  `resume` varchar(150) NOT NULL,
  `account_status` varchar(5) NOT NULL,
  `stamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`eid`, `ename`, `eemail`, `emno`, `epass`, `egender`, `eimg`, `eoccupation`, `eexp`, `eskills`, `esalary`, `etime`, `otime`, `aadharno`, `aadhar1`, `aadhar2`, `resume`, `account_status`, `stamp`) VALUES
('1623654657611', 'Kartik', 'kartik123@gmail.com', '7405777542', '123', 'Male', 'kartik.PNG', 'Stock Manager', 3, 'coading', '10000', '5', '8', '123456789012', 'addar front.png', 'back.jpg', 'order_success.pdf', '1', '2021-06-15 10:36:58'),
('1623655615227', 'Himanshu', 'himanshuzadafiya59@gmail.com', '9824826456', '123', 'Male', 'IMG_7678-01.jpeg', 'Payment Manager', 1, 'coding', '20000', '8', '2', '123456789123', 'aadharcard.png', 'aadharcard(1).jpg', '211_TY_4_mcq2.pdf', '1', '2021-06-14 12:57:06'),
('1623655880526', 'milan zadafiay', 'Milan123@gmail.com', '9016007434', '123', 'Male', 'WhatsApp Image 2020-11-27 at 1.58.42 PM.jpeg', 'Order Handler', 3, 'Leadership,', '20000', '10', '2', '147893250121', 'aadharcard.png', 'aadharcard(1).jpg', 'Milan Zadafiya.docx', '1', '2021-06-14 13:01:22');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` varchar(50) NOT NULL,
  `fmsg` varchar(500) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `sno` varchar(150) NOT NULL,
  `cop` varchar(150) NOT NULL,
  `order_id` text NOT NULL,
  `pid` text NOT NULL,
  `uid` varchar(50) NOT NULL,
  `eid` varchar(150) NOT NULL,
  `cid` varchar(100) NOT NULL,
  `aid` varchar(150) NOT NULL,
  `product_name` text NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `dop` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` text NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `psdetail` varchar(150) NOT NULL,
  `size` text NOT NULL,
  `pcolor` varchar(250) NOT NULL,
  `prstatus` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`sno`, `cop`, `order_id`, `pid`, `uid`, `eid`, `cid`, `aid`, `product_name`, `price`, `quantity`, `total`, `dop`, `status`, `payment_method`, `psdetail`, `size`, `pcolor`, `prstatus`) VALUES
('11b37b', '2c2ccb', '425179533', '43bccb', '1623664106566', '1623655615227', '9831e0', '9b4dd8', 'T-Shirt For Men', 100, 1, 100, '2021-06-20 10:18:26', 'Done', 'COD', '1', 'L', 'Red', 'Order Done'),
('4ae02c', '2c2ccb', '891915589', '686ab3', '1623664106566', '1623655615227', '0ee524', '9b4dd8', 'Blutooth Hands Free For Men', 1000, 1, 1000, '2021-06-20 10:18:26', 'Done', 'COD', '0', '0', '0', 'Order Done'),
('6ed45b', '753e05', '1263601888', '686ab3', '1623664106566', '1623655615227', 'ed5b13', '9b4dd8', 'Blutooth Hands Free For Men', 1000, 1, 1000, '2021-06-18 16:33:24', 'Done', 'COD', '0', '0', '0', 'Order Done'),
('98aaed', 'd4f422', '1636360847', '686ab3', '1623664106566', '1623655615227', '60b684', '9b4dd8', 'Blutooth Hands Free For Men', 1000, 1, 1000, '2021-06-20 17:30:53', 'Done', 'PAYTM', '0', '0', '0', 'Order Done'),
('cef5bb', '753e05', '1571904615', '8a2edf', '1623664106566', '1623655615227', '57e820', '9b4dd8', 'Sport Shoes For Men', 2000, 1, 2000, '2021-06-20 16:33:24', 'Done', 'COD', '1', '7', 'Orange', 'Order Done'),
('f507d1', '1da2d1', '2046080095', '686ab3', '1623664106566', '1623655615227', 'b198b5', '9b4dd8', 'Blutooth Hands Free For Men', 1000, 1, 1000, '2021-06-20 10:34:36', 'Done', 'COD', '0', '0', '0', 'Order Done'),
('f8360b', '1da2d1', '84354038', '43bccb', '1623664106566', '1623655615227', '32a383', '9b4dd8', 'T-Shirt For Men', 100, 1, 100, '2021-06-20 10:34:36', 'Done', 'COD', '1', 'L', 'Red', 'Order Done'),
('fe8966', 'd4f422', '1180056837', '43bccb', '1623664106566', '1623655615227', '8ad4b7', '9b4dd8', 'T-Shirt For Men', 100, 1, 100, '2021-06-20 09:48:15', 'Done', 'COD', '1', 'L', 'Red', 'Order Done');

-- --------------------------------------------------------

--
-- Table structure for table `order_address`
--

CREATE TABLE `order_address` (
  `id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `order_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_address`
--

INSERT INTO `order_address` (`id`, `address_id`, `order_id`) VALUES
(1, 229, '1604096410'),
(2, 229, '2137131714'),
(3, 9, '1496716582'),
(4, 9, '1304122312'),
(5, 9, '794634693'),
(6, 9, '2023448640'),
(7, 9, '1755675986'),
(8, 9, '1323070841'),
(9, 9, '2083993570'),
(10, 9, '1197771634'),
(11, 9, '1267341589'),
(12, 9, '57372335'),
(13, 9, '1050225210'),
(14, 9, '1353101076'),
(15, 9, '1728934612'),
(16, 9, '45468943'),
(17, 9, '1350194682'),
(18, 9, '1069617490'),
(19, 9, '1980357491'),
(20, 9, '1014475628'),
(21, 9, '1951781899'),
(22, 9, '2021906068'),
(23, 9, '1550013340'),
(24, 9, '1256105773'),
(25, 9, '271894956'),
(26, 9, '1046928599'),
(27, 9, '470673426'),
(28, 9, '1309709802'),
(29, 9, '165605761'),
(30, 9, '2080782656'),
(31, 9, '1479081246'),
(32, 9, '906381755'),
(33, 9, '1966722187'),
(34, 9, '1392753346'),
(35, 9, '141377449'),
(36, 9, '268329910'),
(37, 9, '1847165725'),
(38, 9, '996269279'),
(39, 9, '228151028'),
(40, 9, '264783188'),
(41, 9, '396353127'),
(42, 9, '518124227'),
(43, 9, '1243335656'),
(44, 9, '1854281488'),
(45, 9, '1195072015'),
(46, 9, '427683693');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `osid` varchar(100) NOT NULL,
  `cop` varchar(100) NOT NULL,
  `eoid` varchar(100) NOT NULL,
  `ename` varchar(100) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `status` varchar(150) NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`osid`, `cop`, `eoid`, `ename`, `uid`, `status`, `stamp`) VALUES
('a2a745', '1da2d1', '1623655880526', 'milan zadafiay', '1623664106566', 'Order Preparing', '2021-06-20 10:21:02'),
('b97ab6', '753e05', '1623655880526', 'milan zadafiay', '1623664106566', 'Order Done', '2021-06-20 16:32:56'),
('dd07e0', '2c2ccb', '1623655880526', 'milan zadafiay', '1623664106566', 'Order Done', '2021-06-20 10:13:17'),
('e6d80f', 'd4f422', '1623655880526', 'milan zadafiay', '1623664106566', 'Order Done', '2021-06-20 09:47:52');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` varchar(50) NOT NULL,
  `ptype` varchar(100) NOT NULL,
  `pbrand` text NOT NULL,
  `pname` text NOT NULL,
  `psub` varchar(50) NOT NULL,
  `pdesc` text NOT NULL,
  `pstock` text NOT NULL,
  `poprice` text NOT NULL,
  `psprice` text NOT NULL,
  `ptitleimg` varchar(250) NOT NULL,
  `pimg` text NOT NULL,
  `psdetail` varchar(30) NOT NULL,
  `qrcodeimg` text DEFAULT NULL,
  `pfinalstatus` varchar(10) NOT NULL,
  `pbuycount` int(11) NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `ptype`, `pbrand`, `pname`, `psub`, `pdesc`, `pstock`, `poprice`, `psprice`, `ptitleimg`, `pimg`, `psdetail`, `qrcodeimg`, `pfinalstatus`, `pbuycount`, `stamp`) VALUES
('43bccb', 'T-Shirt', 'Lycra', 'T-Shirt For Men', 'Cloth', 'Now Ever Than ', '120', '120', '100', 'download (4).jfif', 'download (7).jfif++download (6).jfif++download (5).jfif++', '1', '43bccb.png', '1', 0, '2021-06-15 10:41:23'),
('686ab3', 'Ha', 'JBL', 'Blutooth Hands Free For Men', 'Accessories', 'Now Than Appear', '120', '1200', '1000', 'download (8).jfif', 'download (11).jfif++download (10).jfif++download (9).jfif++', '0', '0', '1', 0, '2021-06-15 11:41:10'),
('8a2edf', 'Sport Shoes', 'Puma', 'Sport Shoes For Men', 'Shoes', 'Vishal Vasoya', '120', '2300', '2000', 'download (3).jfif', 'download (2).jfif++download (1).jfif++download.jfif++', '1', '', '1', 0, '2021-06-15 10:12:48');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `psid` varchar(100) NOT NULL,
  `pid` varchar(100) NOT NULL,
  `pname` varchar(150) NOT NULL,
  `psub` varchar(150) NOT NULL,
  `psize` varchar(50) NOT NULL,
  `pcolor` varchar(50) NOT NULL,
  `pstock` varchar(50) NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`psid`, `pid`, `pname`, `psub`, `psize`, `pcolor`, `pstock`, `stamp`) VALUES
('6de5ae', '8a2edf', 'Sport Shoes For Men', 'Shoes', '9', 'Blue', '230', '2021-06-15 10:13:52'),
('d90826', '43bccb', 'T-Shirt For Men', 'Cloth', 'L', 'Red', '120', '2021-06-15 10:41:37'),
('fe079b', '8a2edf', 'Sport Shoes For Men', 'Shoes', '7', 'Orange', '340', '2021-06-15 10:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `scid` varchar(50) NOT NULL,
  `scname` varchar(100) NOT NULL,
  `cid` varchar(50) NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`scid`, `scname`, `cid`, `stamp`) VALUES
('095fbe', 'Cloth', 'b9ca9f', '2021-06-15 10:00:17'),
('1dc1c1', 'Shoes', 'b9ca9f', '2021-06-15 10:00:31'),
('7b8129', 'Accessories', 'd1bcc1', '2021-06-15 10:55:11');

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE `suggestion` (
  `sid` varchar(25) NOT NULL,
  `stitle` varchar(100) NOT NULL,
  `sdesc` varchar(250) NOT NULL,
  `img` varchar(200) DEFAULT NULL,
  `id` varchar(30) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mno` varchar(15) NOT NULL,
  `desig` varchar(50) NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suggestion`
--

INSERT INTO `suggestion` (`sid`, `stitle`, `sdesc`, `img`, `id`, `name`, `email`, `mno`, `desig`, `stamp`) VALUES
('05f8a3', 'Vishal', 'Vasoya', 'download (1).jfif', '1623655880526', 'milan zadafiay', 'Milan123@gmail.com', '9016007434', 'EMPLOYEE', '2021-06-20 10:41:32'),
('52e205', 'Vishal', 'Vasoya', 'download (1).jfif', '1623655880526', 'milan zadafiay', 'Milan123@gmail.com', '9016007434', 'EMPLOYEE', '2021-06-20 10:42:35'),
('5d3f1f', 'T-shirt', 't-shirts used to better quality like lykra or other matirial', 'allon solly2.jpg', '1623654657611', 'Kartik', 'kartik123@gmail.com', '7405777542', 'EMPLOYEE', '2021-06-15 05:22:30'),
('8e01e5', 'Now Go For', 'Happy Life', '', '1623664106566', 'Vishal Vasoya', 'vasoyavishal33@gmail.com', '7285052158', 'USER', '2021-06-19 03:37:58'),
('ee9dda', 'How', 'Are You', '', '1623655615227', 'Himanshu', 'himanshuzadafiya59@gmail.com', '9824826456', 'EMPLOYEE', '2021-06-19 05:29:46');

-- --------------------------------------------------------

--
-- Table structure for table `transection`
--

CREATE TABLE `transection` (
  `uid` varchar(255) NOT NULL,
  `tid` varchar(255) NOT NULL,
  `oid` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `gateway` varchar(55) NOT NULL,
  `respmsg` varchar(255) NOT NULL,
  `bankname` varchar(255) NOT NULL,
  `respcord` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `banktxnid` varchar(255) NOT NULL,
  `txndate` varchar(245) NOT NULL,
  `mid` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transection`
--

INSERT INTO `transection` (`uid`, `tid`, `oid`, `currency`, `gateway`, `respmsg`, `bankname`, `respcord`, `amount`, `status`, `banktxnid`, `txndate`, `mid`) VALUES
('1623653753135', '20210616111212800110168966502710393', '2137131714', 'INR', 'WALLET', 'Txn Success', 'WALLET', ' 01', '400', ' TXN_SUCCESS', '64764217', '2021-06-16 18:15:32.0', 'ujfvQd81295263591976'),
('1623664106566', '20210616111212800110168578502736248', '1496716582', 'INR', 'WALLET', 'Txn Success', 'WALLET', ' 01', '2000', ' TXN_SUCCESS', '64764247', '2021-06-16 18:20:20.0', 'ujfvQd81295263591976');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `aid` varchar(15) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `umno` varchar(20) NOT NULL,
  `house` varchar(200) NOT NULL,
  `road` varchar(200) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`aid`, `uid`, `uname`, `umno`, `house`, `road`, `pincode`, `city`, `state`, `country`, `status`, `stamp`) VALUES
('229cff', '1623653753135', 'Nirgav', '7405777542', 'A/60 Natavar Nagar ', 'simadanaka surat', '395006', 'surat', 'gujarat', 'india', '1', '2021-06-16 12:38:48'),
('9b4dd8', '1623664106566', 'Vishal Vasoya', '7285052158', '130,Radha Mandir Society', 'Yogi Chowk', '395006', 'Surat', 'Gujarat', 'India', '1', '2021-06-15 12:00:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_register`
--

CREATE TABLE `user_register` (
  `uid` varchar(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `uemail` varchar(50) NOT NULL,
  `umno` varchar(15) NOT NULL,
  `upass` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `uimg` varchar(100) NOT NULL,
  `account_status` varchar(50) NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_register`
--

INSERT INTO `user_register` (`uid`, `uname`, `uemail`, `umno`, `upass`, `gender`, `uimg`, `account_status`, `stamp`) VALUES
('1623653753135', 'Nirgav', 'nirgav123@gmail.com', '7405777542', 'nirgav123', 'male', 'employee.png', '0', '2021-06-14 06:55:53'),
('1623653818916', 'himanshu', 'Himanshuzadafiya59@gmail.com', '9824826456', 'Himanshu@255123', 'male', 'LRM_EXPORT_51026392119714_20190604_132530776.jpeg', '11', '2021-06-14 06:57:05'),
('1623653958530', 'rutik', 'rutikvaholiya105@gmail.com', '9909876543', 'Rutik@123', 'male', 'logo1.png', '10', '2021-06-14 06:59:18'),
('1623664106566', 'Vishal Vasoya', 'vasoyavishal33@gmail.com', '7285052158', '123', 'male', 'PicsArt_12-17-01.03.23.jpg', '1', '2021-06-14 09:48:27');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wid` int(11) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `pid` varchar(50) NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `complain_replay`
--
ALTER TABLE `complain_replay`
  ADD PRIMARY KEY (`crid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `order_address`
--
ALTER TABLE `order_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`osid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`psid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`scid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `suggestion`
--
ALTER TABLE `suggestion`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `user_register`
--
ALTER TABLE `user_register`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `uid` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_address`
--
ALTER TABLE `order_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wid` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complain_replay`
--
ALTER TABLE `complain_replay`
  ADD CONSTRAINT `complain_replay_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `complain` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user_register` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_size`
--
ALTER TABLE `product_size`
  ADD CONSTRAINT `product_size_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `category` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `user_address_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user_register` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `user_register` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
