-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2014 at 10:12 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `restmagazin`
--
CREATE DATABASE IF NOT EXISTS `restmagazin` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `restmagazin`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accountname` varchar(35) NOT NULL,
  `accpass` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `address` varchar(110) NOT NULL,
  `sexual` varchar(10) NOT NULL
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=180 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `artist`, `title`) VALUES
(1, 'ho ngoc ha', 'can nha trong'),
(11, 'bai viet hay', 'tran hong nghiem'),
(13, 'hay do', 'bai viet moi'),
(14, 'Hoàng Hà', 'Trần trọng kim'),
(15, 'Để rồi mà', 'Hoàn Thành đi'),
(16, 'David Bowie', 'The Next Day (Deluxe Version)'),
(17, 'Bastille', 'Bad Blood'),
(18, 'Bruno Mars', 'Unorthodox Jukebox'),
(19, 'Emeli Sandé', 'Our Version of Events (Special Edition)'),
(20, 'Bon Jovi', 'What About Now (Deluxe Version)'),
(21, 'Justin Timberlake', 'The 20/20 Experience (Deluxe Version)'),
(22, 'Bastille', 'Bad Blood (The Extended Cut)'),
(23, 'P!nk', 'The Truth About Love'),
(24, 'Sound City - Real to Reel', 'Sound City - Real to Reel'),
(25, 'Jake Bugg', 'Jake Bugg'),
(26, 'Various Artists', 'The Trevor Nelson Collection'),
(27, 'David Bowie', 'The Next Day'),
(28, 'Mumford & Sons', 'Babel'),
(29, 'The Lumineers', 'The Lumineers'),
(30, 'Various Artists', 'Get Ur Freak On - R&B Anthems'),
(31, 'The 1975', 'Music For Cars EP'),
(32, 'Various Artists', 'Saturday Night Club Classics - Ministry of Sound'),
(33, 'Hurts', 'Exile (Deluxe)'),
(35, 'Ben Howard', 'Every Kingdom'),
(36, 'Stereophonics', 'Graffiti On the Train'),
(37, 'The Script', '#3'),
(38, 'Stornoway', 'Tales from Terra Firma'),
(39, 'David Bowie', 'Hunky Dory (Remastered)'),
(40, 'Worship Central', 'Let It Be Known (Live)'),
(41, 'Ellie Goulding', 'Halcyon'),
(42, 'Various Artists', 'Dermot O''Leary Presents the Saturday Sessions 2013'),
(43, 'Stereophonics', 'Graffiti On the Train (Deluxe Version)'),
(44, 'Dido', 'Girl Who Got Away (Deluxe)'),
(45, 'Hurts', 'Exile'),
(46, 'Bruno Mars', 'Doo-Wops & Hooligans'),
(47, 'Calvin Harris', '18 Months'),
(48, 'Olly Murs', 'Right Place Right Time'),
(49, 'Alt-J (?)', 'An Awesome Wave'),
(50, 'One Direction', 'Take Me Home'),
(51, 'Various Artists', 'Pop Stars'),
(52, 'Various Artists', 'Now That''s What I Call Music! 83'),
(53, 'John Grant', 'Pale Green Ghosts'),
(54, 'Paloma Faith', 'Fall to Grace'),
(55, 'Laura Mvula', 'Sing To the Moon (Deluxe)'),
(56, 'Duke Dumont', 'Need U (100%) [feat. A*M*E] - EP'),
(57, 'Watsky', 'Cardboard Castles'),
(58, 'Blondie', 'Blondie: Greatest Hits'),
(59, 'Foals', 'Holy Fire'),
(60, 'Maroon 5', 'Overexposed'),
(61, 'Bastille', 'Pompeii (Remixes) - EP'),
(62, 'Imagine Dragons', 'Hear Me - EP'),
(63, 'Various Artists', '100 Hits: 80s Classics'),
(64, 'Various Artists', 'Les Misérables (Highlights From the Motion Picture Soundtrack)'),
(65, 'Mumford & Sons', 'Sigh No More'),
(66, 'Frank Ocean', 'Channel ORANGE'),
(67, 'Bon Jovi', 'What About Now'),
(68, 'Various Artists', 'BRIT Awards 2013'),
(69, 'Taylor Swift', 'Red'),
(70, 'Fleetwood Mac', 'Fleetwood Mac: Greatest Hits'),
(71, 'David Guetta', 'Nothing But the Beat Ultimate'),
(72, 'Various Artists', 'Clubbers Guide 2013 (Mixed By Danny Howard) - Ministry of Sound'),
(73, 'David Bowie', 'Best of Bowie'),
(74, 'Laura Mvula', 'Sing To the Moon'),
(75, 'ADELE', '21'),
(76, 'Of Monsters and Men', 'My Head Is an Animal'),
(77, 'Rihanna', 'Unapologetic'),
(78, 'Various Artists', 'BBC Radio 1''s Live Lounge - 2012'),
(79, 'Avicii & Nicky Romero', 'I Could Be the One (Avicii vs. Nicky Romero)'),
(80, 'The Streets', 'A Grand Don''t Come for Free'),
(81, 'Tim McGraw', 'Two Lanes of Freedom'),
(82, 'Foo Fighters', 'Foo Fighters: Greatest Hits'),
(83, 'Various Artists', 'Now That''s What I Call Running!'),
(84, 'Swedish House Mafia', 'Until Now'),
(85, 'The xx', 'Coexist'),
(86, 'Five', 'Five: Greatest Hits'),
(87, 'Jimi Hendrix', 'People, Hell & Angels'),
(88, 'Biffy Clyro', 'Opposites (Deluxe)'),
(89, 'The Smiths', 'The Sound of the Smiths'),
(90, 'The Saturdays', 'What About Us - EP'),
(91, 'Fleetwood Mac', 'Rumours'),
(92, 'Various Artists', 'The Big Reunion'),
(93, 'Various Artists', 'Anthems 90s - Ministry of Sound'),
(94, 'The Vaccines', 'Come of Age'),
(95, 'Nicole Scherzinger', 'Boomerang (Remixes) - EP'),
(96, 'Bob Marley', 'Legend (Bonus Track Version)'),
(97, 'Josh Groban', 'All That Echoes'),
(98, 'Blue', 'Best of Blue'),
(99, 'Ed Sheeran', '+'),
(100, 'Olly Murs', 'In Case You Didn''t Know (Deluxe Edition)'),
(101, 'Macklemore & Ryan Lewis', 'The Heist (Deluxe Edition)'),
(102, 'Various Artists', 'Defected Presents Most Rated Miami 2013'),
(103, 'Gorgon City', 'Real EP'),
(104, 'Mumford & Sons', 'Babel (Deluxe Version)'),
(105, 'Various Artists', 'The Music of Nashville: Season 1, Vol. 1 (Original Soundtrack)'),
(106, 'Various Artists', 'The Twilight Saga: Breaking Dawn, Pt. 2 (Original Motion Picture Soundtrack)'),
(107, 'Various Artists', 'Mum - The Ultimate Mothers Day Collection'),
(108, 'One Direction', 'Up All Night'),
(109, 'Bon Jovi', 'Bon Jovi Greatest Hits'),
(110, 'Agnetha Fältskog', 'A'),
(111, 'Fun.', 'Some Nights'),
(112, 'Justin Bieber', 'Believe Acoustic'),
(113, 'Atoms for Peace', 'Amok'),
(114, 'Justin Timberlake', 'Justified'),
(115, 'Passenger', 'All the Little Lights'),
(116, 'Kodaline', 'The High Hopes EP'),
(117, 'Lana Del Rey', 'Born to Die'),
(118, 'JAY Z & Kanye West', 'Watch the Throne (Deluxe Version)'),
(119, 'Biffy Clyro', 'Opposites'),
(120, 'Various Artists', 'Return of the 90s'),
(121, 'Gabrielle Aplin', 'Please Don''t Say You Love Me - EP'),
(122, 'Various Artists', '100 Hits - Driving Rock'),
(123, 'Jimi Hendrix', 'Experience Hendrix - The Best of Jimi Hendrix'),
(124, 'Various Artists', 'The Workout Mix 2013'),
(125, 'The 1975', 'Sex'),
(126, 'Chase & Status', 'No More Idols'),
(127, 'Rihanna', 'Unapologetic (Deluxe Version)'),
(128, 'The Killers', 'Battle Born'),
(129, 'Olly Murs', 'Right Place Right Time (Deluxe Edition)'),
(130, 'A$AP Rocky', 'LONG.LIVE.A$AP (Deluxe Version)'),
(131, 'Various Artists', 'Cooking Songs'),
(132, 'Haim', 'Forever - EP'),
(133, 'Lianne La Havas', 'Is Your Love Big Enough?'),
(134, 'Michael Bublé', 'To Be Loved'),
(135, 'Daughter', 'If You Leave'),
(137, 'Eminem', 'Curtain Call'),
(138, 'Kendrick Lamar', 'good kid, m.A.A.d city (Deluxe)'),
(139, 'Disclosure', 'The Face - EP'),
(140, 'Palma Violets', '180'),
(141, 'Cody Simpson', 'Paradise'),
(142, 'Ed Sheeran', '+ (Deluxe Version)'),
(143, 'Michael Bublé', 'Crazy Love (Hollywood Edition)'),
(144, 'Bon Jovi', 'Bon Jovi Greatest Hits - The Ultimate Collection'),
(145, 'Rita Ora', 'Ora'),
(146, 'g33k', 'Spabby'),
(147, 'Various Artists', 'Annie Mac Presents 2012'),
(148, 'David Bowie', 'The Platinum Collection'),
(149, 'Bridgit Mendler', 'Ready or Not (Remixes) - EP'),
(150, 'Dido', 'Girl Who Got Away'),
(151, 'Various Artists', 'Now That''s What I Call Disney'),
(152, 'The 1975', 'Facedown - EP'),
(153, 'Kodaline', 'The Kodaline - EP'),
(154, 'Various Artists', '100 Hits: Super 70s'),
(155, 'Fred V & Grafix', 'Goggles - EP'),
(156, 'Biffy Clyro', 'Only Revolutions (Deluxe Version)'),
(157, 'Train', 'California 37'),
(158, 'zxczcxz', 'Every zxczxc'),
(159, 'Various Artists', 'Motown Anthems'),
(160, 'Courteeners', 'ANNA'),
(161, 'Johnny Marr', 'The Messenger'),
(162, 'Rodriguez', 'Searching for Sugar Man'),
(163, 'Jessie Ware', 'Devotion'),
(164, 'Bruno Mars123123123213213213', 'Unorthodox Jukebox123213213123'),
(165, 'Various Artists', 'Call the Midwife (Music From the TV Series)'),
(176, 'ậksajkajsakjksjaksajska', 'trándsadsdskk'),
(177, 'asdasd', 'asdas'),
(178, 'asdsadsadasd', 'asdsad'),
(179, '21313', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `magazinepublish`
--

CREATE TABLE IF NOT EXISTS `magazinepublish` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `descriptionkey` varchar(100) NOT NULL,
  `imgkey` varchar(100) NOT NULL,
  `idmzalbum` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `magazinepublish`
--

INSERT INTO `magazinepublish` (`id`, `title`, `descriptionkey`, `imgkey`, `idmzalbum`, `password`) VALUES
(1, 'can nha trong', 'ho ngoc ha', 'book1/car_magazine_1.jpg', 2, ''),
(11, 'tran hong nghiem', 'bai viet hay', 'book1/car_magazine_1.jpg', 1, ''),
(13, 'bai viet moi', 'hay do', 'book1/car_magazine_1.jpg', 1, ''),
(14, 'Trần trọng kim', 'Hoàng Hà', 'book1/car_magazine_1.jpg', 2, ''),
(15, 'Hoàn Thành đi', 'Để rồi mà', 'book1/car_magazine_1.jpg', 1, ''),
(16, 'The Next Day (Deluxe Version)', 'David Bowie', 'book1/car_magazine_1.jpg', 2, ''),
(17, 'Bad Blood', 'Bastille', 'book1/car_magazine_1.jpg', 1, ''),
(18, 'Unorthodox Jukebox', 'Bruno Mars', 'book1/car_magazine_1.jpg', 1, ''),
(19, 'Our Version of Events (Special Edition)', 'Emeli Sandé', 'book1/car_magazine_1.jpg', 1, ''),
(20, 'What About Now (Deluxe Version)', 'Bon Jovi', 'book1/car_magazine_1.jpg', 1, ''),
(21, 'The 20/20 Experience (Deluxe Version)', 'Justin Timberlake', 'book1/car_magazine_1.jpg', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `mzimg`
--

CREATE TABLE IF NOT EXISTS `mzimg` (
  `idmzimg` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL COMMENT 'quan he 1 -1 table magazinepublish',
  `img` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`idmzimg`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `mzimg`
--

INSERT INTO `mzimg` (`idmzimg`, `id`, `img`, `description`) VALUES
(1, 2, 'images/book1/car_magazine_1.jpg', 'ho ngoc ha'),
(11, 15, 'images/book1/car_magazine_1.jpg', 'bai viet hay'),
(13, 11, 'images/book1/car_magazine_1.jpg', 'hay do'),
(14, 10, 'images/book1/car_magazine_1.jpg', 'Hoàng Hà'),
(15, 11, 'images/book1/car_magazine_1.jpg', 'Để rồi mà'),
(16, 2, 'images/book1/car_magazine_1.jpg', 'David Bowie'),
(17, 12, 'images/book1/car_magazine_1.jpg', 'Bastille'),
(18, 13, 'images/book1/car_magazine_1.jpg', 'Bruno Mars'),
(19, 14, 'images/book1/car_magazine_1.jpg', 'Emeli Sandé'),
(20, 1, 'images/book1/car_magazine_1.jpg', 'Bon Jovi'),
(21, 2, 'images/book1/car_magazine_1.jpg', 'Justin Timberlake');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
