-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Версия на сървъра: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_project`
--

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(10) unsigned NOT NULL,
  `APIKey` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `DATA` text COLLATE utf8_unicode_ci NOT NULL,
  `User` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `Pass` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Title` text CHARACTER SET utf8 NOT NULL,
  `Rate` int(2) NOT NULL,
  `Link` text COLLATE utf8_unicode_ci NOT NULL,
  `Is_Shown` int(11) NOT NULL,
  `E-mail` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=248 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`ID`, `APIKey`, `DATA`, `User`, `Pass`, `Title`, `Rate`, `Link`, `Is_Shown`, `E-mail`) VALUES
(211, '92624680228737562105810977857516', 'This is where you put all your data about the testimonial', '', '', 'This is where you put your Title', 0, 'Write The URL to the image', 0, ''),
(213, '92624680228737562105810977857516', 'This is where you put all your data about the testimonial', '', '', 'This is where you put your Title', 0, 'Write The URL to the image', 0, ''),
(215, '47331173095928340747654030732998', 'This is where you put all your data about the testimonial', '', '', 'This is where you put your Title', 0, 'Write The URL to the image', 0, ''),
(216, '47331173095928340747654030732998', 'This is where you put all your data about the testimonial', '', '', 'This is where you put your Title', 0, 'Write The URL to the image', 0, ''),
(217, '47331173095928340747654030732998', 'This is where you put all your data about the testimonial', '', '', 'This is where you put your Title', 0, 'Write The URL to the image', 0, ''),
(219, '32219956881992785001156915570506', 'This is where you put all your data about the testimonial', '', '', 'This is where you put your Title', 0, 'Write The URL to the image', 0, ''),
(220, '32219956881992785001156915570506', 'This is where you put all your data about the testimonial', '', '', 'This is where you put your Title', 0, 'Write The URL to the image', 0, ''),
(221, '41737624144122602181603750995891', '', 'Hue', '1234', '', 0, '', 0, '123'),
(244, '41737624144122602181603750995891', 'This is where you put all your data about the testimonial', '', '', 'This is where you put your Title', 0, 'Write The URL to the image', 1, ''),
(246, '41737624144122602181603750995891', 'This is where you put all your data about the testimonial', '', '', 'This is where you put your Title', 0, 'Write The URL to the image', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=248;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
