-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2018 at 05:53 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `escrowisfy`
--

-- --------------------------------------------------------

--
-- Table structure for table `escrowsify_orders`
--

CREATE TABLE `escrowsify_orders` (
  `tblid` int(11) NOT NULL,
  `userid` int(11) NOT NULL DEFAULT '0',
  `produuctid` int(11) NOT NULL DEFAULT '0',
  `delieveredby` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `cancelled` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime DEFAULT NULL,
  `delieveredon` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `escrowsify_orders`
--

INSERT INTO `escrowsify_orders` (`tblid`, `userid`, `produuctid`, `delieveredby`, `status`, `cancelled`, `created_on`, `delieveredon`) VALUES
(1, 1, 1, 1, 1, 0, '2018-02-03 16:59:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `escrowsify_tblcustomer`
--

CREATE TABLE `escrowsify_tblcustomer` (
  `tblid` int(11) NOT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `emailaddres` varchar(70) DEFAULT NULL,
  `phonenumber` varchar(15) NOT NULL DEFAULT '0',
  `username` varchar(12) DEFAULT NULL,
  `address` varchar(70) DEFAULT NULL,
  `userpassword` varchar(50) DEFAULT NULL,
  `createdon` datetime DEFAULT NULL,
  `updatedon` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `escrowsify_tblcustomercards`
--

CREATE TABLE `escrowsify_tblcustomercards` (
  `tblid` int(11) NOT NULL,
  `customerid` int(11) NOT NULL DEFAULT '0',
  `cardnumbers` varchar(50) DEFAULT NULL,
  `holdersname` varchar(30) DEFAULT NULL,
  `cvv` varchar(50) DEFAULT NULL,
  `pin` varchar(50) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `escrowsify_tbldelivery`
--

CREATE TABLE `escrowsify_tbldelivery` (
  `tblid` int(11) NOT NULL,
  `fisrtname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `username` varchar(12) DEFAULT NULL,
  `userpassword` varchar(50) DEFAULT NULL,
  `createdby` int(11) NOT NULL DEFAULT '0',
  `updatedby` int(11) NOT NULL DEFAULT '0',
  `createdon` datetime DEFAULT NULL,
  `updatedon` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `escrowsify_tbldelivery`
--

INSERT INTO `escrowsify_tbldelivery` (`tblid`, `fisrtname`, `lastname`, `email`, `username`, `userpassword`, `createdby`, `updatedby`, `createdon`, `updatedon`) VALUES
(1, 'Chimaobi', 'Ogudu', 'chimaken73@gmail.com', 'chimaken', '827ccb0eea8a706c4c34a16891f84e7b', 1, 0, '2018-02-03 13:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `escrowsify_tblescrow`
--

CREATE TABLE `escrowsify_tblescrow` (
  `tblid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `payoutstatus` int(11) NOT NULL,
  `refundstatus` int(11) NOT NULL,
  `addedon` int(11) NOT NULL,
  `paidon` int(11) NOT NULL,
  `refundedon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `escrowsify_tblmerchantshop`
--

CREATE TABLE `escrowsify_tblmerchantshop` (
  `tblid` int(11) NOT NULL,
  `fisrtname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `userpassword` varchar(50) DEFAULT NULL,
  `userrole` varchar(9) DEFAULT NULL,
  `useractive` tinyint(1) NOT NULL DEFAULT '1',
  `createdby` int(11) NOT NULL DEFAULT '0',
  `updatedby` int(11) NOT NULL DEFAULT '0',
  `createdon` datetime DEFAULT NULL,
  `updatedon` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `escrowsify_tblpaymentcom`
--

CREATE TABLE `escrowsify_tblpaymentcom` (
  `tblid` int(11) NOT NULL,
  `fisrtname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `useremail` varchar(20) DEFAULT NULL,
  `userpassword` varchar(50) DEFAULT NULL,
  `userrole` varchar(9) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `createdon` datetime DEFAULT NULL,
  `updatedon` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `escrowsify_tblpaymentcom`
--

INSERT INTO `escrowsify_tblpaymentcom` (`tblid`, `fisrtname`, `lastname`, `username`, `useremail`, `userpassword`, `userrole`, `active`, `created_by`, `updated_by`, `createdon`, `updatedon`) VALUES
(1, 'Chimaobi', 'Ogudu', 'chimaken', 'chimaken73@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin', 1, 1, 0, '2018-02-02 09:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `escrowsify_tblpayments`
--

CREATE TABLE `escrowsify_tblpayments` (
  `tblid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `escrowsify_tblproduct`
--

CREATE TABLE `escrowsify_tblproduct` (
  `tblid` int(11) NOT NULL,
  `productname` varchar(20) DEFAULT NULL,
  `productDes` text,
  `productPrice` varchar(9) DEFAULT '0',
  `couponallowed` tinyint(1) NOT NULL DEFAULT '0',
  `discountedprice` varchar(9) NOT NULL DEFAULT '0',
  `productimage` varchar(20) DEFAULT NULL,
  `createdby` int(11) NOT NULL DEFAULT '0',
  `updatedby` int(11) NOT NULL DEFAULT '0',
  `createdon` datetime DEFAULT NULL,
  `updatedon` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `escrowsify_tblrefunds`
--

CREATE TABLE `escrowsify_tblrefunds` (
  `tblid` int(11) NOT NULL,
  `orderid` int(11) DEFAULT NULL,
  `amountcustomer` varchar(12) DEFAULT '0',
  `amountmerchant` varchar(12) NOT NULL DEFAULT '0',
  `createdon` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `escrowsify_orders`
--
ALTER TABLE `escrowsify_orders`
  ADD PRIMARY KEY (`tblid`);

--
-- Indexes for table `escrowsify_tblcustomer`
--
ALTER TABLE `escrowsify_tblcustomer`
  ADD PRIMARY KEY (`tblid`);

--
-- Indexes for table `escrowsify_tblcustomercards`
--
ALTER TABLE `escrowsify_tblcustomercards`
  ADD PRIMARY KEY (`tblid`);

--
-- Indexes for table `escrowsify_tbldelivery`
--
ALTER TABLE `escrowsify_tbldelivery`
  ADD PRIMARY KEY (`tblid`);

--
-- Indexes for table `escrowsify_tblescrow`
--
ALTER TABLE `escrowsify_tblescrow`
  ADD PRIMARY KEY (`tblid`);

--
-- Indexes for table `escrowsify_tblmerchantshop`
--
ALTER TABLE `escrowsify_tblmerchantshop`
  ADD PRIMARY KEY (`tblid`);

--
-- Indexes for table `escrowsify_tblpaymentcom`
--
ALTER TABLE `escrowsify_tblpaymentcom`
  ADD PRIMARY KEY (`tblid`);

--
-- Indexes for table `escrowsify_tblpayments`
--
ALTER TABLE `escrowsify_tblpayments`
  ADD PRIMARY KEY (`tblid`);

--
-- Indexes for table `escrowsify_tblproduct`
--
ALTER TABLE `escrowsify_tblproduct`
  ADD PRIMARY KEY (`tblid`);

--
-- Indexes for table `escrowsify_tblrefunds`
--
ALTER TABLE `escrowsify_tblrefunds`
  ADD PRIMARY KEY (`tblid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `escrowsify_orders`
--
ALTER TABLE `escrowsify_orders`
  MODIFY `tblid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `escrowsify_tblcustomer`
--
ALTER TABLE `escrowsify_tblcustomer`
  MODIFY `tblid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `escrowsify_tblcustomercards`
--
ALTER TABLE `escrowsify_tblcustomercards`
  MODIFY `tblid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `escrowsify_tbldelivery`
--
ALTER TABLE `escrowsify_tbldelivery`
  MODIFY `tblid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `escrowsify_tblescrow`
--
ALTER TABLE `escrowsify_tblescrow`
  MODIFY `tblid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `escrowsify_tblmerchantshop`
--
ALTER TABLE `escrowsify_tblmerchantshop`
  MODIFY `tblid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `escrowsify_tblpaymentcom`
--
ALTER TABLE `escrowsify_tblpaymentcom`
  MODIFY `tblid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `escrowsify_tblpayments`
--
ALTER TABLE `escrowsify_tblpayments`
  MODIFY `tblid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `escrowsify_tblproduct`
--
ALTER TABLE `escrowsify_tblproduct`
  MODIFY `tblid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `escrowsify_tblrefunds`
--
ALTER TABLE `escrowsify_tblrefunds`
  MODIFY `tblid` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
