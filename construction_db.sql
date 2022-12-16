-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2022 at 01:26 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `construction_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL DEFAULT '',
  `phone_number` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL DEFAULT '',
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `first_name`, `last_name`, `email`, `phone_number`, `address`, `location_id`) VALUES
(1, 'Za', 'Queen', 'herroyalhighness@royalty.gov.uk', '0000', 'Buckingham Palace', 3),
(2, 'Bisdak', 'Kayngdako', 'cebunumbawan@cebu.gov.ph', '09223344556', 'Somewhere in Cebu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`, `region_id`) VALUES
(1, 'United States', 1),
(2, 'Philippines', 7),
(3, 'Japan', 6),
(4, 'United Kingdom', 9),
(5, 'Germany', 12),
(6, 'Saudi Arabia', 13),
(7, 'Brazil', 2),
(8, 'Australia', 8),
(9, 'Russia', 11),
(10, 'Egypt', 14);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `min_salary` decimal(19,4) NOT NULL,
  `max_salary` decimal(19,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_title`, `min_salary`, `max_salary`) VALUES
(1, 'Construction Worker', '10000.0000', '15000.0000'),
(2, 'Foreman', '20000.0000', '30000.0000');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `location_id` int(11) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `city` varchar(255) NOT NULL DEFAULT '',
  `state_province` varchar(255) NOT NULL DEFAULT '',
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `postal_code`, `city`, `state_province`, `country_id`) VALUES
(1, '6000', 'Cebu City', 'Cebu', 2),
(2, '6001', 'Consolacion', 'Cebu', 2),
(3, 'SW1A 1AA', 'Westminster', 'London', 4),
(4, 'NW8', 'Westminster', 'London', 4),
(5, '2000', 'Sydney', 'New South Wales', 8),
(6, '1000', 'Manila', 'Metro Manila', 2);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `foreman_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `budget` decimal(19,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `project_suppliers`
--

CREATE TABLE `project_suppliers` (
  `project_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `project_workers`
--

CREATE TABLE `project_workers` (
  `project_id` int(11) NOT NULL,
  `worker_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `region_id` int(11) NOT NULL,
  `region_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`region_id`, `region_name`) VALUES
(1, 'North America'),
(2, 'South America'),
(3, 'Central America'),
(4, 'Caribbean'),
(5, 'Central & South Asia'),
(6, 'Northeastern Asia'),
(7, 'Southeastern Asia'),
(8, 'Australia and Oceania'),
(9, 'Northern Europe'),
(10, 'Southern Europe'),
(11, 'Eastern Europe'),
(12, 'Western Europe'),
(13, 'Middle East'),
(14, 'Northern Africa'),
(15, 'Southern Africa');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL DEFAULT '',
  `phone_number` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL DEFAULT '',
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `worker_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL DEFAULT '',
  `phone_number` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL DEFAULT '',
  `hire_date` date NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `salary` decimal(19,4) NOT NULL,
  `foreman_id` int(11) DEFAULT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`worker_id`, `first_name`, `last_name`, `email`, `phone_number`, `address`, `hire_date`, `job_id`, `salary`, `foreman_id`, `location_id`) VALUES
(2, 'John', 'Johnson', 'test@example.com', 'X012-345-6789', 'Sydney Opera House', '2022-12-07', 1, '12000.0000', 3, 5),
(3, 'Bob', 'Builder', 'Bob_D_Builder@builderbob.build', '876-BUILD', 'Builder Base St.', '2022-12-06', 2, '25000.0000', NULL, 4),
(5, 'Davy', 'Jones', 'sample2@insert.com', '1234-78', 'P. Sherman, 42 Wallaby Way', '2022-12-11', 1, '10000.0000', 3, 5),
(6, 'Steph', 'Jobless', 'no@jobs.com', '000-0000', 'Homeless St.', '2022-12-12', NULL, '0.0000', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`),
  ADD KEY `client_location_fk` (`location_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`),
  ADD KEY `country_region_fk` (`region_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `location_country_fk` (`country_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `project_suppliers`
--
ALTER TABLE `project_suppliers`
  ADD KEY `ps_supplier_fk` (`supplier_id`),
  ADD KEY `ps_project_fk` (`project_id`);

--
-- Indexes for table `project_workers`
--
ALTER TABLE `project_workers`
  ADD KEY `pw_project_fk` (`project_id`),
  ADD KEY `pw_worker_fk` (`worker_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`region_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`),
  ADD KEY `supplier_location` (`location_id`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`worker_id`),
  ADD KEY `worker_foreman_fk` (`foreman_id`),
  ADD KEY `worker_location_fk` (`location_id`),
  ADD KEY `worker_job_fk` (`job_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `region_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `worker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `client_location_fk` FOREIGN KEY (`location_id`) REFERENCES `locations` (`location_id`) ON UPDATE CASCADE;

--
-- Constraints for table `countries`
--
ALTER TABLE `countries`
  ADD CONSTRAINT `country_region_fk` FOREIGN KEY (`region_id`) REFERENCES `regions` (`region_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `location_country_fk` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_suppliers`
--
ALTER TABLE `project_suppliers`
  ADD CONSTRAINT `ps_project_fk` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ps_supplier_fk` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`supplier_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_workers`
--
ALTER TABLE `project_workers`
  ADD CONSTRAINT `pw_project_fk` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pw_worker_fk` FOREIGN KEY (`worker_id`) REFERENCES `workers` (`worker_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD CONSTRAINT `supplier_location` FOREIGN KEY (`location_id`) REFERENCES `locations` (`location_id`) ON UPDATE CASCADE;

--
-- Constraints for table `workers`
--
ALTER TABLE `workers`
  ADD CONSTRAINT `worker_foreman_fk` FOREIGN KEY (`foreman_id`) REFERENCES `workers` (`worker_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `worker_job_fk` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `worker_location_fk` FOREIGN KEY (`location_id`) REFERENCES `locations` (`location_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
