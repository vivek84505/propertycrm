-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2022 at 07:06 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `propertycrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leadenqstagemaster`
--

CREATE TABLE `tbl_leadenqstagemaster` (
  `leadenqstageid` int(11) NOT NULL,
  `enqstage` varchar(100) DEFAULT NULL,
  `isactive` bit(1) DEFAULT NULL,
  `createdby` varchar(100) DEFAULT NULL,
  `createddate` datetime DEFAULT NULL,
  `lastmodifiedby` varchar(100) DEFAULT NULL,
  `lastmodifieddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leadlogs`
--

CREATE TABLE `tbl_leadlogs` (
  `leadlogid` int(11) NOT NULL,
  `leadid` int(11) NOT NULL,
  `logtext` text DEFAULT NULL,
  `createdby` varchar(100) DEFAULT NULL,
  `createddate` datetime DEFAULT NULL,
  `lastmodifiedby` varchar(100) DEFAULT NULL,
  `lastmodifieddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leadmaster`
--

CREATE TABLE `tbl_leadmaster` (
  `leadid` int(11) NOT NULL,
  `leadowner` varchar(100) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `alt_mobile` varchar(100) DEFAULT NULL,
  `enquiery_stage` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `leadsourceid` int(11) DEFAULT NULL,
  `leadstatusid` int(11) DEFAULT NULL,
  `interested_project_type` varchar(100) DEFAULT NULL,
  `customer_budget` bigint(20) DEFAULT NULL,
  `floor_preference` varchar(100) DEFAULT NULL,
  `address_street` text DEFAULT NULL,
  `address_state` text DEFAULT NULL,
  `address_city` varchar(100) DEFAULT NULL,
  `address_zipcode` varchar(100) DEFAULT NULL,
  `lead_description` text DEFAULT NULL,
  `is_opportunity` int(11) DEFAULT NULL,
  `isactive` int(11) DEFAULT NULL,
  `isdeleted` int(11) DEFAULT NULL,
  `leadassignedto` int(11) DEFAULT NULL,
  `createdby` varchar(100) DEFAULT NULL,
  `createddate` datetime DEFAULT NULL,
  `lastmodifiedby` varchar(100) DEFAULT NULL,
  `lastmodifieddate` datetime DEFAULT NULL,
  `project_interested_in` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`project_interested_in`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leadsourcemaster`
--

CREATE TABLE `tbl_leadsourcemaster` (
  `leadsourceid` int(11) NOT NULL,
  `leadsource` varchar(100) DEFAULT NULL,
  `isactive` bit(1) DEFAULT NULL,
  `createdby` varchar(100) DEFAULT NULL,
  `createddate` datetime DEFAULT NULL,
  `lastmodifiedby` varchar(100) DEFAULT NULL,
  `lastmodifieddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leadstatusmaster`
--

CREATE TABLE `tbl_leadstatusmaster` (
  `leadstatusid` int(11) NOT NULL,
  `leadstatus` varchar(100) DEFAULT NULL,
  `isactive` bit(1) DEFAULT NULL,
  `createdby` varchar(100) DEFAULT NULL,
  `createddate` datetime DEFAULT NULL,
  `lastmodifiedby` varchar(100) DEFAULT NULL,
  `lastmodifieddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leadunits_interestedin`
--

CREATE TABLE `tbl_leadunits_interestedin` (
  `leadunitid` int(11) NOT NULL,
  `leadid` int(11) DEFAULT NULL,
  `unit` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `userrole` varchar(100) DEFAULT NULL,
  `isactive` bit(1) DEFAULT NULL,
  `email_verified` bit(1) DEFAULT NULL,
  `createdby` varchar(100) DEFAULT NULL,
  `createddate` datetime DEFAULT NULL,
  `lastmodifiedby` varchar(100) DEFAULT NULL,
  `lastmodifieddate` datetime DEFAULT NULL,
  `lastlogin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `password`, `mobile`, `userrole`, `isactive`, `email_verified`, `createdby`, `createddate`, `lastmodifiedby`, `lastmodifieddate`, `lastlogin`) VALUES
(1, NULL, NULL, 'vivek@gmail.com', '$2y$10$mtSjtRJUbBXaihy.vRGyM.S.haORMhtkv82BDPsVzR0FcprM1QSoy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_leadenqstagemaster`
--
ALTER TABLE `tbl_leadenqstagemaster`
  ADD PRIMARY KEY (`leadenqstageid`);

--
-- Indexes for table `tbl_leadlogs`
--
ALTER TABLE `tbl_leadlogs`
  ADD PRIMARY KEY (`leadlogid`);

--
-- Indexes for table `tbl_leadmaster`
--
ALTER TABLE `tbl_leadmaster`
  ADD PRIMARY KEY (`leadid`);

--
-- Indexes for table `tbl_leadsourcemaster`
--
ALTER TABLE `tbl_leadsourcemaster`
  ADD PRIMARY KEY (`leadsourceid`);

--
-- Indexes for table `tbl_leadstatusmaster`
--
ALTER TABLE `tbl_leadstatusmaster`
  ADD PRIMARY KEY (`leadstatusid`);

--
-- Indexes for table `tbl_leadunits_interestedin`
--
ALTER TABLE `tbl_leadunits_interestedin`
  ADD PRIMARY KEY (`leadunitid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_leadenqstagemaster`
--
ALTER TABLE `tbl_leadenqstagemaster`
  MODIFY `leadenqstageid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_leadlogs`
--
ALTER TABLE `tbl_leadlogs`
  MODIFY `leadlogid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_leadmaster`
--
ALTER TABLE `tbl_leadmaster`
  MODIFY `leadid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_leadsourcemaster`
--
ALTER TABLE `tbl_leadsourcemaster`
  MODIFY `leadsourceid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_leadstatusmaster`
--
ALTER TABLE `tbl_leadstatusmaster`
  MODIFY `leadstatusid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_leadunits_interestedin`
--
ALTER TABLE `tbl_leadunits_interestedin`
  MODIFY `leadunitid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
