-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 18, 2014 at 05:58 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `posnic`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE IF NOT EXISTS `branches` (
  `id` int(200) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) DEFAULT NULL,
  `code` varchar(100) NOT NULL,
  `store_name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` varchar(40) NOT NULL,
  `country` varchar(50) NOT NULL,
  `website` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_location` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `tax_cst` varchar(100) NOT NULL,
  `tax_gst` varchar(100) NOT NULL,
  `tax_reg` varchar(255) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `deleted_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `guid`, `code`, `store_name`, `address`, `city`, `state`, `zip`, `country`, `website`, `phone`, `email`, `fax`, `bank_name`, `bank_location`, `account_number`, `tax_cst`, `tax_gst`, `tax_reg`, `active_status`, `delete_status`, `deleted_by`) VALUES
(1, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'BRC-102', 'PIZZA HUT', 'sgsdg', 'sdgsd', 'ssdag', 'sdag', 'sdagdsagasd', 'asdgsadgsda', '90890890', 'jibigopi007@gmail.com', '436436346', '', '', '', '', '', '', 1, 0, ''),
(2, 'BE4CB6FB-9D0F-457A-9D0F-D7948222EBB3', 'BRC-103', 'K F C', '', '', '', '', '', '', '0980980980', '', '', '', '', '', '', '', '', 1, 0, ''),
(3, 'BE4CB6FBBE4CB6FB-9D0F-457A-9D0F-D7948222EBB3', 'BCH-109', 'Kottayam', 'fsdfsad', 'dsgds', 'gsd', 'sdg', 'sdgsd', 'fhdf4574', '66734673', 'jibi344443@yahoo.com', '467457', '', '', '', '', '', '', 1, 0, NULL),
(4, '2307d083b4dc2d6476b05c96ef69a99b', 'BCH-109', 'Kottayam', '133, kottayam', 'kottayam', 'kerala', '6767687', 'india', '', '789798798', 'jibi344443@yahoo.com', '78798526', '', '', '', '', '', '', 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branches_x_payment_modes`
--

CREATE TABLE IF NOT EXISTS `branches_x_payment_modes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` varchar(255) DEFAULT NULL,
  `pay_id` varchar(100) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT '1',
  `guid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `branch_id` varchar(255) DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `added_by` int(100) NOT NULL,
  `deleted_by` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `guid`, `name`, `branch_id`, `active_status`, `delete_status`, `added_by`, `deleted_by`) VALUES
(1, 'cfd8b485f99e561408192c594f8c2e92', 'LG', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, 61, 61),
(2, '1642d900f6768119e3dd75bbf8ed0fc2', 'Nokia', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 0, 0, 61),
(3, '11d08dc2db3920364304c6ed1192b5ba', 'THOSHIBA', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 0, 0, 61),
(4, '0a1db6b7e58b53971b12790f10e27d60', 'Samsung', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 0, 0, 61),
(5, '90642ff56db4789380d00acae0f053fd', 'AXE1', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, 61, 0),
(6, 'd270d314cf6ccee8c618495e9feba4ff', 'Mentos', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, 61, 61),
(7, 'a85e2c85b10bd213c8b876acfa8aa7a5', 'Silverex', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, 61, 0),
(8, '6a3fba30105e2894ff21a1bef6443300', 'LG', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, 61, 0),
(9, 'db336d9ef0d8a4b64a17cef1a0b91c6e', 'Notng', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, 61, 61),
(10, '99cb6ba01684b50fa56b573351b11b84', 'sasi', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 1, 61, 61),
(11, 'f2e56b486bcd555842563ec7b58c62c3', 'Onida1', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, 61, 61),
(12, '8974ee8c5efa331e1a241d5134d8a1d6', 'monish', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 1, 61, 61),
(13, '4d0e175adce4c2a647de47e0f75bb5e8', 'sasi', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 1, 61, 61),
(14, '36840ac524c7bfbe92498f06c0ed35f8', 'dasdasf', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 0, 61, 0),
(15, '4363cdfeb27784549d2d4f5e4782177e', 'sdsgsg', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, 61, 0),
(16, 'd7f081c1498b201c98be6e29536b5e51', 'Samsung1', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, 61, 0),
(17, '9287313f27fdacb23e712e95cb16ef35', 'sdfgsd', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 1, 61, 61),
(18, '82aaba1ac1310efc57ef159f97cf7d00', 'noki', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 1, 61, 61),
(19, 'b75afe85b7eac44cbdae6094b67645aa', 'LG', 'BE4CB6FB-9D0F-457A-9D0F-D7948222EBB3', 1, 0, 61, 0),
(20, 'a3b7bcbfe5771bf8333408e95b5f7e85', 'Brands', 'BE4CB6FB-9D0F-457A-9D0F-D7948222EBB3', 1, 0, 61, 0),
(21, '5f88cfa9500bc70b9fd172182d528c73', 'brands 1', 'BE4CB6FB-9D0F-457A-9D0F-D7948222EBB3', 1, 0, 61, 0),
(22, 'fb27c6720ef3b22ada9fa07edbf9bf53', 'brands 2', 'BE4CB6FB-9D0F-457A-9D0F-D7948222EBB3', 1, 0, 61, 0),
(23, 'd00f4af34c53902b94fb87279f46c8e1', 'brands 3', 'BE4CB6FB-9D0F-457A-9D0F-D7948222EBB3', 1, 0, 61, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` varchar(65000) NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MEMORY DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('fda6697e3091030e74d986e67d5cd713', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:30.0) Gecko/20100101 Firefox/30.0', 1400392615, '');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) DEFAULT NULL,
  `branch_id` varchar(255) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `title` varchar(10) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `bday` int(20) NOT NULL,
  `mday` int(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `credit_limit` int(100) NOT NULL,
  `cdays` int(100) NOT NULL,
  `month_credit_bal` varchar(100) NOT NULL,
  `category_id` varchar(100) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `bank_location` varchar(50) NOT NULL,
  `website` varchar(100) NOT NULL,
  `cst` varchar(50) NOT NULL,
  `gst` varchar(50) NOT NULL,
  `tax_no` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `added_by` varchar(255) DEFAULT NULL,
  `deleted_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `guid`, `branch_id`, `first_name`, `title`, `last_name`, `address`, `address2`, `bday`, `mday`, `city`, `state`, `zip`, `country`, `payment`, `credit_limit`, `cdays`, `month_credit_bal`, `category_id`, `comments`, `company_name`, `email`, `phone`, `account_number`, `bank_name`, `bank_location`, `website`, `cst`, `gst`, `tax_no`, `created_by`, `active_status`, `delete_status`, `added_by`, `deleted_by`) VALUES
