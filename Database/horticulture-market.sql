-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2022 at 10:13 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `horticulture-market`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminuser`
--

CREATE TABLE `adminuser` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`id`, `username`, `email`, `password`, `usertype`) VALUES
(1, 'kevin', 'kevin@gmail.com', '123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `blogdata`
--

CREATE TABLE `blogdata` (
  `blogId` int(10) NOT NULL,
  `blogUser` varchar(255) NOT NULL,
  `blogTitle` varchar(255) NOT NULL,
  `blogContent` longtext NOT NULL,
  `blogTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `likes` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogdata`
--

INSERT INTO `blogdata` (`blogId`, `blogUser`, `blogTitle`, `blogContent`, `blogTime`, `likes`) VALUES
(1, 'Wambao', 'Quality Assurance', '<p>Your services are very great</p>\r\n', '2021-11-25 11:29:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blogfeedback`
--

CREATE TABLE `blogfeedback` (
  `blogId` int(10) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `commentUser` varchar(255) NOT NULL,
  `commentPic` varchar(255) NOT NULL DEFAULT 'profile0.png',
  `commentTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogfeedback`
--

INSERT INTO `blogfeedback` (`blogId`, `comment`, `commentUser`, `commentPic`, `commentTime`) VALUES
(1, 'jjkdk', 'wafula', 'profile0.png', '2021-11-28 11:43:39');

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `bid` int(11) NOT NULL,
  `bname` varchar(50) NOT NULL,
  `busername` varchar(50) NOT NULL,
  `bmobile` varchar(15) NOT NULL,
  `bemail` varchar(50) NOT NULL,
  `bpassword` varchar(255) NOT NULL,
  `baddress` text NOT NULL,
  `bactive` int(10) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`bid`, `bname`, `busername`, `bmobile`, `bemail`, `bpassword`, `baddress`, `bactive`, `code`, `status`, `regdate`) VALUES
(8, 'Juma', 'Wambao', '0792526394', 'wafulak728@gmail.com', '$2y$10$YlDJZoD1CEDAFtxzIX2bkufTtTTEA0ZSq2IlXq8OR1zB.C79bSWD.', 'Busia', 0, 266210, 'notverified', '2021-11-25 10:50:58'),
(9, 'Robert', 'Murethi', '0790027948', 'robert@gmail.com', '$2y$10$ohB9PB.RmXdqDOPpPIMvSeb.eJLIHRF6FH5RByZFJAPDv5/7jflce', 'busia', 0, 605369, 'notverified', '2021-11-25 12:16:03');

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `fid` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `fusername` varchar(50) NOT NULL,
  `fpassword` varchar(255) NOT NULL,
  `femail` varchar(50) NOT NULL,
  `fmobile` varchar(15) NOT NULL,
  `faddress` text NOT NULL,
  `factive` int(10) NOT NULL,
  `frating` int(10) NOT NULL,
  `picExt` varchar(255) NOT NULL,
  `picStatus` int(10) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`fid`, `fname`, `fusername`, `fpassword`, `femail`, `fmobile`, `faddress`, `factive`, `frating`, `picExt`, `picStatus`, `code`, `status`, `regdate`) VALUES
