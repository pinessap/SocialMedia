-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2022 at 12:16 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `picture_id` int(11) NOT NULL,
  `picture_path` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`picture_id`, `picture_path`, `post_id`) VALUES
(6, 'img/max/263.png', 14),
(7, 'img/max/8d4794e960aefbddae0639ef2af1d606.jpg', 15),
(8, 'img/max/25e6978ea79bb033847a47ee7f4fea2e.jpg', 16),
(9, 'img/max/781fbebc95a1007c8ea8c7c32b0f19a7.jpg', 18);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `uid` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `caption`, `file_path`, `uid`, `datetime`) VALUES
(14, 'wdwad', '/SocialMedia1/img/263_t.jpg', 17, '2022-04-21 11:13:21'),
(15, 'dwadw', '/SocialMedia1/img/8d4794e960aefbddae0639ef2af1d606_t.jpg', 17, '2022-04-21 11:13:52'),
(16, 'oof', '/SocialMedia1/img/25e6978ea79bb033847a47ee7f4fea2e_t.jpg', 17, '2022-04-21 11:15:30'),
(17, 'nochma sicherheitshalber', NULL, 17, '2022-04-21 11:16:05'),
(18, 'oop hab bild vergessen', '/SocialMedia1/img/781fbebc95a1007c8ea8c7c32b0f19a7_t.jpg', 17, '2022-04-21 11:16:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `salutation` varchar(128) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(128) NOT NULL,
  `surname` varchar(128) NOT NULL,
  `role` enum('user','admin') NOT NULL,
  `activity` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `salutation`, `email`, `username`, `password`, `name`, `surname`, `role`, `activity`) VALUES
(14, 'Mr', 'test@live.at', 'admin', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'john', 'doe', 'admin', 1),
(15, 'Ms', 'jane.doe@live.at', 'user', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'jane', 'doe', 'user', 1),
(16, 'Ms', 'ines@mail.com', 'ines', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'ines', 'petrusic', 'user', 1),
(17, 'Mr', 'max@muster.com', 'max', '74cd18c016d902f940554dfd07545f219064b27fe6e890e9447f0c9e377903a8', 'max', 'mustermann', 'user', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`picture_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `pictures_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;