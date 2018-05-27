-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 11, 2018 at 07:47 AM
-- Server version: 10.1.31-MariaDB-cll-lve
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `irenfiuz_db_seven_seas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(40) NOT NULL,
  `user_type` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `password`, `user_type`, `firstname`, `lastname`) VALUES
(1, 'administrator', '7b902e6ff1db9f560443f2048974fd7d386975b0', 1, 'Administrator Firstname', 'Admin Lastname'),
(6, 'Djon', '023fdb0d16580d832376e8964b753da1bb717648', 2, 'Djon', 'Amoc'),
(7, 'Mylene', '8a6c28858cecf2564d80d61c57a37af2eb7062ab', 2, 'Mylene', 'Llagas'),
(8, 'Whelbert', 'bbb03cd221eeb625c7de74672ee977ca5f581df5', 3, 'Whelbert', 'Barredo'),
(9, 'Asleah', 'b1f32df8edd5c78c90b0c5787399b91451ae537e', 3, 'Asleah', 'Mendoza'),
(10, 'Yuri', '050a5757c63dfb6165c37d8010fc2aedbe14a3b3', 2, 'Yuri', 'Yamada'),
(11, 'Yusuke', '64edea5baf81baf84b671d47d095b0c2d3aacad2', 2, 'Yusuke', 'Uejima'),
(12, 'Ayako', '676593df2a3f7129b02db8eb2353a1614e375b35', 2, 'Ayako', 'Nishimura'),
(13, 'Dyan', '79946a189655ed5bd8ec4e804f4c43f264ee2003', 3, 'Dyan', 'Dalipe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
