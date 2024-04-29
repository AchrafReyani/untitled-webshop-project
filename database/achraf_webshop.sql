-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 23 apr 2024 om 16:21
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `achraf_webshop`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `order_rows`
--

CREATE TABLE `order_rows` (
  `id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`) VALUES
(1, 'Sphero BOLT', 'Sphero BOLT is an app-enabled robotic ball that you can code to move, light up, make sounds, and more. It\'s a great way to learn about robotics, coding, and artificial intelligence (AI). Sphero BOLT is perfect for kids and adults alike.', 119.99, 'Images/Sphero.jpg'),
(2, 'Kano Computer Kit', 'The Kano Computer Kit is a great way for kids to learn about coding and build their own computer. The kit includes everything you need to build a Raspberry Pi computer, including a case, keyboard, mouse, and SD card. The kit also comes with a pre-loaded operating system that is designed for kids, with a drag-and-drop coding interface.', 99, 'Images/Kano.jpg'),
(3, 'Circuit Playground Express', 'The Circuit Playground Express is a versatile all-in-one development board from Adafruit. It\'s perfect for learning to code and electronics, especially for beginners. It has built-in LEDs, sensors, a speaker, and more, so you can start creating interactive projects without needing any extra components.', 34.99, 'Images/CPE.jpg'),
(4, 'Arduino Uno', 'Arduino is an open-source electronics platform based on easy-to-use hardware and software. Arduino boards can be used to read inputs - light sensors, PIR sensors, buttons, etc - and control outputs - like LEDs, motors, and other actuators. The Arduino Uno is a great starter board for anyone interested in learning electronics and programming.', 18, 'Images/Arduino.jpg'),
(5, 'Raspberry Pi', 'The credit card-sized Raspberry Pi is a series of small single-board computers developed in the United Kingdom by the Raspberry Pi Foundation with the intention of promoting the teaching of basic computer science in schools and in developing countries. The Raspberry Pi is a mini computer that plugs into a TV and a keyboard and mouse. It is a very affordable computer that can be used for many of the things that you do on your desktop computer, like browsing the internet, watching videos, and playing games.', 35, 'Images/RPI.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pwd` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `pwd`) VALUES
(12, 'voetballer@gmail.com', 'voetbal speler', '$2y$10$j1FX.nRRSoQZhWSTD.Xp8.DsOmw.9s8Sd7t/3ad1GTm7Qsun0.ckS'),
(13, 'achraf@gmail.com', 'achraf', '$2y$10$TCBHjD3lgCvLKLYAAEt.feO/p49y9vCwfD1vSaWyDmRbqWfdbhMUy'),
(14, 'test@gmail.com', 'test', '$2y$10$3dyy8/r957uhHPgnjEX4v.7RfPlS3SXnZFJX2lnFF1FOyWPC10dnO'),
(15, 'email@email.com', 'nieuwegebruiker', '$2y$10$ekuO90nqHGQB4vWigAutPe4DfQ94sJ3SAai0len8KH4xuV.LYh1FO'),
(17, 'test5@test.com', 'test5', '$2y$10$nf7/vxqmg5JHcMQRlWiEB.7dSqMtW0VmpkVbrBgFfbnL3uhT4aYSa'),
(18, 'new@mail.com', 'newuser', '$2y$10$w4BG8IrCRKOeSdyHAbIEPuPLrKFVM248oT5nqx3FzTg7nLLNV2NmK');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `link order to user with id` (`user_id`);

--
-- Indexen voor tabel `order_rows`
--
ALTER TABLE `order_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign key for order id with id from order` (`order_id`),
  ADD KEY `foreign key for product id with id from product` (`product_id`);

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `order_rows`
--
ALTER TABLE `order_rows`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `link order to user with id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Beperkingen voor tabel `order_rows`
--
ALTER TABLE `order_rows`
  ADD CONSTRAINT `foreign key for order id with id from order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `foreign key for product id with id from product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
