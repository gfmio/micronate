-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 12, 2014 at 05:37 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `micronate_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE IF NOT EXISTS `application` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `secret_key` text COLLATE utf32_unicode_ci NOT NULL,
  `publishable_key` text COLLATE utf32_unicode_ci NOT NULL,
  `developer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE IF NOT EXISTS `campaign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf32_unicode_ci NOT NULL,
  `description` text COLLATE utf32_unicode_ci NOT NULL,
  `location` text COLLATE utf32_unicode_ci NOT NULL,
  `goal` int(11) NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime NOT NULL,
  `creator_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`id`, `title`, `description`, `location`, `goal`, `start_datetime`, `end_datetime`, `creator_id`) VALUES
(1, '10 educational books for 10 children', 'At Pro Juventute, we run Language and Logic Skills lessons for foreign-speaking children aged 4-8 years. These lessons aim to help them in a later stage at their adulthood, to have the same opportunities as their peers.  This year we have a class of 10 children and the book Schau genau – schau, wie schlau! costs 15 dollars. The children and their parents are notified for this campaign and are looking forward to seeing your  generous contributions!', 'Basel', 15000, '2014-09-01 12:00:00', '2014-10-20 12:00:00', 6),
(2, 'Support for Alicia', 'Alicia lost both her parents after a car accident last month. Her aunt took full responsibility but asks for financial support for Helen''s visits at the psychologist twice a week. One-hour visit costs 50 dollars which raises to 400dollars per month. This campaign is recurring for 6 months.', 'Zurich', 40000, '2014-10-01 12:00:00', '2014-11-01 18:00:00', 7),
(3, 'Family asks for shopping vouchers', 'A 5-member family is under financial pressure after the husband lost his job and the wife''s salary reduced by 30% due to the financial crisis in Cyprus. They are asking for financial support to feed their 3 children. They need approximately 50 dollars per week for buying the basic food, which corresponds to 200 dollars per month. This campaign is recurring for the next 2 months.', 'Nicosia', 20000, '2014-10-01 12:00:00', '2014-11-01 18:00:00', 8);

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE IF NOT EXISTS `donation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`id`, `user_id`, `campaign_id`, `amount`, `date_time`) VALUES
(1, 4, 1, 10, '2014-10-08 18:00:00'),
(2, 5, 3, 20, '2014-10-10 12:00:00'),
(3, 4, 2, 25, '2014-10-11 17:20:00'),
(4, 5, 2, 25, '2014-10-09 22:01:00'),
(5, 6, 3, 30, '2014-10-10 12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf32_unicode_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `content`, `author_id`, `campaign_id`, `date_time`) VALUES
(1, 'Thank you for your support! The children promised to sing over youtube for the donors!', 6, 1, '2014-10-08 20:00:00'),
(2, 'Poor kid, how brave for the aunt to take the responsibility. Our thoughts are with you.', 4, 2, '2014-10-11 17:21:00'),
(3, 'I hope Alicia will recover soon!', 5, 2, '2014-10-09 22:01:00'),
(4, 'The aunt says thank you for your kind words and donations.', 8, 2, '2014-10-11 22:01:00'),
(5, 'The crisis over there is so bad. Be patient and stay positive.', 5, 3, '2014-10-10 12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `micro_transaction`
--

CREATE TABLE IF NOT EXISTS `micro_transaction` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `application_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text COLLATE utf32_unicode_ci NOT NULL,
  `username` text COLLATE utf32_unicode_ci NOT NULL,
  `password` text COLLATE utf32_unicode_ci NOT NULL,
  `first_name` text COLLATE utf32_unicode_ci NOT NULL,
  `last_name` text COLLATE utf32_unicode_ci NOT NULL,
  `location` text COLLATE utf32_unicode_ci NOT NULL,
  `balance` int(11) NOT NULL,
  `stripe_card_token` text COLLATE utf32_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`, `first_name`, `last_name`, `location`, `balance`, `stripe_card_token`) VALUES
(3, 'email@example.com', 'usernam', 'f22bc61b34c17910e58d2ba85545008f42a48847', 'name', 'surname', 'zurich', 0, NULL),
(4, 'muriel@gmail.com', 'muriel', 'muriel', 'Muriel', 'Bider', 'Basel', 20, NULL),
(5, 'maria@gmail.com', 'marsty5', 'marsty5', 'Maria', 'Stylianou', 'Nicosia', 10, NULL),
(6, 'anna@gmail.com', 'anna', 'anna', 'Anna', 'Miller', 'Basel', 33, NULL),
(7, 'peter@gmail.com', 'peter', 'peter', 'Peter', 'Hajek', 'Zurich', 17, NULL),
(8, 'george@gmail.com', 'george', 'george', 'George', 'Andreu', 'Nicosia', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_app_link`
--

CREATE TABLE IF NOT EXISTS `user_app_link` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `monthly_limit` int(11) NOT NULL,
  `user_token` text COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `user_id` (`user_id`,`application_id`),
  UNIQUE KEY `user_id_2` (`user_id`,`application_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
