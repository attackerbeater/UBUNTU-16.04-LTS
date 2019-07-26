-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 24, 2019 at 05:42 PM
-- Server version: 5.6.43-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Beltechnology_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `batchinfo`
--

CREATE TABLE `batchinfo` (
  `rowid` int(11) NOT NULL,
  `datapath` mediumtext,
  `analysistime` varchar(50) DEFAULT NULL,
  `reporttime` varchar(50) DEFAULT NULL,
  `lastcalib` varchar(50) DEFAULT NULL,
  `analystname` varchar(150) DEFAULT NULL,
  `reportname` varchar(150) DEFAULT NULL,
  `batchstate` varchar(150) DEFAULT NULL,
  `instrument` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batchinfo`
--

INSERT INTO `batchinfo` (`rowid`, `datapath`, `analysistime`, `reporttime`, `lastcalib`, `analystname`, `reportname`, `batchstate`, `instrument`) VALUES
(100001, 'yiuyui', 'yui', 'yui', 'yuiy', 'iuy', 'iu', 'yiu', 'y'),
(100002, 'uiou', 'iou', 'iou', 'io', 'uio', 'u', 'iou', 'iou'),
(100003, 'jklj', 'kjkj', 'klj', 'klj', 'kl', 'jklj', 'klj', 'kl'),
(100004, 'kjklj', 'kjklj', 'klj', 'lk', 'jklj', 'kl', 'jkl', 'j'),
(100005, 'uiuoi', 'uio', 'uio', 'u', 'iou', 'iu', 'io', 'uio'),
(100006, 'u', 'iou', 'io', 'uio', 'uio', 'u', 'oiu', 'oi'),
(100007, 'oiuoiu', 'oiu', 'iou', 'io', 'uio', 'uio', 'uiou', 'iou'),
(100008, 'uio', 'u', 'iou', 'io', 'uio', 'uio', 'u', 'iou'),
(100009, 'kljlkj', 'klj', 'kl', 'jkl', 'j', 'klj', 'kl', 'jkl'),
(100010, 'jl', 'kj', 'kj', 'kl', 'jkl', 'jkl', 'jklj', 'kl'),
(100011, 'yiuyui', 'yui', 'y', 'uiy', 'ui', 'yui', 'yuiy', 'uiy'),
(100012, 'yui', 'y', 'uiy', 'uiy', 'ui', 'yiu', 'y', 'uiy'),
(100013, 'yutuy', 'tuy', 'tuy', 'tuyt', 'uyt', 'uy', 'tuy', 'tyut'),
(100014, 'uy', 'tuyt', 'uyt', 'uy', 'tuy', 'tyt', 'uyt', 'uy'),
(100015, 'yiuyiuy', 'uy', 'uy', 'ui', 'yui', 'y', 'uiy', 'uiy'),
(100016, 'yui', 'yuiy', 'ui', 'yui', 'yuiy', 'uy', 'uiy', 'ui'),
(100017, 'yiuyiuy', 'uiy', 'iu', 'yui', 'yiuy', 'ui', 'yuiy', 'ui'),
(100018, 'y', 'uiy', 'iu', 'yiu', 'yuiy', 'iu', 'yiu', 'yi'),
(100019, 'yiuyiuy', 'yi', 'uyiu', 'y', 'uiy', 'ui', 'yui', 'yui'),
(100020, 'iuy', 'ui', 'yiu', 'yui', 'y', 'uiy', 'uiy', 'i'),
(100021, 'iuiuio', 'uoiu', 'io', 'uoi', 'u', 'iou', 'io', 'ui'),
(100022, 'iou', 'io', 'uio', 'u', 'iou', 'oi', 'uoi', 'u'),
(100023, 'uhhiuyui', 'yui', 'yu', 'uiy', 'ui', 'yui', 'yui', 'y'),
(100024, 'uiui', 'ui', 'uio', 'u', 'oiu', 'io', 'uio', 'uio'),
(100025, 'yuiyui', 'y', 'uy', 'uiy', 'ui', 'yui', 'yuiyuyi', 'uyuiy'),
(100026, 'ui', 'yui', 'yui', 'y', 'uiyui', 'yui', 'yui', 'y'),
(100027, 'yuiyuiy', 'y', 'uiy', 'ui', 'yui', 'y', 'uiy', NULL),
(100028, 'kjkklu', 'iu', 'iou', 'io', 'uio', 'uio', 'u', 'oiu');

-- --------------------------------------------------------

--
-- Table structure for table `klantens`
--

CREATE TABLE `klantens` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `company_primary_contact` varchar(100) DEFAULT NULL,
  `company_street` varchar(100) DEFAULT NULL,
  `company_number` varchar(100) DEFAULT NULL,
  `company_country` varchar(100) DEFAULT NULL,
  `company_city` varchar(100) DEFAULT NULL,
  `company_zip` varchar(100) DEFAULT NULL,
  `ban` varchar(100) DEFAULT NULL,
  `vn` varchar(100) DEFAULT NULL,
  `company_email` varchar(100) DEFAULT NULL,
  `company_telephone` varchar(100) DEFAULT NULL,
  `company_general_fax` varchar(100) DEFAULT NULL,
  `company_rate` varchar(100) DEFAULT NULL,
  `company_sector` varchar(100) DEFAULT NULL,
  `contact_person_last_name` varchar(100) DEFAULT NULL,
  `contact_person_first_name` varchar(100) DEFAULT NULL,
  `contact_person_function` varchar(100) DEFAULT NULL,
  `contact_person_email` varchar(100) DEFAULT NULL,
  `contact_person_telephone` varchar(100) DEFAULT NULL,
  `contact_first_name` varchar(100) DEFAULT NULL,
  `contact_lastname` varchar(100) DEFAULT NULL,
  `contact_email` varchar(100) DEFAULT NULL,
  `contact_telephone` varchar(100) DEFAULT NULL,
  `contact_function` varchar(100) DEFAULT NULL,
  `client_reference_number` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klantens`
--

INSERT INTO `klantens` (`id`, `company_name`, `company_primary_contact`, `company_street`, `company_number`, `company_country`, `company_city`, `company_zip`, `ban`, `vn`, `company_email`, `company_telephone`, `company_general_fax`, `company_rate`, `company_sector`, `contact_person_last_name`, `contact_person_first_name`, `contact_person_function`, `contact_person_email`, `contact_person_telephone`, `contact_first_name`, `contact_lastname`, `contact_email`, `contact_telephone`, `contact_function`, `client_reference_number`, `created_at`, `updated_at`) VALUES
(00001, 'Client 0307', '', 'Kortrijksesteenweg 0307', '', 'BE', 'Gent', '90000', 'BE0307', 'VAT0307', '0307@client.com', '09/0307', 'Fax0307', '', 'Sector 0307', '2First 0307,', '2last 0307,', 'Function0307,', '2first@iez.do,', 'Tel2fist0307,', 'First 0307', 'Last 0307', 'jan@pice.io', 'Tel0307', 'Function0307', '', '2018-07-03 21:01:34', '2019-02-04 02:34:32'),
(00002, 'Online Store', '', 'online store street 123 village.', '5361234', 'Belgium', 'Antwerp', '8080', '1234', 'GB 587.4439.90', 'junsayjohn4@gmail.com', '5361234', '1234', '', 'CEO', 'Wilson,Rivera', 'Georgina,Marian', 'secretary 1,secretary 2', 'junsayjohn4secretary1@gmail.com,junsayjohn4secretary2@gmail.com', '5361234,5361234', 'F.Arriet st San Nicolas Bay Laguna', 'Junsay', 'junsayjohn4@gmail.com', '5361234', 'CEO', '', '2018-02-24 21:42:06', '2019-02-04 02:39:24'),
(00003, 'FLOWTRONIC PUMPS LTD.', '', 'Brighton Road 7', '7', 'BELGIUM 1', 'West Sussex', 'Bolney RH175NA', '123456', 'GB 587.4439.90', 'junsayjohn4@gmail.com', '5361234', '123', '', 'CEO', '', '', '', '', '', 'John', 'Junsay', 'junsayjohn4@gmail.com', '5361234', 'CEO', 'BO/EVH/0808/17Z595', '2018-03-06 02:08:20', '2019-02-04 02:39:40'),
(00005, 'Cliq', '', 'Kortrijksesteenweg', '21A', 'Belgium', 'Gent', '9000', '4567890', '34567890', 'cyprien@cliq.com', '456789', '', '', '', 'dekjekjh', 'Jef', '', 'jef@cliq.com', '', 'cyprien', 'Van Heuverswyn', 'cyprien@cliq.com', '4567890', 'sjghjdfsh', '', '2018-04-03 07:10:50', '2019-02-11 17:54:37'),
(00007, 'cyprien', NULL, 'oudenaardseheerweg 21', NULL, 'AO', 'dfj', '67890', '76890', '76890', 'cyprien.vanheuverswyn@gmail.com', NULL, '', NULL, '', '', '', '', '', '', 'cyprien', 'Van Heuverswyn', 'cyprien@digital-bakery.net', '', '', NULL, '2019-01-16 17:11:33', '2019-02-12 17:24:06'),
(01111, 'testiuiouio', '', 'uio', 'uio', 'Belgium', 'iou', 'io', 'u', 'iou', 'io@gmail.com', 'uio', 'u', '', 'io', '', '', '', '', '', 'uoi', 'u', 'iou', 'oiu', 'io', '', '2018-03-21 05:44:24', '2019-02-12 17:14:59'),
(01234, 'tttty', '', 'y', 'tyty', 'ty', 'ty', 'ty', 'ty', 'ty', 'ty@gmail.com', 'ty', 'ty', '', 'tyt', ',', ',', ',', ',', ',', 't', 'yty', 'ty', 'ty', 'ty', '', '2018-03-20 10:15:49', '2019-02-11 20:33:14'),
(01870, 'Reggy PH Trading', '', 'Passeo de Roxas 102', '', 'PH', 'Makati', '1940', '123-2233443-123', '12334424', 'reggy@trading.com', '+6309778900514', '', '', '', '', '', '', '', '', 'Reginald', 'Huys', 'reginald@trading .com', '+6309778900514', 'GM', '', '2018-06-07 18:18:07', '2019-02-05 17:25:52'),
(18678, 'Jan NV', '', 'Zwaanhoeklos', '3', 'Belgium', 'Melle', '9090', 'BEOIJO098098', '09809809809809', 'info@jan.be', '002087398798', '08979087098', '', 'Outsourcing', 'Catrien', 'Goossens', 'M', 'catrien@jan.be', '09809809', 'Jan', 'De Knibber', 'jan@jan.be', '099798789789', 'contactperson', '', '2018-03-19 08:41:23', '2018-03-27 10:35:18'),
(18679, 'Cyprien', '', 'oudenaardseheerweg', '21A', 'Belgium', 'Nazareth', '9810', '23567890', '1400', 'cyprien.vanheuverswyn@gmail.com', '43567890', '23456789', '', 'vgdhfjkl', 'sgsh', 'csfdhgjfk', 'chvk', 'qsghgj@ghjhk.com', '465789', 'cyprien', 'Van Heuverswyn', 'cyprien.vanheuverswyn@gmail.com', '3456789', 'hgjlkd', '', '2018-03-20 08:59:47', '2018-03-20 08:59:47'),
(18681, 'HYDRAUMEC INTERNATIONAL BVBA.', '', 'Industrizone De Meiren ,7', '23676', 'Belgium', 'Rijkevorsel', 'B-2310', 'g', 'BE0474.702.063', 'hj@gmail.com', 'g', 'jhg', '', 'jh', '', '', '', '', '', 'Michel', 'Kenis', 'hjg', 'jh', 'gjh', '', '2018-03-20 09:47:04', '2018-05-22 21:58:35'),
(18684, 'Pice', '', 'Kortrijksesteenweg', '21A', 'Belgium', 'Gent', '9000', '34567890', '4567890°', 'jef@pice.io', '4356789', '43567890', '', 'hdgjsdg', 'Klaas', 'Peeters', '', 'klaas@pice.io', '345678', 'Jef', 'Van Landeghem', 'jef@pice.io', '3456789', '', '', '2018-03-27 12:09:25', '2018-04-01 21:41:47'),
(18685, 'Jan', '', 'Fake street 2', '0215abc', 'Belgium', 'Brussels', '1000', 'BE 1234 5678 0101', '1234567890', 'junsayjohn4@gmail.com', '011-32-2-555-12-12', '', '', '', 'Alen,Blake', 'hizon,George', 'Team 2,Team 3', 'alen@gmail.com,george@gamilcom', '011-32-2-555-12-12,011-32-2-555-12-12', 'Joe', 'Drake', 'joe@gmail.com', '011-32-2-555-12-12', 'Team 1', '', '2018-04-01 23:47:30', '2018-04-02 00:11:06'),
(18686, 'Mark Gregor', '', 'Fake street', '0215abc', 'Belgium', 'Brussels', '1000', 'BE 1234 5678 0101', '1234567890', 'junsayjohn4@gmail.com', '011-32-2-555-12-12', '', '', '', 'Gil,Jennelyn', 'Cuervo,Mercado', 'Team 2,Team 3', 'gil@gmail.com,jen@gmail.com', '011-32-2-555-12-12,011-32-2-555-12-12', 'Joe', 'De Guzman', 'joe@gmail.com', '011-32-2-555-12-12', 'TEAM 1', '', '2018-04-02 00:18:21', '2018-04-02 00:56:24'),
(18697, 'Jan BVBA', '', 'zwanenklos', '3', 'Belgium', 'Melle', '9090', '34567890', '5467890', 'jan@digital-bakery.net', '657890', '4567890', '', 'Remote staffing', '', '', '', '', '', 'Jan', 'De Knibber', 'jan@digital-bakery.net', '67890', 'business developer', '', '2018-04-03 08:58:32', '2018-04-10 05:22:12'),
(18698, 'Arnaud BVBA', '', 'Ooidonkdreef', '9', 'Belgium', 'Latem', '9030', '4567890', '4567890', 'info@arnaud.com', '4567890', '', '', '', 'Maere', 'Gilles', '', 'gilles@maere.com', '5467890°', 'Arnaud', 'Maere', 'arnaud@pice.io', '456789', 'CEO', '', '2018-04-10 07:09:04', '2018-04-10 07:10:24'),
(18699, 'Arnaud', '', 'bosstraat', '9', 'belgië', 'Lochristi', '9080', '4567890', '657890°', 'cyprien@pice.io', '4567890', '', '', '', 'Maere', 'Arnaud', '', 'arnaud@digital-bakery.net', '', 'Arnaud', 'Maere', 'arnaud@pice.io', '4567890', 'Co-founder', '', '2018-04-10 13:17:05', '2018-04-10 13:17:05'),
(18703, 'Cyprien Client 29-5-2018', '', 'kortrijksesteenweg 1004', '', 'BE', 'Gent', '9000', '43567890°', '456457890°_', 'cyprien@pice.io', '04867645342', '', '', '', ',', ',', ',', ',', ',', 'Cyprien', 'Van Heuverswyn', 'cyprien@pice.io', '0485179545', 'kjghkf', '', '2018-05-29 14:30:57', '2018-05-29 14:30:57'),
(18704, 'Vic Bvba', '', 'Breskensstraat', '', 'NL', 'Breskens', 'Unknown', 'Does he?', '0983', 'jan@pice.io', '009809409', '', '', 'Boats he', 'Cyp,m', 'VH,arnaud', 'Bosser,bosske', 'cyprien@pice.io,arnaud@pice.io', '09709709,ààç!à', 'Vic', 'VH', 'jan@pice.io', '4098509229', 'Boss', '', '2018-05-30 15:10:18', '2019-03-19 15:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `leveranciers`
--

CREATE TABLE `leveranciers` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_primary_contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ban` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vn` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_general_fax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_rate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_sector` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_exclusivity_status` int(2) NOT NULL,
  `contact_person_last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_person_first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_person_function` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_person_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_person_telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_function` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_reference_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `quote_sent` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `leveranciers`
--

INSERT INTO `leveranciers` (`id`, `supplier_name`, `supplier_primary_contact`, `supplier_street`, `supplier_number`, `supplier_country`, `supplier_city`, `supplier_zip`, `ban`, `vn`, `supplier_email`, `supplier_telephone`, `supplier_general_fax`, `supplier_rate`, `supplier_sector`, `supplier_exclusivity_status`, `contact_person_last_name`, `contact_person_first_name`, `contact_person_function`, `contact_person_email`, `contact_person_telephone`, `contact_first_name`, `contact_lastname`, `contact_email`, `contact_telephone`, `contact_function`, `supplier_reference_number`, `quote_sent`, `created_at`, `updated_at`) VALUES
(23, 'CHROMIN-MAASTRICHT BV.', '', 'Sleperweg', '31', 'NEDERLAND', 'Maastricht', '6222 NK', '', '', 'supplier1@gmail.com', '5361234', '', '', '', 1, '', 'Leon', '', '', '', '', 'L. CASTERMANS', '', '', '', '215222', 0, '2018-03-06 03:59:09', '2018-03-06 03:59:09'),
(27, 'Pice', '', 'Kortrijksesteenweg', '1004', 'Belgium', 'Ghent', '9000', 'IUY98Y89U', '98798789', 'info@pice.be', '092220092', '092220092', '3,14', 'BD', 1, 'Van Heuverswyn,Maere', 'Cyprien,Arnaud', 'Co-founder,Co-founder', 'cyprien@pice.io,arnaud@pice.io', '008909,798798798', 'Jan', 'De Knibber', 'jan@pice.io', '0496914456', 'co-founder', '', 0, '2018-03-19 08:43:32', '2018-03-19 08:43:32'),
(30, 'Digital Bakery', '', 'Oudenaardseheerweg', '21A', 'Belgium', 'Nazareth', '9810', '34567890', '4567890', 'info@digital-bakery.net', '56789', '4567890', '20%', 'ghdjkldj', 1, 'Vn Belle', 'peter', 'dfhj', 'peter@digital-bakery.net', '6789', 'Bert', 'Vansteenkiste', 'bert@digital-bakery.net', '456789', 'Gfhgfjgf', '', 0, '2018-03-27 12:11:40', '2018-03-27 12:11:40'),
(33, 'Cyprien bvba', '', 'Oudenaardseheerweg', '21', 'Belgium', 'Nazareth', '9810', '34567890', '34567890', 'cyprien@digital-bakery.net', '567890', '456789', '', 'Remote staffing', 1, 'Maere', 'Arnaud', 'business developer', 'arnaud@digital-bakery.net', '456789', 'Cyprien', 'Van Heuverswyn', 'cyprien@digital-bakery.net', '9837648790', 'business developer', '', 0, '2018-04-03 09:01:25', '2018-04-03 09:01:25'),
(34, 'test arnaud', '', 'kortrijksesteenweg', '1004', 'Belgium', 'Gent', '9000', '4567890°', '67890', 'info@rustthuis.com', '546567890', '', '', '', 1, 'De Knibber', 'Jan', 'co founde', 'jan@pice.io', '4356789', 'cyprien', 'van heuverswyn', 'cyprien@pice.io', '5467890', 'co founder', '', 0, '2018-04-10 07:13:19', '2018-04-10 07:13:19'),
(36, 'Jules Supplier', '', 'Supplierstraat', '93E', 'Supplierland', 'Supplierstad', '9876', '087986798', '879879879', 'info@julessupplier.be', '098098', '09780978', '', 'Sales', 1, 'resse', 'Secreta', 'support', 'secreta@julessupplier.be', '097098', 'Jules', 'Supplier', 'jules@julessupplier.be', '909809809', 'Sales', '', 0, '2018-04-13 07:37:09', '2018-04-13 07:37:09'),
(38, 'Reginald Trading Corp', '', 'Zeeuwspad 13', '', 'Belgium', 'Knokke', '8300', 'BE23 2344 2334 2334', 'BE4543 4543', 'junsayjohn4@gmail.com', '+32 455 34 34 34', '+32 456 43 34 34', '20', 'IT', 0, ',', ',', ',', ',', ',', 'Boris', 'Johnson', 'Johsnon@reggie.com', '+32 454 454 454', 'General Manager', '', 0, '2018-04-24 18:29:22', '2018-05-22 23:59:22'),
(39, 'Cyprien supplier 29-5-18 Na', '', 'Oudenaardseheerweg 21', '', 'Belgium', 'Nazareth', '9810', '876545', '8O7654', 'cyprien@digital-bakery.net', '567890°', '456789', '', '', 0, '', '', '', '', '', 'cyprien S', 'Van Heuverswyn S', 'cyprien@digital-bakery.net', '0875643', '', '', 0, '2018-05-29 14:38:32', '2018-05-29 14:38:32'),
(41, 'supplier 1', '', '678 street', '', 'Belgium', 'Roeselare', '8800', '456', '789', 'junsayjohn32@gmail.com', '53462535', '1234', '789', '12341', 0, '', '', '', '', '', 'juan', 'binay', 'jb@gmail.com', '5367890', 'manager', '', 0, '2018-07-03 19:44:38', '2018-08-09 19:02:28'),
(42, 'Supplier 0307', '', 'SupplierStreet 0307', '', 'Belgium', 'SuplierCity', '8392', 'BESupplier0307', 'VATSUP0307', 'emailsup0307@a.di', 'TElsup0307', 'fax0307', 'Com.Rater', 'SectorSup', 0, '', '', '', '', '', 'FirstSup0307', 'LastSup0307', 'jan@digital-bakery.net', 'TelSupPrim0307', 'FunctionPrimSup0307', '', 0, '2018-07-03 21:05:02', '2018-07-03 21:05:02'),
(43, 'Lev1', '', 'Lev1Straat', '', 'BY', 'Lev1City', 'Lev1Zip', 'Lev1Bank', 'Lev1VAT', 'email@Lev1.com', 'Lev1Tel', 'Lev1Fax', 'Lev1Commission', 'Lev1Sector', 0, 'L12Last', 'L12First', 'L12Func', 'L12@Lev1.com', 'L12Tel', 'L11First', 'L11Last', 'L11@Lev1.com', 'L11Tel', 'L11Func', '', 0, '2018-07-25 18:24:35', '2018-07-25 18:24:35'),
(44, 'Supplier 2', '', 'Street + No. 2', '', 'BE', 'Gent', '9000', '', '', 'cyprien@digital-bakery.net', '', '2', '20%', '2', 0, 'supplier 2 b', 'last name 2b', '2', 'cyprien@pice.io', '2', 'supplier 2', 'Last name 2', 'cyprien@digital-bakery.net', '2', '2', '', 0, '2018-07-25 18:27:13', '2018-08-01 18:04:30'),
(46, 'test', '', 'teststraat 5', '', 'AL', 'Teststad test', '9000', 'Test Bank', 'Test VAT', 'testemail@email.com', 'Test gsm', 'Test fax', 'test com', 'testsector', 0, 'Contacttest2', 'naam2', 'Functie2', 'email2@email.com', 'telefoon2', 'Testnaam', 'testachternaam', 'testemail@email.com', 'testtelefoon', 'testfunctie', '', 0, '2018-09-27 21:32:37', '2018-09-27 21:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_07_15_022709_create_order_treatments_table', 1),
(2, '2018_07_15_022759_create_order_treatment_details_table', 1),
(3, '2018_07_15_022811_create_order_treatment_prices_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `order_reference_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_clients` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_number_from_client` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `order_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quote_request_sent_to_supplier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_quote_request_sent_to_supplier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quote_supplier_received` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_quote_supplier_received` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quote_acceptance_from_client` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_quote_acceptance_from_client` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `upload_confirmation_supplier_doc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_upload_confirmation_supplier_doc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `goods_received_from_client` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_goods_received_from_client` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `goods_sent_from_supplier` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_goods_sent_from_supplier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `good_received_from_supplier` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_good_received_from_supplier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_received` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_invoice_received` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_status_number` int(11) NOT NULL,
  `order_supplier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_number_from_supplier` int(11) NOT NULL,
  `order_product` text COLLATE utf8_unicode_ci NOT NULL,
  `order_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `order_qty` int(11) NOT NULL,
  `order_commission_rate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transport_company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transport_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `delivery_time` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `order_subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_treatment` text COLLATE utf8_unicode_ci NOT NULL,
  `order_treatment_details` text COLLATE utf8_unicode_ci NOT NULL,
  `order_details` text COLLATE utf8_unicode_ci NOT NULL,
  `order_material` text COLLATE utf8_unicode_ci NOT NULL,
  `order_dimensionweight` text COLLATE utf8_unicode_ci NOT NULL,
  `order_technical_drawingreference` text COLLATE utf8_unicode_ci NOT NULL,
  `order_technicaldetails` text COLLATE utf8_unicode_ci NOT NULL,
  `transport` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_treatment_price` text COLLATE utf8_unicode_ci NOT NULL,
  `order_totalprice` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `upload_quotation_received` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `upload_quote_request_sent_to_supplier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `upload_quote_supplier_received` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quote_sent_to_client` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `upload_quote_acceptance_from_client` text COLLATE utf8_unicode_ci NOT NULL,
  `upload_send_confirmation_to_supplier` text COLLATE utf8_unicode_ci NOT NULL,
  `order_exclusivity_status` int(11) NOT NULL,
  `generate_quotation_request` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `upload_recieved_quotation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `generate_quote` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `upload_client_confirmation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `generate_confirmation_to_client` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `upload_goods_received_from_client` text COLLATE utf8_unicode_ci NOT NULL,
  `upload_goods_sent_from_supplier` text COLLATE utf8_unicode_ci NOT NULL,
  `upload_good_received_from_supplier` text COLLATE utf8_unicode_ci NOT NULL,
  `goods_sent_to_client` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `upload_invoice_received` text COLLATE utf8_unicode_ci NOT NULL,
  `invoice_sent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `upload_invoice_paid` text COLLATE utf8_unicode_ci NOT NULL,
  `upload_delivery_document` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `send_confirmation_to_supplier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `generate_confirmation_to_client_doc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `goods_from_client_received` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `goods_sent_to_supplier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `goods_received_from_supplier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `good_sent_to_client` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_generate_quotation_request` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_quotesupplierreceived` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_quotereceived` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_send_confirmation_to_supplier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_confirmation_supplier_doc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_generate_confirmation_to_client` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_goods_sent_to_client` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_invoice_sent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_invoice_paid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `order_price` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '00.0',
  `is_update` int(11) NOT NULL,
  `created_quote_sent_to_client` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `client_id`, `order_reference_number`, `order_clients`, `order_number_from_client`, `order_status`, `quote_request_sent_to_supplier`, `created_quote_request_sent_to_supplier`, `quote_supplier_received`, `created_quote_supplier_received`, `quote_acceptance_from_client`, `created_quote_acceptance_from_client`, `upload_confirmation_supplier_doc`, `created_upload_confirmation_supplier_doc`, `goods_received_from_client`, `created_goods_received_from_client`, `goods_sent_from_supplier`, `created_goods_sent_from_supplier`, `good_received_from_supplier`, `created_good_received_from_supplier`, `invoice_received`, `created_invoice_received`, `order_status_number`, `order_supplier`, `order_number_from_supplier`, `order_product`, `order_amount`, `order_qty`, `order_commission_rate`, `transport_company`, `transport_price`, `delivery_time`, `order_subject`, `order_treatment`, `order_treatment_details`, `order_details`, `order_material`, `order_dimensionweight`, `order_technical_drawingreference`, `order_technicaldetails`, `transport`, `order_treatment_price`, `order_totalprice`, `upload_quotation_received`, `upload_quote_request_sent_to_supplier`, `upload_quote_supplier_received`, `quote_sent_to_client`, `upload_quote_acceptance_from_client`, `upload_send_confirmation_to_supplier`, `order_exclusivity_status`, `generate_quotation_request`, `upload_recieved_quotation`, `generate_quote`, `upload_client_confirmation`, `generate_confirmation_to_client`, `upload_goods_received_from_client`, `upload_goods_sent_from_supplier`, `upload_good_received_from_supplier`, `goods_sent_to_client`, `upload_invoice_received`, `invoice_sent`, `upload_invoice_paid`, `upload_delivery_document`, `send_confirmation_to_supplier`, `generate_confirmation_to_client_doc`, `goods_from_client_received`, `goods_sent_to_supplier`, `goods_received_from_supplier`, `good_sent_to_client`, `created_generate_quotation_request`, `created_quotesupplierreceived`, `created_quotereceived`, `created_send_confirmation_to_supplier`, `created_confirmation_supplier_doc`, `created_generate_confirmation_to_client`, `created_goods_sent_to_client`, `created_invoice_sent`, `created_invoice_paid`, `created_at`, `updated_at`, `order_price`, `is_update`, `created_quote_sent_to_client`) VALUES
(600, 18682, 'PvB/18.682/1801', 'tttty', '', '3.QUOTE SUPPLIER RECEIVED', '0', '0', NULL, '', NULL, '', '', NULL, '', '', '', '', NULL, '', '', '', 4, 'supplier 1', 0, 'p1,p2', '1,1', 1, '', '', '', '', 'TEST', '{\"p1\":[\"a\",\"c\"],\"p2\":[\"a\",\"b\"]}', '{\"p1\":[\"a\",\"c\"],\"p2\":[\"a\",\"b\"]}', '', 'no,no', 'no,no', 'no,no', '', '', '{\"p1\":[\"10.00\",\"20.00\"],\"p2\":[\"30.00\",\"40.00\"]}', '', '', 'storage/supplier/18682/Bel_Tec_remarks.pdf', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-07-23 11:01:08', '', '', '', '', '', '', '2018-07-23 03:01:08', '2018-07-23 04:47:42', '00.0', 0, ''),
(602, 18683, 'PvB/18.683/1801', 'testiuiouio', '', '11.GOODS SENT to CLIENT', '0', '0', NULL, '', NULL, '', '', NULL, '', '', '', '', NULL, '', '', '', 13, 'supplier 1', 0, 'p1,p2,p3', '1,1,1', 1, '', '', '', '2 weeks', 'TEST', '{\"p3\":[\"jkj\"]}', '{\"p3\":[\"lkj\"]}', '', 'no,no,no', 'no,no,no', 'no,no,no', '', 'FEDEX', '', '', '', 'storage/supplier/18683/adaptations-emeritis-website-2018-02-25.pdf', '', 'storage/client/18683/Bel_Tec_remarks.pdf', '', 'storage/supplier/18683/CasaDelHabano_WebserviceRest.pdf', 0, '', '', '', '', 'storage/client/18683/Bel_Tec_remarks.pdf', '', '', '', 'storage/client/18683/Bel_Tec_remarks.pdf', '', '', '', '', '', '', '', '', '', '', '', '', '2018-07-23 11:45:17', '2018-07-23 12:55:08', '', '2018-07-23 13:02:05', '2018-07-23 13:05:22', '', '', '2018-07-23 03:45:17', '2018-07-23 07:05:08', '00.0', 1, ''),
(604, 18676, 'PvB/18.676/1801', 'Online Store', '', '3.QUOTE SUPPLIER RECEIVED', '0', '0', NULL, '', NULL, '', '', NULL, '', '', '', '', NULL, '', '', '', 3, 'Pice', 0, 'p11244124', '1', 1, '', '', '', '', 'TEST 4124124', '{\"p1\":[\"t1\"]}', '{\"p1\":[\"t1 desc\"]}', '', 'n', '11xmm', 'tdr', '', '', '{\"p1\":[\"12\"]}', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-07-23 20:49:52', '', '', '', '', '', '', '2018-07-23 12:49:52', '2018-07-27 14:19:55', '00.0', 1, ''),
(605, 18682, 'PvB/18.682/1802', 'tttty', '', '3.QUOTE SUPPLIER RECEIVED', '0', '0', NULL, '', NULL, '', '', NULL, '', '', '', '', NULL, '', '', '', 1, 'supplier 1', 0, 'p1111', '1', 1, '', '', '', '2 weeks', 'TEST 1111', '{\"p1111\":[\"aaaadasdasdasdas\",\"withdraw from an undertaking. \\\"he was forced to pull out of the championship because of an injury\\\" synonyms:\\twithdraw, resign, leave, retire, step down, bow out, back out, give up; informalquit \\\"our forces have begun to pull out\\\"\"]}', '{\"p1111\":[\"a\",\"asf\"]}', '', 'n', 'n', 'n', '', 'FEDEX', '{\"p1111\":[\"5\",\"10\"]}', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-07-24 02:47:50', '', '', '', '', '', '', '2018-07-23 18:47:50', '2018-08-03 20:13:03', '00.0', 1, ''),
(606, 18683, 'PvB/18.683/1802', 'testiuiouio', '', '5.QUOTE ACCEPTANCE from CLIENT', '0', '0', NULL, '', NULL, '', '', NULL, '', '', '', '', NULL, '', '', '', 5, 'supplier 1', 0, 'Acer Laptop,Iphone', '1,1', 1, '', '', '', '', 'TEST', '{\"Acer Laptop\":[\"a\",\"b\"],\"Iphone\":[\"a\"]}', '{\"Acer Laptop\":[\"a\",\"b\"],\"Iphone\":[\"a\"]}', '', 'no,no', 'no,no', 'no,no', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-07-24 02:52:36', '', '', '', '', '', '', '2018-07-23 18:52:36', '2018-07-24 00:31:48', '00.0', 1, ''),
(607, 18682, 'PvB/18.682/1803', 'tttty', '', '10.GOOD RECEIVED from SUPPLIER', '0', '0', NULL, '', NULL, '', '', NULL, '', '', '', '', NULL, '', '', '', 10, 'supplier 1', 0, 'p1', '1', 1, '', '', '', '2 weeks', 'test', '{\"p1\":[\"CZ\"]}', '{\"p1\":[\"ZC\"]}', '', 'n', 'n', 'n', '', 'FEDEX', '{\"p1\":[\"10\"]}', '', '', '', '', 'storage/client/18682/invoice1.pdf', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-07-24 08:50:23', '', '', '', '', '', '', '2018-07-24 00:50:23', '2018-07-27 02:20:43', '00.0', 1, ''),
(609, 18706, 'PvB/18.706/1801', 'Client 1', '', '4.QUOTE SENT to CLIENT', '0', '0', NULL, '', NULL, '', '', NULL, '', '', '', '', NULL, '', '', '', 4, 'supplier 1', 0, 'p1', '1', 1, '', '', '', '', 'TEST', '{\"p1\":[\"t\"]}', '{\"p1\":[\"t\"]}', '', 'n', 'n', 'n', '', '', '{\"p1\":[\"0\"]}', '', '', 'storage/supplier/18706/PHP-FULLSTACK-WITH-NODE.pdf', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-07-24 10:20:59', '', '', '', '', '', '', '2018-07-24 02:20:59', '2018-07-24 05:52:50', '00.0', 1, ''),
(611, 18706, 'PvB/18.706/1802', 'Client 1', '', '4.QUOTE SENT to CLIENT', '0', '0', NULL, '', NULL, '', '', NULL, '', '', '', '', NULL, '', '', '', 4, 'supplier 1', 0, 'Acer Laptop,Iphone', '1,1', 1, '', '', '', '', 'TEST', '{\"Acer Laptop\":[\"Battery\"],\"Iphone\":[\"Glass\"]}', '{\"Acer Laptop\":[\"Replace the battery\"],\"Iphone\":[\"it is blurd\"]}', '', 'n,n', 'n,n', 'n,n', '', '', '{\"Acer Laptop\":[\"0\"],\"Iphone\":[\"20\"]}', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-07-25 06:45:48', '', '', '', '', '', '', '2018-07-24 22:45:48', '2018-07-24 23:06:02', '00.0', 1, ''),
(612, 18708, 'PvB/18.708/1801', 'Klant1', 'ditwerktnatuurlijknogaltijdniet', '14.INVOICE PAID', '0', '0', NULL, '', NULL, '', '', NULL, '', '', '', '', NULL, '', '', '', 14, 'Lev1', 0, 'P1,P2', '4,4', 1, '', '', '', '2 weken', 'Klant1 To Lev1 order subject', '{\"P1\":[\"Clean\",\"Poederlakken\"],\"P2\":[\"Clean\",\"Chromeren\"]}', '{\"P1\":[\"kuisen \",\"kauzehalizu\"],\"P2\":[\"kuisen \",\"BlingBling\"]}', '', 'Steel,Kunstof', '3x9x7,Diameter 4', 'TekP1,Tek2', '', 'TNT 50 euro', '{\"P1\":[\"50\",\"100\"],\"P2\":[\"50\",\"200\"]}', '', '', '', '', '', '', 'storage/supplier/18708/send-confirmation-to-supplier_(1).pdf', 0, '', '', '', '', '', '', '', '', 'storage/client/18708/goods-sent-to-client.pdf', '', '', 'storage/client/18708/invoice-paid.pdf', '', '', '', '', '', '', '', '', '', '2018-07-25 11:29:55', '2018-07-25 11:44:20', '', '', '2018-07-25 11:47:40', '', '2018-07-25 11:49:21', '2018-07-25 18:29:55', '2018-07-27 00:19:12', '00.0', 1, ''),
(613, 18709, 'PvB/18.709/1801', 'client 2', '2222', '14.INVOICE PAID', '0', '0', NULL, '2018-07-25 11:34:04', NULL, '', 'storage/supplier/18709/Quote-sent-to-client_(1).pdf', NULL, '', '', '', '2018-07-25 12:02:15', NULL, '2018-07-25 12:02:36', 'Quote-sent-to-client_(1).pdf', '2018-07-25 12:05:54', 14, 'Supplier 2', 2222, 'Product 1,Product 2,Product 3', '1,2,3', 1, '', '', '', '2Weeks', 'Subject 2', '{\"Product 1\":[\"Treatment 1\",\"Treatment 2\"],\"Product 2\":[\"Treatment 1\",\"Treatment 3\"],\"Product 3\":[\"Treatment 1\",\"Treatment 3\",\"Treatment 4\"]}', '{\"Product 1\":[\"Treatment description 1\",\"Treatment description 2\"],\"Product 2\":[\"Treatment description 1\",\"Treatment description 3\"],\"Product 3\":[\"Treatment description 1\",\"Treatment description 3\",\"Treatment description 4\"]}', '', 'Material 1,Material 2,material 3', '1,2,3', 'ref 0001,ref 0002,ref 0003', '', 'PostNl', '{\"Product 1\":[\"100\",\"200\"],\"Product 2\":[\"100\",\"300\"],\"Product 3\":[\"100\",\"300\",\"400\"]}', '', '', '', 'storage/supplier/18709/Quote-sent-to-client-2.pdf', '', '', 'storage/supplier/18709/Quote-sent-to-client_(1).pdf', 0, '', 'Quote-sent-to-client-2.pdf', '', '', '', '', 'storage/supplier/18709/Quote-sent-to-client_(1).pdf', 'storage/supplier/18709/Quote-sent-to-client_(1).pdf', 'storage/client/18709/Quote-sent-to-client_(1).pdf', 'storage/supplier/18709/Quote-sent-to-client_(1).pdf', '', 'storage/client/18709/Quote-sent-to-client_(1).pdf', 'Quote-sent-to-client_(1).pdf', '', '', '', '', '', '', '', '', '2018-07-25 11:31:56', '2018-07-25 11:53:32', '2018-07-25 11:53:48', '', '2018-07-25 12:05:41', '', '2018-07-25 12:13:39', '2018-07-25 18:31:56', '2018-07-25 19:13:40', '00.0', 1, ''),
(615, 18706, 'PvB/18.706/1803', 'Client 1', '', '8.GENERATE CONFIRMATION TO CLIENT', '0', '0', NULL, '', NULL, '', '', NULL, '', '', '', '', NULL, '', '', '', 8, 'supplier 1', 0, 'dasd sf,dasfda,wr', '1,3,3', 1, '', '', '', 'fa', 'adasd 111', '{\"dasd sf\":[\"adasffasf\",\"qe\",\"adasffasf\",\"adasffasf\",\"adasffasf\"],\"dasfda\":[\"adasffasf\",\"wrwetr\"],\"wr\":[\"adasffasf\",\"adasffasfdafas\"]}', '{\"dasd sf\":[\"fasf\",\"fasf\",\"adasffasf\",\"nnn\",\"lklj;olj\"],\"dasfda\":[\"fasf\",\"fasf\"],\"wr\":[\"fasf\",\"fasf\"]}', '', 'n,asf,fsdf', 'n,das,sdf', 'nn,asf,asfasf', '', 'adf', '{\"dasd sf\":[\"10\",\"20\",\"30\",\"40\",\"50\"],\"dasfda\":[\"60\",\"70\"],\"wr\":[\"80\",\"90\"]}', '', '', '', '', 'storage/client/615/Quote-sent-to-client_(2).pdf', '', 'storage/supplier/615/request-for-quotation-from-supplier.pdf', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-07-30 03:43:47', '', '', '', '', '', '', '2018-07-30 10:43:47', '2018-07-30 19:02:52', '00.0', 1, ''),
(616, 18708, 'PvB/18.708/1802', 'Klant1', 'Klant1@OrderNummer', '13.INVOICE SENT', '0', '0', NULL, '2018-07-30 09:30:32', NULL, '', '', NULL, '', '', '', '', NULL, '', '', '', 13, 'Lev1', 0, 'Pro1,Pro2', '3,6', 1, '', '', '', 'ASAP', 'Onderwerp vanbestelling', '{\"Pro1\":[\"Reinigen\",\"Coaten\"],\"Pro2\":[\"Reinigen\",\"Chromeren\"]}', '{\"Pro1\":[\"Men kuist, waardoor men het proper maakt\",\"Laagje erop\"],\"Pro2\":[\"Men kuist, waardoor men het proper maakt\",\"Bling Bling laagje erop\"]}', '', 'Kunststof,Staal', 'groot&licht,klein&zwaar', 'ref1,ref2', '', '25 TNT Euro', '{\"Pro1\":[\"15\",\"20\"],\"Pro2\":[\"15\",\"30\"]}', '', '', '', '', 'storage/client/616/invoice-paid.pdf', '2018-07-30 09:32:50', 'storage/supplier/616/goods-sent-to-client.pdf', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-07-30 09:22:38', '', '', '', '', '', '', '2018-07-30 16:22:38', '2018-07-30 16:39:41', '00.0', 1, ''),
(617, 18710, 'PvB/18.710/1801', 'Test', 'az', '1.QUOTE REQUEST RECEIVED from Client', '0', '0', NULL, '', NULL, '', '', NULL, '', '', '', '', NULL, '', '', '', 1, 'Pice', 0, '', '', 1, '', '', '', '', 'aza', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-07-31 13:41:51', '', '', '', '', '', '', '2018-07-31 20:41:51', '2018-07-31 20:41:51', '00.0', 0, ''),
(618, 18676, 'PvB/18.676/1802', 'Online Store', '2222', '13.INVOICE SENT', '0', '0', NULL, '', NULL, '', '', NULL, '', '', '', '', NULL, '', '', '', 13, 'CHROMIN-MAASTRICHT BV.', 2222, 'test 1,test 2', '1,2', 1, '', '', '123', '2Weeks', 'test', '{\"test 1\":[\"treatment 1\",\"Treatment 2\"],\"test 2\":[\"Treatment 2\",\"Treatment 3\"]}', '{\"test 1\":[\"Treatment description 1\",\"Treatment description 2\"],\"test 2\":[\"Treatment description 2\",\"Treatment description 3\"]}', '', 'materiaal 1,material 2', 'dim1,dim 2', 'tech1,tech 2', '', 'PostNl', '{\"test 1\":[\"1\",\"2\"],\"test 2\":[\"2\",\"3\"]}', '', '', '', '', 'storage/client/618/\'Request_for_qufotationn_from_supplier(s).pdf', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-08-01 12:15:55', '', '', '', '', '', '', '2018-08-01 19:15:55', '2018-08-10 20:43:25', '00.0', 1, ''),
(619, 18679, 'PvB/18.679/1801', 'Cyprien', '', '3.QUOTE SUPPLIER RECEIVED', '0', '0', NULL, '', NULL, '', '', NULL, '', '', '', '', NULL, '', '', '', 0, 'Digital Bakery', 0, 'Vijs', '4', 1, '', '', '', '3 weken', 'Behandeling onderdeel', '{\"Vijs\":[\"Chrome\"]}', '{\"Vijs\":[\"Chrome behandeling\"]}', '', 'Metaal', '11*11', '', '', 'tnt', '{\"Vijs\":[\"0\"]}', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-08-09 12:16:50', '', '', '', '', '', '', '2018-08-09 19:16:50', '2018-08-09 19:21:41', '00.0', 1, ''),
(620, 18679, 'PvB/18.679/1802', 'Cyprien', '', '3.QUOTE SUPPLIER RECEIVED', 'quote_request_sent_to_supplier.pdf', '2018-09-28 08:40:18', NULL, '', NULL, '', '', NULL, '', '', '', '', NULL, '', '', '', 0, 'Pice', 0, 'vijs', '6', 1, '', '', '', '', 'Vijs', '{\"vijs\":[\"Chrome\"]}', '{\"vijs\":[\"Chrome\"]}', '', 'metaal', '11x1', 'geen', '', '', '{\"vijs\":[\"0\"]}', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-08-09 12:18:23', '', '', '', '', '', '', '2018-08-09 19:18:23', '2018-08-13 22:58:13', '00.0', 1, ''),
(621, 18705, 'PvB/18.705/1802', 'Reggy PH Trading', '1', '14.INVOICE PAID', '0', '0', NULL, '', NULL, '', '', '2018-09-19 09:54:11', '', '', '', '', NULL, '', '', '', 0, 'Reginald Trading Corp', 2, 'Product,Product 2', '1,2', 1, '', '', '', '2 weeks', 'Teflon', '{\"Product\":[\"Treatment 1\",\"Test treatment 2\",\"battery failed\",\"battery failed\"],\"Product 2\":[\"Test treatment 3\",\"Test treatment 4\"]}', '{\"Product\":[\"treatment  desc 1\",\"treatment  desc 2\",\"Relace battery\",\"repair\"],\"Product 2\":[\"treatment  desc 3\",\"treatment  desc 4\"]}', '', 'Material,material 2', 'Dim./ Weight,Dim 2', 'ref. 001,ref 002', '', 'PostNL', '{\"Product\":[\"200\",\"200\",\"0\",\"0\"],\"Product 2\":[\"200\",\"300\"]}', '', '', '', '', '', '2018-08-13 15:57:49', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-08-13 15:40:32', '', '', '', '', '', '', '2018-08-13 22:40:32', '2018-09-19 16:58:55', '00.0', 1, ''),
(623, 18682, 'PvB/18.682/1804', 'tttty', '', '5.QUOTE ACCEPTANCE from CLIENT', '0', '0', NULL, '2018-08-15 12:20:29', NULL, '', '', NULL, '', '', '', '', NULL, '', '', '', 0, 'supplier 1', 0, 'p1', '1', 1, '', '', '123', '2 weeks', '', '{\"p1\":[\"f\"]}', '{\"p1\":[\"f\"]}', '', 'n', 'n', 'n', '', 'FEDEX', '{\"p1\":[\"0\"]}', '', '', '', '', '', '2018-08-15 12:22:17', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-08-14 09:41:10', '', '', '', '', '', '', '2018-08-14 16:41:10', '2018-08-15 19:22:17', '00.0', 1, ''),
(625, 18685, 'PvB/18.685/1801', 'Jan', '235', '3.QUOTE SUPPLIER RECEIVED', '0', '0', NULL, '2018-08-17 14:02:43', NULL, '', '', NULL, '', '', '', '', NULL, '', '', '', 0, 'Digital Bakery', 0, 'cp', '100', 1, '', '', '3445', '2 Weeks', '', '{\"cp\":[\"battery\"]}', '{\"cp\":[\"replace battery\"]}', '', 'battery', '10', 'replace', '', 'SFDSF', '{\"cp\":[\"34\"]}', '', '', '', '', '', '', '', 0, '', 'document.pdf', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-08-15 12:49:00', '', '', '', '', '', '', '2018-08-15 19:49:00', '2018-09-07 16:05:21', '00.0', 1, ''),
(626, 18682, 'PvB/18.682/1805', 'tttty', '', '5.QUOTE ACCEPTANCE from CLIENT', '0', '0', NULL, '2018-08-20 11:30:51', '', '2018-08-26 17:25:38', '', NULL, '', '', '', '', NULL, '', '', '', 0, 'Digital Bakery', 0, 'p1', '1', 1, '', '', '123', '2 weeks', 'qdad', '{\"p1\":[\"n\"]}', '{\"p1\":[\"n\"]}', '', 'n', 'n', 'n', '', 'FEDEX', '{\"p1\":[\"0\"]}', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-08-20 07:39:42', '', '', '', '', '', '', '2018-08-20 14:39:42', '2018-08-27 00:25:54', '00.0', 1, ''),
(627, 18708, 'PvB/18.708/1803', 'Klant1', 'Klant1@OrderNummer', '2.QUOTE REQUEST SENT to SUPPLIER', '0', '0', NULL, '', NULL, '', '', NULL, '', '', '', '', NULL, '', '', '', 0, 'Lev1', 0, '', '', 1, '', '', '', '', 'OnderwerpVanBestelling', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-08-20 10:55:21', '', '', '', '', '', '', '2018-08-20 17:55:21', '2018-08-23 16:24:33', '00.0', 0, ''),
(628, 18708, 'PvB/18.708/1804', 'Klant1', 'Klant1@OrderNummer', '2.QUOTE REQUEST SENT to SUPPLIER', '0', '0', NULL, '', NULL, '', '', NULL, '', '', '', '', NULL, '', '', '', 0, 'Lev1', 0, 'P1,P2', '3,4', 1, '', '', '', '', 'OnderwerpVanBestelling', '{\"P1\":[\"Kuisen\",\"Poederlakken\"],\"P2\":[\"Kuisen\",\"Chromeren\"]}', '{\"P1\":[\"Cleaning\",\"Powdercoating\"],\"P2\":[\"Cleaning\",\"BlingBling\"]}', '', 'Plastic,Metal', 'Gruut,Klein', 'RefP1,RefP2', '', '', '{\"P1\":[\"0\",\"0\"],\"P2\":[\"0\",\"0\"]}', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-08-20 10:56:27', '', '', '', '', '', '', '2018-08-20 17:56:27', '2018-08-23 16:23:49', '00.0', 0, ''),
(629, 18708, 'PvB/18.708/1805', 'Klant1', 'Klant1@OrderNummer', '1.QUOTE REQUEST RECEIVED from Client', '0', '0', NULL, '', NULL, '', '', NULL, '', '', '', '', NULL, '', '', '', 0, 'Lev1', 0, 'P1,P2', '3,4', 1, '', '', '', '', 'OnderwerpVanBestelling', '{\"P1\":[\"Kuisen\",\"Poederlakken\"],\"P2\":[\"Kuisen\",\"Chromeren\"]}', '{\"P1\":[\"Cleaning\",\"Powdercoating\"],\"P2\":[\"Cleaning\",\"BlingBling\"]}', '', 'Plastic,Metal', 'Gruut,Klein', 'RefP1,RefP2', '', '', '{\"P1\":[\"0\",\"0\"],\"P2\":[\"0\",\"0\"]}', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-08-20 10:56:41', '', '', '', '', '', '', '2018-08-20 17:56:41', '2018-08-20 17:56:41', '00.0', 0, ''),
(630, 18708, 'PvB/18.708/1806', 'Klant1', 'Klant1@OrderNummer', '1.QUOTE REQUEST RECEIVED from Client', '0', '0', NULL, '', NULL, '', '', NULL, '', '', '', '', NULL, '', '', '', 0, 'Lev1', 0, 'P1,P2', '3,4', 1, '', '', '', '', 'OnderwerpVanBestelling', '{\"P1\":[\"Kuisen\",\"Poederlakken\"],\"P2\":[\"Kuisen\",\"Chromeren\"]}', '{\"P1\":[\"Cleaning\",\"Powdercoating\"],\"P2\":[\"Cleaning\",\"BlingBling\"]}', '', 'Plastic,Metal', 'Gruut,Klein', 'RefP1,RefP2', '', '', '{\"P1\":[\"0\",\"0\"],\"P2\":[\"0\",\"0\"]}', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-08-20 10:56:49', '', '', '', '', '', '', '2018-08-20 17:56:49', '2018-08-20 17:56:49', '00.0', 0, ''),
(632, 18684, 'PvB/18.684/1801', 'Pice', '1', '13.INVOICE SENT', '0', '0', NULL, '2018-08-21 14:21:04', 'file.pdf', '2018-08-24 11:37:01', 'file(1).pdf', '2018-08-24 12:00:42', '', '', '', '', NULL, '', '', '', 0, 'Digital Bakery', 2, 'Silo,Example', '3,3', 1, '', '', '400', '2 weeks', 'Teflon Quoting', '{\"Silo\":[\" Treatment 2\"],\"Example\":[\" Treatment 2\"]}', '{\"Silo\":[\"Treatment description 2\"],\"Example\":[\"Treatment description 2\"]}', '', 'Steel,test', '/,/', 'Ref.001,Ref.002', '', 'FEDEX', '{\"Silo\":[\"100\"],\"Example\":[\"200\"]}', '', '', '', '', '', '', '', 0, '', 'request-for-quotation-from-supplier(3).pdf', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-08-21 13:51:00', '', '', '', '', '', '', '2018-08-21 20:51:00', '2018-08-24 20:44:20', '00.0', 1, ''),
(633, 18706, 'PvB/18.706/1804', 'Client 1', '', '13.INVOICE SENT', 'quote_request_sent_to_supplier.pdf', '2018-09-27 01:48:59', 'invoice-paid_(15).pdf', '2018-09-27 13:49:59', 'generate-confirmation-to-client_(3).pdf', '2018-09-27 13:51:12', 'invoice-paid_(12).pdf', '2018-09-27 13:58:41', 'invoice-paid_(10).pdf', '2018-09-27 14:00:23', 'invoice-paid_(13).pdf', '2018-09-27 14:00:04', 'invoice-paid_(12).pdf', '2018-09-27 13:59:35', '', '2018-09-27 14:01:13', 0, 'Digital Bakery', 0, 'p1,p2', '1,1', 1, '', '', '124', '2 weeks', 'Test again', '{\"p1\":[\"Clean\",\"Poederlakken\"],\"p2\":[\"Clean\",\"Chromeren\",\"zczxvzxvzx\"]}', '{\"p1\":[\"kuisen\",\"kauzehalizu\"],\"p2\":[\"kuisen\",\"BlingBling\",\"zczxvzxvzx\"]}', '', 'm,m', 'm,m', 'm,m', '', 'FEDEX', '{\"p1\":[\"0\",\"0\"],\"p2\":[\"0\",\"0\",\"0\"]}', '', '', '', '', 'quote_sent_to_client.pdf', '', '', 0, '', 'DesignPatterns.pdf', '', 'document.pdf', 'generate_confirmation_to_client.pdf', '', '', '', 'goods_sent_to_client.pdf', '', 'invoice_sent.pdf', '', 'invoice-paid_(10).pdf', 'send_confirmation_to_supplier.pdf', '', '', '', '', '', '', '', '2018-08-22 07:04:38', '2018-09-27 01:58:12', '2018-08-22 09:35:16', '2018-09-27 01:59:03', '2018-09-27 02:00:42', '2018-09-27 02:01:42', '', '2018-08-22 14:04:38', '2018-09-27 21:01:13', '00.0', 1, '2018-09-27 01:50:16'),
(634, 18684, 'PvB/18.684/1802', 'Pice', '', '3.QUOTE SUPPLIER RECEIVED', '0', '0', NULL, '', NULL, '', NULL, NULL, NULL, '', NULL, '', NULL, '', NULL, '', 0, 'Digital Bakery', 0, '', '', 1, '', '', '', '', 'teyju', '{\"vb,nv,b;n\":[\"tre\"]}', '{\"vb,nv,b;n\":[\"treat\"]}', '', '', '', '', '', '', '{\"vb,nv,b;n\":[\"0\"]}', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-08-23 09:20:19', '', '', '', '', '', '', '2018-08-23 16:20:19', '2018-08-24 22:41:58', '00.0', 1, ''),
(635, 18682, 'PvB/18.682/1806', 'tttty', '', '13.INVOICE SENT', 'quote_request_sent_to_supplier.pdf', '2018-09-27 01:16:03', 'invoice-paid_(16).pdf', '2018-09-27 13:17:19', 'invoice-paid_(14).pdf', '2018-09-27 13:19:48', 'invoice-paid_(10).pdf', '2018-09-27 13:40:24', 'invoice-paid_(14).pdf', '2018-09-27 13:41:32', 'send-confirmation-to-supplier.pdf', '2018-09-27 13:42:36', 'invoice-paid_(9).pdf', '2018-09-27 13:43:04', NULL, '2018-09-27 13:45:53', 0, 'Digital Bakery', 0, 'p1,p2', '1,3', 1, '', '', '2123', '2 weeks', 'Test', '{\"p1\":[\"p\"],\"p2\":[\"k\"]}', '{\"p1\":[\"p\"],\"p2\":[\"k\"]}', '', 'm,m', 'm,m', 'm,m', '', 'FEDEX', '{\"p1\":[\"10\"],\"p2\":[\"20\"]}', '', '', '', '', 'quote_sent_to_client.pdf', '', '', 0, '', '', '', '', 'generate_confirmation_to_client.pdf', '', '', '', 'goods_sent_to_client.pdf', '', 'invoice_sent.pdf', '', 'goods-sent-to-client_(5).pdf', 'send_confirmation_to_supplier.pdf', '', '', '', '', '', '', '', '2018-08-24 09:01:51', '2018-09-27 01:39:21', '', '2018-09-27 01:41:06', '2018-09-27 01:44:52', '2018-09-27 01:47:45', '', '2018-08-24 16:01:51', '2018-09-27 20:47:55', '00.0', 1, '2018-09-27 01:19:15'),
(636, 18684, 'PvB/18.684/1803', 'Pice', '1', '5.QUOTE ACCEPTANCE from CLIENT', '0', '0', '', '2018-08-24 11:09:36', NULL, '', NULL, NULL, NULL, '', NULL, '', NULL, '', NULL, '', 0, 'Digital Bakery', 2, 'Product 1,Product 2', '1,2', 1, '', '', '400', '2Weeks', 'Teflon Quoting', '{\"Product 1\":[\"Treatment 1\",\"Treatment 3\"],\"Product 2\":[\"Treatment 2\",\"Treatment 3\"]}', '{\"Product 1\":[\"Treatment Description 1\",\"Treatment Description 3\"],\"Product 2\":[\"Treatment Description 2\",\"Treatment Description 3\"]}', '', 'Material 1,Material 2', 'Dim 1,Dim 2', 'ref. 001,Ref. 002', '', 'PostNl', '{\"Product 1\":[\"100\",\"300\"],\"Product 2\":[\"200\",\"300\"]}', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-08-24 11:08:54', '', '', '', '', '', '', '2018-08-24 18:08:54', '2018-09-07 16:03:04', '00.0', 1, ''),
(637, 18676, 'PvB/18.676/1803', 'Online Store', '1', '2.QUOTE REQUEST SENT to SUPPLIER', '0', '0', NULL, '', NULL, '', NULL, NULL, NULL, '', NULL, '', NULL, '', NULL, '', 0, 'CHROMIN-MAASTRICHT BV.', 1, 'Product,Product 2', '1,2', 1, '', '', '', '', 'GHJKL', '{\"Product\":[\"Treatment 1\",\"Treatment 3\"],\"Product 2\":[\"Treatment 2\",\"Treatment 3\"]}', '{\"Product\":[\"Treatment description 1\",\"Treatment description 3\"],\"Product 2\":[\"Treatment description 2\",\"Treatment description 3\"]}', '', 'Material,Material 2', 'Dim,Dim 2', 'Tec,Tec 2', '', '', '{\"Product\":[\"0\",\"0\"],\"Product 2\":[\"0\",\"0\"]}', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-09-04 11:12:51', '', '', '', '', '', '', '2018-09-04 18:12:51', '2018-09-04 18:14:30', '00.0', 1, ''),
(638, 18705, 'PvB/18.705/1802', 'Reggy PH Trading', '1234', '7.UPLOAD CONFIRMATION SUPPLIER DOC', '0', '0', NULL, '', NULL, '', NULL, NULL, '', '2018-09-19 08:40:24', NULL, '', NULL, '', NULL, '', 0, 'Reginald Trading Corp', 5678, 'Beam,Slab', '34,23', 1, '', '', '124', '2 weeks', 'HARDING', '{\"Beam\":[\"Chroomlaag\",\"Galvanization\",\"XXXX\"],\"Slab\":[\"Chroomlaag\"]}', '{\"Beam\":[\"Chroming\",\"Balb bal\",\"ZZZZ\"],\"Slab\":[\"Chroming\"]}', '', 'Iron,Steel', '14x34x56,34x23x6778', 'x345,XDFDFEE', '', 'FEDEX', '{\"Beam\":[\"34\",\"56\",\"454\"],\"Slab\":[\"454\"]}', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-09-07 08:44:07', '', '', '', '', '', '', '2018-09-07 15:44:07', '2018-09-19 15:40:24', '00.0', 1, ''),
(640, 18682, 'PvB/18.682/1807', 'tttty', '', '13.INVOICE SENT', '0', '0', 'user_guides.pdf', '2018-09-25 12:40:14', 'user_guides.pdf', '2018-09-25 12:40:36', '18540PhDreport.pdf', '2018-09-25 12:40:58', 'user_guides.pdf', '2018-09-25 12:41:21', '18540PhDreport.pdf', '2018-09-25 12:41:39', '18540PhDreport.pdf', '2018-09-25 12:42:06', NULL, '2018-09-25 12:42:37', 0, 'Reginald Trading Corp', 0, 'p1', '1', 1, '', '', '1232', '2 weeks', 'Test', '{\"p1\":[\"t1\"]}', '{\"p1\":[\"t1 desc\"]}', '', 'm', 'm', 'm', '', 'FEDEX', '{\"p1\":[\"100\"]}', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '18540PhDreport.pdf', '', '', '', '', '', '', '', '', '2018-09-12 11:12:14', '', '', '', '', '', '', '2018-09-12 18:12:14', '2018-09-25 19:47:21', '00.0', 1, ''),
(641, 18718, 'PvB/18.718/1801', 'Final Client', 'ON_FC_123', '13.INVOICE SENT', '0', '0', 'SENGAH_Dily.pdf', '2018-09-26 14:05:58', NULL, '', NULL, NULL, NULL, '', NULL, '', NULL, '', NULL, '', 0, 'FinalSupplier', 0, 'P1,P2', '1,4', 1, '', '', '422', '2', 'Final Order Subject', '{\"P1\":[\"TreatP1P2\",\"TreatP1\"],\"P2\":[\"TreatP1P2\",\"TreatP2\"]}', '{\"P1\":[\"both products same treatment\\r\\n\",\"TreamentProduct1\"],\"P2\":[\"both products same treatment\\r\\n\",\"Treatment Product 2\"]}', '', 'Mat1,MAT2', 'Dim1,DIM2', 'REF1,REF2', '', 'Tranport_Name', '{\"P1\":[\"12\",\"1\"],\"P2\":[\"12\",\"2\"]}', '', '', '', '', 'quote_sent_to_client.pdf', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-09-26 14:03:54', '', '', '', '', '', '', '2018-09-26 21:03:54', '2018-09-27 21:31:53', '00.0', 1, '2018-09-27 02:34:44'),
(642, 18678, 'PvB/18.678/1801', 'Jan NV', '', '3.QUOTE SUPPLIER RECEIVED', 'quote_request_sent_to_supplier.pdf', '2018-09-27 10:50:46', 'Delivery_Note.pdf', '2018-09-26 14:15:29', '', '', '', '', '', '', '', '', NULL, '', NULL, '', 0, 'Digital Bakery', 0, 'Prod 1,Prod 2', '1,2', 1, '', '', '100', '2 weeks', 'teflon', '{\"Prod 1\":[\"Treatment 2\",\"Treatment 3\"],\"Prod 2\":[\"Treatment 1\"]}', '{\"Prod 1\":[\"Treatment description 2\",\"Treatment description 3\"],\"Prod 2\":[\"Treatment description  1\"]}', '', 'Material 1,material 2', 'Dim 1,dim 2', 'Tec 001,Tec 002', '', 'HDL', '{\"Prod 1\":[\"2\",\"3\"],\"Prod 2\":[\"1\"]}', '', '', '', '', 'quote_sent_to_client.pdf', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-09-26 14:14:13', '', '', '', '', '', '', '2018-09-26 21:14:13', '2018-12-07 17:26:14', '00.0', 1, '2018-09-27 02:21:26'),
(643, 18719, 'PvB/18.719/1801', 'Ralph', '', '13.INVOICE SENT', 'quote_request_sent_to_supplier.pdf', '2018-09-27 02:34:20', 'quote_sent_to_client.pdf', '2018-09-27 14:41:18', 'quote_sent_to_client.pdf', '2018-09-27 14:44:12', 'quote_sent_to_client.pdf', '2018-09-27 14:46:06', 'quote_sent_to_client.pdf', '2018-09-27 14:51:22', NULL, '', 'quote_sent_to_client.pdf', '2018-09-27 14:52:13', NULL, '2018-09-27 14:53:27', 0, 'Pice', 0, 'Product 1,Product 2', '1,2', 1, '', '', '5', '1 dag', 'Teflon', '{\"Product 1\":[\"Treatment 1\"],\"Product 2\":[\"Treatment 1\",\"treatment 2\"]}', '{\"Product 1\":[\"Treatment description 1\"],\"Product 2\":[\"Treatment description 1\",\"treatment description 2\"]}', '', 'Material 1,Material 2', 'Dim 1,Dim 2', 'Tech 001,Tech 2', '', 'TNT', '{\"Product 1\":[\"99\"],\"Product 2\":[\"66\",\"55\"]}', '', '', '', '', 'quote_sent_to_client.pdf', '', '', 0, '', '', '', '', 'generate_confirmation_to_client.pdf', '', '', '', '', '', 'invoice_sent.pdf', '', 'quote_sent_to_client.pdf', 'send_confirmation_to_supplier.pdf', '', '', '', '', '', '', '', '2018-09-27 14:33:43', '2018-09-27 02:44:53', '', '2018-09-27 02:51:09', '', '2018-09-27 02:55:16', '', '2018-09-27 21:33:43', '2018-09-27 21:55:47', '00.0', 1, '2018-09-27 02:39:35'),
(644, 18679, 'PvB/18.679/1803', 'Cyprien', '', '1.QUOTE REQUEST RECEIVED from Client', 'quote_request_sent_to_supplier.pdf', '2018-09-28 01:53:50', NULL, '', NULL, '', NULL, NULL, NULL, '', NULL, '', NULL, '', NULL, '', 0, 'Pice', 0, 'Product,Product 2', '1,2', 1, '', '', '', '', 'Teflon', '{\"Product\":[\"Treatment 2\",\"Treatment 3\"]}', '{\"Product\":[\"Treatment description 2\",\"Treatment description 3\"]}', '', 'Material 1,Material', 'Dim 1,Dim 2', 'Tec 1,Tec 2', '', '', '{\"Product\":[\"0\",\"0\"]}', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-09-28 13:51:30', '', '', '', '', '', '', '2018-09-28 20:51:30', '2018-09-28 20:53:53', '00.0', 1, ''),
(645, 18676, 'PvB/18.676/1804', 'Online Store', '42552', '4.QUOTE SENT to CLIENT', '', '', NULL, '', NULL, '', NULL, NULL, NULL, '', NULL, '', NULL, '', NULL, '', 0, 'Pice', 252552, '', '', 1, '', '', '122', '2 weeks', 'De grote test', '', '', '', '', '', '', '', 'FEDEX', '{\"Testproduct\":[\"0\"],\"Testproduct 2\":[\"0\"]}', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-09-28 13:59:27', '', '', '', '', '', '', '2018-09-28 20:59:27', '2018-09-28 23:07:17', '00.0', 1, ''),
(647, 18679, 'PvB/18.679/1804', 'Cyprien', '', '1.QUOTE REQUEST RECEIVED from Client', '', '', NULL, '', NULL, '', NULL, NULL, NULL, '', NULL, '', NULL, '', NULL, '', 0, 'Pice', 0, 'Test 1,test 2', '44,11', 1, '', '', '', '', 'De grote test', '{\"Test 1\":[\"laagske \"],\"test 2\":[\"laagske\"]}', '{\"Test 1\":[\"zwart\"],\"test 2\":[\"groen\"]}', '', 'STerk metaal,nog sterker metaal', '44x55,77x77', '', '', '', '{\"Test 1\":[\"0\"],\"test 2\":[\"0\"]}', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-09-28 14:04:20', '', '', '', '', '', '', '2018-09-28 21:04:20', '2018-09-28 21:04:20', '00.0', 0, ''),
(649, 18718, 'PvB/18.718/1802', 'Final Client', 'ON_FinalClient', '3.QUOTE SUPPLIER RECEIVED', 'quote_request_sent_to_supplier.pdf', '2018-09-28 02:38:49', 'Quote-sent-to-client_(4).pdf', '2018-09-28 14:40:03', NULL, '', NULL, NULL, NULL, '', NULL, '', NULL, '', NULL, '', 0, 'FinalSupplier', 0, 'P1,P2,P3', '1,3,2', 1, '', '', '10', 'nununu', 'OrderOnderwerp', '{\"P1\":[\"TreatP1\",\"TreatP1P2\"],\"P2\":[\"TreatP1P2\",\"Treat2\",\"TreatP2P3\"],\"P3\":[\"TreatP2P3\",\"TreatP3\"]}', '{\"P1\":[\"treatment product 1\",\"Treatment Product1 and P2\"],\"P2\":[\"Treatment Product1 and P2\",\"Treatment product 2\",\"Treatment P2 en P3\"],\"P3\":[\"Treatment P2 en P3\",\"Treatment Product 3\"]}', '', 'MAT1,mat2,mat3', 'DIM1,dim2,dim3', 'ref1,ref2,ref3', '', 'Te voet', '{\"P1\":[\"10\",\"15\"],\"P2\":[\"15\",\"20\",\"25\"],\"P3\":[\"25\",\"30\"]}', '', '', '', '', 'quote_sent_to_client.pdf', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-09-28 14:38:34', '', '', '', '', '', '', '2018-09-28 21:38:34', '2018-09-28 21:46:23', '00.0', 1, '2018-09-28 02:44:29'),
(650, 18676, 'PvB/18.676/1805', 'Online Store', '', '1.QUOTE REQUEST RECEIVED from Client', '', '', NULL, '', NULL, '', NULL, NULL, NULL, '', NULL, '', NULL, '', NULL, '', 0, 'Pice', 0, 'Product 1,Product 2,Product 3', '1,2,3', 1, '', '', '', '', 'Teflon', '{\"Product 1\":[\"treatment 1\"],\"Product 2\":[\"treatment 1\",\"Treatment 2\"],\"Product 3\":[\"Treatment 2\",\"Treatment 3\"]}', '{\"Product 1\":[\"Treatment description 1\"],\"Product 2\":[\"Treatment description 1\",\"Treatment description 2\"],\"Product 3\":[\"Treatment description 2\",\"Treatment description 3\"]}', '', 'Material 1,Material,Material 3', 'Dim 1,Dim,Dim', 'Tec 1,tec 2,Tec 3', '', '', '{\"Product 1\":[\"0\"],\"Product 2\":[\"0\",\"0\"],\"Product 3\":[\"0\",\"0\"]}', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-09-28 15:46:59', '', '', '', '', '', '', '2018-09-28 22:46:59', '2018-09-28 22:46:59', '00.0', 0, ''),
(652, 18676, 'PvB/18.676/1806', 'Online Store', '', '1.QUOTE REQUEST RECEIVED from Client', '', '', NULL, '', NULL, '', NULL, NULL, NULL, '', NULL, '', NULL, '', NULL, '', 0, 'Pice', 0, 'Product,Product 2', '1,2', 1, '', '', '', '', 'teflon', '{\"Product \":[\"Treatment 1\"],\"Product 2\":[\"Treatment 2\",\"Treatment 3\"]}', '{\"Product \":[\"Treatment description 1\"],\"Product 2\":[\"Treatment description 2\",\"Treatment description 3\"]}', '', 'Material,Material', 'Dim 1,Dim 2', 'Tec 1,Tec 2', '', '', '{\"Product \":[\"0\"],\"Product 2\":[\"0\",\"0\"]}', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-09-28 15:49:58', '', '', '', '', '', '', '2018-09-28 22:49:58', '2018-09-28 22:49:58', '00.0', 0, ''),
(653, 18676, 'PvB/18.676/1807', 'Online Store', '', '12.INVOICE RECEIVED', 'quote_request_sent_to_supplier.pdf', '2018-09-28 03:57:08', 'Quote-sent-to-client(3).pdf', '2018-09-28 15:57:28', 'Quote-sent-to-client(3).pdf', '2018-09-28 16:06:32', 'Quote-sent-to-client(3).pdf', '2018-09-28 16:07:05', NULL, '', 'Quote-sent-to-client(3).pdf', '2018-09-28 16:08:02', 'Quote-sent-to-client(3).pdf', '2018-09-28 16:08:45', NULL, '2018-09-28 16:09:16', 0, 'Pice', 0, 'Product 1,Product 2', '1,2', 1, '', '', '400', '1 day', 'Teflon', '{\"Product 1\":[\"Treatment 1\"],\"Product 2\":[\"Treatment 2\",\"Treatment 3\"]}', '{\"Product 1\":[\"Treatment description 1\"],\"Product 2\":[\"Treatment description 2\",\"Treatment description 3\"]}', '', 'Material 1,Material 2', 'Dim 1,Dim 2', 'Tec 1,Tec 2', '', 'FEDEX', '{\"Product 1\":[\"100\"],\"Product 2\":[\"200\",\"300\"]}', '', '', '', '', 'quote_sent_to_client.pdf', '', '', 0, '', '', '', '', 'generate_confirmation_to_client.pdf', '', '', '', 'goods_sent_to_client.pdf', '', '', '', 'Quote-sent-to-client(3).pdf', 'send_confirmation_to_supplier.pdf', '', '', '', '', '', '', '', '2018-09-28 15:54:12', '2018-09-28 04:06:44', '', '2018-09-28 04:07:37', '2018-09-28 04:08:53', '', '', '2018-09-28 22:54:12', '2018-09-28 23:09:16', '00.0', 1, '2018-09-28 03:59:01'),
(656, 18720, 'PvB/18.720/1801', 'German Client', '', '12.INVOICE RECEIVED', 'quote_request_sent_to_supplier.pdf', '2018-10-01 09:34:20', 'Quote-sent-to-client(3).pdf', '2018-10-01 09:34:50', 'Quote-sent-to-client(3).pdf', '2018-10-01 09:37:10', 'Quote-sent-to-client(3).pdf', '2018-10-01 09:37:49', NULL, '', 'Quote-sent-to-client(3).pdf', '2018-10-01 09:38:41', 'Quote-sent-to-client(3).pdf', '2018-10-01 09:38:57', NULL, '2018-10-01 09:39:44', 0, 'Pice', 0, 'Product 1,Product 2,Product 3', '1,2,3', 1, '', '', '5', '2 days', 'Teflon Quoting', '{\"Product 1\":[\"Treatment 1\"],\"Product 2\":[\"Treatment 2\"],\"Product 3\":[\"Treatment 3\"]}', '{\"Product 1\":[\"Treatment description 1\"],\"Product 2\":[\"Treatment 2\"],\"Product 3\":[\"Treatment description 3\"]}', '', 'Material1,Material 2,Material 3', 'Dim 1,Dim 2,Dim 3', 'Tec 1,Tec 2,Tec 3', '', 'Transport Name', '{\"Product 1\":[\"1\"],\"Product 2\":[\"2\"],\"Product 3\":[\"3\"]}', '', 'storage/client/18720/Quote-sent-to-client(3).pdf', '', '', 'quote_sent_to_client.pdf', '', '', 0, '', '', '', '', 'generate_confirmation_to_client.pdf', '', '', '', 'goods_sent_to_client.pdf', '', 'invoice_sent.pdf', '', 'Quote-sent-to-client(3).pdf', 'send_confirmation_to_supplier.pdf', '', '', '', '', '', '', '', '2018-10-01 09:34:07', '2018-10-01 09:37:21', '', '2018-10-01 09:38:06', '2018-10-01 09:39:12', '2018-10-01 09:40:07', '', '2018-10-01 16:34:07', '2018-10-01 16:39:44', '00.0', 1, '2018-10-01 09:36:43'),
(657, 18676, 'PvB/18.676/1808', 'Online Store', '', '12.INVOICE RECEIVED', '', '', NULL, '', NULL, '', NULL, NULL, NULL, '', NULL, '', NULL, '', NULL, '', 0, 'Digital Bakery', 0, 'zergh,eqsrdfg', '2,3', 1, '', '', '200', 'df', 'teflon', '{\"zergh\":[\"dfg\"],\"eqsrdfg\":[\"dfg\",\"gfh\"]}', '{\"zergh\":[\"sgfh\"],\"eqsrdfg\":[\"sgfh\",\"hdj\"]}', '', 'mdfjkf,sqdfg', 'fsg,sdf', 'sgfh,sdg', '', 'FEDEX', '{\"zergh\":[\"100\"],\"eqsrdfg\":[\"300\",\"200\"]}', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-10-04 17:04:04', '', '', '', '', '', '', '2018-10-05 00:04:04', '2018-10-05 00:06:19', '00.0', 1, ''),
(658, 18679, 'PvB/18.679/1805', 'Cyprien', '1', '13.INVOICE SENT', 'quote_request_sent_to_supplier.pdf', '2018-11-12 11:31:40', 'Invoice_(1).pdf', '2018-11-12 11:32:35', '\'Request_for_qufotationn_from_supplier(s).pdf', '2018-11-12 11:35:58', '\'Request_for_qufotationn_from_supplier(s).pdf', '2018-11-12 11:36:40', NULL, '', '\'Request_for_qufotationn_from_supplier(s).pdf', '2018-11-12 11:37:36', '\'Request_for_qufotationn_from_supplier(s).pdf', '2018-11-12 11:37:48', NULL, '2018-11-12 11:38:51', 0, 'Pice', 2, 'Product 1,Product 2,Product 3', '2,2,3', 1, '', '', '100', '2 weeks', 'Teflon test', '{\"Product 1\":[\"Treatment 1\"],\"Product 2\":[\"Treatment 2\"],\"Product 3\":[\"Treatment 4\"]}', '{\"Product 1\":[\"Treatment Description 1\"],\"Product 2\":[\"Treatment description 2\"],\"Product 3\":[\"Treatment description 4\"]}', '', 'Material 1,Material 2,Material 3', 'Dim 1,Dim 2,Dim 3', 'Tec 1,Tec 2,Tec 3', '', 'FEDEX', '{\"Product 1\":[\"100\"],\"Product 2\":[\"200\"],\"Product 3\":[\"400\"]}', '', '', '', '', 'quote_sent_to_client.pdf', '', '', 0, '', '', '', '', 'generate_confirmation_to_client.pdf', '', '', '', 'goods_sent_to_client.pdf', '', 'invoice_sent.pdf', '', '\'Request_for_qufotationn_from_supplier(s).pdf', 'send_confirmation_to_supplier.pdf', '', '', '', '', '', '', '', '2018-11-12 11:30:52', '2018-11-12 11:36:12', '', '2018-11-12 11:37:08', '2018-11-12 11:38:00', '2018-11-12 11:40:49', '', '2018-11-12 18:30:52', '2018-11-12 18:41:11', '00.0', 1, '2018-11-12 11:35:23'),
(659, 18677, 'PvB/18.677/1801', 'FLOWTRONIC PUMPS LTD.', '', '3.QUOTE SUPPLIER RECEIVED', 'quote_request_sent_to_supplier.pdf', '2018-11-30 06:42:09', NULL, '', NULL, '', NULL, NULL, NULL, '', NULL, '', NULL, '', NULL, '', 0, 'Pice', 0, 'product 1', '1', 1, '', '', '', '', 'jhfg', '{\"product 1\":[\"Treatment \"]}', '{\"product 1\":[\"Treatment description\"]}', '', 'material 1', '1', 'Tec 1', '', '', '{\"product 1\":[\"0\"]}', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-11-30 18:33:48', '', '', '', '', '', '', '2018-12-01 01:33:48', '2018-12-07 17:26:10', '00.0', 1, ''),
(660, 18677, 'PvB/18.677/1802', 'FLOWTRONIC PUMPS LTD.', '', '5.QUOTE ACCEPTANCE from CLIENT', 'quote_request_sent_to_supplier.pdf', '2018-11-30 06:51:22', NULL, '', NULL, '', NULL, NULL, NULL, '', NULL, '', NULL, '', NULL, '', 0, 'Cyprien bvba', 0, 'product 1', '1', 1, '', '', '100', '2 weeks', 'teflon', '{\"product 1\":[\"treatment \"]}', '{\"product 1\":[\"desc\"]}', '', 'material 1', '1', 'tech 1', '', 'fedex', '{\"product 1\":[\"1\"]}', '', '', '', '', 'quote_sent_to_client.pdf', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-11-30 18:49:39', '', '', '', '', '', '', '2018-12-01 01:49:39', '2019-01-16 17:16:17', '00.0', 1, '2018-11-30 06:52:55');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tmpfoo`
--

CREATE TABLE `tmpfoo` (
  `mykey` int(5) UNSIGNED ZEROFILL NOT NULL,
  `product` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmpfoo`
--

INSERT INTO `tmpfoo` (`mykey`, `product`) VALUES
(00001, 'Product 1'),
(00002, 'Product 1'),
(18639, 'Poduct 3'),
(18640, 'Product 4'),
(18641, 'Product 5');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'John', '', 'junsayjohn32@gmail.com', '$2y$10$1pDkPkhCxjOLo3bnxVev2evIo29a.Sea6pogZD6rJ59qVSRQnke52', 'QNMk6R3Z5t98ZqctVIiy59eJLlkU9wEn7A7ANKRa8Jpzk0Q68q0pWbUwFgJA', '2018-02-05 00:50:54', '2018-02-05 00:50:54'),
(2, 'Jay', '', 'junsayjohn4@gmail.com', '$2y$10$fYNhjMdk5.ZnZF8uAn.5Gu3ywBgH0uC37eP2ekLf8HIGKlHfcCBqK', 'FVg0VGdLNpX73tqUnUb4I1aVDyZzYdcY6EIEbofPuFPgwABOOtI7FsVBKEwf', '2018-02-05 00:56:10', '2018-02-05 00:56:10'),
(3, 'admin', '', 'admin@admin.com', '$2y$10$2rCsuOW5Wq1mPTjZm/pkIeUGKCVPvSuCIUEj8UJDBdDKtCtB7rfmy', 'KSLv5bIpsmZG3NNbcMcvpG1tce1fpA3AT0TobgPms2TUeOVsthjeZ1jIJT3B', '2018-02-05 14:48:34', '2018-02-05 14:48:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batchinfo`
--
ALTER TABLE `batchinfo`
  ADD PRIMARY KEY (`rowid`),
  ADD UNIQUE KEY `rowid_UNIQUE` (`rowid`);

--
-- Indexes for table `klantens`
--
ALTER TABLE `klantens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leveranciers`
--
ALTER TABLE `leveranciers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `tmpfoo`
--
ALTER TABLE `tmpfoo`
  ADD PRIMARY KEY (`mykey`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batchinfo`
--
ALTER TABLE `batchinfo`
  MODIFY `rowid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100029;

--
-- AUTO_INCREMENT for table `klantens`
--
ALTER TABLE `klantens`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18705;

--
-- AUTO_INCREMENT for table `leveranciers`
--
ALTER TABLE `leveranciers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=661;

--
-- AUTO_INCREMENT for table `tmpfoo`
--
ALTER TABLE `tmpfoo`
  MODIFY `mykey` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18642;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
