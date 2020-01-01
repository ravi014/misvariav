-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 25, 2016 at 09:27 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pnxdepo_school`
--
CREATE DATABASE IF NOT EXISTS `pnxdepo_school` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pnxdepo_school`;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `account_year_mst`
--

INSERT INTO `account_year_mst` (`account_year_code`, `yeanm`, `status`, `master_code`, `create_date`, `update_date`) VALUES
(1, '2015-2016', 'Active', 1, '2015-12-31 14:52:19', '0000-00-00 00:00:00');

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
('0e2fc6b39e883fa01e6f0c7bbf95767f', '172.16.16.24', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0', 1451558759, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:10;}}'),
('10981c65318405d2ba6c7367d3a9b282', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', 1453544484, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:54;}}'),
('2fa14561e483da697ce3e6dc56bf517b', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', 1453113221, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:49;}}'),
('2ff931ee699d58e4454bd3a960491609', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451989043, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:27;}}'),
('33ecca994924f8eff4b05a6f55aa0791', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1452140337, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:34;}}'),
('3dca392e6685effd25b22f7eb4f47c9b', '172.16.16.24', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451557986, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:8;}}'),
('3f68572806c702b4dc05ebc836f18558', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1452062487, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:29;}}'),
('42eb3a05292acdf4549fb3c5d862f234', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451734121, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:20;}}'),
('4494388fa578753e674c854faa36fc76', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451993254, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:28;}}'),
('52ae309ce0f09291067ca0e386fca55b', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451647705, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:18;}}'),
('582dc4678657c323fc90ab650d30f7fe', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451881965, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:21;}}'),
('597c5cd8a1ac3849a2710ad98806ac74', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451968196, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:25;}}'),
('60bdac6b82173a9e2061f9a5e2381f00', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451710182, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:19;}}'),
('62535de4294149338e6b3c6d64c12a54', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451561389, 'a:4:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:13;}s:17:"logged_in_student";a:13:{s:8:"usercode";s:1:"3";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"3";s:4:"name";s:17:"manali harsh Shah";s:8:"username";s:6:"manali";s:7:"emailid";s:16:"manali@gmail.com";s:8:"mobileno";s:0:"";s:8:"phone_no";s:7:"7654345";s:5:"image";s:0:"";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:2;}s:21:"logged_in_school_user";a:13:{s:8:"usercode";s:1:"2";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"4";s:4:"name";s:3:"Dax";s:8:"username";s:3:"dax";s:7:"emailid";s:12:"dax@gmai.com";s:8:"mobileno";s:10:"9998578109";s:8:"phone_no";s:7:"1234567";s:5:"image";s:28:"user_1_1_329614Jellyfish.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"3";s:10:"login_code";i:5;}}'),
('6cb2ead262cff87e7eb6638560fde80a', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451884200, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:22;}}'),
('70f7b7aa8d6b71c1cc5de48abcb83e95', '172.16.16.20', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2612.0 Safari/537.36', 1452056549, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:33;}}'),
('740acb0498cf2c91ab6294c1440dc176', '172.16.16.24', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451558428, ''),
('77e4d90fc54dc43acde36d6603fa4505', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451974746, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:26;}}'),
('8713cef88b4f894dd358a79c7b017dc5', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451885460, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:23;}}'),
('888af7798dbed368ed81970044f78cde', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1452571399, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:38;}}'),
('8e8bee2ad6257fd0e29fae76754d24cb', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', 1453179839, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:52;}}'),
('99b1730641e327f172c059c007889516', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', 1453261857, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:53;}}'),
('9bedbec5b8780428be2fe824ab3da0ed', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', 1453348760, ''),
('a0bf8ca70c78819c59b7b4a40930ec7b', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1452655751, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:42;}}'),
('a255e2c0e4bd51319e892ac8b152241c', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', 1453548648, 'a:2:{s:9:"user_data";s:0:"";s:14:"logged_in_user";s:11:"Super Admin";}'),
('a834fa4a7e90b4046032dd90f325f69d', '172.16.16.20', 'Mozilla/5.0 (Windows NT 6.1; rv:43.0) Gecko/20100101 Firefox/43.0', 1452054003, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:30;}}'),
('b3f9f8b3218c1f83fa6e4b4ea9e30bb9', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1452681458, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:43;}}'),
('b81483bab0789c31d7dae058b919cddb', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1452595267, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:41;}}'),
('c148a9669c4c5dee72f7b70eab95ea27', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', 1453107045, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:48;}}'),
('cd68091dc7c94bc3c4ada76550aa9728', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1452683800, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:44;}}'),
('dccef6bb2a05b3590cf57fd34e610617', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451907040, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:24;}}'),
('df3d6707c5fc979dc6aafe6222b5613e', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', 1453115888, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:51;}}'),
('e052e2ff2d99713fdab0e8f269bed4ef', '172.16.16.24', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1451558573, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:9;}}'),
('e0c3b8d0efbc83b0867ff1839bb5de8c', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', 1453089537, ''),
('e6c03a566f77123219f576489aa3fc9b', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1452510989, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:37;}}'),
('f1f27e2926e0a667b77312b2cd3d55ea', '172.16.16.22', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2612.0 Safari/537.36', 1452573077, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:40;}}'),
('f64a239df41eb3d5c64b091cf3f7d7b9', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1452261426, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:36;}}'),
('f7ad04b15e73b59f926b6e6489d99fa0', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1452684428, 'a:2:{s:9:"user_data";s:0:"";s:16:"logged_in_school";a:13:{s:8:"usercode";s:1:"1";s:11:"master_code";s:1:"1";s:12:"user_type_id";s:1:"1";s:4:"name";s:14:"DN High School";s:8:"username";s:6:"roshni";s:7:"emailid";s:12:"dn@gmail.com";s:8:"mobileno";s:10:"0987654321";s:8:"phone_no";s:6:"123456";s:5:"image";s:24:"Admin__5767243Tulips.jpg";s:7:"country";s:1:"1";s:5:"state";s:1:"1";s:4:"city";s:1:"1";s:10:"login_code";i:45;}}');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `division_master`
--

