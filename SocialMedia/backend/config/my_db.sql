-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 26. Jun 2022 um 12:37
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
-- Tabellenstruktur für Tabelle `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `from` varchar(128) NOT NULL,
  `from_id` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `chat`
--

INSERT INTO `chat` (`id`, `message`, `from`, `from_id`, `gid`, `created`) VALUES
(109, 'Hallo!', 'user', 15, 36, '2022-06-26 09:59:11'),
(110, 'Wie geht es euch?', 'user', 15, 36, '2022-06-26 09:59:17'),
(111, 'Hallo ines!', 'user', 15, 37, '2022-06-26 09:59:31'),
(112, 'Was geht? lol', 'user', 15, 37, '2022-06-26 09:59:38'),
(113, 'hey, gut und euch?', 'ines', 16, 36, '2022-06-26 10:00:03'),
(114, 'lol', 'ines', 16, 37, '2022-06-26 10:00:14'),
(115, 'hi, ur müde aber sonst gut', 'myeuge', 25, 36, '2022-06-26 10:00:45'),
(116, 'dfslkjhds hi', 'natalia', 26, 36, '2022-06-26 10:01:02'),
(117, 'mir gehts gut, ich gehe jetzt ins gym lol', 'natalia', 26, 36, '2022-06-26 10:01:14');

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
(113, 16, 26, 1),
(114, 25, 26, 1),
(115, 16, 15, 1),
(116, 26, 15, 1),
(117, 25, 15, 1),
(118, 26, 16, 1),
(119, 15, 16, 1),
(120, 25, 16, 1),
(121, 26, 25, 1),
(122, 15, 25, 1),
(123, 16, 25, 1),
(124, 15, 26, 1),
(125, 15, 17, 0),
(126, 16, 17, 0),
(127, 25, 17, 0),
(128, 26, 17, 0),
(129, 15, 18, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `groups`
--

INSERT INTO `groups` (`id`, `name`) VALUES
(36, 'beste Gruppe'),
(37, 'gute Gruppe');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `group_members`
--

CREATE TABLE `group_members` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `gid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `group_members`
--

