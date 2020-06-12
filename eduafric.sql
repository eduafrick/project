-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2020 at 11:17 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eduafric`
--

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `user_id` int(11) NOT NULL,
  `email_code` varchar(255) NOT NULL,
  `phone_code` int(11) NOT NULL,
  `referals_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `codes`
--

INSERT INTO `codes` (`user_id`, `email_code`, `phone_code`, `referals_code`) VALUES
(1, 'uyNFdfTkDzVIaHzGteJpKWiPo', 9504713, 'o9vk5p'),
(18, 'dTFKYWnzQOiecJIfyUqrtEVpH', 8056314, 'fwm2q8');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` text NOT NULL,
  `email` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `address` text NOT NULL,
  `address2` text DEFAULT NULL,
  `country` text NOT NULL,
  `age` text NOT NULL,
  `fb_link` text NOT NULL,
  `ref` text NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `phone`, `username`, `password`, `address`, `address2`, `country`, `age`, `fb_link`, `ref`, `image`, `created_at`) VALUES
(2, 'Ekwueme Ugochukwu', 'ekwuemepaul68@gmail.com', '08136539383', 'Mirror43', '$2y$10$kqdgTFu7GwdTAQUlmcLED.Q.L0kT3Q8L2bg7tUd6LNM69EYm3LpvW', '+2348143440606', 'fgffgfff', 'Nigeria', '2020-06-04', 'ekwuemepaul68@gmail.com', 'ekwuemepaul68@gmail.com', '1591637228_angular.jpg', '2020-06-08 17:27:09'),
(3, 'iEkwueme Ugochukwu', 'ugochukwu.ekwueme@yahoo.com', '8143440606', 'Lax12', '$2y$10$IzeOWcuAugXNs7h3RpV/W.3hlusBPWNWxpL8Um.tCYZqhBFhtgec.', '+2348143440606', 'tttttttttttt', 'Nigeria', '2020-06-05', 'ekwuemekkkpaul68@gmail.com', 'ekwuemepalllllul68@gmail.com', '1591721450_andy-li-CpsTAUPoScw-unsplash.jpg', '2020-06-09 16:50:50'),
(16, 'Ekwueme Ugochukwu', 'ekwuemepaull68@gmail.com', '08136839383', 'Mirror43', '$2y$10$qGliG6IVZgs9dgUN09wRu.VoFwOJQJkGpjmOS1kD/rfapYF8A4YGO', '+2348143440606', '', 'Nigeria', '2020-06-11', '', '', '1591967430_andy-li-CpsTAUPoScw-unsplash.jpg', '2020-06-12 13:11:34'),
(17, 'Ekwueme Ugochukwu', 'ekwuemepjaul68@gmail.com', '08136539983', 'Mirror47', '$2y$10$AtennB/ahQmFNCtjX/hCMeAIkJnFVOIPci/YddlENuz0lcIrqeA/i', '+2348143440606', 'hdksksosllslsl', 'Nigeria', '2020-06-11', 'sjskidk', 'ekwuemepalllllul68@gmail.com', '1591988342_andy-li-CpsTAUPoScw-unsplash.jpg', '2020-06-12 18:59:03'),
(18, 'Ekwueme Ugochukwu', 'ekwuemeugochukwu83@gmail.com', '452819034', 'Mirror48', '$2y$10$vVZmGznVbTf6/Bz3JUXd/eRrnGH3ygnH3iIF7U0V/MTfiZUDB8wB6', '+2348143440606', 'hdjdkklklkdlkdkl', 'Nigeria', '2020-06-10', 'ekwuemepaul68@gmail.com', 'ekwuemepaul68@gmail.com', '1591988661_angular.jpg', '2020-06-12 19:04:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `codes`
--
ALTER TABLE `codes`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
