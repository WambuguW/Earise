-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2015 at 07:16 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `esacco_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
`id` int(255) NOT NULL,
  `acname` varchar(255) NOT NULL,
  `actype` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `acname`, `actype`, `comments`, `status`, `date`) VALUES
(1, 'ICBBU1NFVFMg', 'QmFsYW5jZSBTaGVldA==', '', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(2, 'ICBMSUFCSUxJVElFUyA=', 'QmFsYW5jZSBTaGVldA==', '', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(3, 'ICBDQVBJVEFMIA==', 'QmFsYW5jZSBTaGVldA==', '', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(4, 'ICBJTkNPTUUg', 'UHJvZml0ICYgTG9zcw==', '', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(5, 'ICBDT1NUUyAmIEVYUEVOU0VTIA==', 'UHJvZml0ICYgTG9zcw==', '', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(6, 'cGVzYQ==', 'UHJvZml0ICYgTG9zcw==', '', 'QWN0aXZl', 'MjktSnVuLTIwMTU='),
(7, 'bG9zc2Vz', 'UHJvZml0ICYgTG9zcw==', '', 'QWN0aXZl', 'MDctQXVnLTIwMTU=');

-- --------------------------------------------------------

--
-- Table structure for table `acset`
--

CREATE TABLE IF NOT EXISTS `acset` (
`id` int(255) NOT NULL,
  `loanappfee` varchar(255) NOT NULL,
  `loaninsurance` varchar(255) NOT NULL,
  `minimumacbl` varchar(255) NOT NULL,
  `minimumloan` varchar(255) NOT NULL,
  `benevolent` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acset`
--

INSERT INTO `acset` (`id`, `loanappfee`, `loaninsurance`, `minimumacbl`, `minimumloan`, `benevolent`) VALUES
(1, 'TlVMTA==', 'TlVMTA==', 'MA==', 'MA==', 'TlVMTA==');

-- --------------------------------------------------------

--
-- Table structure for table `addbank`
--

