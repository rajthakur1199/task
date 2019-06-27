-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 27, 2019 at 06:13 PM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `account_view`
-- (See below for the actual view)
--
CREATE TABLE `account_view` (
`id` int(11)
,`first_name` varchar(255)
,`last_name` varchar(255)
,`payable_salary` decimal(10,2)
,`basic_salary` decimal(10,2)
,`tax_value` decimal(10,2)
,`last_month_deduction` decimal(10,2)
,`user_type` varchar(255)
,`department_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `commission_percentage` int(11) NOT NULL,
  `allowance_payable` decimal(10,2) NOT NULL,
  `last_month_deduction` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `commission_percentage`, `allowance_payable`, `last_month_deduction`) VALUES
(1, 'Department 1', 1, '1212.33', '1002.00'),
(2, 'Department 2', 2, '3131.44', '333.00'),
(3, 'Department 3', 12, '23334.89', '22.00'),
(4, 'Department 4', 20, '6733.90', '213123.00'),
(5, 'Department 5', 15, '331321.00', '123123.00'),
(6, 'Department 6', 18, '21312321.00', '2122.00'),
(7, 'Department 7', 12, '789992.00', '67732.00'),
(8, 'Department 8', 25, '33222.00', '222.00'),
(9, 'Department 9', 10, '213123.00', '589.00'),
(10, 'Department 10', 30, '213123.00', '300.00');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1561617596),
('m130524_201442_init', 1561617598),
('m190124_110200_add_verification_token_column_to_user_table', 1561617598),
('m190627_041620_user_type_table', 1561617599),
('m190627_041631_department_table', 1561617600),
('m190627_041723_payable_salary_tax_charge_table', 1561617601),
('m190627_044632_user_account_table', 1561617601);

-- --------------------------------------------------------

--
-- Table structure for table `payable_salary_tax_charge`
--

CREATE TABLE `payable_salary_tax_charge` (
  `id` int(11) NOT NULL,
  `payable_salary_upto` int(11) NOT NULL,
  `tax_percentage_value` decimal(3,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payable_salary_tax_charge`
--

INSERT INTO `payable_salary_tax_charge` (`id`, `payable_salary_upto`, `tax_percentage_value`) VALUES
(1, 100, '1.5'),
(2, 500, '2.5'),
(3, 1000, '3.6'),
(4, 1500, '3.9'),
(5, 2000, '4.0'),
(6, 8000, '8.3'),
(7, 20000, '9.1'),
(8, 50000, '11.9'),
(9, 100000, '13.9'),
(10, 1000000, '30.9');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_type_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`, `user_type_id`, `department_id`) VALUES
(1, NULL, NULL, 'admin', 'G4lBkM1G7Nhh6K1nwJNbtH9PV7gPSYK9', '$2y$13$GmBU/uDD/HKJAzJvOGfm9.GpbHDNAFRqMR7txxbI9vP2Cvu2j5L12', NULL, 'admin@local.host', 10, 1561617973, 1561617973, NULL, NULL, NULL),
(2, 'User', 'First', 'user0', '9zJscuZ-QhA5IqHAAlPsODboCCr0pnzl', '$2y$13$J7A0VW.H3tCGcsoM0w4UyeffzbajjpeWe3a8YJJYnp0Lm9og.AKbW', NULL, 'user0@local.to', 10, 1561624851, 1561630474, NULL, 3, 2),
(3, 'User', 'Second', 'user2', '6qstGWuyK9ore0tCVo9joMRLaOJF0pjm', '$2y$13$1P90pAK7/d1m4maSweW.W.HL0HS58Qtbef6S/6QhFXYAOXb4fAZqu', NULL, 'user2@local.to', 10, 1561625283, 1561625283, NULL, 4, 8),
(4, 'Users', 'Third', 'user33', 'mem_47CmyGzVSeNHM8AZB0Khd_HKIUJU', '$2y$13$kwbDLzIpIsakyiaAcXsOmOmTOarvfEUAEvqrtQW0nCcLXH4D5djo6', NULL, 'user3@localhot.co', 10, 1561628643, 1561630502, NULL, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `payable_salary` decimal(10,2) NOT NULL,
  `basic_salary` decimal(10,2) NOT NULL,
  `tax_value` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `user_id`, `payable_salary`, `basic_salary`, `tax_value`) VALUES
(3, 2, '12998.44', '10000.00', '1182.86'),
(4, 3, '49250.00', '13000.00', '5860.75'),
(5, 4, '37872.89', '13000.00', '4506.87');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `basic_salary` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `type`, `basic_salary`) VALUES
(1, 'Worker 1', '2000.00'),
(2, 'Worker 2', '5000.00'),
(3, 'Worker 3', '10000.00'),
(4, 'Worker 4', '13000.00'),
(5, 'Worker 5', '15000.00');

-- --------------------------------------------------------

--
-- Structure for view `account_view`
--
DROP TABLE IF EXISTS `account_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `account_view`  AS  select `u`.`id` AS `id`,`u`.`first_name` AS `first_name`,`u`.`last_name` AS `last_name`,`ua`.`payable_salary` AS `payable_salary`,`ua`.`basic_salary` AS `basic_salary`,`ua`.`tax_value` AS `tax_value`,`d`.`last_month_deduction` AS `last_month_deduction`,`ut`.`type` AS `user_type`,`d`.`name` AS `department_name` from (((`user` `u` join `user_account` `ua` on((`u`.`id` = `ua`.`user_id`))) join `user_type` `ut` on((`u`.`user_type_id` = `ut`.`id`))) join `department` `d` on((`d`.`id` = `u`.`department_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `payable_salary_tax_charge`
--
ALTER TABLE `payable_salary_tax_charge`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payable_salary_upto` (`payable_salary_upto`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`),
  ADD KEY `idx-user-user_type_id` (`user_type_id`),
  ADD KEY `idx-user-department_id` (`department_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-user_account-user_id` (`user_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type` (`type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payable_salary_tax_charge`
--
ALTER TABLE `payable_salary_tax_charge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk-user-department_id` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-user-user_type_id` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_account`
--
ALTER TABLE `user_account`
  ADD CONSTRAINT `fk-user_account-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
