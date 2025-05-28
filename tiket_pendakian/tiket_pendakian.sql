-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2025 at 09:46 AM
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
-- Database: `tiket_pendakian`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `mountain` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `tickets` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `address`, `phone`, `mountain`, `date`, `tickets`, `created_at`) VALUES
(1, 'suseno', 'temanggung', '0998897896', 'Gunung Merapi', '2025-02-07', 3, '2025-01-16 03:39:46'),
(2, 'yanto', 'kediri', '87678990', 'Gunung Bromo', '2025-04-25', 2, '2025-01-16 03:50:10'),
(3, 'dryjxdtrj', 'ctuk', '65858', 'Gunung Merapi', '2025-02-08', 3, '2025-01-16 03:56:36'),
(4, 'ridwan', 'serang', '0876567', 'Gunung Rinjani', '2025-01-31', 1, '2025-01-16 07:39:50'),
(5, 'bobi', 'serang', '098878', 'Gunung Merapi', '2025-01-31', 2, '2025-01-16 07:52:13'),
(6, 'chuswanto', 'ujung kulon', '0876832', 'Gunung Kerinci', '2025-03-09', 5, '2025-01-16 07:53:14');

-- --------------------------------------------------------

--
-- Table structure for table `mountains`
--

CREATE TABLE `mountains` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `height` int(11) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mountains`
--

INSERT INTO `mountains` (`id`, `name`, `location`, `height`, `description`) VALUES
(1, 'Gunung Semeru', 'Jawa Timur', 3676, 'Gunung tertinggi di Pulau Jawa dan merupakan bagian dari Taman Nasional Bromo Tengger Semeru.'),
(2, 'Gunung Rinjani', 'Lombok', 3726, 'Gunung berapi yang terletak di Pulau Lombok, terkenal dengan Danau Segara Anak di kawahnya.'),
(3, 'Gunung Merapi', 'Jawa Tengah', 2910, 'Gunung berapi yang paling aktif di Indonesia, terletak dekat Yogyakarta.'),
(4, 'Gunung Bromo', 'Jawa Timur', 2392, 'Gunung berapi yang terkenal dengan pemandangan matahari terbitnya yang spektakuler.'),
(5, 'Gunung Kerinci', 'Jambi', 3805, 'Gunung tertinggi di Sumatra dan merupakan bagian dari Taman Nasional Kerinci Seblat.');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `payment_status` enum('pending','succeeded') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `booking_id`, `total_amount`, `payment_status`, `created_at`) VALUES
(1, 1, 300000.00, 'pending', '2025-01-16 03:39:46'),
(2, 2, 200000.00, 'pending', '2025-01-16 03:50:10'),
(3, 3, 300000.00, 'pending', '2025-01-16 03:56:36'),
(4, 4, 100000.00, 'pending', '2025-01-16 07:39:50'),
(5, 5, 200000.00, 'pending', '2025-01-16 07:52:13'),
(6, 6, 500000.00, 'pending', '2025-01-16 07:53:14');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `available_seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'iwak', '$2y$10$Lr1jpM.4tWezYQ.1.NFiHevU8U8jQz6kha1u0I64Occ1NKQXy4a3m', 'user'),
(2, 'iya', '$2y$10$XNeSeModcfAM.wVP5uz6CO6JE1O1e6DGfFMIGrUxs2mdrCk8do/MG', 'user'),
(4, 'woke', '$2y$10$jECJKjxibtBzOtc0QzwPduN1kDzu/s73nEW41YVU2x.Sxwy9LFryW', 'user'),
(5, 'ridwan', '$2y$10$HNpmLHXvScFAHjiqsvkRXOIkfwGRFif5Um32U4XSVkoNuveBHsbbG', 'user'),
(6, 'bobi', '$2y$10$85e2vkr65riK9PtBsDmH4eRVbNRq/SnLq56/OpGgs94wqNIhdHqMm', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mountains`
--
ALTER TABLE `mountains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mountains`
--
ALTER TABLE `mountains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