CREATE TABLE IF NOT EXISTS `addbank` (
  `audituser` varchar(255) NOT NULL,
  `bankname` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `accno` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
`primarykey` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addbank`
--

INSERT INTO `addbank` (`audituser`, `bankname`, `branch`, `accno`, `status`, `date`, `primarykey`) VALUES
('', 'V2VidXllIFNodXR0bGUgU2FjY28gQ28tb3AgQmFuaw==', 'V2VidXllIEJyYW5jaA==', 'MDExMjAzNDAyNzMzMDA=', 'QWN0aXZl', 'MDUtSnVuLTIwMTU=', 1),
('', 'V2VidXllIFNodXR0bGUgU2FjY28gS0NCIEJhbms=', 'V2VidXllIEJyYW5jaA==', 'MTEzMzc4NTI3MQ==', 'QWN0aXZl', 'MDUtSnVuLTIwMTU=', 2),
('MA==', 'V2VidXllIFNodXR0bGUgU2FjY28gQmVuZXZvbGVudCBLQ0I=', 'V2VidXllIEJyYW5jaA==', 'MTEzMzc4NTEyMw==', 'QWN0aXZl', 'MDYtSnVuLTIwMTU=', 3),
('OQ==', 'aGV5IGJhbms=', 'Ym5r', 'Njc=', 'QWN0aXZl', 'MDUtQXVnLTIwMTU=', 4);

-- --------------------------------------------------------

--
-- Table structure for table `addcreditor`
--

CREATE TABLE IF NOT EXISTS `addcreditor` (
`id` int(255) NOT NULL,
  `dname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dcont` varchar(255) NOT NULL,
  `demail` varchar(255) NOT NULL,
  `kra` varchar(255) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `audituser` varchar(255) NOT NULL,
  `auditdate` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addcreditor`
--

INSERT INTO `addcreditor` (`id`, `dname`, `address`, `dcont`, `demail`, `kra`, `terms`, `status`, `audituser`, `auditdate`) VALUES
(1, 'WUVzcw==', 'Njc2NTY=', 'MDcxMTEyMjM0', 'eWVzc0B5YWhvby5jb20=', 'QTIzNDVE', 'RHVlIEVuZCBNb250aA==', 'QWN0aXZl', 'MTY=', 'MDctQXVnLTIwMTU=');

-- --------------------------------------------------------

--
-- Table structure for table `addebtor`
--

CREATE TABLE IF NOT EXISTS `addebtor` (
`id` int(255) NOT NULL,
  `dname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dcont` varchar(255) NOT NULL,
  `demail` varchar(255) NOT NULL,
  `kra` varchar(255) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `creditstatus` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `audituser` varchar(255) NOT NULL,
  `auditdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `addressbooks`
--

CREATE TABLE IF NOT EXISTS `addressbooks` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `client` varchar(255) NOT NULL,
  `mno` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addressbooks`
--

INSERT INTO `addressbooks` (`id`, `name`, `client`, `mno`, `contact`) VALUES
(1, 'YWxsIG1lbWJlcnM=', '', 'MDAwNzM=', 'MjM0NTY='),
(2, 'YWxsIG1lbWJlcnM=', '', 'MDAwNzQ=', 'KzI1NDcyMzY2ODE4NA=='),
(3, 'YWxsIG1lbWJlcnM=', '', 'MDAwNzU=', 'MDcxNzYxMzAxOQ=='),
(4, 'YWxsIG1lbWJlcnM=', '', 'MDAwNzc=', 'MDcyNjEwMzgzNw==');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `uname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uname`, `password`) VALUES
('c3NhY2Nv', 'c3NhY2Nv');

-- --------------------------------------------------------

--
-- Table structure for table `approvalauthority`
--

CREATE TABLE IF NOT EXISTS `approvalauthority` (
`id` int(11) NOT NULL,
  `authority` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approvalauthority`
--

INSERT INTO `approvalauthority` (`id`, `authority`) VALUES
(1, 'Y29tbWFuZA=='),
(2, 'Y29tbWFuZA==');

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE IF NOT EXISTS `assets` (
`id` int(255) NOT NULL,
  `accountid` varchar(255) NOT NULL,
  `asname` varchar(255) NOT NULL,
  `asvalue` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

CREATE TABLE IF NOT EXISTS `audit` (
`id` int(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `mno` varchar(255) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit`
--

INSERT INTO `audit` (`id`, `user`, `mno`, `activity`, `date`, `time`) VALUES
(1, 'MTc=', '', 'RWRpdGVkIG1lbWJlciAwMDA3Nw==', 'MTMtQXVnLTIwMTU=', 'VGh1cnNkYXkgMTN0aCBvZiBBdWd1c3QgMjAxNSAwMzo1NjoyNCBQTQ=='),
(2, 'MTc=', '', 'RWRpdGVkIG1lbWJlciAwMDA3Nw==', 'MTMtQXVnLTIwMTU=', 'VGh1cnNkYXkgMTN0aCBvZiBBdWd1c3QgMjAxNSAwMzo1NzoxNCBQTQ=='),
(3, 'MTc=', 'MDAwNzc=', 'YWRkZWQgZ3VhcmFudG9yMDAwNzcgZm9yIGxvYW4gYXBwbGljYW50IDAwMDc3', 'MTMtQXVnLTIwMTU=', 'VGh1cnNkYXkgMTN0aCBvZiBBdWd1c3QgMjAxNSAwNDowNjoyNyBQTQ=='),
(4, '', 'TURBd056Yz0=', 'Y3JlYXRlZCBMb2FuICBkaXNidXNtZW50IGZvciAwMDA3Nw==', 'MTMtQXVnLTIwMTU=', 'VGh1cnNkYXkgMTN0aCBvZiBBdWd1c3QgMjAxNSAwNDowNzo1NSBQTQ=='),
(5, 'MTE=', 'MDAwNzQ=', 'YWRkZWQgZ3VhcmFudG9yMDAwNzQgZm9yIGxvYW4gYXBwbGljYW50IDAwMDc0', 'MTMtQXVnLTIwMTU=', 'VGh1cnNkYXkgMTN0aCBvZiBBdWd1c3QgMjAxNSAwNDowNzo1NyBQTQ=='),
(6, 'MTc=', 'MTc=', 'UHJvY2Vzc2VkIGEgIGZvciBNZW1iZXIgTnVtYmVyIDAwMDc3', 'MTMtQXVnLTIwMTU=', 'VGh1cnNkYXkgMTN0aCBvZiBBdWd1c3QgMjAxNSAwNDowODoxMSBQTQ=='),
(7, '', 'TURBd056UT0=', 'Y3JlYXRlZCBMb2FuICBkaXNidXNtZW50IGZvciAwMDA3NA==', 'MTMtQXVnLTIwMTU=', 'VGh1cnNkYXkgMTN0aCBvZiBBdWd1c3QgMjAxNSAwNDowOToxNyBQTQ=='),
(8, 'MTc=', 'MDAwNzc=', 'QWRkZWQgY29udHJpYnV0aW9uIGFtb3VudCDXnTRmb3LTTTs=', 'MTMtQXVnLTIwMTU=', 'VGh1cnNkYXkgMTN0aCBvZiBBdWd1c3QgMjAxNSAwNDowOTozNiBQTQ=='),
(9, 'MTE=', 'MTE=', 'UHJvY2Vzc2VkIGEgIGZvciBNZW1iZXIgTnVtYmVyIDAwMDc0', 'MTMtQXVnLTIwMTU=', 'VGh1cnNkYXkgMTN0aCBvZiBBdWd1c3QgMjAxNSAwNDowOTo1MiBQTQ=='),
(10, 'MTc=', 'MDAwNzc=', 'YWRkZWQgZ3VhcmFudG9yMDAwNzcgZm9yIGxvYW4gYXBwbGljYW50IDAwMDc3', 'MTMtQXVnLTIwMTU=', 'VGh1cnNkYXkgMTN0aCBvZiBBdWd1c3QgMjAxNSAwNDoxMToxNSBQTQ=='),
(11, '', 'TURBd056Yz0=', 'Y3JlYXRlZCBMb2FuICBkaXNidXNtZW50IGZvciAwMDA3Nw==', 'MTMtQXVnLTIwMTU=', 'VGh1cnNkYXkgMTN0aCBvZiBBdWd1c3QgMjAxNSAwNDoxMjoyMyBQTQ=='),
(12, 'MTc=', 'MTc=', 'UHJvY2Vzc2VkIGEgIGZvciBNZW1iZXIgTnVtYmVyIDAwMDc3', 'MTMtQXVnLTIwMTU=', 'VGh1cnNkYXkgMTN0aCBvZiBBdWd1c3QgMjAxNSAwNDoxMjo0NiBQTQ=='),
(13, 'MTc=', 'MTc=', 'QWRkZWQgRXhwZW5zZSAgZXNhY2Mx', 'MTMtQXVnLTIwMTU=', 'VGh1cnNkYXkgMTN0aCBvZiBBdWd1c3QgMjAxNSAwNDoxODo1MiBQTQ=='),
(14, 'MTE=', 'MDAwNzQ=', 'YWRkZWQgZ3VhcmFudG9yMDAwNzQgZm9yIGxvYW4gYXBwbGljYW50IDAwMDc0', 'MTMtQXVnLTIwMTU=', 'VGh1cnNkYXkgMTN0aCBvZiBBdWd1c3QgMjAxNSAwNDoyMTo0NSBQTQ=='),
(15, '', 'TURBd056UT0=', 'Y3JlYXRlZCBMb2FuICBkaXNidXNtZW50IGZvciAwMDA3NA==', 'MTMtQXVnLTIwMTU=', 'VGh1cnNkYXkgMTN0aCBvZiBBdWd1c3QgMjAxNSAwNDozMDozNSBQTQ=='),
(16, 'MTc=', 'MDAwNzc=', 'YWRkZWQgZ3VhcmFudG9yMDAwNzcgZm9yIGxvYW4gYXBwbGljYW50IDAwMDc3', 'MTMtQXVnLTIwMTU=', 'VGh1cnNkYXkgMTN0aCBvZiBBdWd1c3QgMjAxNSAwNDozMDo1OCBQTQ=='),
(17, 'MTE=', 'MTE=', 'UHJvY2Vzc2VkIGEgIGZvciBNZW1iZXIgTnVtYmVyIDAwMDc0', 'MTMtQXVnLTIwMTU=', 'VGh1cnNkYXkgMTN0aCBvZiBBdWd1c3QgMjAxNSAwNDozMTozMCBQTQ=='),
(18, '', 'TURBd056Yz0=', 'Y3JlYXRlZCBMb2FuICBkaXNidXNtZW50IGZvciAwMDA3Nw==', 'MTMtQXVnLTIwMTU=', 'VGh1cnNkYXkgMTN0aCBvZiBBdWd1c3QgMjAxNSAwNDozMjowNyBQTQ=='),
(19, 'MTc=', 'MTc=', 'UHJvY2Vzc2VkIGEgIGZvciBNZW1iZXIgTnVtYmVyIDAwMDc3', 'MTMtQXVnLTIwMTU=', 'VGh1cnNkYXkgMTN0aCBvZiBBdWd1c3QgMjAxNSAwNDozMjoyMiBQTQ=='),
(20, 'MTE=', 'MDAwNzQ=', 'QWRkZWQgY29udHJpYnV0aW9uIGFtb3VudCDXTTRmb3LTTTs=', 'MTMtQXVnLTIwMTU=', 'VGh1cnNkYXkgMTN0aCBvZiBBdWd1c3QgMjAxNSAwNDozNDo0OCBQTQ=='),
(21, 'MTc=', 'MDAwNzc=', 'QWRkZWQgY29udHJpYnV0aW9uIGFtb3VudCDbTTRmb3LTTTs=', 'MTMtQXVnLTIwMTU=', 'VGh1cnNkYXkgMTN0aCBvZiBBdWd1c3QgMjAxNSAwNDozNDo1NSBQTQ=='),
(22, 'MTc=', 'MDAwNzc=', 'QWRkZWQgY29udHJpYnV0aW9uIGFtb3VudCDbfTRmb3LTTTs=', 'MTMtQXVnLTIwMTU=', 'VGh1cnNkYXkgMTN0aCBvZiBBdWd1c3QgMjAxNSAwNDozNToyOCBQTQ=='),
(23, 'MTc=', 'MDAwNzc=', 'YWRkZWQgZ3VhcmFudG9yMDAwNzcgZm9yIGxvYW4gYXBwbGljYW50IDAwMDc3', 'MTMtQXVnLTIwMTU=', 'VGh1cnNkYXkgMTN0aCBvZiBBdWd1c3QgMjAxNSAwNDo1NjoxNiBQTQ=='),
(24, '', 'TURBd056Yz0=', 'Y3JlYXRlZCBMb2FuICBkaXNidXNtZW50IGZvciAwMDA3Nw==', 'MTMtQXVnLTIwMTU=', 'VGh1cnNkYXkgMTN0aCBvZiBBdWd1c3QgMjAxNSAwNDo1NzoyNCBQTQ=='),
(25, 'MTc=', 'MTc=', 'UHJvY2Vzc2VkIGEgIGZvciBNZW1iZXIgTnVtYmVyIDAwMDc3', 'MTMtQXVnLTIwMTU=', 'VGh1cnNkYXkgMTN0aCBvZiBBdWd1c3QgMjAxNSAwNDo1Nzo0NyBQTQ=='),
(26, 'MTE=', 'MDAwNzQ=', 'YWRkZWQgZ3VhcmFudG9yMDAwNzQgZm9yIGxvYW4gYXBwbGljYW50IDAwMDc0', 'MTMtQXVnLTIwMTU=', 'VGh1cnNkYXkgMTN0aCBvZiBBdWd1c3QgMjAxNSAwNTowODoyMyBQTQ=='),
(27, 'MTI=', 'MDAwNzY=', 'YWRkZWQgZ3VhcmFudG9yMDAwNzYgZm9yIGxvYW4gYXBwbGljYW50IDAwMDc2', 'MTMtQXVnLTIwMTU=', 'VGh1cnNkYXkgMTN0aCBvZiBBdWd1c3QgMjAxNSAwNTowOTowOSBQTQ=='),
(28, 'MTI=', 'MTI=', 'UHJvY2Vzc2VkIGEgIGZvciBNZW1iZXIgTnVtYmVyIDAwMDc2', 'MTMtQXVnLTIwMTU=', 'VGh1cnNkYXkgMTN0aCBvZiBBdWd1c3QgMjAxNSAwNToxMDowMCBQTQ=='),
(29, '', 'TURBd056UT0=', 'Y3JlYXRlZCBMb2FuICBkaXNidXNtZW50IGZvciAwMDA3NA==', 'MTMtQXVnLTIwMTU=', 'VGh1cnNkYXkgMTN0aCBvZiBBdWd1c3QgMjAxNSAwNToxMTo0MCBQTQ=='),
(30, 'MTE=', 'MTE=', 'UHJvY2Vzc2VkIGEgIGZvciBNZW1iZXIgTnVtYmVyIDAwMDc0', 'MTMtQXVnLTIwMTU=', 'VGh1cnNkYXkgMTN0aCBvZiBBdWd1c3QgMjAxNSAwNToxMjoxNiBQTQ=='),
(31, 'MTc=', 'MDAwNzc=', 'YWRkZWQgZ3VhcmFudG9yMDAwNzcgZm9yIGxvYW4gYXBwbGljYW50IDAwMDc3', 'MTMtQXVnLTIwMTU=', 'VGh1cnNkYXkgMTN0aCBvZiBBdWd1c3QgMjAxNSAwNToxOTo0MSBQTQ=='),
(32, '', 'TURBd056Yz0=', 'Y3JlYXRlZCBMb2FuICBkaXNidXNtZW50IGZvciAwMDA3Nw==', 'MTMtQXVnLTIwMTU=', 'VGh1cnNkYXkgMTN0aCBvZiBBdWd1c3QgMjAxNSAwNToyMTo0NiBQTQ=='),
(33, 'MTc=', 'MTc=', 'UHJvY2Vzc2VkIGEgIGZvciBNZW1iZXIgTnVtYmVyIDAwMDc3', 'MTMtQXVnLTIwMTU=', 'VGh1cnNkYXkgMTN0aCBvZiBBdWd1c3QgMjAxNSAwNToyMjowMSBQTQ=='),
(34, 'MTI=', 'MDAwNzY=', 'YWRkZWQgZ3VhcmFudG9yMDAwNzYgZm9yIGxvYW4gYXBwbGljYW50IDAwMDc2', 'MTQtQXVnLTIwMTU=', 'RnJpZGF5IDE0dGggb2YgQXVndXN0IDIwMTUgMTE6MzI6MzkgQU0='),
(35, '', 'TURBd056WT0=', 'Y3JlYXRlZCBMb2FuICBkaXNidXNtZW50IGZvciAwMDA3Ng==', 'MTQtQXVnLTIwMTU=', 'RnJpZGF5IDE0dGggb2YgQXVndXN0IDIwMTUgMTE6MzM6MzQgQU0='),
(36, 'MTI=', 'MTI=', 'UHJvY2Vzc2VkIGEgIGZvciBNZW1iZXIgTnVtYmVyIDAwMDc2', 'MTQtQXVnLTIwMTU=', 'RnJpZGF5IDE0dGggb2YgQXVndXN0IDIwMTUgMTE6MzM6NTAgQU0='),
(37, 'MTI=', 'MDAwNzY=', 'QWRkZWQgY29udHJpYnV0aW9uIGFtb3VudCDbnTRmb3LTTTs=', 'MTQtQXVnLTIwMTU=', 'RnJpZGF5IDE0dGggb2YgQXVndXN0IDIwMTUgMTE6NTE6MDkgQU0='),
(38, 'MTI=', 'MDAwNzY=', 'QWRkZWQgY29udHJpYnV0aW9uIGFtb3VudCDbnTRmb3LTTTs=', 'MTQtQXVnLTIwMTU=', 'RnJpZGF5IDE0dGggb2YgQXVndXN0IDIwMTUgMTI6NTY6NDUgUE0='),
(39, 'MTI=', 'MDAwNzY=', 'YWRkZWQgZ3VhcmFudG9yMDAwNzYgZm9yIGxvYW4gYXBwbGljYW50IDAwMDc2', 'MTQtQXVnLTIwMTU=', 'RnJpZGF5IDE0dGggb2YgQXVndXN0IDIwMTUgMTI6NTk6NTIgUE0='),
(40, '', 'TURBd056WT0=', 'Y3JlYXRlZCBMb2FuICBkaXNidXNtZW50IGZvciAwMDA3Ng==', 'MTQtQXVnLTIwMTU=', 'RnJpZGF5IDE0dGggb2YgQXVndXN0IDIwMTUgMDE6MDA6NDQgUE0='),
(41, 'MTI=', 'MTI=', 'UHJvY2Vzc2VkIGEgIGZvciBNZW1iZXIgTnVtYmVyIDAwMDc2', 'MTQtQXVnLTIwMTU=', 'RnJpZGF5IDE0dGggb2YgQXVndXN0IDIwMTUgMDE6MDU6MDYgUE0='),
(42, 'MTI=', 'MDAwNzY=', 'QWRkZWQgY29udHJpYnV0aW9uIGFtb3VudCDjnTRmb3LTTTs=', 'MTQtQXVnLTIwMTU=', 'RnJpZGF5IDE0dGggb2YgQXVndXN0IDIwMTUgMDE6MTk6NDkgUE0='),
(43, 'MTI=', 'MDAwNzY=', 'QWRkZWQgY29udHJpYnV0aW9uIGFtb3VudCDjnTRmb3LTTTs=', 'MTQtQXVnLTIwMTU=', 'RnJpZGF5IDE0dGggb2YgQXVndXN0IDIwMTUgMDE6NTY6MTkgUE0='),
(44, 'MTI=', 'MDAwNzY=', 'QWRkZWQgY29udHJpYnV0aW9uIGFtb3VudCDjTjpmb3LTTTs=', 'MTQtQXVnLTIwMTU=', 'RnJpZGF5IDE0dGggb2YgQXVndXN0IDIwMTUgMDI6MzE6NDQgUE0='),
(45, 'MTI=', 'MDAwNzY=', 'YWRkZWQgZ3VhcmFudG9yMDAwNzYgZm9yIGxvYW4gYXBwbGljYW50IDAwMDc2', 'MTQtQXVnLTIwMTU=', 'RnJpZGF5IDE0dGggb2YgQXVndXN0IDIwMTUgMDI6NDc6NDIgUE0='),
(46, '', 'TURBd056WT0=', 'Y3JlYXRlZCBMb2FuICBkaXNidXNtZW50IGZvciAwMDA3Ng==', 'MTQtQXVnLTIwMTU=', 'RnJpZGF5IDE0dGggb2YgQXVndXN0IDIwMTUgMDI6NDg6MzQgUE0='),
(47, 'MTI=', 'MTI=', 'QWRkZWQgYmFua2luZyB0cmFuc2FjdGlvbiDXvTzXnT3fvnkgdG8gdGhlIFnm7snkobrbZXkmnHKAqKKQWp4gYmFuaw==', 'MTctQXVnLTIwMTU=', 'TW9uZGF5IDE3dGggb2YgQXVndXN0IDIwMTUgMTI6NDk6MjggUE0='),
(48, 'MTI=', 'MTI=', 'QWRkZWQgYmFua2luZyB0cmFuc2FjdGlvbiDXvTzXnT3nTnQgdG8gdGhlIFnm7snkobrbZXkmnHKCggQWpyBiYW5r', 'MTctQXVnLTIwMTU=', 'TW9uZGF5IDE3dGggb2YgQXVndXN0IDIwMTUgMTI6NTE6MzMgUE0='),
(49, 'MTI=', 'MTI=', 'QWRkZWQgYmFua2luZyB0cmFuc2FjdGlvbiDXvTzXnT3nnfQgdG8gdGhlIFnm7snkobrbZXkmnHKAqKKQWp4gYmFuaw==', 'MTctQXVnLTIwMTU=', 'TW9uZGF5IDE3dGggb2YgQXVndXN0IDIwMTUgMTI6NTY6MTEgUE0='),
(50, 'MTI=', 'MTI=', 'QWRkZWQgYmFua2luZyB0cmFuc2FjdGlvbiDXvTzXnXTXjT3XIHRvIHRoZSAgYmFuaw==', 'MTctQXVnLTIwMTU=', 'TW9uZGF5IDE3dGggb2YgQXVndXN0IDIwMTUgMDE6MTQ6NTUgUE0='),
(51, 'MTI=', 'MTI=', 'QWRkZWQgYmFua2luZyB0cmFuc2FjdGlvbiDXvTzXnXTXrfrXIHRvIHRoZSAgYmFuaw==', 'MTctQXVnLTIwMTU=', 'TW9uZGF5IDE3dGggb2YgQXVndXN0IDIwMTUgMDE6MTc6MTUgUE0='),
(52, 'MTI=', 'MTI=', 'QWRkZWQgYmFua2luZyB0cmFuc2FjdGlvbiDXvTzXnXTXzjfXIHRvIHRoZSAgYmFuaw==', 'MTctQXVnLTIwMTU=', 'TW9uZGF5IDE3dGggb2YgQXVndXN0IDIwMTUgMDE6MTk6MjYgUE0='),
(53, 'MTI=', 'MTI=', 'QWRkZWQgYmFua2luZyB0cmFuc2FjdGlvbiDXvTzXnXTbXTfXIHRvIHRoZSAgYmFuaw==', 'MTctQXVnLTIwMTU=', 'TW9uZGF5IDE3dGggb2YgQXVndXN0IDIwMTUgMDE6MjE6MzAgUE0='),
(54, 'MTI=', 'MTI=', 'QWRkZWQgYmFua2luZyB0cmFuc2FjdGlvbiDXvTzXnXTbjXTXIHRvIHRoZSAgYmFuaw==', 'MTctQXVnLTIwMTU=', 'TW9uZGF5IDE3dGggb2YgQXVndXN0IDIwMTUgMDE6MjQ6NTIgUE0='),
(55, 'MTI=', 'MTI=', 'QWRkZWQgYmFua2luZyB0cmFuc2FjdGlvbiDXvTzXnXTbrTzXIHRvIHRoZSAgYmFuaw==', 'MTctQXVnLTIwMTU=', 'TW9uZGF5IDE3dGggb2YgQXVndXN0IDIwMTUgMDE6MjY6NTEgUE0='),
(56, 'MTI=', 'MTI=', 'QWRkZWQgYmFua2luZyB0cmFuc2FjdGlvbiDXvTzXnXXTjjjXIHRvIHRoZSAgYmFuaw==', 'MTctQXVnLTIwMTU=', 'TW9uZGF5IDE3dGggb2YgQXVndXN0IDIwMTUgMDI6MDY6MDAgUE0='),
(57, 'MTI=', 'MTI=', 'QWRkZWQgYmFua2luZyB0cmFuc2FjdGlvbiDXvTzXnXXTzjTXIHRvIHRoZSAgYmFuaw==', 'MTctQXVnLTIwMTU=', 'TW9uZGF5IDE3dGggb2YgQXVndXN0IDIwMTUgMDI6MDk6MjQgUE0='),
(58, 'MTI=', 'MTI=', 'QWRkZWQgYmFua2luZyB0cmFuc2FjdGlvbiDXvTzXnXXXrTjXIHRvIHRoZSAgYmFuaw==', 'MTctQXVnLTIwMTU=', 'TW9uZGF5IDE3dGggb2YgQXVndXN0IDIwMTUgMDI6MTc6NTMgUE0='),
(59, 'MTI=', 'MTI=', 'QWRkZWQgYmFua2luZyB0cmFuc2FjdGlvbiDXvTzXnT3T3XggdG8gdGhlICBiYW5r', 'MTctQXVnLTIwMTU=', 'TW9uZGF5IDE3dGggb2YgQXVndXN0IDIwMTUgMDI6MjI6MTkgUE0='),
(60, 'MTI=', 'MTI=', 'QWRkZWQgYmFua2luZyB0cmFuc2FjdGlvbiDXvTzXnXXXvnfXIHRvIHRoZSAgYmFuaw==', 'MTctQXVnLTIwMTU=', 'TW9uZGF5IDE3dGggb2YgQXVndXN0IDIwMTUgMDI6Mjc6MzYgUE0='),
(61, 'QWRtaW4=', 'QWRtaW4=', 'YWRkZWQgcGVyaW9kIG5hbWUgZGFpbHk=', 'MTgtQXVnLTIwMTU=', 'VHVlc2RheSAxOHRoIG9mIEF1Z3VzdCAyMDE1IDExOjQxOjA4IEFN'),
(62, 'QWRtaW4=', 'QWRtaW4=', 'YWRkZWQgcGVyaW9kIG5hbWUgd2Vla2x5', 'MTgtQXVnLTIwMTU=', 'VHVlc2RheSAxOHRoIG9mIEF1Z3VzdCAyMDE1IDExOjQxOjI5IEFN'),
(63, 'QWRtaW4=', 'QWRtaW4=', 'YWRkZWQgcGVyaW9kIG5hbWUgbW9udGhseQ==', 'MTgtQXVnLTIwMTU=', 'VHVlc2RheSAxOHRoIG9mIEF1Z3VzdCAyMDE1IDExOjQxOjU4IEFN'),
(64, 'MTI=', 'MTI=', 'dXBkYXRlZCBHTCBhY2NvdW50IHNldHRpbmdzIGZvciBGaXhlZCBEZXBvc2l0ICBJbnRlcmVzdCA=', 'MTgtQXVnLTIwMTU=', 'VHVlc2RheSAxOHRoIG9mIEF1Z3VzdCAyMDE1IDAxOjE0OjEyIFBN'),
(65, 'MTI=', 'MTI=', 'dXBkYXRlZCBHTCBhY2NvdW50IHNldHRpbmdzIGZvciBGaXhlZCBEZXBvc2l0ICBJbnRlcmVzdCA=', 'MTgtQXVnLTIwMTU=', 'VHVlc2RheSAxOHRoIG9mIEF1Z3VzdCAyMDE1IDAxOjE4OjUyIFBN'),
(66, 'MTI=', 'MTI=', 'dXBkYXRlZCBHTCBhY2NvdW50IHNldHRpbmdzIGZvciBGaXhlZCBEZXBvc2l0IG1hbmFnZW1lbnQgRmVl', 'MTgtQXVnLTIwMTU=', 'VHVlc2RheSAxOHRoIG9mIEF1Z3VzdCAyMDE1IDAxOjIyOjExIFBN'),
(67, 'MTI=', 'MTI=', 'dXBkYXRlZCBHTCBhY2NvdW50IHNldHRpbmdzIGZvciBGaXhlZCBEZXBvc2l0IGFjY291bnQgRmVl', 'MTgtQXVnLTIwMTU=', 'VHVlc2RheSAxOHRoIG9mIEF1Z3VzdCAyMDE1IDAxOjIyOjU5IFBN'),
(68, 'MTI=', 'MDAwNzM=', 'QWRkZWQgY29udHJpYnV0aW9uIGFtb3VudCDXzvRmb3JNZW1iZXI=', 'MTgtQXVnLTIwMTU=', 'VHVlc2RheSAxOHRoIG9mIEF1Z3VzdCAyMDE1IDAxOjUzOjUzIFBN'),
(69, 'MTI=', 'MDAwNzM=', 'QWRkZWQgY29udHJpYnV0aW9uIGFtb3VudCDfTTRmb3JNZW1iZXI=', 'MTgtQXVnLTIwMTU=', 'VHVlc2RheSAxOHRoIG9mIEF1Z3VzdCAyMDE1IDAyOjMyOjE5IFBN'),
(70, 'MQ==', 'MDAwNzc=', 'QWRkZWQgY29udHJpYnV0aW9uIGFtb3VudCDnfnRmb3JNZW1iZXI=', 'MTgtQXVnLTIwMTU=', 'VHVlc2RheSAxOHRoIG9mIEF1Z3VzdCAyMDE1IDA0OjQ0OjQ2IFBN'),
(71, 'MQ==', 'MDAwNzY=', 'QWRkZWQgY29udHJpYnV0aW9uIGFtb3VudCDj3zlmb3JNZW1iZXI=', 'MTgtQXVnLTIwMTU=', 'VHVlc2RheSAxOHRoIG9mIEF1Z3VzdCAyMDE1IDA1OjA1OjI2IFBN'),
(72, 'MQ==', 'MDAwNzY=', 'QWRkZWQgY29udHJpYnV0aW9uIGFtb3VudCDfnTRmb3JNZW1iZXI=', 'MTgtQXVnLTIwMTU=', 'VHVlc2RheSAxOHRoIG9mIEF1Z3VzdCAyMDE1IDA1OjEwOjAwIFBN'),
(73, 'MQ==', 'MDAwNzc=', 'dXBkYXRlZCBtZW1iZXIgMDAwNzcgY29udHJpYnV0aW9ucyB0byAzMDAw', 'MTgtQXVnLTIwMTU=', 'VHVlc2RheSAxOHRoIG9mIEF1Z3VzdCAyMDE1IDA1OjM5OjIyIFBN'),
(74, 'MQ==', 'MDAwNzY=', 'QWRkZWQgY29udHJpYnV0aW9uIGFtb3VudCDbTTRmb3JNZW1iZXI=', 'MTgtQXVnLTIwMTU=', 'VHVlc2RheSAxOHRoIG9mIEF1Z3VzdCAyMDE1IDA1OjQ1OjAzIFBN');

-- --------------------------------------------------------

--
-- Table structure for table `balances`
--

CREATE TABLE IF NOT EXISTS `balances` (
`primarykey` int(255) NOT NULL,
  `membernumber` varchar(255) NOT NULL,
  `actual` varchar(255) NOT NULL,
  `available` varchar(255) NOT NULL,
  `realdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `banking`
--

CREATE TABLE IF NOT EXISTS `banking` (
  `audituser` varchar(255) NOT NULL,
  `bankname` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `accno` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `mode` varchar(255) NOT NULL,
  `ptype` varchar(255) NOT NULL,
  `approvedby` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `transid` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `bnkid` varchar(255) NOT NULL,
  `accfrom` varchar(255) NOT NULL,
`primarykey` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banking`
--

INSERT INTO `banking` (`audituser`, `bankname`, `branch`, `accno`, `amount`, `mode`, `ptype`, `approvedby`, `status`, `comments`, `transid`, `date`, `session`, `state`, `bnkid`, `accfrom`, `primarykey`) VALUES
('am9obiAgIG5qb25qbyAgIE5qb25qbw==', 'MQ==', 'V2VidXllIEJyYW5jaA==', 'MDExMjAzNDAyNzMzMDA=', 'NTAw', 'ZGVwb3NpdA==', 'Q2FzaA==', 'MQ==', 'b2s=', 'b2s=', 'MTcwODE1MTExNjA0MTE=', 'MTctQXVnLTIwMTU=', '', 'Tm90IFJlY29uY2lsZWQ=', 'MQ==', 'MjQ4', 1),
('am9obiAgIG5qb25qbyAgIE5qb25qbw==', 'Mg==', 'V2VidXllIEJyYW5jaA==', 'MTEzMzc4NTI3MQ==', 'NDUw', 'd2l0aGRyYXc=', 'Q2FzaA==', 'Mg==', 'b2s=', 'b2s=', 'MTcwODE1MDkwOTE0OQ==', 'MTctQXVnLTIwMTU=', '', 'Tm90IFJlY29uY2lsZWQ=', 'Mg==', '', 2),
('am9obiAgIG5qb25qbyAgIE5qb25qbw==', 'MQ==', 'V2VidXllIEJyYW5jaA==', 'MDExMjAzNDAyNzMzMDA=', 'MTIwMA==', 'ZGVwb3NpdA==', 'Q2FzaA==', 'MQ==', 'b2s=', 'b2s=', 'MTcwODE1MTExNzUzMTE=', 'MTctQXVnLTIwMTU=', '', 'Tm90IFJlY29uY2lsZWQ=', 'MQ==', 'Mg==', 3);

-- --------------------------------------------------------

--
-- Table structure for table `bankingofficer`
--

CREATE TABLE IF NOT EXISTS `bankingofficer` (
`id` int(11) NOT NULL,
  `officer` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bankingofficer`
--

INSERT INTO `bankingofficer` (`id`, `officer`) VALUES
(1, 'd2lsbHk='),
(2, 'bmpvbmpv');

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE IF NOT EXISTS `bank_details` (
`id` int(20) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `member_number` varchar(100) NOT NULL,
  `account_number` varchar(100) NOT NULL,
  `account_type` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`id`, `bank_name`, `branch`, `member_number`, `account_number`, `account_type`, `status`) VALUES
(1, 'S0NC', 'dGhpa2E=', 'MDAwMQ==', 'MjM0NTY3', 'QWR1bHQ=', 'YWN0aXZl'),
(2, 'RXF1aXJ5', 'SnVqYQ==', 'QUEwMDA2OQ==', 'MjM0NTY1Nzg=', 'QWR1bHQ=', 'YWN0aXZl');

-- --------------------------------------------------------

--
-- Table structure for table `bpayments`
--

CREATE TABLE IF NOT EXISTS `bpayments` (
  `audituser` varchar(255) NOT NULL,
  `bankacc` varchar(255) NOT NULL,
  `receiveinv` varchar(255) NOT NULL,
  `creditor` varchar(255) NOT NULL,
  `glcode` varchar(255) NOT NULL,
  `glacc` varchar(255) NOT NULL,
  `chqno` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `ptype` varchar(255) NOT NULL,
  `transid` varchar(255) NOT NULL,
`id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

CREATE TABLE IF NOT EXISTS `budget` (
`id` int(255) NOT NULL,
  `account` varchar(255) NOT NULL,
  `datefrom` varchar(255) NOT NULL,
  `dateto` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cashbank`
--

CREATE TABLE IF NOT EXISTS `cashbank` (
`id` int(11) NOT NULL,
  `cash_in_hand` varchar(200) NOT NULL,
  `total_revenue` varchar(200) NOT NULL,
  `first_total` varchar(200) NOT NULL,
  `total_cash` varchar(200) NOT NULL,
  `bank_account` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cgroup`
--

CREATE TABLE IF NOT EXISTS `cgroup` (
`id` int(255) NOT NULL,
  `gname` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `auditdate` varchar(255) NOT NULL,
  `audituser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `checkoff`
--

CREATE TABLE IF NOT EXISTS `checkoff` (
  `contr` varchar(255) NOT NULL,
  `xmas` varchar(255) NOT NULL,
  `shares` varchar(255) NOT NULL,
  `entrance` varchar(255) NOT NULL,
  `principle` varchar(255) NOT NULL,
  `interest` varchar(255) NOT NULL,
  `tid` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `mno` varchar(255) NOT NULL,
  `audituser` varchar(255) NOT NULL,
  `auditdate` varchar(255) NOT NULL,
`id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `checkoffull`
--

CREATE TABLE IF NOT EXISTS `checkoffull` (
  `contr` varchar(255) NOT NULL,
  `xmas` varchar(255) NOT NULL,
  `shares` varchar(255) NOT NULL,
  `entrance` varchar(255) NOT NULL,
  `loan1` varchar(255) NOT NULL,
  `loan2` varchar(255) NOT NULL,
  `loan3` varchar(255) NOT NULL,
  `loan4` varchar(255) NOT NULL,
  `loan5` varchar(255) NOT NULL,
  `loan6` varchar(255) NOT NULL,
  `loan7` varchar(255) NOT NULL,
  `loan8` varchar(255) NOT NULL,
  `tid` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `mno` varchar(255) NOT NULL,
  `audituser` varchar(255) NOT NULL,
  `auditdate` varchar(255) NOT NULL,
`id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `check_off`
--

CREATE TABLE IF NOT EXISTS `check_off` (
`id` int(255) NOT NULL,
  `mno` varchar(255) NOT NULL,
  `org` varchar(255) NOT NULL,
  `mnth` varchar(255) NOT NULL,
  `tid` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `collateral`
--

CREATE TABLE IF NOT EXISTS `collateral` (
`id` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mno` varchar(255) NOT NULL,
  `idno` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `audituser` varchar(255) NOT NULL,
  `auditdate` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collateral`
--

INSERT INTO `collateral` (`id`, `image`, `name`, `mno`, `idno`, `value`, `status`, `comment`, `audituser`, `auditdate`) VALUES
(1, 'MTAxMzEyMTBsb2dvLWJpZy5pY28=', 'VFY=', 'MDAwNQ==', 'MzQ1NjY3', 'NzAwMA==', 'QWN0aXZl', 'Z3JlZW4=', 'OQ==', 'MjctSnVuLTIwMTU='),
(2, 'MTAzMjMxMTA=', 'dHY=', 'MDAwMQ==', 'MTIxMjEyMTI=', 'MTIwMDA=', 'QWN0aXZl', '', '', 'MjctSnVuLTIwMTU=');

-- --------------------------------------------------------

--
-- Table structure for table `communication`
--

CREATE TABLE IF NOT EXISTS `communication` (
  `memberno` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
`primarykey` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `crew`
--

CREATE TABLE IF NOT EXISTS `crew` (
`id` int(255) NOT NULL,
  `agid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `idno` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `datereg` varchar(255) NOT NULL,
  `career` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `residence` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `currencycode` varchar(255) NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `decimalsymbol` varchar(255) NOT NULL,
  `separator` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `name`, `currencycode`, `symbol`, `decimalsymbol`, `separator`) VALUES
(1, 'S2VueWFuIFNoaWxsaW5ncw==', 'S0VT', 'S0VT', '', ''),
(3, 'VFogc2hpbGxpbmc=', 'MjM0', 'VFo=', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `dividends`
--

CREATE TABLE IF NOT EXISTS `dividends` (
  `audituser` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
`id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `divimembers`
--

CREATE TABLE IF NOT EXISTS `divimembers` (
  `audituser` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `mno` varchar(255) NOT NULL,
  `dividend` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
`id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dsusers`
--

CREATE TABLE IF NOT EXISTS `dsusers` (
`id` int(255) NOT NULL,
  `org` varchar(255) NOT NULL,
  `email` varchar(70) DEFAULT NULL,
  `username` varchar(200) NOT NULL,
  `oauth_uid` varchar(200) DEFAULT NULL,
  `oauth_provider` varchar(200) DEFAULT NULL,
  `twitter_oauth_token` varchar(200) DEFAULT NULL,
  `twitter_oauth_token_secret` varchar(200) DEFAULT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `idno` varchar(255) NOT NULL,
  `mno` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `auditdate` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dsusers`
--

INSERT INTO `dsusers` (`id`, `org`, `email`, `username`, `oauth_uid`, `oauth_provider`, `twitter_oauth_token`, `twitter_oauth_token_secret`, `fname`, `mname`, `lname`, `idno`, `mno`, `password`, `status`, `auditdate`) VALUES
(1, 'ZXNhY2NvX21haW4=', 'Z2xhZG9sQGhvdG1haWwuY28udWs=', '', '', '', '', '', 'R2xhZHlzIA==', 'Tmplcmk=', 'TXVyaWl0aGk=', 'Qk84NzIzMg==', 'MDAwMQ==', 'U2FuZHJhNzI=', 'YWN0aXZl', 'MzAtTWF5LTIwMTU='),
(2, 'ZXNhY2NvcmdfdGZn', 'cy5uamFnaUB5YWhvby5jby51aw==', '', '', '', '', '', 'U2ltb24=', 'TXVyaWl0aGk=', 'TmphZ2k=', 'MTE1OTgxODE=', 'U01OMDAwMg==', 'UmVhZGluZzIwMTU=', 'YWN0aXZl', 'MzAtTWF5LTIwMTU='),
(3, 'ZXNhY2NvcmdfdGZn', 'a2lyaXJpam9zZXBoQHlhaG9vLmNvbQ==', '', '', '', '', '', 'am9zZXBo', 'bmp1Z3VuYQ==', 'a2lyaXJp', 'MjI5NTk5MDM=', 'Sk5LMDAwMw==', 'S0lNQWluYTgx', 'YWN0aXZl', 'MzEtTWF5LTIwMTU='),
(4, 'ZXNhY2NvcmdfdGZn', 'bXVyYWNpYUBnbWFpbC5jb20=', '', '', '', '', '', 'U2ltb24=', 'TQ==', 'TXVyYWNpYQ==', '', 'U01NMDAwMTI4', 'U3NtYWNoYXJpYTQw', 'YWN0aXZl', 'MzEtTWF5LTIwMTU='),
(5, 'ZXNhY2NvcmdfdGZn', 'a2lva29tdXN5b2tpMUBnbWFpbC5jb20=', '', '', '', '', '', 'S2lva28=', 'Sm9uYXRoYW4=', 'TXVzeW9raQ==', 'SUQgTm8gODQzNDI2Mg==', 'MTIy', 'TXdhbHV2YW5nQTE5NjM=', 'YWN0aXZl', 'MzEtTWF5LTIwMTU='),
(6, 'ZXNhY2NvcmdfdGZn', 'Z2VvcmdlbzY0QHlhaG9vLmNvbQ==', '', '', '', '', '', 'R2VvcmdlIA==', 'T2NoaWVuZyA=', 'T2RoaWFtYm8g', 'QjAwNjE3Mw==', 'R09PMDAwNg==', 'Q2hlYmVtYmU2NA==', 'YWN0aXZl', 'MzEtTWF5LTIwMTU='),
(7, 'ZXNhY2NvcmdfdGZn', 'anNoYW1taWxhMDZAeWFob28uY28udWs=', '', '', '', '', '', 'THVjeSA=', 'V2FuamE=', 'TXVyaWNodQ==', 'MjA0MTUzODQ=', 'TFdNMDc1', 'V2FuamEyMDEx', 'YWN0aXZl', 'MzEtTWF5LTIwMTU='),
(8, 'ZXNhY2NvcmdfdGZn', 'b2JlZ2lqZXJlbW15QHlhaG9vLmNvLnVr', '', '', '', '', '', 'SmVyZW1pYWg=', 'TnlhYm9nYQ==', 'T2JlZ2k=', 'MjA1NTI1MzY=', 'Sk5PMDAwNA==', 'TnlhYm9nYTMzNzQ=', 'YWN0aXZl', 'MzEtTWF5LTIwMTU='),
(9, 'ZXNhY2NvcmdfdGZn', 'amRua2FiYUB5YWhvby5jby51aw==', '', '', '', '', '', 'SmFjaW50YSA=', 'Tmplcmkg', 'V2FjaGl1cmkg', 'MzExNzI1OQ==', 'Sk5XMDAwMTM=', 'TmR1cnVydTIwMDM=', 'YWN0aXZl', 'MzEtTWF5LTIwMTU='),
(10, 'ZXNhY2NvcmdfdGZn', 'bmpva2kua2FnaW1hQGdtYWlsLmNvbQ==', '', '', '', '', '', 'QW5uZQ==', 'Tmpva2k=', 'S2FnaW1h', 'MjA2ODIyOTU=', 'MDc0NTA2MjM1NQ==', 'S2FnaW1hMTAwJQ==', 'YWN0aXZl', 'MzEtTWF5LTIwMTU='),
(11, 'ZXNhY2NvcmdfdGZn', 'YWxmbmd1Z2lAaG90bWFpbC5jb20=', '', '', '', '', '', 'YWxmcmVk', 'bmd1Z2k=', 'a2FyaXVraQ==', 'MTI5NDQ0OTM=', 'QU5LMDAwNQ==', 'V2FrYXJlZ2k3NQ==', 'YWN0aXZl', 'MzEtTWF5LTIwMTU='),
(12, 'ZXNhY2NvcmdfdGZn', 'YmVkYWtpMjAwOUBnbWFpbC5jb20=', '', '', '', '', '', 'REFWSUQ=', 'S0lIQVJB', 'SVJVTkdV', 'QjA4NzAyOA==', 'OTc=', 'QmV0aHdlbGwyMDAw', 'YWN0aXZl', 'MzEtTWF5LTIwMTU='),
(13, 'ZXNhY2NvcmdfdGZn', 'a2lhcmllbmpvbmpvQHlhaG9vLmNvbQ==', '', '', '', '', '', 'RnJlZHJpY2s=', 'S2lhcmll', 'Tmpvbmpv', 'YTE1NzE0OTk=', 'MjI=', 'RmlyZWZveDIwMDA=', 'YWN0aXZl', 'MzEtTWF5LTIwMTU='),
(14, 'ZXNhY2NvcmdfdGZn', 'cm9zZWx5bm5kZWd3YUB5YWhvby5jb20=', '', '', '', '', '', 'Um9zYWxpbmU=', 'bXVrYW1p', 'TmRlZ3dh', 'MTEwMjMyNTI=', 'Uk1OMDAwOA==', 'TWFueWF0dGExMg==', 'YWN0aXZl', 'MDEtSnVuLTIwMTU='),
(15, 'ZXNhY2NvcmdfdGZn', 'cGtpbWFnYUBhb2wuY29t', '', '', '', '', '', 'UGF0cmljaw==', 'S2ltYW5p', 'R2F0aGFyaWE=', 'OTU3NDg5NQ==', 'MDM4', 'Sm9uYWpvbmEwMDU1', 'YWN0aXZl', 'MDEtSnVuLTIwMTU='),
(16, 'ZXNhY2NvcmdfdGZn', 'bmR1bmd1YmFiYWpvZUB5YWhvby5jby51aw==', '', '', '', '', '', 'c2ltb24=', 'a2FudWhp', 'bmR1bmd1', 'OTg2MTI2MQ==', 'MjA=', 'U2thbnVoaTk5MA==', 'YWN0aXZl', 'MDEtSnVuLTIwMTU='),
(17, 'ZXNhY2NvcmdfdGZn', 'bWFyeXJnMTRAYW9sLmNvbQ==', '', '', '', '', '', 'TWFyeQ==', 'V2FuamlrdQ==', 'TWJ1Z3Vh', 'MTA0ODU0NzA=', 'TVdNMDAwMTY=', 'RGVmNDU2', 'YWN0aXZl', 'MDEtSnVuLTIwMTU='),
(18, 'ZXNhY2NvcmdfdGZn', 'cGV0ZXJyZzEzQGFvbC5jb20=', '', '', '', '', '', 'UGV0ZXI=', 'TWFjaGFyaWE=', 'TXdhbmdp', 'MTExMDQ0NTU=', 'UE1NMDAwMTU=', 'MUFiY2QxMjM0', 'YWN0aXZl', 'MDEtSnVuLTIwMTU='),
(19, 'ZXNhY2NvcmdfdGZn', 'd3dpbXNleUB5YWhvby5jby51aw==', '', '', '', '', '', 'RWxpemFiZXRoIA==', 'Vw==', 'TXVpZ2Fp', 'NjY2NjExMg==', 'NzY=', 'SGlsbGJyb3c3', 'YWN0aXZl', 'MDEtSnVuLTIwMTU='),
(20, 'ZXNhY2NvcmdfdGZn', 'd2FjaHVrYV9hbm5lQHlhaG9vLmNvbQ==', '', '', '', '', '', 'QW5uZQ==', '', 'V2FpcmltdQ==', 'QTE3MjI0OTI=', 'MTQ0', 'TW9uaXF1ZTIwMTQ=', 'YWN0aXZl', 'MDEtSnVuLTIwMTU='),
(21, 'ZXNhY2NvcmdfdGZn', 'Y21tYnVpQGdtYWlsLmNvbQ==', '', '', '', '', '', 'Q2hhcml0eQ==', 'TXV0aG9uaQ==', 'TWJ1aQ==', 'MDU3MjAyMA==', 'Q01NMDAwMTE=', 'TG92ZWx5MTIz', 'YWN0aXZl', 'MDEtSnVuLTIwMTU='),
(22, 'ZXNhY2NvcmdfdGZn', 'bm5qb2d1QGxpdmUuY28udWs=', '', '', '', '', '', 'TGVuYWgg', 'Tmplcmk=', 'TmpvZ3U=', 'QjE3Mw==', 'MTMx', 'V2FtYnVpODY=', 'YWN0aXZl', 'MDEtSnVuLTIwMTU='),
(23, 'ZXNhY2NvcmdfdGZn', 'Z2xhZG9sMzQ0NEBnbWFpbC5jb20=', '', '', '', '', '', 'R2xhZHlz', 'Tmplcmk=', 'V2FuanVndQ==', 'QTIwMDA4ODg=', 'R05XMDAwOQ==', 'TmplcmkxMQ==', 'YWN0aXZl', 'MDEtSnVuLTIwMTU='),
(24, 'ZXNhY2NvcmdfdGZn', 'dmlyZ2luaWF3YW5qdWd1QHlhaG9vLmNvLnVr', '', '', '', '', '', 'VmlyZ2luaWE=', 'V2FuanVndQ==', 'S2Ftb3Robw==', 'MTE4MDIyOTY=', 'MTQw', 'TmplcmkyMDE1', 'YWN0aXZl', 'MDEtSnVuLTIwMTU='),
(25, 'ZXNhY2NvcmdfdGZn', 'bXVyaWl0aGlhZ25lc0B5YWhvby5jby51aw==', '', '', '', '', '', 'QWduZXM=', 'V2FydWd1cnU=', 'S2Ftb3Robw==', 'NTc1NDUxOA==', 'MTQx', 'U2FuZHJhNzI=', 'YWN0aXZl', 'MDEtSnVuLTIwMTU='),
(26, 'ZXNhY2NvcmdfdGZn', 'am9lNjA0YkB5YWhvby5jby51aw==', '', '', '', '', '', 'QWRtaW5pc3RyYXRvcg==', 'Sm9l', 'S2FyaW1p', 'MjQ1NjAyMjc=', 'QUpLMDAwMTA=', 'S2Fqb2xpMDg=', 'YWN0aXZl', 'MDItSnVuLTIwMTU='),
(27, 'ZXNhY2NvcmdfdGZn', 'cG1rdW5ndUB5YWhvby5jby51aw==', '', '', '', '', '', 'UGV0ZXI=', 'TXVuaXU=', 'S3VuZ3Ug', 'QTE1NjU2MzQ=', 'MTI5IA==', 'S2FrNDkycQ==', 'YWN0aXZl', 'MDItSnVuLTIwMTU='),
(28, 'ZXNhY2NvcmdfdGZn', 'bXdha3VsZWd3YUBnbWFpbC5jb20=', '', '', '', '', '', 'TmljaG9sYXM=', 'TXdha3VsZWd3YQ==', 'V2Fyb21ibw==', 'MDE1NjUxMQ==', 'MzM=', 'TXphbGVuZG8x', 'YWN0aXZl', 'MDMtSnVuLTIwMTU='),
(29, 'ZXNhY2NvcmdfdGZn', 'ZGF2aWRrYXJpdWtpQGhvdG1haWwuY28udWs=', '', '', '', '', '', 'RGF2aWQ=', 'S2ltYW5p', 'S0FSSVVLSQ==', 'MzEwOTA2NDk=', 'MTgwMjE5ODc=', 'R3dhbjU3MTI=', 'YWN0aXZl', 'MDMtSnVuLTIwMTU='),
(30, 'ZXNhY2NvcmdfdGZn', 'c2sud2FpdGF0aHVAZ21haWwuY29t', '', '', '', '', '', 'U2FtdWVs', 'S2FyaXVraQ==', 'V2FpdGF0aHU=', 'MjgyMzE3MjA=', 'Nzg=', 'QmFoaWJha2FuYWt0aXIyNg==', 'YWN0aXZl', 'MDMtSnVuLTIwMTU='),
(31, 'ZXNhY2NvcmdfdGZn', 'ZWNjaS5yZWFkaW5nQGdtYWlsLmNvbQ==', '', '', '', '', '', 'SnVsaXVzICA=', 'S2FyaXVraQ==', 'TXVpcnVyaQ==', 'MTE5NDI4OQ==', 'MDI4', 'RWxzaGFkYWkxMA==', 'YWN0aXZl', 'MDMtSnVuLTIwMTU='),
(32, 'ZXNhY2NvX2Rz', 'Z3JhY2lpa3UzQHlhaG9vLmNvLnVr', '', '', '', '', '', 'R3JhY2U=', 'V2FuamlrdQ==', 'S2lodQ==', 'MTEzMDkwMjM=', 'MTQ2', 'V2FtYWd1MDI=', 'cGVuZGluZw==', 'MDQtSnVuLTIwMTU='),
(33, 'ZXNhY2NvcmdfdGZn', 'emtuam9yb2dlQGljbG91ZC5jb20=', '', '', '', '', '', 'WmFrYXJ5IA==', 'S3VodW55YSA=', 'Tmpvcm9nZSA=', 'QTU0MjY4OQ==', 'WktOMDAwMTc=', 'UXVpY2toaXQ3MQ==', 'YWN0aXZl', 'MDUtSnVuLTIwMTU='),
(34, 'ZXNhY2NvcmdfdGZn', 'a2ltNjNjaHJpc0B5YWhvby5jby51aw==', '', '', '', '', '', 'Q2hyaXN0aW5l', 'V2FuamlrdQ==', 'S2ltZW1pYQ==', 'NzQ4MzUyMA==', 'Q1dLMDAwMTQ=', 'V2FuamlrdTg4', 'YWN0aXZl', 'MDUtSnVuLTIwMTU='),
(35, 'ZXNhY2NvcmdfdGZn', 'c3RldmVrYW1hdTk0N0B5YWhvby5jb20=', '', '', '', '', '', 'U3RlcGhlbg==', 'S2FtYXU=', 'S2FtYXU=', 'MjYxMDU1Mjc=', 'U0tLMDAwMjA=', 'UGVuaW5hODg=', 'YWN0aXZl', 'MDUtSnVuLTIwMTU='),
(36, 'ZXNhY2NvcmdfdGZn', 'am9zcGhhdC5rYW1hdUB5YWhvby5jb20=', '', '', '', '', '', 'Sm9zcGhhdA==', 'TWFpbmE=', 'S2FtYXU=', 'SUQgTnVtYmVyOiAxMTU4OTczNCBQYXNzcG9ydCBOdW1iZXI6IEExNTYzMTkz', 'ODk=', 'Sm9zaC01MDUwISE=', 'YWN0aXZl', 'MDYtSnVuLTIwMTU='),
(37, 'ZXNhY2NvcmdfdGZn', 'dmVyb25pY2EuZG9iaW5zb25Ac2t5LmNvbQ==', '', '', '', '', '', 'U3RlcGhlbg==', 'TXV0aW5kYQ==', 'VWx1', 'Mjk5MjYzMjE=', 'ODQ=', 'RXZlbHluMTk4OA==', 'YWN0aXZl', 'MDYtSnVuLTIwMTU='),
(38, 'ZXNhY2NvcmdfdGZn', 'ZGFtYXJpc20ua2FtYXVAZ21haWwuY29t', '', '', '', '', '', 'ZGFtYXJpcw==', 'bXV0aG9uaQ==', 'a2FtYXU=', 'MjM2OTU2ODM=', 'RE1LMDAwMTg=', 'Tmpvcm84Mw==', 'YWN0aXZl', 'MDYtSnVuLTIwMTU='),
(39, 'ZXNhY2NvcmdfdGZn', 'cmFleWtpbW1pZUB5YWhvby5jby51aw==', '', '', '', '', '', 'UmFjaGVs', 'V2FuZ3Vp', 'S2ltZW1pYQ==', 'QTE1MDk2MTI=', 'UldLMDAwMjE=', 'TW9vbmxpZ2h0MQ==', 'YWN0aXZl', 'MDYtSnVuLTIwMTU='),
(40, 'ZXNhY2NvcmdfdGZn', 'amFuZXdiZWxsQGhvdG1haWwuY28udWs=', '', '', '', '', '', 'SmFuZQ==', 'V2FuZ2FyaQ==', 'QmVsbA==', 'QjAxMzY3Mw==', 'MjY=', 'RGVubmlzOTg=', 'YWN0aXZl', 'MDctSnVuLTIwMTU='),
(41, 'ZXNhY2NvcmdfdGZn', 'am9iaWt1YUBnbWFpbC5jb20=', '', '', '', '', '', 'Sm9iIERhdmlk', 'Tmdhbmdh', 'SWt1YQ==', 'SS9ELiA4NTExMTQ3', 'NDk=', 'TmdhbmdhMTk2NQ==', 'YWN0aXZl', 'MDctSnVuLTIwMTU='),
(42, 'ZXNhY2NvcmdfdGZn', 'c2hpa29lZW55bEB5YWhvby5jb20=', '', '', '', '', '', 'RXZh', 'V2FuamlrdQ==', 'S2FyaXVraQ==', 'MjI1NDI4Mjg=', 'MTE=', 'U2lsdmVyMTQ=', 'YWN0aXZl', 'MDctSnVuLTIwMTU='),
(43, 'ZXNhY2NvcmdfdGZn', 'Z3JhY2llMjVAZ21haWwuY29t', '', '', '', '', '', 'R3JhY2U=', 'Vw==', 'a0lIVQ==', 'QTM0ODM2NA==', 'MDE0Ng==', 'MTkwNXZJQkU0MA==', 'YWN0aXZl', 'MDktSnVuLTIwMTU=');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
`id` int(255) NOT NULL,
  `payee` varchar(255) NOT NULL,
  `bnkid` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `bal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `extracash`
--

CREATE TABLE IF NOT EXISTS `extracash` (
`id` int(11) NOT NULL,
  `efee` varchar(255) NOT NULL,
  `membernumber` varchar(255) NOT NULL,
  `loantype` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `transactionid` varchar(255) NOT NULL,
  `auditdate` varchar(255) NOT NULL,
  `audituser` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `finbalances`
--

CREATE TABLE IF NOT EXISTS `finbalances` (
`id` int(255) NOT NULL,
  `startdate` varchar(255) NOT NULL,
  `savbal` varchar(255) NOT NULL,
  `curbal` varchar(255) NOT NULL,
  `auditdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fines`
--

CREATE TABLE IF NOT EXISTS `fines` (
`id` int(11) NOT NULL,
  `loanid` varchar(255) NOT NULL,
  `tid` varchar(255) NOT NULL,
  `mno` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fixedassets`
--

CREATE TABLE IF NOT EXISTS `fixedassets` (
  `audituser` varchar(255) NOT NULL,
  `sassets` varchar(255) NOT NULL,
  `lassets` varchar(255) NOT NULL,
  `asvalue` varchar(255) NOT NULL,
  `assetscat` varchar(255) NOT NULL,
  `assetsloc` varchar(255) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `serialno` varchar(255) NOT NULL,
  `deptype` varchar(255) NOT NULL,
  `deprate` varchar(255) NOT NULL,
  `auditdate` varchar(255) NOT NULL,
`id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fixedassetscategory`
--

CREATE TABLE IF NOT EXISTS `fixedassetscategory` (
  `audituser` varchar(255) NOT NULL,
  `catcode` varchar(255) NOT NULL,
  `catdesc` varchar(255) NOT NULL,
  `facglcode` varchar(255) NOT NULL,
  `pldeglcode` varchar(255) NOT NULL,
  `pldiglcode` varchar(255) NOT NULL,
  `bsdglcode` varchar(255) NOT NULL,
  `auditdate` varchar(255) NOT NULL,
`id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fixed_deposit_setting`
--

CREATE TABLE IF NOT EXISTS `fixed_deposit_setting` (
`id` int(20) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `entry_fee` varchar(100) NOT NULL,
  `closing_fee` varchar(100) NOT NULL,
  `management_fee` varchar(100) NOT NULL,
  `Frequecny_management_fee` varchar(100) NOT NULL,
  `management_fee_glacc` varchar(20) NOT NULL,
  `accountfee_gl_id` varchar(20) NOT NULL,
  `interest_glacc` varchar(50) NOT NULL,
  `interest_rate` varchar(100) NOT NULL,
  `min_account_balance` varchar(100) NOT NULL,
  `max_account_balance` varchar(100) NOT NULL,
  `penalty_rate` varchar(100) NOT NULL,
  `frequency_accrual` varchar(100) NOT NULL,
  `frequency_posting` varchar(100) NOT NULL,
  `cron_jobs` varchar(10) NOT NULL,
  `man_fee_cron` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fixed_deposit_setting`
--

INSERT INTO `fixed_deposit_setting` (`id`, `account_name`, `entry_fee`, `closing_fee`, `management_fee`, `Frequecny_management_fee`, `management_fee_glacc`, `accountfee_gl_id`, `interest_glacc`, `interest_rate`, `min_account_balance`, `max_account_balance`, `penalty_rate`, `frequency_accrual`, `frequency_posting`, `cron_jobs`, `man_fee_cron`) VALUES
(1, 'Rml4ZWQgZGVwb3NpdCBBY2NvdW50', 'MTUw', 'MA==', 'NTA=', 'Mg==', 'OTg=', 'NzE=', 'MzIw', 'MTA=', 'MjAwMA==', 'MTAwMDAw', 'MTA=', 'Mg==', 'Mg==', 'MA==', 'Ng==');

-- --------------------------------------------------------

--
-- Table structure for table `forbank`
--

CREATE TABLE IF NOT EXISTS `forbank` (
`id` int(11) NOT NULL,
  `foreignkey_id` varchar(200) NOT NULL,
  `glid` varchar(255) NOT NULL,
  `tcode` varchar(255) NOT NULL,
  `source` varchar(200) NOT NULL,
  `debit` varchar(200) NOT NULL,
  `credit` varchar(200) NOT NULL,
  `date_stamp` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `glaccounts`
--

CREATE TABLE IF NOT EXISTS `glaccounts` (
`id` int(255) NOT NULL,
  `accode` varchar(255) NOT NULL,
  `acname` varchar(255) NOT NULL,
  `accgroup` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=323 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `glaccounts`
--

INSERT INTO `glaccounts` (`id`, `accode`, `acname`, `accgroup`, `status`, `date`) VALUES
(1, 'MTEg', 'ICBFQVJOSU5HIEFTU0VUUyA=', 'MQ==', 'U3VzcGVuZGVk', 'MTAvMTUvMjAxNA=='),
(2, 'MTExIA==', 'ICBMT0FOUyA=', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(3, 'MTExMSA=', 'ICBTaG9ydCBUZXJtIExvYW5zIChMZXNzIFRoYW4gb3IgRXF1YWwgdG8gT25lIFllYXIp', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(4, 'MTExMTAxIA==', 'ICBTaG9ydCBUZXJtIEtPTlpBIExvYW5z', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(7, 'MTExMiA=', 'ICBNZWRpdW0gVGVybSBMb2FucyAoMSB0byAzIFllYXJzKQ==', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(11, 'MTExMyA=', 'ICBMb25nIFRlcm0gTG9hbnMgKEdyZWF0ZXIgVGhhbiAzIFllYXJzKQ==', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(16, 'MTEyIA==', 'ICBMT0FOIExPU1MgQUxMT1dBTkNFUyA=', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(17, 'MTEzIA==', 'ICBMSVFVSUQgSU5WRVNUTUVOVFMg', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(18, 'MTEzMSA=', 'ICBTaG9ydCBUZXJtIEludmVzdG1lbnRzIA==', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(21, 'MTEzMiA=', 'ICBUcmFuc2l0b3J5IEFjY291bnQg', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(22, 'MTEzMyA=', 'ICBCaWQgQm9uZCBTZWN1cml0eSA=', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(23, 'MTE0IA==', 'ICBGSU5BTkNJQUwgSU5WRVNUTUVOVFMg', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(26, 'MTE1IA==', 'ICBOT04gRklOQU5DSUFMIElOVkVTVE1FTlRT', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(27, 'MTE1MSA=', 'ICBQcmVwYXltZW50cyA=', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(30, 'MTE1MiA=', 'ICBPcGVyYXRpb25hbCBJbXByZXN0IA==', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(31, 'MTE1MjAxIA==', 'ICBPcGVyYXRpb25hbCBJbXByZXN0IE9mZmljZSBQZXR0eSBDYXNo', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(32, 'MTIg', 'ICBOT04gRUFSTklORyBBU1NFVFM=', 'MQ==', 'U3VzcGVuZGVk', 'MTAvMTUvMjAxNA=='),
(33, 'MTIxIA==', 'ICBMSVFVSUQgQVNTRVRTIA==', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(34, 'MTIxMSA=', 'ICBDYXNoIA==', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(37, 'MTIxMiA=', 'ICBCYW5rIEFjY291bnRzIA==', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(40, 'MTIyIA==', 'ICBBQ0NPVU5UUywgRE9DVU1FTlRTIEFORCBPVEhFUiBSRUNFSVZBQkxFUyA=', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(41, 'MTIyMSA=', 'ICBBY2NvdW50cyBSZWNlaXZhYmxlIA==', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(42, 'MTIyMiA=', 'ICBJbnRlcmVzdCBSZWNlaXZhYmxlIG9uIExpcXVpZCBJbnZlc3RtZW50cyA=', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(43, 'MTIyMyA=', 'ICBJbnRlcmVzdCBSZWNlaXZhYmxlIG9uIEZpbmFuY2lhbCBJbnZlc3RtZW50cyA=', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(44, 'MTIyNCA=', 'ICBPdGhlciBBY2NvdW50cyBSZWNlaXZhYmxlIA==', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(45, 'MTIzIA==', 'ICBGSVhFRCBBU1NFVFMg', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(46, 'MTIzMSA=', 'ICBMYW5kIA==', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(47, 'MTIzMTAx', 'ICBLb256YSBQcm9qZWN0IExhbmQ=', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(48, 'MTIzMiA=', 'ICBCdWlsZGluZ3Mg', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(49, 'MTIzMyA=', 'ICBMZWFzZWhvbGQgSW1wcm92ZW1lbnRzIA==', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(50, 'MTIzNCA=', 'ICBFcXVpcG1lbnQg', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(51, 'MTIzNDAxIA==', 'ICBDb21wdXRlcnMgYW5kIEFjY2Vzc29yaWVzIA==', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(52, 'MTIzNDAyIA==', 'ICBPZmZpY2UgRXF1aXBtZW50IA==', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(53, 'MTIzNSA=', 'ICBGdXJuaXR1cmUgJiBGaXh0dXJlcyA=', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(54, 'MTIzNiA=', 'ICBWZWhpY2xlcyA=', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(55, 'MTIzNyA=', 'ICBPdGhlciBGaXhlZCBBc3NldHMg', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(56, 'MTI0IA==', 'ICBBQ0NVTVVMQVRFRCBERVBSRUNJQVRJT04g', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(57, 'MTI0MSA=', 'ICBBY2N1bXVsYXRlZCBEZXByZWNpYXRpb24gICBCdWlsZGluZ3M=', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(58, 'MTI0MiA=', 'ICBBY2N1bXVsYXRlZCBEZXByZWNpYXRpb24gICBMZWFzZWhvbGQgSW1wcm92ZW1lbnRz', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(59, 'MTI0MyA=', 'ICBBY2N1bXVsYXRlZCBEZXByZWNpYXRpb24gICBFcXVpcG1lbnQ=', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(60, 'MTI0MzAxIA==', 'ICBBY2N1bXVsYXRlZCBEZXByZWNpYXRpb24gICBDb21wdXRlcnMgYW5kIEFjY2Vzc29yaWVz', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(61, 'MTI0MzAyIA==', 'ICBBY2N1bXVsYXRlZCBEZXByZWNpYXRpb24gICBPZmZpY2UgRXF1aXBtZW50', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(62, 'MTI0NCA=', 'ICBBY2N1bXVsYXRlZCBEZXByZWNpYXRpb24gICBGdXJuaXR1cmUgJiBGaXh0dXJlcw==', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(63, 'MTI0NSA=', 'ICBBY2N1bXVsYXRlZCBEZXByZWNpYXRpb24gICBWZWhpY2xlcw==', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(64, 'MTI0NiA=', 'ICBBY2N1bXVsYXRlZCBEZXByZWNpYXRpb24gICBPdGhlciBGaXhlZCBBc3NldHM=', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(65, 'MTI1IA==', 'ICBPVEhFUiBBU1NFVFMg', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(66, 'MTI1MSA=', 'ICBBc3NldHMgaW4gTGlxdWlkYXRpb24g', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(67, 'MTI1MiA=', 'ICBEZWZlcnJlZCBBc3NldHMg', 'MQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(68, 'MjEg', 'UmVnaXN0cmF0aW9uIEZlZXM=', 'NA==', 'U3VzcGVuZGVk', 'MTAvMTUvMjAxNA=='),
(69, 'MjExIA==', 'ICBTQVZJTkdTICYgREVQT1NJVFMg', 'Mg==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(71, 'MzI=', 'ICBDb21wdWxzb3J5IFNoYXJlcyA=', 'Mw==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(72, 'MjExMiA=', 'ICBGSVhFRCBERVBPU0lUIA==', 'Mg==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(73, 'MjExOA==', 'UkVGRVJSQUwg', 'Mg==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(74, 'MjEyIA==', 'ICBMT0FOUyBQQVlBQkxFIA==', 'Mg==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(79, 'MjEzIA==', 'ICBBQ0NPVU5UUyBQQVlBQkxFIA==', 'Mg==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(80, 'MjEzMSA=', 'ICBBY2NvdW50cyBQYXlhYmxlIHRvIFN1cHBsaWVycyA=', 'Mg==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(82, 'MjEzMyA=', 'ICBBY2NvdW50cyBQYXlhYmxlIFBBWUU=', 'Mg==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(83, 'MjEzNCA=', 'ICBBY2NvdW50cyBQYXlhYmxlIFN0YWZm', 'Mg==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(85, 'MjEzNDAyIA==', 'ICBTYWxhcnkgYm9udXMgcGF5YWJsZSA=', 'Mg==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(86, 'MjEzNSA=', 'ICBTdW5kcnkgQ3JlZGl0b3JzIA==', 'Mg==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(87, 'MjEzNTAxIA==', 'ICBBdWRpdCBmZWVzIFBheWFibGUvUHJvdmlzaW9uIA==', 'Mg==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(88, 'MjEzNTAxMDEg', 'ICBBdWRpdCBGZWVzIA==', 'Mg==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(90, 'MjEzNTAyIA==', 'ICBPdGhlcnMgQWNjcnVhbHMg', 'Mg==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(91, 'MjEzNiA=', 'ICBDcmVkaXQgTGlmZSBJbnN1cmFuY2Ug', 'Mg==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(92, 'MjIg', 'QkVBUklORyBMSUFCSUxJVElFUyAgTk9OIElOVEVSRVNU', 'Mg==', 'U3VzcGVuZGVk', 'MTAvMTUvMjAxNA=='),
(93, 'MjIxIA==', 'ICBJTlRFUkVTVCBBTkQgRElWSURFTkRTIFBBWUFCTEUg', 'Mg==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(94, 'MjIxMSA=', 'ICBJbnRlcmVzdCBQYXlhYmxlIG9uIFNhdmluZ3MgRGVwb3NpdHMg', 'Mg==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(95, 'MjIxMiA=', 'ICBJbnRlcmVzdCBQYXlhYmxlIG9uIFRpbWUgRGVwb3NpdHMg', 'Mg==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(96, 'MzIzMzMz', 'UmVnaXN0cmF0aW9uIGZlZQ==', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(97, 'MzExIA==', 'ICBTSEFSRVMg', 'Mw==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(98, 'MzE=', 'Q29tcHVsc29yeSBTYXZpbmdz', 'Mg==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(99, 'MzExMTAxIA==', 'ICBWb2x1bnRhcnkgU2hhcmVzIA==', 'Mw==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(101, 'MzExMTAzIA==', 'ICBNV0FOQU5HVSBBQ0NPVU5U', 'Mg==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(102, 'MzI5MA==', 'ICBUUkFOU0lUT1JZIENBUElUQUwg', 'Mw==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(103, 'MzMg', 'ICBJTlNUSVRVVElPTkFMIENBUElUQUwg', 'Mw==', 'U3VzcGVuZGVk', 'MTAvMTUvMjAxNA=='),
(104, 'MzMxIA==', 'ICBSRVNFUlZFUywgRE9OQVRJT05TIEFORCBJTlNUSVRVVElPTkFMIFIuRS4gKExPU1NFUykg', 'Mw==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(105, 'MzMxMSA=', 'ICBTdGF0dXRvcnkgJiBMZWdhbCBSZXNlcnZlcyA=', 'Mw==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(106, 'MzMxMiA=', 'ICBSZXRhaW5lZCBFYXJuaW5ncyAoTG9zc2VzKSBmcm9tIFByaW9yIFBlcmlvZHMg', 'Mw==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(112, 'MzMxNCA=', 'ICBSZXZhbHVhdGlvbiBSZXNlcnZlcyA=', 'Mw==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(113, 'MzQg', 'ICBDVVJSRU5UIFBFUklPRCBSRVRBSU5FRCBFQVJOSU5HUyA=', 'Mw==', 'U3VzcGVuZGVk', 'MTAvMTUvMjAxNA=='),
(114, 'MzQxIA==', 'ICBORVQgSU5DT01FIE9SIE5FVCBMT1NTIA==', 'Mw==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(115, 'MzQxMSA=', 'ICBDdXJyZW50IFllYXIgTmV0IEluY29tZSAoTG9zcykgdG8gYmUgRGlzdHJpYnV0ZWQg', 'Mw==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(116, 'NDEg', 'V0lUSERSQVdBTCBGRUVT', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(117, 'NDExIA==', 'ICBJTkNPTUUgRlJPTSBMT0FOUyA=', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(118, 'NDExMSA=', 'ICBJbnRlcmVzdCBJbmNvbWUgb24gU2hvcnQgVGVybSBMb2Fucw==', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(119, 'NDExMiA=', 'ICBJbnRlcmVzdCBJbmNvbWUgb24gTWVkaXVtIFRlcm0gTG9hbnM=', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(120, 'NDExMyA=', 'ICBJbnRlcmVzdCBJbmNvbWUgb24gTG9uZyBUZXJtIExvYW5z', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(121, 'NDExNCA=', 'ICBEZWxpbnF1ZW50LyBQZW5hbHR5IEludGVyZXN0IEluY29tZSA=', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(122, 'NDExNSA=', 'ICBMb2FuIFByb2Nlc3NpbmcgRmVlcyA=', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(123, 'NDExNTAxIA==', 'TG9hbiBJbnN1cmFuY2UgRmVlIA==', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(124, 'NDExNiA=', 'ICBPdGhlciBJbnRlcmVzdCBJbmNvbWUgb24gTG9hbnMg', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(125, 'NDExNjAxIA==', 'TG9hbiBJbnRlcmVzdA==', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(126, 'NDEyIA==', 'ICBJTkNPTUUgT04gTElRVUlEIElOVkVTVE1FTlRTIA==', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(127, 'NDEyMSA=', 'ICBBY2NydWVkIEludGVyZXN0IEluY29tZSBvbiBMaXF1aWQgSW52ZXN0bWVudHMg', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(128, 'NDEyMTAxIA==', 'ICBBY2NydWVkIEludGVyZXN0IEluY29tZSBvbiBEZXBvc2l0cyA=', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(129, 'NDEyMTAyIA==', 'ICBBY2NydWVkIEludGVyZXN0IEluY29tZSBvbiBUcmVhc3VyeSBCaWxscyA=', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(130, 'NDEyMiA=', 'ICBJbnRlcmVzdCBJbmNvbWUgUmVjZWl2ZWQgb24gTGlxdWlkIEludmVzdG1lbnRzIA==', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(131, 'NDEyMjAxIA==', 'ICBJbnRlcmVzdCBJbmNvbWUgUmVjZWl2ZWQgb24gRGVwb3NpdHMg', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(132, 'NDEyMjAyIA==', 'ICBJbnRlcmVzdCBJbmNvbWUgUmVjZWl2ZWQgb24gQmFuayBBY2NvdW50cyA=', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(133, 'NDEyMjAzIA==', 'ICBJbnRlcmVzdCBJbmNvbWUgUmVjZWl2ZWQgb24gVHJlYXN1cnkgQmlsbHMg', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(134, 'NDEzIA==', 'ICBJTkNPTUUgT04gRklOQU5DSUFMIElOVkVTVE1FTlRTIA==', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(135, 'NDEzMSA=', 'ICBBY2NydWVkIEludGVyZXN0IEluY29tZSBvbiBGaW5hbmNpYWwgSW52ZXN0bWVudHMg', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(136, 'NDEzMiA=', 'ICBJbnRlcmVzdCBJbmNvbWUgUmVjZWl2ZWQgb24gRmluYW5jaWFsIEludmVzdG1lbnRzIA==', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(137, 'NDIg', 'ICBOT04gSU5URVJFU1QgSU5DT01F', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(138, 'NDIxIA==', 'ICBOT04gRklOQU5DSUFMIElOVkVTVE1FTlQgSU5DT01F', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(139, 'NDIxMSA=', 'ICBJbmNvbWUgUmVjZWl2ZWQgZnJvbSBOb24gRmluYW5jaWFsIEludmVzdG1lbnRz', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(140, 'NDIxMiA=', 'ICBPdGhlciBJbmNvbWUg', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(141, 'NDIyIA==', 'ICBPVEhFUiBOT04gRklOQU5DSUFMIElOQ09NRQ==', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(142, 'NDIyMQ==', 'TGVnYWwgRmVlcw==', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(143, 'NDIyMiA=', 'ICBJbmNvbWUgZnJvbSBUcmFuc2FjdGlvbmFsIENoYXJnZXMg', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(144, 'NDIyMyA=', 'ICBQcm9jZWVkcyBGcm9tIFNhbGUgT2YgRml4ZWQgQXNzZXRzIA==', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(146, 'NDIyNSA=', 'ICBTdXBwb3J0IGZyb20gUGFydG5lcnMg', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(147, 'NDIyNTAxIA==', 'ICBTdXBwb3J0IGZyb20gUGFydG5lcnMgVU5EUA==', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(148, 'NDIyNTAyIA==', 'ICBMb2FuIEZvcm0gRmVlIEluY29tZQ==', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(149, 'NDIyNTAzIA==', 'ICBTdXBwb3J0IGZyb20gUGFydG5lcnMgRWdtb250', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(150, 'NDIyNTA0IA==', 'ICBTdXBwb3J0IGZyb20gUGFydG5lcnMgQUZSQUNBL0RBTklEQQ==', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(151, 'NDIyNTA1IA==', 'ICBTdXBwb3J0IGZyb20gUGFydG5lcnMgTUFDTw==', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(152, 'NDIyNiA=', 'ICBOZXQgUHJvZml0IGJhbGFuY2UgQi9GIDMxLzA4LzA5IA==', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(153, 'NDIyNjAxIA==', 'ICBQcm9maXQgYmFsYW5jZSA=', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(154, 'NDI0IA==', 'ICBORVQgUFJPRklUIEZST00gU0FMRSBPRiBTVE9DSyA=', 'NA==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(155, 'NTEg', 'ICBGSU5BTkNJQUwgQ09TVFMg', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(156, 'NTExIA==', 'ICBGSU5BTkNJQUwgQ09TVFMgT04gU0FWSU5HUyAmIERFUE9TSVRTIA==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(157, 'NTExMSA=', 'ICBJbnRlcmVzdCBFeHBlbnNlIG9uIFRXRU5ERSBjb21wdWxzb3J5IFNhdmluZ3Mg', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(158, 'NTExMTAxIA==', 'ICBpbnRlcmVzdCBvbiBkZXBvc2l0IA==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(159, 'NTEyIA==', 'ICBGSU5BTkNFIENPU1RTIE9OIExPQU5TIFBBWUFCTEUg', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(160, 'NTEzIA==', 'ICBGSU5BTkNFIENPU1RTIE9OIEFDQ09VTlRTIFBBWUFCTEUg', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(161, 'NTEzMSA=', 'ICBJbnRlcmVzdCBFeHBlbnNlIG9uIEFjY291bnRzIFBheWFibGUgdG8gU3VwcGxpZXJzIA==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(162, 'NTE0IA==', 'ICBGSU5BTkNFIENPU1RTIE9OIFNIQVJFUyA=', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(163, 'NTE0MSA=', 'ICBEaXZpZGVuZHMgUGFpZCBvbiBNZW1iZXIgU2hhcmVzIA==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(164, 'NTE0MTAxIA==', 'ICBEaXZpZGVuZCBwYWlkIA==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(165, 'NTE1IA==', 'ICBPVEhFUiBGSU5BTkNFIENPU1RTIEFORCBFWFBFTlNFUyA=', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(166, 'NTE1MSA=', 'ICBCYW5rIENoYXJnZXMg', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(167, 'NTE1MTAxIA==', 'ICBDb21taXNzaW9ucyA=', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(168, 'NTE1MTAyIA==', 'ICBIYW5kbGluZyBjaGFyZ2VzIA==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(169, 'NTIg', 'ICBOT04gRklOQU5DSUFMIENPU1RT', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(170, 'NTIxIA==', 'ICBDT1NUUyBPRiBOT04gRklOQU5DSUFMIElOVkVTVE1FTlRT', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(171, 'NTIyIA==', 'ICBPVEhFUiBOT04gRklOQU5DSUFMIENPU1RT', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(173, 'NTMg', 'ICBPUEVSQVRJTkcgRVhQRU5TRVMg', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(174, 'NTMxIA==', 'ICBQRVJTT05ORUwgRVhQRU5TRVMg', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(175, 'NTMxMSA=', 'ICBTYWxhcmllcyAmIFdhZ2VzIEV4cGVuc2Ug', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(176, 'NTMxMiA=', 'ICBTdGFmZiBJbmNlbnRpdmVzIA==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(177, 'NTMxMjAxIA==', 'ICBCb251cyA=', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(178, 'NTMxMjAyIA==', 'ICBHcmF0dWl0eSA=', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(179, 'NTMxMjAzIA==', 'ICBTZXR0bGluZyBpbiBhbGxvd2FuY2Ug', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(180, 'NTMxMyA=', 'ICBTdGFmZiB3ZWxmYXJlIA==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(181, 'NTMxMzAxIA==', 'ICBNZWRpY2FsIGV4cGVuc2VzIA==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(182, 'NTMxMzAyIA==', 'ICBGdW5lcmFsIGV4cGVuc2VzIA==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(183, 'NTMxMzAzIA==', 'ICBQcm90ZWN0aXZlIENsb3RoaW5nIA==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(184, 'NTMxNCA=', 'ICBTdGFmZiBEZXZlbG9wbWVudCA=', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(185, 'NTMxNDAxIA==', 'ICBUcmFpbmluZyBjb3N0cyA=', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(186, 'NTMxNDAyIA==', 'ICBQcm9mZXNzaW9uYWwgRGV2ZWxvcG1lbnQg', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(187, 'NTMxNDAzIA==', 'ICBXb3Jrc2hvcHMgYW5kIENvbmZlcmVuY2VzIA==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(188, 'NTMxNSA=', 'ICBPdGhlciBQZXJzb25uZWwgQ29zdHMg', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(189, 'NTMyIA==', 'ICBHT1ZFUk5BTkNFIEVYUEVOU0VTIA==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(190, 'NTMyMSA=', 'ICBCb2FyZCBvZiBUcnVzdGVlcyBFeHBlbnNlcyA=', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(191, 'NTMyMTAxIA==', 'ICBCT1QgbWVldGluZ3MgYW5kIFRyYW5zcG9ydCByZWZ1bmRzIA==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(192, 'NTMyMTAyIA==', 'ICBCT1QgSW5zdXJhbmNlIA==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(193, 'NTMzIA==', 'ICBNQVJLRVRJTkcgRVhQRU5TRVMg', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(194, 'NTMzMSA=', 'ICBBZHZlcnRpc2luZyBhbmQgUHJvbW90aW9uYWwgTWF0ZXJpYWxzIA==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(195, 'NTM0IA==', 'ICBERVBSRUNJQVRJT04gQU5EIEFNT1JUSVpBVElPTiA=', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(196, 'NTM0MSA=', 'ICBEZXBwcmVjaWF0aW9uIEV4cGVuc2VzIA==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(197, 'NTM0MiA=', 'ICBBcm1vdGlzYXRpb24gRXhwZW5zZXMg', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(198, 'NTM1IA==', 'ICBBRE1JTklTVFJBVElWRSBFWFBFTlNFUyA=', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(199, 'NTM1MSA=', 'ICBDb21tdW5pY2F0aW9ucyBhbmQgVGVsZXBob25lIA==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(200, 'NTM1MTAxIA==', 'ICBUZWxlcGhvbmUgYW5kIEZheCA=', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(201, 'NTM1MTAyIA==', 'ICBQb3N0YWdlIA==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(202, 'NTM1MTAzIA==', 'ICBJbnRlcm5ldCA=', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(203, 'NTM1MTA0IA==', 'ICBFIG1haWwgaG9zdGluZw==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(204, 'NTM1MTA1IA==', 'ICBDZWxscGhvbmUgRXhwZW5zZXMg', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(205, 'NTM1MiA=', 'ICBSZW50IGFuZCBSYXRlcyA=', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(206, 'NTM1MjAxIA==', 'ICBPZmZpY2UgUmVudCA=', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(207, 'NTM1MjAyIA==', 'ICBCdWlkaW5nIFJhdGVzIA==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(208, 'NTM1MyA=', 'ICBTZWN1cml0eSBTZXJ2aWNlcyA=', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(209, 'NTM1NCA=', 'ICBVdGlsaXR5IEV4cGVuc2VzIA==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(210, 'NTM1NDAxIA==', 'ICBXYXRlciBFeHBlbnNlcyA=', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(211, 'NTM1NDAyIA==', 'ICBFbGVjdHJpY2l0eSBFeHBlbnNlcyA=', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(212, 'NTM1NSA=', 'ICBSZXBhaXJzIGFuZCBNYWludGVuYW5jZSA=', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(213, 'NTM1NTAxIA==', 'ICBDb21wdXRlciBSZXBhaXJzIA==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(214, 'NTM1NTAyIA==', 'ICBNb3RvciBWZWhpY2xlIHJlcGFpcnMg', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(215, 'NTM1NTAzIA==', 'ICBCdWlsZGluZyBNYWludGVuYW5jZSA=', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(216, 'NTM1NTA0IA==', 'ICBGdXJuaXR1cmUgYW5kIEZpdHRpbmdzIFJlcGFpcnMg', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(217, 'NTM1NTA1IA==', 'ICBPZmZpY2UgRXF1aXBtZW50IFJlcGFpcnMg', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(218, 'NTM1NiA=', 'ICBNb25pdG9yaW5nIGFuZCBFdmFsdWF0aW9uIEV4cGVuc2VzIA==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(219, 'NTM1NjAxIA==', 'ICBGaWVsZCBBbGxvd2FuY2VzIA==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(221, 'NTM1NjAzIA==', 'ICBNICYgRSBQcml2YXRlIFRyYW5zcG9ydCA=', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(222, 'NTM1NyA=', 'ICBJbnN1cmFuY2UgRXhwZW5zZXMg', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(223, 'NTM1NzAxIA==', 'ICBNb3RvciBCaWtlIGluc3VyYW5jZSA=', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(224, 'NTM1NzAyIA==', 'ICBNb3RvciBWZWhpY2xlIEluc3VyYW5jZSA=', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(225, 'NTM1NzAzIA==', 'ICBPZmZpY2UgQ29udGVudHMgSW5zdXJhbmNlIA==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(226, 'NTM1OCA=', 'ICBUcmFuc3BvcnQgYW5kIFRyYXZlbCA=', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(227, 'NTM1ODAxIA==', 'ICBGb3JlaWduIFRyYXZlbCA=', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(228, 'NTM1ODAxMDEg', 'ICBGb3JlaWduIFRyYXZlbCBBbGxvd2FuY2Vz', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(229, 'NTM1ODAxMDIg', 'ICBGb3JlaWduIFRyYXZlbCBPdGhlcnM=', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(230, 'NTM1ODAyIA==', 'ICBMb2NhbCBUcmF2ZWwg', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(231, 'NTM1ODAyMDEg', 'ICBMb2NhbCBUcmF2ZWwgQWxsb3dhbmNlcw==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(232, 'NTM1ODAyMDIg', 'ICBMb2NhbCBUcmF2ZWwgRnVlbCBhbmQgT2lscw==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(233, 'NTM1ODAzIA==', 'ICBBZG1pbmlzdHJhdGlvbiBUcmFuc3BvcnQg', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(234, 'NTM1ODAzMDEg', 'ICBBZG1pbmlzdHJhdGlvbiBUcmFuc3BvcnQgIEZ1ZWwgYW5kIE9pbHM=', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(235, 'NTM1ODAzMDIg', 'ICBWZWhpY2xlIExpY2VuY2Ug', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(236, 'NTM1OSA=', 'ICBQcmludGluZyBhbmQgU3RhdGlvbmVyeSA=', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(237, 'NTQg', 'ICBQUk9WSVNJT04gRVhQRU5TRVMgRk9SIFJJU0sgQVNTRVRTIA==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(238, 'NTQxIA==', 'ICBCQUQgREVCVCBFWFBFTlNFIA==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(239, 'NTQxMSA=', 'ICBCYWQgRGVidCBFeHBlbnNlIG9uIExvYW5zIA==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(240, 'NTUg', 'ICBFWFRSQU9SRElOQVJZIElURU1TIA==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(241, 'NTUxIA==', 'ICBFWFRSQU9SRElOQVJZIEVYUEVOU0VTIA==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(242, 'NTUxMSA=', 'ICBTdWJzY3JpcHRpb25zIA==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(243, 'NTUxMTAxIA==', 'ICBNYWdhemluZXMgYW5kIEpvdXJuYWxzIA==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(244, 'NTUxMTAyIA==', 'ICBOZXdzcGFwZXJzIA==', 'NQ==', 'U3VzcGVuZGVk', 'MTAvMTUvMjAxNA=='),
(245, 'NTUxMTAzIA==', 'ICBOZXR3b3JrcyBzdWJzY3JpcHRpb25zIA==', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(246, 'NTUxMTA0IA==', 'ICBQcm9mZXNzaW9uYWwgQm9keSBTdWJzY3JpcHRpb24g', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(247, 'NTUxMiA=', 'ICBDb25zdWx0YW5jeSBFeHBlbnNlcyA=', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(248, 'NTUxMjAxIA==', 'ICBBdWRpdCBFeHBlbnNlcyA=', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(249, 'NTUxMyA=', 'ICBPdGhlciBBZG1pbmlzdHJhdGlvbiBFeHBlbnNlcyA=', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(250, 'NTUxMzAxIA==', 'ICBUZWFzIGFuZCBDb2ZmZWUg', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(251, 'NTUxMzAyIA==', 'ICBHYWJiYWdlIENvbGxlY3Rpb24g', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(252, 'NTUxMzAzIA==', 'ICBHZW5lcmFsIE9mZmljZSBleHBlbnNlcyA=', 'NQ==', 'QWN0aXZl', 'MTAvMTUvMjAxNA=='),
(253, 'NTYg', 'ICBBQ0NSVUVEIEVYUEVOU0VTIA==', 'NQ==', 'U3VzcGVuZGVk', 'MTAvMTUvMjAxNA=='),
(254, 'NTYxIA==', 'ICBBQ0NSVUVEIEVYUEVOU0UgQUNDT1VOVCA=', 'NQ==', 'U3VzcGVuZGVk', 'MTAvMTUvMjAxNA=='),
(256, 'MTIxMjAx', 'SSAmIE0gQmFuayBVU0Q=', 'MQ==', 'QWN0aXZl', 'MDMtTm92LTIwMTQ='),
(257, 'MTIxMjAy', 'SSAmIE0gQmFuayBLRVM=', 'MQ==', 'QWN0aXZl', 'MDMtTm92LTIwMTQ='),
(258, 'MTIxMjAz', 'UGV0dHkgQ2FzaA==', 'MQ==', 'QWN0aXZl', 'MDQtTm92LTIwMTQ='),
(259, 'MjExMDEx', 'WUVNREE=', 'Mg==', 'QWN0aXZl', 'MTgtTm92LTIwMTQ='),
(260, 'MjExMDEy', 'S0FZT0xF', 'Mg==', 'QWN0aXZl', 'MTgtTm92LTIwMTQ='),
(261, 'MjExMDEz', 'R0lLT01CQQ==', 'Mg==', 'QWN0aXZl', 'MTgtTm92LTIwMTQ='),
(262, 'MjExMDE0', 'SlVBS0FMSQ==', 'Mg==', 'QWN0aXZl', 'MTgtTm92LTIwMTQ='),
(263, 'MjExMDE1', 'QlVSTUE=', 'Mg==', 'QWN0aXZl', 'MTgtTm92LTIwMTQ='),
(264, 'MjExMDE2', 'S0FMT0xFTkk=', 'Mg==', 'QWN0aXZl', 'MTgtTm92LTIwMTQ='),
(265, 'MjExMDE3', 'RlJJRU5EUyBVTklUWQ==', 'Mg==', 'QWN0aXZl', 'MTgtTm92LTIwMTQ='),
(266, 'MjExMDE4', 'QkVTVCBGT1VOREFUSU9O', 'Mg==', 'QWN0aXZl', 'MTgtTm92LTIwMTQ='),
(267, 'MjExMDE5', 'S0FSSU9CQU5HSQ==', 'Mg==', 'QWN0aXZl', 'MTgtTm92LTIwMTQ='),
(268, 'MjExMDExMA==', 'VU1PSkE=', 'Mg==', 'QWN0aXZl', 'MTgtTm92LTIwMTQ='),
(269, 'MjExMDExMQ==', 'TFVOR0FMVU5HQQ==', 'Mg==', 'QWN0aXZl', 'MTgtTm92LTIwMTQ='),
(270, 'MjExMDExMg==', 'UlVBSQ==', 'Mg==', 'QWN0aXZl', 'MTgtTm92LTIwMTQ='),
(271, 'MjExMDExMw==', 'S0FNVUxV', 'Mg==', 'QWN0aXZl', 'MTgtTm92LTIwMTQ='),
(272, 'MjExMDExNA==', 'TVVHVUdB', 'Mg==', 'QWN0aXZl', 'MTgtTm92LTIwMTQ='),
(273, 'MjExMDExNQ==', 'RkFJRElTSEE=', 'Mg==', 'QWN0aXZl', 'MTgtTm92LTIwMTQ='),
(274, 'MjExMDExNg==', 'TUFUSEFSRQ==', 'Mg==', 'QWN0aXZl', 'MTgtTm92LTIwMTQ='),
(275, 'MjExMDExNw==', 'R0lUSFVSQUk=', 'Mg==', 'QWN0aXZl', 'MjAtTm92LTIwMTQ='),
(276, 'MjExMDExOA==', 'TVVUSFVSV0E=', 'Mg==', 'QWN0aXZl', 'MjAtTm92LTIwMTQ='),
(277, 'MjExMDExOQ==', 'Q0lUWSBTVFVESVVN', 'Mg==', 'QWN0aXZl', 'MjAtTm92LTIwMTQ='),
(278, 'MjExMDEyMA==', 'U1RBUkVIRQ==', 'Mg==', 'QWN0aXZl', 'MjAtTm92LTIwMTQ='),
(279, 'MjExMDEyMQ==', 'Q0lUWSBDRU5UUkU=', 'Mg==', 'QWN0aXZl', 'MjAtTm92LTIwMTQ='),
(280, 'MTExMTAxMTU=', 'QklBU0hBUkEgTE9BTg==', 'MQ==', 'QWN0aXZl', 'MjAtTm92LTIwMTQ='),
(281, 'MTExMTAxMTY=', 'REVWRUxPUE1FTlQgTE9BTg==', 'MQ==', 'QWN0aXZl', 'MjAtTm92LTIwMTQ='),
(282, 'MTExMTAxMTc=', 'RU1FUkdFTkNZIExPQU4=', 'MQ==', 'QWN0aXZl', 'MjAtTm92LTIwMTQ='),
(283, 'MTExMTAxMTg=', 'RURVQ0FUSU9OIExPQU4=', 'MQ==', 'QWN0aXZl', 'MjAtTm92LTIwMTQ='),
(284, 'MTIxMjAx', 'Q28tb3BlcmF0aXZlIEJhbms=', 'MQ==', 'QWN0aXZl', 'MjItTm92LTIwMTQ='),
(285, 'MjExMDEyMg==', 'S0lBTUJV', 'Mg==', 'QWN0aXZl', 'MjQtTm92LTIwMTQ='),
(286, 'MTExMTAxMzE=', 'UVVJQ0sgTE9BTg==', 'MQ==', 'QWN0aXZl', 'MjUtTm92LTIwMTQ='),
(287, 'MTExMTAxMzI=', 'RkFJRElTSEEgTE9BTg==', 'MQ==', 'QWN0aXZl', 'MjUtTm92LTIwMTQ='),
(288, 'MTExMTAxMTA0', 'bWF4eCBsb2Fu', 'MQ==', 'QWN0aXZl', 'MTEtRGVjLTIwMTQ='),
(289, 'MTExMTAxMTA1', 'bWF4eCBsb2Fu', 'MQ==', 'QWN0aXZl', 'MTEtRGVjLTIwMTQ='),
(290, 'MTExMTAxMTA2', 'bWFheCBsb2Fu', 'MQ==', 'QWN0aXZl', 'MTEtRGVjLTIwMTQ='),
(291, 'MTIxMjAy', 'ZXF1aXR5', 'MQ==', 'QWN0aXZl', 'MTAtRGVjLTIwMTQ='),
(292, 'MTExMTAxMzc1', 'ZGZlcWRl', 'MQ==', 'QWN0aXZl', 'MTktRGVjLTIwMTQ='),
(293, 'MTExMTAxMzc4', 'bWFj', 'MQ==', 'QWN0aXZl', 'MTktRGVjLTIwMTQ='),
(294, 'MTIxMjAz', 'ZmluYQ==', 'MQ==', 'QWN0aXZl', 'MDItSmFuLTIwMTU='),
(295, 'MTIxMjAx', 'RXF1aXR5IEJhbms=', 'MQ==', 'QWN0aXZl', 'MTMtSmFuLTIwMTU='),
(296, 'MTExMTAxMg==', 'REVWRUxPUE1FTlQgTE9BTg==', 'MQ==', 'QWN0aXZl', 'MTctSmFuLTIwMTU='),
(297, 'MTExMTAxMw==', 'QklBU0hBUkEgTE9BTg==', 'MQ==', 'QWN0aXZl', 'MTctSmFuLTIwMTU='),
(298, 'MTExMTAxNA==', 'RU1FUkdFTkNZIExPQU4=', 'MQ==', 'QWN0aXZl', 'MTctSmFuLTIwMTU='),
(299, 'MTExMTAxNQ==', 'SU5WRVNUTUVOVCBMT0FO', 'MQ==', 'QWN0aXZl', 'MTctSmFuLTIwMTU='),
(300, 'MTExMTAxNg==', 'U0NIT09MIEZFRVMgTE9BTg==', 'MQ==', 'QWN0aXZl', 'MTctSmFuLTIwMTU='),
(301, 'MTIxMjAx', 'RXF1aXR5IA==', 'MQ==', 'QWN0aXZl', 'MDktQXByLTIwMTU='),
(302, 'MTExMTAxMjU=', 'RU1FUkdFTkNZ', 'MQ==', 'QWN0aXZl', 'MTAtQXByLTIwMTU='),
(303, 'MTExMTAxMzA=', 'RU1FUkdFTkNZIA==', 'MQ==', 'QWN0aXZl', 'MTEtQXByLTIwMTU='),
(304, 'MTIxMjAy', 'UEFZQklMTA==', 'MQ==', 'QWN0aXZl', 'MTYtQXByLTIwMTU='),
(305, 'MTIxMjAz', 'UGV0dHkgQ2FzaA==', 'MQ==', 'QWN0aXZl', 'MjUtQXByLTIwMTU='),
(306, 'MTIxMjA0', 'QmFyY2xheXM=', 'MQ==', 'QWN0aXZl', 'MTUtTWF5LTIwMTU='),
(307, 'MjExMDEx', 'R3JvdXAgQQ==', 'Mg==', 'QWN0aXZl', 'MTgtSnVuLTIwMTU='),
(308, 'MjExMDEy', 'R3JvdXAgQw==', 'Mg==', 'QWN0aXZl', 'MTgtSnVuLTIwMTU='),
(309, 'MjExMDEz', 'R3JvdXAgQQ==', 'Mg==', 'QWN0aXZl', 'MTgtSnVuLTIwMTU='),
(310, 'MTExMTAxNTY4', 'RGV2ZWxvcG1lbnQ=', 'MQ==', 'QWN0aXZl', 'MDEtSnVsLTIwMTU='),
(311, 'MjExMDEx', 'c2FsZXM=', 'Mg==', 'QWN0aXZl', 'MjEtSnVsLTIwMTU='),
(312, 'MTExMTAxODI0', 'Qmlhc2hhcmEgTG9hbiAy', 'MQ==', 'QWN0aXZl', 'MDYtQXVnLTIwMTU='),
(313, 'MjExMDEy', 'bWNoZXpv', 'Mg==', 'QWN0aXZl', 'MDYtQXVnLTIwMTU='),
(314, 'MTIxMjA1', 'Q29vcGVyYXRpdmU=', 'MQ==', 'QWN0aXZl', 'MDctQXVnLTIwMTU='),
(315, 'MTIxMjA1', 'Q28tb3BlcmF0aXZlIEJhbms=', 'MQ==', 'QWN0aXZl', 'MTMtQXVnLTIwMTU='),
(316, 'MTIxMjA2', 'S0NC', 'MQ==', 'QWN0aXZl', 'MTMtQXVnLTIwMTU='),
(317, 'MTIxMjA3', 'Q2FzaA==', 'MQ==', 'QWN0aXZl', 'MTMtQXVnLTIwMTU='),
(318, 'MTExMTAxOTU0', 'c2Nob29sIGZlZXMgbG9hbg==', 'MQ==', 'QWN0aXZl', 'MTMtQXVnLTIwMTU='),
(319, 'MTExMTAxOTc2', 'YWR2YW5jZSBsb2Fu', 'MQ==', 'QWN0aXZl', 'MTMtQXVnLTIwMTU='),
(320, 'MzIz', 'Rml4ZWQgRGVwb3NpdCAgSW50ZXJlc3Qg', 'Mg==', 'QWN0aXZl', 'MTgtQXVnLTIwMTU='),
(321, 'MzIx', 'Rml4ZWQgRGVwb3NpdCBtYW5hZ2VtZW50IEZlZQ==', 'Mg==', 'QWN0aXZl', 'MTgtQXVnLTIwMTU='),
(322, 'MzIy', 'Rml4ZWQgRGVwb3NpdCBhY2NvdW50IEZlZQ==', 'Mg==', 'QWN0aXZl', 'MTgtQXVnLTIwMTU=');

-- --------------------------------------------------------

--
-- Table structure for table `groupperm`
--

CREATE TABLE IF NOT EXISTS `groupperm` (
`id` int(255) NOT NULL,
  `groupid` varchar(255) NOT NULL,
  `permission` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groupperm`
--

INSERT INTO `groupperm` (`id`, `groupid`, `permission`, `status`) VALUES
(1, '1', 'Y29udHJpYnV0aW9u', 'QWN0aXZl'),
(2, '1', 'aW5jb21l', 'QWN0aXZl'),
(3, '1', 'ZXhwZW5zZXM=', 'QWN0aXZl'),
(4, '1', 'bWVtYmVycmVnaXN0cmF0aW9u', 'QWN0aXZl'),
(5, '1', 'dmlld3BlcnNvbmFsaW5mbw==', 'QWN0aXZl'),
(6, '1', 'dmlld2NvbnRyaWJ1dGlvbnM=', 'QWN0aXZl'),
(7, '1', 'dmlld2FjY291bnRzdGF0ZW1lbnQ=', 'QWN0aXZl'),
(8, '1', 'dmlld2xvYW4=', 'QWN0aXZl'),
(9, '1', 'dmlld2xvYW5yZXBheW1lbnQ=', 'QWN0aXZl'),
(10, '1', 'dmlld3Jlc3BvbnNlcw==', 'QWN0aXZl'),
(11, '1', 'dmlld3dpdGhkcmF3YWw=', 'QWN0aXZl'),
(12, '1', 'd2l0aGRyYXdhbA==', 'QWN0aXZl'),
(13, '1', 'ZmluYW5jZWFjY291bnRz', 'QWN0aXZl'),
(14, '1', 'YmFsYW5jZWJm', 'QWN0aXZl'),
(15, '1', 'dmlld2JhbGFuY2ViZg==', 'QWN0aXZl'),
(16, '1', 'YmFua2luZw==', 'QWN0aXZl'),
(17, '1', 'am91cm5hbHM=', 'QWN0aXZl'),
(18, '1', 'cHJvZml0YW5kbG9zcw==', 'QWN0aXZl'),
(19, '1', 'Z2VuZXJhbGxlZGdlcg==', 'QWN0aXZl'),
(20, '1', 'dHJpYWxiYWxhbmNl', 'QWN0aXZl'),
(21, '1', 'YmFsYW5jZXNoZWV0', 'QWN0aXZl'),
(22, '1', 'cmVwb3J0c2NvbnRyaWJ1dGlvbmdyb3Vwcw==', 'QWN0aXZl'),
(23, '1', 'cmVwb3J0bWVtYmVycw==', 'QWN0aXZl'),
(24, '1', 'cmVwb3J0Y29udHJpYnV0aW9ucw==', 'QWN0aXZl'),
(25, '1', 'cmVwb3J0bG9hbnM=', 'QWN0aXZl'),
(26, '1', 'cmVwb3J0aW5jb21l', 'QWN0aXZl'),
(28, '1', 'ZmVlZGJhY2tyZXBvcnQ=', 'QWN0aXZl'),
(29, '1', 'c2hhcmVzbWFuYWdlbWVudA==', 'QWN0aXZl'),
(30, '1', 'c2FjY29kZXRhaWxz', 'QWN0aXZl'),
(31, '1', 'ZGF0YWJhc2U=', 'QWN0aXZl'),
(32, '1', 'YmFja3Vw', 'QWN0aXZl'),
(33, '1', 'dXNlcnM=', 'QWN0aXZl'),
(34, '1', 'dXNlcmFjdGl2aXRpZXM=', 'QWN0aXZl'),
(35, '1', 'YWN0aXZlbWVtYmVycw==', 'QWN0aXZl'),
(36, '1', 'bG9hbnN0YXRz', 'QWN0aXZl'),
(37, '1', 'YmFsYW5jZXN0YXRz', 'QWN0aXZl'),
(38, '1', 'YXZhaWxzdGF0cw==', 'QWN0aXZl'),
(39, '1', 'Y29udHN0YXRz', 'QWN0aXZl'),
(40, '1', 'ZGFpbHlzdGF0cw==', 'QWN0aXZl'),
(41, '1', 'c2hhcmViYWw=', 'QWN0aXZl'),
(42, '1', 'ZXhwc3RhdHM=', 'QWN0aXZl'),
(43, '1', 'aW5hY3RpdmVtZW1iZXJz', 'QWN0aXZl'),
(44, '1', 'bG9hbmJhbA==', 'QWN0aXZl'),
(45, '1', 'aW5jb21lc3RhdHM=', 'QWN0aXZl'),
(46, '1', 'cmVwb3J0YmFua2luZw==', 'QWN0aXZl'),
(47, '1', 'd2l0aHN0YXRz', 'QWN0aXZl'),
(48, '2', 'Y29udHJpYnV0aW9u', 'QWN0aXZl'),
(49, '2', 'aW5jb21l', 'QWN0aXZl'),
(50, '2', 'ZXhwZW5zZXM=', 'QWN0aXZl'),
(51, '2', 'bWVtYmVycmVnaXN0cmF0aW9u', 'QWN0aXZl'),
(52, '2', 'dmlld3BlcnNvbmFsaW5mbw==', 'QWN0aXZl'),
(53, '2', 'dmlld2NvbnRyaWJ1dGlvbnM=', 'QWN0aXZl'),
(54, '2', 'dmlld2FjY291bnRzdGF0ZW1lbnQ=', 'QWN0aXZl'),
(55, '2', 'dmlld2xvYW4=', 'QWN0aXZl'),
(56, '2', 'dmlld2xvYW5yZXBheW1lbnQ=', 'QWN0aXZl'),
(57, '2', 'dmlld3Jlc3BvbnNlcw==', 'QWN0aXZl'),
(58, '2', 'dmlld3dpdGhkcmF3YWw=', 'QWN0aXZl'),
(59, '2', 'd2l0aGRyYXdhbA==', 'QWN0aXZl'),
(60, '2', 'ZmluYW5jZWFjY291bnRz', 'QWN0aXZl'),
(61, '2', 'YmFsYW5jZWJm', 'QWN0aXZl'),
(62, '2', 'dmlld2JhbGFuY2ViZg==', 'QWN0aXZl'),
(63, '2', 'YmFua2luZw==', 'QWN0aXZl'),
(64, '2', 'am91cm5hbHM=', 'QWN0aXZl'),
(65, '2', 'cHJvZml0YW5kbG9zcw==', 'QWN0aXZl'),
(66, '2', 'Z2VuZXJhbGxlZGdlcg==', 'QWN0aXZl'),
(67, '2', 'dHJpYWxiYWxhbmNl', 'QWN0aXZl'),
(68, '2', 'YmFsYW5jZXNoZWV0', 'QWN0aXZl'),
(69, '2', 'cmVwb3J0c2NvbnRyaWJ1dGlvbmdyb3Vwcw==', 'QWN0aXZl'),
(70, '2', 'cmVwb3J0bWVtYmVycw==', 'QWN0aXZl'),
(71, '2', 'cmVwb3J0Y29udHJpYnV0aW9ucw==', 'QWN0aXZl'),
(72, '2', 'cmVwb3J0bG9hbnM=', 'QWN0aXZl'),
(73, '2', 'cmVwb3J0aW5jb21l', 'QWN0aXZl'),
(74, '2', 'cmVwb3J0ZXhwZW5zZXM=', 'QWN0aXZl'),
(75, '2', 'ZmVlZGJhY2tyZXBvcnQ=', 'QWN0aXZl'),
(76, '2', 'c2hhcmVzbWFuYWdlbWVudA==', 'QWN0aXZl'),
(77, '2', 'c2FjY29kZXRhaWxz', 'QWN0aXZl'),
(78, '2', 'ZGF0YWJhc2U=', 'QWN0aXZl'),
(79, '2', 'YmFja3Vw', 'QWN0aXZl'),
(80, '2', 'dXNlcnM=', 'QWN0aXZl'),
(81, '2', 'dXNlcmFjdGl2aXRpZXM=', 'QWN0aXZl'),
(82, '2', 'YWN0aXZlbWVtYmVycw==', 'QWN0aXZl'),
(83, '2', 'bG9hbnN0YXRz', 'QWN0aXZl'),
(84, '2', 'YmFsYW5jZXN0YXRz', 'QWN0aXZl'),
(85, '2', 'YmFua3N0YXRz', 'QWN0aXZl'),
(86, '2', 'YXZhaWxzdGF0cw==', 'QWN0aXZl'),
(87, '2', 'Y29udHN0YXRz', 'QWN0aXZl'),
(88, '2', 'ZGFpbHlzdGF0cw==', 'QWN0aXZl'),
(89, '2', 'c2hhcmViYWw=', 'QWN0aXZl'),
(90, '2', 'ZXhwc3RhdHM=', 'QWN0aXZl'),
(91, '2', 'aW5hY3RpdmVtZW1iZXJz', 'QWN0aXZl'),
(92, '2', 'bG9hbmJhbA==', 'QWN0aXZl'),
(93, '2', 'aW5jb21lc3RhdHM=', 'QWN0aXZl'),
(94, '2', 'cmVwb3J0YmFua2luZw==', 'QWN0aXZl'),
(95, '2', 'd2l0aHN0YXRz', 'QWN0aXZl'),
(96, '2', 'aW5jb21lZWRpdA==', 'QWN0aXZl'),
(97, '2', 'Y29udHJpYnV0aW9uZWRpdA==', 'QWN0aXZl'),
(98, '2', 'ZXhwZW5zZXNlZGl0', 'QWN0aXZl'),
(99, '3', 'Y29udHJpYnV0aW9u', 'QWN0aXZl'),
(100, '3', 'aW5jb21l', 'QWN0aXZl'),
(101, '3', 'ZXhwZW5zZXM=', 'QWN0aXZl'),
(102, '3', 'bWVtYmVycmVnaXN0cmF0aW9u', 'QWN0aXZl'),
(103, '3', 'dmlld3BlcnNvbmFsaW5mbw==', 'QWN0aXZl'),
(104, '3', 'dmlld2NvbnRyaWJ1dGlvbnM=', 'QWN0aXZl'),
(105, '3', 'dmlld2FjY291bnRzdGF0ZW1lbnQ=', 'QWN0aXZl'),
(106, '3', 'dmlld2xvYW4=', 'QWN0aXZl'),
(107, '3', 'dmlld2xvYW5yZXBheW1lbnQ=', 'QWN0aXZl'),
(108, '3', 'dmlld3Jlc3BvbnNlcw==', 'QWN0aXZl'),
(109, '3', 'dmlld3dpdGhkcmF3YWw=', 'QWN0aXZl'),
(110, '3', 'd2l0aGRyYXdhbA==', 'QWN0aXZl'),
(111, '3', 'ZmluYW5jZWFjY291bnRz', 'QWN0aXZl'),
(112, '3', 'YmFsYW5jZWJm', 'QWN0aXZl'),
(113, '3', 'dmlld2JhbGFuY2ViZg==', 'QWN0aXZl'),
(114, '3', 'YmFua2luZw==', 'QWN0aXZl'),
(115, '3', 'am91cm5hbHM=', 'QWN0aXZl'),
(116, '3', 'cHJvZml0YW5kbG9zcw==', 'QWN0aXZl'),
(117, '3', 'Z2VuZXJhbGxlZGdlcg==', 'QWN0aXZl'),
(118, '3', 'dHJpYWxiYWxhbmNl', 'QWN0aXZl'),
(119, '3', 'YmFsYW5jZXNoZWV0', 'QWN0aXZl'),
(120, '3', 'cmVwb3J0c2NvbnRyaWJ1dGlvbmdyb3Vwcw==', 'QWN0aXZl'),
(121, '3', 'cmVwb3J0bWVtYmVycw==', 'QWN0aXZl'),
(122, '3', 'cmVwb3J0Y29udHJpYnV0aW9ucw==', 'QWN0aXZl'),
(123, '3', 'cmVwb3J0bG9hbnM=', 'QWN0aXZl'),
(124, '3', 'cmVwb3J0aW5jb21l', 'QWN0aXZl'),
(125, '3', 'cmVwb3J0ZXhwZW5zZXM=', 'QWN0aXZl'),
(126, '3', 'ZmVlZGJhY2tyZXBvcnQ=', 'QWN0aXZl'),
(127, '3', 'c2hhcmVzbWFuYWdlbWVudA==', 'QWN0aXZl'),
(128, '3', 'c2FjY29kZXRhaWxz', 'QWN0aXZl'),
(129, '3', 'ZGF0YWJhc2U=', 'QWN0aXZl'),
(130, '3', 'YmFja3Vw', 'QWN0aXZl'),
(131, '3', 'dXNlcnM=', 'QWN0aXZl'),
(132, '3', 'dXNlcmFjdGl2aXRpZXM=', 'QWN0aXZl'),
(133, '3', 'YWN0aXZlbWVtYmVycw==', 'QWN0aXZl'),
(134, '3', 'bG9hbnN0YXRz', 'QWN0aXZl'),
(135, '3', 'YmFsYW5jZXN0YXRz', 'QWN0aXZl'),
(136, '3', 'YmFua3N0YXRz', 'QWN0aXZl'),
(137, '3', 'YXZhaWxzdGF0cw==', 'QWN0aXZl'),
(138, '3', 'Y29udHN0YXRz', 'QWN0aXZl'),
(139, '3', 'ZGFpbHlzdGF0cw==', 'QWN0aXZl'),
(140, '3', 'c2hhcmViYWw=', 'QWN0aXZl'),
(141, '3', 'ZXhwc3RhdHM=', 'QWN0aXZl'),
(142, '3', 'aW5hY3RpdmVtZW1iZXJz', 'QWN0aXZl'),
(143, '3', 'aW5jb21lc3RhdHM=', 'QWN0aXZl'),
(144, '3', 'cmVwb3J0YmFua2luZw==', 'QWN0aXZl'),
(145, '3', 'd2l0aHN0YXRz', 'QWN0aXZl'),
(146, '3', 'Y29udHJpYnV0aW9uZWRpdA==', 'QWN0aXZl'),
(147, '3', 'ZXhwZW5zZXNlZGl0', 'QWN0aXZl');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
`id` int(255) NOT NULL,
  `groupid` varchar(255) NOT NULL,
  `memberno` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `audituser` varchar(255) NOT NULL,
  `auditdate` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `groupid`, `memberno`, `status`, `audituser`, `auditdate`) VALUES
(1, 'MQ==', 'MDAwNjY=', 'YWN0aXZl', 'MA==', 'MjEtSnVsLTIwMTU='),
(2, 'MQ==', 'MDAwNjc=', 'YWN0aXZl', 'MTY=', 'MDYtQXVnLTIwMTU='),
(3, 'Mg==', 'MDAwNjc=', 'YWN0aXZl', 'MTY=', 'MDYtQXVnLTIwMTU='),
(4, 'MQ==', 'MDAwNzQ=', 'YWN0aXZl', 'MTA=', 'MDctQXVnLTIwMTU='),
(5, 'MQ==', 'MDAwNzc=', 'YWN0aXZl', 'MTc=', 'MTMtQXVnLTIwMTU=');

-- --------------------------------------------------------

--
-- Table structure for table `guarantors`
--

CREATE TABLE IF NOT EXISTS `guarantors` (
  `memberno` varchar(255) NOT NULL,
  `guarantorno` varchar(255) NOT NULL,
  `sharesoffered` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
`primarykey` int(255) NOT NULL,
  `transactionid` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guarantors`
--

INSERT INTO `guarantors` (`memberno`, `guarantorno`, `sharesoffered`, `date`, `comment`, `primarykey`, `transactionid`, `status`, `name`) VALUES
('MDAwNA==', 'MDAwNQ==', 'MTMwMDAw', 'MTgtSnVuLTIwMTU=', 'b2s=', 2, 'MTgwNjE1MDkzNDAxMjE=', 'Z3JhbnRlZA==', ''),
('MDAwOQ==', 'MDAwNA==', 'MTAwMDAw', 'MTktSnVuLTIwMTU=', 'b2s=', 3, 'MTkwNjE1MTIzNzU2MTI=', 'Z3JhbnRlZA==', ''),
('MDAwOA==', 'MDAwOQ==', 'MTUwMDA=', 'MjMtSnVuLTIwMTU=', 'b2s=', 5, 'MjMwNjE1MTEzMjQ4MTE=', 'Z3JhbnRlZA==', ''),
('MDAwMTM=', 'MDAwNQ==', 'MjAwMDA=', 'MjMtSnVuLTIwMTU=', 'b2s=', 6, 'MjMwNjE1MTIzMjM4MTI=', 'Z3JhbnRlZA==', ''),
('MDAwMTg=', 'MDAwNDc=', 'MTAwMDA=', 'MDEtSnVuLTIwMTU=', 'T0s=', 7, 'MzAwNjE1MTExNzQzMTE=', 'Z3JhbnRlZA==', ''),
('MDAwNQ==', 'MDAwNQ==', 'NzAwMDAw', 'MDEtSnVsLTIwMTU=', 'Z3VhcmFudGVlZA==', 9, 'MDEwNzE1MDY1MTM0Ng==', 'Z3JhbnRlZA==', ''),
('MDAwOTE=', 'MDAwNDg=', 'NTAwMDA=', 'MDEtSnVsLTIwMTU=', 'Z3VhcmFudG9y', 10, 'MDEwNzE1MDkxNzQ2OQ==', 'Z3JhbnRlZA==', ''),
('MDAwOTE=', 'MDAwNTI=', 'NTAwMDA=', 'MDEtSnVsLTIwMTU=', 'Z3VhcmFudG9yIDI=', 11, 'MDEwNzE1MDkxNzQ2OQ==', 'Z3JhbnRlZA==', ''),
('MDAwOTE=', 'MDAwOTE=', 'NTAwMDA=', 'MDEtSnVsLTIwMTU=', 'Z3VhcmFudGVlZA==', 12, 'MDEwNzE1MDkxNzQ2OQ==', 'Z3JhbnRlZA==', ''),
('MDAwMTc=', 'MDAwMTE=', 'MjAwMDA=', 'MDEtSnVsLTIwMTU=', 'b2s=', 13, 'MDEwNzE1MTIyOTI2MTI=', 'Z3JhbnRlZA==', ''),
('MDAwNjU=', 'MDAwNjU=', 'MjAwMDA=', 'MDItSnVsLTIwMTU=', 'YXBw', 14, 'MDQwNzE1MDc0MjEwNw==', 'Z3JhbnRlZA==', ''),
('MDAwMTA=', 'MDAwNw==', 'MTAwMDA=', 'MDMtSnVsLTIwMTQ=', 'b2s=', 16, 'MTIwNzE1MDE0NDU4MTM=', 'Z3JhbnRlZA==', ''),
('MDAwNA==', 'MDAwNA==', 'NTAwMDA=', 'MjMtSnVsLTIwMTU=', 'b2s=', 18, 'MjMwNzE1MDIzMjI5MTQ=', 'Z3JhbnRlZA==', ''),
('MDAwNw==', 'MDAwNw==', 'NTAwMDA=', 'MjQtSnVsLTIwMTU=', 'b2s=', 19, 'MjQwNzE1MDcyNjM5Nw==', 'Z3JhbnRlZA==', ''),
('MDAwNjY=', 'MTIzNDU=', 'MjAwMDA=', 'MjUtSnVsLTIwMTU=', 'dGVzdA==', 22, 'MjUwNzE1MTAyMDExMTA=', 'Z3JhbnRlZA==', 'bWNrYW1hYQ=='),
('MDAwOQ==', 'MTIzNDU=', 'MjAw', 'MjUtSnVsLTIwMTU=', 'b2s=', 23, 'MjUwNzE1MTA0NDI0MTA=', 'Z3JhbnRlZA==', 'bWNrYWE='),
('MDAwNjA=', 'MDAwOQ==', 'NTAwMDA=', 'MjgtSnVsLTIwMTU=', 'b2theQ==', 24, 'MjgwNzE1MDYwNjM5Ng==', 'Z3JhbnRlZA==', ''),
('MDAwMTU=', 'MDAwMTU=', 'MjAwMDA=', 'MjgtSnVsLTIwMTU=', 'b2s=', 26, 'MjgwNzE1MTAyNDM5MTA=', 'Z3JhbnRlZA==', ''),
('MDAwMw==', 'MDAwMw==', 'NDUwMDA=', 'MjktSnVsLTIwMTU=', 'T0s=', 27, 'MjkwNzE1MDgwNDQ2OA==', 'Z3JhbnRlZA==', ''),
('', 'MTIzNDU2NTY=', 'NjcwMA==', 'MDItRmViLTIwMTU=', 'b2s=', 28, '', 'Z3JhbnRlZA==', 'RVJUWVVJSktMO0xLSkg='),
('MDAwNzQ=', 'MDAwNzQ=', 'NTAwMDA=', 'MTgtQXByLTIwMTQ=', 'TE9BTg==', 37, 'MDYwODE1MTEwMjMyMjM=', 'Z3JhbnRlZA==', ''),
('MDAwNjM=', 'MDAwNzI=', 'MTMwMDA=', 'MzAtSnVsLTIwMTU=', 'b2s=', 38, 'MDYwODE1MTEwODQ0MjM=', 'Z3JhbnRlZA==', ''),
('', 'MDAwMTE=', 'MzAwMDAwMDA=', 'MDctQXVnLTIwMTU=', 'Zg==', 39, '', 'Z3JhbnRlZA==', ''),
('', 'MDAwMTI=', 'MzMwMDMwMzA=', 'MjgtSnVsLTIwMTU=', 'cg==', 40, '', 'Z3JhbnRlZA==', ''),
('', 'MDAwNQ==', 'MjMzMzMzMzMzMzMzMw==', 'MjktSnVsLTIwMTU=', 'aA==', 41, '', 'Z3JhbnRlZA==', ''),
('MDAwNjM=', 'MDAwMTk=', 'NTAwMA==', 'MDctQXVnLTIwMTU=', 'b2s=', 42, 'MDcwODE1MDIxMTUzMg==', 'Z3JhbnRlZA==', ''),
('U0UwMDA2OA==', 'U0UwMDA2OA==', 'NTAwMDA=', 'MDctQXVnLTIwMTU=', 'b2s=', 43, 'MDcwODE1MDI1MDU3Mg==', 'Z3JhbnRlZA==', ''),
('MDAwNjU=', 'MDAwNjU=', 'NTAwMDA=', 'MDctQXVnLTIwMTU=', 'b2s=', 44, 'MDcwODE1MDI1NDU1Mg==', 'Z3JhbnRlZA==', ''),
('MDAwNjc=', 'MDAwNjc=', 'NTAwMDA=', 'MDctQXVnLTIwMTU=', 'b2s=', 46, 'MDcwODE1MDMwNDUwMw==', 'Z3JhbnRlZA==', ''),
('MDAwNzM=', 'MDAwNzM=', 'NDUwMDA=', 'MTMtQXVnLTIwMTU=', 'b2s=', 57, 'MTMwODE1MTE1ODU1MTE=', 'Z3JhbnRlZA==', ''),
('MDAwNzQ=', 'MDAwNzQ=', 'ODAwMDA=', 'MTMtQXVnLTIwMTU=', 'T2s=', 59, 'MTMwODE1MTIxMjM5MTI=', 'Z3JhbnRlZA==', ''),
('MDAwNzU=', 'MDAwNzU=', 'NTAwMDA=', 'MTMtQXVnLTIwMTU=', 'R3VhcmFudGVlZA==', 61, 'MTMwODE1MTIyMDA0MTI=', 'Z3JhbnRlZA==', ''),
('MDAwNzc=', 'MDAwNzc=', 'NTAwMDAw', 'MTMtQXVnLTIwMTU=', 'b2s=', 62, 'MTMwODE1MTIyNDU3MTI=', 'Z3JhbnRlZA==', ''),
('MDAwNzc=', 'MDAwNzc=', 'MzAwMA==', 'MTMtQXVnLTIwMTU=', 'b2s=', 63, 'MTMwODE1MDEwNTMxMTM=', 'Z3JhbnRlZA==', ''),
('MDAwNzc=', 'MDAwNzc=', 'MjAwMDA=', 'MTMtQXVnLTIwMTU=', 'b2s=', 65, 'MTMwODE1MDEwOTU3MTM=', 'Z3JhbnRlZA==', ''),
('MDAwNzc=', 'MDAwNzc=', 'MzAwMDA=', 'MTMtQXVnLTIwMTU=', 'b2s=', 68, 'MTMwODE1MDE1NTExMTM=', 'Z3JhbnRlZA==', ''),
('MDAwNzQ=', 'MDAwNzQ=', 'NTAwMDA=', 'MTMtQXVnLTIwMTU=', 'T2s=', 69, 'MTMwODE1MDIwNjMxMTQ=', 'Z3JhbnRlZA==', ''),
('MDAwNzc=', 'MDAwNzc=', 'MjUwMDA=', 'MTMtQXVnLTIwMTU=', 'b2s=', 71, 'MTMwODE1MDIxODMxMTQ=', 'Z3JhbnRlZA==', ''),
('MDAwNzY=', 'MDAwNzY=', 'NDUwMDA=', 'MTQtQXVnLTIwMTU=', 'b2s=', 74, 'MTQwODE1MTE0NjIyMTE=', 'Z3JhbnRlZA==', '');

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE IF NOT EXISTS `inbox` (
`id` int(255) NOT NULL,
  `sender_number` varchar(55) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `insurancefees`
--

CREATE TABLE IF NOT EXISTS `insurancefees` (
  `transname` varchar(255) NOT NULL,
  `transid` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `paymentype` varchar(255) NOT NULL,
  `approvedby` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `paidby` varchar(255) NOT NULL,
  `payeeid` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
`primarykey` int(255) NOT NULL,
  `session` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `interbank`
--

CREATE TABLE IF NOT EXISTS `interbank` (
`id` int(11) NOT NULL,
  `account_from` varchar(200) NOT NULL,
  `account_to` varchar(200) NOT NULL,
  `transfer_officer` varchar(200) NOT NULL,
  `approved_by` varchar(200) NOT NULL,
  `purpose` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `payment_mode` varchar(200) NOT NULL,
  `slip_code` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `interestfreeze`
--

CREATE TABLE IF NOT EXISTS `interestfreeze` (
`id` int(11) NOT NULL,
  `membernumber` varchar(255) NOT NULL,
  `loantype` varchar(255) NOT NULL,
  `transactionid` varchar(255) NOT NULL,
  `auditdate` varchar(255) NOT NULL,
  `audituser` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `issueinvoice`
--

CREATE TABLE IF NOT EXISTS `issueinvoice` (
`id` int(255) NOT NULL,
  `debtorid` varchar(255) NOT NULL,
  `invdate` varchar(255) NOT NULL,
  `glacc` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `invno` varchar(255) NOT NULL,
  `duedate` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `audituser` varchar(255) NOT NULL,
  `auditdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `liabilities`
--

CREATE TABLE IF NOT EXISTS `liabilities` (
`id` int(255) NOT NULL,
  `accountid` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `lamount` varchar(255) NOT NULL,
  `lcomments` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loanapplication`
--

CREATE TABLE IF NOT EXISTS `loanapplication` (
`id` int(11) NOT NULL,
  `membernumber` varchar(255) NOT NULL,
  `loantype` varchar(255) NOT NULL,
  `reference_number` varchar(100) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `installments` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `appdate` varchar(255) NOT NULL,
  `gperiod` varchar(255) NOT NULL,
  `paymode` varchar(255) NOT NULL,
  `transactionid` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `approvalDate` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loanapplication`
--

INSERT INTO `loanapplication` (`id`, `membernumber`, `loantype`, `reference_number`, `purpose`, `installments`, `date`, `appdate`, `gperiod`, `paymode`, `transactionid`, `amount`, `status`, `reason`, `approvalDate`) VALUES
(1, 'MDAwNzc=', 'Mw==', 'MDAwNzcvMDgvMjAxNQ==', 'ZW1lcmdlbmN5', 'NQ==', 'MTMtQXVnLTIwMTU=', 'MTQzOTQxMzIwMA==', 'MA==', 'TW9udGhz', 'MTMwODE1MDEwNTMxMTM=', 'MzAwMA==  ', 'bm90IGRpc2J1cnNlZA==', '', 'MTMtQXVnLTIwMTU='),
(3, 'MDAwNzc=', 'NQ==', 'MDAwNzcvMDgvMjAxNQ==', 'Ymlhc2hhcmE=', 'Ng==', 'MTMtQXVnLTIwMTU=', 'MTQzOTQxMzIwMA==', 'MA==', 'TW9udGhz', 'MTMwODE1MDEwOTU3MTM=', 'MjAwMDA=  ', 'bm90IGRpc2J1cnNlZA==', '', 'MTMtQXVnLTIwMTU='),
(6, 'MDAwNzc=', 'Ng==', 'MDAwNzcvMDgvMjAxNQ==', 'bG9uZ3Rlcm0=', 'MTA=', 'MTMtQXVnLTIwMTU=', 'MTQzOTQxMzIwMA==', 'MA==', 'TW9udGhz', 'MTMwODE1MDE1NTExMTM=', 'MzAwMDA=  ', 'bm90IGRpc2J1cnNlZA==', '', 'MTMtQXVnLTIwMTU='),
(7, 'MDAwNzQ=', 'NA==', 'MDAwNzQvMDgvMjAxNQ==', 'RGV2ZWxvcG1lbnQ=', 'MTI=', 'MTMtQXVnLTIwMTU=', 'MTQzOTQxMzIwMA==', 'MA==', 'TW9udGhz', 'MTMwODE1MDIwNjMxMTQ=', 'MTAwMDAw  ', 'bm90IGRpc2J1cnNlZA==', '', 'MTMtQXVnLTIwMTU='),
(9, 'MDAwNzc=', 'NA==', 'MDAwNzcvMDgvMjAxNQ==', 'ZGV2', 'MTI=', 'MTMtQXVnLTIwMTU=', 'MTQzOTQxMzIwMA==', 'MA==', 'TW9udGhz', 'MTMwODE1MDIxODMxMTQ=', 'MjUwMDA=  ', 'bm90IGRpc2J1cnNlZA==', '', 'MTMtQXVnLTIwMTU='),
(12, 'MDAwNzY=', 'NA==', 'MDAwNzYvMDgvMjAxNQ==', 'ZGV2', 'NDU=', 'MTQtQXVnLTIwMTU=', 'MTQzOTQ5OTYwMA==', 'MTA=', 'RGF5cw==', 'MTQwODE1MTE0NjIyMTE=', 'NDUwMDA=  ', 'YWN0aXZl', '', 'MTQtQXVnLTIwMTU=');

-- --------------------------------------------------------

--
-- Table structure for table `loanbal`
--

CREATE TABLE IF NOT EXISTS `loanbal` (
`id` int(255) NOT NULL,
  `mno` varchar(255) NOT NULL,
  `tid` varchar(255) NOT NULL,
  `bal` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loanbal`
--

INSERT INTO `loanbal` (`id`, `mno`, `tid`, `bal`) VALUES
(4, 'MDAwNzQ=', 'MTMwODE1MDIwNjMxMTQ=', 'MTAwMDAw'),
(5, 'MDAwNzc=', 'MTMwODE1MDIxODMxMTQ=', 'MjUwMDA=');

-- --------------------------------------------------------

--
-- Table structure for table `loandisburse`
--

CREATE TABLE IF NOT EXISTS `loandisburse` (
`id` int(255) NOT NULL,
  `membernumber` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `monthlypayment` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `transid` varchar(255) NOT NULL,
  `loantime` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loandisburse`
--

INSERT INTO `loandisburse` (`id`, `membernumber`, `amount`, `monthlypayment`, `date`, `status`, `transid`, `loantime`) VALUES
(1, 'MDAwNzc=', 'Mjk4Ng==', 'NjA0LjUwNzQ5MDYyMDM3', 'MTQzOTQxMzIwMA==', 'YWN0aXZl', 'MTMwODE1MDEwNTMxMTM=', ''),
(3, 'MDAwNzc=', 'MTk4ODk=', 'MzQxNi42NjY2NjY2NjY3', 'MTQzOTQxMzIwMA==', 'YWN0aXZl', 'MTMwODE1MDEwOTU3MTM=', ''),
(6, 'MDAwNzc=', 'MzAwMDA=', 'MzE1MA==', 'MTQzOTQxMzIwMA==', 'YWN0aXZl', 'MTMwODE1MDE1NTExMTM=', ''),
(8, 'MDAwNzQ=', 'ODg5NDM=', 'ODUxNC45OTA0MTk1NTU2', 'MTQzOTQxMzIwMA==', 'YWN0aXZl', 'MTMwODE1MDIwNjMxMTQ=', ''),
(9, 'MDAwNzc=', 'MjIyMzY=', 'MjEyOC43NDc2MDQ4ODg5', '', 'YWN0aXZl', 'MTMwODE1MDIxODMxMTQ=', '');

-- --------------------------------------------------------

--
-- Table structure for table `loandisbursment`
--

CREATE TABLE IF NOT EXISTS `loandisbursment` (
`id` int(10) NOT NULL,
  `mno` varchar(100) NOT NULL,
  `glid` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `comments` text NOT NULL,
  `amount` varchar(100) NOT NULL,
  `tid` varchar(255) NOT NULL,
  `bnkid` varchar(100) NOT NULL,
  `pid` varchar(80) NOT NULL,
  `ref` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loandisbursment`
--

INSERT INTO `loandisbursment` (`id`, `mno`, `glid`, `date`, `comments`, `amount`, `tid`, `bnkid`, `pid`, `ref`) VALUES
(1, 'MDAwNzc=', 'MTMwODE1MDEwNTMxMTM=', 'MTMtQXVnLTIwMTU=', 'b2s=', 'MzAwMA==', 'MTMwODE1MDEwNTMxMTM=', 'MQ==', 'MQ==', 'RTc3'),
(3, 'MDAwNzc=', 'MTMwODE1MDEwOTU3MTM=', 'MTMtQXVnLTIwMTU=', 'b2s=', 'MjAwMDA=', 'MTMwODE1MDEwOTU3MTM=', 'MQ==', 'Mw==', 'Mg=='),
(6, 'MDAwNzc=', 'MTMwODE1MDE1NTExMTM=', 'MTMtQXVnLTIwMTU=', 'T0s=', 'MzAwMDA=', 'MTMwODE1MDE1NTExMTM=', 'MQ==', 'NQ==', 'Nzc='),
(7, 'MDAwNzQ=', 'MTMwODE1MDIwNjMxMTQ=', 'MTMtQXVnLTIwMTU=', 'T2s=', 'MTAwMDAw', 'MTMwODE1MDIwNjMxMTQ=', 'MQ==', 'MQ==', 'NTU0NQ=='),
(8, 'MDAwNzc=', 'MTMwODE1MDIxODMxMTQ=', 'MTMtQXVnLTIwMTU=', 'T0s=', 'MjUwMDA=', 'MTMwODE1MDIxODMxMTQ=', 'MQ==', 'NQ==', 'MDAwNzcvMDgvMjAxNQ=='),
(11, 'MDAwNzY=', 'MTQwODE1MTE0NjIyMTE=', 'MTQtQXVnLTIwMTU=', 'b2s=', 'NDAwMDA=', 'MTQwODE1MTE0NjIyMTE=', 'MQ==', 'MQ==', 'Y2hlcTEyMw==');

-- --------------------------------------------------------

--
-- Table structure for table `loaninsurance`
--

CREATE TABLE IF NOT EXISTS `loaninsurance` (
`id` int(255) NOT NULL,
  `mno` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `tid` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loaninsurance`
--

INSERT INTO `loaninsurance` (`id`, `mno`, `date`, `tid`, `amount`) VALUES
(1, 'MDAwNzc=', 'MTQzOTQxMzIwMA==', 'MTMwODE1MDEwNTMxMTM=', 'MTQ='),
(3, 'MDAwNzc=', 'MTQzOTQxMzIwMA==', 'MTMwODE1MDEwOTU3MTM=', 'MTEx'),
(7, 'MDAwNzQ=', 'MTQzOTQxMzIwMA==', 'MTMwODE1MDIwNjMxMTQ=', 'MTA1Nw=='),
(8, 'MDAwNzc=', '', 'MTMwODE1MDIxODMxMTQ=', 'MjY0');

-- --------------------------------------------------------

--
-- Table structure for table `loanintrests`
--

CREATE TABLE IF NOT EXISTS `loanintrests` (
`id` int(255) NOT NULL,
  `membernumber` varchar(255) NOT NULL,
  `interest` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `transid` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loanintrests`
--

INSERT INTO `loanintrests` (`id`, `membernumber`, `interest`, `status`, `date`, `transid`) VALUES
(1, 'MDAwNzc=', 'MjIuNTM3NDUzMTAxODU2', 'YWN0aXZl', 'MTQzOTQxMzIwMA==', 'MTMwODE1MDEwNTMxMTM='),
(3, 'MDAwNzc=', 'NTAw', 'YWN0aXZl', 'MTQzOTQxMzIwMA==', 'MTMwODE1MDEwOTU3MTM='),
(6, 'MDAwNzc=', 'MTUwMA==', 'YWN0aXZl', 'MTQzOTQxMzIwMA==', 'MTMwODE1MDE1NTExMTM='),
(8, 'MDAwNzQ=', 'MjE3OS44ODUwMzQ2Njcy', 'YWN0aXZl', 'MTQzOTQxMzIwMA==', 'MTMwODE1MDIwNjMxMTQ='),
(9, 'MDAwNzc=', 'NTQ0Ljk3MTI1ODY2Njc5', 'YWN0aXZl', '', 'MTMwODE1MDIxODMxMTQ=');

-- --------------------------------------------------------

--
-- Table structure for table `loanpayment`
--

CREATE TABLE IF NOT EXISTS `loanpayment` (
`id` int(255) NOT NULL,
  `payee` varchar(255) NOT NULL,
  `payeeid` varchar(255) NOT NULL,
  `transid` varchar(255) NOT NULL,
  `mno` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loanpayment`
--

INSERT INTO `loanpayment` (`id`, `payee`, `payeeid`, `transid`, `mno`, `amount`, `session`, `date`) VALUES
(8, 'bWNrYW1hYQ==', 'c2FzYSA0MzczMg==', 'MTgwNjE1MDkzNDAxMjE=', 'MDAwNA==', 'NjcwMA==', 'kk1nbe7imp7qf6s56gse66vh75', '1435093200'),
(11, 'b25lcw==', 'ZXNhY2MyNjcwOQ==', 'MDQwNzE1MDc0MjEwNw==', 'MDAwNjU=', 'MTAwMA==', 'jrk4e2j6je547gapl443i4lh11', '1435957200'),
(12, 'bWNsYWE=', 'ZXNhY2M5Mjk1Ng==', '', 'MDAwMQ==', 'MjMwMA==', 'dbs3k60jjq5k9odtphv82eab17', '1435525200'),
(15, 'QW5uYWggICBNdXRoaW5pICAgV2FtYnVh', 'MDAwNjA=', '', 'MDAwNjA=', 'MTU2NDYw', '', '1434747600'),
(16, 'QW5uYWggICBNdXRoaW5pICAgV2FtYnVh', 'MDAwNjA=', '', 'MDAwNjA=', 'MTUxNzUy', '', '1434747600'),
(17, 'U0FDQ08=', 'ZXNhY2MzOTMwNA==', 'MjMwNzE1MDIzMjI5MTQ=', 'MDAwNA==', 'NTAwMA==', 'mla3e5ulp5s0hr750dqus2amt7', '1437598800'),
(18, 'U0FDQ08=', 'ZXNhY2M0NjI2NQ==', 'MjMwNzE1MDIzMjI5MTQ=', 'MDAwNA==', 'NjAwMA==', 'jp4ru47q1o6m32cd6eujbjrbe2', '1437598800'),
(19, 'U0FDQ08=', 'ZXNhY2M4ODU1NQ==', 'MjMwNzE1MDIzMjI5MTQ=', 'MDAwNA==', 'NzAwMA==', '22p412cd796i3s4lgtgkfgnsb3', '1437598800'),
(20, 'bWNrYW1hYQ==', 'ZXNhY2MxNzY5Mw==', 'MjQwNzE1MDcyNjM5Nw==', 'MDAwNw==', 'NzAwMA==', 'bap48ui70e93rp0mdivdrh3sd3', '1437512400'),
(21, 'TUNLQU1B', 'ZXNhY2MxMjg0NQ==', 'MjQwNzE1MDcyNjM5Nw==', 'MDAwNw==', 'ODAwMA==', 'ao4pe69a5fjbif7bpfufvpk676', '1437339600'),
(22, 'bWNrYW1hYQ==', 'ZXNhY2M3OTIwMw==', 'MjQwNzE1MDcyNjM5Nw==', 'MDAwNw==', 'NTAwMA==', 'g28f1bitel2vimm4culo04gqr1', '1437685200'),
(26, 'SmVtbw==', 'ZXNhY2MxODI5NA==', 'MjgwNzE1MTAyNDM5MTA=', 'MDAwMTU=', 'MjQ1MDA=', '0p9iru7f37ehrhd99lqv4sope1', '1438030800'),
(27, 'bmpv', 'ZXNhY2M1MTQyMA==', '', 'MDAwMQ==', 'NjIxMDI=', '4578a9uqmk5nnmk9pubaunfk95', '1438203600'),
(28, 'am9obg==', 'ZXNhY2M5MzIyNg==', '', 'MDAwMQ==', 'NzQ3MjM=', 'kr989524vs1odi39bkg116se15', '1438290000'),
(29, 'Sk9ITg==', 'ZXNhY2M1NDk2NQ==', '', 'MDAwMQ==', 'ODk1Njc=', '9ad7rdip6gsr68ses31ahi2fo6', '1436302800'),
(32, 'bWMga2FtYWE=', 'ZXNhY2M1NjU2OQ==', '', 'MDAwNjY=', 'NTU2OQ==', 'g4c6vjdccer5jdkp1uuhu7dj96', '1438376400'),
(33, 'bWMga2FtYWE=', 'ZXNhY2M1NjU2OQ==', '', 'MDAwNjY=', 'NTYyNQ==', 'qpjcjjo1qsfql2i0vb9o5an0q3', '1438376400'),
(35, 'ampqag==', 'ZXNhY2M1NDc2MA==', '', 'MDAwMQ==', 'MTEwMTIw', 'tg27sou2aukied7758dbof5bq5', '1438808400'),
(37, 'Sm9obiBNYmF5aQ==', 'ZXNhY2MyOTY4Mg==', '', 'MDAwMQ==', 'MTMxODQ0', 'olik6j01s2eq3b1mcb9dp5pun7', '1438808400'),
(38, 'RE9SSVMgTlVOQSBLQU1BVQ==', 'ZXNhY2M1NjQyOQ==', 'MDYwODE1MTEwMjMyMjM=', 'MDAwNzQ=', 'NDUzMQ==', 'f9vbdg8utoi4acavon584nsll2', '1402606800'),
(39, 'RE9SSVMgTlVOQSBLQU1BVQ==', 'ZXNhY2M3MjY2MQ==', 'MDYwODE1MTEwMjMyMjM=', 'MDAwNzQ=', 'MTAwMDA=', '4j3pd0ob14dooh5b2m6a2i4ov1', '1414011600'),
(40, 'RE9SSVMgTlVOQSBLQU1BVQ==', 'ZXNhY2M1ODMxOA==', 'MDYwODE1MTEwMjMyMjM=', 'MDAwNzQ=', 'MTUwMDA=', '78eir0c0jbufjn9jdfrev3pvu0', '1421701200'),
(41, 'Sk9ITiBXQUZVTEEgU1VOR1VSSQ==', 'ZXNhY2MyODUzMw==', '', 'MDAwNjY=', 'MTYwNTEy', '9osf32u3dckoc7u4vd07s0v381', '1439326800'),
(47, 'TUNLQQ==', 'ZXNhY2MxODgxMQ==', 'MTMwODE1MTE1ODU1MTE=', 'MDAwNzM=', 'MTU1MA==', 'i0op2gr21s32jb45lvl2ql5bo0', '1439413200'),
(48, 'Q29zbWFz', 'ZXNhY2M5NjE2Nw==', 'MTMwODE1MTIxMjM5MTI=', 'MDAwNzQ=', 'MzQwMDA=', 'sfmkiiafoht7198q5pgk0vvvg6', '1439413200'),
(49, 'QW5uZSAgS2lyaW1pIA==', 'ZXNhY2M0MTg4MQ==', 'MTMwODE1MDEwNTMxMTM=', 'MDAwNzc=', 'OTAw', 't96dn8ofg2outr7ig4ev57fa56', '1439413200'),
(51, 'QW5uZSAgS2lyaW1pIA==', 'ZXNhY2M5MDQ4Mw==', 'MTMwODE1MDEwOTU3MTM=', 'MDAwNzc=', 'OTYxMQ==', 'nmus052as174972qvkq7l1db66', '1439413200'),
(52, 'QW5uZSAgS2lyaW1pIA==', 'ZXNhY2M4NTQ3Mg==', 'MTMwODE1MDEwOTU3MTM=', 'MDAwNzc=', 'NTAw', 'nmus052as174972qvkq7l1db66', '1439413200'),
(56, 'QW5uZSAgS2lyaW1p', 'ZXNhY2M0ODQ5Nw==', 'MTMwODE1MDE1NTExMTM=', 'MDAwNzc=', 'MTAwMA==', 'ogfr1a9p1541424rmp32kgsoo0', '1439413200'),
(57, 'QW5uZSAgS2lyaW1p', 'ZXNhY2MyMjM5NA==', 'MTMwODE1MDE1NTExMTM=', 'MDAwNzc=', 'MTAwMA==', 'd5vsbc6vc78855v760cv4o5ci6', '1439413200');

-- --------------------------------------------------------

--
-- Table structure for table `loanprocessingfees`
--

CREATE TABLE IF NOT EXISTS `loanprocessingfees` (
`id` int(255) NOT NULL,
  `loanid` varchar(255) NOT NULL,
  `amountfrom` varchar(255) NOT NULL,
  `amountto` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loanrepaydates`
--

CREATE TABLE IF NOT EXISTS `loanrepaydates` (
`id` int(11) NOT NULL,
  `mno` varchar(255) NOT NULL,
  `loanid` varchar(255) NOT NULL,
  `tid` varchar(255) NOT NULL,
  `dates` varchar(255) NOT NULL,
  `payno` varchar(255) NOT NULL,
  `start_bal` varchar(255) NOT NULL,
  `interest_payment` varchar(255) NOT NULL,
  `principal_payment` varchar(255) NOT NULL,
  `end_bal` varchar(255) NOT NULL,
  `cumulative_interest` varchar(255) NOT NULL,
  `cumulative_payment` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loanrepaydates`
--

INSERT INTO `loanrepaydates` (`id`, `mno`, `loanid`, `tid`, `dates`, `payno`, `start_bal`, `interest_payment`, `principal_payment`, `end_bal`, `cumulative_interest`, `cumulative_payment`, `status`) VALUES
(1, '', 'Mw==', 'MTMwODE1MDEwNTMxMTM=', '1439413200', 'MQ==', 'MzAwMA==', 'Ny41', 'NjAw', 'MjQwMA==', 'Ny41', 'NjA0LjUwNzQ5MDYyMDM3', ''),
(2, '', 'Mw==', 'MTMwODE1MDEwNTMxMTM=', '1442091600', 'Mg==', 'MjQwMA==', 'Ng==', 'NjAw', 'MTgwMA==', 'MTMuNQ==', 'MTIwOS4wMTQ5ODEyNDA3', ''),
(3, '', 'Mw==', 'MTMwODE1MDEwNTMxMTM=', '1444683600', 'Mw==', 'MTgwMA==', 'NC41', 'NjAw', 'MTIwMA==', 'MTg=', 'MTgxMy41MjI0NzE4NjEx', ''),
(4, '', 'Mw==', 'MTMwODE1MDEwNTMxMTM=', '1447362000', 'NA==', 'MTIwMA==', 'Mw==', 'NjAw', 'NjAw', 'MjE=', 'MjQxOC4wMjk5NjI0ODE1', ''),
(5, '', 'Mw==', 'MTMwODE1MDEwNTMxMTM=', '1449954000', 'NQ==', 'NjAw', 'MS41', 'NjAw', 'MA==', 'MjIuNQ==', 'MzAyMi41Mzc0NTMxMDE5', ''),
(12, '', 'NQ==', 'MTMwODE1MDEwOTU3MTM=', '1439413200', 'MQ==', 'MjAwMDA=', 'ODMuMzMzMzMzMzMzMzMz', 'MzMzMy4zMzMzMzMzMzMz', 'MTY2NjYuNjY2NjY2NjY3', 'ODMuMzMzMzMzMzMzMzMz', 'MzQxNi42NjY2NjY2NjY3', ''),
(13, '', 'NQ==', 'MTMwODE1MDEwOTU3MTM=', '1442091600', 'Mg==', 'MTY2NjYuNjY2NjY2NjY3', 'ODMuMzMzMzMzMzMzMzMz', 'MzMzMy4zMzMzMzMzMzMz', 'MTMzMzMuMzMzMzMzMzMz', 'MTY2LjY2NjY2NjY2NjY3', 'NjgzMy4zMzMzMzMzMzMz', ''),
(14, '', 'NQ==', 'MTMwODE1MDEwOTU3MTM=', '1444683600', 'Mw==', 'MTMzMzMuMzMzMzMzMzMz', 'ODMuMzMzMzMzMzMzMzMz', 'MzMzMy4zMzMzMzMzMzMz', 'MTAwMDA=', 'MjUw', 'MTAyNTA=', ''),
(15, '', 'NQ==', 'MTMwODE1MDEwOTU3MTM=', '1447362000', 'NA==', 'MTAwMDA=', 'ODMuMzMzMzMzMzMzMzMz', 'MzMzMy4zMzMzMzMzMzMz', 'NjY2Ni42NjY2NjY2NjY3', 'MzMzLjMzMzMzMzMzMzMz', 'MTM2NjYuNjY2NjY2NjY3', ''),
(16, '', 'NQ==', 'MTMwODE1MDEwOTU3MTM=', '1449954000', 'NQ==', 'NjY2Ni42NjY2NjY2NjY3', 'ODMuMzMzMzMzMzMzMzMz', 'MzMzMy4zMzMzMzMzMzMz', 'MzMzMy4zMzMzMzMzMzMz', 'NDE2LjY2NjY2NjY2NjY3', 'MTcwODMuMzMzMzMzMzMz', ''),
(17, '', 'NQ==', 'MTMwODE1MDEwOTU3MTM=', '1452632400', 'Ng==', 'MzMzMy4zMzMzMzMzMzMz', 'ODMuMzMzMzMzMzMzMzMz', 'MzMzMy4zMzMzMzMzMzMz', 'LTkuMDk0OTQ3MDE3NzI5M0UtMTM=', 'NTAw', 'MjA1MDA=', ''),
(39, '', 'Ng==', 'MTMwODE1MDE1NTExMTM=', '1439413200', 'MQ==', 'MzAwMDA=', 'MTUw', 'MzAwMA==', 'MjcwMDA=', 'MTUw', 'MzE1MA==', ''),
(40, '', 'Ng==', 'MTMwODE1MDE1NTExMTM=', '1442091600', 'Mg==', 'MjcwMDA=', 'MTUw', 'MzAwMA==', 'MjQwMDA=', 'MzAw', 'NjMwMA==', ''),
(41, '', 'Ng==', 'MTMwODE1MDE1NTExMTM=', '1444683600', 'Mw==', 'MjQwMDA=', 'MTUw', 'MzAwMA==', 'MjEwMDA=', 'NDUw', 'OTQ1MA==', ''),
(42, '', 'Ng==', 'MTMwODE1MDE1NTExMTM=', '1447362000', 'NA==', 'MjEwMDA=', 'MTUw', 'MzAwMA==', 'MTgwMDA=', 'NjAw', 'MTI2MDA=', ''),
(43, '', 'Ng==', 'MTMwODE1MDE1NTExMTM=', '1449954000', 'NQ==', 'MTgwMDA=', 'MTUw', 'MzAwMA==', 'MTUwMDA=', 'NzUw', 'MTU3NTA=', ''),
(44, '', 'Ng==', 'MTMwODE1MDE1NTExMTM=', '1452632400', 'Ng==', 'MTUwMDA=', 'MTUw', 'MzAwMA==', 'MTIwMDA=', 'OTAw', 'MTg5MDA=', ''),
(45, '', 'Ng==', 'MTMwODE1MDE1NTExMTM=', '1455310800', 'Nw==', 'MTIwMDA=', 'MTUw', 'MzAwMA==', 'OTAwMA==', 'MTA1MA==', 'MjIwNTA=', ''),
(46, '', 'Ng==', 'MTMwODE1MDE1NTExMTM=', '1457816400', 'OA==', 'OTAwMA==', 'MTUw', 'MzAwMA==', 'NjAwMA==', 'MTIwMA==', 'MjUyMDA=', ''),
(47, '', 'Ng==', 'MTMwODE1MDE1NTExMTM=', '1460494800', 'OQ==', 'NjAwMA==', 'MTUw', 'MzAwMA==', 'MzAwMA==', 'MTM1MA==', 'MjgzNTA=', ''),
(48, '', 'Ng==', 'MTMwODE1MDE1NTExMTM=', '1463086800', 'MTA=', 'MzAwMA==', 'MTUw', 'MzAwMA==', 'MA==', 'MTUwMA==', 'MzE1MDA=', ''),
(73, '', 'NA==', 'MTMwODE1MDIwNjMxMTQ=', '1439413200', 'MQ==', 'MTAwMDAw', 'MzMzLjMzMzMzMzMzMzMz', 'ODMzMy4zMzMzMzMzMzMz', 'OTE2NjYuNjY2NjY2NjY3', 'MzMzLjMzMzMzMzMzMzMz', 'ODUxNC45OTA0MTk1NTU2', ''),
(74, '', 'NA==', 'MTMwODE1MDIwNjMxMTQ=', '1442091600', 'Mg==', 'OTE2NjYuNjY2NjY2NjY3', 'MzA1LjU1NTU1NTU1NTU2', 'ODMzMy4zMzMzMzMzMzMz', 'ODMzMzMuMzMzMzMzMzMz', 'NjM4Ljg4ODg4ODg4ODg5', 'MTcwMjkuOTgwODM5MTEx', ''),
(75, '', 'NA==', 'MTMwODE1MDIwNjMxMTQ=', '1444683600', 'Mw==', 'ODMzMzMuMzMzMzMzMzMz', 'Mjc3Ljc3Nzc3Nzc3Nzc4', 'ODMzMy4zMzMzMzMzMzMz', 'NzUwMDA=', 'OTE2LjY2NjY2NjY2NjY3', 'MjU1NDQuOTcxMjU4NjY3', ''),
(76, '', 'NA==', 'MTMwODE1MDIwNjMxMTQ=', '1447362000', 'NA==', 'NzUwMDA=', 'MjUw', 'ODMzMy4zMzMzMzMzMzMz', 'NjY2NjYuNjY2NjY2NjY3', 'MTE2Ni42NjY2NjY2NjY3', 'MzQwNTkuOTYxNjc4MjIy', ''),
(77, '', 'NA==', 'MTMwODE1MDIwNjMxMTQ=', '1449954000', 'NQ==', 'NjY2NjYuNjY2NjY2NjY3', 'MjIyLjIyMjIyMjIyMjIy', 'ODMzMy4zMzMzMzMzMzMz', 'NTgzMzMuMzMzMzMzMzMz', 'MTM4OC44ODg4ODg4ODg5', 'NDI1NzQuOTUyMDk3Nzc4', ''),
(78, '', 'NA==', 'MTMwODE1MDIwNjMxMTQ=', '1452632400', 'Ng==', 'NTgzMzMuMzMzMzMzMzMz', 'MTk0LjQ0NDQ0NDQ0NDQ0', 'ODMzMy4zMzMzMzMzMzMz', 'NTAwMDA=', 'MTU4My4zMzMzMzMzMzMz', 'NTEwODkuOTQyNTE3MzM0', ''),
(79, '', 'NA==', 'MTMwODE1MDIwNjMxMTQ=', '1455310800', 'Nw==', 'NTAwMDA=', 'MTY2LjY2NjY2NjY2NjY3', 'ODMzMy4zMzMzMzMzMzMz', 'NDE2NjYuNjY2NjY2NjY3', 'MTc1MA==', 'NTk2MDQuOTMyOTM2ODg5', ''),
(80, '', 'NA==', 'MTMwODE1MDIwNjMxMTQ=', '1457816400', 'OA==', 'NDE2NjYuNjY2NjY2NjY3', 'MTM4Ljg4ODg4ODg4ODg5', 'ODMzMy4zMzMzMzMzMzMz', 'MzMzMzMuMzMzMzMzMzMz', 'MTg4OC44ODg4ODg4ODg5', 'NjgxMTkuOTIzMzU2NDQ1', ''),
(81, '', 'NA==', 'MTMwODE1MDIwNjMxMTQ=', '1460494800', 'OQ==', 'MzMzMzMuMzMzMzMzMzMz', 'MTExLjExMTExMTExMTEx', 'ODMzMy4zMzMzMzMzMzMz', 'MjUwMDA=', 'MjAwMA==', 'NzY2MzQuOTEzNzc2', ''),
(82, '', 'NA==', 'MTMwODE1MDIwNjMxMTQ=', '1463086800', 'MTA=', 'MjUwMDA=', 'ODMuMzMzMzMzMzMzMzMz', 'ODMzMy4zMzMzMzMzMzMz', 'MTY2NjYuNjY2NjY2NjY3', 'MjA4My4zMzMzMzMzMzMz', 'ODUxNDkuOTA0MTk1NTU2', ''),
(83, '', 'NA==', 'MTMwODE1MDIwNjMxMTQ=', '1465765200', 'MTE=', 'MTY2NjYuNjY2NjY2NjY3', 'NTUuNTU1NTU1NTU1NTU2', 'ODMzMy4zMzMzMzMzMzMz', 'ODMzMy4zMzMzMzMzMzMz', 'MjEzOC44ODg4ODg4ODg5', 'OTM2NjQuODk0NjE1MTEy', ''),
(84, '', 'NA==', 'MTMwODE1MDIwNjMxMTQ=', '1468357200', 'MTI=', 'ODMzMy4zMzMzMzMzMzMz', 'MjcuNzc3Nzc3Nzc3Nzc4', 'ODMzMy4zMzMzMzMzMzMz', 'My42Mzc5Nzg4MDcwOTE3RS0xMg==', 'MjE2Ni42NjY2NjY2NjY3', 'MTAyMTc5Ljg4NTAzNDY3', ''),
(85, '', 'NA==', 'MTMwODE1MDIxODMxMTQ=', '1439413200', 'MQ==', 'MjUwMDA=', 'ODMuMzMzMzMzMzMzMzMz', 'MjA4My4zMzMzMzMzMzMz', 'MjI5MTYuNjY2NjY2NjY3', 'ODMuMzMzMzMzMzMzMzMz', 'MjEyOC43NDc2MDQ4ODg5', ''),
(86, '', 'NA==', 'MTMwODE1MDIxODMxMTQ=', '1442091600', 'Mg==', 'MjI5MTYuNjY2NjY2NjY3', 'NzYuMzg4ODg4ODg4ODg5', 'MjA4My4zMzMzMzMzMzMz', 'MjA4MzMuMzMzMzMzMzMz', 'MTU5LjcyMjIyMjIyMjIy', 'NDI1Ny40OTUyMDk3Nzc4', ''),
(87, '', 'NA==', 'MTMwODE1MDIxODMxMTQ=', '1444683600', 'Mw==', 'MjA4MzMuMzMzMzMzMzMz', 'NjkuNDQ0NDQ0NDQ0NDQ0', 'MjA4My4zMzMzMzMzMzMz', 'MTg3NTA=', 'MjI5LjE2NjY2NjY2NjY3', 'NjM4Ni4yNDI4MTQ2NjY3', ''),
(88, '', 'NA==', 'MTMwODE1MDIxODMxMTQ=', '1447362000', 'NA==', 'MTg3NTA=', 'NjIuNQ==', 'MjA4My4zMzMzMzMzMzMz', 'MTY2NjYuNjY2NjY2NjY3', 'MjkxLjY2NjY2NjY2NjY3', 'ODUxNC45OTA0MTk1NTU2', ''),
(89, '', 'NA==', 'MTMwODE1MDIxODMxMTQ=', '1449954000', 'NQ==', 'MTY2NjYuNjY2NjY2NjY3', 'NTUuNTU1NTU1NTU1NTU2', 'MjA4My4zMzMzMzMzMzMz', 'MTQ1ODMuMzMzMzMzMzMz', 'MzQ3LjIyMjIyMjIyMjIy', 'MTA2NDMuNzM4MDI0NDQ0', ''),
(90, '', 'NA==', 'MTMwODE1MDIxODMxMTQ=', '1452632400', 'Ng==', 'MTQ1ODMuMzMzMzMzMzMz', 'NDguNjExMTExMTExMTEx', 'MjA4My4zMzMzMzMzMzMz', 'MTI1MDA=', 'Mzk1LjgzMzMzMzMzMzMz', 'MTI3NzIuNDg1NjI5MzMz', ''),
(91, '', 'NA==', 'MTMwODE1MDIxODMxMTQ=', '1455310800', 'Nw==', 'MTI1MDA=', 'NDEuNjY2NjY2NjY2NjY3', 'MjA4My4zMzMzMzMzMzMz', 'MTA0MTYuNjY2NjY2NjY3', 'NDM3LjU=', 'MTQ5MDEuMjMzMjM0MjIy', ''),
(92, '', 'NA==', 'MTMwODE1MDIxODMxMTQ=', '1457816400', 'OA==', 'MTA0MTYuNjY2NjY2NjY3', 'MzQuNzIyMjIyMjIyMjIy', 'MjA4My4zMzMzMzMzMzMz', 'ODMzMy4zMzMzMzMzMzMz', 'NDcyLjIyMjIyMjIyMjIy', 'MTcwMjkuOTgwODM5MTEx', ''),
(93, '', 'NA==', 'MTMwODE1MDIxODMxMTQ=', '1460494800', 'OQ==', 'ODMzMy4zMzMzMzMzMzMz', 'MjcuNzc3Nzc3Nzc3Nzc4', 'MjA4My4zMzMzMzMzMzMz', 'NjI1MA==', 'NTAw', 'MTkxNTguNzI4NDQ0', ''),
(94, '', 'NA==', 'MTMwODE1MDIxODMxMTQ=', '1463086800', 'MTA=', 'NjI1MA==', 'MjAuODMzMzMzMzMzMzMz', 'MjA4My4zMzMzMzMzMzMz', 'NDE2Ni42NjY2NjY2NjY3', 'NTIwLjgzMzMzMzMzMzMz', 'MjEyODcuNDc2MDQ4ODg5', ''),
(95, '', 'NA==', 'MTMwODE1MDIxODMxMTQ=', '1465765200', 'MTE=', 'NDE2Ni42NjY2NjY2NjY3', 'MTMuODg4ODg4ODg4ODg5', 'MjA4My4zMzMzMzMzMzMz', 'MjA4My4zMzMzMzMzMzMz', 'NTM0LjcyMjIyMjIyMjIy', 'MjM0MTYuMjIzNjUzNzc4', ''),
(96, '', 'NA==', 'MTMwODE1MDIxODMxMTQ=', '1468357200', 'MTI=', 'MjA4My4zMzMzMzMzMzMz', 'Ni45NDQ0NDQ0NDQ0NDQ0', 'MjA4My4zMzMzMzMzMzMz', 'OS4wOTQ5NDcwMTc3MjkzRS0xMw==', 'NTQxLjY2NjY2NjY2NjY3', 'MjU1NDQuOTcxMjU4NjY3', '');

-- --------------------------------------------------------

--
-- Table structure for table `loanrepo`
--

CREATE TABLE IF NOT EXISTS `loanrepo` (
`id` int(11) NOT NULL,
  `membernumber` varchar(255) NOT NULL,
  `loantype` varchar(255) NOT NULL,
  `transactionid` varchar(255) NOT NULL,
  `repoamt` varchar(255) NOT NULL,
  `auditdate` varchar(255) NOT NULL,
  `audituser` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE IF NOT EXISTS `loans` (
`id` int(255) NOT NULL,
  `membernumber` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `monthlypayment` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `transid` varchar(255) NOT NULL,
  `loantime` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `membernumber`, `amount`, `monthlypayment`, `date`, `status`, `transid`, `loantime`) VALUES
(39, 'MDAwNzM=', 'NDUwMDA=', 'MTk1NC4xMjE0OTc2ODQ4', 'MTQzOTQxMzIwMA==', 'YWN0aXZl', 'MTMwODE1MTE1ODU1MTE=', ''),
(40, 'MDAwNzQ=', 'ODAwMDA=', 'MTM0NTAuMjQyNzUxMzA5', 'MTQzOTQxMzIwMA==', 'YWN0aXZl', 'MTMwODE1MTIxMjM5MTI=', ''),
(42, 'MDAwNzc=', 'NTAwMDAw', 'NDI1NzQuOTUyMDk3Nzc4', 'MTQzOTQxMzIwMA==', 'YWN0aXZl', 'MTMwODE1MTIyNDU3MTI=', ''),
(43, 'MDAwNzU=', 'NTAwMDA=', 'MTAxMDAuMjIxODUxNjA4', 'MTQzOTQxMzIwMA==', 'YWN0aXZl', 'MTMwODE1MTIyMDA0MTI=', ''),
(44, 'MDAwNzc=', 'MzAwMA==', 'NjA0LjUwNzQ5MDYyMDM3', 'MTQzOTQxMzIwMA==', 'YWN0aXZl', 'MTMwODE1MDEwNTMxMTM=', ''),
(46, 'MDAwNzc=', 'MjAwMDA=', 'MzQxNi42NjY2NjY2NjY3', 'MTQzOTQxMzIwMA==', 'YWN0aXZl', 'MTMwODE1MDEwOTU3MTM=', ''),
(49, 'MDAwNzc=', 'MzAwMDA=', 'MzE1MA==', 'MTQzOTQxMzIwMA==', 'YWN0aXZl', 'MTMwODE1MDE1NTExMTM=', ''),
(51, 'MDAwNzQ=', 'MTAwMDAw', 'ODUxNC45OTA0MTk1NTU2', 'MTQzOTQxMzIwMA==', 'YWN0aXZl', 'MTMwODE1MDIwNjMxMTQ=', ''),
(52, 'MDAwNzc=', 'MjUwMDA=', 'MjEyOC43NDc2MDQ4ODg5', '', 'YWN0aXZl', 'MTMwODE1MDIxODMxMTQ=', '');

-- --------------------------------------------------------

--
-- Table structure for table `loansettings`
--

CREATE TABLE IF NOT EXISTS `loansettings` (
  `lname` varchar(255) NOT NULL,
  `ltype` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `ratetype` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `loanappfee` varchar(255) NOT NULL,
  `loaninsurance` varchar(255) NOT NULL,
  `min` varchar(255) NOT NULL,
  `max` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `maxgurantor` varchar(255) NOT NULL,
  `fines` varchar(255) NOT NULL,
  `maxloansave` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `interesttype` varchar(255) NOT NULL,
  `legalfees` varchar(255) NOT NULL,
`id` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loansettings`
--

INSERT INTO `loansettings` (`lname`, `ltype`, `status`, `ratetype`, `rate`, `loanappfee`, `loaninsurance`, `min`, `max`, `comments`, `maxgurantor`, `fines`, `maxloansave`, `duration`, `interesttype`, `legalfees`, `id`) VALUES
('RU1FUkdFTkNZIExPQU4=', 'RW1lcmdlbmN5', 'QWN0aXZl', 'Mg==', 'MjQw', 'MA==', 'Rm9ybXVsYWU=', 'MTAw', 'NTAwMDAwMDAw', 'RW1lcmdlbmN5IGxvYW4gcHJvZHVjdA==', 'MTA=', 'MA==', 'MzAwMDAw', 'MA==', 'bm9ybWFs', 'MA==', 3),
('RGV2ZWxvcG1lbnQ=', 'TG9uZyBUZXJt', 'QWN0aXZl', 'Mg==', 'MTI=', 'MTA=', 'Rm9ybXVsYWU=', 'MjAwMA==', 'MTAwMDAwMDA=', 'ZGV2IGxvYW4=', 'MQ==', 'Mg==', 'MA==', 'MQ==', 'bm9ybWFs', 'MjAw', 4),
('Qmlhc2hhcmEgTG9hbiAy', 'TG9uZyBUZXJt', 'QWN0aXZl', 'MQ==', 'MjA=', 'MA==', 'Rm9ybXVsYWU=', 'MjA=', 'NTAwMDAw', 'b2theQ==', 'NTA=', 'MA==', 'MQ==', 'MA==', 'bm9ybWFs', 'MjAw', 5),
('c2Nob29sIGZlZXMgbG9hbg==', 'TG9uZyBUZXJt', 'QWN0aXZl', 'MQ==', 'MTI=', 'MA==', '', 'MA==', 'NTAwMDAwMA==', 'b2s=', 'Mg==', 'MA==', 'Mw==', 'MQ==', 'bm9ybWFs', 'MA==', 6),
('YWR2YW5jZSBsb2Fu', 'TG9uZyBUZXJt', 'QWN0aXZl', 'Mg==', 'MTI=', 'MA==', '', 'MA==', 'NTAwMDAwMDA=', 'b2s=', 'Mg==', 'MA==', 'MA==', 'MQ==', 'bm9ybWFs', 'MA==', 7);

-- --------------------------------------------------------

--
-- Table structure for table `loanwriteoff`
--

CREATE TABLE IF NOT EXISTS `loanwriteoff` (
`id` int(11) NOT NULL,
  `membernumber` varchar(255) NOT NULL,
  `loantype` varchar(255) NOT NULL,
  `transactionid` varchar(255) NOT NULL,
  `auditdate` varchar(255) NOT NULL,
  `audituser` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `memberaccs`
--

CREATE TABLE IF NOT EXISTS `memberaccs` (
`id` int(255) NOT NULL,
  `mno` varchar(255) NOT NULL,
  `accno` varchar(255) NOT NULL,
  `glaccid` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `audituser` varchar(255) NOT NULL,
  `auditdate` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memberaccs`
--

INSERT INTO `memberaccs` (`id`, `mno`, `accno`, `glaccid`, `status`, `audituser`, `auditdate`) VALUES
(1, 'MDAwNzM=', 'MjExIDAwMDcz', 'Njk=', 'YWN0aXZl', 'MTI=', 'MTMtQXVnLTIwMTU='),
(2, 'MDAwNzQ=', 'MjExIDAwMDc0', 'Njk=', 'YWN0aXZl', 'MTE=', 'MTMtQXVnLTIwMTU='),
(3, 'MDAwNzQ=', 'MzEwMDA3NA==', 'OTg=', 'YWN0aXZl', 'MTE=', 'MTMtQXVnLTIwMTU='),
(4, 'MDAwNzQ=', 'MzIwMDA3NA==', 'NzE=', 'YWN0aXZl', 'MTE=', 'MTMtQXVnLTIwMTU='),
(5, 'MDAwNzc=', 'MjExIDAwMDc3', 'Njk=', 'YWN0aXZl', 'MTc=', 'MTMtQXVnLTIwMTU='),
(6, 'MDAwNzc=', 'MzIwMDA3Nw==', 'NzE=', 'YWN0aXZl', 'MTc=', 'MTMtQXVnLTIwMTU='),
(7, 'MDAwNzc=', 'MTExMTAxMTcwMDA3Nw==', 'Mjgy', 'YWN0aXZl', '', 'MTMtQXVnLTIwMTU='),
(8, 'MDAwNzQ=', 'MTExMTAxMTcwMDA3NA==', 'Mjgy', 'YWN0aXZl', '', 'MTMtQXVnLTIwMTU='),
(9, 'MDAwNzc=', 'MTExMTAxODI0MDAwNzc=', 'MzEy', 'YWN0aXZl', '', 'MTMtQXVnLTIwMTU='),
(10, 'MDAwNzQ=', 'MTExMTAxNTY4MDAwNzQ=', 'MzEw', 'YWN0aXZl', '', 'MTMtQXVnLTIwMTU='),
(11, 'MDAwNzc=', 'MTExMTAxNTY4MDAwNzc=', 'MzEw', 'YWN0aXZl', '', 'MTMtQXVnLTIwMTU='),
(12, 'MDAwNzc=', 'MTExMTAxOTU0MDAwNzc=', 'MzE4', 'YWN0aXZl', '', 'MTMtQXVnLTIwMTU='),
(13, 'MDAwNzM=', 'RngwMDA3Mw==', 'MQ==', 'YWN0aXZl', 'MTI=', 'MTgtQXVnLTIwMTU='),
(14, 'MDAwNzc=', 'MzEwMDA3Nw==', 'OTg=', 'YWN0aXZl', 'MQ==', 'MTgtQXVnLTIwMTU='),
(15, 'MDAwNzc=', 'RngwMDA3Nw==', 'MQ==', 'YWN0aXZl', 'MQ==', 'MTgtQXVnLTIwMTU='),
(16, 'MDAwNzY=', 'MzEwMDA3Ng==', 'OTg=', 'YWN0aXZl', 'MQ==', 'MTgtQXVnLTIwMTU='),
(17, 'MDAwNzY=', 'RngwMDA3Ng==', 'MQ==', 'YWN0aXZl', 'MQ==', 'MTgtQXVnLTIwMTU=');

-- --------------------------------------------------------

--
-- Table structure for table `membercontribution`
--

CREATE TABLE IF NOT EXISTS `membercontribution` (
  `paymenttype` varchar(255) NOT NULL,
  `memberno` varchar(255) NOT NULL,
  `payee` varchar(255) NOT NULL,
  `payeeid` varchar(255) NOT NULL,
  `transaction` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `vehicleregno` varchar(255) NOT NULL,
  `datefrom` varchar(255) NOT NULL,
  `dateto` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
`primarykey` int(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `transid` varchar(255) NOT NULL,
  `bnkid` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membercontribution`
--

INSERT INTO `membercontribution` (`paymenttype`, `memberno`, `payee`, `payeeid`, `transaction`, `amount`, `vehicleregno`, `datefrom`, `dateto`, `date`, `primarykey`, `session`, `transid`, `bnkid`) VALUES
('MQ==', 'MDAwNzM=', 'TUNLQU1B', 'ZXNhY2MxMDQzNg==', 'Njk=', 'NTYwMA==', '', 'MTMtQXVnLTIwMTU=', 'MTMtQXVnLTIwMTU=', 'MTMtQXVnLTIwMTU=', 1, 'sj5ohh234te3qnqcplj2igjtn0', 'bWNyMDAwMQ==', 'MQ=='),
('NQ==', 'MDAwNzQ=', 'Q29zbWFzICBLb3Jpcg==', 'ZXNhY2M5Nzk0OQ==', 'Njk=', 'ODAwMDA=', '', 'MTMtQXVnLTIwMTU=', 'MTMtQXVnLTIwMTU=', 'MTMtQXVnLTIwMTU=', 2, 'k0a4bpd6r6i3v8sikv0csuefq6', 'bWNyMDAwMg==', 'MQ=='),
('NQ==', 'MDAwNzQ=', 'Q29zbWFzICBLb3Jpcg==', 'ZXNhY2M0MTM3Mw==', 'OTg=', 'MTAwMDAw', '', 'MTMtQXVnLTIwMTU=', 'MTMtQXVnLTIwMTU=', 'MTMtQXVnLTIwMTU=', 3, 'lov5g3jfunj4ddenaci219lcv3', 'bWNyMDAwMw==', 'MQ=='),
('MQ==', 'MDAwNzc=', 'QW5uZSAgS2lyaW1pIA==', 'ZXNhY2MyNjk0Ng==', 'Njk=', 'MzAwMDA=', '', 'MDEtQXVnLTIwMTU=', 'MzEtQXVnLTIwMTU=', 'MTMtQXVnLTIwMTU=', 4, 'c5llhkbj27kfcilaj4fj42r5f3', 'bWNyMDAwMw==', 'MQ=='),
('NQ==', 'MDAwNzQ=', 'Q29zbWFzICBLb3Jpcg==', 'ZXNhY2M5Njg2MA==', 'NzE=', 'MzAwMA==', '', 'MTMtQXVnLTIwMTU=', 'MTMtQXVnLTIwMTU=', 'MTMtQXVnLTIwMTU=', 5, 'mc8s2mqo2h5j1st1m6pa4o82k6', 'bWNyMDAwNA==', 'MQ=='),
('MQ==', 'MDAwNzc=', 'QW5uZSAgS2lyaW1pIA==', 'ZXNhY2M0NTU5NQ==', 'NzE=', 'NDUwMDA=', '', 'MDEtQXVnLTIwMTU=', 'MzEtQXVnLTIwMTU=', 'MDUtQXVnLTIwMTU=', 6, '0kib9s38p6u8cn1fvk8e0cmpa1', 'bWNyMDAwNQ==', 'MQ=='),
('Mg==', 'MDAwNzc=', 'QW5uZSAgS2lyaW1pIA==', 'ZXNhY2MxNTE2NQ==', 'NzE=', 'NTAw', '', 'MDEtQXVnLTIwMTU=', 'MzEtQXVnLTIwMTU=', 'MTMtQXVnLTIwMTU=', 7, 'u7f59mggjbghtdjfl3te278fk2', 'bWNyMDAwNw==', 'MQ=='),
('MQ==', 'MDAwNzc=', 'QW5uZSAgS2lyaW1pIA==', 'ZXNhY2M0MTg4MQ==', 'Mjgy', 'MTUwMA==', '', 'MTMtQXVnLTIwMTU=', 'MzEtQXVnLTIwMTU=', 'MTMtQXVnLTIwMTU=', 8, 't96dn8ofg2outr7ig4ev57fa56', 'MTMwODE1MDEwNTMxMTM=', 'MQ=='),
('Mw==', 'MDAwNzc=', 'QW5uZSAgS2lyaW1pIA==', 'ZXNhY2M5MDQ4Mw==', 'MzEy', 'MTAwMDA=', '', 'MTMtQXVnLTIwMTU=', 'MzEtQXVnLTIwMTU=', 'MTMtQXVnLTIwMTU=', 9, 'nmus052as174972qvkq7l1db66', 'MTMwODE1MDEwOTU3MTM=', 'MQ=='),
('Mw==', 'MDAwNzc=', 'QW5uZSAgS2lyaW1pIA==', 'ZXNhY2M4NTQ3Mg==', 'MzEy', 'NTAw', '', 'MTMtQXVnLTIwMTU=', 'MzEtQXVnLTIwMTU=', 'MTMtQXVnLTIwMTU=', 10, 'nmus052as174972qvkq7l1db66', 'MTMwODE1MDEwOTU3MTM=', 'MQ=='),
('NQ==', 'MDAwNzc=', 'QW5uZSAgS2lyaW1p', 'ZXNhY2M0ODQ5Nw==', 'MzE4', 'MjUwMA==', '', 'MTMtQXVnLTIwMTU=', 'MzEtQXVnLTIwMTU=', 'MTMtQXVnLTIwMTU=', 14, 'ogfr1a9p1541424rmp32kgsoo0', 'MTMwODE1MDE1NTExMTM=', 'MQ=='),
('NQ==', 'MDAwNzc=', 'QW5uZSAgS2lyaW1p', 'ZXNhY2MyMjM5NA==', 'MzE4', 'MTAwMA==', '', 'MTMtQXVnLTIwMTU=', 'MzEtQXVnLTIwMTU=', 'MTMtQXVnLTIwMTU=', 15, 'd5vsbc6vc78855v760cv4o5ci6', 'MTMwODE1MDE1NTExMTM=', 'MQ=='),
('NQ==', 'MDAwNzM=', 'ZGFu', 'ZXNhY2M0NDU2Mw==', 'Rngx', 'MTg3MA==', '', 'MzEtSnVsLTIwMTU=', 'MzEtQXVnLTIwMTU=', 'MTgtQXVnLTIwMTU=', 16, 'gni8jgqcvqrfghuunv8mjjcll5', 'bWNyMDAwMTY=', 'NA=='),
('', 'MDAwNzM=', 'RGFuICAgICAgS2FtYXU=', '', 'MzIw', 'NC42OA==', '', '', '', 'MTgtQXVnLTIwMTU=', 17, '', 'bWNyMDAwMTc=', 'MQ=='),
('NQ==', 'MDAwNzM=', 'ZGFu', 'ZXNhY2M3MjgxOQ==', 'Rngx', 'MzAwMA==', '', 'MDYtQXVnLTIwMTU=', 'MzEtQXVnLTIwMTU=', 'MTgtQXVnLTIwMTU=', 18, 'mqv39trha2cju3leterfcmcp51', 'bWNyMDAwMTg=', 'NA=='),
('Mg==', 'MDAwNzc=', 'QW5uZSAgS2lyaW1p', 'ZXNhY2M3OTg4Ng==', 'NzE=', 'MTIwMDA=', '', 'MDEtQXVnLTIwMTU=', 'MDgtQXVnLTIwMTU=', 'MDEtQXVnLTIwMTU=', 19, 'qn0uoo2e1rjs8dg12la52il5t2', 'bWNyMDAwMTk=', 'NA=='),
('MQ==', 'MDAwNzc=', 'QW5uZSAgS2lyaW1p', 'ZXNhY2M5OTIzNQ==', 'NzE=', 'MTAwMDA=', '', 'MTAtQXVnLTIwMTU=', 'MTctQXVnLTIwMTU=', 'MTAtQXVnLTIwMTU=', 20, 'ns7m9oubecj9208l5d7of512k7', 'bWNyMDAwMjA=', 'MQ=='),
('MQ==', 'MDAwNzc=', 'QW5uZSAgS2lyaW1p', 'ZXNhY2M4OTA3OQ==', 'Rngx', 'NTM1MA==', '', 'MDEtQXVnLTIwMTU=', 'MTEtQXVnLTIwMTU=', 'MTAtQXVnLTIwMTU=', 21, 'egvp0akunlkqsnkrmvnc93o203', 'bWNyMDAwMjE=', 'MQ=='),
('Mg==', 'MDAwNzY=', 'QW5uZSAgS2lyaW1p', 'ZXNhY2MzMTI4Ng==', 'Rngx', 'NDk4NTA=', '', 'MDEtQXVnLTIwMTU=', 'MDgtQXVnLTIwMTU=', 'MDgtQXVnLTIwMTU=', 22, 'je2i5jk7jenjc1is8197ioq754', 'bWNyMDAwMjI=', 'Mg=='),
('Mw==', 'MDAwNzY=', 'QW5uZSAgS2lyaW1p', 'ZXNhY2MxMjM1OQ==', 'Rngx', 'MzUwMDA=', '', 'MTAtQXVnLTIwMTU=', 'MTgtQXVnLTIwMTU=', 'MTgtQXVnLTIwMTU=', 23, 't7pcncsgjear7vemunvr8f2rs3', 'bWNyMDAwMjM=', 'Mg=='),
('MQ==', 'MDAwNzc=', 'YW5uIGtpcmltaQ==', 'ZXNhY2M4OTg4Ng==', 'OTg=', 'MzAwMA==', 'TlVMTA==', 'MDEtQXVnLTIwMTU=', 'MzEtQXVnLTIwMTU=', 'MDEtQXVnLTIwMTU=', 24, '5d1er8tgdicp2dqjo4jmcnv2n1', 'MjQ=', 'MQ=='),
('Mw==', 'MDAwNzY=', 'Y2dlIG5idWtr', 'ZXNhY2M1NTcyOQ==', 'NzE=', 'NTAwMA==', 'TlVMTA==', 'MS1BdWctMTU=', 'MzEtQXVnLTE1', 'MzEtQXVnLTIwMTU=', 25, '5d1er8tgdicp2dqjo4jmcnv2n1', 'MjU=', 'Mg=='),
('NQ==', 'MDAwNzY=', 'Y25nIHRoZSBkZWpheQ==', 'ZXNhY2M0NjM5OQ==', 'Rngx', 'MjAwMDA=', '', 'MTctQXVnLTIwMTU=', 'MjktQXVnLTIwMTU=', 'MzEtQXVnLTIwMTU=', 26, '5d1er8tgdicp2dqjo4jmcnv2n1', 'bWNyMDAwMjY=', 'Mw==');

-- --------------------------------------------------------

--
-- Table structure for table `member_category`
--

CREATE TABLE IF NOT EXISTS `member_category` (
  `prefix` varchar(100) NOT NULL,
`id` int(20) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `memebr_title`
--

CREATE TABLE IF NOT EXISTS `memebr_title` (
`id` int(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memebr_title`
--

INSERT INTO `memebr_title` (`id`, `title`, `status`) VALUES
(1, 'TXI=', 'YWN0aXZl');

-- --------------------------------------------------------

--
-- Table structure for table `newmember`
--

CREATE TABLE IF NOT EXISTS `newmember` (
  `photo` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `pcode` varchar(255) NOT NULL,
  `mop` varchar(255) NOT NULL,
  `recruitedby` varchar(255) NOT NULL,
  `recruitee` varchar(255) NOT NULL,
  `bname` varchar(255) NOT NULL,
  `bloc` varchar(255) NOT NULL,
  `nameb` varchar(255) NOT NULL,
  `commfee` varchar(255) NOT NULL,
  `idnumber` varchar(255) NOT NULL,
  `membernumber` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `mobileno` varchar(255) NOT NULL,
  `pinnumber` varchar(255) NOT NULL,
  `residence` varchar(255) NOT NULL,
  `career` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `regdate` varchar(255) NOT NULL,
  `station` varchar(255) NOT NULL,
  `cursacco` varchar(255) NOT NULL,
  `nation` varchar(255) NOT NULL,
  `regfeedate` varchar(255) NOT NULL,
  `member_cat_id` varchar(100) NOT NULL,
  `title_id` varchar(100) NOT NULL,
  `floor` varchar(100) NOT NULL,
  `cor_id` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `constituency` varchar(100) NOT NULL,
  `office_cell` varchar(100) NOT NULL,
  `office_landline` varchar(100) NOT NULL,
  `office_mail` varchar(100) NOT NULL,
`primarykey` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newmember`
--

INSERT INTO `newmember` (`photo`, `firstname`, `middlename`, `lastname`, `dob`, `gender`, `pcode`, `mop`, `recruitedby`, `recruitee`, `bname`, `bloc`, `nameb`, `commfee`, `idnumber`, `membernumber`, `district`, `division`, `mobileno`, `pinnumber`, `residence`, `career`, `email`, `comments`, `status`, `regdate`, `station`, `cursacco`, `nation`, `regfeedate`, `member_cat_id`, `title_id`, `floor`, `cor_id`, `region`, `constituency`, `office_cell`, `office_landline`, `office_mail`, `primarykey`) VALUES
('MDcwNTQ1Nw==', 'Sm9obnNvbg==', 'TA==', 'TWJheWk=', 'MTAtMTAtMTk3OQ==', 'TWFsZQ==', 'UC5PIEJPWCAxMjIz', 'bW9udGhseQ==', '', '', 'Mg==', '', '', 'NTAwMA==', 'MjgyMjI4NDY=', '', '', '', '', '', 'SnVqYQ==', '', 'bWlrZW1iYXlpQGdtYWlsLmNvbQ==', 'T2s=', 'YWN0aXZl', 'MDEtSmFuLTE5NzA=', '', '', '', '', 'MQ==', 'MQ==', 'MQ==', 'MTE=', '', '', '', '', 'am9obnNvbkByeWFuYWRhLmNvbQ==', 72),
('MDgwNDAwOA==', 'ZGFu', '', 'a2FtYXU=', 'MTMtMDgtMTk5Nw==', 'TWFsZQ==', '', 'd2Vla2x5', '', '', 'Mg==', '', '', 'NDAw', 'MjM0NTY3ODkw', 'MDAwNzM=', '', '', 'MjM0NTY=', '', '', '', 'bUBnbWFpbC5jb20=', '', 'YWN0aXZl', 'MDEtSmFuLTE5NzA=', '', '', '', '', '', '', '', 'OQ==', '', '', '', '', 'MjM0NTY3', 73),
('MDgxMzQ4OGluZGV4LmpwZw==', 'Q29zbWFz', '', 'S29yaXI=', 'MDEtRmViLTE5OTA=', 'TWFsZQ==', '', '', '', '', '', '', '', 'MzAwMDA=', 'Mjg0NzYxNjc=', 'MDAwNzQ=', '', '', 'KzI1NDcyMzY2ODE4NA==', '', '', '', 'Q29zbWFza29yaXIyMEBnbWFpbC5jb20=', '', 'YWN0aXZl', 'MTMtQXVnLTIwMTU=', '', '', '', '', '', '', '', 'MTE=', '', '', '', '', 'Y29zbWFzQHJ5YW5hZGEuY29t', 74),
('MDgyNDA1OA==', 'RWR3aW4=', 'TA==', 'TGFuZ2F0', 'MDEtMDEtMTk3OQ==', 'RmVtYWxl', 'UE8gQk9YIDg5MA==', 'bW9udGhseQ==', '', '', 'Mg==', '', '', 'NTAwMA==', 'MjYyMjI2NzI=', 'MDAwNzU=', '', '', 'MDcxNzYxMzAxOQ==', '', 'SlVKQQ==', '', 'ZWRsYW5nQGdtYWlsLmNvbQ==', '', 'YWN0aXZl', 'MTMtQXVnLTIwMTU=', '', '', '', '', '', '', 'Mg==', 'OQ==', 'TXVzbGlt', '', '', '', 'ZWR3aW5AcnlhbmFuZGEuY29t', 75),
('MDgzMDA0OA==', 'Y25n', '', 'dGhlZGVqYXk=', 'MDEtMDgtMTk5Nw==', 'RmVtYWxl', '', 'QW5udWFs', 'Mg==', '', 'Mw==', '', '', 'NDU2', 'MjM0NTY3ODkw', 'MDAwNzY=', '', '', 'MjM0NTY=', '', '', '', 'bUBnbWFpbC5jb20=', '', 'YWN0aXZl', 'MTMtQXVnLTIwMTU=', '', '', '', '', '', '', '', 'OQ==', '', '', '', '', 'bWNAZi5jb20=', 76),
('MTAzOTU2MTA=', 'QW5uZQ==', '', 'S2lyaW1p', 'MDUtQXVnLTE5OTc=', 'RmVtYWxl', '', '', '', '', '', '', '', 'MzAw', 'MDAwNzc=', 'MDAwNzc=', '', '', 'MDcyNjEwMzgzNw==', '', '', '', 'a2lyaW1pQHlhaG9vLmNvbQ==', '', 'YWN0aXZl', 'MzAtRGVjLTIwMTQ=', '', '', '', '', '', '', '', 'MTI=', '', '', '', '', 'a2lyaW1pQHlhaG9vLmNvbQ==', 77);

-- --------------------------------------------------------

--
-- Table structure for table `newvehicle`
--

CREATE TABLE IF NOT EXISTS `newvehicle` (
  `memberno` varchar(255) NOT NULL,
  `vehicleregno` varchar(255) NOT NULL,
  `logbookno` varchar(255) NOT NULL,
  `evalue` varchar(255) NOT NULL,
  `purchasedate` varchar(255) NOT NULL,
  `vehicletype` varchar(255) NOT NULL,
  `operationroute` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `fleet` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `did` varchar(255) NOT NULL,
  `cid` varchar(255) NOT NULL,
`primarykey` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nextofkin`
--

CREATE TABLE IF NOT EXISTS `nextofkin` (
`id` int(255) NOT NULL,
  `memberno` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `percentage` varchar(80) NOT NULL,
  `idno` varchar(255) NOT NULL,
  `dob` varchar(80) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `status` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nextofkin`
--

INSERT INTO `nextofkin` (`id`, `memberno`, `fname`, `mname`, `lname`, `relationship`, `percentage`, `idno`, `dob`, `mobile`, `pic`, `comments`, `status`) VALUES
(1, 'MDAwOTE=', 'Sm9obg==', 'Tmpvcm9nZQ==', 'TmR1YXRp', 'QnJvdGhlcg==', 'NTA=', 'MzAyNTg5NjM=', 'MDctMDctMTk5Mw==', 'MDcyOTQxMDYzMA==', 'MDkwMDIyOQ==', 'b2s=', 'YWN0aXZl'),
(2, 'MDAwNjc=', 'UmluYQ==', 'QWtpbnlp', 'QWJheW8=', 'QnJvdGhlcg==', 'MTAw', 'Mjc0MTQ2MjM=', 'MDYtMDgtMTk5Nw==', 'MDcwMDAwMDAwMA==', 'MDcyNzEyMTk=', 'b2theQ==', 'YWN0aXZl'),
(3, 'MDAwNzQ=', 'TkFESUE=', 'TVVNQkk=', 'S0FNQVU=', 'REFVR0hURVI=', 'NTA=', 'MTMwNDY3MDI=', 'MTMtMDYtMTk3OA==', 'MDcyMDY3OTEwMg==', 'MTAzOTQ4MjJhcGFydG1lbnRzLmpwZw==', 'QmVjb21lIGEgbWVtYmVyDQo=', 'YWN0aXZl'),
(4, 'QUEwMDAx', 'S2FtYXU=', '', 'TXVueXdh', 'U29u', 'OQ==', 'Mjg0NzYxNjc=', 'MDgvMTMvMjAxNQ==', 'MjU0NzIzNjY4MTg0', 'MDcwMjQ0N2luZGV4LmpwZw==', '', 'YWN0aXZl'),
(5, 'MDAwNzQ=', 'SnVtYQ==', '', 'RXJpYw==', 'U29u', 'MTA=', 'Mjg0NzYxNjc=', 'MDEtMDItMTk5MA==', 'MDcyMzY2ODE4NA==', 'MDgxNTIyOA==', '', 'YWN0aXZl'),
(6, 'MDAwNzM=', 'QW5u', 'ZGF2aXM=', 'TWlydWdp', 'MTIvMjkvMjAwOA==', 'QnJvdGhlcg==', 'MjgyMjI4NDY=', 'MTAw', 'MDcxNzYxMzAxNw==', 'MDkwNjExOQ==', 'b2s=', 'YWN0aXZl'),
(7, 'MDAwNzc=', 'S2lyaW1p', '', 'QXJ0aHVy', 'U29u', 'MTAw', 'MDAwNzc=', 'MDUtMDgtMTk5Nw==', 'MDcwMDAwMDAwMQ==', 'MTA0MTM1MTA=', 'b2s=', 'YWN0aXZl');

-- --------------------------------------------------------

--
-- Table structure for table `organisation`
--

CREATE TABLE IF NOT EXISTS `organisation` (
`id` int(255) NOT NULL,
  `organisation` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisation`
--

INSERT INTO `organisation` (`id`, `organisation`, `status`) VALUES
(1, 'T2xkIE11dHVhbA==', 'YWN0aXZl'),
(2, 'UnlhbmFkYSBBT0w=', 'YWN0aXZl'),
(3, 'Sm9obnNvbiAmIFNvbnMgTHRk', 'YWN0aXZl'),
(5, 'TWF4', 'YWN0aXZl'),
(6, 'QUJN', 'YWN0aXZl');

-- --------------------------------------------------------

--
-- Table structure for table `othercash`
--

CREATE TABLE IF NOT EXISTS `othercash` (
  `id` int(11) NOT NULL,
  `other_cash` varchar(200) NOT NULL,
  `invoice_no` varchar(200) NOT NULL,
  `account` varchar(200) NOT NULL,
  `purpose` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `payee` varchar(200) NOT NULL,
  `payment_mode` varchar(200) NOT NULL,
  `receipt_no` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `cdate` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `outbox`
--

CREATE TABLE IF NOT EXISTS `outbox` (
  `id` int(11) NOT NULL,
  `client` varchar(20) NOT NULL,
  `recipients` text NOT NULL,
  `charge` varchar(20) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(80) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
`id` int(11) NOT NULL,
  `url` varchar(80) NOT NULL,
  `name` varchar(80) NOT NULL,
  `menu` varchar(80) NOT NULL,
  `status` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `url`, `name`, `menu`, `status`) VALUES
(1, 'YWNjb3VudHN0YXRlbWVudC5waHA=', 'Y29udHJpYnV0aW9ucw==', 'c3RhdGVtZW50cw==', 'YWN0aXZl'),
(2, 'cGVyc29uYWxsb2FucmVwb3J0cy5waHA=', 'bG9hbg==', 'c3RhdGVtZW50cw==', 'YWN0aXZl'),
(3, 'YWNjb3VudC5waHA=', 'bWluaSBzdGF0ZW1lbnRz', 'c3RhdGVtZW50cw==', 'YWN0aXZl'),
(4, 'ZHluYWluZC5waHA=', 'ZHluYW1pYyBjb250cmlidXRpb25z', 'c3RhdGVtZW50cw==', 'YWN0aXZl'),
(5, 'YWNjc2EucGhw', 'c3VtbWFyaXplZCBzdGF0ZW1lbnRz', 'c3RhdGVtZW50cw==', 'YWN0aXZl'),
(6, 'Z2VuZXJhbHN0YXRlbWVudC5waHA=', 'Z2VuZXJhbCBzdGF0ZW1lbnRz', 'c3RhdGVtZW50cw==', 'YWN0aXZl'),
(7, 'Y29udHJpYnV0aW9uLnBocA==', 'Y29udHJpYnV0aW9ucw==', 'Y29udHJpYnV0aW9ucw==', 'YWN0aXZl'),
(8, 'Y29udHJpYnV0aW9uZWRpdC5waHA=', 'Q29udHJpYnV0aW9uIEVkaXQ=', 'Y29udHJpYnV0aW9u', 'YWN0aXZl'),
(9, 'dmlld2NvbnRyaWJ1dGlvbnMucGhw', 'VmlldyBDb250cmlidXRpb25z', 'Y29udHJpYnV0aW9ucw==', 'YWN0aXZl'),
(10, 'cGVyc29uYWxjb250cmlidXRpb25zLnBocA==', 'UGVyc29uYWwgQ29udHJpYnV0aW9ucw==', 'Y29udHJpYnV0aW9ucw==', 'YWN0aXZl'),
(11, 'dmlld2dyb3Vwcy5waHA=', 'R3JvdXAgTWVtYmVycw==', 'Y29udHJpYnV0aW9ucw==', 'YWN0aXZl'),
(12, 'Y29udHJpYnV0aW9ucmVwcmludC5waHA=', 'Q29udHJpYnV0aW9uIFJlcHJpbnQgUmVjZWlwdA==', 'Y29udHJpYnV0aW9ucw==', 'YWN0aXZl'),
(13, 'aW5jb21lLnBocA==', 'SW5jb21l', 'aW5jb21l', 'YWN0aXZl'),
(14, 'aW5jb21lZWRpdC5waHA=', 'SW5jb21lIEVkaXQ=', 'aW5jb21l', 'YWN0aXZl'),
(15, 'dmlld2luY29tZS5waHA=', 'VmlldyBpbmNvbWVz', 'aW5jb21l', 'YWN0aXZl'),
(16, 'dmlld2luY29tZXBpZWNoYXJ0LnBocA==', 'SW5jb21lIFBpZSBDaGFydA==', 'aW5jb21l', 'YWN0aXZl'),
(17, 'aW5jb21lcmVwcmludC5waHA=', 'SW5jb21lIFJlcHJpbnQgUmVjZWlwdA==', 'aW5jb21l', 'YWN0aXZl'),
(18, 'ZXhwZW5zZXMucGhw', 'RXhwZW5zZXM=', 'ZXhwZW5zZXM=', 'YWN0aXZl'),
(19, 'ZXhwZW5zZXNlZGl0LnBocA==', 'RXhwZW5zZXMgRWRpdA==', 'ZXhwZW5zZXM=', 'YWN0aXZl'),
(20, 'dmlld2V4cGVuc2VzLnBocA==', 'VmlldyBFeHBlbnNlcw==', 'ZXhwZW5zZXM=', 'YWN0aXZl'),
(21, 'ZXhwZW5zZXNyZXByaW50LnBocA==', 'RXhwZW5zZXMgUmVwcmludCBSZWNlaXB0', 'ZXhwZW5zZXM=', 'YWN0aXZl'),
(22, 'cGVyc29uYWxsb2FuLnBocA==', 'TG9hbiBBcHBsaWNhdGlvbnM=', 'bG9hbnM=', 'YWN0aXZl'),
(23, 'dmlld2xvYW5zLnBocA==', 'VmlldyBMb2Fucw==', 'bG9hbnM=', 'YWN0aXZl'),
(24, 'bG9hbnMucGhw', 'U3VjY2Vzc2Z1bCBMb2Fucw==', 'bG9hbnM=', 'YWN0aXZl'),
(25, 'bG9hbkFwcHJvdmFsLnBocA==', 'TG9hbiBBcHByb3ZhbHM=', 'bG9hbnM=', 'YWN0aXZl'),
(26, 'bG9hbmRlbC5waHA=', 'TG9hbiBSZXZlcnNhbA==', 'bG9hbnM=', 'YWN0aXZl'),
(27, 'Y29sbGF0ZXJhbC5waHA=', 'QWRkIENvbGxhdGVyYWw=', 'bG9hbnM=', 'YWN0aXZl'),
(28, 'dmlld2NvbGxhdGVyYWwucGhw', 'VmlldyBDb2xsYXRlcmFs', 'bG9hbnM=', 'YWN0aXZl'),
(29, 'bG9hbmRpc2J1cnNtZW50LnBocA==', 'TG9hbiBEaXNidXJzZW1lbnQ=', 'bG9hbnM=', 'YWN0aXZl'),
(30, 'dmlld2ZpbmVzLnBocA==', 'VmlldyBGaW5lcw==', 'bG9hbnM=', 'YWN0aXZl'),
(31, 'dmlld2xvYW5iYXJncmFwaC5waHA=', 'VmlldyBMb2FuIEJhcmdyYXBo', 'bG9hbnM=', 'aW5hY3RpdmU='),
(32, 'ZXh0cmFjYXNoLnBocA==', 'RXh0cmEgRmVl', 'bG9hbnM=', 'YWN0aXZl'),
(33, 'cmVqZWN0ZWRMb2FuLnBocA==', 'UmVqZWN0ZWQgTG9hbnM=', 'bG9hbnM=', 'YWN0aXZl'),
(34, 'YWN0aXZlTG9hbi5waHA=', 'QWN0aXZlIExvYW5z', 'bG9hbnM=', 'YWN0aXZl'),
(35, 'Y29tcGxldGVkTG9hbi5waHA=', 'Q29tcGxldGVkIExvYW5z', 'bG9hbnM=', 'YWN0aXZl'),
(36, 'bG9hbnBvcnRmb2xpby5waHA=', 'TG9hbiBQb3Jmb2xpbw==', 'bG9hbnM=', 'YWN0aXZl'),
(37, 'bG9hbmRpc2J1c21lbnRycHQucGhw', 'TG9hbiBEaXNidXJzZW1lbnQgUmVwb3J0', 'bG9hbnM=', 'YWN0aXZl'),
(38, 'bWVtYmVycmVnaXN0cmF0aW9uLnBocA==', 'TWVtYmVyIFJlZ2lzdHJhdGlvbg==', 'cmVnaXN0cmF0aW9u', 'YWN0aXZl'),
(39, 'dmlld21lbWJlcnMucGhw', 'VmlldyBNZW1iZXJz', 'cmVnaXN0cmF0aW9u', 'YWN0aXZl'),
(40, 'bWVtYmVyY29udHJpYnV0aW9uZ3JvdXAucGhw', 'Q29udHJpYnV0aW9uIEdyb3Vwcw==', 'cmVnaXN0cmF0aW9u', 'YWN0aXZl'),
(41, 'cGVyc29uYWxpbmZvcm1hdGlvbi5waHA=', 'UGVyc29uYWwgSW5mb3JtYXRpb24=', 'cmVnaXN0cmF0aW9u', 'YWN0aXZl'),
(42, 'dmlld0Fjb3VudC5waHA=', 'VmlldyBBY2NvdW50cw==', 'cmVnaXN0cmF0aW9u', 'YWN0aXZl'),
(43, 'dmlld3VwbG9hZHMucGhw', 'VmlldyBVcGxvYWRz', 'cmVnaXN0cmF0aW9u', 'YWN0aXZl'),
(44, 'Z3JvdXBzLnBocA==', 'Q3JlYXRlIEdyb3Vwcw==', 'cmVnaXN0cmF0aW9u', 'YWN0aXZl'),
(45, 'eWVmZi5waHA=', 'VmlldyBOZXh0IG9mIEtpbg==', 'cmVnaXN0cmF0aW9u', 'YWN0aXZl'),
(46, 'YWNjb3VudHNldHRpbmdzLnBocA==', 'QWNjb3VudCBTZXR0aW5ncyA=', 'ZmluYW5jZQ==', 'YWN0aXZl'),
(47, 'YmFsYW5jZWJmLnBocA==', 'QmFsYW5jZSBiL2Y=', 'ZmluYW5jZQ==', 'YWN0aXZl'),
(48, 'Ym9va2Nhc2gucGhw', 'Q2FzaCBCb29r', 'ZmluYW5jZQ==', 'YWN0aXZl'),
(49, 'am91cm5hbHMucGhw', 'Sm91cm5hbHM=', 'ZmluYW5jZQ==', 'YWN0aXZl'),
(50, 'YWRkZWJ0b3JzLnBocA==', 'QWRkIERlYnRvcnM=', 'ZmluYW5jZQ==', 'YWN0aXZl'),
(51, 'YWRkY3JlZGl0b3JzLnBocA==', 'QWRkIENyZWRpdG9ycw==', 'ZmluYW5jZQ==', 'YWN0aXZl'),
(52, 'aXNzdWVpbnZvaWNlLnBocA==', 'SXNzdWUgSW52b2ljZQ==', 'ZmluYW5jZQ==', 'YWN0aXZl'),
(53, 'cmVjZWl2ZWludm9pY2UucGhw', 'UmVjZWl2ZSBJbnZvaWNl', 'ZmluYW5jZQ==', 'YWN0aXZl'),
(54, 'cHJvZml0YW5kbG9zcy5waHA=', 'UHJvZml0IGFuZCBMb3Nz', 'ZmluYW5jZQ==', 'YWN0aXZl'),
(55, 'bGVkZ2VyLnBocA==', 'R2VuZXJhbCBMZWRnZXI=', 'ZmluYW5jZQ==', 'YWN0aXZl'),
(56, 'dHJpYWxiYWxhbmNlLnBocA==', 'VHJpYWwgQmFsYW5jZQ==', 'ZmluYW5jZQ==', 'YWN0aXZl'),
(57, 'YmFsYW5jZXNoZWV0LnBocA==', 'QmFsYW5jZSBTaGVldA==', 'ZmluYW5jZQ==', 'YWN0aXZl'),
(58, 'ZGl2aWRzLnBocA==', 'QW5udWFsIERpdmlkZW5z', 'ZmluYW5jZQ==', 'YWN0aXZl'),
(59, 'YmFua3BvdC5waHA=', 'QmFua2luZyBUcmFuc2FjdGlvbnM=', 'ZmluYW5jZQ==', 'YWN0aXZl'),
(60, 'aW5kYmFua3BvdC5waHA=', 'SW5kaXZpZHVhbCBCYW5raW5nIFJlcG9ydA==', 'ZmluYW5jZQ==', 'YWN0aXZl'),
(61, 'YmFua25ldy5waHA=', 'QWRkIEJhbmsgQWNjb3VudA==', 'ZmluYW5jZQ==', 'YWN0aXZl'),
(62, 'YmFua2luZy5waHA=', 'QmFua2luZw==', 'ZmluYW5jZQ==', 'YWN0aXZl'),
(63, 'YmFua3BheS5waHA=', 'QmFuayBQYXltZW50cw==', 'ZmluYW5jZQ==', 'YWN0aXZl'),
(64, 'dmlld2JhbmtpbmcucGhw', 'QmFua2luZyBSZWNvbmNpbGlhdGlvbg==', 'ZmluYW5jZQ==', 'YWN0aXZl'),
(65, 'aW50ZXJiYW5rdHJhbnNmZXIucGhw', 'SW50ZXItQmFuayBUcmFuc2ZlcnM=', 'ZmluYW5jZQ==', 'YWN0aXZl'),
(66, 'dmlld2JhbmtpbmdyZXBvcnQucGhw', 'QmFua2luZyBPZmZpY2VyIFJlcG9ydA==', 'ZmluYW5jZQ==', 'YWN0aXZl'),
(67, 'YnVkZ2V0LnBocA==', 'QnVkZ2V0aW5n', 'ZmluYW5jZQ==', 'YWN0aXZl'),
(68, 'YmFucmVjb25jaWxlLnBocA==', 'VmlldyBCYW5rIFJlY29uY2lsaXRpb24=', 'ZmluYW5jZQ==', 'YWN0aXZl'),
(69, 'c2hhcmVzbWFuYWdlbWVudC5waHA=', 'U2hhcmVzIE1hbmFnZW1lbnRz', 'b3RoZXJz', 'YWN0aXZl'),
(70, 'dmlld2ZlZWRiYWNrLnBocA==', 'RmVlZGJhY2s=', 'b3RoZXJz', 'YWN0aXZl'),
(71, 'd2l0aGRyYXdhbC5waHA=', 'V2l0aGRyYXdhbHM=', 'b3RoZXJz', 'YWN0aXZl'),
(72, 'Y29tbXVuaWNhdGlvbi5waHA=', 'UmVzcG9uc2Vz', 'b3RoZXJz', 'YWN0aXZl'),
(73, 'dmlld2JhbGFuY2ViZi5waHA=', 'VmlldyBCYWxhbmNlcyBiL2Y=', 'b3RoZXJz', 'YWN0aXZl'),
(74, 'd2l0aGRyYXdhbHN2aWV3LnBocA==', 'VmlldyBXaXRoZHJhd2Fscw==', 'b3RoZXJz', 'YWN0aXZl'),
(75, 'cGF5bW9kZS5waHA=', 'UGF5bWVudCBNb2Rl', 'b3RoZXJz', 'YWN0aXZl'),
(76, 'Y2hlY2tvZmYucGhw', 'Q2hlY2sgT2Zm', 'b3RoZXJz', 'YWN0aXZl'),
(77, 'Y2hlY2tfb2ZmLnBocA==', 'Q2hlY2sgT2ZmIFJlcG9ydA==', 'b3RoZXJz', 'YWN0aXZl'),
(78, 'bG9hbmNoZWNrb2ZmLnBocA==', 'RmluaXNoIENoZWNrIE9mZg==', 'b3RoZXJz', 'YWN0aXZl'),
(79, 'dXBsb2FkQ2hlY2tPZmYucGhw', 'VXBsb2FkIENoZWNrIE9mZg==', 'b3RoZXJz', 'YWN0aXZl'),
(80, 'ZWRpdGNoZWNrb2ZmLnBocA==', 'RWRpdCBDaGVjayBPZmY=', 'b3RoZXJz', 'YWN0aXZl'),
(81, 'bG9hbnJlcC5waHA=', 'U3VtbWFyeSBSZXBvcnQ=', 'cmVwb3J0cw==', 'YWN0aXZl'),
(82, 'bGVmZi5waHA=', 'TG9hbiBCYWxhbmNlcw==', 'cmVwb3J0cw==', 'YWN0aXZl'),
(83, 'ZGVmZi5waHA=', 'RGVwb3NpdCBCYWxhbmNlcw==', 'cmVwb3J0cw==', 'YWN0aXZl'),
(84, 'YXZhaWwucGhw', 'TWVtYmVyIEJhbGFuY2Vz', 'cmVwb3J0cw==', 'YWN0aXZl'),
(85, 'ZGF5cG90LnBocA==', 'TG9hbiBUcmFuc2FuY3Rpb25z', 'cmVwb3J0cw==', 'YWN0aXZl'),
(86, 'ZGFpbHlyZXBvcnQucGhw', 'RGFpbHkgVHJhbnNhY3Rpb25z', 'cmVwb3J0cw==', 'YWN0aXZl'),
(87, 'bG9hbmRlZmF1bHRlcnMucGhw', 'TG9hbiBEZWZhdWx0ZXJz', 'cmVwb3J0cw==', 'YWN0aXZl'),
(88, 'YmxlZmYucGhw', 'QXZhaWxhYmxlIEJhbGFuY2Vz', 'cmVwb3J0cw==', 'YWN0aXZl'),
(89, 'c3RhdHNkYWlseS5waHA=', 'SW5jb21lIFRyYW5zYWN0aW9ucw==', 'cmVwb3J0cw==', 'YWN0aXZl'),
(90, 'ZXhwcG9ydC5waHA=', 'RXhwZW5zZXMgVHJhbnNhY3Rpb25z', 'cmVwb3J0cw==', 'YWN0aXZl'),
(91, 'd2l0aHJlcG9ydC5waHA=', 'V2l0aGRyYXdhbCBUcmFuc2FjdGlvbnM=', 'cmVwb3J0cw==', 'YWN0aXZl'),
(92, 'aXNzdWVkbG9hbi5waHA=', 'SXNzdWVkIExvYW5z', 'cmVwb3J0cw==', 'YWN0aXZl'),
(93, 'ZGFpbHBvcnQucGhw', 'Q29udHJpYnV0aW9uIFRyYW5zYWN0aW9ucw==', 'cmVwb3J0cw==', 'YWN0aXZl'),
(94, 'cHN2ZWZmLnBocA==', 'Q29tcHVsc29yeSBTaGFyZSBCYWxhbmNlcw==', 'cmVwb3J0cw==', 'YWN0aXZl'),
(95, 'Y29ncm91cC5waHA=', 'RHluYW1pYyBTdGF0ZW1lbnRz', 'cmVwb3J0cw==', 'YWN0aXZl'),
(96, 'aXNzdWVwb3J0LnBocA==', 'RGVidG9ycyBSZXBvcnQ=', 'cmVwb3J0cw==', 'YWN0aXZl'),
(97, 'cmVjZWl2ZXBvcnQucGhw', 'Q3JlZGl0b3JzIFJlcG9ydA==', 'cmVwb3J0cw==', 'YWN0aXZl'),
(98, 'ZGl2cmVwb3J0LnBocA==', 'RGl2aWRlbmRzIFJlcG9ydHM=', 'cmVwb3J0cw==', 'YWN0aXZl'),
(99, 'YmVuZXYucGhw', 'QmVuZXZvbGVudCBUcmFuc2FjdGlvbnM=', 'cmVwb3J0cw==', 'YWN0aXZl'),
(100, 'ZHluYWNvbnRyLnBocA==', 'RHluYW1pYyBDb250cmlidXRpb25z', 'cmVwb3J0cw==', 'YWN0aXZl'),
(101, 'ZHluYWluY28ucGhw', 'RHluYW1pYyBJbmNvbWU=', 'cmVwb3J0cw==', 'YWN0aXZl'),
(102, 'ZHluYWV4cC5waHA=', 'RHluYW1pYyBFeHBlbnNlcw==', 'cmVwb3J0cw==', 'YWN0aXZl'),
(103, 'YnVkZ2V0cmVwb3J0LnBocA==', 'QnVkZ2V0IFJlcG9ydA==', 'cmVwb3J0cw==', 'YWN0aXZl'),
(104, 'dmlld2J1ZGdldC5waHA=', 'VmlldyBCdWRnZXQ=', 'cmVwb3J0cw==', 'YWN0aXZl'),
(105, 'dmVoaWNsZXJlZ2lzdHJhdGlvbi5waHA=', 'UmVnaXN0ZXIgVmVoaWNsZSA=', 'dmVoaWNsZQ==', 'aW5hY3RpdmU='),
(106, 'Y3Jldy5waHA=', 'UmVnaXN0ZXIgQ3JldyA=', 'dmVoaWNsZQ==', 'aW5hY3RpdmU='),
(107, 'dmVoaWNsZWluc3BlY3Rpb24ucGhw', 'VmVoaWNsZSBJbnNwZWN0aW9uIA==', 'dmVoaWNsZQ==', 'aW5hY3RpdmU='),
(108, 'cGVyc29uYWx2ZWhpY2xlLnBocA==', 'U2VhcmNoIFZlaGljbGUg', 'dmVoaWNsZQ==', 'aW5hY3RpdmU='),
(109, 'cGVyc29udmVocmVnLnBocA==', 'U2VhcmNoIFZlaGljbGUgYnkgUmVnIE51bWJlciA=', 'dmVoaWNsZQ==', 'aW5hY3RpdmU='),
(110, 'dmlld3ZlaGljbGVzLnBocA==', 'VmlldyBBbGwgVmVoaWNsZXMg', 'dmVoaWNsZQ==', 'aW5hY3RpdmU='),
(111, 'dmlld2luc3BlY3Rpb24ucGhw', 'VmlldyBBbGwgSW5zcGVjdGlvbiBSZXBvcnRzIA==', 'dmVoaWNsZQ==', 'aW5hY3RpdmU='),
(112, 'dmlld2NyZXcucGhw', 'VmlldyBDcmV3IA==', 'dmVoaWNsZQ==', 'aW5hY3RpdmU='),
(113, 'Y3JlYXRlSW52b2ljZUFjYy5waHA=', 'Q3JlYXRlIEludm9pY2UgQWNjb3VudCA=', 'dmVoaWNsZSBhY2NvdW50', 'aW5hY3RpdmU='),
(114, 'aW52b2ljZVZlaGljbGUucGhw', 'SW52b2ljZSBWZWhpY2xlIA==', 'dmVoaWNsZSBhY2NvdW50', 'aW5hY3RpdmU='),
(115, 'aW52b2ljZVZoUGF5bWVudC5waHA=', 'SW52b2ljZSBWZWhpY2xlIFBheW1lbnQg', 'dmVoaWNsZSBhY2NvdW50', 'aW5hY3RpdmU='),
(116, 'aW52b2ljZVZoUGF5bWVudEVkaXQucGhw', 'RWRpdCBJbnZvaWNlIFZlaGljbGUgUGF5bWVudCA=', 'dmVoaWNsZSBhY2NvdW50', 'aW5hY3RpdmU='),
(117, 'aW52b2ljZVZlaGljbGVTdGF0ZW1lbnQucGhw', 'SW52b2ljZSBWZWhpY2xlIFN0YXRlbWVudCA=', 'dmVoaWNsZSBhY2NvdW50', 'aW5hY3RpdmU='),
(118, 'aW52b2ljZWRWZWhpY2xlUmVwb3J0LnBocA==', 'SW52b2ljZWQgVmVoaWNsZSBSZXBvcnQg', 'dmVoaWNsZSBhY2NvdW50', 'aW5hY3RpdmU='),
(119, 'c2hlcG9ydC5waHA=', 'U2hhcmVzIENhcGl0YWwg', 'cmVwb3J0', 'YWN0aXZl'),
(120, 'YWRkT3JnLnBocA==', 'YWRkIE9yZ2FuaXNhdGlvbg==', 'cmVnaXN0cmF0aW9u', 'YWN0aXZl'),
(121, 'eWVmZjIucGhw', 'VmlldyBNZW1iZXIgTmV4dCBvZiBLaW4=', 'cmVnaXN0cmF0aW9u', 'YWN0aXZl'),
(122, 'Y3JlYXRlX2FkZHJlc3NfYm9vay5waHA=', 'Y3JlYXRlIEFkZHJlc3MgQm9vaw==', 'bWVzc2FnZXI=', 'YWN0aXZl'),
(123, 'c2VuZE1lc3NhZ2VCb29rLnBocA==', 'U2VuZCBNZXNzYWdlIEZyb20gQWRkcmVzcyBCb29r', 'bWVzc2FnZXI=', 'YWN0aXZl'),
(124, 'bWFuYWdlX2FkZHJlc3NfYm9va3MucGhw', 'bWFuYWdlIEFkZHJlc3MgQm9vaw==', 'bWVzc2FnZXI=', 'YWN0aXZl'),
(125, 'ZnJvbV9kZWZhdWx0ZXJzLnBocA==', 'Y3JlYXRlIEFkZHJlc3MgQm9vayBGcm9tIERlZmF1bHRlcnM=', 'bWVzc2FnZXI=', 'YWN0aXZl'),
(126, 'ZW1haWxfc3RhdGVtZW50cy5waHA=', 'RW1haWwgU3RhdGVtZW50cw==', 'c3RhdGVtZW50cw==', 'YWN0aXZl'),
(127, 'bG9hbnJlcHMucGhw', 'RHluYW1pYyBTdW1tYXJ5IFJlcG9ydA==', 'bG9hbnM=', 'YWN0aXZl'),
(128, 'bG9hbnVuZGVycGF5bWVudC5waHA=', 'QWdpbmcgUmVwb3J0', 'bG9hbnM=', 'YWN0aXZl'),
(129, 'c3RhdC5waHA=', 'RW1haWwgU3RhdGVtZW50cw==', 'c3RhdGVtZW50cw==', 'YWN0aXZl'),
(130, 'bG9hblN0YXRlbWVudC5waHA=', 'TG9hbiBTdGF0ZW1lbnQ=', 'bG9hbnM=', 'YWN0aXZl'),
(131, 'aW50ZXJmcmVlemUucGhw', 'TG9hbiBJbnRlcmVzdCBXYWl2ZXIvRnJlZXpl', 'bG9hbnM=', 'aW5hY3RpdmU='),
(132, 'bG9hbnJlcG8ucGhw', 'bG9hbiByZXBheW1lbnQ=', 'bG9hbnM=', 'aW5hY3RpdmU='),
(133, 'Y2xlYXJsb2FucmVwby5waHA=', 'Y2xlYXIgTG9hbiBSZXBheW1lbnQ=', 'bG9hbnM=', 'aW5hY3RpdmU='),
(134, 'bG9hbndyaXRlb2ZmLnBocA==', 'bG9hbiB3cml0ZSBvZmY=', 'bG9hbnM=', 'aW5hY3RpdmU='),
(135, 'dmlld3dyaXRlb2ZmLnBocA==', 'VmlldyBBbGwgTG9hbiBXcml0ZSBPZmY=', 'bG9hbnM=', 'aW5hY3RpdmU='),
(136, 'dmlld2ludGVyZXN0d2FpdmUucGhw', 'aW50ZXJlc3Qgd2FpdmVy', 'bG9hbnM=', 'aW5hY3RpdmU='),
(137, 'dmlld2ludGVyZXN0ZnJlZXplLnBocA==', 'aW50ZXJlc3QgZnJlZXpl', 'bG9hbnM=', 'aW5hY3RpdmU='),
(138, 'ZG15cmVwb3J0cw==', 'UmVwb3J0IGdlbmVyYXRvcg==', 'cmVwb3J0cw==', 'YWN0aXZl'),
(139, 'YmFua19kZXRhaWxzLnBocA==', 'QWRkIGJhbmtz', 'cmVnaXN0cmF0aW9u', 'YWN0aXZl'),
(140, 'YWRkX21lbWJlcl9jYXRlZ29yeS5waHA=', 'QWRkIE1lbWJlciBDYXRlZ29yeQ==', 'cmVnaXN0cmF0aW9u', 'YWN0aXZl'),
(141, 'bWVtYmVyX3RpdGxlLnBocA==', 'QWRkIE1lbWJlciBUaXRsZQ==', 'cmVnaXN0cmF0aW9u', 'YWN0aXZl'),
(142, 'cmVnaXN0cmF0aW9uZmVlX3JlcG9ydC5waHA=', 'UmVnaXN0cmF0aW9uIEZlZSBSZXBvcnQ=', 'cmVwb3J0cw==', 'YWN0aXZl'),
(143, 'cmVnaXN0ZXJBZ2VudHMucGhw', 'cmVnaXN0ZXIgQWdlbnRz', 'cmVnaXN0cmF0aW9u', 'YWN0aXZl'),
(144, 'dGVybV9kZXBvc2l0X2ludGVyZXN0LnBocA==', 'QWNjcnVlZCAyMCUgSW50ZXJlc3Q=', 'cmVwb3J0cw==', 'YWN0aXZl'),
(145, 'Zml4ZWRfZGVwb3NpdF9yZXBvcnQucGhw', 'Rml4ZWQgRGVwb3NpdCBSZXBvcnQ=', 'cmVwb3J0cw==', 'YWN0aXZl');

-- --------------------------------------------------------

--
-- Table structure for table `paymentin`
--

CREATE TABLE IF NOT EXISTS `paymentin` (
  `transname` varchar(255) NOT NULL,
  `transid` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `paymentype` varchar(255) NOT NULL,
  `approvedby` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `paidby` varchar(255) NOT NULL,
  `payeeid` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `bnkid` varchar(255) NOT NULL,
`primarykey` int(255) NOT NULL,
  `session` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentin`
--

INSERT INTO `paymentin` (`transname`, `transid`, `amount`, `paymentype`, `approvedby`, `status`, `paidby`, `payeeid`, `comments`, `date`, `bnkid`, `primarykey`, `session`) VALUES
('MTIw', 'MTMwODE1MDEwNTMxMTM=', 'MTQ=', 'bG9hbiBmZWVz', 'c2FjY28gb2ZmaWNpYWxz', 'bnVsbA==', 'QW5uZSAgICAgIEtpcmltaQ==', 'MDAwNzc=', 'b2s=', 'MTQzOTQxMzIwMA==', 'MQ==', 1, ''),
('MTI1', 'MTMwODE1MDEwNTMxMTM=', 'NjAw', 'MQ==', 'c2FjY28gb2ZmaWNpYWxz', 'YWN0aXZl', 'QW5uZSAgICAgIEtpcmltaQ==', 'MDAwNzc=', '', 'MTMtQXVnLTIwMTU=', 'MQ==', 2, 't96dn8ofg2outr7ig4ev57fa56'),
('MTIw', 'MTMwODE1MDEwOTU3MTM=', 'MTEx', 'bG9hbiBmZWVz', 'c2FjY28gb2ZmaWNpYWxz', 'bnVsbA==', 'QW5uZSAgICAgIEtpcmltaQ==', 'MDAwNzc=', 'b2s=', 'MTQzOTQxMzIwMA==', 'MQ==', 4, ''),
('OTY=', 'ZXNhY2M1', 'NTAw', 'Mg==', 'Y2hhaXJtYW4=', 'TlVMTA==', 'QW5uZSAgS2lyaW1p', 'MDAwNzc=', 'b2s=', 'MTMtQXVnLTIwMTU=', 'MQ==', 5, 'luf74q110gf9jgine11phut3v0'),
('MTI1', 'MTMwODE1MDEwOTU3MTM=', 'Mzg5', 'Mw==', 'c2FjY28gb2ZmaWNpYWxz', 'YWN0aXZl', 'QW5uZSAgICAgIEtpcmltaQ==', 'MDAwNzc=', '', 'MTMtQXVnLTIwMTU=', 'MQ==', 7, 'nmus052as174972qvkq7l1db66'),
('MTI1', 'MTMwODE1MDE1NTExMTM=', 'MTUwMA==', 'NQ==', 'c2FjY28gb2ZmaWNpYWxz', 'YWN0aXZl', 'QW5uZSAgICAgIEtpcmltaQ==', 'MDAwNzc=', '', 'MTMtQXVnLTIwMTU=', 'MQ==', 15, 'ogfr1a9p1541424rmp32kgsoo0'),
('MTIy', 'MTMwODE1MDIwNjMxMTQ=', 'MTAwMDA=', 'bG9hbiBmZWVz', 'c2FjY28gb2ZmaWNpYWxz', 'bnVsbA==', 'Q29zbWFzICAgICAgS29yaXI=', 'MDAwNzQ=', 'b2s=', 'MTQzOTQxMzIwMA==', 'MQ==', 18, ''),
('MTIy', 'MTMwODE1MDIwNjMxMTQ=', 'MTA1Nw==', 'bG9hbiBmZWVz', 'c2FjY28gb2ZmaWNpYWxz', 'bnVsbA==', 'Q29zbWFzICAgICAgS29yaXI=', 'MDAwNzQ=', 'b2s=', 'MTQzOTQxMzIwMA==', 'MQ==', 19, ''),
('MTIy', 'MTMwODE1MDIxODMxMTQ=', 'MjUwMA==', 'bG9hbiBmZWVz', 'c2FjY28gb2ZmaWNpYWxz', 'bnVsbA==', 'QW5uZSAgICAgIEtpcmltaQ==', 'MDAwNzc=', 'b2s=', '', 'MQ==', 20, ''),
('MTIy', 'MTMwODE1MDIxODMxMTQ=', 'MjY0', 'bG9hbiBmZWVz', 'c2FjY28gb2ZmaWNpYWxz', 'bnVsbA==', 'QW5uZSAgICAgIEtpcmltaQ==', 'MDAwNzc=', 'b2s=', '', 'MQ==', 21, ''),
('MzIy', '', 'MTMw', 'NQ==', 'c2FjY28gb2ZmaWNpYWxz', 'YWN0aXZl', 'RGFuICAgICAgS2FtYXU=', 'MDAwNzM=', '', 'MTgtQXVnLTIwMTU=', 'NA==', 22, 'gni8jgqcvqrfghuunv8mjjcll5'),
('MzIx', '', 'MzA=', '', 'c2FjY28gb2ZmaWNpYWxz', 'YWN0aXZl', 'RGFuICAgICAgS2FtYXU=', 'MDAwNzM=', '', 'MTgtQXVnLTIwMTU=', '', 23, ''),
('OTg=', '', 'NTA=', '', 'c2FjY28gb2ZmaWNpYWxz', 'YWN0aXZl', 'RGFuICAgICAgS2FtYXU=', 'MDAwNzM=', '', 'MTgtQXVnLTIwMTU=', '', 24, ''),
('NzE=', '', 'MTUw', 'MQ==', 'c2FjY28gb2ZmaWNpYWxz', 'YWN0aXZl', 'QW5uZSAgICAgIEtpcmltaQ==', 'MDAwNzc=', '', 'MTAtQXVnLTIwMTU=', 'MQ==', 25, 'egvp0akunlkqsnkrmvnc93o203'),
('NzE=', '', 'MTUw', 'Mg==', 'c2FjY28gb2ZmaWNpYWxz', 'YWN0aXZl', 'Q25nICAgICAgVGhlZGVqYXk=', 'MDAwNzY=', '', 'MDgtQXVnLTIwMTU=', 'Mg==', 26, 'je2i5jk7jenjc1is8197ioq754');

-- --------------------------------------------------------

--
-- Table structure for table `paymentmode`
--

CREATE TABLE IF NOT EXISTS `paymentmode` (
  `id` int(255) NOT NULL,
  `mode` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentmode`
--

INSERT INTO `paymentmode` (`id`, `mode`, `status`) VALUES
(1, 'Q2hlcXVl', 'QWN0aXZl'),
(2, 'TXBlc2E=', 'QWN0aXZl'),
(3, 'RGlyZWN0IGRlcG9zaXQ=', 'QWN0aXZl'),
(4, 'RnVuZHMgdHJhbnNmZXI=', 'QWN0aXZl'),
(5, 'Q2FzaA==', 'QWN0aXZl'),
(6, 'QmFuayB0cmFuc2Zlcg==', 'QWN0aXZl');

-- --------------------------------------------------------

--
-- Table structure for table `paymentout`
--

CREATE TABLE IF NOT EXISTS `paymentout` (
  `transname` varchar(255) NOT NULL,
  `transid` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `paymentype` varchar(255) NOT NULL,
  `chequeno` varchar(255) NOT NULL,
  `approvedby` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `receiverid` varchar(255) NOT NULL,
  `reasons` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `bnkid` varchar(255) NOT NULL,
`primarykey` int(255) NOT NULL,
  `session` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentout`
--

INSERT INTO `paymentout` (`transname`, `transid`, `amount`, `paymentype`, `chequeno`, `approvedby`, `status`, `receiver`, `receiverid`, `reasons`, `comments`, `date`, `bnkid`, `primarykey`, `session`) VALUES
('MjI2', 'ZXNhY2Mx', 'MTUwMA==', 'MQ==', 'VDAwMQ==', 'Y2hhaXJtYW4=', 'dHJhdmVscw==', 'QXJ0aHVyIEtpcmltaQ==', '', 'dHJhdmVscw==', 'b2s=', 'MTMtQXVnLTIwMTU=', 'NQ==', 1, 'tuqo2msidaipihlqch5105gie1');

-- --------------------------------------------------------

--
-- Table structure for table `periodictyrecord`
--

CREATE TABLE IF NOT EXISTS `periodictyrecord` (
`id` int(11) NOT NULL,
  `periodname` varchar(255) NOT NULL,
  `numberdays` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periodictyrecord`
--

INSERT INTO `periodictyrecord` (`id`, `periodname`, `numberdays`) VALUES
(1, 'ZGFpbHk=', 'MzYw'),
(2, 'd2Vla2x5', 'NDg='),
(3, 'bW9udGhseQ==', 'MTI=');

-- --------------------------------------------------------

--
-- Table structure for table `pesapi_account`
--

CREATE TABLE IF NOT EXISTS `pesapi_account` (
`id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `push_in` tinyint(1) NOT NULL,
  `push_out` tinyint(1) NOT NULL,
  `push_neutral` tinyint(1) NOT NULL,
  `settings` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesapi_account`
--

INSERT INTO `pesapi_account` (`id`, `type`, `name`, `identifier`, `push_in`, `push_out`, `push_neutral`, `settings`) VALUES
(1, 2, 'sms', 'mpesa', 0, 0, 0, 'a:7:{s:11:"PUSH_IN_URL";s:0:"";s:14:"PUSH_IN_SECRET";s:0:"";s:12:"PUSH_OUT_URL";s:0:"";s:15:"PUSH_OUT_SECRET";s:0:"";s:16:"PUSH_NEUTRAL_URL";s:0:"";s:19:"PUSH_NEUTRAL_SECRET";s:0:"";s:11:"SYNC_SECRET";s:8:"jifmd7zz";}');

-- --------------------------------------------------------

--
-- Table structure for table `pesapi_payment`
--

CREATE TABLE IF NOT EXISTS `pesapi_payment` (
`id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `super_type` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `receipt` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  `phonenumber` varchar(45) NOT NULL,
  `name` varchar(255) NOT NULL,
  `account` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `post_balance` bigint(20) NOT NULL,
  `note` varchar(255) NOT NULL,
  `transaction_cost` bigint(20) NOT NULL,
  `valid` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesapi_payment`
--

INSERT INTO `pesapi_payment` (`id`, `account_id`, `super_type`, `type`, `receipt`, `time`, `phonenumber`, `name`, `account`, `status`, `amount`, `post_balance`, `note`, `transaction_cost`, `valid`) VALUES
(1, 1, 1, 21, 'JF97J2SSUP', '2015-06-09 16:03:00', '0704719808', 'WILLIAM MWAI', '', 0, 730, 735, 'JF97J2SSUP Confirmed.You have received Ksh730.00 from WILLIAM MWAI 0704719808  on 9/6/15 at 4:03 PM New M-PESA balance is Ksh735.00.', 0, ''),
(2, 1, 1, 21, 'JF97J2SSUP', '2015-06-09 16:03:00', '0704719808', 'WILLIAM MWAI', '', 0, 730, 735, 'JF97J2SSUP Confirmed.You have received Ksh730.00 from WILLIAM MWAI 0704719808  on 9/6/15 at 4:03 PM New M-PESA balance is Ksh735.00.', 0, ''),
(3, 1, 1, 21, 'JF97J2SSUP', '2015-06-09 16:03:00', '0704719808', 'WILLIAM MWAI', '', 0, 730, 735, 'JF97J2SSUP Confirmed.You have received Ksh730.00 from WILLIAM MWAI 0704719808  on 9/6/15 at 4:03 PM New M-PESA balance is Ksh735.00.', 0, ''),
(4, 1, 1, 21, 'JF97J2SSUP', '2015-06-09 16:03:00', '0704719808', 'WILLIAM MWAI', '', 0, 730, 735, 'JF97J2SSUP Confirmed.You have received Ksh730.00 from WILLIAM MWAI 0704719808  on 9/6/15 at 4:03 PM New M-PESA balance is Ksh735.00.', 0, ''),
(5, 1, 1, 21, 'JF97J2SSUP', '2015-06-09 16:03:00', '0704719808', 'WILLIAM MWAI', '', 0, 730, 735, 'JF97J2SSUP Confirmed.You have received Ksh730.00 from WILLIAM MWAI 0704719808  on 9/6/15 at 4:03 PM New M-PESA balance is Ksh735.00.', 0, ''),
(6, 1, 1, 21, 'JF97J2SSUP', '2015-06-09 16:03:00', '0704719808', 'WILLIAM MWAI', '', 0, 730, 735, 'JF97J2SSUP Confirmed.You have received Ksh730.00 from WILLIAM MWAI 0704719808  on 9/6/15 at 4:03 PM New M-PESA balance is Ksh735.00.', 0, ''),
(7, 1, 1, 21, 'JF97J2SSUP', '2015-06-09 16:03:00', '0704719808', 'WILLIAM MWAI', '', 0, 730, 735, 'JF97J2SSUP Confirmed.You have received Ksh730.00 from WILLIAM MWAI 0704719808  on 9/6/15 at 4:03 PM New M-PESA balance is Ksh735.00.', 0, ''),
(8, 1, 1, 21, 'JF97J2SSUP', '2015-06-09 16:03:00', '0704719808', 'WILLIAM MWAI', '', 0, 730, 735, 'JF97J2SSUP Confirmed.You have received Ksh730.00 from WILLIAM MWAI 0704719808  on 9/6/15 at 4:03 PM New M-PESA balance is Ksh735.00.', 0, ''),
(9, 1, 1, 21, 'JF97J2SSUP', '2015-06-09 16:03:00', '0704719808', 'WILLIAM MWAI', '', 0, 730, 735, 'JF97J2SSUP Confirmed.You have received Ksh730.00 from WILLIAM MWAI 0704719808  on 9/6/15 at 4:03 PM New M-PESA balance is Ksh735.00.', 0, ''),
(10, 1, 1, 21, 'JF97J2SSUP', '2015-06-09 16:03:00', '0704719808', 'WILLIAM MWAI', '', 0, 730, 735, 'JF97J2SSUP Confirmed.You have received Ksh730.00 from WILLIAM MWAI 0704719808  on 9/6/15 at 4:03 PM New M-PESA balance is Ksh735.00.', 0, ''),
(11, 1, 1, 21, 'JF97J2SSUP', '2015-06-09 16:03:00', '0704719808', 'WILLIAM MWAI', '', 0, 730, 735, 'JF97J2SSUP Confirmed.You have received Ksh730.00 from WILLIAM MWAI 0704719808  on 9/6/15 at 4:03 PM New M-PESA balance is Ksh735.00.', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `psvbalances`
--

CREATE TABLE IF NOT EXISTS `psvbalances` (
`id` int(255) NOT NULL,
  `membernumber` varchar(255) NOT NULL,
  `psvbalance` varchar(255) NOT NULL,
  `realdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `psvtotals`
--

CREATE TABLE IF NOT EXISTS `psvtotals` (
`primarykey` int(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `atime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `receiveinvoice`
--

CREATE TABLE IF NOT EXISTS `receiveinvoice` (
`id` int(255) NOT NULL,
  `creditorid` varchar(255) NOT NULL,
  `invdate` varchar(255) NOT NULL,
  `glacc` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `invno` varchar(255) NOT NULL,
  `duedate` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `audituser` varchar(255) NOT NULL,
  `auditdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `receivepayments`
--

CREATE TABLE IF NOT EXISTS `receivepayments` (
  `audituser` varchar(200) NOT NULL,
  `bankacc` varchar(200) NOT NULL,
  `invoice` varchar(200) NOT NULL,
  `debtor` varchar(200) NOT NULL,
  `glcode` varchar(200) NOT NULL,
  `glacc` varchar(200) NOT NULL,
  `chqno` varchar(200) NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `date` varchar(255) NOT NULL,
  `ptype` varchar(200) NOT NULL,
  `transid` varchar(200) NOT NULL,
`id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registeragents`
--

CREATE TABLE IF NOT EXISTS `registeragents` (
`id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `idno` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registeragents`
--

INSERT INTO `registeragents` (`id`, `fname`, `mname`, `lname`, `idno`, `email`, `contact`) VALUES
(1, 'bWNrYW1hYQ==', 'ZGF2aXM=', 'ag==', 'MjM0NTY3ODkw', 'bWNrYW1hYUBnbWFpbC5jb20=', 'MjM0NTY3'),
(2, 'ZGthbWF1', 'ZGF2aXM=', 'a2FtYXU=', 'MjM0NTY3ODk=', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `saccodetails`
--

CREATE TABLE IF NOT EXISTS `saccodetails` (
  `logo` varchar(255) NOT NULL,
  `compname` varchar(255) NOT NULL,
  `postaladdress` varchar(255) NOT NULL,
  `phyaddress` varchar(255) NOT NULL,
  `branchnumber` varchar(255) NOT NULL,
  `telnumber` varchar(255) NOT NULL,
  `emailaddress` varchar(255) NOT NULL,
  `mobileno` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saccodetails`
--

INSERT INTO `saccodetails` (`logo`, `compname`, `postaladdress`, `phyaddress`, `branchnumber`, `telnumber`, `emailaddress`, `mobileno`, `website`, `slogan`, `id`) VALUES
('MDc0MTM2N3Rva3lvIGUgc2FjY28uanBn', 'RVNBQ0NP', 'NDkyMC0wMDUwNg==', 'V2VzdGxhbmRzIE5haXJvYmk=', 'MDAx', 'MDcwODQwMTU1NQ==', 'aW5mby5zYXNhY3JlZGl0QGdtYWlsLmNvbQ==', 'MDcwODQwMTU1NQ==', 'd3d3LnNhc2FjcmVkaXQuY29t', 'VHJhbnNmb3JtaW5nIExpdmVz', 1);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
`id` int(20) NOT NULL,
  `user` varchar(20) NOT NULL,
  `original_ip` varchar(80) NOT NULL,
  `server_ip` varchar(80) NOT NULL,
  `computer` varchar(80) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `browser_version` varchar(80) NOT NULL,
  `user_agent` text NOT NULL,
  `os` varchar(80) NOT NULL,
  `start_timestamp` varchar(80) NOT NULL,
  `end_timestamp` varchar(80) NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `valid` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `user`, `original_ip`, `server_ip`, `computer`, `browser`, `browser_version`, `user_agent`, `os`, `start_timestamp`, `end_timestamp`, `session_id`, `valid`) VALUES
(1, '17', '192.168.0.149', '127.0.0.1', 'greatwhite', 'Mozilla Firefox', '39.0', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0', 'windows', '1439470518', '', '$1$4r0.54..$POuy9oZAcaD/7hvcMxPLI/', '0'),
(2, '12', '192.168.0.149', '127.0.0.1', 'greatwhite', 'Mozilla Firefox', '39.0', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0', 'windows', '1439470613', '1439545289', '$1$lC0.K03.$110JqXnbyBi7EpsmqPwl2.', '0'),
(3, '11', '192.168.0.149', '127.0.0.1', 'greatwhite', 'Mozilla Firefox', '39.0', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0', 'windows', '1439470665', '1439474344', '$1$vG2.Mr4.$4Z5jLCtjbMIFbDhlgxQOt0', '0'),
(4, '17', '192.168.0.149', '127.0.0.1', 'greatwhite', 'Mozilla Firefox', '39.0', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0', 'windows', '1439472372', '1439474624', '$1$mR2.1T3.$.3SPHYQ2MkReU5A.uO/040', '0'),
(5, '1', '192.168.0.149', '127.0.0.1', 'greatwhite', 'Google Chrome', '44.0.2403.130', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.130 Safari/537.36', 'windows', '1439472762', '', '$1$.V5.tB4.$DfZSnIyeF06v/pujfOW6R.', '0'),
(6, '11', '192.168.0.149', '127.0.0.1', 'greatwhite', 'Mozilla Firefox', '39.0', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0', 'windows', '1439474519', '1439476360', '$1$No2.S50.$ORhY3RxdOrkD7WvtDKH0J1', '0'),
(7, '17', '192.168.0.149', '127.0.0.1', 'greatwhite', 'Mozilla Firefox', '39.0', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0', 'windows', '1439474761', '', '$1$lI2.KE/.$VevD6RAzDyYmPd/Fyis2j0', '1'),
(8, '11', '192.168.0.149', '127.0.0.1', 'greatwhite', 'Mozilla Firefox', '39.0', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0', 'windows', '1439476734', '', '$1$MA1.l32.$cLtj76LkIqrABi8nD7P6e1', '1'),
(9, '12', '192.168.0.149', '127.0.0.1', 'greatwhite', 'Mozilla Firefox', '39.0', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0', 'windows', '1439545556', '', '$1$BV0.0w2.$H2vMd5YMM1oMihbk7eKmY0', '0'),
(10, '12', '192.168.0.149', '127.0.0.1', 'greatwhite', 'Mozilla Firefox', '39.0', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0', 'windows', '1439633168', '', '$1$KB0.Lz4.$iIUvN/X8upZbIiaLeKBzI.', '0'),
(11, '12', '192.168.0.149', '127.0.0.1', 'greatwhite', 'Mozilla Firefox', '40.0', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', 'windows', '1439797178', '', '$1$P3..sr5.$.G.31CJ12cfXfTgsOmKnF/', '0'),
(12, '12', '192.168.0.149', '127.0.0.1', 'greatwhite', 'Mozilla Firefox', '40.0', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', 'windows', '1439798234', '1439799878', '$1$/43.a61.$RfZSRoxWb5GN6GRYSBl/m1', '0'),
(13, '12', '192.168.0.149', '127.0.0.1', 'greatwhite', 'Mozilla Firefox', '40.0', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', 'windows', '1439802458', '', '$1$eC5.Pi1.$NldHo4cpw2EwTeRnqN7nm/', '0'),
(14, '12', '192.168.0.149', '127.0.0.1', 'greatwhite', 'Mozilla Firefox', '40.0', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', 'windows', '1439880566', '1439881945', '$1$Jg4.es0.$3Y5Bp3QYXs9iXHgM81L5g1', '0'),
(15, '12', '192.168.0.149', '127.0.0.1', 'greatwhite', 'Mozilla Firefox', '40.0', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', 'windows', '1439881978', '', '$1$KE..L40.$mrhASveYErbj0w9DGp0QW.', '0'),
(16, '1', '192.168.0.149', '127.0.0.1', 'greatwhite', 'Google Chrome', '44.0.2403.155', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.155 Safari/537.36', 'windows', '1439883454', '', '$1$Gd/.X24.$1.h2fARbAOb0oMmglp6El/', '0'),
(17, '12', '192.168.0.149', '127.0.0.1', 'greatwhite', 'Google Chrome', '44.0.2403.155', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.155 Safari/537.36', 'windows', '1439888326', '1439890051', '$1$E/3.772.$L8KU2hOVipwSNw2TLifYr1', '0'),
(18, '12', '192.168.0.149', '127.0.0.1', 'greatwhite', 'Google Chrome', '44.0.2403.155', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.155 Safari/537.36', 'windows', '1439892646', '1439892955', '$1$iV4.Dg0.$ViAm.nEWq9MgugKELKl/u1', '0'),
(19, '12', '192.168.0.149', '127.0.0.1', 'greatwhite', 'Google Chrome', '44.0.2403.155', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.155 Safari/537.36', 'windows', '1439893071', '1439893386', '$1$931.cQ..$7OtKjiZP5bEjE1IYiAuH9/', '0'),
(20, '12', '192.168.0.149', '127.0.0.1', 'greatwhite', 'Mozilla Firefox', '40.0', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', 'windows', '1439893850', '', '$1$pK1.8F1.$iWYDUXfcJ60bqpu2Sitoq0', '0'),
(21, '12', '192.168.0.149', '127.0.0.1', 'greatwhite', 'Google Chrome', '44.0.2403.155', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.155 Safari/537.36', 'windows', '1439894701', '', '$1$7B2.CF/.$TcV4BUYNJVKYLeWzH9QPC0', '0'),
(22, '12', '192.168.0.149', '127.0.0.1', 'greatwhite', 'Google Chrome', '44.0.2403.155', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.155 Safari/537.36', 'windows', '1439902513', '', '$1$dA5.iO1.$9/5GBJynWUVKgYJtrDfxj0', '0'),
(23, '1', '192.168.0.149', '127.0.0.1', 'greatwhite', 'Mozilla Firefox', '40.0', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', 'windows', '1439903828', '1439903861', '$1$m.4.144.$8ZRlbXGyhDCudryJtHojX0', '0'),
(24, '1', '192.168.0.149', '127.0.0.1', 'greatwhite', 'Mozilla Firefox', '40.0', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', 'windows', '1439904169', '1439904572', '$1$L02.281.$UQeuv40Sh8jnfFV62u4eA1', '0'),
(25, '1', '192.168.0.149', '127.0.0.1', 'greatwhite', 'Mozilla Firefox', '40.0', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', 'windows', '1439904665', '1439905807', '$1$T9/.gg0.$.ynbBXBvNN2j6yzAElaxj1', '0'),
(26, '1', '192.168.0.149', '127.0.0.1', 'greatwhite', 'Mozilla Firefox', '40.0', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', 'windows', '1439905836', '', '$1$Vt3.4q4.$AmBkECsOwhJzlaY3vINs8.', '0'),
(27, '12', '192.168.0.149', '127.0.0.1', 'greatwhite', 'Google Chrome', '44.0.2403.155', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.155 Safari/537.36', 'windows', '1439906385', '', '$1$xr..mf1.$6dFwcwJd0qsIZuaI2PKrm.', '0'),
(28, '1', '192.168.0.149', '127.0.0.1', 'greatwhite', 'Mozilla Firefox', '40.0', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', 'windows', '1439907521', '', '$1$ir0.D82.$0v0hWcfwZeldgSqAk3Ge1/', '0'),
(29, '1', '192.168.0.149', '127.0.0.1', 'greatwhite', 'Mozilla Firefox', '40.0', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', 'windows', '1439908070', '', '$1$QY/.ZY4.$JychCLt8m1jReSIA8JJOl1', '1'),
(30, '12', '192.168.0.149', '127.0.0.1', 'greatwhite', 'Google Chrome', '44.0.2403.155', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.155 Safari/537.36', 'windows', '1439960437', '', '$1$iI2.DX0.$V7Xkx.8H5oQ2WPuIRnH/J.', '1');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(5) NOT NULL,
  `days` varchar(255) NOT NULL,
  `legalfees` varchar(255) NOT NULL,
  `aed` varchar(255) NOT NULL,
  `usd` varchar(255) NOT NULL,
  `defaultbank` varchar(255) NOT NULL,
  `financial_year` varchar(255) NOT NULL,
  `defaultcurrency` varchar(255) NOT NULL,
  `defaultsavingacc` varchar(255) NOT NULL,
  `accruedincome` varchar(100) NOT NULL,
  `minsavingbal` varchar(255) NOT NULL,
  `defaultshareacc` varchar(255) NOT NULL,
  `minsharebal` varchar(255) NOT NULL,
  `def_insurance_fee` varchar(100) NOT NULL,
  `def_legal_fee` varchar(100) NOT NULL,
  `def_processing_fee` varchar(100) NOT NULL,
  `maxloan` varchar(255) NOT NULL,
  `defaultreferral` varchar(255) NOT NULL,
  `auditdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `days`, `legalfees`, `aed`, `usd`, `defaultbank`, `financial_year`, `defaultcurrency`, `defaultsavingacc`, `accruedincome`, `minsavingbal`, `defaultshareacc`, `minsharebal`, `def_insurance_fee`, `def_legal_fee`, `def_processing_fee`, `maxloan`, `defaultreferral`, `auditdate`) VALUES
(1, 'MTAwMDAwMDAwMDAw', '', 'MjMuNQ==', 'ODY=', 'NQ==', 'MDEtSmFu', 'MQ==', 'Njk=', 'Nzk=', 'MA==', 'NzE=', 'MjAw', 'MTIz', 'MTQy', 'MTIy', 'Ng==', '', 'MjktT2N0LTIwMTQ=');

-- --------------------------------------------------------

--
-- Table structure for table `sharesbf`
--

CREATE TABLE IF NOT EXISTS `sharesbf` (
`id` int(255) NOT NULL,
  `sharesbf` varchar(255) NOT NULL,
  `loanbf` varchar(255) NOT NULL,
  `memberno` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `transid` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE IF NOT EXISTS `sms` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblreports`
--

INSERT INTO `tblreports` (`id`, `appliedConditions`, `txtReportName`, `lstSortName`, `lstSortOrder`, `txtRecPerPage`, `selectedFields`, `selectedTables`, `status`) VALUES
(1, '`paymentout`.`amount` > ''0'' ~', 'nnnan', '`paymentout`.`transid`', 'ASC', '20', '`paymentout`.`transname`~`paymentout`.`transid`~`paymentout`.`amount`~`paymentout`.`paymentype`~`paymentout`.`chequeno`~`paymentout`.`approvedby`~`paymentout`.`status`~`paymentout`.`receiver`~`paymentout`.`receiverid`~`paymentout`.`reasons`~`paymentout`.`comments`~`paymentout`.`date`~`paymentout`.`bnkid`~`paymentout`.`primarykey`~`paymentout`.`session`~', '`paymentout`~', 0),
(2, '`newmember`.`idnumber` > ''1'' ~', 'members report', '`newmember`.`firstname`', 'ASC', '20', '`newmember`.`firstname`~`newmember`.`middlename`~`newmember`.`lastname`~`newmember`.`dob`~`newmember`.`gender`~`newmember`.`pcode`~`newmember`.`mop`~`newmember`.`recruitedby`~`newmember`.`recruitee`~`newmember`.`bname`~`newmember`.`bloc`~`newmember`.`nameb`~`newmember`.`commfee`~`newmember`.`idnumber`~`newmember`.`membernumber`~`newmember`.`district`~`newmember`.`division`~`newmember`.`mobileno`~`newmember`.`pinnumber`~`newmember`.`residence`~`newmember`.`career`~`newmember`.`email`~`newmember`.`comments`~`newmember`.`status`~`newmember`.`regdate`~`newmember`.`station`~', '`newmember`~', 1),
(3, '`newmember`.`idnumber` > ''1'' ~', 'members report', '`newmember`.`firstname`', 'ASC', '20', '`newmember`.`firstname`~`newmember`.`middlename`~`newmember`.`lastname`~`newmember`.`dob`~`newmember`.`gender`~`newmember`.`pcode`~`newmember`.`mop`~`newmember`.`recruitedby`~`newmember`.`recruitee`~`newmember`.`bname`~`newmember`.`bloc`~`newmember`.`nameb`~`newmember`.`commfee`~`newmember`.`idnumber`~`newmember`.`membernumber`~`newmember`.`district`~`newmember`.`division`~`newmember`.`mobileno`~`newmember`.`pinnumber`~`newmember`.`residence`~`newmember`.`career`~`newmember`.`email`~`newmember`.`comments`~`newmember`.`status`~`newmember`.`regdate`~`newmember`.`station`~', '`newmember`~', 1),
(4, '`newmember`.`idnumber` > ''1'' ~', 'members report', '`newmember`.`firstname`', 'ASC', '20', '`newmember`.`firstname`~`newmember`.`middlename`~`newmember`.`lastname`~`newmember`.`dob`~`newmember`.`gender`~`newmember`.`pcode`~`newmember`.`mop`~`newmember`.`recruitedby`~`newmember`.`recruitee`~`newmember`.`bname`~`newmember`.`bloc`~`newmember`.`nameb`~`newmember`.`commfee`~`newmember`.`idnumber`~`newmember`.`membernumber`~`newmember`.`district`~`newmember`.`division`~`newmember`.`mobileno`~`newmember`.`pinnumber`~`newmember`.`residence`~`newmember`.`career`~`newmember`.`email`~`newmember`.`comments`~`newmember`.`status`~`newmember`.`regdate`~`newmember`.`station`~', '`newmember`~', 1),
(5, '`loans`.`status` LIKE ''%active%'' ~', 'loans report', '`loans`.`id`', 'ASC', '20', '`loans`.`id`~`loans`.`membernumber`~`loans`.`amount`~`loans`.`monthlypayment`~`loans`.`date`~`loans`.`status`~`loans`.`transid`~`loans`.`loantime`~', '`loans`~', 1),
(6, '`loans`.`amount` > ''0'' ~', 'loans', '`loans`.`id`', 'ASC', '20', '`loans`.`id`~`loans`.`membernumber`~`loans`.`amount`~`loans`.`monthlypayment`~`loans`.`date`~`loans`.`status`~`loans`.`transid`~`loans`.`loantime`~', '`loans`~', 0);

-- --------------------------------------------------------

--
-- Table structure for table `totals`
--

CREATE TABLE IF NOT EXISTS `totals` (
`primarykey` int(255) NOT NULL,
  `actual` varchar(255) NOT NULL,
  `available` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `atime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trasferpurpose`
--

CREATE TABLE IF NOT EXISTS `trasferpurpose` (
`id` int(255) NOT NULL,
  `purpose` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE IF NOT EXISTS `uploads` (
  `id` int(11) NOT NULL,
  `mno` varchar(200) NOT NULL,
  `signature` varchar(200) NOT NULL,
  `passport` varchar(200) NOT NULL,
  `file1` varchar(200) NOT NULL,
  `file2` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usergroups`
--

CREATE TABLE IF NOT EXISTS `usergroups` (
  `id` int(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usergroups`
--

INSERT INTO `usergroups` (`id`, `user`, `status`, `comments`, `date`) VALUES
(1, 'dGVsbGVy', 'QWN0aXZl', 'RGF0YSBFbnRyeQ==', 'MDEtQXByLTIwMTU='),
(2, 'YW5udWFs', 'MzU5', '', ''),
(3, 'bWFuYWdlcg==', 'QWN0aXZl', 'TWFuYWdlbWVudA==', 'MDEtQXByLTIwMTU=');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `idno` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `userlevel` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `mname`, `lname`, `idno`, `username`, `password`, `email`, `phone`, `picture`, `userlevel`, `status`, `date`, `comments`) VALUES
(1, 'd2lsbHk=', 'bXdhaQ==', 'ZA==', 'MjMyMzIzMjM=', 'd2lsbHk=', 'MTIzNA==', 'd2lsbHlAZ21haWwuY29t', 'MjEyMTIxMjEyMQ==', 'MDUzMTIxNQ==', 'MQ==', 'QWN0aXZl', 'MTctSnVuLTIwMTU=', 'b2s='),
(9, 'TUFSR0FSRVQ=', 'V0FOSklLVQ==', 'TVdBTkdJ', 'MjQ2MzQ2OTI=', 'TUFSR0FSRVQ=', 'U0FTQTIwMTU=', 'ZG55YWt1bmRpOTNAeWFob28uY29t', 'MDcyMjk2MjQ5Nw==', 'MDMxNjI4MTVlc2FjY28uanBn', 'Mw==', 'QWN0aXZl', 'MDctT2N0LTIwMTQ=', 'b2s='),
(10, 'QW50aG9ueQ==', '', 'S2FtYXU=', 'MjQ2MzQ2OTI=', 'YW50aG9ueQ==', 'YW50aG9ueTIxMzU=', 'YW50aG9ueUB5YWhvby5jb20=', 'KzI1NDcyMzA0MzIxNA==', 'MDYwMTM0Ng==', 'Mg==', 'QWN0aXZl', 'MjUtTWFyLTIwMTU=', 'b2s='),
(11, 'Q29zbWFz', 'Sw==', 'S29yaXI=', 'Mjg0NzYxNjc=', 'Q29zbWFz', 'Y29zbWFz', 'Y29zbWFzQHJ5YW5hZGEuY29t', 'KzI1NDcyMzY2ODE4NA==', 'MTEzMjQ5MTE=', 'MQ==', 'QWN0aXZl', 'MzAtTWFyLTIwMTU=', 'T0s='),
(12, 'am9obg==', 'bmpvbmpv', 'Tmpvbmpv', 'MjY1NDM1', 'bmpvbmpv', 'bmpvbmpv', 'bWVAZ21haWwuY29t', 'MDcxMTYyMTczNQ==', 'MTIyODIwMTI=', 'MQ==', 'QWN0aXZl', 'MDYtQXVnLTIwMTU=', 'T2s='),
(13, 'UmljaGFyZA==', '', 'S3VyaWE=', 'MzQ1Njc4OTA=', 'UmljaGFyZA==', 'eWVhaA==', 'eWVhaEBnbWFsLmNvbQ==', 'MDczMjQzNDQ0', 'MTIzMzA4MTI=', 'MQ==', 'QWN0aXZl', 'MDYtQXVnLTIwMTU=', 'b2s='),
(14, 'YW5u', '', 'bmR3aWdh', 'MzQ1Njc4OQ==', 'QW5u', 'QU5O', 'YW5kd2lnYTA4QGdtYWlsLmNvbQ==', 'MDczNDU2Nzg5ODk=', 'MTIzMzI1MTI=', 'MQ==', 'QWN0aXZl', 'MDYtQXVnLTIwMTU=', 'T0s='),
(15, 'a2FtYXU=', 'aGg=', 'ZXR0ZQ==', 'NTM1Mw==', 'ZTU1NTI=', 'MjIy', 'a0BtZS5jb20=', 'NDc0Nw==', 'MTIzNDA0MTI=', 'MQ==', 'QWN0aXZl', 'MDYtQXVnLTIwMTU=', 'aGhzaA=='),
(16, 'UmljaGFyZA==', '', 'S3VyaWE=', 'Mjk4Njc2NTQ1', 'UmljaGFyZA==', 'UmljaGFyZA==', 'eWVhaEBnbWFpbC5jb20=', 'MDcxMTExNDU0NQ==', 'MDYzMTQ4MTg=', 'MQ==', 'QWN0aXZl', 'MDYtQXVnLTIwMTU=', 'b2theQ=='),
(17, 'QU5O', '', 'TVVSVUdJ', '', 'QU5O', 'QU5O', '', '', 'MTAzMTE1MTA=', 'MQ==', 'QWN0aXZl', 'MTMtQXVnLTIwMTU=', 'T0s=');

-- --------------------------------------------------------

--
-- Table structure for table `vehicleaccount`
--

CREATE TABLE IF NOT EXISTS `vehicleaccount` (
`id` int(255) NOT NULL,
  `glacc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vehicleinspection`
--

CREATE TABLE IF NOT EXISTS `vehicleinspection` (
  `inspectedby` varchar(255) NOT NULL,
  `vehicleregno` varchar(255) NOT NULL,
  `inspectiondate` varchar(255) NOT NULL,
  `bodyworks` varchar(255) NOT NULL,
  `tyres` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `findings` varchar(255) NOT NULL,
  `recommendations` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `insurance` varchar(255) NOT NULL,
  `expdate` varchar(255) NOT NULL,
  `cert` varchar(255) NOT NULL,
  `tlbno` varchar(255) NOT NULL,
  `primarykey` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vehicleinvoice`
--

CREATE TABLE IF NOT EXISTS `vehicleinvoice` (
`id` int(255) NOT NULL,
  `vid` varchar(255) NOT NULL,
  `glacc` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vehicleinvoicepayment`
--

CREATE TABLE IF NOT EXISTS `vehicleinvoicepayment` (
`id` int(255) NOT NULL,
  `glacc` varchar(255) NOT NULL,
  `mno` varchar(255) NOT NULL,
  `payee` varchar(255) NOT NULL,
  `vid` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `withdrawalfee`
--

CREATE TABLE IF NOT EXISTS `withdrawalfee` (
`id` int(255) NOT NULL,
  `accountfrom` varchar(255) NOT NULL,
  `accountto` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdrawalfee`
--

INSERT INTO `withdrawalfee` (`id`, `accountfrom`, `accountto`, `amount`) VALUES
(16, 'MTYxNg==', 'MjEyMQ==', 'NzAw'),
(17, 'MzMzMw==', 'MzMzMw==', 'MTA='),
(18, 'Tm8gR0wgQWNjb3VudDI=', 'Tm8gR0wgQWNjb3VudDI=', 'OTk5OQ=='),
(19, 'Mg==', 'Mg==', 'NzA='),
(20, 'MzM=', 'Mjc=', 'Nzc='),
(21, 'MjE=', 'MjY=', 'MjA='),
(22, 'MzE=', 'MjY=', 'Nzc='),
(23, 'Njk=', 'MTM5', 'MjAw');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE IF NOT EXISTS `withdrawals` (
  `membernumber` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `cheque` varchar(255) NOT NULL,
  `fees` varchar(255) NOT NULL,
  `approvedby` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `primarykey` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acset`
--
ALTER TABLE `acset`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addbank`
--
ALTER TABLE `addbank`
 ADD PRIMARY KEY (`primarykey`);

--
-- Indexes for table `addcreditor`
--
ALTER TABLE `addcreditor`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addebtor`
--
ALTER TABLE `addebtor`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addressbooks`
--
ALTER TABLE `addressbooks`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `approvalauthority`
--
ALTER TABLE `approvalauthority`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit`
--
ALTER TABLE `audit`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `balances`
--
ALTER TABLE `balances`
 ADD PRIMARY KEY (`primarykey`);

--
-- Indexes for table `banking`
--
ALTER TABLE `banking`
 ADD PRIMARY KEY (`primarykey`);

--
-- Indexes for table `bankingofficer`
--
ALTER TABLE `bankingofficer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bpayments`
--
ALTER TABLE `bpayments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `budget`
--
ALTER TABLE `budget`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashbank`
--
ALTER TABLE `cashbank`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cgroup`
--
ALTER TABLE `cgroup`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkoff`
--
ALTER TABLE `checkoff`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkoffull`
--
ALTER TABLE `checkoffull`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `check_off`
--
ALTER TABLE `check_off`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collateral`
--
ALTER TABLE `collateral`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `communication`
--
ALTER TABLE `communication`
 ADD PRIMARY KEY (`primarykey`);

--
-- Indexes for table `crew`
--
ALTER TABLE `crew`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dividends`
--
ALTER TABLE `dividends`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divimembers`
--
ALTER TABLE `divimembers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dsusers`
--
ALTER TABLE `dsusers`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extracash`
--
ALTER TABLE `extracash`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finbalances`
--
ALTER TABLE `finbalances`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fines`
--
ALTER TABLE `fines`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fixedassets`
--
ALTER TABLE `fixedassets`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fixedassetscategory`
--
ALTER TABLE `fixedassetscategory`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fixed_deposit_setting`
--
ALTER TABLE `fixed_deposit_setting`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forbank`
--
ALTER TABLE `forbank`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `glaccounts`
--
ALTER TABLE `glaccounts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupperm`
--
ALTER TABLE `groupperm`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guarantors`
--
ALTER TABLE `guarantors`
 ADD PRIMARY KEY (`primarykey`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurancefees`
--
ALTER TABLE `insurancefees`
 ADD PRIMARY KEY (`primarykey`);

--
-- Indexes for table `interbank`
--
ALTER TABLE `interbank`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interestfreeze`
--
ALTER TABLE `interestfreeze`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issueinvoice`
--
ALTER TABLE `issueinvoice`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `liabilities`
--
ALTER TABLE `liabilities`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loanapplication`
--
ALTER TABLE `loanapplication`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loanbal`
--
ALTER TABLE `loanbal`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loandisburse`
--
ALTER TABLE `loandisburse`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loandisbursment`
--
ALTER TABLE `loandisbursment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loaninsurance`
--
ALTER TABLE `loaninsurance`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loanintrests`
--
ALTER TABLE `loanintrests`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loanpayment`
--
ALTER TABLE `loanpayment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loanprocessingfees`
--
ALTER TABLE `loanprocessingfees`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loanrepaydates`
--
ALTER TABLE `loanrepaydates`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loanrepo`
--
ALTER TABLE `loanrepo`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loansettings`
--
ALTER TABLE `loansettings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loanwriteoff`
--
ALTER TABLE `loanwriteoff`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberaccs`
--
ALTER TABLE `memberaccs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membercontribution`
--
ALTER TABLE `membercontribution`
 ADD PRIMARY KEY (`primarykey`);

--
-- Indexes for table `member_category`
--
ALTER TABLE `member_category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memebr_title`
--
ALTER TABLE `memebr_title`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newmember`
--
ALTER TABLE `newmember`
 ADD PRIMARY KEY (`primarykey`);

--
-- Indexes for table `newvehicle`
--
ALTER TABLE `newvehicle`
 ADD PRIMARY KEY (`primarykey`);

--
-- Indexes for table `nextofkin`
--
ALTER TABLE `nextofkin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organisation`
--
ALTER TABLE `organisation`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `othercash`
--
ALTER TABLE `othercash`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outbox`
--
ALTER TABLE `outbox`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`), ADD KEY `id_2` (`id`), ADD KEY `id_3` (`id`), ADD KEY `url` (`url`), ADD KEY `url_2` (`url`), ADD KEY `url_3` (`url`), ADD KEY `url_4` (`url`), ADD KEY `url_5` (`url`), ADD KEY `id_4` (`id`), ADD KEY `url_6` (`url`);

--
-- Indexes for table `paymentin`
--
ALTER TABLE `paymentin`
 ADD PRIMARY KEY (`primarykey`);

--
-- Indexes for table `paymentmode`
--
ALTER TABLE `paymentmode`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentout`
--
ALTER TABLE `paymentout`
 ADD PRIMARY KEY (`primarykey`);

--
-- Indexes for table `periodictyrecord`
--
ALTER TABLE `periodictyrecord`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesapi_account`
--
ALTER TABLE `pesapi_account`
 ADD PRIMARY KEY (`id`), ADD KEY `type_index` (`type`), ADD KEY `definedby` (`identifier`);

--
-- Indexes for table `pesapi_payment`
--
ALTER TABLE `pesapi_payment`
 ADD PRIMARY KEY (`id`), ADD KEY `type_index` (`type`), ADD KEY `name_index` (`name`), ADD KEY `phone_index` (`phonenumber`), ADD KEY `time_index` (`time`), ADD KEY `super_index` (`super_type`), ADD KEY `fk_mpesapi_payment_account_idx` (`account_id`);

--
-- Indexes for table `psvbalances`
--
ALTER TABLE `psvbalances`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `psvtotals`
--
ALTER TABLE `psvtotals`
 ADD PRIMARY KEY (`primarykey`);

--
-- Indexes for table `receiveinvoice`
--
ALTER TABLE `receiveinvoice`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receivepayments`
--
ALTER TABLE `receivepayments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registeragents`
--
ALTER TABLE `registeragents`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saccodetails`
--
ALTER TABLE `saccodetails`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sharesbf`
--
ALTER TABLE `sharesbf`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblreports`
--
ALTER TABLE `tblreports`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `totals`
--
ALTER TABLE `totals`
 ADD PRIMARY KEY (`primarykey`);

--
-- Indexes for table `trasferpurpose`
--
ALTER TABLE `trasferpurpose`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usergroups`
--
ALTER TABLE `usergroups`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `vehicleaccount`
--
ALTER TABLE `vehicleaccount`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicleinspection`
--
ALTER TABLE `vehicleinspection`
 ADD PRIMARY KEY (`primarykey`);

--
-- Indexes for table `vehicleinvoice`
--
ALTER TABLE `vehicleinvoice`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicleinvoicepayment`
--
ALTER TABLE `vehicleinvoicepayment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawalfee`
--
ALTER TABLE `withdrawalfee`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
 ADD PRIMARY KEY (`primarykey`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `acset`
--
ALTER TABLE `acset`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `addbank`
--
ALTER TABLE `addbank`
MODIFY `primarykey` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `addcreditor`
--
ALTER TABLE `addcreditor`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `addebtor`
--
ALTER TABLE `addebtor`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `addressbooks`
--
ALTER TABLE `addressbooks`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `approvalauthority`
--
ALTER TABLE `approvalauthority`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `audit`
--
ALTER TABLE `audit`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `balances`
--
ALTER TABLE `balances`
MODIFY `primarykey` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `banking`
--
ALTER TABLE `banking`
MODIFY `primarykey` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bankingofficer`
--
ALTER TABLE `bankingofficer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bpayments`
--
ALTER TABLE `bpayments`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `budget`
--
ALTER TABLE `budget`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cashbank`
--
ALTER TABLE `cashbank`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cgroup`
--
ALTER TABLE `cgroup`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `checkoff`
--
ALTER TABLE `checkoff`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `checkoffull`
--
ALTER TABLE `checkoffull`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `check_off`
--
ALTER TABLE `check_off`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `collateral`
--
ALTER TABLE `collateral`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `communication`
--
ALTER TABLE `communication`
MODIFY `primarykey` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `crew`
--
ALTER TABLE `crew`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dividends`
--
ALTER TABLE `dividends`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `divimembers`
--
ALTER TABLE `divimembers`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dsusers`
--
ALTER TABLE `dsusers`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `extracash`
--
ALTER TABLE `extracash`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `finbalances`
--
ALTER TABLE `finbalances`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fines`
--
ALTER TABLE `fines`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fixedassets`
--
ALTER TABLE `fixedassets`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fixedassetscategory`
--
ALTER TABLE `fixedassetscategory`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fixed_deposit_setting`
--
ALTER TABLE `fixed_deposit_setting`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `forbank`
--
ALTER TABLE `forbank`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `glaccounts`
--
ALTER TABLE `glaccounts`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=323;
--
-- AUTO_INCREMENT for table `groupperm`
--
ALTER TABLE `groupperm`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=148;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `guarantors`
--
ALTER TABLE `guarantors`
MODIFY `primarykey` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `insurancefees`
--
ALTER TABLE `insurancefees`
MODIFY `primarykey` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `interbank`
--
ALTER TABLE `interbank`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `interestfreeze`
--
ALTER TABLE `interestfreeze`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `issueinvoice`
--
ALTER TABLE `issueinvoice`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `liabilities`
--
ALTER TABLE `liabilities`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loanapplication`
--
ALTER TABLE `loanapplication`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `loanbal`
--
ALTER TABLE `loanbal`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `loandisburse`
--
ALTER TABLE `loandisburse`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `loandisbursment`
--
ALTER TABLE `loandisbursment`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `loaninsurance`
--
ALTER TABLE `loaninsurance`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `loanintrests`
--
ALTER TABLE `loanintrests`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `loanpayment`
--
ALTER TABLE `loanpayment`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `loanprocessingfees`
--
ALTER TABLE `loanprocessingfees`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loanrepaydates`
--
ALTER TABLE `loanrepaydates`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `loanrepo`
--
ALTER TABLE `loanrepo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `loansettings`
--
ALTER TABLE `loansettings`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `loanwriteoff`
--
ALTER TABLE `loanwriteoff`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `memberaccs`
--
ALTER TABLE `memberaccs`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `membercontribution`
--
ALTER TABLE `membercontribution`
MODIFY `primarykey` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `member_category`
--
ALTER TABLE `member_category`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `memebr_title`
--
ALTER TABLE `memebr_title`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `newmember`
--
ALTER TABLE `newmember`
MODIFY `primarykey` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `newvehicle`
--
ALTER TABLE `newvehicle`
MODIFY `primarykey` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nextofkin`
--
ALTER TABLE `nextofkin`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `organisation`
--
ALTER TABLE `organisation`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=146;
--
-- AUTO_INCREMENT for table `paymentin`
--
ALTER TABLE `paymentin`
MODIFY `primarykey` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `paymentout`
--
ALTER TABLE `paymentout`
MODIFY `primarykey` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `periodictyrecord`
--
ALTER TABLE `periodictyrecord`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pesapi_account`
--
ALTER TABLE `pesapi_account`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pesapi_payment`
--
ALTER TABLE `pesapi_payment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `psvbalances`
--
ALTER TABLE `psvbalances`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `psvtotals`
--
ALTER TABLE `psvtotals`
MODIFY `primarykey` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `receiveinvoice`
--
ALTER TABLE `receiveinvoice`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `receivepayments`
--
ALTER TABLE `receivepayments`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `registeragents`
--
ALTER TABLE `registeragents`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `sharesbf`
--
ALTER TABLE `sharesbf`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblreports`
--
ALTER TABLE `tblreports`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `totals`
--
ALTER TABLE `totals`
MODIFY `primarykey` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trasferpurpose`
--
ALTER TABLE `trasferpurpose`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `vehicleaccount`
--
ALTER TABLE `vehicleaccount`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vehicleinvoice`
--
ALTER TABLE `vehicleinvoice`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vehicleinvoicepayment`
--
ALTER TABLE `vehicleinvoicepayment`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `withdrawalfee`
--
ALTER TABLE `withdrawalfee`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
