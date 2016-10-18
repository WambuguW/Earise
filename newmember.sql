-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2015 at 03:55 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `esaccorg_webuye`
--

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
  `primarykey` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newmember`
--

INSERT INTO `newmember` (`photo`, `firstname`, `middlename`, `lastname`, `dob`, `gender`, `pcode`, `mop`, `recruitedby`, `recruitee`, `bname`, `bloc`, `nameb`, `commfee`, `idnumber`, `membernumber`, `district`, `division`, `mobileno`, `pinnumber`, `residence`, `career`, `email`, `comments`, `status`, `regdate`, `station`, `cursacco`, `nation`, `regfeedate`, `primarykey`) VALUES
('', 'V1NTMDE=', 'U2h1dHRsZQ==', 'U2FjY28=', '', '', '', '', '', '', '', '', '', '', '', 'V1NTMDE=', '', '', '', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 0),
('', 'Sk9ITg==', 'V0FGVUxB', 'U1VOR1VSSQ==', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'OTc2MTY5Mw==', 'MDAwMQ==', '', '', 'MDcxMDc3MDcxNQ==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 1),
('', 'U0lNT04=', 'TkcnQU5HJ0E=', 'TUJVUlU=', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'OTA0MjY1OQ==', 'MDAwMg==', '', '', 'MDczNDcwNTA4MA==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 2),
('', 'UEFVTA==', 'S0lOT1RJ', 'TlRFRVJF', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MTE0ODY5NDI=', 'MDAwMw==', '', '', 'MDcxNzAzMzI4MQ==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 3),
('', 'RU5PQ0s=', '', 'V0FNQUxXQQ==', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'NjIzOTQwMw==', 'MDAwNA==', '', '', 'MDcxNDAxNTAwMg==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 4),
('', 'RVpFS0lFTA==', '', 'S0lNQU5J', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MTE0MzQ5ODQ=', 'MDAwNQ==', '', '', 'MDcyNTU5MzE4Nw==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 5),
('', 'REFWSVM=', '', 'TVVTSUtIRQ==', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MjA2MDk3Mw==', 'MDAwNg==', '', '', 'MDczNTIxOTU2OA==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 6),
('', 'SEVSTUFO', '', 'S0FTSUxJ', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MTA5NjEwNzI=', 'MDAwNw==', '', '', 'MDcyMjYwNzQ4MQ==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 7),
('', 'QkVOU09O', '', 'R0lUQU5HQQ==', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', '', 'MDAwOA==', '', '', 'MDcyNzg4MTIzMQ==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 8),
('', 'Sk9TRVBI', '', 'TVdBTkdJ', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MzA2MzAyOQ==', 'MDAwOQ==', '', '', 'MDczMzk1ODkxOQ==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 9),
('', 'SVNBQUM=', '', 'TUFTSU5ERQ==', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', '', 'MDAxMA==', '', '', 'MDcyMzc5NTIyNQ==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 10),
('', 'UEVURVI=', '', 'TkpFSElB', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', '', 'MDAxMQ==', '', '', 'MDczNCA5OTQ0MTQ=', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 11),
('', 'SUxBTQ==', '', 'TVdJQkFOREE=', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', '', 'MDAxMg==', '', '', 'MDcyMTMxMjg0OQ==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 12),
('', 'REFWSUQ=', '', 'TUlBTk8=', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MTMyNDE0NDY2', 'MDAxMw==', '', '', 'MDcyMTM2MjM2NA==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 13),
('', 'SkVSRU1JQUg=', '', 'T01PTkRJ', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', '', 'MDAxNA==', '', '', 'MDcyODY5Mzg5OA==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 14),
('', 'V0lMU09O', '', 'QUxVU0E=', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', '', 'MDAxNQ==', '', '', 'MDcyMjg0NDU0NA==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 15),
('', 'VEhPTUFT', '', 'U0FNVUxJ', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'ODkwNzgyMA==', 'MDAxNg==', '', '', 'MDczNjc4ODE4Mw==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 16),
('', 'SkVTU0U=', '', 'TkdVR0k=', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', '', 'MDAxNw==', '', '', 'MDcyMTI2NjcwMg==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 17),
('', 'Q0hBUkxFUw==', '', 'TVVDSFVLVQ==', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MTE0MTMzMDU=', 'MDAxOA==', '', '', 'MDcyMDgyMjA1NQ==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 18),
('', 'RlJFRA==', '', 'V0VCQUxB', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', '', 'MDAxOQ==', '', '', 'MDcyNjA3MzY2MiA=', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 19),
('', 'Sk9ITg==', '', 'S0lOVVRISUE=', '', 'TWFsZQ==', '', 'TW9udGhseQ==', '', '', '', '', '', '', 'NTQ1MzQxMg==', 'MDAyMA==', '', '', 'MDcyNDg1MjY1OA==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 20),
('', 'R0VPUkdF', '', 'TkRFUklUVQ==', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MzM3NjIyNQ==', 'MDAyMQ==', '', '', 'MDcyNzg4MTIzMQ==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 21),
('', 'UEVURVI=', '', 'TkpPUk9HRQ==', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MTA4OTMxNDI=', 'MDAyMg==', '', '', 'MDcxMTY2Njg2Mg==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 22),
('', 'REFWSUQ=', 'TUVUVE8=', 'WUVHTw==', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MjA2OTQ2NTQ=', 'MDAyMw==', '', '', 'MDczNjk2NzIyOQ==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 23),
('', 'U1RFUEhFTg==', '', 'S0lBR08=', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MzM3OTQ0Mg==', 'MDAyNA==', '', '', 'MDcyMTg0MjU4Nw==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 24),
('', 'SEVOUlk=', '', 'TllPR0VTQQ==', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'NjM4Mjky', 'MDAyNQ==', '', '', 'MDczMzIzMzQ4Mw==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 25),
('', 'Sk9TRVBI', 'TU9ST0tP', 'Q0hFUFRPVA==', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MTEwMTk2Mjc=', 'MDAyNg==', '', '', 'MDcyMjk5NDE5Ng==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 26),
('', 'T1lPWUE=', 'T01VS0E=', 'T0JBRElBSA==', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'NjUxNDA0MQ==', 'MDAyNw==', '', '', 'MDcyNTQ0MDQ3MA==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 27),
('', 'QklLT0tXQQ==', 'Tk9BSA==', 'V0VLRVNB', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'NDQyMjI0Mg==', 'MDAyOA==', '', '', 'MDcyNjUwOTA1MQ==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 28),
('', 'Sk9TRVBI', 'V0FTSUtF', 'TVVLSFdBTUk=', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MTk0NDQxNw==', 'MDAyOQ==', '', '', 'MDcxNTI3MTk3Mw==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 29),
('', 'S0lJTFU=', 'Sk9TRVBI', 'TVVUSVNZQQ==', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MjI1MTk0Mzg=', 'MDAzMA==', '', '', 'MDcyMzY0MTk1Nw==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 30),
('', 'SEVTQk9O', '', 'S1VUSVJJ', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MjA3ODE2OA==', 'MDAzMQ==', '', '', 'MDcyMjg4MzA0Mg==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 31),
('', 'Q0FMSVNUVVM=', '', 'S0lBTUJP', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MjA3OTc3NDE=', 'MDAzMg==', '', '', 'MDcyNTM0ODg3', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 32),
('', 'Sk9ITg==', '', 'TUJVUlU=', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MjcyMzY5NjA=', 'MDAzMw==', '', '', 'MDcyMjc2NzU3Mw==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 33),
('', 'Sk9TRVBI', '', 'TVVSVUdBTUk=', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MjE2NjE1MjU=', 'MDAzNA==', '', '', 'MDcyNDY0NzkzNQ==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 34),
('', 'TEVPUk5BUkQ=', '', 'QlVZQUJP', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MzQ2NDgyNA==', 'MDAzNQ==', '', '', 'MDcyNzY0MTA1Mg==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 35),
('', 'QkVOSkFNSU4=', '', 'TkFNVUtBTkE=', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MTI4NDgwODI=', 'MDAzNg==', '', '', 'MDcxNzA3NDkxMQ==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 36),
('', 'VElNT1RIWQ==', '', 'TkpVR1VOQQ==', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MjI2ODEwMzM=', 'MDAzNw==', '', '', 'MDcyMzI3NTI1Mw==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 37),
('', 'SEFST04=', '', 'TVVLSE9OR08=', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MTE2ODIyODc=', '', '', '', 'MDcyNjk4ODAwOA==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 38),
('', 'WkFWRVJJTw==', '', 'TVdBTkdJ', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', '', '', '', '', 'MDcyODg1ODc2Nw==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 39),
('', 'R0VPRkZSRVk=', '', 'TVVLT01B', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MTE2ODIyODc=', 'MDA0Nw==', '', '', 'MDcyNDQ2Njg3NQ==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 40),
('', 'SlVMSUVU', 'TkFTV0E=', 'V0FOREVMQQ==', '', 'RkVNQUxF', '', '', '', '', '', '', '', '', 'MTM2NjE2ODg=', 'MDA0MQ==', '', '', 'MDcxNTgxMDk2Nw==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 41),
('', 'UEVURVI=', '', 'Q0hJTUFLSUxF', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'OTk5ODI3NQ==', '', '', '', 'MDczNTU4MDc4Mw==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 42),
('', 'TUFSSw==', '', 'T0xFTUJP', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MjA2NTcxNTE=', 'MDA0NQ==', '', '', 'MDcyNzEyODUzNQ==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 43),
('', 'RVJJQ0s=', '', 'TllBQlVUTw==', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MjU2NDYyNDY=', 'MDA0MA==', '', '', 'MDcyMTIxMDEwOQ==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 44),
('', 'SElSVU0=', '', 'S0FSSVVLSQ==', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MTM3MjY5OTA=', 'MDAzOA==', '', '', 'MDcyMTY1MDM4MA==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 45),
('', 'REFWSUQ=', '', 'TVVJR0FJ', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', '', '', '', '', 'MDcyMDM4MjYyOQ==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 46),
('', 'SEFSUklTT04=', '', 'R0lUQVU=', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MjUyNzMwNjY=', 'MDA0Mg==', '', '', 'MDcyMzIwOTM2Mg==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 47),
('', 'TEFXUkVOQ0U=', '', 'TVVDSEFOR0k=', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', '', '', '', '', 'MDcxOTMwMTAxNw==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 48),
('', 'REFWSUQ=', '', 'S0FNQk8=', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'OTY1OTE3OQ==', 'MDA0OQ==', '', '', 'MDcyODU4NjEyMQ==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 49),
('', 'R0VSQUxE', '', 'U0hJS1VLVQ==', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', '', '', '', '', 'MDcxMjUzMjcyMQ==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 50),
('', 'V0FOWU9OWUk=', 'Q0hFTE9USQ==', 'V0FTSUtF', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MTAxMDQwMw==', '', '', '', 'MDcyMTk0NzAyNQ==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 51),
('', 'UEFVTA==', '', 'S0lOWUFOSlVJ', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', '', '', '', '', 'MDcyMyA4OTIxMDU=', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 52),
('', 'U0FNU09O', '', 'S0FSSUNITw==', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MTE3NTc1MDk=', 'MDAzOQ==', '', '', 'MDcyODI4NjI2MA==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 53),
('', 'R1JFR09SWQ==', '', 'V0FLT0xJ', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MzAwODM4', 'MDA0OA==', '', '', 'MDcyNjkxNjA1Ng==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 54),
('', 'RE9NSU5JQw==', '', 'S0lNQU5J', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MjMwNDMxNzA=', 'MDA0NA==', '', '', 'MDcyNTEwOTEwNw==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 55),
('', 'TUFSWQ==', '', 'V0FOR0FSRQ==', '', 'RkVNQUxF', '', '', '', '', '', '', '', '', 'MTI2MzM5MDA2', 'MDA0Mw==', '', '', 'MDcyMTQ0MTA5Mg==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 56),
('', 'RlJBTkNJUw==', '', 'TUFJTkE=', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'OTg4MzUwNA==', 'MDA0Ng==', '', '', 'MDcxMDc2MjU0MA==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 57),
('', 'RlJFRFJJQ0s=', '', 'TkdJR0U=', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MTE3MTcyMDI=', 'MDA1MA==', '', '', 'MDcyMjQ5MTYyOA==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 58),
('', 'QkVOQVJE', '', 'R0lUSEFIVQ==', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MTA3NTEyNTc=', 'MDA1Mw==', '', '', 'MDcxMTQwODYzNA==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 59),
('', 'V0lMU09O', '', 'TVVDSEFJ', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MTAzNzkxMQ==', 'MDA1MQ==', '', '', 'MDcyMjQzMTM4NA==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 60),
('', 'TFlOTkVURQ==', '', 'TkFOSkFMQQ==', '', 'RkVNQUxF', '', '', '', '', '', '', '', '', 'MjUwNzEwMTc=', 'MDA1Mg==', '', '', 'MDcxODgwNDcxMA==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 61),
('', 'U1RFUEhFTg==', '', 'V0FOWU9OWUk=', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MjAyNTMxMDk=', 'MDA1OA==', '', '', 'MDcwMDkyMDA5NCA=', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 62),
('', 'V0lMRlJFRA==', '', 'V0FMVUJFTkdP', '', 'RkVNQUxF', '', '', '', '', '', '', '', '', 'NzU5NTA3OQ==', 'MDA1NA==', '', '', 'MDcyNzY0MTczMiA=', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 63),
('', 'REFOSUVM', '', 'TkpVR1VOQQ==', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MTA5ODk0NTA=', 'MDA1NQ==', '', '', 'MDcyMjQ1MDkyMA==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 64),
('', 'RElDS1NPTg==', '', 'TUFVTkRB', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', '', '', '', '', 'MDcyMzQ3NTA2Mw==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 65),
('', 'SkFORQ==', '', 'TkpFUkk=', '', 'RkVNQUxF', '', '', '', '', '', '', '', '', 'MjM1NDgyMTQ=', 'MDA2MQ==', '', '', 'MDcyMjY5ODE1MA==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 66),
('', 'V0lMU09O', '', 'R0lUQVU=', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'ODI0MDE3OA==', 'MDA1Ng==', '', '', 'MDcyNDI5NDc3', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 67),
('', 'U0FNVUVM', '', 'TVVTRU1CSQ==', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', '', 'MDA1Nw==', '', '', 'MDcxMjM0ODM5', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 68),
('', 'SEVOUlk=', '', 'TU9OR0FSRQ==', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'ODc5NTc5MA==', 'MDA1OQ==', '', '', 'MDcwODc0ODgyNw==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 69),
('', 'S0VOTkVEWQ==', '', 'TUFLT0tIQQ==', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', '', '', '', '', 'MDcyMzUyMTYxNw==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 70),
('', 'TkFOQ1k=', '', 'TkFPTUk=', '', 'RkVNQUxF', '', '', '', '', '', '', '', '', 'MjI4NTA4NTE=', 'MDA2NA==', '', '', 'MDcyMTkwNTE0MQ==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 71),
('', 'Sk9TRVBI', '', 'S0lNQU5J', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'OTM2MDkyOQ==', 'MDA2Mg==', '', '', 'MDczODIzMDAzNw==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 72),
('', 'Q0hSSVNUT1BIRVI=', '', 'TUFTSU5ERQ==', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MTYxMDkyOTU=', '', '', '', 'MDcyMDY5MzM4MiA=', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 73),
('', 'TElMSUFO', '', 'V0FOR1VJ', '', 'RkVNQUxF', '', '', '', '', '', '', '', '', 'MjQxODAxMTU=', 'MDA2MA==', '', '', 'MDcxNjAxMTAwNg==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 74),
('', 'S0VOTkVUSA==', '', 'TUFUSUtB', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MjI4MDYyOTA=', 'MDA2Mw==', '', '', 'MDcxOTQxNTMzNQ==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 75),
('', 'RU1NQU5VRUw=', '', 'RlVSQUhB', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MTE1NzU2NjA=', 'MDA2NQ==', '', '', 'MDcyMjQ3NTIyOQ==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 76),
('', 'UEVURVI=', '', 'TUJVR1VB', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MTAwMzE5MDA=', 'MDA2OQ==', '', '', 'MDcxMDEyNDUwOA==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 77),
('', 'REFWSUQ=', '', 'TVVORU5F', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'ODcxNzM4OA==', 'MDA2Ng==', '', '', 'MDcxNTgyMjIyMg==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 78),
('', 'Sk9FTA==', '', 'V0FOSk9ISQ==', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MTIwNzc3MA==', 'MDA2Nw==', '', '', 'MDcyMTU4Njk0OQ==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 79),
('', 'TkpPUk9HRQ==', '', 'TVVHTw==', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MTM0MTU0NzU=', 'MDA3Ng==', '', '', 'MDcyMjk2ODQyNQ==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 80),
('', 'RlJBQ0hJQUg=', '', 'SFVHSVJV', '', 'RkVNQUxF', '', '', '', '', '', '', '', '', 'MzI5OTQx', 'MDA2OA==', '', '', 'MDcyMjg2OTEzNSA=', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 81),
('', 'U1RFUEhFTg==', '', 'TVVSVU5HQQ==', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', '', 'MDA3MA==', '', '', 'MDcyMjg2MDM0Mw==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 82),
('', 'RlJBTkNJUw==', '', 'R0lDSFVISQ==', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MTE1NzU4NTU=', 'MDA3MQ==', '', '', 'MDcyMzc1NTU3OA==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 83),
('', 'REFWSUQ=', '', 'S0lNQU5J', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MjkzODI5NQ==', 'MDA3Mg==', '', '', 'MDcyMDMwMjcwNQ==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 84),
('', 'UEVURVI=', '', 'UklCQUk=', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MjMwNDcxNjA=', 'MDA3Mw==', '', '', 'MDcyMTI4OTgxNg==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 85),
('', 'SkFNRVM=', '', 'TVdBTkdJ', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MjQzMDExODQ=', 'MDA3NA==', '', '', 'MDcyMTc5OTI5OA==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 86),
('', 'TUlDSEFFTA==', '', 'VEhJT05HTw==', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MjMxMzY4MDk=', 'MDA3NQ==', '', '', 'MDcyNTA4NjM2Ng==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 87),
('', 'Sk9ITg==', '', 'TkpVR1VOQQ==', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'NzM1NTIwMzE=', 'MDA3OA==', '', '', 'MDcyNjUzOTk3Mw==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 88),
('', 'QkVOQVJE', '', 'TkpVR1VOQQ==', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MjM0MzE4ODM=', 'MDA3Nw==', '', '', 'MDcyMTkwNjk3Mg==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 89),
('', 'RVJORVNU', '', 'TkRJQ0hV', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MTQ2MTg3ODM=', 'MDA3OQ==', '', '', 'MDcyNDc5OTY0OA==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 90),
('', 'TUFSQU9I', '', 'RE9EQU5JTQ==', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MjI3MDE2NDg=', 'MDA4MA==', '', '', 'MDcyMDQ3NTEwOA==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 91),
('', 'QUxGUkVE', '', 'VEVNQkE=', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MTE0MTczMjA=', 'MDA4MQ==', '', '', 'MDcyMjQ3MzM1MQ==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 92),
('', 'SEVOUlk=', '', 'S0lQVE9P', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MTE4NjQwNTE=', 'MDA4Mg==', '', '', 'MDcyMjU4NDE1MyA=', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 93),
('', 'UEVMSU5B', '', 'TUFMT0JB', '', 'RkVNQUxF', '', '', '', '', '', '', '', '', 'MTkzMDk0Mw==', 'MDA4Mw==', '', '', 'MDcyMTU0Mjk3MA==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 94),
('', 'TEVPTkFSRA==', '', 'T0RISUFNQk8=', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MTM3ODQ1Njc=', 'MDA4NA==', '', '', 'MDcyNDc4Nzk0MQ==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 95),
('', 'QkVMRElOQUg=', '', 'V0FOWUFNQQ==', '', 'RkVNQUxF', '', '', '', '', '', '', '', '', 'MjA3ODI0Ng==', 'MDA4NQ==', '', '', 'MDcyNTk5NzY4MQ==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 96),
('', 'S0VOTkVEWQ==', '', 'TUFLT0hB', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', '', 'MDA4Ng==', '', '', 'MDcyMyA1MjE2MTc=', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 97),
('', 'R0FCUklFTA==', '', 'S0lOWUFOSlVJ', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', '', 'MDA4Nw==', '', '', 'MDcyNTI5MzkzMg==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 98),
('', 'Sk9TRVBI', '', 'TllBR0FI', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MjA0NTkzNzA=', 'MDA4OA==', '', '', 'MDcxMjQzODU3OA==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 99),
('', 'V0lMU09O', '', 'S0FCVVlF', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MTEzMTc1OTI=', 'MDA4OQ==', '', '', 'MDcyMjE2NTI2NQ==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 100),
('', 'VEhPTUFT', '', 'RlVSQUhB', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MTM2OTc2MTA=', 'MDA5MA==', '', '', 'MDcyMjI3MTA0MA==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 101),
('', 'TU9TRVM=', '', 'V0FOWU9OWUk=', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', '', 'MDA5MQ==', '', '', 'MDcxNTY2MTU3MA==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 102),
('', 'Q0xJRkZPUkQ=', '', 'T0NISUVORw==', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MjgwMzU2MTM=', 'MDA5Mg==', '', '', 'MDcwMTMyMjE5MQ==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 103),
('', 'TUFSVElO', '', 'TVVLSFdBTkE=', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MTM4NjY4NzE=', 'MDA5Mw==', '', '', 'MDcyMzcxMTgzNQ==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 104),
('', 'U1RBTkVMWQ==', '', 'S0lOWUFOSlVJ', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MTM4OTg2Mjg=', 'MDA5NA==', '', '', 'MDcyNDQ5MDU4NQ==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 105),
('', 'QkVOQVJE', '', 'TVVSSUdJ', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MTM1MzQ3MDU=', 'MDA5NQ==', '', '', 'MDcyMzg4MjM1OQ==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 106),
('', 'RUxJVUQ=', '', 'S0FSSVVLSQ==', '', 'TUFMRQ==', '', '', '', '', '', '', '', '', 'MjA0NTcyNTI=', 'MDA5Ng==', '', '', 'MDcwNzU1ODc2MSA=', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 107),
('', 'QU5UT05Z', '', 'TVdBVVJB', '', 'TWFsZQ==', '', 'V2Vla2x5', '', '', '', '', '', '', 'MTMzOTc0Nzg=', 'MDA5OA==', '', '', 'MDcyMTI5MjQwMA==', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 108),
('', 'TGVhaA==', '', 'S2FyYW5qYQ==', '', '', '', '', '', '', '', '', '', '', '', 'MDA5OQ==', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 109),
('', 'UmF5bW9uZA==', '', 'TXVzdW1iYQ==', '', '', '', '', '', '', '', '', '', '', '', 'MDA5Nw==', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 110),
('', 'UGF1bA==', 'TmRpY2h1', 'S2FtYXU=', '', 'RmVtYWxl', '', 'V2Vla2x5', '', '', '', '', '', '', 'MTAxUA==', 'MTAxUA==', '', '', '', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 111),
('', 'RG9yY2Fz', '', 'V2FpbmFpbmE=', '', 'RmVtYWxl', '', 'V2Vla2x5', '', '', '', '', '', '', 'MjAwMA==', 'MjAwMA==', '', '', '', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 112),
('', 'UGV0ZXI=', '', 'Q2hpbWFraWxl', '', 'RmVtYWxl', '', 'V2Vla2x5', '', '', '', '', '', '', 'MjAwMQ==', 'MjAwMQ==', '', '', '', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 113),
('', 'Sm9uYWg=', '', 'VGh1a3U=', '', 'RmVtYWxl', '', 'V2Vla2x5', '', '', '', '', '', '', 'MjAwMg==', 'MjAwMg==', '', '', '', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 114),
('', 'UGV0ZXI=', '', 'TWFpbmE=', '', 'RmVtYWxl', '', 'V2Vla2x5', '', '', '', '', '', '', 'MjAwMw==', 'MjAwMw==', '', '', '', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 115),
('', 'Sm9obg==', '', 'S2lnb25kdQ==', '', 'RmVtYWxl', '', 'V2Vla2x5', '', '', '', '', '', '', 'MjAwNA==', 'MjAwNA==', '', '', '', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 116),
('', 'TWljaGFlbA==', '', 'TXdhbmdp', '', 'RmVtYWxl', '', 'V2Vla2x5', '', '', '', '', '', '', 'MjAwNQ==', 'MjAwNQ==', '', '', '', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 117),
('', 'V2lsZnJlZA==', '', 'V2Fuam9oaQ==', '', 'RmVtYWxl', '', 'V2Vla2x5', '', '', '', '', '', '', 'MjAwNg==', 'MjAwNg==', '', '', '', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 118),
('', 'VGVycnk=', '', 'V2FueW9ueWk=', '', 'RmVtYWxl', '', 'V2Vla2x5', '', '', '', '', '', '', 'UzAwMDE=', 'UzAwMDE=', '', '', '', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 119),
('', 'TWVyY3k=', '', 'S2FyYW5qYQ==', '', 'RmVtYWxl', '', 'V2Vla2x5', '', '', '', '', '', '', 'UzAwMDI=', 'UzAwMDI=', '', '', '', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 120),
('', 'RnJhbmNpcw==', '', 'QmFyYXph', '', 'TWFsZQ==', '', 'V2Vla2x5', '', '', '', '', '', '', 'UzAwMDM=', 'UzAwMDM=', '', '', '', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 121),
('', 'SmFtZXM=', '', 'QmFyYXph', '', 'RmVtYWxl', '', 'V2Vla2x5', '', '', '', '', '', '', 'UzAwMDQ=', 'UzAwMDQ=', '', '', '', '', '', '', '', '', 'YWN0aXZl', '', '', '', '', '', 122);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `newmember`
--
ALTER TABLE `newmember`
 ADD PRIMARY KEY (`primarykey`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
