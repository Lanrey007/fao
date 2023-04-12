-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 06, 2023 at 09:56 AM
-- Server version: 10.3.38-MariaDB-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abummhpo_tinde`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `sid` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `phone`, `sid`) VALUES
(1, 'Faozulsub', '343dd95caef016fb7b5bad093f345828', 'admin', '08062130918', '234d342445d34'),
(2, 'AbumTech', 'c6f7591bfcc396b4c8ab468b0307b2c0', 'AbumTech', '00', '00681101');

-- --------------------------------------------------------

--
-- Table structure for table `airtelprice`
--

CREATE TABLE `airtelprice` (
  `id` int(1) NOT NULL,
  `air750mb` varchar(10) NOT NULL,
  `air1gb` varchar(10) NOT NULL,
  `air2gb` varchar(10) NOT NULL,
  `air3gb` varchar(10) NOT NULL,
  `air4gb` varchar(10) NOT NULL,
  `air6gb` varchar(10) NOT NULL,
  `air8gb` varchar(10) NOT NULL,
  `air11gb` varchar(10) NOT NULL,
  `air15gb` varchar(10) NOT NULL,
  `air40gb` varchar(10) NOT NULL,
  `air75gb` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `airtelprice`
--

INSERT INTO `airtelprice` (`id`, `air750mb`, `air1gb`, `air2gb`, `air3gb`, `air4gb`, `air6gb`, `air8gb`, `air11gb`, `air15gb`, `air40gb`, `air75gb`) VALUES
(1, '480', '960', '1152', '1440', '1940', '2400', '2860', '4050', '5160', '9600', '14000');

-- --------------------------------------------------------

--
-- Table structure for table `airtimeprice`
--

CREATE TABLE `airtimeprice` (
  `id` int(1) NOT NULL,
  `mtndiscount` varchar(3) NOT NULL,
  `glodiscount` varchar(3) NOT NULL,
  `airteldiscount` varchar(3) NOT NULL,
  `mobilediscount` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `airtimeprice`
--

INSERT INTO `airtimeprice` (`id`, `mtndiscount`, `glodiscount`, `airteldiscount`, `mobilediscount`) VALUES
(1, '2', '5', '5', '1');

-- --------------------------------------------------------

--
-- Table structure for table `dstvprice`
--

CREATE TABLE `dstvprice` (
  `id` int(1) NOT NULL,
  `dstv_yanga` int(50) NOT NULL,
  `dstv_confam` int(50) NOT NULL,
  `dstv_padi_extra` int(50) NOT NULL,
  `dstv_yanga_extra` int(50) NOT NULL,
  `dstv_asia` int(50) NOT NULL,
  `dstv_confam_extra` int(50) NOT NULL,
  `dstv_compact` int(50) NOT NULL,
  `dstv_compact_plus` int(50) NOT NULL,
  `dstv_premium` int(50) NOT NULL,
  `dstv_premium_asia` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dstvprice`
--

INSERT INTO `dstvprice` (`id`, `dstv_yanga`, `dstv_confam`, `dstv_padi_extra`, `dstv_yanga_extra`, `dstv_asia`, `dstv_confam_extra`, `dstv_compact`, `dstv_compact_plus`, `dstv_premium`, `dstv_premium_asia`) VALUES
(1, 2970, 5320, 4365, 5080, 6520, 7130, 9100, 14270, 21020, 21520);

-- --------------------------------------------------------

--
-- Table structure for table `electprice`
--