INSERT INTO `division_master` (`division_code`, `standard_code`, `name`, `create_date`, `update_date`, `create_by`, `update_by`, `status`, `master_code`) VALUES
(1, 3, 'Division A', '2015-12-31 14:57:21', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(2, 4, 'Division A', '2015-12-31 14:57:29', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(3, 5, 'Division A', '2015-12-31 14:57:33', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(4, 5, 'Division B', '2015-12-31 14:57:34', '0000-00-00 00:00:00', 1, 0, 'Active', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `exam_details`
--

INSERT INTO `exam_details` (`id`, `exam_code`, `subject_code`, `date_dt`, `start_time`, `end_time`, `min_marks`, `max_marks`, `master_code`) VALUES
(1, 2, 8, '11-01-2016', '12:00 PM', '12:30 PM', 10, 30, 1),
(2, 2, 9, '04-01-2016', '01:00 PM', '02:00 PM', 20, 50, 1),
(3, 3, 8, '14-01-2016', '04:15 PM', '04:15 PM', 10, 40, 1),
(4, 3, 9, '2-01-2016', '04:15 PM', '04:15 PM', 10, 40, 1),
(5, 4, 2, '20-01-2016', '11:30 AM', '01:30 PM', 20, 50, 1),
(6, 5, 2, '11-01-2016', '11:45 AM', '11:45 AM', 0, 0, 1),
(7, 6, 1, '28-02-2016', '12:00 PM', '12:00 PM', 10, 60, 1),
(8, 6, 7, '01-03-2016', '12:00 PM', '12:00 PM', 46, 60, 1),
(9, 7, 1, '13-01-2016', '12:00 PM', '03:00 PM', 36, 100, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `exam_master`
--

INSERT INTO `exam_master` (`exam_code`, `exam_type_code`, `standard_code`, `account_year_code`, `create_date`, `update_date`, `create_by`, `update_by`, `status`, `master_code`) VALUES
(2, 1, 1, 1, '2016-01-08 15:46:56', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(3, 2, 1, 1, '2016-01-08 16:25:00', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(4, 3, 4, 1, '2016-01-11 11:35:41', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(5, 2, 4, 1, '2016-01-11 11:59:49', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(6, 1, 1, 1, '2016-01-11 12:05:09', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(7, 1, 5, 1, '2016-01-11 12:05:58', '0000-00-00 00:00:00', 1, 0, 'Active', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `exam_type`
--

INSERT INTO `exam_type` (`exam_type_code`, `exam_title`, `create_date`, `update_date`, `create_by`, `update_by`, `status`, `master_code`) VALUES
(1, 'TEST 1', '2016-01-05 08:54:07', '2016-01-05 08:54:14', 1, 1, 'Active', 1),
(2, 'TEST 2', '2016-01-05 08:56:00', '2016-01-05 08:56:11', 1, 1, 'Active', 1),
(3, 'TEST 3', '2016-01-08 10:40:08', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(4, 'FA 1', '2016-01-08 10:40:49', '0000-00-00 00:00:00', 1, 0, 'Active', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `usercode`, `user_type_id`, `feedback`, `feedback_replay`, `status`, `dateOfEntry`, `master_code`) VALUES
(1, 5, 3, 'hello', 'hii', 'Active', '2016-01-11 11:19:25', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `food_master`
--

INSERT INTO `food_master` (`food_code`, `date`, `month`, `year`, `day`, `food_name`, `dinner_name`, `create_date`, `update_date`, `create_by`, `update_by`, `status`, `master_code`) VALUES
(1, '01-01-2016', '1', 2016, 'Friday', '4', ' ', '2016-01-18 15:12:27', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(2, '02-01-2016', '1', 2016, 'Saturday', '4', ' ', '2016-01-18 15:12:27', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(3, '03-01-2016', '1', 2016, 'Sunday', ' ', ' ', '2016-01-18 15:12:27', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(4, '04-01-2016', '1', 2016, 'Monday', ' ', ' ', '2016-01-18 15:12:27', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(5, '05-01-2016', '1', 2016, 'Tuesday', ' ', '2', '2016-01-18 15:12:27', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(6, '06-01-2016', '1', 2016, 'Wednesday', ' ', ' ', '2016-01-18 15:12:27', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(7, '07-01-2016', '1', 2016, 'Thursday', ' ', ' ', '2016-01-18 15:12:27', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(8, '08-01-2016', '1', 2016, 'Friday', ' ', '3', '2016-01-18 15:12:27', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(9, '09-01-2016', '1', 2016, 'Saturday', '1', ' ', '2016-01-18 15:12:27', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(10, '10-01-2016', '1', 2016, 'Sunday', '1', ' ', '2016-01-18 15:12:27', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(11, '11-01-2016', '1', 2016, 'Monday', ' ', '2', '2016-01-18 15:12:27', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(12, '12-01-2016', '1', 2016, 'Tuesday', '4', ' ', '2016-01-18 15:12:27', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(13, '13-01-2016', '1', 2016, 'Wednesday', ' ', ' ', '2016-01-18 15:12:27', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(14, '14-01-2016', '1', 2016, 'Thursday', ' ', ' ', '2016-01-18 15:12:27', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(15, '15-01-2016', '1', 2016, 'Friday', ' ', ' ', '2016-01-18 15:12:27', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(16, '16-01-2016', '1', 2016, 'Saturday', ' ', ' ', '2016-01-18 15:12:27', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(17, '17-01-2016', '1', 2016, 'Sunday', ' ', ' ', '2016-01-18 15:12:27', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(18, '18-01-2016', '1', 2016, 'Monday', ' ', ' ', '2016-01-18 15:12:27', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(19, '19-01-2016', '1', 2016, 'Tuesday', ' ', ' ', '2016-01-18 15:12:27', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(20, '20-01-2016', '1', 2016, 'Wednesday', '4', '2', '2016-01-18 15:12:27', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(21, '21-01-2016', '1', 2016, 'Thursday', ' ', '3', '2016-01-18 15:12:27', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(22, '22-01-2016', '1', 2016, 'Friday', '4', '3,2', '2016-01-18 15:12:27', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(23, '23-01-2016', '1', 2016, 'Saturday', ' ', ' ', '2016-01-18 15:12:27', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(24, '24-01-2016', '1', 2016, 'Sunday', ' ', ' ', '2016-01-18 15:12:27', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(25, '25-01-2016', '1', 2016, 'Monday', ' ', ' ', '2016-01-18 15:12:27', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(26, '26-01-2016', '1', 2016, 'Tuesday', ' ', ' ', '2016-01-18 15:12:27', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(27, '27-01-2016', '1', 2016, 'Wednesday', ' ', ' ', '2016-01-18 15:12:27', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(28, '28-01-2016', '1', 2016, 'Thursday', ' ', ' ', '2016-01-18 15:12:27', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(29, '29-01-2016', '1', 2016, 'Friday', ' ', ' ', '2016-01-18 15:12:27', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(30, '30-01-2016', '1', 2016, 'Saturday', ' ', ' ', '2016-01-18 15:12:27', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(31, '31-01-2016', '1', 2016, 'Sunday', ' ', ' ', '2016-01-18 15:12:27', '0000-00-00 00:00:00', 1, 0, 'Active', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `holiday_master`
--

INSERT INTO `holiday_master` (`holiday_code`, `start_date`, `end_date`, `title`, `description`, `type`, `create_date`, `update_date`, `create_by`, `update_by`, `status`, `master_code`) VALUES
(1, '02-01-2016', '01-02-2016', 'christmas week', 'merry christmas', 'multi', '2016-01-02 12:14:14', '2016-01-02 12:18:39', 1, 1, 'Active', 1),
(3, '12-01-2016', '03-02-2016', 'makar sankranti', 'mini vacation', 'multi', '2016-01-13 15:37:03', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(4, '13-01-2016', '', 'saturday', '2nd saturday off', 'single', '2016-01-13 15:38:02', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(5, '13-01-2016', ' ', 'swami bday', 'holiday', 'single', '2016-01-13 15:39:23', '0000-00-00 00:00:00', 1, 0, 'Active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_info`
--

CREATE TABLE IF NOT EXISTS `login_info` (
  `login_code` int(11) NOT NULL AUTO_INCREMENT,
  `usercode` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `browserdt` varchar(255) NOT NULL,
  `timedt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mac_address` varchar(255) NOT NULL,
  `logout_time` int(50) NOT NULL,
  `status` enum('Sucess','Failed') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `availeble` enum('N','Y') NOT NULL,
  `logintime` int(30) NOT NULL,
  `last_event` int(30) NOT NULL,
  PRIMARY KEY (`login_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `login_info`
--

INSERT INTO `login_info` (`login_code`, `usercode`, `ip`, `browserdt`, `timedt`, `mac_address`, `logout_time`, `status`, `username`, `password`, `availeble`, `logintime`, `last_event`) VALUES
(1, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2015-12-31 14:51:58', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1451553718, 1451553718),
(2, 3, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2015-12-31 15:12:41', '', 0, 'Sucess', 'manali', '123', 'Y', 1451554961, 1451554961),
(3, 0, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2015-12-31 15:18:07', '', 0, 'Failed', 'km,', 'gvc', 'N', 0, 0),
(4, 2, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2015-12-31 15:51:50', '', 1451557310, 'Sucess', 'dax', 'dax01', 'N', 1451557306, 1451557306),
(5, 2, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2015-12-31 15:51:59', '', 0, 'Sucess', 'dax', 'dax01', 'Y', 1451557319, 1451557319),
(6, 0, '172.16.16.24', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2015-12-31 15:54:44', '', 0, 'Failed', 'manali', '123456', 'N', 0, 0),
(7, 3, '172.16.16.24', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2015-12-31 15:54:59', '', 1451557499, 'Sucess', 'manali', '123', 'N', 1451557494, 1451557494),
(8, 1, '172.16.16.24', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2015-12-31 15:55:06', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1451557506, 1451557506),
(9, 1, '172.16.16.24', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2015-12-31 16:12:55', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1451558575, 1451558575),
(10, 1, '172.16.16.24', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0', '2015-12-31 16:16:11', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1451558771, 1451558771),
(11, 0, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2015-12-31 16:37:54', '', 0, 'Failed', 'roshni', '12345', 'N', 0, 0),
(12, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2015-12-31 16:38:00', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1451560080, 1451560080),
(13, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2015-12-31 16:50:45', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1451560845, 1451560845),
(14, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2016-01-01 09:07:47', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1451619467, 1451619467),
(15, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2016-01-01 10:51:48', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1451625708, 1451625708),
(16, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2016-01-01 10:52:39', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1451625759, 1451625759),
(17, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2016-01-01 15:57:30', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1451644050, 1451644050),
(18, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2016-01-01 15:57:59', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1451644079, 1451644079),
(19, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2016-01-02 09:13:40', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1451706220, 1451706220),
(20, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2016-01-02 10:50:40', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1451712040, 1451712040),
(21, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2016-01-04 08:55:29', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1451877929, 1451877929),
(22, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2016-01-04 10:02:58', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1451881978, 1451881978),
(23, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2016-01-04 10:40:34', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1451884234, 1451884234),
(24, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2016-01-04 11:01:11', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1451885471, 1451885471),
(25, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2016-01-05 08:52:34', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1451964154, 1451964154),
(26, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2016-01-05 10:14:44', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1451969084, 1451969084),
(27, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2016-01-05 12:17:11', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1451976431, 1451976431),
(28, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2016-01-05 15:47:46', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1451989066, 1451989066),
(29, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2016-01-06 09:09:21', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1452051561, 1452051561),
(30, 1, '172.16.16.20', 'Mozilla/5.0 (Windows NT 6.1; rv:43.0) Gecko/20100101 Firefox/43.0', '2016-01-06 09:50:24', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1452054024, 1452054024),
(31, 1, '172.16.16.20', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2612.0 Safari/537.36', '2016-01-06 09:54:16', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1452054256, 1452054256),
(32, 0, '172.16.16.20', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2612.0 Safari/537.36', '2016-01-06 10:32:40', '', 0, 'Failed', 'roshni', 'roshni', 'N', 0, 0),
(33, 1, '172.16.16.20', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2612.0 Safari/537.36', '2016-01-06 10:32:47', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1452056567, 1452056567),
(34, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2016-01-07 09:49:03', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1452140343, 1452140343),
(35, 0, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2016-01-07 16:29:07', '', 0, 'Failed', 'roshni', '12345', 'N', 0, 0),
(36, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2016-01-07 16:29:14', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1452164354, 1452164354),
(37, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2016-01-11 09:27:12', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1452484632, 1452484632),
(38, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2016-01-12 09:33:40', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1452571420, 1452571420),
(39, 0, '172.16.16.22', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2612.0 Safari/537.36', '2016-01-12 09:39:55', '', 0, 'Failed', 'roshni', '12345', 'N', 0, 0),
(40, 1, '172.16.16.22', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2612.0 Safari/537.36', '2016-01-12 09:40:01', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1452571801, 1452571801),
(41, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2016-01-12 10:18:43', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1452574123, 1452574123),
(42, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2016-01-13 09:00:16', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1452655816, 1452655816),
(43, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2016-01-13 09:10:35', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1452656435, 1452656435),
(44, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2016-01-13 16:29:47', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1452682787, 1452682787),
(45, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '2016-01-13 16:52:13', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1452684133, 1452684133),
(46, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', '2016-01-18 09:36:05', '', 1453089965, 'Sucess', 'roshni', '123456', 'N', 1453089953, 1453089953),
(47, 0, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', '2016-01-18 09:36:09', '', 0, 'Failed', 'superadmin', 'rere', 'N', 0, 0),
(48, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', '2016-01-18 09:36:18', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1453089978, 1453089978),
(49, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', '2016-01-18 15:09:01', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1453109941, 1453109941),
(50, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', '2016-01-18 16:50:01', '', 1453116001, 'Sucess', 'roshni', '123456', 'N', 1453113803, 1453113803),
(51, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', '2016-01-18 16:51:26', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1453116086, 1453116086),
(52, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', '2016-01-19 09:46:51', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1453177011, 1453177011),
(53, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', '2016-01-20 09:21:11', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1453261871, 1453261871),
(54, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', '2016-01-23 15:51:32', '', 0, 'Sucess', 'roshni', '123456', 'Y', 1453544492, 1453544492);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`noti_code`, `noti_title`, `noti_desc`, `noti_date`, `send_type`, `standard_code`, `with_sms`, `create_date`, `update_date`, `create_by`, `update_by`, `status`, `master_code`) VALUES
(1, 'event', 'details', '01-01-2016', 'Selected_Student', 5, 'Y', '2016-01-01 16:35:53', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(2, 'event', 'details', '01-01-2016', 'Selected_Student', 5, 'Y', '2016-01-01 16:37:19', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(3, 'event', 'details', '01-01-2016', 'Selected_Student', 5, 'Y', '2016-01-01 16:37:47', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(4, 'event', 'details', '01-01-2016', 'Selected_Student', 5, 'Y', '2016-01-01 16:37:56', '0000-00-00 00:00:00', 1, 0, 'Active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification_dt`
--

CREATE TABLE IF NOT EXISTS `notification_dt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `noti_code` int(11) NOT NULL,
  `EndCode` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `notification_dt`
--

INSERT INTO `notification_dt` (`id`, `noti_code`, `EndCode`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `result_master`
--

INSERT INTO `result_master` (`result_code`, `student_yearly_code`, `standard_code`, `division_code`, `subject_code`, `exam_type_code`, `marks`, `account_year_code`, `create_date`, `create_by`, `status`, `master_code`) VALUES
(17, 1, 5, 3, 1, 1, 30, 1, '2016-01-11 15:06:26', 1, 'Active', 1),
(28, 2, 1, 0, 9, 2, 0, 1, '2016-01-11 15:44:55', 1, 'Active', 1),
(29, 3, 1, 0, 9, 2, 24, 1, '2016-01-11 15:44:55', 1, 'Active', 1),
(30, 2, 1, 0, 8, 1, 25, 1, '2016-01-11 15:49:11', 1, 'Active', 1),
(31, 3, 1, 0, 8, 1, 26, 1, '2016-01-11 15:49:11', 1, 'Active', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `school_master`
--

INSERT INTO `school_master` (`school_code`, `name`, `emailid`, `mobileno`, `phone_no`, `country`, `state`, `city`, `username`, `password`, `user_img`, `create_date`, `update_date`, `create_by`, `update_by`, `status`) VALUES
(1, 'DN High School', 'dn@gmail.com', '0987654321', '123456', '1', '1', '1', 'roshni', '123456', 'Admin__5767243Tulips.jpg', '2015-12-31 14:51:12', '0000-00-00 00:00:00', 'Super Admin', '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `send_msg_dt`
--

CREATE TABLE IF NOT EXISTS `send_msg_dt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_code` int(11) NOT NULL,
  `EndCode` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

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
(18, 20, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `send_msg_master`
--

INSERT INTO `send_msg_master` (`msg_code`, `msg_desc`, `msg_date`, `send_type`, `standard_code`, `other_mobile_no`, `create_date`, `update_date`, `create_by`, `update_by`, `status`, `master_code`) VALUES
(1, 'hi', '01-01-2016', 'Selected_Student', 5, '', '2016-01-01 14:58:02', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(2, 'hii', '01-01-2016', 'Selected_Student', 5, '', '2016-01-01 16:52:07', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(3, 'hii', '01-01-2016', 'Selected_Student', 5, '', '2016-01-01 16:52:42', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(4, 'hii', '01-01-2016', 'Selected_Student', 5, '', '2016-01-01 16:52:45', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(5, 'hii', '01-01-2016', 'Selected_Student', 5, '', '2016-01-01 16:53:28', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(6, 'hii', '01-01-2016', 'Selected_Student', 5, '', '2016-01-01 16:53:32', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(7, 'hii', '01-01-2016', 'Selected_Student', 5, '', '2016-01-01 16:54:39', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(8, 'hii', '01-01-2016', 'Selected_Student', 5, '', '2016-01-01 16:55:35', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(9, 'hii', '01-01-2016', 'Selected_Student', 5, '', '2016-01-01 16:55:58', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(10, 'hii', '01-01-2016', 'Selected_Student', 5, '', '2016-01-01 16:56:00', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(11, 'hii', '01-01-2016', 'Selected_Student', 5, '', '2016-01-01 16:56:11', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(12, 'hii', '01-01-2016', 'Selected_Student', 5, '', '2016-01-01 16:58:25', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(13, 'hii', '01-01-2016', 'Selected_Student', 5, '', '2016-01-01 16:58:40', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(14, 'hii', '01-01-2016', 'Selected_Student', 5, '', '2016-01-01 17:01:23', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(15, 'hi', '02-01-2016', 'Selected_Student', 5, '', '2016-01-02 09:13:58', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(16, 'heloo', '02-01-2016', 'All_Student', 0, '', '2016-01-02 09:27:56', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(17, 'heloo', '02-01-2016', 'All_Student', 0, '', '2016-01-02 10:24:09', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(18, '123', '04-01-2016', 'Selected_Student', 5, '', '2016-01-04 16:32:33', '0000-00-00 00:00:00', 1, 0, 'Delete', 1),
(19, '123', '04-01-2016', 'Selected_Student', 5, '', '2016-01-04 16:40:42', '0000-00-00 00:00:00', 1, 0, 'Delete', 1),
(20, '123', '04-01-2016', 'Selected_Student', 5, '', '2016-01-04 16:43:10', '0000-00-00 00:00:00', 1, 0, 'Delete', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `url`, `lecture`, `name`, `school_img`, `school_logo`, `address`, `email`, `phone`, `mobile`, `master_code`, `create_date`, `update_date`, `create_by`, `update_by`) VALUES
(1, 'http://ip.shreesms.net/smsserver/SMS10N.aspx?Userid=DhSoni&UserPassword=126&PhoneNumber={number}&Text={message}&GSM=VISSCL', 4, 'DMD school Anand', 'school_img_1_335052Desert.jpg', 'school_logo_1_678567Koala.jpg', 'Anand,Gujarat.', 'admin@dmd.com', 4467, '9999999999', 1, '2016-01-05 13:39:38', '2016-01-05 13:58:28', 1, 1);

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
(1, 'http://ip.shreesms.net/smsserver/SMS10N.aspx?Userid=DhavalSoni&UserPassword=123456&PhoneNumber={number}&Text={message}&GSM=VISSCL', '2016-01-01 12:29:12', '2016-01-01 13:24:19', 1, 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sms_send_login_dt`
--

INSERT INTO `sms_send_login_dt` (`id`, `student_code`, `status`, `timedt`, `standard_code`, `message`, `master_code`) VALUES
(1, 1, 'FLASE', '2016-01-05 04:19:31', 5, '{"number":"917654345444","message":"Vatsalya+International+School%5CnUsername%3A+manali%5CnPassword%3A+123%5CnDownlaod+App+https%3A%2F%2Fgoo.gl%2FzGFNEY","url":[{"url":"http:\\/\\/ip.shreesms.net\\/smsserver\\/SMS10N.aspx?Userid=DhavalSoni&UserPassword=123456&PhoneNumber={number}&Text={message}&GSM=VISSCL"}]}', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `standard_master`
--

INSERT INTO `standard_master` (`standard_code`, `standard_name`, `division`, `create_date`, `update_date`, `create_by`, `update_by`, `status`, `master_code`) VALUES
(1, 'JR KG', 'N', '2015-12-31 14:52:40', '2015-12-31 14:53:00', 1, 1, 'Active', 1),
(2, 'SR KG', 'N', '2015-12-31 14:52:47', '2015-12-31 14:52:54', 1, 1, 'Active', 1),
(3, 'STD 1', 'Y', '2015-12-31 14:53:07', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(4, 'STD 2', 'Y', '2015-12-31 14:53:14', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(5, 'STD 3', 'Y', '2015-12-31 14:53:22', '0000-00-00 00:00:00', 1, 0, 'Active', 1),
(6, 'STD 4', 'N', '2016-01-08 12:40:30', '0000-00-00 00:00:00', 1, 0, 'Active', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `student_master`
--

INSERT INTO `student_master` (`student_code`, `first_name`, `middle_name`, `sur_name`, `admission_dt`, `birthdt`, `gender`, `bloodgrop`, `student_address`, `city_code`, `country_code`, `state_code`, `student_photo`, `phone`, `emailid`, `status`, `guardian_first_name`, `guardian_sur_name`, `guardian_middle_name`, `guardian_mobile_no`, `guardian_phone_no`, `guardian_email`, `g_country_code`, `g_state_code`, `g_city_code`, `guardian_address`, `create_date`, `update_date`, `create_by`, `update_by`, `master_code`) VALUES
(1, 'manali', 'harsh', 'Shah', '31-12-2015', '27-12-2009', 'F', 'B+', 'N.s.Patel circle, \r\nAnand, Gujarat.', 1, 1, 1, 'stud_1_5130063Koala.jpg', '7654345444', 'manali@gmail.com', 'Active', 'JUHI', 'Shah', '', '7878878787', '787883', 'juhi@gmail.com', 2, 4, 9, 'Supermarket,\r\nAnand,\r\nGujarat.', '2015-12-31 15:05:15', '0000-00-00 00:00:00', 1, 0, 1),
(2, 'juhi', 'r', 'shah', '08-01-2016', '05-01-2013', 'F', 'B-', 'Super market, Anand, Gujarat.', 1, 1, 1, 'stud_1_8583039Desert.jpg', '6767677688', 'juhi@gmail.com', 'Active', 'roshni', 'mansuri', 'n', '9898989898', '93874343', 'rosh@gmail.com', 1, 1, 1, 'khambhat,anand. gujarat', '2016-01-08 12:01:12', '0000-00-00 00:00:00', 1, 0, 1),
(3, 'jitu', 'a', 'rajpurohit', '08-01-2016', '06-01-2013', 'M', 'A-', '', 0, 1, 0, '', '9898989899', 'jitu@gmail.com', 'Active', '', '', '', '', '', '', 0, 0, 0, '', '2016-01-08 12:21:26', '0000-00-00 00:00:00', 1, 0, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `student_yearly_acccount`
--

INSERT INTO `student_yearly_acccount` (`student_yearly_code`, `student_code`, `current_standard`, `account_year_code`, `division_code`, `timedt`, `status`, `master_code`) VALUES
(1, 1, 5, 1, 3, '31-12-2015', 'Active', 1),
(2, 2, 4, 1, 2, '08-01-2016', 'Active', 1),
(3, 3, 1, 1, 0, '08-01-2016', 'Active', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `subject_master`
--

INSERT INTO `subject_master` (`subject_code`, `standard_code`, `subject_id`, `subject_name`, `create_date`, `update_date`, `create_by`, `update_by`, `master_code`, `status`) VALUES
(1, 5, '43', 'science', '2016-01-05 15:02:32', '2016-01-05 15:46:07', 1, 1, 1, 'Active'),
(2, 4, '23', 'History', '2016-01-05 15:03:30', '2016-01-05 15:46:36', 1, 1, 1, 'Active'),
(7, 5, '1234', 'sanskrit', '2016-01-05 15:29:51', '0000-00-00 00:00:00', 1, 0, 1, 'Active'),
(8, 1, '123', 'Story', '2016-01-08 11:40:37', '0000-00-00 00:00:00', 1, 0, 1, 'Active'),
(9, 1, '44', 'Playing', '2016-01-08 11:40:46', '0000-00-00 00:00:00', 1, 0, 1, 'Active'),
(10, 6, 'English', '00002', '2016-01-12 09:42:38', '0000-00-00 00:00:00', 1, 0, 1, 'Active');

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
(281, 5, 4, '5', '1', '', '10:25 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:25:00', 1, 1),
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
(441, 1, 0, '3', '1', '', '11:30 AM', '', 'N', '0', '', '', 0, '2016-01-06 11:38:16', 1, 1),
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
(508, 4, 2, '1', '4', '20', '11:45 AM', '12:05 PM', 'N', '0', '', '', 2, '2016-01-06 11:57:57', 1, 1),
(509, 4, 2, '2', '1', '20', '10:15 AM', '10:35 AM', 'N', '0', '', '', -1, '2016-01-06 11:57:57', 1, 1),
(510, 4, 2, '2', '2', '20', '10:35 AM', '10:55 AM', 'Y', '20', '10:55 AM', '11:15 AM', -1, '2016-01-06 11:57:57', 1, 1),
(511, 4, 2, '2', '3', '20', '11:15 AM', '11:35 AM', 'N', '0', '', '', -1, '2016-01-06 11:57:57', 1, 1),
(512, 4, 2, '2', '4', '20', '11:35 AM', '11:55 AM', 'N', '0', '', '', -1, '2016-01-06 11:57:57', 1, 1),
(513, 4, 2, '3', '1', '30', '10:15 AM', '10:45 AM', 'Y', '10', '10:45 AM', '10:55 AM', 2, '2016-01-06 11:57:57', 1, 1),
(514, 4, 2, '3', '2', '30', '10:55 AM', '11:25 AM', 'Y', '10', '11:25 AM', '11:35 AM', -1, '2016-01-06 11:57:57', 1, 1),
(515, 4, 2, '3', '3', '20', '11:35 AM', '11:55 AM', 'N', '0', '', '', -1, '2016-01-06 11:57:57', 1, 1),
(516, 4, 2, '3', '4', '30', '11:55 AM', '12:25 PM', 'N', '0', '', '', 2, '2016-01-06 11:57:57', 1, 1),
(517, 4, 2, '4', '1', '30', '10:15 AM', '10:45 AM', 'N', '0', '', '', -1, '2016-01-06 11:57:57', 1, 1),
(518, 4, 2, '4', '2', '40', '10:45 AM', '11:25 AM', 'Y', '10', '11:25 AM', '11:35 AM', 2, '2016-01-06 11:57:57', 1, 1),
(519, 4, 2, '4', '3', '20', '11:35 AM', '11:55 AM', 'N', '0', '', '', -1, '2016-01-06 11:57:57', 1, 1),
(520, 4, 2, '4', '4', '20', '11:55 AM', '12:15 PM', 'N', '0', '', '', 2, '2016-01-06 11:57:57', 1, 1),
(521, 4, 2, '5', '1', '30', '10:15 AM', '10:45 AM', 'N', '0', '', '', -1, '2016-01-06 11:57:57', 1, 1),
(522, 4, 2, '5', '2', '30', '10:45 AM', '11:15 AM', 'Y', '30', '11:15 AM', '11:45 AM', 2, '2016-01-06 11:57:57', 1, 1),
(523, 4, 2, '5', '3', '10', '11:45 AM', '11:55 AM', 'Y', '50', '11:55 AM', '12:45 PM', -1, '2016-01-06 11:57:57', 1, 1),
(524, 4, 2, '5', '4', '10', '12:45 PM', '12:55 PM', 'N', '0', '', '', 2, '2016-01-06 11:57:57', 1, 1),
(525, 4, 2, '6', '1', '50', '10:15 AM', '11:05 AM', 'Y', '30', '11:05 AM', '11:35 AM', 2, '2016-01-06 11:57:57', 1, 1),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_custom_type_master`
--

INSERT INTO `user_custom_type_master` (`user_type_id`, `name`, `master_code`, `create_date`, `update_date`, `create_by`, `update_by`, `status`) VALUES
(1, 'Account', 1, '2015-12-31 14:58:13', '0000-00-00 00:00:00', 1, 0, 'Active');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`usercode`, `name`, `emailid`, `mobileno`, `phone_no`, `country`, `state`, `city`, `user_img`, `username`, `password`, `user_type_id`, `create_date`, `update_date`, `create_by`, `update_by`, `status`, `master_code`, `end_code`, `reg_id`) VALUES
(1, 'DN High School', 'dn@gmail.com', '0987654321', '123456', '1', '1', '1', 'Admin__5767243Tulips.jpg', 'roshni', '123456', 1, '2015-12-31 14:51:12', '0000-00-00 00:00:00', 'Super Admin', '', 'Active', 1, 0, ''),
(2, 'Dax', 'dax@gmai.com', '9998578109', '1234567', '1', '1', '3', 'user_1_1_329614Jellyfish.jpg', 'dax', 'dax01', 4, '2015-12-31 14:59:14', '0000-00-00 00:00:00', '1', '', 'Active', 1, 1, ''),
(3, 'manali harsh Shah', 'manali@gmail.com', '', '7654345444', '1', '1', '1', '', 'manali', '123', 3, '2015-12-31 15:05:15', '2016-01-01 14:29:10', '1', '1', 'Active', 1, 1, ''),
(4, 'juhi r shah', 'juhi@gmail.com', '', '6767677688', '1', '1', '1', '', 'juhi', '123', 3, '2016-01-08 12:01:12', '0000-00-00 00:00:00', '1', '', 'Active', 1, 2, ''),
(5, 'jitu a rajpurohit', 'jitu@gmail.com', '9998578909', '9898989899', '1', '', '', '', 'jitu', '123', 3, '2016-01-08 12:21:26', '0000-00-00 00:00:00', '1', '', 'Active', 1, 3, '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `web_event_detail`
--

INSERT INTO `web_event_detail` (`event_dt_code`, `event_code`, `image`, `master_code`) VALUES
(1, 1, 'event_1_An_2214264Hydrangeas.jpg', 1),
(2, 1, 'event_1_An_706362Lighthouse.jpg', 1),
(3, 1, 'event_1_An_777966Penguins.jpg', 1),
(4, 2, 'event_1_Ev_1319674image1.jpg', 1),
(5, 2, 'event_1_Ev_8538324image2-Copy.jpg', 1),
(6, 2, 'event_1_Ev_1360159image2.jpg', 1),
(7, 2, 'event_1_Ev_9548023image3-Copy.jpg', 1),
(8, 2, 'event_1_Ev_7776670image3.jpg', 1),
(9, 2, 'event_1_Ev_5119489sm-img-1-Copy.jpg', 1),
(10, 2, 'event_1_Ev_8000846sm-img-1.jpg', 1),
(11, 2, 'event_1_Ev_5234598image4.jpg', 1),
(12, 2, 'event_1_Ev_2449316sm-img-1-Copy.jpg', 1),
(13, 2, 'event_1_Ev_7455210sm-img-3.jpg', 1),
(14, 2, 'event_1_Ev_3029092image3-Copy.jpg', 1),
(15, 2, 'event_1_Ev_5217981image3.jpg', 1),
(16, 2, 'event_1_Ev_2347802Lighthouse.jpg', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `web_event_master`
--

INSERT INTO `web_event_master` (`event_code`, `event_title`, `event_dt`, `cover_img`, `master_code`, `end_code`, `create_date`, `update_date`, `create_by`, `update_by`, `status`) VALUES
(1, 'Annual Function', '26-12-2015', 'event_1_An_7636484Chrysanthemum.jpg', 1, 0, '2015-12-31 15:05:55', '0000-00-00 00:00:00', 1, 0, 'Active'),
(2, 'Event One', '20-01-2016', 'event_1_Ev_4294690image5.jpg', 1, 0, '2016-01-12 09:46:14', '2016-01-12 12:42:38', 1, 1, 'Active');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `web_news_master`
--

INSERT INTO `web_news_master` (`news_code`, `news_title`, `news_desc`, `news_dt`, `cover_img`, `master_code`, `end_code`, `create_date`, `update_date`, `create_by`, `update_by`, `status`) VALUES
(1, 'Annual Day Celebration', 'function was good', '31-12-2015', 'news_1_An_8087857Desert.jpg', 1, 0, '2015-12-31 15:07:37', '2016-01-12 10:45:03', 1, 1, 'Active');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `web_photo_gallery_detail`
--

INSERT INTO `web_photo_gallery_detail` (`gallery_dt_code`, `gallery_code`, `photopath`, `master_code`) VALUES
(1, 1, 'photo_1_Tr_6933743Chrysanthemum.jpg', 1),
(2, 1, 'photo_1_Tr_793676Jellyfish.jpg', 1),
(3, 1, 'photo_1_Tr_1477987Koala.jpg', 1),
(4, 1, 'photo_1_Tr_9088190Lighthouse.jpg', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `web_photo_gallery_master`
--

INSERT INTO `web_photo_gallery_master` (`gallery_code`, `gallery_name`, `gallery_desc`, `gallery_dt`, `gallery_cover_img`, `year`, `month`, `master_code`, `end_code`, `create_date`, `update_date`, `create_by`, `update_by`, `status`) VALUES
(1, 'Trip 2015', 'trip organized by school', '03-12-2015', 'photo_1_Tr_982806Hydrangeas.jpg', '2015', 12, 1, 0, '2015-12-31 15:10:28', '0000-00-00 00:00:00', 1, 0, 'Active');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `web_video_list`
--

INSERT INTO `web_video_list` (`video_id`, `video_title`, `cover_img`, `master_code`, `end_code`, `status`, `create_date`, `update_date`, `create_by`, `update_by`) VALUES
(1, 'Technology', 'video_1_Te_73116510Penguins.jpg', 1, 0, 'Active', '2015-12-31 15:11:01', '2016-01-12 10:48:08', 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `web_video_master`
--

INSERT INTO `web_video_master` (`video_code`, `video_id`, `video_name`, `video_desc`, `video_url`, `cover_img`, `year`, `month`, `video_dt`, `master_code`, `end_code`, `create_date`, `update_date`, `create_by`, `update_by`, `status`) VALUES
(1, 1, 'computer Latest technology 2015', 'new invention', 'https://www.youtube.com/embed/aFgEPAzgBpA', 'video_1_1_co_5832803Lighthouse.jpg', '2015', '12', '30-12-2015', 1, 0, '2015-12-31 15:12:17', '2016-01-12 10:48:19', 1, 1, 'Active');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
