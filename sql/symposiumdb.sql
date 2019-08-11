-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2018 at 09:41 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `symposiumdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `admin_type` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `admin_type`, `password`) VALUES
(1, 'admin@gmail.com', 'Admin', '1501253a20bfd5826734648b89eed62f9aa415cf'),
(2, 'operator@gmail.com', 'Operator', '1501253a20bfd5826734648b89eed62f9aa415cf');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_rocord`
--

CREATE TABLE `attendance_rocord` (
  `record_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `session_id` varchar(30) NOT NULL,
  `datetimes` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Information Technology'),
(2, 'Hospitality Management');

-- --------------------------------------------------------

--
-- Table structure for table `dates`
--

CREATE TABLE `dates` (
  `id` int(11) NOT NULL,
  `date_1` varchar(20) NOT NULL,
  `date_2` varchar(20) NOT NULL,
  `date_3` varchar(20) NOT NULL,
  `date_4` varchar(20) NOT NULL,
  `date_5` varchar(20) NOT NULL,
  `date_6` varchar(20) NOT NULL,
  `date_7` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dates`
--

INSERT INTO `dates` (`id`, `date_1`, `date_2`, `date_3`, `date_4`, `date_5`, `date_6`, `date_7`) VALUES
(1, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `full_papers`
--

CREATE TABLE `full_papers` (
  `paper_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `subject_area` varchar(150) NOT NULL,
  `reviewer_name` varchar(50) NOT NULL,
  `result` varchar(20) NOT NULL,
  `submit_date` datetime NOT NULL,
  `pdf_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='result (1 or 0) should add foreign keys';

--
-- Dumping data for table `full_papers`
--

INSERT INTO `full_papers` (`paper_id`, `category_name`, `user_id`, `title`, `subject_area`, `reviewer_name`, `result`, `submit_date`, `pdf_name`) VALUES
(1, 'HUMINITIES & SOCIAL SCIENCE', 1, 'Human Accident Behave', 'This is the subject area', 'Not Assigned', 'Pending', '2018-08-29 00:28:03', 'Test_doc.docx'),
(2, 'HUMINITIES & SOCIAL SCIENCE', 2, 'How to Love Someone', 'This is the subject area', 'Not Assigned', 'Pending', '2018-08-29 00:31:53', 'Test_doc.docx'),
(3, 'Halal', 3, 'Softaware innovation ', 'This is the subject area', 'MRS.Wathsala Samarasekara', 'Accepted', '2018-08-29 00:33:51', 'Test_doc.docx');

-- --------------------------------------------------------

--
-- Table structure for table `log_records`
--

CREATE TABLE `log_records` (
  `record_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name_initial` varchar(100) NOT NULL,
  `in_date` date NOT NULL,
  `in_time` time NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_records`
--

INSERT INTO `log_records` (`record_id`, `user_id`, `name_initial`, `in_date`, `in_time`, `user_type`) VALUES
(1, 1, 'admin@gmail.com->Admin', '2018-08-29', '00:07:08', 'Admin'),
(2, 1, 'admin@gmail.com->Admin', '2018-08-29', '00:14:19', 'Admin'),
(3, 2, 'operator@gmail.com->Operator', '2018-08-29', '00:14:32', 'Operator'),
(4, 1, 'admin@gmail.com->Admin', '2018-08-29', '00:50:41', 'Admin'),
(5, 2, 'operator@gmail.com->Operator', '2018-08-29', '00:55:35', 'Operator'),
(6, 1, 'admin@gmail.com->Admin', '2018-08-29', '00:59:29', 'Admin'),
(7, 2, 'operator@gmail.com->Operator', '2018-08-29', '00:59:48', 'Operator'),
(8, 1, 'admin@gmail.com->Admin', '2018-08-29', '01:08:52', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `heading` varchar(100) NOT NULL,
  `discrip` varchar(500) NOT NULL,
  `descrip_2` varchar(500) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `heading`, `discrip`, `descrip_2`, `date_time`) VALUES
(1, 'SYMPOSIUM (SRS 2018)', 'SRS 2018 provides a forum for academics/researchers/ Students of SLIATE', 'SRS 2018 provides a forum for academics/researchers/ Students of SLIATE and Sri Lankan universities to share their experience/new knowledge with their colleagues and outsiders. ', 'Full Papers are invited under the following categories: Bussiness (Management, Accountancy, Tourism and Hospitality Management), Technology (Information Technology, Agriculture & Food Science, and Engineering), Humanities & social science (English,& law..) to be presented at the SRS 2018 and published in the proceedings of SRS 2018', '2018-08-29 00:23:24'),
(2, 'TECHNOSOFT 2017 software competition', 'TECHNOSOFT 2017 software competition for student of Universities, ATI, Educations Institutes and Sch', 'TECHNOSOFT 2017 software competition for student of Universities, ATI, Educations Institutes and Schools. Organized by IT Department ATI Gampaha. the competition was successfully completed.', 'TECHNOSOFT 2017 software competition for student of Universities, ATI, Educations Institutes and Schools. Organized by IT Department ATI Gampaha. the competition was successfully completed.', '2018-08-29 00:24:11'),
(3, ' ENZEAL, Is one of the distinct event', 'ENZEAL, is one of the distinct events organized by Sri Lanka Institute of Advanced.', 'ENZEAL, is one of the distinct events organized by Sri Lanka Institute of Advanced Technological Education (SLIATE) with the purpose of enhancing the opportunities and exposure to use English and as well as to bring out the hidden talents of our students in various fields of English.', 'We hope that the event will serve as a motivational event for students of English at SLIATE and an arena where learners can exchange experience.', '2018-08-29 00:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `reviewer`
--

CREATE TABLE `reviewer` (
  `reviewer_id` int(11) NOT NULL,
  `reviewer_name` varchar(60) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `phone_no` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `datetimes` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviewer`
--

INSERT INTO `reviewer` (`reviewer_id`, `reviewer_name`, `designation`, `phone_no`, `email`, `datetimes`) VALUES
(1, 'MR.Gayan', 'Lecture', 778899000, 'gayan@gmail.com', '2018-08-29 00:16:43'),
(2, 'MRS.Wathsala Samarasekara', 'Lecture', 777766555, 'samarasekara@gmail.com', '2018-08-29 00:18:25'),
(3, 'Mr.DB.Dodanthanna', 'Docter', 776655441, 'dodamthanna@gmail.com', '2018-08-29 00:19:36'),
(4, 'MRS.Sandaruwan Wickremasinghe', 'Docter', 774243333, 'wickram@gmail.com', '2018-08-29 00:21:37');

-- --------------------------------------------------------

--
-- Table structure for table `review_details`
--

CREATE TABLE `review_details` (
  `reviewer_name` varchar(60) NOT NULL,
  `review_id` int(11) NOT NULL,
  `paper_id` int(20) NOT NULL,
  `added_date` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  `notes` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_details`
--

INSERT INTO `review_details` (`reviewer_name`, `review_id`, `paper_id`, `added_date`, `status`, `notes`) VALUES
('MRS.Wathsala Samarasekara', 1, 3, '2018-08-29 01:05:56', 'Accepted', 'This paper should contain much bettor instructions');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int(11) NOT NULL,
  `session_date` date NOT NULL,
  `session_name` varchar(50) NOT NULL,
  `venue` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `begin_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `session_date`, `session_name`, `venue`, `category`, `begin_time`, `end_time`) VALUES
(1, '2018-09-21', 'Session1', 'Hall:01', 'Information Technology', '08:00:00', '10:00:00'),
(2, '2018-09-28', 'Session2', 'Hall:02', 'Hospitality Management', '08:00:00', '11:00:00'),
(3, '2018-09-29', 'Session3', 'Hall:03', 'Management', '08:00:00', '10:00:00'),
(4, '2018-09-29', 'Session4', 'Hall:03', 'Information Technology', '11:00:00', '13:00:00'),
(5, '2018-09-29', 'Session5', 'Hall:02', 'Hospitality Management', '11:00:00', '12:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `institute` varchar(50) NOT NULL,
  `name_initial` varchar(60) NOT NULL,
  `salutation` varchar(10) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `add_line1` varchar(50) NOT NULL,
  `add_line2` varchar(50) NOT NULL,
  `add_line3` varchar(50) NOT NULL,
  `dated` date NOT NULL,
  `ttime` time NOT NULL,
  `accommodation` varchar(100) NOT NULL,
  `food_type` varchar(30) NOT NULL,
  `image` varchar(50) NOT NULL,
  `qr` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='extra_colum for future adjustments. accommodation.';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `user_type`, `institute`, `name_initial`, `salutation`, `phone_no`, `add_line1`, `add_line2`, `add_line3`, `dated`, `ttime`, `accommodation`, `food_type`, `image`, `qr`) VALUES
(1, 'Kapila', 'Pradeep', 'osapsilva@gmail.com', '1501253a20bfd5826734648b89eed62f9aa415cf', 'Researcher', 'SLIATE', 'OAP.SIlva', 'Dr.', '774244755', '1/462', 'Udawela', 'Tharana-udawela', '2018-08-29', '00:28:02', 'No Need Accomodation', 'Vegetarian', '1.png', '1.png'),
(2, 'Dushyantha', 'Chandrasekara', 'dush@gmail.com', '1501253a20bfd5826734648b89eed62f9aa415cf', 'Researcher', 'SLIATE', 'CDSN', 'Mr', '779090909', 'No:115', 'Mahakirinda', 'Mahagirilla', '2018-08-29', '00:31:53', 'Need Accomodation', 'Halal', '2.png', '2.png'),
(3, 'Dasun', 'Anuraj', 'dasun@gmail.com', '1501253a20bfd5826734648b89eed62f9aa415cf', 'Researcher', 'SLIATE', 'MDSH Dhrmarathna', 'Dr.', '0774666555', '1/462', 'Udawela', 'Tharana-udawela', '2018-08-29', '00:33:51', 'Need Accomodation', 'Dairy free', '3.png', '3.png'),
(4, 'Sachithra', 'Ekanayaka', 'sachithra@gmail.com', '1501253a20bfd5826734648b89eed62f9aa415cf', 'Participant', 'ESOFT', 'DFS.Ekanayake', 'Ms.', '0712343344', '1/462', 'Ambillawala', 'Palugassegama', '2018-08-29', '00:51:15', 'Need Accomodation', 'Gluten free', '4.png', '4.png'),
(5, 'Hiruni', 'Sandeepa', 'hiru@gmail.com', '1501253a20bfd5826734648b89eed62f9aa415cf', 'Participant', 'NSBM', 'HDG.Withanage', 'Ms.', '0768899009', 'No:07/432', 'Arangala', 'Malambe', '2018-08-29', '00:55:03', 'Need Accomodation', 'Dairy free', '5.png', '5.png'),
(6, 'Dulaj', 'Nalinda', 'dulaj@gmail.com', '1501253a20bfd5826734648b89eed62f9aa415cf', 'Participant', 'AIRFORCE Acadamy', 'MDN.SIlva', 'Mr', '0776655444', '1/462', 'Udawela', 'Tharana-udawela', '2018-08-29', '00:56:47', 'Need Accomodation', 'Dairy free', '6.png', '6.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `attendance_rocord`
--
ALTER TABLE `attendance_rocord`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `dates`
--
ALTER TABLE `dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `full_papers`
--
ALTER TABLE `full_papers`
  ADD PRIMARY KEY (`paper_id`);

--
-- Indexes for table `log_records`
--
ALTER TABLE `log_records`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviewer`
--
ALTER TABLE `reviewer`
  ADD PRIMARY KEY (`reviewer_id`);

--
-- Indexes for table `review_details`
--
ALTER TABLE `review_details`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_no` (`phone_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_rocord`
--
ALTER TABLE `attendance_rocord`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `full_papers`
--
ALTER TABLE `full_papers`
  MODIFY `paper_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `log_records`
--
ALTER TABLE `log_records`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reviewer`
--
ALTER TABLE `reviewer`
  MODIFY `reviewer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `review_details`
--
ALTER TABLE `review_details`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
