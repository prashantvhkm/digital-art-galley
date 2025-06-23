-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2025 at 06:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digital_img`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addUpload` (IN `user_id` INT(10), IN `title` VARCHAR(200), IN `description` VARCHAR(200), IN `img` VARCHAR(200))   insert into addupload(user_id,title,description,img) values(user_id,title,description,img)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteArt` (IN `did` INT(10), IN `duser_id` INT(10))   DELETE FROM addupload WHERE id=did and user_id=duser_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editupload` (IN `utitle` VARCHAR(200), IN `udescription` VARCHAR(200), IN `uimg` VARCHAR(200), IN `uid` INT(10), IN `uuser_id` INT(10))   UPDATE addupload 
SET 
    title = utitle,
    description = udescription,
    img = uimg
WHERE 
    id = uid 
    AND user_id = uuser_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `forgotPassword` (IN `password` VARCHAR(255), IN `username` VARCHAR(255))   UPDATE users SET password=password WHERE username=username$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `profileUser` (IN `ufullname` VARCHAR(255), IN `uemail` VARCHAR(255), IN `uusername` VARCHAR(255), IN `uid` INT(10))   UPDATE users SET
fullname = ufullname,
email = uemail, 
username = uusername
WHERE
id = uid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `signUser` (IN `fullname` VARCHAR(255), IN `email` VARCHAR(255), IN `username` VARCHAR(255), IN `password` VARCHAR(255))   INSERT INTO users (fullname, email, username, password) VALUES (fullname, email, username, password)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `addupload`
--

CREATE TABLE `addupload` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addupload`
--

INSERT INTO `addupload` (`id`, `user_id`, `title`, `description`, `img`, `created_at`) VALUES
(4, 1, 'Born to Fly, Drawn to Dream', 'A burst of vibrant life captured with just pencils — this butterfly reminds us how something delicate can hold so much color and energy', 'aa3.png', '2025-06-20 15:17:58'),
(5, 1, 'Mind in Loops', 'A raw depiction of obsession and emotional overload — when one name echoes so loud, it drowns every other thought.', 'vv5.png', '2025-06-20 15:18:13'),
(7, 1, 'Divine Lines – Lord Ganesha', 'This hand-drawn depiction of Lord Ganesha captures divine energy through intricate pen lines and sacred symbolism', 'ss1.png', '2025-06-20 15:27:54'),
(10, 3, 'digital pic', 'edit', 'v4.jpg', '2025-06-21 10:09:01'),
(12, 2, 'img1', 'description2', 'v1.jpg', '2025-06-23 03:25:15'),
(13, 3, 'new', 'hey', 'dip1.jpeg', '2025-06-23 15:56:19');

--
-- Triggers `addupload`
--
DELIMITER $$
CREATE TRIGGER `after_upload_insert` AFTER INSERT ON `addupload` FOR EACH ROW BEGIN
    INSERT INTO upload_log (upload_id, user_id, action)
    VALUES (NEW.id, NEW.user_id, 'Artwork Uploaded');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `upload_log`
--

CREATE TABLE `upload_log` (
  `log_id` int(11) NOT NULL,
  `upload_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `action` varchar(100) DEFAULT NULL,
  `log_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `username`, `password`, `created_at`) VALUES
(1, 'prashant', 'prashantkumarv817@gmail.com', 'prashant', '$2y$10$6Rrn9prnqWCURpBjCFQVTudreAeDO7S/Uc4d/NSJOKH1U1EetX8I.', '2025-06-20 12:19:15'),
(2, 'hari', 'hari@gmail.com', 'hari', '$2y$10$6Rrn9prnqWCURpBjCFQVTudreAeDO7S/Uc4d/NSJOKH1U1EetX8I.', '2025-06-20 16:21:41'),
(3, 'OM', 'om@gmail.com', 'om', '$2y$10$6Rrn9prnqWCURpBjCFQVTudreAeDO7S/Uc4d/NSJOKH1U1EetX8I.', '2025-06-21 10:08:22'),
(4, 'jeet', 'jeet@gamil.com', 'jeet', '$2y$10$5l1Yiw9dLiPJ.v7AJF4VQ.c.QSOCOdFtdZcAo2Jsoa9.5PbLHMXhC', '2025-06-23 16:03:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addupload`
--
ALTER TABLE `addupload`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `upload_log`
--
ALTER TABLE `upload_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addupload`
--
ALTER TABLE `addupload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `upload_log`
--
ALTER TABLE `upload_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addupload`
--
ALTER TABLE `addupload`
  ADD CONSTRAINT `addupload_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
