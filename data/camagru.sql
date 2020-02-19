-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 16, 2020 at 04:14 PM
-- Server version: 5.6.43
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camagru`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `comment` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `userid`, `gid`, `comment`) VALUES
(12, 38, 69, 'i like 69'),
(19, 38, 111, 'good'),
(20, 38, 112, 'nice'),
(23, 38, 110, 'beautiful'),
(25, 38, 120, 'ok'),
(26, 38, 120, 'good'),
(27, 38, 120, 'beauty'),
(31, 38, 119, 'ok'),
(37, 38, 120, '        po'),
(39, 38, 119, '        wow'),
(40, 38, 119, '        wow'),
(41, 38, 119, '        wow'),
(42, 38, 119, '        wow'),
(43, 38, 120, 'youoi'),
(44, 38, 119, '        miki'),
(45, 38, 118, '        reve'),
(46, 38, 119, '        lulu'),
(47, 38, 118, '        dream'),
(48, 38, 118, '        dream'),
(49, 38, 118, '        lol'),
(50, 38, 122, 'nice'),
(55, 38, 115, '55'),
(59, 38, 131, 'ok'),
(60, 38, 131, 'very nice'),
(61, 38, 131, 'beatutiful'),
(62, 38, 129, 'beatutiful'),
(63, 38, 120, 'beatutiful'),
(64, 38, 129, 'beatutiful'),
(65, 38, 129, 'beatutiful'),
(66, 38, 130, '        fsaf'),
(69, 38, 131, 'fds'),
(70, 38, 131, 'fd'),
(71, 38, 131, 'dfa'),
(72, 38, 131, 'dfafd'),
(73, 38, 131, 'dfafd'),
(74, 38, 130, '        fsf'),
(75, 38, 130, '        fsf'),
(77, 38, 130, '        dsd'),
(78, 38, 133, '        ohlhlh');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `userid`, `img`) VALUES
(61, 38, '../snapshots/5e2545bb43780.png'),
(62, 38, '../snapshots/5e25438f9e598.png'),
(63, 38, '../snapshots/5e25459b5d7e5.png'),
(68, 38, '../snapshots/5e2c521464c43.png'),
(69, 38, '../snapshots/5e2c52256e36c.png'),
(72, 38, '../snapshots/5e2dcef52e22e.png'),
(73, 38, '../snapshots/5e35ac5c7b043.png'),
(74, 38, '../snapshots/5e35ac697b0b0.png'),
(75, 38, '../snapshots/5e35acf58a175.png'),
(76, 38, '../snapshots/5e35dbf678652.png'),
(77, 38, '../snapshots/5e35dc1f43ffb.png'),
(78, 38, '../snapshots/5e35dc3005720.png'),
(79, 38, '../snapshots/5e35dc34c2278.png'),
(80, 38, '../snapshots/5e35dc4f45987.png'),
(81, 38, '../snapshots/5e35dc8f7aefe.png'),
(82, 38, '../snapshots/5e35df73bd464.png'),
(83, 38, '../snapshots/5e35df79ea288.png'),
(84, 38, '../snapshots/5e35e0357cce6.png'),
(85, 39, '../snapshots/5e35e05b391cd.png'),
(86, 38, '../snapshots/5e35e0ae4cb08.png'),
(87, 39, '../snapshots/5e35e0d759198.png'),
(88, 39, '../snapshots/5e35e0ef60476.png'),
(89, 38, '../snapshots/5e35e12ee68ef.png'),
(90, 38, '../snapshots/5e35e146deb7d.png'),
(91, 38, '../snapshots/5e35e14d15105.png'),
(92, 38, '../snapshots/5e35e16d57627.png'),
(93, 38, '../snapshots/5e35e1989d533.png'),
(94, 38, '../snapshots/5e35e205d26a6.png'),
(95, 38, '../snapshots/5e35e255948cc.png'),
(96, 38, '../snapshots/5e35e34378492.png'),
(97, 38, '../snapshots/5e35e3a9a75dd.png'),
(98, 38, '../snapshots/5e35e3cdc0736.png'),
(99, 38, '../snapshots/5e35e3f659048.png'),
(100, 38, '../snapshots/5e35e4004c72e.png'),
(101, 38, '../snapshots/5e35e482e9106.png'),
(104, 38, '../snapshots/5e35e4b2b95c6.png'),
(105, 38, '../snapshots/5e36b0487949c.png'),
(110, 38, '../snapshots/5e38b9ea73f7d.png'),
(111, 39, '../snapshots/5e3a2ec897e35.png'),
(112, 39, '../snapshots/5e3a2f2758304.png'),
(113, 38, '../snapshots/5e44847e16ce3.png'),
(114, 38, '../snapshots/5e4485151f151.png'),
(115, 38, '../snapshots/5e44852f1d2e6.png'),
(116, 38, '../snapshots/5e44853b5c173.png'),
(117, 38, '../snapshots/5e44858386b84.png'),
(118, 38, '../snapshots/5e44858d41c1c.png'),
(119, 38, '../snapshots/5e4485a7a3b25.png'),
(120, 38, '../snapshots/5e4485f355738.png'),
(122, 38, '../snapshots/5e4673428c4ed.png'),
(123, 38, '../snapshots/5e487b1f653a3.png'),
(124, 38, '../snapshots/5e487c0f448c1.png'),
(125, 38, '../snapshots/5e48864fc99e1.png'),
(126, 38, '../snapshots/5e4887cd9dbfd.png'),
(127, 38, '../snapshots/5e48885659c4a.png'),
(128, 38, '../snapshots/5e48886b98c6b.png'),
(129, 38, '../snapshots/5e48892636179.png'),
(130, 38, '../snapshots/5e4889419e1a3.png'),
(131, 38, '../snapshots/5e488ac30c7dd.png'),
(133, 45, '../snapshots/5e49d90f75468.png');

-- --------------------------------------------------------

--
-- Table structure for table `liketable`
--

CREATE TABLE `liketable` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `i_like` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `liketable`
--

INSERT INTO `liketable` (`id`, `userid`, `gid`, `i_like`) VALUES
(10, 38, 69, 1),
(22, 38, 104, 1),
(52, 39, 110, 1),
(55, 38, 111, 1),
(56, 38, 112, 1),
(61, 38, 115, 1),
(67, 38, 117, 1),
(69, 38, 120, 1),
(71, 38, 123, 1),
(73, 38, 122, 1),
(74, 38, 114, 1),
(78, 38, 133, 1);

-- --------------------------------------------------------

--
-- Table structure for table `testtable`
--

CREATE TABLE `testtable` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `commentary` varchar(500) DEFAULT NULL,
  `i_like` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(60) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `token` varchar(100) NOT NULL,
  `verified` int(11) NOT NULL DEFAULT '0',
  `preference` BOOLEAN DEFAULT false,
  `creationdate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `passwd`, `token`, `verified`, `creationdate`) VALUES
