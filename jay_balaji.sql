-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 23, 2019 at 06:03 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jay_balaji`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(12) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `firstname`, `middlename`, `lastname`) VALUES
(1, 'admin', 'admin', 'Private', '', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `brand_name` varchar(250) NOT NULL,
  `brand_status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(250) NOT NULL,
  `category_status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_status`) VALUES
(2, 'Flipcover', 'active'),
(3, 'Thoughen Glass', 'active'),
(4, 'Screen Guard', 'active'),
(5, 'Earphones', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_order`
--

DROP TABLE IF EXISTS `inventory_order`;
CREATE TABLE IF NOT EXISTS `inventory_order` (
  `inventory_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `inventory_order_total` double(10,2) NOT NULL,
  `inventory_order_date` date NOT NULL,
  `inventory_order_name` varchar(255) NOT NULL,
  `inventory_order_address` text NOT NULL,
  `payment_status` enum('cash','credit') NOT NULL,
  `inventory_order_status` varchar(100) NOT NULL,
  `inventory_order_created_date` date NOT NULL,
  PRIMARY KEY (`inventory_order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_order`
--

INSERT INTO `inventory_order` (`inventory_order_id`, `user_id`, `inventory_order_total`, `inventory_order_date`, `inventory_order_name`, `inventory_order_address`, `payment_status`, `inventory_order_status`, `inventory_order_created_date`) VALUES
(7, 11, 1320.00, '2003-03-19', 'Harshil', 'E-202, mahalaxmi chs, gopal nagar, pandurang budhkar marg, worli', 'cash', 'active', '2019-03-23');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_order_product`
--

DROP TABLE IF EXISTS `inventory_order_product`;
CREATE TABLE IF NOT EXISTS `inventory_order_product` (
  `inventory_order_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `inventory_order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `tax` double(10,2) NOT NULL,
  PRIMARY KEY (`inventory_order_product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_order_product`
--

INSERT INTO `inventory_order_product` (`inventory_order_product_id`, `inventory_order_id`, `product_id`, `quantity`, `price`, `tax`) VALUES
(1, 1, 2, 2, 500.00, 1.00),
(2, 2, 1, 1, 200.00, 1.00),
(3, 3, 1, 2, 200.00, 1.00),
(5, 4, 4, 12, 500.00, 1.00),
(6, 0, 4, 12, 500.00, 1.00),
(7, 0, 4, 12, 500.00, 1.00),
(9, 0, 4, 12, 500.00, 1.00),
(10, 0, 4, 2, 500.00, 1.00),
(11, 5, 4, 5, 500.00, 1.00),
(12, 0, 4, 2, 500.00, 1.00),
(13, 0, 4, 2, 500.00, 1.00),
(14, 0, 4, 2, 500.00, 1.00),
(15, 0, 4, 2, 500.00, 1.00),
(16, 6, 4, 12, 500.00, 1.00),
(17, 7, 5, 12, 100.00, 10.00),
(18, 0, 4, 12, 500.00, 1.00),
(19, 0, 4, 2, 500.00, 1.00),
(20, 8, 4, 2, 500.00, 1.00);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(300) NOT NULL,
  `product_description` text NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_unit` varchar(150) NOT NULL,
  `product_base_price` double(10,2) NOT NULL,
  `product_tax` decimal(4,2) NOT NULL,
  `product_enter_by` int(11) NOT NULL,
  `product_status` enum('active','inactive') NOT NULL,
  `product_date` date NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `brand_id`, `product_name`, `product_description`, `product_quantity`, `product_unit`, `product_base_price`, `product_tax`, `product_enter_by`, `product_status`, `product_date`) VALUES
(4, 5, 17, 'Earphone_Skullcandy', 'Earphones', 10, 'Nos', 500.00, '1.00', 11, 'active', '2019-03-23');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_no` int(6) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `course` varchar(10) NOT NULL,
  `section` varchar(8) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_no`, `firstname`, `middlename`, `lastname`, `course`, `section`) VALUES
(2, 121299, 'John', '', 'Connor', 'BSIET', '5A');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

DROP TABLE IF EXISTS `time`;
CREATE TABLE IF NOT EXISTS `time` (
  `time_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_no` int(6) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`time_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`time_id`, `student_no`, `student_name`, `time`, `date`) VALUES
(3, 11, 'harshil', '20:28:00', '2019-01-04'),
(4, 12, 'nilay', '20:28:00', '2019-01-04'),
(9, 10, 'Mark Parker', '21:31:00', '2019-01-04'),
(10, 12, 'nilay', '21:31:00', '2019-01-04'),
(11, 11, 'harshil', '21:31:00', '2019-01-04'),
(12, 10, 'Mark Parker', '21:31:00', '2019-01-04'),
(13, 2, 'Dona L. Huber', '23:08:00', '2019-01-04'),
(14, 11, 'harshil', '23:17:00', '2019-01-04'),
(15, 12, 'nilay', '23:33:00', '2019-01-04');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
CREATE TABLE IF NOT EXISTS `user_details` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_type` enum('master','user') NOT NULL,
  `user_status` enum('Active','Inactive') NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `user_email`, `user_password`, `user_name`, `user_type`, `user_status`) VALUES
(1, 'john_smith@gmail.com', '$2y$10$0Yo2F.EetL3yhB8l6MNvcOH8AYNS0SuXLOoAQr1qXJa3uPASWV0NC', 'John Smith', 'master', 'Active'),
(3, 'roy_hise@gmail.com', '$2y$10$XlyVI9an5B6rHW3SS9vQpesJssKJxzMQYPbSaR7dnpWjDI5fpxJSS', 'Roy Hise', 'user', 'Inactive'),
(4, 'peter_goad@gmail.com', '$2y$10$n1B.FdHNwufTkmzp/pNqc.EiwjB8quQ1tBCEC7nkaldI5pS.et04e', 'Peter Goad', 'user', 'Active'),
(5, 'sarah_thomas@gmail.com', '$2y$10$s57SErOPlgkIZf1lxzlX3.hMt8LSSKaYig5rusxghDm7LW8RtQc/W', 'Sarah Thomas', 'user', 'Active'),
(6, 'edna_william@gmail.com', '$2y$10$mfMXnH.TCmg5tlYRhqjxu.ILly8s9.qsLKOpyxgUl6h1fZt6x/B5C', 'Edna William', 'user', 'Active'),
(8, 'john_parks@gmail.com', '$2y$10$WtsZUxIIz/N4NoIW0Db.pu0VfLWcPs6TyQ8SkpVHLDLGhdNOfALC.', 'John Park', 'user', 'Active'),
(11, 'khantharshil123@gmail.com', '$2y$10$OgReCGtUkhQhJYwdEOnrbemZSwCHvaJ8a.HQwV/cN/.5TX/gy5eiy', 'harshil', 'master', 'Active'),
(18, 'check@gmail.com', '$2y$10$V0jHq5QZ3YqXvZMmaOnaCuvFP.L9179UVYkYgZMoPoRkJsLsJUAGe', '123', 'user', 'Active');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
