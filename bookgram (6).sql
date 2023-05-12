-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2023 at 08:21 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookgram`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_title` tinytext NOT NULL,
  `book_description` text NOT NULL,
  `image_path` text DEFAULT NULL,
  `num_of_posts` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `user_id`, `book_title`, `book_description`, `image_path`, `num_of_posts`) VALUES
(8, 15, 'time is life', 'ime is the continued sequence of existence and events that occurs in an apparently irreversible succession from the past, through the present, into the future.', 'uploads/Time.jpg', 4),
(9, 15, 'java programming', 'java is so funnt', 'uploads/javabook.jpg', 6),
(10, 16, 'geography', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum at facilis, fugiat atque, id recusandae aliquid ex quae ullam fuga pariatur. Deserunt fugit odio aliquam, unde mollitia aliquid minima eaque asperiores suscipit atque cumque expedita amet ipsa, qui quidem perferendis.', 'uploads/geography-image.jpg', 6),
(11, 15, 'gaming programming', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum at facilis, fugiat atque, id recusandae aliquid ex quae ullam fuga pariatur. Deserunt fugit odio aliquam, unde mollitia aliquid minima eaque asperiores suscipit atque cumque expedita amet ipsa, qui quidem perferendis.', 'uploads/gamebookjpg.jpg', 2),
(12, 20, 'TimeManagment', 'managment of time is very important in our life', 'uploads/blank-profile-picture-hd-images-photo.JPG', 0);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `is_liked` enum('like','unlike') NOT NULL DEFAULT 'unlike'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`user_id`, `post_id`, `is_liked`) VALUES
(15, 25, 'like'),
(16, 24, 'unlike'),
(16, 26, 'unlike'),
(16, 25, 'unlike'),
(15, 30, 'unlike'),
(18, 30, 'unlike'),
(17, 30, 'unlike'),
(17, 24, 'unlike'),
(17, 26, 'unlike'),
(17, 29, 'unlike'),
(17, 28, 'unlike'),
(19, 33, 'unlike'),
(19, 32, 'unlike'),
(19, 30, 'unlike'),
(20, 32, 'unlike'),
(20, 24, 'unlike'),
(15, 32, 'unlike'),
(15, 33, 'like');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `post_title` varchar(50) NOT NULL,
  `post_detail` varchar(2000) NOT NULL,
  `num_of_like` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `book_id`, `post_title`, `post_detail`, `num_of_like`) VALUES
(24, 15, 8, 'time is sword', 'time is sword if you not cut, it will cut you', 3),
(25, 15, 9, 'java is programming', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum at facilis, fugiat atque, id recusandae aliquid ex quae ullam fuga pariatur. Deserunt fugit odio aliquam, unde mollitia aliquid minima eaque asperiores suscipit atque cumque expedita amet ipsa, qui quidem perferendis.', 1),
(26, 15, 8, 'time lorem', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum at facilis, fugiat atque, id recusandae aliquid ex quae ', 2),
(27, 15, 9, 'java like c#', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum at facilis, fugiat atque, id recusandae aliquid ex quae ullam fuga pariatur. Deserunt fugit odio aliquam, unde mollitia aliquid minima eaque asperiores suscipit atque cumque expedita amet ipsa, qui quidem perferendis.', 0),
(28, 16, 10, 'big kurdistan ', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum at facilis, fugiat atque, id recusandae aliquid ex quae ullam fuga pariatur. Deserunt fugit odio aliquam, unde mollitia aliquid minima eaque asperiores suscipit atque cumque expedita amet ipsa, qui quidem perferendis.', 1),
(29, 16, 10, 'milan is big city', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum at facilis, fugiat atque, id recusandae aliquid ex quae ullam fuga pariatur. Deserunt fugit odio aliquam, unde mollitia aliquid minima eaque asperiores suscipit atque cumque expedita amet ipsa, qui quidem perferendis.', 1),
(30, 16, 10, 'geo post', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum at facilis, fugiat atque, id recusandae aliquid ex quae ullam fuga pariatur. Deserunt fugit odio aliquam, unde mollitia aliquid minima eaque asperiores suscipit atque cumque expedita amet ipsa, qui quidem perferendis.\r\nLorem ipsum, dolor sit amet consectetur adipisicing elit. Eum at facilis, fugiat atque, id recusandae aliquid ex quae ullam fuga pariatur. Deserunt fugit odio aliquam, unde mollitia aliquid minima eaque asperiores suscipit atque cumque expedita amet ipsa, qui quidem perferendis.\r\nLorem ipsum, dolor sit amet consectetur adipisicing elit. Eum at facilis, fugiat atque, id recusandae aliquid ex quae ullam fuga pariatur. Deserunt fugit odio aliquam, unde mollitia aliquid minima eaque asperiores suscipit atque cumque expedita amet ipsa, qui quidem perferendis.\r\nLorem ipsum, dolor sit amet consectetur adipisicing elit. Eum at facilis, fugiat atque, id recusandae aliquid ex quae ullam fuga pariatur. Deserunt fugit odio aliquam, unde mollitia aliquid minima eaque asperiores suscipit atque cumque expedita amet ipsa, qui quidem perferendis.\r\nLorem ipsum, dolor sit amet consectetur adipisicing elit. Eum at facilis, fugiat atque, id recusandae aliquid ex quae ullam fuga pariatur. Deserunt fugit odio aliquam, unde mollitia aliquid minima eaque asperiores suscipit atque cumque expedita amet ipsa, qui quidem perferendis.', 4),
(32, 15, 11, 'game developement', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum at facilis, fugiat atque, id recusandae aliquid ex quae ullam fuga pariatur. Deserunt fugit odio aliquam, unde mollitia aliquid minima eaque asperiores suscipit atque cumque expedita amet ipsa, qui quidem perferendis.', 3),
(33, 15, 9, 'java enums', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum at facilis, fugiat atque, id recusandae aliquid ex quae ullam fuga pariatur. Deserunt fugit odio aliquam, unde mollitia aliquid minima eaque asperiores suscipit atque cumque expedita amet ipsa, qui quidem perferendis.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` tinytext NOT NULL,
  `name` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `password` tinytext NOT NULL,
  `type` enum('writer','reader') NOT NULL,
  `profile_image` varchar(500) NOT NULL DEFAULT '../assets/addimage.svg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `name`, `email`, `password`, `type`, `profile_image`) VALUES
(15, 'mustafa12', 'mustafa majid', 'mstafa.00857387@gmail.com', 'mstafa123', 'writer', '../uploads/IMG_20230423_183133-min.jpg'),
(16, 'hema', 'hema dlawar', 'hema@gmail.com', 'hema12', 'writer', '../uploads/mr.binary.jpg'),
(17, 'blnd', 'blnd zyad', 'blnd@gmail.com', 'blnd123', 'reader', '../uploads/blnd.jpg'),
(18, 'muhamad1', 'muhamad', 'muhamad@gmail.com', '1234567', 'reader', '../assets/addimage.svg'),
(19, 'yaqub_2', 'yaqwb', 'yaqub.009448401@gmail.com', 'yaqub.009448401', 'reader', '../uploads/blank-profile-picture-hd-images-photo.JPG'),
(20, 'msto', 'msto', 'yaqub.0094484011@gmail.com', 'yaqub.0094484011', 'writer', '../assets/addimage.svg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD KEY `user_id` (`user_id`,`post_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`,`book_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_posts_fk` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