(38, 'root', 'linlinfan21@gmail.com', '$2y$10$9QhhPuKUrOtwiYm6XHQqj.s/h.UwsmUmUTfKGtHU/vUjQrID8qh9q', '6468867055e48ea97ccd834.03564235', 1, '2020/01/09'),
(39, 'yoyo9', 'fifidemacici@gmail.com', '$2y$10$hPcHH0wtSwrhLrHknh/1rOE3/FWwt5nJnF3m2NsFFtYMxywVLgppe', '15652382645e43b80361ce93.77685586', 1, '2020/01/09'),
(45, 'kuku', 'linlin.fan@outlook.fr', '$2y$10$3GxsBd.3OQEM9B7.unNLhOavrpjk8EE/bS7x7OwDF1iVu5.ZyXtBS', '8369699455e49d169334855.23872848', 1, '2020/02/17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ft_comment_ibfk_1` (`userid`),
  ADD KEY `ft_comment_ibfk_2` (`gid`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `liketable`
--
ALTER TABLE `liketable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `gid` (`gid`);

--
-- Indexes for table `testtable`
--
ALTER TABLE `testtable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `gid` (`gid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `liketable`
--
ALTER TABLE `liketable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `testtable`
--
ALTER TABLE `testtable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `ft_comment_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ft_comment_ibfk_2` FOREIGN KEY (`gid`) REFERENCES `gallery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `liketable`
--
ALTER TABLE `liketable`
  ADD CONSTRAINT `liketable_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `liketable_ibfk_2` FOREIGN KEY (`gid`) REFERENCES `gallery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `testtable`
--
ALTER TABLE `testtable`
  ADD CONSTRAINT `testtable_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `testtable_ibfk_2` FOREIGN KEY (`gid`) REFERENCES `gallery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
