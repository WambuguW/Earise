-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2015 at 07:36 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dmyreports`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblreports`
--

CREATE TABLE IF NOT EXISTS `tblreports` (
  `id` int(11) NOT NULL,
  `appliedConditions` longtext,
  `txtReportName` text,
  `lstSortName` text,
  `lstSortOrder` text,
  `txtRecPerPage` text,
  `selectedFields` text,
  `selectedTables` text,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblreports`
--

INSERT INTO `tblreports` (`id`, `appliedConditions`, `txtReportName`, `lstSortName`, `lstSortOrder`, `txtRecPerPage`, `selectedFields`, `selectedTables`, `status`) VALUES
(1, '`sales`.`amount`>''0'' ~', 'sales report', '`sales`.`transaction_id`', 'ASC', '20', '`sales`.`transaction_id`~`sales`.`invoice_number`~`sales`.`cashier`~`sales`.`date`~`sales`.`type`~`sales`.`amount`~`sales`.`due_date`~`sales`.`name`~`sales`.`balance`~', '`sales`~', 0),
(2, '`expense`.`expense`>''0'' ~', 'expenses report', '`expense`.`id`', 'ASC', '20', '`expense`.`id`~`expense`.`expense`~`expense`.`receipt`~`expense`.`date`~`expense`.`amount`~`expense`.`authorization`~`expense`.`comment`~', '`sales`~`expense`~', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblreports`
--
ALTER TABLE `tblreports`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblreports`
--
ALTER TABLE `tblreports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
