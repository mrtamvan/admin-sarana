-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2021 at 07:15 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbs_fundsarana`
--

-- --------------------------------------------------------

--
-- Table structure for table `cfs_campaign`
--

CREATE TABLE `cfs_campaign` (
  `id` int(11) NOT NULL,
  `id_en` int(11) DEFAULT NULL,
  `id_id` int(11) DEFAULT NULL,
  `id_category` int(11) NOT NULL,
  `target_fund` varchar(10) NOT NULL,
  `featured_image` varchar(50) NOT NULL,
  `campaign_status` int(11) NOT NULL,
  `id_message` int(11) DEFAULT NULL,
  `create_date` date NOT NULL,
  `approve_date` date DEFAULT NULL,
  `end_campaign` date DEFAULT NULL,
  `id_participant` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `is_highlight` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cfs_campaign`
--

INSERT INTO `cfs_campaign` (`id`, `id_en`, `id_id`, `id_category`, `target_fund`, `featured_image`, `campaign_status`, `id_message`, `create_date`, `approve_date`, `end_campaign`, `id_participant`, `id_admin`, `is_highlight`) VALUES
(7, 2, NULL, 1, '1200000', 'cdf9e874a9618f9478740f31e4f8d0bb.png', 1, NULL, '2021-02-11', NULL, NULL, 5, NULL, 0),
(8, 7, 3, 1, '12000000', 'de69c7fda1579ddc2004cb44fdc44e25.jpg', 2, 2, '2021-02-12', NULL, NULL, 5, NULL, 1),
(9, 5, 4, 1, '120000000', '760d933994ceff669f489f31ab193165.png', 2, NULL, '2021-02-12', '2021-03-21', '2021-05-19', 5, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cfs_campaigncategory`
--

CREATE TABLE `cfs_campaigncategory` (
  `id` int(11) NOT NULL,
  `category_title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `create_date` date NOT NULL,
  `id_admin` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cfs_campaigncategory`
--

INSERT INTO `cfs_campaigncategory` (`id`, `category_title`, `description`, `create_date`, `id_admin`, `is_active`) VALUES
(1, 'Bencana Alam', 'Campaign ini untuk penggalangan dana untuk korban bencana alam', '2021-02-02', 1, 1),
(2, 'Kesehatan', 'Bantuan untuk masyarakat yang membutuhkan perawatan kesehatan', '2021-03-24', 1, 1),
(3, 'aaa', 'aaaa', '2021-04-02', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cfs_campaigndetail`
--

CREATE TABLE `cfs_campaigndetail` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cfs_campaigndetail`
--

INSERT INTO `cfs_campaigndetail` (`id`, `title`, `slug`, `description`) VALUES
(2, 'Let\'s Help them', 'lets-help-them', '<p><img src=\"http://localhost/sarana/assets/images/ss.png\" xss=removed></p><p>Haiii</p>'),
(3, 'Ayo Kita Bantu', 'ayo-kita-bantu', '<p>Haiiii AYo Bantu gaesss</p>'),
(4, 'Come on gays', 'ayooo-yao', '<p>blasdaslsa</p>'),
(5, 'yooo', 'yooo', '<p>blasdaslsa</p>'),
(6, 'Let\'s Help them Bahasa Indonesia', 'lets-help-them-bahasa-indonesia', '<p><img src=\"http://localhost/sarana/assets/images/ss.png\" xss=\"removed\"></p><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p><p>Haiii</p>'),
(7, 'Ayo Kita Bantu English', 'ayo-kita-bantu-english', '<p>Haiiii AYo Bantu gaesss English</p>');

-- --------------------------------------------------------

--
-- Table structure for table `cfs_detailparticipant`
--

CREATE TABLE `cfs_detailparticipant` (
  `nik` varchar(50) NOT NULL,
  `temhir` varchar(50) NOT NULL,
  `tanghir` date NOT NULL,
  `alamat` text NOT NULL,
  `ktp` varchar(50) NOT NULL,
  `selfie_ktp` varchar(50) NOT NULL,
  `tgl_verifikasi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cfs_detailparticipant`
--

INSERT INTO `cfs_detailparticipant` (`nik`, `temhir`, `tanghir`, `alamat`, `ktp`, `selfie_ktp`, `tgl_verifikasi`) VALUES
('12121', 'jeer', '1998-12-12', 'asasasa', '12121-ktp.PNG', '1212', NULL),
('3450987689028', 'Jember', '1997-12-12', 'Jalan-jlan Pemuda mandiri', 'e81674c5b5169ce04504aaceeab8a1d6.jpg', 'c1566dbf099a073a3d78b41c5bdbfe56.png', NULL),
('35072936242', 'Jember', '1995-07-12', 'Jalan-jalan', 'asasa', 'asasas', NULL),
('8798008808', 'jember', '1995-12-12', 'Jalan', '8798008808-ktp.jpg', 'sds', NULL),
('98080498934', 'Kencong', '1993-12-12', 'Jalan jaan', '1449ae2350e418dc63d3eeb8fa8aa05a.png', '55af8515a511daaa534990cf2565cc1c.PNG', NULL),
('9999999', 'jember', '1998-12-12', 'asasasa', '38037e38c5818c8beb01197e6da5b771.jpg', '39956a5f50588abfe171c008e313abc1.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cfs_donate`
--

CREATE TABLE `cfs_donate` (
  `id` int(11) NOT NULL,
  `id_campaign` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `amount` int(50) NOT NULL,
  `donate_date` date NOT NULL,
  `is_anonymous` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cfs_donate`
--

INSERT INTO `cfs_donate` (`id`, `id_campaign`, `name`, `email`, `amount`, `donate_date`, `is_anonymous`) VALUES
(1, 9, 'Budi Santoso', 'budi@mail.com', 59001000, '2021-03-22', 0),
(2, 9, 'Bambang Handoko', 'bambang@mail.com', 1000000, '2021-03-22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cfs_message`
--

CREATE TABLE `cfs_message` (
  `id` int(11) NOT NULL,
  `subjek` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `create_date` date NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cfs_message`
--

INSERT INTO `cfs_message` (`id`, `subjek`, `message`, `create_date`, `id_admin`) VALUES
(1, 'Maaf Kami terpaksa menolak Campaignmu', '<p>Hahahhaha</p>', '2021-03-22', 1),
(2, 'aaa', '<p>aaaaa</p>', '2021-03-22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cfs_participant`
--

CREATE TABLE `cfs_participant` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tlp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `tgl_register` date DEFAULT NULL,
  `id_message` int(11) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `code` char(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cfs_participant`
--

INSERT INTO `cfs_participant` (`id`, `nama`, `tlp`, `email`, `password`, `nik`, `status`, `tgl_register`, `id_message`, `is_admin`, `code`) VALUES
(1, 'Ahmad Fauzi', '083452657', 'ahmad@mail.com', '4123570adeabe94c748e3bbeb7c883ca', '12121', 2, NULL, NULL, 0, NULL),
(5, 'Aziza Rahmawati', '888888', 'aa@mail.com', '4123570adeabe94c748e3bbeb7c883ca', '35072936242', 2, NULL, NULL, 0, NULL),
(35, 'Iis Komariyah', '089117249', 'iis@mail.com', '4123570adeabe94c748e3bbeb7c883ca', NULL, 2, NULL, NULL, 0, NULL),
(37, 'Yuli Eko Prasetyo', '0797979544', 'admin@mail.com', '4123570adeabe94c748e3bbeb7c883ca', NULL, 2, '2021-01-20', NULL, 0, NULL),
(38, 'Yuli Eko', '089803893', 'yulieko@mail.com', '4123570adeabe94c748e3bbeb7c883ca', '8798008808', 2, '2021-01-21', NULL, 0, NULL),
(39, 'Bambang Handoko', '089212131', 'han@mail.com', '4123570adeabe94c748e3bbeb7c883ca', '9999999', 2, '2021-01-29', NULL, 0, NULL),
(41, 'Bambang Handoko', '083492840829', 'bambang@mail.com', '4123570adeabe94c748e3bbeb7c883ca', '3450987689028', 2, '2021-02-11', NULL, 0, NULL),
(42, 'Rahman Sentot', '0898979779', 'aak@mail.com', '0192023a7bbd73250516f069df18b500', '98080498934', 2, '2021-02-11', NULL, 0, NULL),
(57, 'yuu', '707077070', 'yuliekoprasetyo1@gmail.com', '0df1f19150ec76698e143f8f35d9c834', NULL, 2, '2021-06-25', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cfs_useradmin`
--

CREATE TABLE `cfs_useradmin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cfs_useradmin`
--

INSERT INTO `cfs_useradmin` (`id`, `nama`, `email`, `password`, `is_admin`) VALUES
(1, 'Yuli Eko Prasetyo', 'yuli@mail.com', 'a42d640365f9ba18208ab059cd068e09', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cfs_campaign`
--
ALTER TABLE `cfs_campaign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cfs_campaigncategory`
--
ALTER TABLE `cfs_campaigncategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cfs_campaigndetail`
--
ALTER TABLE `cfs_campaigndetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cfs_detailparticipant`
--
ALTER TABLE `cfs_detailparticipant`
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `cfs_donate`
--
ALTER TABLE `cfs_donate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cfs_message`
--
ALTER TABLE `cfs_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cfs_participant`
--
ALTER TABLE `cfs_participant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cfs_useradmin`
--
ALTER TABLE `cfs_useradmin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cfs_campaign`
--
ALTER TABLE `cfs_campaign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cfs_campaigncategory`
--
ALTER TABLE `cfs_campaigncategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cfs_campaigndetail`
--
ALTER TABLE `cfs_campaigndetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cfs_donate`
--
ALTER TABLE `cfs_donate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cfs_message`
--
ALTER TABLE `cfs_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cfs_participant`
--
ALTER TABLE `cfs_participant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `cfs_useradmin`
--
ALTER TABLE `cfs_useradmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
