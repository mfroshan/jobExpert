-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 08:43 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'business and management'),
(2, 'Computing and ICT'),
(3, 'Design, arts and crafts'),
(4, 'Technician');

-- --------------------------------------------------------

--
-- Table structure for table `chat_child`
--

CREATE TABLE `chat_child` (
  `chat_child_id` int(11) NOT NULL,
  `chat_master_id` int(11) NOT NULL,
  `sendmsg` int(11) NOT NULL,
  `timeStamp` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_master`
--

CREATE TABLE `chat_master` (
  `chat_master_id` int(11) NOT NULL,
  `jsID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `Cid` int(11) NOT NULL,
  `Cusername` varchar(100) NOT NULL,
  `cName` varchar(100) NOT NULL,
  `Cnum` varchar(10) NOT NULL,
  `Cdes` longtext NOT NULL,
  `cImage` longtext NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `connection`
--

CREATE TABLE `connection` (
  `con_id` int(11) NOT NULL,
  `jsID` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `connection_child`
--

CREATE TABLE `connection_child` (
  `con_cid` int(11) NOT NULL,
  `con_id` int(11) NOT NULL,
  `conneted_jsID` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `job_name` varchar(100) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `Cid` int(11) NOT NULL,
  `jdes` longtext NOT NULL,
  `posted_t_d` date NOT NULL DEFAULT current_timestamp(),
  `jstatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker`
--

CREATE TABLE `jobseeker` (
  `jsID` int(11) NOT NULL,
  `jusername` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `phonenumber` varchar(10) NOT NULL,
  `image` longtext NOT NULL,
  `jobstatus` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobseeker`
--

INSERT INTO `jobseeker` (`jsID`, `jusername`, `fname`, `lname`, `phonenumber`, `image`, `jobstatus`) VALUES
(8, 'r@gmail.com', 'roshan', 'francis', '99999999', 'ROSHAN PASSPORT1.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `job_apply_c`
--

CREATE TABLE `job_apply_c` (
  `job_apply_cid` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `jobm_id` int(11) NOT NULL,
  `cv` longtext NOT NULL,
  `selectStatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_apply_m`
--

CREATE TABLE `job_apply_m` (
  `jobm_id` int(11) NOT NULL,
  `jsID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `type` varchar(10) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `type`, `status`) VALUES
('admin', 'admin', 'admin', 0),
('r@gmail.com', '11', 'jobseeker', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `chat_child`
--
ALTER TABLE `chat_child`
  ADD PRIMARY KEY (`chat_child_id`);

--
-- Indexes for table `chat_master`
--
ALTER TABLE `chat_master`
  ADD PRIMARY KEY (`chat_master_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`Cid`),
  ADD KEY `Cusername` (`Cusername`);

--
-- Indexes for table `connection`
--
ALTER TABLE `connection`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `connection_child`
--
ALTER TABLE `connection_child`
  ADD PRIMARY KEY (`con_cid`),
  ADD KEY `con_id` (`con_id`),
  ADD KEY `conneted_jsID` (`conneted_jsID`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `Cid` (`Cid`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `jobseeker`
--
ALTER TABLE `jobseeker`
  ADD PRIMARY KEY (`jsID`),
  ADD KEY `jusername` (`jusername`);

--
-- Indexes for table `job_apply_c`
--
ALTER TABLE `job_apply_c`
  ADD PRIMARY KEY (`job_apply_cid`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `jobm_id` (`jobm_id`);

--
-- Indexes for table `job_apply_m`
--
ALTER TABLE `job_apply_m`
  ADD PRIMARY KEY (`jobm_id`),
  ADD KEY `jsID` (`jsID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chat_child`
--
ALTER TABLE `chat_child`
  MODIFY `chat_child_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_master`
--
ALTER TABLE `chat_master`
  MODIFY `chat_master_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `Cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `connection`
--
ALTER TABLE `connection`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `connection_child`
--
ALTER TABLE `connection_child`
  MODIFY `con_cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobseeker`
--
ALTER TABLE `jobseeker`
  MODIFY `jsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job_apply_c`
--
ALTER TABLE `job_apply_c`
  MODIFY `job_apply_cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job_apply_m`
--
ALTER TABLE `job_apply_m`
  MODIFY `jobm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`Cusername`) REFERENCES `login` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `connection_child`
--
ALTER TABLE `connection_child`
  ADD CONSTRAINT `connection_child_ibfk_1` FOREIGN KEY (`con_id`) REFERENCES `connection` (`con_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `connection_child_ibfk_2` FOREIGN KEY (`conneted_jsID`) REFERENCES `jobseeker` (`jsID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`Cid`) REFERENCES `company` (`Cid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jobs_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobseeker`
--
ALTER TABLE `jobseeker`
  ADD CONSTRAINT `jobseeker_ibfk_1` FOREIGN KEY (`jusername`) REFERENCES `login` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_apply_c`
--
ALTER TABLE `job_apply_c`
  ADD CONSTRAINT `job_apply_c_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `job_apply_c_ibfk_2` FOREIGN KEY (`jobm_id`) REFERENCES `job_apply_m` (`jobm_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_apply_m`
--
ALTER TABLE `job_apply_m`
  ADD CONSTRAINT `job_apply_m_ibfk_1` FOREIGN KEY (`jsID`) REFERENCES `jobseeker` (`jsID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