(3, '0f7c80352b128f9a45d25e42d1ebd19e', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'jibi', '1', 'gopi', 'sdsd', '', 0, 0, 'sdgsd', 'sdgsd', '44236', 'sdgsdg', '62913143b64724f3f2e19b611c0c52a1', 1, 0, '0', 'b0913b800960821c61b9e7426cc3f1b8', '0', 'rtweytwy', 'jibi344443@yahoo.com', '457457', '', '', '', 'wtyweyy', '', '', '', 0, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(6, 'compan', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'gopi', '1', 'papu', '78979', '', 1368316800, 1368403200, 'HSR Layout', '79879', '686509', 'india', 'caf6d38b8e02db86b3d41fd23a6439bb', 1200, 7987, '7987', 'b0913b800960821c61b9e7426cc3f1b8', '0', 'posnic', 'jibi@yahoo.com', '7795398584', 'ACT446546', '78979', '78979', 'www.posnic.com', '97987', '7987', '9878979', 0, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(7, '63aba6eb627ce1811191c2d22399191d', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'Sridhar', '1', 'bala', '789789', '', 1390435200, 1390435200, '798', '798', '98798', '789', '22b29efa97369324e345614ab68b773f', 89, 89, '89', 'fe29e56d1e12ecaa33cff3242d8b8390', '0', 'posnic', 'sridharkalaibala@gmail.com', '798798', '78789khkjhk', 'Fedaral', 'bangalore', 'www.posnic.com', 'Tuy66876', '687687', '687687', 0, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(8, '5315c17449a7324783c45ae3632f7487', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'Sridhar', '1', 'bala', 'bangalore', '', 508204800, 1436918400, 'BDA', 'karnataka', '87979', 'india', 'cb22f3b1c17a6b1df9d2090e945f0364', 78978, 78, '7879', 'b0913b800960821c61b9e7426cc3f1b8', '0', 'posnic', 'sridharkalaibala@gmail.com', '789879879', 'ACT789798', 'IDBI', 'HSR Layout', 'www.posnic.com', '7987987', '789798', '797897', 0, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(9, 'ee6958cdd55bbe2225e4fec2cb6cc6ce', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8908', '1', '89080', 'iuyi', '', 0, 0, 'yiuy', 'uiyi', 'yiuyi', 'uiyui', '22b29efa97369324e345614ab68b773f', 0, 0, '', 'fe29e56d1e12ecaa33cff3242d8b8390', '0', '9809', 'jibi344443@yahoo.com', '89080', '', '', '', '890809', '', '', '', 0, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers_payment_type`
--

CREATE TABLE IF NOT EXISTS `customers_payment_type` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `branch_id` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `added_by` varchar(255) DEFAULT NULL,
  `deleted_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `customers_payment_type`
--

INSERT INTO `customers_payment_type` (`id`, `guid`, `type`, `branch_id`, `active`, `active_status`, `delete_status`, `added_by`, `deleted_by`) VALUES
(1, 'C56A2A7E-E8DE-43FD-BF05-1970CE5EC269', 'credit', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 1, 0, '', ''),
(2, '2639721dea1f5cd1c5557f41b4e65d46', 'Credit Only', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, 0, '', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(3, '493fc9015775b69fb7b0c549a03cfc8a', 'cheques', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(4, '22b29efa97369324e345614ab68b773f', 'sdfgsd', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(5, '62913143b64724f3f2e19b611c0c52a1', 'dfgdf', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(6, 'caf6d38b8e02db86b3d41fd23a6439bb', 'Credit Only', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, 1, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(7, 'cb22f3b1c17a6b1df9d2090e945f0364', 'Cash Only', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(8, '257bac051a8154a0463d55c7aeacdbb2', 'fafasfas', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, 1, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4');

-- --------------------------------------------------------

--
-- Table structure for table `customers_x_branches`
--

CREATE TABLE IF NOT EXISTS `customers_x_branches` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) DEFAULT NULL,
  `branch_id` varchar(255) DEFAULT NULL,
  `branch_name` varchar(100) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `customer_active` int(11) NOT NULL,
  `customer_delete` int(11) NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer_category`
--

CREATE TABLE IF NOT EXISTS `customer_category` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) DEFAULT NULL,
  `branch_id` varchar(255) DEFAULT NULL,
  `category_name` varchar(100) NOT NULL,
  `discount` decimal(10,3) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `added_by` varchar(255) DEFAULT NULL,
  `deleted_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `customer_category`
--

INSERT INTO `customer_category` (`id`, `guid`, `branch_id`, `category_name`, `discount`, `active_status`, `delete_status`, `added_by`, `deleted_by`) VALUES
(1, '7879977979777987', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'C-123', '0.000', 0, 1, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(2, 'b07822de514011f2e7ffc12692033acb', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'C-1233', '1.000', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(3, 'b0913b800960821c61b9e7426cc3f1b8', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'Web sales1', '2.000', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(4, 'bbb619417f5a8add548cdd6af3b7c71a', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'dsgsdgs', '0.000', 1, 1, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(5, '50dd8794a73be791efc0f38b018a14ef', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'fgfgh', '0.000', 0, 1, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(6, 'fe29e56d1e12ecaa33cff3242d8b8390', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'retails1', '1.200', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', NULL),
(7, 'f1a986ddfd820fae3f4496b2fb06ed04', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'NRI', '1.300', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_payable`
--

CREATE TABLE IF NOT EXISTS `customer_payable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `amount` decimal(55,3) NOT NULL,
  `paid_amount` decimal(55,3) NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT '0',
  `branch_id` varchar(255) NOT NULL,
  `guid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `customer_payable`
--

INSERT INTO `customer_payable` (`id`, `invoice_id`, `customer_id`, `amount`, `paid_amount`, `payment_status`, `branch_id`, `guid`) VALUES
(74, 'de3a8068fb7f8e0320b0a3e8f0689214', '63aba6eb627ce1811191c2d22399191d', '1672.696', '0.000', 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'ca7c4c7f76fab9b4b456a1d3a2a7d1b2'),
(75, '00f230a2898e6c193b03fabfcbabd990', '63aba6eb627ce1811191c2d22399191d', '6131.212', '1001.000', 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'a8ea84f9bcd49b7d6377abfda6b74fd2'),
(76, '40fda2a053bc4aaaae18999220c22ea0', '63aba6eb627ce1811191c2d22399191d', '6131.212', '6000.000', 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '3683b8421c7215cd9658c1dd47b13fe0');

-- --------------------------------------------------------

--
-- Table structure for table `damage_stock`
--

CREATE TABLE IF NOT EXISTS `damage_stock` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `date` int(11) NOT NULL,
  `remark` varchar(300) NOT NULL,
  `note` varchar(300) NOT NULL,
  `no_items` int(11) NOT NULL,
  `total_amount` decimal(30,3) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `stock_status` int(11) NOT NULL DEFAULT '0',
  `branch_id` varchar(255) NOT NULL,
  `deleted_by` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `damage_stock`
--

INSERT INTO `damage_stock` (`id`, `guid`, `code`, `date`, `remark`, `note`, `no_items`, `total_amount`, `active_status`, `delete_status`, `stock_status`, `branch_id`, `deleted_by`, `added_by`) VALUES
(34, '450ee7d2ef0887e6fde9456d39742687', 'DS-122', 1400198400, 'gsdgsdg', 'xdcfsd', 1, '504.900', 1, 0, 1, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(35, '65b17692b9ae489b0ec473e00714e7d6', 'DS-123', 1400198400, 'gsdg', 'sdfsd', 1, '4590.000', 0, 1, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(36, '12b0ae76b49f38ab9115ca796113b5ca', 'DS-124', 1400198400, 'asfas', 'sadsa', 2, '5790.000', 1, 0, 1, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4');

-- --------------------------------------------------------

--
-- Table structure for table `damage_stock_x_items`
--

CREATE TABLE IF NOT EXISTS `damage_stock_x_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) NOT NULL,
  `damage_stock_id` varchar(255) NOT NULL,
  `stocks_history_id` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `quty` int(11) NOT NULL,
  `cost` decimal(30,3) NOT NULL,
  `sell` decimal(30,3) NOT NULL,
  `tax` decimal(30,3) NOT NULL,
  `amount` decimal(30,3) NOT NULL,
  `supplier_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `damage_stock_x_items`
--

INSERT INTO `damage_stock_x_items` (`id`, `guid`, `damage_stock_id`, `stocks_history_id`, `item`, `quty`, `cost`, `sell`, `tax`, `amount`, `supplier_id`) VALUES
(42, '5dbcf39196d05414cb23aa5936447803', '450ee7d2ef0887e6fde9456d39742687', '52bb9dabaa6986843a2c91de88574923', '9d8439c7f35923f2397af1b7edadc670', 11, '45.000', '676.000', '9.900', '495.000', 'ceab8c7d14f12aaeec1dc19b3d81212a'),
(43, '031d4fccac6d2368adbc6c693b9669f7', '65b17692b9ae489b0ec473e00714e7d6', '9cff3c99cc56218f03b7e9a5975fa6ee', '9d8439c7f35923f2397af1b7edadc670', 100, '45.000', '676.000', '90.000', '4590.000', 'ceab8c7d14f12aaeec1dc19b3d81212a'),
(44, '579071c129a777c2ca2eb0624c9e8031', '12b0ae76b49f38ab9115ca796113b5ca', '0d69420b3511b6f936906639d9e6ccb1', 'ef92a1dc9701ac89a655927183a78d87', 100, '12.000', '15.000', '0.000', '1200.000', 'ceab8c7d14f12aaeec1dc19b3d81212a'),
(45, 'f05fab2228e99cab1752932f8f25b380', '12b0ae76b49f38ab9115ca796113b5ca', '9cff3c99cc56218f03b7e9a5975fa6ee', '9d8439c7f35923f2397af1b7edadc670', 100, '45.000', '676.000', '90.000', '4590.000', 'ceab8c7d14f12aaeec1dc19b3d81212a');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_note_x_items`
--

CREATE TABLE IF NOT EXISTS `delivery_note_x_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) DEFAULT NULL,
  `branch_id` varchar(255) NOT NULL,
  `delivery_note` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `quty` decimal(55,0) NOT NULL,
  `free` decimal(55,0) NOT NULL,
  `active` int(255) NOT NULL,
  `active_status` int(255) NOT NULL,
  `delete_status` int(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `delivery_note_x_items`
--

INSERT INTO `delivery_note_x_items` (`id`, `guid`, `branch_id`, `delivery_note`, `item`, `quty`, `free`, `active`, `active_status`, `delete_status`, `added_by`) VALUES
(80, 'd1333e1433af143c5351842158b67322', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '66077ccc98dd6f48c5c1d86cfdf2c6a0', 'c3216f7d74d4adcf50901b8559d9a3bc', '89', '89', 0, 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(81, 'd1456451ee94328a3187930e559de5fb', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '66077ccc98dd6f48c5c1d86cfdf2c6a0', 'abc049b9d095c27843b114f02ac5f640', '78', '78', 0, 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(82, 'f9b465874c6a5d256f87af155eedf3fb', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '66077ccc98dd6f48c5c1d86cfdf2c6a0', '9d8439c7f35923f2397af1b7edadc670', '90', '90', 0, 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(83, 'a9cd9d406c9bf19232de63c360ada616', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '66077ccc98dd6f48c5c1d86cfdf2c6a0', '9d8439c7f35923f2397af1b7edadc670', '90', '90', 0, 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(84, 'adae24c40b5d2d663923ea5c317cba00', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '66077ccc98dd6f48c5c1d86cfdf2c6a0', 'c709663a0324fb6175b807eb730de052', '90', '90', 0, 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4');

-- --------------------------------------------------------

--
-- Table structure for table `direct_grn`
--

CREATE TABLE IF NOT EXISTS `direct_grn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) NOT NULL DEFAULT 'non',
  `supplier_id` varchar(200) NOT NULL,
  `grn_no` varchar(200) NOT NULL,
  `grn_date` int(20) NOT NULL,
  `discount` varchar(200) NOT NULL,
  `discount_amt` varchar(200) NOT NULL,
  `freight` varchar(200) NOT NULL,
  `round_amt` varchar(200) NOT NULL,
  `total_items` varchar(200) NOT NULL,
  `total_amt` varchar(200) NOT NULL,
  `total_item_amt` varchar(200) NOT NULL,
  `remark` varchar(200) NOT NULL DEFAULT 'None',
  `note` varchar(200) NOT NULL DEFAULT 'None',
  `invoice_status` int(11) NOT NULL DEFAULT '0',
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `order_status` int(11) NOT NULL DEFAULT '0',
  `branch_id` varchar(200) NOT NULL,
  `added_by` varchar(200) NOT NULL,
  `deleted_by` varchar(200) NOT NULL DEFAULT 'None',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `direct_grn`
--

INSERT INTO `direct_grn` (`id`, `guid`, `supplier_id`, `grn_no`, `grn_date`, `discount`, `discount_amt`, `freight`, `round_amt`, `total_items`, `total_amt`, `total_item_amt`, `remark`, `note`, `invoice_status`, `active_status`, `delete_status`, `order_status`, `branch_id`, `added_by`, `deleted_by`) VALUES
(1, '79efc18f745fc643d7dc23707f3f8765', 'e91054c7db987e18f232ffa506f49394', 'POSNIC-D-GRN-1030', 1396396800, '', '0', '', '', '1', '8898.102', '8898.102', 'afasf', 'asff', 1, 1, 0, 1, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 'None'),
(2, '04b001ab9819480c1dda47da769652b0', 'e91054c7db987e18f232ffa506f49394', 'POSNIC-D-GRN-1031', 1396396800, '', '0', '', '', '1', '5530976.800', '5530976.8', 'asfasf', 'asfas', 1, 1, 0, 1, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `direct_grn_items`
--

CREATE TABLE IF NOT EXISTS `direct_grn_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(200) DEFAULT NULL,
  `order_id` varchar(200) NOT NULL,
  `item` varchar(200) NOT NULL,
  `quty` varchar(100) NOT NULL,
  `received_quty` decimal(55,0) NOT NULL DEFAULT '0',
  `received_free` decimal(55,0) NOT NULL DEFAULT '0',
  `free` varchar(100) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `sell` varchar(100) NOT NULL,
  `mrp` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL DEFAULT '0',
  `discount_per` decimal(55,0) NOT NULL DEFAULT '0',
  `discount_amount` decimal(55,0) NOT NULL,
  `tax` decimal(55,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `direct_grn_items`
--

INSERT INTO `direct_grn_items` (`id`, `guid`, `order_id`, `item`, `quty`, `received_quty`, `received_free`, `free`, `cost`, `sell`, `mrp`, `amount`, `discount_per`, `discount_amount`, `tax`) VALUES
(1, 'a92e87f805ba1cb120f52e4173fe949d', '79efc18f745fc643d7dc23707f3f8765', 'c3216f7d74d4adcf50901b8559d9a3bc', '98', '0', '0', '89', '90.899', '92.909', '98.000', '8908.102', '0', '10', '4543'),
(2, '640a4a8dbf54d1cf7f1051a1c9db3121', '04b001ab9819480c1dda47da769652b0', '9d8439c7f35923f2397af1b7edadc670', '78789', '0', '0', '97', '45', '676', '967', '3545505', '0', '11', '1985483');

-- --------------------------------------------------------

--
-- Table structure for table `direct_invoice`
--

CREATE TABLE IF NOT EXISTS `direct_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) NOT NULL DEFAULT 'non',
  `supplier_id` varchar(200) NOT NULL,
  `invoice_no` varchar(200) NOT NULL,
  `invoice_date` int(20) NOT NULL,
  `discount` varchar(200) NOT NULL,
  `discount_amt` varchar(200) NOT NULL,
  `freight` varchar(200) NOT NULL,
  `round_amt` varchar(200) NOT NULL,
  `total_items` varchar(200) NOT NULL,
  `total_amt` varchar(200) NOT NULL,
  `total_item_amt` varchar(200) NOT NULL,
  `remark` varchar(200) NOT NULL DEFAULT 'None',
  `note` varchar(200) NOT NULL DEFAULT 'None',
  `invoice_status` int(11) NOT NULL DEFAULT '0',
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `order_status` int(11) NOT NULL DEFAULT '0',
  `branch_id` varchar(200) NOT NULL,
  `added_by` varchar(200) NOT NULL,
  `deleted_by` varchar(200) NOT NULL DEFAULT 'None',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `direct_invoice`
--

INSERT INTO `direct_invoice` (`id`, `guid`, `supplier_id`, `invoice_no`, `invoice_date`, `discount`, `discount_amt`, `freight`, `round_amt`, `total_items`, `total_amt`, `total_item_amt`, `remark`, `note`, `invoice_status`, `active_status`, `delete_status`, `order_status`, `branch_id`, `added_by`, `deleted_by`) VALUES
(22, 'f228b9626dd6509b4e80b6317fe36336', 'e91054c7db987e18f232ffa506f49394', 'POSNIC-D-invoice-1027', 1396310400, '', '0', '', '', '1', '4005.000', '4005', 'dsgsdg', 'dsf', 1, 1, 0, 1, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 'None'),
(23, '3fd4ab8864322ee4bd362041efb9b942', 'e91054c7db987e18f232ffa506f49394', 'POSNIC-D-invoice-1028', 1396310400, '', '0', '', '', '2', '103089.600', '103089.6', 'asfasf', 'sadfas', 1, 0, 1, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(24, '6bb35146948ed21d15dcc30000f108f4', 'e91054c7db987e18f232ffa506f49394', 'D-INV-10139', 1396310400, '', '0', '', '', '1', '8908.102', '8908.102', 'asfasf', 'asfas', 0, 1, 0, 1, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 'None'),
(25, 'b93a56e50e79bc897893f0f81338422e', 'e91054c7db987e18f232ffa506f49394', 'D-INV-10139', 1396310400, '', '0', '', '', '1', '8908.102', '8908.102', 'asfasf', 'asfas', 0, 1, 0, 1, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 'None'),
(26, 'acef519fb407c57698d69003bf5107bd', 'e91054c7db987e18f232ffa506f49394', 'D-INV-10141', 1396310400, '', '0', '', '', '1', '8090.011', '8090.011', 'dsgsd', 'dsfgd', 0, 1, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 'None'),
(27, '1820e18daea6a9e42ee1db0a77ebcbae', 'e91054c7db987e18f232ffa506f49394', 'D-INV-10142', 1396310400, '', '0', '', '', '1', '3090.566', '3090.566', 'uytuy', 'uiou', 0, 1, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 'None'),
(28, 'ecf1bbd50425850a670758c0793f2839', 'e91054c7db987e18f232ffa506f49394', 'D-INV-10142', 1396310400, '', '0', '', '', '1', '3090.566', '3090.566', 'uytuy', 'uiou', 0, 1, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 'None'),
(29, 'a8d8c0136b0059de98c7b3ce14456e65', 'e91054c7db987e18f232ffa506f49394', 'D-INV-10142', 1396310400, '', '0', '', '', '1', '3090.566', '3090.566', 'uytuy', 'uiou', 0, 1, 0, 1, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 'None'),
(30, '777644a5ca15f186352c901d81f2e2b4', 'e91054c7db987e18f232ffa506f49394', 'D-INV-10142', 1396310400, '', '0', '', '', '1', '3090.566', '3090.566', 'uytuy', 'uiou', 0, 1, 0, 1, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 'None'),
(31, 'defa8a85677435633ec861121028d8d6', 'e91054c7db987e18f232ffa506f49394', 'D-INV-10146', 1396310400, '', '0', '', '', '1', '8180.910', '8180.91', 'afasfas', 'asf', 0, 0, 1, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(32, 'a44846306dfa4b14c10fb354058fc780', 'e91054c7db987e18f232ffa506f49394', 'D-INV-10146', 1396310400, '', '0', '', '', '1', '8180.910', '8180.91', 'afasfas', 'asf', 0, 1, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 'None'),
(33, 'ee5488a96dbbe887fa789e9756b523c3', 'e91054c7db987e18f232ffa506f49394', 'D-INV-10148', 1265068800, '', '0', '', '', '2', '52171.533', '52171.533', 'agdadsg', 'dfa', 0, 1, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 'None'),
(34, 'd48b350c35ce3bda4adb998ecc02d7f1', 'e91054c7db987e18f232ffa506f49394', 'D-INV-10148', 1265068800, '', '0', '', '', '1', '51539.733', '51539.733', '', '', 0, 1, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 'None'),
(35, '3da1a197d75a030e2275ff0e4b431427', 'e91054c7db987e18f232ffa506f49394', 'D-INV-10150', 1402358400, '', '0', '', '', '1', '3136.000', '3136', '', '', 0, 1, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 'None'),
(36, 'e788ccfdca8feb82624c0ff3c0352539', 'e91054c7db987e18f232ffa506f49394', 'D-INV-10151', 1390780800, '', '0', '', '', '1', '224.000', '224', '', '', 0, 1, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 'None'),
(37, 'c8e2fe4d25933244eb4926a5dde82fb8', 'e91054c7db987e18f232ffa506f49394', 'D-INV-10152', 1396310400, '', '0', '', '', '1', '8908.102', '8908.102', 'asfsa', 'saa', 0, 1, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 'None'),
(38, '35ed9adaab6aaa215bdb8750062747f5', 'e91054c7db987e18f232ffa506f49394', 'D-INV-10152', 1396310400, '', '0', '', '', '1', '8908.102', '8908.102', 'asfsa', 'saa', 0, 1, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 'None'),
(39, '486e331b8968ba27601d41414529aa18', 'e91054c7db987e18f232ffa506f49394', 'D-INV-10154', 1396310400, '', '0', '', '', '1', '71719.311', '71719.311', 'sdgsd', 'fd', 0, 1, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 'None'),
(40, '9a9b6469da1090374b03bfdcf0a8c12f', 'e91054c7db987e18f232ffa506f49394', 'D-INV-10155', 1396396800, '', '0', '', '', '1', '1612.680', '1612.6799999999998', 'saf', 'asf', 0, 1, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 'None'),
(41, '433e181870a72f1b575e305b95918b88', 'e91054c7db987e18f232ffa506f49394', 'D-INV-10156', 1396310400, '', '0', '', '', '1', '8908.102', '8908.102', 'asfasf', 'af', 0, 1, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `direct_invoice_items`
--

CREATE TABLE IF NOT EXISTS `direct_invoice_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(200) DEFAULT NULL,
  `order_id` varchar(200) NOT NULL,
  `item` varchar(200) NOT NULL,
  `quty` varchar(100) NOT NULL,
  `received_quty` decimal(55,0) NOT NULL DEFAULT '0',
  `received_free` decimal(55,0) NOT NULL DEFAULT '0',
  `free` varchar(100) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `sell` varchar(100) NOT NULL,
  `mrp` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL DEFAULT '0',
  `discount_per` decimal(55,0) NOT NULL DEFAULT '0',
  `discount_amount` decimal(55,0) NOT NULL,
  `tax` decimal(55,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=160 ;

--
-- Dumping data for table `direct_invoice_items`
--

INSERT INTO `direct_invoice_items` (`id`, `guid`, `order_id`, `item`, `quty`, `received_quty`, `received_free`, `free`, `cost`, `sell`, `mrp`, `amount`, `discount_per`, `discount_amount`, `tax`) VALUES
(133, 'ce373527a9a1981f3fea7bf414b6a529', '6eef332fb6f163bf34ab3d9a7ddc6d01', '68fac0f3c2306caadf9779dd6eb0a568', '90', '0', '0', '890', '68', '69', '89', '6120', '1', '61', '122'),
(134, 'ed22eff74436d837a93d53b9c0608f33', '482069081bf07de251b215ee2580d2d0', 'c3216f7d74d4adcf50901b8559d9a3bc', '1000', '0', '0', '89', '45', '60', '70', '45000.000', '0', '0', '22950'),
(135, '4290914dd0151d6e06cec12f16f6f13d', '482069081bf07de251b215ee2580d2d0', '9d8439c7f35923f2397af1b7edadc670', '789', '0', '0', '798', '45', '676', '967', '55387.8', '0', '0', '19883'),
(136, '40edc0d70cae47489b5e6ea080579031', '9f18164c120ca65ea5478dea3cd921be', 'c3216f7d74d4adcf50901b8559d9a3bc', '09', '0', '0', '90', '45', '60', '70', '400.950', '1', '4', '207'),
(137, 'eeca588d75e1a638f2e37b2a3f7b9efe', '9f18164c120ca65ea5478dea3cd921be', '9d8439c7f35923f2397af1b7edadc670', '89', '0', '0', '89', '45', '676', '967', '6247.8', '0', '0', '2243'),
(138, '56f6ad018428f3f24b20a0511791e18a', 'f228b9626dd6509b4e80b6317fe36336', 'c3216f7d74d4adcf50901b8559d9a3bc', '89', '0', '0', '89', '45', '60', '70', '4005', '0', '0', '2043'),
(139, '2ae606bd9edf0d480df5fcf6f56e194a', '3fd4ab8864322ee4bd362041efb9b942', 'c3216f7d74d4adcf50901b8559d9a3bc', '890', '0', '0', '809', '45', '60', '70', '40050.000', '0', '0', '20426'),
(140, 'a7554e7b815c5570583771871f4bb884', '3fd4ab8864322ee4bd362041efb9b942', '9d8439c7f35923f2397af1b7edadc670', '898', '0', '0', '9', '45', '676', '967', '63039.6', '0', '0', '22630'),
(141, '1f3b1b0bfe344f15c96e98f4c8a299b6', '6bb35146948ed21d15dcc30000f108f4', 'c3216f7d74d4adcf50901b8559d9a3bc', '98', '0', '0', '89', '90.899', '92.909', '98.000', '8908.102', '0', '0', '4543'),
(142, '851b75a515349a8f6ec78e46386bdaac', 'b93a56e50e79bc897893f0f81338422e', 'c3216f7d74d4adcf50901b8559d9a3bc', '98', '0', '0', '89', '90.899', '92.909', '98.000', '8908.102', '0', '0', '4543'),
(143, 'ff178325411a605fc8483fe634e8f7bd', 'acef519fb407c57698d69003bf5107bd', 'c3216f7d74d4adcf50901b8559d9a3bc', '89', '0', '0', '890', '90.899', '92.909', '98.000', '8090.011', '0', '0', '4126'),
(144, 'a1dc7af79f588fb9866b16a9a0aa9c32', '1820e18daea6a9e42ee1db0a77ebcbae', 'c3216f7d74d4adcf50901b8559d9a3bc', '34', '0', '0', '34', '90.899', '92.909', '98.000', '3090.566', '0', '0', '1576'),
(145, '8f5dc705035638a5044c71d0d7dc0748', 'ecf1bbd50425850a670758c0793f2839', 'c3216f7d74d4adcf50901b8559d9a3bc', '34', '0', '0', '34', '90.899', '92.909', '98.000', '3090.566', '0', '0', '1576'),
(146, 'e4a2d0d09f5e23a039e03572078f1883', 'a8d8c0136b0059de98c7b3ce14456e65', 'c3216f7d74d4adcf50901b8559d9a3bc', '34', '0', '0', '34', '90.899', '92.909', '98.000', '3090.566', '0', '0', '1576'),
(147, 'bee1e16651afa6934244170f835fff57', '777644a5ca15f186352c901d81f2e2b4', 'c3216f7d74d4adcf50901b8559d9a3bc', '34', '0', '0', '34', '90.899', '92.909', '98.000', '3090.566', '0', '0', '1576'),
(148, '4bc21e0a64c881f294f0d0a061bd66a7', 'defa8a85677435633ec861121028d8d6', 'c3216f7d74d4adcf50901b8559d9a3bc', '90', '0', '0', '90', '90.899', '92.909', '98.000', '8180.91', '0', '0', '4172'),
(149, '98d348131035ca0db3b200e9f77ab71a', 'a44846306dfa4b14c10fb354058fc780', 'c3216f7d74d4adcf50901b8559d9a3bc', '90', '0', '0', '90', '90.899', '92.909', '98.000', '8180.91', '0', '0', '4172'),
(150, '5a96699bdcd29f13b27dd99389a3dc58', 'ee5488a96dbbe887fa789e9756b523c3', 'c3216f7d74d4adcf50901b8559d9a3bc', '567', '0', '0', '65', '90.899', '92.909', '98.000', '51539.733', '0', '0', '26285'),
(151, '50097bd8f5102c43537d7466a09c0761', 'd48b350c35ce3bda4adb998ecc02d7f1', 'c3216f7d74d4adcf50901b8559d9a3bc', '567', '0', '0', '65', '90.899', '92.909', '98.000', '51539.733', '0', '0', '26285'),
(152, '370a942a1a901c868b270e0092f27c2e', '3da1a197d75a030e2275ff0e4b431427', 'abc049b9d095c27843b114f02ac5f640', '56', '0', '0', '0', '56', '75', '78', '3136', '0', '0', '1599'),
(153, 'd3e6811b613a788f8014c06b2f0b92be', 'e788ccfdca8feb82624c0ff3c0352539', 'abc049b9d095c27843b114f02ac5f640', '4', '0', '0', '0', '56', '75', '78', '224', '0', '0', '114'),
(154, '28ec623dc36b475d2f02cbe2d9042218', 'c8e2fe4d25933244eb4926a5dde82fb8', 'c3216f7d74d4adcf50901b8559d9a3bc', '98', '0', '0', '89', '90.899', '92.909', '98.000', '8908.102', '0', '0', '4543'),
(155, '5476f71dafb1ffb1cd3463967972d62a', '35ed9adaab6aaa215bdb8750062747f5', 'c3216f7d74d4adcf50901b8559d9a3bc', '98', '0', '0', '89', '90.899', '92.909', '98.000', '8908.102', '0', '0', '4543'),
(156, 'c9bd75cafe02b54f91ddfc4fef338bb3', '486e331b8968ba27601d41414529aa18', 'c3216f7d74d4adcf50901b8559d9a3bc', '789', '0', '0', '0', '90.899', '92.909', '98.000', '71719.311', '0', '0', '36577'),
(157, 'd2d79c413b683e9cdcca67043cf664e8', '9a9b6469da1090374b03bfdcf0a8c12f', 'c709663a0324fb6175b807eb730de052', '89', '0', '0', '89', '12', '30', '34', '1068', '0', '0', '545'),
(158, 'c5383cc2933914ccfb9c825b07aa7edc', '433e181870a72f1b575e305b95918b88', 'c3216f7d74d4adcf50901b8559d9a3bc', '98', '0', '0', '89', '90.899', '92.909', '98.000', '8908.102', '0', '0', '4543'),
(159, '825d8a4e37f27935f5140423042b89bd', 'ee5488a96dbbe887fa789e9756b523c3', '9d8439c7f35923f2397af1b7edadc670', '9', '0', '0', '89', '45', '676', '967', '631.8', '0', '0', '227');

-- --------------------------------------------------------

--
-- Table structure for table `direct_sales`
--

CREATE TABLE IF NOT EXISTS `direct_sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(200) NOT NULL,
  `customer_id` varchar(200) NOT NULL,
  `exp_date` int(20) NOT NULL,
  `code` varchar(200) NOT NULL,
  `date` int(20) NOT NULL,
  `discount` decimal(30,3) NOT NULL,
  `discount_amt` decimal(30,3) NOT NULL,
  `customer_discount` decimal(30,3) NOT NULL,
  `customer_discount_amount` decimal(30,3) NOT NULL,
  `freight` varchar(200) NOT NULL,
  `round_amt` varchar(200) NOT NULL,
  `total_items` varchar(200) NOT NULL,
  `total_amt` varchar(200) NOT NULL,
  `total_item_amt` varchar(200) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `note` varchar(200) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `order_status` int(2) NOT NULL,
  `receipt_status` int(2) NOT NULL,
  `received_status` int(11) NOT NULL,
  `expire_status` int(11) NOT NULL,
  `branch_id` varchar(200) NOT NULL,
  `added_by` varchar(200) NOT NULL,
  `deleted_by` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `direct_sales`
--

INSERT INTO `direct_sales` (`id`, `guid`, `customer_id`, `exp_date`, `code`, `date`, `discount`, `discount_amt`, `customer_discount`, `customer_discount_amount`, `freight`, `round_amt`, `total_items`, `total_amt`, `total_item_amt`, `remark`, `note`, `active_status`, `delete_status`, `order_status`, `receipt_status`, `received_status`, `expire_status`, `branch_id`, `added_by`, `deleted_by`) VALUES
(47, '8d5b4ad0198a35411725769a0b59d46c', '0f7c80352b128f9a45d25e42d1ebd19e', 1399507200, 'SO-117', 1398902400, '0.000', '7.758', '0.000', '0.000', '10', '10', '2', '788.002', '775.760', 'fafa', 'afas', 1, 0, 1, 0, 1, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(48, 'e2aa0234a443b1cae2c4929332494433', '0f7c80352b128f9a45d25e42d1ebd19e', 1399075200, 'SO-118', 1399075200, '0.000', '77.576', '0.000', '0.000', '10', '10', '2', '7700.024', '7757.600', 'test', 'test', 1, 0, 1, 0, 1, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(49, 'ff78d58c0759625def196240cc673955', '0f7c80352b128f9a45d25e42d1ebd19e', 1399248000, 'SO-119', 1399248000, '0.000', '775.760', '0.000', '0.000', '10', '10', '2', '76820.240', '77576.000', 'sdgsd', 'sdfs', 1, 0, 1, 0, 1, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(50, '248057815812d578ffd099c7661fb7db', '0f7c80352b128f9a45d25e42d1ebd19e', 0, '12', 1399334400, '1.000', '68.276', '0.000', '0.000', '', '', '1', '6759.324', '6827.600', 'sdfgsd', 'sdf', 0, 1, 0, 0, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(51, '785ad4ebd1128dfc512570261bcbd1dc', '63aba6eb627ce1811191c2d22399191d', 0, 'DS-133', 1399680000, '0.000', '7.585', '0.000', '0.000', '', '', '1', '60.540', '68.952', 'gsgs', 'sg', 1, 0, 1, 0, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(52, '82bf49e2c51db1c9c904d0478a1e0a7d', '5315c17449a7324783c45ae3632f7487', 0, 'DS-134', 1399680000, '0.000', '6.895', '2.000', '13.790', '10', '10', '1', '688.835', '689.520', 'faf', 'ad', 1, 0, 1, 0, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(53, '6b49f603486d4e4e87417bfc6d122d24', '5315c17449a7324783c45ae3632f7487', 0, 'DS-135', 1399680000, '0.000', '758.472', '2.000', '137.904', '', '', '1', '5998.824', '6895.200', 'afsaf', 'fa', 1, 0, 1, 0, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(54, '8272ed70b3e7eeaf03f6f32ce997a142', '5315c17449a7324783c45ae3632f7487', 0, 'DS-136', 1399680000, '0.000', '16.548', '2.000', '16.548', '', '', '1', '794.328', '827.424', 'zvz', 'vz', 1, 0, 1, 0, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(55, 'd8127f0ee98b719d92dcf58aca2c3f4a', '63aba6eb627ce1811191c2d22399191d', 0, 'DS-137', 1399766400, '0.000', '1.379', '1.200', '0.827', '', '', '1', '66.746', '68.952', '', '', 1, 0, 1, 0, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(56, '8574f130f1575d33fab5f240bbbfa33e', '63aba6eb627ce1811191c2d22399191d', 0, 'DS-138', 1399680000, '2.000', '18.780', '1.200', '11.268', '', '', '2', '908.976', '939.024', 'sdfsd', 'sdfxcv', 1, 0, 0, 0, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '');

-- --------------------------------------------------------

--
-- Table structure for table `direct_sales_delivery`
--

CREATE TABLE IF NOT EXISTS `direct_sales_delivery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(200) NOT NULL,
  `customer_id` varchar(200) NOT NULL,
  `code` varchar(200) NOT NULL,
  `date` int(20) NOT NULL,
  `discount` decimal(30,3) NOT NULL,
  `discount_amt` decimal(30,3) NOT NULL,
  `customer_discount` decimal(30,3) NOT NULL,
  `customer_discount_amount` decimal(30,3) NOT NULL,
  `freight` varchar(200) NOT NULL,
  `round_amt` varchar(200) NOT NULL,
  `total_items` varchar(200) NOT NULL,
  `total_amt` varchar(200) NOT NULL,
  `total_item_amt` varchar(200) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `note` varchar(200) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `order_status` int(2) NOT NULL,
  `bill_status` int(2) NOT NULL,
  `branch_id` varchar(200) NOT NULL,
  `added_by` varchar(200) NOT NULL,
  `deleted_by` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `direct_sales_delivery`
--

INSERT INTO `direct_sales_delivery` (`id`, `guid`, `customer_id`, `code`, `date`, `discount`, `discount_amt`, `customer_discount`, `customer_discount_amount`, `freight`, `round_amt`, `total_items`, `total_amt`, `total_item_amt`, `remark`, `note`, `active_status`, `delete_status`, `order_status`, `bill_status`, `branch_id`, `added_by`, `deleted_by`) VALUES
(51, 'f973f4b02a6ba52ff6ebbc85242baf26', '0f7c80352b128f9a45d25e42d1ebd19e', 'DDN-123', 1399248000, '1.000', '682.760', '0.000', '0.000', '10', '10', '1', '67613.240', '68276.000', 'sdggs', 'sdfg', 1, 0, 1, 1, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(52, '0bcd63a3b1b107f08d20fc9c92b3f6cd', '0f7c80352b128f9a45d25e42d1ebd19e', 'DDN-124', 1399420800, '0.000', '6838.760', '0.000', '0.000', '10', '1', '2', '677048.240', '683876.000', 'sdf', 'sd', 1, 0, 1, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(53, '95f12b4ba62352fa8be86cd51608544e', '0f7c80352b128f9a45d25e42d1ebd19e', 'DDN-125', 1399420800, '0.000', '0.000', '0.000', '0.000', '', '', '2', '775.760', '775.760', 'sdfs', 'sdf', 1, 0, 1, 1, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(54, '0002ecc5190e9496268a77e3190d19e8', '63aba6eb627ce1811191c2d22399191d', 'DDN-126', 1399680000, '0.000', '75.847', '1.200', '8.274', '', '', '1', '605.399', '689.520', 'gsdgs', 'sdg', 1, 0, 1, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(55, '48090dc1ed36620492650837054b13b7', '63aba6eb627ce1811191c2d22399191d', 'DDN-127', 1399680000, '0.000', '8.011', '1.200', '20.413', '', '', '3', '1672.696', '1701.120', 'dsg', 'dsfdasd', 1, 0, 0, 1, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '');

-- --------------------------------------------------------

--
-- Table structure for table `direct_sales_delivery_x_items`
--

CREATE TABLE IF NOT EXISTS `direct_sales_delivery_x_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(200) DEFAULT NULL,
  `direct_sales_delivery_id` varchar(200) NOT NULL,
  `item` varchar(200) NOT NULL,
  `quty` varchar(100) NOT NULL,
  `price` decimal(55,3) NOT NULL,
  `discount` decimal(10,3) NOT NULL,
  `stock_id` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=217 ;

--
-- Dumping data for table `direct_sales_delivery_x_items`
--

INSERT INTO `direct_sales_delivery_x_items` (`id`, `guid`, `direct_sales_delivery_id`, `item`, `quty`, `price`, `discount`, `stock_id`) VALUES
(182, 'af01fac9f2cdb46ae488db156dddd683', '1ab67d2287938c48714531aad9b3dbb9', '9d8439c7f35923f2397af1b7edadc670', '1', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(184, 'd2ef727839939479b4804d416eb92ce7', '1ab67d2287938c48714531aad9b3dbb9', 'c3216f7d74d4adcf50901b8559d9a3bc', '1', '93.000', '0.000', '92452936fa7217cd784feba1a6ad2d10'),
(185, '5ed94b6abf1eef5c5d3209ae9fc4fbdb', '5d5d99e14cda47a3e712e10b5f25940e', '9d8439c7f35923f2397af1b7edadc670', '1', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(186, 'ce4c47d5119b7795ca5d59a28bf271cc', '5d5d99e14cda47a3e712e10b5f25940e', 'c3216f7d74d4adcf50901b8559d9a3bc', '1', '93.000', '0.000', '92452936fa7217cd784feba1a6ad2d10'),
(187, '7cddf49d7f9f69a6de34aee42d22935e', '4ce2d527cf85aa58453230e9b0a0bcbc', '9d8439c7f35923f2397af1b7edadc670', '1', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(188, '10e8387eab27da7e98c256547a4fc5ef', '95ecca122700047d464befc8f01d4cd6', 'c3216f7d74d4adcf50901b8559d9a3bc', '1', '93.000', '0.000', '92452936fa7217cd784feba1a6ad2d10'),
(189, '9b0aec052e558e6b6f192c0bc031c1c2', '95ecca122700047d464befc8f01d4cd6', '9d8439c7f35923f2397af1b7edadc670', '1', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(190, '30cd620a8d129b7c16128d5a28f72590', '45c2fdea8d1a075af9a71301f627953f', '9d8439c7f35923f2397af1b7edadc670', '10', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(191, 'b69d04cfba9833412657dfd36356db1f', '45c2fdea8d1a075af9a71301f627953f', 'c3216f7d74d4adcf50901b8559d9a3bc', '10', '93.000', '0.000', '92452936fa7217cd784feba1a6ad2d10'),
(192, 'cb437a19bc0dabca55819c2745647dbe', '3e3ed9b31c74351bc99cc3926a198946', '9d8439c7f35923f2397af1b7edadc670', '10', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(193, 'f0e07f5e2b781bb27c2509add0519ebc', '3e3ed9b31c74351bc99cc3926a198946', 'c3216f7d74d4adcf50901b8559d9a3bc', '10', '93.000', '0.000', '92452936fa7217cd784feba1a6ad2d10'),
(194, '0c1affbd5388ce61493d372b4904f8ad', 'dc12bb9c9dfb9f0c1693dae06f3898c4', '9d8439c7f35923f2397af1b7edadc670', '10', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(195, 'bff59cba1f017caa2e44ad13f3e30d07', 'dc12bb9c9dfb9f0c1693dae06f3898c4', 'c3216f7d74d4adcf50901b8559d9a3bc', '10', '93.000', '0.000', '92452936fa7217cd784feba1a6ad2d10'),
(196, 'ae88468c513d4126a131a888740b8887', '08c34f5a106960808d7b242f9ff5aa76', '9d8439c7f35923f2397af1b7edadc670', '1', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(197, '33af9442383c7d6c5738c00ea145f5ba', '08c34f5a106960808d7b242f9ff5aa76', 'c3216f7d74d4adcf50901b8559d9a3bc', '1', '93.000', '0.000', '92452936fa7217cd784feba1a6ad2d10'),
(198, '6973bf9a2a0a6b0f682b72cf38f8869b', '08c34f5a106960808d7b242f9ff5aa76', 'c709663a0324fb6175b807eb730de052', '1', '30.000', '0.000', '11c4c234a665203e54368f6db77299dc'),
(199, '6c9e8bf198c8d02be066c0be80b4fefc', '8d5b4ad0198a35411725769a0b59d46c', '9d8439c7f35923f2397af1b7edadc670', '1', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(200, 'e4522f5931efab92d3911603e57df955', '8d5b4ad0198a35411725769a0b59d46c', 'c3216f7d74d4adcf50901b8559d9a3bc', '1', '93.000', '0.000', '92452936fa7217cd784feba1a6ad2d10'),
(201, '22f8d51f7723b0448b30f1710679c47e', 'e2aa0234a443b1cae2c4929332494433', '9d8439c7f35923f2397af1b7edadc670', '10', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(202, '7af17dd274164de6a2bda30db7a7634a', 'e2aa0234a443b1cae2c4929332494433', 'c3216f7d74d4adcf50901b8559d9a3bc', '10', '93.000', '0.000', '92452936fa7217cd784feba1a6ad2d10'),
(203, '4608074da107d83f367e319f7ecb376a', 'ff78d58c0759625def196240cc673955', '9d8439c7f35923f2397af1b7edadc670', '100', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(204, '6e8c5a0f001c5f9ea4d31ee3c2b7da97', 'ff78d58c0759625def196240cc673955', 'c3216f7d74d4adcf50901b8559d9a3bc', '100', '93.000', '0.000', '92452936fa7217cd784feba1a6ad2d10'),
(206, '18663f92104173e7d788ad7071b247ac', '4566351566b26e13ad74d6b4a7ce495a', 'c3216f7d74d4adcf50901b8559d9a3bc', '12', '93.000', '0.000', '92452936fa7217cd784feba1a6ad2d10'),
(207, 'cb399d902142eecca6fd2a47a97709fd', '4566351566b26e13ad74d6b4a7ce495a', '9d8439c7f35923f2397af1b7edadc670', '10', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(208, '75514b50c2cf5249905e62621a23564c', 'f973f4b02a6ba52ff6ebbc85242baf26', '9d8439c7f35923f2397af1b7edadc670', '100', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(209, '41b649002a32af991583b509cb1412f0', '0bcd63a3b1b107f08d20fc9c92b3f6cd', '9d8439c7f35923f2397af1b7edadc670', '1000', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(210, '53e21264dd85c966b2166e32c30ebee0', '0bcd63a3b1b107f08d20fc9c92b3f6cd', 'c3216f7d74d4adcf50901b8559d9a3bc', '12', '93.000', '0.000', '92452936fa7217cd784feba1a6ad2d10'),
(211, '21b583ffc1f2cc383b3b0e605eb5d0ca', '95f12b4ba62352fa8be86cd51608544e', '9d8439c7f35923f2397af1b7edadc670', '1', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(212, '5a39533506d84304b56e48dd3044f7a6', '95f12b4ba62352fa8be86cd51608544e', 'c3216f7d74d4adcf50901b8559d9a3bc', '1', '93.000', '0.000', '92452936fa7217cd784feba1a6ad2d10'),
(213, 'a7fad3907600a9536f1b7f7a48f8a715', '0002ecc5190e9496268a77e3190d19e8', '9d8439c7f35923f2397af1b7edadc670', '10', '676.000', '0.000', 'de7d724347f17e5349764a49f869b307'),
(214, '69346faaefa9c47246be47354c4a1a0f', '48090dc1ed36620492650837054b13b7', '9d8439c7f35923f2397af1b7edadc670', '10', '676.000', '0.000', 'de7d724347f17e5349764a49f869b307'),
(215, '35353e826ee2f1f48e9ce218954a8e97', '48090dc1ed36620492650837054b13b7', 'c3216f7d74d4adcf50901b8559d9a3bc', '12', '93.000', '0.000', '92452936fa7217cd784feba1a6ad2d10'),
(216, '729239d0273d589c062a2065994c00c9', '48090dc1ed36620492650837054b13b7', 'abc049b9d095c27843b114f02ac5f640', '12', '75.000', '0.000', '0e3ab27ee4da7aae96f7b0a3a7ac12f4');

-- --------------------------------------------------------

--
-- Table structure for table `direct_sales_x_items`
--

CREATE TABLE IF NOT EXISTS `direct_sales_x_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(200) DEFAULT NULL,
  `direct_sales_id` varchar(200) NOT NULL,
  `item` varchar(200) NOT NULL,
  `quty` varchar(100) NOT NULL,
  `price` decimal(55,3) NOT NULL,
  `discount` decimal(10,3) NOT NULL,
  `stock_id` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=213 ;

--
-- Dumping data for table `direct_sales_x_items`
--

INSERT INTO `direct_sales_x_items` (`id`, `guid`, `direct_sales_id`, `item`, `quty`, `price`, `discount`, `stock_id`) VALUES
(182, 'af01fac9f2cdb46ae488db156dddd683', '1ab67d2287938c48714531aad9b3dbb9', '9d8439c7f35923f2397af1b7edadc670', '1', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(184, 'd2ef727839939479b4804d416eb92ce7', '1ab67d2287938c48714531aad9b3dbb9', 'c3216f7d74d4adcf50901b8559d9a3bc', '1', '93.000', '0.000', '92452936fa7217cd784feba1a6ad2d10'),
(185, '5ed94b6abf1eef5c5d3209ae9fc4fbdb', '5d5d99e14cda47a3e712e10b5f25940e', '9d8439c7f35923f2397af1b7edadc670', '1', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(186, 'ce4c47d5119b7795ca5d59a28bf271cc', '5d5d99e14cda47a3e712e10b5f25940e', 'c3216f7d74d4adcf50901b8559d9a3bc', '1', '93.000', '0.000', '92452936fa7217cd784feba1a6ad2d10'),
(187, '7cddf49d7f9f69a6de34aee42d22935e', '4ce2d527cf85aa58453230e9b0a0bcbc', '9d8439c7f35923f2397af1b7edadc670', '1', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(188, '10e8387eab27da7e98c256547a4fc5ef', '95ecca122700047d464befc8f01d4cd6', 'c3216f7d74d4adcf50901b8559d9a3bc', '1', '93.000', '0.000', '92452936fa7217cd784feba1a6ad2d10'),
(189, '9b0aec052e558e6b6f192c0bc031c1c2', '95ecca122700047d464befc8f01d4cd6', '9d8439c7f35923f2397af1b7edadc670', '1', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(190, '30cd620a8d129b7c16128d5a28f72590', '45c2fdea8d1a075af9a71301f627953f', '9d8439c7f35923f2397af1b7edadc670', '10', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(191, 'b69d04cfba9833412657dfd36356db1f', '45c2fdea8d1a075af9a71301f627953f', 'c3216f7d74d4adcf50901b8559d9a3bc', '10', '93.000', '0.000', '92452936fa7217cd784feba1a6ad2d10'),
(192, 'cb437a19bc0dabca55819c2745647dbe', '3e3ed9b31c74351bc99cc3926a198946', '9d8439c7f35923f2397af1b7edadc670', '10', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(193, 'f0e07f5e2b781bb27c2509add0519ebc', '3e3ed9b31c74351bc99cc3926a198946', 'c3216f7d74d4adcf50901b8559d9a3bc', '10', '93.000', '0.000', '92452936fa7217cd784feba1a6ad2d10'),
(194, '0c1affbd5388ce61493d372b4904f8ad', 'dc12bb9c9dfb9f0c1693dae06f3898c4', '9d8439c7f35923f2397af1b7edadc670', '10', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(195, 'bff59cba1f017caa2e44ad13f3e30d07', 'dc12bb9c9dfb9f0c1693dae06f3898c4', 'c3216f7d74d4adcf50901b8559d9a3bc', '10', '93.000', '0.000', '92452936fa7217cd784feba1a6ad2d10'),
(196, 'ae88468c513d4126a131a888740b8887', '08c34f5a106960808d7b242f9ff5aa76', '9d8439c7f35923f2397af1b7edadc670', '1', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(197, '33af9442383c7d6c5738c00ea145f5ba', '08c34f5a106960808d7b242f9ff5aa76', 'c3216f7d74d4adcf50901b8559d9a3bc', '1', '93.000', '0.000', '92452936fa7217cd784feba1a6ad2d10'),
(198, '6973bf9a2a0a6b0f682b72cf38f8869b', '08c34f5a106960808d7b242f9ff5aa76', 'c709663a0324fb6175b807eb730de052', '1', '30.000', '0.000', '11c4c234a665203e54368f6db77299dc'),
(199, '6c9e8bf198c8d02be066c0be80b4fefc', '8d5b4ad0198a35411725769a0b59d46c', '9d8439c7f35923f2397af1b7edadc670', '1', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(200, 'e4522f5931efab92d3911603e57df955', '8d5b4ad0198a35411725769a0b59d46c', 'c3216f7d74d4adcf50901b8559d9a3bc', '1', '93.000', '0.000', '92452936fa7217cd784feba1a6ad2d10'),
(201, '22f8d51f7723b0448b30f1710679c47e', 'e2aa0234a443b1cae2c4929332494433', '9d8439c7f35923f2397af1b7edadc670', '10', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(202, '7af17dd274164de6a2bda30db7a7634a', 'e2aa0234a443b1cae2c4929332494433', 'c3216f7d74d4adcf50901b8559d9a3bc', '10', '93.000', '0.000', '92452936fa7217cd784feba1a6ad2d10'),
(203, '4608074da107d83f367e319f7ecb376a', 'ff78d58c0759625def196240cc673955', '9d8439c7f35923f2397af1b7edadc670', '100', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(204, '6e8c5a0f001c5f9ea4d31ee3c2b7da97', 'ff78d58c0759625def196240cc673955', 'c3216f7d74d4adcf50901b8559d9a3bc', '100', '93.000', '0.000', '92452936fa7217cd784feba1a6ad2d10'),
(205, '44602b2e750ad1a3384b0819081d4cc3', '248057815812d578ffd099c7661fb7db', '9d8439c7f35923f2397af1b7edadc670', '10', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(206, 'ab94c40c896d4753927b24b8a5327943', '785ad4ebd1128dfc512570261bcbd1dc', '9d8439c7f35923f2397af1b7edadc670', '1', '676.000', '0.000', 'de7d724347f17e5349764a49f869b307'),
(207, 'a0cdec904040b4d4a0c846b0ea38c874', '82bf49e2c51db1c9c904d0478a1e0a7d', '9d8439c7f35923f2397af1b7edadc670', '10', '676.000', '0.000', 'de7d724347f17e5349764a49f869b307'),
(208, '550a6f6c6ba63c0a253c0112063cd803', '6b49f603486d4e4e87417bfc6d122d24', '9d8439c7f35923f2397af1b7edadc670', '100', '676.000', '0.000', 'de7d724347f17e5349764a49f869b307'),
(209, '2148992d167bce2b16e4cebd624d7102', '8272ed70b3e7eeaf03f6f32ce997a142', '9d8439c7f35923f2397af1b7edadc670', '12', '676.000', '0.000', 'de7d724347f17e5349764a49f869b307'),
(210, '72d808b50478a757448a4c346a0f7429', 'd8127f0ee98b719d92dcf58aca2c3f4a', '9d8439c7f35923f2397af1b7edadc670', '1', '676.000', '0.000', 'de7d724347f17e5349764a49f869b307'),
(211, '50652273c5b147a0ceca39a109b9555f', '8574f130f1575d33fab5f240bbbfa33e', '9d8439c7f35923f2397af1b7edadc670', '12', '676.000', '0.000', 'de7d724347f17e5349764a49f869b307'),
(212, '5ef7bf3aba307476f5c5b1f41c8b8904', '8574f130f1575d33fab5f240bbbfa33e', 'c3216f7d74d4adcf50901b8559d9a3bc', '12', '93.000', '0.000', '92452936fa7217cd784feba1a6ad2d10');

-- --------------------------------------------------------

--
-- Table structure for table `grn`
--

CREATE TABLE IF NOT EXISTS `grn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) DEFAULT NULL,
  `branch_id` varchar(255) NOT NULL,
  `po` varchar(255) NOT NULL,
  `grn_no` varchar(255) NOT NULL,
  `date` int(20) NOT NULL,
  `note` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `grn_status` int(11) NOT NULL,
  `invoice_status` int(11) NOT NULL DEFAULT '0',
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `added_by` varchar(255) NOT NULL,
  `deleted_by` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `grn`
--

INSERT INTO `grn` (`id`, `guid`, `branch_id`, `po`, `grn_no`, `date`, `note`, `remark`, `grn_status`, `invoice_status`, `active_status`, `delete_status`, `added_by`, `deleted_by`) VALUES
(42, '66077ccc98dd6f48c5c1d86cfdf2c6a0', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'be0e9618297967699deb19956c7567cc', 'POSNIC-GRN-1060', 1396396800, 'test ', 'test', 1, 1, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '');

-- --------------------------------------------------------

--
-- Table structure for table `grn_x_items`
--

CREATE TABLE IF NOT EXISTS `grn_x_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) DEFAULT NULL,
  `branch_id` varchar(255) NOT NULL,
  `grn` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `quty` decimal(55,0) NOT NULL,
  `free` decimal(55,0) NOT NULL,
  `active` int(255) NOT NULL,
  `active_status` int(255) NOT NULL,
  `delete_status` int(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `grn_x_items`
--

INSERT INTO `grn_x_items` (`id`, `guid`, `branch_id`, `grn`, `item`, `quty`, `free`, `active`, `active_status`, `delete_status`, `added_by`) VALUES
(80, 'd1333e1433af143c5351842158b67322', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '66077ccc98dd6f48c5c1d86cfdf2c6a0', 'c3216f7d74d4adcf50901b8559d9a3bc', '89', '89', 0, 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(81, 'd1456451ee94328a3187930e559de5fb', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '66077ccc98dd6f48c5c1d86cfdf2c6a0', 'abc049b9d095c27843b114f02ac5f640', '78', '78', 0, 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(82, 'f9b465874c6a5d256f87af155eedf3fb', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '66077ccc98dd6f48c5c1d86cfdf2c6a0', '9d8439c7f35923f2397af1b7edadc670', '90', '90', 0, 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(83, 'a9cd9d406c9bf19232de63c360ada616', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '66077ccc98dd6f48c5c1d86cfdf2c6a0', '9d8439c7f35923f2397af1b7edadc670', '90', '90', 0, 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(84, 'adae24c40b5d2d663923ea5c317cba00', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '66077ccc98dd6f48c5c1d86cfdf2c6a0', 'c709663a0324fb6175b807eb730de052', '90', '90', 0, 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(200) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) DEFAULT NULL,
  `code` varchar(100) NOT NULL,
  `ean_upc_code` varchar(255) NOT NULL,
  `barcode` varchar(100) NOT NULL,
  `category_id` varchar(100) NOT NULL,
  `depart_id` varchar(255) NOT NULL,
  `branch_id` varchar(255) DEFAULT NULL,
  `supplier_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `cost_price` decimal(65,0) NOT NULL,
  `mrp` decimal(65,0) NOT NULL,
  `tax_Inclusive` int(11) NOT NULL,
  `brand_id` varchar(100) NOT NULL,
  `item_type_id` varchar(100) NOT NULL,
  `selling_price` decimal(65,0) NOT NULL,
  `discount` decimal(65,3) NOT NULL,
  `start_date` int(20) NOT NULL,
  `end_date` int(20) NOT NULL,
  `tax_id` varchar(255) NOT NULL,
  `tax_area_id` varchar(100) NOT NULL,
  `upc_ean_code` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `uom` int(10) NOT NULL,
  `no_of_unit` decimal(11,0) NOT NULL DEFAULT '0',
  `deleted_by` varchar(255) DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `added_by` varchar(255) DEFAULT NULL,
  `code_status` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `guid`, `code`, `ean_upc_code`, `barcode`, `category_id`, `depart_id`, `branch_id`, `supplier_id`, `name`, `description`, `cost_price`, `mrp`, `tax_Inclusive`, `brand_id`, `item_type_id`, `selling_price`, `discount`, `start_date`, `end_date`, `tax_id`, `tax_area_id`, `upc_ean_code`, `location`, `uom`, `no_of_unit`, `deleted_by`, `active_status`, `delete_status`, `added_by`, `code_status`, `image`) VALUES
(8, 'c3216f7d74d4adcf50901b8559d9a3bc', 'IC-123', '', 'Bar-1990', '0f1208f8b8d972183bb16bb0443ddb5e', '4a70944370a2a575487e2ad0a5adae9d', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'ceab8c7d14f12aaeec1dc19b3d81212a', 'Item 1', 'hjkhkhk', '45', '70', 0, 'cfd8b485f99e561408192c594f8c2e92', '', '60', '0.000', 1, 1, '4d24f165c31f73d0244244fefc770ff8', '2d81a2d79b828aa9e3d109184961925a', 'BJRFE2322sasa113', '', 1, '10', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 0, '2619751e7d1aaabbb95f46a4cc2e34fd.jpg'),
(9, 'abc049b9d095c27843b114f02ac5f640', 'IC-122', '', 'Bar-1991', '0f1208f8b8d972183bb16bb0443ddb5e', 'a571815faaa09a1e6d575c9a5cf92548', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'ceab8c7d14f12aaeec1dc19b3d81212a', 'Item 2', 'dshdjhsf', '56', '78', 0, '0a1db6b7e58b53971b12790f10e27d60', '', '75', '0.000', 2014, 0, '2', '2d81a2d79b828aa9e3d109184961925a', 'IBVGGF879879879', '', 0, '0', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 0, 'abc049b9d095c27843b114f02ac5f640.jpg'),
(10, 'abyyc049b9d095c27843b114f02ac5f640', 'IC-124', '', 'Bar-1991', '0f1208f8b8d972183bb16bb0443ddb5e', '', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'ceab8c7d14f12aaeec1dc19b3d81212a', 'Item 2', 'dshdjhsf', '56', '78', 0, '1642d900f6768119e3dd75bbf8ed0fc2', '', '75', '0.000', 2014, 0, '2', '2d81a2d79b828aa9e3d109184961925a', 'IBVGGF879879879', '', 0, '0', '', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 0, 'abyyc049b9d095c27843b114f02ac5f640.jpg'),
(11, 'ef92a1dc9701ac89a655927183a78d87', 'IC-126', '', '', '0f1208f8b8d972183bb16bb0443ddb5e', '', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '7988d76f85fb01646eb9d9b01530c460', 'Item 4', '87987', '12', '16', 0, '11d08dc2db3920364304c6ed1192b5ba', '', '15', '0.000', 2014, 0, '2', '2d81a2d79b828aa9e3d109184961925a', 'BJRFE2322444', '', 0, '0', '', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 0, 'ef92a1dc9701ac89a655927183a78d87.jpg'),
(12, '23b6fb71c13f7a53235835584c0a600f', 'IC-  127', '', '', '0f1208f8b8d972183bb16bb0443ddb5e', '', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '2a4e7a8de41c967c9097b2e4a1a0e662', 'Item 5', 'dsafdgs', '45', '49', 0, '1642d900f6768119e3dd75bbf8ed0fc2', '', '48', '0.000', 2014, 0, '2', '2d81a2d79b828aa9e3d109184961925a', 'BJRFE2322444', '', 0, '0', '', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 0, '23b6fb71c13f7a53235835584c0a600f.jpg'),
(13, 'bbd6c9542b588e703bf706c30e204777', 'IC-128', '', '', '0f1208f8b8d972183bb16bb0443ddb5e', '', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'ceab8c7d14f12aaeec1dc19b3d81212a', 'Item 9', '', '56', '59', 0, 'cfd8b485f99e561408192c594f8c2e92', '', '58', '0.000', 2014, 0, '2', '2d81a2d79b828aa9e3d109184961925a', '', '', 0, '0', '', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 0, ''),
(14, 'c709663a0324fb6175b807eb730de052', 'IC-129', '', '', '0f1208f8b8d972183bb16bb0443ddb5e', '', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '2a4e7a8de41c967c9097b2e4a1a0e662', 'Item 12', '', '12', '34', 1, 'cfd8b485f99e561408192c594f8c2e92', '', '30', '0.000', 2014, 0, '2', '2d81a2d79b828aa9e3d109184961925a', 'BJRFE2322444', '', 0, '0', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 0, ''),
(15, '1844a38365bda6feea716ed97859fd31', 'zfdsgsdg', '', 'sdgsdgsg', '37bc41880fa0ca0de0fa2e9f37480ba0', '37bc41880fa0ca0de0fa2e9f37480ba0', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'ceab8c7d14f12aaeec1dc19b3d81212a', 'sdgsgsdg', '56', '32', '56', 1, 'a85e2c85b10bd213c8b876acfa8aa7a5', '', '56', '56.000', 2014, 0, '2', '2d81a2d79b828aa9e3d109184961925a', '', 'asfaf', 0, '0', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 0, 1, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 0, '1844a38365bda6feea716ed97859fd31.jpg'),
(16, '73f2dab62a83cece967625cad014230d', 'zfdsgsdgertw', '', 'sdgsdgsg', '37bc41880fa0ca0de0fa2e9f37480ba0', '37bc41880fa0ca0de0fa2e9f37480ba0', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'ceab8c7d14f12aaeec1dc19b3d81212a', 'sdgsgsdg', '56', '32', '56', 1, 'a85e2c85b10bd213c8b876acfa8aa7a5', '', '56', '56.000', 2014, 0, '2', '2d81a2d79b828aa9e3d109184961925a', '', 'asfaf', 0, '0', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 0, 1, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 0, ''),
(17, '9d8439c7f35923f2397af1b7edadc670', 'IC-12777', '', '8908098098', '44490e4607304eaaf6f9acaf170ff290', '44490e4607304eaaf6f9acaf170ff290', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '6148f274388f64b43123c3598c3fcf81', 'Apple', '877979', '45', '67', 1, 'a85e2c85b10bd213c8b876acfa8aa7a5', '', '676', '0.000', 1, 1, '5dad9a40f3b35cd3b573fcd3d481ea0b', '2d81a2d79b828aa9e3d109184961925a', '', 'sdgsd', 1, '10', '', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 0, '1ccdd561c7450ecfc3589e625d3ddc74.gif'),
(18, '68fac0f3c2306caadf9779dd6eb0a568', 'IC-1289', '', 'test', 'f1cbc6905e17586f09094db931bcf75e', '402581a70ab59a35c0393cf2310b6f88', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'e91054c7db987e18f232ffa506f49394', 'product 1', 'test', '67', '70', 1, '11d08dc2db3920364304c6ed1192b5ba', '', '69', '0.000', 2014, 0, '5', '7973b1abfb2466b4478c9d87476951cf', '', 'test', 0, '0', NULL, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 0, ''),
(19, 'c82ea2b2b93a10eca382fc23aa2f5d5e', 'SKU 123', '', 'Bar-1991', '7d964715c57d2df50df0a9d380c9da22', '44490e4607304eaaf6f9acaf170ff290', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'e91054c7db987e18f232ffa506f49394', 'item-123', '', '12', '16', 1, '99cb6ba01684b50fa56b573351b11b84', '', '30', '0.000', 1, 1, '0', '85127b2d6897986a9175a142f154cd1a', '', 'loatiom', 0, '0', NULL, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 0, 'd8ac14f476d118369ce297b63c6305c9.jpg'),
(20, '9c8a34bd8413ff097231dcd035284e1b', 'uiyuiyiu', '', '89789', '24f1b9183166e5a887c2f882a00dd529', '44490e4607304eaaf6f9acaf170ff290', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'e91054c7db987e18f232ffa506f49394', 'PRODUCT 12', 'daDad', '12', '15', 1, 'db336d9ef0d8a4b64a17cef1a0b91c6e', '', '14', '0.000', 2014, 0, '681401', '7973b1abfb2466b4478c9d87476951cf', '', 'sad', 0, '0', NULL, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 0, '0'),
(21, '000b7493bfbd3e7be55732d5275b43ba', 'uiyiu', '', 'yiuyi', 'f1cbc6905e17586f09094db931bcf75e', '44490e4607304eaaf6f9acaf170ff290', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'c76d55c21f9d4f577b26fba515a8066f', 'yiuyi', '', '879', '787', 1, 'd7f081c1498b201c98be6e29536b5e51', '', '787', '0.000', 2014, 0, '2147483647', '7973b1abfb2466b4478c9d87476951cf', '', 'asfa', 0, '0', NULL, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 0, '02d6ec3793ae9b023995b8b3c5fa7f7f.gif'),
(22, '47e94298a89b3cf89e5e09cde7f4b1b1', 'uiyui', '', 'yuiyui', '78eef480d989be7ba6f2a1e1ac515b59', 'f1cbc6905e17586f09094db931bcf75e', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'c76d55c21f9d4f577b26fba515a8066f', 'yiuyiu', '', '42', '352', 1, 'f2e56b486bcd555842563ec7b58c62c3', '', '5235', '0.000', 2014, 0, '6', '7973b1abfb2466b4478c9d87476951cf', '', '', 0, '0', NULL, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 0, '230ccc8c07788db20480c19da271f48e.gif'),
(23, '1733d0bbbbd635f34421ddc030579885', 'sadgsd', '', 'sdgsdg', '78eef480d989be7ba6f2a1e1ac515b59', '4a70944370a2a575487e2ad0a5adae9d', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'ceab8c7d14f12aaeec1dc19b3d81212a', 'sdgsdg', 'sdgsdg', '235', '23523', 1, 'f2e56b486bcd555842563ec7b58c62c3', '', '235235', '0.000', 2014, 0, '81757', '7973b1abfb2466b4478c9d87476951cf', '', 'dsg', 0, '0', NULL, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 0, ''),
(24, 'c2757704eb875d850950bd5bff8cc845', 'test', '', '798798', 'a571815faaa09a1e6d575c9a5cf92548', '981cbacdb1bd664698bf1803878909b6', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'ceab8c7d14f12aaeec1dc19b3d81212a', 'PRODUCT 1212', 'sdfsd', '32542', '35235', 1, '6a3fba30105e2894ff21a1bef6443300', '', '235', '0.000', 2014, 0, '681401', '28aa802577d2ca603ca011f9a3147881', '', '42355', 0, '34523', NULL, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 0, 'cb484e3e5ae282c5408e2e69f872b12b.gif'),
(25, '96d4396bdfee017b1cf08c3b54bac4a5', 'IC-123', '', 'test', '0a61072caf2d6fc1f515c26f21a71acb', 'c8f777cc66024bcfb022dad696bbff44', 'BE4CB6FB-9D0F-457A-9D0F-D7948222EBB3', 'ceab8c7d14f12aaeec1dc19b3d81212a', 'Item 1', 'dsfgsd', '13', '15', 1, 'b75afe85b7eac44cbdae6094b67645aa', '', '14', '0.000', 0, 0, '722cd6b7d27eb0ce93c8685a2c426c4d', '974cc19e629b993ced7f7267d9fbb526', '', 'oiu', 1, '2', NULL, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 0, 'fbe37b9a098cb8835d30eeb52073bdda.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `items_category`
--

CREATE TABLE IF NOT EXISTS `items_category` (
  `id` int(200) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) DEFAULT NULL,
  `category_name` varchar(100) NOT NULL,
  `branch_id` varchar(255) DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `added_by` varchar(255) DEFAULT NULL,
  `deleted_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `items_category`
--

INSERT INTO `items_category` (`id`, `guid`, `category_name`, `branch_id`, `active_status`, `delete_status`, `added_by`, `deleted_by`) VALUES
(1, '0f1208f8b8d972183bb16bb0443ddb5e', 'balls', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(2, '4a70944370a2a575487e2ad0a5adae9d', 'pen', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(3, '44490e4607304eaaf6f9acaf170ff290', 'book', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(4, '37bc41880fa0ca0de0fa2e9f37480ba0', 'Goodnight', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(5, '7d964715c57d2df50df0a9d380c9da22', 'vicks', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(6, '5c3437e9dedbcacead642b41b4a1f214', 'weakily', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(7, '544f4c88a4008a5e58fc3fe5104afea9', 'Box', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(8, 'f1cbc6905e17586f09094db931bcf75e', 'soap', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(9, '981cbacdb1bd664698bf1803878909b6', 'CD', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(10, '402581a70ab59a35c0393cf2310b6f88', 'DVD', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(11, '24f1b9183166e5a887c2f882a00dd529', 'sasi12', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(12, 'a571815faaa09a1e6d575c9a5cf92548', 'sasi', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(13, '7fa9f5c245fc8ffccbeb3c0437155078', 'mobile phone', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(14, '78eef480d989be7ba6f2a1e1ac515b59', 'jibi gopi', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', NULL),
(15, 'b9111f1e4151d408bd01589304eaa23a', 'saaaaaaaaaaaaaaaaa', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', NULL),
(16, '22aa2ef40f166e8d1261c5bb88a4220b', 'oxford', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, '7c9888196685a12a83eecf9c0d05a525', NULL),
(17, '2f559b0d9737f2e40407db3e6c998513', 'category 1', 'BE4CB6FB-9D0F-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', NULL),
(18, '0a61072caf2d6fc1f515c26f21a71acb', 'category 2', 'BE4CB6FB-9D0F-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', NULL),
(19, '5ace409a4f06999ff48ba89307e82e00', 'category 3', 'BE4CB6FB-9D0F-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items_department`
--

CREATE TABLE IF NOT EXISTS `items_department` (
  `id` int(200) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) DEFAULT NULL,
  `department_name` varchar(100) NOT NULL,
  `branch_id` varchar(255) DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `added_by` varchar(255) DEFAULT NULL,
  `deleted_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `items_department`
--

INSERT INTO `items_department` (`id`, `guid`, `department_name`, `branch_id`, `active_status`, `delete_status`, `added_by`, `deleted_by`) VALUES
(1, '0f1208f8b8d972183bb16bb0443ddb5e', 'Non Veg', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(2, '4a70944370a2a575487e2ad0a5adae9d', 'Vegitable', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(3, '44490e4607304eaaf6f9acaf170ff290', 'Fruits', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(4, '37bc41880fa0ca0de0fa2e9f37480ba0', 'Medicine', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(5, '7d964715c57d2df50df0a9d380c9da22', 'vicks', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(6, '5c3437e9dedbcacead642b41b4a1f214', 'weakily', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(7, '544f4c88a4008a5e58fc3fe5104afea9', 'Box', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(8, 'f1cbc6905e17586f09094db931bcf75e', 'soap', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(9, '981cbacdb1bd664698bf1803878909b6', 'CD', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(10, '402581a70ab59a35c0393cf2310b6f88', 'DVD', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(11, '24f1b9183166e5a887c2f882a00dd529', 'sasi12', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 1, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(12, 'a571815faaa09a1e6d575c9a5cf92548', 'sasi', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(13, '7fa9f5c245fc8ffccbeb3c0437155078', 'mobile phone', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(14, '75bcc4188e278a5c4f6447588c70ead6', '123', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 1, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(15, '7d594b99662ecd1c1ced9db977f1f3bd', 'veg', 'BE4CB6FB-9D0F-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', NULL),
(16, 'c8f777cc66024bcfb022dad696bbff44', 'non veg', 'BE4CB6FB-9D0F-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', NULL),
(17, 'b4cad279b0cf9ba2f0a1931cacc1aa70', 'Department 1', 'BE4CB6FB-9D0F-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', NULL),
(18, '14fa688aeffe785a3a13dc2617b66556', 'Department 2', 'BE4CB6FB-9D0F-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', NULL),
(19, '59f4605d16c18ba221de58b5663704e4', 'Department 3', 'BE4CB6FB-9D0F-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', NULL),
(20, '5ec795d44888e98fbea3c71d9b7bc47c', 'Department 4', 'BE4CB6FB-9D0F-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items_setting`
--

CREATE TABLE IF NOT EXISTS `items_setting` (
  `id` int(200) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) DEFAULT NULL,
  `item_id` varchar(100) NOT NULL,
  `branch_id` varchar(255) DEFAULT NULL,
  `min_q` varchar(50) NOT NULL,
  `max_q` varchar(50) NOT NULL,
  `sales` int(11) NOT NULL,
  `purchase` int(11) NOT NULL DEFAULT '1',
  `salses_return` int(11) NOT NULL DEFAULT '1',
  `purchase_return` int(11) NOT NULL DEFAULT '1',
  `allow_negative` int(11) NOT NULL,
  `tax_inclusive` int(11) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `set` int(11) NOT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `active_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `items_setting`
--

INSERT INTO `items_setting` (`id`, `guid`, `item_id`, `branch_id`, `min_q`, `max_q`, `sales`, `purchase`, `salses_return`, `purchase_return`, `allow_negative`, `tax_inclusive`, `updated_by`, `set`, `added_by`, `active`, `delete_status`, `active_status`) VALUES
(8, '8fd2f0b26e43692112039645d71f1577', 'c3216f7d74d4adcf50901b8559d9a3bc', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '0', '1000', 1, 1, 1, 1, 1, 0, '', 1, '', 0, 1, 0),
(9, '44d9cc0a561f2bd92a2a21e64d5c3c87', 'abc049b9d095c27843b114f02ac5f640', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '10', '10000', 1, 1, 1, 1, 1, 0, '', 1, '', 0, 1, 0),
(10, '467eba091599ff4e3b669dfd7c36f15e', 'ef92a1dc9701ac89a655927183a78d87', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '', '', 1, 1, 1, 0, 1, 0, '', 1, '', 1, 0, 0),
(11, '854e42db7afcc7526ae3356c86f6b571', '23b6fb71c13f7a53235835584c0a600f', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '', '', 1, 1, 1, 0, 1, 0, '', 1, '', 1, 0, 0),
(12, '467eba091599ff4e3b6699fd7c36f15e', 'abyyc049b9d095c27843b114f02ac5f640', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '', '', 1, 1, 1, 1, 1, 0, '', 1, '', 1, 0, 0),
(13, '86b3c04f58ec4a778f284a3e13e28a2b', 'bbd6c9542b588e703bf706c30e204777', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '', '', 1, 0, 1, 0, 1, 0, '', 1, '', 1, 0, 0),
(14, '8f28441d473f1b088b4688ed4ceb4f69', 'c709663a0324fb6175b807eb730de052', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '0', '0', 1, 1, 1, 1, 1, 0, '', 1, '', 0, 1, 0),
(15, 'd64ae1825d95015b3c71146a6d45d026', '1844a38365bda6feea716ed97859fd31', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '', '', 1, 0, 1, 0, 1, 0, '', 1, '', 1, 1, 0),
(16, '1bac78b33d524480614fed9f2997b0ab', '73f2dab62a83cece967625cad014230d', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '212', '12', 0, 1, 0, 1, 0, 1, '', 1, '', 0, 1, 0),
(17, '6f087cf2822b3aacef87b43d01713f61', '9d8439c7f35923f2397af1b7edadc670', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '', '', 1, 1, 1, 1, 1, 0, '', 1, '', 1, 0, 0),
(18, '5e04d2d6eafb5bb9626139aae2942042', '68fac0f3c2306caadf9779dd6eb0a568', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '', '', 0, 0, 0, 0, 0, 0, '', 1, NULL, 1, 0, 1),
(19, '18a6de9884194399839e9d7de9c5f775', 'c82ea2b2b93a10eca382fc23aa2f5d5e', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '', '', 0, 0, 0, 0, 0, 0, '', 1, NULL, 1, 0, 1),
(20, 'b44c3333b130577e42dabcd268aaf46a', '9c8a34bd8413ff097231dcd035284e1b', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '', '', 0, 1, 1, 1, 0, 0, '', 0, NULL, 1, 0, 1),
(21, '7beae522d6dd4d5e6cebffd01e8598db', '000b7493bfbd3e7be55732d5275b43ba', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '', '', 0, 1, 1, 1, 0, 0, '', 0, NULL, 1, 0, 1),
(22, '267cfb9e9337e63a8d87214413a9656c', '47e94298a89b3cf89e5e09cde7f4b1b1', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '', '', 0, 1, 1, 1, 0, 0, '', 0, NULL, 1, 0, 1),
(23, '7d0e303ada389bd65ccf6c117966c3ef', '1733d0bbbbd635f34421ddc030579885', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '', '', 0, 1, 1, 1, 0, 0, '', 0, NULL, 1, 0, 1),
(24, '4b1e63e719f32a90e980dca65b1eeade', 'c2757704eb875d850950bd5bff8cc845', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '', '', 0, 1, 1, 1, 0, 0, '', 0, NULL, 1, 0, 1),
(25, '66fdec0625d580aae31eb7357dc16ca8', '96d4396bdfee017b1cf08c3b54bac4a5', 'BE4CB6FB-9D0F-457A-9D0F-D7948222EBB3', '', '', 0, 1, 1, 1, 0, 0, '', 0, NULL, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_upc_ean_code`
--

CREATE TABLE IF NOT EXISTS `item_upc_ean_code` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) DEFAULT NULL,
  `item_id` varchar(100) NOT NULL,
  `code` varchar(200) NOT NULL,
  `branch_id` varchar(255) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `master_data`
--

CREATE TABLE IF NOT EXISTS `master_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) DEFAULT NULL,
  `key` varchar(255) NOT NULL,
  `prefix` varchar(255) NOT NULL,
  `value2` varchar(200) NOT NULL,
  `max` varchar(250) NOT NULL,
  `branch_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `master_data`
--

INSERT INTO `master_data` (`id`, `guid`, `key`, `prefix`, `value2`, `max`, `branch_id`) VALUES
(1, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'purchase_order', 'POSNIC-10', '1', '62', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3'),
(2, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'grn', 'POSNIC-GRN-10', '1', '62', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3'),
(3, '276C-457A-BE4CB6FB-D7948222EBB3', 'direct_grn', 'POSNIC-D-GRN-10', '1', '32', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3'),
(4, '276C-457A-BE4CB6FBIJIBI-D7948222EBB3', 'purchase_invoice', 'INV-101', '1', '115', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3'),
(5, '276C-457A-BE4CB-BE4CB6FBIJIBI-D7948222EBB3', 'direct_invoice', 'D-INV-101', '1', '57', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3'),
(6, '276C-457A-B-7897987IUOI4CB6FBIJIBI-D7948222EBB3', 'supplier_payment', 'IN-1', '1', '7', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3'),
(7, '276C-457A-B-78D794822297987IUOI4CB6FBIJIBI-', 'sales', 'S-1', '1', '6', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3'),
(8, 'D794822297987IUOD794822297987IUOD794822297987IUO-', 'sales_quotation', 'S-1', '1', '21', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3'),
(9, '7IUOD794822297987IUOD794822297987IUOD7948222', 'sales_order', 'SO-1', '1', '37', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3'),
(10, '7IUOD79482229545tw7987IUOD7948222', 'sales_delivery_note', 'SDN-1', '1', '30', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3'),
(11, '7IUOD794822Gytyt yt57fs6auasid748222', 'direct_sales_delivery', 'DDN-1', '1', '28', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3'),
(12, '276C-457A-BE4CB6FB--457A-EBB3', 'direct_sales', 'DS-1', '1', '39', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3'),
(13, '276C-457A-BE4CB6FB--457A-EBB3-457A-', 'sales_bill', 'SB-1', '1', '54', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3'),
(14, '276C-457A-BE4CB6FB--457A-EBB3-457A-', 'customer_payment', 'CP-1', '1', '54', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3'),
(15, '276C-BE4CB6FB--457A-BE4CB6FB--457A-457A-', 'opening_stock', 'OS', '1', '21', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3'),
(16, 'BE4CB6FBBEBE4CB6FB-276C-BE4CB6FB-276C-457A-6FB-276C-457A--457A', 'damage_stock', 'DS-1', '1', '25', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3'),
(17, 'fb95ec4fb8fa302791af95eed4982559c4fb8fa302791af95eed4982559', 'stock_transfer', 'ST-1', '1', '25', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) DEFAULT NULL,
  `module_name` varchar(200) NOT NULL,
  `cate_id` varchar(200) NOT NULL,
  `added_date` int(20) NOT NULL,
  `deleted_date` int(11) NOT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `deleted_by` varchar(255) DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `guid`, `module_name`, `cate_id`, `added_date`, `deleted_date`, `added_by`, `deleted_by`, `active_status`, `delete_status`) VALUES
(1, '80B0F0FD-B148-4C02-AFC7-7463D856714A', 'items', '80B0F0FD-B148-4C02-AF787C7-7463D856714', 1, 0, '102', '0', 1, 0),
(2, '892367F9-98AC-47B2-B6B7-C9268EBFFE87', 'users', '80B0F0FD-B148-4C02-AFC7-7463D85671412', 1, 0, '102', '0', 1, 0),
(3, 'FF2CD316-E154-4A6E-8A7E-6514365242EE', 'brands', '80B0F0FD-B148-4C02-AF787C7-7463D856714', 1, 0, '102', '0', 1, 0),
(4, '92ECECEE-9484-4941-BA0F-28EC165E4FF8', 'items_setting', '80B0F0FD-B148-4C02-AF787C7-7463D856714', 102, 0, '0', '0', 1, 0),
(5, '60715722-A689-412B-A13F-ECA29FF19523', 'item_code', '80B0F0FD-B148-4C02-AF787C7-7463D856714', 102, 0, '0', '0', 1, 0),
(6, 'FAECB8C6-1AFE-44E8-A654-087A43A93FFB', 'taxes', '80B0F0FD-B178748-4C02-AFC7-7463D856714A', 102, 0, '0', '0', 1, 0),
(7, 'C0920814-A3DE-48A1-8825-928D32BE0B1E', 'tax_commodity', '80B0F0FD-B178748-4C02-AFC7-7463D856714A', 102, 0, '0', '0', 1, 0),
(8, 'CAB43E25-264E-47B7-84D8-1E41583CA69E', 'items_category', '80B0F0FD-B148-4C02-AF787C7-7463D856714', 102, 0, '0', '0', 1, 0),
(9, 'D6BC7342-1CF1-4EC6-816C-6D53F9A5191B', 'tax_types', '80B0F0FD-B178748-4C02-AFC7-7463D856714A', 102, 0, '0', '0', 1, 0),
(10, 'B3A03076-14E9-4C0A-9B13-4F8DF9D6145D', 'taxes_area', '80B0F0FD-B178748-4C02-AFC7-7463D856714A', 102, 0, '0', '1', 1, 0),
(11, 'D33AF5EF-570D-403D-B967-A5B658675B06', 'suppliers', '80B0F0FD-B148-4C02-AFC7-7463D8567j8huy7', 102, 0, '0', '0', 1, 0),
(12, '9252FCEE-011A-425A-BB41-E9D5A5E7792A', 'suppliers_x_items', '80B0F0FD-B148-4C02-AFC7-7463D8567j8huy7', 102, 0, '0', '0', 1, 0),
(13, '5464B2EF-92D2-4430-B366-983D7590FFC4', 'customers', '9090B0F0FD-B148-4C02-AFC7-7463Dd8989856714A', 102, 0, '0', '0', 1, 0),
(14, '23B67A1A-0675-4DE9-98E3-7ACFA6637F25', 'customer_category', '9090B0F0FD-B148-4C02-AFC7-7463Dd8989856714A', 102, 0, '0', '0', 1, 0),
(15, 'DA79AE6E-7D46-4BB4-AD47-CD37F5BBB615', 'user_groupsci', '80B0F0FD-B148-4C02-AFC7-7463D85671412', 102, 0, '1', '1', 1, 0),
(16, '3AAFF903-73E6-4987-BFE1-8F24E268BDC9', 'branches', 'Iu878h0FD-B148-4C02-AFC7-7463D856714A', 102, 0, '0', '0', 1, 0),
(17, '6D825F4C-44E0-4CF4-8FD2-A5FEA57E8FC1', 'purchase_order', '80B900F0FD-B148-4C02-AFC7-7463D856714A', 102, 0, '0', '0', 1, 0),
(18, 'B299A7BB-7709-4B0B-966E-023F1CA77058', 'customers_payment_type', '9090B0F0FD-B148-4C02-AFC7-7463Dd8989856714A', 102, 0, '0', '0', 1, 0),
(19, 'B499A7BB-8709-4B0B-966E-023F1CA77058', 'purchase_order', '80B900F0FD-B148-4C02-AFC7-7463D856714A', 102, 0, '0', '0', 1, 0),
(21, 'CAB43E25-264TYE-47B7-84D8-1E41583CA69E', 'items_department', '80B0F0FD-B148-4C02-AF787C7-7463D856714', 102, 0, '0', '0', 1, 0),
(22, 'D33AF9080F-570D-403D-B967-A5B658675B0645', 'suppliers_category', '80B0F0FD-B148-4C02-AFC7-7463D8567j8huy7', 102, 0, '0', '0', 1, 0),
(24, '7248797adf02e132ba3c51da343bbfd4', 'purchase_order_cancel', '80B900F0FD-B148-4C02-AFC7-7463D856714A', 102, 0, '0', '0', 1, 0),
(25, 'B499A7TWV889-7H8FSG-8709-023F-4B0B-966E-023F1CA77058-023', 'goods_receiving_note', '80B900F0FD-B148-4C02-AFC7-7463D856714A', 102, 0, '0', '0', 1, 0),
(26, 'B499A7BB-8709-023F-4B0B-966E-023F1CA77058-023', 'direct_grn', '80B900F0FD-B148-4C02-AFC7-7463D856714A', 102, 0, '0', '0', 1, 0),
(27, 'B499A7BB-7709-4B0B-966E-023F1CA77057', 'purchase_invoice', '80B900F0FD-B148-4C02-AFC7-7463D856714A', 102, 0, '0', '0', 1, 0),
(28, '4B0B-4B0B-7709-4B0B-966E-023F1CA-4B0B', 'direct_invoice', '80B900F0FD-B148-4C02-AFC7-7463D856714A', 102, 0, '0', '0', 1, 0),
(29, 'ddaf13095cf7472c4df9ab7ef547311e', 'supplier_payment', 'ce373527a9a1981f3fea7bf414b6a529', 102, 0, '0', '0', 1, 0),
(30, '5d6caaab9ffe66d750293aedae946da6', 'stock_transfer', 'fdf7b89447e93bce736d471aefc5fff4', 102, 0, '0', '0', 1, 0),
(31, 'bcfc52307913f851ded416c9283a6826', 'opening_stock', 'fdf7b89447e93bce736d471aefc5fff4', 102, 0, '0', '0', 1, 0),
(32, 'fe36bb26e7b7b0499d22f87ebeee343c', 'damage_stock', 'fdf7b89447e93bce736d471aefc5fff4', 102, 0, '0', '0', 1, 0),
(33, '5ac1b200480113f66b9e38e2387b0840', 'sales_quotation', '4C020FD-B148-4C02-AFC7-7463D856714A', 102, 0, '0', '0', 1, 0),
(34, '5ac1fe36bb26e7b7b049387b0840', 'sales_order', '4C020FD-B148-4C02-AFC7-7463D856714A', 102, 0, '0', '0', 1, 0),
(35, '7227e29d3bb56bd7B148-4C02-AFCB148-4C02-AFC', 'sales_delivery_note', '4C020FD-B148-4C02-AFC7-7463D856714A', 102, 0, '0', '0', 1, 0),
(36, '-B148-4C02-AFC7-7463D856714A63D856714A7b0840', 'direct_sales_delivery', '4C020FD-B148-4C02-AFC7-7463D856714A', 102, 0, '0', '0', 1, 0),
(40, '5ac1fe4C020FD-B148-4C02-AFC7-7463D856714A7b0840', 'direct_sales', '4C020FD-B148-4C02-AFC7-7463D856714A', 102, 0, '0', '0', 1, 0),
(41, 'd04f7130b0e16554b6f87751b3d7eaae', 'purchase_return', '80B900F0FD-B148-4C02-AFC7-7463D856714A', 102, 0, '0', '0', 1, 0),
(46, '5ac1fe36bb26e7b7b5ac1fe36bb26e7b7b049387b0840', 'sales_bill', '4C020FD-B148-4C02-AFC7-7463D856714A', 102, 0, '0', '0', 1, 0),
(47, '7227e29d3bb56bd72c032ca4a650f936', 'sales_return', '4C020FD-B148-4C02-AFC7-7463D856714A', 102, 0, '0', '0', 1, 0),
(48, 'dd9a1981f3fea7bf472c4df99a1981f3fea7bf4', 'customer_payment', 'ce373527a9a1981f3fea7bf414b6a529', 102, 0, '0', '0', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `modules_category`
--

CREATE TABLE IF NOT EXISTS `modules_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(200) NOT NULL,
  `Category_name` varchar(100) NOT NULL,
  `no` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `modules_category`
--

INSERT INTO `modules_category` (`id`, `guid`, `Category_name`, `no`) VALUES
(3, '80B0F0FD-B148-4C02-AFC7-7463D85671412', 'users', 0),
(4, '80B0F0FD-B148-4C02-AF787C7-7463D856714', 'items', 0),
(5, '80B0F0FD-B178748-4C02-AFC7-7463D856714A', 'tax', 0),
(6, '9090B0F0FD-B148-4C02-AFC7-7463Dd8989856714A', 'customers', 0),
(7, '80B0F0FD-B148-4C02-AFC7-7463D8567j8huy7', 'suppliers', 0),
(8, '80B900F0FD-B148-4C02-AFC7-7463D856714A', 'purchase', 0),
(9, '4C020FD-B148-4C02-AFC7-7463D856714A', 'sales', 0),
(10, 'ce373527a9a1981f3fea7bf414b6a529', 'payments', 0),
(11, 'Iu878h0FD-B148-4C02-AFC7-7463D856714A', 'branches', 0),
(12, 'fdf7b89447e93bce736d471aefc5fff4', 'stock', 0);

-- --------------------------------------------------------

--
-- Table structure for table `modules_x_branches`
--

CREATE TABLE IF NOT EXISTS `modules_x_branches` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) DEFAULT NULL,
  `branch_id` varchar(255) DEFAULT NULL,
  `module_id` varchar(100) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `added_by` varchar(255) DEFAULT NULL,
  `deleted_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `modules_x_branches`
--

INSERT INTO `modules_x_branches` (`id`, `guid`, `branch_id`, `module_id`, `active_status`, `delete_status`, `added_by`, `deleted_by`) VALUES
(1, '892367F9-98AC-47B2-B6B7-C9268EBFFE87', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '892367F9-98AC-47B2-B6B7-C9268EBFFE87', 1, 0, '0', '0'),
(2, 'FF2CD316-E154-4A6E-8A7E-6514365242EE', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'FF2CD316-E154-4A6E-8A7E-6514365242EE', 1, 0, '0', '0'),
(3, '92ECECEE-9484-4941-BA0F-28EC165E4FF8', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '92ECECEE-9484-4941-BA0F-28EC165E4FF8', 1, 0, '0', '0'),
(4, '60715722-A689-412B-A13F-ECA29FF19523', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '60715722-A689-412B-A13F-ECA29FF19523', 1, 0, '0', '0'),
(5, 'FAECB8C6-1AFE-44E8-A654-087A43A93FFB', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'FAECB8C6-1AFE-44E8-A654-087A43A93FFB', 1, 0, '0', '0'),
(6, 'B3A03076-14E9-4C0A-9B13-4F8DF9D6145D', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'B3A03076-14E9-4C0A-9B13-4F8DF9D6145D', 1, 0, '0', '0'),
(7, 'CAB43E25-264E-47B7-84D8-1E41583CA69E', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'CAB43E25-264E-47B7-84D8-1E41583CA69E', 1, 0, '0', '0'),
(8, 'C0920814-A3DE-48A1-8825-928D32BE0B1E', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'C0920814-A3DE-48A1-8825-928D32BE0B1E', 1, 0, '0', '0'),
(9, 'D6BC7342-1CF1-4EC6-816C-6D53F9A5191B', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'D6BC7342-1CF1-4EC6-816C-6D53F9A5191B', 1, 0, '0', '0'),
(10, '80B0F0FD-B148-4C02-AFC7-7463D856714A', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '80B0F0FD-B148-4C02-AFC7-7463D856714A', 1, 0, '0', '0'),
(11, '80B0F0FD-B148-4C02-AFC7-7463D856714A', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '80B0F0FD-B148-4C02-AFC7-7463D856714Ass', 1, 0, '0', '0'),
(12, 'D33AF5EF-570D-403D-B967-A5B658675B06', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'D33AF5EF-570D-403D-B967-A5B658675B06', 1, 0, '0', '0'),
(13, '9252FCEE-011A-425A-BB41-E9D5A5E7792A', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '9252FCEE-011A-425A-BB41-E9D5A5E7792A', 1, 0, '0', '0'),
(14, '5464B2EF-92D2-4430-B366-983D7590FFC4', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '5464B2EF-92D2-4430-B366-983D7590FFC4', 1, 0, '0', '0'),
(15, '23B67A1A-0675-4DE9-98E3-7ACFA6637F25', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '23B67A1A-0675-4DE9-98E3-7ACFA6637F25', 1, 0, '0', '0'),
(16, 'DA79AE6E-7D46-4BB4-AD47-CD37F5BBB615', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'DA79AE6E-7D46-4BB4-AD47-CD37F5BBB615', 1, 0, '0', '0'),
(17, '3AAFF903-73E6-4987-BFE1-8F24E268BDC9', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '3AAFF903-73E6-4987-BFE1-8F24E268BDC9', 1, 0, '0', '0'),
(18, 'B299A7BB-7709-4B0B-966E-023F1CA77058', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'B299A7BB-7709-4B0B-966E-023F1CA77058', 1, 0, '0', '0'),
(19, 'B499A7BB-8709-4B0B-966E-023F1CA77058', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'B499A7BB-8709-4B0B-966E-023F1CA77058', 1, 0, '0', '0'),
(20, 'B499A7BB-77DFSS09-4B0B-966E-023F1CA77057', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'CAB43E25-264TYE-47B7-84D8-1E41583CA69E', 1, 0, '0', '0'),
(21, 'B499A7BB-77DFSS09-4B0B-966E-023F1CA77057', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'D33AF9080F-570D-403D-B967-A5B658675B0645', 1, 0, '0', '0'),
(22, '4C020FD-B148-4C02-AFC7-7463D856714A057', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '4C020FD-B148-4C02-AFC7-7463D856714A', 1, 0, '0', '0'),
(23, 'B499A7BB-8709-023F-4B0B-966E-023F1CA77058-023', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'B499A7TWV889-7H8FSG-8709-023F-4B0B-966E-023F1CA77058-023', 1, 0, '0', '0'),
(24, 'B499A7BB-8709-023F-4B0B-966E-023F1CA77058-023', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'B499A7BB-8709-023F-4B0B-966E-023F1CA77058-023', 1, 0, '0', '0'),
(25, 'B499A7BB-7709-4B0B-966E-023F1CA77057', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'B499A7BB-7709-4B0B-966E-023F1CA77057', 1, 0, '0', '0'),
(26, '4B0B-D7948222EBB3-4B0B-4B0B-966E-023F', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '4B0B-4B0B-7709-4B0B-966E-023F1CA-4B0B', 1, 0, '0', '0'),
(27, '4B0B-D7948222EBB3-4B0B-4B0B-966E-023F', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'ddaf13095cf7472c4df9ab7ef547311e', 1, 0, '0', '0'),
(28, '7248797adf02e132ba3c51da343bbfd4-4B0B-4B0B-966E-023F', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '7248797adf02e132ba3c51da343bbfd4', 1, 0, '0', '0'),
(29, '72487-5d6caaab9ffe66d750293aedae946da6', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '5d6caaab9ffe66d750293aedae946da6', 1, 0, '0', '0'),
(30, '72487-5d6caaab9ffe66d750293aedae946da6', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'bcfc52307913f851ded416c9283a6826', 1, 0, '0', '0'),
(31, '72487-fe36bb26e7b7b0499d22f87ebeee343c', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'fe36bb26e7b7b0499d22f87ebeee343c', 1, 0, '0', '0'),
(32, '72487-5d6caaab9ffe-B148-4C02-AFC7-7463D856714A63D856714A7b0840', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '5ac1b200480113f66b9e38e2387b0840', 1, 0, '0', '0'),
(33, '72-B148-4C02-AFC7-7463D856714A63D856714A7b0840da6', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '5ac1fe36bb26e7b7b049387b0840', 1, 0, '0', '0'),
(34, '72487-5d6caaab9ffe66d750293aedae946da6', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '5ac1fe36bb26e7b7b5ac1fe36bb26e7b7b049387b0840', 1, 0, '0', '0'),
(35, '-B148-4C02-AFC7-7463D856714A63D856714A7b0840fe66d750293aedae946da6', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '5ac1fe4C020FD-B148-4C02-AFC7-7463D856714A7b0840', 1, 0, '0', '0'),
(36, '72487--B148-4C02-AFC7-7463D856714A63D856714A7b08406', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '-B148-4C02-AFC7-7463D856714A63D856714A7b0840', 1, 0, '0', '0'),
(37, '7247227e29d3bb56bd72c032ca4a650f936', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '7227e29d3bb56bd72c032ca4a650f936', 1, 0, '0', '0'),
(38, '506e87d5b970aa58260e534531c867f20f936', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '506e87d5b970aa58260e534531c867f2', 1, 0, '0', '0'),
(39, 'd04f7130b0e16554b6f87751b3d7eaae936', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'd04f7130b0e16554b6f87751b3d7eaae', 1, 0, '0', '0'),
(40, 'd04f7130b0e16554b6f87751b3d7eaae936', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '7227e29d3bb56bd7B148-4C02-AFCB148-4C02-AFC', 1, 0, '0', '0'),
(41, 'dd9a1981f3fea7bf472c4df99a1981f3fea7bf47eaae936', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'dd9a1981f3fea7bf472c4df99a1981f3fea7bf4', 1, 0, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `modules_x_permissions`
--

CREATE TABLE IF NOT EXISTS `modules_x_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(200) NOT NULL,
  `branch_id` varchar(200) NOT NULL,
  `user_group_id` varchar(200) NOT NULL,
  `module_id` varchar(200) NOT NULL,
  `permission` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=142 ;

--
-- Dumping data for table `modules_x_permissions`
--

INSERT INTO `modules_x_permissions` (`id`, `guid`, `branch_id`, `user_group_id`, `module_id`, `permission`) VALUES
(1, '4e732ced3463d06de0ca9a15b6153671', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '4e732ced3463d06de0ca9a15b6153677', '892367F9-98AC-47B2-B6B7-C9268EBFFE87', 1111),
(2, '4e732ced3463d06de0ca9a15b6153672', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '4e732ced3463d06de0ca9a15b6153677', 'FF2CD316-E154-4A6E-8A7E-6514365242EE', 1111),
(3, '4e732ced3463d06de0ca9a15b6153673', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '4e732ced3463d06de0ca9a15b6153677', '92ECECEE-9484-4941-BA0F-28EC165E4FF8', 1111),
(4, '4e732ced3463d06de0ca9a15b6153674', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '4e732ced3463d06de0ca9a15b6153677', '60715722-A689-412B-A13F-ECA29FF19523', 1111),
(5, '4e732ced3463d06de0ca9a15b6153675', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '4e732ced3463d06de0ca9a15b6153677', 'FAECB8C6-1AFE-44E8-A654-087A43A93FFB', 1111),
(6, '4e732ced3463d06de0ca9a15b6153676', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '4e732ced3463d06de0ca9a15b6153677', 'B3A03076-14E9-4C0A-9B13-4F8DF9D6145D', 1111),
(7, '4e732ced3463d06de0ca9a15b6153677', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '4e732ced3463d06de0ca9a15b6153677', 'CAB43E25-264E-47B7-84D8-1E41583CA69E', 1111),
(8, '4e732ced3463d06de0ca9a15b6153678', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '4e732ced3463d06de0ca9a15b6153677', 'C0920814-A3DE-48A1-8825-928D32BE0B1E', 1111),
(9, '4e732ced3463d06de0ca9a15b6153679', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '4e732ced3463d06de0ca9a15b6153677', 'D6BC7342-1CF1-4EC6-816C-6D53F9A5191B', 1111),
(10, '4e732ced3463d06de0ca9a15b6153680', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '4e732ced3463d06de0ca9a15b6153677', '80B0F0FD-B148-4C02-AFC7-7463D856714A', 1111),
(11, '4e732ced3463d06de0ca9a15b6153681', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '4e732ced3463d06de0ca9a15b6153677', '80B0F0FD-B148-4C02-AFC7-7463D856714Ass', 1111),
(12, '4e732ced3463d06de0ca9a15b6153682', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '4e732ced3463d06de0ca9a15b6153677', 'D33AF5EF-570D-403D-B967-A5B658675B06', 1111),
(13, '4e732ced3463d06de0ca9a15b6153683', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '4e732ced3463d06de0ca9a15b6153677', '9252FCEE-011A-425A-BB41-E9D5A5E7792A', 1111),
(14, '4e732ced3463d06de0ca9a15b6153684', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '4e732ced3463d06de0ca9a15b6153677', '5464B2EF-92D2-4430-B366-983D7590FFC4', 1111),
(15, '4e732ced3463d06de0ca9a15b6153685', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '4e732ced3463d06de0ca9a15b6153677', '23B67A1A-0675-4DE9-98E3-7ACFA6637F25', 1111),
(16, '4e732ced3463d06de0ca9a15b6153686', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '4e732ced3463d06de0ca9a15b6153677', 'DA79AE6E-7D46-4BB4-AD47-CD37F5BBB615', 1111),
(17, '4e732ced3463d06de0ca9a15b6153687', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '4e732ced3463d06de0ca9a15b6153677', '3AAFF903-73E6-4987-BFE1-8F24E268BDC9', 1111),
(18, '4e732ced3463d06de0ca9a15b6153688', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '4e732ced3463d06de0ca9a15b6153677', 'B299A7BB-7709-4B0B-966E-023F1CA77058', 1111),
(19, '4e732ced3463d06de0ca9a15b6153689', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '4e732ced3463d06de0ca9a15b6153677', 'B499A7BB-8709-4B0B-966E-023F1CA77058', 1111),
(20, '4e732ced3463d06de0ca9a15b61536890', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '4e732ced3463d06de0ca9a15b6153677', 'B499A7BB-7709-4B0B-966E-023F1CA77057', 1111),
(21, '4e732ced3463d06de0ca9a15b61536891', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', '892367F9-98AC-47B2-B6B7-C9268EBFFE87', 1111),
(22, '4e732ced3463d06de0ca9a15b61536892', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', 'FF2CD316-E154-4A6E-8A7E-6514365242EE', 1111),
(23, '4e732ced3463d06de0ca9a15b61536893', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', '92ECECEE-9484-4941-BA0F-28EC165E4FF8', 1111),
(24, '4e732ced3463d06de0ca9a15b61536894', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', '60715722-A689-412B-A13F-ECA29FF19523', 1111),
(25, '4e732ced3463d06de0ca9a15b61536895', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', 'FAECB8C6-1AFE-44E8-A654-087A43A93FFB', 1111),
(26, '4e732ced3463d06de0ca9a15b61536896', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', 'B3A03076-14E9-4C0A-9B13-4F8DF9D6145D', 1111),
(27, '4e732ced3463d06de0ca9a15b61536897', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', 'CAB43E25-264E-47B7-84D8-1E41583CA69E', 1111),
(28, '4e732ced3463d06de0ca9a15b61536898', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', 'C0920814-A3DE-48A1-8825-928D32BE0B1E', 1111),
(29, '4e732ced3463d06de0ca9a15b61536899', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', 'D6BC7342-1CF1-4EC6-816C-6D53F9A5191B', 1111),
(30, '4e732ced3463d06de0ca9a15b615368100', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', '80B0F0FD-B148-4C02-AFC7-7463D856714A', 1111),
(31, '4e732ced3463d06de0ca9a15b615368101', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', '80B0F0FD-B148-4C02-AFC7-7463D856714Ass', 1111),
(32, '4e732ced3463d06de0ca9a15b615368102', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', 'D33AF5EF-570D-403D-B967-A5B658675B06', 1111),
(33, '4e732ced3463d06de0ca9a15b615368103', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', '9252FCEE-011A-425A-BB41-E9D5A5E7792A', 1111),
(34, '4e732ced3463d06de0ca9a15b615368104', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', '5464B2EF-92D2-4430-B366-983D7590FFC4', 1111),
(35, '4e732ced3463d06de0ca9a15b615368105', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', '23B67A1A-0675-4DE9-98E3-7ACFA6637F25', 1111),
(36, '4e732ced3463d06de0ca9a15b615368106', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', 'DA79AE6E-7D46-4BB4-AD47-CD37F5BBB615', 1111),
(37, '4e732ced3463d06de0ca9a15b615368107', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', '3AAFF903-73E6-4987-BFE1-8F24E268BDC9', 1111),
(38, '4e732ced3463d06de0ca9a15b615368108', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', 'B299A7BB-7709-4B0B-966E-023F1CA77058', 1111),
(39, '4e732ced3463d06de0ca9a15b615368109', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', 'B499A7BB-8709-4B0B-966E-023F1CA77058', 1111),
(40, '4e732ced3463d06de0ca9a15b6153681010', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', 'B499A7BB-7709-4B0B-966E-023F1CA77057', 1111),
(41, '4e732ced3463d06de0ca9a15b6153681011', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '1ff1de774005f8da13f42943881c655f', '892367F9-98AC-47B2-B6B7-C9268EBFFE87', 1111),
(42, '4e732ced3463d06de0ca9a15b6153681012', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '1ff1de774005f8da13f42943881c655f', 'FF2CD316-E154-4A6E-8A7E-6514365242EE', 1111),
(43, '4e732ced3463d06de0ca9a15b6153681013', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '1ff1de774005f8da13f42943881c655f', '92ECECEE-9484-4941-BA0F-28EC165E4FF8', 1111),
(44, '4e732ced3463d06de0ca9a15b6153681014', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '1ff1de774005f8da13f42943881c655f', '60715722-A689-412B-A13F-ECA29FF19523', 1111),
(45, '4e732ced3463d06de0ca9a15b6153681015', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '1ff1de774005f8da13f42943881c655f', 'FAECB8C6-1AFE-44E8-A654-087A43A93FFB', 1111),
(46, '4e732ced3463d06de0ca9a15b6153681016', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '1ff1de774005f8da13f42943881c655f', 'B3A03076-14E9-4C0A-9B13-4F8DF9D6145D', 1111),
(47, '4e732ced3463d06de0ca9a15b6153681017', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '1ff1de774005f8da13f42943881c655f', 'CAB43E25-264E-47B7-84D8-1E41583CA69E', 1111),
(48, '4e732ced3463d06de0ca9a15b6153681018', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '1ff1de774005f8da13f42943881c655f', 'C0920814-A3DE-48A1-8825-928D32BE0B1E', 1111),
(49, '4e732ced3463d06de0ca9a15b6153681019', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '1ff1de774005f8da13f42943881c655f', 'D6BC7342-1CF1-4EC6-816C-6D53F9A5191B', 1111),
(50, '4e732ced3463d06de0ca9a15b6153681020', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '1ff1de774005f8da13f42943881c655f', '80B0F0FD-B148-4C02-AFC7-7463D856714A', 1111),
(51, '4e732ced3463d06de0ca9a15b6153681021', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '1ff1de774005f8da13f42943881c655f', '80B0F0FD-B148-4C02-AFC7-7463D856714Ass', 1111),
(52, '4e732ced3463d06de0ca9a15b6153681022', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '1ff1de774005f8da13f42943881c655f', 'D33AF5EF-570D-403D-B967-A5B658675B06', 1111),
(53, '4e732ced3463d06de0ca9a15b6153681023', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '1ff1de774005f8da13f42943881c655f', '9252FCEE-011A-425A-BB41-E9D5A5E7792A', 1111),
(54, '4e732ced3463d06de0ca9a15b6153681024', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '1ff1de774005f8da13f42943881c655f', '5464B2EF-92D2-4430-B366-983D7590FFC4', 1111),
(55, '4e732ced3463d06de0ca9a15b6153681025', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '1ff1de774005f8da13f42943881c655f', '23B67A1A-0675-4DE9-98E3-7ACFA6637F25', 1111),
(56, '4e732ced3463d06de0ca9a15b6153681026', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '1ff1de774005f8da13f42943881c655f', 'DA79AE6E-7D46-4BB4-AD47-CD37F5BBB615', 1111),
(57, '4e732ced3463d06de0ca9a15b6153681027', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '1ff1de774005f8da13f42943881c655f', '3AAFF903-73E6-4987-BFE1-8F24E268BDC9', 1111),
(58, '4e732ced3463d06de0ca9a15b6153681028', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '1ff1de774005f8da13f42943881c655f', 'B299A7BB-7709-4B0B-966E-023F1CA77058', 1111),
(59, '4e732ced3463d06de0ca9a15b6153681029', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '1ff1de774005f8da13f42943881c655f', 'B499A7BB-8709-4B0B-966E-023F1CA77058', 1111),
(60, '4e732ced3463d06de0ca9a15b6153681030', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '1ff1de774005f8da13f42943881c655f', 'B499A7BB-7709-4B0B-966E-023F1CA77057', 1111),
(61, '4e732ced3463d06de0ca9a15b6153681031', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '37693cfc748049e45d87b8c7d8b9aacd', '892367F9-98AC-47B2-B6B7-C9268EBFFE87', 1111),
(62, '4e732ced3463d06de0ca9a15b6153681032', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '37693cfc748049e45d87b8c7d8b9aacd', 'FF2CD316-E154-4A6E-8A7E-6514365242EE', 1111),
(63, '4e732ced3463d06de0ca9a15b6153681033', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '37693cfc748049e45d87b8c7d8b9aacd', '92ECECEE-9484-4941-BA0F-28EC165E4FF8', 1111),
(64, '4e732ced3463d06de0ca9a15b6153681034', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '37693cfc748049e45d87b8c7d8b9aacd', '60715722-A689-412B-A13F-ECA29FF19523', 1111),
(65, '4e732ced3463d06de0ca9a15b6153681035', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '37693cfc748049e45d87b8c7d8b9aacd', 'FAECB8C6-1AFE-44E8-A654-087A43A93FFB', 1111),
(66, '4e732ced3463d06de0ca9a15b6153681036', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '37693cfc748049e45d87b8c7d8b9aacd', 'B3A03076-14E9-4C0A-9B13-4F8DF9D6145D', 1111),
(67, '4e732ced3463d06de0ca9a15b6153681037', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '37693cfc748049e45d87b8c7d8b9aacd', 'CAB43E25-264E-47B7-84D8-1E41583CA69E', 1111),
(68, '4e732ced3463d06de0ca9a15b6153681038', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '37693cfc748049e45d87b8c7d8b9aacd', 'C0920814-A3DE-48A1-8825-928D32BE0B1E', 1111),
(69, '4e732ced3463d06de0ca9a15b6153681039', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '37693cfc748049e45d87b8c7d8b9aacd', 'D6BC7342-1CF1-4EC6-816C-6D53F9A5191B', 1111),
(70, '404e732ced3463d06de0ca9a15b61536810', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '37693cfc748049e45d87b8c7d8b9aacd', '80B0F0FD-B148-4C02-AFC7-7463D856714A', 1111),
(71, '4e732ced3463d06de0ca9a15b6153681040', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '37693cfc748049e45d87b8c7d8b9aacd', '80B0F0FD-B148-4C02-AFC7-7463D856714Ass', 1111),
(72, '4e732ced3463d06de0ca9a15b6153681041', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '37693cfc748049e45d87b8c7d8b9aacd', 'D33AF5EF-570D-403D-B967-A5B658675B06', 1111),
(73, '4e732ced3463d06de0ca9a15b6153681042', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '37693cfc748049e45d87b8c7d8b9aacd', '9252FCEE-011A-425A-BB41-E9D5A5E7792A', 1111),
(74, '4e732ced3463d06de0ca9a15b6153681043', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '37693cfc748049e45d87b8c7d8b9aacd', '5464B2EF-92D2-4430-B366-983D7590FFC4', 1111),
(75, '4e732ced3463d06de0ca9a15b6153681044', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '37693cfc748049e45d87b8c7d8b9aacd', '23B67A1A-0675-4DE9-98E3-7ACFA6637F25', 1111),
(76, '4e732ced3463d06de0ca9a15b6153681045', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '37693cfc748049e45d87b8c7d8b9aacd', 'DA79AE6E-7D46-4BB4-AD47-CD37F5BBB615', 1111),
(77, '4e732ced3463d06de0ca9a15b6153681046', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '37693cfc748049e45d87b8c7d8b9aacd', '3AAFF903-73E6-4987-BFE1-8F24E268BDC9', 1111),
(78, '4e732ced3463d06de0ca9a15b6153681047', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '37693cfc748049e45d87b8c7d8b9aacd', 'B299A7BB-7709-4B0B-966E-023F1CA77058', 1111),
(79, '4e732ced3463d06de0ca9a15b6153681048', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '37693cfc748049e45d87b8c7d8b9aacd', 'B499A7BB-8709-4B0B-966E-023F1CA77058', 1111),
(80, '4e732ced3463d06de0ca9a15b6153681049', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '37693cfc748049e45d87b8c7d8b9aacd', 'B499A7BB-7709-4B0B-966E-023F1CA77057', 1111),
(81, '4e732ced3463d06de0ca9a15b6153681050', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'b6d767d2f8ed5d21a44b0e5886680cb9', '892367F9-98AC-47B2-B6B7-C9268EBFFE87', 1111),
(82, '4e732ced3463d06de0ca9a15b6153681051', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'b6d767d2f8ed5d21a44b0e5886680cb9', 'FF2CD316-E154-4A6E-8A7E-6514365242EE', 1111),
(83, '4e732ced3463d06de0ca9a15b6153681052', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'b6d767d2f8ed5d21a44b0e5886680cb9', '92ECECEE-9484-4941-BA0F-28EC165E4FF8', 1111),
(84, '4e732ced3463d06de0ca9a15b6153681053', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'b6d767d2f8ed5d21a44b0e5886680cb9', '60715722-A689-412B-A13F-ECA29FF19523', 1111),
(85, '4e732ced3463d06de0ca9a15b6153681054', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'b6d767d2f8ed5d21a44b0e5886680cb9', 'FAECB8C6-1AFE-44E8-A654-087A43A93FFB', 1111),
(86, '4e732ced3463d06de0ca9a15b6153681055', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'b6d767d2f8ed5d21a44b0e5886680cb9', 'B3A03076-14E9-4C0A-9B13-4F8DF9D6145D', 1111),
(87, '4e732ced3463d06de0ca9a15b6153681056', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'b6d767d2f8ed5d21a44b0e5886680cb9', 'CAB43E25-264E-47B7-84D8-1E41583CA69E', 1111),
(88, '4e732ced3463d06de0ca9a15b6153681057', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'b6d767d2f8ed5d21a44b0e5886680cb9', 'C0920814-A3DE-48A1-8825-928D32BE0B1E', 1111),
(89, '4e732ced3463d06de0ca9a15b6153681058', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'b6d767d2f8ed5d21a44b0e5886680cb9', 'D6BC7342-1CF1-4EC6-816C-6D53F9A5191B', 1111),
(90, '4e732ced3463d06de0ca9a15b6153681059', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'b6d767d2f8ed5d21a44b0e5886680cb9', '80B0F0FD-B148-4C02-AFC7-7463D856714A', 1111),
(91, '4e732ced3463d06de0ca9a15b6153681060', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'b6d767d2f8ed5d21a44b0e5886680cb9', '80B0F0FD-B148-4C02-AFC7-7463D856714Ass', 0),
(92, '4e732ced3463d06de0ca9a15b6153681061', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'b6d767d2f8ed5d21a44b0e5886680cb9', 'D33AF5EF-570D-403D-B967-A5B658675B06', 0),
(93, '4e732ced3463d06de0ca9a15b6153681062', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'b6d767d2f8ed5d21a44b0e5886680cb9', '9252FCEE-011A-425A-BB41-E9D5A5E7792A', 0),
(94, '4e732ced3463d06de0ca9a15b6153681063', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'b6d767d2f8ed5d21a44b0e5886680cb9', '5464B2EF-92D2-4430-B366-983D7590FFC4', 0),
(95, '4e732ced3463d06de0ca9a15b6153681064', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'b6d767d2f8ed5d21a44b0e5886680cb9', '23B67A1A-0675-4DE9-98E3-7ACFA6637F25', 0),
(96, '4e732ced3463d06de0ca9a15b6153681065', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'b6d767d2f8ed5d21a44b0e5886680cb9', 'DA79AE6E-7D46-4BB4-AD47-CD37F5BBB615', 0),
(97, '4e732ced3463d06de0ca9a15b6153681066', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'b6d767d2f8ed5d21a44b0e5886680cb9', '3AAFF903-73E6-4987-BFE1-8F24E268BDC9', 0),
(98, '4e732ced3463d06de0ca9a15b6153681067', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'b6d767d2f8ed5d21a44b0e5886680cb9', 'B299A7BB-7709-4B0B-966E-023F1CA77058', 0),
(99, '4e732ced3463d06de0ca9a15b6153681068', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'b6d767d2f8ed5d21a44b0e5886680cb9', 'B499A7BB-8709-4B0B-966E-023F1CA77058', 0),
(100, '4e732ced3463d06de0ca9a15b6153681069', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'b6d767d2f8ed5d21a44b0e5886680cb9', 'B499A7BB-7709-4B0B-966E-023F1CA77057', 0),
(101, '4e732ced3463d06de0ca9a15b615368100', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', 'CAB43E25-264TYE-47B7-84D8-1E41583CA69E', 1111),
(102, '4e732ced3463d06de0ca9a15b6153681001', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '1ff1de774005f8da13f42943881c655f', 'CAB43E25-264TYE-47B7-84D8-1E41583CA69E', 1111),
(103, '4e732ced3463d06de0ca9a15b615368100', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '37693cfc748049e45d87b8c7d8b9aacd', 'CAB43E25-264TYE-47B7-84D8-1E41583CA69E', 1111),
(104, '410989e732ced3463d06de0ca9a15b615368100', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', 'D33AF9080F-570D-403D-B967-A5B658675B0645', 1111),
(105, '478732ced3463d06de0ca9a15b6153681001', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '1ff1de774005f8da13f42943881c655f', 'D33AF9080F-570D-403D-B967-A5B658675B0645', 1111),
(106, '412732ced3463d06de0ca9a15b615368100', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '37693cfc748049e45d87b8c7d8b9aacd', 'D33AF9080F-570D-403D-B967-A5B658675B0645', 1111),
(107, '410989e732ced3463d06de0ca9a15b615368100', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', '4C020FD-B148-4C02-AFC7-7463D856714A', 1111),
(108, '478732ced3463d06de0ca9a15b6153681001', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '1ff1de774005f8da13f42943881c655f', '4C020FD-B148-4C02-AFC7-7463D856714A', 1111),
(109, '412732ced3463d06de0ca9a15b615368100', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '37693cfc748049e45d87b8c7d8b9aacd', '4C020FD-B148-4C02-AFC7-7463D856714A', 1111),
(110, '410989e732ced3463d06de0ca9a15b615368100', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', 'B499A7BB-8709-023F-4B0B-966E-023F1CA77058-023', 111),
(111, '456678732ced3463d06de0ca9a15b6153681001', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '1ff1de774005f8da13f42943881c655f', 'B499A7BB-8709-023F-4B0B-966E-023F1CA77058-023', 111),
(112, '412732HYU-8983463d06de0ca9a15b615368100', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '37693cfc748049e45d87b8c7d8b9aacd', 'B499A7BB-8709-023F-4B0B-966E-023F1CA77058-023', 111),
(113, '410989e732YHYUced3463d06de0ca9a15b615368100', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', 'B499A7TWV889-7H8FSG-8709-023F-4B0B-966E-023F1CA77058-023', 111),
(114, '456678732ced76876HFHgfh463d06de0ca9a15b6153681001', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '1ff1de774005f8da13f42943881c655f', 'B499A7TWV889-7H8FSG-8709-023F-4B0B-966E-023F1CA77058-023', 111),
(115, '412732HYU-8983463d06de0ca9a15b615368100-68768ghgjh', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '37693cfc748049e45d87b8c7d8b9aacd', 'B499A7TWV889-7H8FSG-8709-023F-4B0B-966E-023F1CA77058-023', 111),
(116, '410989e-4B0B-4B0B-7709-4B0B-966E-023F1CA-4B0B', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', '4B0B-4B0B-7709-4B0B-966E-023F1CA-4B0B', 1111),
(117, '456678732ced76874B0B-4B0B-7709-4B0B-966E-023F1CA-4B0B', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '1ff1de774005f8da13f42943881c655f', '4B0B-4B0B-7709-4B0B-966E-023F1CA-4B0B', 111),
(118, '4B0B-4B0B-7709-4B0B-966E-023F1CA-4B0B0-68768ghgjh', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '37693cfc748049e45d87b8c7d8b9aacd', '4B0B-4B0B-7709-4B0B-966E-023F1CA-4B0B', 111),
(119, '410989e-ddaf13095cf7472c4df9ab7ef547311e', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', 'ddaf13095cf7472c4df9ab7ef547311e', 1111),
(120, '456678732ddaf13095cf7472c4df9ab7ef547311e-023F1CA-4B0B', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '1ff1de774005f8da13f42943881c655f', 'ddaf13095cf7472c4df9ab7ef547311e', 111),
(121, 'ddaf13095cf7472c4df9ab7ef547311ecf7472c4df9ab7ef547311e', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '37693cfc748049e45d87b8c7d8b9aacd', '4B0B-4B0B-7709-4B0B-966E-023F1CA-4B0B', 111),
(122, '410989e-ddaf13095cf7248797adf02e132ba3c51da343bbfd4', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', '7248797adf02e132ba3c51da343bbfd4', 1111),
(123, '4566787248797adf02e132ba3c51da343bbfd4A-4B0B', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '7248797adf02e132ba3c51da343bbfd4', 'ddaf13095cf7472c4df9ab7ef547311e', 111),
(124, 'ddaf130957248797adf02e132ba3c51da343bbfd4', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '37693cfc748049e45d87b8c7d8b9aacd', '7248797adf02e132ba3c51da343bbfd4', 111),
(125, '5d6caaab9ffe66d750293aedae946da64', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', '5d6caaab9ffe66d750293aedae946da6', 1111),
(126, '4566785d6caaab9ffe66d750293aedae946da6', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '7248797adf02e132ba3c51da343bbfd4', '5d6caaab9ffe66d750293aedae946da6', 111),
(127, 'ddaf15d6caaab9ffe66d750293aedae946da6bfd4', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '37693cfc748049e45d87b8c7d8b9aacd', '5d6caaab9ffe66d750293aedae946da6', 111),
(128, '5d6cabcfc52307913f851ded416c9283a6826', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', 'bcfc52307913f851ded416c9283a6826', 1111),
(129, 'bcfc52307913f851ded416c9283a6826946da6', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '7248797adf02e132ba3c51da343bbfd4', 'bcfc52307913f851ded416c9283a6826', 111),
(130, 'ddaf15bcfc52307913f851ded416c9283a6826a6bfd4', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '37693cfc748049e45d87b8c7d8b9aacd', 'bcfc52307913f851ded416c9283a6826', 111),
(131, '5d6cfe36bb26e7b7b0499d22f87ebeee343c', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', 'fe36bb26e7b7b0499d22f87ebeee343c', 1111),
(132, '5d6cfe36bb26e7b7b0499d22f87ebeee343c', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', '5ac1b200480113f66b9e38e2387b0840', 1111),
(133, '5d6cfe36bb26e7b7b0499d22f87ebeee343c', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', '5ac1fe36bb26e7b7b049387b0840', 1111),
(134, '5d6cfe36bb26e7b7b0499d22f87ebeee343c', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', '5ac1fe36bb26e7b7b5ac1fe36bb26e7b7b049387b0840', 1111),
(135, '5d6cfe36bb26e5ac1fe4C020FD-B148-4C02-AFC7-7463D856714A7b0840', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', '5ac1fe4C020FD-B148-4C02-AFC7-7463D856714A7b0840', 1111),
(136, '5d-B148-4C02-AFC7-7463D856714A63D856714A7b08403D856714A7b0840', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', '-B148-4C02-AFC7-7463D856714A63D856714A7b0840', 1111),
(137, '7227e29d3bb56bd72c032ca4a', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', '7227e29d3bb56bd72c032ca4a650f936', 1111),
(138, '72506e87d5b970aa58260e534531c867f2', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', '506e87d5b970aa58260e534531c867f2', 1111),
(139, '72d04f7130b0e16554b6f87751b3d7eaae7f2', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', 'd04f7130b0e16554b6f87751b3d7eaae', 1111),
(140, '72d04f7130b0e16554b6f87751b3d7eaae7f2', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', '7227e29d3bb56bd7B148-4C02-AFCB148-4C02-AFC', 1111),
(141, '72d04f7dd9a1981f3fea7bf472c4df99a1981f3fea7bf4', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '8e296a067a37563370ded05f5a3bf3ec', 'dd9a1981f3fea7bf472c4df99a1981f3fea7bf4', 1111);

-- --------------------------------------------------------

--
-- Table structure for table `opening_stock`
--

CREATE TABLE IF NOT EXISTS `opening_stock` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `date` int(11) NOT NULL,
  `remark` varchar(300) NOT NULL,
  `note` varchar(300) NOT NULL,
  `no_items` int(11) NOT NULL,
  `total_amount` decimal(30,3) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `stock_status` int(11) NOT NULL DEFAULT '0',
  `branch_id` varchar(255) NOT NULL,
  `deleted_by` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `opening_stock`
--

INSERT INTO `opening_stock` (`id`, `guid`, `code`, `date`, `remark`, `note`, `no_items`, `total_amount`, `active_status`, `delete_status`, `stock_status`, `branch_id`, `deleted_by`, `added_by`) VALUES
(25, 'f4206a8912721c53b84894ee83a02900', 'OS18', 1400112000, 'bxcbxc', 'xcvbx', 1, '45450.000', 1, 0, 1, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(26, '063c5a4037dab38c58120c140d340eb1', 'OS19', 1400198400, 'xcvbxcbb', 'xcv', 1, '45900.000', 1, 0, 1, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(27, '795824c2f99079b55823b8d6f388a550', 'OS20', 1400198400, 'safasf', 'asf', 4, '15642.000', 1, 0, 1, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4');

-- --------------------------------------------------------

--
-- Table structure for table `opening_stock_x_items`
--

CREATE TABLE IF NOT EXISTS `opening_stock_x_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) NOT NULL,
  `opening_stock_id` varchar(255) NOT NULL,
  `stock_id` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `quty` int(11) NOT NULL,
  `cost` decimal(30,3) NOT NULL,
  `sell` decimal(30,3) NOT NULL,
  `discount_per` decimal(30,3) NOT NULL,
  `discount_amount` decimal(30,3) NOT NULL,
  `tax` decimal(30,3) NOT NULL,
  `amount` decimal(30,3) NOT NULL,
  `supplier_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `opening_stock_x_items`
--

INSERT INTO `opening_stock_x_items` (`id`, `guid`, `opening_stock_id`, `stock_id`, `item`, `quty`, `cost`, `sell`, `discount_per`, `discount_amount`, `tax`, `amount`, `supplier_id`) VALUES
(38, '3c2e2d7e4f8642ff6d668017e8f5a116', 'f4206a8912721c53b84894ee83a02900', '', '9d8439c7f35923f2397af1b7edadc670', 1000, '45.000', '676.000', '1.000', '450.000', '900.000', '45000.000', 'ceab8c7d14f12aaeec1dc19b3d81212a'),
(39, '8671719b870ef46cff4f744c4b2f4392', '063c5a4037dab38c58120c140d340eb1', '', '9d8439c7f35923f2397af1b7edadc670', 1000, '45.000', '676.000', '0.000', '0.000', '900.000', '45000.000', 'ceab8c7d14f12aaeec1dc19b3d81212a'),
(40, 'a9dc73b348cb6ca3d6059951497d9d0c', '795824c2f99079b55823b8d6f388a550', '', 'c3216f7d74d4adcf50901b8559d9a3bc', 100, '45.000', '60.000', '1.000', '45.000', '2520.000', '4500.000', 'ceab8c7d14f12aaeec1dc19b3d81212a'),
(41, '2e0ead641065c8a91a1dd8ca204d8394', '795824c2f99079b55823b8d6f388a550', '', 'abc049b9d095c27843b114f02ac5f640', 100, '56.000', '75.000', '1.000', '56.000', '0.000', '5600.000', 'ceab8c7d14f12aaeec1dc19b3d81212a'),
(42, '1ec2eb002fec664d670a58e991de9f6c', '795824c2f99079b55823b8d6f388a550', '', 'ef92a1dc9701ac89a655927183a78d87', 100, '12.000', '15.000', '1.000', '12.000', '0.000', '1200.000', 'ceab8c7d14f12aaeec1dc19b3d81212a'),
(43, 'fd1a497f416a93fa64248f5b1864f1f4', '795824c2f99079b55823b8d6f388a550', '', '23b6fb71c13f7a53235835584c0a600f', 100, '45.000', '48.000', '1.000', '45.000', '0.000', '4500.000', 'ceab8c7d14f12aaeec1dc19b3d81212a');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) NOT NULL,
  `code` varchar(100) NOT NULL,
  `branch_id` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL,
  `payment_date` int(20) NOT NULL,
  `supplier_id` varchar(255) NOT NULL,
  `payable_id` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `amount` decimal(55,3) NOT NULL,
  `memo` varchar(300) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `added_date` int(20) NOT NULL,
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `deleted_by` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `guid`, `code`, `branch_id`, `type`, `payment_date`, `supplier_id`, `payable_id`, `customer_id`, `amount`, `memo`, `added_by`, `added_date`, `delete_status`, `deleted_by`) VALUES
(10, 'dca4ad10f9dd67ecc96454fd8ef771b2', 'IN-11', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'debit', 1396396800, 'e91054c7db987e18f232ffa506f49394', '31703fb131703fb1f5e686252aac3fa238943d10a238943d10', '', '1000000.000', '0', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 1396310400, 0, ''),
(11, '3d797eafee0b351d5b0c3c3d57e1bc04', 'IN-11', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'debit', 1396396800, 'e91054c7db987e18f232ffa506f49394', '31703fb131703fb1f5e686252aac3fa238943d10a238943d10', '', '1000.000', '0', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 1396310400, 0, ''),
(12, 'd3106758d6d42699f7a0225beef354e5', 'IN-12', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'debit', 1396310400, 'e91054c7db987e18f232ffa506f49394', '31703fb131703fb1f5e686252aac3fa238943d10a238943d10', '', '1000.000', '0', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 1396310400, 0, ''),
(13, '586a8a968936d18c0efcbd410ec642cc', 'IN-13', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'debit', 1396396800, 'e91054c7db987e18f232ffa506f49394', '31703fb131703fb1f5e686252aac3fa238943d10a238943d10', '', '500.000', '0', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 1396310400, 1, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(14, '625e22be566d3f986b0421209d3f6fd0', 'IN-14', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'debit', 1396396800, 'e91054c7db987e18f232ffa506f49394', '31703fb131703fb1f5e686252aac3fa238943d10a238943d10', '', '1.000', 'test', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 1396310400, 1, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(15, '2fc11ae9b9e262dff1293709a34e6c5d', 'IN-15', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'debit', 1396396800, 'e91054c7db987e18f232ffa506f49394', '31703fb131703fb1f5e686252aac3fa238943d10a238943d10', '', '1.000', 'test', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 1396310400, 1, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(16, '079d3ac03edd616a3ea136bb3cd9f89b', 'IN-16', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'debit', 1399766400, 'e91054c7db987e18f232ffa506f49394', '31703fb131703fb1f5e686252aac3fa238943d10a238943d10', '', '10.000', 'zxvcz', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 1399680000, 0, ''),
(17, '4019e30748b7e2e6b0d05ea71afea56c', 'CP-149', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'credit', 1368576000, '', '3683b8421c7215cd9658c1dd47b13fe0', '63aba6eb627ce1811191c2d22399191d', '1000.000', 'oioi', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 1399766400, 0, ''),
(18, '80cd85c1aa99019a962dd4e2d9dbfb6d', 'CP-150', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'credit', 1399852800, '', '3683b8421c7215cd9658c1dd47b13fe0', '63aba6eb627ce1811191c2d22399191d', '1000.000', 'jibhui', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 1399766400, 0, ''),
(19, 'ff3cdb9e51247dddf7a078cf3c8dd868', 'CP-151', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'credit', 1399852800, '', 'a8ea84f9bcd49b7d6377abfda6b74fd2', '63aba6eb627ce1811191c2d22399191d', '1.000', 'asf', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 1399766400, 0, ''),
(20, '8ae0b68c515126ea6f09488f6b5aeb59', 'CP-152', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'credit', 1399939200, '', 'a8ea84f9bcd49b7d6377abfda6b74fd2', '63aba6eb627ce1811191c2d22399191d', '1000.000', 'afaf', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 1399766400, 0, ''),
(21, '55e81590821f08d59fde12bbedd13af3', 'CP-153', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'credit', 1399852800, '', '3683b8421c7215cd9658c1dd47b13fe0', '63aba6eb627ce1811191c2d22399191d', '4000.000', 'afaf', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 1399766400, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_invoice`
--

CREATE TABLE IF NOT EXISTS `purchase_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(200) NOT NULL,
  `invoice` varchar(200) NOT NULL,
  `date` int(20) NOT NULL,
  `grn` varchar(255) NOT NULL,
  `po` varchar(255) NOT NULL,
  `supplier_id` varchar(255) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `note` varchar(200) NOT NULL,
  `branch_id` varchar(200) NOT NULL,
  `added_by` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=99 ;

--
-- Dumping data for table `purchase_invoice`
--

INSERT INTO `purchase_invoice` (`id`, `guid`, `invoice`, `date`, `grn`, `po`, `supplier_id`, `remark`, `note`, `branch_id`, `added_by`) VALUES
(96, 'ae6e03d1a3eb5a4a9e9ec6a7876ca486', 'INV-101112', 1396396800, '66077ccc98dd6f48c5c1d86cfdf2c6a0', 'be0e9618297967699deb19956c7567cc', 'non', 'test', 'test ', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(97, '6884ef831670ce6763513cb06a9cb7ec', 'INV-101113', 1396396800, '79efc18f745fc643d7dc23707f3f8765', 'non', 'e91054c7db987e18f232ffa506f49394', 'fasfasf', 'asf', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(98, '7426a6fc2562fef9f209621700390c23', 'INV-101114', 1396483200, '04b001ab9819480c1dda47da769652b0', 'non', 'e91054c7db987e18f232ffa506f49394', 'sdgsdg', 'sdfsd', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_invoice_items`
--

CREATE TABLE IF NOT EXISTS `purchase_invoice_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(200) NOT NULL,
  `invoice_id` varchar(200) NOT NULL,
  `branch_id` varchar(200) NOT NULL,
  `item` varchar(200) NOT NULL,
  `quty` varchar(100) NOT NULL,
  `free` varchar(100) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `sell` varchar(100) NOT NULL,
  `mrp` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `date` int(39) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `deleted_by` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE IF NOT EXISTS `purchase_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(200) NOT NULL,
  `supplier_id` varchar(200) NOT NULL,
  `exp_date` int(20) NOT NULL,
  `po_no` varchar(200) NOT NULL,
  `po_date` int(20) NOT NULL,
  `discount` varchar(200) NOT NULL,
  `discount_amt` varchar(200) NOT NULL,
  `freight` varchar(200) NOT NULL,
  `round_amt` varchar(200) NOT NULL,
  `total_items` varchar(200) NOT NULL,
  `total_amt` varchar(200) NOT NULL,
  `total_item_amt` varchar(200) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `note` varchar(200) NOT NULL,
  `order_cancel` int(11) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `order_status` int(11) NOT NULL,
  `grn_status` int(11) NOT NULL,
  `received_status` int(11) NOT NULL,
  `expire_status` int(11) NOT NULL,
  `branch_id` varchar(200) NOT NULL,
  `added_by` varchar(200) NOT NULL,
  `deleted_by` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`id`, `guid`, `supplier_id`, `exp_date`, `po_no`, `po_date`, `discount`, `discount_amt`, `freight`, `round_amt`, `total_items`, `total_amt`, `total_item_amt`, `remark`, `note`, `order_cancel`, `active_status`, `delete_status`, `order_status`, `grn_status`, `received_status`, `expire_status`, `branch_id`, `added_by`, `deleted_by`) VALUES
(28, 'be0e9618297967699deb19956c7567cc', 'e91054c7db987e18f232ffa506f49394', 1396396800, 'POSNIC-1059', 1396396800, '1', '203.05111', '10', '10', '4', '20122.060', '20305.111', 'asfasf', 'afa', 0, 1, 0, 1, 1, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(29, 'c230b3b496df0af079a8e5a1a393bb26', 'e91054c7db987e18f232ffa506f49394', 1396483200, 'POSNIC-1061', 1396483200, '', '', '', '', '3', '67803.362', '67803.36200000001', 'test', 'test ', 0, 1, 0, 1, 0, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_items`
--

CREATE TABLE IF NOT EXISTS `purchase_order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(200) DEFAULT NULL,
  `order_id` varchar(200) NOT NULL,
  `branch_id` varchar(200) NOT NULL,
  `item` varchar(200) NOT NULL,
  `quty` varchar(100) NOT NULL,
  `received_quty` decimal(55,0) NOT NULL,
  `received_free` decimal(10,0) NOT NULL,
  `free` varchar(100) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `sell` varchar(100) NOT NULL,
  `mrp` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `discount_per` decimal(55,0) NOT NULL,
  `discount_amount` decimal(55,0) NOT NULL,
  `tax` decimal(55,0) NOT NULL,
  `date` int(39) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `deleted_by` varchar(200) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=171 ;

--
-- Dumping data for table `purchase_order_items`
--

INSERT INTO `purchase_order_items` (`id`, `guid`, `order_id`, `branch_id`, `item`, `quty`, `received_quty`, `received_free`, `free`, `cost`, `sell`, `mrp`, `amount`, `discount_per`, `discount_amount`, `tax`, `date`, `active`, `active_status`, `delete_status`, `deleted_by`, `added_by`) VALUES
(164, '4e76e83edcaf7d910fb7297065207ef2', 'be0e9618297967699deb19956c7567cc', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'c3216f7d74d4adcf50901b8559d9a3bc', '89', '89', '89', '89', '90.899', '92.909', '98.000', '8090.011', '1', '81', '4126', 0, 1, 1, 0, '', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(165, 'a873dae267447ed4455724520f1304d1', 'be0e9618297967699deb19956c7567cc', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'abc049b9d095c27843b114f02ac5f640', '78', '78', '78', '78', '56', '75', '78', '4368', '0', '10', '2228', 0, 1, 1, 0, '', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(166, '29030ab1df86052341630866f1e0b76f', 'be0e9618297967699deb19956c7567cc', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '9d8439c7f35923f2397af1b7edadc670', '090', '90', '90', '90', '45', '676', '967', '4050', '0', '0', '2268', 0, 1, 1, 0, '', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(167, '4ee617a28172391dffd09e5bc5b84d3f', 'be0e9618297967699deb19956c7567cc', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'c709663a0324fb6175b807eb730de052', '90', '90', '90', '90', '12', '30', '34', '1080', '1', '11', '551', 0, 1, 1, 0, '', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(168, '62d51fa356e80fecfbe1473777185a66', 'c230b3b496df0af079a8e5a1a393bb26', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'c3216f7d74d4adcf50901b8559d9a3bc', '7', '0', '0', '9', '90.899', '92.909', '98.000', '8908.102', '0', '10', '4989', 0, 1, 1, 0, '', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(169, '57f803986def47bab354e8699ee2cd43', 'c230b3b496df0af079a8e5a1a393bb26', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'abc049b9d095c27843b114f02ac5f640', '989', '0', '0', '89', '56', '75', '78', '55384', '1', '554', '0', 0, 1, 1, 0, '', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(170, '23163f8eb77f5beb1be5e185e7fffb9d', 'c230b3b496df0af079a8e5a1a393bb26', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '9d8439c7f35923f2397af1b7edadc670', '79', '0', '0', '79', '45', '676', '967', '4005', '0', '10', '80', 0, 1, 1, 0, '', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4');

-- --------------------------------------------------------

--
-- Table structure for table `sales_bill`
--

CREATE TABLE IF NOT EXISTS `sales_bill` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `date` int(20) NOT NULL,
  `so` varchar(255) NOT NULL,
  `sdn` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `remark` varchar(500) NOT NULL,
  `note` varchar(500) NOT NULL,
  `branch_id` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `sales_bill`
--

INSERT INTO `sales_bill` (`id`, `guid`, `invoice`, `date`, `so`, `sdn`, `customer_id`, `remark`, `note`, `branch_id`, `added_by`) VALUES
(17, 'c1dcba4814bababded50e7582a0f41ca', 'SB-142', 1399507200, '157f6a0379a255f513d8e07f07ae2ac9', '29b131708ed704536c4bdf932ab753b7', '0f7c80352b128f9a45d25e42d1ebd19e', 'afs', 'asf', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(18, '7f9f4229d08269b40d706b8c2999eb93', 'SB-143', 1399507200, 'non', 'f973f4b02a6ba52ff6ebbc85242baf26', '0f7c80352b128f9a45d25e42d1ebd19e', 'fa', 'fa', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(19, 'f7f5e074b91d026df32d1dcaee2f5eeb', 'SB-144', 1399507200, 'non', '95f12b4ba62352fa8be86cd51608544e', '0f7c80352b128f9a45d25e42d1ebd19e', 'sd', 'sd', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(20, '2041db85b6187d7cf7659b871c773da9', 'SB-145', 1399680000, 'abd965a30fa0c90b8e9c37811c0d114d', 'fe41305f709e3d168ab53bd2ffad09fe', '63aba6eb627ce1811191c2d22399191d', 'dsg', 'sd', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(21, 'e5a1f262738bc273ffb886f3563ba64c', 'SB-146', 1399680000, 'non', '48090dc1ed36620492650837054b13b7', '63aba6eb627ce1811191c2d22399191d', 'asfas', 'asf', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(22, 'de3a8068fb7f8e0320b0a3e8f0689214', 'SB-146', 1399680000, 'non', '48090dc1ed36620492650837054b13b7', '63aba6eb627ce1811191c2d22399191d', 'asfas', 'asf', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(23, '5e2f5f6a085a04bd07c54d1ceca42f25', 'SB-147', 1399766400, '9aff11fb2081fc531636c6b3e1829cd4', 'dab06bbaee0a97d1a46781b7590ff78e', '63aba6eb627ce1811191c2d22399191d', 'fasfa', 'af', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(24, '00f230a2898e6c193b03fabfcbabd990', 'SB-147', 1399766400, '9aff11fb2081fc531636c6b3e1829cd4', 'dab06bbaee0a97d1a46781b7590ff78e', '63aba6eb627ce1811191c2d22399191d', 'fasfa', 'af', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(25, '40fda2a053bc4aaaae18999220c22ea0', 'SB-147', 1399766400, '9aff11fb2081fc531636c6b3e1829cd4', 'dab06bbaee0a97d1a46781b7590ff78e', '63aba6eb627ce1811191c2d22399191d', 'fasfa', 'af', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4');

-- --------------------------------------------------------

--
-- Table structure for table `sales_delivery_note`
--

CREATE TABLE IF NOT EXISTS `sales_delivery_note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) DEFAULT NULL,
  `branch_id` varchar(255) NOT NULL,
  `so` varchar(255) NOT NULL,
  `sales_delivery_note_no` varchar(255) NOT NULL,
  `date` int(20) NOT NULL,
  `total_amount` decimal(20,3) NOT NULL,
  `customer_discount` decimal(30,3) NOT NULL,
  `customer_discount_amount` decimal(30,3) NOT NULL,
  `note` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `sales_delivery_note_status` int(11) NOT NULL,
  `bill_status` int(11) NOT NULL DEFAULT '0',
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `added_by` varchar(255) NOT NULL,
  `deleted_by` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `sales_delivery_note`
--

INSERT INTO `sales_delivery_note` (`id`, `guid`, `branch_id`, `so`, `sales_delivery_note_no`, `date`, `total_amount`, `customer_discount`, `customer_discount_amount`, `note`, `remark`, `sales_delivery_note_status`, `bill_status`, `active_status`, `delete_status`, `added_by`, `deleted_by`) VALUES
(46, '29b131708ed704536c4bdf932ab753b7', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '157f6a0379a255f513d8e07f07ae2ac9', 'SDN-122', 1399334400, '120.000', '0.000', '0.000', 'sad', 'asfas', 1, 1, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(47, 'dab06bbaee0a97d1a46781b7590ff78e', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '9aff11fb2081fc531636c6b3e1829cd4', 'SDN-123', 1399593600, '6131.212', '1.200', '74.468', 'sdfadgs', 'sfasfsdgsd', 1, 1, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(48, 'fe41305f709e3d168ab53bd2ffad09fe', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'abd965a30fa0c90b8e9c37811c0d114d', 'SDN-124', 1399680000, '682.625', '1.000', '6.895', 'afgsd', 'afasf', 1, 1, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(49, '5f15a49ee129b90eb7e8c3a7f39177bc', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '01019bec72572b56a452509660bb7500', 'SDN-125', 1399766400, '688.003', '1.000', '0.827', 'asdfa', 'asfasf', 1, 0, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(50, 'd414bd8b0e04f4d9fe99c21f7156566d', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '01019bec72572b56a452509660bb7500', 'SDN-125', 1399766400, '682.625', '1.000', '6.895', 'asdfasdgsd', 'asfasfsd', 1, 0, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(51, '32fa117a1295fa22d3b3ffdab4bfb00d', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '527d6367ec70b6f83b39fd6ae9fb8b89', 'SDN-127', 1399593600, '688.003', '1.000', '0.827', 'sadf', 'fafa', 0, 0, 0, 1, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(52, 'c1fe513e4455874209b8d5bff2939331', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'e91363b53728abf08e46bbc0fb130e27', 'SDN-128', 1399680000, '688.003', '1.000', '0.827', 'fa', '214', 0, 0, 0, 1, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(53, '289cf05d95902e2abb61259717ab0dc0', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'f547403ad43ba922e37dcee3c4a3bf8b', 'SDN-129', 1399680000, '270.292', '2.000', '5.516', 'sdg', 'dsgsd', 1, 0, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE IF NOT EXISTS `sales_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(200) NOT NULL,
  `quotation_id` varchar(255) NOT NULL,
  `customer_id` varchar(200) NOT NULL,
  `exp_date` int(20) NOT NULL,
  `code` varchar(200) NOT NULL,
  `date` int(20) NOT NULL,
  `discount` decimal(30,3) NOT NULL,
  `discount_amt` decimal(30,3) NOT NULL,
  `customer_discount` decimal(30,3) NOT NULL,
  `customer_discount_amount` decimal(30,3) NOT NULL,
  `freight` varchar(200) NOT NULL,
  `round_amt` varchar(200) NOT NULL,
  `total_items` varchar(200) NOT NULL,
  `total_amt` varchar(200) NOT NULL,
  `total_item_amt` varchar(200) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `note` varchar(200) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `order_status` int(2) NOT NULL,
  `receipt_status` int(2) NOT NULL,
  `received_status` int(11) NOT NULL,
  `expire_status` int(11) NOT NULL,
  `branch_id` varchar(200) NOT NULL,
  `added_by` varchar(200) NOT NULL,
  `deleted_by` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`id`, `guid`, `quotation_id`, `customer_id`, `exp_date`, `code`, `date`, `discount`, `discount_amt`, `customer_discount`, `customer_discount_amount`, `freight`, `round_amt`, `total_items`, `total_amt`, `total_item_amt`, `remark`, `note`, `active_status`, `delete_status`, `order_status`, `receipt_status`, `received_status`, `expire_status`, `branch_id`, `added_by`, `deleted_by`) VALUES
(54, '5dff6bfe7cedd5059a12c094d97738cc', '', '63aba6eb627ce1811191c2d22399191d', 1399593600, 'SO-124', 1399593600, '0.000', '0.690', '0.000', '0.000', '0.000', '0.000', '1', '68.262', '68.952', 'dsgs', 'sdf', 1, 0, 1, 0, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(55, '8778395450b4e8a73068403561f0680e', '', 'ee6958cdd55bbe2225e4fec2cb6cc6ce', 1399593600, 'SO-125', 1399593600, '0.000', '7.825', '1.000', '0.000', '10', '10', '2', '794.695', '782.520', 'afaf', 'ad', 1, 0, 1, 0, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(56, 'abd965a30fa0c90b8e9c37811c0d114d', '', '63aba6eb627ce1811191c2d22399191d', 1399593600, 'SO-126', 1399593600, '0.000', '68.952', '1.000', '8.274', '', '', '1', '613.673', '689.520', 'asdas', 'sad', 1, 0, 1, 0, 1, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(57, '8e3689d3fca009ac13c3b48e60346a44', '', '63aba6eb627ce1811191c2d22399191d', 1399593600, 'SO-127', 1399593600, '0.000', '69.882', '1.000', '83.858', '10', '10', '2', '6854.460', '6988.200', 'qww', 'qw', 1, 0, 1, 0, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(58, '527d6367ec70b6f83b39fd6ae9fb8b89', 'non', '63aba6eb627ce1811191c2d22399191d', 1399593600, 'SO-128', 1399680000, '0.000', '0.690', '1.000', '0.827', '0.000', '0.000', '1', '67.435', '68.952', 'dfasfas', 'sa', 1, 0, 1, 0, 1, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(59, 'e91363b53728abf08e46bbc0fb130e27', 'non', '63aba6eb627ce1811191c2d22399191d', 1399593600, 'SO-129', 1399766400, '0.000', '0.690', '1.000', '0.827', '0.000', '0.000', '1', '67.435', '68.952', 'faf', 'af', 1, 0, 1, 0, 1, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(60, '01019bec72572b56a452509660bb7500', '78070d5987661a744b9d1799d6ea6d1f', '63aba6eb627ce1811191c2d22399191d', 1399593600, 'SO-130', 1399593600, '0.000', '0.690', '1.000', '0.827', '0.000', '0.000', '1', '67.435', '68.952', 'asfasf', 'df', 1, 0, 1, 0, 1, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(61, 'c2076bf653a5059228aa153781c118ef', 'non', '63aba6eb627ce1811191c2d22399191d', 1399593600, 'SO-131', 1399593600, '0.000', '68.952', '1.000', '82.742', '', '', '1', '6743.506', '6895.200', 'sdgsdg', 'sdf', 1, 0, 1, 0, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(62, '9aff11fb2081fc531636c6b3e1829cd4', 'non', '63aba6eb627ce1811191c2d22399191d', 1399593600, 'SO-132', 1399680000, '0.000', '0.000', '1.200', '82.742', '', '', '1', '6812.458', '6895.200', 'afaf', 'a', 1, 0, 1, 0, 1, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(63, '328d25fc656e6e8eda43698baa61028e', 'non', '0f7c80352b128f9a45d25e42d1ebd19e', 1399593600, 'SO-133', 1399593600, '0.000', '68.952', '2.000', '137.904', '', '', '1', '6688.344', '6895.200', 'afa', 'asf', 0, 1, 0, 0, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(64, '99566dbaca69d5e86cb6cea9aa80cf61', 'non', '63aba6eb627ce1811191c2d22399191d', 1399593600, 'SO-134', 1399680000, '0.000', '0.000', '1.200', '82.742', '', '', '1', '6812.458', '6895.200', 'gsdg', 'sdf', 1, 0, 1, 0, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(65, '801aa7501f77dc83cc2d53b6d5241249', 'non', '5315c17449a7324783c45ae3632f7487', 1399593600, 'SO-135', 1399593600, '0.000', '68.952', '2.000', '137.904', '', '', '1', '6688.344', '6895.200', 'gsdgsd', 'sdfgsd', 1, 0, 0, 0, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(66, 'f547403ad43ba922e37dcee3c4a3bf8b', 'non', 'compan', 1399593600, 'SO-136', 1399593600, '0.000', '0.000', '2.000', '13.790', '', '', '1', '675.730', '689.520', 'fafa', 'asf', 1, 0, 1, 0, 1, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_x_items`
--

CREATE TABLE IF NOT EXISTS `sales_order_x_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(200) DEFAULT NULL,
  `sales_order_id` varchar(200) NOT NULL,
  `item` varchar(200) NOT NULL,
  `quty` varchar(100) NOT NULL,
  `delivered_quty` int(11) NOT NULL,
  `price` decimal(55,3) NOT NULL,
  `discount` decimal(10,3) NOT NULL,
  `stock_id` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=225 ;

--
-- Dumping data for table `sales_order_x_items`
--

INSERT INTO `sales_order_x_items` (`id`, `guid`, `sales_order_id`, `item`, `quty`, `delivered_quty`, `price`, `discount`, `stock_id`) VALUES
(210, 'cc31961f5f23cd467e6609ff17841339', '5dff6bfe7cedd5059a12c094d97738cc', '9d8439c7f35923f2397af1b7edadc670', '1', 0, '676.000', '0.000', 'de7d724347f17e5349764a49f869b307'),
(211, '69d639813586be8e48d4321d70b3d5be', '8778395450b4e8a73068403561f0680e', '9d8439c7f35923f2397af1b7edadc670', '1', 0, '676.000', '0.000', 'de7d724347f17e5349764a49f869b307'),
(212, '064d4ba91ad6624a8f3c52bffd47f49a', '8778395450b4e8a73068403561f0680e', 'c3216f7d74d4adcf50901b8559d9a3bc', '1', 0, '93.000', '0.000', '92452936fa7217cd784feba1a6ad2d10'),
(213, 'd2ea081598ff43ceec2feadc39ca1eaf', 'abd965a30fa0c90b8e9c37811c0d114d', '9d8439c7f35923f2397af1b7edadc670', '1', 1, '676.000', '0.000', 'de7d724347f17e5349764a49f869b307'),
(214, '27c1ebf77d6ee8c9afddfeb959516c9e', '8e3689d3fca009ac13c3b48e60346a44', '9d8439c7f35923f2397af1b7edadc670', '10', 0, '676.000', '0.000', 'de7d724347f17e5349764a49f869b307'),
(215, '3d622443721d4c10126fe0dbdb63e611', '8e3689d3fca009ac13c3b48e60346a44', 'c3216f7d74d4adcf50901b8559d9a3bc', '1', 0, '93.000', '0.000', '92452936fa7217cd784feba1a6ad2d10'),
(216, 'cd6c6a818f6580931b8c4d5ed3e7c584', '527d6367ec70b6f83b39fd6ae9fb8b89', '9d8439c7f35923f2397af1b7edadc670', '1', 1, '676.000', '0.000', 'de7d724347f17e5349764a49f869b307'),
(217, 'b7fc712b1f66e494ec5f4e3a2fcc02e4', 'e91363b53728abf08e46bbc0fb130e27', '9d8439c7f35923f2397af1b7edadc670', '1', 1, '676.000', '0.000', 'de7d724347f17e5349764a49f869b307'),
(218, '818ed6c718aeeb0570d08b7b03e6368a', '01019bec72572b56a452509660bb7500', '9d8439c7f35923f2397af1b7edadc670', '1', 1, '676.000', '0.000', 'de7d724347f17e5349764a49f869b307'),
(219, 'f545063739c0f8290d9de767cb367d80', 'c2076bf653a5059228aa153781c118ef', '9d8439c7f35923f2397af1b7edadc670', '10', 0, '676.000', '0.000', 'de7d724347f17e5349764a49f869b307'),
(220, '0753920cc2c9fa9b5981b45f2e299156', '9aff11fb2081fc531636c6b3e1829cd4', '9d8439c7f35923f2397af1b7edadc670', '10', 9, '676.000', '0.000', 'de7d724347f17e5349764a49f869b307'),
(221, '98460cf7766d78ce77bc473da56cd070', '328d25fc656e6e8eda43698baa61028e', '9d8439c7f35923f2397af1b7edadc670', '10', 0, '676.000', '0.000', 'de7d724347f17e5349764a49f869b307'),
(222, '0675d8b1d3ca3f13ee2cd892bad5eedd', '99566dbaca69d5e86cb6cea9aa80cf61', '9d8439c7f35923f2397af1b7edadc670', '10', 0, '676.000', '0.000', 'de7d724347f17e5349764a49f869b307'),
(223, 'e2103dfb81a4ce0d8f3bdc3761a7784b', '801aa7501f77dc83cc2d53b6d5241249', '9d8439c7f35923f2397af1b7edadc670', '10', 0, '676.000', '0.000', 'de7d724347f17e5349764a49f869b307'),
(224, '3e80f81d803f53f223e6f59a084b69e9', 'f547403ad43ba922e37dcee3c4a3bf8b', '9d8439c7f35923f2397af1b7edadc670', '10', 4, '676.000', '0.000', 'de7d724347f17e5349764a49f869b307');

-- --------------------------------------------------------

--
-- Table structure for table `sales_quotation`
--

CREATE TABLE IF NOT EXISTS `sales_quotation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(200) NOT NULL,
  `customer_id` varchar(200) NOT NULL,
  `exp_date` int(20) NOT NULL,
  `code` varchar(200) NOT NULL,
  `date` int(20) NOT NULL,
  `discount` decimal(30,3) NOT NULL,
  `discount_amt` decimal(30,3) NOT NULL,
  `customer_discount` decimal(20,3) NOT NULL,
  `customer_discount_amount` decimal(20,3) NOT NULL,
  `freight` decimal(30,3) NOT NULL,
  `round_amt` decimal(33,3) NOT NULL,
  `total_items` int(11) NOT NULL,
  `total_amt` decimal(30,3) NOT NULL,
  `total_item_amt` decimal(30,3) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `note` varchar(200) NOT NULL,
  `sales_order_status` int(2) NOT NULL DEFAULT '0',
  `quotation_cancel` int(2) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `quotation_status` int(2) NOT NULL,
  `order_status` int(2) NOT NULL,
  `expire_status` int(11) NOT NULL,
  `branch_id` varchar(200) NOT NULL,
  `added_by` varchar(200) NOT NULL,
  `deleted_by` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `sales_quotation`
--

INSERT INTO `sales_quotation` (`id`, `guid`, `customer_id`, `exp_date`, `code`, `date`, `discount`, `discount_amt`, `customer_discount`, `customer_discount_amount`, `freight`, `round_amt`, `total_items`, `total_amt`, `total_item_amt`, `remark`, `note`, `sales_order_status`, `quotation_cancel`, `active_status`, `delete_status`, `quotation_status`, `order_status`, `expire_status`, `branch_id`, `added_by`, `deleted_by`) VALUES
(40, '5d5d99e14cda47a3e712e10b5f25940e', '0f7c80352b128f9a45d25e42d1ebd19e', 1397174400, 'S-16', 1397174400, '0.000', '1.000', '0.000', '0.000', '0.000', '0.000', 2, '1.000', '1.000', 'test', 'test', 0, 0, 1, 0, 1, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(41, '4ce2d527cf85aa58453230e9b0a0bcbc', '0f7c80352b128f9a45d25e42d1ebd19e', 1397174400, 'S-16', 1397174400, '1.000', '1.000', '0.000', '0.000', '0.000', '0.000', 1, '1.000', '1.000', 'te3st', 'test ', 0, 0, 0, 1, 0, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(42, '95ecca122700047d464befc8f01d4cd6', '0f7c80352b128f9a45d25e42d1ebd19e', 1397260800, 'S-16', 1397260800, '1.000', '0.000', '0.000', '0.000', '0.000', '0.000', 2, '1.000', '1.000', 'tes', 'test ', 0, 0, 1, 0, 1, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(43, '32d45442cf2ac31ce51c86c3cc7af00b', '63aba6eb627ce1811191c2d22399191d', 1399507200, 'S-115', 1399507200, '1.000', '1.000', '1.000', '0.000', '1.000', '10.000', 1, '1.000', '1.000', 'sgdgsd', 'sdgf', 0, 0, 1, 0, 0, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(44, '589a81efd4692c8dfde196326edff033', '5315c17449a7324783c45ae3632f7487', 1399507200, 'S-116', 1399593600, '1.000', '1.000', '2.000', '0.000', '1.000', '10.000', 1, '1.000', '1.000', 'sdfsd', 'dsf', 0, 0, 1, 0, 0, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(45, '6d7dd27dcf73c2800971b23c16a0da96', '63aba6eb627ce1811191c2d22399191d', 1399507200, 'S-117', 1399507200, '0.000', '7.758', '1.200', '0.000', '0.000', '0.000', 2, '758.693', '775.760', 'safasf', 'sad', 0, 0, 1, 0, 0, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(46, '92e38657a5f713ef9b185431c716fdb5', 'ee6958cdd55bbe2225e4fec2cb6cc6ce', 1399507200, 'S-118', 1399593600, '0.000', '7.758', '1.200', '0.000', '1.000', '1.000', 2, '760.693', '775.760', 'dsfsd', 'dsf', 0, 0, 1, 0, 0, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(47, 'ef233050d387b233e622840ce5dd5382', '63aba6eb627ce1811191c2d22399191d', 1399507200, 'S-119', 1399507200, '0.000', '6.828', '1.200', '8.193', '0.000', '0.000', 1, '667.739', '682.760', 'sdgsdg', 'dsfgs', 0, 0, 1, 0, 1, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(48, '78070d5987661a744b9d1799d6ea6d1f', '63aba6eb627ce1811191c2d22399191d', 1399507200, 'S-120', 1399507200, '0.000', '0.690', '1.200', '0.827', '0.000', '0.000', 1, '67.435', '68.952', 'afa', 'dfa', 1, 0, 1, 0, 1, 0, 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '');

-- --------------------------------------------------------

--
-- Table structure for table `sales_quotation_x_items`
--

CREATE TABLE IF NOT EXISTS `sales_quotation_x_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(200) DEFAULT NULL,
  `quotation_id` varchar(200) NOT NULL,
  `branch_id` varchar(200) NOT NULL,
  `item` varchar(200) NOT NULL,
  `quty` varchar(100) NOT NULL,
  `price` decimal(55,3) NOT NULL,
  `discount` decimal(10,3) NOT NULL,
  `stock_id` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=204 ;

--
-- Dumping data for table `sales_quotation_x_items`
--

INSERT INTO `sales_quotation_x_items` (`id`, `guid`, `quotation_id`, `branch_id`, `item`, `quty`, `price`, `discount`, `stock_id`) VALUES
(182, 'af01fac9f2cdb46ae488db156dddd683', '1ab67d2287938c48714531aad9b3dbb9', '', '9d8439c7f35923f2397af1b7edadc670', '1', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(184, 'd2ef727839939479b4804d416eb92ce7', '1ab67d2287938c48714531aad9b3dbb9', '', 'c3216f7d74d4adcf50901b8559d9a3bc', '1', '93.000', '0.000', '92452936fa7217cd784feba1a6ad2d10'),
(185, '5ed94b6abf1eef5c5d3209ae9fc4fbdb', '5d5d99e14cda47a3e712e10b5f25940e', '', '9d8439c7f35923f2397af1b7edadc670', '1', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(186, 'ce4c47d5119b7795ca5d59a28bf271cc', '5d5d99e14cda47a3e712e10b5f25940e', '', 'c3216f7d74d4adcf50901b8559d9a3bc', '1', '93.000', '0.000', '92452936fa7217cd784feba1a6ad2d10'),
(187, '7cddf49d7f9f69a6de34aee42d22935e', '4ce2d527cf85aa58453230e9b0a0bcbc', '', '9d8439c7f35923f2397af1b7edadc670', '1', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(188, '10e8387eab27da7e98c256547a4fc5ef', '95ecca122700047d464befc8f01d4cd6', '', 'c3216f7d74d4adcf50901b8559d9a3bc', '1', '93.000', '0.000', '92452936fa7217cd784feba1a6ad2d10'),
(189, '9b0aec052e558e6b6f192c0bc031c1c2', '95ecca122700047d464befc8f01d4cd6', '', '9d8439c7f35923f2397af1b7edadc670', '1', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(190, '1398807c0499579fa445fe6cfd33318d', '32d45442cf2ac31ce51c86c3cc7af00b', '', '9d8439c7f35923f2397af1b7edadc670', '10', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(191, '393edab934d78e9468ad8c16686816ea', '589a81efd4692c8dfde196326edff033', '', '9d8439c7f35923f2397af1b7edadc670', '10', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(192, 'd9c9d830c0c16b3bd20813b5147b10b8', '6d7dd27dcf73c2800971b23c16a0da96', '', '9d8439c7f35923f2397af1b7edadc670', '1', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(195, '021c00e9100678a61684a3a69518dd8f', '6d7dd27dcf73c2800971b23c16a0da96', '', 'c3216f7d74d4adcf50901b8559d9a3bc', '1', '93.000', '0.000', '92452936fa7217cd784feba1a6ad2d10'),
(197, '69c58ede5474e68a1932b76f2265e00c', '92e38657a5f713ef9b185431c716fdb5', '', 'c3216f7d74d4adcf50901b8559d9a3bc', '1', '93.000', '0.000', '92452936fa7217cd784feba1a6ad2d10'),
(198, '9c4d4d1853c7601e090bd9fc0d188803', '92e38657a5f713ef9b185431c716fdb5', '', '9d8439c7f35923f2397af1b7edadc670', '1', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(199, '69c58ede5474e68a1932b76f2265e00c', '92e38657a5f713ef9b185431c716fdb5', '', 'c3216f7d74d4adcf50901b8559d9a3bc', '1', '93.000', '0.000', '92452936fa7217cd784feba1a6ad2d10'),
(202, '1fbc9cf6c36bc5ecd9728f9891466a14', 'ef233050d387b233e622840ce5dd5382', '', '9d8439c7f35923f2397af1b7edadc670', '1', '676.000', '1.000', 'de7d724347f17e5349764a49f869b307'),
(203, '9e2a18b7a0ad64247c4c898aa0d31fa0', '78070d5987661a744b9d1799d6ea6d1f', '', '9d8439c7f35923f2397af1b7edadc670', '1', '676.000', '0.000', 'de7d724347f17e5349764a49f869b307');

-- --------------------------------------------------------

--
-- Table structure for table `sales_types`
--

CREATE TABLE IF NOT EXISTS `sales_types` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `branch_id` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `added_by` int(100) NOT NULL,
  `deleted_by` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `sales_types`
--

INSERT INTO `sales_types` (`id`, `guid`, `name`, `branch_id`, `active`, `active_status`, `delete_status`, `added_by`, `deleted_by`) VALUES
(1, 'cfd8b485f99e561408192c594f8c2e92', 'LG', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 1, 0, 61, 61),
(2, '1642d900f6768119e3dd75bbf8ed0fc2', 'Nokia', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, 1, 0, 61),
(3, '11d08dc2db3920364304c6ed1192b5ba', 'THOSHIBA', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, 1, 0, 0),
(4, '0a1db6b7e58b53971b12790f10e27d60', 'Samsung', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, 1, 0, 61),
(5, '90642ff56db4789380d00acae0f053fd', 'AXE', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, 1, 61, 0),
(6, 'd270d314cf6ccee8c618495e9feba4ff', 'Mentos', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, 1, 61, 0),
(7, 'a85e2c85b10bd213c8b876acfa8aa7a5', 'Silverex', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, 0, 61, 0),
(8, '6a3fba30105e2894ff21a1bef6443300', 'LG', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, 1, 61, 0),
(9, 'db336d9ef0d8a4b64a17cef1a0b91c6e', 'Notng', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 1, 0, 61, 61),
(10, '99cb6ba01684b50fa56b573351b11b84', 'sasi', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 1, 0, 61, 61),
(11, 'f2e56b486bcd555842563ec7b58c62c3', 'Onida1', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 1, 0, 61, 61);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `department` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `department`, `branch`) VALUES
(1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) DEFAULT NULL,
  `branch_id` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `quty` decimal(55,0) NOT NULL,
  `price` decimal(30,3) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `added_by` varchar(255) NOT NULL,
  `deleted_by` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `guid`, `branch_id`, `item`, `quty`, `price`, `active`, `active_status`, `delete_status`, `added_by`, `deleted_by`) VALUES
(15, '52bb9dabaa6986843a2c91de88574923', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '9d8439c7f35923f2397af1b7edadc670', '789', '676.000', 1, 1, 0, '', ''),
(16, '2e5cb8b338adf9228e5cb8fd2782cd5b', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'c3216f7d74d4adcf50901b8559d9a3bc', '200', '60.000', 1, 1, 0, '', ''),
(17, '0ba4c1649d19b6eab3cf0cff29bbce21', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'abc049b9d095c27843b114f02ac5f640', '200', '75.000', 1, 1, 0, '', ''),
(18, '629cabe550d1eb20e11b44880f0bba70', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'ef92a1dc9701ac89a655927183a78d87', '0', '15.000', 1, 1, 0, '', ''),
(19, '7209f39fea8b0d34a5a6b4012b91a263', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '23b6fb71c13f7a53235835584c0a600f', '200', '48.000', 1, 1, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE IF NOT EXISTS `stocks` (
  `id` int(200) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) DEFAULT NULL,
  `branch_id` varchar(255) DEFAULT NULL,
  `branch_name` varchar(100) NOT NULL,
  `item_id` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `stock` varchar(100) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `item_active` int(11) NOT NULL,
  `item_delete` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `guid`, `branch_id`, `branch_name`, `item_id`, `price`, `stock`, `active_status`, `delete_status`, `item_active`, `item_delete`) VALUES
(14, '', '3', 'Mcdonalds', '21', '12', '91', 1, 0, 1, 0),
(15, '', '3', 'Mcdonalds', '22', '20', '200', 1, 0, 1, 0),
(16, '', '3', 'Mcdonalds', '23', '14', '20', 1, 0, 1, 0),
(17, '', '3', 'Mcdonalds', '24', '25', '30', 1, 0, 1, 0),
(18, '', '3', 'Mcdonalds', '25', '20', '100', 1, 0, 1, 0),
(19, '', '3', 'Mcdonalds', '26', '28', '1000', 1, 0, 1, 0),
(20, '', '3', 'Mcdonalds', '27', '10', '2', 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stocks_history`
--

CREATE TABLE IF NOT EXISTS `stocks_history` (
  `id` int(200) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) DEFAULT NULL,
  `stock_id` varchar(255) NOT NULL,
  `branch_id` varchar(255) DEFAULT NULL,
  `item_id` varchar(100) NOT NULL,
  `supplier_id` varchar(100) NOT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `cost` decimal(30,3) NOT NULL,
  `quty` int(100) NOT NULL,
  `price` decimal(30,3) NOT NULL,
  `date` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `stocks_history`
--

INSERT INTO `stocks_history` (`id`, `guid`, `stock_id`, `branch_id`, `item_id`, `supplier_id`, `added_by`, `cost`, `quty`, `price`, `date`) VALUES
(17, '9cff3c99cc56218f03b7e9a5975fa6ee', '52bb9dabaa6986843a2c91de88574923', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '9d8439c7f35923f2397af1b7edadc670', 'ceab8c7d14f12aaeec1dc19b3d81212a', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '45.000', 1000, '676.000', 0),
(18, '199ef781d6a06d93753889414fa075f4', '52bb9dabaa6986843a2c91de88574923', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '9d8439c7f35923f2397af1b7edadc670', 'ceab8c7d14f12aaeec1dc19b3d81212a', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '45.000', 1000, '676.000', 0),
(19, '5b13072750bf2f4c8cf7a47b37d6e9b4', '2e5cb8b338adf9228e5cb8fd2782cd5b', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'c3216f7d74d4adcf50901b8559d9a3bc', 'ceab8c7d14f12aaeec1dc19b3d81212a', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '45.000', 100, '60.000', 0),
(20, '2dada10b8b26dc0d68bc8b84a5f8c84a', '0ba4c1649d19b6eab3cf0cff29bbce21', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'abc049b9d095c27843b114f02ac5f640', 'ceab8c7d14f12aaeec1dc19b3d81212a', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '56.000', 100, '75.000', 0),
(21, '0d69420b3511b6f936906639d9e6ccb1', '629cabe550d1eb20e11b44880f0bba70', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'ef92a1dc9701ac89a655927183a78d87', 'ceab8c7d14f12aaeec1dc19b3d81212a', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '12.000', 100, '15.000', 0),
(22, '7b85ff3be9bd9273f02fe2dee5fa437e', '7209f39fea8b0d34a5a6b4012b91a263', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '23b6fb71c13f7a53235835584c0a600f', 'ceab8c7d14f12aaeec1dc19b3d81212a', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '45.000', 100, '48.000', 0),
(23, '2ebcfac7b9ae6cad5c3e5babf6949a9e', '2e5cb8b338adf9228e5cb8fd2782cd5b', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'c3216f7d74d4adcf50901b8559d9a3bc', 'ceab8c7d14f12aaeec1dc19b3d81212a', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '45.000', 100, '60.000', 0),
(24, 'b6c25505e0a80b03968f695fdfa429e1', '0ba4c1649d19b6eab3cf0cff29bbce21', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'abc049b9d095c27843b114f02ac5f640', 'ceab8c7d14f12aaeec1dc19b3d81212a', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '56.000', 100, '75.000', 0),
(25, '45b284f1b04f3fff8c0a7c3cde5d488a', '629cabe550d1eb20e11b44880f0bba70', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'ef92a1dc9701ac89a655927183a78d87', 'ceab8c7d14f12aaeec1dc19b3d81212a', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '12.000', 100, '15.000', 0),
(26, 'e33e7c7434ea1b38d13e6d9aeb01afce', '7209f39fea8b0d34a5a6b4012b91a263', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '23b6fb71c13f7a53235835584c0a600f', 'ceab8c7d14f12aaeec1dc19b3d81212a', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '45.000', 100, '48.000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stock_transfer`
--

CREATE TABLE IF NOT EXISTS `stock_transfer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `date` int(11) NOT NULL,
  `remark` varchar(300) NOT NULL,
  `note` varchar(300) NOT NULL,
  `no_items` int(11) NOT NULL,
  `total_amount` decimal(30,3) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `stock_status` int(11) NOT NULL DEFAULT '0',
  `branch_id` varchar(255) NOT NULL,
  `deleted_by` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `stock_transfer`
--

INSERT INTO `stock_transfer` (`id`, `guid`, `destination`, `code`, `date`, `remark`, `note`, `no_items`, `total_amount`, `active_status`, `delete_status`, `stock_status`, `branch_id`, `deleted_by`, `added_by`) VALUES
(25, 'f4206a8912721c53b84894ee83a02900', '', 'OS18', 1400112000, 'bxcbxc', 'xcvbx', 1, '45450.000', 1, 0, 1, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(26, '063c5a4037dab38c58120c140d340eb1', '', 'OS19', 1400198400, 'xcvbxcbb', 'xcv', 1, '45900.000', 1, 0, 1, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4');

-- --------------------------------------------------------

--
-- Table structure for table `stock_transfer_x_items`
--

CREATE TABLE IF NOT EXISTS `stock_transfer_x_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) NOT NULL,
  `damage_stock_id` varchar(255) NOT NULL,
  `stock_id` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `quty` int(11) NOT NULL,
  `cost` decimal(30,3) NOT NULL,
  `sell` decimal(30,3) NOT NULL,
  `discount_per` decimal(30,3) NOT NULL,
  `discount_amount` decimal(30,3) NOT NULL,
  `tax` decimal(30,3) NOT NULL,
  `amount` decimal(30,3) NOT NULL,
  `supplier_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `stock_transfer_x_items`
--

INSERT INTO `stock_transfer_x_items` (`id`, `guid`, `damage_stock_id`, `stock_id`, `item`, `quty`, `cost`, `sell`, `discount_per`, `discount_amount`, `tax`, `amount`, `supplier_id`) VALUES
(38, '3c2e2d7e4f8642ff6d668017e8f5a116', 'f4206a8912721c53b84894ee83a02900', '', '9d8439c7f35923f2397af1b7edadc670', 1000, '45.000', '676.000', '1.000', '450.000', '900.000', '45000.000', 'ceab8c7d14f12aaeec1dc19b3d81212a'),
(39, '8671719b870ef46cff4f744c4b2f4392', '063c5a4037dab38c58120c140d340eb1', '', '9d8439c7f35923f2397af1b7edadc670', 1000, '45.000', '676.000', '0.000', '0.000', '900.000', '45000.000', 'ceab8c7d14f12aaeec1dc19b3d81212a');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) DEFAULT NULL,
  `company_name` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `category` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `credit_days` decimal(65,0) NOT NULL,
  `credit_limit` decimal(65,0) NOT NULL,
  `monthly_credit_bal` decimal(65,0) NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `bank_location` varchar(200) NOT NULL,
  `cst_no` varchar(200) NOT NULL,
  `gst_no` varchar(200) NOT NULL,
  `tex_reg_no` varchar(200) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `deleted_by` varchar(255) DEFAULT NULL,
  `website` varchar(100) NOT NULL,
  `branch_id` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `guid`, `company_name`, `first_name`, `last_name`, `category`, `email`, `phone`, `address1`, `address2`, `city`, `state`, `zip`, `country`, `comments`, `account_number`, `credit_days`, `credit_limit`, `monthly_credit_bal`, `bank_name`, `bank_location`, `cst_no`, `gst_no`, `tex_reg_no`, `active_status`, `delete_status`, `deleted_by`, `website`, `branch_id`, `added_by`) VALUES
(1, 'ceab8c7d14f12aaeec1dc19b3d81212a', 'JK', 'Jayesh1', 'gopi', '', 'julibeth34@yahoo.in', '7795390584', 'ewrter', 'wertwe', 'ewrtwe', 'reter', 'rterter', 'rtertre', 'sdfsdfsd', 'ew43643', '0', '0', '0', '', '', '', '', '', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 'sfgedtrere', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(2, '7988d76f85fb01646eb9d9b01530c460', 'iouoi', 'Manu', 'km', 'b0913b800960821c61b9e7426cc3f1b8', '', '', '', 'uyiuyi', '', '', '', '', 'uouu', 'uoiuo', '0', '0', '0', '', '', '', '', '', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 'oiuoiu', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', ''),
(3, 'c76d55c21f9d4f577b26fba515a8066f', 'uytuy', 'Nijan', 'xjhk', '', 'jhkjhj@kjhkj.com', '7878797989', 'yiuy', 'iyiuy', 'iuyiuy', 'iuyiuy', 'iyiuy', 'iuyi', 'tutuyt', 'uytuy', '0', '0', '0', '', '', '', '', '', 1, 0, '', 'tuytuy', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', ''),
(4, '6148f274388f64b43123c3598c3fcf81', 'yutu', 'Kiran', 'yutuy', 'b0913b800960821c61b9e7426cc3f1b8', '', '', '', 'uytuyt', '', '', '', '', 'uytuy', 'uytuyt', '0', '0', '0', '', '', '', '', '', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 'uytu', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', ''),
(5, '2a4e7a8de41c967c9097b2e4a1a0e662', 'Champ', 'kumar', 'sasi', 'b0913b800960821c61b9e7426cc3f1b8', 'afsfasfa@fdsag.sdfgsd', '25235623', '', '', '', '', '', '', '', '', '0', '0', '0', '', '', '', '', '', 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(6, 'ab4b9cd0dc050345b7ab8365bd10b934', 'zdafas', 'asga', '0', '', '', '', '', '', '', '', '', '', 'asga', '26', '4326', '236', '26', '263', '26', '26', '26', '263', 1, 0, '', 'asga', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(7, '223eecbb705cc68d67fdfa9a10509784', '', 'dfghd', 'dsgsdg', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '', '', '', '', '', 0, 1, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(8, '4d6d2651564e45b6b1ef0d1fe570e034', 'oiuoi', 'uoiu', 'oiuoi', '', 'jibi@yahoo.com', '98098098', 'uoiuoi', '', 'uoiu', 'oiuoi', 'uou', 'oiuoi', 'uoiuoi', '809', '908', '98', '980', '098', '09809', '8098', '098', '00', 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 'uoiuoiuoi', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(9, '95749f66abfe71f2ee99482280456d9e', '', 'sdgsd', '', '', 'jibi@yahoo.com', '346346346', '', '', '', '', '', '', '', '', '0', '0', '0', '', '', '', '', '', 1, 0, '', '', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(10, 'e91054c7db987e18f232ffa506f49394', 'uoiu', 'monish', 'km', 'b0913b800960821c61b9e7426cc3f1b8', 'monis@yahoo.com', '8798798', '43636436', '', 'uoiu', 'oiu', 'oiuoi', 'uoi', 'oiuiouoi', '987', '7897', '98798', '798', '7987', '897', '98798', '798', '7987', 1, 0, '', 'uiuoi', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(11, '2852a4761247d450ccb765bd550c52e9', 'assfa', 'asfasfa', 'asfa', 'bbb619417f5a8add548cdd6af3b7c71a', 'jibi@yahoo.com', '34634634', 'asfas', '', '', '', '', '', '', '', '0', '0', '0', '', '', '', '', '', 1, 0, '', 'fasfasf', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(12, '7e73f4535f0840c37dc6908b461129a9', '', '235623', '', 'b0913b800960821c61b9e7426cc3f1b8', 'jibu@iyiu.cuoiuio', '234634', '', '', 'dfgfdg', 'sdag', 'sdag', 'asdg', '', '', '0', '0', '0', '', '', '', '', '', 1, 0, NULL, '', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers_category`
--

CREATE TABLE IF NOT EXISTS `suppliers_category` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) DEFAULT NULL,
  `branch_id` varchar(255) DEFAULT NULL,
  `category_name` varchar(100) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `added_by` varchar(255) DEFAULT NULL,
  `deleted_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `suppliers_category`
--

INSERT INTO `suppliers_category` (`id`, `guid`, `branch_id`, `category_name`, `active_status`, `delete_status`, `added_by`, `deleted_by`) VALUES
(1, '7879977979777987', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'C-123', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(2, 'b07822de514011f2e7ffc12692033acb', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'C-1233', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(3, 'b0913b800960821c61b9e7426cc3f1b8', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'Web sales1', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(4, 'bbb619417f5a8add548cdd6af3b7c71a', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'dsgsdgs', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(5, '50dd8794a73be791efc0f38b018a14ef', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'fgfgh', 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(6, 'd6ca613468ccc418994b923933d9de4f', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'dsfsdgsdgs', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers_x_branches`
--

CREATE TABLE IF NOT EXISTS `suppliers_x_branches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) DEFAULT NULL,
  `branch_id` varchar(255) DEFAULT NULL,
  `branch_name` varchar(100) NOT NULL,
  `supplier_id` varchar(100) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `supplier_active` int(11) NOT NULL,
  `supplier_delete` int(11) NOT NULL,
  `deleted_by` varchar(255) DEFAULT NULL,
  `item_status` int(11) NOT NULL,
  `item_delete` int(11) NOT NULL,
  `item_deleted_by` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers_x_items`
--

CREATE TABLE IF NOT EXISTS `suppliers_x_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) DEFAULT NULL,
  `branch_id` varchar(255) DEFAULT NULL,
  `supplier_id` varchar(100) NOT NULL,
  `item_id` varchar(100) NOT NULL,
  `cost` varchar(50) NOT NULL,
  `quty` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `mrp` varchar(100) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `item_active` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `deactive_item` int(11) NOT NULL,
  `item_delete` int(11) NOT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `deleted_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=128 ;

--
-- Dumping data for table `suppliers_x_items`
--

INSERT INTO `suppliers_x_items` (`id`, `guid`, `branch_id`, `supplier_id`, `item_id`, `cost`, `quty`, `price`, `mrp`, `discount`, `active_status`, `delete_status`, `item_active`, `active`, `deactive_item`, `item_delete`, `added_by`, `deleted_by`) VALUES
(90, '564058293ccfe916218495ddeeca91af', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '95749f66abfe71f2ee99482280456d9e', 'c3216f7d74d4adcf50901b8559d9a3bc', '45', '898', '60', '70', '', 1, 0, 1, 0, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(91, '460dd0914dcdb5ef542f58cb159fa2f8', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '95749f66abfe71f2ee99482280456d9e', 'abc049b9d095c27843b114f02ac5f640', '56', '1000', '75', '78', '', 1, 0, 1, 0, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(92, '3fef83c32216828aa38bde866d920e1b', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'ab4b9cd0dc050345b7ab8365bd10b934', 'c3216f7d74d4adcf50901b8559d9a3bc', '45', '78', '60', '70', '', 1, 0, 1, 0, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(93, '2c8bb0198196de48da522aafd6b8ffec', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'ab4b9cd0dc050345b7ab8365bd10b934', 'abc049b9d095c27843b114f02ac5f640', '56', '89', '75', '78', '', 1, 0, 1, 0, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(94, '52e147dbb43181e2912044c572d3bd8d', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'ab4b9cd0dc050345b7ab8365bd10b934', 'abyyc049b9d095c27843b114f02ac5f640', '56', '89', '75', '78', '', 1, 0, 1, 0, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(95, '43ed5f2e7ca513a3f8828424f16cc5d2', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'ab4b9cd0dc050345b7ab8365bd10b934', '23b6fb71c13f7a53235835584c0a600f', '45', '89', '48', '49', '', 1, 0, 1, 0, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(96, 'cad7cbb88465aaaf841a0823c6f087bd', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'ab4b9cd0dc050345b7ab8365bd10b934', 'ef92a1dc9701ac89a655927183a78d87', '12', '89', '15', '16', '', 1, 0, 1, 0, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(97, '65ea4c7c04c00e05cd8fb93ba0515595', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'ab4b9cd0dc050345b7ab8365bd10b934', '9d8439c7f35923f2397af1b7edadc670', '45', '89', '676', '967', '', 1, 0, 1, 0, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(98, '289b3c286932a1e99558dd06c8c3fb2d', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '7988d76f85fb01646eb9d9b01530c460', 'c3216f7d74d4adcf50901b8559d9a3bc', '45', '89', '60', '70', '', 1, 0, 1, 0, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(99, 'da66d87794f815c637fa5f5f9d057650', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'ab4b9cd0dc050345b7ab8365bd10b934', 'c3216f7d74d4adcf50901b8559d9a3bc', '45', '88', '60', '70', '', 1, 0, 1, 0, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(100, 'f0755ca636f0cc7ce14979c3cf1ce751', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'ab4b9cd0dc050345b7ab8365bd10b934', 'c3216f7d74d4adcf50901b8559d9a3bc', '45', '78', '60', '70', '', 1, 0, 1, 0, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(101, 'd227b20f47f52a1e155d5585ed3231ee', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'ab4b9cd0dc050345b7ab8365bd10b934', 'c3216f7d74d4adcf50901b8559d9a3bc', '45', '89', '60', '70', '', 1, 0, 1, 0, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(102, '7c81723818d9a4cf7378f4d206ab3268', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'ab4b9cd0dc050345b7ab8365bd10b934', 'abc049b9d095c27843b114f02ac5f640', '56', '89', '75', '78', '', 1, 0, 1, 0, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(103, 'd5c59c54d4e70b1c3498c3ae901e0d68', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '6148f274388f64b43123c3598c3fcf81', 'c3216f7d74d4adcf50901b8559d9a3bc', '45', '78', '60', '70', '', 1, 0, 1, 0, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(104, '60848e911ea8133d90e08201f041c41f', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'c76d55c21f9d4f577b26fba515a8066f', 'c3216f7d74d4adcf50901b8559d9a3bc', '45', '90', '60', '70', '', 1, 0, 1, 0, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(112, 'cb719fa8212effa9598a41c80812a55e', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'e91054c7db987e18f232ffa506f49394', 'c3216f7d74d4adcf50901b8559d9a3bc', '90.899', '0', '92.909', '98.000', '', 1, 0, 1, 0, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(113, '3d1d696943278577e8db87f2768e5251', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'e91054c7db987e18f232ffa506f49394', 'abc049b9d095c27843b114f02ac5f640', '56', '0', '75', '78', '', 1, 0, 1, 0, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(114, 'e867134cac9363ab141b88634b5a4cd5', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'e91054c7db987e18f232ffa506f49394', '9d8439c7f35923f2397af1b7edadc670', '45', '0', '676', '967', '', 0, 1, 1, 0, 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(115, 'e867134cac9363ab149363ab141b88634b5a4cd5', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'e91054c7db987e18f232ffa506f49394', '68fac0f3c2306caadf9779dd6eb0a568', '68', '0', '69', '89', '', 1, 0, 0, 1, 0, 0, NULL, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(116, '2b4cd764195ea94d9c7f64b1b8c0aaff', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'ceab8c7d14f12aaeec1dc19b3d81212a', 'c3216f7d74d4adcf50901b8559d9a3bc', '45', '0', '60', '70', '', 1, 0, 0, 1, 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', NULL),
(117, '7740eac3b03118a1f7c959d284f69a24', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'e91054c7db987e18f232ffa506f49394', 'c709663a0324fb6175b807eb730de052', '12', '0', '30', '34', '', 1, 0, 0, 1, 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', NULL),
(118, '3fb36923716285ae562b22c4a7962cad', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'e91054c7db987e18f232ffa506f49394', 'abyyc049b9d095c27843b114f02ac5f640', '56', '0', '75', '78', '', 1, 0, 0, 1, 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', NULL),
(119, '917ad7f57a85fdd62b85c0180080288b', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'e91054c7db987e18f232ffa506f49394', '9d8439c7f35923f2397af1b7edadc670', '45', '0', '76', '87', '', 1, 0, 0, 1, 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', NULL),
(120, NULL, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'e91054c7db987e18f232ffa506f49394', 'c82ea2b2b93a10eca382fc23aa2f5d5e', '0', '', '30', '0', '', 1, 0, 0, 1, 0, 0, NULL, NULL),
(121, '21254cdd45918004746dd702b66a4dda', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'e91054c7db987e18f232ffa506f49394', 'cb719fa8212effa9598a41c80812a55e', '44', '0', '66', '77', '', 1, 0, 0, 1, 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', NULL),
(122, '92a86264e5f5a4c2ff2a57b5aca2efb3', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'e91054c7db987e18f232ffa506f49394', '9c8a34bd8413ff097231dcd035284e1b', '12', '', '14', '15', '', 1, 0, 0, 1, 0, 0, NULL, NULL),
(123, '892f9f39498d7239b742ce72c8e48c6d', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'c76d55c21f9d4f577b26fba515a8066f', '000b7493bfbd3e7be55732d5275b43ba', '879', '', '787', '787', '', 1, 0, 0, 1, 0, 0, NULL, NULL),
(124, 'b5b5313cb724c9cf11e3f40e05a2ff60', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'c76d55c21f9d4f577b26fba515a8066f', '47e94298a89b3cf89e5e09cde7f4b1b1', '42', '', '5235', '352', '', 1, 0, 0, 1, 0, 0, NULL, NULL),
(125, '7a2a814a17743d64d3e4fdccccc9f30c', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'ceab8c7d14f12aaeec1dc19b3d81212a', '1733d0bbbbd635f34421ddc030579885', '235', '', '235235', '23523', '', 1, 0, 0, 1, 0, 0, NULL, NULL),
(126, 'f642108093fc97c60e18a1739344e5b2', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'ceab8c7d14f12aaeec1dc19b3d81212a', 'c2757704eb875d850950bd5bff8cc845', '32542', '', '235', '35235', '', 1, 0, 0, 1, 0, 0, NULL, NULL),
(127, '41fdd9225b1d00800e3c1cc8fdaad552', 'BE4CB6FB-9D0F-457A-9D0F-D7948222EBB3', 'ceab8c7d14f12aaeec1dc19b3d81212a', '96d4396bdfee017b1cf08c3b54bac4a5', '13', '', '14', '15', '', 1, 0, 0, 1, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_contacts`
--

CREATE TABLE IF NOT EXISTS `supplier_contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) DEFAULT NULL,
  `supplier` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `supplier_contacts`
--

INSERT INTO `supplier_contacts` (`id`, `guid`, `supplier`, `address`, `city`, `state`, `country`, `zip`, `email`, `phone`) VALUES
(1, '', 'ab4b9cd0dc050345b7ab8365bd10b934', 'dsgsd', 'ewtwe', 'wet', 'we', 'wet', 'jibi@yahoo.com', '773252'),
(2, '', 'ab4b9cd0dc050345b7ab8365bd10b934', 'fssdf', 'sfs', 'gsdds', 'gsgs', 'sdgsd', 'jibi@yahoo.com', '436346'),
(3, '', '223eecbb705cc68d67fdfa9a10509784', '', '', '', '', '', 'jibi@yahoo.com', '4563636'),
(4, '', '4d6d2651564e45b6b1ef0d1fe570e034', 'uoiuoi', 'uoiu', 'oiuoi', 'oiuoi', 'uou', 'jibi@yahoo.com', '98098098'),
(5, 'cea0bfb749c5d43e80f40bb65aac4861', '95749f66abfe71f2ee99482280456d9e', '', '', '', '', '', 'jibi@yahoo.com', '346346346'),
(35, '3b9ebf46a8ee2d8f53b903e449451176', 'e91054c7db987e18f232ffa506f49394', '43636436', 'uoiu', 'oiu', 'uoi', 'oiuoi', 'monis@yahoo.com', '8798798'),
(36, 'b990cf0458de84ff483f5d15982fb074', 'e91054c7db987e18f232ffa506f49394', 'asfasr32', '2353', '235', '231523', '2352', 'monis@yahoo.com', '342532512'),
(37, 'da4ebc4d9456e0c8e9dcf2c894f3c722', 'e91054c7db987e18f232ffa506f49394', '532534', '23463246', '6', '3463', '3246234', 'monish23@yahoo.com', '2535345'),
(38, 'd83ea3c708bbf1eff615903b01591ee0', 'e91054c7db987e18f232ffa506f49394', 'wreqtwqe', 'dsgfsd', 'ewtwe', '87687687', '9879879', 'monish@yahoo.com', '868768768'),
(40, 'f4812a96f7d9c42d87e66752e42b7756', '2852a4761247d450ccb765bd550c52e9', 'asfas', '', '', '', '', 'jibi@yahoo.com', '34634634'),
(41, 'eda3ecfe7f29fcfade997f32e8abac22', '6148f274388f64b43123c3598c3fcf81', '', '', '', '', '', '', ''),
(43, '9d68fdadffc031d22c2bf191922fea57', '7988d76f85fb01646eb9d9b01530c460', '', '', '', '', '', '', ''),
(44, '37bca3c862241326dc562462270162a0', '7e73f4535f0840c37dc6908b461129a9', '', 'dfgfdg', 'sdag', 'asdg', 'sdag', 'jibu@iyiu.cuoiuio', '234634'),
(45, '3dbe3447dbb55fdcb364f19cda706eac', '7e73f4535f0840c37dc6908b461129a9', '', 'gsdg', 'sdag', 'gdsag', 'sdag', 'jibu@iyiu.cuoiuio', 'weqtweewe'),
(46, '3d44ff1c7682e8008dd14e19232ec555', '2a4e7a8de41c967c9097b2e4a1a0e662', '', '', '', '', '', 'afsfasfa@fdsag.sdfgsd', '25235623');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_payable`
--

CREATE TABLE IF NOT EXISTS `supplier_payable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` varchar(255) NOT NULL,
  `supplier_id` varchar(255) NOT NULL,
  `amount` decimal(55,3) NOT NULL,
  `paid_amount` decimal(55,3) NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT '0',
  `branch_id` varchar(255) NOT NULL,
  `guid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `supplier_payable`
--

INSERT INTO `supplier_payable` (`id`, `invoice_id`, `supplier_id`, `amount`, `paid_amount`, `payment_status`, `branch_id`, `guid`) VALUES
(70, '1fe8e17b45d319d29b51a550fdcc5189', 'e91054c7db987e18f232ffa506f49394', '12869.815', '0.000', 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '31703fb1f5e686252aac3fa238943d10'),
(71, 'ae6e03d1a3eb5a4a9e9ec6a7876ca486', 'e91054c7db987e18f232ffa506f49394', '26377.078', '0.000', 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '31703fb1f5e686252aac3fa238943d10e686252aac3fa238943d10'),
(72, '6884ef831670ce6763513cb06a9cb7ec', 'e91054c7db987e18f232ffa506f49394', '8898.102', '97879.122', 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '31703fb1f5e6862531703fb1f5e686252aac3fa238943d10'),
(73, '7426a6fc2562fef9f209621700390c23', 'e91054c7db987e18f232ffa506f49394', '10000.000', '2010.000', 0, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '31703fb131703fb1f5e686252aac3fa238943d10a238943d10');

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE IF NOT EXISTS `taxes` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) DEFAULT NULL,
  `value` varchar(100) NOT NULL,
  `branch_id` varchar(255) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `added_by` varchar(255) DEFAULT NULL,
  `deleted_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `guid`, `value`, `branch_id`, `type`, `active_status`, `delete_status`, `added_by`, `deleted_by`) VALUES
(1, '2ba78d7500ac92e84953cbe019741703', '51', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '9583a13924a8e28cc35fec0650a891af', 0, 1, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(2, '81757ff8617e8582c3647d14a4291233', '10', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '58f48b85eaa9afb4fb023de77e2c60c4', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(3, '4d24f165c31f73d0244244fefc770ff8', '56', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '9583a13924a8e28cc35fec0650a891af', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(4, '681401b2984eac4f8fb8e26ca609cb3f', '45', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '9583a13924a8e28cc35fec0650a891af', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(5, '2e32d79a754f2d48abcffe09ba276ed1', '23', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '58f48b85eaa9afb4fb023de77e2c60c4', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(6, '6a1975bfa7b8d6fc9ed428cd2b4d6a6e', '56', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '58f48b85eaa9afb4fb023de77e2c60c4', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(7, '8ecdb55b2931da3d861bfe66f9e1afa4', '8798', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '4f9a30691955022263017ccddcae1f9d', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(8, '5dad9a40f3b35cd3b573fcd3d481ea0b', '2', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '9583a13924a8e28cc35fec0650a891af', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', NULL),
(9, '4eeb244d4c7f6eb3e725c99f970aef8d', '5', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '9583a13924a8e28cc35fec0650a891af', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', NULL),
(10, 'd8bb722ea46cec6fcc9f88a213401f87', 'safas', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '9583a13924a8e28cc35fec0650a891af', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', NULL),
(11, '94f8ababe49f9a0f6270f2ddb96e6291', '67', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '9583a13924a8e28cc35fec0650a891af', 1, 0, '7c9888196685a12a83eecf9c0d05a525', NULL),
(12, '722cd6b7d27eb0ce93c8685a2c426c4d', '5', 'BE4CB6FB-9D0F-457A-9D0F-D7948222EBB3', 'ff9fc7bb46cf6d765d3f647c9acf3d9c', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', NULL),
(13, '3bd8ee71ad402856e20a0ad069e3d32d', '2', 'BE4CB6FB-9D0F-457A-9D0F-D7948222EBB3', '01fc209013ae06f62b4af21088294b45', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `taxes_area`
--

CREATE TABLE IF NOT EXISTS `taxes_area` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `branch_id` varchar(255) DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `added_by` varchar(255) DEFAULT NULL,
  `deleted_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `taxes_area`
--

INSERT INTO `taxes_area` (`id`, `guid`, `name`, `branch_id`, `active_status`, `delete_status`, `added_by`, `deleted_by`) VALUES
(2, '2d81a2d79b828aa9e3d109184961925a', 'Kerala', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(3, 'eceb529a54922e9bd0ba3d305f9520ef', 'Karanada', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 1, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(4, '60800ab1992c2df5952c54bbf19f5601', 'Poona', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 1, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(5, '9248a89e16bcf4ad98a5c50c68ca1870', 'Tamil Nad', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(6, 'e0c7c85f03312c7855f7052f5d5cef62', 'Gova', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(7, '1c1e20bd4d0cab963f5580b76eba6abe', 'A P', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(8, '22bd7f0bf66b60cfc7bda6374d873fcf', 'Rajandhan', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(9, '810cae8bb4bfd17574f57308d3bf0062', 'Colombo', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 1, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(10, '85127b2d6897986a9175a142f154cd1a', 'kerala121', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(11, '7973b1abfb2466b4478c9d87476951cf', 'kerala121t', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(12, '28aa802577d2ca603ca011f9a3147881', 'sdafsd dsgfds', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(13, '974cc19e629b993ced7f7267d9fbb526', 'Area 1', 'BE4CB6FB-9D0F-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', NULL),
(14, '35df27055dd4a46148b656ee0a048b86', 'Area 2', 'BE4CB6FB-9D0F-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tax_commodity`
--

CREATE TABLE IF NOT EXISTS `tax_commodity` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) DEFAULT NULL,
  `branch_id` varchar(255) DEFAULT NULL,
  `schedule` varchar(100) NOT NULL,
  `tax_area` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `part` varchar(100) NOT NULL,
  `code` varchar(200) NOT NULL,
  `tax` varchar(100) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `added_by` varchar(255) DEFAULT NULL,
  `deleted_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tax_commodity`
--

INSERT INTO `tax_commodity` (`id`, `guid`, `branch_id`, `schedule`, `tax_area`, `description`, `part`, `code`, `tax`, `active_status`, `delete_status`, `added_by`, `deleted_by`) VALUES
(4, '4f160e2434fe0e0b01da625b4e31461c', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'simple', '2d81a2d79b828aa9e3d109184961925a', 'south', 'Pasd', 'TND-123', '81757ff8617e8582c3647d14a4291233', 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(5, 'd7226f693d76b072f1fdf50f3089339a', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'simple', '60800ab1992c2df5952c54bbf19f5601', 'North', 'Pasd', 'TND-124', '81757ff8617e8582c3647d14a4291233', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(6, 'd6e06e9618dc0c161df0150adb2743ea', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'Uttyty', '11', 'North', 'uiyi', 'TND-127', '4d24f165c31f73d0244244fefc770ff8', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(7, '472a82e9f2fd7f3b26512c87bc2c5e5a', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '', '9248a89e16bcf4ad98a5c50c68ca1870', 'wqtwe', 'yuiyiu', 'TD', '2ba78d7500ac92e84953cbe019741703', 0, 1, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(8, '55bb0f5d16605855dcca760300f469ae', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '90890', '22bd7f0bf66b60cfc7bda6374d873fcf', '53265236', '809', '8908', '2ba78d7500ac92e84953cbe019741703', 0, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tax_types`
--

CREATE TABLE IF NOT EXISTS `tax_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) DEFAULT NULL,
  `type` varchar(100) NOT NULL,
  `branch_id` varchar(255) DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `added_by` varchar(255) DEFAULT NULL,
  `deleted_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tax_types`
--

INSERT INTO `tax_types` (`id`, `guid`, `type`, `branch_id`, `active_status`, `delete_status`, `added_by`, `deleted_by`) VALUES
(1, '9583a13924a8e28cc35fec0650a891af', 'Vat', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(2, '58f48b85eaa9afb4fb023de77e2c60c4', 'Normal', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(3, '65cfd0dbcc7053600d5da1f688b78c06', 'sasi', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(4, 'db4dd71b403ab32d0d732bbd9974433a', 'test1', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(5, 'ed1318118fb9ca6592cb0117d1d5a529', 'asfas', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4'),
(6, '4f9a30691955022263017ccddcae1f9d', 'Vat', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(7, '3acdb4df97f5635b08d72b343a438c80', 'Sales Tax', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 1, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(8, 'd2567c03492d4abc80011e6829067a16', 'Income Tax', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', ''),
(9, 'ff9fc7bb46cf6d765d3f647c9acf3d9c', 'Vat ', 'BE4CB6FB-9D0F-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', NULL),
(10, '01fc209013ae06f62b4af21088294b45', 'Vat 2', 'BE4CB6FB-9D0F-457A-9D0F-D7948222EBB3', 1, 0, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `blood` varchar(10) NOT NULL,
  `age` int(2) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `image` varchar(50) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `active_status` int(10) NOT NULL DEFAULT '1',
  `created_by` varchar(100) NOT NULL,
  `deleted_by` varchar(255) DEFAULT NULL,
  `delete_status` int(10) NOT NULL DEFAULT '0',
  `user_type` int(11) NOT NULL DEFAULT '1',
  `default_branch` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `guid`, `username`, `password`, `first_name`, `last_name`, `address`, `sex`, `blood`, `age`, `city`, `state`, `zip`, `country`, `email`, `phone`, `image`, `dob`, `active_status`, `created_by`, `deleted_by`, `delete_status`, `user_type`, `default_branch`) VALUES
(3, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', 'slvpg', 'Male', '', 23, 'bangalore', 'karnada', '676809', 'india', 'jibi344443@yahoo.com', '7795398584', '10', '654739200', 1, '99', '0', 0, 2, '2'),
(50, 'a2da554fc03881e96b50685f3d60de70', 'sridhar', '64684ef5cc9e46a7fc3a5308d23a6ebc', 'sridhar', 'bala', '980', 'Male', '90', 89, '980', '098', '980', '980', 'sridhar@yahoo.com', '980908', '', '1396051200', 1, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', NULL, 0, 1, ''),
(51, '7c9888196685a12a83eecf9c0d05a525', 'monishp', '095747216da7caa0bb51502854665b83', 'monish ', ' km ', 'kanjirathukal ', 'Male', 'ab', 34, 'bangalore', 'karnadaka', '123', 'india', 'kmonish90@gmail.com', '7795386766', '', '889056000', 1, '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', NULL, 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `users_x_branches`
--

CREATE TABLE IF NOT EXISTS `users_x_branches` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(100) NOT NULL,
  `user_delete` int(11) NOT NULL DEFAULT '0',
  `user_active` int(11) NOT NULL DEFAULT '1',
  `deleted_by` varchar(255) DEFAULT NULL,
  `admin` int(101) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `users_x_branches`
--

INSERT INTO `users_x_branches` (`id`, `branch_id`, `user_id`, `user_delete`, `user_active`, `deleted_by`, `admin`) VALUES
(1, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 0, 1, '0', 101),
(51, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 'a2da554fc03881e96b50685f3d60de70', 0, 0, NULL, 1),
(52, 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', '7c9888196685a12a83eecf9c0d05a525', 0, 1, NULL, 1),
(53, '2307d083b4dc2d6476b05c96ef69a99b', '61F8FC7E-CB3F-4CC5-9EF2-4ED38DC992B4', 0, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_x_user_groups`
--

CREATE TABLE IF NOT EXISTS `users_x_user_groups` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `user_group_id` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `branch_id` varchar(255) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=159 ;

--
-- Dumping data for table `users_x_user_groups`
--

INSERT INTO `users_x_user_groups` (`id`, `user_group_id`, `user_id`, `branch_id`, `active_status`, `delete_status`) VALUES
(155, 'b6d767d2f8ed5d21a44b0e5886680cb9', 'a2da554fc03881e96b50685f3d60de70', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0),
(157, 'b6d767d2f8ed5d21a44b0e5886680cb9', '7c9888196685a12a83eecf9c0d05a525', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0),
(158, '37693cfc748049e45d87b8c7d8b9aacd', '7c9888196685a12a83eecf9c0d05a525', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) DEFAULT NULL,
  `group_name` varchar(100) NOT NULL,
  `branch_id` varchar(255) DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `guid`, `group_name`, `branch_id`, `active_status`, `delete_status`) VALUES
(22, 'b6d767d2f8ed5d21a44b0e5886680cb9', 'Art', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0),
(23, '37693cfc748049e45d87b8c7d8b9aacd', 'sales', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 1, 0),
(24, '1ff1de774005f8da13f42943881c655f', 'stock', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 1),
(25, '8e296a067a37563370ded05f5a3bf3ec', 'Manager', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 1),
(26, '4e732ced3463d06de0ca9a15b6153677', 'Account', 'BE4CB6FB-276C-457A-9D0F-D7948222EBB3', 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
