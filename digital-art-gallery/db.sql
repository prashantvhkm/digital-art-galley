-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2025 at 06:13 AM
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
(10, 3, 'img1', 'img1', 'v2.jpg', '2025-06-21 10:09:01'),
(11, 3, 'img2', 'img2', 'vv5.png', '2025-06-21 10:09:21'),
(12, 2, 'img1', 'description2', 'v1.jpg', '2025-06-23 03:25:15');

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
(1, 'prashant', 'prashantkumarv817@gmail.com', 'prashant', '$2y$10$Z73lZmg2vhZ5JzbrnfpWf.HuAe.79v4NMvEYcnGTMRvC5IAIwuOlu', '2025-06-20 12:19:15'),
(2, 'hari', 'hari@gmail.com', 'hari', '$2y$10$5UyD3Ycho/mLInPWrzfRzesXOtRmfBy0hdz5iBiMZAiDPdvF.yb/.', '2025-06-20 16:21:41'),
(3, 'OM', 'om@gmail.com', 'om', '$2y$10$.AonYWvv7eQO/VMkoFwbNeZjSpvwvCUGX2n1r5u4vC9DdZaY2tLPy', '2025-06-21 10:08:22');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
