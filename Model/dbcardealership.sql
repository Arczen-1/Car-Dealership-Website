-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2024 at 12:06 PM
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
-- Database: `dbcardealership`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(255) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `date`, `time`, `email`, `title`, `firstName`, `lastName`) VALUES
(1, '2024-04-02', '11:00', 'cobdelapena@gmail.com', '', 'Jacob', 'Dela Pena'),
(2, '2024-04-02', '5:00', 'arczenbaluyot@gmail.com', 'Mr', 'Arczen', 'Baluyot'),
(3, '2024-04-16', '1:00', 'brucewayne@gmail.com', 'Mr', 'Bruce', 'Wayne'),
(4, '2024-04-05', '7:00', 'nhizelirish@yahoo.com', '', 'Nhizel', 'Baluyot');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(100) NOT NULL,
  `img` text NOT NULL,
  `carName` text NOT NULL,
  `carDescription` text NOT NULL,
  `carPrice` text NOT NULL,
  `carEngine` text NOT NULL,
  `carPower` text NOT NULL,
  `carTopSpeed` text NOT NULL,
  `mph` text NOT NULL,
  `consumption` text NOT NULL,
  `emissions` text NOT NULL,
  `length` text NOT NULL,
  `width` text NOT NULL,
  `height` text NOT NULL,
  `tankCapacity` text NOT NULL,
  `maxPower` text NOT NULL,
  `maxTorque` text NOT NULL,
  `maxEngineSpeed` text NOT NULL,
  `topSpeed` text NOT NULL,
  `acceleration` text NOT NULL,
  `braking` text NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `img`, `carName`, `carDescription`, `carPrice`, `carEngine`, `carPower`, `carTopSpeed`, `mph`, `consumption`, `emissions`, `length`, `width`, `height`, `tankCapacity`, `maxPower`, `maxTorque`, `maxEngineSpeed`, `topSpeed`, `acceleration`, `braking`, `color`) VALUES
