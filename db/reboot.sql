-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2018 at 05:33 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reboot`
--

-- --------------------------------------------------------

--
-- Table structure for table `arijit2018082008follow`
--

CREATE TABLE `arijit2018082008follow` (
  `id` int(20) NOT NULL,
  `teachertable` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `arijit2018082008follow`
--

INSERT INTO `arijit2018082008follow` (`id`, `teachertable`) VALUES
(1, 'damal2018452008post'),
(2, 'raju2018411508post');

-- --------------------------------------------------------

--
-- Table structure for table `arijit2018082008post`
--

CREATE TABLE `arijit2018082008post` (
  `id` int(20) NOT NULL,
  `content` longtext,
  `date` varchar(100) DEFAULT NULL,
  `postpic` varchar(200) DEFAULT NULL,
  `filepost` varchar(200) DEFAULT NULL,
  `size` varchar(200) DEFAULT NULL,
  `likes` varchar(10) DEFAULT NULL,
  `postid` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `arijit2018082008post`
--

INSERT INTO `arijit2018082008post` (`id`, `content`, `date`, `postpic`, `filepost`, `size`, `likes`, `postid`) VALUES
(1, 'c', ' 24 Aug 2018 09:28am ', NULL, 'arijitroy/Android_Application_Development_For_Dummies.pdf', '10372735', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `arijit2018251508follow`
--

CREATE TABLE `arijit2018251508follow` (
  `id` int(20) NOT NULL,
  `teachertable` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `arijit2018251508follow`
--

INSERT INTO `arijit2018251508follow` (`id`, `teachertable`) VALUES
(1, 'raju2018411508post');

-- --------------------------------------------------------

--
-- Table structure for table `arijit2018251508post`
--

CREATE TABLE `arijit2018251508post` (
  `id` int(20) NOT NULL,
  `content` longtext,
  `date` varchar(100) DEFAULT NULL,
  `postpic` varchar(200) DEFAULT NULL,
  `filepost` varchar(200) DEFAULT NULL,
  `size` varchar(200) DEFAULT NULL,
  `likes` varchar(10) DEFAULT NULL,
  `postid` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `damal2018452008post`
--

CREATE TABLE `damal2018452008post` (
  `id` int(20) NOT NULL,
  `content` longtext,
  `date` varchar(100) DEFAULT NULL,
  `postpic` varchar(200) DEFAULT NULL,
  `filepost` varchar(200) DEFAULT NULL,
  `likes` varchar(10) DEFAULT NULL,
  `size` varchar(200) DEFAULT NULL,
  `postid` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `damal2018452008post`
--

INSERT INTO `damal2018452008post` (`id`, `content`, `date`, `postpic`, `filepost`, `likes`, `size`, `postid`) VALUES
(1, 'Chanaaaaaaaaaaaaaaaaaaaaaaa', ' 11 Aug 2018 11:46pm ', NULL, NULL, '0', NULL, '2018022308'),
(2, 'Besi boro hoe gecho', ' 11 Aug 2018 11:50pm ', NULL, NULL, '0', NULL, '2018322308'),
(3, 'Besi Boro hoiona', ' 11 Aug 2018 11:50pm ', 'damaltas/Slide.jpg', NULL, NULL, NULL, '2018532308'),
(4, 'BESI BARA BARI', ' 11 Aug 2018 11:51pm ', NULL, NULL, '0', NULL, '2018152308');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `content` longtext,
  `postid` varchar(20) NOT NULL,
  `postpic` varchar(200) DEFAULT NULL,
  `filepost` varchar(200) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `email`, `content`, `postid`, `postpic`, `filepost`, `date`) VALUES
(36, '', 'Chanaaaaaaaaaaaaaaaaaaaaaaa', '2018022308', NULL, NULL, NULL),
(37, '', 'Besi boro hoe gecho', '2018322308', NULL, NULL, NULL),
(38, '', 'Besi Boro hoiona', '2018532308', 'damaltas/Slide.jpg', NULL, ' 11 Aug 2018 11:50pm '),
(39, '', 'BESI BARA BARI', '2018152308', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `raju2018411508post`
--

CREATE TABLE `raju2018411508post` (
  `id` int(20) NOT NULL,
  `content` longtext,
  `date` varchar(100) DEFAULT NULL,
  `postpic` varchar(200) DEFAULT NULL,
  `filepost` varchar(200) DEFAULT NULL,
  `likes` varchar(10) DEFAULT NULL,
  `size` varchar(200) DEFAULT NULL,
  `postid` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `registertable`
--

CREATE TABLE `registertable` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(600) NOT NULL,
  `fname` varchar(60) DEFAULT NULL,
  `lname` varchar(60) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `contact` varchar(30) DEFAULT NULL,
  `topic` varchar(100) DEFAULT NULL,
  `profilepic` varchar(200) DEFAULT NULL,
  `data` longtext,
  `followtable` varchar(500) NOT NULL,
  `username` mediumtext,
  `bio` longtext,
  `qualification` longtext,
  `type` varchar(80) DEFAULT NULL,
  `class` varchar(10) DEFAULT NULL,
  `fburl` varchar(500) NOT NULL,
  `twurl` varchar(500) NOT NULL,
  `gpurl` varchar(500) NOT NULL,
  `insturl` varchar(500) NOT NULL,
  `lnkdurl` varchar(500) NOT NULL,
  `yturl` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registertable`
