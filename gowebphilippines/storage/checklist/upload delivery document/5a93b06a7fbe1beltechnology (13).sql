-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2018 at 07:13 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beltechnology`
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
  `company_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `company_primary_contact` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `company_street` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `company_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `company_country` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `company_city` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `company_zip` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ban` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `vn` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `company_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `company_telephone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `company_general_fax` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `company_rate` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `company_sector` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contact_person_last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contact_person_first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contact_person_function` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contact_person_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contact_person_telephone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contact_first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contact_lastname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contact_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contact_telephone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contact_function` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klantens`
--

INSERT INTO `klantens` (`id`, `company_name`, `company_primary_contact`, `company_street`, `company_number`, `company_country`, `company_city`, `company_zip`, `ban`, `vn`, `company_email`, `company_telephone`, `company_general_fax`, `company_rate`, `company_sector`, `contact_person_last_name`, `contact_person_first_name`, `contact_person_function`, `contact_person_email`, `contact_person_telephone`, `contact_first_name`, `contact_lastname`, `contact_email`, `contact_telephone`, `contact_function`, `created_at`, `updated_at`) VALUES
(18676, 'Online Store', '', 'online store street 123 village.', '5361234', 'Belgium', 'Antwerp', '8080', '1234', '1234', 'junsayjohn4@gmail.com', '5361234', '1234', '', 'CEO', 'Wilson,Rivera', 'Georgina,Marian', 'secretary 1,secretary 2', 'junsayjohn4secretary1@gmail.com,junsayjohn4secretary2@gmail.com', '5361234,5361234', 'F.Arriet st San Nicolas Bay Laguna', 'Junsay', 'junsayjohn4@gmail.com', '5361234', 'CEO', '2018-02-24 21:42:06', '2018-02-24 22:46:07');

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
  `quote_sent` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `leveranciers`
--

INSERT INTO `leveranciers` (`id`, `supplier_name`, `supplier_primary_contact`, `supplier_street`, `supplier_number`, `supplier_country`, `supplier_city`, `supplier_zip`, `ban`, `vn`, `supplier_email`, `supplier_telephone`, `supplier_general_fax`, `supplier_rate`, `supplier_sector`, `contact_person_last_name`, `contact_person_first_name`, `contact_person_function`, `contact_person_email`, `contact_person_telephone`, `contact_first_name`, `contact_lastname`, `contact_email`, `contact_telephone`, `contact_function`, `quote_sent`, `created_at`, `updated_at`) VALUES
(23, 'John', '', 'F.arrieta st San Nicolas Bay Laguna', '09158398803', 'Philippines', 'Bay', '4033', '1234', '1234', 'laravel.beltechnology@gmail.com', '5361234', '1234', '%?', 'Lead Developer', 'Aquino,Sebastian', 'Eddie,Jeremy', 'QA,QA', 'ed@gmail.com,jeremy@gmail.com', '5361234,5361234', 'F.arrieta st San Nicolas Bay Laguna', 'Junsay', 'laravel.beltechnology@gmail.com', '5361234', 'Lead Developer', 0, '2018-02-24 22:12:18', '2018-02-24 22:46:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `order_reference_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_clients` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_supplier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_product` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_qty` int(11) NOT NULL,
  `order_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_commission_rate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `upload_quotation_received` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_exclusivity_status` int(11) NOT NULL,
  `generate_quotation_request` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `upload_recieved_quotation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `generate_quote` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `upload_client_confirmation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `upload_confirmation_supplier_doc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `upload_delivery_document` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `send_confirmation_to_supplier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `generate_confirmation_to_client_doc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `goods_from_client_received` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `goods_sent_to_supplier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `goods_received_from_supplier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `good_sent_to_client` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `client_id`, `order_reference_number`, `order_clients`, `order_status`, `order_supplier`, `order_product`, `order_amount`, `order_qty`, `order_price`, `order_commission_rate`, `upload_quotation_received`, `order_exclusivity_status`, `generate_quotation_request`, `upload_recieved_quotation`, `generate_quote`, `upload_client_confirmation`, `upload_confirmation_supplier_doc`, `upload_delivery_document`, `send_confirmation_to_supplier`, `generate_confirmation_to_client_doc`, `goods_from_client_received`, `goods_sent_to_supplier`, `goods_received_from_supplier`, `good_sent_to_client`, `created_at`, `updated_at`) VALUES
(473, 18676, 'PvB/18.676/1801', 'Online Store', 'QUOTE RECEIVED', 'John', 'asdf', '3123', 1, '', '%?', 'storage/pdf-quotation/client/received quotation from client/5a93a451067e3Delivery Note (1).pdf', 1, '', '', '', '', '', '', '', '', '', '', '', '', '2018-02-25 22:08:17', '2018-02-25 22:08:17');

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
(3, 'admin', '', 'admin@admin.com', '$2y$10$2rCsuOW5Wq1mPTjZm/pkIeUGKCVPvSuCIUEj8UJDBdDKtCtB7rfmy', '9YIPeybdmRh66H5yoo3eUugRrQCfVlXxmlhboQfjrXCkMkFf0sPM3sMNjpuq', '2018-02-05 14:48:34', '2018-02-05 14:48:34');

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
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18677;

--
-- AUTO_INCREMENT for table `leveranciers`
--
ALTER TABLE `leveranciers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=474;

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
