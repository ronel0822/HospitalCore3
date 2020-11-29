-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2020 at 05:03 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `core3`
--

-- --------------------------------------------------------

--
-- Table structure for table `core3_med_pack`
--

CREATE TABLE `core3_med_pack` (
  `id` int(11) NOT NULL,
  `mp_name` varchar(255) NOT NULL,
  `mp_price` int(11) NOT NULL,
  `mp_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core3_med_pack`
--

INSERT INTO `core3_med_pack` (`id`, `mp_name`, `mp_price`, `mp_desc`) VALUES
(1, 'Pre-Employment Medical Package', 1000, 'For Employment'),
(2, 'Pregnant Package', 1000, 'For Health treatment'),
(3, 'Student Medical Package', 1200, 'For Educational purpose examination');

-- --------------------------------------------------------

--
-- Table structure for table `core3_med_pack_inc`
--

CREATE TABLE `core3_med_pack_inc` (
  `id` int(11) NOT NULL,
  `testname` varchar(255) NOT NULL,
  `med_pack_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core3_med_pack_inc`
--

INSERT INTO `core3_med_pack_inc` (`id`, `testname`, `med_pack_id`) VALUES
(39, 'CBC', 1),
(40, 'Ultrasound', 2),
(41, 'X-ray', 3);

-- --------------------------------------------------------

--
-- Table structure for table `core3_pharmacy_drugs`
--

CREATE TABLE `core3_pharmacy_drugs` (
  `drug_id` int(11) NOT NULL,
  `drug_name` varchar(255) NOT NULL,
  `drug_price` double NOT NULL,
  `drug_type` varchar(255) NOT NULL,
  `drug_description` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `core3_pharmacy_drugs`
--

INSERT INTO `core3_pharmacy_drugs` (`drug_id`, `drug_name`, `drug_price`, `drug_type`, `drug_description`, `created_at`) VALUES
(1, 'Paracetamol', 5, 'Test', 'This is just a test.', '2020-01-30 02:56:47'),
(2, 'Pinisilin', 10, 'Test', 'This is just a test 2.', '2020-01-30 03:14:53'),
(3, 'Test 3', 15, 'Test 3', 'This is test 3.', '2020-01-30 03:15:33'),
(4, 'Test 4', 11, 'Test 4', 'This is test 4.', '2020-01-30 03:25:08'),
(5, 'ARNEIL NUAY', 200, 'SHABU SHABU', 'MURA LANG ANG BIGAYAN, HANAPIN MO LANG AKO SA LUGAR NA KUNG SAAN MADILIM AT MAY PWESTO...', '2020-01-30 05:09:47'),
(6, 'Maxifeel', 50, 'Skin Care', 'Pang tangaal ng mukha', '2020-02-05 07:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `core3_pharmacy_drug_stocks`
--

CREATE TABLE `core3_pharmacy_drug_stocks` (
  `stock_id` int(11) NOT NULL,
  `drug_id` int(11) DEFAULT NULL,
  `stock_quantity` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `expiration_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `core3_pharmacy_drug_stocks`
--

INSERT INTO `core3_pharmacy_drug_stocks` (`stock_id`, `drug_id`, `stock_quantity`, `created_at`, `expiration_date`) VALUES
(8, 6, 50, '2020-02-05 08:01:57', '2022-02-05');

-- --------------------------------------------------------

--
-- Table structure for table `core3_pharmacy_drug_transaction`
--

CREATE TABLE `core3_pharmacy_drug_transaction` (
  `id` int(11) NOT NULL,
  `drug_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` double NOT NULL,
  `created_at` datetime NOT NULL,
  `transactionNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core3_pharmacy_drug_transaction`
--

INSERT INTO `core3_pharmacy_drug_transaction` (`id`, `drug_id`, `quantity`, `amount`, `created_at`, `transactionNo`) VALUES
(9, 5, 1, 200, '2020-02-05 03:41:34', 2010001),
(10, 4, 2, 22, '2020-02-05 03:41:34', 2010001),
(11, 5, 2, 400, '2020-02-05 05:34:04', 2010002),
(12, 2, 2, 20, '2020-02-05 07:49:40', 2010003),
(13, 1, 1, 5, '2020-02-05 07:49:40', 2010003),
(14, 6, 1, 50, '2020-02-05 07:54:25', 2010004),
(15, 6, 1, 50, '2020-02-05 07:55:19', 2010005);

-- --------------------------------------------------------

--
-- Table structure for table `core3_pharmacy_payment`
--

CREATE TABLE `core3_pharmacy_payment` (
  `id` int(11) NOT NULL,
  `total_cost` double NOT NULL,
  `cash_amount` double NOT NULL,
  `created_at` datetime NOT NULL,
  `transactionNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core3_pharmacy_payment`
--

INSERT INTO `core3_pharmacy_payment` (`id`, `total_cost`, `cash_amount`, `created_at`, `transactionNo`) VALUES
(1, 222, 250, '2020-02-05 03:41:34', 2010001),
(2, 400, 1000, '2020-02-05 05:34:04', 2010002),
(3, 25, 50, '2020-02-05 07:49:40', 2010003),
(4, 50, 50, '2020-02-05 07:54:25', 2010004),
(5, 50, 50, '2020-02-05 07:55:19', 2010005);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `user_type`) VALUES
(1, 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `core3_med_pack`
--
ALTER TABLE `core3_med_pack`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core3_med_pack_inc`
--
ALTER TABLE `core3_med_pack_inc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core3_pharmacy_drugs`
--
ALTER TABLE `core3_pharmacy_drugs`
  ADD PRIMARY KEY (`drug_id`);

--
-- Indexes for table `core3_pharmacy_drug_stocks`
--
ALTER TABLE `core3_pharmacy_drug_stocks`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `drug_id` (`drug_id`);

--
-- Indexes for table `core3_pharmacy_drug_transaction`
--
ALTER TABLE `core3_pharmacy_drug_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core3_pharmacy_payment`
--
ALTER TABLE `core3_pharmacy_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `core3_med_pack_inc`
--
ALTER TABLE `core3_med_pack_inc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `core3_pharmacy_drugs`
--
ALTER TABLE `core3_pharmacy_drugs`
  MODIFY `drug_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `core3_pharmacy_drug_stocks`
--
ALTER TABLE `core3_pharmacy_drug_stocks`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `core3_pharmacy_drug_transaction`
--
ALTER TABLE `core3_pharmacy_drug_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `core3_pharmacy_payment`
--
ALTER TABLE `core3_pharmacy_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `core3_pharmacy_drug_stocks`
--
ALTER TABLE `core3_pharmacy_drug_stocks`
  ADD CONSTRAINT `core3_pharmacy_drug_stocks_ibfk_1` FOREIGN KEY (`drug_id`) REFERENCES `core3_pharmacy_drugs` (`drug_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
