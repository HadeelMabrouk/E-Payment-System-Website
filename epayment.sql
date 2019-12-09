-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2019 at 09:57 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epayment`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `bank_id` int(11) NOT NULL,
  `bank_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_id`, `bank_name`) VALUES
(1, 'CIB'),
(2, 'QNB'),
(3, 'HSBC'),
(4, 'ElAhly');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary`
--

CREATE TABLE `beneficiary` (
  `b_email` varchar(45) NOT NULL,
  `b_fname` varchar(45) NOT NULL,
  `b_lname` varchar(45) NOT NULL,
  `b_bname` varchar(45) NOT NULL,
  `b_passwrod` varchar(45) NOT NULL,
  `b_accountno` varchar(45) NOT NULL,
  `profit` int(11) NOT NULL,
  `b_address` varchar(45) DEFAULT NULL,
  `b_phoneno` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `beneficiary`
--

INSERT INTO `beneficiary` (`b_email`, `b_fname`, `b_lname`, `b_bname`, `b_passwrod`, `b_accountno`, `profit`, `b_address`, `b_phoneno`) VALUES
('b@gmail.com', 'Bounty', 'Dairies', 'Bounty', 'bounty', '876234', 5, '', ''),
('cadbury@gmail.com', 'cadbury', 'dairies', 'cadbury', 'cadbury', '938415', 78, '', ''),
('galaxy@gmail.com', 'galaxy', 'galaxy', 'galaxy', 'galaxy', '123456', 96, '', ''),
('m@gmail.com', 'mandolin', 'mandolin', 'mandolin', 'mandolin', '965234', 0, '', ''),
('mars@outlook.com', 'mars', 'mars', 'mars', 'mars', '654234', 0, '', ''),
('nutella@gmail.com', 'nutella', 'products', 'Nutella', 'nutella', '543531', 15, 'NYC, USA', '02205435812'),
('twix@hotmail.com', 'twixes', 'products', 'Twix', 'twix', '534524', 25, '', '0220534534');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `c_email` varchar(45) NOT NULL,
  `c_fname` varchar(45) NOT NULL,
  `c_lname` varchar(45) NOT NULL,
  `c_password` varchar(45) NOT NULL,
  `c_phoneno` varchar(45) DEFAULT NULL,
  `c_address` varchar(45) DEFAULT NULL,
  `c_dob` date DEFAULT NULL,
  `c_country` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`c_email`, `c_fname`, `c_lname`, `c_password`, `c_phoneno`, `c_address`, `c_dob`, `c_country`) VALUES
('abeer@yahoo.com', 'Abeer', 'Shaker', 'abeer', '', '', '0000-00-00', ''),
('awad@outlook.com', 'Awad', 'Khalil', 'khalil', '0102345135', 'Cairo, Egypt', '1960-01-01', 'Egypt'),
('emad@gmail.com', 'emad', 'mabrouk', 'emadmabrouk', '', '', '0000-00-00', ''),
('h@gmail.com', 'hadeel', 'mabrouk', '123456', '', '', '0000-00-00', ''),
('hadeel@gmail.com', 'Hadeel', 'Emad', 'hadeel', '01092232812', 'Cairo, Egypt', '1999-01-06', 'Egypt'),
('hadeel@yahoo.com', 'Hadeel', 'Emad', '123456', '', '', '0000-00-00', ''),
('hala@yahoo.com', 'hala', 'emad', 'hala', '', '', '0000-00-00', ''),
('heba@gmail.com', 'heba', 'emad', 'heba', '', '', '0000-00-00', ''),
('maged@gmail.com', 'Maged', 'Sakr', '12345678', '', '', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `credit_c`
--

CREATE TABLE `credit_c` (
  `c_no` varchar(45) NOT NULL,
  `c_balance` int(11) NOT NULL,
  `client_c_email` varchar(45) DEFAULT NULL,
  `bank_bank_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `credit_c`
--

INSERT INTO `credit_c` (`c_no`, `c_balance`, `client_c_email`, `bank_bank_id`) VALUES
('10981', 257, 'hala@yahoo.com', 4),
('12345', 52, 'h@gmail.com', 1),
('23454', 90, 'heba@gmail.com', 4),
('32853', 555, 'hadeel@gmail.com', 1),
('34451', 185, 'emad@gmail.com', 2),
('45723', 300, 'abeer@yahoo.com', 3),
('67801', 5, 'emad@gmail.com', 2),
('87612', 885, 'awad@outlook.com', 2),
('87623', 0, 'maged@gmail.com', 1),
('87681', 477, 'hadeel@yahoo.com', 3),
('95624', 700, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `trans`
--

CREATE TABLE `trans` (
  `t_id` varchar(45) NOT NULL,
  `v` int(11) NOT NULL,
  `beneficiary_b_email` varchar(45) NOT NULL,
  `credit_card_credit_no` varchar(45) NOT NULL,
  `t_date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trans`
--

INSERT INTO `trans` (`t_id`, `v`, `beneficiary_b_email`, `credit_card_credit_no`, `t_date`) VALUES
('1573816539', 5, 'galaxy@gmail.com', '12345', '2019-11-15'),
('1573818615', 30, 'cadbury@gmail.com', '10981', '2019-11-15'),
('1573818699', 13, 'cadbury@gmail.com', '10981', '2019-11-15'),
('1573819081', 15, 'galaxy@gmail.com', '10981', '2019-11-15'),
('1573819155', 20, 'cadbury@gmail.com', '10981', '2019-11-15'),
('1573819244', 15, 'cadbury@gmail.com', '10981', '2019-11-15'),
('1573820849', 15, 'galaxy@gmail.com', '34451', '2019-11-15'),
('1573821629', 13, 'galaxy@gmail.com', '12345', '2019-11-15'),
('1573832712', 25, 'twix@hotmail.com', '87623', '2019-11-15'),
('1573833159', 5, 'b@gmail.com', '87623', '2019-11-15'),
('1573850397', 5, 'galaxy@gmail.com', '32853', '2019-11-15'),
('1573850758', 15, 'nutella@gmail.com', '87612', '2019-11-15'),
('1573851154', 23, 'galaxy@gmail.com', '87681', '2019-11-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `beneficiary`
--
ALTER TABLE `beneficiary`
  ADD PRIMARY KEY (`b_email`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`c_email`);

--
-- Indexes for table `credit_c`
--
ALTER TABLE `credit_c`
  ADD PRIMARY KEY (`c_no`),
  ADD KEY `fk_credit_card_client1` (`client_c_email`),
  ADD KEY `fk_credit_card_bank` (`bank_bank_id`);

--
-- Indexes for table `trans`
--
ALTER TABLE `trans`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `fk_creditcard` (`credit_card_credit_no`),
  ADD KEY `fk_bemail` (`beneficiary_b_email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `credit_c`
--
ALTER TABLE `credit_c`
  ADD CONSTRAINT `fk_credit_card_bank` FOREIGN KEY (`bank_bank_id`) REFERENCES `bank` (`bank_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_credit_card_client1` FOREIGN KEY (`client_c_email`) REFERENCES `client` (`c_email`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `trans`
--
ALTER TABLE `trans`
  ADD CONSTRAINT `fk_bemail` FOREIGN KEY (`beneficiary_b_email`) REFERENCES `beneficiary` (`b_email`),
  ADD CONSTRAINT `fk_creditcard` FOREIGN KEY (`credit_card_credit_no`) REFERENCES `credit_c` (`c_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
