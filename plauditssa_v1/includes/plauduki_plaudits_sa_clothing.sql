SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+02:00";

--
-- Database: `plaudits_sa_db`
--

-- ------------------------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(12) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `admin_username`, `admin_password`) VALUES
(2, 'Philander', 'Philander');

-- ------------------------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(12) NOT NULL,
  `product_title` varchar(200) NOT NULL,
  `product_titleSlug` varchar(200) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_type` varchar(200) NOT NULL,
  `product_category` varchar(200) NOT NULL,
  `product_description` text NOT NULL,
  `product_imageFront` varchar(200) NOT NULL,
  `product_imageBack` varchar(200) NOT NULL,
  `product_imageModel` varchar(200) NOT NULL,
  `product_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ------------------------------------------------------------------------

--
-- Table structure for table `productSKU`
--

CREATE TABLE `productSKU` (
  `productSKUID` int(12) NOT NULL,
  `SKU` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ------------------------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `productSizeID` int(12) NOT NULL,
  `product_size_oneSize` varchar(100) NOT NULL,
  `product_size_XS` varchar(100) NOT NULL,
  `product_size_S` varchar(100) NOT NULL,
  `product_size_M` varchar(100) NOT NULL,
  `product_size_L` varchar(100) NOT NULL,
  `product_size_XL` varchar(100) NOT NULL,
  `product_size_2XL` varchar(100) NOT NULL,
  `product_size_3XL` varchar(100) NOT NULL,
  `product_quantity_oneSize` varchar(200) NOT NULL,
  `product_quantity_XS` varchar(200) NOT NULL,
  `product_quantity_S` varchar(200) NOT NULL,
  `product_quantity_M` varchar(200) NOT NULL,
  `product_quantity_L` varchar(200) NOT NULL,
  `product_quantity_XL` varchar(200) NOT NULL,
  `product_quantity_2XL` varchar(200) NOT NULL,
  `product_quantity_3XL` varchar(200) NOT NULL,
  `productSKUID` int(12) NOT NULL,
  `productID` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ------------------------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(12) NOT NULL,
  `user_firstName` varchar(200) NOT NULL,
  `user_lastName` varchar(200) NOT NULL,
  `user_phone` varchar(50) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_streetAddress` varchar(200) NOT NULL,
  `user_suburb` varchar(200) NOT NULL,
  `user_towncity` varchar(200) NOT NULL,
  `user_zipcode` varchar(200) NOT NULL,
  `user_province` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ------------------------------------------------------------------------

--
-- Table structure for table `pre_orders`
--

CREATE TABLE `pre_orders` (
  `preOrderID` int(12) NOT NULL,
  `preOrder_streetAddress` varchar(200) NOT NULL,
  `preOrder_suburb` varchar(200) NOT NULL,
  `preOrder_towncity` varchar(200) NOT NULL,
  `preOrder_zipcode` varchar(200) NOT NULL,
  `preOrder_province` varchar(200) NOT NULL,
  `preOrder_phone` varchar(200) NOT NULL,
  `postOrder_date` date NOT NULL,
  `userID` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ------------------------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(12) NOT NULL,
  `referral_code` varchar(30) NOT NULL,
  `order_size` varchar(200) NOT NULL,
  `order_quantity` varchar(50) NOT NULL,
  `order_groupID` int(20) NOT NULL,
  `productID` int(12) NOT NULL,
  `preOrderID` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ------------------------------------------------------------------------

--
-- Table structure for table `post_orders`
--

CREATE TABLE `post_orders` (
  `postOrderID` int(12) NOT NULL,
  `postOrder_totalPrice` decimal(6,2) NOT NULL,
  `postOrder_payment` varchar(100) NOT NULL DEFAULT 'Payment Pending',
  `postOrder_deliveryStatus` varchar(200) NOT NULL DEFAULT 'On The Way',
  `order_groupID` int(20) NOT NULL,
  `preOrderID` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ------------------------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `newsletterID` int(12) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ------------------------------------------------------------------------

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `products`
--
ALTER TABLE `productSKU`
  ADD PRIMARY KEY (`productSKUID`);  

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`productSizeID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `productSKUID` (`productSKUID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);  

--
-- Indexes for table `pre_orders`
--
ALTER TABLE `pre_orders`
  ADD PRIMARY KEY (`preOrderID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `preOrderID` (`preOrderID`);

--
-- Indexes for table `post_orders`
--
ALTER TABLE `post_orders`
  ADD PRIMARY KEY (`postOrderID`),
  ADD KEY `preOrderID` (`preOrderID`);  

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`newsletterID`);

-- ------------------------------------------------------------------------

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 1;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 1;

--
-- AUTO_INCREMENT for table `productSKU`
--
ALTER TABLE `productSKU`
  MODIFY `productSKUID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 1;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `productSizeID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 1;

--
-- AUTO_INCREMENT for table `pre_orders`
--
ALTER TABLE `pre_orders`
  MODIFY `preOrderID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 1;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 1;      

--
-- AUTO_INCREMENT for table `post_orders`
--
ALTER TABLE `post_orders`
  MODIFY `postOrderID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 1;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `newsletterID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 1;

-- ------------------------------------------------------------------------

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_size`
--
ALTER TABLE `product_size`
  ADD CONSTRAINT `product_size_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_size_ibfk_2` FOREIGN KEY (`productSKUID`) REFERENCES `productSKU` (`productSKUID`) ON DELETE CASCADE;

--
-- Constraints for table `pre_orders`
--
ALTER TABLE `pre_orders`
  ADD CONSTRAINT `pre_orders_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`preOrderID`) REFERENCES `pre_orders` (`preOrderID`) ON DELETE CASCADE;

--
-- Constraints for table `post_orders`
--
ALTER TABLE `post_orders`
  ADD CONSTRAINT `post_orders_ibfk_1` FOREIGN KEY (`preOrderID`) REFERENCES `pre_orders` (`preOrderID`) ON DELETE CASCADE;