-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2019 at 04:02 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `adhaar_id` varchar(60) DEFAULT NULL,
  `email_id` varchar(32) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirm_password` varchar(100) NOT NULL,
  `admin_image` varchar(100) NOT NULL,
  `admin_type` varchar(30) DEFAULT 'librarian',
  `admin_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `firstname`, `middlename`, `lastname`, `adhaar_id`, `email_id`, `contact`, `username`, `password`, `confirm_password`, `admin_image`, `admin_type`, `admin_added`) VALUES
(2, 'Ankesh', '', 'Pandey', '578272787428', 'ankeshpandey987@gmail.com', '9454192054', 'admin', 'admin', 'admin', 'user.png', 'Admin', '2018-09-10 11:40:50'),
(16, 'shashank', 'kumar', 'Patel', '451511655641', 'coolspatel@gmail.com', '8451154444', 'shashank', 'shashank', 'shashank', '', 'librarian', '2019-02-07 09:09:22'),
(17, 'Aryan', '', 'Singh', '785611415645', 'aryan123@gmail.com', '8445454487', 'aryan', 'aryan', 'aryan', '', 'librarian', '2019-02-07 09:10:31'),
(20, 'Shubham', '', 'Singh', '976436765543', 'swam1234@gmail.com', '8965433445', 'shubham', 'shubham', 'shubham', '', 'librarian', '2019-02-14 22:59:51');

-- --------------------------------------------------------

--
-- Table structure for table `allowed_book`
--

