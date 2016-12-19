-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2016 at 03:38 PM
-- Server version: 5.7.11-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `resume`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `ADMIN_ID` int(10) NOT NULL AUTO_INCREMENT,
  `ADMIN_USERNAME` varchar(50) NOT NULL,
  `ADMIN_PSW` varchar(12) NOT NULL,
  `ADMIN_CPSW` varchar(12) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `ADMIN_GENDER` varchar(6) NOT NULL,
  `ADMIN_STATUS` int(5) NOT NULL,
  `usertype_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`ADMIN_ID`),
  KEY `ut_admin_id_idx` (`usertype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ADMIN_ID`, `ADMIN_USERNAME`, `ADMIN_PSW`, `ADMIN_CPSW`, `EMAIL`, `ADMIN_GENDER`, `ADMIN_STATUS`, `usertype_id`) VALUES
(5, 'admin3', 'ADMIN3', 'ADMIN3', 'vijSDAFay@gmail.com', 'F', 2, 2),
(6, 'sdf', 'adsf', 'asdf', 'adsf@gmail.com', 'M', 1, 2),
(8, 'adsf', 'sdf', 'fasdf', 'vijay@gmail.com', 'M', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `content_writer`
--

CREATE TABLE IF NOT EXISTS `content_writer` (
  `Content_writer_id` int(100) NOT NULL AUTO_INCREMENT,
  `First_name` varchar(100) DEFAULT NULL,
  `Last_name` varchar(100) DEFAULT NULL,
  `Email_id` varchar(45) DEFAULT NULL,
  `User_name` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `Confirm_password` varchar(45) DEFAULT NULL,
  `Gender` varchar(100) DEFAULT NULL,
  `Alternate_email` varchar(45) DEFAULT NULL,
  `Phone_No` varchar(12) NOT NULL,
  `Profile_picture_path` varchar(500) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `Experience` varchar(20) NOT NULL,
  `Profile_summary` varchar(250) NOT NULL,
  `Domain` varchar(50) NOT NULL,
  `usertype_id` int(10) DEFAULT NULL,
  `Quotation` int(100) DEFAULT NULL,
  `inserted_by` varchar(45) DEFAULT NULL,
  `inserted_time` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Content_writer_id`),
  KEY `usertype_id_idx` (`usertype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `content_writer`
--

INSERT INTO `content_writer` (`Content_writer_id`, `First_name`, `Last_name`, `Email_id`, `User_name`, `Password`, `Confirm_password`, `Gender`, `Alternate_email`, `Phone_No`, `Profile_picture_path`, `Address`, `Experience`, `Profile_summary`, `Domain`, `usertype_id`, `Quotation`, `inserted_by`, `inserted_time`, `updated_by`, `updated_time`) VALUES
(5, 'asdf', 'adsf', 'vijay@gmail.com', 'vijay', 'fdfvv', 'vijay', 'M', 'vij@gmail.com', 'fdf', 'images/js.jpg', 'asdf', '5', 'The right words can be incredibly effective. ', 'dfASDF', 3, NULL, NULL, NULL, NULL, NULL),
(6, 'asdf', 'adsf', 'vijay@gmail.com', 'vijayvvvvvvv', 'fdfvvvvvvv', 'vijayvvvvvvv', 'M', 'vij@gmail.com', 'fdf', 'images/js1.jpg', 'asdf', '5', 'The right words can be incredibly effective. ', 'dfASDF', 3, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_seeker`
--

CREATE TABLE IF NOT EXISTS `job_seeker` (
  `Job_Seeker_Id` int(100) NOT NULL AUTO_INCREMENT,
  `First_name` varchar(100) DEFAULT NULL,
  `Last_name` varchar(100) DEFAULT NULL,
  `Gender` varchar(100) DEFAULT NULL,
  `Email_id` varchar(45) DEFAULT NULL,
  `User_name` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `Alternate_email` varchar(45) DEFAULT NULL,
  `Phone_No` varchar(12) NOT NULL,
  `Alternate_Phone_no` varchar(15) DEFAULT NULL,
  `Profile_picture_path` varchar(45) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `Experience_level` varchar(45) DEFAULT NULL,
  `Domain` varchar(200) DEFAULT NULL,
  `Father_Name` varchar(45) DEFAULT NULL,
  `language_name` varchar(45) NOT NULL,
  `profficiency_level` varchar(45) NOT NULL,
  `lan_read` varchar(5) NOT NULL,
  `lan_write` varchar(5) NOT NULL,
  `lan_speak` varchar(5) NOT NULL,
  `usertype_id` int(10) NOT NULL,
  `inserted_by` varchar(100) NOT NULL,
  `inserted_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(50) NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(10) NOT NULL,
  PRIMARY KEY (`Job_Seeker_Id`,`usertype_id`),
  KEY `ut_js_id_idx` (`usertype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `job_seeker`
--

INSERT INTO `job_seeker` (`Job_Seeker_Id`, `First_name`, `Last_name`, `Gender`, `Email_id`, `User_name`, `Password`, `Alternate_email`, `Phone_No`, `Alternate_Phone_no`, `Profile_picture_path`, `Address`, `Experience_level`, `Domain`, `Father_Name`, `language_name`, `profficiency_level`, `lan_read`, `lan_write`, `lan_speak`, `usertype_id`, `inserted_by`, `inserted_time`, `updated_by`, `updated_time`, `status`) VALUES
(27, 'vijay', 'kumar', NULL, 'vijayintelli72@gmail.com', 'gvk@123', 'suha', '', '1234567890', '', NULL, '																															', 'Fresher', '1IT', '', 'English', 'Intermediate', 'R', 'W', 'S', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1),
(28, 'veekshan', 'allaada', NULL, 'bten688@gmail.com', 'veee', 'veee', NULL, '8977177100', '', NULL, NULL, 'Fresher', '15', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1),
(29, 'dheeksha', 'Aaaa', NULL, 'dheeksha@gmail.com', 'dheeksha', 'dheeksha@@123', NULL, 'asasas', '', NULL, NULL, 'Fresher', '17', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1),
(30, 'dheeksha', 'Aaaa', NULL, 'dheeksha@gmail.com', 'dheeksha', 'dheeksha@@123', NULL, 'asasas', '', NULL, NULL, 'Fresher', '17', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1),
(31, 'dheeksha', 'Aaaa', NULL, 'dheeksha@gmail.com', 'dheeksha', 'dheeksha@@123', NULL, 'asasas', '', NULL, NULL, 'Fresher', '17', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1),
(32, 'dheeksha', 'Aaaa', NULL, 'dheeksha@gmail.com', 'dheeksha', 'dheeksha@@123', NULL, 'asasas', '', NULL, NULL, 'Fresher', '17', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1),
(33, 'dheeksha', 'Aaaa', NULL, 'dheeksha@gmail.com', 'dheeksha', 'dheeksha@@123', NULL, 'asasas', '', NULL, NULL, 'Fresher', '17', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1),
(34, 'dheeksha', 'Aaaa', NULL, 'dheeksha@gmail.com', 'dheeksha', 'dheeksha@@123', NULL, 'asasas', '', NULL, NULL, 'Fresher', '17', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1),
(35, 'ererrerere', 'trrtrttr', NULL, 'ghghghg@gmasil.conm', 'dtddffdfdfd', '5555555555555555555', NULL, '90090909090', '', NULL, NULL, 'Fresher', '19', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1),
(36, 'veekshan', 'allaada', NULL, 'bten688@gmail.com', 'vee', 'vee', NULL, '8977177100', '', NULL, NULL, 'Fresher', '10', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1),
(37, 'prachi', 'vepuri', NULL, 'prachi.vepuri09@gmail.com', 'prachi', 'vepuri', 'lijijj', '9666078606', '21648878787', NULL, 'iihububouhouhouy8o	', 'Fresher', '23', 'kjiojoiuiuo', 'jsdfusdhfushd', 'Intermediate', 'R', 'W', 'S', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1),
(38, 'Mani', 'Chegu', NULL, 'mani.srp05@gmail.com', 'Manikanta', 'mani', '', '9581958206', '9676537345', NULL, '                                                                                                                                    ', 'Fresher', '2', 'ramarao', 'telugu', 'Expert', 'R', 'W', 'S', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1),
(39, 'prachi', 'vepuri', NULL, 'prachi.vepuri09@gmail.com', 'prachi', 'prachi', NULL, '9666078606', '', NULL, NULL, 'Fresher', '23', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1),
(40, 'veekshan', 'allaada', NULL, 'bten688@gmail.com', 'lsfdnk', 'LKSNFD', NULL, ';SD,', '', NULL, NULL, 'Fresher', '17', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1),
(41, 'dinesh', 'Yaganti', NULL, 'dineshyaganti@gmail.com', 'Dinesh', 'dinesh', NULL, '9676537345', '', NULL, NULL, 'Fresher', '', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1),
(42, 'deeksha', 'm', NULL, 'deeksha@gmail.com', 'deeksha', 'DHEEKSHA@123', NULL, '9291330407', '', NULL, NULL, 'Fresher', '19', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1),
(43, 'chegu', 'mani', NULL, 'mani.srp05@gmail.com', 'mani9', 'mani', NULL, '9581958206', '', NULL, NULL, 'Fresher', '1', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1),
(44, 'chegu', 'manikanta kumar', NULL, 'chegu.mani55@gmail.com', 'mani', 'mani', NULL, '9843214791', '', NULL, NULL, 'Fresher', '7', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1),
(45, 'keshav', 'mandarapu', NULL, 'allenfrankh@gamil.com', 'keshav', 'bobby', NULL, '9000000000', '', NULL, NULL, 'Fresher', '10', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1),
(46, 'keshav', 'mandarapu', NULL, 'allenfrakh@gmail.com', 'keshav', 'bobby123', NULL, '9123445545', '', NULL, NULL, 'Experience', '10', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1),
(47, 'keshav', 'mandarapu', NULL, 'allenfrakh@gmail.com', 'keshav', 'bobby', NULL, '9000000000', '', NULL, NULL, 'Fresher', '8', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1),
(48, 'Mani', 'Chegu', NULL, 'mani.virtuellhire@gmail.com', 'mani', 'mani', NULL, '984298', '', NULL, NULL, 'Fresher', '3', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1),
(49, 'bobby', '123', NULL, 'bobby@gmail.com', 'bobby', 'keshav', '', '9123455', '91234567', NULL, '                adfasfasfasfasfasfafafaf\r\nasdfasdf\r\nafasdf\r\naasfasdfasdfasdfaf                                                                                                                    ', 'Fresher', '6', 'aasdfasdf', 'English', 'Profossional', 'R', 'W', 'S', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1),
(50, 'Nagendra', 'Prasad', NULL, 'nagprasad5u@gmail.com', 'nagendra', '8700f284526e6107e995d26930b81adc', NULL, '9618496650', '', NULL, NULL, 'Experience', '10', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1),
(51, 'manikanta', 'kumar', NULL, 'mani.virtuellhire@gmail.com', 'mani kanta kumar', 'DINESH', NULL, '9703103933', '', NULL, NULL, 'Fresher', '15', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1),
(52, 'Nagendra', 'Prasad', NULL, 'nagprasad4u@gmail.com', 'nagendra', '21232f297a57a5a743894a0e4a801fc3', NULL, '9618496650', '', NULL, NULL, 'Fresher', '10', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1),
(54, '''Joh\\''n''', '''kum\\''a\\''r''', NULL, 'john@gmail.com', NULL, '21232f297a57a5a743894a0e4a801fc3', NULL, '9618496650', NULL, NULL, NULL, 'Experienced', '5', NULL, '', '', '', '', '', 1, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1),
(55, '''Danush''', '''Raju''', NULL, 'danush@raju.com', NULL, 'ff8c852db31252d10626213c66a7bcd1', NULL, '4567891230', NULL, NULL, NULL, 'Experienced', '18', NULL, '', '', '', '', '', 1, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1),
(56, 'Donn''a', 'Abc', NULL, 'donna@gmail.com', NULL, '21232f297a57a5a743894a0e4a801fc3', NULL, '7894561230', NULL, NULL, NULL, 'Experienced', '16', NULL, '', '', '', '', '', 1, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1),
(57, 'Danush', 'Raju', NULL, 'danush@gmail.com', NULL, 'ff8c852db31252d10626213c66a7bcd1', NULL, '4567891230', NULL, NULL, NULL, 'Experienced', '18', NULL, '', '', '', '', '', 1, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `js_accomplishments`
--

CREATE TABLE IF NOT EXISTS `js_accomplishments` (
  `js_accomplishments_id` int(11) NOT NULL AUTO_INCREMENT,
  `Accomplishment_name` varchar(500) DEFAULT NULL,
  `job_seeker_id` int(100) DEFAULT NULL,
  `inserted_by` varchar(100) DEFAULT NULL,
  `inserted_time` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `updated_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`js_accomplishments_id`),
  KEY `js_idx` (`job_seeker_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `js_additional_information`
--

CREATE TABLE IF NOT EXISTS `js_additional_information` (
  `js_additional_information_id` int(11) NOT NULL AUTO_INCREMENT,
  `section_name` varchar(100) DEFAULT NULL,
  `section_information` varchar(800) DEFAULT NULL,
  `resume_template_id` int(100) DEFAULT NULL,
  `uploaded_resume_id` int(50) DEFAULT NULL,
  `user_type_id` int(10) DEFAULT NULL,
  `inserted_by` varchar(100) DEFAULT NULL,
  `inserted_time` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`js_additional_information_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `js_carrer_objective`
--

CREATE TABLE IF NOT EXISTS `js_carrer_objective` (
  `carrer_objective_id` int(100) NOT NULL AUTO_INCREMENT,
  `career_objective_name` varchar(500) DEFAULT NULL,
  `job_seeker_id` int(100) DEFAULT NULL,
  `inserted_by` varchar(100) DEFAULT NULL,
  `inserted_time` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`carrer_objective_id`),
  KEY `js_carrer_obj_id_idx` (`job_seeker_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `js_carrer_objective`
--

INSERT INTO `js_carrer_objective` (`carrer_objective_id`, `career_objective_name`, `job_seeker_id`, `inserted_by`, `inserted_time`, `updated_by`, `updated_time`) VALUES
(3, '  dsfdsdfsdssBe an intaaaaaroduction to the rest of your resume.\r\nQuickly highlight your most relevant skills and abilities (matching your competencies to the recruiters needs).\r\nGive reasons why you are applying for the position.\r\nTell the employer exactly how you will be of value to their organization.\r\nBe a good way of showing off your communication skills.\r\nMake a resume a much more personal document. ', 27, NULL, NULL, NULL, NULL),
(4, '                    ZZZZZZZZZZCCCCC                                                                                                                                                     ', 42, NULL, NULL, NULL, NULL),
(5, '                sfjasfjklajsfjaklsjflajslfjlsjfklajsdfjaklsdjfklasjdfjsdfjklsdjfksdjfksdjfklsdjfklsdjfjjsfjklsdjfklsd', 49, NULL, NULL, NULL, NULL),
(6, '                                                                                                                                                                            ', 52, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `js_certifications`
--

CREATE TABLE IF NOT EXISTS `js_certifications` (
  `js_certification_id` int(100) NOT NULL AUTO_INCREMENT,
  `Certification_name` varchar(200) DEFAULT NULL,
  `Job_seeker_id` int(100) DEFAULT NULL,
  `inserted_by` varchar(100) DEFAULT NULL,
  `inserted_time` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`js_certification_id`),
  KEY `js_id_idx` (`Job_seeker_id`),
  KEY `js_cert_id_idx` (`Job_seeker_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `js_educational_information`
--

CREATE TABLE IF NOT EXISTS `js_educational_information` (
  `js_educational_information_id` int(100) NOT NULL AUTO_INCREMENT,
  `js_qualification_name` varchar(45) DEFAULT NULL,
  `js_course` varchar(50) NOT NULL,
  `js_institution_name` varchar(100) DEFAULT NULL,
  `js_education_location` varchar(200) DEFAULT NULL,
  `js_start_date` date DEFAULT NULL,
  `js_end_date` date DEFAULT NULL,
  `js_percentage` varchar(200) DEFAULT NULL,
  `js_university` varchar(100) DEFAULT NULL,
  `job_seeker_id` int(100) DEFAULT NULL,
  `inserted_by` varchar(100) DEFAULT NULL,
  `inserted_time` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`js_educational_information_id`),
  KEY `jsid_idx` (`job_seeker_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `js_educational_information`
--

INSERT INTO `js_educational_information` (`js_educational_information_id`, `js_qualification_name`, `js_course`, `js_institution_name`, `js_education_location`, `js_start_date`, `js_end_date`, `js_percentage`, `js_university`, `job_seeker_id`, `inserted_by`, `inserted_time`, `updated_by`, `updated_time`) VALUES
(19, 'Post Graduation', 'Computer Science', 'JNTU kakinada', 'Kakinada', '2016-08-03', '2016-08-31', '55', NULL, 27, NULL, NULL, NULL, NULL),
(20, 'Graduation', 'B.Sc (MPC)', 'Chaitanya Degree College', NULL, '2016-08-03', '2016-08-31', '', NULL, 27, NULL, NULL, NULL, NULL),
(21, 'Post Graduation', 'mtech', 'SVU', NULL, '2016-09-15', '2016-09-24', '23', NULL, 42, NULL, NULL, NULL, NULL),
(22, 'Post Graduation', 'M Tech', 'nec', NULL, '0000-00-00', '0000-00-00', '7', NULL, 44, NULL, NULL, NULL, NULL),
(23, 'Post Graduation', 'fasdfasdfaf', 'adfasdfasdf', NULL, '2010-09-22', '2012-09-22', '9', NULL, 49, NULL, NULL, NULL, NULL),
(24, 'Post Graduation', 'fdsgts', 'fgsgs', NULL, '2016-09-21', '2016-09-22', '10', NULL, 48, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `js_enquiries`
--

CREATE TABLE IF NOT EXISTS `js_enquiries` (
  `js_enquiry_id` int(100) NOT NULL AUTO_INCREMENT,
  `js_jobseeker_name` varchar(100) DEFAULT NULL,
  `js_email_id` varchar(45) DEFAULT NULL,
  `js_phone_no` varchar(45) DEFAULT NULL,
  `js_job_seeker_id` int(100) DEFAULT NULL,
  `js_message` varchar(500) DEFAULT NULL,
  `js_subject` varchar(200) DEFAULT NULL,
  `js_content_writer_id` int(100) DEFAULT NULL,
  `inserted_by` varchar(100) DEFAULT NULL,
  `inserted_date` timestamp NULL DEFAULT NULL,
  `is_read_js` int(3) NOT NULL,
  `is_read_cw` int(100) NOT NULL,
  `is_read_ad` int(100) NOT NULL,
  `is_read_sa` int(100) NOT NULL,
  PRIMARY KEY (`js_enquiry_id`),
  KEY `js_enq_job_seeker_id_idx` (`js_job_seeker_id`),
  KEY `js_cw_enq_id_idx` (`js_content_writer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `js_enquiries`
--

INSERT INTO `js_enquiries` (`js_enquiry_id`, `js_jobseeker_name`, `js_email_id`, `js_phone_no`, `js_job_seeker_id`, `js_message`, `js_subject`, `js_content_writer_id`, `inserted_by`, `inserted_date`, `is_read_js`, `is_read_cw`, `is_read_ad`, `is_read_sa`) VALUES
(1, 'veekshan', 'bten688@gmail.com', NULL, 28, 'how do i know?', 'resume', 4, NULL, NULL, 0, 0, 0, 0),
(2, 'veekshan', 'bten688@gmail.com', NULL, 28, 'hello world', 'hi', 4, NULL, NULL, 0, 0, 0, 0),
(3, 'gvk@123', 'vijayv@gmail.com', NULL, 27, 'Do you know me?????', 'Hi', 4, NULL, NULL, 0, 0, 0, 0),
(4, 'veekshan', 'bten688@gmail.com', NULL, 28, 'gd mrng, how r u??\r\n', 'hi', 5, NULL, NULL, 0, 0, 0, 1),
(5, 'gvk@123', 'vijayintelli72@gmail.com', NULL, 27, 'Query Query', 'subject', 5, NULL, NULL, 0, 0, 0, 0),
(6, 'gvk@123', 'vijayintelli72@gmail.com', NULL, 27, 'fadsfsdfsdf', 'zfd', 6, NULL, NULL, 0, 0, 0, 0),
(7, 'Manikanta', 'mani.srp05@gmail.com', NULL, 38, 'uy,lui8f', 'hgfh', 5, NULL, NULL, 0, 0, 0, 0),
(8, 'nagendra', 'nagprasad4u@gmail.com', NULL, 50, 'hjk', 'hhh', 5, NULL, NULL, 0, 0, 0, 0),
(9, '', '', NULL, 0, 'yhuiyh', 'uihiu', 5, NULL, NULL, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `js_enquiries_1`
--

CREATE TABLE IF NOT EXISTS `js_enquiries_1` (
  `js_enquiry_id` int(100) NOT NULL AUTO_INCREMENT,
  `js_jobseeker_name` varchar(100) DEFAULT NULL,
  `js_email_id` varchar(45) DEFAULT NULL,
  `js_phone_no` varchar(45) DEFAULT NULL,
  `js_job_seeker_id` int(100) DEFAULT NULL,
  `js_message` varchar(500) DEFAULT NULL,
  `js_subject` varchar(200) DEFAULT NULL,
  `js_content_writer_id` int(100) DEFAULT NULL,
  `inserted_by` varchar(100) DEFAULT NULL,
  `inserted_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`js_enquiry_id`),
  KEY `js_enq_job_seeker_id_idx` (`js_job_seeker_id`),
  KEY `js_cw_enq_id_idx` (`js_content_writer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `js_enquiries_1`
--

INSERT INTO `js_enquiries_1` (`js_enquiry_id`, `js_jobseeker_name`, `js_email_id`, `js_phone_no`, `js_job_seeker_id`, `js_message`, `js_subject`, `js_content_writer_id`, `inserted_by`, `inserted_date`) VALUES
(1, 'gvk@123', 'vijayv@gmail.com', NULL, 27, 'SAD', 'sad', 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `js_enquiry_detail`
--

CREATE TABLE IF NOT EXISTS `js_enquiry_detail` (
  `js_enquiry_details_id` int(100) NOT NULL AUTO_INCREMENT,
  `js_enquiry_id` int(100) NOT NULL,
  `js_sender` int(100) NOT NULL,
  `js_receiver` int(100) NOT NULL,
  `js_message` varchar(100) NOT NULL,
  `is_read` int(100) NOT NULL,
  `is_read_ad` int(100) NOT NULL,
  `is_read_sa` int(100) NOT NULL,
  PRIMARY KEY (`js_enquiry_details_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `js_enquiry_detail`
--

INSERT INTO `js_enquiry_detail` (`js_enquiry_details_id`, `js_enquiry_id`, `js_sender`, `js_receiver`, `js_message`, `is_read`, `is_read_ad`, `is_read_sa`) VALUES
(1, 1, 4, 28, 'aaedadfsadfc', 0, 0, 0),
(2, 2, 4, 28, 'adasdcasdc', 0, 0, 0),
(3, 1, 4, 28, 'aksjdxbaedx', 0, 0, 0),
(4, 1, 28, 4, 'asdasd', 0, 0, 0),
(5, 1, 27, 4, 'sdcsdfc', 0, 0, 0),
(6, 3, 4, 27, 'yes i know who you are.........!!', 0, 0, 0),
(7, 3, 27, 4, 'sax', 0, 0, 0),
(8, 1, 4, 28, 'fsdfgdsfgs', 0, 0, 0),
(9, 3, 27, 4, 'hmmmmmmmmmmmmmm', 0, 0, 0),
(10, 3, 27, 4, 'hmmmmmmmmmmmmmm', 0, 0, 0),
(11, 2, 27, 4, 'lakdsmnasldc', 0, 0, 0),
(12, 2, 27, 4, 'alsdmas\r\n', 0, 0, 0),
(13, 2, 27, 4, 'lasdx', 0, 0, 0),
(14, 2, 27, 4, 'sdfwsdfwsdfad', 0, 0, 0),
(15, 2, 27, 4, 'dasfcasdfas', 0, 0, 0),
(16, 2, 27, 4, 'abc', 0, 0, 0),
(17, 2, 27, 4, '', 0, 0, 0),
(18, 2, 27, 4, 'asdcassd', 0, 0, 0),
(19, 1, 4, 28, 'sda', 0, 1, 1),
(20, 1, 28, 4, 'lkjgtlkejlrkj', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `js_enquiry_details_1`
--

CREATE TABLE IF NOT EXISTS `js_enquiry_details_1` (
  `js_enquiry_details_id` int(100) NOT NULL AUTO_INCREMENT,
  `js_enquiry_id` int(100) NOT NULL,
  `js_job_seeker_id` int(100) NOT NULL,
  `js_content_writer_id` int(100) NOT NULL,
  `js_message` varchar(100) NOT NULL,
  PRIMARY KEY (`js_enquiry_details_id`),
  KEY `jobseeker_id_idx` (`js_job_seeker_id`),
  KEY `cw_id_idx` (`js_content_writer_id`,`js_job_seeker_id`,`js_enquiry_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `js_hobbies`
--

CREATE TABLE IF NOT EXISTS `js_hobbies` (
  `js_hobbies_id` int(100) NOT NULL AUTO_INCREMENT,
  `hobby_name` varchar(200) DEFAULT NULL,
  `job_seeker_id` int(100) DEFAULT NULL,
  `inserted_by` varchar(100) DEFAULT NULL,
  `inserted_time` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `updated_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`js_hobbies_id`),
  KEY `js_hobby_id_idx` (`job_seeker_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `js_hobbies`
--

INSERT INTO `js_hobbies` (`js_hobbies_id`, `hobby_name`, `job_seeker_id`, `inserted_by`, `inserted_time`, `updated_by`, `updated_time`) VALUES
(1, 'I am playing Cricket, ', 27, NULL, NULL, NULL, NULL),
(2, '                                                           ZZZZZZZZZZZZZZZZZZZZZ                             ', 42, NULL, NULL, NULL, NULL),
(3, ';lfjalsdjfasljf\r\na;lsdjfklajsfkj\r\nkljsdfjskljfklsdjdklfj\r\nklsjfkljsdklfjklsdjf\r\nllajfkljaklsdjfklasjd', 49, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `js_languages`
--

CREATE TABLE IF NOT EXISTS `js_languages` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_name` varchar(45) DEFAULT NULL,
  `profficiency_level` varchar(45) DEFAULT NULL,
  `read` tinyint(4) DEFAULT NULL,
  `write` tinyint(4) DEFAULT NULL,
  `speak` tinyint(4) DEFAULT NULL,
  `job_seeker_id` int(100) DEFAULT NULL,
  `inserted_by` varchar(200) DEFAULT NULL,
  `inserted_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`language_id`),
  KEY `js_id_idx` (`job_seeker_id`),
  KEY `js_lan_id_idx` (`job_seeker_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `js_payment_transactions`
--

CREATE TABLE IF NOT EXISTS `js_payment_transactions` (
  `js_payment_transaction_id` int(100) NOT NULL AUTO_INCREMENT,
  `transaction_date` date DEFAULT NULL,
  `payment_status` varchar(45) DEFAULT NULL,
  `amount` int(50) DEFAULT NULL,
  `resume_name` varchar(100) DEFAULT NULL,
  `resume_file_path` varchar(200) DEFAULT NULL,
  `job_seeker_id` int(100) DEFAULT NULL,
  `content_writer_id` int(100) DEFAULT NULL,
  `resume_preparared_by` varchar(45) DEFAULT NULL,
  `resume_template_id` int(100) DEFAULT NULL,
  `inserted_by` varchar(100) DEFAULT NULL,
  `inserted_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`js_payment_transaction_id`),
  KEY `js_trasaction_id_idx` (`job_seeker_id`),
  KEY `cw_transaction_id_idx` (`content_writer_id`),
  KEY `res_template_id_idx` (`resume_template_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `js_payment_transactions`
--

INSERT INTO `js_payment_transactions` (`js_payment_transaction_id`, `transaction_date`, `payment_status`, `amount`, `resume_name`, `resume_file_path`, `job_seeker_id`, `content_writer_id`, `resume_preparared_by`, `resume_template_id`, `inserted_by`, `inserted_date`) VALUES
(1, '2016-08-16', '1', 50, 'T2.png', 'img\\templates', 27, 5, 'asdf', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `js_skills`
--

CREATE TABLE IF NOT EXISTS `js_skills` (
  `js_skills_id` int(100) NOT NULL AUTO_INCREMENT,
  `js_skill_description` varchar(500) DEFAULT NULL,
  `job_seeker_id` int(100) DEFAULT NULL,
  `inserted_by` varchar(100) DEFAULT NULL,
  `inserted_date` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`js_skills_id`),
  KEY `js_id_idx` (`job_seeker_id`),
  KEY `js1_id_idx` (`job_seeker_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `js_skills`
--

INSERT INTO `js_skills` (`js_skills_id`, `js_skill_description`, `job_seeker_id`, `inserted_by`, `inserted_date`, `updated_by`, `updated_time`) VALUES
(5, 'PHP,Mysql,Html', 27, NULL, NULL, NULL, NULL),
(6, '                ZZZZZZZZZZZZZZZZZZZ                                                                                                                                                ', 42, NULL, NULL, NULL, NULL),
(7, '                              lskdjfakjfkjfkj\r\na;lksdjfklsdjfkljasdf\r\na;lksdjfaklsdf                                                  ', 49, NULL, NULL, NULL, NULL),
(8, '                                                                                ', 50, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `js_template_domains`
--

CREATE TABLE IF NOT EXISTS `js_template_domains` (
  `domain_id` int(100) NOT NULL AUTO_INCREMENT,
  `domain_name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`domain_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `js_template_domains`
--

INSERT INTO `js_template_domains` (`domain_id`, `domain_name`) VALUES
(1, 'Accounting and Finance'),
(2, 'Administrative Support'),
(3, 'Architecture'),
(4, 'Art, Fashion and Design'),
(5, 'Banking and Financial Services'),
(6, 'Beauty and Spa'),
(7, 'Business'),
(8, 'Childcare'),
(9, 'Community and Public Service'),
(10, 'Computers and Technology'),
(11, 'Construction'),
(12, 'Customer Service'),
(13, 'Dental'),
(14, 'Education and Training'),
(15, 'Engineering'),
(16, 'Entertainment and Media'),
(17, 'Fitness and Recreation'),
(18, 'Food and Beverage'),
(19, 'Funeral Services'),
(20, 'Government'),
(21, 'Green Jobs'),
(22, 'Healthcare'),
(23, 'Human Resources'),
(24, 'Humanities and Liberal Arts'),
(25, 'Installation and Maintenance'),
(26, 'Insurance'),
(27, 'Law Enforcement and Security'),
(28, 'Legal'),
(29, 'Library'),
(30, 'Management'),
(31, 'Manufacturing and Production'),
(32, 'Marketing, Advertising and PR'),
(33, 'Military'),
(34, 'Natural Resources and Agriculture'),
(35, 'Nursing'),
(36, 'Performing Arts'),
(37, 'Personal Services'),
(38, 'Pharmacy'),
(39, 'Psychology'),
(40, 'Real Estate'),
(41, 'Retail'),
(42, 'Sales'),
(43, 'Science'),
(44, 'Skilled Trades'),
(45, 'Social Sciences'),
(46, 'Sports'),
(47, 'Telecommunications and Wireless'),
(48, 'Textile and Apparel'),
(49, 'Transportation and Distribution'),
(50, 'Travel and Hospitality'),
(51, 'Veterinary');

-- --------------------------------------------------------

--
-- Table structure for table `js_work_experience`
--

CREATE TABLE IF NOT EXISTS `js_work_experience` (
  `js_work_experience_id` int(11) NOT NULL AUTO_INCREMENT,
  `Job_Title` varchar(100) DEFAULT NULL,
  `Company_Name` varchar(100) DEFAULT NULL,
  `Designation` varchar(100) NOT NULL,
  `Start_date` date DEFAULT NULL,
  `End_date` date DEFAULT NULL,
  `Location` varchar(200) DEFAULT NULL,
  `Working_Period` varchar(45) DEFAULT NULL,
  `Current_CTC` varchar(45) DEFAULT NULL,
  `Expected_CTC` varchar(45) DEFAULT NULL,
  `Job_Seeker_Id` int(100) DEFAULT NULL,
  `inserted_by` varchar(100) DEFAULT NULL,
  `inserted_date` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`js_work_experience_id`),
  KEY `js_id_idx` (`Job_Seeker_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `js_work_experience`
--

INSERT INTO `js_work_experience` (`js_work_experience_id`, `Job_Title`, `Company_Name`, `Designation`, `Start_date`, `End_date`, `Location`, `Working_Period`, `Current_CTC`, `Expected_CTC`, `Job_Seeker_Id`, `inserted_by`, `inserted_date`, `updated_by`, `updated_date`) VALUES
(28, 'Information Technologies', 'Virtuell Technologies', 'Junior', '2016-08-25', '2016-08-31', 'HYderabd', NULL, '12000', '55555', 27, NULL, NULL, NULL, NULL),
(29, NULL, 'dsdszxzxZ', '20000Z', '2016-09-02', '2016-11-03', NULL, NULL, 'dsdssddszxxzzZ', '300000Z', 42, NULL, NULL, NULL, NULL),
(30, NULL, 'fdsata', 'hfvfgh', '0000-00-00', '0000-00-00', NULL, NULL, 'asta', 'terata', 38, NULL, NULL, NULL, NULL),
(31, NULL, 'virtuell tech', 'Business Analyst', '0000-00-00', '0000-00-00', NULL, NULL, '3', '4', 44, NULL, NULL, NULL, NULL),
(32, NULL, 'v;alkfjsdkfj', 'q;lrkj', '2010-09-22', '2014-09-22', NULL, NULL, '1200000', '2000000', 49, NULL, NULL, NULL, NULL),
(33, NULL, 'sdfa', 'business analyst', '0000-00-00', '0000-00-00', NULL, NULL, '', '', 48, NULL, NULL, NULL, NULL),
(34, NULL, '', 'developer software', '0000-00-00', '0000-00-00', NULL, NULL, '', '', 51, NULL, NULL, NULL, NULL),
(35, NULL, 'abc', 'php Developer', '0000-00-00', '0000-00-00', NULL, NULL, '', '', 50, NULL, NULL, NULL, NULL),
(36, NULL, '', 'php developer', '0000-00-00', '0000-00-00', NULL, NULL, '', '', 52, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resume_template_list`
--

CREATE TABLE IF NOT EXISTS `resume_template_list` (
  `Resume_template_id` int(100) NOT NULL,
  `Resume_template_name` varchar(100) DEFAULT NULL,
  `Domain_id` int(100) DEFAULT NULL,
  PRIMARY KEY (`Resume_template_id`),
  KEY `domain_id_idx` (`Domain_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resume_template_list`
--

INSERT INTO `resume_template_list` (`Resume_template_id`, `Resume_template_name`, `Domain_id`) VALUES
(1, 't1', 1),
(2, 't2', 1),
(3, 't3', 1),
(4, 't4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE IF NOT EXISTS `superadmin` (
  `SA_ID` int(2) NOT NULL AUTO_INCREMENT,
  `SA_UNAME` varchar(50) NOT NULL,
  `SA_PWD` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `USERTYPE_ID` int(10) NOT NULL,
  `Full_Name` varchar(50) NOT NULL,
  `fp_flag` int(2) NOT NULL,
  PRIMARY KEY (`SA_ID`),
  KEY `sa_user_type_idx` (`USERTYPE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`SA_ID`, `SA_UNAME`, `SA_PWD`, `Email`, `USERTYPE_ID`, `Full_Name`, `fp_flag`) VALUES
(1, 'sadmin', 'sadmin', 'vijay@gmail.com', 1, 'raju', 0);

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_resume_list`
--

CREATE TABLE IF NOT EXISTS `uploaded_resume_list` (
  `resume_id` int(50) NOT NULL,
  `resume_name` varchar(45) DEFAULT NULL,
  `resume_filepath` varchar(45) DEFAULT NULL,
  `usertype` int(10) DEFAULT NULL,
  `payment_type` varchar(45) DEFAULT NULL,
  `payment_status` varchar(45) DEFAULT NULL,
  `resume_no_of_sections` varchar(45) DEFAULT NULL,
  `job_seeker_id` int(100) DEFAULT NULL,
  `resume_status` varchar(45) DEFAULT NULL,
  `content_writer_id` int(100) DEFAULT NULL,
  `resume_template_id` int(100) DEFAULT NULL,
  `uploaded_by` varchar(100) DEFAULT NULL,
  `uploaded_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`resume_id`),
  KEY `js_resume_id_idx` (`job_seeker_id`),
  KEY `cw_uploaded_res_id_idx` (`content_writer_id`),
  KEY `user_type_id_idx` (`usertype`),
  KEY `res_template_id_idx` (`resume_template_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `User_Type_ID` int(10) NOT NULL AUTO_INCREMENT,
  `User_name` varchar(100) NOT NULL,
  `User_type` varchar(10) NOT NULL,
  PRIMARY KEY (`User_Type_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_Type_ID`, `User_name`, `User_type`) VALUES
(1, 'Super Admin', 'S'),
(2, 'Admin', 'A'),
(3, 'Content Writer', 'C'),
(4, 'Job Seeker', 'J');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `ut_admin_id` FOREIGN KEY (`usertype_id`) REFERENCES `users` (`User_Type_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `content_writer`
--
ALTER TABLE `content_writer`
  ADD CONSTRAINT `usertype_id` FOREIGN KEY (`usertype_id`) REFERENCES `users` (`User_Type_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `job_seeker`
--
ALTER TABLE `job_seeker`
  ADD CONSTRAINT `ut_js_id` FOREIGN KEY (`usertype_id`) REFERENCES `users` (`User_Type_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `js_accomplishments`
--
ALTER TABLE `js_accomplishments`
  ADD CONSTRAINT `js` FOREIGN KEY (`job_seeker_id`) REFERENCES `job_seeker` (`Job_Seeker_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `js_carrer_objective`
--
ALTER TABLE `js_carrer_objective`
  ADD CONSTRAINT `js_carrer_obj_id` FOREIGN KEY (`job_seeker_id`) REFERENCES `job_seeker` (`Job_Seeker_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `js_certifications`
--
ALTER TABLE `js_certifications`
  ADD CONSTRAINT `js_cert_id` FOREIGN KEY (`Job_seeker_id`) REFERENCES `job_seeker` (`Job_Seeker_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `js_educational_information`
--
ALTER TABLE `js_educational_information`
  ADD CONSTRAINT `jsid` FOREIGN KEY (`job_seeker_id`) REFERENCES `job_seeker` (`Job_Seeker_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `js_enquiries_1`
--
ALTER TABLE `js_enquiries_1`
  ADD CONSTRAINT `js_cw_enq_id` FOREIGN KEY (`js_content_writer_id`) REFERENCES `content_writer` (`Content_writer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `js_job_seeker_enq_id` FOREIGN KEY (`js_job_seeker_id`) REFERENCES `job_seeker` (`Job_Seeker_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `js_enquiry_details_1`
--
ALTER TABLE `js_enquiry_details_1`
  ADD CONSTRAINT `jobseeker_id` FOREIGN KEY (`js_job_seeker_id`) REFERENCES `js_enquiries_1` (`js_job_seeker_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `js_hobbies`
--
ALTER TABLE `js_hobbies`
  ADD CONSTRAINT `js_hobby_id` FOREIGN KEY (`job_seeker_id`) REFERENCES `job_seeker` (`Job_Seeker_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `js_languages`
--
ALTER TABLE `js_languages`
  ADD CONSTRAINT `js_lan_id` FOREIGN KEY (`job_seeker_id`) REFERENCES `job_seeker` (`Job_Seeker_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `js_payment_transactions`
--
ALTER TABLE `js_payment_transactions`
  ADD CONSTRAINT `cw_transaction_id` FOREIGN KEY (`content_writer_id`) REFERENCES `content_writer` (`Content_writer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `js_trasaction_id` FOREIGN KEY (`job_seeker_id`) REFERENCES `job_seeker` (`Job_Seeker_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `res_template_id` FOREIGN KEY (`resume_template_id`) REFERENCES `resume_template_list` (`Resume_template_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `js_work_experience`
--
ALTER TABLE `js_work_experience`
  ADD CONSTRAINT `js_id` FOREIGN KEY (`Job_Seeker_Id`) REFERENCES `job_seeker` (`Job_Seeker_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resume_template_list`
--
ALTER TABLE `resume_template_list`
  ADD CONSTRAINT `domain_id` FOREIGN KEY (`Domain_id`) REFERENCES `js_template_domains` (`domain_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD CONSTRAINT `sa_user_type` FOREIGN KEY (`USERTYPE_ID`) REFERENCES `users` (`User_Type_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `uploaded_resume_list`
--
ALTER TABLE `uploaded_resume_list`
  ADD CONSTRAINT `cw_uploaded_res_id` FOREIGN KEY (`content_writer_id`) REFERENCES `content_writer` (`Content_writer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `js_uploaded_res_id` FOREIGN KEY (`job_seeker_id`) REFERENCES `job_seeker` (`Job_Seeker_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `res_temp_id` FOREIGN KEY (`resume_template_id`) REFERENCES `resume_template_list` (`Resume_template_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_type_id` FOREIGN KEY (`usertype`) REFERENCES `users` (`User_Type_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
