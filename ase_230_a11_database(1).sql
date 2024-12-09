-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2024 at 04:51 AM
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
-- Database: `ase 230_a11_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `is_admin`) VALUES
(1, 1),
(2, 0),
(3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `blog post`
--

CREATE TABLE `blog post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `blog post`
--

INSERT INTO `blog post` (`post_id`, `title`, `content`, `category`, `author_id`) VALUES
(1, 'New telescope', 'I just saw some images from the new telescope that was put into orbit, and they look amazing!', 'New tech', 1),
(2, 'Solar flare', 'I just read that there is supposed to be a big solar flare later today.', 'Space event', 2),
(3, 'Eclipse today', 'Anyone else taking time to go see the eclipse later today?', 'Space event', 3);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `post_id`, `user_id`, `content`) VALUES
(1, 1, 2, 'Yeah, I saw some of those images too. They look great!'),
(2, 2, 3, 'I heard about that too, should be cool to see.'),
(3, 3, 1, 'Definitely, can\'t wait to see it. Hopefully I can see the total eclipse!');

-- --------------------------------------------------------

--
-- Table structure for table `contact_request`
--

CREATE TABLE `contact_request` (
  `request_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `contact_request`
--

INSERT INTO `contact_request` (`request_id`, `subject`, `message`) VALUES
(1, 'Support', 'What\'s the best way to support this website?'),
(2, 'Information', 'How often do you update content on the website.'),
(3, 'Other sources?', 'What are some other reliable sources of information about space?');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `question`, `answer`) VALUES
(1, 'What is Astronomy Co.?', 'Astronomy Co. is a platform that provides information and resources about the universe, offering insights on various astronomical phenomena. '),
(2, 'Is Astonomy Co. free to use?', 'Yes, Astronomy Co. is completely free to use. We aim to share knowledge about the universe without any cost to our users.'),
(3, 'How do I create an account?', 'To create an account, simply click on the \'Login / Sign up\' link in the navigation bar and fill out the registration form.'),
(4, 'I forgot my password. What should I do?', 'If you\'ve forgotten your password, click on the \'Forgot Password?\' link on the login page to reset it.');

-- --------------------------------------------------------

--
-- Table structure for table `feature`
--

CREATE TABLE `feature` (
  `feature_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `feature`
--

INSERT INTO `feature` (`feature_id`, `title`, `description`, `icon`) VALUES
(1, 'Astronomical Insights', 'Stay updated with the latest discoveries and insights in the field of astronomy.', 'bi-stars'),
(2, 'Stargazing Guides', 'Explore detailed guides for stargazing, helping you navigate the night sky with ease.', 'bi-binoculars'),
(3, 'Planetary Knowledge', 'Learn more about the planets, stars, and other celestial objects in our solar system and beyond.', 'bi-globe2'),
(4, 'Space Exploration', 'Follow the latest news in space exploration and stay informed on new space missions.', 'bi-stars');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `subscription_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`subscription_id`, `user_id`, `email`) VALUES
(1, 1, 'jdoe1@example.com'),
(2, 2, 'asmith2@example.com'),
(3, 3, 'djones3@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `is_admin`) VALUES
(1, 'jdoe', 'jdoe1@example.com', 'abc123', 1),
(2, 'asmith', 'asmith2@example.com', 'abc123', 0),
(3, 'djones', 'djones3@example.com', 'abc123', 0),
(4, 'wstone', 'wstone4@example.com', 'password', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD KEY `FOREIGN` (`user_id`);

--
-- Indexes for table `blog post`
--
ALTER TABLE `blog post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `FOREIGN` (`author_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `FOREIGN` (`post_id`),
  ADD KEY `FOREIGN2` (`user_id`);

--
-- Indexes for table `contact_request`
--
ALTER TABLE `contact_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `feature`
--
ALTER TABLE `feature`
  ADD PRIMARY KEY (`feature_id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`subscription_id`),
  ADD KEY `FOREIGN` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `is_admin` (`is_admin`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `blog post` (`post_id`);

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `subscription_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
