-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2026 at 08:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ajax_crud_1001`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `display_name`, `user_type`, `date_created`) VALUES
(2, 'ssexx', '$2y$10$tU/ZArfJYNF6AYIhxNKfHeKXqR.9ACEMdTt65zoLP4VGdtadmxi0m', 'sexman', 'Student', '2026-01-18 07:06:54'),
(5, 'manggang hilaw', '$2y$10$5xpwRHyXQovOA5id1i6hlOX5hWx6EVdbHpFCq170Gp1BvoE4wHvou', 'hilawman', 'Admin', '2026-01-18 07:34:50'),
(6, 'sa', '$2y$10$I727b7oCfUTO4kQn.i5RI.UGvgJnKuwEGK7BJgzsKqTxad/TuxIj2', 'fff', 'Admin', '2026-01-18 07:44:00'),
(7, 'barabara', '$2y$10$88sfY5lkRTRWtJb3dvHByuypg.UDj//wg5S.knFteJEsHl6/rNfWi', 'barabara', 'Student', '2026-01-18 07:47:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
