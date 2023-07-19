-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: db.3wa.io
-- Generation Time: Jul 19, 2023 at 10:12 AM
-- Server version: 5.7.33-0ubuntu0.18.04.1-log
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blanchepeltier_e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `code_postal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `address_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(2044) NOT NULL,
  `price` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `product_category_id`, `image`) VALUES
(3, 'Apple MacBook Pro 16\" (2023)', 'Avec son processeur M1X ultra-rapide, un écran Retina de 16 pouces, 16 Go de RAM et un SSD de 512 Go, ce MacBook Pro est parfait pour les professionnels de la création et les utilisateurs exigeants qui ont besoin d\'un ordinateur portable puissant et fiable.', 2500, 1, ''),
(4, 'Dell XPS 13', 'Doté d\'un écran InfinityEdge de 13 pouces, d\'un processeur Intel Core i7 de 11ème génération, de 16 Go de RAM et d\'un SSD de 512 Go, le Dell XPS 13 est un ordinateur portable compact mais puissant, idéal pour le travail et les loisirs.', 1600, 1, ''),
(8, 'Nvidia GeForce RTX 3080', 'Cette carte graphique offre des performances de jeu impressionnantes avec 10 Go de mémoire GDDR6X, et est idéale pour le rendu 3D et la réalité virtuelle.', 800, 1, ''),
(9, 'Samsung Galaxy Tab S8', 'Cette tablette Android haut de gamme comprend un écran de 11 pouces, un processeur puissant, 6 Go de RAM et 128 Go de stockage, ce qui la rend idéale pour le travail et le divertissement.', 700, 1, ''),
(10, 'Apple iPhone 14 Pro Max', 'Le dernier smartphone d\'Apple, avec un écran Super Retina XDR de 6,7 pouces, un nouveau système de caméra pro, une puce A16, et 128 Go de stockage.', 1200, 1, ''),
(11, 'Samsung Galaxy S25', 'Le dernier smartphone phare de Samsung avec un écran Dynamic AMOLED 2X de 6,8 pouces, une caméra de 108MP, 8K video, et 128 Go de stockage.', 1000, 1, ''),
(12, 'HP LaserJet Pro MFP M428fdw', 'Une imprimante tout-en-un laser monochrome avec la possibilité d\'imprimer, de scanner, de copier et de faxer. Elle offre une connectivité sans fil et est idéale pour les petites entreprises.', 400, 1, ''),
(13, 'Western Digital My Passport SSD 2TB', 'Un disque dur externe portable, rapide et fiable avec 2 To de stockage, idéal pour les sauvegardes ou le stockage supplémentaire.', 250, 1, ''),
(14, 'Asus ROG Swift PG279Q', 'Un moniteur de jeu de 27 pouces avec une résolution de 1440p, un taux de rafraîchissement de 165Hz et la technologie G-Sync, idéal pour les gamers sérieux.', 700, 1, ''),
(15, 'Logitech MX Master 3', 'Une souris sans fil ergonomique avec défilement ultra-rapide, personnalisable via le logiciel Logitech Options, qui est parfaite pour les professionnels de la productivité.', 100, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`) VALUES
(1, 'Informatique');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'blanche', '$2y$10$nl7by2rnlGGSmwWP6H3tI.q7Jj1MB5z90UqPgmklx6hGbaUAoCUem', 'bp@gmail.com'),
(2, 'guillaume', '$2y$10$C.A7u8vzTuHXi8rj8PW.nOHb.3GWY5q3TTpMtywA91gYBNI8sXhz.', 'guillaume@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_id` (`product_category_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `address_id` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_category_id` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