CREATE TABLE `allowed_book` (
  `allowed_book_id` int(11) NOT NULL,
  `qntty_books` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allowed_book`
--

INSERT INTO `allowed_book` (`allowed_book_id`, `qntty_books`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `allowed_days`
--

CREATE TABLE `allowed_days` (
  `allowed_days_id` int(11) NOT NULL,
  `no_of_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allowed_days`
--

INSERT INTO `allowed_days` (`allowed_days_id`, `no_of_days`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `barcode`
--

CREATE TABLE `barcode` (
  `barcode_id` int(11) NOT NULL,
  `pre_barcode` varchar(100) NOT NULL,
  `mid_barcode` int(100) NOT NULL,
  `suf_barcode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barcode`
--

INSERT INTO `barcode` (`barcode_id`, `pre_barcode`, `mid_barcode`, `suf_barcode`) VALUES
(27, 'KIT', 3, 'VNS'),
(28, 'KIT', 4, 'VNS'),
(29, 'KIT', 5, 'VNS'),
(30, 'KIT', 6, 'VNS'),
(31, 'KIT', 7, 'VNS'),
(32, 'KIT', 8, 'VNS'),
(33, 'KIT', 9, 'VNS'),
(34, 'KIT', 10, 'VNS'),
(37, 'KIT', 11, 'VNS'),
(38, 'KIT', 12, 'VNS'),
(39, 'KIT', 13, 'VNS'),
(40, 'KIT', 14, 'VNS'),
(41, 'KIT', 15, 'VNS'),
(42, 'KIT', 16, 'VNS'),
(43, 'KIT', 17, 'VNS'),
(44, 'KIT', 18, 'VNS'),
(45, 'KIT', 19, 'VNS'),
(46, 'KIT', 20, 'VNS'),
(47, 'KIT', 21, 'VNS'),
(48, 'KIT', 22, 'VNS'),
(49, 'KIT', 23, 'VNS'),
(50, 'KIT', 24, 'VNS'),
(51, 'KIT', 25, 'VNS'),
(52, 'KIT', 26, 'VNS'),
(53, 'KIT', 27, 'VNS'),
(54, 'KIT', 28, 'VNS'),
(55, 'KIT', 29, 'VNS'),
(56, 'KIT', 30, 'VNS'),
(57, 'KIT', 31, 'VNS'),
(58, 'KIT', 32, 'VNS'),
(59, 'KIT', 33, 'VNS'),
(60, 'KIT', 34, 'VNS'),
(61, 'KIT', 35, 'VNS'),
(62, 'KIT', 36, 'VNS'),
(63, 'KIT', 37, 'VNS'),
(64, 'KIT', 38, 'VNS'),
(65, 'KIT', 39, 'VNS'),
(66, 'KIT', 40, 'VNS'),
(67, 'KIT', 41, 'VNS'),
(68, 'KIT', 42, 'VNS'),
(69, 'KIT', 43, 'VNS'),
(70, 'KIT', 44, 'VNS'),
(71, 'KIT', 45, 'VNS'),
(72, 'KIT', 46, 'VNS');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_title` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `author_2` varchar(100) NOT NULL,
  `author_3` varchar(100) NOT NULL,
  `author_4` varchar(100) NOT NULL,
  `author_5` varchar(100) NOT NULL,
  `book_pub` varchar(100) NOT NULL,
  `publisher_name` varchar(100) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `copyright_year` varchar(11) NOT NULL,
  `status` varchar(32) NOT NULL,
  `book_barcode` varchar(100) NOT NULL,
  `book_image` varchar(100) NOT NULL,
  `date_added` datetime NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_title`, `category`, `author`, `author_2`, `author_3`, `author_4`, `author_5`, `book_pub`, `publisher_name`, `isbn`, `copyright_year`, `status`, `book_barcode`, `book_image`, `date_added`, `remarks`) VALUES
(28, 'ncer', 'CSE', 'GVDFXGC', '', '', '', '', 'arihant', '', '236776157657', '2012', 'New', 'KIT3VNS', '', '2019-02-13 10:11:11', 'Available'),
(29, 'ncer', 'CSE', 'GVDFXGC', '', '', '', '', 'arihant', '', '236776157657', '2012', 'New', 'KIT4VNS', '', '2019-02-13 10:11:11', 'Available'),
(30, 'ncer', 'CSE', 'GVDFXGC', '', '', '', '', 'arihant', '', '236776157657', '2012', 'New', 'KIT5VNS', '', '2019-02-13 10:11:11', 'Available'),
(31, 'ncer', 'CSE', 'GVDFXGC', '', '', '', '', 'arihant', '', '236776157657', '2012', 'New', 'KIT6VNS', '', '2019-02-13 10:11:11', 'Available'),
(32, 'ncer', 'CSE', 'GVDFXGC', '', '', '', '', 'arihant', '', '236776157657', '2012', 'New', 'KIT7VNS', '', '2019-02-13 10:11:11', 'Not Available'),
(33, 'Pattern Recognition', 'CSE', 'KK Mishra', '', '', '', '', 'Made Eassy', '', '67353675267', '2013', 'New', 'KIT8VNS', '', '2019-02-13 11:44:56', 'Available'),
(34, 'Pattern Recognition', 'CSE', 'KK Mishra', '', '', '', '', 'Made Eassy', '', '67353675267', '2013', 'New', 'KIT9VNS', '', '2019-02-13 11:44:56', 'Available'),
(35, 'Pattern Recognition', 'CSE', 'KK Mishra', '', '', '', '', 'Made Eassy', '', '67353675267', '2013', 'Lost', 'KIT10VNS', '', '2019-02-13 11:44:56', 'Not Available'),
(38, 'DLD', 'CSE', 'anshu', '', '', '', '', 'pearson', '', '4326725', '2019', 'New', 'KIT11VNS', '', '2019-02-13 12:09:28', 'Available'),
(39, 'DLD', 'CSE', 'anshu', '', '', '', '', 'pearson', '', '4326725', '2019', 'New', 'KIT12VNS', '', '2019-02-13 12:09:28', 'Available'),
(40, 'Mathematics I', 'CSE', 'RS aggrawal', '', '', '', '', 'NCERT', '', '34623476237', '2019', 'New', 'KIT13VNS', '', '2019-02-13 12:24:59', 'Available'),
(41, 'Mathematics I', 'CSE', 'RS aggrawal', '', '', '', '', 'NCERT', '', '34623476237', '2019', 'New', 'KIT14VNS', '', '2019-02-13 12:24:59', 'Available'),
(42, 'Mathematics I', 'CSE', 'RS aggrawal', '', '', '', '', 'NCERT', '', '34623476237', '2019', 'New', 'KIT15VNS', '', '2019-02-13 12:24:59', 'Available'),
(43, 'Mathematics I', 'CSE', 'RS aggrawal', '', '', '', '', 'NCERT', '', '34623476237', '2019', 'New', 'KIT16VNS', '', '2019-02-13 12:24:59', 'Available'),
(44, 'Mathematics I', 'CSE', 'RS aggrawal', '', '', '', '', 'NCERT', '', '34623476237', '2019', 'New', 'KIT17VNS', '', '2019-02-13 12:24:59', 'Available'),
(45, 'Mathematics I', 'CSE', 'RS aggrawal', '', '', '', '', 'NCERT', '', '34623476237', '2019', 'New', 'KIT18VNS', '', '2019-02-13 12:24:59', 'Available'),
(46, 'Mathematics I', 'CSE', 'RS aggrawal', '', '', '', '', 'NCERT', '', '34623476237', '2019', 'New', 'KIT19VNS', '', '2019-02-13 12:24:59', 'Available'),
(47, 'Mathematics I', 'CSE', 'RS aggrawal', '', '', '', '', 'NCERT', '', '34623476237', '2019', 'New', 'KIT20VNS', '', '2019-02-13 12:24:59', 'Available'),
(48, 'Mathematics I', 'CSE', 'RS aggrawal', '', '', '', '', 'NCERT', '', '34623476237', '2019', 'New', 'KIT21VNS', '', '2019-02-13 12:24:59', 'Available'),
(49, 'Mathematics I', 'CSE', 'RS aggrawal', '', '', '', '', 'NCERT', '', '34623476237', '2019', 'New', 'KIT22VNS', '', '2019-02-13 12:24:59', 'Available'),
(50, 'Mathematics I', 'CSE', 'RS aggrawal', '', '', '', '', 'NCERT', '', '34623476237', '2019', 'New', 'KIT23VNS', '', '2019-02-13 12:24:59', 'Available'),
(51, 'Mathematics I', 'CSE', 'RS aggrawal', '', '', '', '', 'NCERT', '', '34623476237', '2019', 'New', 'KIT24VNS', '', '2019-02-13 12:24:59', 'Available'),
(52, 'Mathematics I', 'CSE', 'RS aggrawal', '', '', '', '', 'NCERT', '', '34623476237', '2019', 'New', 'KIT25VNS', '', '2019-02-13 12:24:59', 'Available'),
(53, 'Mathematics I', 'CSE', 'RS aggrawal', '', '', '', '', 'NCERT', '', '34623476237', '2019', 'New', 'KIT26VNS', '', '2019-02-13 12:24:59', 'Available'),
(54, 'Mathematics I', 'CSE', 'RS aggrawal', '', '', '', '', 'NCERT', '', '34623476237', '2019', 'New', 'KIT27VNS', '', '2019-02-13 12:24:59', 'Available'),
(55, 'Mathematics I', 'CSE', 'RS aggrawal', '', '', '', '', 'NCERT', '', '34623476237', '2019', 'New', 'KIT28VNS', '', '2019-02-13 12:24:59', 'Available'),
(56, 'Mathematics I', 'CSE', 'RS aggrawal', '', '', '', '', 'NCERT', '', '34623476237', '2019', 'New', 'KIT29VNS', '', '2019-02-13 12:24:59', 'Available'),
(57, 'Mathematics I', 'CSE', 'RS aggrawal', '', '', '', '', 'NCERT', '', '34623476237', '2019', 'New', 'KIT30VNS', '', '2019-02-13 12:24:59', 'Available'),
(58, 'Mathematics I', 'CSE', 'RS aggrawal', '', '', '', '', 'NCERT', '', '34623476237', '2019', 'New', 'KIT31VNS', '', '2019-02-13 12:24:59', 'Available'),
(59, 'Mathematics I', 'CSE', 'RS aggrawal', '', '', '', '', 'NCERT', '', '34623476237', '2019', 'New', 'KIT32VNS', '', '2019-02-13 12:24:59', 'Available'),
(60, 'Mathematics I', 'CSE', 'RS aggrawal', '', '', '', '', 'NCERT', '', '34623476237', '2019', 'New', 'KIT33VNS', '', '2019-02-13 12:24:59', 'Available'),
(61, 'Mathematics I', 'CSE', 'RS aggrawal', '', '', '', '', 'NCERT', '', '34623476237', '2019', 'New', 'KIT34VNS', '', '2019-02-13 12:24:59', 'Available'),
(62, 'Mathematics I', 'CSE', 'RS aggrawal', '', '', '', '', 'NCERT', '', '34623476237', '2019', 'New', 'KIT35VNS', '', '2019-02-13 12:24:59', 'Available'),
(63, 'Mathematics I', 'CSE', 'RS aggrawal', '', '', '', '', 'NCERT', '', '34623476237', '2019', 'New', 'KIT36VNS', '', '2019-02-13 12:24:59', 'Available'),
(64, 'Mathematics I', 'CSE', 'RS aggrawal', '', '', '', '', 'NCERT', '', '34623476237', '2019', 'New', 'KIT37VNS', '', '2019-02-13 12:24:59', 'Available'),
(65, 'Mathematics I', 'CSE', 'RS aggrawal', '', '', '', '', 'NCERT', '', '34623476237', '2019', 'New', 'KIT38VNS', '', '2019-02-13 12:24:59', 'Available'),
(66, 'Mathematics I', 'CSE', 'RS aggrawal', '', '', '', '', 'NCERT', '', '34623476237', '2019', 'New', 'KIT39VNS', '', '2019-02-13 12:24:59', 'Available'),
(67, 'Mathematics I', 'CSE', 'RS aggrawal', '', '', '', '', 'NCERT', '', '34623476237', '2019', 'New', 'KIT40VNS', '', '2019-02-13 12:24:59', 'Available'),
(68, 'Mathematics I', 'CSE', 'RS aggrawal', '', '', '', '', 'NCERT', '', '34623476237', '2019', 'New', 'KIT41VNS', '', '2019-02-13 12:24:59', 'Not Available'),
(69, 'Mathematics I', 'CSE', 'RS aggrawal', '', '', '', '', 'NCERT', '', '34623476237', '2019', 'New', 'KIT42VNS', '', '2019-02-13 12:24:59', 'Available'),
(70, 'let us C', 'CSE', 'Yashwant Kanetkar', '', '', '', '', 'pearson', '', '352857325729', '2016', 'New', 'KIT43VNS', '', '2019-02-19 13:05:00', 'Available'),
(71, 'let us C', 'CSE', 'Yashwant Kanetkar', '', '', '', '', 'pearson', '', '352857325729', '2016', 'New', 'KIT44VNS', '', '2019-02-19 13:05:00', 'Available'),
(72, 'let us C', 'CSE', 'Yashwant Kanetkar', '', '', '', '', 'pearson', '', '352857325729', '2016', 'New', 'KIT45VNS', '', '2019-02-19 13:05:01', 'Available'),
(73, 'Pattern Recognition', 'CSE', 'Geoff', '', '', '', '', 'xyz', '', '545646546', '2019', 'New', 'KIT46VNS', '', '2019-03-29 21:15:44', 'Not Available');

-- --------------------------------------------------------

--
-- Table structure for table `borrow_book`
--

CREATE TABLE `borrow_book` (
  `borrow_book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `date_borrowed` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `date_returned` varchar(255) DEFAULT NULL,
  `borrowed_status` varchar(100) NOT NULL,
  `book_penalty` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow_book`
--

INSERT INTO `borrow_book` (`borrow_book_id`, `user_id`, `book_id`, `date_borrowed`, `due_date`, `date_returned`, `borrowed_status`, `book_penalty`) VALUES
(12, 10, 72, '2019-04-03 13:13:02', '2019-04-06 13:13:02', '2019-04-03 13:13:06', 'returned', 'No Penalty'),
(13, 10, 30, '2019-04-03 13:40:39', '2019-04-06 13:40:39', '2019-04-03 13:41:13', 'returned', 'No Penalty'),
(14, 10, 38, '2019-04-03 13:40:51', '2019-04-06 13:40:51', '2019-04-03 13:41:17', 'returned', 'No Penalty'),
(15, 13, 70, '2019-04-04 11:43:19', '2019-04-07 11:43:19', '2019-04-04 11:45:03', 'returned', 'No Penalty'),
(16, 12, 73, '2019-04-10 03:11:02', '2019-04-13 03:11:02', NULL, 'borrowed', NULL),
(17, 9, 32, '2019-04-11 13:55:37', '2019-04-14 13:55:37', NULL, 'borrowed', NULL),
(18, 9, 68, '2019-04-11 13:55:51', '2019-04-14 13:55:51', NULL, 'borrowed', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penalty`
--

CREATE TABLE `penalty` (
  `penalty_id` int(11) NOT NULL,
  `penalty_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penalty`
--

INSERT INTO `penalty` (`penalty_id`, `penalty_amount`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `detail_action` varchar(100) NOT NULL,
  `date_transaction` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `book_id`, `user_id`, `admin_name`, `detail_action`, `date_transaction`) VALUES
(32, 72, 10, 'Ankesh  Pandey', 'Borrowed Book', '2019-04-03 10:43:06'),
(33, 72, 10, 'Ankesh  Pandey', 'Returned Book', '2019-04-03 10:43:13'),
(34, 30, 10, 'Aryan  Singh', 'Borrowed Book', '2019-04-03 11:10:43'),
(35, 38, 10, 'Aryan  Singh', 'Borrowed Book', '2019-04-03 11:10:53'),
(36, 30, 10, 'Aryan  Singh', 'Returned Book', '2019-04-03 11:11:17'),
(37, 38, 10, 'Aryan  Singh', 'Returned Book', '2019-04-03 11:11:21'),
(38, 70, 13, 'Aryan  Singh', 'Borrowed Book', '2019-04-04 09:13:22'),
(39, 70, 13, 'Aryan  Singh', 'Returned Book', '2019-04-04 09:15:06'),
(40, 73, 12, 'Ankesh  Pandey', 'Borrowed Book', '2019-04-10 00:41:06'),
(41, 32, 9, 'Ankesh  Pandey', 'Borrowed Book', '2019-04-11 11:25:41'),
(42, 68, 9, 'Ankesh  Pandey', 'Borrowed Book', '2019-04-11 11:25:56');

-- --------------------------------------------------------

--
-- Table structure for table `return_book`
--

CREATE TABLE `return_book` (
  `return_book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `date_borrowed` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `date_returned` datetime NOT NULL,
  `book_penalty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `return_book`
--

INSERT INTO `return_book` (`return_book_id`, `user_id`, `book_id`, `date_borrowed`, `due_date`, `date_returned`, `book_penalty`) VALUES
(5, 10, 72, '2019-04-03 13:13:02', '2019-04-06 13:13:02', '2019-04-03 13:13:13', 'No Penalty'),
(6, 10, 30, '2019-04-03 13:40:39', '2019-04-06 13:40:39', '2019-04-03 13:41:17', 'No Penalty'),
(7, 10, 38, '2019-04-03 13:40:51', '2019-04-06 13:40:51', '2019-04-03 13:41:21', 'No Penalty'),
(8, 13, 70, '2019-04-04 11:43:19', '2019-04-07 11:43:19', '2019-04-04 11:45:06', 'No Penalty');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `roll_number` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `user_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `roll_number`, `firstname`, `middlename`, `lastname`, `contact`, `gender`, `address`, `type`, `branch`, `user_added`) VALUES
(8, '1542810001', 'Shashank', '', 'Patel', '8423663232', 'Male', 'Mahmoorganj', 'Student', 'CSE', '2018-09-17 15:34:19'),
(9, '4524466', 'sunil', '', 'kumar', '8945485548', 'Male', 'mahmoorganj', 'Teacher', 'N/A', '2019-01-30 10:54:14'),
(10, '1542810087', 'Rishabh', 'kumar', 'Chaubey', '7897934503', 'Male', 'Lohta , Varanasi', 'Student', 'CSE', '2019-01-30 11:23:04'),
(11, '1542810018', 'Ankesh', '', 'Pandey', '9454192054', 'Male', 'Chandmari , Varanasi', 'Student', 'CSE', '2019-01-30 11:39:34'),
(12, '1542821009', 'Ayush', '', 'Prajapati', '7309353794', 'Male', 'Bhojubeer Varanasi', 'Student', 'EN', '2019-03-31 17:14:08'),
(13, '1542810100', 'Saurabh ', '', 'Gupta', '9005042398', 'Male', 'Gyanpur', 'Student', 'CSE', '2019-04-04 09:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `user_log_id` int(11) NOT NULL,
  `firstname` varchar(11) NOT NULL,
  `middlename` varchar(11) NOT NULL,
  `lastname` varchar(11) NOT NULL,
  `admin_type` varchar(11) NOT NULL,
  `date_log` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`user_log_id`, `firstname`, `middlename`, `lastname`, `admin_type`, `date_log`) VALUES
(143, 'Ankesh', '', 'Pandey', 'Admin', '2019-02-16 04:33:14'),
(144, 'Aryan', '', 'Singh', 'librarian', '2019-02-16 04:47:09'),
(145, 'Aryan', '', 'Singh', 'librarian', '2019-02-19 09:15:54'),
(146, 'Aryan', '', 'Singh', 'librarian', '2019-02-19 12:39:08'),
(147, 'Aryan', '', 'Singh', 'librarian', '2019-02-19 13:03:50'),
(148, 'Ankesh', '', 'Pandey', 'Admin', '2019-02-19 13:27:36'),
(149, 'Aryan', '', 'Singh', 'librarian', '2019-02-19 13:48:46'),
(150, 'Aryan', '', 'Singh', 'librarian', '2019-02-19 13:48:57'),
(151, 'Ankesh', '', 'Pandey', 'Admin', '2019-02-19 13:49:18'),
(152, 'Aryan', '', 'Singh', 'librarian', '2019-02-21 16:43:17'),
(153, 'Ankesh', '', 'Pandey', 'Admin', '2019-02-21 16:45:01'),
(154, 'Aryan', '', 'Singh', 'librarian', '2019-02-21 16:59:12'),
(155, 'Ankesh', '', 'Pandey', 'Admin', '2019-02-21 17:01:53'),
(156, 'Ankesh', '', 'Pandey', 'Admin', '2019-02-21 17:13:23'),
(157, 'Aryan', '', 'Singh', 'librarian', '2019-02-27 20:56:37'),
(158, 'Ankesh', '', 'Pandey', 'Admin', '2019-02-27 20:56:51'),
(159, 'Aryan', '', 'Singh', 'librarian', '2019-03-01 15:32:44'),
(160, 'Ankesh', '', 'Pandey', 'Admin', '2019-03-01 15:32:54'),
(161, 'Aryan', '', 'Singh', 'librarian', '2019-03-01 15:34:35'),
(162, 'Ankesh', '', 'Pandey', 'Admin', '2019-03-01 15:35:22'),
(163, 'Ankesh', '', 'Pandey', 'Admin', '2019-03-05 09:09:52'),
(164, 'Ankesh', '', 'Pandey', 'Admin', '2019-03-05 12:19:20'),
(165, 'Ankesh', '', 'Pandey', 'Admin', '2019-03-22 21:45:27'),
(166, 'Ankesh', '', 'Pandey', 'Admin', '2019-03-29 21:04:25'),
(167, 'Ankesh', '', 'Pandey', 'Admin', '2019-03-31 17:10:55'),
(168, 'Aryan', '', 'Singh', 'librarian', '2019-03-31 17:15:34'),
(169, 'Ankesh', '', 'Pandey', 'Admin', '2019-03-31 17:30:09'),
(170, 'Aryan', '', 'Singh', 'librarian', '2019-03-31 17:44:49'),
(171, 'Ankesh', '', 'Pandey', 'Admin', '2019-04-02 08:47:45'),
(172, 'Ankesh', '', 'Pandey', 'Admin', '2019-04-03 08:42:43'),
(173, 'Ankesh', '', 'Pandey', 'Admin', '2019-04-03 10:06:39'),
(174, 'Aryan', '', 'Singh', 'librarian', '2019-04-03 10:48:03'),
(175, 'Ankesh', '', 'Pandey', 'Admin', '2019-04-04 09:10:54'),
(176, 'Aryan', '', 'Singh', 'librarian', '2019-04-04 09:11:18'),
(177, 'Ankesh', '', 'Pandey', 'Admin', '2019-04-04 19:06:32'),
(178, 'Ankesh', '', 'Pandey', 'Admin', '2019-04-05 09:35:28'),
(179, 'Ankesh', '', 'Pandey', 'Admin', '2019-04-10 00:38:45'),
(180, 'Aryan', '', 'Singh', 'librarian', '2019-04-10 01:13:47'),
(181, 'Ankesh', '', 'Pandey', 'Admin', '2019-04-10 01:14:08'),
(182, 'Ankesh', '', 'Pandey', 'Admin', '2019-04-10 09:37:38'),
(183, 'Ankesh', '', 'Pandey', 'Admin', '2019-04-10 09:53:42'),
(184, 'Ankesh', '', 'Pandey', 'Admin', '2019-04-10 13:23:34'),
(185, 'Ankesh', '', 'Pandey', 'Admin', '2019-04-10 13:42:56'),
(186, 'Aryan', '', 'Singh', 'librarian', '2019-04-10 13:44:41'),
(187, 'Aryan', '', 'Singh', 'librarian', '2019-04-10 13:45:54'),
(188, 'Ankesh', '', 'Pandey', 'Admin', '2019-04-10 13:47:33'),
(189, 'Aryan', '', 'Singh', 'librarian', '2019-04-10 13:48:04'),
(190, 'Ankesh', '', 'Pandey', 'Admin', '2019-04-10 14:07:17'),
(191, 'Aryan', '', 'Singh', 'librarian', '2019-04-10 14:12:00'),
(192, 'Ankesh', '', 'Pandey', 'Admin', '2019-04-10 14:13:26'),
(193, 'Ankesh', '', 'Pandey', 'Admin', '2019-04-10 14:15:07'),
(194, 'Aryan', '', 'Singh', 'librarian', '2019-04-10 14:15:20'),
(195, 'Ankesh', '', 'Pandey', 'Admin', '2019-04-10 14:17:09'),
(196, 'Aryan', '', 'Singh', 'librarian', '2019-04-10 14:18:37'),
(197, 'Aryan', '', 'Singh', 'librarian', '2019-04-10 14:38:17'),
(198, 'Ankesh', '', 'Pandey', 'Admin', '2019-04-10 15:36:40'),
(199, 'Aryan', '', 'Singh', 'librarian', '2019-04-11 10:10:36'),
(200, 'Ankesh', '', 'Pandey', 'Admin', '2019-04-11 11:24:47'),
(201, 'Aryan', '', 'Singh', 'librarian', '2019-04-14 18:32:12'),
(202, 'Aryan', '', 'Singh', 'librarian', '2019-04-14 19:09:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `allowed_book`
--
ALTER TABLE `allowed_book`
  ADD PRIMARY KEY (`allowed_book_id`);

--
-- Indexes for table `allowed_days`
--
ALTER TABLE `allowed_days`
  ADD PRIMARY KEY (`allowed_days_id`);

--
-- Indexes for table `barcode`
--
ALTER TABLE `barcode`
  ADD PRIMARY KEY (`barcode_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `borrow_book`
--
ALTER TABLE `borrow_book`
  ADD PRIMARY KEY (`borrow_book_id`);

--
-- Indexes for table `penalty`
--
ALTER TABLE `penalty`
  ADD PRIMARY KEY (`penalty_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `return_book`
--
ALTER TABLE `return_book`
  ADD PRIMARY KEY (`return_book_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`user_log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `allowed_book`
--
ALTER TABLE `allowed_book`
  MODIFY `allowed_book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `allowed_days`
--
ALTER TABLE `allowed_days`
  MODIFY `allowed_days_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barcode`
--
ALTER TABLE `barcode`
  MODIFY `barcode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `borrow_book`
--
ALTER TABLE `borrow_book`
  MODIFY `borrow_book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `penalty`
--
ALTER TABLE `penalty`
  MODIFY `penalty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `return_book`
--
ALTER TABLE `return_book`
  MODIFY `return_book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `user_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
