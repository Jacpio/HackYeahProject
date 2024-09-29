-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Wrz 29, 2024 at 12:18 AM
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
-- Struktura tabeli dla tabeli `bonds`
--

CREATE TABLE `bonds` (
  `id` int(11) NOT NULL,
  `series` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `interest` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bonds`
--

INSERT INTO `bonds` (`id`, `series`, `price`, `interest`) VALUES
(1, 'E', 100, 6.5),
(2, 'D', 100, 6),
(3, 'C', 100, 6),
(4, 'B', 100, 6),
(5, 'A', 100, 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `ask` double NOT NULL,
  `bid` double NOT NULL,
  `request_date` datetime NOT NULL,
  `effective_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `name`, `ask`, `bid`, `request_date`, `effective_date`) VALUES
(1, 'usd', 3.8713, 3.7947, '2024-09-28 13:41:09', '2024-09-27'),
(2, 'eur', 4.3129, 4.2275, '2024-09-28 13:59:47', '2024-09-27');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ores`
--

CREATE TABLE `ores` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `buy` double NOT NULL,
  `sell` double NOT NULL,
  `request_date` datetime NOT NULL,
  `measurment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ores`
--

INSERT INTO `ores` (`id`, `name`, `buy`, `sell`, `request_date`, `measurment_date`) VALUES
(1, 'gold coin', 10427, 9868, '2024-09-28 18:06:08', '2024-09-28'),
(2, 'silver coin', 114.6376, 97.79, '2024-09-28 18:07:46', '2024-09-28');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `name`, `price`, `date`) VALUES
(1, 'tesla', 998.5, '2024-09-28 23:24:58'),
(2, 'microsoft', 1669.2, '2024-09-28 23:25:28');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
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
  `permission_level` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `points`, `two_factor`, `token`, `login_attempts`, `last_login_attempt`, `two_factor_code`, `auth_date`, `created`, `verified`, `permission_level`) VALUES
(1, 'Walen', 'lubimyHejj@pie.pl', '$2y$12$6lafqdRfESy4Sf3CmEDlP.VcB97/VmUiwLiP4yRlFtl36Duh2f/cu', 0, 0, '66f3eb50ca2ef9.48849556', 0, NULL, 0, NULL, '2024-09-25 10:48:47', 1, 0),
(14, 'admin', 'kubekkaczek@gmail.com', '$2y$12$O4FhWZ6w23mvtnwHQFWeTex3swVJXLAwxJF0k4i8luAa11XWdeF1i', 0, 0, '66f7de371ebe41.03080294', 0, '2024-09-27 21:19:06', 58468, NULL, '2024-09-27 20:46:54', 0, 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `bonds`
--
ALTER TABLE `bonds`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `ores`
--
ALTER TABLE `ores`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `stocks`
--
ALTER TABLE `stocks`
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
-- AUTO_INCREMENT for table `bonds`
--
ALTER TABLE `bonds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ores`
--
ALTER TABLE `ores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
