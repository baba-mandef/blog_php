-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 23, 2023 at 03:39 PM
-- Server version: 10.10.3-MariaDB
-- PHP Version: 8.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `author` int(11) NOT NULL,
  `post` int(11) NOT NULL,
  `is_reply` tinyint(1) NOT NULL DEFAULT 0,
  `comment` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `body`, `author`, `post`, `is_reply`, `comment`, `created_at`) VALUES
(1, 'adf', 1, 1, 0, NULL, '2023-03-22 16:51:23');

-- --------------------------------------------------------

--
-- Table structure for table `like_post`
--

CREATE TABLE `like_post` (
  `id` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `banner` varchar(255) NOT NULL,
  `author` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `slug`, `body`, `banner`, `author`, `created_at`) VALUES
(1, 'bienvenue sur le blog de l\'abassadeur', 'bienvenue-sur-le-blog-de-l-abassadeur', 'bienvenue sur le blog de l\'abassadeur\r\nbienvenue sur le blog de l\'abassadeur\r\nbienvenue sur le blog de l\'abassadeurbienvenue sur le blog de l\'abassadeurbienvenue sur le blog de l\'abassadeurbienvenue sur le blog de l\'abassadeurbienvenue sur le blog de l\'abassadeurbienvenue sur le blog de l\'abassadeurbienvenue sur le blog de l\'abassadeurbienvenue sur le blog de l\'abassadeur', 'app/media/0de1b2c5d4daba545722584b1d165bdf.jpg', 1, '2023-03-21 13:53:11'),
(2, 'bienvenue sur le blog de l\'abassadeur', 'bienvenue-sur-le-blog-de-l-abassadeur', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis qui placeat deleniti distinctio aut quisquam ab repudiandae dolorem exercitationem quo ipsa expedita, necessitatibus assumenda a, perspiciatis ullam minus? Nisi, repellendus.\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, exercitationem. Tempora accusamus, praesentium excepturi ex nemo vel mollitia magnam inventore voluptatem facilis obcaecati delectus nihil dolor quia aliquam commodi laborum!', 'app/media/0de1b2c5d4daba545722584b1d165bdf.jpg', 1, '2023-03-21 13:56:01'),
(3, 'hdeqdioqd qeodjqodjqo oiqdlqwjdq sqoqdqn', 'hdeqdioqd-qeodjqodjqo-oiqdlqwjdq-sqoqdqn', 'hdeqdioqd qeodjqodjqo oiqdlqwjdq sqoqdqnhdeqdioqd qeodjqodjqo oiqdlqwjdq sqoqdqnhdeqdioqd qeodjqodjqo oiqdlqwjdq sqoqdqnhdeqdioqd qeodjqodjqo oiqdlqwjdq sqoqdqnhdeqdioqd qeodjqodjqo oiqdlqwjdq sqoqdqnhdeqdioqd qeodjqodjqo oiqdlqwjdq sqoqdqnhdeqdioqd qeodjqodjqo oiqdlqwjdq sqoqdqnhdeqdioqd qeodjqodjqo oiqdlqwjdq sqoqdqn', 'app/media/0b9ca181ad4bc1086509ff18a0772815.png', 1, '2023-03-21 14:17:32'),
(4, 'afedfeait', 'afedfeait', 'fedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeaitfedfeait', 'app/media/0de1b2c5d4daba545722584b1d165bdf.jpg', 1, '2023-03-22 12:07:25'),
(5, 'ola', 'ola', 'ffthcujyt', 'app/media/0e3da33f8aa36b4461e238906ea5a6bb.jpg', 1, '2023-03-22 12:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `join_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `join_at`) VALUES
(1, 'ptahemdjehuty', 'c6ffbf250f886ab82abcee9edede6f212946d9cd', '2023-03-21 11:34:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_comment` (`post`),
  ADD KEY `comment_author` (`author`),
  ADD KEY `comment_reply` (`comment`);

--
-- Indexes for table `like_post`
--
ALTER TABLE `like_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_like` (`post`),
  ADD KEY `like_author` (`author`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_author` (`author`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `like_post`
--
ALTER TABLE `like_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_author` FOREIGN KEY (`author`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_reply` FOREIGN KEY (`comment`) REFERENCES `comment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_comment` FOREIGN KEY (`post`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `like_post`
--
ALTER TABLE `like_post`
  ADD CONSTRAINT `like_author` FOREIGN KEY (`author`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_like` FOREIGN KEY (`post`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_author` FOREIGN KEY (`author`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
