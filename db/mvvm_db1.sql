-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2025 at 05:33 PM
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
-- Database: `mvvm_db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `agency`
--

CREATE TABLE `agency` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `country` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agency`
--

INSERT INTO `agency` (`id`, `name`, `country`) VALUES
(1, 'Hololive JP', 'Jepang'),
(2, 'Nijisanji', 'Inggris'),
(3, 'Re:Memories', 'Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `merchandise`
--

CREATE TABLE `merchandise` (
  `id` int(11) NOT NULL,
  `vtuber_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `merchandise`
--

INSERT INTO `merchandise` (`id`, `vtuber_id`, `item_name`, `price`) VALUES
(1, 1, 'Feet Pics', 375000.00),
(3, 2, 'Voice Pack', 200000.00),
(4, 2, 'Guling Animeh', 25000000.00);

-- --------------------------------------------------------

--
-- Table structure for table `stream`
--

CREATE TABLE `stream` (
  `id` int(11) NOT NULL,
  `vtuber_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `stream_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stream`
--

INSERT INTO `stream` (`id`, `vtuber_id`, `title`, `stream_date`) VALUES
(1, 1, 'Debut Stream Pekoo~~', '2019-07-17 00:00:00'),
(2, 2, 'Stream 10 Jam (Kalo Kuat)', '2022-06-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `vtuber`
--

CREATE TABLE `vtuber` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `debut_date` date DEFAULT NULL,
  `agency_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vtuber`
--

INSERT INTO `vtuber` (`id`, `name`, `debut_date`, `agency_id`) VALUES
(1, 'Pekora', '2019-07-17', 1),
(2, 'Elaine Celestia', '2022-05-15', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agency`
--
ALTER TABLE `agency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchandise`
--
ALTER TABLE `merchandise`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vtuber_id` (`vtuber_id`);

--
-- Indexes for table `stream`
--
ALTER TABLE `stream`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vtuber_id` (`vtuber_id`);

--
-- Indexes for table `vtuber`
--
ALTER TABLE `vtuber`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agency_id` (`agency_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agency`
--
ALTER TABLE `agency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `merchandise`
--
ALTER TABLE `merchandise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stream`
--
ALTER TABLE `stream`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vtuber`
--
ALTER TABLE `vtuber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `merchandise`
--
ALTER TABLE `merchandise`
  ADD CONSTRAINT `merchandise_ibfk_1` FOREIGN KEY (`vtuber_id`) REFERENCES `vtuber` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stream`
--
ALTER TABLE `stream`
  ADD CONSTRAINT `stream_ibfk_1` FOREIGN KEY (`vtuber_id`) REFERENCES `vtuber` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vtuber`
--
ALTER TABLE `vtuber`
  ADD CONSTRAINT `vtuber_ibfk_1` FOREIGN KEY (`agency_id`) REFERENCES `agency` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
