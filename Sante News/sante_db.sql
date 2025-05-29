-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2025 at 07:52 AM
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
-- Database: `sante_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$1z2x3c4v5b6n7m8k9l0p1q2w3e4r5t6y7u8i9o0p1a2s3d4f5g6h'),
(2, 'freshpascal99@gmail.com', '$2y$10$.Rr0CB5r7.0E.Vhj0Awz9.N7HElas5gNMnyN5eRXgQTpbb0ImA38q'),
(3, 'yves@gmail.com', '$2y$10$m917QG9sPjxVK02ZoO9KCOpw0IdlefWzm430eaPpztrVgPQeenW96'),
(4, 'papakari', '$2y$10$MvRt9IoT0B575tr344MgWe4B9XxiMLanAyMu.kbUDTOaXNtnTKjQ6'),
(5, 'kevinking6036@gamil.com', '$2y$10$.EiMVUgsf6rHJrXBb2QJDuZDkyT5i9WHjiEWXr/hz1rP5ve25gzNC');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `update_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `update_id` int(11) NOT NULL,
  `user_ip` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(2, 'KAGABO', 'freshpascal99@gmail.com', 'KAGABO', '2025-05-13 19:06:06'),
(4, 'KAGABO', 'freshpascal99@gmail.com', 'thank you', '2025-05-14 06:28:47'),
(5, 'papa karisa', 'papakari@gmail', 'nshut yange ibintu ni byiz peuh mukomeze muduhe amakuru murakoze', '2025-05-14 06:41:42'),
(7, 'papakaris', 'papakari@gmail', 'thanksasdfghjklghfdfh;lk', '2025-05-14 15:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `category` enum('updates','upcoming','last') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`id`, `title`, `content`, `date`, `category`) VALUES
(1, 'heloo', 'emdfg vbv mc fg  vmkghg,hmrtm etfmh th trgktm htmfmk 4t h rtgh trmghrtmh trm gh trghym gh  rs,erm t tmy', '2025-06-02 15:00:00', 'upcoming'),
(2, 'ANDRE WANYU', 'Andre ni legend kand legend never die always', '2025-05-13 15:15:00', 'updates'),
(4, 'yves dev', 'wvhhhhhhhhhhr', '2025-05-13 15:16:00', 'updates'),
(5, 'Dr KAGABO Transferred to work at Kabgayi', '+250 787 377 750 ish connect in edtech training center\r\n\r\nInstagram:\r\n1.rwandaictchamber250\r\n2.rwandaict', '2025-05-13 21:31:00', 'updates'),
(6, 'Abimana Yves is software engineer at kabgayi hospital', 'ob wsediobj wsfe;ioheng ilhgevno.iaf dhbfo kwekgjp ouwego;ilerjgnd uikrfo;rgbikjsjfdvniojrdos ljfepilhbow;qeihbolwegdndvkjbgoiljernhik;hweigdnw', '2025-05-13 21:36:00', 'updates'),
(7, 'RWANDA', 'TJHREERTYUIOLKHRR', '2025-05-27 22:59:00', 'upcoming'),
(8, 'Lycee De Nyanza', 'school of TVET(Technical Vocational Education Trainings).', '2025-05-14 09:24:00', 'updates'),
(9, 'Lycee De Nyanza', 'school of TVET(Technical Vocational Education Trainings).', '2025-05-14 09:24:00', 'updates'),
(10, 'Lycee De Nyanza', 'abana ba Lycee de nyanza ', '2025-05-14 06:24:00', 'updates'),
(11, 'Lycee De Nyanza', 'abana ba Lycee de nyanza ', '2025-05-14 08:24:00', 'updates'),
(12, 'malaria mur lycee', '50% bose muri lyceed bararwaye kuva kuwa 13 gicurasi 2025;', '2025-05-15 19:39:00', 'upcoming'),
(13, 'malaria mur lycee', '50% bose muri lyceed bararwaye kuva kuwa 13 gicurasi 2025;', '2025-05-15 19:39:00', 'upcoming'),
(14, 'wertyuikl', 'dxhjklkjhgfcvnmgfcdxfcv', '2025-05-06 06:48:00', 'last'),
(15, 'wertyuikl', 'dxhjklkjhgfcvnmgfcdxfcv', '2025-05-06 06:48:00', 'last');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `update_id` (`update_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `update_id` (`update_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`update_id`) REFERENCES `updates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`update_id`) REFERENCES `updates` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
