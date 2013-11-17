-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 16, 2013 at 10:33 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `souper_bowl`
--

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` varchar(2) NOT NULL,
  `title` varchar(255) NOT NULL,
  `country_id` varchar(2) NOT NULL,
  `lat_min` float(10,7) NOT NULL,
  `lat_max` float(10,7) NOT NULL,
  `lon_min` float(10,7) NOT NULL,
  `lon_max` float(10,7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `title`, `country_id`, `lat_min`, `lat_max`, `lon_min`, `lon_max`) VALUES
('AK', 'Alaska', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('AL', 'Alabama', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('AR', 'Arkansas', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('AZ', 'Arizona', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('CA', 'California', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('CO', 'Colorado', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('CT', 'Connecticut', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('DC', 'Washington, DC', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('DE', 'Delaware', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('FL', 'Florida', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('GA', 'Georgia', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('HI', 'Hawaii', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('IA', 'Iowa', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('ID', 'Idaho', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('IL', 'Illinois', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('IN', 'Indiana', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('KS', 'Kansas', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('KY', 'Kentucky', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('LA', 'Louisiana', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('MA', 'Massachusetts', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('MD', 'Maryland', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('ME', 'Maine', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('MI', 'Michigan', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('MN', 'Minnesota', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('MO', 'Missouri', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('MS', 'Mississippi', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('MT', 'Montana', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('NC', 'North Carolina', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('ND', 'North Dakota', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('NE', 'Nebraska', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('NH', 'New Hampshire', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('NJ', 'New Jersey', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('NM', 'New Mexico', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('NV', 'Nevada', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('NY', 'New York', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('OH', 'Ohio', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('OK', 'Oklahoma', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('OR', 'Oregon', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('PA', 'Pennsylvania', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('RI', 'Rhode Island', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('SC', 'South Carolina', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('SD', 'South Dakota', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('TN', 'Tennessee', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('TX', 'Texas', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('UT', 'Utah', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('VA', 'Virginia', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('VT', 'Vermont', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('WA', 'Washington', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('WI', 'Wisconsin', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('WV', 'West Virginia', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('WY', 'Wyoming', 'US', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('AB', 'Alberta', 'CA', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('BC', 'British Columbia', 'CA', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('MB', 'Manitoba', 'CA', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('NB', 'New Brunswick', 'CA', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('NF', 'Newfoundland', 'CA', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('NS', 'Nova Scotia', 'CA', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('NT', 'Northwest Territories', 'CA', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('NU', 'Nunavut', 'CA', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('ON', 'Ontario', 'CA', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('PE', 'Prince Edward Island', 'CA', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('PQ', 'Quebec', 'CA', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('SK', 'Saskatchewan', 'CA', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('YT', 'Yukon', 'CA', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('AA', 'Armed Forces Americas', 'M', 0.0000000, 0.0000000, 0.0000000, 0.0000000),
('AE', 'Armed Forces Europe', 'M', 0.0000000, 0.0000000, 0.0000000, 0.0000000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