(4, '../Public/img/car1.png', 'Rolls-Royce Wraith', 'The Wraith is a luxury coupe that delivers an exceptional driving experience with its V-12 engine. It\'s designed for those who enjoy the drive as much as the destination, offering supreme comfort and nearly limitless customization options.', '$330,488', '6.6-liter V12 engine with twin turbochargers', '624 hp @ 5,600 rpm', '250 km/h', '4.1 seconds', '12/18 mpg city/highway', 'Not provided', '5285 mm', '1947 mm', '1507 mm', '83 liters', '624 hp @ 5,600 rpm', '605 lb-ft @ 1,500 rpm; 642 lb-ft for Black Badge models', 'Not specified', '250 km/h', '4.5 seconds', 'Equipped with ventilated disc brakes for both front and rear', 'red'),
(5, '../Public/img/car2.png', 'Rolls Royce Ghost Black Badge', 'The Ghost Black Badge is the performance-focused variant of the Rolls Royce Ghost. It features a more powerful engine and a host of design elements in black, providing a more assertive and dynamic presence.', '$450,000', '6.75-liter twin-turbocharged V12 engine', 'Approximately 592 hp', '155 mph (250 km/h)', '4.8 s', 'Not provided', 'Typically high for luxury vehicles with large displacement engines', 'About 5,546 mm', 'Around 1,948 mm', 'Approximately 1,571 mm', 'Usually around 82 to 100 liters, varying by specific model and year.', 'Up to 592 horsepower at around 5,250 rpm', '664 lb-ft', 'Not specified', '155 mph (250 km/h)', '4.3 seconds', 'Equipped with large disc brakes, often carbon-ceramic, to ensure rapid deceleration from high speeds', 'black'),
(6, '../Public/img/car4.jpeg', 'Mercedes-AMG GT 63', 'A luxurious sports coupe with practical features and high performance.', '$136,050', '4.0-liter V8 biturbo', '430 kW', 'Not specified', '196-mph', '14.1 l/100 km', '319 g/km', '199.2 inches', '81.5 inches', '56.8 inches', '21.1 gallons', '630 hp is achieved at 5,500-6,500 rpm for the GT 63 S 4-door Coupe.', '800 Nm', 'Not specified', 'Not specified', '3.2 seconds', 'Not specified', 'black'),
(7, '../Public/img/car5.png', 'Lamborghini Urus', 'The Lamborghini Urus is touted as the world’s first Super Sport Utility Vehicle. Known for its dramatic styling, it delivers extraordinary driving dynamics, powerful performance, and is versatile enough to be driven on various terrains.', '$229,268', '4.0-liter twin-turbocharged V8', '650 CV (478 kW) at 6,000 rpm', '305 km/h (around 190 mph)', '190 mph', 'Around 12 to 14 mpg city / 17 to 19 mpg highway', 'Approximately 325 g/km', 'About 201.3 inches (5,112 mm)', 'Approximately 79.4 inches (2,017 mm) without mirrors', 'Roughly 64.5 inches (1,638 mm)', 'Approximately 22.5 gallons (85 liters)', '650 CV (478 kW) at 6,000 rpm', '850 Nm (626.93 lb.-ft.) at 2,250-4,500 rpm', 'Up to 6,800 rpm', 'Up to 6,800 rpm', '3.6 seconds', 'About 111 feet (34 meters)', 'gray'),
(11, '../Public/img/car6.png', 'Mustang', 'nice', '2000', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `name`, `email`, `message`) VALUES
(1, 'jacob', 'cobdelapena@gmail.com', 'Nice Website!1'),
(2, 'Arczen Baluyot', 'arczenbaluyot@gmail.com', 'How much for toyota vios?'),
(3, 'Bruce', 'brucewayne@gmail.com', 'Please add more black car listings'),
(4, 'Zen', 'nhizelirish@yahoo.com', 'Hello! I want some Ice Cream. Thanks!'),
(5, 'Baluyot', 'nhizelirish@yahoo.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(255) NOT NULL,
  `car` varchar(55) NOT NULL,
  `price` int(255) NOT NULL,
  `salesPerson` varchar(255) NOT NULL,
  `soldTo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `car`, `price`, `salesPerson`, `soldTo`) VALUES
(8, 'Toyota Camry', 25000, 'John Doe', 'Michael Johnson'),
(9, 'Honda Civic', 22000, 'Sarah Smith', 'Emily Brown'),
(10, 'Ford Mustang', 35000, 'Robert Williams', 'David Taylor'),
(14, 'Toyota Camry', 25000, 'John Doe', 'Michael Johnson'),
(15, 'Honda Civic', 22000, 'Sarah Smith', 'Emily Brown'),
(16, 'Ford Mustang', 35000, 'Robert Williams', 'David Taylor');

-- --------------------------------------------------------

--
-- Table structure for table `tblaccount`
--

CREATE TABLE `tblaccount` (
  `id` int(3) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`id`, `email`, `password`, `role`) VALUES
(3, 'nhizelirish@yahoo.com', '$2y$10$4XjvTYr9klDKrAaZEaT.reFrxG.WUfVmPtleaisu7NCGYzEbN6vLG', NULL),
(4, 'arczenb@gmail.com', '$2y$10$3mXq19thuyTAT9J.YuWfIejePu2oPpAYEFRsDwHHei.G2S/Uf8/tq', 'admin'),
(5, '123@gmail.com', '$2y$10$eWLDgsXk0Sjnv15Sbp3aJez0hsChn.7oPoIfM9/oslczBqvCu7w2i', NULL),
(13, 'nhizelirish@yahoo.com', '$2y$10$7fRb6WqFDgdAEvrFIRctrOU3WFLvxZIrL5ANNdGwcEboP.q11iTpi', 'admin'),
(14, 'nhizelirish@yahoo.com', '$2y$10$R52rT6GdblhnIp4zJEwS0eKEfaABhcSy6./JnfEPpxOCwR0pEyQ8G', 'admin'),
(15, '45@gmail.com', '$2y$10$unZWid7UPuxT7DTvNjvZT.CqfkpUjCpE3NwQVfujpZZ7ZwjvqFcui', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblaccount`
--
ALTER TABLE `tblaccount`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
