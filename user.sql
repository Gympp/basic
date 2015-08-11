-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2015 at 07:38 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_gympp`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_status` tinyint(4) NOT NULL,
  `user_first_name` varchar(255) NOT NULL,
  `user_last_name` varchar(266) NOT NULL,
  `user_sub_location_id` int(11) NOT NULL,
  `user_created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_mobile_number` varchar(255) NOT NULL,
  `user_profile_image` varchar(255) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_cover_image` varchar(255) NOT NULL,
  `user_gender` varchar(7) NOT NULL,
  `user_fb_profile_link` varchar(255) NOT NULL,
  `user_timezone` varchar(10) NOT NULL,
  `user_fitness_index` int(11) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT '1' COMMENT '1: regular; 2: Trainer'
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_password`, `user_status`, `user_first_name`, `user_last_name`, `user_sub_location_id`, `user_created_date`, `user_mobile_number`, `user_profile_image`, `user_username`, `user_cover_image`, `user_gender`, `user_fb_profile_link`, `user_timezone`, `user_fitness_index`, `user_type`) VALUES
(27, 'anurag.chhaparia@gmail.com', 'a8f83a25cb133a47f9d9ff0af8aa78ec', 1, 'Anurag', 'Chhaparia', 0, '2015-03-22 22:13:14', '', '1427082194_1244542044.jpg', 'anurag', '1427082194_94483750.jpg', 'female', 'https://www.facebook.com/app_scoped_user_id/10204135660176495/', '5.5', 8, 1),
(29, '1989.prasad@gmail.com', '7db677096eb5af8d0e490bcf2094096f', 1, 'Prasad', 'Paranjape', 0, '2015-03-23 13:27:43', '', '1426795471_1670209795.jpg', 'prasad-paranjape', '1427137062_1301568900.jpg', 'male', 'https://www.facebook.com/app_scoped_user_id/10205387146254687/', '5.5', 0, 1),
(30, 'support@gympp.com', 'fdc478f839393b008daa73ae442f994e', 1, 'Fitness Analytics', 'Lab', 0, '2015-07-20 19:29:10', '', '11133683_828620727204797_3657625310097349434_n.jpg', 'fal', '', '', '', '', 5, 1),
(31, 'support@gympp.com', 'fdc478f839393b008daa73ae442f994e', 1, 'Fitness Analytics', 'Lab', 1, '2015-07-20 19:29:33', '', '11133683_828620727204797_3657625310097349434_n.jpg', 'fal', '', '', '', '', 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`), ADD KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