(6, 'Ezra', 'Kenyanya', '$2y$10$U/fXEQsVFhDSYGrWxFe3AueJ23rsqNwXNeZ4VUv9/hrjVsy9NDq8a', 'kenyanyahezron@gmail.com', '0792526399', 'Busia', 0, 0, '', 0, 0, 'verified', '2021-11-25 06:51:59'),
(10, 'kevin', 'wafula', '$2y$10$XFkRiOeNc9ffcXMIsttcaOJV2gY/6aTKwLucoY5tNmYzSzta1Q/Ba', 'mosezekiel01@gmail.com', '0792526394', 'Busia', 0, 0, '', 0, 374510, 'notverified', '2021-11-25 10:22:56'),
(11, 'Martin', 'Maina', '$2y$10$/NpkK4IZWmVKY9jvHeIZUup6YRrfhM8FK1hiQ0AQXk/lT5CzWLL32', 'martin1@gmail.com', '0792526394', 'busia', 0, 0, '', 0, 151442, 'notverified', '2021-11-25 12:10:50'),
(12, 'Atieno', 'Cythia', '$2y$10$1fDOVsBS4Kt/fS6ET9QsT.AR.1tLd35bioFsU26IlJUzoYEd6aZ7W', 'cythia@gmail.com', '0722103398', 'kanduyi', 0, 0, '', 0, 574204, 'notverified', '2021-11-25 12:13:31'),
(13, 'kevin', 'wafula', '$2y$10$HtrsbuP0CTED4ITjnwKi6etkiXsswqArK0YdoA6Kw8paEet83hwR.', 'kelvinwafula1999@gmail.com', '0792526394', 'bungoma', 0, 0, '', 0, 789315, 'notverified', '2022-01-28 10:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `fproduct`
--

CREATE TABLE `fproduct` (
  `fid` int(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `pcat` varchar(255) NOT NULL,
  `quantity` float NOT NULL,
  `pinfo` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `pimage` varchar(255) NOT NULL DEFAULT 'blank.png',
  `picStatus` int(10) NOT NULL DEFAULT 0,
  `dateAdded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fproduct`
--

INSERT INTO `fproduct` (`fid`, `pid`, `product`, `pcat`, `quantity`, `pinfo`, `price`, `pimage`, `picStatus`, `dateAdded`) VALUES
(3, 13, 'Apples', 'Fruit', 3, '', 300, 'Apples3.jpg', 1, '2021-12-02 19:08:28'),
(3, 14, 'Avocados', 'Fruit', 3, '', 200, 'Avocados3.jpg', 1, '2021-12-02 19:09:35'),
(3, 15, 'Berries', 'Fruit', 2, '', 350, 'Berries3.jpg', 1, '2021-12-03 21:35:54'),
(3, 16, 'Cauliflower', 'Vegetable', 2, '', 250, 'Cauliflower3.jpg', 1, '2021-12-03 21:38:54'),
(3, 17, 'Tomatoes', 'Vegetable', 10, '', 2500, 'Tomatoes3.jpg', 1, '2021-12-03 21:40:25'),
(3, 18, 'Grapes', 'Fruit', 2, '', 3000, 'Grapes3.jpg', 1, '2021-12-03 21:41:34');

-- --------------------------------------------------------

--
-- Table structure for table `likedata`
--

CREATE TABLE `likedata` (
  `blogId` int(10) NOT NULL,
  `blogUserId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likedata`
--

INSERT INTO `likedata` (`blogId`, `blogUserId`) VALUES
(1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `mycart`
--

CREATE TABLE `mycart` (
  `bid` int(255) NOT NULL,
  `pid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mycart`
--

INSERT INTO `mycart` (`bid`, `pid`) VALUES
(3, 1),
(3, 3),
(8, 7),
(3, 10),
(3, 11),
(3, 13);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `pid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rating` int(10) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `tid` int(10) NOT NULL,
  `bid` int(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `addr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tid`, `bid`, `pid`, `name`, `city`, `mobile`, `email`, `pincode`, `addr`) VALUES
(1, 9, 0, 'Robert', 'bungoma', '0790027948', 'robert@gmail.com', '5566', 'Busia'),
(2, 9, 0, 'robert', 'bungoma', '0790027948', 'robert@gmail.com', '56789', 'Busia'),
(3, 3, 0, 'Wafula', 'bungoma', '0792526394', 'kelvinwafula1999@gmail.com', '7788899', 'bungoma'),
(4, 3, 0, 'Wafula', 'bungoma', '0792526394', 'kelvinwafula1999@gmail.com', '8999090', 'bungoma');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminuser`
--
ALTER TABLE `adminuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogdata`
--
ALTER TABLE `blogdata`
  ADD PRIMARY KEY (`blogId`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `fproduct`
--
ALTER TABLE `fproduct`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminuser`
--
ALTER TABLE `adminuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogdata`
--
ALTER TABLE `blogdata`
  MODIFY `blogId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `fproduct`
--
ALTER TABLE `fproduct`
  MODIFY `pid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `tid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
