-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Wrz 29, 2024 at 12:17 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hackyeah`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `currency` float DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `deposit` float NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `name`, `currency`, `user_id`, `category_id`, `deposit`, `date`) VALUES
(1, 'Rent Payment', 1200, 1, 6, 1000, '2024-09-01'),
(2, 'Grocery Shopping', 150, 1, 7, 120, '2024-09-02'),
(3, 'Bus Ticket', 3, 1, 8, 2.5, '2024-09-03'),
(4, 'Doctor Visit', 100, 1, 9, 80, '2024-09-04'),
(5, 'Medicine Purchase', 50, 1, 10, 40, '2024-09-05'),
(6, 'Online Course', 200, 1, 12, 150, '2024-09-06'),
(7, 'Books Purchase', 60, 1, 14, 50, '2024-09-07'),
(8, 'Dining Out', 80, 1, 15, 60, '2024-09-08'),
(9, 'Photography Equipmen', 300, 1, 17, 250, '2024-09-09'),
(10, 'Grocery Shopping', 150, 1, 7, 130, '2024-09-10'),
(11, 'Internet Bill', 50, 1, 24, 45, '2024-09-11'),
(12, 'Electricity Bill', 100, 1, 19, 90, '2024-09-12'),
(13, 'Gym Membership', 60, 1, 12, 50, '2024-09-13'),
(14, 'Furniture Purchase', 500, 1, 18, 450, '2024-09-14'),
(15, 'Cleaning Supplies', 30, 1, 19, 20, '2024-09-15'),
(16, 'Home Repairs', 200, 1, 20, 150, '2024-09-16'),
(17, 'Clothing Purchase', 150, 1, 21, 100, '2024-09-17'),
(18, 'Spa Day', 80, 1, 23, 60, '2024-09-18'),
(19, 'Cinema Tickets', 40, 1, 24, 30, '2024-09-19'),
(20, 'Travel Expenses', 500, 1, 25, 400, '2024-09-20'),
(21, 'Camping Gear', 120, 1, 26, 100, '2024-09-21'),
(22, 'Stock Investment', 1000, 1, 27, 900, '2024-09-22'),
(23, 'Savings Deposit', 500, 1, 28, 450, '2024-09-23'),
(24, 'Charity Donation', 50, 1, 30, 40, '2024-09-24'),
(25, 'Family Support', 200, 1, 31, 150, '2024-09-25'),
(26, 'New Gadgets', 300, 1, 32, 250, '2024-09-26'),
(27, 'Monthly Subscription', 60, 1, 24, 50, '2024-09-27'),
(28, 'Special Occasion Gif', 150, 1, 15, 120, '2024-09-28'),
(29, 'Home Improvement Sup', 80, 1, 20, 70, '2024-09-29'),
(30, 'Outdoor Equipment', 250, 1, 26, 200, '2024-09-30');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `e_category`
--

CREATE TABLE `e_category` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `e_category`
--

INSERT INTO `e_category` (`id`, `name`) VALUES
(6, 'Rent / Housing Costs'),
(7, 'Groceries'),
(8, 'Transportation'),
(9, 'Medications'),
(10, 'Doctor Visits'),
(11, 'Dental Care'),
(12, 'Courses and Trainings'),
(13, 'Language Learning'),
(14, 'Books and Educational Material'),
(15, 'Dining Out'),
(16, 'Games and Toys'),
(17, 'Photography Equipment'),
(18, 'Furniture and Appliances'),
(19, 'Cleaning Supplies'),
(20, 'Home Repairs and Renovations'),
(21, 'Clothing and Accessories'),
(22, 'Cosmetics'),
(23, 'Hairdressing and Spa'),
(24, 'Culture (Cinema, Theater, Conc'),
(25, 'Travel'),
(26, 'Outdoor Activities'),
(27, 'Investments (Stocks, Bonds, Cr'),
(28, 'Savings Accounts'),
(29, 'Real Estate'),
(30, 'Donations'),
(31, 'Family Support'),
(32, 'Electronic Equipment'),
(33, 'Gadgets');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(60) NOT NULL,
  `points` int(11) NOT NULL,
  `two_factor` tinyint(1) NOT NULL,
  `token` varchar(24) DEFAULT NULL,
  `login_attempts` int(2) NOT NULL,
  `last_login_attempt` datetime DEFAULT NULL,
  `two_factor_code` int(11) NOT NULL,
  `auth_date` datetime DEFAULT NULL,
  `created` datetime NOT NULL,
  `verified` tinyint(1) DEFAULT NULL,
  `permission_level` int(3) NOT NULL DEFAULT 0,
  `is_adult` tinyint(1) NOT NULL,
  `family_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `points`, `two_factor`, `token`, `login_attempts`, `last_login_attempt`, `two_factor_code`, `auth_date`, `created`, `verified`, `permission_level`, `is_adult`, `family_id`) VALUES
(1, 'john_doe', 'john@example.com', '$2a$12$pMh5MYsHRNa8YfnP04VnDOugW8GqCPCW.kQG.g0MISQ1RD38E7mke', 100, 1, '66f87919860847.60734792', 0, NULL, 64982, '2024-09-28 23:41:53', '2024-09-28 23:41:53', 1, 1, 1, 1),
(2, 'jane_smith', 'jane@example.com', '$2a$12$pMh5MYsHRNa8YfnP04VnDOugW8GqCPCW.kQG.g0MISQ1RD38E7mke', 150, 1, '', 0, NULL, 654321, '2024-09-28 23:41:53', '2024-09-28 23:41:53', 1, 1, 1, 1),
(3, 'alex_brown', 'alex@example.com', '$2a$12$pMh5MYsHRNa8YfnP04VnDOugW8GqCPCW.kQG.g0MISQ1RD38E7mke', 200, 0, NULL, 0, NULL, 111222, '2024-09-28 23:41:53', '2024-09-28 23:41:53', 1, 1, 1, 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksy dla tabeli `e_category`
--
ALTER TABLE `e_category`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `e_category`
--
ALTER TABLE `e_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
