-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 05:34 PM
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
-- Database: `ticketing`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` varchar(25) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `price` int(50) DEFAULT NULL,
  `status` enum('Success','Pending','Failed') DEFAULT 'Pending',
  `created_at` datetime DEFAULT current_timestamp(),
  `flight_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `username`, `price`, `status`, `created_at`, `flight_id`) VALUES
('4CKD01', 'ilmagita', 10200000, 'Success', '2023-12-19 22:11:16', 'OF-033'),
('5OYYXH', 'ilmagita', 840000, 'Success', '2023-12-19 21:43:20', 'OF-034'),
('EPA8MP', 'ilmagita', 840000, 'Pending', '2023-12-19 21:35:04', 'OF-034'),
('K0IV40', 'ilmagita', 900000, 'Pending', '2023-12-19 21:30:47', 'OF-123'),
('LM9IEJ', 'ilmagita', 7200000, 'Pending', '2023-12-19 23:31:56', 'OF-023'),
('LOYV7X', 'ilmagita', 900000, 'Pending', '2023-12-19 21:11:34', 'OF-123'),
('NDD7EV', 'ilmagita', 900000, 'Pending', '2023-12-19 21:28:20', 'OF-123'),
('OEDV1Z', 'ilmagita', 840000, 'Pending', '2023-12-19 21:33:00', 'OF-034'),
('PN1A1D', 'ilmagita', 1200000, 'Success', '2023-12-19 22:13:55', 'OF-001'),
('VLI33O', 'ilmagita', 7200000, 'Success', '2023-12-19 20:54:40', 'OF-008'),
('WOTNIO', 'ilmagita', 900000, 'Pending', '2023-12-19 21:29:09', 'OF-123');

-- --------------------------------------------------------

--
-- Table structure for table `pnr`
--

CREATE TABLE `pnr` (
  `id` varchar(255) NOT NULL,
  `booking_id` varchar(25) DEFAULT NULL,
  `honorifics` enum('Mr','Mrs','Ms') DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `id_number` varchar(255) DEFAULT NULL,
  `flight_id` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pnr`
--

INSERT INTO `pnr` (`id`, `booking_id`, `honorifics`, `first_name`, `last_name`, `id_number`, `flight_id`, `quantity`) VALUES
('0YS0Z5', '5OYYXH', 'Mr', 'CCC', 'DDD', 'EEE', 'OF-034', 1),
('14', 'VLI33O', 'Mr', 'AAA', 'CCC', 'XXX', 'OF-008', 3),
('15', 'VLI33O', 'Mrs', 'SSS', 'DDD', 'WWW', 'OF-008', 3),
('16', 'VLI33O', 'Ms', 'QQQ', '111', '222', 'OF-008', 3),
('17', 'LOYV7X', 'Mr', 'Rayhan', 'Siregar', '12345', 'OF-123', 1),
('540F0B', 'WOTNIO', 'Mr', 'Rayhan', 'Nugraha', '2453', 'OF-123', 1),
('5LNJP5', 'K0IV40', 'Mrs', 'asdas', 'ihihih', '12345', 'OF-123', 1),
('CE8MWU', 'PN1A1D', 'Mr', 'Hans', 'Aja', '1234', 'OF-001', 2),
('FVGH1M', '4CKD01', 'Mr', 'Tes', 'Tes', 'Tes', 'OF-033', 1),
('LE3HGT', 'LM9IEJ', 'Mr', 'Fadhil', 'Hidayat', '123456789101112', 'OF-023', 1),
('MBSUX0', 'PN1A1D', 'Ms', 'Kepin', 'Katanya', '56778', 'OF-001', 2),
('ND38YU', 'OEDV1Z', 'Ms', 'AAA', 'BBB', 'CCC', 'OF-034', 1),
('P3CDIA', 'EPA8MP', 'Ms', 'AAA', 'BBB', 'CCC', 'OF-034', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `first_name`, `last_name`, `password`, `phone_number`, `email`) VALUES
('hansstep', 'hans', 'step', 'akustep', '082849284912', 'hansstep@gmail.com'),
('ilmagita', 'ilma', 'gita', 'akujember', '082947391053', 'ilmagita@gmail.com'),
('kevinprayoga', 'kevin', 'prayoga', 'kevinpargoy', '082385026483', 'kevinprayoga@gmail.com'),
('rayhansiregar', 'rayhan', 'siregar', 'akuyabang', '083294837461', 'rayhansiregar@gmail.com'),
('riandradiva', 'riandra', 'diva', 'akuganteng', '081293746391', 'riandradiva@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `pnr`
--
ALTER TABLE `pnr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `pnr`
--
ALTER TABLE `pnr`
  ADD CONSTRAINT `pnr_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`booking_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