--

INSERT INTO `registertable` (`id`, `email`, `password`, `fname`, `lname`, `name`, `contact`, `topic`, `profilepic`, `data`, `followtable`, `username`, `bio`, `qualification`, `type`, `class`, `fburl`, `twurl`, `gpurl`, `insturl`, `lnkdurl`, `yturl`) VALUES
(79, 'damaltas@gmal.com', 'c4ca4238a0b923820dcc509a6f75849b', 'Damal', 'Tas', 'Damal Tas', '0000000000', 'Chemistry', 'damaltas/av1.png', 'damal2018452008post', '', 'damaltas', NULL, NULL, 'teacher', NULL, '', '', '', '', '', ''),
(81, 'r.arijit20001@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ARIJIT', 'ROY', 'ARIJIT ROY', '54452722222', NULL, 'arijitroy1/av1.png', 'arijit2018251508post', 'arijit2018251508follow', 'arijitroy1', NULL, NULL, 'student', 'XII', '', '', '', '', '', ''),
(78, 'r.arijit2000@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'ARIJIT', 'ROY', 'ARIJIT ROY', '9614196946', NULL, 'arijitroy/logo.jpg', 'arijit2018082008post', 'arijit2018082008follow', 'arijitroy', NULL, NULL, 'student', 'XII', '', '', '', '', '', ''),
(80, 'r@gmai.com', '03c017f682085142f3b60f56673e22dc', 'Raju', 'Sinha', 'Raju Sinha', '9614196946', 'Mathematics', 'rajusinha/av1.png', 'raju2018411508post', '', 'rajusinha', NULL, NULL, 'teacher', NULL, '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arijit2018082008follow`
--
ALTER TABLE `arijit2018082008follow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arijit2018082008post`
--
ALTER TABLE `arijit2018082008post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arijit2018251508follow`
--
ALTER TABLE `arijit2018251508follow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arijit2018251508post`
--
ALTER TABLE `arijit2018251508post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `damal2018452008post`
--
ALTER TABLE `damal2018452008post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `raju2018411508post`
--
ALTER TABLE `raju2018411508post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registertable`
--
ALTER TABLE `registertable`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arijit2018082008follow`
--
ALTER TABLE `arijit2018082008follow`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `arijit2018082008post`
--
ALTER TABLE `arijit2018082008post`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `arijit2018251508follow`
--
ALTER TABLE `arijit2018251508follow`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `arijit2018251508post`
--
ALTER TABLE `arijit2018251508post`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `damal2018452008post`
--
ALTER TABLE `damal2018452008post`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `raju2018411508post`
--
ALTER TABLE `raju2018411508post`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registertable`
--
ALTER TABLE `registertable`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
