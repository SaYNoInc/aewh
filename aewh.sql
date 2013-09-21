-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2013 at 10:56 PM
-- Server version: 5.6.13
-- PHP Version: 5.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aewh`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `commentID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `commentPost` text NOT NULL,
  `postID` int(11) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`commentID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentID`, `userID`, `commentPost`, `postID`, `timeStamp`) VALUES
(20, 8, 'No WAy!', 1, '2013-08-25 03:59:17'),
(16, 6, 'Hi karen,\r\nI''m keen to join for the ride if there is still room!\r\nCheers!', 1, '2013-08-24 13:24:53'),
(32, 8, 'This is a test!', 7, '2013-09-04 09:30:17'),
(18, 3, 'this is wesborland from limp bizkit! you joker better shut up!', 1, '2013-08-24 13:57:59');

-- --------------------------------------------------------

--
-- Table structure for table `inspirations`
--

CREATE TABLE IF NOT EXISTS `inspirations` (
  `inspID` int(11) NOT NULL AUTO_INCREMENT,
  `inspText` text NOT NULL,
  `userID` int(11) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`inspID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `inspirations`
--

INSERT INTO `inspirations` (`inspID`, `inspText`, `userID`, `timeStamp`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. ', 1, '2013-09-10 06:44:54');

-- --------------------------------------------------------

--
-- Table structure for table `pagecontent`
--

CREATE TABLE IF NOT EXISTS `pagecontent` (
  `pageContentID` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `pageID` int(11) NOT NULL,
  PRIMARY KEY (`pageContentID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pagecontent`
--

INSERT INTO `pagecontent` (`pageContentID`, `content`, `pageID`) VALUES
(1, 'Kinda hot in these rhinos. good morning, 	1234555', 1),
(2, 'osdfhodfoihsdfiohfoiiojgioj\r\nfosdfihfhfiosiojdsfgojsdfjofsdg[p\r\nhisfaoihpiohfiohoihiohpsfoihpshiosdhiop', 1),
(3, '\r\nAdvertise Â· Link to ColorPicker.com Â· Share ColorPicker.com Â· \r\n\r\nÂ© ColorPicker.com - Quick Online Color Picker Tool. HTML Color Codes	 \r\n', 1),
(4, 'Karlson', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `pageID` int(11) NOT NULL AUTO_INCREMENT,
  `pageName` varchar(20) NOT NULL,
  `pageTitle` varchar(30) NOT NULL,
  `pageHeading` varchar(30) NOT NULL,
  `pageContent` text NOT NULL,
  `pageDescription` varchar(100) NOT NULL,
  `pageKeywords` text NOT NULL,
  PRIMARY KEY (`pageID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pageID`, `pageName`, `pageTitle`, `pageHeading`, `pageContent`, `pageDescription`, `pageKeywords`) VALUES
(1, 'home', 'An Encounter With Hope | Home', 'An Encounter With Hope', '\r\n<p>&quot; Faith is the assurance, the confirmation, the title-deed\r\nof the things we hope for, being the proof of things we do not see and conviction of their reality - faith perceiving as real fact what is not revealed to the senses&quot; (Hebrews 11:1 Amp)</p>\r\n \r\n<p>&quot;Faith does not originate in our emotions, our feelings, or\r\nour senses.\r\nFaith is a matter of will.  We decide to believe as truth what is not revealed to our senses&quot;  Merlin Carothers</p>\r\n \r\n<p>Daily inspiration''s:</p>\r\n\r\n\r\n<!---->\r\n\r\n<h4>The Book</h4>\r\n<p>I have been on the most amazing journey of my life, sometimes painful, at other times exhilarating and ultimately triumphant and was able to share these experiences with my friends.  They encouraged me that I should share my journey of discovery of finding the father that I never knew.  On my pilgrimage I have also discovered extended family that I never had knowledge of before this encounter.  I want to take you on this amazing journey of how I found my father and in doing so how it helped me discover who I am, which enabled me to let go of the crippling past.  I share some general thoughts from my experiences that I hope will give you an understanding of my view of the world through my eyes, looking at my environment and what life was like for me and may be for many others without a father.  This is my journey of struggles and disappointments throughout my life and I find myself encountering hope 25 years later to discover the truth.</p>\r\n<p><a href="#" class="small button">read more</a></p>\r\n\r\n	\r\n\r\n	', 'Connecting People', ''),
(2, 'post', 'Post', '', 'This is a post', 'Connecting People', ''),
(3, 'admin', 'Admin panel', 'Administration page', '', '', ''),
(4, 'logout', 'Logout ', 'Come back again!', '<!-- banner -->\r\n<section id="banner">\r\n<div class="grid_6">\r\n<p>Boxing is about respect. getting it for yourself, and taking it away from the other guy. bruce... i''m god. that tall drink of water with the silver spoon up his ass. mister wayne, if you don''t want to tell me exactly what you''re doing, when i''m asked, i don''t have to lie. but don''t think of me as an idiot. are you feeling lucky punk this is the ak-47 assault.</p>\r\n<a id="join" href="#">Join now</a>\r\n</div>\r\n</section>', '', ''),
(5, 'suburb', 'Browse suburbs', 'The suburbs', '', '', ''),
(6, 'editContent', 'Edit Content', 'Edit Content', '', '', ''),
(7, 'delete', 'Delete', 'Delete ', '', '', ''),
(8, 'createPost', 'Creating post', 'Create new post', '', '', ''),
(9, 'signup', 'Sign Up', 'Give a Lify | Sign up', '', '', ''),
(10, 'editPost', 'edit post', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(30) NOT NULL,
  `userPassword` varchar(40) NOT NULL,
  `userAccess` enum('admin','user') NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `userPassword`, `userAccess`) VALUES
(4, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin'),
(5, 'seno', '927563fcd1bc8f1de024f88c889ee46be387f13f', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
