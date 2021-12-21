-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2021 at 06:18 AM
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
(2, 'ANother post adasdasdaaaab i edited this', '2021-12-21 01:58:18', 'Fauzan2', 3),
(4, 'TEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSS ', '2021-12-21 02:01:44', 'Fauzan2', 3),
(7, 'TESADSADA AGAIN EDITED BY MEEEEEE', '2021-12-21 02:03:26', 'Fauzan2', 3),
(8, 'TESADSADA AGAIN', '2021-12-21 02:03:37', 'Fauzan2', 3),
(9, 'TESADSADA AGAIN', '2021-12-21 02:03:37', 'Fauzan2', 3),
(10, 'TESADSADA AGAIN', '2021-12-21 02:03:52', 'Fauzan2', 3),
(11, 'TESADSADA AGAIN', '2021-12-21 02:04:02', 'Fauzan2', 3),
(12, 'TEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSS', '2021-12-21 02:13:27', 'Fauzan2', 3),
(14, 'TEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSS', '2021-12-21 02:13:55', 'Fauzan2', 3),
(15, 'TEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSS', '2021-12-21 02:14:39', 'Fauzan2', 3),
(16, 'TEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSS', '2021-12-21 02:14:47', 'Fauzan2', 3),
(17, 'TEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSSTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESSSSSSSSS', '2021-12-21 02:15:06', 'Fauzan2', 3),
(18, 'Hello', '2021-12-21 02:20:18', 'Fauzan', 3),
(19, 'TEST AAAAaaaaaaaaaaaaaa', '2021-12-21 04:32:19', 'Fauzan2', 1),
(20, 'Test sekarang kita test @a @aaa @Fauzan ini masuk sekali doang seharusnya @Fauzan', '2021-12-21 04:32:45', 'Fauzan2', 1),
(21, 'Test sekarang kita test @a @aaa @Fauzan ini masuk sekali doang seharusnya @Fauzan', '2021-12-21 04:33:09', 'Fauzan2', 1),
(22, 'test notiftest notiftest notiftest notiftest notif', '2021-12-21 04:34:45', 'Fauzan', 3),
(23, 'tessssatest notiftest notiftest notiftest notiftest notiftest notif', '2021-12-21 04:35:54', 'Fauzan2', 1),
(24, 'TYREASDASDSADASDAASD ASD AS DSAD A', '2021-12-21 04:36:34', 'Fauzan', 3),
(25, 'TYREASDASDSADASDAASD ASD AS DSAD A', '2021-12-21 04:39:59', 'Fauzan', 3),
(26, 'INI PASTI MASUK KE NOTIF TAHU SAYA', '2021-12-21 04:40:12', 'Fauzan', 3),
(27, 'INI PASTI MASUK KE NOTIF TAHU SAYA @Fauzan2 @Fauzan2 INI MASUK TAG JUGA TP 1 KALI DOANG PASTINYAAAA @A @B @CCCC', '2021-12-21 04:40:34', 'Fauzan', 3),
(28, 'test tag @Fauzan adasdsadsadasdaddasdsa', '2021-12-21 04:42:24', 'Fauzan2', 3),
(29, 'test tag @Fauzan adasdsadsadasdaddasdsa', '2021-12-21 04:43:06', 'Fauzan', 3),
(30, 'test tag @Fauzan2 adasdsadsadasdaddasdsa', '2021-12-21 04:43:22', 'Fauzan', 3),
(31, 'test tag @Fauzan2 adasdsadsadasdaddasdsa', '2021-12-21 04:43:40', 'Fauzan', 1),
(32, 'test tag @Fauzan2 adasdsadsadasdaddasdsa', '2021-12-21 04:44:52', 'Fauzan', 1),
(33, 'test tag @Fauzan2 adasdsadsadasdaddasdsa', '2021-12-21 04:45:17', 'Fauzan', 1),
(34, 'test tag @Fauzan2 adasdsadsadasdaddasdsa', '2021-12-21 04:45:33', 'Fauzan', 1),
(35, 'test tag @Fauzan2 adasdsadsadasdaddasdsa', '2021-12-21 04:46:04', 'Fauzan', 1),
(36, 'test tag @Fauzan2 adasdsadsadasdaddasdsa', '2021-12-21 04:48:07', 'Fauzan', 1),
(37, 'TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas', '2021-12-21 04:48:18', 'Fauzan', 3),
(38, 'TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas', '2021-12-21 04:48:43', 'Fauzan', 3),
(39, 'test tag @Fauzan2 adasdsadsadasdaddasdsa', '2021-12-21 04:49:03', 'Fauzan', 1),
(40, 'TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas', '2021-12-21 04:49:03', 'Fauzan', 3),
(41, 'TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas', '2021-12-21 04:49:26', 'Fauzan', 1),
(42, 'TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas', '2021-12-21 04:49:32', 'Fauzan', 1),
(43, 'test tag @Fauzan2 adasdsadsadasdaddasdsa', '2021-12-21 04:49:32', 'Fauzan', 1),
(44, 'test tag @Fauzan2 adasdsadsadasdaddasdsa', '2021-12-21 04:50:35', 'Fauzan', 1),
(45, 'TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas', '2021-12-21 04:50:35', 'Fauzan', 1),
(46, 'TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas', '2021-12-21 04:51:01', 'Fauzan', 1),
(47, 'TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas', '2021-12-21 04:52:28', 'Fauzan', 1),
(48, 'TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas', '2021-12-21 04:52:29', 'Fauzan', 1),
(49, 'TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas', '2021-12-21 04:52:51', 'Fauzan', 1),
(50, 'TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas', '2021-12-21 04:52:51', 'Fauzan', 1),
(51, 'TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas', '2021-12-21 04:53:04', 'Fauzan', 1),
(52, 'TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas', '2021-12-21 04:53:04', 'Fauzan', 1),
(53, 'TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas', '2021-12-21 04:53:22', 'Fauzan', 1),
(54, 'TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas', '2021-12-21 04:53:23', 'Fauzan', 1),
(55, 'TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas', '2021-12-21 04:56:11', 'Fauzan', 1),
(56, 'TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas', '2021-12-21 04:56:11', 'Fauzan', 1),
(57, 'test notif @Fauzan2 Dakodsaokdkosadkoakosdkoa', '2021-12-21 04:56:30', 'Fauzan', 1),
(58, 'TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas TTESTTTTTTTTT @Fauzan2 dadsadasdasdasdasdasdadas', '2021-12-21 04:58:18', 'Fauzan', 1),
(59, 'test notif @Fauzan2 Dakodsaokdkosadkoakosdkoa', '2021-12-21 04:58:19', 'Fauzan', 1),
(60, 'test notif @Fauzan2 Dakodsaokdkosadkoakosdkoa', '2021-12-21 04:58:38', 'Fauzan', 1),
(61, 'test notif @Fauzan2 Dakodsaokdkosadkoakosdkoa', '2021-12-21 04:58:55', 'Fauzan', 1),
(62, 'test notif @Fauzan2 Dakodsaokdkosadkoakosdkoa', '2021-12-21 04:59:21', 'Fauzan', 1),
(63, 'test notif @Fauzan2 Dakodsaokdkosadkoakosdkoa', '2021-12-21 04:59:30', 'Fauzan', 1),
(64, 'test notif @Fauzan2 Dakodsaokdkosadkoakosdkoa', '2021-12-21 04:59:50', 'Fauzan', 1),
(65, 'test notif @Fauzan2 Dakodsaokdkosadkoakosdkoa', '2021-12-21 05:00:06', 'Fauzan', 1),
(66, 'test notif @Fauzan2 Dakodsaokdkosadkoakosdkoa', '2021-12-21 05:01:21', 'Fauzan', 1),
(67, 'test notif @Fauzan2 Dakodsaokdkosadkoakosdkoa', '2021-12-21 05:02:19', 'Fauzan', 1),
(68, 'test notif @Fauzan2 Dakodsaokdkosadkoakosdkoa', '2021-12-21 05:02:44', 'Fauzan', 1),
(69, 'test notif @Fauzan2 Dakodsaokdkosadkoakosdkoa', '2021-12-21 05:02:48', 'Fauzan', 1),
(70, 'test notif @Fauzan2 Dakodsaokdkosadkoakosdkoa', '2021-12-21 05:02:57', 'Fauzan', 1),
(71, 'test notif @Fauzan2 Dakodsaokdkosadkoakosdkoa', '2021-12-21 05:04:24', 'Fauzan', 1),
(72, 'test notif @Fauzan2 Dakodsaokdkosadkoakosdkoa', '2021-12-21 05:04:36', 'Fauzan', 1),
(73, 'test notif @Fauzan2 Dakodsaokdkosadkoakosdkoa', '2021-12-21 05:06:12', 'Fauzan', 1),
(74, 'test notif @Fauzan2 Dakodsaokdkosadkoakosdkoa', '2021-12-21 05:06:22', 'Fauzan', 1),
(75, 'test notif @Fauzan2 Dakodsaokdkosadkoakosdkoa', '2021-12-21 05:07:30', 'Fauzan', 1),
(76, 'test notif @Fauzan2 Dakodsaokdkosadkoakosdkoa', '2021-12-21 05:08:19', 'Fauzan', 1),
(77, 'test notif @Fauzan2 Dakodsaokdkosadkoakosdkoa', '2021-12-21 05:08:27', 'Fauzan', 1),
(78, '@Fauzan TESATASRASDASIKO DMASO MDOAS ND AS @Fauzan @Fauzan2', '2021-12-21 05:09:21', 'Fauzan2', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `details` varchar(500) NOT NULL,
  `link` varchar(500) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `userID` varchar(50) NOT NULL,
  `type` varchar(300) DEFAULT NULL,
  `isRead` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `details`, `link`, `time`, `userID`, `type`, `isRead`) VALUES
