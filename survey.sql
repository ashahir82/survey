-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2017 at 06:35 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `unit` varchar(65) NOT NULL,
  `position` varchar(12) NOT NULL,
  `done` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `name`, `unit`, `position`, `done`) VALUES
(1, 'Kamaruzaman Bin Hj.Md Ali', 'Pengarah', 'J54', 0),
(2, 'Abd. Halim Bin Ali Mohammed', 'Timbalan Pengarah Pengurusan Latihan', 'J52', 0),
(3, 'Rahmat Bin Ayop', 'Timbalan Pengarah Pengurusan Sumber', 'J48', 0),
(4, 'Norhayati Binti Ahmad', 'Jabatan Percetakan & Komputer', 'J48', 0),
(5, 'Ayulita Ema Binti Yusof', 'Jabatan Mekanikal & Pengeluaran', 'J44', 0),
(6, 'Syamsol Amer Bin Zakaria', 'Jabatan Mekanikal - Servis', 'J44', 0),
(7, 'Suraya Haney Binti Khalid', 'Jabatan Elektrikal & Elektronik', 'J44', 0),
(8, 'Dyg.Hariah Bt.Awang Sah', 'Jabatan Pengajian Am', 'DG48', 0),
(9, 'Aniza Binti Ahmad', 'Percetakan Grafik', 'J29', 1),
(10, 'Badariah Bt Kadin', 'Percetakan Grafik', 'J29', 0),
(11, 'Ramizah Bt Daud', 'Percetakan Grafik', 'J29', 0),
(12, 'Siti Jamiah Binti Yusof', 'Percetakan Grafik', 'J22', 0),
(13, 'Siti Hajar Bt Mohd Sharif', 'Percetakan Grafik', 'J17', 0),
(14, 'Anis Marhaini Bt Mohd', 'Percetakan Grafik', 'J17', 0),
(15, 'Noraishah Bt Md Zin @ Abdulllah', 'Percetakan Grafik', 'J29', 0),
(16, 'Zainal B Abdul Jalil', 'Percetakan Offset', 'J29', 0),
(17, 'Mohd Saiful Nizam B Rahim', 'Percetakan Offset', 'J29', 0),
(18, 'Siti Hadijah Binti Mohammad', 'Percetakan Offset', 'J29', 0),
(19, 'Badrul Hisham B Saadon', 'Percetakan Offset', 'J17', 0),
(20, 'Mohd Farid Busra', 'Percetakan Offset', 'J17', 0),
(21, 'Zulfadhli B Che Hassan', 'Percetakan Offset', 'J17', 0),
(22, 'Hasnah Bt Patang Nagari', 'Percetakan Offset', 'J17', 0),
(23, 'Mohd Junaidi B Othman', 'Komputer Sistem', 'J38', 0),
(24, 'Siti Zubaidah Bt Idris', 'Komputer Sistem', 'J36', 0),
(25, 'Che Mazlan B Hashim', 'Komputer Sistem', 'J30', 0),
(26, 'Noredzuan Bin Mat Noh', 'Komputer Sistem', 'J29', 0),
(27, 'Bokhori B Abd Sarif', 'Komputer Sistem', 'J22', 0),
(28, 'Che Wan Azwadi B Wan Nordin', 'Komputer Sistem', 'J17', 0),
(29, 'Waji Risman', 'Kimpalan', 'J38', 0),
(30, 'Adnan B Abu Bakar ', 'Kimpalan', 'J38', 0),
(31, 'Norisam B Abu Talib', 'Kimpalan', 'J29', 0),
(32, 'Ruznan B Hj Abd Karim', 'Kimpalan', 'J22', 0),
(33, 'Mahadzir Bin Ismail', 'Kimpalan', 'J22', 0),
(34, 'Mohd Shamsul Ahmad Sharudin', 'Kimpalan', 'J17', 0),
(35, 'Nazri B Mamat', 'Kimpalan', 'J17', 0),
(36, 'Mohd Hairel B Jamal', 'Kimpalan', 'J17', 0),
(37, 'Mohd Izanie Bin Abd Rahman', 'Kimpalan', 'J17', 0),
(38, 'Mohd Fairuzzami Bin Khalid', 'Kimpalan', 'H17', 0),
(39, 'Muhammad Yazli Bin Yaakub', 'Pembuatan', 'J38', 0),
(40, 'Yap Chee Keong', 'Pembuatan', 'J38', 0),
(41, 'Ku Aswat B. Ku Adnan', 'Pembuatan', 'J36', 0),
(42, 'Sukiman B Jaafar', 'Pembuatan', 'J29', 0),
(43, 'Mohd Ashek B Mohd Yusof', 'Pembuatan', 'J29', 0),
(44, 'Shafee B Abd Rahman', 'Pembuatan', 'J22', 0),
(45, 'Nik Mohd Suhaimi Nik Hasan', 'Pembuatan', 'J22', 0),
(46, 'Zuraimi B Abdul Razak', 'Pembuatan', 'J17', 0),
(47, 'Hairilasikin Bt Othman', 'Pembuatan', 'J22', 0),
(48, 'Azrul Nizam B Deris', 'Pembuatan', 'J17', 0),
(49, 'Ahmad Wildan Hariz Bin Dahlan', 'Pembuatan', 'J17', 0),
(50, 'Haji Mazwar B Mahmood', 'Mekanik Industri', 'J38', 0),
(51, 'Rosli Bin Yunos', 'Mekanik Industri', 'J36', 0),
(52, 'Ahmad Salwan B A.Wahab', 'Mekanik Industri', 'J29', 0),
(53, 'Azrin Haris B Mohd Yusof', 'Mekanik Industri', 'J29', 0),
(54, 'Isnin Bin Shahli', 'Mekanik Industri', 'J29', 0),
(55, 'Nor Hanis Bt Amiruddin', 'Mekanik Industri', 'J22', 0),
(56, 'Nagor Amir Bin Mohammed', 'Mekanik Industri', 'J22', 0),
(57, 'Norlia Bt Husain', 'Mekanik Industri', 'J17', 0),
(58, 'Mohd Hamidi Syahril Bin Hamdan', 'Mekanik Industri', 'J17', 0),
(59, 'Roslan Bin Ariffin', 'Mekanik Industri', 'H17', 0),
(60, 'Khairul Anwar B Abd Rahman', 'Jaminan Kualiti', 'J38', 0),
(61, 'Mohd Rosli B Hussein', 'Jaminan Kualiti', 'J38', 0),
(62, 'Suria Azwani Binti Abd Razak', 'Jaminan Kualiti', 'J29', 0),
(63, 'Zhafarina Bt Hamdan', 'Jaminan Kualiti', 'J17', 0),
(64, 'Nor Fadhilah Bt Mat Yusof', 'Jaminan Kualiti', 'J17', 0),
(65, 'Azmin Bin Amirdin', 'Jaminan Kualiti', 'H17', 0),
(66, 'Rostam Bin Hamzah', 'Automotif', 'J42', 0),
(67, 'Mohamad Sufian B Ngah Mat Noh', 'Automotif', 'J36', 0),
(68, 'Omar B Abdullah', 'Automotif', 'J36', 0),
(69, 'Hasnul Azrain B Ariffin', 'Automotif', 'J36', 0),
(70, 'Nur Syahirunniza B Nur Dzainuddin', 'Automotif', 'J36', 0),
(71, 'Ismail Bin Kasim', 'Automotif', 'J38', 0),
(72, 'Emilea Bt Che Mahmood', 'Automotif', 'J29', 0),
(73, 'Harisfadzilah Bin Hashim', 'Automotif', 'J29', 0),
(74, 'Mohd Syifauddin Bin Asmat', 'Automotif', 'J29', 0),
(75, 'Raja Zaidi B Raja Hussein', 'Automotif', 'J22', 0),
(76, 'Mohd Zulkifli B.Mohd Ariffin', 'Automotif', 'J22', 0),
(77, 'Ahmad Yeop B Abdullah', 'Automotif', 'J17', 0),
(78, 'Mohd Fadli Bin Mohd Tahir', 'Automotif', 'J17', 0),
(79, 'Mohd Firdaus B Abu Seman', 'Automotif', 'H17', 0),
(80, 'Nazarudin B Md Bahar', 'Juruelektrik', 'J38', 0),
(81, 'Kamarulradzi Bin Ab Malik', 'Juruelektrik', 'J29', 0),
(82, 'Izwandy Bin Kamarudin', 'Juruelektrik', 'J29', 0),
(83, 'Mohd Muliyade Bin A.Karim', 'Juruelektrik', 'J29', 0),
(84, 'Rohaya Bt Yaacob', 'Juruelektrik', 'J17', 0),
(85, 'Noorazura Binti Mat Shadan', 'Juruelektrik', 'J17', 0),
(86, 'Khairul B Abu Zarin', 'Juruelektrik', 'H17', 0),
(87, 'Haji Shahrudin Bin Othman', 'Elektronik Industri', 'J38', 0),
(88, 'Tiasa Binti Akbar', 'Elektronik Industri', 'J38 ', 0),
(89, 'Haslinawati Bt Jamaluddin', 'Elektronik Industri', 'J36', 0),
(90, 'Azian Hidayati Bt Aziz', 'Elektronik Industri', 'J29', 0),
(91, 'Hairunisak Bt Mohamed', 'Elektronik Industri', 'J29', 0),
(92, 'Siti Mahani Bt.Said', 'Elektronik Industri', 'J29', 0),
(93, 'Maria Binti Samsudin', 'Elektronik Industri', 'J22', 0),
(94, 'Mohd Rasidi B Ithnin', 'Elektronik Industri', 'J17', 0),
(95, 'Mohd Hafiz Bin Zakariah', 'Elektronik Industri', 'J17', 0),
(96, 'Muhamad Faris Bin Muhamad Nor', 'Elektronik Industri', 'R11', 0),
(97, 'Syaharuddin B Abdullah', 'Penjaga Jentera', 'J36', 0),
(98, 'Zaharin B Maarof', 'Penjaga Jentera', 'J36', 0),
(99, 'Akhzailiza Binti Md Akhir', 'Penjaga Jentera', 'J29', 0),
(100, 'Md Mizan Asrori B Jangi', 'Penjaga Jentera', 'J22', 0),
(101, 'Khairul Nizam B Mohamed Yusoff', 'Penjaga Jentera', 'J22', 0),
(102, 'Haji Mohd Mazhar B Suleiman', 'Penyejukbekuan & Penyamanan Udara', 'J38', 0),
(103, 'Wan Andro Faizan B Wan Mahmood', 'Penyejukbekuan & Penyamanan Udara', 'J29', 0),
(104, 'Ahmad Ridhwan B Azhar', 'Penyejukbekuan & Penyamanan Udara', 'J29', 0),
(105, 'Norishidah Bt Dahlan', 'Penyejukbekuan & Penyamanan Udara', 'J29', 0),
(106, 'Asmawati Bt. Said', 'Penyejukbekuan & Penyamanan Udara', 'J29', 0),
(107, 'Ainon Binti Musa', 'Penyejukbekuan & Penyamanan Udara', 'J29', 0),
(108, 'Salamiyah Bt Ismail', 'Penyejukbekuan & Penyamanan Udara', 'J22', 0),
(109, 'Amran B Ismail', 'Penyejukbekuan & Penyamanan Udara', 'J22', 0),
(110, 'Muhamad Zamin B Dzulkifli', 'Penyejukbekuan & Penyamanan Udara', 'J22', 0),
(111, 'Gayathri A/P Sunarun', 'Pengajian Am', 'DG41', 0),
(112, 'Shanthini A/P Loganathan', 'Pengajian Am', 'DG41', 0),
(113, 'Siti Zahirah Yusoff', 'Pengajian Am', 'DG 41', 0),
(114, 'Amir Hisyam B Hassan', 'Pengajian Am', 'DG41', 0),
(115, 'Nurulhuda Kartinin', 'Pengajian Am', 'DG 41', 0),
(116, 'Mohd Baihaqi Bin Mat Zain', 'Pengajian Am', 'DG41', 0),
(117, 'Mary Lee Nga Weing', 'Pengajian Am', 'DG41', 0),
(118, 'Norkamaliah Bt Osman@Mohd Nordin', 'Pengajian Am', 'DG 41', 0),
(119, 'Nadzirah Bt Hassan', 'Pengajian Am', 'DG 41', 0),
(120, 'Norliza Bt.Nasarudin', 'Bahagian Pusat Sumber &', 'J41', 0),
(121, 'Mohamad Zulazri B. Suradi', 'Bahagian Pusat Sumber &', 'J29', 0),
(122, 'Ahmad Khir Bin Dosah', 'Bahagian Pusat Sumber &', 'F29', 1),
(123, 'Mohd Nor Bin Pun', 'Bahagian Pusat Sumber &', 'J17', 0),
(124, 'Muslimahtun Bt. Muktarruddin', 'Bahagian Pusat Sumber &', 'FT17', 0),
(125, 'Mohd Najib B Aziz', 'Bahagian Pusat Sumber &', 'S17', 0),
(126, 'Suzani Binti Zuraiman', 'Bahagian Pusat Sumber &', 'S17', 0),
(127, 'Siti Kalthom Bt Tasirin ', 'Bahagian Pengurusan Pelajar & Latihan', 'J44', 0),
(128, 'Muslihah Binti Mustaffa Bakri', 'Bahagian Pengurusan Pelajar & Latihan', 'J36', 0),
(129, 'Noryati Bt. Md Yasin', 'Bahagian Pengurusan Pelajar & Latihan', 'J36', 0),
(130, 'Nur Azlia Bt. Baharuddin', 'Bahagian Pengurusan Pelajar & Latihan', 'J17', 0),
(131, 'Anisah Binti Tinguan', 'Bahagian Kawalan Kualiti Latihan', 'J44', 0),
(132, 'Rozana Bt Othman', 'Bahagian Kawalan Kualiti Latihan', 'J36', 0),
(133, 'Ngadihan Bin Nawirjo', 'Bahagian Kawalan Kualiti Latihan', 'J38', 0),
(134, 'Zurina Bt. Mohammad Karoni', 'Bahagian Kawalan Kualiti Latihan', 'J38', 0),
(135, 'Norliana Bt Abu Bakar', 'Bahagian Kawalan Kualiti Latihan', 'J17', 0),
(136, 'Mohd Noor Che Seman', 'Bahagian Kawalan Kualiti Latihan', 'J29', 0),
(137, 'Ahmad Shahir Bin Husin @ Mukti', 'Bahagian Kawalan Kualiti Latihan', 'J29', 1),
(138, 'Faizal Bin Yahaya', 'Bahagian Kawalan Kualiti Latihan', 'J17', 0),
(139, 'Muhammad Muzzammil Bin Abdullah', 'Bahagian Pembangunan & Pengurusan Aset', 'J41', 0),
(140, 'Mohd Rais B Mahmuddin', 'Bahagian Pembangunan & Pengurusan Aset', 'J29', 0),
(141, 'Mustafa B Zakaria', 'Bahagian Pembangunan & Pengurusan Aset', 'J22', 0),
(142, 'Normah Binti Mohd Yussof', 'Bahagian Pembangunan & Pengurusan Aset', 'J22', 0),
(143, 'Mohammad Irwan Shah Bin Busrah', 'Bahagian Pembangunan & Pengurusan Aset', 'J17', 0),
(144, 'Karmawijaya Bin Mohd Jaafar', 'Bahagian Pembangunan & Pengurusan Aset', 'J17', 0),
(145, 'Mohamad Hishammudin B. Jamaludin ', 'Bahagian Pembangunan & Pengurusan Aset', 'R17', 0),
(146, 'Nor Rashidah Bt Mat Salleh', 'Asrama Dan Fasiliti', 'N17 (PA)', 0),
(147, 'Ahmad Safuat B. Abd. Karim', 'Asrama Dan Fasiliti', 'N17 (PA)', 0),
(148, 'Sambin B Amir', 'Asrama Dan Fasiliti', 'H11 (PRA)', 0),
(149, 'Rohaizad B Bahaudin', 'Asrama Dan Fasiliti', 'R1 (PRA)', 0),
(150, 'Azmi Bin Che Husin', 'Asrama Dan Fasiliti', 'H11 (PRA)', 0),
(151, 'Siti Wan Zunita Bt Wan Mohd', 'Asrama Dan Fasiliti', 'H11 (PRA)', 0),
(152, 'Rosdiana Bt Mohd Mohd Nadri', 'Asrama Dan Fasiliti', 'H11 (PRA)', 0),
(153, 'Datin Aizan Binti Ja\'Afar', 'Bahagian Hubungan Industri Dan Komunikasi Korporat', 'J42', 0),
(154, 'Rohani Bt Shafehee', 'Bahagian Hubungan Industri Dan Komunikasi Korporat', 'J36', 0),
(155, 'Bahari Bin Hassan', 'Bahagian Hubungan Industri Dan Komunikasi Korporat', 'J36', 0),
(156, 'Kamal Hisham Bin Idris', 'Bahagian Hubungan Industri Dan Komunikasi Korporat', 'J36', 0),
(157, 'Zamrus B Abd Karim', 'Bahagian Hubungan Industri Dan Komunikasi Korporat', 'J22', 0),
(158, 'Mohd Fauzi Bin Abu Samah', 'Bahagian Hubungan Industri Dan Komunikasi Korporat', 'J22', 0),
(159, 'Siti Fairusniza Bt. Mansor', 'Bahagian Hubungan Industri Dan Komunikasi Korporat', 'J17', 0),
(160, 'Rashidah Bt Mohamad Gaus', 'Bahagian Hubungan Industri Dan Komunikasi Korporat', 'J17', 0),
(161, 'Jamaluddin Bin Saffar', 'Bahagian Hubungan Industri Dan Komunikasi Korporat', 'J17', 0),
(162, 'Waqiuddeen Afif B Md Saad', 'Bahagian Hubungan Industri Dan Komunikasi Korporat', 'N17', 0),
(163, 'Mokhtar Bin Saad', 'Bahagian Khidmat Pengurusan', 'N36', 0),
(164, 'Hasliza Bt Abdul Nayas Mukmin', 'Bahagian Khidmat Pengurusan', 'N27', 0),
(165, 'Biamuhirshah Bin Mat Sagap', 'Pentadbiran / Perkhidmatan', 'N22 (PT(P/O)', 0),
(166, 'Yusmarni Btyahaya', 'Pentadbiran / Perkhidmatan', 'N22 (PT(P/O)', 0),
(167, 'Siti Sarina Bt Mansor', 'Pentadbiran / Perkhidmatan', 'N17 (PT(P/O)', 0),
(168, 'Mohd Aminuddin B, Md Afandi', 'Pentadbiran / Perkhidmatan', 'N17 (PT(P/O)', 0),
(169, 'Azman B Ahmad', 'Pentadbiran / Perkhidmatan', 'N17 (PT(P/O)', 1),
(170, 'Shaharuddin B Jarin', 'Pentadbiran / Perkhidmatan', 'N11 (PAP)', 0),
(171, 'Md Lazim B Long', 'Pentadbiran / Perkhidmatan', 'H11 (PKB)', 0),
(172, 'Norulhamal Bin Mohd Sham', 'Pentadbiran / Perkhidmatan', 'R3 (PKB)', 0),
(173, 'Rohayah Bt Harun', 'Pentadbiran / Perkhidmatan', 'H11 (PRA)', 0),
(174, 'Shah Affendy Bin Samsuri', 'Pentadbiran / Perkhidmatan', 'H11 (PRA)', 0),
(175, 'Shuhaimi Bin Mian', 'Pentadbiran / Perkhidmatan', 'H11 (PRA)', 0),
(176, 'Mohd Sahadi B Mohamad', 'Pendaftaran & Rekod / Kewangan', 'N17 (PT(S))', 0),
(177, 'Umi Selamah Bt Abd Rashid', 'Pendaftaran & Rekod / Kewangan', 'W17 (PT(K))', 0),
(178, 'Siti Rahayu Binti Aziz', 'Pendaftaran & Rekod / Kewangan', 'W17 (PT(K))', 0),
(179, 'Mohammad Asyraf Bin Sait', 'Pendaftaran & Rekod / Kewangan', 'W17 (PT(K))', 0),
(180, 'Parmeswari A/P Letchemenen', 'Unit Pembangunan Insan', 'S41', 0),
(181, 'Alvensus Gin Jit', 'Unit Pembangunan Insan', 'S27', 0),
(182, 'Juselin Anak Bakit', 'Unit Pembangunan Insan', 'S17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `survey_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `yearService` varchar(4) NOT NULL,
  `yearILPKL` varchar(4) NOT NULL,
  `u21` varchar(1) NOT NULL,
  `u22` varchar(1) NOT NULL,
  `u23` varchar(1) NOT NULL,
  `u24` varchar(1) NOT NULL,
  `u25` varchar(1) NOT NULL,
  `u31` text NOT NULL,
  `u32` text NOT NULL,
  `u33` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`survey_id`, `staff_id`, `yearService`, `yearILPKL`, `u21`, `u22`, `u23`, `u24`, `u25`, `u31`, `u32`, `u33`) VALUES
(1, 137, '2005', '2005', 'Y', 'Y', 'T', 'T', 'Y', 'Pengakap,RelaSIS', 'ICT,WebMaster', 'JTM,ILPKL'),
(2, 9, '2000', '2000', 'Y', 'Y', 'Y', 'Y', 'Y', '', '', ''),
(3, 122, '2003', '2006', 'Y', 'Y', 'T', 'T', 'T', '', '', ''),
(4, 169, '2004', '2004', 'Y', 'Y', 'T', 'T', 'T', 'kllkljkl', 'lklk,llkl,gtyfyty', 'klkl,kljljl,yfytytfyt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`survey_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;
--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `survey_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
