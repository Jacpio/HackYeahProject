-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Wrz 28, 2024 at 01:14 PM
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
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