(25, 'A user mentioned you in a comment on a post titled \"Test Post\"', 'post/index?id=1#comment-76', '2021-12-21 05:08:19', 'Fauzan2', 'Comment Mention', 0),
(26, 'A user mentioned you in a comment on a post titled \"Test Post\"', 'post/index?id=1#comment-77', '2021-12-21 05:08:27', 'Fauzan2', 'Comment Mention', 0),
(27, 'A user mentioned you in a comment on a post titled \"TSEAA AAAAA AA AAAAAAAA AA aaa  \"', 'post/index?id=3#comment-78', '2021-12-21 05:09:21', 'Fauzan', 'Comment Mention', 1);

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
(1, 'Test Post', 'This is a test post', '2021-12-20 07:44:58', 'Fauzan', 2),
(3, 'TSEAA AAAAA AA AAAAAAAA AA aaa  ', 'aaadasadadasdasdadasdaddadsadada INI DI EDIT', '2021-12-20 14:12:20', 'Fauzan2', 1);

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
(1, 'Games'),
(2, 'Memes'),
(3, 'Science'),
(4, 'Tech'),
(5, 'Random Discussion');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `email`) VALUES
('Fauzan', '$2y$10$hGxO4es3rmEFeHYgp4Zn4ukl6EDJsRNv1GEHXcdJaSK7iDREBwHZi', 'ffantoro@gmail.com'),
('Fauzan2', '$2y$10$OhvStxC7ABR0prDFjnEwYex1JgTB5Z1f4LoM4FM26hXAZGg.RhZqa', 'iniemail@gmail.com'),
('Fauzan3', '$2y$10$rdUzbI7KxkcWOsQWFnjo.exqLp.W6//O8DdRbljVfoq0jRzJS/2q2', 'testmail@gmail.com');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
