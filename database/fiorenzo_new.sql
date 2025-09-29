-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2025 at 09:46 AM
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
-- Database: `fiorenzo_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `orderitem_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `old_price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(50) NOT NULL DEFAULT 'general'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `price`, `old_price`, `image`, `description`, `category`) VALUES
(12, 'Skort with CD Buckle', 9000.00, 12000.00, 'assets/DIORWOMEN4.png', 'The skort is both modern and timeless. Crafted in black smooth lambskin, the design features a corolla cut embellished with a gold-finish CD buckle at the hip. The skort will lend the finishing touch to a solid or patterned blouse.\r\nThin waistband with gold-finish CD buckle\r\nSide zip and button closure with double hook\r\nBlack lining\r\n\r\n100% lambskin\r\nMade in Italy', 'women'),
(13, 'Short Belted Shirtdress', 7000.00, 18000.00, 'assets/DIORWOMEN3.png', 'The short shirtdress features a multicolor Dior Flowers Calendar Allover motif, paying homage to Mr. Dior\'s passion for flora and fauna through a bucolic floral design. Made in cotton denim, it is distinguished by a short, regular-fit silhouette with two buttoned flap pockets on the chest, as well as a tonal belt and front button closure. The cap-sleeved dress will complete modern elegant looks and can be styled with other Dior Flowers Calendar Allover pieces.\r\n\r\nEmbroidered hallmark bee and CD signature\r\nBelt loops\r\nTonal belt with metal buckle\r\nFront button closure\r\nChristian Dior Paris signature metal buttons\r\nUnlined\r\n100% cotton\r\nMade in Italy', 'women'),
(14, 'Dioriviera Tied Cropped Blouse', 10000.00, 15000.00, 'assets/DIORWOMEN2.png', 'Part of the Dioriviera capsule, the blouse showcases Pietro Ruffo\'s Toile de Jouy Palms motif, capturing the beauty of nature with a vibrant jungle scene populated by diverse wildlife. Crafted in white and hazelnut cotton and silk poplin, it features a cropped, regular-fit silhouette, while the button fastening is elevated by a tied effect at the waist. The blouse can be paired with the matching skirt to complete a Dioriviera look.\r\n\r\nFront button closure\r\nChristian Dior Paris horn buttons\r\nTied design in the front\r\nUnlined\r\n71% cotton, 29% silk\r\nMade in Italy', 'women'),
(15, 'Fitted Jacket with Sailor Collar', 13000.00, 16000.00, 'assets/DIORWOMEN1.png', 'The jacket embodies House codes of elegance. Crafted in a black double-sided virgin wool and angora blend, it is distinguished by a fitted silhouette and flap pockets highlighting the waist, while a sailor collar is adorned with the Christian Dior Paris signature. Completed by buttoned tabs on the cuffs, the jacket will create a couture look.\r\n\r\nChristian Dior Paris signature sailor collar\r\nFront button closure\r\nChristian Dior Paris horn buttons\r\nAdjustable buttoned tabs on the cuffs\r\nUnlined\r\n82% virgin wool, 15% rabbit felt, 2% polyamide, 1% elastane\r\nMade in Italy', 'women'),
(16, 'GG Supreme Print Silk Shorts', 10000.00, 15000.00, 'assets/GUCCIWOMEN1.png', 'Essential pieces in the Cruise 2024 collection are embellished with signature Gucci motifs for the wardrobe. This pair of shorts is presented in GG Supreme printed silk with a tonal piped trim, speaking volumes about stylish comfort.', 'women'),
(17, 'Fine Nylon Dress With Logo', 13000.00, 18000.00, 'assets/GUCCIWOMEN2.png', 'Essential everyday pieces blend sophistication and functional materials with a refined touch for the Pre-Fall 2025 collection. This dress in gabardine fine nylon features a subtle Gucci metal detail.', 'women'),
(18, 'Oversized Crinkled Patent-Leather Coat', 20000.00, 25000.00, 'assets/GUCCIWOMEN3.png', 'Gucci\'s coat is made from crinkled patent-leather that has such a beautiful sheen. It\'s cut for a boxy, oversized fit with an exaggerated collar and front pockets. Emulate the runway by pairing it with the matching skirt.', 'women'),
(19, 'Women\'s Natural Gg Canvas Shorts', 12000.00, 15000.00, 'assets/GUCCIWOMEN4.png', 'Material: 70% cotton, 30% polyester. Care instructions: dry clean. Made in Italy. Designer color name: Camel/Ebony/Mix. Item color: beige. Contains non-textile parts of animal origin. Pocket lining: 100% cotton. Cotton.', 'women'),
(20, 'Jacket with Shawl Collar and Removable Bow', 14000.00, 18000.00, 'assets/MEN8.png', 'Debuted at the Winter 2025-2026 Men\'s Fashion Show, the jacket stands out with sophisticated details. Crafted in navy blue silk faille, it features an integrated shawl collar with a removable bow on the back, as well as piped pockets. The half-lined jacket will lend a refined touch to any outfit.\r\nIntegrated shawl collar with removable bow on the back\r\nOne fabric-covered button\r\nPiped pockets\r\nHalf lined\r\n100% silk, lining: 100% cupro\r\nMade in Italy', 'men'),
(21, 'Dior Oblique Swim Shorts', 15000.00, 18000.00, 'assets/MEN3.png', 'The swim shorts highlight the hallmark Dior Oblique motif. Crafted in sky blue technical fabric, they are enhanced by a side flap pocket. The swim shorts can be paired with a T-shirt or polo shirt to complete a summery look.', 'men'),
(22, 'Christian Dior Couture T-Shirt, Relaxed Fit', 13000.00, 15000.00, 'assets/MEN4.png', 'New for Fall 2025, the Christian Dior Couture T-shirt adds modern flair to a wardrobe essential. Crafted in blue distressed-effect cotton jersey, it is enhanced by the Christian Dior Couture signature printed on the chest. The T-shirt can be worn with jeans or Bermuda shorts for a casual look.', 'men'),
(23, 'Stand-Collar Jacket', 18000.00, 21000.00, 'assets/MEN6.png', 'Debuted at the Winter 2025-2026 Men\'s Fashion Show, the stand-collar jacket is an homage to the A Line designed by Christian Dior. Made in pink water-repellent silk faille, it features a button closure, and can be paired with the matching tied sleeve garters* for a distinctly dynamic look.\r\n', 'men'),
(24, 'Stand-Collar Jacket', 18000.00, 20000.00, 'assets/MEN2.png', 'Debuted at the Winter 2025-2026 Men\'s Fashion Show, the stand-collar jacket is an homage to the A Line designed by Christian Dior. Made in pink water-repellent silk faille, it features a button closure, and can be paired with the matching tied sleeve garters* for a distinctly dynamic look.\r\n', 'men'),
(25, 'Jacket with GUCCI Oblique Interior', 15000.00, 21000.00, 'assets/MEN5.png', 'Debuted at the Winter 2025-2026 Men\'s Fashion Show, the jacket offers a timeless silhouette. Crafted in blue virgin wool flannel, it stands out with a contrasting GUCCI Oblique interior and classic cut with notch lapels and patch pockets. Featuring a timeless aesthetic, the jacket can be effortlessly paired with the matching pants to complete the look.\r\n', 'men'),
(26, 'Jacket with Shawl Collar and Removable Bow', 20000.00, 23000.00, 'assets/MEN8.png', 'Debuted at the Winter 2025-2026 Men\'s Fashion Show, the jacket stands out with sophisticated details. Crafted in navy blue silk faille, it features an integrated shawl collar with a removable bow on the back, as well as piped pockets. The half-lined jacket will lend a refined touch to any outfit.', 'men'),
(27, 'DIOR AND LEWIS HAMILTON Bermuda Shorts', 20000.00, 25000.00, 'assets/MEN7.png', 'The Bermuda shorts are part of the exclusive DIOR AND LEWIS HAMILTON capsule. Crafted in beige cotton- and wool-blend tweed with a leopard motif, they offer a classic cut adorned with side slit pockets. The Bermuda shorts can be paired with the matching shirt for a signature look.\r\n', 'men');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('customer','admin') DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Demian de silva', 'demiandesilva47@gmail.com', '$2y$10$Yn1Nc2y/NQWl3AwybWjvd.x4XCVjUd.wohogSpigu3uX6NKEy0Uqi', 'admin'),
(7, 'Adithiya davin', 'Adithiya47@gmail.com', '$2y$10$5f/sUH5n44DTUEJ/G3KVn.3aVHVGW8zjBClkoSGzc8f0P5Uu1DqCO', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`orderitem_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `orderitem_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD CONSTRAINT `orderitems_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderitems_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
