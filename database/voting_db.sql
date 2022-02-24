-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2022 at 03:42 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `id` int(30) NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`id`, `category`) VALUES
(7, 'महापौर');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(10) NOT NULL,
  `notice` varchar(100) NOT NULL,
  `event` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `start_time` varchar(100) NOT NULL,
  `end_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `notice`, `event`, `date`, `start_time`, `end_time`) VALUES
(1, 'Result will be declared on 22 Jan 2022 ', 'Result Declaration', '26/1/2022', '00:00:00', '-'),
(2, 'Voting will be started on 1 Jan 2022 @10:00 AM', 'Voting Start', '26/1/2022', '0:00:00', '23:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `queue_form`
--

CREATE TABLE `queue_form` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `voting_id` varchar(100) NOT NULL,
  `voting_card` varchar(10000) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `queue_form`
--

INSERT INTO `queue_form` (`id`, `name`, `username`, `email`, `password`, `voting_id`, `voting_card`, `status`) VALUES
(1, 'voter1', 'voter1', 'voter1@gmail.com', '1234', 'a1b2c3', '1633272180_6b05d9114529fe7833ae94a2d790f2fc.jpg', 'Verified'),
(2, 'voter2', 'voter2', 'voter2@gmail.com', '1234', 'a2b2c2', '1633272240_images (1).jfif', 'Verified'),
(3, 'voter3', 'voter3', 'mtsn9699@gmail.com', '1234', 'a3b3c3', '1633328160_image.jfif', 'Verified');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `voting_id` varchar(100) NOT NULL,
  `voting_card` varchar(100) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2,
  `otp` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`, `voting_id`, `voting_card`, `type`, `otp`) VALUES
(1, 'Admin', 'admin', 'mtsn98@gmail.com', '1234', '19it787', '', 1, ''),
(52, 'voter1', 'voter1', 'voter1@gmail.com', '1234', 'a1b2c3', '1633272180_6b05d9114529fe7833ae94a2d790f2fc.jpg', 2, ''),
(53, 'voter2', 'voter2', 'voter2@gmail.com', '1234', 'a2b2c2', '1633272240_images (1).jfif', 2, ''),
(58, 'voter3', 'voter3', 'mtsn9699@gmail.com', '1234', 'a3b3c3', '1633328160_image.jfif', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(30) NOT NULL,
  `voting_id` int(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `voting_opt_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `voting_id`, `category_id`, `voting_opt_id`, `user_id`) VALUES
(2, 4, 7, 26, 52),
(3, 4, 7, 27, 53);

-- --------------------------------------------------------

--
-- Table structure for table `voting_cat_settings`
--

CREATE TABLE `voting_cat_settings` (
  `id` int(30) NOT NULL,
  `voting_id` int(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `max_selection` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voting_cat_settings`
--

INSERT INTO `voting_cat_settings` (`id`, `voting_id`, `category_id`, `max_selection`) VALUES
(1, 1, 1, 1),
(2, 1, 3, 1),
(3, 1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `voting_list`
--

CREATE TABLE `voting_list` (
  `id` int(30) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voting_list`
--

INSERT INTO `voting_list` (`id`, `title`, `description`, `is_default`) VALUES
(4, 'नवी मुंबई महानगरपालिका निवडणूक', '', 1),
(8, 'dwadawd', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `voting_opt`
--

CREATE TABLE `voting_opt` (
  `id` int(30) NOT NULL,
  `voting_id` int(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `image_path` text NOT NULL,
  `opt_txt` text NOT NULL,
  `gender` varchar(100) NOT NULL,
  `political_party` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voting_opt`
--

INSERT INTO `voting_opt` (`id`, `voting_id`, `category_id`, `image_path`, `opt_txt`, `gender`, `political_party`) VALUES
(1, 1, 1, '1600398180_no-image-available.png', 'James Smith', '', ''),
(3, 1, 1, '1600415460_avatar2.png', 'James Wilson', '', ''),
(5, 1, 3, '1600415520_avatar.jpg', 'George Walker', '', ''),
(6, 1, 4, '1600400340_no-image-available.png', 'Cadidate 1', '', ''),
(7, 1, 4, '1600400340_no-image-available.png', 'Cadidate 2', '', ''),
(8, 1, 4, '1600400340_no-image-available.png', 'Cadidate 3', '', ''),
(9, 1, 4, '1600400520_no-image-available.png', 'Cadidate  4', '', ''),
(10, 1, 4, '1600400640_no-image-available.png', 'Cadidate 5', '', ''),
(11, 1, 4, '1600400400_no-image-available.png', 'Cadidate 6', '', ''),
(12, 1, 3, '1600415520_no-image-available.png', 'Claire Blake', '', ''),
(13, 4, 1, '1614206040_IMG20210207174817[1].jpg', 'Adrian Mercurio', '', ''),
(14, 4, 1, '1614206100_jude.jpg', 'Angel Jude Suarez', '', ''),
(15, 4, 3, '1614206220_IMG20210223174532[1].jpg', 'Adones Evangelista', '', ''),
(16, 4, 3, '1614206340_IMG20210210175225[1].jpg', 'Saxon Ong', '', ''),
(17, 4, 3, '1614206400_IMG20210219143530[1].jpg', 'Prince Ly Cesar', '', ''),
(18, 4, 5, '1633888380_6b05d9114529fe7833ae94a2d790f2fc.jpg', 'sad cat', '', ''),
(19, 4, 5, '1633888380_images (1).jfif', 'vibing cat', '', ''),
(23, 4, 8, '1635270480_woman.jpg', 'Woman', '', ''),
(24, 4, 8, '1635270480_man.jpg', 'Man', '', ''),
(26, 4, 7, '1637519160_woman.jpg', 'Manisha', 'Female', 'Shivsena'),
(27, 4, 7, '1640025600_man.jpg', 'Tejas', 'Male', 'Manse'),
(29, 4, 7, '1642938720_990-9905112_stylish-man-cartoon-vector-character-man-cartoon.png', 'Mayur', 'Male', 'BJP'),
(35, 4, 7, '', 'tgf', 'sfe', 'ffe'),
(36, 4, 7, '1643091300_C_UsersAbhijeetDesktopcertificatesServicesCreative23.png', 'awd', 'adw', 'daw');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queue_form`
--
ALTER TABLE `queue_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voting_cat_settings`
--
ALTER TABLE `voting_cat_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voting_list`
--
ALTER TABLE `voting_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voting_opt`
--
ALTER TABLE `voting_opt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `queue_form`
--
ALTER TABLE `queue_form`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `voting_cat_settings`
--
ALTER TABLE `voting_cat_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `voting_list`
--
ALTER TABLE `voting_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `voting_opt`
--
ALTER TABLE `voting_opt`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
