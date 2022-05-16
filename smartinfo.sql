-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2022 at 06:34 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartinfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `aadharno` varchar(1000) NOT NULL,
  `dob` date NOT NULL,
  `regno` varchar(255) NOT NULL,
  `speciality` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `email`, `aadharno`, `dob`, `regno`, `speciality`, `password`, `created_at`) VALUES
(1, 'Maitra', 'Khatri', 'adminmaitra@gmail.com', '888666444222', '2021-09-07', 'Asdf1234', 'ENT', '$2y$10$VgroG/0p2881eoioNW94eeMarzdGKzr6zWIyIxLEcYZduj0ubASji', '2021-09-15 13:28:03'),
(2, 'Doc ', 'Hirva', 'adminhirva@gmail.com', '111555999777', '2021-10-06', 'Qwerty987', 'Cardiologist', '$2y$10$LIqCLMN/HkjtYbIaLlWtvu0YXe.Cp8B5JtNeuoMxTe2HI93X2DKei', '2021-10-12 19:24:23');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `fname`, `lname`, `email`, `message`) VALUES
(1, 'Maitra', 'Khatri', 'maitrakhatri@gmail.com', 'Your platform is amazing !!'),
(2, 'Maitra', 'Khatri', 'maitrakhatri@gmail.com', 'You guys rock !!'),
(3, 'Maitra', 'Khatri', 'maitrakhatri@gmail.com', 'We are amazing !! yay');

-- --------------------------------------------------------

--
-- Table structure for table `med_history`
--

CREATE TABLE `med_history` (
  `id` int(11) NOT NULL,
  `aadharno` varchar(1000) NOT NULL,
  `age` int(255) NOT NULL,
  `bloodgroup` varchar(255) NOT NULL,
  `allergies` varchar(255) NOT NULL,
  `med_hist` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `med_history`
--

INSERT INTO `med_history` (`id`, `aadharno`, `age`, `bloodgroup`, `allergies`, `med_hist`) VALUES
(1, '888666444222 ', 22, 'B-ve', 'Peanut Butter, Dust, Thelesemia Minor', 'Lactose Intolerant, Apendix surgery.'),
(12, '111555999777', 21, 'B-ve', 'Dust', 'Typhoid'),
(13, '111122223333', 20, 'O-ve', 'Peanut Butter', 'Asthama'),
(14, '999888777444', 21, 'AB-ve', 'Thelesemia Minor', 'Anxiety'),
(15, '222333444555', 0, '', '', ''),
(16, '999666333444', 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `aadharno` varchar(1000) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `aadharno`, `dob`, `password`, `created_at`) VALUES
(1, 'Maitra', 'Khatri', 'maitrakhatri@gmail.com', '888666444222', '2001-05-03', '$2y$10$L4.003BWtj9bJc.0mUggiuC2UcL26CmikfWwWnGysI.kiA0yMvZAK', '2021-08-09 22:23:10'),
(12, 'Hirva', 'D', 'hirva@gmail.com', '111555999777', '2021-10-06', '$2y$10$vSn6D5maaaVfylZvyw42TuD5iLHDyYlaU7ESWALQmztYZv/DqivCG', '2021-10-12 18:53:49'),
(13, 'Swapnil', 'Mishra', 'swapnilmishra@gmail.com', '111122223333', '2021-10-11', '$2y$10$UjIWHB4.gKXN8SDi3cF0G.txBEAkj4XLUPEIFbSG7/45YQq0HNuyy', '2021-10-12 19:14:39'),
(14, 'Siddharth', 'Jadeja', 'siddharthj@gmail.com', '999888777444', '2021-10-01', '$2y$10$Yxvp8XDDdz.AOYiqrvr3OuXOhAIn./X9KCC0/JmhTonq8035di41S', '2021-10-12 19:21:42'),
(15, 'Shruti', 'B', 'shruti@gmail.com', '222333444555', '2021-10-05', '$2y$10$SfsBwVzAWnN6WXIFIy.fNewW3WDRr0ddL8PlnCbufp1m2YXXHjwB.', '2021-10-12 19:37:48'),
(16, 'Manthan', 'Kapoor', 'manthan@gmail.com', '999666333444', '2021-09-27', '$2y$10$k424cMm9nDnL2WRAH7isRun9OGw0hDatf8f2vmGIKrhu49pY6t6V6', '2021-10-13 12:01:53');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `create_user_medhistory` AFTER INSERT ON `users` FOR EACH ROW INSERT INTO med_history(id, aadharno) VALUES (NEW.id, NEW.aadharno)
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `med_history`
--
ALTER TABLE `med_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `med_history`
--
ALTER TABLE `med_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
