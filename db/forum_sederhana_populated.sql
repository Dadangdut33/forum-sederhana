-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2021 at 05:39 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum_sederhana`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `userID` varchar(50) NOT NULL,
  `postID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `content`, `time`, `userID`, `postID`) VALUES
(1, 'Bagus bro lu harus nonton!!!!', '2021-12-21 05:28:20', 'definitelynotfauzan', 1),
(2, 'oiya ngomong2 topic anda salah bro!!!!', '2021-12-21 05:28:43', 'definitelynotfauzan', 1),
(3, 'oiya, terimakasih @definitelynotfauzan akan segera saya ganti tag nya! ', '2021-12-21 05:29:11', 'Fauzan', 1),
(9, 'DASDSADS QADSA SD SAD SA DASD ASD A DA DASDSADS QADSA SD SAD SA DASD ASD A DA DASDSADS QADSA SD SAD SA DASD ASD A DA DASDSADS QADSA SD SAD SA DASD ASD A DA DASDSADS QADSA SD SAD SA DASD ASD A DA DASDSADS QADSA SD SAD SA DASD ASD A DA ', '2021-12-21 12:03:42', 'definitelynotfauzan', 1),
(23, 'alert(\"Hello\")', '2021-12-21 12:23:44', 'definitelynotfauzan', 6);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `details` varchar(500) NOT NULL,
  `link` varchar(500) DEFAULT NULL,
  `type` varchar(300) DEFAULT NULL,
  `isRead` tinyint(1) DEFAULT 0,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `userID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `details`, `link`, `type`, `isRead`, `time`, `userID`) VALUES
(1, 'A user commented on your post titled \"Spiderman yang terbaru? Apakah bagus??\"', 'post/index?id=1#comment-1', 'Post Comment', 0, '2021-12-21 05:28:20', 'Fauzan'),
(2, 'A user commented on your post titled \"Spiderman yang terbaru? Apakah bagus??\"', 'post/index?id=1#comment-2', 'Post Comment', 0, '2021-12-21 05:28:44', 'Fauzan'),
(3, 'A user mentioned you in a comment on a post titled \"Spiderman yang terbaru? Apakah bagus??\"', 'post/index?id=1#comment-3', 'Comment Mention', 0, '2021-12-21 05:29:12', 'definitelynotfauzan'),
(4, 'Your post is a spam', '#', 'Post Deleted By Admin', 0, '2021-12-21 11:40:42', 'definitelynotfauzan'),
(5, 'A user commented on your post titled \"Spiderman yang terbaru? Apakah bagus?? \"', 'post/index?id=1#comment-5', 'Post Comment', 0, '2021-12-21 11:53:33', 'Fauzan'),
(7, 'A user commented on your post titled \"Spiderman yang terbaru? Apakah bagus?? \"', 'post/index?id=1#comment-6', 'Post Comment', 0, '2021-12-21 11:58:13', 'Fauzan'),
(8, 'A user commented on your post titled \"Spiderman yang terbaru? Apakah bagus?? \"', 'post/index?id=1#comment-7', 'Post Comment', 0, '2021-12-21 11:58:16', 'Fauzan'),
(11, 'A user commented on your post titled \"Spiderman yang terbaru? Apakah bagus?? \"', 'post/index?id=1#comment-8', 'Post Comment', 0, '2021-12-21 12:03:40', 'Fauzan'),
(12, 'A user commented on your post titled \"Spiderman yang terbaru? Apakah bagus?? \"', 'post/index?id=1#comment-9', 'Post Comment', 0, '2021-12-21 12:03:42', 'Fauzan'),
(14, 'TESTATTATTA', '#', 'Post Deleted By Admin', 1, '2021-12-21 12:06:01', 'definitelynotfauzan'),
(21, 'd asD DA AS DAS sd asD DA AS DAS sd asD DA AS DAS sd asD DA AS DAS s', '#', 'Comment Deleted By Admin', 1, '2021-12-21 12:12:31', 'definitelynotfauzan'),
(22, 'test', '#', 'Comment Deleted By Admin', 1, '2021-12-21 12:22:33', 'definitelynotfauzan'),
(23, 'tessssss', '#', 'Post Deleted By Admin', 0, '2021-12-21 12:22:41', 'definitelynotfauzan'),
(24, 'A user commented on your post titled \"Haloooooo\"', 'post/index?id=7#comment-24', 'Post Comment', 1, '2021-12-21 15:26:35', 'odi');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` varchar(5000) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `userID` varchar(50) NOT NULL,
  `topicID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `time`, `userID`, `topicID`) VALUES
(1, 'Spiderman yang terbaru? Apakah bagus??    ', 'Saya ingin menonton tapi belum sempat. Apakah bagus kira-kira movienya?', '2021-12-21 05:27:19', 'Fauzan', 3),
(6, ' asokd oas ndosa nmoSD NOsadn oasn d', 'alert(\"Hello\")', '2021-12-21 12:23:17', 'definitelynotfauzan', 1),
(7, 'Haloooooo', 'haloooo aku suka sekree hehehehehhhe', '2021-12-21 15:26:21', 'odi', 5),
(8, 'Sedikit Spoiler Spiderman', 'jadiiii ginni pokoknya spidermannya ada 3 dannn si tobeyy tiba2 udah tua gt udah ga kaya dulu lagii. Udah tamat!!!', '2021-12-21 15:29:19', 'odi', 3);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`id`, `name`) VALUES
(1, 'General'),
(2, 'Games'),
(3, 'Movies'),
(4, 'Music'),
(5, 'Science'),
(6, 'Random Discussion');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL,
  `isAdmin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `email`, `isAdmin`) VALUES
('definitelynotfauzan', '$2y$10$FVHBInVAEn8TZbgovcF5Q.4cJrpQSUiOCnlUrU0JDW8PtectJKZcy', 'emaillagi@gmail.com', 0),
('Fauzan', '$2y$10$ydNTXoSQbxX6RV9Hnjmn.OC.NNyIm9F0mNqqbp0g04ZQv5Pm8/09u', 'iniemail@gmail.com', 1),
('odi', '$2y$10$YHKquHOxbMXLSqyr/oyoTuSP6S23xEePXDYAwavQD3/sSDr4ySqEu', 'ajimi123@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_UserComment` (`userID`),
  ADD KEY `FK_CommentPost` (`postID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_UserNotif` (`userID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_UserPost` (`userID`),
  ADD KEY `FK_PostTopic` (`topicID`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_CommentPost` FOREIGN KEY (`postID`) REFERENCES `post` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_UserComment` FOREIGN KEY (`userID`) REFERENCES `users` (`username`) ON DELETE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `FK_UserNotif` FOREIGN KEY (`userID`) REFERENCES `users` (`username`) ON DELETE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_PostTopic` FOREIGN KEY (`topicID`) REFERENCES `topic` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_UserPost` FOREIGN KEY (`userID`) REFERENCES `users` (`username`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
