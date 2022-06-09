-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 08. Mai 2022 um 20:36
-- Server-Version: 10.4.24-MariaDB
-- PHP-Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `my_db`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `accepted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `friends`
--

INSERT INTO `friends` (`id`, `uid`, `fid`, `accepted`) VALUES
(1, 16, 17, 1),
(2, 16, 15, 1),
(3, 16, 14, 1),
(100, 16, 18, 1),
(101, 16, 19, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pictures`
--

CREATE TABLE `pictures` (
  `picture_id` int(11) NOT NULL,
  `picture_path` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `pictures`
--

INSERT INTO `pictures` (`picture_id`, `picture_path`, `post_id`) VALUES
(1, 'uploads/user/ines//40fe9c084ebb19b26aeed40ac97896bb.png', 38),
(2, 'uploads/user/ines//Download-pBzPKApChikd-aesthetic-anime-putple-lo-fi-backgrounds.jpg', 39),
(3, 'uploads/user/klaus//QkN3kY_n_400x400.jpg', 40),
(4, 'uploads/user/klaus//Download-pBzPKApChikd-aesthetic-anime-putple-lo-fi-backgrounds.jpg', 41),
(5, 'uploads/user/guenther//tumblr_10c729685843b39bc424c4518b3b102f_680e4fbc_540.jpg', 42),
(6, 'uploads/user/guenther//Download-pBzPKApChikd-aesthetic-anime-putple-lo-fi-backgrounds.jpg', 43);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `uid` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `posts`
--

INSERT INTO `posts` (`post_id`, `caption`, `file_path`, `uid`, `datetime`) VALUES
(38, 'Hallo', '../uploads/user/ines/40fe9c084ebb19b26aeed40ac97896bb_t.jpg', 16, '2022-05-08 19:52:54'),
(39, 'test', '../uploads/user/ines/Download-pBzPKApChikd-aesthetic-anime-putple-lo-fi-backgrounds_t.jpg', 16, '2022-05-08 19:53:49'),
(40, 'testguenther', '../uploads/user/klaus/QkN3kY_n_400x400_t.jpg', 19, '2022-05-08 19:57:05'),
(41, 'testklaus', '../uploads/user/klaus/Download-pBzPKApChikd-aesthetic-anime-putple-lo-fi-backgrounds_t.jpg', 19, '2022-05-08 19:57:27'),
(42, 'sdfsd', '../uploads/user/guenther/tumblr_10c729685843b39bc424c4518b3b102f_680e4fbc_540_t.jpg', 18, '2022-05-08 19:57:49'),
(43, 'fewsrewr', '../uploads/user/guenther/Download-pBzPKApChikd-aesthetic-anime-putple-lo-fi-backgrounds_t.jpg', 18, '2022-05-08 19:57:59');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `profilepic`
--

CREATE TABLE `profilepic` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pic_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `profilepic`
--

INSERT INTO `profilepic` (`id`, `user_id`, `pic_path`) VALUES
(1, 16, '../uploads/user/ines/tumblr_10c729685843b39bc424c4518b3b102f_680e4fbc_540.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
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
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `salutation`, `email`, `username`, `password`, `name`, `surname`, `role`, `activity`) VALUES
(14, 'Mr', 'test@live.at', 'admin', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'john', 'doe', 'admin', 1),
(15, 'Ms', 'jane.doe@live.at', 'user', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'jane', 'doe', 'user', 1),
(16, 'Ms', 'ines@mail.com', 'ines', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'ines', 'petrusic', 'user', 1),
(17, 'Mr', 'max@muster.com', 'max', '74cd18c016d902f940554dfd07545f219064b27fe6e890e9447f0c9e377903a8', 'max', 'mustermann', 'user', 1),
(18, 'Mx', 'mail@mail.com', 'guenther', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'guenther', 'klaus', 'user', 1),
(19, 'Mr', 'mail@mail.com', 'klaus', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'klaus', 'guenther', 'user', 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userConst` (`uid`),
  ADD KEY `friendConst` (`fid`);

--
-- Indizes für die Tabelle `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`picture_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indizes für die Tabelle `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`uid`);

--
-- Indizes für die Tabelle `profilepic`
--
ALTER TABLE `profilepic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `const` (`user_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT für Tabelle `pictures`
--
ALTER TABLE `pictures`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT für Tabelle `profilepic`
--
ALTER TABLE `profilepic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friendConst` FOREIGN KEY (`fid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userConst` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `pictures_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `profilepic`
--
ALTER TABLE `profilepic`
  ADD CONSTRAINT `const` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
