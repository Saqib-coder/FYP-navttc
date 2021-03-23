-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2021 at 01:14 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `allrecipes`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(9, 'Breakfast And Brunch'),
(10, 'Lunch'),
(11, 'Dinner'),
(12, 'Appetizer And Snack'),
(13, 'Bread'),
(14, 'Dessert'),
(15, 'Drink'),
(16, 'Salad');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comments` varchar(256) NOT NULL,
  `rec_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comments`, `rec_id`, `user_id`) VALUES
(3, 'hello', 1, 5),
(4, 'hi', 1, 5),
(5, 'my foot', 1, 5),
(6, 'hi', 1, 5),
(7, 'hi', 1, 5),
(8, '', 1, 5),
(9, 'jani', 1, 5),
(10, 'han bolo', 1, 5),
(11, 'hi', 1, 5),
(12, 'han bhai', 1, 6),
(13, 'han bro', 1, 6),
(14, 'Hi', 1, 5),
(15, 'hey\n\n', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `directions`
--

CREATE TABLE `directions` (
  `dir_id` int(11) NOT NULL,
  `steps` varchar(256) NOT NULL,
  `rec_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `directions`
--

INSERT INTO `directions` (`dir_id`, `steps`, `rec_id`) VALUES
(2, 'Beat together eggs and milk. Heat a lightly oiled skillet (or non-stick pan) over medium high heat and cook egg mixture, stirring occasionally, until firm. When almost done, stir in ham, green onions, salt and pepper.', 1),
(3, 'Spoon 1/4 of the egg mixture on top of each tortilla. Sprinkle the eggs with cheese, fold over the tortilla to make a roll and top with salsa if desired.', 1),
(4, 'Place bacon in a large skillet and cook over medium-high heat, turning occasionally, until evenly browned, about 10 minutes. Drain on paper towels and crumble into bits. Keep skillet warm.', 3),
(5, 'Whisk eggs, milk, and salt together in a bowl. Pour into the hot skillet. Cook and stir over medium-high heat until eggs are set, about 5 minutes. Transfer to a bowl.', 3),
(6, 'Heat oil in same skillet over medium-high heat. Add frozen potatoes, garlic salt, and pepper. Fry until browned on the bottom, 4 to 5 minutes. Flip and cook until other side is browned, 4 to 5 minutes more. Let cool.', 3),
(7, 'Cut 10 squares of aluminum foil slightly larger than the tortillas. Lay 1 tortilla on each square; evenly distribute Cheddar cheese on top. Add eggs, bacon, salsa, and potatoes to each tortilla, in that order. Tightly roll the burritos, tucking tops and bo', 3),
(8, 'Wrap aluminum foil tightly around each burrito, covering it completely. Place in resealable plastic bags in a single layer. Remove as much air as possible from the bags before sealing. Store in the freezer until ready to reheat.', 3),
(9, 'Reheat by removing the aluminum foil, placing the burrito on a microwave-safe plate, and topping it with a paper towel. Heat in the microwave until evenly warmed through, 1 to 2 minutes.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `ing_id` int(11) NOT NULL,
  `size` float NOT NULL,
  `ingredient` varchar(256) NOT NULL,
  `rec_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`ing_id`, `size`, `ingredient`, `rec_id`) VALUES
(1, 0, '12 eggs', 1),
(2, 0, '⅓ cup milk', 1),
(3, 0, '3 slices cooked ham, diced', 1),
(4, 0, '2 green onions, minced', 1),
(5, 0, 'salt and pepper to taste', 1),
(6, 0, '4 ounces Cheddar cheese, shredded', 1),
(7, 0, '4 (10 inch) flour tortillas', 1),
(8, 0, '½ cup salsa', 1),
(9, 0, '1 (12 ounce) package bacon', 3),
(10, 0, '10 large eggs', 3),
(11, 0, '3 tablespoons milk', 3),
(12, 0, '¼ teaspoon salt', 3),
(13, 0, '3 tablespoons vegetable oil', 3),
(14, 0, '½ teaspoon garlic salt', 3),
(15, 0, '¼ teaspoon ground black pepper', 3),
(16, 0, '10 large flour tortillas', 3),
(17, 0, '1 ½ cups shredded Cheddar cheese', 3),
(18, 0, '1 cup salsa, or to taste', 3);

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `posted_date` date NOT NULL,
  `image` varchar(256) NOT NULL,
  `prep` float NOT NULL,
  `total_time` float NOT NULL,
  `servings` float NOT NULL,
  `user_id` int(11) NOT NULL,
  `yields` float NOT NULL,
  `sub_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id`, `title`, `description`, `posted_date`, `image`, `prep`, `total_time`, `servings`, `user_id`, `yields`, `sub_id`, `status`) VALUES
(1, 'Ham and Cheese Breakfast Tortillas', 'This is great for a special brunch or even a quick and easy dinner. Other breakfast meats can be used, but the deli ham is the easiest since it is already fully cooked.', '2021-03-22', '6058858ea9754_image.jpg', 30, 30, 4, 5, 4, 1, 1),
(3, 'Freeze-and-Reheat Breakfast Burritos', 'This recipe for hearty breakfast burritos is intended to be made in a large batch so that individual burritos can be frozen and reheated as needed. Making these in advance and freezing is a big time-saver for busy mornings!', '2021-03-23', '6059d78f2c211_image (1).jpg', 30, 40, 10, 7, 10, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(256) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`sub_id`, `sub_name`, `cat_id`) VALUES
(1, 'Breakfast Burrito Recipes', 9),
(2, 'Crepe Recipes', 9),
(3, 'French Toast Recipes', 9),
(4, 'Breakfast Casserole Recipes', 9),
(5, 'Egg Recipes', 9),
(6, 'Omelet Recipes', 9),
(7, 'Healthy Lunch Recipes', 10),
(8, 'Sandwich Recipes', 10),
(9, 'Sandwich Wraps and Roll-Up Recipes', 10),
(10, 'School Lunch Ideas and Recipes', 10),
(11, 'Dinner Fix', 11),
(12, 'Chicken Breast Recipes', 11),
(13, 'Beef Recipes', 11),
(14, 'Pasta and Noodle Recipes', 11),
(15, 'Pork Tenderloin Recipes', 11),
(16, 'Salmon Recipes', 11),
(17, 'Ground Beef Recipes', 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(256) NOT NULL,
  `Phone_number` varchar(256) NOT NULL,
  `Address` varchar(256) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `DOB`, `Gender`, `Phone_number`, `Address`, `added_on`) VALUES
(5, 'Shakir', 'khan', 'shakir@gmail.com', '$2y$10$KhmN4YLgiJmoEXXE4902NO5Fji4BfWhSLEK6xHCUhwZGK3xZeRZhe', '2021-03-22', 'male', '00923462313240', 'abc karachi', '2021-03-22 07:37:08'),
(6, 'raza', 'phuppo', 'raza@gmail.com', '$2y$10$c17DucpwXgLSybp4bL72WOb8Kvq/9Tytln62b4ZvFFVEUxwhLwc5q', '2021-03-01', 'male', '00923462313240', 'abc karachi', '2021-03-22 21:32:19'),
(7, 'Humais', 'khan', 'humais@gmail.com', '$2y$10$9BvjgrNlQxYoz5WmarF6kuRb8ph8kPiSY41J3/3Pkv0pobte3QgKG', '2021-03-01', 'male', '00923462313240', 'abc karachi', '2021-03-23 11:44:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rec_id` (`rec_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `directions`
--
ALTER TABLE `directions`
  ADD PRIMARY KEY (`dir_id`),
  ADD KEY `rec_id` (`rec_id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ing_id`),
  ADD KEY `rec_id` (`rec_id`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_id` (`sub_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `directions`
--
ALTER TABLE `directions`
  MODIFY `dir_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `ing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`rec_id`) REFERENCES `recipe` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `directions`
--
ALTER TABLE `directions`
  ADD CONSTRAINT `directions_ibfk_1` FOREIGN KEY (`rec_id`) REFERENCES `recipe` (`id`);

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_ibfk_1` FOREIGN KEY (`rec_id`) REFERENCES `recipe` (`id`);

--
-- Constraints for table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `recipe_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `subcategories` (`sub_id`),
  ADD CONSTRAINT `recipe_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
