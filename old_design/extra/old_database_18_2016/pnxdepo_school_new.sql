-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 18, 2016 at 11:39 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pnxdepo_school_new`
--
CREATE DATABASE IF NOT EXISTS `pnxdepo_school_new` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pnxdepo_school_new`;

-- --------------------------------------------------------

--
-- Table structure for table `account_year_mst`
--

CREATE TABLE IF NOT EXISTS `account_year_mst` (
  `account_year_code` int(11) NOT NULL AUTO_INCREMENT,
  `yeanm` varchar(255) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `master_code` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`account_year_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `account_year_mst`
--

INSERT INTO `account_year_mst` (`account_year_code`, `yeanm`, `status`, `master_code`, `create_date`, `update_date`) VALUES
(1, '2015-2016', 'Active', 1, '2015-12-31 14:52:19', '0000-00-00 00:00:00'),
(2, '2016', 'Active', 2, '2016-05-16 15:39:14', '0000-00-00 00:00:00'),
(3, '2016-2017', 'Active', 1, '2016-10-12 12:17:30', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `cityid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `stateid` int(11) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`cityid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cityid`, `name`, `stateid`, `status`, `create_date`, `update_date`) VALUES
(1, 'Anand', 1, 'Active', '2015-12-31 14:42:43', '0000-00-00 00:00:00'),
(2, 'Surat', 1, 'Active', '2015-12-31 14:42:50', '0000-00-00 00:00:00'),
(3, 'Khambhat', 1, 'Active', '2015-12-31 14:42:55', '0000-00-00 00:00:00'),
(4, 'Jaipur', 2, 'Active', '2015-12-31 14:43:01', '0000-00-00 00:00:00'),
(5, 'Ajmer', 2, 'Active', '2015-12-31 14:43:08', '0000-00-00 00:00:00'),
(6, 'Sterling', 3, 'Active', '2015-12-31 14:43:57', '0000-00-00 00:00:00'),
(7, 'Kensington', 3, 'Active', '2015-12-31 14:47:17', '0000-00-00 00:00:00'),
(8, 'Thomaston', 3, 'Active', '2015-12-31 14:48:11', '0000-00-00 00:00:00'),
(9, 'Edison', 4, 'Active', '2015-12-31 14:48:26', '0000-00-00 00:00:00'),
(10, 'Columbia', 4, 'Active', '2015-12-31 14:49:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('00ff693396bb44c96f916a8733f71663', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879617, ''),
('01076456ede8723be04ef2991219331e', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475555391, ''),
('013abff95d713f0baf0965b448c60b52', '23.101.61.176', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1455864232, ''),
('01434cd9c4d68d81180ee5d3c66efd1e', '106.78.200.127', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1461308573, ''),
('0150b4911a09e0de70cc89a8deacc9c5', '106.77.195.17', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279756, ''),
('0159e381cae2b6f671f80ade1eaf83ad', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455870880, ''),
('01992f903b116ecf19d70a08e9cc74a4', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872169, ''),
('01c58073f0725d6c7a543965c3ffcf66', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458291410, ''),
('01d7a5efbf642d9da6209f76ed6ed53f', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475493665, ''),
('02527c85206b041be04d742f7d3fa6fd', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455882128, ''),
('028b12b1898e8c3f40baa4d2d6383b2d', '1.39.86.222', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455513163, ''),
('02dcddb3d8169ea97900d77a9bc62e2f', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475833662, ''),
('035ab15312e14435600a00c3412f5605', '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36', 1455280311, 'a:1:{s:17:"logged_in_student";a:13:{s:8:"usercode";s:1:"3";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"3";s:4:"name";s:17:"manali harsh Shah";s:8:"username";s:6:"manali";s:7:"emailid";s:16:"manali@gmail.com";s:8:"mobileno";s:0:"";s:8:"phone_no";s:10:"7654345444";s:5:"image";s:0:"";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:3;}}'),
('03650780daa7a6b671b2654b5b57e310', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455359434, ''),
('0387ab712155e65de4748b733297bcf4', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872137, ''),
('039859fbe3d82832fd9f18f63f896ebc', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455863704, ''),
('03d87d3411c955ee4252e06dbe3ffd00', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475566125, ''),
('04294d070eab1d86c7fafe7f27626dd8', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460177772, ''),
('04312814edcbe439757f0d44125faed5', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475556083, ''),
('0438600a719e5690d2598fc968bb4989', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455357236, ''),
('044084ee786d4fada4765baa919c6396', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475836945, ''),
('0480c35a1124147fbbe69776a9587e03', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455340432, ''),
('04afa54a937e66fb9e2eb00883cc8444', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455368612, ''),
('051e1d51a565eaab4c113403c1e59c7e', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455876334, ''),
('05614a8289138cd4ff6264a2380beff4', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880753, ''),
('05652e35a67b57abe55a660c09d6dade', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475836934, ''),
('05800f2c68df5d152355532a14f8ba26', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458192846, ''),
('0582feaeadd1cdf16c4eb251d204e56b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879823, ''),
('05dfb4bf14b2a6941222d2154cc62b78', '1.39.98.62', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455883152, ''),
('05f53cf67eef0fe12ebd080f9f761dee', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872176, ''),
('06786b87db13bcf95b37e45fddd53aaa', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458283645, ''),
('067c14e2e30aad815a0ff93acf5c098c', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455869909, ''),
('0689475abfb88b01b20007544ea47b01', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460179343, ''),
('0697d1749fcedadfc7d0202b8abaf895', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455881379, ''),
('06b04478895f91dbc7b4210f652cd40c', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455512930, ''),
('06e5d8ddf8172f35833a2bfb21d68646', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458825973, ''),
('074cd651ad764d01ec0eb2c177561654', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455871340, ''),
('075b6bead5e5d7af436675091c7e31e1', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455802870, ''),
('07a5946c078162a3eea0166b2ace6fd8', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455340212, ''),
('07ccafbd1b2579d336f2cd0957bd02b5', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463389846, ''),
('07f0b4ae08361aea1b71285d2de87f7d', '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', 1476780937, ''),
('07f56b233b03e6222cf1878c50eeb2cc', '23.99.101.118', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1475512250, ''),
('080293fd3fa8bbb8620a2dc1cc1cd3f8', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455877446, ''),
('085f609bde801022292ff76b96f02016', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872163, ''),
('086e565070e44888ff1319d22ed3098e', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872542, ''),
('08a6d256b447b41ff8130aca91c5050b', '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36', 1459832244, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:26;}}'),
('08cffb300dec141b7d7db2b22eb8c0f8', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879590, ''),
('08e36bda70f5f90e4e641a1b7906bd01', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455285147, ''),
('08e3d966d8cdb2c6d07f81b531cb76cc', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455512933, ''),
('0909e326deac48103d7bf1c3b1858afe', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458537754, ''),
('0911ec21e0a33ae82e880817a50e33b8', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463390789, ''),
('093c8774d06d50e740f5385af02d204b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455353426, ''),
('095bc2a869e91897acefc0a8097b79f6', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455870866, ''),
('096b802d7b5ac5da34df7afbc45ccf4d', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878104, ''),
('0976813bedee16d9872d240ab07c9bd9', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455359452, ''),
('09791d5288372b5c3ff0d9b15ab4a3d6', '106.77.195.17', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279737, ''),
('098cf5175d79911790f477286f31421d', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460179649, ''),
('0a0536a2981f62b6a2146400016146cb', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456133920, ''),
('0a187c2ae80d77ecfb01baacfcc3026b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880177, ''),
('0a20aaf8654d2bd991f4abb5efe1b216', '1.39.87.75', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458283698, ''),
('0a267da982ab211f5136d46c60f68a92', '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', 1476781096, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:5:"admin";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:80;}}'),
('0a3293673f68760e930e50e37e4d2ae2', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455281540, ''),
('0a347a5faad748440af74bc1882ac8c9', '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36', 1455284453, ''),
('0a5d837edc628f056f70c712c86c8927', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455285139, ''),
('0a689ddfbf9ac846f72277c506cc050e', '172.16.16.53', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1476274092, ''),
('0ab86ce08593b5a1f243d8e3f49a2d05', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463392272, ''),
('0aba91b1ae5bb90d73b5734d36e5b49e', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872110, ''),
('0aebd222a9c51895188e5d61388c3a31', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455876929, ''),
('0af6dac5806b6dfb606bf0a3882771d6', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475555439, ''),
('0b0555cfef37ffbf29c4255114a8a7c3', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1467349061, ''),
('0b26448b1ca7ab06e8d2f6e6b78acee7', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878506, ''),
('0b444e80ac6672bff5010a76078ec8ea', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455367771, ''),
('0b45087ddb84e3f3270bca311d49d4b4', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458538320, ''),
('0b734d0b222225271b5627e8ec1c38f6', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455870872, ''),
('0b7f9a7bcc1443e786a66c23ea0c8ff5', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455877636, ''),
('0b9dec31b50890349eee3a8dd205b550', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475566104, ''),
('0bd3965d3e3e4e5014f155b908744d1c', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463721698, ''),
('0c02f93392357922682f14866cc4afa4', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455344832, ''),
('0c514366f7cd55647a2874f84a32e3cb', '117.248.206.146', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459593140, ''),
('0cc5ddc970d6c136cbd72c4d43bbeadb', '117.248.206.56', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458215558, ''),
('0cc7051f21e12c4524c83324cb8719fd', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463392254, ''),
('0ce783a8cdefe684fcdc52b52c7e7f89', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463640183, ''),
('0cf0cdb667688c933851e3cd3468b83e', '106.77.195.17', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279671, ''),
('0d0b3559beb7a7d71cc78818ca41f069', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455283352, ''),
('0d582b5819058ca88facb6abd429c578', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455281743, ''),
('0dc0f2a4e03fabf8439dab3d2fc621bf', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878117, ''),
('0dc91280ac4f70bd9f3876a872acab83', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279795, ''),
('0df04206cc0bec81ea4e2dd8d97589ad', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455359565, ''),
('0dfd54b2bf9b8bdd1948525f256f0d34', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1461047814, ''),
('0e0cf746825a27222e894c587cbf0c58', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455359540, ''),
('0e12f5e80ad87482868a8eee78c54bee', '1.39.86.222', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455513267, ''),
('0e2d913b539e1fc248b47db62e7ba64d', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475566081, ''),
('0e2fc6b39e883fa01e6f0c7bbf95767f', '172.16.16.24', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0', 1451558759, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:10;}}'),
('0e3c50ba1695ad1785d5f9ba375e9afa', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455359471, ''),
('0e4fbce99d21e034163f178e81f9923e', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463392240, ''),
('0e55e1cbbfba89339356a76e62d6843e', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880636, ''),
('0e76880e614b337ff4be0b182fc1b893', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458537795, ''),
('0ed5aaa20315b3606f72ef67a739fb17', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455862449, ''),
('0f8e4d98880c8097bbe492e7df6d8276', '23.101.61.176', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1459831700, ''),
('0fa9b9d9ba90225fd29e7edf2ab450f0', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463397336, ''),
('0fe67cc865f290217ced7bf4b541f810', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458537217, ''),
('1021a0f935840753758e0c67ed1aadf8', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459834690, ''),
('107f90997e35a2660ddce17597b0910f', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455862464, ''),
('10981c65318405d2ba6c7367d3a9b282', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', 1453544484, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:54;}}'),
('10a8005548c4bab5847576ef4b43ed8b', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475833919, ''),
('10c1999bc3e37dc0a99ebd683b931ece', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879370, ''),
('10f77e1a83f50f1ea17bfcf9cdd996fd', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458284945, ''),
('113870b47bd1dfe4ae6896df6eb3571f', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463397031, ''),
('115e0a982cb5f0fb2127d1e609e28825', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455278268, ''),
('11602bc51c5c305b5d41439dc83d7028', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455283281, ''),
('1166c631f57ee61d880e0623c9fe2191', '40.78.146.128', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1453966488, ''),
('11a9740ff59636393e17e151f0e21580', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460192072, ''),
('11d092ea66134939c4ea15c62f5732d3', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455877957, ''),
('121e42fa07c28ce17195a797c0a94cd7', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455368447, ''),
('125bbcf3b79bd715ab2778d6f2432628', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460179611, ''),
('126a6dfc499bb93f6c9bbe3957e33b9f', '1.39.86.222', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455513173, ''),
('1291f37dc945b859a986b1c6944493c3', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455877811, ''),
('12bf3cbb3886cfd30246d6e9a9057261', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455359724, ''),
('12d73e4d773dbc2a542849383daaad88', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475581281, ''),
('12e6036382b953e672057246f9835968', '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', 1476687403, ''),
('12eea2a431ee45bb98bba16cab93e000', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455283278, ''),
('12fef31440b8a0e0c2a2860011c0c38f', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455345022, ''),
('131b07833aec0335578a4d30226130fb', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455864326, ''),
('13401aad2317a7e3b2cafdc313949244', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463392380, ''),
('1355f5b284aac8fb8f71e4c94b489f7e', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456900656, ''),
('13678a0bcde3c1469d9c6c9b670ae568', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455877601, ''),
('13cb34250e73ff414f26701493d525aa', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455877841, ''),
('13e3c112245a08553c31ddc899f872cd', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455356608, ''),
('1432fc5000b259de13aac469848f277a', '104.209.188.207', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1460225128, ''),
('14346da58bf57e653c49b1dae5fb7d54', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458291803, ''),
('143e47c09c17df55ef0a59b34dced6b2', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475493664, ''),
('144d4a9d8e4f1b18da481e42c0ac1c23', '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36', 1456921818, ''),
('144e46049b6a4ea8fccfb8e582cf9794', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455355987, ''),
('1454a5a9b68a7d92d66b029b2b3996e8', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455276246, ''),
('1456f5a077244fb8a2a2cf16f33f6a7e', '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36', 1458291693, 'a:1:{s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:24;}}'),
('147a1ac5ebe58994426000ae63c02696', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455877890, ''),
('149e05c84f6942c345445e7bb1d1bedd', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880161, ''),
('14a0ad37b586ce6ee1aa4a1ba97c1905', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463389829, ''),
('1543b397d33ad4fcc8e405192ce833ad', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872297, ''),
('155f0934b382a383a14405e9d9837e81', '40.78.146.128', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1453966482, ''),
('1571ae6c403891b7691c558e3e9a61bd', '1.39.87.153', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455184616, ''),
('1579f4496bed0ca75851aaffe6ad622a', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455366400, ''),
('159e7c6f976705942bccd0e0f04f32fd', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458291415, ''),
('1616b51380bd8372519e79cfbfcdfb14', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459831407, ''),
('165e1c05a0c8cce7c1da44b97441d19f', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458537214, ''),
('169429d9dbe9af4a25cf1f0035db44aa', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455881655, ''),
('16c19568b18a5d671873594c865896d6', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455343008, ''),
('16c3b51448d133083f4f41daa18fd6ef', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463720725, ''),
('16d9ea855762cc8dc491bc3d2e30e22a', '1.39.12.80', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458636654, ''),
('16dc9e2afcc2457e6e1f76fa0ef79f1f', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872743, ''),
('16e00a3461c9c69410f6d733e031f7da', '180.211.117.81', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36', 1455875123, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:6;}}'),
('1777aa5305c8835b38a8768ac8f21ef2', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475571006, ''),
('17e70d0b5e27a4a952af0ac31f0f1122', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455282357, ''),
('17e768046b6ce8e2a29bb20cf12a10ce', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475832323, ''),
('1801e4b7c45d62e0e679938d13f65464', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878482, ''),
('1825d02145924c8e256c2f7730328dbe', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458284155, ''),
('184221ab4d3199246c4f341c7f9f1f90', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458291876, ''),
('187ba3d9f68d0c322b33e73ad3bb0ed5', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455873033, ''),
('18b5512a4b5e4a38520a31f9154a47d1', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455863365, ''),
('18e316b2dcf9c3b248ef3e2d15560fec', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1471869498, ''),
('18f76a132d4f9505174d3809da616473', '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36', 1455883253, 'a:1:{s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:10;}}'),
('194316ee66eefedce67e82d41005f3e5', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458192847, ''),
('19459e982415b958acf061369331e9fa', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880612, ''),
('1957967003e22a08d925465997f15bd6', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878113, ''),
('19c014aa9ba36f64201aac0d23811085', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455875260, ''),
('19f8dad07029bef7a44e657240a67711', '117.248.206.56', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458215718, ''),
('1a1690cdb32debefd43c11db5a6e74ef', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455877613, ''),
('1a1c8f0f5a9f2e4bbbd99cc813b365a7', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460192090, ''),
('1a5a47dc772619e905695a6b4667db2b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455787533, ''),
('1a876c1ce9051c3ef31168c29d467a22', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463722125, ''),
('1a8b07ce39c5a3e8c4b87c4121c2daab', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463396475, ''),
('1a8c8182e349fe69e5a84d47ddfb85df', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460191031, ''),
('1aa3f0068375c36eca96eb963f060035', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458291429, ''),
('1b0da86240be62785ed4cadb227e2ebf', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463398830, ''),
('1b3787d16239951bef7d4812fe886115', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459834601, ''),
('1b487330aaac2ecca13b0c0c05d01157', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455862962, ''),
('1bb0b675331d957af67e94e31bfc8523', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872147, ''),
('1bbaada27d314f276cdbb5ba94cdedbe', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459235438, ''),
('1c00b3e694584ff32fab40799e63d8f3', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455877585, ''),
('1c12b258376a9ff1787154c559b63efd', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455871283, ''),
('1c445ecdc7c588de17d496fb57429f9d', '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', 1476782737, ''),
('1c45fdb1526787a32a56f39920588796', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455280156, ''),
('1c684c42a1fa3896189bf3572da6f770', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279435, ''),
('1cb0e5a2e655a32cae608ac547c3058a', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463389845, ''),
('1cd005f871c7cad2d96c1c2e4fbf7a09', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879297, ''),
('1d2d8c188bf31cf69bbd560c18bda718', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455359529, ''),
('1d73bebecc4bf515f481f4f776196d1a', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458288939, ''),
('1d7a2a83576b2a0d4b272531c1154fed', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455870608, ''),
('1da1f9aa49fd8ea240b6fbd077fffc5a', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872537, ''),
('1dcac9847e61dd37cf78c61aad2a491b', '180.211.117.81', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36', 1456989191, 'a:1:{s:9:"user_data";s:0:"";}'),
('1dd1b20e5cb38f98b96ed33170b79ddc', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463399050, ''),
('1e2072f12b3b2a639570e3e657486376', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455869907, ''),
('1e5c5b5d742c778e85f8e8e1bf9edc66', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455873062, ''),
('1e6491263e5a76d438f3bf49bfa732c2', '172.16.16.53', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36', 1476789743, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:5:"admin";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:92;}}'),
('1e72909873078bf958cdbbbebde9d16d', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475557393, ''),
('1e9e5b0380b53760a1875bea22e46d05', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458537425, ''),
('1eb5693d516ce0edcf7357408810fca2', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458291675, ''),
('1ed22e9b7985c6705d661c77c51c58fd', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458289907, ''),
('1ee202756b519db142bab7d5aee71d75', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463722097, ''),
('1f2bccd7db6f03070d431c2cef7c2f00', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475836947, ''),
('1f3645bedfa7ace430b01c04673481ff', '1.39.98.62', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455883080, ''),
('1f693e70c099c94869879e49029d1ff8', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460438841, ''),
('1f731c8c36cf4c88956aa2d36796ac9d', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455870376, ''),
('1f8d3326f7c95baed7ebc61a2cc5f25e', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455361070, ''),
('1fb5ba56df68ce90f1bae655e122ef53', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879835, ''),
('1feb12108e1cd91eb95c8ec88c41eee3', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455870675, ''),
('200278fd5ee61e3236336458bd00ec63', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455285155, ''),
('20153b8f1517f347060f6acd8a55cc28', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455871588, ''),
('201c52277b7a54cad314ddd358ddaffd', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455871459, ''),
('204e07085c6e324a57d076d8321c5824', '1.39.12.80', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458636644, ''),
('205a85eca6b46e7e03436d18b410704b', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455882310, ''),
('206e5b84e744fcb89ae312e0127063dc', '1.39.86.222', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455513197, ''),
('207645fcff21d570ba68f39e445e80e9', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455281789, ''),
('20ab46019a3fbcdc92d03295ce898712', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458632759, ''),
('20aeb5828bd89951c903e7c0da5ff537', '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', 1454065484, ''),
('20dc9eb573382b2c8998d06dee5d7684', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455285166, ''),
('20fe027a2342db65f85174a7fccb6d6f', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475832078, ''),
('210431de2867923e8782e72011cbff86', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455345079, ''),
('21142523cf9e4a4d0ca7e70c7ce4269a', '212.71.239.15', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455864722, ''),
('214d29ca62012ec0642dbb54efb2adfa', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463721676, ''),
('2190ff38387d8e824f11757f18d9a07b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455340325, ''),
('21acabd35744f5999a1b6eb3bf40786b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880576, ''),
('21c91733dd70c5ca194a7d1415749942', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879336, ''),
('231bfe8253b59019feddcce383872b79', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455342859, ''),
('2377a5778c56e3be678c3d56eb2f3501', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455361077, ''),
('23c35dae83dac42e81f059378f957335', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475555409, ''),
('23d9337fe5f7a38b152bad091f2a7a50', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455280161, ''),
('241bee7f127bc7c73a0ac2e4c65903ca', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463398604, ''),
('2454f2ca8280721c4a196db934e25422', '106.77.195.17', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279644, ''),
('24575a7ea376b722e87178b470ccc8ff', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463396115, ''),
('2487e724b9659c90e74a9faacbcc90ff', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455863538, ''),
('24c304b59d9a569e1f1f008fe9fcd04a', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475556036, ''),
('24dec010b53e3d30db9c4c9c4f6c6a76', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460192465, ''),
('25090f57930770029e8d6a9a7f2a779b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455344865, ''),
('258337472ffc9b4a1a0a64a06f7e5ccf', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455865259, ''),
('2598d4acfb5e11c6b2d71c528bc28e4a', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872320, ''),
('26206f8b72c5b2cd6bf07b123e7e4d34', '212.71.239.15', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455864692, ''),
('2620e0f67ab4395a5c5f226ef69c1fae', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872069, ''),
('262f68541433c1c1302fbaa180bdc542', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456899314, ''),
('264c99a0f6c0ddcc6230cf74a6be6ea8', '1.39.86.222', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455513317, ''),
('265a231a9e0343799d67056701b75320', '40.78.146.128', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1453966481, ''),
('265a5ec781f1c81890a1b4b002636bc2', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463396121, ''),
('2674368d2dc189816abdab1f320a124f', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455875398, ''),
('26b8d5210aba497783768f920a60f888', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455280158, ''),
('26e428ac790b35116d5ed10ce227d18e', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455874857, ''),
('270523be2ee6a004be07cf3b04c95bd4', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455864534, ''),
('2712901c9f658644e88727f445ebe011', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455963518, ''),
('273ba29f94edbe50ff9609c992bdbbb6', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463722104, ''),
('275021c0f29c7738984d146865cc9512', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475565976, ''),
('27671c29ad12f1912d5db5223d2d66af', '66.249.84.236', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1460206827, ''),
('278418a34d8c62f969e2718af6a65e3d', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455963508, ''),
('2789272bae97f89dc634998ec6d51346', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463392414, ''),
('27adb1881b4d3b233edb7b1b798a1c2a', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455874962, ''),
('27e6af263f2dcb70af38069e7fc55895', '106.77.195.17', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279648, ''),
('28566ad6deb165456373c2dfe88303a5', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455342856, ''),
('289c92474c60e6a9730d3662da6c2577', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455871391, ''),
('28c60ee5297589a0e37bfa2f84862a0e', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458288761, ''),
('28c65065b2c85f382e6decea7d2a4b7e', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460377664, ''),
('2905cf7d2ca8b55f370e26a2295ca63d', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1464777048, ''),
('295df29085f04ca15b280a469376bc47', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463389894, ''),
('2962815e5ca06ebbc07d8a0265262532', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455340524, ''),
('297892729eba36d6e8b5832360436e5d', '106.77.195.17', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279811, ''),
('299ada733ca12611250d32d1ea8ad4ae', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458192876, ''),
('2a1d820598db0c8a2e9c55071b590233', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456133923, ''),
('2a3124881398c279b4c7ab31f1f1495e', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455877813, ''),
('2a59038ff68721859c4f5eb8fe358fa2', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455865257, ''),
('2acbdd65c18b9eca542bb9fca39a1204', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455368338, ''),
('2b0a6f9f4261dbc33264b507b1ac9db9', '106.77.195.17', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279720, ''),
('2b1f684d42952473da8aab25fc2c5e5c', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463390065, ''),
('2b7bfb3e7c4433c2af956d269512987b', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475833686, ''),
('2b7e603b42a845118e7fd19162584f96', '66.249.85.194', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1460090722, ''),
('2bb9ffb0da11d8083baab6ca4858b05e', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463400177, ''),
('2c3fae699cce712eacb0b023bed69b7f', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455881649, ''),
('2c6bc51207d26173643b173885045aff', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455876324, ''),
('2c8a2a0a2619fe1a44bb4587727d1d09', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455871687, ''),
('2c8ea3039fe8070aa8cebeaf047b47cd', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458536831, ''),
('2c8f268be1c551b5f6c0d9aed0954a05', '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36', 1455181429, 'a:2:{s:9:"user_data";s:0:"";s:14:"logged_in_user";s:11:"Super Admin";}'),
('2ca88bca681e14fa65f0f9c338c3d180', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455871488, ''),
('2cc5d63d6e1b6952ab62f978569ca779', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455873208, ''),
('2cf3b5980d744d63398e0b33beb93efc', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455285101, ''),
('2d41f8e3c0b9903fdbf53c5c024302a4', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455342854, ''),
('2d48877e65c5ad5b2478deb07247d356', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872270, ''),
('2dd78a6a72589e0cbfeaa840a4647106', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475555751, ''),
('2df22a1b0b9659fec142a12bcccd26ec', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458632724, ''),
('2e14aac5271ccd3bc4b0659f32ce091f', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455869610, ''),
('2e26d3ed03e295cc4c67ec3934221dc2', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872160, ''),
('2e342f8741811d9bb16ec156501c6b6a', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475556021, ''),
('2e3801e4a0efbfc09a4230fdee8cc513', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878487, ''),
('2e645e9c711ed0f021e372425f563363', '40.78.146.128', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1453966485, ''),
('2e8e411eacb261707a03699bbfa38fc9', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455282292, ''),
('2e9681c2cafdc4851e9bf41ac82d3b56', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455963525, ''),
('2eb0fec6e7b9dbb1942563636d965795', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459831387, ''),
('2eb6f89bc21042911f92b664e2fd812c', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463640162, ''),
('2ed7e57ead63ac3d5e8aa123e1ef3ee9', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455874976, ''),
('2ee0be3ddacfe20a52420da9392cd81b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455876767, ''),
('2f1163ed271f44a4b98113a3bfa8f083', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455873046, ''),
('2f4b32af7a2395991db942f5fd328e48', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878044, ''),
('2f6d332b1b2b2ada24f628e36747d56e', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458288736, ''),
('2f80389d6089469fe8a86583d3b7f750', '40.78.146.128', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1453966479, ''),
('2f994268dc012a39f3e64e40f04ef63c', '66.249.84.236', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1460206827, ''),
('2f9b99ba932136e21066c6535205355f', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455283346, ''),
('2fa14561e483da697ce3e6dc56bf517b', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', 1453113221, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:49;}}'),
('2fb27ef2f538885d100cf0ca6d0b9d45', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455863877, ''),
('2fdc315133ea6898efb022eceabf6039', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878419, ''),
('2fdfbee0f93a0877505a2f972d2d9530', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455359562, ''),
('2ff931ee699d58e4454bd3a960491609', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451989043, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:27;}}'),
('3064956d7145fa98a56c01c9619a6384', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279375, ''),
('307b5f1a5ef60a01b8d50d56ba0853b2', '117.248.206.56', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458215636, ''),
('311bd4275e055db1575ff39ba1650f36', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455876293, ''),
('313877cb7df801a1b853b1c1fa862d5f', '1.39.86.222', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455513161, ''),
('315440672ba934b132e4b971a54d5b9f', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455873212, ''),
('31ab9536248a7a9410fa6c11764164b0', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455512986, ''),
('31d550a13f28ecb45b9c34e5cd688876', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455512923, ''),
('31e8716ddd1105ac5e89ed7a62fab9fb', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475555564, ''),
('31eb9fb6d7faf2c6fd7c81a27342a713', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456133930, ''),
('321ef35d26074fb9d724254f717621f7', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456133937, ''),
('324ba99fcb2d51f686350b280738cdbe', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475566011, ''),
('326e238fd88af0476ee3e750ef40c8a2', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455351518, ''),
('32a414ae36a9f9876d0d480b41da5cbd', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455881250, ''),
('32b3f48c755183aa8827b5f5fda2f134', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458825967, ''),
('32c40b2b5fae018988e802739f900ef7', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879592, ''),
('32d49b1bb7c47f47a460a2156fc5a95a', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463389830, ''),
('3388a14a028ad83031c3bd8b60e65b17', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872071, ''),
('3390caf7f0ac55d195bdf69d04223e9a', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455340707, ''),
('33af38a7885ddc44b4d840159c1484c6', '1.39.12.80', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458636607, ''),
('33ecca994924f8eff4b05a6f55aa0791', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1452140337, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:34;}}'),
('33edfbe9db0cb28c556b111daad4d62e', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458537807, ''),
('3471a18cdfc8710b9fdc53268298fc08', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455353412, ''),
('3481016f35f217a2c569745774ebd586', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456899311, ''),
('3482e3d8bc9d1071aad108660ffb53d3', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455347083, ''),
('34a94040de5b0e948490fd4d5272c9ba', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878500, ''),
('350b976042c1d388a585ae3d3ba963fd', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455869612, ''),
('354e310e5c63ef1a8c019e80693394ee', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475581374, ''),
('355c995d4d21bc0a03c6badb419450c8', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455361329, ''),
('35db30f33e6a0ac1ea2078b95b6d7298', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463727159, ''),
('35e0a77007ee5f24a9d6b775d3529722', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455368479, ''),
('35f61d6c56ebeed2aa9464a8813b542d', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455279983, ''),
('362b2ed1bad7b0e453484d8c16953f5c', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458537698, ''),
('369338f325e1a3965a39a847c34f37bb', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460192460, ''),
('370b85b0d1a7fbd788c00b33ac6a89f2', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455342577, ''),
('372017c3f9d4840aa8c7bfd3b3b92c8e', '106.77.226.75', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1464245016, ''),
('3725b4f54d8395677e283edcb1724130', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458537432, ''),
('37f01e9e61ae8c5377546c88d8736265', '1.39.87.75', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458283742, ''),
('37fc1b1eeace67c1551db9ffff96b616', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460190979, ''),
('380d2c8807b7bbd3fd7d08c33447c769', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458290970, ''),
('38249be14f4471f828d3d7d1505f15bf', '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', 1453721335, 'a:3:{s:9:"user_data";s:0:"";s:14:"logged_in_user";s:11:"Super Admin";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:1;}}'),
('3825bc27103e9fcb622b5a5954ef0f91', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455356639, ''),
('384126e8d323d6e3f05b41d7c7fe4c4e', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463398616, ''),
('386361b35a03d531dbcc893d98a4f28b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458632707, ''),
('3888c5864e0712efcbe62edeb5724dba', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463395906, ''),
('3892f1154ce0c7fb14a67d1d37f83f65', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460373678, ''),
('38c719255dfc604b9684abe52df4de2f', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460192080, ''),
('38ea8ce1927202a870d650bdb5196d0c', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1471869492, ''),
('395647654932403cbeee1e449eceb8fb', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455364507, ''),
('395c18589b2bc9db03a4bad828af3b24', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463397372, ''),
('39b46dd420cc837d026da3856384a59c', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879623, ''),
('39d8e06909f2a66dd6b1f5e9cf8a304f', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458291677, ''),
('39da4674b30da4b3cbeb52803c1871cb', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463721732, ''),
('3a3970a9f9ec994d90be066def3fccc4', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455361026, ''),
('3a3dac17f8eab244221e2935346f06d7', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475566043, ''),
('3a75a6fdfacae287d9185150e20b73e8', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458537775, ''),
('3a8d7deee8e812c7d839e9beb6c0d201', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475497198, ''),
('3aa36bd0e9eb947b30cdc840047fabd7', '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', 1463390389, 'a:2:{s:9:"user_data";s:0:"";s:14:"logged_in_user";s:11:"Super Admin";}'),
('3ac848ac882c1dc0eb2c4b9df73660d4', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879547, ''),
('3b58787bf3477a6b71ebbc22dac76350', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475556092, ''),
('3b5ca2062933086c3b6cb168eee6b969', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456899291, ''),
('3b997f3f0fed5f1fb44b72195e674f50', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459834634, ''),
('3ba95dcdee2aaa598dc1e3b438e90671', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455874482, ''),
('3bb0ed374beddf6dd039cf91cbffb805', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459320277, ''),
('3bb38f369415b673bcb64674954f1a7a', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460192076, ''),
('3bc348792c9075463e4c49805f4a9cfd', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455863043, ''),
('3bd5d468ad54f292e94b4d82d5250eb8', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475566080, ''),
('3bf44e7a77fb5203170c7284657aecb2', '106.77.195.17', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279772, '');
INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('3c5d7d462fa304bcfe0e218f26011712', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455873368, ''),
('3c6927a6d9b3f7e18d73fab2be460d5b', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475833909, ''),
('3c906a3daf6228828ff03e48d32c6264', '106.77.78.66', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1457441953, ''),
('3c97e42c093195727725d8ab1a6d18bc', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475836928, ''),
('3cb6bbd7e9c53b5a9f09862673afb87a', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475581232, ''),
('3cc130b91fde43b54a9721435d50975e', '49.15.19.119', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458462396, ''),
('3cf01b1b4e2eba7c3cf241c78f2daf64', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279351, ''),
('3d1fcf7ee24880c516ece7e6cb5dc664', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455877839, ''),
('3d5a5b7750e79d7c0722b5989bfa5ab9', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455281633, ''),
('3d6987e68fc139dad9208f22ca865be6', '40.78.146.128', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1453966489, ''),
('3d95e5c7656a438666074a7a27c0e46e', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459831197, ''),
('3dc1292ee51541a880cdc1e7bcccd510', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879959, ''),
('3dca392e6685effd25b22f7eb4f47c9b', '172.16.16.24', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451557986, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:8;}}'),
('3e4759c2dbfb5c42f84077fd3d891ff5', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458290264, ''),
('3e77e387e1195b5d675537eb12c92eb8', '1.39.12.80', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458636678, ''),
('3e83f8ad66b6f1cdada5289c1e459e25', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878289, ''),
('3e99c353866f459b79d3899d1647ff75', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456899240, ''),
('3eba03c5ea12ddcf610334a42b39c807', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879882, ''),
('3ebd86ae6b013de2411ad4af91453246', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878509, ''),
('3ecf1171ef1c6b2fabdeca970e3c53c1', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460190822, ''),
('3ecf9dfa14ddcf964e40590ff6d2838d', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475581271, ''),
('3f226828835cf37f3dd57bab91bb3913', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455877620, ''),
('3f68572806c702b4dc05ebc836f18558', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1452062487, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:29;}}'),
('3f7905db391f28ab56639e78965aaf49', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879227, ''),
('3f958e827e1ba6daf1ee8c036f0d4e9e', '1.39.13.206', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458303791, ''),
('3fecbd41538bcae93eb02b23a306353c', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458825981, ''),
('3ffb044e7f2a28659f1223be01f5d984', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455862491, ''),
('403bffc9917ae9173004262c4604f46a', '1.39.86.222', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455513195, ''),
('405e91636ffabbf6094eb8d3b7977a8f', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872234, ''),
('407b61ea429ac65e329b4871be45eaa3', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880129, ''),
('40919584009b86255fd4b5748a106609', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455787537, ''),
('40e80a733c4dd626fe29f35ac4d256b6', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460192608, ''),
('40eb020cd954cf0660be88c08f6687dc', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460179631, ''),
('41095a72163d953a47fe3c7cd740fc93', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463397215, ''),
('414ff2d0aef6236e1889e39662fdac94', '23.101.61.176', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1458305933, ''),
('41a4793d459547da0fa7851d9add64a6', '117.248.206.56', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458215589, ''),
('41a9469b20bf132102e57bdd03269f2d', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458291434, ''),
('41d069f35828d400f77ef7b644f2ee16', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880322, ''),
('41f75a627c6555373a8d3e207f2ca98f', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1471869485, ''),
('4218ce20aaa2c87169185e389e05a3b5', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463396051, ''),
('421bd9a110302580ca7920f04c602612', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456133927, ''),
('4285d7e429d0a8e93557983d40b5f929', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475581213, ''),
('42eb3a05292acdf4549fb3c5d862f234', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451734121, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:20;}}'),
('42f6c663076a1e605f76fa975f640191', '106.77.195.17', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279044, ''),
('432478074e4fcb35ad5d56f9ffb560b9', '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36', 1460191127, 'a:1:{s:9:"user_data";s:0:"";}'),
('4357714856182571f1efefa1009522b5', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463392409, ''),
('437738926acf9df625bfdeaff49d0068', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455871614, ''),
('437c0da1202e299c65e38764aa9af823', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463388461, ''),
('43b61582c07a42d46e2c9ec99b56a81a', '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36', 1455184162, ''),
('43f39f15ec98f9d4ffeb1f77e62a2bb1', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455875258, ''),
('43fcf7d1e822d2a7d638de2f82b97440', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460179546, ''),
('440f2ff5b3edda998fbb1d4231baabcb', '106.79.111.85', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458035484, ''),
('44147a313b2ef98acc1eaf27120610c5', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455882137, ''),
('44279307202e97807795118be7163ef2', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460192078, ''),
('443d03eabc606bbe3cc769be8cdf4e80', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463722116, ''),
('444fa8b448c23dfc8d31ca9bbe90e8fb', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455871356, ''),
('4451e191de6f56e6467bcb13bea1c012', '117.248.206.56', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458215811, ''),
('4494388fa578753e674c854faa36fc76', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451993254, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:28;}}'),
('449a581a411cd00281e8406b183ef275', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458283636, ''),
('44a33a1700967116adb0926b9208205b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458282027, ''),
('44aacc00d0ab9b176b8035cdcbd6c1a6', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872306, ''),
('44ec58e401783f14ac142d7d8457ea48', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880659, ''),
('44fc41b6d83ea08895a470f534b0315f', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460179645, ''),
('454e34602070bf011c9d845ba061d79f', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475556085, ''),
('459d85dade6b4f78283f43fedfeb6be9', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879892, ''),
('465fd9dde0d56728d6a65d49cac8a33f', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475581334, ''),
('46691b1178e6ff48d04787705f65216c', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872157, ''),
('4679d2db368632045f5008531570bd4c', '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', 1454143808, ''),
('46c9ec63e25c3ddeccdaae05017bf088', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458290050, ''),
('472997e048e084b26409ffe7c8ceb101', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458537435, ''),
('473a068652d9a39541c319234a249203', '23.101.61.176', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1459831701, ''),
('47496a9f08bc9a64160e1420f922fc11', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459834605, ''),
('4782d5f633aad4d961b8ce9a976ded20', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455874305, ''),
('478ef26e8c5fe881ef01813f16b67485', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475494276, ''),
('47a09f12d444cb2f665745533825a332', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878430, ''),
('47d8be649b8da489fef1573cadf7705b', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475556038, ''),
('48064aaa9c78f0abb74ea37e330f7413', '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.1; rv:49.0) Gecko/20100101 Firefox/49.0', 1475498043, ''),
('484988e21094505b61c2c92590f7f98f', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455361089, ''),
('4850c0bfe50386af3223f9bad2f8a9e4', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475556052, ''),
('487de2b0cd678d28857e31a465e480eb', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455870808, ''),
('48832a53b319a2c0bb1a889ecac4a1e3', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458288733, ''),
('4887a721df11cb6cf90184e3637b3440', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463390231, ''),
('48ec2fb07c15478cd34e818f1b9d3666', '103.206.210.50', 'Mozilla/5.0 (Linux; Android 5.1.1; C6902 Build/14.6.A.1.236) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.105', 1460191537, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:33;}}'),
('48f54fc53f234b942310327c5112f7f5', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455342848, ''),
('4916ebf361acb8405bd2c69accf29f2c', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463720502, ''),
('49464753880384e308145f025033e541', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455963529, ''),
('498f5c971786917241ebc00780d409ea', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455359601, ''),
('49a803287c4d4e9a6f95a3281ff2c299', '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36', 1455865351, ''),
('49aa3e44b8beaeb05aa7df9ee50cf662', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455359577, ''),
('49eab79a8026d026dd98f4963f19713e', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460179519, ''),
('49f9854d3965b9fb13c3dc2e410b5019', '40.78.146.128', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1453966483, ''),
('4a32060c688a76d34816f0033e24b4c6', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455876370, ''),
('4a5ff881e717aa89f1b5953161a0feda', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878502, ''),
('4a86edff0d8ee7e77a7f7fcae4fcc50a', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458290973, ''),
('4a92d28ba8af425356c82679af294ab6', '66.249.85.194', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1459835034, ''),
('4b0e5f28a80327f81792886db049ff35', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458537221, ''),
('4b114e60d30614fd944bb2c5a35d9db6', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460190820, ''),
('4b15c66d6d86bf5417d61b5c9b6ac395', '1.39.98.62', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455883090, ''),
('4b19a5e4191ecd849a1e976db9a4fb13', '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', 1455181255, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:2;}}'),
('4b5339ca7a963c7c265ced72c0407427', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455345027, ''),
('4b593b7080652dd811059f920b5d7c42', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455512920, ''),
('4b7d111b50a87e8e435aa48799345082', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455368483, ''),
('4b7d1219afb4949377c8aab4b2abc0e3', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455877605, ''),
('4b8dcc14ed37c09e891d6cca3d09ea27', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458538325, ''),
('4bd75d775c49c3c14539cb5821d5894b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879445, ''),
('4bf89703f8ab49d6699a5c0c4af15d71', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458291449, ''),
('4bfff7d473f45eead4f0bacf94493b26', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455863875, ''),
('4c0dcbd5ed6e066dab7935a8fdde956a', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463396831, ''),
('4c328e1594d312d22c2c939a6e2d1fbe', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460192087, ''),
('4c446b2d2f90e89afe5a1be3cf8b1b76', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455865263, ''),
('4c7bff6b37f33aa94536720655d23ee8', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455876331, ''),
('4cb894bf8623cdee475cdff363d72aa1', '66.249.85.191', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1460609831, ''),
('4d2441ad49eba04e8d382cfeb5407de3', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455369266, ''),
('4d7358b9e5d044a4e8b6ccc9ab21cd25', '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36', 1458291346, 'a:1:{s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:25;}}'),
('4d836cc1d4737e0436afb13121993a7a', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455873151, ''),
('4d9a724e4a68aaadf5ccce4e17b70105', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456142909, ''),
('4db6ee8a68b51c9353deb723d6b35954', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455356335, ''),
('4e2df4bcb8ab32c557922f0cb99cb9f4', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878564, ''),
('4e2df8aa35edf5ca44fa649844096c3f', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455863665, ''),
('4e39d0f03ad7dc359f6b695919a134c4', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455863694, ''),
('4e5dd25b0edadcf99c5a8cb248f1c029', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455881345, ''),
('4e6ef0e5ce82051736472f15d3abdc6b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455863178, ''),
('4e78c316899283c9cbe327cf4f372796', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475581383, ''),
('4e7a8333a2382fe1f1b972b88386dfa2', '1.39.87.75', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458283793, ''),
('4e925c434c0f5680cc15a3042cd33356', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459831459, ''),
('4e9602f7486fe793030c4f3a7637cd68', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455870672, ''),
('4e97601a59eb5a50c91d1385082342f7', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455512882, ''),
('4ecee62dd811e4627cf62b022d79a0fb', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463727927, ''),
('4ee61329d935f6a42dc82152c87df07d', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459831375, ''),
('4effe9290f4f261830fab66ea3a076ac', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458537452, ''),
('4f08ab2cdc621add6fb7f93dd76107ab', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475555772, ''),
('4f12a8cdaab834cfb36ced202eae1e15', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455870810, ''),
('4f34cc20df175e5b4549040849d09cb1', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475557500, ''),
('4f39be31844e27c09e025e0606fb252c', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463387874, ''),
('4ff93f19a5e10d5bcc091e2f3ef464d6', '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36', 1455282996, ''),
('500bb544d3617141f18aaef9ddce6593', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879551, ''),
('50522a933b815a33f82abd6ef5292965', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455368508, ''),
('50796a693433c9d5ff2ac58ce1640f86', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458537611, ''),
('50cd6b7445a8887360cb0aa8509a898d', '66.249.84.166', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1459922732, ''),
('51266b9b337f6bab2bfc405fe77a6d07', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880620, ''),
('51314d0471a9281114a88f3c18e2e125', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455512987, ''),
('51a88ef525980b7854e0d252332dddae', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463720479, ''),
('5240ce7c6fbe3951599c265315d9a18d', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456899265, ''),
('5248b460d6d01bd57b445b221566a06d', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455369284, ''),
('525fc2e2585916585f17c7ba6b413d92', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872646, ''),
('52794dc9c623049f739f8ccc341d6960', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475566006, ''),
('52ae309ce0f09291067ca0e386fca55b', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451647705, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:18;}}'),
('530d7df44020a54b3d91c1aa384ce153', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456899300, ''),
('53c08279459ad483d19dd3cfa90604d8', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455865265, ''),
('545b574575a86da03898640a12936d04', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455870712, ''),
('54674eca89fdd18a4de45962be695bfd', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475836953, ''),
('54893391eb22be48419566a1f739cf89', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458291438, ''),
('54a180f175db33738492f99d1d9046cd', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458285229, ''),
('54e56559d5af9b2e5f0bb4dc6c49d1a3', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455282733, ''),
('550538b4e9e6fc70dc2985bf37bc73fa', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463720516, ''),
('5558a81beea25afd5dc6fa1046ab225a', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455869938, ''),
('56120dc5c091958dab349bf46f9806fa', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455512807, ''),
('568bd700059b88d9e3dbc4b206fb0ef1', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463722103, ''),
('572a425b14480434a063307eb860b359', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455279808, ''),
('57609874bffce8274ef4c82bb26001e6', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459834611, ''),
('582dc4678657c323fc90ab650d30f7fe', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451881965, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:21;}}'),
('5867fa8bcd61b532e121a82c072be43f', '13.76.241.210', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1476247817, ''),
('5909af8b0b3d5091f8b5ea9ed464d929', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475555729, ''),
('590dc5af6208ae4d41dea00ecdfd4f75', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455512917, ''),
('593dae93a8f5d6a998e4372dfcbfaea9', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463727180, ''),
('597c5cd8a1ac3849a2710ad98806ac74', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451968196, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:25;}}'),
('599bf0875ada3a937cdd2998c39755ab', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455368480, ''),
('59aaae9c78b24a29617d765c7d44fc3e', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455356532, ''),
('5a343a7a298a802204d6c1ed99582154', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455871610, ''),
('5a701769d199a9e3b0c89e9b9fc2c7bf', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879231, ''),
('5a7563b7e915d5b2735f79930738b96a', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458537470, ''),
('5a9a3f1a5b5a63c73d943759cc73703d', '66.249.85.194', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1458292200, ''),
('5aa03995c0d759644c17bdf8cbade845', '1.39.12.80', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458636574, ''),
('5aa3152e035be4a2e2c2bdb29a775a29', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458290899, ''),
('5adcc2c93ed15654d8294a6f847e9f76', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460191797, ''),
('5b5ed63a9348b3a7ef6f45230942bfbe', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872829, ''),
('5b7ee1522f5214a5fd65e69abfaf9aba', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460179356, ''),
('5bad288cdf25ae53ce06908c5dcc4577', '66.249.84.236', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1460354325, ''),
('5bc7f79fd4d53d2da6bfdef70bb31f2d', '104.209.188.207', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1454065361, ''),
('5c00a85ce7d96dfa88fd2452bc88233d', '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36', 1455874686, ''),
('5c1ac6b89a76cf896105ef1c47ab7fb8', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455342313, ''),
('5c9e223276cd6eaf716f51f4eed606d6', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460190916, ''),
('5d28dbfee0180eee4bb6dd39f738089c', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455342483, ''),
('5d43d962090e89c18cebfe4c103cd1b9', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872948, ''),
('5d9a53888d1b9f1dc795089159926ed5', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475555722, ''),
('5da8774f3aedc7d86f4b2f86b712c014', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455278092, ''),
('5dac41467413949ee2c9b1f77067d6c4', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458537799, ''),
('5dc56429785a79d0e75d8062e5f1c755', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455511405, ''),
('5dd1a4d09a60284e20d0551fc916ca8d', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455787527, ''),
('5de8906a8056c99d028aadea81d32a51', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880439, ''),
('5dfb4cdd17c2843a50e9c415aa43ee88', '40.78.146.128', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1453966476, ''),
('5e1173ee3f811d42145eee9d53d43c83', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455876256, ''),
('5e1e30d126505aa9c683a8de81e7e5bf', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455276189, ''),
('5e34d0ba087b868d2fa083168247ce02', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458632731, ''),
('5e34f6a777747fa400d1df27a1c98d7b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458290894, ''),
('5e426d7bf1359a44ce132bb43d5928eb', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463397723, ''),
('5e4492535c1434f09e0b07039e30cabd', '1.39.13.150', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458527713, ''),
('5e6db9f0a0d85d00f2cce7a40e98d022', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880100, ''),
('5e7843f812eb8723efec14190a2e16d6', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458538323, ''),
('5e8c05af034a2b40313172a027271e72', '172.16.16.53', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1476273884, ''),
('5e922dec448f5a4f41fd8c88abb557fe', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455874519, ''),
('5eac998577b9c24f31ac6d7daf9674ea', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463389697, ''),
('5f05fe8da573020753d9d4d77ef46e00', '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 1455863762, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:5;}}'),
('5f1117fceaae5bf297b43800fb30f765', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463390203, ''),
('5f22213a7de0878a260d3bff8bb09746', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455344717, ''),
('5f353329b833637df9eba3c299f4aaf6', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455870877, ''),
('5f583222caa60bb81d7049c00dc26ae6', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456899397, ''),
('5f9d62b75e88e5e99cd72bc862a025dc', '106.77.78.66', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1457441933, ''),
('5fac60c050a001fc765de4b66380fe95', '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', 1476790709, 'a:1:{s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:5:"admin";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:83;}}'),
('601a3756500216180f0cc62a1d824ab8', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463397334, ''),
('60a3716e60f4aa9c2650b5d66b7b76b6', '1.39.86.222', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455513284, ''),
('60bdac6b82173a9e2061f9a5e2381f00', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451710182, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:19;}}'),
('6117c8dea4104cd647d294f5798f2bb5', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455357325, ''),
('6131e7e744ca3f0d00734d0fa080df2d', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456899303, ''),
('61428c520e9b1e20a7d509782b7969da', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880503, ''),
('61431be5be1731a723887ed67e14c6d2', '117.248.206.56', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458215764, ''),
('6163a83ac7046351acb633610fbf3939', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475555525, ''),
('61a301f3dc436d3e9b712af4cc6aed03', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455865403, ''),
('61d6c7834b679931ab35041176591c04', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455356266, ''),
('61efb4cd741e5f9c967a84f74a510ec1', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455863099, ''),
('61fda1951c707bcfe347955fea87a374', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878515, ''),
('62535de4294149338e6b3c6d64c12a54', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451561389, 'a:4:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:13;}s:17:"logged_in_student";a:13:{s:8:"usercode";s:1:"3";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"3";s:4:"name";s:17:"manali harsh Shah";s:8:"username";s:6:"manali";s:7:"emailid";s:16:"manali@gmail.com";s:8:"mobileno";s:0:"";s:8:"phone_no";s:7:"7654345";s:5:"image";s:0:"";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:2;}s:21:"logged_in_school_user";a:13:{s:8:"usercode";s:1:"2";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"4";s:4:"name";s:3:"Dax";s:8:"username";s:3:"dax";s:7:"emailid";s:12:"dax@gmai.com";s:8:"mobileno";s:10:"9998578109";s:8:"phone_no";s:7:"1234567";s:5:"image";s:28:"user_1_1_329614Jellyfish.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"3";s:10:"login_code";i:5;}}'),
('625a990796103fb596245e3c7bc5f4c6', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455285164, ''),
('625bc63c4e2de1f9389f85b3ddef3c5b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455865277, ''),
('626770151308b3fdf510db614273922f', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475581192, ''),
('626dabdae53297b3b686c177b6ef05fc', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460438930, ''),
('62844a96f969ff349c6c30a0b7eb24d6', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458825968, ''),
('62a47073d7d2c14663fcff69074b935b', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459320250, ''),
('62cac94c7e1b11f9a777c34730f1b2f4', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455875395, ''),
('62e65d2ee13709ae46ff32e16536d2d3', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475833886, ''),
('63170e6951a180d042a5910c0d0bf2c1', '40.78.146.128', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1453966489, ''),
('6388662d0eb9da6e8692570b88815008', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455876770, ''),
('63a873a14c1fe6946fd6658ce8d41674', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872240, ''),
('63bb28a9e2122ec544decc6eed85806c', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455357426, ''),
('63ee3130f89398ff28f1b7d0942fbd40', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458288972, ''),
('63ef19905ebedc43caa1fceea69b731f', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455347044, ''),
('640e8bbd3ccadfe6f7e2ce4d7bc51a92', '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', 1476779831, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:5:"admin";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:78;}}'),
('641d1243124b584693cb559ccbe527d6', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458537418, ''),
('641f492275112753b77664f0d3dfe314', '1.39.86.222', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455513212, ''),
('64310e5171dfc19b661cfc13addff0dc', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455340480, ''),
('6474ceecbc9cdbe4bd71b0fa62adfec7', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455512928, ''),
('64a7fce490b27b6810956468422cdad1', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455877893, ''),
('64dc1a17147fd67783bc7ac130d53464', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455863706, ''),
('64f6d2dc58f001d94380e97c084c17a1', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475581335, ''),
('64f8d7090343b8ddacc806da5604ece9', '1.39.99.107', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455963461, ''),
('656c5697bc847ee03a403de796b13773', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475566108, ''),
('65c108c85939edc4ab1424db137681e0', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458632712, ''),
('65c19a2c369d88a2ee00c2a2ca5e51b2', '106.77.195.17', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279351, ''),
('65c48d4277d3c45badf8f66c66bd0078', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455871943, ''),
('65e9751c04d6673b5087a0d376b3c5a5', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456900414, ''),
('65fc6fbda33bba017dae1dd1b1bffdb0', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455870096, ''),
('66266adbe472eaa47c6dced47a251b31', '106.77.195.17', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279524, ''),
('66776c8db7462e0d868d0fe63e76eef9', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455877715, ''),
('668525da41b5bf3d4f8a94872294c65f', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455359544, ''),
('66c17ed34f92667342c2ba0c946ddcef', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475494220, ''),
('673310e41c13f6404491d20ee796a9b4', '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', 1463389300, 'a:1:{s:9:"user_data";s:0:"";}'),
('678bd6f109e49c7f0e3d5e350a65b676', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475581220, ''),
('67a2b811bc7dffd79f6c5894da992823', '40.78.146.128', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1453966484, ''),
('68049abf902231f3b458c3417297d9ed', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458282230, ''),
('685d1e70765dee7cd6ccaa3ccdebd7b7', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475581353, ''),
('686e512ed4ea1ffe720783e8fd62bcbe', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455869941, ''),
('6881b75e9486ef6b4957a3383b53ab37', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463396928, ''),
('688200327d04e835145078074a930204', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458537442, ''),
('689e17bbb0315f98bf059a7b56673acc', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455512872, ''),
('68f76644c4c4888a43713181c9fa72d0', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459235324, ''),
('692732dbe68d43a08ddcfccf71fc4aca', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455257401, ''),
('693dcd18262d2aad4697a88bf75ce913', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455351534, ''),
('69ae2191ab8c1f2fe4b6bd6b695869d8', '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36', 1455356239, ''),
('69e1fcc67057346af726f0e94744c79d', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455353402, ''),
('6a174c9155e89a894e6f27e1f181603d', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475834046, ''),
('6a2366e77e21fce869df8223e29170a6', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458291444, ''),
('6a53a104b22a28a0652a0c0605b20b81', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455870868, ''),
('6a53c278d8e6c5c6b5ca6d2d90eedf25', '106.77.195.17', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279637, ''),
('6aa784307c425d7cb4c7e57f532af8a1', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475494268, ''),
('6acaf5aeef67c2fd7e3f7e127730d725', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456900571, ''),
('6b122f5e2a61749c55000f581043de87', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456900644, ''),
('6b3ab517d29e839ed060ca13ed920d67', '1.39.86.222', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455513209, ''),
('6b5b2b1adfc6fe32b3bd82a0f845c8da', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455877837, ''),
('6b61d934f205f95e789a477a91088069', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456899342, ''),
('6b72c8e226218f7a774a60886a4c02c1', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455342574, ''),
('6b901c09ed60fc5b23f29b941bd49e43', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455283353, ''),
('6ba849ed43a5e59cc3c65f21a7607c5c', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455882158, ''),
('6bab8ed9824c79c875db6ad60442c5f2', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456900432, ''),
('6beb6f87b28a906fbc2a1d29df7ef4f8', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880586, ''),
('6c29566e3a74f213f163e9500b35d614', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872104, ''),
('6c318c905630a710a8d101bf978f79b6', '106.77.78.66', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1457441959, ''),
('6cb2ead262cff87e7eb6638560fde80a', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451884200, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:22;}}'),
('6cc2b1b5b217f18f1aac3509e04bbad0', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880605, ''),
('6ce7eb5abb2999bccdc34cc394e75d30', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458536828, ''),
('6d0807b941f877bfe7b34e9fde2fc71e', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872142, ''),
('6d750626fc245fb051db42fa7e98661b', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463720934, ''),
('6dcb3f0999195269a9e8a0cedaa159da', '1.39.86.222', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455513206, ''),
('6e05c48edeffb9720ee874d4b64a91cb', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880283, ''),
('6e21b9d17ef2e7bd9b1fe0e7f9aae926', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475555666, ''),
('6e21f34c0f1d1cd0eb7f0c657ef12d12', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455368614, ''),
('6e3e5220b6a5ed40b24018a44fbec205', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455367771, ''),
('6e52364f7e5607db9af7663649eb8824', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458288973, ''),
('6e8063d75e0fbdc5cefc63da69c13f87', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458290261, ''),
('6ea796c48c97bbded56cd48ea3cbe99b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455343043, ''),
('6f7a74a620bbfd753c1e034dc3112009', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872295, ''),
('6fdd4e3e0237faf45969cc0fe99156fc', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455787518, ''),
('70259051af22696367151a5c5ea460b4', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455511913, ''),
('70408a2bd50c42b1d74ca3f9bf16599c', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880281, ''),
('706b27d460f0012cc7c1ab9b362ccb78', '66.249.85.188', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1460435285, ''),
('706dae0e430cf19a3ff3127ab9d1f413', '66.249.85.194', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1460090723, ''),
('70e3a684190bc2d3487f48d56274ab14', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880676, ''),
('70f7b7aa8d6b71c1cc5de48abcb83e95', '172.16.16.20', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2612.0 Safari/537.36', 1452056549, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:33;}}'),
('71074fe2db69f7ffb68408f2964f8170', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455279743, ''),
('714a28454ba3ceea443e7052b7c483ef', '1.39.86.222', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455513190, ''),
('716626a2e40c6b8e00df3e2c0ac3555f', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463389974, ''),
('7181de7b4cd070ba5a0c224eee20ad44', '172.16.16.53', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1476273879, ''),
('71c12b4e7fce31d353a2dfde96c8f975', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460191795, ''),
('71ee9498911098f9b386baeaa5ca63cd', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475555700, ''),
('71f4cc3ca81a2e04630c5a3e9889b83a', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475836931, ''),
('720054579f85141dc358bda01c03d08d', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455342513, ''),
('7234474b4c8bd50ac36c682227250f24', '172.16.16.53', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1476274128, ''),
('725f21eea15a34674224626b8bcd60c4', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455368603, ''),
('726747711eabc47c156abedbe14a66ce', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878101, ''),
('7293e0a3a029b563f417d612866f71a2', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460438750, ''),
('729a3412b1328a97af33d6139393b649', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455871661, ''),
('72c93c612025e6a6bec2b484401e4467', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455876326, ''),
('72e7d41d2a87098b3d539a3a7e3242a8', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475558084, ''),
('72f056a269e18baf7ec5e68ffabb4628', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879446, ''),
('73202ffc833e1c1476458d56a5dfcffe', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458285231, ''),
('73238ec0eb2db6a4598442a6c360be71', '106.77.195.17', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279744, ''),
('7338d2db4c4be20a020e4b523530f7f7', '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36', 1455355192, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:4;}}'),
('734e8ca0944cec3bdb65173409876d74', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455353392, ''),
('734eff6b441b173cec19b42242d32a5d', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455873539, ''),
('739699ee6567ebf0c0230c82f4dce25a', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455871610, ''),
('73998733c8ef71e303393015bacfe2f7', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458192866, ''),
('73ba2d858f300319b8d630ba9da62ade', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880762, ''),
('73c381ed6d445b681bdbe0b7d7c1b391', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455369302, ''),
('73f903b9f83925de2668e6c956738a03', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456899368, ''),
('740acb0498cf2c91ab6294c1440dc176', '172.16.16.24', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451558428, ''),
('747805a6b59ee885e54d529dec3c10d2', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880508, ''),
('7488601e39b24dc389c6b5f892ad1e2e', '103.206.210.50', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36', 1459833512, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:27;}}'),
('7506bf1857ebd4eac55390c099015bc0', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455342733, ''),
('753550700de7586c735cfdb5531843b9', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459831384, ''),
('75883a77b19ccee2ae9f3c7ab90fb4d4', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455863258, '');
INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('75c76171e8ab96a65c2e58c6dfb54743', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455283103, ''),
('75ddbe9820919ef263d8bf3563952729', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458291391, ''),
('761ccacebefc9cba594e3f5aa325c092', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463397116, ''),
('76285abc4b7f1b436940a95533337119', '66.249.85.194', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1459694096, ''),
('765bbd97335dd5ba5d295eccf1a1aa97', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463398365, ''),
('7663919d0b5c3f580392a0e4d548d592', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455344986, ''),
('7673377b96ceafbed04de4b716ded441', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455282731, ''),
('767858a1d0b8f33f3be8928b4e5ad144', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455862456, ''),
('7681e06727cc4a849537752eb0444385', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455369291, ''),
('768429bcb3823592b60264c867ebc0dd', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463720931, ''),
('769431533ccc2b67cc3b2b24b6af87bb', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455279845, ''),
('769e43a9f3337f6e6be9101bb04c9d1b', '172.16.16.53', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1476273859, ''),
('76b73863e37d34cf617ff31a46c931cd', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459325841, ''),
('7709727d21b1b2001cb76d558f438f70', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455877814, ''),
('77334954cebbc51d4a59d3bf716aa241', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458290279, ''),
('773fc2cebe96e7aebf9405a07eb4cd7b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456900410, ''),
('774dccac9ffbde7fba96a0217e0b1a2c', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475497219, ''),
('777a17d0575f97cf862e0f6be57ceeab', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455369398, ''),
('77bce05b5e07c45ada37180029895221', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455279977, ''),
('77e4d90fc54dc43acde36d6603fa4505', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451974746, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:26;}}'),
('78120be8f093ed9ce7cda4f84a841f75', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878520, ''),
('788fe89f04781e8d10041c4483c8f271', '23.101.61.176', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1468655453, ''),
('78b6b8b147975b92cb5e4e6de0948718', '1.39.13.206', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458303759, ''),
('78dff706f92156e19373fe9df6a06650', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1471867508, ''),
('7910865093a5d6e521fef344163a190d', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463389896, ''),
('7915b88305361c24a0d1ebe2b87d40ba', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458291408, ''),
('794bb6cb87161bbd97d26b0d4b53f8af', '23.101.61.176', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1459831702, ''),
('798a83eb54e7d8be90b26531dcf824bb', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872117, ''),
('798bf76628ab94b671931dd81ea85c39', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455276187, ''),
('7a3aa3895464f6b054a40beaa9603146', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455862471, ''),
('7a4470a20220bbb1b88923086b88360e', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455343021, ''),
('7a780c04a7e84e02cdd109584cb41277', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463397558, ''),
('7aabce508b29f801ecd153fd38e6507c', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455282362, ''),
('7ae1c8bc945dcfba5ce82a5704f41e63', '66.249.85.188', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1458881789, ''),
('7af608ddd17f442231363b667e68eef1', '1.39.86.222', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455513204, ''),
('7b0b11500cb92f7946f338963ad22bae', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463397052, ''),
('7b127fa8a8e2973c90f7d02a3a31dcac', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475556050, ''),
('7b4584c124e29d924ab3797694e4cac9', '103.206.210.50', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 1468906242, 'a:2:{s:9:"user_data";s:0:"";s:14:"logged_in_user";s:11:"Super Admin";}'),
('7bb2e7c0be2968aa4cfe5c5ba6f2f729', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463395915, ''),
('7bba30409201898c4d970e1539fdaae5', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455257921, ''),
('7c199256cc1f5d5d92a7106324ca3b9d', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463398780, ''),
('7c230dbf534776d190cd4caa09898bd2', '66.249.85.194', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1460956485, ''),
('7c288ddadedfad3d2e4076a020414575', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455369443, ''),
('7c5f5cfe8c22318d89bf73ce4c9e0b88', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455342587, ''),
('7c6e59508a43023748d9d2b48ff6c11d', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455787619, ''),
('7cc4391218baccab4de0b3b2fd60fd1f', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455864336, ''),
('7d17d5895592a969b8d1c7f0454657e0', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455369285, ''),
('7d7c7a0cf8721926a7a219c1e8b18995', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459831403, ''),
('7da709ac2a566ac217c07e1d98e848d2', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879819, ''),
('7db30d6b7c81cbf30d26817fb9526244', '106.77.195.17', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279446, ''),
('7dee91f3404ca6aa56ab1d736b000d28', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880004, ''),
('7e013b9c4cb56b5398131a934ff895b2', '66.249.84.233', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1460109789, ''),
('7e03ffcd2ae363431c16eb542fabfd20', '66.249.84.165', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1459431997, ''),
('7e3e1941d3c2f45abbddaee5d8b74f3a', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475581196, ''),
('7e480994e3ed7a152a92fb8ebc4e2296', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455877635, ''),
('7e5b437ee88295bae75fc8e7072d0d1e', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463398837, ''),
('7e6aaecfa5523a4119391820b70b261b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455366396, ''),
('7e8407060004c22a543545ad213eca68', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455511309, ''),
('7f1fb2ce19e98b445feb8b41b87516f2', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455870864, ''),
('7f2837b6311eb07c1a51db2d06bac2ca', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455368610, ''),
('7f54d42fd2206311e44bcc538884860c', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456900424, ''),
('7f641847fdf25a22d53d8bbaffef7e86', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879549, ''),
('7f9742484b7f97ba23bfc688e863db12', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279430, ''),
('7fb7014b17b7689da183bf7703efb5bf', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458537454, ''),
('7fdd54d665af24f1e1359c883cba24de', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455369280, ''),
('7fe396938a9c56094ee3b32b94898057', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455877981, ''),
('8016f38eaeb2e680fe943a0fd09fb35f', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455881271, ''),
('802eef1e030f7c7b5f16590657b583a6', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455353388, ''),
('8033d61c4cf59fbff56ccaa818eaf29b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458281350, ''),
('803e1fa27291ba7ba04f4e7b45d2b0c0', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455285174, ''),
('808e66ebccfd08ff13bbb3109d7e550f', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458290308, ''),
('8107cb799d3988bfd0ddd7383159f6f1', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872229, ''),
('8188c459054e0576f03224a34dc12d2d', '117.248.206.56', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458215682, ''),
('81a85291491e61ef936717da1eecea80', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463389812, ''),
('81ee01e5b62e15a756e8a82ba3f3bf20', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459235461, ''),
('81fca3d36388dbd69ca08751165e63a8', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455865255, ''),
('8208f24375a7af1facca8ff76385baa2', '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', 1476782737, ''),
('822807e4dfbce940549e48eb70e566d9', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455877952, ''),
('82512acd592ccd647bf5da70f1eaa0df', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459834630, ''),
('82592ef34d6dc169e22d540d79ea81dc', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458280498, ''),
('8262fbb2fce8b4ef51caff7606913ffc', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455512926, ''),
('82662c45838c5a2d9c6b75c4c1c9a2e2', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880742, ''),
('8271b8ddd52838adf0017c82e844b71e', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455283100, ''),
('82a3230d1dba3665727109a6e8391e21', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463720633, ''),
('831fd9b1a7a9ab115d80918be0c98082', '1.39.12.80', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458636661, ''),
('832e36c5c7e07487f1b7a994f6e470f1', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455863307, ''),
('835ae3ec56035b6a7fcb5126516e6807', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463727925, ''),
('838fa90263075911aa8beec9c250c224', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460369176, ''),
('83978e636f654731d23b6030ca4bd7f0', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463390171, ''),
('8419a1a46f7330fdd9f2789c427a61f9', '66.249.85.194', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1458538636, ''),
('8471b9487d9d7a9df5b057490d44547a', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463392261, ''),
('848c39a282bbc8e7a71cbb962e6ed1b0', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455863046, ''),
('84c3ffad9636362f8b964ce74785c6b2', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475566068, ''),
('84c895f3902a61c9c21b456517ea1cbb', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455511398, ''),
('84cbe73e970c1ee51bf826c511b6298d', '117.248.206.56', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458215511, ''),
('84d3c7e519db47c9876cffdf95197bca', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475581356, ''),
('84ef1e461d22cc1943da7e2ac88bdb5c', '66.249.84.165', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1459922732, ''),
('85046cc48bc913a99a12bdb384e6133c', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279381, ''),
('854596a226c9b1bc085574b7dee3c9b7', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880611, ''),
('8569fa8c7981591d890137a938e6fb37', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456900570, ''),
('859f18b24f69777cd131f0be1f73f933', '103.240.206.5', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459498842, ''),
('85c2fb462ace6d27bbba4549328c1fce', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455265018, ''),
('85ea9f39ff6ca850809fd18c5b9e6818', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458192870, ''),
('8602044a5e8209e4c0d75d131cfe7ac1', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455361063, ''),
('862af7cf66e9f5694f4f631382db833d', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458646337, ''),
('863d6ef27325f740eccbdd47812e2e5d', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460369255, ''),
('869865cfc811e02e183b6a9917f1d648', '106.77.195.17', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279966, ''),
('86d0c1087bec3606c9238103607331e3', '1.39.86.222', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455513231, ''),
('86d7e482d572e7ca83a759986898f9bd', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455340285, ''),
('86e70442d5a553f289d037d74c77245f', '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', 1476779519, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:5:"admin";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:77;}}'),
('8713cef88b4f894dd358a79c7b017dc5', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451885460, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:23;}}'),
('874e6a72f0bad4ee1f753382e6e993b7', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460192467, ''),
('8787902e7e9343417475ac937431ca17', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455357331, ''),
('878c9e9a75badab04ac863f90fc44dbc', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463389964, ''),
('87aa999e823266e81022bd991ef8e7de', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456899274, ''),
('87f8e99ff062f0fec49c18ce5506e9fe', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455863311, ''),
('88109b6f8c38ded7bfbb6cdfc97962e1', '106.77.195.17', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279425, ''),
('888af7798dbed368ed81970044f78cde', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1452571399, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:38;}}'),
('88b289b5f801d50bd89c09eb3b68e76e', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458632747, ''),
('88bda9930a710749a3b74813a1bdf6ac', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880718, ''),
('88e6bb40b9af3f1037f6258ddfc3e337', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463390220, ''),
('88f181ca4e78c7990c618381081bd00f', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880514, ''),
('8908ab0eca7e77d848d8f6abdf27f763', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463398640, ''),
('8913a1adc5f2d733c6c5a4b2d64860e4', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455367801, ''),
('895b89fc605edd8535dcdd3ed9e0da44', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458537248, ''),
('897285304ba7fb5cbfebfe0ba285a24f', '66.249.84.233', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1460354326, ''),
('89785f1889a0ef77ad11de6d568a871e', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455359576, ''),
('89f037bcfac4acb81947367f5b4a4f57', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455369305, ''),
('8a10121eb456a3df85f0a5d01f09478a', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455865261, ''),
('8a4ba7d91c741cfef988915dbf5d052f', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459834464, ''),
('8a6dd2d377886791f798d4559a81c8eb', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460192035, ''),
('8ab3073aeba7fe41bd802cc7ef4cbaff', '66.249.84.103', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1458289078, ''),
('8ac3362d8555bb6ba00eabd71ffb6cac', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475565972, ''),
('8ac91524ccb95cf4a8fb57cb6b1cad65', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463390207, ''),
('8b1c2ceabccc443c589b517cf4c68671', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872831, ''),
('8b28d1f6b9ddf3915a49d2e3cf64421d', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279874, ''),
('8b960c2ff7c64dc6791de143c392ca76', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460192488, ''),
('8b99d2ae25e6ac36ce20aeb82b840c21', '40.78.146.128', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1453966477, ''),
('8bc3899d7955f62dae811ce37fa42236', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455864544, ''),
('8c70c752097c3953607f69d3956ae0fa', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463398832, ''),
('8c79264e243f96674d44bf073331c522', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455871589, ''),
('8cba819f5714eedf113bd813fbe27e7c', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463396196, ''),
('8cfbb09c63d29474d8a6ba1f21074eec', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455355810, ''),
('8d015b8a0fc2b943239bdd63f123bbd4', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455870739, ''),
('8d441e7f7e4335a82c53a2b6732e9e93', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455871423, ''),
('8d58600469d9893744647bc9d5dd92d9', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475581359, ''),
('8d6ce5ffe9bd94b81fd2d96a706f61a0', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460179656, ''),
('8d9886a16451bbb55c1ad126a0c69e86', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475581235, ''),
('8db96230c73cc4a4e8510ee2728252fb', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455877892, ''),
('8dbe356a133c2c3f8f8fa231a2809b68', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475836937, ''),
('8e26350585b3a52d16dec16a456af6a1', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455356437, ''),
('8e3aa034c13cfc8e4c4e5f29a3b92e7f', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879594, ''),
('8e4b973162475727c26ba5d6cf0634fc', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460179536, ''),
('8e5846fa0a712e1f6efb6e1b442c7b9f', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872268, ''),
('8e59f88d9ba122a8a8b45345f1cd7a07', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878083, ''),
('8e8bee2ad6257fd0e29fae76754d24cb', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', 1453179839, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:52;}}'),
('8f041d464b4b80abb16429e5259080eb', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463721573, ''),
('8f347ce67c283a491e411553e48acc43', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460191028, ''),
('8f398912cbbcac54d5ac2aa0ff96221a', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455279857, ''),
('8f4d40743194f16bce2f7ea32ab2a934', '49.15.19.119', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458462407, ''),
('8f513249ce274416db08ba1294b9396b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279421, ''),
('8f7d187f91306f282023fa23e6ea7881', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455361108, ''),
('900c55cd2cd1153afe54813c741a846c', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879895, ''),
('9058382870f9c5112bc34c5ed852540a', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455865245, ''),
('905e0e6968c98b9a088416ec17689769', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458282227, ''),
('9074814edce0123b285f196074585cbe', '1.39.86.222', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455513188, ''),
('90a3a8214ab00cd141871f86abe21d03', '212.71.239.15', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455864706, ''),
('90baf7dd3b3166fe8a673993bab40903', '66.249.85.188', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1460956486, ''),
('90bcf988c3381204255b09eed6baee2a', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463397556, ''),
('9146de6fb6e405d2d5d8cc27ae71a7e1', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458290113, ''),
('91c890c6eadb0f85dcf11b22e39ae194', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455877992, ''),
('92310e33f36fb6e638358e43742e505f', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475566089, ''),
('92541865d3434a40508165cee7fad4cf', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455361015, ''),
('92ac12d282e15c6b818443d77c1d80a2', '117.248.206.56', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458215613, ''),
('92ace323ad7e56f219a2f0e6137056f9', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455284417, ''),
('92bacf43a0579fbaca69593472e609bf', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455871993, ''),
('92f88b53774f950abc953377ef71035d', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463387850, ''),
('92fedfaea8737cc639a4a3b3a272d26d', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455863535, ''),
('93bb1fc6f75bacb8644cc557c68af13a', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880103, ''),
('94277a2cd40300346a692bc2ad1aee0c', '66.249.84.102', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1458640744, ''),
('94702b7bac7b40b73c1fcca621acf9a3', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463396014, ''),
('9476af7272b1eeb88a21df5be2e4ab42', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460192097, ''),
('9493ff18192b58cec25e99cd38b52816', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455863887, ''),
('94a4b2d5aae9a0afe8fb270ff3b23305', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880751, ''),
('94c62c29bc28b8788c08c149a46443b7', '106.77.78.66', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1457441964, ''),
('94e5f64ab49abe9d3d0d704de5a1edb4', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460192604, ''),
('94ee05f6c55ecb0112a2308d06e3b162', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463728954, ''),
('94f4e638b9eb5d78c1f399d8d22598a2', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880155, ''),
('9512a71770e8f902b726347019275b2a', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878120, ''),
('951eef625f323954ae5b5a65c4f26763', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459834657, ''),
('952e4b3b68e70522ba1982fb49d32e57', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879303, ''),
('95369f743367567c3fc1ef394c8f65a5', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455877576, ''),
('9546ed83f60619926a7906532fadd5a4', '1.39.96.45', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455181479, ''),
('95692720828343e2ab413d10a8af6afe', '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', 1476782737, ''),
('956ce202f82272705ec04dd3e8dd1d57', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463398630, ''),
('958567f09cd9a925570231f967a8eb7f', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460192635, ''),
('95aba5097782775890411e15aecc908f', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455865301, ''),
('95c87d2ad88a56cc243f3a3318284dce', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456900573, ''),
('95ff9fb4ef275e95983f60a3ad137969', '66.249.85.194', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1460435286, ''),
('9619601982b5e7a88f0e9e790a7a3852', '40.78.146.128', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1453966477, ''),
('961ed5727335bd4db07791af231769f1', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458290600, ''),
('96260918df7f3c336259ade1225548fc', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458289942, ''),
('9648e53e87de887fcdd29d76d75a07b8', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455368504, ''),
('96ec698760a8adb3e9af244578e1aec1', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455863458, ''),
('96f61060333a0682eeb080379ea5b7f3', '49.15.19.119', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458462395, ''),
('976cce6612b4bf9fa65e483e01cf798e', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880139, ''),
('9779b2917c52672dcf842faceba06397', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455511403, ''),
('978800e6c50cab9d39678d167e11d1e6', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455862473, ''),
('97c2bb5aa407d1dce6b1499680e28dd1', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455362313, ''),
('97db780137b3fe6b737c4654fab5145b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455369263, ''),
('97dee36e02d083e3dde8619905ecf0fd', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463397564, ''),
('97f80767877dfc10ce6b921bbdf9b9b5', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463397236, ''),
('9814d633eb4d39b038a1621a1d6a5b31', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455870313, ''),
('985dd47f712606306b2c24708020e07b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456900414, ''),
('9876ff00cfc18ef69b7d829325ee008f', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879719, ''),
('98c6b2a080b6ff737bede50120dcd4fc', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475581204, ''),
('98ca3028a03759988e06ff0d4f736ced', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455865267, ''),
('98cea0ebd39f4409f3376c012681dfe6', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460179349, ''),
('98cf6a01327d6141a98bb86c7462ba41', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455958597, ''),
('98f79e43e79e113725b9979a944193a2', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1471867521, ''),
('9925b50ee53e0e85590f570af2d499bc', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455863356, ''),
('993678bdce06d3e0145bdc833fbed378', '106.77.195.17', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279754, ''),
('994ffe26dd37154d4fdb77a2368e32ce', '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', 1476247873, ''),
('995e71a85ebf64b0638a4ab8bf359045', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279798, ''),
('998bace57d7c18edf97e5033e3810d99', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456550065, ''),
('99b1730641e327f172c059c007889516', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', 1453261857, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:53;}}'),
('99fb92cb5417e7e6d7481fe046194187', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880286, ''),
('9a2e1e8e652d2c7f19a5c401575366ab', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455283194, ''),
('9a364d55789dbc7de64f6f42041082c5', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455881241, ''),
('9a611e44287ec95875eda8340d0bd3f5', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455865302, ''),
('9abd972f632e8e9f709f98977c7869f9', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455863323, ''),
('9ac064be1b7af8eaa5117009c2f48b43', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455342733, ''),
('9ad3658dee4e12a440fa736315c93a68', '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36', 1455281837, ''),
('9ad4d89353561a6e3f23c0237302da72', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458538306, ''),
('9afd011217942610391b806178b48a5e', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459834467, ''),
('9b0cce9e6a34606979b2d5ba04eb660b', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463395902, ''),
('9b0f6a72a1804ca4c2c7f0bcb7457dd1', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456899352, ''),
('9b2d763352c09f9917980615d1f0512a', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455870603, ''),
('9b353652af75d34568894d7d90b7e89e', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880756, ''),
('9b40205240b292be132e7e6edea1277b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459235435, ''),
('9b785d28ad8ebcb84c89d452c5a9d454', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455875435, ''),
('9b84d6695bd6c557c1af705cb709ff0d', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463728965, ''),
('9b9c0c8cd0e0f592619ea083d6ce048f', '66.249.85.248', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1460523240, ''),
('9bb6902c5e599fe41a87460927215ffa', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458290092, ''),
('9bc985f8948b2b524ca708daea100c5c', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878562, ''),
('9be2d14f58805dd09cc94043b132640d', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879955, ''),
('9bedbec5b8780428be2fe824ab3da0ed', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', 1453348760, ''),
('9bf3d4aded420d6e26f791308d710c18', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458632767, ''),
('9c1faa2ccf02b21f8eea138867bc5f19', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475497213, ''),
('9c40da3719a18974e16508ef16621afd', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460438890, ''),
('9c6c8239e24aeea117ce8cafb1596077', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458280512, ''),
('9c75d34eabd78a39ca3a3b450ef70cd8', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455364503, ''),
('9c984a2ef7b42212b48c466783997290', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878082, ''),
('9cd2e263839279fa7a0d5adf75eddf92', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460192461, ''),
('9cf41509c296bb77b001dd4f2ec326dc', '23.101.61.176', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1468655453, ''),
('9d24c480c1eee8613e498222a2efbcbd', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878479, ''),
('9d509694f540302d0de2305f8fbb0843', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463398610, ''),
('9d7af235d447d51757a9bde2c54bb100', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475555519, ''),
('9db327035efbe5b6cf645c8c2cac71e0', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456899323, ''),
('9db68a4cb8254e54222cb598acc2c8df', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279862, ''),
('9dc04312338c6675fd71973d85927cc9', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455511401, ''),
('9dc8143df7698ae5f2ed4745f35d4169', '1.39.86.243', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279028, ''),
('9ddae500bf66a11214b380c622241cb7', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455359566, ''),
('9e018ec2d46560e8deb6490514edce8c', '40.78.146.128', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1453966487, ''),
('9e890555dd84f8c7aec3c376c8d839b2', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455512910, ''),
('9e8efee2a6897028e4433e966350da04', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460192082, ''),
('9ea42aa0a30c6f8d58084311dc93989e', '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', 1476273407, ''),
('9ea4ffad76a749072e4344cc50166ef0', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455877994, ''),
('9ec3e9922b0c8fa1a6c6bfffd1fb288e', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459834461, ''),
('9ed50dbeca06b03aa81f6876dd2e5e70', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475831439, ''),
('9edce334a9234e361177de3d84a083e9', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455281727, ''),
('9f231b0e2199c2a78692ca53a4abd990', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455882123, ''),
('9f7c8b0c8a7d2766ce2e7e266816f961', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475494284, ''),
('9f9af8650d68e7b182ba6789ad53a598', '103.206.210.50', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36', 1459839870, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:28;}}'),
('9fa26141ad267b90308429fc2682e6ab', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455342502, ''),
('9fa9b9235dd75f8f7bfdd62463c2ba96', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463389953, ''),
('9fc0a48ffc3cd90fcf42c316465d0dc7', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458538298, ''),
('9fd8c2adb0d8f42cf5ef5a8cf9a704f7', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879724, ''),
('a048f843cf9e24bab76636e0dfbb26e4', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458537225, ''),
('a0804f8590b3a3a17124ed2052c520ef', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455877950, ''),
('a0bf8ca70c78819c59b7b4a40930ec7b', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1452655751, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:42;}}'),
('a0dc81a3e96c7515be79138041b1d502', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455285145, ''),
('a0f7a91b6a368a7f6ec226870fd30fa4', '23.101.61.176', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1459831702, ''),
('a16e8ac0da622afe6b322c41d5efc1e3', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455283080, ''),
('a1cde789e84ab31c01548aa663ab69b8', '40.78.146.128', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1453966474, ''),
('a1e168717de0c9adc44cc4fdd102c619', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455862460, ''),
('a1e5e84b6a3dec66a3a76480333bce41', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455283349, ''),
('a255e2c0e4bd51319e892ac8b152241c', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', 1453548648, 'a:2:{s:9:"user_data";s:0:"";s:14:"logged_in_user";s:11:"Super Admin";}'),
('a2a90f4d477035565c1592ce70979ea8', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455356521, ''),
('a2ba9a8fc3d594807ef2e789111967b9', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459834637, ''),
('a2c6e19dcdc4287ed56153d2c547da2b', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455881282, ''),
('a31266b06e3f1e75f3c9a34240fcc1c8', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458290094, ''),
('a32ae5135a1a5e022ee455e59211911e', '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36', 1455368337, ''),
('a347462568cc5cef3d162d0ded09a3dd', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455873010, ''),
('a34d735406ad567215c786c722510ec9', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455869989, ''),
('a360dc5efc3753085ac308758b9a2ef0', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458291387, ''),
('a3ebb92a332d399a1fe7be5863def68d', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475580997, ''),
('a4304b05fffbcdb6211efa0ca3ea2afa', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455340188, ''),
('a44615501a505038d17f3cca90202076', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455368503, ''),
('a44768f719cc02e6c0dcd1fcb21f95f4', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455344836, ''),
('a455367c3e3a67b7e9b9f5d2954167ca', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458282230, ''),
('a49ec6084bdfbfc013a4e1d163cabdd0', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458290608, ''),
('a4c1267aa32d8821fd37a7085c55afbe', '106.79.76.130', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458282846, ''),
('a4d0571f2cf9c1c64feb8b5a51e944be', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880178, ''),
('a4eba94a0b40d5dd0be2fd5dcdde364e', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463397101, ''),
('a513190e94cb9437bd4aa299fda3d170', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456489550, ''),
('a51ec8d01ee9f4fc3be2876b2e51c4b5', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458537782, ''),
('a535a7ca9eae97f6b44c065e3dd1536d', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458537412, ''),
('a544828d8a9b0b1eddcc9d32f4d26e7d', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455873537, ''),
('a59a81ca2a5d7fbfed35b5e895f5d24e', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872328, ''),
('a606abf008e2f58b86a8005e1c005edf', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455340227, ''),
('a638372a7bb2b00f4d96cf6207500d0a', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458538298, ''),
('a63d0173793f6127a5630e5eac6e62b4', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460377656, ''),
('a685cfdc48de524fcd9932deb00812c9', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455882217, ''),
('a691497ae21410f6fce67de45a21c805', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458284153, ''),
('a69b1f0ee7095d15cf6ef8fd899fa478', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463729008, ''),
('a6a15a1085bcdeedd7052c87007f3ac8', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455873076, ''),
('a70322b911103c8ad3dc363a5460c5d9', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460192158, ''),
('a736fc1d87a1f0d635c797bf66f51406', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463390059, ''),
('a76ab6cc3d48d473c45c2dc8ff2b57a5', '1.39.13.206', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458303842, ''),
('a76c68617e32fddfb2771bfe83a99ec9', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455364512, ''),
('a777795f58eab386051a333621ed1986', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455863330, ''),
('a77bea9778fd2ca757b925fb17faa0c0', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455356423, ''),
('a7904c1ff03195edbec4ba63259b759e', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458537773, ''),
('a7ad9c261822262bd9a39034fa78264c', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463396895, ''),
('a7dbf1ee4f75689e334547ce14035d66', '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', 1476331355, ''),
('a8263db3c04f6c54479ed6d979aa3dfa', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455787521, ''),
('a834fa4a7e90b4046032dd90f325f69d', '172.16.16.20', 'Mozilla/5.0 (Windows NT 6.1; rv:43.0) Gecko/20100101 Firefox/43.0', 1452054003, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:30;}}'),
('a87a91f3da96c31f1b5a22b2a5699fe6', '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0', 1463396550, 'a:2:{s:9:"user_data";s:0:"";s:17:"logged_in_student";a:13:{s:8:"usercode";s:1:"3";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"3";s:4:"name";s:17:"manali harsh Shah";s:8:"username";s:6:"manali";s:7:"emailid";s:16:"manali@gmail.com";s:8:"mobileno";s:0:"";s:8:"phone_no";s:10:"7654345444";s:5:"image";s:0:"";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:55;}}'),
('a89e3f8465a8c6cce2450b6006ce6cbd', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458192893, ''),
('a8a34231a6cf49dbaf08c0b7c6c851de', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455870385, ''),
('a8b1d21a6ce4090137e9089657ec9e46', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460179622, ''),
('a8e898061058bccea2c5b81e8fcfde41', '40.78.146.128', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1453966474, ''),
('a8f7cf081726a459e0f3d937a5a13c91', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279731, ''),
('a9202a6956ac55ab6c3fe071e52888a6', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455512936, ''),
('a929418ab051342016c889bce9ba5db3', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463395928, ''),
('a92f6560bf8e597cc485ab0e7cc8ba78', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1471867506, ''),
('a94fc85f86bbed483a991a848215f77a', '66.249.85.191', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1459486800, ''),
('a95c7a8da8098927fe06f5691e710e51', '180.211.117.81', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36', 1455864236, ''),
('a9e7baac09a75f4f712a475f642ce7f5', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463720939, ''),
('aa035212c38747b7f240d41e6f940b3d', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455875107, ''),
('aa7d779b332ff4bcb5d28beae16a7c73', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460190818, ''),
('aaba8d9f6519f2ec378c52ca2d15e351', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455862467, ''),
('ab3b4505b7d5a455824fbdbb1df7bf3c', '106.77.195.17', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279680, ''),
('ab45c07bc0bd94e4804829eba212e258', '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36', 1457419049, ''),
('ab9ce5cb2728f4d87139879c05d1b027', '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', 1476274455, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:66;}}'),
('abc39122fd9080361fa0ac9cb1f260a7', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872974, ''),
('abd2ddb3b40c4b70b1db3c532d043e83', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455285094, ''),
('ac043cc643f4cb02805eff3a05b1f22b', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463399003, ''),
('ac0de4346cfe6c75bc522156bbe5e80c', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455871623, ''),
('ac6cff2d6d51778bebe7637b4fc725aa', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475581242, ''),
('ac71d2d1395c1aad11a54aa0732f119e', '172.16.16.53', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1476274123, ''),
('acaa32e2dff70721f031bcb91ce129d5', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455511407, ''),
('acba472338fec49387d400c7f5ed3f59', '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', 1476694898, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:5:"admin";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:73;}}'),
('accf64fc384a2e58f29b0a6328cc7bcf', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455353422, ''),
('ad110cdcc7ee7733108823e49d08eaee', '1.39.98.62', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455883088, ''),
('ad42bcef6713801b4168c606f74264ff', '117.248.206.146', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459593142, ''),
('ad82da9e2c729b9dcb1d7a488330b33b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455863738, ''),
('ad8ac827227adc769b0ba59cae75c8ad', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455512960, ''),
('ad97101eb958848b63f667bc38ff54c7', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463720938, ''),
('ad97d1cc0d4f09f9730fb155e365977c', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463721726, ''),
('ae36493a2a497983996ccd780ccc8d9c', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458537793, ''),
('ae56c5da70367b49b456f0dbc315c0a1', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879301, ''),
('ae941836f4c560cc431b882075194a44', '103.206.210.50', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', 1463393843, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"7";s:11:"master_code";s:1:"2";s:12:"user_type_id";s:1:"1";s:4:"name";s:28:"Arpita English medium school";s:8:"username";s:6:"arpita";s:7:"emailid";s:16:"arpita@gmail.com";s:8:"mobileno";s:10:"1234567890";s:8:"phone_no";s:0:"";s:5:"image";s:0:"";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:47;}}');
INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('aea5de77d60785e36edaf5210f2cef6c', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463720716, ''),
('aee5c5f30615c0c9468ce9af5b443f5c', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878045, ''),
('af09cf409241d68826d8349af9e254ad', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878423, ''),
('af5b01b217c6a5e8a558c4efe0e24a70', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463389674, ''),
('af91f4c56363840ce0a63e678bd08fe5', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455963511, ''),
('afbf16d926543aa30997e87ced2895cb', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872013, ''),
('afc195df10aea3a7c9e2af35960f79fa', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879625, ''),
('afcc3180a11ddb27f8021fe0bad8c0e5', '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', 1454065326, ''),
('afcf0da35e4c3de9b2cd9a3536574ed7', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455368606, ''),
('b0171b5a92c81dec80cda97fc6b7bf15', '117.248.206.56', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458215597, ''),
('b05af9120b7224e2cba29b9abf3d3887', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872826, ''),
('b09ed54d2daf81a6c413b9d48edb85b0', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455882222, ''),
('b10aa2677aef33f5ca88497e62cd679e', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455280294, ''),
('b14f250b9a136e7fc26527da78ed8abc', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458291412, ''),
('b1f20f78e945a0ca7f7156bc3ebd78a5', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460179523, ''),
('b2028d8847c5e9d398de796f26bdd992', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455873429, ''),
('b2400fda5cdf63701b9b0e0f2b2b30d6', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279805, ''),
('b2402dc134843aaa51c7908265d3f268', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455877712, ''),
('b27d09ab60610ff00b3b8f890a3b5036', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458288940, ''),
('b29c6383aec46c77fad37d0081c59372', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460179681, ''),
('b2ddc7d49ffd9c43058fcf008a2ab662', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463396210, ''),
('b2f31f16d4d7049c9b0b0ca652a9e49e', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455355566, ''),
('b32a4c92574481285d5367c86d7ec7eb', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878112, ''),
('b352ed9259ba0771ffdca28fc1b3dc9f', '117.248.206.56', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458215499, ''),
('b3bd94aee2b0eedfd4b0a9dceb23e699', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880147, ''),
('b3d3ce2e34aecc547d7a86d3449d756a', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455876620, ''),
('b3d76986074834068a5a18d96890c205', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455876037, ''),
('b3dd6208bc029e7fe16c0c6ecf097490', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455873051, ''),
('b3f9f8b3218c1f83fa6e4b4ea9e30bb9', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1452681458, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:43;}}'),
('b45d65d0f7fe5c9b45275a032ffae4b8', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458290001, ''),
('b461500a3c3f1e02261e5922b349e77c', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475836914, ''),
('b47bcd3be947375d8f719d3cce708f15', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455876397, ''),
('b48eb86920a60c4ff6fe6ebe1c2348c1', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455963490, ''),
('b50987c947c97d0c7c61c7ec3c7dd132', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455367769, ''),
('b54e3ce0683af0976768bc0c783a1230', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880642, ''),
('b5747274e0ad46a3b0bd48c0bf216d3f', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455863652, ''),
('b59840fc126e251a06fbe41038ca81b1', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463397335, ''),
('b59bfbb4f90669d5d7f8327602d0da91', '66.249.85.245', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1460523242, ''),
('b5c20f4cda399e13a97b8e559ea2ad8b', '40.78.146.128', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1453966481, ''),
('b5c7d3c724af4c8f2396b9c0b9a5685d', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458290903, ''),
('b62970abd6ee55c5a05da6f32440f3ac', '66.102.6.203', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko; Google Web Preview) Chrome/27.0.1453 Safari/537.3', 1459835033, ''),
('b62f1e03be3f45da78153f1c5af44796', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455356647, ''),
('b66b099ff80f98d8cd0a67f2ef64a9b4', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879334, ''),
('b6b2533f41192ea06b956ef991f0606a', '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36', 1460192113, 'a:1:{s:9:"user_data";s:0:"";}'),
('b6c5cd56617069c94a6135e6ca846f38', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458192873, ''),
('b6eb4e5fb7a81cbfc402e1d64802571f', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460373679, ''),
('b709f2b191825e34294f6ac4fe0fab3c', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463400107, ''),
('b712f529206824b074073958e37d0d1f', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455787543, ''),
('b72e7f0c97a64e7c418401a93046039e', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872232, ''),
('b73b70c2ac144e957db5fb08555763ba', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880259, ''),
('b7a836fce938135d3e267a9ef1013a1d', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475581379, ''),
('b7aaa28f7a4f26112e72dc4d1442dfc7', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463720920, ''),
('b7b305ceaf6580f66c00c97b80d87c40', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463727166, ''),
('b7bbc6f6831ccae8bcf91d5ff41ecb43', '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 1455883021, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:9;}}'),
('b7c3b9c562646e749c76fa22eca23631', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878489, ''),
('b809e3aefee11c6a213a473807a72924', '49.15.19.119', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458462380, ''),
('b81483bab0789c31d7dae058b919cddb', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1452595267, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:41;}}'),
('b847b96758fa3e4d6a2be07ec70a0375', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456899245, ''),
('b872fd5f360f6bb964b7912168cf5eb5', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458646334, ''),
('b8a237b41b5942fad0332f4ed7fbe69f', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879443, ''),
('b8cf01e2c5c99f557911bb766d594ee1', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458284084, ''),
('b90a08f452f1b8529db8d14b662a3e5d', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458537738, ''),
('b91c4276c213fcad4e333e0dc4b22d2f', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455368601, ''),
('b9b757d6ed45e4d6d9a11e6bfe1c25da', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475558093, ''),
('b9bd3dc5d5c658173c09e7c86d499160', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458284942, ''),
('b9f52878894683f9103701b21e35a65c', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458537777, ''),
('ba2fd38eebfc76b83842d5c113b39a75', '106.77.195.17', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279518, ''),
('ba3b6b4a2ab1cb4a11bf1b8ed596fe8e', '212.71.239.15', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455864735, ''),
('ba54f1f5aacb16b99dda0cbbeff38702', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455283079, ''),
('ba9b4c4b05fdb5613fdff0f86714532a', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460192157, ''),
('baf46e1bb5543cbb1b063d6fb445183a', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458291881, ''),
('bb255c4f96b50aa038fbba26bce6bb97', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456550070, ''),
('bb33d7e1b79c5fcee1ed0d8ac8e3627a', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463389825, ''),
('bb61c61d88bc6c0ca78918d5bf69b5d3', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455281752, ''),
('bb6a10ab066afcaee1a94cd0f309bedb', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455869990, ''),
('bb97666d4647c83c86f66c564ba0204c', '106.77.78.66', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1457441948, ''),
('bbbdeeec376376e2dddd3e51500e58a5', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458280975, ''),
('bbec34e4df06fe57c513096132bc436a', '103.240.206.5', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459498841, ''),
('bbf841ae74755593d682f0db30bdbb05', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458632698, ''),
('bc17d1cd2164b25c8327e2cb7e6f7c65', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455356342, ''),
('bc5b495739579ea85a4f5d7f281da6de', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455963522, ''),
('bc96b6f4567b1bcff82b97aae48aa426', '117.248.206.146', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459593153, ''),
('bca4bc0eba06c41e06bada73f8aa7f3d', '1.39.13.206', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458303868, ''),
('bd4ed6690a50cc58e0792ccb2b4882a2', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455278188, ''),
('bd5b1dfeb00e693cee50b58c0bd72491', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458537459, ''),
('bd667bef0d64f4ad91e3b542c94de065', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455362343, ''),
('bdb6c532bced53a16e1ba443d476c074', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458291396, ''),
('bdc53f60bdc52ad2b51aba32ae77c5e0', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475581239, ''),
('bdd99d2c3ef63cb3b72ea7fbb0071e2d', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455871286, ''),
('be0317268786a4e4e51369ed14424167', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455346981, ''),
('be22934a7044dd02b626687d2072aa45', '103.206.210.50', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36', 1475557873, ''),
('beb3e1fcb4bd6f6fab3a9c7a270d7738', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458537421, ''),
('bed0e7607decbcaba9eaa29c633655b4', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455877617, ''),
('bf66560f67f0ff303706e349d70f00b6', '23.101.61.176', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1454061681, ''),
('bf7fc950424af27f5f7315f7a9be9c12', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878518, ''),
('bf93e0b4b10b5fd13ef561e0a3fc09a7', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455787547, ''),
('bfa9591487a7ce9878b6634aa7b6d877', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460190932, ''),
('bfb164384c171ac31a7957b3f42b2c84', '1.39.96.45', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455181442, ''),
('bfbff0ca5b805ab98898f615c1ac406f', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463398773, ''),
('bfcc2bc799b447316add72e363700994', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463395971, ''),
('c02fba570cb9d75277436456c16f9c96', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879330, ''),
('c05daa8352642b6ed52b77b352894d31', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460190982, ''),
('c0ab7d0cf61c634b86ca3e97f7c6ce36', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455876879, ''),
('c0c78624230abf1bf28e672b1ab4b441', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455871452, ''),
('c0d70dd6542944036d7a78bbc372d893', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458280510, ''),
('c0e246683becbd31a529cd72c9ae65fe', '104.236.20.145', '0', 1454148554, ''),
('c105770a8b4e3dac365c2ddf5532d387', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458288891, ''),
('c10a6effc1345a4e6141a30ff97c2dc7', '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36', 1455367613, ''),
('c148a9669c4c5dee72f7b70eab95ea27', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', 1453107045, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:48;}}'),
('c1959b368b2f6da0bdf35a779112f125', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458290286, ''),
('c1b15bce2e4897af4d181492e31466ad', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878079, ''),
('c1d4d8c8a504947020d0eb62f862ab46', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458291668, ''),
('c1de4b350cdac7084093653c06823859', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455359484, ''),
('c23da6ed4b7c7f3fd08d098089a86917', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463727496, ''),
('c2851de3fd611d9728d1cc88dbcf558a', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455862462, ''),
('c2da85e85ba9e6f1068a7f3a4afcd0b4', '1.39.98.62', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455883112, ''),
('c2e134aa54ba515697c62d9728c69950', '106.77.78.66', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1457441950, ''),
('c31757aded03608941904a5df54b960d', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455340713, ''),
('c3455a14bd70ac9333f592f2b28c5f5b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880157, ''),
('c3476609f3638d634dd3b0ee337d5af5', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475581216, ''),
('c35c86b64925e0862c48ec4d171c7a34', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463727499, ''),
('c373703b7ec465aea9dab055c17796bc', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475566111, ''),
('c377490e528578adea5a6179464ec27f', '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:48.0) Gecko/20100101 Firefox/48.0', 1458279825, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:16;}}'),
('c378710b8fe7f21403b816ce52262b91', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455367553, ''),
('c3fd5647d788194f2bfd76292b20f823', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872179, ''),
('c41b3731af29b79dcbcb372423b73e04', '49.15.19.119', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458462387, ''),
('c426eec0aa6bc170ee88a9549146d552', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455875122, ''),
('c45511d32f799ff422abd983ad94f3a3', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455351513, ''),
('c5054bc8f95cd17412fc4f1066b55c38', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878504, ''),
('c51644d53467886865ffb0654506bae4', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455869895, ''),
('c54d2801102a7d38e47a8453a5fcb016', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463397122, ''),
('c56d6b5d4aaf32429ed428ebfe207c9d', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458284269, ''),
('c56ea7cd82ca30fb0ef3156d157abd9b', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460190935, ''),
('c56f2da6716a1b0a22fb9280bf40c313', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463387807, ''),
('c5e38ab90793e7bdc5fde54130a22b65', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463720548, ''),
('c5e6463bae218f64f166e1285d077eb5', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458290602, ''),
('c5ea1833a6d6aa72aab3a20655300a6d', '66.249.84.230', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1460109788, ''),
('c5fed3d5d38867ae9df6ab6de5aa08bb', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872990, ''),
('c60e6e316fbe47901a455492128e1561', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458632790, ''),
('c6410f0edd94414eab4869e0e1caea42', '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', 1476780271, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:5:"admin";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:79;}}'),
('c654de0bb66babaf999248dee8537754', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475556093, ''),
('c65917af5d0ab28cb60866cd5c65c622', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463389959, ''),
('c669285ad5badf374feb345257cd1ca2', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463389836, ''),
('c66acee4c399d1c9a0be0606102af9b7', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456899370, ''),
('c67c1345ed998bef321016ad510fb57d', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458288973, ''),
('c684cf9e2860895504a1943a0dfa3136', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455281641, ''),
('c695e59c81ec9b66dd7fa2203d5bdb0d', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459831373, ''),
('c6cde8eb237b39310eac26eae8f4ce54', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455342870, ''),
('c6f3083545811b5afa9e37189cda831b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455355538, ''),
('c7467fd13f3d42b6c631a486d0bd3635', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475580993, ''),
('c79e2735a8723e830c601e54f67087d4', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878485, ''),
('c7bbe6ba34510d266980498120d9e3a8', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880137, ''),
('c7e37987e4663ca231c8e917e6a13356', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455283191, ''),
('c81d80d83bc0f3cce828e33c546ed25d', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460190897, ''),
('c8490d41e4728b67160ce29035bb134b', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455874322, ''),
('c8659466f2f2495687757de1d4e2b94d', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455871342, ''),
('c886302e4bc9bb76f63e0a92dca854be', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455360658, ''),
('c88d8928ebe90237da069cefcb9b8a60', '106.66.92.226', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458367567, ''),
('c8fa45d69f204f5ecf47bec0b111ad0e', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460192092, ''),
('c8fee78735aff78ab14da00a892e8bc0', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463398779, ''),
('c908408a791790292938301a30dcf506', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458538310, ''),
('c92c1563e44216525fb4df66d16aec13', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455361114, ''),
('c95670a1346bc73dfc943ec88985fb64', '1.39.12.80', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458636613, ''),
('c9872f006e58e6b527ac639057befac7', '117.248.206.146', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459593174, ''),
('c999e8c1e5c8836d82c346f57a6111a1', '66.102.6.207', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko; Google Web Preview) Chrome/27.0.1453 Safari/537.3', 1458921930, ''),
('c9a7fee1ee584d61025ed3a52337fc92', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463397119, ''),
('c9b0115a2ef0de88bf6b061a14c45a02', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475580995, ''),
('c9bcf8a9465891330309665ad3f684b8', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880009, ''),
('c9c90f8293ccaeb84614d42dc64c38e2', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455862497, ''),
('c9e3710028946335a4633ba4cdd5eac5', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455339796, ''),
('c9fd6f1ac51e43e6c301037c55b2cfdf', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455282294, ''),
('ca0454c1511d40eebbbd53aef6d50663', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455369276, ''),
('ca0ab120e9f122ec615cc52f43ac9e8c', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460192034, ''),
('ca12e7d702dfb10c78208ff78ea6ddde', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455285172, ''),
('ca1b052d946a55857faa0c9da0a7d032', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455340443, ''),
('ca50588c81fa9e1a0ac0a187478bc916', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458284386, ''),
('ca8675118dd031164199ad305d33cc09', '49.15.19.119', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458462403, ''),
('ca8cd39bcb94763bc7356ceed2c3ca1e', '172.16.16.53', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1476274095, ''),
('ca99adc90baabdc637a828f230527004', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463396127, ''),
('caa02a59f0f648b20f43f90ad61b9645', '106.79.95.151', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1454152662, ''),
('cab19f6d44eb22c88822eaeeebd5db51', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455281745, ''),
('cabb7c0aa4278b04d4600d2377aa6239', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455344980, ''),
('cac40af2c198385242f5258c4e91dca3', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463397043, ''),
('cad804a831d1209c51955701fbdd001e', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475737855, ''),
('caf53e7535b0c936039166a6b6774c38', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880003, ''),
('cb36fc0b7c079e4250faf6c9b9471c6e', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872820, ''),
('cb3a296834e4c7cc85e3d1bdb5223767', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455346396, ''),
('cba3b7f7592de5d34a718b4309c1549e', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455869604, ''),
('cbc273be1e51c599ce6734f7e9f0937e', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455870736, ''),
('cc498365818fdb763c012552f2a1431e', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475566086, ''),
('cc510962564e571e3b5eceeea7285195', '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', 1453872649, ''),
('cc628e2a0a874259420abe5dc8f9681e', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460190899, ''),
('cc7ea08cab99daf3306d2607a43df91d', '172.16.16.53', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1476274247, ''),
('ccc45ff5f84564a764f8e344f0ed191c', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460191029, ''),
('ccf122d76e45a257718d5fdaef2e19dd', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456142894, ''),
('cd68091dc7c94bc3c4ada76550aa9728', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1452683800, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:44;}}'),
('cd8386c2f2053537866c562b1b808c0d', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455864513, ''),
('cd9d8f5ce820d028c4c062ce59132d9b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458291460, ''),
('cdae8e16229fa94164b70500e0b1a021', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463390168, ''),
('cdb4f3c97dd0ecdd4545d59afe3f1246', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459834609, ''),
('cdea37c1f329160d0052be2fb27ba176', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475557395, ''),
('cdfaa52d439b47e221d4fa9432bba4fe', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455359556, ''),
('ce127817aacf0b923cf5807b0f5e7d1c', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460179615, ''),
('ce23d8abd27066cf151a0c7fa4207db9', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475555756, ''),
('ce3b35da5d12188e25f923546a186045', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455346992, ''),
('ce425bd58409c50d612c1129716198ec', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463722094, ''),
('ce4bb2e601684ae3051bbd0cb4d43df6', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475556079, ''),
('ce9a04bcced2204377752e05a3f42755', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455881246, ''),
('cebaf15ff4191cb5fcf7edf2e50cd215', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463389658, ''),
('cf26fee5d7c54ddd8c36164d78bd87ef', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475497224, ''),
('cf6047fc492a809c0fa78c977effc2b2', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455278948, ''),
('cfa10b55e7b8247902080c9fe5e3df29', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455342741, ''),
('cfad20d78341fc34939ae4d90b981831', '66.249.85.188', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1459318539, ''),
('cfb8b751253e76b5881a3cfe728c70ac', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872824, ''),
('cfe3a98bf6e4c0bd1cc673a4e9358591', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880792, ''),
('d00683fb80d7494ec37ffac3d908ff59', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456142921, ''),
('d0266da67469915d7a85982c4bd4d7aa', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460179349, ''),
('d0551c6929719b2ec2bd5149dadecc89', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456899356, ''),
('d0571b140d6a13edfa79e768c1c0a3a5', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463720707, ''),
('d071ac0aec80af1da8c3b9bb7571988c', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455871991, ''),
('d0a03d83edb917432ba58e30d7c420ab', '1.39.98.62', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455883136, ''),
('d0a8e90e81ffc092ad678ac04be4e3f3', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475836942, ''),
('d0bdb5c5665d7c428efc4d316917075f', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880532, ''),
('d0e6f153b0ce8f4c75d5dfcb648f65f6', '1.39.96.45', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455181380, ''),
('d0f679a0c8e0aa31776ef37a8887b2d0', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455359538, ''),
('d17a016f6eac8debf7304ab43d8cad50', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880162, ''),
('d17e9e948d14ec1901fe58aefdb1da90', '172.16.16.53', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1476273886, ''),
('d1aad0637e9345c77c85abf7f519c8c1', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475555491, ''),
('d1c2f337ad321e6db6cf5002c0bffdd6', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460192612, ''),
('d1de827a857c1d92a1ab52126afd42ca', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458284082, ''),
('d21f3103caf79552cae206a3c77e7145', '103.206.210.50', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', 1463740042, 'a:1:{s:9:"user_data";s:0:"";}'),
('d233b33d3db9c4b2a846ea4f0b716b0b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455285100, ''),
('d278f464ca6f048c9dee1d565e2b94bf', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455353407, ''),
('d2c28cc6a3306b9cec44361a58876deb', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880590, ''),
('d309f62700158de9fc5fb4e8e54afdcb', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455876623, ''),
('d38e7328cff03379635c7c76728bf66a', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463390225, ''),
('d3e78054d3052845daba556d3f3a3293', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458537407, ''),
('d430216a9be7a5e3945afc394a52141f', '1.39.12.80', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458636600, ''),
('d469d22f61154e4bf7efdc0b8ba50156', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463400109, ''),
('d48fc7bfee0c0a2bcbcd04c93cc9303b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455512914, ''),
('d4983b0cb4fc6b935e94d5f55eb9202c', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456133933, ''),
('d4ee1b3d81c5c0f4f020a97e183d843b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455366402, ''),
('d55f62c531c8280c3e5cc7f7811e8c78', '103.206.210.50', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', 1463400419, 'a:1:{s:9:"user_data";s:0:"";}'),
('d5a5891f5124c0ce4fa29dac4d664939', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879961, ''),
('d6020db02f8cdfb07b0b75d7425e8381', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475581229, ''),
('d610d35a43e50e71de29af0eb8772165', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458290276, ''),
('d69e06c0944f3176028ee543ba1e43a9', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475565977, ''),
('d6c096caf91d1e856014ef8a7420fa3a', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455283280, ''),
('d6dba560c3431559772177e4cb728519', '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1; rv:44.0) Gecko/20100101 Firefox/44.0', 1455355022, ''),
('d72d4e7f66fa76db11b07799429523df', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455871948, ''),
('d764d891b5721201981587c7968cd516', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475581339, ''),
('d7c0f31030f0f91dc4ae6fe1917a187f', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455870381, ''),
('d7d9700fc79acedc7d6a6c2910ed29e0', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463398059, ''),
('d7f00e9a4f2e8b31e788b90909c024f0', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456899284, ''),
('d8381703039c70f2bb83b55632786b7c', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475566071, ''),
('d86767e1556d18a83b5f54bcedb99fe9', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458284944, ''),
('d883d37dbf99c83337863f812abece68', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880143, ''),
('d8b73acc8b5cba0689e08e05fb064d53', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455873410, ''),
('d8d7b53c6468d4914ffdceeb39a40b00', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463389935, ''),
('d8e49abbef9b6de41c7f37eda26ce857', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455368342, ''),
('d8f84c74109c183a6de73593b87ba701', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455344517, ''),
('d955f2258069d9f5f77d93308139439c', '172.16.16.53', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1476273852, ''),
('d97efcd7fb34416573595df520d1f5c8', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463399005, ''),
('d98029dd6af8008ffcfed2dac0de29f9', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455353394, ''),
('d98df3e9e36dc252c136bff9ed465416', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455359727, ''),
('da0a682fd6148ce140c97ec0ca8b67f6', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455344887, ''),
('da2785e7b4eb3c2b086981eaf9486897', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463727536, ''),
('da42280dc35992147019d365b248da3a', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463397232, ''),
('da696aecd79bc7961b519d2704b3ca7b', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463398841, ''),
('da7378b0af78d10620e639c84598804b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455871606, ''),
('da82f37ea816d986ca57526809926e8a', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475497287, ''),
('dab2f6a1eaf458f2113cc1caf410cc19', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456900576, ''),
('db0082bf61ff9d6dfa52f54eabd5cc35', '66.249.84.233', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1460467114, ''),
('db16862331c846a06f73198052125f08', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455875460, ''),
('db3837832db46711b8a1aed3d70cb380', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455355542, ''),
('db54e85502e51f919dde3a613e58bc35', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455871495, ''),
('db87953c1337b6179b762316f8570b24', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475555416, ''),
('dbe4ea7604ff191c83e1439c43cebc6d', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455865270, ''),
('dc0282e6f8555c8a4569a0ccf35d31f3', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455862469, ''),
('dc0ccdf8ddcbf361745643aacfc294a0', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455281741, ''),
('dc2964f467851a4e4bd57ca21aa1ef68', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463390794, ''),
('dc2c292506c4800b5603a68ab0d1ddb3', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458284083, ''),
('dc6ed12ff917c4c4a85392b8cea342e3', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456550068, ''),
('dc770ec42d8eaf5eebcc916556f28743', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455862458, ''),
('dc80c30252f3fb7890f83f7bcce88cad', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872182, ''),
('dccef6bb2a05b3590cf57fd34e610617', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451907040, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:24;}}'),
('dd4bff71cae0ca799d73da503b8c04ff', '40.78.146.128', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1453966486, ''),
('ddc674a4969a11befe4f66c00566a260', '117.248.206.56', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458215517, ''),
('ddc7398a5d3e6b2668d62c8cfceaa7be', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458280512, ''),
('de8107d7af24b87217d09c8c059c064a', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872835, ''),
('de890449618120edd3517209e2d442e2', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880722, ''),
('deb1bfc071723565d020b8d168aa5c66', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455876266, ''),
('decebe7396a23f763cab507c96afbbbf', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458632754, ''),
('ded985895cd0f344140c753583c83c36', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455864536, ''),
('deeeb30b2ae5f6e3de66dfad0dca4975', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463399030, ''),
('df11454792d82d12a6aa7b3e91eac816', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460190978, ''),
('df2173f4b96eee4a1ca2e75b707b3844', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455873373, ''),
('df3d6707c5fc979dc6aafe6222b5613e', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', 1453115888, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:51;}}'),
('df52e8cd2af58311a9536d9e95c62ebd', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455359542, ''),
('df552ce5923b12a2d2a0bc09890f0def', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460179674, ''),
('dfd16bc31eadf4866b03922b8aadcff8', '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', 1476775754, 'a:1:{s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:5:"admin";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:76;}}'),
('dfe55016fc213cfecc688adf6d1b1b1a', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459235325, ''),
('dfee3fce885c85c77bfdbe4ddda4dbe2', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455877714, ''),
('e01f4f9bdec7035626c10ce45ba78696', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475581027, ''),
('e052e2ff2d99713fdab0e8f269bed4ef', '172.16.16.24', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451558573, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:9;}}'),
('e07c891637970fe0021e1ef29a5a6f3d', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475580983, ''),
('e09f2f13658ea1cedfe9f10f3f859bb7', '172.16.16.53', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1476274106, ''),
('e0a965658efec50f402520ca6ba2f561', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459235401, ''),
('e0c3b8d0efbc83b0867ff1839bb5de8c', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', 1453089537, ''),
('e103bff6958d9cdc41ba21d2c3c8a546', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460192599, ''),
('e135ea392b17ea896b304a8d89ff804f', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463399025, ''),
('e13a75e31677049baac9bc28f7deddfe', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455279745, ''),
('e1496cf4c3cdee3b6db3c26fd819f5cd', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458537603, ''),
('e154cd494720238837cf6a930ecab27b', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1467349059, ''),
('e167adbd3625674167f524510c8559e5', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879822, ''),
('e1b5c23d1f3feefffbda5fcef0556c6d', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872079, ''),
('e1b6b02618ad1ea0c4640db38dc58016', '49.15.19.119', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458462399, ''),
('e1fe8ff1fb62e72c4ab2f9431efc9c79', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880663, ''),
('e224cf50af6e3749133e2cbd94ef3ca2', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879224, ''),
('e23e3a0fb329025e5303bed06a86e9a0', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475581371, ''),
('e27060d6b9f89cc49e694190dc34e8a6', '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', 1453719839, ''),
('e2823e9a1522c4c46d58eb266f76b0b1', '66.249.85.188', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1459146481, ''),
('e282d018cb7c5d3b6bb910577db7e867', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459831196, ''),
('e2a5775ca6c8856068286a33d38f4c63', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878041, ''),
('e2a61e95123bff94f3013dbdc19ea5c1', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463397233, ''),
('e34f07915279c0cb05fd952fcb54972c', '40.78.146.128', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1455863757, ''),
('e3b5c0cc0ba4464a1c63520649a96767', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463391816, ''),
('e3b67799382750f54e4324d7409be4c3', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463391822, ''),
('e3bbb48df726cdb383cba40eb1e25670', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463399031, ''),
('e3c24472d1c068cef1f29902b90f3493', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455340130, ''),
('e3c6b46791310ec966bcf951b65f08d3', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455871906, ''),
('e3ebb1b85bcf5b9d6dd94c1de2bb55f0', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455342482, ''),
('e3ed4d50199818bc479c2f357edd81b0', '117.248.206.56', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458215572, ''),
('e4711e116a9c0a77704137c28c662c2a', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455871486, ''),
('e4c4e82c151712627efd84af50d3c1a3', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455863649, ''),
('e5008fabfb444e2d3171c3975d44139d', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878282, ''),
('e54209de673c649b8f6b3e83faee4f12', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475831442, ''),
('e567d2cb0bd64dd39e905e8163de17ad', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455865252, ''),
('e572547f0bb31279b3d4e51a30c52223', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463399048, ''),
('e5b56a9a7ad5d6ff8a2cd1e007a21817', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460190932, ''),
('e5d86c90573025ddf2ee67ffd3dd7ed4', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463640145, ''),
('e66d6930f65f05adc432d15b84dc4443', '66.249.85.191', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1458647684, ''),
('e6c03a566f77123219f576489aa3fc9b', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1452510989, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:37;}}'),
('e6d59a9885cbd3ff827376924d953cae', '66.249.84.233', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1460552136, ''),
('e72c651c03fe806ea83a63809e5a6ab0', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455279920, ''),
('e770a10f1145723a1829cda075813183', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879482, ''),
('e79d51bc78f60d2f2a9bf31efb92d31e', '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', 1476331363, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:5:"admin";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:69;}}'),
('e79e3d14693fb21603bddcba589104a0', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463392408, ''),
('e7e2edca1afa710452c9d8fe08d276d8', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463397277, ''),
('e7e5648d278ab4b61dab3565d836e9fb', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455279847, ''),
('e815457f7b2e5d006c719bac0ea7d73c', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878524, ''),
('e820b2bec6cc078e9d355e1d2bd9a710', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458537797, ''),
('e83af25bddca02cd16ba6a09d573cfe8', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475581349, ''),
('e8586776f3ceeb2e46011e5c18d476c3', '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', 1476348106, ''),
('e8767862eeb537e312665ba602d91970', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455279738, ''),
('e8b4c8b69b90726fd808e9a48c0f96e6', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475581363, ''),
('e8f09be4051192225b6e42eb63773160', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455870468, ''),
('e96a7729f63c51a00ca1ac4baf6a962a', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463720705, ''),
('e9ce25fe3d6453c820c77934c98e0396', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458288890, ''),
('ea040282b7693ccafaa62e2a4f5c15ad', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460438793, ''),
('ea0646df49a7d896ddd9a9fb6b19120f', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1464247155, ''),
('ea0997fb4c98f41d5b7cca6f29325cc3', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455283106, ''),
('ea38eba98473f0dc141caf040b3b52de', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455284413, ''),
('eaac2df8942f787ec08def2e9471aff6', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458537429, ''),
('eab2e82fe1865acd7a333a20af3c2a6b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455369278, ''),
('eabaead5b7096c40cc2ed5f0366631d1', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455873178, ''),
('ead00865a3da7689a187abb001d0532f', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463390792, ''),
('eb25c346f953e58956793911ec10d25b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458289944, ''),
('eb4a97afed85011e399c710c28a89d9d', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458285232, ''),
('eb62264ccc6056d4b9837088b6bcbe9b', '66.249.85.194', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1460609832, '');
INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('ebbce9a94244803ff0879a3195aae866', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455877610, ''),
('ebf244d634fbce7c595ff72f4c9b4b31', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458193278, ''),
('ec1336f5fa19724ef1c3fbb8fa443641', '66.249.84.233', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1460467114, ''),
('ec1fc8acd772697ec779c5ed61c21021', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463391821, ''),
('ec4b56c001a5194a5cd67b421f6bdce7', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463388469, ''),
('ec5f81310dc823a5bf487288753df52d', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455359475, ''),
('ecd133f25650304fae17fae061e199aa', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455355934, ''),
('ecf38aee6a6484f2a7351297021b0771', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455283076, ''),
('ed0f02598e0170754847156e8ba40d39', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463398655, ''),
('ed13e5d446d7416f0ef2fab5302df2d4', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475558176, ''),
('ed1aef75b4bb1a30745ebab395134e2b', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459834607, ''),
('ed26e2092e1ff83ef68c05bd4a53638e', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463728866, ''),
('ed8abf1e7888264b7b24053b9654546b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455873505, ''),
('ed8e9733c551fc3c4fb60c597e3290c0', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455276041, ''),
('edb7337751aff5e3b42951953d56936b', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455873245, ''),
('ede7a1c40a9ff9d7e31f826e9fef8a62', '49.15.19.119', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458462381, ''),
('ee3c230bec88f836d392dd60c3f75d0a', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458284367, ''),
('ee4eb6959c6fefecaa86be387b3c4fc0', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475555376, ''),
('ee64da1856942e287c80fdfe2688f8b6', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455863714, ''),
('ee81c9d85fdd36b2917225ef0fa0ff56', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455963497, ''),
('ee906aae1e11da12ee97630c8e87441b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455359492, ''),
('ee93d65b2e0fcdb79258a2fdc4737dfd', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455877579, ''),
('eebb1875ac684ee4ff2149ab53ccebfc', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458291806, ''),
('eee3ba40c81ca20d60ab5188c6913259', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455355984, ''),
('efd5363ec62302a615ed9c45e2675999', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458538313, ''),
('eff2187cc2a40efb13d9c4cee83f3c51', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475494275, ''),
('f03b3b70fd899a19d3ed338a34b7b1fc', '117.248.206.56', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458215722, ''),
('f046b3207f0df6b351ba55a43bd410e7', '117.248.206.56', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458215751, ''),
('f0a0f053b336a48a235027f654f88515', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458290048, ''),
('f0cdfb57cc8f81513e3a80b31bdd5dd8', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455512790, ''),
('f0da13486920d2990b4f0c440c5b2cdd', '1.39.12.80', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458636692, ''),
('f0f1d7b1d09343bec4252d7e23c12ecb', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455876276, ''),
('f13066d914f136aeb44e15e99b63e942', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455863865, ''),
('f1469097d4fe8f50bce0d52fb79ed6b2', '40.78.146.128', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1453966479, ''),
('f173c6b1ed3bd0879dc6a25ee3281bf0', '1.39.86.222', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455513182, ''),
('f18216bf36e88905e29f8d8dd99c3e7d', '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36', 1458283225, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:15;}}'),
('f191be98c379ee490f37680feb4e60b0', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463400080, ''),
('f1a76e98f7ceaea6ff3cad19419df5a8', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878526, ''),
('f1b1d32d08b923d438d3b30ee15c43a8', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463397053, ''),
('f1f27e2926e0a667b77312b2cd3d55ea', '172.16.16.22', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2612.0 Safari/537.36', 1452573077, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:40;}}'),
('f1f57b76766bebc40ca87dae2f13b47c', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460179608, ''),
('f21f91a765fe8202d4d570d5e77ae56c', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455877596, ''),
('f22b9a054c699f5af310fb3879b4de69', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872757, ''),
('f2597e5d092f6754862024990fc6c84d', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455869999, ''),
('f293f082fdf003a107f89330db80b0f2', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455862963, ''),
('f2961a26ea37fa73dc16e182cc527b98', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880150, ''),
('f29fb16df10746db2069e4d425342d98', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455876258, ''),
('f2a1a75736181ac0e5abb14bef6a8f1b', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463387899, ''),
('f2c7968260ea49f4ad6b708cd58835fa', '106.77.195.17', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279046, ''),
('f2ed6ccd0e6fa8a417184e913216d25b', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455353417, ''),
('f351936a6f5cbd408d42711d042f7906', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455873421, ''),
('f35e5d39b52ab2aeb68ea4c7b7014acb', '106.77.195.17', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279439, ''),
('f3739a788a7cae5a83e04eb0c92dc000', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458538295, ''),
('f3b64f72a238a405b25b1736dfe34122', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458632740, ''),
('f3fae8574aab3e147dedbe8dbf7ea830', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458288942, ''),
('f42717849f4d6229d4967bfae3bd74c3', '106.66.92.226', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458367566, ''),
('f4341617585c114cbaa53ac4eb821a06', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475833894, ''),
('f476f1d7132ac0cb69e2f458356be6d3', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463397104, ''),
('f493d3f4973bfe563b8dfd2296fd1be9', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463399020, ''),
('f495ef5cff9f0e0a18232b6628b3b330', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880261, ''),
('f4abe951295bf53da0189f88764260dd', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455258286, ''),
('f4c01a211ed4017d13dc1accca617a30', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455870373, ''),
('f4d684f0e84a3e700fb42d53f43c39d5', '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36', 1455874650, 'a:1:{s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:8;}}'),
('f4e0b6a403415a0f04b9cbc980ab44cb', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455875010, ''),
('f4e6c7346a0a22dcf53185ae4926bbf3', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458289909, ''),
('f4f386b7b5cbd66f3d0c601bb5a19559', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455787548, ''),
('f4fcc65df9064bed11e10b3615bb9119', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455787501, ''),
('f5004997ddc0e4d0625853feff78b2a3', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455881653, ''),
('f525ad36324b6453e95b2ae366cebf35', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880257, ''),
('f526b34902a0f2b5f60dbe7c67ec5c0f', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455875518, ''),
('f55439b0a24d6fe0b0be8007b0e36263', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475570952, ''),
('f55b1198e2ffc099b85a65d3d738bb46', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463387838, ''),
('f55d3fa86661ea622d2a7d480bf9c8b2', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475833890, ''),
('f59d38ea6f7f8848aae2860f4e11d762', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455863113, ''),
('f606b8208572a15771198d8810a82243', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463389898, ''),
('f606d6c33614869179d7d72346708faa', '66.249.85.188', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1458980696, ''),
('f62d7305e994d210976de75e3526b201', '106.67.171.72', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458294825, ''),
('f63064d0561db94a56ae22a0579d417e', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475737858, ''),
('f6337b10d3ed80a4000a69d79234d799', '117.248.206.56', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458215663, ''),
('f63c761c9b164d234cd1dbe5790e023a', '172.16.16.53', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1476273865, ''),
('f64a239df41eb3d5c64b091cf3f7d7b9', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1452261426, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:36;}}'),
('f65cad53da0af8ac28638fbedabaa718', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463728733, ''),
('f682dff5deece0f67676181529900030', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1460179660, ''),
('f698fe776d8afcb20cc8e880f0d914dd', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463727182, ''),
('f6ab4eefcfac1a3a9f1d322726a9ecb9', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458537758, ''),
('f6abca0ff0dbe624cea0ad7f05aff2bf', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455278943, ''),
('f73382358bf816bd3807062a673a78e4', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458632734, ''),
('f73429e4a3e3c7ef006af98aea160ffc', '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', 1476333542, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:5:"admin";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:72;}}'),
('f73499c66f60ce3914efe7f11aa19b04', '40.78.146.128', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1453966484, ''),
('f76012c5c8d0f92db70e9672fdb23391', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455280148, ''),
('f79657d5f4e1c85605374805dde580c8', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458283641, ''),
('f7ad04b15e73b59f926b6e6489d99fa0', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1452684428, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:45;}}'),
('f8110cc4f7ad1b60c6f46ddb0af93ccd', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458289999, ''),
('f8175ab1301f069709a4e71e5eecc869', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455963504, ''),
('f8518bf85374d8bb804bd33d30cd99f3', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463721583, ''),
('f85389215558fbc2e2bfa432ce7e3f69', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455863237, ''),
('f877275feb8ddb34be99c772672af2c9', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458279424, ''),
('f89f040237c062d0930e40c3fbe2556d', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455870709, ''),
('f8a46720f0c08dbc9d590de2044d6365', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459249091, ''),
('f8b7b8c1c66ce153c694b288fbf139bd', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456899258, ''),
('f8c94df0a42409afe476805cb2c5fb6e', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455369269, ''),
('f8d1487f56a2c62cfe4542f00e7a5e75', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455870324, ''),
('f90b4aa259a34de8bfa8dd1317694a44', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463727514, ''),
('f94755930695d2374d6a824a7f197b31', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463721834, ''),
('f98dbfc3b0475359c6b3904fe3acd673', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455279981, ''),
('f99bd182df46df37aeed8e1ca5d7fece', '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36', 1455512238, ''),
('f9b74a9cfff4066803377535d6cef6f1', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475836940, ''),
('f9d8ba7b180ffd7b8abe81b99fa34dbc', '106.79.76.130', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458281442, ''),
('f9dfc0e80527d17e3ad9cacdd7c92f14', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455368599, ''),
('fa1c8b7f8e3f9deb6bfcd3a15f4b1703', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475570961, ''),
('fa8599c77f28af3978dba5970306575f', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458290293, ''),
('faec4a4f4bf63c827e5372d7094096db', '117.248.206.56', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458215627, ''),
('fb4e4e0875acd7574f9c0f9e002d4c2f', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455281544, ''),
('fb5d6e9ca61c1e9928ee5d22e5cee8f5', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455874990, ''),
('fbae617bda99875887d5d7eafb02a359', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455368450, ''),
('fbe96524309b02ede976574950b656c8', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878559, ''),
('fc00a6835eb697e52431c2b64c504a5b', '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36', 1455512239, ''),
('fc8411d7033b4e6fcfb3bfa31ccc6811', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463727170, ''),
('fc93f1eca646d9a0fa82e2d41da313cd', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455872940, ''),
('fcafb8da3094cbf1f18928e6c37f9ed1', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455878481, ''),
('fcc2a9e0abda1aa0c811d1955e88d6f5', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463389815, ''),
('fcd27351cbf24a5926e5c1f14af94d6d', '106.79.76.130', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458282835, ''),
('fcd95f544079decf4884f7bc336944c7', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455281639, ''),
('fcf5072163e03eb209ed988c0dfa9310', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456142907, ''),
('fcf9bcb5ce1c1b3c1e8e591958a05855', '66.249.85.194', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1459835033, ''),
('fd11cad2a03c8b03d85afda0504b9099', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455340461, ''),
('fd42fb8770f0371616c8c8fc9bd0e9c7', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455963515, ''),
('fd740f63aa3cca80a24ed75d8bca2b25', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455879725, ''),
('fd76c28837af42f9d70fb50e1b296f9d', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475737865, ''),
('fd9e1c62e451fe5ab2d0f6aa7aac50e9', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1458288760, ''),
('fdd72b6acaabd5f2dfe6032d4e169daf', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455367553, ''),
('fdeba6c14217e193fc58cfc29eaadb00', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475581209, ''),
('fdf4fe5ecb9907c138e150ef83431c8f', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880105, ''),
('fe27c35293022ccac675dfec8e5d361c', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1459831396, ''),
('fe45db416d5be585becf57f2586ff2ac', '178.62.53.179', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455880639, ''),
('fe6bd70979b2d1ea640272e3501c06bd', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1456899234, ''),
('fe781f843916476accfa5922456d8967', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455876390, ''),
('fea8a53d04996f8002b3910ad2a8170f', '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', 1476782737, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:5:"admin";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:81;}}'),
('febb43a244833f62a5f71687af5f76a1', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475497207, ''),
('ff4a5c8af7992e6e418181afac5dd287', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1475494265, ''),
('ff5dd6d94c19090f5a4fc75b910c102f', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1463389929, ''),
('ff8f4ace521dd3ab31457c6df8037156', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455283195, ''),
('ffc3fd248d1356b0d2aa488c6ece3983', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455875433, ''),
('ffdff085bf25e05767b9ba8ccba2fdeb', '180.211.117.81', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1455367692, ''),
('ffe4f60f1da50062572ac1cbeaeba4ce', '103.206.210.50', 'Apache-HttpClient/UNAVAILABLE (java 1.4)', 1464247161, '');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `countryid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`countryid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`countryid`, `name`, `status`, `create_date`, `update_date`) VALUES
(1, 'India', 'Active', '2015-12-31 14:41:08', '0000-00-00 00:00:00'),
(2, 'Usa', 'Active', '2015-12-31 14:41:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `division_master`
--

CREATE TABLE IF NOT EXISTS `division_master` (
  `division_code` int(11) NOT NULL AUTO_INCREMENT,
  `standard_code` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `master_code` int(11) NOT NULL,
  PRIMARY KEY (`division_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `division_master`
--

INSERT INTO `division_master` (`division_code`, `standard_code`, `name`, `create_date`, `update_date`, `create_by`, `update_by`, `status`, `master_code`) VALUES
(1, 3, 'Division A', '2015-12-31 14:57:21', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(2, 4, 'Division A', '2015-12-31 14:57:29', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(3, 5, 'Division A', '2015-12-31 14:57:33', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(4, 5, 'Division B', '2015-12-31 14:57:34', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(5, 7, 'Division A', '2016-05-16 15:42:02', '0000-00-00 00:00:00', 7, 0, 'Active', 2),
(6, 7, 'Division B', '2016-05-16 15:42:13', '0000-00-00 00:00:00', 7, 0, 'Active', 2),
(7, 8, 'Division A', '2016-05-16 15:42:30', '0000-00-00 00:00:00', 7, 0, 'Active', 2),
(8, 8, 'Division B', '2016-05-16 15:42:44', '0000-00-00 00:00:00', 7, 0, 'Active', 2),
(9, 8, 'Division C', '2016-05-16 15:43:12', '0000-00-00 00:00:00', 7, 0, 'Active', 2),
(10, 4, 'Division B', '2016-10-12 12:18:45', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(11, 11, 'Division A', '2016-10-12 12:20:57', '0000-00-00 00:00:00', 1, 0, 'Active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam_details`
--

CREATE TABLE IF NOT EXISTS `exam_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_code` int(11) NOT NULL,
  `subject_code` int(11) NOT NULL,
  `date_dt` varchar(30) NOT NULL,
  `start_time` varchar(50) NOT NULL,
  `end_time` varchar(50) NOT NULL,
  `min_marks` float NOT NULL,
  `max_marks` float NOT NULL,
  `master_code` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `exam_details`
--

INSERT INTO `exam_details` (`id`, `exam_code`, `subject_code`, `date_dt`, `start_time`, `end_time`, `min_marks`, `max_marks`, `master_code`) VALUES
(1, 2, 8, '11-01-2016', '12:00 PM', '12:30 PM', 10, 30, 1),
(2, 2, 9, '04-01-2016', '01:00 PM', '02:00 PM', 20, 50, 1),
(3, 3, 8, '14-01-2016', '04:15 PM', '04:15 PM', 10, 40, 1),
(4, 3, 9, '2-01-2016', '04:15 PM', '04:15 PM', 10, 40, 1),
(5, 4, 2, '20-01-2016', '11:30 AM', '01:30 PM', 20, 50, 1),
(6, 5, 2, '11-01-2016', '11:45 AM', '11:45 AM', 10, 90, 1),
(7, 6, 1, '28-02-2016', '12:00 PM', '12:00 PM', 10, 60, 1),
(8, 6, 7, '01-03-2016', '12:00 PM', '12:00 PM', 46, 60, 1),
(9, 7, 1, '13-01-2016', '12:00 PM', '03:00 PM', 36, 100, 1),
(10, 8, 1, '28-02-2016', '02:00 PM', '03:00 PM', 10, 100, 1),
(11, 8, 7, '29-02-2016', '02:00 PM', '03:00 PM', 10, 100, 1),
(12, 9, 8, '17-02-2016', '03:00 PM', '04:00 PM', 10, 30, 1),
(13, 9, 9, '16-02-2016', '03:00 PM', '04:00 PM', 10, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam_master`
--

CREATE TABLE IF NOT EXISTS `exam_master` (
  `exam_code` int(11) NOT NULL AUTO_INCREMENT,
  `exam_type_code` int(11) NOT NULL,
  `standard_code` int(11) NOT NULL,
  `account_year_code` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `master_code` int(11) NOT NULL,
  PRIMARY KEY (`exam_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `exam_master`
--

INSERT INTO `exam_master` (`exam_code`, `exam_type_code`, `standard_code`, `account_year_code`, `create_date`, `update_date`, `create_by`, `update_by`, `status`, `master_code`) VALUES
(2, 1, 1, 1, '2016-01-08 15:46:56', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(3, 2, 1, 1, '2016-01-08 16:25:00', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(4, 3, 4, 1, '2016-01-11 11:35:41', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(5, 2, 4, 1, '2016-01-11 11:59:49', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(6, 1, 1, 1, '2016-01-11 12:05:09', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(7, 1, 5, 1, '2016-01-11 12:05:58', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(8, 2, 5, 1, '2016-02-13 14:13:18', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(9, 4, 1, 1, '2016-02-19 15:12:29', '0000-00-00 00:00:00', 1, 0, 'Active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam_type`
--

CREATE TABLE IF NOT EXISTS `exam_type` (
  `exam_type_code` int(11) NOT NULL AUTO_INCREMENT,
  `exam_title` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `master_code` int(11) NOT NULL,
  PRIMARY KEY (`exam_type_code`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `exam_type`
--

INSERT INTO `exam_type` (`exam_type_code`, `exam_title`, `create_date`, `update_date`, `create_by`, `update_by`, `status`, `master_code`) VALUES
(1, 'TEST 1', '2016-01-05 08:54:07', '2016-01-05 08:54:14', 1, 1, 'Active', 1),
(2, 'TEST 2', '2016-01-05 08:56:00', '2016-01-05 08:56:11', 1, 1, 'Active', 1),
(3, 'TEST 3', '2016-01-08 10:40:08', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(4, 'FA 1', '2016-01-08 10:40:49', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(5, 'First Internal', '2016-05-16 15:58:46', '2016-05-16 15:59:09', 7, 7, 'Active', 2),
(6, 'second internal', '2016-05-16 15:59:36', '0000-00-00 00:00:00', 7, 0, 'Active', 2),
(7, 'External', '2016-05-16 15:59:55', '0000-00-00 00:00:00', 7, 0, 'Active', 2),
(8, 'TEST', '2016-10-12 12:19:27', '0000-00-00 00:00:00', 1, 0, 'Active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usercode` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `feedback_replay` text NOT NULL,
  `status` enum('Active','Delete','Inactive') NOT NULL,
  `dateOfEntry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `master_code` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `usercode`, `user_type_id`, `feedback`, `feedback_replay`, `status`, `dateOfEntry`, `master_code`) VALUES
(1, 5, 3, 'hello', 'hii', 'Delete', '2016-03-18 05:44:06', 1),
(2, 3, 3, 'no feedback', '', 'Active', '2016-01-27 05:24:26', 0),
(3, 3, 3, 'no feedback', '', 'Delete', '2016-03-18 05:44:06', 1),
(4, 3, 3, 'no', '', 'Delete', '2016-03-18 05:44:06', 1),
(5, 3, 3, 'no feedback', '', 'Delete', '2016-03-18 05:44:06', 1),
(6, 3, 3, 'fj', '', 'Delete', '2016-03-18 05:44:06', 1),
(7, 3, 3, 'fjudxud\ndfgdfgdfgfdgfdgdfg\n\n\n\n\ndfgfdgdgdfgdfgdfgdfgdfgdfgdfg\n\ndfgdfgdfg\n\ndfgdfgfd\ngfdgfdgdfgdfgdfgdfg\ndfgdfgdfgdf\ngdfgdfgdfgdfgdfgdfgdfgdfgdfgdf\ngdf\ndfdf\ngdfgdf\ngdfdgfd\ndfgd\ngfdgfddfgfdgdfgdf\ngdfgdgdfgdfgdf\ndfgdf\ndf\ndfgdgdfgdfg\ndfdfgdfgfd\ndfgdfgdfg\ndfgdf', '', 'Delete', '2016-03-18 05:44:06', 1),
(8, 3, 3, 'fjudxud\ndfgdfgdfgfdgfdgdfg\n\n\n\n\ndfgfdgdgdfgdfgdfgdfgdfgdfgdfg\n\ndfgdfgdfg\n\ndfgdfgfd\ngfdgfdgdfgdfgdfgdfg\ndfgdfgdfgdf\ngdfgdfgdfgdfgdfgdfgdfgdfgdfgdf\ngdf\ndfdf\ngdfgdf\ngdfdgfd\ndfgd\ngfdgfddfgfdgdfgdf\ngdfgdgdfgdfgdf\ndfgdf\ndf\ndfgdgdfgdfg\ndfdfgdfgfd\ndfgdfgdfg\ndfgdf', '', 'Delete', '2016-03-18 05:44:06', 1),
(9, 3, 3, 'fhfgh', '', 'Delete', '2016-03-18 05:44:06', 1),
(10, 3, 3, 'fghfg', '', 'Delete', '2016-03-18 05:44:06', 1),
(11, 3, 3, 'sdf', '', 'Delete', '2016-03-18 05:44:06', 1),
(12, 3, 3, 'hell. feedback from dx\n', '', 'Delete', '2016-03-18 05:44:06', 1),
(13, 3, 3, 'rtytr', '', 'Active', '2016-03-22 07:46:30', 1),
(14, 3, 3, 'no feedback', '', 'Active', '2016-10-12 11:55:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `food_master`
--

CREATE TABLE IF NOT EXISTS `food_master` (
  `food_code` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(30) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` int(30) NOT NULL,
  `day` varchar(255) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `dinner_name` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `master_code` int(11) NOT NULL,
  PRIMARY KEY (`food_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=150 ;

--
-- Dumping data for table `food_master`
--

INSERT INTO `food_master` (`food_code`, `date`, `month`, `year`, `day`, `food_name`, `dinner_name`, `create_date`, `update_date`, `create_by`, `update_by`, `status`, `master_code`) VALUES
(90, '01-01-2016', '1', 2016, 'Friday', '4,1', '3', '2016-02-19 14:46:50', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(91, '02-01-2016', '1', 2016, 'Saturday', '4,1', '3', '2016-02-19 14:46:50', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(92, '03-01-2016', '1', 2016, 'Sunday', '4,1', '2', '2016-02-19 14:46:50', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(93, '04-01-2016', '1', 2016, 'Monday', '4,1', '3', '2016-02-19 14:46:50', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(94, '05-01-2016', '1', 2016, 'Tuesday', '4,1', '2', '2016-02-19 14:46:50', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(95, '06-01-2016', '1', 2016, 'Wednesday', '4,1', '3', '2016-02-19 14:46:50', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(96, '07-01-2016', '1', 2016, 'Thursday', ' ', '2', '2016-02-19 14:46:50', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(97, '08-01-2016', '1', 2016, 'Friday', ' ', '3', '2016-02-19 14:46:50', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(98, '09-01-2016', '1', 2016, 'Saturday', '1', ' ', '2016-02-19 14:46:50', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(99, '10-01-2016', '1', 2016, 'Sunday', '1', ' ', '2016-02-19 14:46:50', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(100, '11-01-2016', '1', 2016, 'Monday', ' ', '2', '2016-02-19 14:46:50', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(101, '12-01-2016', '1', 2016, 'Tuesday', '4', ' ', '2016-02-19 14:46:50', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(102, '13-01-2016', '1', 2016, 'Wednesday', ' ', ' ', '2016-02-19 14:46:50', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(103, '14-01-2016', '1', 2016, 'Thursday', ' ', ' ', '2016-02-19 14:46:50', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(104, '15-01-2016', '1', 2016, 'Friday', ' ', ' ', '2016-02-19 14:46:50', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(105, '16-01-2016', '1', 2016, 'Saturday', ' ', ' ', '2016-02-19 14:46:50', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(106, '17-01-2016', '1', 2016, 'Sunday', ' ', ' ', '2016-02-19 14:46:50', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(107, '18-01-2016', '1', 2016, 'Monday', ' ', ' ', '2016-02-19 14:46:50', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(108, '19-01-2016', '1', 2016, 'Tuesday', ' ', ' ', '2016-02-19 14:46:50', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(109, '20-01-2016', '1', 2016, 'Wednesday', '4', '2', '2016-02-19 14:46:50', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(110, '21-01-2016', '1', 2016, 'Thursday', ' ', '3', '2016-02-19 14:46:50', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(111, '22-01-2016', '1', 2016, 'Friday', '4', '3,2', '2016-02-19 14:46:50', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(112, '23-01-2016', '1', 2016, 'Saturday', ' ', ' ', '2016-02-19 14:46:50', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(113, '24-01-2016', '1', 2016, 'Sunday', ' ', ' ', '2016-02-19 14:46:50', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(114, '25-01-2016', '1', 2016, 'Monday', ' ', ' ', '2016-02-19 14:46:50', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(115, '26-01-2016', '1', 2016, 'Tuesday', ' ', ' ', '2016-02-19 14:46:50', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(116, '27-01-2016', '1', 2016, 'Wednesday', ' ', ' ', '2016-02-19 14:46:50', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(117, '28-01-2016', '1', 2016, 'Thursday', ' ', ' ', '2016-02-19 14:46:50', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(118, '29-01-2016', '1', 2016, 'Friday', ' ', ' ', '2016-02-19 14:46:50', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(119, '30-01-2016', '1', 2016, 'Saturday', ' ', ' ', '2016-02-19 14:46:50', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(120, '31-01-2016', '1', 2016, 'Sunday', ' ', ' ', '2016-02-19 14:46:50', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(121, '01-02-2016', '2', 2016, 'Monday', '4,1', '3', '2016-02-19 17:33:32', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(122, '02-02-2016', '2', 2016, 'Tuesday', '1', ' ', '2016-02-19 17:33:32', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(123, '03-02-2016', '2', 2016, 'Wednesday', '4', '2', '2016-02-19 17:33:32', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(124, '04-02-2016', '2', 2016, 'Thursday', ' ', ' ', '2016-02-19 17:33:32', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(125, '05-02-2016', '2', 2016, 'Friday', '1', '3', '2016-02-19 17:33:32', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(126, '06-02-2016', '2', 2016, 'Saturday', ' ', ' ', '2016-02-19 17:33:32', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(127, '07-02-2016', '2', 2016, 'Sunday', ' ', ' ', '2016-02-19 17:33:32', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(128, '08-02-2016', '2', 2016, 'Monday', ' ', ' ', '2016-02-19 17:33:32', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(129, '09-02-2016', '2', 2016, 'Tuesday', ' ', ' ', '2016-02-19 17:33:32', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(130, '10-02-2016', '2', 2016, 'Wednesday', ' ', ' ', '2016-02-19 17:33:32', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(131, '11-02-2016', '2', 2016, 'Thursday', ' ', ' ', '2016-02-19 17:33:32', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(132, '12-02-2016', '2', 2016, 'Friday', ' ', ' ', '2016-02-19 17:33:32', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(133, '13-02-2016', '2', 2016, 'Saturday', '4', '3', '2016-02-19 17:33:32', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(134, '14-02-2016', '2', 2016, 'Sunday', '1', '3', '2016-02-19 17:33:32', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(135, '15-02-2016', '2', 2016, 'Monday', '1', '3', '2016-02-19 17:33:32', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(136, '16-02-2016', '2', 2016, 'Tuesday', '4', '3', '2016-02-19 17:33:32', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(137, '17-02-2016', '2', 2016, 'Wednesday', '1', '2', '2016-02-19 17:33:32', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(138, '18-02-2016', '2', 2016, 'Thursday', ' ', ' ', '2016-02-19 17:33:32', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(139, '19-02-2016', '2', 2016, 'Friday', '4,1', '3,2', '2016-02-19 17:33:32', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(140, '20-02-2016', '2', 2016, 'Saturday', ' ', ' ', '2016-02-19 17:33:32', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(141, '21-02-2016', '2', 2016, 'Sunday', ' ', ' ', '2016-02-19 17:33:32', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(142, '22-02-2016', '2', 2016, 'Monday', ' ', ' ', '2016-02-19 17:33:32', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(143, '23-02-2016', '2', 2016, 'Tuesday', ' ', ' ', '2016-02-19 17:33:32', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(144, '24-02-2016', '2', 2016, 'Wednesday', ' ', ' ', '2016-02-19 17:33:32', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(145, '25-02-2016', '2', 2016, 'Thursday', ' ', ' ', '2016-02-19 17:33:32', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(146, '26-02-2016', '2', 2016, 'Friday', ' ', ' ', '2016-02-19 17:33:32', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(147, '27-02-2016', '2', 2016, 'Saturday', ' ', ' ', '2016-02-19 17:33:32', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(148, '28-02-2016', '2', 2016, 'Sunday', ' ', ' ', '2016-02-19 17:33:32', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(149, '29-02-2016', '2', 2016, 'Monday', ' ', ' ', '2016-02-19 17:33:32', '0000-00-00 00:00:00', 1, 0, 'Active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `food_menu`
--

CREATE TABLE IF NOT EXISTS `food_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `master_code` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `food_menu`
--

INSERT INTO `food_menu` (`id`, `name`, `type`, `master_code`, `create_date`, `update_date`, `create_by`, `update_by`, `status`) VALUES
(1, 'DAAL', 'Lunch', 1, '2016-01-02 14:52:13', '2016-01-02 14:56:29', 1, 1, 'Active'),
(2, 'PAV BHAJI', 'Dinner', 1, '2016-01-02 16:20:16', '0000-00-00 00:00:00', 1, 0, 'Active'),
(3, 'MANCHURIAN', 'Dinner', 1, '2016-01-02 16:20:24', '2016-01-02 16:20:48', 1, 1, 'Active'),
(4, 'RICE', 'Lunch', 1, '2016-01-02 16:20:36', '0000-00-00 00:00:00', 1, 0, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `general_option`
--

CREATE TABLE IF NOT EXISTS `general_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `filed_name` varchar(255) NOT NULL,
  `field_value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `general_option`
--

INSERT INTO `general_option` (`id`, `type`, `filed_name`, `field_value`) VALUES
(1, 'blood_group', 'A+', 'A+'),
(2, 'blood_group', 'A-', 'A-'),
(3, 'blood_group', 'B+', 'B+'),
(4, 'blood_group', 'B-', 'B-'),
(5, 'blood_group', 'AB+', 'AB+'),
(6, 'blood_group', 'AB-', 'AB-'),
(7, 'blood_group', 'O+', 'O+'),
(8, 'blood_group', 'O-', 'O-');

-- --------------------------------------------------------

--
-- Table structure for table `holiday_master`
--

CREATE TABLE IF NOT EXISTS `holiday_master` (
  `holiday_code` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` varchar(30) NOT NULL,
  `end_date` varchar(30) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `type` enum('single','multi') NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `master_code` int(11) NOT NULL,
  PRIMARY KEY (`holiday_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `holiday_master`
--

INSERT INTO `holiday_master` (`holiday_code`, `start_date`, `end_date`, `title`, `description`, `type`, `create_date`, `update_date`, `create_by`, `update_by`, `status`, `master_code`) VALUES
(1, '02-01-2016', '01-02-2016', 'christmas week', 'merry christmas', 'multi', '2016-01-02 12:14:14', '2016-01-02 12:18:39', 1, 1, 'Active', 1),
(3, '12-01-2016', '17-01-2016', 'makar sankranti', 'mini vacation', 'multi', '2016-01-13 15:37:03', '2016-02-19 14:36:33', 1, 1, 'Active', 1),
(4, '13-01-2016', '', 'saturday', '2nd saturday off', 'single', '2016-01-13 15:38:02', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(5, '13-01-2016', ' ', 'swami bday', 'holiday', 'single', '2016-01-13 15:39:23', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(6, '19-08-2016', '', 'Rakshabandhan', 'Rakshabandhan', 'single', '2016-02-19 14:36:07', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(7, '26-01-2016', '', 'Republic Day', 'Republic Day', 'single', '2016-02-19 14:37:05', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(8, '23-03-2016', '24-03-2016', 'Holi', 'Holi', 'multi', '2016-02-19 14:37:38', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(9, '21-05-2016', '', 'saturday', '3rd Saturday off', 'single', '2016-05-20 10:48:02', '0000-00-00 00:00:00', 7, 0, 'Active', 2);

-- --------------------------------------------------------

--
-- Table structure for table `login_info`
--

CREATE TABLE IF NOT EXISTS `login_info` (
  `login_code` int(11) NOT NULL AUTO_INCREMENT,
  `usercode` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `browserdt` varchar(255) NOT NULL,
  `timedt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mac_address` varchar(255) NOT NULL,
  `logout_time` int(50) NOT NULL,
  `status` enum('Sucess','Failed') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `availeble` enum('N','Y') NOT NULL,
  `logintime` int(30) NOT NULL,
  `last_event` int(30) NOT NULL,
  PRIMARY KEY (`login_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=93 ;

--
-- Dumping data for table `login_info`
--

INSERT INTO `login_info` (`login_code`, `usercode`, `ip`, `browserdt`, `timedt`, `mac_address`, `logout_time`, `status`, `username`, `password`, `availeble`, `logintime`, `last_event`) VALUES
(1, 1, '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', '2016-01-25 10:39:55', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1453718395, 1453718395),
(2, 1, '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', '2016-02-11 08:57:11', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1455181031, 1455181031),
(3, 3, '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36', '2016-02-12 08:10:00', '', 0, 'Sucess', 'manali', '1234', 'Y', 1455264600, 1455264600),
(4, 1, '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36', '2016-02-13 08:32:14', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1455352334, 1455352334),
(5, 1, '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', '2016-02-19 06:36:55', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1455863815, 1455863815),
(6, 1, '180.211.117.81', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36', '2016-02-19 06:46:15', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1455864375, 1455864375),
(7, 0, '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36', '2016-02-19 20:05:14', '', 0, 'Failed', 'roshni', '1234', 'N', 0, 0),
(8, 1, '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36', '2016-02-19 09:36:15', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1455874575, 1455874575),
(9, 1, '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', '2016-02-19 11:57:36', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1455883056, 1455883056),
(10, 1, '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36', '2016-02-19 12:01:39', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1455883299, 1455883299),
(11, 0, '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36', '2016-03-02 23:00:30', '', 0, 'Failed', 'admin', 'admin', 'N', 0, 0),
(12, 0, '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36', '2016-03-02 23:00:39', '', 0, 'Failed', 'admin', 'admin', 'N', 0, 0),
(13, 1, '180.211.117.81', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36', '2016-03-03 07:17:12', '', 1456989432, 'Sucess', 'roshni', '123456', 'N', 1456989305, 1456989305),
(14, 0, '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36', '2016-03-18 15:00:31', '', 0, 'Failed', 'manali', '123456', 'N', 0, 0),
(15, 1, '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36', '2016-03-18 05:31:18', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1458279078, 1458279078),
(16, 1, '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:48.0) Gecko/20100101 Firefox/48.0', '2016-03-18 05:31:34', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1458279094, 1458279094),
(17, 0, '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36', '2016-03-18 15:33:25', '', 0, 'Failed', 'admin', '12345', 'N', 0, 0),
(18, 0, '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36', '2016-03-18 15:33:32', '', 0, 'Failed', 'admin', '123456', 'N', 0, 0),
(19, 0, '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36', '2016-03-18 15:33:37', '', 0, 'Failed', 'admin', 'admin', 'N', 0, 0),
(20, 0, '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36', '2016-03-18 15:33:42', '', 0, 'Failed', 'admin', '1234', 'N', 0, 0),
(21, 0, '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36', '2016-03-18 15:33:52', '', 0, 'Failed', 'admin', '123', 'N', 0, 0),
(22, 0, '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36', '2016-03-18 15:35:32', '', 0, 'Failed', 'admin', 'admin123', 'N', 0, 0),
(23, 0, '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36', '2016-03-18 15:35:43', '', 0, 'Failed', 'admin', 'admin123', 'N', 0, 0),
(24, 1, '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36', '2016-03-18 06:06:24', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1458281184, 1458281184),
(25, 1, '180.211.117.81', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36', '2016-03-18 08:56:08', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1458291368, 1458291368),
(26, 1, '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36', '2016-04-05 04:47:37', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1459831657, 1459831657),
(27, 1, '103.206.210.50', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36', '2016-04-05 04:48:36', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1459831716, 1459831716),
(28, 1, '103.206.210.50', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36', '2016-04-05 05:36:26', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1459834586, 1459834586),
(29, 1, '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36', '2016-04-09 08:39:33', '', 1460191173, 'Sucess', 'roshni', '123456', 'N', 1460190574, 1460190574),
(30, 0, '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36', '2016-04-09 18:09:40', '', 0, 'Failed', 'admin', 'admin', 'N', 0, 0),
(31, 0, '103.206.210.50', 'Mozilla/5.0 (Linux; Android 5.1.1; C6902 Build/14.6.A.1.236) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.105 Mobile Safari/537.36', '2016-04-09 18:16:24', '', 0, 'Failed', 'roshni', '12345', 'N', 0, 0),
(32, 0, '103.206.210.50', 'Mozilla/5.0 (Linux; Android 5.1.1; C6902 Build/14.6.A.1.236) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.105 Mobile Safari/537.36', '2016-04-09 18:16:37', '', 0, 'Failed', 'roshni', '12345', 'N', 0, 0),
(33, 1, '103.206.210.50', 'Mozilla/5.0 (Linux; Android 5.1.1; C6902 Build/14.6.A.1.236) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.105 Mobile Safari/537.36', '2016-04-09 08:46:54', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1460191614, 1460191614),
(34, 1, '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36', '2016-04-09 08:56:17', '', 1460192177, 'Sucess', 'roshni', '123456', 'N', 1460191760, 1460191760),
(35, 0, '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', '2016-05-16 18:26:08', '', 0, 'Failed', 'roshni', '12345', 'N', 0, 0),
(36, 1, '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', '2016-05-16 08:56:56', '', 1463389016, 'Sucess', 'roshni', '123456', 'N', 1463388976, 1463388976),
(37, 1, '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', '2016-05-16 08:58:26', '', 1463389106, 'Sucess', 'roshni', '123456', 'N', 1463389072, 1463389072),
(38, 0, '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', '2016-05-16 18:28:33', '', 0, 'Failed', 'admin', 'admin', 'N', 0, 0),
(39, 1, '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0', '2016-05-16 09:03:07', '', 1463389387, 'Sucess', 'roshni', '123456', 'N', 1463389119, 1463389119),
(40, 0, '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', '2016-05-16 18:28:40', '', 0, 'Failed', 'admin', 'admin@123', 'N', 0, 0),
(41, 0, '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', '2016-05-16 18:28:47', '', 0, 'Failed', 'admin', 'admin123', 'N', 0, 0),
(42, 0, '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', '2016-05-16 18:28:55', '', 0, 'Failed', 'admin', '12345', 'N', 0, 0),
(43, 0, '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', '2016-05-16 18:29:03', '', 0, 'Failed', 'admin', '123456', 'N', 0, 0),
(44, 1, '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', '2016-05-16 08:59:24', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1463389164, 1463389164),
(45, 1, '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', '2016-05-16 09:01:40', '', 1463389300, 'Sucess', 'roshni', '123456', 'N', 1463389164, 1463389164),
(46, 1, '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0', '2016-05-16 10:57:28', '', 1463396248, 'Sucess', 'roshni', '123456', 'N', 1463389441, 1463389441),
(47, 7, '103.206.210.50', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', '2016-05-16 09:47:35', '', 0, 'Sucess', 'arpita', '12345', 'Y', 1463392055, 1463392055),
(48, 7, '103.206.210.50', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', '2016-05-16 12:11:26', '', 1463400686, 'Sucess', 'arpita', '12345', 'N', 1463393987, 1463393987),
(49, 0, '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0', '2016-05-16 20:27:43', '', 0, 'Failed', 'anshu', '12345', 'N', 0, 0),
(50, 0, '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0', '2016-05-16 20:27:52', '', 0, 'Failed', 'Anshu', '12345', 'N', 0, 0),
(51, 3, '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0', '2016-05-16 10:58:13', '', 1463396293, 'Sucess', 'manali', '12345', 'N', 1463396279, 1463396279),
(52, 7, '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0', '2016-05-16 11:00:02', '', 1463396402, 'Sucess', 'arpita', '12345', 'N', 1463396301, 1463396301),
(53, 0, '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0', '2016-05-16 20:30:16', '', 0, 'Failed', 'hitesh', '123', 'N', 0, 0),
(54, 0, '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0', '2016-05-16 20:30:24', '', 0, 'Failed', 'hitesh', '12345', 'N', 0, 0),
(55, 3, '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0', '2016-05-16 11:00:39', '', 0, 'Sucess', 'manali', '12345', 'Y', 1463396439, 1463396439),
(56, 0, '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0', '2016-05-16 20:30:53', '', 0, 'Failed', 'patel', '12345', 'N', 0, 0),
(57, 1, '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0', '2016-05-16 11:02:01', '', 1463396521, 'Sucess', 'roshni', '123456', 'N', 1463396469, 1463396469),
(58, 0, '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0', '2016-05-16 20:32:09', '', 0, 'Failed', 'Arpita', '123', 'N', 0, 0),
(59, 7, '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0', '2016-05-16 11:02:30', '', 1463396550, 'Sucess', 'arpita', '12345', 'N', 1463396536, 1463396536),
(60, 0, '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0', '2016-05-16 20:32:44', '', 0, 'Failed', 'anshu ', '12345', 'N', 0, 0),
(61, 0, '103.206.210.50', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0', '2016-05-16 20:32:54', '', 0, 'Failed', 'Anshu', '12345', 'N', 0, 0),
(62, 8, '103.206.210.50', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', '2016-05-20 05:14:18', '', 1463721258, 'Sucess', 'Anshu', '123', 'N', 1463721180, 1463721180),
(63, 3, '103.206.210.50', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', '2016-05-20 05:15:00', '', 1463721300, 'Sucess', 'manali', '12345', 'N', 1463721273, 1463721273),
(64, 0, '103.206.210.50', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', '2016-05-20 14:45:33', '', 0, 'Failed', 'ar', '*!%%@Hitesh', 'N', 0, 0),
(65, 7, '103.206.210.50', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', '2016-05-20 10:27:22', '', 1463740042, 'Sucess', 'arpita', '12345', 'N', 1463721346, 1463721346),
(66, 1, '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', '2016-10-12 06:43:11', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1476254591, 1476254591),
(67, 0, '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', '2016-10-13 04:02:43', '', 0, 'Failed', 'admin', '12345', 'N', 0, 0),
(68, 0, '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', '2016-10-13 04:02:48', '', 0, 'Failed', 'admin', '12345', 'N', 0, 0),
(69, 1, '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', '2016-10-13 04:02:52', '', 0, 'Sucess', 'admin', '123456', 'Y', 1476331372, 1476331372),
(70, 0, '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', '2016-10-13 04:09:07', '', 0, 'Failed', 'admin', '12345', 'N', 0, 0),
(71, 1, '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', '2016-10-13 04:09:21', '', 0, 'Sucess', 'admin', '123456', 'Y', 1476331761, 1476331761),
(72, 1, '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', '2016-10-13 04:18:19', '', 0, 'Sucess', 'admin', '123456', 'Y', 1476332299, 1476332299),
(73, 1, '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', '2016-10-17 08:40:03', '', 0, 'Sucess', 'admin', '123456', 'Y', 1476693603, 1476693603),
(74, 0, '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', '2016-10-18 07:22:19', '', 0, 'Failed', 'admin', '12345', 'N', 0, 0),
(75, 0, '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', '2016-10-18 07:22:29', '', 0, 'Failed', 'sspiadmin', '12345', 'N', 0, 0),
(76, 1, '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', '2016-10-18 07:22:35', '', 0, 'Sucess', 'admin', '123456', 'Y', 1476775355, 1476775355),
(77, 1, '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', '2016-10-18 07:29:20', '', 0, 'Sucess', 'admin', '123456', 'Y', 1476775760, 1476775760),
(78, 1, '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', '2016-10-18 08:32:07', '', 0, 'Sucess', 'admin', '123456', 'Y', 1476779527, 1476779527),
(79, 1, '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', '2016-10-18 08:37:19', '', 0, 'Sucess', 'admin', '123456', 'Y', 1476779839, 1476779839),
(80, 1, '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', '2016-10-18 08:58:16', '', 0, 'Sucess', 'admin', '123456', 'Y', 1476781096, 1476781096),
(81, 1, '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', '2016-10-18 08:59:22', '', 0, 'Sucess', 'admin', '123456', 'Y', 1476781162, 1476781162),
(82, 0, '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', '2016-10-18 10:02:58', '', 0, 'Failed', 'admin', '12345', 'N', 0, 0),
(83, 1, '172.16.16.23', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', '2016-10-18 10:03:06', '', 0, 'Sucess', 'admin', '123456', 'Y', 1476784986, 1476784986),
(84, 0, '172.16.16.53', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36', '2016-10-18 11:07:48', '', 0, 'Failed', 'admin', '12345', 'N', 0, 0),
(85, 0, '172.16.16.53', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36', '2016-10-18 11:07:53', '', 0, 'Failed', 'sspadmin', '12345', 'N', 0, 0),
(86, 0, '172.16.16.53', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36', '2016-10-18 11:07:58', '', 0, 'Failed', 'sspadmin', '123456', 'N', 0, 0),
(87, 0, '172.16.16.53', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36', '2016-10-18 11:09:22', '', 0, 'Failed', 'sspadmin', '12345', 'N', 0, 0),
(88, 0, '172.16.16.53', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36', '2016-10-18 11:09:35', '', 0, 'Failed', 'sspadmin', '12345', 'N', 0, 0),
(89, 0, '172.16.16.53', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36', '2016-10-18 11:10:46', '', 0, 'Failed', 'sspadmin', '123456', 'N', 0, 0),
(90, 0, '172.16.16.53', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36', '2016-10-18 11:10:57', '', 0, 'Failed', 'sspadmin', '123456', 'N', 0, 0),
(91, 0, '172.16.16.53', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36', '2016-10-18 11:11:11', '', 0, 'Failed', 'sspadmin', '123456', 'N', 0, 0),
(92, 1, '172.16.16.53', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36', '2016-10-18 11:11:51', '', 0, 'Sucess', 'admin', '123456', 'Y', 1476789111, 1476789111);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `noti_code` int(11) NOT NULL AUTO_INCREMENT,
  `noti_title` varchar(255) NOT NULL,
  `noti_desc` text NOT NULL,
  `noti_date` varchar(250) NOT NULL,
  `send_type` varchar(255) NOT NULL,
  `standard_code` int(11) NOT NULL,
  `with_sms` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `master_code` int(11) NOT NULL,
  PRIMARY KEY (`noti_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`noti_code`, `noti_title`, `noti_desc`, `noti_date`, `send_type`, `standard_code`, `with_sms`, `create_date`, `update_date`, `create_by`, `update_by`, `status`, `master_code`) VALUES
(1, 'event', 'details', '01-01-2016', 'Selected_Student', 5, 'Y', '2016-01-01 16:35:53', '0000-00-00 00:00:00', 1, 0, 'Delete', 1),
(2, 'event', 'details', '01-01-2016', 'Selected_Student', 5, 'Y', '2016-01-01 16:37:19', '0000-00-00 00:00:00', 1, 0, 'Delete', 1),
(3, 'event', 'details', '01-01-2016', 'Selected_Student', 5, 'Y', '2016-01-01 16:37:47', '0000-00-00 00:00:00', 1, 0, 'Delete', 1),
(4, 'event', 'details', '01-01-\r\n\r\n2016', 'Selected_Student', 5, 'Y', '2016-01-01 16:37:56', '0000-00-00 00:00:00', 1, 0, 'Delete', 1),
(5, 'Hello H', 'Test from H', '18-03-2016', 'All_Student', 0, '', '2016-03-18 11:08:10', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(6, 'dfg', 'df', '18-03-2016', 'All_Student', 0, '', '2016-03-18 11:37:03', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(7, 'sdf', 'dsf', '18-03-2016', 'All_Student', 0, '', '2016-03-18 11:39:23', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(8, 'sdfsdfsdfsdfsd', 'sdfsdsfsdfsdfsf', '18-03-2016', 'All_Student', 0, '', '2016-03-18 11:40:17', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(9, 'jg', 'khh', '18-03-2016', 'All_Student', 0, '', '2016-03-18 11:50:46', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(10, 'sdf', 'sdf', '18-03-2016', 'All_Student', 0, '', '2016-03-18 11:52:17', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(11, 'dssd', 'sd', '18-03-2016', 'All_Student', 0, '', '2016-03-18 11:54:07', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(12, 'fgh', 'fgh', '18-03-2016', 'All_Student', 0, '', '2016-03-18 11:54:32', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(13, 'asd', 'asd', '18-03-2016', 'All_Student', 0, '', '2016-03-18 12:44:30', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(14, 'sdfs', 'sdef', '18-03-2016', 'All_Student', 0, '', '2016-03-18 13:39:04', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(15, 'gf', 'gf', '18-03-2016', 'All_Student', 0, '', '2016-03-18 13:45:25', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(16, 'holi', 'holiday', '18-03-2016', 'All_Student', 4, '', '2016-03-18 14:28:50', '0000-00-00 00:00:00', 1, 0, 'Delete', 1),
(17, 'demo', 'hello', '18-03-2016', 'All_Student', 0, '', '2016-03-18 14:31:53', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(18, '12', '15', '18-03-2016', 'All_Student', 0, '', '2016-03-18 14:33:32', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(19, 'noti', 'demo push', '18-03-2016', 'All_Student', 0, '', '2016-03-18 14:34:47', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(20, 'testing', 'Hello', '09-04-2016', 'All_Student', 0, '', '2016-04-09 14:00:53', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(21, 'sdf', 'sdf', '09-04-2016', 'All_Student', 0, '', '2016-04-09 14:01:38', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(22, 'aaa', 'aaa', '09-04-2016', 'All_Student', 0, '', '2016-04-09 14:02:54', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(23, 'testing', 'ok', '09-04-2016', 'Selected_Student', 5, '', '2016-04-09 14:04:17', '0000-00-00 00:00:00', 1, 0, 'Delete', 1),
(24, '6+', '565', '09-04-2016', 'All_Student', 0, '', '2016-04-09 14:04:36', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(25, 'Hello Test', 'Demo', '09-04-2016', 'Selected_Standard', 5, '', '2016-04-09 14:07:02', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(26, 'Hey..', 'Test from you soon', '09-04-2016', 'Selected_Standard', 5, '', '2016-04-09 14:18:01', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(27, 'test from H', 'hello Alll', '16-05-2016', 'All_Student', 3, '', '2016-05-16 14:43:50', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(28, 'Hello AAAAAAa', 'hello from A', '16-05-2016', 'All_Student', 5, '', '2016-05-16 14:45:52', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(29, 'welcome', 'welcome', '16-05-2016', 'Selected_Student', 7, '', '2016-05-16 16:48:48', '0000-00-00 00:00:00', 7, 0, 'Active', 2),
(30, 'gfgdfgdfg', 'fgfgfdgfdgdfgfdgfdgfgfgfgfgfg', '18-10-2016', 'All_Student', 0, 'Y', '2016-10-18 16:52:36', '0000-00-00 00:00:00', 1, 0, 'Active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification_dt`
--

CREATE TABLE IF NOT EXISTS `notification_dt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `noti_code` int(11) NOT NULL,
  `EndCode` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `notification_dt`
--

INSERT INTO `notification_dt` (`id`, `noti_code`, `EndCode`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 23, 1),
(6, 29, 6);

-- --------------------------------------------------------

--
-- Table structure for table `result_master`
--

CREATE TABLE IF NOT EXISTS `result_master` (
  `result_code` int(11) NOT NULL AUTO_INCREMENT,
  `student_yearly_code` int(11) NOT NULL,
  `standard_code` int(11) NOT NULL,
  `division_code` int(11) NOT NULL,
  `subject_code` int(11) NOT NULL,
  `exam_type_code` int(11) NOT NULL,
  `marks` int(11) NOT NULL,
  `account_year_code` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `master_code` int(11) NOT NULL,
  PRIMARY KEY (`result_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `result_master`
--

INSERT INTO `result_master` (`result_code`, `student_yearly_code`, `standard_code`, `division_code`, `subject_code`, `exam_type_code`, `marks`, `account_year_code`, `create_date`, `create_by`, `status`, `master_code`) VALUES
(28, 2, 1, 0, 9, 2, 0, 1, '2016-01-11 15:44:55', 1, 'Active', 1),
(29, 3, 1, 0, 9, 2, 24, 1, '2016-01-11 15:44:55', 1, 'Active', 1),
(39, 1, 5, 3, 1, 2, 23, 1, '2016-02-13 14:19:01', 1, 'Active', 1),
(40, 3, 1, 0, 8, 1, 20, 1, '2016-02-13 14:19:21', 1, 'Active', 1),
(62, 2, 4, 2, 2, 2, 26, 1, '2016-02-13 14:52:01', 1, 'Active', 1),
(63, 1, 5, 3, 7, 2, 27, 1, '2016-02-19 15:14:53', 1, 'Active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `school_master`
--

CREATE TABLE IF NOT EXISTS `school_master` (
  `school_code` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `emailid` varchar(70) NOT NULL,
  `mobileno` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_img` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `create_by` varchar(40) NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  PRIMARY KEY (`school_code`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `school_master`
--

INSERT INTO `school_master` (`school_code`, `name`, `emailid`, `mobileno`, `phone_no`, `country`, `state`, `city`, `username`, `password`, `user_img`, `create_date`, `update_date`, `create_by`, `update_by`, `status`) VALUES
(1, 'DN High School', 'dn@gmail.com', '0987654321', '123456', '1', '1', '1', 'roshni', '123456', 'Admin__5767243Tulips.jpg', '2015-12-31 14:51:12', '0000-00-00 00:00:00', 'Super Admin', '', 'Active'),
(2, 'Arpita International School', 'arpita@gmail.com', '1234567890', '', '1', '1', '1', 'arpita', '12345', '', '2016-05-16 14:56:09', '2016-05-16 15:49:23', 'Super Admin', 'Super Admin', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `send_msg_dt`
--

CREATE TABLE IF NOT EXISTS `send_msg_dt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_code` int(11) NOT NULL,
  `EndCode` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `send_msg_dt`
--

INSERT INTO `send_msg_dt` (`id`, `msg_code`, `EndCode`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1),
(12, 12, 1),
(13, 13, 1),
(14, 14, 1),
(15, 15, 1),
(16, 18, 1),
(17, 19, 1),
(18, 20, 1),
(19, 21, 6);

-- --------------------------------------------------------

--
-- Table structure for table `send_msg_master`
--

CREATE TABLE IF NOT EXISTS `send_msg_master` (
  `msg_code` int(11) NOT NULL AUTO_INCREMENT,
  `msg_desc` text NOT NULL,
  `msg_date` varchar(11) NOT NULL,
  `send_type` varchar(255) NOT NULL,
  `standard_code` int(11) NOT NULL,
  `other_mobile_no` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `master_code` int(11) NOT NULL,
  PRIMARY KEY (`msg_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `send_msg_master`
--

INSERT INTO `send_msg_master` (`msg_code`, `msg_desc`, `msg_date`, `send_type`, `standard_code`, `other_mobile_no`, `create_date`, `update_date`, `create_by`, `update_by`, `status`, `master_code`) VALUES
(1, 'hi', '01-01\r\n\r\n-2', 'Selected_Student', 5, '', '2016-01-01 14:58:02', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(2, 'hii', '01-01-2016', 'Selected_Student', 5, '', '2016-01-01 16:52:07', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(3, 'hii', '01-01-2016', 'Selected_Student', 5, '', '2016-01-01 16:52:42', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(4, 'hii', '01-01-\r\n\r\n2', 'Selected_Student', 5, '', '2016-01-01 16:52:45', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(5, 'hii', '01-01-2016', 'Selected_Student', 5, '', '2016-01-01 16:53:28', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(6, 'hii', '01-01-2016', 'Selected_Student', 5, '', '2016-01-01 16:53:32', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(7, 'hii', '01-01-\r\n\r\n2', 'Selected_Student', 5, '', '2016-01-01 16:54:39', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(8, 'hii', '01-01-2016', 'Selected_Student', 5, '', '2016-01-01 16:55:35', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(9, 'hii', '01-01-2016', 'Selected_Student', 5, '', '2016-01-01 16:55:58', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(10, 'hii', '01-01-\r\n\r\n2', 'Selected_Student', 5, '', '2016-01-01 16:56:00', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(11, 'hii', '01-01-2016', 'Selected_Student', 5, '', '2016-01-01 16:56:11', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(12, 'hii', '01-01-2016', 'Selected_Student', 5, '', '2016-01-01 16:58:25', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(13, 'hii', '01-\r\n\r\n01-2', 'Selected_Student', 5, '', '2016-01-01 16:58:40', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(14, 'hii', '01-01-2016', 'Selected_Student', 5, '', '2016-01-01 17:01:23', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(15, 'hi', '02-01-2016', 'Selected_Student', 5, '', '2016-01-02 09:13:58', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(16, 'heloo', '02-\r\n\r\n01-2', 'All_Student', 0, '', '2016-01-02 09:27:56', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(17, 'heloo', '02-01-2016', 'All_Student', 0, '', '2016-01-02 10:24:09', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(18, '123', '04-01-2016', 'Selected_Student', 5, '', '2016-01-04 16:32:33', '0000-00-00 00:00:00', 1, 0, 'Delete', 1),
(19, '123', '04-\r\n\r\n01-2', 'Selected_Student', 5, '', '2016-01-04 16:40:42', '0000-00-00 00:00:00', 1, 0, 'Delete', 1),
(20, '123', '04-01-2016', 'Selected_Student', 5, '', '2016-01-04 16:43:10', '0000-00-00 00:00:00', 1, 0, 'Delete', 1),
(21, 'tomorrow is holiday.', '16-05-2016', 'Selected_Student', 7, '', '2016-05-16 17:02:10', '0000-00-00 00:00:00', 7, 0, 'Active', 2);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `lecture` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `school_img` varchar(255) NOT NULL,
  `school_logo` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `master_code` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `url`, `lecture`, `name`, `school_img`, `school_logo`, `address`, `email`, `phone`, `mobile`, `master_code`, `create_date`, `update_date`, `create_by`, `update_by`) VALUES
(1, 'http://ip.shreesms.net/smsserver/SMS10N.aspx?\n\nUserid=DhSoni&UserPassword=126&PhoneNumber={number}&Text={message}&GSM=VISSCL', 4, 'Phoenix school Anand', 'school_img_1_3542996slide-1.jpg', 'school_logo_1_567383icon.png', 'Anand,Gujarat.', 'admin@phoenix.com', 2147483647, '9999999999', 1, '2016-01-05 13:39:38', '2016-04-09 14:25:49', 1, 1),
(2, 'http://u4ritt5y', 5, 'Arpita International school', 'school_img_2_1102251arpitaschool.jpg', 'school_logo_2_5438758schoollogo.jpg', '3rd Floor ''Radhaswami pavan'' Building\nNear NS patel collage circle,\nAnand-388120\nGujarat - INDIA', 'arpita@gmail.com', 12345, '1234567890', 2, '2016-05-16 15:37:13', '2016-05-16 15:38:44', 7, 7);

-- --------------------------------------------------------

--
-- Table structure for table `sms_gateway_mst`
--

CREATE TABLE IF NOT EXISTS `sms_gateway_mst` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  `master_code` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sms_gateway_mst`
--

INSERT INTO `sms_gateway_mst` (`id`, `url`, `create_date`, `update_date`, `create_by`, `update_by`, `master_code`) VALUES
(1, 'http://ip.shreesms.net/smsserver/SMS10N.aspx?\r\n\r\nUserid=DhavalSoni&UserPassword=123456&PhoneNumber={number}&Text={message}&GSM=VISSCL', '2016-01-01 12:29:12', '2016-01-01 13:24:19', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sms_send_login_dt`
--

CREATE TABLE IF NOT EXISTS `sms_send_login_dt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_code` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `timedt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `standard_code` int(11) NOT NULL,
  `message` text NOT NULL,
  `master_code` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sms_send_login_dt`
--

INSERT INTO `sms_send_login_dt` (`id`, `student_code`, `status`, `timedt`, `standard_code`, `message`, `master_code`) VALUES
(1, 1, 'FLASE', '2016-01-05 09:19:31', 5, '{"number":"917654345444","message":"Vatsalya+International+School\r\n\r\n%5CnUsername%3A+manali%5CnPassword%3A+123%5CnDownlaod+App+https%3A%2F%2Fgoo.gl\r\n\r\n%2FzGFNEY","url":[{"url":"http:\\/\\/ip.shreesms.net\\/smsserver\\/SMS10N.aspx?\r\n\r\nUserid=DhavalSoni&UserPassword=123456&PhoneNumber={number}&Text={message}\r\n\r\n&GSM=VISSCL"}]}', 1),
(2, 2, 'OK', '2016-05-16 09:07:59', 4, '{"number":"916767677688","message":"Vatsalya+International+School%5CnUsername%3A+juhi%5CnPassword%3A+123%5CnDownlaod+App+https%3A%2F%2Fgoo.gl%2FzGFNEY","url":"http:\\/\\/ip.shreesms.net\\/smsserver\\/SMS10N.aspx?\\n\\nUserid=DhSoni&UserPassword=126&PhoneNumber=916767677688&Text=Vatsalya+International+School%5CnUsername%3A+juhi%5CnPassword%3A+123%5CnDownlaod+App+https%3A%2F%2Fgoo.gl%2FzGFNEY&GSM=VISSCL"}', 1),
(3, 6, 'FALSE', '2016-05-16 11:21:47', 7, '{"number":"911245688899","message":"Vatsalya+International+School%5CnUsername%3A+Anshu%5CnPassword%3A+123%5CnDownlaod+App+https%3A%2F%2Fgoo.gl%2FzGFNEY","url":"http:\\/\\/u4ritt5y"}', 2);

-- --------------------------------------------------------

--
-- Table structure for table `standard_master`
--

CREATE TABLE IF NOT EXISTS `standard_master` (
  `standard_code` int(11) NOT NULL AUTO_INCREMENT,
  `standard_name` varchar(255) NOT NULL,
  `division` enum('Y','N') NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `master_code` int(11) NOT NULL,
  PRIMARY KEY (`standard_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `standard_master`
--

INSERT INTO `standard_master` (`standard_code`, `standard_name`, `division`, `create_date`, `update_date`, `create_by`, `update_by`, `status`, `master_code`) VALUES
(1, 'JR KG', 'N', '2015-12-31 14:52:40', '2015-12-31 14:53:00', 1, 1, 'Active', 1),
(2, 'SR KG', 'N', '2015-12-31 14:52:47', '2015-12-31 14:52:54', 1, 1, 'Active', 1),
(3, 'STD 1', 'Y', '2015-12-31 14:53:07', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(4, 'STD 2', 'Y', '2015-12-31 14:53:14', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(5, 'STD 3', 'Y', '2015-12-31 14:53:22', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(6, 'STD 4', 'N', '2016-01-08 12:40:30', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(7, '1', 'Y', '2016-05-16 15:40:18', '0000-00-00 00:00:00', 7, 0, 'Active', 2),
(8, '2', 'Y', '2016-05-16 15:40:36', '0000-00-00 00:00:00', 7, 0, 'Active', 2),
(9, '3', 'N', '2016-05-16 15:40:47', '0000-00-00 00:00:00', 7, 0, 'Active', 2),
(10, '4', 'N', '2016-05-16 15:41:00', '0000-00-00 00:00:00', 7, 0, 'Active', 2),
(11, 'STD 5', 'Y', '2016-10-12 12:18:08', '2016-10-12 12:20:41', 1, 1, 'Active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `stateid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `countryid` int(11) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`stateid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`stateid`, `name`, `countryid`, `status`, `create_date`, `update_date`) VALUES
(1, 'Gujarat', 1, 'Active', '2015-12-31 14:41:36', '0000-00-00 00:00:00'),
(2, 'Rajasthan', 1, 'Active', '2015-12-31 14:41:46', '0000-00-00 00:00:00'),
(3, 'New York', 2, 'Active', '2015-12-31 14:42:30', '0000-00-00 00:00:00'),
(4, 'New Jersey', 2, 'Active', '2015-12-31 14:42:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `student_master`
--

CREATE TABLE IF NOT EXISTS `student_master` (
  `student_code` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `sur_name` varchar(255) NOT NULL,
  `admission_dt` varchar(255) NOT NULL,
  `birthdt` varchar(255) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `bloodgrop` varchar(50) NOT NULL,
  `student_address` varchar(255) NOT NULL,
  `city_code` int(11) NOT NULL,
  `country_code` int(11) NOT NULL,
  `state_code` int(11) NOT NULL,
  `student_photo` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `emailid` varchar(255) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `guardian_first_name` varchar(255) NOT NULL,
  `guardian_sur_name` varchar(255) NOT NULL,
  `guardian_middle_name` varchar(255) NOT NULL,
  `guardian_mobile_no` varchar(255) NOT NULL,
  `guardian_phone_no` varchar(255) NOT NULL,
  `guardian_email` varchar(255) NOT NULL,
  `g_country_code` int(11) NOT NULL,
  `g_state_code` int(11) NOT NULL,
  `g_city_code` int(11) NOT NULL,
  `guardian_address` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  `master_code` int(11) NOT NULL,
  PRIMARY KEY (`student_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `student_master`
--

INSERT INTO `student_master` (`student_code`, `first_name`, `middle_name`, `sur_name`, `admission_dt`, `birthdt`, `gender`, `bloodgrop`, `student_address`, `city_code`, `country_code`, `state_code`, `student_photo`, `phone`, `emailid`, `status`, `guardian_first_name`, `guardian_sur_name`, `guardian_middle_name`, `guardian_mobile_no`, `guardian_phone_no`, `guardian_email`, `g_country_code`, `g_state_code`, `g_city_code`, `guardian_address`, `create_date`, `update_date`, `create_by`, `update_by`, `master_code`) VALUES
(1, 'manali', 'harsh', 'Shah', '31-12-2015', '27-12-2009', 'F', 'B\r\n\r\n+', 'N.s.Patel circle, \r\nAnand, Gujarat.', 1, 1, 1, 'stud_1_5130063Koala.jpg', '7654345444', 'manali@gmail.com', 'Active', 'JUHI', 'Shah', '', '7878878787', '787883', 'juhi@gmail.com', 2, 4, 9, 'Supermarket,\r\nAnand,\r\nGujarat.', '2015-12-31 15:05:15', '0000-00-00 00:00:00', 1, 0, 1),
(2, 'juhi', 'r', 'shah', '08-01-2016', '05-01-2013', 'F', 'B-', 'Super market, Anand, Gujarat.', 1, 1, 1, 'stud_1_8583039Desert.jpg', '6767677688', 'juhi@gmail.com', 'Active', 'roshni', 'mansuri', 'n', '9898989898', '93874343', 'rosh@gmail.com', 1, 1, 1, 'khambhat,anand. gujarat', '2016-01-08 12:01:12', '0000-00-00 00:00:00', 1, 0, 1),
(3, 'jitu', 'a', 'rajpurohit', '08-01-2016', '06-01-2013', 'M', 'A-', '', 0, 1, 0, '', '9898989899', 'jitu@gmail.com', 'Active', '', '', '', '', '', '', 0, 0, 0, '', '2016-01-08 12:21:26', '0000-00-00 00:00:00', 1, 0, 1),
(4, 'daxeshkumar', 'nileshkumar', 'prajapati', '05-04-2016', '24-10-1988', 'M', 'A+', 'Kalyan anand', 1, 1, 1, 'stud_1_896193Daxesh.jpg', '8690176813', 'dxsprajapati@gmail.com', 'Active', '', '', '', '', '', '', 0, 0, 0, '', '2016-04-05 10:21:21', '0000-00-00 00:00:00', 1, 0, 1),
(5, 'Arpita', 'V', 'Jadav', '16-05-2016', '03-02-2000', '', '', 'asdfasd asdfasd2324df', 0, 0, 0, '', '1234567890', 'arpita@gmail.com', 'Active', '', '', '', '', '', '', 0, 0, 0, '', '2016-05-16 14:35:41', '0000-00-00 00:00:00', 1, 0, 1),
(6, 'Anshu', 'a', 'Shah', '16-05-2016', '10-11-2009', 'M', 'AB+', 'Anand', 1, 1, 1, 'stud_2_1024976anshu.jpg', '1245688899', 'anshu@gmail.com', 'Active', 'Amit', 'shah', 'Ashvinbhai', '4578965478', '45612', 'amit@gmail.com', 1, 1, 1, 'Anand', '2016-05-16 16:17:16', '0000-00-00 00:00:00', 7, 0, 2),
(7, 'hitesh', 'm', 'patel', '16-05-2016', '01-05-1999', '', '', '', 0, 0, 0, '', '', '', 'Active', '', '', '', '', '', '', 0, 0, 0, '', '2016-05-16 16:29:39', '0000-00-00 00:00:00', 7, 0, 2),
(8, 'Minesh', 'M', 'Chauhan', '12-10-2016', '08-08-1994', 'M', 'A+', 'vadtal', 1, 1, 1, 'stud_1_9050425minesh-chauhan.jpg', '7894323093', 'mins@gmail.com', 'Active', '', '', '', '', '', '', 0, 0, 0, '', '2016-10-12 12:23:29', '0000-00-00 00:00:00', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_yearly_acccount`
--

CREATE TABLE IF NOT EXISTS `student_yearly_acccount` (
  `student_yearly_code` int(11) NOT NULL AUTO_INCREMENT,
  `student_code` int(11) NOT NULL,
  `current_standard` int(11) NOT NULL,
  `account_year_code` int(11) NOT NULL,
  `division_code` int(11) NOT NULL,
  `timedt` varchar(255) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `master_code` int(11) NOT NULL,
  PRIMARY KEY (`student_yearly_code`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `student_yearly_acccount`
--

INSERT INTO `student_yearly_acccount` (`student_yearly_code`, `student_code`, `current_standard`, `account_year_code`, `division_code`, `timedt`, `status`, `master_code`) VALUES
(1, 1, 5, 1, 3, '31-12-2015', 'Active', 1),
(2, 2, 4, 1, 2, '08-01-2016', 'Active', 1),
(3, 3, 1, 1, 0, '08-01-2016', 'Active', 1),
(4, 4, 3, 1, 1, '05-04-2016', 'Active', 1),
(5, 5, 4, 1, 2, '16-05-2016', 'Active', 1),
(6, 6, 7, 2, 6, '16-05-2016', 'Active', 2),
(7, 7, 8, 2, 9, '16-05-2016', 'Active', 2),
(8, 8, 11, 1, 11, '12-10-2016', 'Active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject_master`
--

CREATE TABLE IF NOT EXISTS `subject_master` (
  `subject_code` int(11) NOT NULL AUTO_INCREMENT,
  `standard_code` int(11) NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  `master_code` int(11) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  PRIMARY KEY (`subject_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `subject_master`
--

INSERT INTO `subject_master` (`subject_code`, `standard_code`, `subject_id`, `subject_name`, `create_date`, `update_date`, `create_by`, `update_by`, `master_code`, `status`) VALUES
(1, 5, '43', 'science', '2016-01-05 15:02:32', '2016-01-05 15:46:07', 1, 1, 1, 'Active'),
(2, 4, '23', 'History', '2016-01-05 15:03:30', '2016-01-05 15:46:36', 1, 1, 1, 'Active'),
(7, 5, '1234', 'sanskrit', '2016-01-05 15:29:51', '0000-00-00 00:00:00', 1, 0, 1, 'Active'),
(8, 1, '123', 'Story', '2016-01-08 11:40:37', '0000-00-00 00:00:00', 1, 0, 1, 'Active'),
(9, 1, '44', 'Playing', '2016-01-08 11:40:46', '0000-00-00 00:00:00', 1, 0, 1, 'Active'),
(10, 6, 'English', '00002', '2016-01-12 09:42:38', '0000-00-00 00:00:00', 1, 0, 1, 'Active'),
(11, 7, '1_maths', 'Mathematics', '2016-05-16 15:44:13', '0000-00-00 00:00:00', 7, 0, 2, 'Active'),
(12, 7, '1_hin', 'Hindi', '2016-05-16 15:44:35', '2016-05-16 15:53:21', 7, 7, 2, 'Active'),
(13, 7, '1_eng', 'English', '2016-05-16 15:44:53', '0000-00-00 00:00:00', 7, 0, 2, 'Active'),
(14, 7, '1_sci', 'Science', '2016-05-16 15:45:22', '0000-00-00 00:00:00', 7, 0, 2, 'Active'),
(15, 8, '2_maths', 'Mathematics', '2016-05-16 15:46:25', '2016-05-16 15:46:44', 7, 7, 2, 'Active'),
(16, 8, '2_hin', 'Hindi', '2016-05-16 15:47:03', '2016-05-16 15:53:45', 7, 7, 2, 'Active'),
(17, 8, '2_eng', 'English', '2016-05-16 15:47:23', '0000-00-00 00:00:00', 7, 0, 2, 'Active'),
(18, 8, '2_sci', 'Science', '2016-05-16 15:51:04', '0000-00-00 00:00:00', 7, 0, 2, 'Active'),
(19, 8, '2_soc', 'Social Studies', '2016-05-16 15:51:59', '0000-00-00 00:00:00', 7, 0, 2, 'Active'),
(20, 9, '3_maths', 'Mathematics', '2016-05-16 15:54:11', '0000-00-00 00:00:00', 7, 0, 2, 'Active'),
(21, 9, '3_eng', 'English', '2016-05-16 15:54:35', '0000-00-00 00:00:00', 7, 0, 2, 'Active'),
(22, 9, '3_hin', 'Hindi', '2016-05-16 15:54:52', '0000-00-00 00:00:00', 7, 0, 2, 'Active'),
(23, 9, '3_sci', 'Science', '2016-05-16 15:55:20', '0000-00-00 00:00:00', 7, 0, 2, 'Active'),
(24, 9, '3_guj', 'Gujarati', '2016-05-16 15:55:33', '0000-00-00 00:00:00', 7, 0, 2, 'Active'),
(25, 9, '3_soc', 'Social Studies', '2016-05-16 15:55:57', '0000-00-00 00:00:00', 7, 0, 2, 'Active'),
(26, 11, '1', 'HISTORY', '2016-10-12 12:19:04', '0000-00-00 00:00:00', 1, 0, 1, 'Active'),
(27, 11, '2', 'SOCIALS SCIENCE', '2016-10-12 12:19:18', '0000-00-00 00:00:00', 1, 0, 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `timetable_master`
--

CREATE TABLE IF NOT EXISTS `timetable_master` (
  `timetable_code` int(11) NOT NULL AUTO_INCREMENT,
  `standard_code` int(11) NOT NULL,
  `division_code` int(11) NOT NULL,
  `day` varchar(255) NOT NULL,
  `lecture` varchar(255) NOT NULL,
  `lecture_minutes` varchar(10) NOT NULL,
  `s_time` varchar(255) NOT NULL,
  `e_time` varchar(255) NOT NULL,
  `recess` enum('N','Y') NOT NULL DEFAULT 'N',
  `recess_minutes` varchar(10) NOT NULL,
  `recess_to` varchar(50) NOT NULL,
  `recess_from` varchar(50) NOT NULL,
  `subject_code` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL,
  `master_code` int(11) NOT NULL,
  PRIMARY KEY (`timetable_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=529 ;

--
-- Dumping data for table `timetable_master`
--

INSERT INTO `timetable_master` (`timetable_code`, `standard_code`, `division_code`, `day`, `lecture`, `lecture_minutes`, `s_time`, `e_time`, `recess`, `recess_minutes`, `recess_to`, `recess_from`, `subject_code`, `create_date`, `create_by`, `master_code`) VALUES
(169, 5, 3, '1', '1', '', '11:20 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:23:09', 1, 1),
(170, 5, 3, '1', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:23:09', 1, 1),
(171, 5, 3, '1', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:23:09', 1, 1),
(172, 5, 3, '1', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:23:09', 1, 1),
(173, 5, 3, '2', '1', '', '11:20 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:23:09', 1, 1),
(174, 5, 3, '2', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:23:09', 1, 1),
(175, 5, 3, '2', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:23:09', 1, 1),
(176, 5, 3, '2', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:23:09', 1, 1),
(177, 5, 3, '3', '1', '', '11:20 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:23:09', 1, 1),
(178, 5, 3, '3', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:23:09', 1, 1),
(179, 5, 3, '3', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:23:09', 1, 1),
(180, 5, 3, '3', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:23:09', 1, 1),
(181, 5, 3, '4', '1', '', '11:20 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:23:09', 1, 1),
(182, 5, 3, '4', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:23:09', 1, 1),
(183, 5, 3, '4', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:23:09', 1, 1),
(184, 5, 3, '4', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:23:09', 1, 1),
(185, 5, 3, '5', '1', '', '11:20 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:23:09', 1, 1),
(186, 5, 3, '5', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:23:09', 1, 1),
(187, 5, 3, '5', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:23:09', 1, 1),
(188, 5, 3, '5', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:23:09', 1, 1),
(189, 5, 3, '6', '1', '', '11:20 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:23:09', 1, 1),
(190, 5, 3, '6', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:23:09', 1, 1),
(191, 5, 3, '6', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:23:09', 1, 1),
(192, 5, 3, '6', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:23:09', 1, 1),
(193, 5, 0, '1', '1', '', '11:25 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:24:10', 1, 1),
(194, 5, 0, '1', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:10', 1, 1),
(195, 5, 0, '1', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:10', 1, 1),
(196, 5, 0, '1', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:10', 1, 1),
(197, 5, 0, '2', '1', '', '11:25 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:24:10', 1, 1),
(198, 5, 0, '2', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:10', 1, 1),
(199, 5, 0, '2', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:10', 1, 1),
(200, 5, 0, '2', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:10', 1, 1),
(201, 5, 0, '3', '1', '', '11:25 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:24:10', 1, 1),
(202, 5, 0, '3', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:10', 1, 1),
(203, 5, 0, '3', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:10', 1, 1),
(204, 5, 0, '3', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:10', 1, 1),
(205, 5, 0, '4', '1', '', '11:25 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:24:10', 1, 1),
(206, 5, 0, '4', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:10', 1, 1),
(207, 5, 0, '4', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:10', 1, 1),
(208, 5, 0, '4', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:10', 1, 1),
(209, 5, 0, '5', '1', '', '11:25 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:24:10', 1, 1),
(210, 5, 0, '5', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:10', 1, 1),
(211, 5, 0, '5', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:10', 1, 1),
(212, 5, 0, '5', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:10', 1, 1),
(213, 5, 0, '6', '1', '', '11:25 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:24:10', 1, 1),
(214, 5, 0, '6', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:10', 1, 1),
(215, 5, 0, '6', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:10', 1, 1),
(216, 5, 0, '6', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:10', 1, 1),
(241, 3, 0, '1', '1', '', '11:25 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:24:52', 1, 1),
(242, 3, 0, '1', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:52', 1, 1),
(243, 3, 0, '1', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:52', 1, 1),
(244, 3, 0, '1', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:52', 1, 1),
(245, 3, 0, '2', '1', '', '11:25 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:24:52', 1, 1),
(246, 3, 0, '2', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:52', 1, 1),
(247, 3, 0, '2', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:52', 1, 1),
(248, 3, 0, '2', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:52', 1, 1),
(249, 3, 0, '3', '1', '', '11:25 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:24:52', 1, 1),
(250, 3, 0, '3', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:52', 1, 1),
(251, 3, 0, '3', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:52', 1, 1),
(252, 3, 0, '3', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:52', 1, 1),
(253, 3, 0, '4', '1', '', '11:25 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:24:52', 1, 1),
(254, 3, 0, '4', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:52', 1, 1),
(255, 3, 0, '4', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:52', 1, 1),
(256, 3, 0, '4', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:52', 1, 1),
(257, 3, 0, '5', '1', '', '11:25 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:24:52', 1, 1),
(258, 3, 0, '5', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:52', 1, 1),
(259, 3, 0, '5', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:52', 1, 1),
(260, 3, 0, '5', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:52', 1, 1),
(261, 3, 0, '6', '1', '', '11:25 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:24:52', 1, 1),
(262, 3, 0, '6', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:52', 1, 1),
(263, 3, 0, '6', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:52', 1, 1),
(264, 3, 0, '6', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:24:52', 1, 1),
(265, 5, 4, '1', '1', '30', '10:25 AM', '10:55 AM', 'Y', '33', '10:55 AM', '11:28 AM', 1, '2016-01-06 11:25:00', 1, 1),
(266, 5, 4, '1', '2', '22', '11:28 AM', '11:50 AM', 'N', '0', '', '', 7, '2016-01-06 11:25:00', 1, 1),
(267, 5, 4, '1', '3', '', '11:50 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:25:00', 1, 1),
(268, 5, 4, '1', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:25:00', 1, 1),
(269, 5, 4, '2', '1', '', '10:25 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:25:00', 1, 1),
(270, 5, 4, '2', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:25:00', 1, 1),
(271, 5, 4, '2', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:25:00', 1, 1),
(272, 5, 4, '2', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:25:00', 1, 1),
(273, 5, 4, '3', '1', '', '10:25 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:25:00', 1, 1),
(274, 5, 4, '3', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:25:00', 1, 1),
(275, 5, 4, '3', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:25:00', 1, 1),
(276, 5, 4, '3', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:25:00', 1, 1),
(277, 5, 4, '4', '1', '', '10:25 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:25:00', 1, 1),
(278, 5, 4, '4', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:25:00', 1, 1),
(279, 5, 4, '4', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:25:00', 1, 1),
(280, 5, 4, '4', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:25:00', 1, 1),
(281, 5, 4, '5', '1', '', '10:25 \r\n\r\nAM', '', 'N', '0', '', '', 0, '2016-01-06 11:25:00', 1, 1),
(282, 5, 4, '5', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:25:00', 1, 1),
(283, 5, 4, '5', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:25:00', 1, 1),
(284, 5, 4, '5', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:25:00', 1, 1),
(285, 5, 4, '6', '1', '', '10:25 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:25:00', 1, 1),
(286, 5, 4, '6', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:25:00', 1, 1),
(287, 5, 4, '6', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:25:00', 1, 1),
(288, 5, 4, '6', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:25:00', 1, 1),
(313, 3, 1, '1', '1', '', '11:20 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:25:33', 1, 1),
(314, 3, 1, '1', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:25:33', 1, 1),
(315, 3, 1, '1', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:25:33', 1, 1),
(316, 3, 1, '1', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:25:33', 1, 1),
(317, 3, 1, '2', '1', '', '11:20 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:25:33', 1, 1),
(318, 3, 1, '2', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:25:33', 1, 1),
(319, 3, 1, '2', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:25:33', 1, 1),
(320, 3, 1, '2', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:25:33', 1, 1),
(321, 3, 1, '3', '1', '', '11:20 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:25:33', 1, 1),
(322, 3, 1, '3', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:25:33', 1, 1),
(323, 3, 1, '3', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:25:33', 1, 1),
(324, 3, 1, '3', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:25:33', 1, 1),
(325, 3, 1, '4', '1', '', '11:20 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:25:33', 1, 1),
(326, 3, 1, '4', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:25:33', 1, 1),
(327, 3, 1, '4', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:25:33', 1, 1),
(328, 3, 1, '4', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:25:33', 1, 1),
(329, 3, 1, '5', '1', '', '11:20 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:25:33', 1, 1),
(330, 3, 1, '5', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:25:33', 1, 1),
(331, 3, 1, '5', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:25:33', 1, 1),
(332, 3, 1, '5', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:25:33', 1, 1),
(333, 3, 1, '6', '1', '', '11:20 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:25:33', 1, 1),
(334, 3, 1, '6', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:25:33', 1, 1),
(335, 3, 1, '6', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:25:33', 1, 1),
(336, 3, 1, '6', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:25:33', 1, 1),
(433, 1, 0, '1', '1', '5', '11:30 AM', '11:35 AM', 'Y', '05', '11:35 AM', '11:40 AM', -1, '2016-01-06 11:38:16', 1, 1),
(434, 1, 0, '1', '2', '', '11:40 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:38:16', 1, 1),
(435, 1, 0, '1', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:38:16', 1, 1),
(436, 1, 0, '1', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:38:16', 1, 1),
(437, 1, 0, '2', '1', '', '11:30 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:38:16', 1, 1),
(438, 1, 0, '2', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:38:16', 1, 1),
(439, 1, 0, '2', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:38:16', 1, 1),
(440, 1, 0, '2', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:38:16', 1, 1),
(441, 1, 0, '3', '1', '', '11:30 \r\n\r\nAM', '', 'N', '0', '', '', 0, '2016-01-06 11:38:16', 1, 1),
(442, 1, 0, '3', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:38:16', 1, 1),
(443, 1, 0, '3', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:38:16', 1, 1),
(444, 1, 0, '3', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:38:16', 1, 1),
(445, 1, 0, '4', '1', '', '11:30 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:38:16', 1, 1),
(446, 1, 0, '4', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:38:16', 1, 1),
(447, 1, 0, '4', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:38:16', 1, 1),
(448, 1, 0, '4', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:38:16', 1, 1),
(449, 1, 0, '5', '1', '', '11:30 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:38:16', 1, 1),
(450, 1, 0, '5', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:38:16', 1, 1),
(451, 1, 0, '5', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:38:16', 1, 1),
(452, 1, 0, '5', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:38:16', 1, 1),
(453, 1, 0, '6', '1', '', '11:30 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:38:16', 1, 1),
(454, 1, 0, '6', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:38:16', 1, 1),
(455, 1, 0, '6', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:38:16', 1, 1),
(456, 1, 0, '6', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:38:16', 1, 1),
(481, 2, 0, '1', '1', '', '11:40 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:57:48', 1, 1),
(482, 2, 0, '1', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:57:48', 1, 1),
(483, 2, 0, '1', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:57:48', 1, 1),
(484, 2, 0, '1', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:57:48', 1, 1),
(485, 2, 0, '2', '1', '', '11:40 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:57:48', 1, 1),
(486, 2, 0, '2', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:57:48', 1, 1),
(487, 2, 0, '2', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:57:48', 1, 1),
(488, 2, 0, '2', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:57:48', 1, 1),
(489, 2, 0, '3', '1', '', '11:40 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:57:48', 1, 1),
(490, 2, 0, '3', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:57:48', 1, 1),
(491, 2, 0, '3', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:57:48', 1, 1),
(492, 2, 0, '3', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:57:48', 1, 1),
(493, 2, 0, '4', '1', '', '11:40 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:57:48', 1, 1),
(494, 2, 0, '4', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:57:48', 1, 1),
(495, 2, 0, '4', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:57:48', 1, 1),
(496, 2, 0, '4', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:57:48', 1, 1),
(497, 2, 0, '5', '1', '', '11:40 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:57:48', 1, 1),
(498, 2, 0, '5', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:57:48', 1, 1),
(499, 2, 0, '5', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:57:48', 1, 1),
(500, 2, 0, '5', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:57:48', 1, 1),
(501, 2, 0, '6', '1', '', '11:40 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:57:48', 1, 1),
(502, 2, 0, '6', '2', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:57:48', 1, 1),
(503, 2, 0, '6', '3', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:57:48', 1, 1),
(504, 2, 0, '6', '4', '', '', '', 'N', '0', '', '', 0, '2016-01-06 11:57:48', 1, 1),
(505, 4, 2, '1', '1', '30', '10:15 AM', '10:45 AM', 'N', '0', '', '', 2, '2016-01-06 11:57:57', 1, 1),
(506, 4, 2, '1', '2', '20', '10:45 AM', '11:05 AM', 'Y', '10', '11:05 AM', '11:15 AM', 2, '2016-01-06 11:57:57', 1, 1),
(507, 4, 2, '1', '3', '30', '11:15 AM', '11:45 AM', 'N', '0', '', '', -1, '2016-01-06 11:57:57', 1, 1),
(508, 4, 2, '1', '4', '20', '11:45 AM', '12:05 PM', 'N', '0', '', '', 2, '0000-00-00 00:00:00', 1, 1),
(509, 4, 2, '2', '1', '20', '10:15 AM', '10:35 AM', 'N', '0', '', '', -1, '2016-01-06 11:57:57', 1, 1),
(510, 4, 2, '2', '2', '20', '10:35 AM', '10:55 AM', 'Y', '20', '10:55 AM', '11:15 AM', -1, '2016-01-06 11:57:57', 1, 1),
(511, 4, 2, '2', '3', '20', '11:15 AM', '11:35 AM', 'N', '0', '', '', -1, '2016-01-06 11:57:57', 1, 1),
(512, 4, 2, '2', '4', '20', '11:35 AM', '11:55 AM', 'N', '0', '', '', -1, '2016-01-06 11:57:57', 1, 1),
(513, 4, 2, '3', '1', '30', '10:15 AM', '10:45 AM', 'Y', '10', '10:45 AM', '10:55 \r\n\r\nAM', 2, '2016-01-06 11:57:57', 1, 1),
(514, 4, 2, '3', '2', '30', '10:55 AM', '11:25 AM', 'Y', '10', '11:25 AM', '11:35 AM', -1, '2016-01-06 11:57:57', 1, 1),
(515, 4, 2, '3', '3', '20', '11:35 AM', '11:55 AM', 'N', '0', '', '', -1, '2016-01-06 11:57:57', 1, 1),
(516, 4, 2, '3', '4', '30', '11:55 AM', '12:25 PM', 'N', '0', '', '', 2, '2016-01-06 11:57:57', 1, 1),
(517, 4, 2, '4', '1', '30', '10:15 AM', '10:45 AM', 'N', '0', '', '', -1, '2016-01-06 11:57:57', 1, 1),
(518, 4, 2, '4', '2', '40', '10:45 AM', '11:25 AM', 'Y', '10', '11:25 \r\n\r\nAM', '11:35 AM', 2, '2016-01-06 11:57:57', 1, 1),
(519, 4, 2, '4', '3', '20', '11:35 AM', '11:55 AM', 'N', '0', '', '', -1, '2016-01-06 11:57:57', 1, 1),
(520, 4, 2, '4', '4', '20', '11:55 AM', '12:15 PM', 'N', '0', '', '', 2, '2016-01-06 11:57:57', 1, 1),
(521, 4, 2, '5', '1', '30', '10:15 AM', '10:45 AM', 'N', '0', '', '', -1, '2016-01-06 11:57:57', 1, 1),
(522, 4, 2, '5', '2', '30', '10:45 AM', '11:15 AM', 'Y', '30', '11:15 AM', '11:45 \r\n\r\nAM', 2, '2016-01-06 11:57:57', 1, 1),
(523, 4, 2, '5', '3', '10', '11:45 AM', '11:55 AM', 'Y', '50', '11:55 AM', '12:45 PM', -1, '2016-01-06 11:57:57', 1, 1),
(524, 4, 2, '5', '4', '10', '12:45 PM', '12:55 PM', 'N', '0', '', '', 2, '2016-01-06 11:57:57', 1, 1),
(525, 4, 2, '6', '1', '50', '10:15 AM', '11:05 AM', 'Y', '30', '11:05 AM', '11:35 AM', 2, '0000-00-00 00:00:00', 1, 1),
(526, 4, 2, '6', '2', '10', '11:35 AM', '11:45 AM', 'N', '0', '', '', -1, '2016-01-06 11:57:57', 1, 1),
(527, 4, 2, '6', '3', '30', '11:45 AM', '12:15 PM', 'N', '0', '', '', 2, '2016-01-06 11:57:57', 1, 1),
(528, 4, 2, '6', '4', '30', '12:15 PM', '12:45 PM', 'N', '0', '', '', -1, '2016-01-06 11:57:57', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_custom_type_master`
--

CREATE TABLE IF NOT EXISTS `user_custom_type_master` (
  `user_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `master_code` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_custom_type_master`
--

INSERT INTO `user_custom_type_master` (`user_type_id`, `name`, `master_code`, `create_date`, `update_date`, `create_by`, `update_by`, `status`) VALUES
(1, 'Account', 1, '2015-12-31 14:58:13', '0000-00-00 00:00:00', 1, 0, 'Active'),
(2, 'student', 2, '2016-05-16 16:35:10', '0000-00-00 00:00:00', 7, 0, 'Delete');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE IF NOT EXISTS `user_master` (
  `usercode` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `emailid` varchar(200) NOT NULL,
  `mobileno` varchar(50) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `country` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `user_img` varchar(1000) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type_id` int(11) NOT NULL DEFAULT '0',
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `create_by` varchar(40) NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `master_code` int(11) NOT NULL,
  `end_code` int(11) NOT NULL,
  `reg_id` varchar(255) NOT NULL,
  PRIMARY KEY (`usercode`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`usercode`, `name`, `emailid`, `mobileno`, `phone_no`, `country`, `state`, `city`, `user_img`, `username`, `password`, `user_type_id`, `create_date`, `update_date`, `create_by`, `update_by`, `status`, `master_code`, `end_code`, `reg_id`) VALUES
(1, 'DN High School', 'dn@gmail.com', '0987654321', '123456', '1', '1', '1', 'Admin__5767243Tulips.jpg', 'admin', '123456', 1, '2015-12-31 14:51:12', '0000-00-00 00:00:00', 'Super Admin', '', 'Active', 1, 0, ''),
(2, 'Dax', 'dax@gmai.com', '9998578109', '1234567', '1', '1', '3', 'user_1_1_329614Jellyfish.jpg', 'dax', 'dax01', 4, '2015-12-31 14:59:14', '0000-00-00 00:00:00', '1', '', 'Active', 1, 1, ''),
(3, 'manali harsh Shah', 'manali@gmail.com', '', '7654345444', '1', '1', '1', '', 'manali', '123456', 3, '2015-12-31 15:05:15', '2016-01-01 14:29:10', '1', '1', 'Active', 1, 1, 'APA91bHwH7jFvwY3YwxRx4acVpD06szZhZt2aEV-2k-4uuEzejo7Cde7hyfqc58Npb0I1vkRcs6IxKKk4ED_eztdwVT3YTC84OKLFH4egv3zTOv21R7Fs7TnHKToCQgU1GO18FQ-qGyJ'),
(7, 'Arpita International School', 'arpita@gmail.com', '1234567890', '', '1', '1', '1', '', 'arpita', '12345', 1, '2016-05-16 14:56:09', '2016-05-16 15:49:23', 'Super Admin', 'Super Admin', 'Active', 2, 0, ''),
(4, 'juhi r shah', 'juhi@gmail.com', '', '6767677688', '1', '1', '1', '', 'juhi', '123', 3, '2016-01-08 12:01:12', '0000-00-00 00:00:00', '1', '', 'Active', 1, 2, '11111111'),
(5, 'jitu a rajpurohit', 'jitu@gmail.com', '9998578909', '9898989899', '1', '', '', '', 'jitu', '123', 3, '2016-01-08 12:21:26', '0000-00-00 00:00:00', '1', '', 'Active', 1, 3, '11111111'),
(6, 'daxeshkumar nileshkumar prajapati', 'dxsprajapati@gmail.com', '', '8690176813', '1', '1', '1', 'stud_1_896193Daxesh.jpg', 'daxeshkumar', '123', 3, '2016-04-05 10:21:21', '0000-00-00 00:00:00', '1', '', 'Active', 1, 4, ''),
(9, 'Anshu', 'anshu@gmail.com', '', '', '1', '1', '1', '', 'superadmin', 'superadmin', 4, '2016-05-16 16:36:56', '0000-00-00 00:00:00', '7', '', 'Delete', 2, 2, ''),
(8, 'Anshu a Shah', 'anshu@gmail.com', '', '1245688899', '1', '1', '1', 'stud_2_1024976anshu.jpg', 'Anshu', '123', 3, '2016-05-16 16:17:16', '0000-00-00 00:00:00', '7', '', 'Active', 2, 6, ''),
(10, 'Minesh M Chauhan', 'mins@gmail.com', '', '7894323093', '1', '1', '1', 'stud_1_9050425minesh-chauhan.jpg', 'Minesh', '123', 3, '2016-10-12 12:23:29', '2016-10-12 12:23:55', '1', '1', 'Active', 1, 8, ''),
(11, 'krunal r patel', 'pkkrpatel03@gmail.com', '9033256390', '9033256390', '1', '1', '1', 'stud_1_9737323images.jpg', 'krunal', '123456', 3, '2016-10-18 00:00:00', '0000-00-00 00:00:00', '1', '', 'Active', 1, 1, 'APA91bGPrXgk4DBMXBoF47cz4M4Ja4OgQhwMbDw_LfQznIzAzzet3c9-z-MjPA1Wi4oqKyT_35qlwoZV9c0r-brzmBNwSxfq4Q1WHh-n0rcLlTwpKkE2Szdz3hsty6E4bpsLVRZu1638');

-- --------------------------------------------------------

--
-- Table structure for table `user_type_master`
--

CREATE TABLE IF NOT EXISTS `user_type_master` (
  `user_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_name` varchar(100) NOT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_type_master`
--

INSERT INTO `user_type_master` (`user_type_id`, `user_type_name`) VALUES
(1, 'Admin'),
(2, 'Teacher'),
(3, 'Student'),
(4, 'Admin_user');

-- --------------------------------------------------------

--
-- Table structure for table `web_event_detail`
--

CREATE TABLE IF NOT EXISTS `web_event_detail` (
  `event_dt_code` int(11) NOT NULL AUTO_INCREMENT,
  `event_code` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `master_code` int(11) NOT NULL,
  PRIMARY KEY (`event_dt_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `web_event_detail`
--

INSERT INTO `web_event_detail` (`event_dt_code`, `event_code`, `image`, `master_code`) VALUES
(17, 2, 'event_1_15_69592572269498[000004].jpg', 1),
(18, 2, 'event_1_15_35612412480605[000134].jpg', 1),
(19, 2, 'event_1_15_40456762971595[000020].jpg', 1),
(20, 2, 'event_1_15_50016713432775[000130].jpg', 1),
(21, 2, 'event_1_15_91082854171935[000049].jpg', 1),
(22, 2, 'event_1_15_74094595751716[000033].jpg', 1),
(23, 2, 'event_1_15_63460066992353[000069].jpg', 1),
(24, 2, 'event_1_15_33070728185918[000001].jpg', 1),
(25, 2, 'event_1_15_18504048188791[000054].jpg', 1),
(26, 2, 'event_1_15_99201628583495[000031].jpg', 1),
(27, 2, 'event_1_15_1454898695904[000048].jpg', 1),
(28, 2, 'event_1_15_38964909029622[000046].jpg', 1),
(29, 1, 'event_1_An_2039319001.JPG', 1),
(30, 1, 'event_1_An_6748065002.JPG', 1),
(31, 1, 'event_1_An_3710820003.JPG', 1),
(32, 1, 'event_1_An_4571542005.JPG', 1),
(33, 1, 'event_1_An_153754DSC_5412.JPG', 1),
(34, 1, 'event_1_An_3009977DSC_5413.JPG', 1),
(35, 1, 'event_1_An_6782689DSC_5414.JPG', 1),
(36, 1, 'event_1_An_9146536DSC_5415.JPG', 1),
(37, 1, 'event_1_An_4825638DSC_5422.JPG', 1),
(38, 1, 'event_1_An_7567446DSC_5435.JPG', 1),
(39, 1, 'event_1_An_7591483DSC_5452.JPG', 1),
(40, 1, 'event_1_An_2314603DSC_5453.JPG', 1),
(41, 1, 'event_1_An_3620500DSC_5454.JPG', 1),
(42, 1, 'event_1_An_3572814DSC_5479.JPG', 1),
(43, 1, 'event_1_An_1142273DSC_5482.JPG', 1),
(44, 1, 'event_1_An_4129722DSC_5540.JPG', 1),
(45, 1, 'event_1_An_8471684DSC_5543.JPG', 1),
(46, 1, 'event_1_An_848572DSC_5556.JPG', 1),
(47, 1, 'event_1_An_6984170DSC_5560.JPG', 1),
(48, 3, 'event_1_gr_33760111463960[000001].jpg', 1),
(49, 3, 'event_1_gr_34606274781047[000120].jpg', 1),
(50, 3, 'event_1_gr_6838675631677[000071].jpg', 1),
(51, 3, 'event_1_gr_88783925823846[000102].jpg', 1),
(52, 3, 'event_1_gr_28091448501745[000033].jpg', 1),
(53, 4, 'event_1_JA_37545501637657DSC02172.JPG', 1),
(54, 4, 'event_1_JA_31195491757541DSC02234.JPG', 1),
(55, 4, 'event_1_JA_56668201836479DSC02148.JPG', 1),
(56, 4, 'event_1_JA_9705102231079DSC02154.JPG', 1),
(57, 4, 'event_1_JA_90826302464329DSC02258.JPG', 1),
(58, 4, 'event_1_JA_39770072929555DSC02153.JPG', 1),
(59, 4, 'event_1_JA_75258183109938DSC02250.JPG', 1),
(60, 4, 'event_1_JA_35704313825551DSC02230.JPG', 1),
(61, 4, 'event_1_JA_31831348298643DSC02152.JPG', 1),
(62, 5, 'event_1_NA_73723831891750DSC03654.JPG', 1),
(63, 5, 'event_1_NA_29378712226399DSC03679.JPG', 1),
(64, 5, 'event_1_NA_83576573679155DSC03648.JPG', 1),
(65, 5, 'event_1_NA_71869203866853DSC03672.JPG', 1),
(66, 5, 'event_1_NA_1645577980362DSC03666.JPG', 1),
(67, 5, 'event_1_NA_27323667994155DSC03649.JPG', 1),
(68, 6, 'event_1_PA_14503761599526DSC01044.JPG', 1),
(69, 6, 'event_1_PA_98190321922115DSC01024.JPG', 1),
(70, 6, 'event_1_PA_46665874802020DSC01019.JPG', 1),
(71, 6, 'event_1_PA_56838215616601DSC01046.JPG', 1),
(72, 6, 'event_1_PA_23799286821668DSC01023.JPG', 1),
(73, 7, 'event_1_TR_6915838625019DSC02286.JPG', 1),
(74, 7, 'event_1_TR_5361205508980DSC02469.JPG', 1),
(75, 7, 'event_1_TR_13899645820093DSC02458.JPG', 1),
(76, 7, 'event_1_TR_37627497689533DSC02522.JPG', 1),
(77, 7, 'event_1_TR_17342518658139DSC02396.JPG', 1),
(78, 7, 'event_1_TR_71706339274476DSC02414.JPG', 1),
(79, 7, 'event_1_TR_13656049500688DSC02280.JPG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `web_event_master`
--

CREATE TABLE IF NOT EXISTS `web_event_master` (
  `event_code` int(11) NOT NULL AUTO_INCREMENT,
  `event_title` varchar(255) NOT NULL,
  `event_dt` varchar(40) NOT NULL,
  `cover_img` varchar(255) NOT NULL,
  `master_code` int(11) NOT NULL,
  `end_code` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  PRIMARY KEY (`event_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `web_event_master`
--

INSERT INTO `web_event_master` (`event_code`, `event_title`, `event_dt`, `cover_img`, `master_code`, `end_code`, `create_date`, `update_date`, `create_by`, `update_by`, `status`) VALUES
(1, 'Annual Function', '26-12-2015', 'event_1_An_7471443001.JPG', 1, 0, '2015-12-31 15:05:55', '2016-02-19 14:10:25', 1, 1, 'Active'),
(2, '15 AUGUST', '15-08-2015', 'event_1_15_76212092480605[000134].jpg', 1, 0, '2016-01-12 09:46:14', '2016-02-19 14:08:16', 1, 1, 'Active'),
(3, 'green day', '09-02-2016', 'event_1_gr_10431631463960[000001].jpg', 1, 0, '2016-02-19 14:11:53', '0000-00-00 00:00:00', 1, 0, 'Active'),
(4, 'JANMASTAMI', '10-09-2015', 'event_1_JA_49310172929555DSC02153.JPG', 1, 0, '2016-02-19 14:12:46', '0000-00-00 00:00:00', 1, 0, 'Active'),
(5, 'NAVRATRI', '29-10-2015', 'event_1_NA_92062917994155DSC03649.JPG', 1, 0, '2016-02-19 14:13:50', '0000-00-00 00:00:00', 1, 0, 'Active'),
(6, 'PARENTS-TEACHERS MEETING', '03-02-2016', 'event_1_PA_99500631599526DSC01044.JPG', 1, 0, '2016-02-19 14:15:04', '0000-00-00 00:00:00', 1, 0, 'Active'),
(7, 'TRIP', '27-01-2016', 'event_1_TR_95010685508980DSC02469.JPG', 1, 0, '2016-02-19 14:16:02', '0000-00-00 00:00:00', 1, 0, 'Active'),
(8, 'welcome event', '01-06-2016', '', 2, 0, '2016-05-16 17:13:12', '0000-00-00 00:00:00', 7, 0, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `web_news_master`
--

CREATE TABLE IF NOT EXISTS `web_news_master` (
  `news_code` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(255) NOT NULL,
  `news_desc` varchar(400) NOT NULL,
  `news_dt` varchar(40) NOT NULL,
  `cover_img` varchar(255) NOT NULL,
  `master_code` int(11) NOT NULL,
  `end_code` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  PRIMARY KEY (`news_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `web_news_master`
--

INSERT INTO `web_news_master` (`news_code`, `news_title`, `news_desc`, `news_dt`, `cover_img`, `master_code`, `end_code`, `create_date`, `update_date`, `create_by`, `update_by`, `status`) VALUES
(1, 'Annual Day Celebration', 'function was good', '31-12-2015', 'news_1_An_7825612DSC_5983.JPG', 1, 0, '2015-12-31 15:07:37', '2016-02-19 14:18:45', 1, 1, 'Active'),
(2, 'SPORTS PRIZES', 'Prize distribution..', '03-02-2016', 'news_1_SP_76361744565802DSC04276.JPG', 1, 0, '2016-02-19 14:20:00', '0000-00-00 00:00:00', 1, 0, 'Active'),
(3, 'Independent Day Celebration', 'Celebration of Independent Day with full of joy..', '15-08-2015', 'news_1_In_42673088695904[000048].jpg', 1, 0, '2016-02-19 14:21:36', '0000-00-00 00:00:00', 1, 0, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `web_photo_gallery_detail`
--

CREATE TABLE IF NOT EXISTS `web_photo_gallery_detail` (
  `gallery_dt_code` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_code` int(11) NOT NULL,
  `photopath` varchar(255) NOT NULL,
  `master_code` int(11) NOT NULL,
  PRIMARY KEY (`gallery_dt_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `web_photo_gallery_detail`
--

INSERT INTO `web_photo_gallery_detail` (`gallery_dt_code`, `gallery_code`, `photopath`, `master_code`) VALUES
(1, 1, 'photo_1_Tr_6933743Chrysanthemum.jpg', 1),
(2, 1, 'photo_1_Tr_793676Jellyfish.jpg', 1),
(3, 1, 'photo_1_Tr_1477987Koala.jpg', 1),
(4, 1, 'photo_1_Tr_9088190Lighthouse.jpg', 1),
(5, 1, 'photo_1_Tr_9439314DSC03775.JPG', 1),
(6, 1, 'photo_1_Tr_9311132DSC03777.JPG', 1),
(7, 1, 'photo_1_Tr_8013301DSC03780.JPG', 1),
(8, 1, 'photo_1_Tr_8689614DSC03791.JPG', 1),
(9, 1, 'photo_1_Tr_4357399DSC03794.JPG', 1),
(10, 1, 'photo_1_Tr_1467493DSC03822.JPG', 1),
(11, 1, 'photo_1_Tr_6302225DSC03838.JPG', 1),
(12, 1, 'photo_1_Tr_9459062DSC03847.JPG', 1),
(13, 1, 'photo_1_Tr_3078752DSC03867.JPG', 1),
(14, 1, 'photo_1_Tr_5725464DSC03889.JPG', 1),
(15, 2, 'photo_1_ba_497832C360_2014-11-14-10-59-28-466.jpg', 1),
(16, 2, 'photo_1_ba_3093335C360_2014-11-14-10-59-33-453.jpg', 1),
(17, 2, 'photo_1_ba_4919660C360_2014-11-14-11-45-24-899.jpg', 1),
(18, 2, 'photo_1_ba_9920389C360_2014-11-14-11-51-34-641.jpg', 1),
(19, 2, 'photo_1_ba_7915322C360_2014-11-14-14-43-53-310.jpg', 1),
(20, 2, 'photo_1_ba_6822409C360_2014-11-14-15-11-24-351.jpg', 1),
(21, 2, 'photo_1_ba_9332174C360_2014-11-14-15-14-53-447.jpg', 1),
(22, 3, 'photo_1_cl_1381239DSC00013.JPG', 1),
(23, 3, 'photo_1_cl_5821312DSC00018.JPG', 1),
(24, 3, 'photo_1_cl_203897DSC00029.JPG', 1),
(25, 3, 'photo_1_cl_5238612DSC00030.JPG', 1),
(26, 3, 'photo_1_cl_3552213DSC00031.JPG', 1),
(27, 3, 'photo_1_cl_2595818DSC00038.JPG', 1),
(28, 3, 'photo_1_cl_7223046DSC00053.JPG', 1),
(29, 3, 'photo_1_cl_4081306DSC00064.JPG', 1),
(30, 3, 'photo_1_cl_1629665DSC00066.JPG', 1),
(31, 3, 'photo_1_cl_4245799DSC00103.JPG', 1),
(32, 3, 'photo_1_cl_4809724DSC00108.JPG', 1),
(33, 3, 'photo_1_cl_6220766DSC00119.JPG', 1),
(34, 3, 'photo_1_cl_2203913DSC00124.JPG', 1),
(35, 3, 'photo_1_cl_4540951DSC00145.JPG', 1),
(36, 4, 'photo_1_sa_9898377DSC03908.JPG', 1),
(37, 4, 'photo_1_sa_7215603DSC03910.JPG', 1),
(38, 4, 'photo_1_sa_7726271DSC03911.JPG', 1),
(39, 4, 'photo_1_sa_5361695DSC03922.JPG', 1),
(40, 4, 'photo_1_sa_6640775DSC03923.JPG', 1),
(41, 4, 'photo_1_sa_8330597DSC03924.JPG', 1),
(42, 4, 'photo_1_sa_3724991DSC03944.JPG', 1),
(43, 4, 'photo_1_sa_341957DSC03945.JPG', 1),
(44, 4, 'photo_1_sa_1136261DSC03948.JPG', 1),
(45, 4, 'photo_1_sa_9175687DSC03951.JPG', 1),
(46, 4, 'photo_1_sa_3988377DSC03956.JPG', 1),
(47, 4, 'photo_1_sa_3874299DSC03958.JPG', 1),
(48, 5, 'photo_1_te_4726933C360_2014-09-05-15-24-13-757.jpg', 1),
(49, 5, 'photo_1_te_8507131C360_2014-09-05-15-26-05-424.jpg', 1),
(50, 5, 'photo_1_te_9199800DSC01677.JPG', 1),
(51, 5, 'photo_1_te_1181943DSC01678.JPG', 1),
(52, 5, 'photo_1_te_9921250DSC01685.JPG', 1),
(53, 5, 'photo_1_te_8084550DSC01698.JPG', 1),
(54, 5, 'photo_1_te_5375649DSC01701.JPG', 1),
(55, 5, 'photo_1_te_1265371DSC01724.JPG', 1),
(56, 6, 'photo_1_va_4584605DSC00146.JPG', 1),
(57, 6, 'photo_1_va_853915DSC00147.JPG', 1),
(58, 6, 'photo_1_va_7368429DSC00149.JPG', 1),
(59, 6, 'photo_1_va_2921497DSC00155.JPG', 1),
(60, 6, 'photo_1_va_1322568DSC00164.JPG', 1),
(61, 6, 'photo_1_va_2596601DSC00180.JPG', 1),
(62, 6, 'photo_1_va_2275782DSC00188.JPG', 1),
(63, 6, 'photo_1_va_6318707DSC00241.JPG', 1),
(64, 6, 'photo_1_va_4111042DSC00242.JPG', 1),
(65, 6, 'photo_1_va_6029465DSC00254.JPG', 1),
(66, 7, 'photo_1_wo_7477116DSC00240.JPG', 1),
(67, 7, 'photo_1_wo_1331010DSC00241.JPG', 1),
(68, 7, 'photo_1_wo_9853898DSC00255.JPG', 1),
(69, 7, 'photo_1_wo_1943590DSC00261.JPG', 1),
(70, 7, 'photo_1_wo_1263880DSC00266.JPG', 1),
(71, 7, 'photo_1_wo_5000451DSC00274.JPG', 1),
(72, 7, 'photo_1_wo_7205557DSC00281.JPG', 1),
(73, 7, 'photo_1_wo_7282414DSC00285.JPG', 1),
(74, 7, 'photo_1_wo_5922142DSC00297.JPG', 1),
(75, 8, 'photo_2_sp_36739891.jpg', 2),
(76, 8, 'photo_2_sp_60352102.jpg', 2),
(77, 8, 'photo_2_sp_38625553.jpg', 2),
(78, 8, 'photo_2_sp_60335904.jpg', 2),
(79, 8, 'photo_2_sp_60751365.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `web_photo_gallery_master`
--

CREATE TABLE IF NOT EXISTS `web_photo_gallery_master` (
  `gallery_code` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_name` varchar(255) NOT NULL,
  `gallery_desc` varchar(255) NOT NULL,
  `gallery_dt` varchar(20) NOT NULL,
  `gallery_cover_img` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `month` int(11) NOT NULL,
  `master_code` int(11) NOT NULL,
  `end_code` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  PRIMARY KEY (`gallery_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `web_photo_gallery_master`
--

INSERT INTO `web_photo_gallery_master` (`gallery_code`, `gallery_name`, `gallery_desc`, `gallery_dt`, `gallery_cover_img`, `year`, `month`, `master_code`, `end_code`, `create_date`, `update_date`, `create_by`, `update_by`, `status`) VALUES
(1, 'Trip 2015', 'trip organized \n\nby school', '03-12-2015', 'photo_1_Tr_4676492DSC03775.JPG', '2015', 12, 1, 0, '0000-00-00 00:00:00', '2016-02-19 14:23:19', 1, 1, 'Active'),
(2, 'bal swachta divas', 'bal swachta divas', '05-02-2016', 'photo_1_ba_6234265C360_2014-11-14-10-59-28-466.jpg', '2016', 2, 1, 0, '2016-02-19 14:24:32', '0000-00-00 00:00:00', 1, 0, 'Active'),
(3, 'clay moulding competition', 'clay moulding competition', '12-01-2016', 'photo_1_cl_2248472DSC00066.JPG', '2016', 1, 1, 0, '2016-02-19 14:25:40', '2016-02-19 14:26:08', 1, 1, 'Active'),
(4, 'salad dressing', 'salad dressing', '02-02-2016', 'photo_1_sa_3479997DSC03948.JPG', '2016', 2, 1, 0, '2016-02-19 14:27:22', '0000-00-00 00:00:00', 1, 0, 'Active'),
(5, 'teachers'' day', 'teachers day', '05-09-2015', 'photo_1_te_6107889DSC01701.JPG', '2015', 9, 1, 0, '2016-02-19 14:28:28', '0000-00-00 00:00:00', 1, 0, 'Active'),
(6, 'van mahotsav', 'van mahotsav', '07-09-2015', 'photo_1_va_4398987DSC00146.JPG', '2015', 9, 1, 0, '2016-02-19 14:29:39', '0000-00-00 00:00:00', 1, 0, 'Active'),
(7, 'world health day', 'world helth day', '10-02-2016', 'photo_1_wo_6798348DSC00274.JPG', '2016', 2, 1, 0, '2016-02-19 14:30:51', '0000-00-00 00:00:00', 1, 0, 'Active'),
(8, 'sports day', 'The sports day for the year 2016 was held on Tuesday,17th May.Many student have participated in this.They enjoyed a lot.', '17-05-2016', 'photo_2_sp_1462849sportsday.jpg', '2016', 5, 2, 0, '2016-05-20 11:35:06', '2016-05-20 12:27:54', 7, 7, 'Active'),
(9, 'sportsday', 'The sports day for the year 2016 was held on Tuesday,17th May.Many student have participated in this.They enjoyed a lot.', '17-05-2016', '', '2016', 5, 2, 0, '2016-05-20 12:17:33', '0000-00-00 00:00:00', 7, 0, 'Delete');

-- --------------------------------------------------------

--
-- Table structure for table `web_video_list`
--

CREATE TABLE IF NOT EXISTS `web_video_list` (
  `video_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_title` varchar(255) NOT NULL,
  `cover_img` varchar(255) NOT NULL,
  `master_code` int(11) NOT NULL,
  `end_code` int(11) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  PRIMARY KEY (`video_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `web_video_list`
--

INSERT INTO `web_video_list` (`video_id`, `video_title`, `cover_img`, `master_code`, `end_code`, `status`, `create_date`, `update_date`, `create_by`, `update_by`) VALUES
(1, 'Technology', 'video_1_Te_126811853.png', 1, 0, 'Active', '2015-12-31 15:11:01', '2016-02-19 15:01:15', 1, 1),
(2, 'Motivational', 'video_1_Mo_86499367download(1).jpg', 1, 0, 'Active', '2016-02-19 14:59:46', '0000-00-00 00:00:00', 1, 0),
(3, 'Natural', 'video_1_Na_386480652.jpg', 1, 0, 'Active', '2016-02-19 15:02:21', '0000-00-00 00:00:00', 1, 0),
(4, 'Educational', 'video_1_Ed_63889235banner.jpg', 1, 0, 'Active', '2016-02-19 15:07:23', '0000-00-00 00:00:00', 1, 0),
(5, 'Sports Day', 'video_1_Sp_87762040DSC_1725.JPG', 1, 0, 'Active', '2016-02-19 15:08:58', '0000-00-00 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `web_video_master`
--

CREATE TABLE IF NOT EXISTS `web_video_master` (
  `video_code` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` int(11) NOT NULL,
  `video_name` varchar(255) NOT NULL,
  `video_desc` varchar(255) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `cover_img` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `video_dt` varchar(30) NOT NULL,
  `master_code` int(11) NOT NULL,
  `end_code` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  PRIMARY KEY (`video_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `web_video_master`
--

INSERT INTO `web_video_master` (`video_code`, `video_id`, `video_name`, `video_desc`, `video_url`, `cover_img`, `year`, `month`, `video_dt`, `master_code`, `end_code`, `create_date`, `update_date`, `create_by`, `update_by`, `status`) VALUES
(1, 1, 'computer \r\n\r\nLatest technology 2015', 'new invention', 'https://www.youtube.com/embed/aFgEPAzgBpA', 'video_1_1_co_5832803Lighthouse.jpg', '2015', '12', '30-12-2015', 1, 0, '2015-12-31 15:12:17', '2016-01-12 10:48:19', 1, 1, 'Active'),
(2, 2, 'Think positively cartoon', 'Think positively cartoon', 'https://www.youtube.com/embed/An2OaIbPSII', 'video_1_2_Th_9552111download(1).jpg', '2016', '02', '18-02-2016', 1, 0, '2016-02-19 15:00:31', '0000-00-00 00:00:00', 1, 0, 'Active'),
(3, 3, 'Nature', 'Nature', 'https://www.youtube.com/embed/_jHpnb-QmTA', 'video_1_3_Na_65475302.jpg', '2016', '02', '08-02-2016', 1, 0, '2016-02-19 15:03:04', '0000-00-00 00:00:00', 1, 0, 'Active'),
(4, 2, 'How to succeed', 'How to succeed', 'https://www.youtube.com/embed/hS5CfP8n_js', 'video_1_2_Ho_5275249AFS-Accountants-Bendigo_home-slider-01d.jpg', '2016', '02', '02-02-2016', 1, 0, '2016-02-19 15:04:26', '0000-00-00 00:00:00', 1, 0, 'Active'),
(5, 4, 'Is the Universe Entirely Mathematical?', 'Is the Universe Entirely Mathematical?', 'https://www.youtube.com/embed/HGG4HmlotJE', 'video_1_4_Is_8183080banner.jpg', '2016', '02', '09-02-2016', 1, 0, '2016-02-19 15:08:07', '0000-00-00 00:00:00', 1, 0, 'Active'),
(6, 5, 'Sports day celebration', 'Sports day celebration', 'https://www.youtube.com/embed/y3iIg5nxod0', 'video_1_5_Sp_9292757DSC_1986.JPG', '2016', '01', '19-01-2016', 1, 0, '2016-02-19 15:10:19', '0000-00-00 00:00:00', 1, 0, 'Active'),
(7, 4, 'a', 'a', 'https://www.youtube.com/embed/M6tn4k12Jjk', 'video_1_4_a_3943017Desert.jpg', '2016', '10', '12-10-2016', 1, 0, '2016-10-12 17:36:58', '0000-00-00 00:00:00', 1, 0, 'Active');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
