-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 07, 2020 at 10:28 AM
-- Server version: 10.3.21-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aungpyae_lucky_draw`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `all_customer_count`
-- (See below for the actual view)
--
CREATE TABLE `all_customer_count` (
`customer_count` bigint(21)
,`customer_id` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `all_customer_prizes`
-- (See below for the actual view)
--
CREATE TABLE `all_customer_prizes` (
`prize_type` varchar(255)
,`lucky_number` int(11)
,`name` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ph_no` varchar(255) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `ph_no`, `created_date`, `updated_date`) VALUES
(46, 'Wilian', 'wilian@gmail.com', '09-876543213', NULL, NULL),
(47, 'Jhon Smith', 'jhonsmith@gmail.com', '09-786543558', NULL, NULL),
(48, 'Mary', 'mary@gmail.com', '09-765432145', NULL, NULL),
(49, 'Amie', 'amie@gmail.com', '09-978654355', NULL, NULL),
(50, 'Jasmine', 'jasmine@gmail.com', '09-876543987', NULL, NULL),
(51, 'Alex', 'alex@gmail.com', '09-654321897', NULL, NULL),
(52, 'Hany', 'hany@gmail.com', '09-765432145', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_prizes`
--

CREATE TABLE `customer_prizes` (
  `id` int(11) NOT NULL,
  `prize_id` int(11) NOT NULL,
  `lucky_number_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_prizes`
--

INSERT INTO `customer_prizes` (`id`, `prize_id`, `lucky_number_id`) VALUES
(1, 1, 53);

-- --------------------------------------------------------

--
-- Table structure for table `lucky_numbers`
--

CREATE TABLE `lucky_numbers` (
  `id` int(11) NOT NULL,
  `lucky_number` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lucky_numbers`
--

INSERT INTO `lucky_numbers` (`id`, `lucky_number`, `customer_id`) VALUES
(33, 1111, 46),
(34, 1222, 46),
(38, 2333, 47),
(39, 2444, 47),
(40, 2555, 47),
(41, 3455, 48),
(42, 4533, 48),
(44, 5678, 49),
(45, 5876, 50),
(46, 6543, 50),
(47, 1435, 49),
(48, 5643, 51),
(49, 8765, 52),
(51, 9865, 46),
(53, 8569, 46),
(54, 2424, 47);

-- --------------------------------------------------------

--
-- Table structure for table `prizes`
--

CREATE TABLE `prizes` (
  `id` int(11) NOT NULL,
  `prize_type` varchar(255) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prizes`
--

INSERT INTO `prizes` (`id`, `prize_type`, `created_date`, `updated_date`) VALUES
(1, 'Grand Prize', NULL, NULL),
(2, 'Second Prize - 1st Winner', NULL, NULL),
(3, 'Second Prize - 2nd Winner', NULL, NULL),
(4, 'Third Prize - 1st Winner', NULL, NULL),
(5, 'Third Prize - 2nd Winner', NULL, NULL),
(6, 'Third Prize - 3rd Winner', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ph_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure for view `all_customer_count`
--
DROP TABLE IF EXISTS `all_customer_count`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `all_customer_count`  AS  select count(`lucky_numbers`.`customer_id`) AS `customer_count`,`lucky_numbers`.`customer_id` AS `customer_id` from `lucky_numbers` group by `lucky_numbers`.`customer_id` ;

-- --------------------------------------------------------

--
-- Structure for view `all_customer_prizes`
--
DROP TABLE IF EXISTS `all_customer_prizes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `all_customer_prizes`  AS  (select `prizes`.`prize_type` AS `prize_type`,`lucky_numbers`.`lucky_number` AS `lucky_number`,`customers`.`name` AS `name` from (((`customer_prizes` join `prizes` on(`customer_prizes`.`prize_id` = `prizes`.`id`)) join `lucky_numbers` on(`lucky_numbers`.`id` = `customer_prizes`.`lucky_number_id`)) join `customers` on(`lucky_numbers`.`customer_id` = `customers`.`id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_prizes`
--
ALTER TABLE `customer_prizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lucky_numbers`
--
ALTER TABLE `lucky_numbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prizes`
--
ALTER TABLE `prizes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `customer_prizes`
--
ALTER TABLE `customer_prizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lucky_numbers`
--
ALTER TABLE `lucky_numbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `prizes`
--
ALTER TABLE `prizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