CREATE TABLE `electprice` (
  `id` int(1) NOT NULL,
  `aedc` int(7) NOT NULL,
  `ekedc` int(7) NOT NULL,
  `ibedc` int(7) NOT NULL,
  `ikedc` int(7) NOT NULL,
  `jed` int(7) NOT NULL,
  `kaedco` int(7) NOT NULL,
  `kedco` int(7) NOT NULL,
  `phed` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `electprice`
--

INSERT INTO `electprice` (`id`, `aedc`, `ekedc`, `ibedc`, `ikedc`, `jed`, `kaedco`, `kedco`, `phed`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `general_setting`
--

CREATE TABLE `general_setting` (
  `id` int(11) NOT NULL,
  `sitetitle` varchar(255) NOT NULL,
  `mtn_guest` varchar(255) NOT NULL,
  `glo_guest` varchar(255) NOT NULL,
  `airtel_guest` varchar(255) NOT NULL,
  `mobile_guest` varchar(500) NOT NULL,
  `contact_body` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `paystack_sk` varchar(255) NOT NULL,
  `paystack_pk` varchar(255) NOT NULL,
  `glo_n` varchar(255) NOT NULL,
  `mtn_n` varchar(255) NOT NULL,
  `airtel_n` varchar(255) NOT NULL,
  `mobile_n` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cable_prices` varchar(2552) NOT NULL,
  `simpin` int(30) NOT NULL,
  `airtelpin` int(4) NOT NULL,
  `mtn_gifting` varchar(2552) NOT NULL,
  `smsusername` varchar(255) NOT NULL,
  `smspassword` varchar(255) NOT NULL,
  `sms_sender` varchar(50) NOT NULL,
  `sms_token` varchar(500) NOT NULL,
  `whatsapp` varchar(30) NOT NULL,
  `m_discount` int(2) NOT NULL,
  `g_discount` int(2) NOT NULL,
  `a_discount` int(2) NOT NULL,
  `mo_discount` int(2) NOT NULL,
  `cable_charge` varchar(4) NOT NULL,
  `elect_charge` varchar(4) NOT NULL,
  `deposit_num` varchar(15) NOT NULL,
  `gladapi` varchar(300) NOT NULL,
  `mtnswitch` varchar(25) NOT NULL,
  `gloswitch` varchar(25) NOT NULL,
  `airtelswitch` varchar(25) NOT NULL,
  `mobileswitch` varchar(25) NOT NULL,
  `airtimeswitch` varchar(40) NOT NULL,
  `waec_price` varchar(7) NOT NULL,
  `neco_price` varchar(10) NOT NULL,
  `nabteb_price` varchar(10) NOT NULL,
  `a_discount2` varchar(7) NOT NULL,
  `g_discount2` varchar(7) NOT NULL,
  `mo_discount2` varchar(7) NOT NULL,
  `m_discount2` varchar(7) NOT NULL,
  `earner_price` varchar(5000) NOT NULL,
  `topuser_price` varchar(5000) NOT NULL,
  `affliate_price` varchar(5000) NOT NULL,
  `ambassador_price` varchar(5000) NOT NULL,
  `smile_bundle` varchar(5000) NOT NULL,
  `m_discount3` varchar(7) NOT NULL,
  `a_discount3` varchar(7) NOT NULL,
  `g_discount3` varchar(7) NOT NULL,
  `mo_discount3` varchar(7) NOT NULL,
  `mail_host` varchar(300) NOT NULL,
  `mail_user` varchar(300) NOT NULL,
  `mail_pass` varchar(300) NOT NULL,
  `mtn_server` varchar(300) NOT NULL,
  `glo_server` varchar(300) NOT NULL,
  `airtel_server` varchar(300) NOT NULL,
  `mobile_server` varchar(300) NOT NULL,
  `ussd_token` varchar(300) NOT NULL,
  `mtn_airtimepin` varchar(4) NOT NULL,
  `glo_airtimepin` varchar(4) NOT NULL,
  `airtel_airtimepin` varchar(4) NOT NULL,
  `mobile_airtimepin` varchar(4) NOT NULL,
  `vtpass_login` varchar(500) NOT NULL,
  `popup_msg` varchar(5000) NOT NULL,
  `mode` varchar(3) NOT NULL,
  `scroll_msg` varchar(5000) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `theme_color` varchar(100) NOT NULL,
  `tv_switch` varchar(25) NOT NULL,
  `elect_switch` varchar(25) NOT NULL,
  `edu_switch` varchar(25) NOT NULL,
  `gifting_switch` varchar(25) NOT NULL,
  `airtelcgswitch` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `general_setting`
--

INSERT INTO `general_setting` (`id`, `sitetitle`, `mtn_guest`, `glo_guest`, `airtel_guest`, `mobile_guest`, `contact_body`, `contact_number`, `paystack_sk`, `paystack_pk`, `glo_n`, `mtn_n`, `airtel_n`, `mobile_n`, `cable_prices`, `simpin`, `airtelpin`, `mtn_gifting`, `smsusername`, `smspassword`, `sms_sender`, `sms_token`, `whatsapp`, `m_discount`, `g_discount`, `a_discount`, `mo_discount`, `cable_charge`, `elect_charge`, `deposit_num`, `gladapi`, `mtnswitch`, `gloswitch`, `airtelswitch`, `mobileswitch`, `airtimeswitch`, `waec_price`, `neco_price`, `nabteb_price`, `a_discount2`, `g_discount2`, `mo_discount2`, `m_discount2`, `earner_price`, `topuser_price`, `affliate_price`, `ambassador_price`, `smile_bundle`, `m_discount3`, `a_discount3`, `g_discount3`, `mo_discount3`, `mail_host`, `mail_user`, `mail_pass`, `mtn_server`, `glo_server`, `airtel_server`, `mobile_server`, `ussd_token`, `mtn_airtimepin`, `glo_airtimepin`, `airtel_airtimepin`, `mobile_airtimepin`, `vtpass_login`, `popup_msg`, `mode`, `scroll_msg`, `admin_email`, `theme_color`, `tv_switch`, `elect_switch`, `edu_switch`, `gifting_switch`, `airtelcgswitch`) VALUES
(1, 'Sitename', '250', '460', '490', '299', 'Address', '23480621309', '00', '00', '08062130918', '08062130918', '08062130918', '08062130918', 'countryLists[\"GOTV\"] = [\"Gotv Max=â‚¦4150\",\"Gotv Jinja=â‚¦1900\",\"Gotv Jolli=â‚¦2800\",\"GOtv Smallie=â‚¦900\"]; \r\n\r\n\r\ncountryLists[\"DSTV\"]= [\"Dstv Padi=â‚¦2,150\",\r\n\"Dstv Yanga=â‚¦2,950\",\r\n\"Dstv Confam=â‚¦5,300\",\r\n\"Dstv Padi Extra=â‚¦4,350\",\r\n\"Dstv Yanga Extra=â‚¦5,065\",\r\n\"Dstv Asia=â‚¦6,200\",\r\n\"DStv Confam Extra=â‚¦7,115\",\r\n\"Dstv Compact=â‚¦9,000\",\r\n\"Dstv Compact Plus=â‚¦14,250\",\r\n\"Dstv Premium=â‚¦18,400\",\"Dstv Premium Asia=â‚¦20,500\"]; \r\n\r\ncountryLists[\"STARTIMES\"] = [\"Nova Weekly=â‚¦300\",\r\n\"Nova Monthly=â‚¦900\",\r\n\"Basic Weekly=â‚¦600\",\r\n\"Basic Monthly=â‚¦1,850\",\r\n\"Smart Weekly=â‚¦700\",\r\n\"Smart Monthly=â‚¦2,600\",\r\n\"Classic Weekly=â‚¦1,200\",\"Classic Monthly=â‚¦2,750\",\r\n\"Super Weekly=â‚¦1,500\",\r\n\"Super Monthly=â‚¦4,900\"];', 0, 0, '', '00', '00', '00', '00', '2348062130918', 1, 1, 1, 1, '50', '50', '2348062130918', '00', 'buy_mtn3.php', 'buy_glo3.php', 'buy_airtel3.php', 'buy_mobile3.php', 'buy_vtu3.php', '1750', '850', '900', '4', '7', '6', '4', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                countryLists[\"MTN\"]=[\"500MB=N140\", \"1GB=N280\", \"2GB=N560\", \"3GB=N840\", \"5GB=N1,400\", \"10GB=N2800\"];\r\n\r\ncountryLists[\"MTN2\"]=[\"500MB=N140\", \"1GB=N280\", \"2GB=N560\", \"3GB=N840\", \"5GB=N1,400\", \"10GB=N2800\"];\r\n\r\ncountryLists[\"GLO\"]=[\"920MB=N480\", \"1.84GB=N980\",  \"4.5GB=N1,900\", \"7.2GB=N2,650\", \"8.75GB=N3,560\", \"12.5GB=N4,425\", \"15.5GB=N7,020\",\"25GB=N8,750\",\"32GB=N13,150\"];\r\n\r\n countryLists[\"AIRTEL_CG\"]=[\"100MB (Weekly) = N80\",\"300MB (Weekly) = N180\",\"500MB (Monthly) = N360\",\"1GB (Monthly) = N500\",\"2GB (Monthly) = N900\",\"5GB (Monthly) = N2100\"];\r\n\r\ncountryLists[\"9MOBILE\"]=[\"500MB=N430\", \"1.5GB=N750\", \"2GB=N1050\", \"3GB=N1,200\", \"4.5GB=N1,600\", \"11GB=N3,200\", \"15.5GB=N3,950\", \"40GB=N7,900\",\"75GB=N12,050\"];\r\n\r\ncountryLists[\"GIFTING\"]=[\"1GB = N300\",\"2GB = N600\",\"3GB = N900\",\"5GB = N1500\",\"10GB = N3000\",\"15GB = N4500\",\"20GB = N6000\",\"40GB = 12000\"];  \r\n\r\n\r\ncountryLists[\"AIRTEL\"]=[\"750MB = N450\",\"1.5GB = N900\",\"3GB = N1350\",\"4.5GB = N1800\",\"6GB = N2250\",\"10GB = N2700\",\"11GB = N3600\",\"20GB = N4500\",\"40GB = N9000\",\"75GB = N13500\"]; \r\n\r\n countryLists[\"9MOBILE_SME\"]=[\"1GB=N750\", \"2GB=N1050\", \"3GB=N1,200\", \"4GB=N1,600\", \"5GB=N3,200\", \"10GB=N3,950\"];\r\n\r\ncountryLists[\"GLO_CG\"]=[\"200MB=N456\",\"500MB=N185\", \"1GB=N235\", \"2GB=N470\", \"3GB=N705\", \"5GB=N1175\",\"10GB=N9765\"] ;\r\n                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 ', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        countryLists[\"MTN\"]=[\"500MB=N135\", \"1GB=N255\", \"2GB=N510\", \"3GB=N765\", \"5GB=N1,275\", \"10GB=N2550\"];\r\n\r\ncountryLists[\"MTN2\"]=[\"500MB=N140\", \"1GB=N280\", \"2GB=N560\", \"3GB=N840\", \"5GB=N1,400\", \"10GB=N2800\"];\r\n\r\ncountryLists[\"GLO\"]=[\"920MB=N460\", \"1.84GB=N885\",  \"4.5GB=N1,760\", \"7.2GB=N2,650\", \"8.75GB=N3560,\", \"12.5GB=N4,425\", \"15.5GB=N7,080\",\"25GB=N8,860\",\"32GB=N13,150\"];\r\n\r\n countryLists[\"AIRTEL_CG\"]=[\"100MB (Weekly) = N80\",\"300MB (Weekly) = N180\",\"500MB (Monthly) = N360\",\"1GB (Monthly) = N500\",\"2GB (Monthly) = N900\",\"5GB (Monthly) = N2100\"];\r\n\r\ncountryLists[\"9MOBILE\"]=[\"500MB=N430\", \"1.5GB=N750\", \"2GB=N950\", \"3GB=N1,120\", \"4.5GB=N1,570\", \"11GB=N3,100\", \"15.5GB=N3,800\", \"40GB=N7,610\",\"75GB=N11,900\"];\r\n\r\ncountryLists[\"GIFTING\"]=[\"1GB = N270\",\"2GB = N540\",\"3GB = N810\",\"5GB = N1350\",\"10GB = N2700\",\"15GB = N4050\",\"20GB = N5400\",\"40GB = N10800\"]; \r\n\r\n\r\ncountryLists[\"AIRTEL\"]=[\"750MB = N450\",\"1.5GB = N900\",\"3GB = N1350\",\"4.5GB = N1800\",\"6GB = N2250\",\"10GB = N2700\",\"11GB = N3600\",\"20GB = N4500\",\"40GB = N9000\",\"75GB = N13500\"];  \r\n\r\ncountryLists[\"9MOBILE_SME\"]=[\"1GB=N750\", \"2GB=N1050\", \"3GB=N1,200\", \"4GB=N1,600\", \"5GB=N3,200\", \"10GB=N3,950\"];\r\n\r\ncountryLists[\"GLO_CG\"]=[\"200MB=N456\",\"500MB=N185\", \"1GB=N235\", \"2GB=N470\", \"3GB=N705\", \"5GB=N1175\",\"10GB=N9765\"] ;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           ', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                countryLists[\"MTN\"]=[\"500MB=N140\", \"1GB=N270\", \"2GB=N540\", \"3GB=N810\", \"5GB=N1,350\", \"10GB=N2700\"];\r\n\r\ncountryLists[\"MTN2\"]=[\"500MB=N140\", \"1GB=N280\", \"2GB=N560\", \"3GB=N840\", \"5GB=N1,400\", \"10GB=N2800\"];\r\n\r\ncountryLists[\"GLO\"]=[\"920MB=N480\", \"1.84GB=N980\",  \"4.5GB=N1,930\", \"7.2GB=N2,650\", \"8.75GB=N3600,\", \"12.5GB=N4,450\", \"15.5GB=N7,020\",\"25GB=N8,750\",\"32GB=N13,150\"];\r\n\r\n countryLists[\"AIRTEL_CG\"]=[\"100MB (Weekly) = N80\",\"300MB (Weekly) = N180\",\"500MB (Monthly) = N360\",\"1GB (Monthly) = N500\",\"2GB (Monthly) = N900\",\"5GB (Monthly) = N2100\"];\r\n\r\ncountryLists[\"9MOBILE\"]=[\"500MB=N480\", \"1.5GB=N880\", \"2GB=N1050\", \"3GB=N1,300\", \"4.5GB=N1,700\", \"11GB=N3,400\", \"15.5GB=N4,400\", \"40GB=N8,500\",\"75GB=N12,500\"];\r\n\r\ncountryLists[\"GIFTING\"]=[\"1GB = N300\",\"2GB = N600\",\"3GB = N900\",\"5GB = N1500\",\"10GB = N3000\",\"15GB = N4500\",\"20GB = N6000\",\"40GB = 12000\"];    \r\n\r\n\r\ncountryLists[\"AIRTEL\"]=[\"750MB = N450\",\"1.5GB = N900\",\"3GB = N1350\",\"4.5GB = N1800\",\"6GB = N2250\",\"10GB = N2700\",\"11GB = N3600\",\"20GB = N4500\",\"40GB = N9000\",\"75GB = N13500\"]; \r\n\r\ncountryLists[\"9MOBILE_SME\"]=[\"1GB=N750\", \"2GB=N1050\", \"3GB=N1,200\", \"4GB=N1,600\", \"5GB=N3,200\", \"10GB=N3,950\"];\r\n\r\ncountryLists[\"GLO_CG\"]=[\"200MB=N456\",\"500MB=N185\", \"1GB=N235\", \"2GB=N470\", \"3GB=N705\", \"5GB=N1175\",\"10GB=N9765\"] ;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   ', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   countryLists[\"MTN\"]=[\"500MB=N130\", \"1GB=N235\", \"2GB=N470\", \"3GB=N705\", \"5GB=N1,175\", \"10GB=N2350\"];\r\n\r\ncountryLists[\"MTN2\"]=[\"500MB=N140\", \"1GB=N280\", \"2GB=N560\", \"3GB=N840\", \"5GB=N1,400\", \"10GB=N2800\"];\r\n\r\ncountryLists[\"GLO\"]=[\"920MB=N460\", \"1.84GB=N885\",  \"4.5GB=N1,760\", \"7.2GB=N2,650\", \"8.75GB=N3560,\", \"12.5GB=N4,425\", \"15.5GB=N7,080\",\"25GB=N8,860\",\"32GB=N13,150\"];\r\n\r\ncountryLists[\"AIRTEL_CG\"]=[\"100MB (Weekly) = N80\",\"300MB (Weekly) = N180\",\"500MB (Monthly) = N360\",\"1GB (Monthly) = N500\",\"2GB (Monthly) = N900\",\"5GB (Monthly) = N2100\"];\r\n\r\n\r\ncountryLists[\"9MOBILE\"]=[\"500MB=N430\", \"1.5GB=N750\", \"2GB=N950\", \"3GB=N1,120\", \"4.5GB=N1,570\", \"11GB=N3,100\", \"15.5GB=N3,800\", \"40GB=N7,610\",\"75GB=N11,900\"];\r\n\r\ncountryLists[\"GIFTING\"]=[\"1GB = N250\",\"2GB = N500\",\"3GB = N750\",\"5GB = N1250\",\"10GB = N2500\",\"15GB = N3750\",\"20GB = N5000\",\"40GB = 10000\"];\r\n\r\ncountryLists[\"AIRTEL\"]=[\"750MB = N450\",\"1.5GB = N900\",\"3GB = N1350\",\"4.5GB = N1800\",\"6GB = N2250\",\"10GB = N2700\",\"11GB = N3600\",\"20GB = N4500\",\"40GB = N9000\",\"75GB = N13500\"]; \r\n\r\ncountryLists[\"9MOBILE_SME\"]=[\"1GB=N750\", \"2GB=N1050\", \"3GB=N1,200\", \"4GB=N1,600\", \"5GB=N3,200\", \"10GB=N3,950\"];\r\n\r\ncountryLists[\"GLO_CG\"]=[\"200MB=N456\",\"500MB=N185\", \"1GB=N235\", \"2GB=N470\", \"3GB=N705\", \"5GB=N1175\",\"10GB=N9765\"] ;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ', '', '15', '15', '25', '25', 'sitelink', 'noreply@website.com.ng', 'Data_plug098#', '', '', '', '', '', '0000', '0000', '0000', '0000', '00', '                                                                                                                                                                        Welcome to  DATA platform where you can your MTN DATA as low as #235 per GB when you upgrade your user account to the Top users\r\nThanks for choosing DATA SERVICE                                                                                                                                                                                             ', 'ON', 'Welcome to  DATA SERVICE                                            ', '@gmail.com', '', 'tv_vtpass.php', 'elect_vtpass.php', 'edu_vtpass.php', 'buy_gift3.php', 'buy_cairtel3.php');

-- --------------------------------------------------------

--
-- Table structure for table `giftingprice`
--

CREATE TABLE `giftingprice` (
  `id` int(1) NOT NULL,
  `mtn500mb` varchar(10) NOT NULL,
  `mtn1gb` varchar(10) NOT NULL,
  `mtn2gb` varchar(10) NOT NULL,
  `mtn3gb` varchar(10) NOT NULL,
  `mtn5gb` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `giftingprice`
--

INSERT INTO `giftingprice` (`id`, `mtn500mb`, `mtn1gb`, `mtn2gb`, `mtn3gb`, `mtn5gb`) VALUES
(1, '150', '270', '499', '770', '1250');

-- --------------------------------------------------------

--
-- Table structure for table `gloprice`
--

CREATE TABLE `gloprice` (
  `id` int(1) NOT NULL,
  `glo920mb` varchar(10) NOT NULL,
  `glo1gb` varchar(10) NOT NULL,
  `glo4gb` varchar(10) NOT NULL,
  `glo7gb` varchar(10) NOT NULL,
  `glo8gb` varchar(10) NOT NULL,
  `glo12gb` varchar(10) NOT NULL,
  `glo15gb` varchar(10) NOT NULL,
  `glo25gb` varchar(10) NOT NULL,
  `glo32gb` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gloprice`
--

INSERT INTO `gloprice` (`id`, `glo920mb`, `glo1gb`, `glo4gb`, `glo7gb`, `glo8gb`, `glo12gb`, `glo15gb`, `glo25gb`, `glo32gb`) VALUES
(1, '560', '880', '1750', '2700', '3490', '4495', '4795', '8800', '13200');

-- --------------------------------------------------------

--
-- Table structure for table `gotvprice`
--

CREATE TABLE `gotvprice` (
  `id` int(1) NOT NULL,
  `gotv_max` int(50) NOT NULL,
  `gotv_jinja` int(50) NOT NULL,
  `gotv_jolli` int(50) NOT NULL,
  `gotv_smallie` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gotvprice`
--

INSERT INTO `gotvprice` (`id`, `gotv_max`, `gotv_jinja`, `gotv_jolli`, `gotv_smallie`) VALUES
(1, 4200, 1950, 2850, 950);

-- --------------------------------------------------------

--
-- Table structure for table `locker`
--

CREATE TABLE `locker` (
  `id` int(1) NOT NULL,
  `mtn_airtime` varchar(3) NOT NULL,
  `glo_airtime` varchar(3) NOT NULL,
  `airtel_airtime` varchar(3) NOT NULL,
  `mobile_airtime` varchar(3) NOT NULL,
  `mtn_data` varchar(3) NOT NULL,
  `glo_data` varchar(3) NOT NULL,
  `airtel_data` varchar(3) NOT NULL,
  `mobile_data` varchar(3) NOT NULL,
  `mobile_data2` varchar(4) NOT NULL,
  `cable_lock` varchar(3) NOT NULL,
  `AEDC` varchar(3) NOT NULL,
  `IBEDC` varchar(3) NOT NULL,
  `EKEDC` varchar(3) NOT NULL,
  `IKEDC` varchar(3) NOT NULL,
  `PHED` varchar(3) NOT NULL,
  `JED` varchar(3) NOT NULL,
  `KAEDCO` varchar(3) NOT NULL,
  `KEDCO` varchar(3) NOT NULL,
  `WAEC` varchar(3) NOT NULL,
  `NECO` varchar(10) NOT NULL,
  `NABTEB` varchar(10) NOT NULL,
  `mtn_share` varchar(3) NOT NULL,
  `glo_share` varchar(3) NOT NULL,
  `airtel_share` varchar(3) NOT NULL,
  `mobile_share` varchar(3) NOT NULL,
  `dstv` varchar(3) NOT NULL,
  `gotv` varchar(3) NOT NULL,
  `startime` varchar(3) NOT NULL,
  `MONNIFY` varchar(3) NOT NULL,
  `PAYSTACK` varchar(3) NOT NULL,
  `gifting_lock` varchar(3) NOT NULL,
  `mtn_data2` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `locker`
--

INSERT INTO `locker` (`id`, `mtn_airtime`, `glo_airtime`, `airtel_airtime`, `mobile_airtime`, `mtn_data`, `glo_data`, `airtel_data`, `mobile_data`, `mobile_data2`, `cable_lock`, `AEDC`, `IBEDC`, `EKEDC`, `IKEDC`, `PHED`, `JED`, `KAEDCO`, `KEDCO`, `WAEC`, `NECO`, `NABTEB`, `mtn_share`, `glo_share`, `airtel_share`, `mobile_share`, `dstv`, `gotv`, `startime`, `MONNIFY`, `PAYSTACK`, `gifting_lock`, `mtn_data2`) VALUES
(1, 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON');

-- --------------------------------------------------------

--
-- Table structure for table `mobileprice`
--

CREATE TABLE `mobileprice` (
  `id` int(1) NOT NULL,
  `9mb500mb` varchar(10) NOT NULL,
  `9mb1gb` varchar(10) NOT NULL,
  `9mb2gb` varchar(10) NOT NULL,
  `9mb3gb` varchar(10) NOT NULL,
  `9mb4gb` varchar(10) NOT NULL,
  `9mb11gb` varchar(10) NOT NULL,
  `9mb15gb` varchar(10) NOT NULL,
  `9mb40gb` varchar(10) NOT NULL,
  `9mb75gb` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mobileprice`
--

INSERT INTO `mobileprice` (`id`, `9mb500mb`, `9mb1gb`, `9mb2gb`, `9mb3gb`, `9mb4gb`, `9mb11gb`, `9mb15gb`, `9mb40gb`, `9mb75gb`) VALUES
(1, '400', '700', '950', '1100', '1550', '3100', '4000', '8000', '13800');

-- --------------------------------------------------------

--
-- Table structure for table `mtnprice`
--

CREATE TABLE `mtnprice` (
  `id` int(1) NOT NULL,
  `mtn500mb` varchar(10) NOT NULL,
  `mtn1gb` varchar(10) NOT NULL,
  `mtn2gb` varchar(10) NOT NULL,
  `mtn3gb` varchar(10) NOT NULL,
  `mtn5gb` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mtnprice`
--

INSERT INTO `mtnprice` (`id`, `mtn500mb`, `mtn1gb`, `mtn2gb`, `mtn3gb`, `mtn5gb`) VALUES
(1, '150', '270', '499', '770', '1250');

-- --------------------------------------------------------

--
-- Table structure for table `mytransaction`
--

CREATE TABLE `mytransaction` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(225) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `descr` varchar(2552) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  `trx` varchar(255) NOT NULL,
  `oldbal` varchar(255) NOT NULL,
  `newbal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `mytransaction`
--

INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`, `oldbal`, `newbal`) VALUES
(1, 'general@gmail.com', 'Admin', '130', 'Unsuccessful Data MTN 500MB to 07033614175', 'Unsuccessful', '30-Mar-23  07:44 PM', 'WEB', '87282067841', '15000', '15000'),
(2, 'general@gmail.com', 'Admin', '130', 'Unsuccessful Data MTN 500MB to 07033614175', 'Unsuccessful', '30-Mar-23  07:44 PM', 'WEB', '54458394419', '15000', '15000');

-- --------------------------------------------------------

--
-- Table structure for table `startimeprice`
--

CREATE TABLE `startimeprice` (
  `id` int(11) NOT NULL,
  `nova_week` int(11) NOT NULL,
  `nova_month` int(11) NOT NULL,
  `basic_week` int(11) NOT NULL,
  `basic_month` int(11) NOT NULL,
  `smart_week` int(11) NOT NULL,
  `smart_month` int(11) NOT NULL,
  `classic_week` int(11) NOT NULL,
  `classic_month` int(11) NOT NULL,
  `super_week` int(11) NOT NULL,
  `super_month` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `startimeprice`
--

INSERT INTO `startimeprice` (`id`, `nova_week`, `nova_month`, `basic_week`, `basic_month`, `smart_week`, `smart_month`, `classic_week`, `classic_month`, `super_week`, `super_month`) VALUES
(1, 315, 920, 615, 1710, 2215, 2200, 1210, 2510, 1510, 4210);

-- --------------------------------------------------------

--
-- Table structure for table `system_recharge`
--

CREATE TABLE `system_recharge` (
  `id` int(10) NOT NULL,
  `service` varchar(2000) NOT NULL,
  `buying` varchar(500) NOT NULL,
  `recharge_phone` varchar(100) NOT NULL,
  `buyer_id` varchar(100) NOT NULL,
  `buyer_email` varchar(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `pre_balance` varchar(100) NOT NULL,
  `post_balance` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `trx` varchar(100) NOT NULL,
  `discount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `system_recharge`
--

INSERT INTO `system_recharge` (`id`, `service`, `buying`, `recharge_phone`, `buyer_id`, `buyer_email`, `amount`, `pre_balance`, `post_balance`, `time`, `status`, `trx`, `discount`) VALUES
(1, 'MTN', 'MTN  100 Airtime Purchase on 08011111111', '08011111111', 'uj7deb775c5117fa22e7a134744584e1', 'general@gmail.com', 99, '20699', '20600', '25-Dec-22  04:52 PM', 'Pending', '58063A871A709E5CAP', 1),
(2, 'GLO', 'GLO  100 Airtime Purchase on 08011111111', '08011111111', 'uj7deb775c5117fa22e7a134744584e1', 'general@gmail.com', 99, '20600', '20501', '25-Dec-22  04:52 PM', 'Pending', '76663A871BAA0D3EAP', 1),
(3, 'AIRTEL', 'AIRTEL  100 Airtime Purchase on 08011111111', '08011111111', 'uj7deb775c5117fa22e7a134744584e1', 'general@gmail.com', 99, '20501', '20402', '25-Dec-22  04:52 PM', 'Pending', '45463A871CD4BEF3AP', 1),
(4, 'ETISALAT', 'ETISALAT  100 Airtime Purchase on 08011111111', '08011111111', 'uj7deb775c5117fa22e7a134744584e1', 'general@gmail.com', 99, '20402', '20303', '25-Dec-22  04:53 PM', 'Pending', '54263A871E5AD307AP', 1);

-- --------------------------------------------------------

--
-- Table structure for table `system_suspend`
--

CREATE TABLE `system_suspend` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `reason` varchar(500) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `refcode` varchar(255) NOT NULL,
  `referredby` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `us_wallets` varchar(255) NOT NULL DEFAULT '0',
  `us_bonus` int(10) NOT NULL,
  `block` varchar(255) NOT NULL DEFAULT '0',
  `sid` varchar(255) DEFAULT '0',
  `report` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
  `ceov` varchar(30) NOT NULL,
  `activate` int(10) NOT NULL,
  `LastLogin` varchar(255) DEFAULT '0',
  `emailR` varchar(255) NOT NULL DEFAULT 'general@gmail.com',
  `token` varchar(500) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `account_number` varchar(100) NOT NULL,
  `gen_bank` varchar(100) NOT NULL,
  `ref` varchar(100) NOT NULL,
  `reg_active` int(1) NOT NULL,
  `reg_date` varchar(100) NOT NULL,
  `wema` varchar(25) NOT NULL,
  `sterling` varchar(25) NOT NULL,
  `monie` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `refcode`, `referredby`, `mobile`, `email`, `password`, `us_wallets`, `us_bonus`, `block`, `sid`, `report`, `ceov`, `activate`, `LastLogin`, `emailR`, `token`, `bank_name`, `account_name`, `account_number`, `gen_bank`, `ref`, `reg_active`, `reg_date`, `wema`, `sterling`, `monie`) VALUES
(1, 'Admin', 'Admin', 'admin', 'Admin', '08062130918', 'Admin', '1b592fa7989ec616fe1d5bba2dbdba7f', '15000', 0, '0', 'uj7deb775c5117fa22e7a134744584e1', '92', 'ambassador', 1, '10-May-22  12:13 AM', 'general@gmail.com', '', '', '', '', 'ACTIVE', '', 1, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `waec_neco_price`
--

CREATE TABLE `waec_neco_price` (
  `id` int(1) NOT NULL,
  `waec_price` varchar(7) NOT NULL,
  `neco_price` varchar(7) NOT NULL,
  `nabteb_price` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `waec_neco_price`
--

INSERT INTO `waec_neco_price` (`id`, `waec_price`, `neco_price`, `nabteb_price`) VALUES
(1, '1755', '790', '795');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `airtelprice`
--
ALTER TABLE `airtelprice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `airtimeprice`
--
ALTER TABLE `airtimeprice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dstvprice`
--
ALTER TABLE `dstvprice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `electprice`
--
ALTER TABLE `electprice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_setting`
--
ALTER TABLE `general_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giftingprice`
--
ALTER TABLE `giftingprice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gloprice`
--
ALTER TABLE `gloprice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gotvprice`
--
ALTER TABLE `gotvprice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locker`
--
ALTER TABLE `locker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobileprice`
--
ALTER TABLE `mobileprice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mtnprice`
--
ALTER TABLE `mtnprice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mytransaction`
--
ALTER TABLE `mytransaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `startimeprice`
--
ALTER TABLE `startimeprice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_recharge`
--
ALTER TABLE `system_recharge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_suspend`
--
ALTER TABLE `system_suspend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `waec_neco_price`
--
ALTER TABLE `waec_neco_price`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `airtelprice`
--
ALTER TABLE `airtelprice`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `airtimeprice`
--
ALTER TABLE `airtimeprice`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dstvprice`
--
ALTER TABLE `dstvprice`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `electprice`
--
ALTER TABLE `electprice`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `general_setting`
--
ALTER TABLE `general_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `giftingprice`
--
ALTER TABLE `giftingprice`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gloprice`
--
ALTER TABLE `gloprice`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gotvprice`
--
ALTER TABLE `gotvprice`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `locker`
--
ALTER TABLE `locker`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mobileprice`
--
ALTER TABLE `mobileprice`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mtnprice`
--
ALTER TABLE `mtnprice`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mytransaction`
--
ALTER TABLE `mytransaction`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `startimeprice`
--
ALTER TABLE `startimeprice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `system_recharge`
--
ALTER TABLE `system_recharge`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `system_suspend`
--
ALTER TABLE `system_suspend`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=538;

--
-- AUTO_INCREMENT for table `waec_neco_price`
--
ALTER TABLE `waec_neco_price`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
