-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2023 at 06:17 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam_registration_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `uname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `registration_control` tinyint(1) NOT NULL DEFAULT 0,
  `admitCard` tinyint(1) NOT NULL DEFAULT 0,
  `logo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uname`, `email`, `address1`, `address2`, `registration_control`, `admitCard`, `logo`, `password`) VALUES
('Department of Bachelor in Computer Applications', 'admin@login.com', 'Kirtipur', 'Nepal', 1, 1, '../uploads/education.png', 'e6e061838856bf47e1de730719fb2609');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `sid` int(11) NOT NULL,
  `apply_date` varchar(50) NOT NULL,
  `semester` int(11) NOT NULL,
  `exam_type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `subs` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`sid`, `apply_date`, `semester`, `exam_type`, `status`, `payment`, `subs`) VALUES
(11, '2023-Jun-17 | 05:50:51pm', 2, 0, 1, 0, '[\"CACS305\",\"CACS306\",\"CACS307\",\"CACS308\",\"CACS309\"]');

-- --------------------------------------------------------

--
-- Table structure for table `board_name`
--

CREATE TABLE `board_name` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `board_name`
--

INSERT INTO `board_name` (`id`, `name`) VALUES
(1, 'Agriculture and Forestry University, Chitwan'),
(2, 'Far-western University, Kanchanpur'),
(3, 'Kathmandu University, Dhulikhel'),
(4, 'Mid Western Universit, Birendranagar'),
(5, 'Nepal Open University, Lalitpur'),
(6, 'Pokhara Universiy, Pokhara'),
(7, 'Purbanchal University, Biratnagar'),
(8, 'Tribhuvan Universitym Kirtipur'),
(9, 'HSEB/NEB'),
(10, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `cid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`cid`, `name`, `email`, `password`) VALUES
(2, 'Ratna Rajyalaxmi Campus', 'rr@tu.com', 'rr123'),
(3, 'Patan Multiple Campus', 'pmc@tu.com', 'pmc123'),
(53, 'Padmakandya Campus', 'pk@tu.com', 'pk123');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `stateno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `title`, `stateno`) VALUES
(1, 'Achham', 7),
(2, 'Arghakhanchi', 5),
(3, 'Baglung', 4),
(4, 'Baitadi', 7),
(5, 'Bajhang', 7),
(6, 'Bajura', 7),
(7, 'Banke', 5),
(8, 'Bara', 2),
(9, 'Bardiya', 5),
(10, 'Bhaktapur', 3),
(11, 'Bhojpur', 1),
(12, 'Chitwan', 3),
(13, 'Dadeldhura', 7),
(14, 'Dailekh', 6),
(15, 'Dang', 5),
(16, 'Darchula', 7),
(17, 'Dhading', 3),
(18, 'Dhankuta', 1),
(19, 'Dhanusa', 2),
(20, 'Dolakha', 3),
(21, 'Dolpa', 6),
(22, 'Doti', 7),
(23, 'Gorkha', 4),
(24, 'Gulmi', 5),
(25, 'Humla', 6),
(26, 'Ilam', 1),
(27, 'Jajarkot', 6),
(28, 'Jhapa', 1),
(29, 'Jumla', 6),
(30, 'Kailali', 7),
(31, 'Kalikot', 6),
(32, 'Kanchanpur', 7),
(33, 'Kapilbastu', 5),
(34, 'Kaski', 4),
(35, 'Kathmandu', 3),
(37, 'Kavrepalanchok', 3),
(38, 'Khotang', 1),
(39, 'Lalitpur', 3),
(40, 'Lamjung', 4),
(41, 'Mahottari', 2),
(42, 'Makwanpur', 3),
(43, 'Manang', 4),
(44, 'Morang', 1),
(45, 'Mugu', 6),
(46, 'Mustang', 4),
(47, 'Myagdi', 4),
(48, 'Nawalpur', 4),
(49, 'Nuwakot', 3),
(50, 'Okhaldhunga', 1),
(51, 'Palpa', 5),
(52, 'Panchthar', 1),
(53, 'Parbat', 4),
(48, 'Parasi', 5),
(54, 'Parsa', 2),
(55, 'Pyuthan', 5),
(56, 'Ramechhap', 3),
(57, 'Rasuwa', 3),
(58, 'Rautahat', 2),
(59, 'Rolpa', 5),
(60, 'Rukum East', 5),
(61, 'Rukum West', 6),
(62, 'Rupandehi', 5),
(63, 'Salyan', 6),
(64, 'Sankhuwasabha', 1),
(65, 'Saptari', 2),
(66, 'Sarlahi', 2),
(67, 'Sindhuli', 3),
(68, 'Sindhupalchok', 3),
(69, 'Siraha', 2),
(70, 'Solukhumbu', 1),
(71, 'Sunsari', 1),
(72, 'Surkhet', 6),
(73, 'Syangja', 4),
(74, 'Tanahu', 4),
(75, 'Taplejung', 1),
(76, 'Terhathum', 1),
(77, 'Udayapur', 1);

