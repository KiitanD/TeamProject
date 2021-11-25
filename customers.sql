-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 25, 2021 at 12:23 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `team_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `password`, `phone`, `email`, `address`) VALUES
(5, 'Akosua', 'c7bbf35cdb8c5af64411e26c1fa3787d', '2514542565', 'akosua@gmail.com', '1 University Avenue, Berekuso'),
(7, 'Hortance', '029317980e2a86e9c5b9ad87e6244398', '02514542565', 'hortance@gmail.com', '1 University Avenue, Berekuso'),
(8, 'Nana', 'bce1404eaad206b0a6856b179f40e990', '02514542565', 'nana@gmail.com', '1 University Avenue, Berekuso'),
(90, 'lkadjfs', 'alskdjf', 'asldkjf', 'saldkj@go.com', 'slajf'),
(91, 'alds;fj', 'dslkjf', 'jdakls', 'sdflkj@go.com', 'sa;ldfj'),
(92, 'Kiitan', 'saldkjf', 'alkdj', 'lajf@gmail.com', 'lasdkjf'),
(93, 'asfdlj', 'adslfkj', 'saldkj', 'asdlkfj@sldkfj.co', 'dalsfj'),
(94, 'kiitan', 'kiitan', '4', 'kndside@gmail.com', 'here');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