INSERT INTO `group_members` (`id`, `uid`, `gid`) VALUES
(56, 15, 36),
(57, 16, 36),
(58, 25, 36),
(59, 26, 36),
(60, 15, 37),
(61, 16, 37);

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
(385, 'uploads/user/ines//tumblr_10c729685843b39bc424c4518b3b102f_680e4fbc_540.jpg', 434),
(386, 'uploads/user/ines//Download-pBzPKApChikd-aesthetic-anime-putple-lo-fi-backgrounds.jpg', 435),
(387, 'uploads/user/myeuge//1.jpg', 437),
(388, 'uploads/user/myeuge//2.jpg', 438),
(389, 'uploads/user/natalia//download (2).jpg', 439),
(390, 'uploads/user/natalia//8d4794e960aefbddae0639ef2af1d606.jpg', 440),
(391, 'uploads/user/user//25e6978ea79bb033847a47ee7f4fea2e.jpg', 443),
(392, 'uploads/user/user//QkN3kY_n_400x400.jpg', 444),
(393, 'uploads/user/max//images (3).jpg', 445),
(394, 'uploads/user/max//40fe9c084ebb19b26aeed40ac97896bb.png', 446),
(395, 'uploads/user/max//263.png', 447);

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
(433, 'Hallo! Das ist meine erster Post!', NULL, 16, '2022-06-26 11:16:58'),
(434, 'Mein Profilbild! ', '../uploads/user/ines/tumblr_10c729685843b39bc424c4518b3b102f_680e4fbc_540_t.jpg', 16, '2022-06-26 11:17:15'),
(435, 'Das ist mein Dekstophintergrund btw. ', '../uploads/user/ines/Download-pBzPKApChikd-aesthetic-anime-putple-lo-fi-backgrounds_t.jpg', 16, '2022-06-26 11:17:30'),
(436, 'Hallo!', NULL, 25, '2022-06-26 11:22:02'),
(437, 'Ich mag pokemon lol ', '../uploads/user/myeuge/1_t.jpg', 25, '2022-06-26 11:22:42'),
(438, 'es ist viel zu heiß draußen ', '../uploads/user/myeuge/2_t.jpg', 25, '2022-06-26 11:23:27'),
(439, 'hi', '../uploads/user/natalia/download (2)_t.jpg', 26, '2022-06-26 11:24:25'),
(440, 'ich schicke ines immer sehr viele tiktoks dsjflkhdsf', '../uploads/user/natalia/8d4794e960aefbddae0639ef2af1d606_t.jpg', 26, '2022-06-26 11:25:11'),
(441, 'hahahahahahah', NULL, 26, '2022-06-26 11:25:21'),
(442, 'Mein erster Post!', NULL, 15, '2022-06-26 11:27:56'),
(443, 'Mein zweiter Post (sogar mit Bild, wow)!', '../uploads/user/user/25e6978ea79bb033847a47ee7f4fea2e_t.jpg', 15, '2022-06-26 11:28:14'),
(444, 'Mein dritter Post, just for fun! ', '../uploads/user/user/QkN3kY_n_400x400_t.jpg', 15, '2022-06-26 11:28:31'),
(445, 'Hallo alle meine Freunde! :) ', '../uploads/user/max/images (3)_t.jpg', 17, '2022-06-26 11:37:23'),
(446, 'haha', '../uploads/user/max/40fe9c084ebb19b26aeed40ac97896bb_t.jpg', 17, '2022-06-26 11:37:32'),
(447, 'lol', '../uploads/user/max/263_t.jpg', 17, '2022-06-26 11:37:38'),
(448, 'lmao', NULL, 17, '2022-06-26 11:38:27'),
(449, 'Mein Account ist leer! Abgesehen von diesem Post! :)', NULL, 18, '2022-06-26 11:39:42'),
(451, 'hallo?', NULL, 16, '2022-06-26 12:15:48');

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
(2, 16, '../uploads/user/ines/tumblr_10c729685843b39bc424c4518b3b102f_680e4fbc_540.jpg'),
(3, 17, '../uploads/user/max/2.jpg'),
(4, 15, '../uploads/user/user/images.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(128) NOT NULL,
  `surname` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `name`, `surname`) VALUES
(15, 'jane.doe@live.at', 'user', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'jane', 'doe'),
(16, 'ines@mail.com', 'ines', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'ines', 'petrusic'),
(17, 'max@muster.com', 'max', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'max', 'mustermann'),
(18, 'mail@mail.com', 'guenther', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'guenther', 'klaus'),
(19, 'mail@mail.com', 'klaus', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'klaus', 'guenther'),
(25, 'myeuge@mail.com', 'myeuge', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'My Euge', 'Lau'),
(26, 'natalia@mail.com', 'natalia', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'Natalia', 'Guarnizo');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `from_id` (`from_id`),
  ADD KEY `gid` (`gid`) USING BTREE;

--
-- Indizes für die Tabelle `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userConst` (`uid`),
  ADD KEY `friendConst` (`fid`);

--
-- Indizes für die Tabelle `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `group_members`
--
ALTER TABLE `group_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_const` (`uid`),
  ADD KEY `g_const` (`gid`);

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
-- AUTO_INCREMENT für Tabelle `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT für Tabelle `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT für Tabelle `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT für Tabelle `group_members`
--
ALTER TABLE `group_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT für Tabelle `pictures`
--
ALTER TABLE `pictures`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=397;

--
-- AUTO_INCREMENT für Tabelle `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=452;

--
-- AUTO_INCREMENT für Tabelle `profilepic`
--
ALTER TABLE `profilepic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`from_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`gid`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friendConst` FOREIGN KEY (`fid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userConst` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `group_members`
--
ALTER TABLE `group_members`
  ADD CONSTRAINT `group_members_ibfk_1` FOREIGN KEY (`gid`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