-- --------------------------------------------------------

--
-- Table structure for table `educational_description`
--

CREATE TABLE `educational_description` (
  `sid` int(11) NOT NULL,
  `degree_id` int(11) NOT NULL,
  `board_id` int(11) NOT NULL,
  `major_subjects` varchar(255) NOT NULL,
  `academic_year` varchar(8) NOT NULL,
  `Division/Grade` varchar(20) NOT NULL,
  `complition_year` varchar(8) NOT NULL,
  `document_img` varchar(255) NOT NULL,
  `document_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `educational_description`
--

INSERT INTO `educational_description` (`sid`, `degree_id`, `board_id`, `major_subjects`, `academic_year`, `Division/Grade`, `complition_year`, `document_img`, `document_title`) VALUES
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(2, 1, 1, 'CSIT', '2076', '2.88', '2079', '/uploads/download.jpg', 'Transcript'),
(8, 2, 9, 'Biology', '2075', '2.42', '2077', '/uploads/imresizer-1683567370709.jpg', 'Transcript'),
(8, 2, 9, 'Biology', '2075', '2.42', '2077', '/uploads/345894416_961431278203213_3491059998105093869_n.jpg', 'Transcript'),
(9, 3, 4, 'Biology', '2080', '2.78', '2081', '/uploads/it.jpg', 'Transcript'),
(9, 3, 4, 'Math', '4561', '2.15', '6584', '/uploads/Ganatantra-Diwas-1.png', 'Test'),
(9, 1, 1, '', '', '', '', '/uploads/', ''),
(2, 2, 9, 'Computer Science, Mathematics', '2076', '2.88', '2079', '/uploads/imageonline-co-placeholder-image (1).png', 'Transcript'),
(10, 2, 9, 'Computer Science, Mathematics', '2076', '2.88', '2079', '/uploads/Rajesh_Hamal_in_2022_(cropped).jpg', 'Transcript'),
(11, 1, 9, 'Computer Science, Mathematics', '2076', '2.88', '2078', '/uploads/+2_Academic_Transcript.jpg', 'Transcript');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `subject_code` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `credit_hours` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`subject_code`, `name`, `credit_hours`, `semester`, `fee`) VALUES
('CACS205', 'Digital Logic', 3, 1, 500),
('CACS206', 'Mathematics I', 3, 1, 600),
('CACS207', 'cfa', 4, 1, 700),
('CACS208', 'eng', 3, 1, 800),
('CACS209', 'sot', 3, 1, 900),
('CACS305', 'C Programming', 4, 2, 500),
('CACS306', 'Mathematics II', 3, 2, 400),
('CACS307', 'English II', 3, 2, 400),
('CACS308', 'Microprocessor and Computer Architecture', 3, 2, 400),
('CACS309', 'Account', 3, 2, 400);

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `gender`) VALUES
(0, 'Male'),
(1, 'Female'),
(2, 'Third Gender');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `lid` int(11) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`lid`, `level`) VALUES
(1, 'Bachelor'),
(2, 'Masters'),
(3, 'PhD');

-- --------------------------------------------------------

--
-- Table structure for table `programme`
--

CREATE TABLE `programme` (
  `pid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programme`
--

INSERT INTO `programme` (`pid`, `name`) VALUES
(1, 'Bachelor in Computer Application');

-- --------------------------------------------------------

--
-- Table structure for table `recent_degree`
--

CREATE TABLE `recent_degree` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recent_degree`
--

INSERT INTO `recent_degree` (`id`, `name`) VALUES
(1, 'SLC/SEE'),
(2, '+2/PCL'),
(3, 'Bachelors'),
(4, 'Masters'),
(5, 'MPhil'),
(6, 'Phd');

-- --------------------------------------------------------

--
-- Table structure for table `selected_subjects`
--

CREATE TABLE `selected_subjects` (
  `subject_code` varchar(10) NOT NULL,
  `std_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `selected_subjects`
--

INSERT INTO `selected_subjects` (`subject_code`, `std_id`) VALUES
('CACS305', 11),
('CACS306', 11),
('CACS307', 11),
('CACS308', 11),
('CACS309', 11);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester` int(11) NOT NULL,
  `active` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester`, `active`) VALUES
(1, 'inactive'),
(2, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `fname_np` varchar(255) NOT NULL,
  `mname_np` varchar(255) NOT NULL,
  `lname_np` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL,
  `marital_status` int(11) NOT NULL,
  `citizenshipno` varchar(50) NOT NULL,
  `citizenship_img` varchar(100) NOT NULL,
  `district_id` int(11) DEFAULT 78,
  `permanent_address` varchar(255) NOT NULL,
  `temporary_address` varchar(255) NOT NULL,
  `landline` varchar(50) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `profile_img` varchar(255) NOT NULL,
  `sign_img` varchar(255) NOT NULL,
  `level_id` int(11) NOT NULL DEFAULT -1,
  `college_id` int(11) NOT NULL DEFAULT -1,
  `programme_id` int(11) NOT NULL DEFAULT -1,
  `academic_year` int(11) NOT NULL DEFAULT -1,
  `registration_number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `phone`, `address`, `email`, `password`, `firstname`, `middlename`, `lastname`, `fname_np`, `mname_np`, `lname_np`, `father_name`, `mother_name`, `gender`, `marital_status`, `citizenshipno`, `citizenship_img`, `district_id`, `permanent_address`, `temporary_address`, `landline`, `dob`, `profile_img`, `sign_img`, `level_id`, `college_id`, `programme_id`, `academic_year`, `registration_number`) VALUES
(10, 'Alen Bahadur Pariyar', '9806487522', '', 'alenpariyar@gmail.com', '5cb5f545ac96c08964fe0a1c4e4252c2', 'Alen', '', 'Pariyar', 'एलेन', '', 'परियार', 'Surya', 'Bhagawati', 0, 0, '45-01-79-00879', 'uploads/', 40, 'Lamjung, Nepal', 'Budhanilkantha, Nepal', '456-987-21', '2003-10-10', 'uploads/349153118_289617536738005_7932081809058556609_n.jpg', 'uploads/R.png', 1, 2, 1, 2076, '42-79-301'),
(11, 'Alen  Pariyar', '9816699413', '', 'oct10.alenpariyar@gmail.com', '5cb5f545ac96c08964fe0a1c4e4252c2', 'Alen', '', 'Pariyar', 'एलेन', '', 'परियार', 'Surya Kumar Pariyar', 'Bhagawati Pariyar', 0, 0, '7898-654-258', 'uploads/IMG_001.jpeg', 40, 'Lamjung, Nepal', 'Kathmandu', '', '2003-10-10', 'uploads/349153118_289617536738005_7932081809058556609_n.jpg', 'uploads/R.png', 1, 2, 1, 2079, '258-654-123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `board_name`
--
ALTER TABLE `board_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`subject_code`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `programme`
--
ALTER TABLE `programme`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `recent_degree`
--
ALTER TABLE `recent_degree`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `board_name`
--
ALTER TABLE `board_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `programme`
--
ALTER TABLE `programme`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `recent_degree`
--
ALTER TABLE `recent_degree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
