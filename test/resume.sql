-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2016 at 06:31 PM
-- Server version: 5.6.17
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
-- Table structure for table `chat_info`
--

CREATE TABLE IF NOT EXISTS `chat_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `jid` int(10) NOT NULL,
  `cwid` int(10) NOT NULL,
  `msg` longtext NOT NULL,
  `created_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `msg_from` varchar(10) NOT NULL,
  `cwread` int(10) NOT NULL,
  `jsread` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `chat_info`
--

INSERT INTO `chat_info` (`id`, `jid`, `cwid`, `msg`, `created_on`, `msg_from`, `cwread`, `jsread`) VALUES
(1, 58, 8, 'Hi Content Writer, I Am Nagendra', '2016-10-02 16:39:47', 'js', 1, 0),
(2, 58, 8, 'Are You There', '2016-10-02 16:40:37', 'js', 1, 1),
(3, 58, 7, 'Hi I Am Nagendra', '2016-10-02 17:02:06', 'js', 0, 1),
(4, 58, 8, 'Hello', '2016-10-02 17:56:11', 'js', 1, 1),
(5, 58, 8, 'Yes I Am', '2016-10-02 17:58:07', 'cw', 1, 1),
(6, 58, 8, 'Where Are You From', '2016-10-02 17:58:32', 'js', 1, 1),
(7, 52, 8, 'HI', '2016-10-13 20:18:45', 'js', 1, 1),
(8, 52, 8, 'Hello', '2016-10-13 20:19:49', 'cw', 1, 0),
(9, 52, 8, 'Are You There', '2016-10-13 20:33:40', 'cw', 1, 0),
(10, 58, 8, 'Test', '2016-10-21 18:45:45', 'js', 0, 0),
(11, 62, 15, 'Hai\r\n', '2016-10-24 06:20:41', 'js', 1, 1),
(12, 62, 15, 'Hai', '2016-10-24 06:22:05', 'cw', 1, 1),
(13, 62, 14, 'Hai', '2016-10-24 06:22:53', 'js', 1, 1),
(14, 62, 14, 'Hai', '2016-10-24 06:24:36', 'cw', 1, 1),
(15, 62, 14, 'Hello\r\n', '2016-10-25 04:11:52', 'js', 1, 1),
(16, 62, 14, 'Hai', '2016-10-25 05:44:23', 'cw', 1, 1),
(17, 62, 14, 'Jdskljfl', '2016-10-25 12:56:52', 'js', 1, 1),
(18, 62, 14, 'Jdlkfklasdfjakljd', '2016-10-25 12:57:05', 'js', 1, 1);

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
  `status` int(10) NOT NULL,
  `exp_yrs` int(10) NOT NULL,
  `exp_mnths` int(10) NOT NULL,
  `Education` varchar(500) NOT NULL,
  `Alternate_Phone_no` varchar(35) NOT NULL,
  `Certifications` text NOT NULL,
  `profile_pic` varchar(150) NOT NULL,
  `email_verification` varchar(100) NOT NULL,
  `email_verification_status` int(10) NOT NULL,
  `online` int(10) NOT NULL,
  PRIMARY KEY (`Content_writer_id`),
  KEY `usertype_id_idx` (`usertype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `content_writer`
--

INSERT INTO `content_writer` (`Content_writer_id`, `First_name`, `Last_name`, `Email_id`, `User_name`, `Password`, `Confirm_password`, `Gender`, `Alternate_email`, `Phone_No`, `Profile_picture_path`, `Address`, `Experience`, `Profile_summary`, `Domain`, `usertype_id`, `Quotation`, `inserted_by`, `inserted_time`, `updated_by`, `updated_time`, `status`, `exp_yrs`, `exp_mnths`, `Education`, `Alternate_Phone_no`, `Certifications`, `profile_pic`, `email_verification`, `email_verification_status`, `online`) VALUES
(6, 'asdf', 'adsf', 'vijay@gmail.com', 'vijayvvvvvvv', 'fdfvvvvvvv', 'vijayvvvvvvv', 'M', 'vij@gmail.com', 'fdf', 'images/js1.jpg', 'asdf', '5', 'The right words can be incredibly effective. ', 'dfASDF', 3, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '', '', '', '', '', 0, 0),
(7, 'Nagendra', 'Prasad', 'nagprasad4u@gmail.com', NULL, '3de24d51fb8ac6fedb08c65865d82438', NULL, 'Male', NULL, '7894561320', NULL, 'Hyderabad', '', 'Profile Summary Info', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, '', '', '', '', '', 0, 0),
(8, 'Nagendra', 'Prasad', 'nags1221@gmail.com', NULL, '21232f297a57a5a743894a0e4a801fc3', NULL, 'Male', 'abc@gmail.com', '7894563120', NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 4, 7, 'Degree', '', '', '', '', 1, 0),
(9, 'Suman', 'Kumar', 'suman@gmail.com', NULL, '21232f297a57a5a743894a0e4a801fc3', NULL, 'Male', NULL, '7894651320', NULL, 'Hyderabad', '', 'P1', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 12, 10, 'Degree', '', '', '', '', 0, 0),
(10, 'Naresh', 'Kumar', 'naresh@gmail.com', NULL, '21232f297a57a5a743894a0e4a801fc3', NULL, 'Male', NULL, '1234567891', NULL, 'Kolkatha', '', 'p2', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 4, 'PG', '', '', '', '', 0, 0),
(11, 'Chegu', 'Maniaknta Kumar', 'manikanta.c@virtuelltech.com', NULL, '907517010ba4cdd0f58016e291d59a3a', NULL, 'Male', NULL, '9581958206', NULL, 'djklsakl', '', 'jnzhdfjkahsl', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 11, 3, 'PG', '', '', '', '', 0, 0),
(12, 'Dinesh', 'Yaganti', 'dineshyaganti@gmail.com', NULL, 'bda70b76a2f1f691318e79ed17e4d20d', NULL, 'Male', NULL, '9030407464', NULL, 'Cumbum', '', 'Expert in preparing resumes', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 6, 'PG', '', '', '', '', 0, 0),
(13, 'Manikanta Kumar', 'Chegu', 'chegu.mani55@gmail.com', NULL, '907517010ba4cdd0f58016e291d59a3a', NULL, 'Male', NULL, '9581958206', NULL, 'Guntur', '', 'mdnjs', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 10, 5, 'PG', '', '', '', '', 0, 0),
(14, 'Sri', 'Phani', 'sri1@gmail.comm', NULL, 'd1565ebd8247bbb01472f80e24ad29b6', NULL, 'Female', 'eetaetqtgrer@gmail.com', '453253245', NULL, 'hyderabad', '', 'kjewlkqw', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 4, 3, 'PG', '453253245', '1', '805_IMG_20160619_182435.jpg', '', 0, 0),
(15, 'Dinesh', 'Yaganti', 'dinesh.virtuelltech@gmail.com', NULL, 'bda70b76a2f1f691318e79ed17e4d20d', NULL, 'Male', '', '9676537345', NULL, 'Hyderabad', '', 'Expert in preparing Resumes', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 7, 9, 'PG', '', '', '', '', 0, 0),
(16, 'Nagendra', 'Prasad', 'prasad@yahoo.com', NULL, 'c246ad314ab52745b71bb00f4608c82a', NULL, 'Male', NULL, '7894651320', NULL, 'fds', '', 'dfgfd', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 13, 8, 'PG', '', '', '', 'a7d0399936f4ab51f339b1fe89ef0aed', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cw_ordernow`
--

CREATE TABLE IF NOT EXISTS `cw_ordernow` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cwid` int(10) NOT NULL,
  `jid` int(10) NOT NULL,
  `iid` int(10) NOT NULL,
  `did` int(10) NOT NULL,
  `ptype` varchar(50) NOT NULL,
  `exp_years` int(10) NOT NULL,
  `exp_mnths` int(10) NOT NULL,
  `skills` longtext NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jsread` int(10) NOT NULL,
  `wsread` int(10) NOT NULL,
  `approve` varchar(10) NOT NULL,
  `price` varchar(50) NOT NULL,
  `selected_template` int(50) NOT NULL,
  `resume_text` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `cw_ordernow`
--

INSERT INTO `cw_ordernow` (`id`, `cwid`, `jid`, `iid`, `did`, `ptype`, `exp_years`, `exp_mnths`, `skills`, `created_on`, `jsread`, `wsread`, `approve`, `price`, `selected_template`, `resume_text`) VALUES
(1, 8, 58, 4, 2, 'Experienced', 3, 8, '', '2016-10-25 16:52:43', 0, 0, 'Pending', '200', 5, ''),
(2, 14, 65, 4, 2, 'Fresher', 0, 0, '', '2016-10-25 18:08:59', 0, 0, 'Pending', '200', 0, ''),
(3, 14, 65, 4, 2, 'Fresher', 0, 0, '', '2016-10-25 18:10:45', 0, 0, 'Pending', '200', 6, ''),
(4, 8, 65, 1, 0, 'Experienced', 4, 2, '', '2016-10-25 18:24:29', 0, 0, 'Pending', '2000', 0, ''),
(5, 8, 58, 4, 2, 'Fresher', 0, 0, '', '2016-10-25 18:48:04', 0, 0, 'Pending', '600', 0, ''),
(6, 8, 58, 4, 2, 'Fresher', 0, 0, '', '2016-10-25 19:52:10', 0, 0, 'Pending', '', 0, ''),
(7, 14, 65, 4, 2, 'Fresher', 3, 3, '', '2016-10-25 19:52:29', 0, 0, 'Pending', '400', 0, ''),
(8, 8, 58, 4, 2, 'Experienced', 2, 5, '', '2016-10-25 19:56:25', 0, 0, 'Pending', '75', 4, ''),
(9, 12, 58, 4, 2, 'Fresher', 3, 5, '', '2016-10-25 19:58:16', 0, 0, 'Pending', '75', 5, ''),
(10, 8, 65, 4, 2, 'Fresher', 1, 6, '', '2016-10-26 06:19:52', 0, 0, 'Completed', '400', 5, '<style>#resume-viewer div.block p{line-height:1.4em;margin:0 0 .6em}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0;line-height:1.2em;margin-top:-.2em;}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:0}#resume-viewer div.block p.location{font-size:1em;color:#555;margin:0}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:1.3em;font-weight:bold;margin:0 0 .5em 0;padding:0 .5em .1em;text-transform:uppercase;background:#ddd;border:1px solid #ddd;-moz-border-radius:0 0 1.3em 0;-webkit-border-radius:0 0 1.3em 0;border-radius:0 0 1.3em 0;border-bottom-right-radius:1.3em}#resume-viewer div.blocks{margin-top:1em}#resume-viewer div.block-inner{margin-left:2em}#resume-viewer td.block-title{width:50%;padding:0;border-top:.2em solid #ddd}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer table.wide.title{page-break-inside:avoid;page-break-after:avoid}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><p class="person">Phani Sri Konte</p></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div id="section-toolbar" class="section-toolbar" style="display: none; width: 182px; margin-top: -28px; margin-right: -6px; right: 0px; left: 355px;"><button class="btn btn-mini btn-default edit" style="display: inline-block;">Edit</button><button class="btn btn-mini btn-default rename" style="display: none;">Edit Title</button><button class="btn btn-mini btn-default add-new" style="display: none;">Add Subsection</button><button class="btn btn-mini btn-default move-section" style="display: none;">Move</button><button class="btn btn-mini btn-default delete" style="display: none;"><i class="fa fa-trash-o"></i></button></div><div class="html-content">phanisri1@gmail.com<br>9998921389</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><table class="wide title" cellspacing="0"><tbody><tr><td class="block-title"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p></td><td class="block-title"></td></tr></tbody></table><div class="block-inner"></div></div><div class="block" data-category="education" data-children="1" data-id="1" style="margin-bottom: 1em;"><table class="wide title" cellspacing="0"><tbody><tr><td class="block-title"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Education</p></td><td class="block-title"></td></tr></tbody></table><div class="block-inner"><div class="last-child" data-id="1c0" data-category="education" style="margin-bottom: 1em;"><div id="subsection-toolbar" class="subsection-toolbar" style="display: none; top: 152.156px;"><button class="btn btn-mini btn-default edit">Edit</button><button class="btn btn-mini btn-default move-subsection">Move</button><button class="btn btn-mini btn-default delete"><i class="fa fa-trash-o"></i></button></div><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Post Graduation</p><p class="sub-where">ljkaskdfjql</p><p class="sub-dates">2016 – 2016</p><div class="html-content"></div></div></div></div><div class="block" data-category="text" data-children="" data-id="2" style="margin-bottom: 1em;"><table class="wide title" cellspacing="0"><tbody><tr><td class="block-title"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p></td><td class="block-title"></td></tr></tbody></table><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></div></div>');

-- --------------------------------------------------------

--
-- Table structure for table `cw_payment_info`
--

CREATE TABLE IF NOT EXISTS `cw_payment_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `iid` int(10) NOT NULL,
  `did` int(10) NOT NULL,
  `special_fresher` varchar(150) NOT NULL,
  `special_1_exp` varchar(150) NOT NULL,
  `special_2_exp` varchar(150) NOT NULL,
  `special_3_exp` varchar(150) NOT NULL,
  `special_4_exp` varchar(150) NOT NULL,
  `general_fresher` varchar(150) NOT NULL,
  `general_1_exp` varchar(150) NOT NULL,
  `general_2_exp` varchar(150) NOT NULL,
  `general_3_exp` varchar(150) NOT NULL,
  `general_4_exp` varchar(150) NOT NULL,
  `cwid` int(10) NOT NULL,
  `expected_special_delivery` varchar(10) NOT NULL,
  `expected_delivery` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `cw_payment_info`
--

INSERT INTO `cw_payment_info` (`id`, `iid`, `did`, `special_fresher`, `special_1_exp`, `special_2_exp`, `special_3_exp`, `special_4_exp`, `general_fresher`, `general_1_exp`, `general_2_exp`, `general_3_exp`, `general_4_exp`, `cwid`, `expected_special_delivery`, `expected_delivery`) VALUES
(1, 0, 0, '', '', '', '', '', '', '', '', '', '', 3, '', ''),
(2, 0, 0, '', '', '', '', '', '', '', '', '', '', 3, '', ''),
(3, 4, 2, '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', 8, '7', '5'),
(4, 0, 0, '', '', '', '', '', '1', '2', '3', '4', '5', 9, '', ''),
(5, 0, 0, '', '', '', '', '', '1', '2', '3', '4', '5', 10, '', ''),
(6, 3, 0, '50', '500', '50000', '100000', '100000', '500', '600', '400', '900', '600', 11, '', ''),
(7, 3, 0, '300', '400', '500', '600', '1000', '100', '200', '250', '350', '500', 12, '', ''),
(8, 4, 0, '65', '75', '78', '1233', '100', '434', '6554', '8675555554', '4677476', '67474', 13, '', ''),
(9, 1, 0, '566', '1234', '2000', '3000', '4000', '200', '400', '600', '1000', '3000', 14, '', ''),
(10, 5, 0, '100', '200', '300', '500', '1000', '50', '100', '150', '200', '500', 15, '', ''),
(14, 0, 0, '', '', '', '', '', '', '', '', '', '', 16, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cw_skills`
--

CREATE TABLE IF NOT EXISTS `cw_skills` (
  `skillid` int(10) NOT NULL AUTO_INCREMENT,
  `cw_skill_description` varchar(1000) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cwid` int(10) NOT NULL,
  PRIMARY KEY (`skillid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `cw_skills`
--

INSERT INTO `cw_skills` (`skillid`, `cw_skill_description`, `created_on`, `cwid`) VALUES
(16, 'ryhrthdfgvqg', '2016-10-25 07:46:15', 14),
(17, 'adxascdadscasdc', '2016-10-25 07:46:15', 14);

-- --------------------------------------------------------

--
-- Table structure for table `domains`
--

CREATE TABLE IF NOT EXISTS `domains` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `iid` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `domains`
--

INSERT INTO `domains` (`id`, `name`, `iid`) VALUES
(1, 'Pharma', 2),
(2, 'Railway Jobs', 4),
(3, 'Plumbing', 5);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_info`
--

CREATE TABLE IF NOT EXISTS `enquiry_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cwid` int(10) NOT NULL,
  `jid` int(10) NOT NULL,
  `iid` int(10) NOT NULL,
  `did` int(10) NOT NULL,
  `ptype` varchar(50) NOT NULL,
  `exp_years` int(10) NOT NULL,
  `exp_mnths` int(10) NOT NULL,
  `skills` longtext NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jsread` int(10) NOT NULL,
  `wsread` int(10) NOT NULL,
  `approve` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `enquiry_info`
--

INSERT INTO `enquiry_info` (`id`, `cwid`, `jid`, `iid`, `did`, `ptype`, `exp_years`, `exp_mnths`, `skills`, `created_on`, `jsread`, `wsread`, `approve`) VALUES
(1, 8, 52, 2, 1, 'Fresher', 4, 8, '', '2016-10-13 17:11:43', 0, 0, 'Approved'),
(2, 9, 52, 2, 1, 'Fresher', 8, 10, '', '2016-10-13 20:11:36', 0, 0, 'Pending'),
(3, 10, 52, 2, 1, 'Experienced', 1, 2, '', '2016-10-13 20:13:15', 0, 0, 'Canceled'),
(4, 8, 58, 4, 2, 'Experienced', 14, 10, '', '2016-10-13 20:32:08', 1, 0, 'Canceled'),
(5, 10, 61, 4, 2, 'Experienced', 4, 4, '', '2016-10-13 23:55:38', 0, 0, 'Approved'),
(6, 9, 58, 4, 2, 'Experienced', 3, 1, '', '2016-10-14 03:57:29', 1, 0, 'Pending'),
(7, 11, 58, 4, 2, 'Experienced', 2, 0, '', '2016-10-14 04:00:16', 1, 0, 'Approved'),
(8, 12, 62, 4, 2, 'Fresher', 2, 3, '', '2016-10-14 05:08:07', 0, 0, 'Canceled'),
(9, 10, 58, 4, 2, 'Experienced', 2, 1, '', '2016-10-14 18:00:22', 1, 0, 'Approved'),
(10, 12, 58, 4, 2, 'Experienced', 1, 2, '', '2016-10-15 09:11:19', 1, 0, 'Approved'),
(11, 13, 58, 4, 2, 'Experienced', 4, 7, '', '2016-10-17 07:22:58', 1, 0, 'Approved'),
(12, 13, 64, 4, 2, 'Fresher', 8, 3, '', '2016-10-17 07:29:03', 0, 0, 'Approved'),
(13, 8, 65, 4, 2, 'Experienced', 8, 6, '', '2016-10-17 08:17:54', 0, 0, 'Pending'),
(14, 14, 65, 4, 2, 'Fresher', 3, 9, '', '2016-10-17 08:27:13', 0, 0, 'Approved'),
(15, 14, 62, 5, 3, 'Experienced', 3, 2, '', '2016-10-20 04:52:57', 0, 0, 'Approved'),
(16, 8, 62, 5, 3, 'Experienced', 3, 3, '', '2016-10-20 04:55:05', 0, 0, 'Pending'),
(17, 15, 62, 5, 3, 'Experienced', 3, 2, '', '2016-10-20 04:58:26', 0, 0, 'Approved'),
(18, 11, 62, 4, 2, 'Experienced', 4, 0, '', '2016-10-25 04:10:53', 0, 0, 'Pending'),
(19, 14, 67, 2, 1, 'Fresher', 0, 0, '', '2016-10-25 05:50:02', 0, 0, 'Pending'),
(20, 10, 62, 4, 0, 'Fresher', 0, 0, '', '2016-10-25 09:53:27', 0, 0, 'Pending'),
(21, 14, 58, 4, 2, 'Experienced', 11, 9, '', '2016-11-06 13:22:39', 1, 0, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE IF NOT EXISTS `industry` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`id`, `name`) VALUES
(1, 'Administrative Support'),
(2, 'Business'),
(3, 'Computers and Technology'),
(4, 'Government'),
(5, 'Real Estate'),
(7, 'Accounting and Finance'),
(8, 'Architecture'),
(9, 'Art, Fashion and Design'),
(10, 'Banking and Financial Services'),
(11, 'Beauty and Spa'),
(12, 'Child Care'),
(13, 'Customer Service'),
(14, 'Construction'),
(15, 'Dental'),
(16, 'Education and Training'),
(17, 'Engineering'),
(18, 'Veterinary'),
(19, 'Marketing, Advertising and PR'),
(20, 'Military'),
(21, 'Natural Resources and Agriculture'),
(22, 'Nursing'),
(23, 'Performing Arts'),
(24, 'Personal Services'),
(25, 'Pharmacy'),
(26, 'Psychology'),
(27, 'Retail'),
(28, 'Sales'),
(29, 'Science'),
(30, 'Skilled Trades'),
(31, 'Social Sciences'),
(32, 'Sports'),
(33, 'Telecommunications and Wireless'),
(34, 'Textile and Apparel'),
(35, 'Transportation and Distribution'),
(36, 'Travel and Hospitality'),
(37, 'Manufacturing and Production'),
(38, 'Management'),
(39, 'Library'),
(40, 'Legal'),
(41, 'Law Enforcement and Security'),
(42, 'Insurance'),
(43, 'Installation and Maintenance'),
(44, 'Humanities and Liberal Arts'),
(45, 'Human Resources'),
(46, 'Health Care'),
(47, 'Green Jobs'),
(48, 'Funeral Services'),
(49, 'Food and Beverage'),
(50, 'Fitness and Recreation'),
(51, 'Entertainment and Media'),
(52, 'Community and Public Service');

-- --------------------------------------------------------

--
-- Table structure for table `invitations`
--

CREATE TABLE IF NOT EXISTS `invitations` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cwid` int(10) NOT NULL,
  `jid` int(10) NOT NULL,
  `approve` varchar(50) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cwread` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `invitations`
--

INSERT INTO `invitations` (`id`, `cwid`, `jid`, `approve`, `created_on`, `cwread`) VALUES
(1, 8, 52, 'Pending', '2016-10-15 10:35:23', 1),
(2, 8, 51, 'Pending', '2016-10-15 10:40:03', 1),
(3, 8, 58, 'Canceled', '2016-10-18 17:36:39', 1),
(4, 8, 56, 'Pending', '2016-10-18 18:33:20', 1),
(5, 8, 60, 'Pending', '2016-10-18 18:46:58', 1),
(6, 8, 64, 'Pending', '2016-10-18 19:59:06', 1),
(7, 8, 61, 'Pending', '2016-10-18 19:59:54', 1),
(9, 10, 64, 'Pending', '2016-10-18 20:20:42', 0),
(18, 10, 65, 'Canceled', '2016-10-18 20:30:40', 0),
(19, 14, 65, 'Approved', '2016-10-19 00:22:45', 0),
(20, 15, 62, 'Canceled', '2016-10-20 06:18:28', 0),
(21, 10, 63, 'Pending', '2016-10-22 03:41:41', 0),
(22, 14, 64, 'Pending', '2016-10-22 03:53:30', 0),
(23, 14, 63, 'Pending', '2016-10-24 04:11:00', 0),
(24, 14, 61, 'Pending', '2016-10-25 05:44:03', 0),
(25, 14, 56, 'Pending', '2016-10-25 09:08:33', 0),
(26, 15, 65, 'Approved', '2016-10-25 12:06:09', 0),
(27, 14, 62, 'Approved', '2016-10-25 12:07:52', 0),
(28, 14, 67, 'Pending', '2016-10-25 12:08:01', 0),
(29, 16, 58, 'Pending', '2016-10-30 10:49:27', 0);

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
  `inserted_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(50) NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(10) NOT NULL,
  `Industry` int(10) NOT NULL,
  `Objective` longtext NOT NULL,
  `profile_pic` varchar(150) NOT NULL,
  `email_verification` varchar(100) NOT NULL,
  `email_verification_status` int(10) NOT NULL,
  `online` int(10) NOT NULL,
  PRIMARY KEY (`Job_Seeker_Id`,`usertype_id`),
  KEY `ut_js_id_idx` (`usertype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `job_seeker`
--

INSERT INTO `job_seeker` (`Job_Seeker_Id`, `First_name`, `Last_name`, `Gender`, `Email_id`, `User_name`, `Password`, `Alternate_email`, `Phone_No`, `Alternate_Phone_no`, `Profile_picture_path`, `Address`, `Experience_level`, `Domain`, `Father_Name`, `language_name`, `profficiency_level`, `lan_read`, `lan_write`, `lan_speak`, `usertype_id`, `inserted_by`, `inserted_time`, `updated_by`, `updated_time`, `status`, `Industry`, `Objective`, `profile_pic`, `email_verification`, `email_verification_status`, `online`) VALUES
(27, 'vijay', 'kumar', NULL, 'vijayintelli72@gmail.com', 'gvk@123', 'suha', '', '1234567890', '', NULL, '																															', 'Fresher', '1IT', '', 'English', 'Intermediate', 'R', 'W', 'S', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1, 0, '', '', '', 0, 0),
(28, 'veekshan', 'allaada', NULL, 'bten688@gmail.com', 'veee', 'veee', NULL, '8977177100', '', NULL, NULL, 'Fresher', '15', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1, 0, '', '', '', 0, 0),
(29, 'dheeksha', 'Aaaa', NULL, 'dheeksha@gmail.com', 'dheeksha', 'dheeksha@@123', NULL, 'asasas', '', NULL, NULL, 'Fresher', '17', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1, 0, '', '', '', 0, 0),
(30, 'dheeksha', 'Aaaa', NULL, 'dheeksha@gmail.com', 'dheeksha', 'dheeksha@@123', NULL, 'asasas', '', NULL, NULL, 'Fresher', '17', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1, 0, '', '', '', 0, 0),
(31, 'dheeksha', 'Aaaa', NULL, 'dheeksha@gmail.com', 'dheeksha', 'dheeksha@@123', NULL, 'asasas', '', NULL, NULL, 'Fresher', '17', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1, 0, '', '', '', 0, 0),
(32, 'dheeksha', 'Aaaa', NULL, 'dheeksha@gmail.com', 'dheeksha', 'dheeksha@@123', NULL, 'asasas', '', NULL, NULL, 'Fresher', '17', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1, 0, '', '', '', 0, 0),
(33, 'dheeksha', 'Aaaa', NULL, 'dheeksha@gmail.com', 'dheeksha', 'dheeksha@@123', NULL, 'asasas', '', NULL, NULL, 'Fresher', '17', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1, 0, '', '', '', 0, 0),
(34, 'dheeksha', 'Aaaa', NULL, 'dheeksha@gmail.com', 'dheeksha', 'dheeksha@@123', NULL, 'asasas', '', NULL, NULL, 'Fresher', '17', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1, 0, '', '', '', 0, 0),
(36, 'veekshan', 'allaada', NULL, 'bten688@gmail.com', 'vee', 'vee', NULL, '8977177100', '', NULL, NULL, 'Fresher', '10', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1, 0, '', '', '', 0, 0),
(37, 'prachi', 'vepuri', NULL, 'prachi.vepuri09@gmail.com', 'prachi', 'vepuri', 'lijijj', '9666078606', '21648878787', NULL, 'iihububouhouhouy8o	', 'Fresher', '23', 'kjiojoiuiuo', 'jsdfusdhfushd', 'Intermediate', 'R', 'W', 'S', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1, 0, '', '', '', 0, 0),
(38, 'Mani', 'Chegu', NULL, 'mani.srp05@gmail.com', 'Manikanta', 'mani', '', '9581958206', '9676537345', NULL, '                                                                                                                                    ', 'Fresher', '2', 'ramarao', 'telugu', 'Expert', 'R', 'W', 'S', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1, 0, '', '', '', 0, 0),
(39, 'prachi', 'vepuri', NULL, 'prachi.vepuri09@gmail.com', 'prachi', 'prachi', NULL, '9666078606', '', NULL, NULL, 'Fresher', '23', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1, 0, '', '', '', 0, 0),
(40, 'veekshan', 'allaada', NULL, 'bten688@gmail.com', 'lsfdnk', 'LKSNFD', NULL, ';SD,', '', NULL, NULL, 'Fresher', '17', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1, 0, '', '', '', 0, 0),
(41, 'Dinesh', 'Yaganti', NULL, 'dineshyaganti@gmail.com', 'Dinesh', 'dinesh', 'dineshyaganti464@gmail.com', '9676537345', '', NULL, '', 'Fresher', '', '', '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1, 0, '', '', '', 0, 0),
(42, 'deeksha', 'm', NULL, 'deeksha@gmail.com', 'deeksha', 'DHEEKSHA@123', NULL, '9291330407', '', NULL, NULL, 'Fresher', '19', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1, 0, '', '', '', 0, 0),
(43, 'chegu', 'mani', NULL, 'mani.srp05@gmail.com', 'mani9', 'mani', NULL, '9581958206', '', NULL, NULL, 'Fresher', '1', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1, 0, '', '', '', 0, 0),
(44, 'chegu', 'manikanta kumar', NULL, 'chegu.mani55@gmail.com', 'mani', '37d3cc00b91f93338370fc9a19c54a43', NULL, '9843214791', '', NULL, NULL, 'Fresher', '7', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1, 0, '', '', '', 0, 0),
(45, 'keshav', 'mandarapu', NULL, 'allenfrankh@gamil.com', 'keshav', 'bobby', NULL, '9000000000', '', NULL, NULL, 'Fresher', '10', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1, 0, '', '', '', 0, 0),
(46, 'keshav', 'mandarapu', NULL, 'allenfrakh@gmail.com', 'keshav', 'bobby123', NULL, '9123445545', '', NULL, NULL, 'Experience', '10', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1, 0, '', '', '', 0, 0),
(47, 'keshav', 'mandarapu', NULL, 'allenfrakh@gmail.com', 'keshav', 'bobby', NULL, '9000000000', '', NULL, NULL, 'Fresher', '8', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1, 0, '', '', '', 0, 0),
(48, 'Mani', 'Chegu', NULL, 'mani.virtuellhire@gmail.com', 'mani', 'mani', NULL, '984298', '', NULL, NULL, 'Fresher', '3', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1, 0, '', '', '', 0, 0),
(49, 'bobby', '123', NULL, 'bobby@gmail.com', 'bobby', 'keshav', '', '9123455', '91234567', NULL, '                adfasfasfasfasfasfafafaf\r\nasdfasdf\r\nafasdf\r\naasfasdfasdfasdfaf                                                                                                                    ', 'Fresher', '6', 'aasdfasdf', 'English', 'Profossional', 'R', 'W', 'S', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1, 0, '', '', '', 0, 0),
(50, 'Nagendra', 'Prasad', NULL, 'nagprasad5u@gmail.com', 'nagendra', '8700f284526e6107e995d26930b81adc', NULL, '9618496650', '', NULL, NULL, 'Experience', '10', NULL, '', '', '', '', '', 4, '', '2016-09-15 12:28:02', '', '0000-00-00 00:00:00', 1, 0, '', '', '', 0, 0),
(51, 'manikanta', 'kumar', NULL, 'mani.virtuellhire@gmail.com', 'mani kanta kumar', 'DINESH', NULL, '9703103933', '', NULL, NULL, 'Fresher', '15', NULL, '', '', '', '', '', 4, '', '2016-09-23 14:57:45', '', '0000-00-00 00:00:00', 1, 0, '', '', '', 0, 0),
(52, 'Nagendra', 'Prasad', NULL, 'nagprasad4u@gmail.com', 'nagendra', '21232f297a57a5a743894a0e4a801fc3', '', '9618496650', '', NULL, '', 'Fresher', '1', '', '', '', '', '', '', 4, '', '2016-10-13 17:09:06', '', '0000-00-00 00:00:00', 1, 2, '', '', '', 0, 0),
(54, '''Joh\\''n''', '''kum\\''a\\''r''', NULL, 'john@gmail.com', NULL, '21232f297a57a5a743894a0e4a801fc3', NULL, '9618496650', NULL, NULL, NULL, 'Experienced', '5', NULL, '', '', '', '', '', 1, '', '2016-09-23 14:57:44', '', '0000-00-00 00:00:00', 0, 0, '', '', '', 0, 0),
(56, 'Donn''a', 'Abc', NULL, 'donna@gmail.com', NULL, '21232f297a57a5a743894a0e4a801fc3', NULL, '7894561230', NULL, NULL, NULL, 'Experienced', '16', NULL, '', '', '', '', '', 1, '', '2016-09-23 14:57:44', '', '0000-00-00 00:00:00', 0, 0, '', '', '', 0, 0),
(58, 'Nagendra', 'Prasad', NULL, 'naresh@gmail.com', NULL, '21232f297a57a5a743894a0e4a801fc3', 'alter@email.com', '7894561230', '4568791320', NULL, 'Huzurabad', 'Experienced', '2', 'Veeraiah', '', '', '', '', '', 1, '', '2016-10-02 08:34:50', '', '0000-00-00 00:00:00', 1, 4, 'Object1', '174_enquiry.jpg', '', 1, 1),
(60, 'Suman', 'Kumar', NULL, 'abc@gmail.com', NULL, '900150983cd24fb0d6963f7d28e17f72', '', '7894561230', '', NULL, '', 'Experienced', '1', '', '', '', '', '', '', 1, '', '2016-10-13 18:50:25', '', '0000-00-00 00:00:00', 1, 2, 'gfdsgdfghdf', '', '', 0, 0),
(61, 'Mani', 'Chegu', NULL, 'manikanta.c@virtuelltech.com', NULL, 'd60db5bdd61fb33e9b5f3724aa1e3462', NULL, '9581958206', NULL, NULL, NULL, 'Experienced', '2', NULL, '', '', '', '', '', 1, '', '2016-10-13 23:54:38', '', '0000-00-00 00:00:00', 1, 4, '', '', '', 0, 0),
(62, 'Dinesh', 'Yaganti', NULL, 'dineshyaganti464@gmail.com', NULL, 'bda70b76a2f1f691318e79ed17e4d20d', 'dineshyaganti@gmail.com', '9676537345', '9030407464', NULL, 'Cumbum', 'Experienced', '2', 'Veera Narayana', '', '', '', '', '', 1, '', '2016-10-14 04:23:11', '', '0000-00-00 00:00:00', 1, 4, 'Aim to work in a challenging work environment where I can utilize my expertise in resolving the problems in test-plans and advocate my analytical skills towards the growth of the organization.', '974_contactus (1).png', '', 0, 0),
(63, 'D', 'Y', NULL, 'd@gmail.com', NULL, '8277e0910d750195b448797616e091ad', 'y@gmail.com', '3', '', NULL, '', 'Fresher', '2', '', '', '', '', '', '', 1, '', '2016-10-17 06:26:28', '', '0000-00-00 00:00:00', 1, 4, '', '', '', 0, 0),
(64, 'Hari', 'Talasila', NULL, 'hari1@gmail.com', NULL, 'a9bcf1e4d7b95a22e2975c812d938889', NULL, '9581958206', NULL, NULL, NULL, 'Fresher', '2', NULL, '', '', '', '', '', 1, '', '2016-10-17 07:27:46', '', '0000-00-00 00:00:00', 1, 4, '', '', '', 0, 0),
(65, 'Phani Sri', 'Konte', NULL, 'phanisri1@gmail.com', NULL, 'b452478b47fa4490f32e87f4ae30f9f7', '', '9998921389', '', NULL, '', 'Fresher', '2', 'Ramarao', '', '', '', '', '', 1, '', '2016-10-17 08:07:54', '', '0000-00-00 00:00:00', 1, 4, '', '683_IMG_20160605_180355_HDR.jpg', '', 0, 0),
(67, 'Ben', '10', NULL, 'ben10@gmail.com', NULL, '837584e97c0acf0e96107822babe3214', NULL, '8888888888', NULL, NULL, NULL, 'Fresher', '1', NULL, '', '', '', '', '', 1, '', '2016-10-25 05:48:53', '', '0000-00-00 00:00:00', 1, 2, '', '', '', 0, 0),
(68, 'Kanaka', 'Raju', NULL, 'kanaka@gmail.com', NULL, '4198c1b5821564e1923d19beed73c21a', NULL, '7894651320', NULL, NULL, NULL, 'Fresher', '2', NULL, '', '', '', '', '', 1, '', '2016-10-27 09:56:39', '', '0000-00-00 00:00:00', 1, 4, '', '', 'f2e432f34cd9e809d03a9ddc633ab9c1', 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=109 ;

--
-- Dumping data for table `js_educational_information`
--

INSERT INTO `js_educational_information` (`js_educational_information_id`, `js_qualification_name`, `js_course`, `js_institution_name`, `js_education_location`, `js_start_date`, `js_end_date`, `js_percentage`, `js_university`, `job_seeker_id`, `inserted_by`, `inserted_time`, `updated_by`, `updated_time`) VALUES
(48, 'SSC', 'fdg', 'fdhfgh', NULL, '0000-00-00', '0000-00-00', 'gfh', NULL, 60, NULL, NULL, NULL, NULL),
(96, 'SSC', '10th Class', 'Navabharathi Vidyalayam', NULL, '2004-01-01', '2005-01-01', '70.66', NULL, 58, NULL, NULL, NULL, NULL),
(97, 'Intermediate', 'Inter', 'kakatiya High School', NULL, '2005-01-01', '2007-01-01', '69.8', NULL, 58, NULL, NULL, NULL, NULL),
(98, 'Graduation', 'IT', 'Vaageswari College Of Engineering', NULL, '2007-01-01', '2011-05-01', '65.31', NULL, 58, NULL, NULL, NULL, NULL),
(106, 'Graduation', 'Bachelor of Technology', 'Narsaraopet Engineering College', NULL, '2010-10-10', '2015-05-24', '61', NULL, 62, NULL, NULL, NULL, NULL),
(107, 'Intermediate', 'MPC', 'Sri Chaitanya junior college', NULL, '2008-06-10', '2010-05-23', '91.6', NULL, 62, NULL, NULL, NULL, NULL),
(108, 'Post Graduation', 'ndsk', 'ljkaskdfjql', NULL, '2016-10-23', '2016-10-23', '843', NULL, 65, NULL, NULL, NULL, NULL);

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
  `Experience_level` varchar(100) NOT NULL,
  PRIMARY KEY (`js_enquiry_id`),
  KEY `js_enq_job_seeker_id_idx` (`js_job_seeker_id`),
  KEY `js_cw_enq_id_idx` (`js_content_writer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `js_enquiries`
--

INSERT INTO `js_enquiries` (`js_enquiry_id`, `js_jobseeker_name`, `js_email_id`, `js_phone_no`, `js_job_seeker_id`, `js_message`, `js_subject`, `js_content_writer_id`, `inserted_by`, `inserted_date`, `is_read_js`, `is_read_cw`, `is_read_ad`, `is_read_sa`, `Experience_level`) VALUES
(1, 'veekshan', 'bten688@gmail.com', NULL, 28, 'how do i know?', 'resume', 4, NULL, NULL, 0, 0, 0, 0, ''),
(2, 'veekshan', 'bten688@gmail.com', NULL, 28, 'hello world', 'hi', 4, NULL, NULL, 0, 0, 0, 0, ''),
(3, 'gvk@123', 'vijayv@gmail.com', NULL, 27, 'Do you know me?????', 'Hi', 4, NULL, NULL, 0, 0, 0, 0, ''),
(4, 'veekshan', 'bten688@gmail.com', NULL, 28, 'gd mrng, how r u??\r\n', 'hi', 5, NULL, NULL, 0, 0, 0, 1, ''),
(5, 'gvk@123', 'vijayintelli72@gmail.com', NULL, 27, 'Query Query', 'subject', 5, NULL, NULL, 0, 0, 0, 0, ''),
(6, 'gvk@123', 'vijayintelli72@gmail.com', NULL, 27, 'fadsfsdfsdf', 'zfd', 6, NULL, NULL, 0, 0, 0, 0, ''),
(7, 'Manikanta', 'mani.srp05@gmail.com', NULL, 38, 'uy,lui8f', 'hgfh', 5, NULL, NULL, 0, 0, 0, 0, ''),
(8, 'nagendra', 'nagprasad4u@gmail.com', NULL, 50, 'hjk', 'hhh', 5, NULL, NULL, 0, 0, 0, 0, ''),
(9, '', '', NULL, 0, 'yhuiyh', 'uihiu', 5, NULL, NULL, 0, 0, 0, 0, '');

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
  `lang_read` int(4) DEFAULT NULL,
  `writes` int(4) DEFAULT NULL,
  `speaks` int(4) DEFAULT NULL,
  `job_seeker_id` int(100) DEFAULT NULL,
  `inserted_by` varchar(200) DEFAULT NULL,
  `inserted_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`language_id`),
  KEY `js_id_idx` (`job_seeker_id`),
  KEY `js_lan_id_idx` (`job_seeker_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=121 ;

--
-- Dumping data for table `js_languages`
--

INSERT INTO `js_languages` (`language_id`, `language_name`, `profficiency_level`, `lang_read`, `writes`, `speaks`, `job_seeker_id`, `inserted_by`, `inserted_date`) VALUES
(56, 'Telugu', 'Beginner', 1, 1, 1, 60, NULL, NULL),
(107, 'Telugu', 'Profossional', 1, 1, 1, 58, NULL, NULL),
(108, 'Hindi', 'Expert', 0, 0, 1, 58, NULL, NULL),
(118, 'English', 'Profossional', 1, 1, 1, 62, NULL, NULL),
(119, 'Hindi', 'Profossional', 1, 1, 1, 62, NULL, NULL),
(120, 'Telugu', 'Profossional', 1, 1, 1, 62, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `js_my_resumes`
--

CREATE TABLE IF NOT EXISTS `js_my_resumes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `jsid` int(10) NOT NULL,
  `selected_template` int(10) NOT NULL,
  `resume_text` longtext NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cwid` int(10) NOT NULL,
  `pdf_file` varchar(1000) NOT NULL,
  `html_data` longtext NOT NULL,
  `css_data` longtext NOT NULL,
  `amount` varchar(10) NOT NULL,
  `jsread` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `js_my_resumes`
--

INSERT INTO `js_my_resumes` (`id`, `jsid`, `selected_template`, `resume_text`, `status`, `created_on`, `cwid`, `pdf_file`, `html_data`, `css_data`, `amount`, `jsread`) VALUES
(1, 58, 1, '<style>#resume-viewer div.block p{line-height:1.4em;margin:0 0 .6em}#resume-viewer div.blocks *{line-height:1.4em}#resume-viewer div.block p.person{font-size:3em;margin-bottom:0;padding:0 .2em;line-height:1em}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:.5em 0 0;border-top:1px solid #a77;padding:.3em 10px 0 0}#resume-viewer div.block p.location{font-size:1em;color:#fff;padding-right:10px}#resume-viewer div.block p.title{font-size:1.3em;font-weight:bold;margin-bottom:.5em;color:#800}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.blocks{padding-top:13em}#resume-viewer div.block.person{margin-top:12mm;text-align:right;border-color:transparent}#resume-viewer div.block.contact{margin:12mm 8.13953488372093% 0 1em !important;border-color:transparent;font-size:1.2em;color:#555}#resume-viewer table.wide{position:absolute;width:168mm;border-collapse:collapse;margin:-12mm -8.13953488372093% 0 -8.13953488372093%}#resume-viewer table.wide > tbody{display:inline-table;width:168mm;padding-left:8.13953488372093%;padding-right:8.13953488372093%}#resume-viewer td.left{width:50%;vertical-align:top;background:#800;border-right:4px solid #000;color:#fff;padding-left:7%;padding-bottom:2em}#resume-viewer td.right{width:50%;vertical-align:top;background:#eee;border-left:4px solid #000;line-height:2em}#resume-viewer div.blocks{padding-top:169.32285px}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><p class="person">Nagendra Prasad</p><p class="jobtitle">PHP Developer</p><p class="location">Huzurabad</p></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div class="html-content">naresh@gmail.com<br>7894561230</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p><div class="block-inner"><div class="html-content">Object1</div></div></div><div class="block" data-category="experience" data-children="3" data-id="1" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Work Experience</p><div class="block-inner"><div class="child" data-id="1c0" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Bartronics India Ltd </span></p><p class="sub-dates">Jan 2011 â€“ Jan 2012</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="child" data-id="1c1" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Srisaas Technologies </span></p><p class="sub-dates">Jan 2012 â€“ Jan 2013</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="last-child" data-id="1c2" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">IQC </span></p><p class="sub-dates">Jan 2012 â€“ Feb 2015</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div></div></div><div class="block" data-category="education" data-children="3" data-id="2" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Education</p><div class="block-inner"><div class="child" data-id="2c0" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">SSC</p><p class="sub-where">Navabharathi Vidyalayam</p><p class="sub-dates">2004 â€“ 2005</p><div class="html-content"></div></div><div class="child" data-id="2c1" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Intermediate</p><p class="sub-where">kakatiya High School</p><p class="sub-dates">2005 â€“ 2007</p><div class="html-content"></div></div><div class="last-child" data-id="2c2" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Graduation</p><p class="sub-where">Vaageswari College Of Engineering</p><p class="sub-dates">2007 â€“ 2011</p><div class="html-content"></div></div></div></div><div class="block" data-category="text" data-children="" data-id="3" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></div></div>', 'Saved', '2016-10-01 13:00:10', 0, '', '', '', '', 1),
(2, 58, 5, '<style>#resume-viewer div.block p{line-height:1.4em;margin:0 0 .6em}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0;line-height:1.2em;margin-top:-.2em;}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:0}#resume-viewer div.block p.location{font-size:1em;color:#555;margin:0}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:1.3em;font-weight:bold;margin:0 0 .5em 0;padding:.2em;text-transform:uppercase;border-bottom:.25em solid #bbb}#resume-viewer div.blocks{margin-top:1em}#resume-viewer div.block-inner{margin-left:2em}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><p class="person">Nagendra Prasad</p><p class="jobtitle">PHP Developer</p><p class="location">Huzurabad</p></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div class="html-content">naresh@gmail.com<br>7894561230</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p><div class="block-inner"><div class="html-content">Object1</div></div></div><div class="block" data-category="experience" data-children="3" data-id="1" style="margin-bottom: 1em;"><div id="section-toolbar" class="section-toolbar" style="display: none; width: 537px; margin-top: -28px; margin-right: -6px; right: 0px; left: 0px;"><button class="btn btn-mini btn-default edit" style="display: none;">Edit</button><button class="btn btn-mini btn-default rename">Edit Title</button><button class="btn btn-mini btn-default add-new">Add Subsection</button><button class="btn btn-mini btn-default move-section">Move</button><button class="btn btn-mini btn-default delete"><i class="icon-remove"></i></button></div><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Work Experience</p><div class="block-inner"><div class="child" data-id="1c0" data-category="experience" style="margin-bottom: 1em;"><div id="subsection-toolbar" class="subsection-toolbar" style="display: none; top: 204.906px;"><button class="btn btn-mini btn-default edit">Edit</button><button class="btn btn-mini btn-default move-subsection">Move</button><button class="btn btn-mini btn-default delete"><i class="icon-remove"></i></button></div><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Bartronics India Ltd </span></p><p class="sub-dates">Jan 2011 â€“ Jan 2012</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="child" data-id="1c1" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Srisaas Technologies </span></p><p class="sub-dates">Jan 2012 â€“ Jan 2013</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="last-child" data-id="1c2" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">IQC </span></p><p class="sub-dates">Jan 2012 â€“ Feb 2015</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div></div></div><div class="block" data-category="education" data-children="3" data-id="2" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Education</p><div class="block-inner"><div class="child" data-id="2c0" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">SSC</p><p class="sub-where">Navabharathi Vidyalayam</p><p class="sub-dates">2004 â€“ 2005</p><div class="html-content"></div></div><div class="child" data-id="2c1" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Intermediate</p><p class="sub-where">kakatiya High School</p><p class="sub-dates">2005 â€“ 2007</p><div class="html-content"></div></div><div class="last-child" data-id="2c2" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Graduation</p><p class="sub-where">Vaageswari College Of Engineering</p><p class="sub-dates">2007 â€“ 2011</p><div class="html-content"></div></div></div></div><div class="block" data-category="text" data-children="" data-id="3" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></div></div>', 'Saved', '2016-10-01 13:02:16', 0, '', '', '', '', 1),
(3, 58, 3, '<style>#resume-viewer div.block p{line-height:1.4em;margin:0 0 .6em}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0;line-height:1.2em;margin-top:-.2em;}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:0}#resume-viewer div.block p.location{font-size:1em;color:#555;margin:0}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:1.3em;font-weight:bold;margin:0 0 .5em 0;padding:.2em;text-transform:uppercase;border-top:.2em dotted #aaa}#resume-viewer div.blocks{margin-top:1em}#resume-viewer div.block-inner{margin-left:2em}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><p class="person">Nagendra Prasad</p><p class="jobtitle">PHP Developer</p><p class="location">Huzurabad</p></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div class="html-content">naresh@gmail.com<br>7894561230</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><div id="section-toolbar" class="section-toolbar" style="display: none; width: 537px; margin-top: -28px; margin-right: -6px; right: 0px; left: 0px;"><button class="btn btn-mini btn-default edit" style="display: inline-block;">Edit</button><button class="btn btn-mini btn-default rename" style="display: none;">Edit Title</button><button class="btn btn-mini btn-default add-new" style="display: none;">Add Subsection</button><button class="btn btn-mini btn-default move-section">Move</button><button class="btn btn-mini btn-default delete"><i class="icon-remove"></i></button></div><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p><div class="block-inner"><div class="html-content">Object1</div></div></div><div class="block" data-category="experience" data-children="3" data-id="1" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Work Experience</p><div class="block-inner"><div class="child" data-id="1c0" data-category="experience" style="margin-bottom: 1em;"><div id="subsection-toolbar" class="subsection-toolbar" style="display: none; top: 202.906px;"><button class="btn btn-mini btn-default edit">Edit</button><button class="btn btn-mini btn-default move-subsection">Move</button><button class="btn btn-mini btn-default delete"><i class="icon-remove"></i></button></div><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Bartronics India Ltd </span></p><p class="sub-dates">Jan 2011 â€“ Jan 2012</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="child" data-id="1c1" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Srisaas Technologies </span></p><p class="sub-dates">Jan 2012 â€“ Jan 2013</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="last-child" data-id="1c2" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">IQC </span></p><p class="sub-dates">Jan 2012 â€“ Feb 2015</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div></div></div><div class="block" data-category="education" data-children="3" data-id="2" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Education</p><div class="block-inner"><div class="child" data-id="2c0" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">SSC</p><p class="sub-where">Navabharathi Vidyalayam</p><p class="sub-dates">2004 â€“ 2005</p><div class="html-content"></div></div><div class="child" data-id="2c1" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Intermediate</p><p class="sub-where">kakatiya High School</p><p class="sub-dates">2005 â€“ 2007</p><div class="html-content"></div></div><div class="last-child" data-id="2c2" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Graduation</p><p class="sub-where">Vaageswari College Of Engineering</p><p class="sub-dates">2007 â€“ 2011</p><div class="html-content"></div></div></div></div><div class="block" data-category="text" data-children="" data-id="3" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></div></div>', 'Saved', '2016-10-01 15:08:43', 0, '', '', '', '', 1),
(7, 58, 5, '<style>#resume-viewer div.block p{line-height:1.4em;margin:0 0 .6em}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0;line-height:1.2em;margin-top:-.2em;}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:0}#resume-viewer div.block p.location{font-size:1em;color:#555;margin:0}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:1.3em;font-weight:bold;margin:0 0 .5em 0;padding:.2em;text-transform:uppercase;border-bottom:.25em solid #bbb}#resume-viewer div.blocks{margin-top:1em}#resume-viewer div.block-inner{margin-left:2em}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><p class="person">Nagendra Prasad</p><p class="jobtitle">PHP Developer</p><p class="location">Huzurabad</p></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div class="html-content">naresh@gmail.com<br>7894561230</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p><div class="block-inner"><div class="html-content">Object1</div></div></div><div class="block" data-category="experience" data-children="3" data-id="1" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Work Experience</p><div class="block-inner"><div class="child" data-id="1c0" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Bartronics India Ltd </span></p><p class="sub-dates">Jan 2011 â€“ Jan 2012</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="child" data-id="1c1" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Srisaas Technologies </span></p><p class="sub-dates">Jan 2012 â€“ Jan 2013</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="last-child" data-id="1c2" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">IQC </span></p><p class="sub-dates">Jan 2012 â€“ Feb 2015</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div></div></div><div class="block" data-category="education" data-children="3" data-id="2" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Education</p><div class="block-inner"><div class="child" data-id="2c0" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">SSC</p><p class="sub-where">Navabharathi Vidyalayam</p><p class="sub-dates">2004 â€“ 2005</p><div class="html-content"></div></div><div class="child" data-id="2c1" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Intermediate</p><p class="sub-where">kakatiya High School</p><p class="sub-dates">2005 â€“ 2007</p><div class="html-content"></div></div><div class="last-child" data-id="2c2" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Graduation</p><p class="sub-where">Vaageswari College Of Engineering</p><p class="sub-dates">2007 â€“ 2011</p><div class="html-content"></div></div></div></div><div class="block" data-category="text" data-children="" data-id="3" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></div></div>', 'Saved', '2016-10-01 15:39:28', 0, '', '', '', '', 1),
(8, 58, 6, '<style>#resume-viewer div.block p{line-height:1.4em;margin:.5em 0 .6em}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0;line-height:1.2em;margin-top:-.2em;}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:0}#resume-viewer div.block p.location{font-size:1em;color:#555;margin:0}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:140%;font-weight:bold;margin:0 0 .5em 0;padding:.2em 0;text-transform:uppercase}#resume-viewer div.blocks{margin-top:1em}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}#resume-viewer td.left0{width:35%;vertical-align:top}#resume-viewer td.right0{width:65%;vertical-align:top}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><p class="person">Nagendra kannam</p><p class="jobtitle">PHP Developer</p><p class="location">Huzurabad</p></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div class="html-content">naresh@gmail.com<br>7894561230</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><table class="wide"><tbody><tr><td class="left0"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p></td><td class="right0"><div class="block-inner"><div class="html-content">Object1</div></div></td></tr></tbody></table></div><div class="block" data-category="experience" data-children="3" data-id="1" style="margin-bottom: 1em;"><div id="section-toolbar" class="section-toolbar" style="display: none; width: 537px; margin-top: -28px; margin-right: -6px; right: 0px; left: 0px;"><button class="btn btn-mini btn-default edit" style="display: none;">Edit</button><button class="btn btn-mini btn-default rename" style="display: inline-block;">Edit Title</button><button class="btn btn-mini btn-default add-new" style="display: inline-block;">Add Subsection</button><button class="btn btn-mini btn-default move-section" style="display: inline-block;">Move</button><button class="btn btn-mini btn-default delete" style="display: inline-block;"><i class="icon-remove"></i></button></div><table class="wide"><tbody><tr><td class="left0"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Work Experience</p></td><td class="right0"><div class="block-inner"><div class="child" data-id="1c0" data-category="experience" style="margin-bottom: 1em;"><div id="subsection-toolbar" class="subsection-toolbar" style="display: none; top: 159.156px;"><button class="btn btn-mini btn-default edit">Edit</button><button class="btn btn-mini btn-default move-subsection">Move</button><button class="btn btn-mini btn-default delete"><i class="icon-remove"></i></button></div><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Srisaas Technologies </span></p><p class="sub-dates">Jan 2012 â€“ Jan 2013</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="child" data-id="1c1" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">IQC </span></p><p class="sub-dates">Jan 2012 â€“ Feb 2015</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="last-child" data-id="1c2" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Bartronics India Ltd </span></p><p class="sub-dates">Jan 2011 â€“ Jan 2012</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div></div></td></tr></tbody></table></div><div class="block" data-category="education" data-children="3" data-id="2" style="margin-bottom: 1em;"><table class="wide"><tbody><tr><td class="left0"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Education</p></td><td class="right0"><div class="block-inner"><div class="child" data-id="2c0" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">SSC</p><p class="sub-where">Navabharathi Vidyalayam</p><p class="sub-dates">2004 â€“ 2005</p><div class="html-content"></div></div><div class="child" data-id="2c1" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Intermediate</p><p class="sub-where">kakatiya High School</p><p class="sub-dates">2005 â€“ 2007</p><div class="html-content"></div></div><div class="last-child" data-id="2c2" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Graduation</p><p class="sub-where">Vaageswari College Of Engineering</p><p class="sub-dates">2007 â€“ 2011</p><div class="html-content"></div></div></div></td></tr></tbody></table></div><div class="block" data-category="text" data-children="" data-id="3" style="margin-bottom: 1em;"><table class="wide"><tbody><tr><td class="left0"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p></td><td class="right0"><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></td></tr></tbody></table></div></div>', 'Saved', '2016-10-01 15:50:44', 0, '', '', '', '', 1),
(9, 58, 5, '<style>#resume-viewer div.block p{line-height:1.4em;margin:0 0 .6em}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0;line-height:1.2em;margin-top:-.2em;}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:0}#resume-viewer div.block p.location{font-size:1em;color:#555;margin:0}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:1.3em;font-weight:bold;margin:0 0 .5em 0;padding:0 .5em .1em;text-transform:uppercase;background:#ddd;border:1px solid #ddd;-moz-border-radius:0 0 1.3em 0;-webkit-border-radius:0 0 1.3em 0;border-radius:0 0 1.3em 0;border-bottom-right-radius:1.3em}#resume-viewer div.blocks{margin-top:1em}#resume-viewer div.block-inner{margin-left:2em}#resume-viewer td.block-title{width:50%;padding:0;border-top:.2em solid #ddd}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer table.wide.title{page-break-inside:avoid;page-break-after:avoid}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><p class="person">Nagendra Prasad</p><p class="jobtitle">PHP Developer</p><p class="location">Huzurabad</p></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div id="section-toolbar" class="section-toolbar" style="display: none; width: 182px; margin-top: -28px; margin-right: -6px; right: 0px; left: 355px;"><button class="btn btn-mini btn-default edit" style="display: inline-block;">Edit</button><button class="btn btn-mini btn-default rename" style="display: none;">Edit Title</button><button class="btn btn-mini btn-default add-new" style="display: none;">Add Subsection</button><button class="btn btn-mini btn-default move-section" style="display: none;">Move</button><button class="btn btn-mini btn-default delete" style="display: none;"><i class="icon-remove"></i></button></div><div class="html-content">naresh@gmail.com<br>7894561230</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><table class="wide title" cellspacing="0"><tbody><tr><td class="block-title"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p></td><td class="block-title"></td></tr></tbody></table><div class="block-inner"><div class="html-content">Object1</div></div></div><div class="block" data-category="experience" data-children="3" data-id="1" style="margin-bottom: 1em;"><table class="wide title" cellspacing="0"><tbody><tr><td class="block-title"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Work Experience</p></td><td class="block-title"></td></tr></tbody></table><div class="block-inner"><div class="child" data-id="1c0" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Bartronics India Ltd </span></p><p class="sub-dates">Jan 2011 â€“ Jan 2012</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="child" data-id="1c1" data-category="experience" style="margin-bottom: 1em;"><div id="subsection-toolbar" class="subsection-toolbar" style="display: none; top: 278.016px;"><button class="btn btn-mini btn-default edit">Edit</button><button class="btn btn-mini btn-default move-subsection">Move</button><button class="btn btn-mini btn-default delete"><i class="icon-remove"></i></button></div><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Srisaas Technologies </span></p><p class="sub-dates">Jan 2012 â€“ Jan 2013</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="last-child" data-id="1c2" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">IQC </span></p><p class="sub-dates">Jan 2012 â€“ Feb 2015</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div></div></div><div class="block" data-category="education" data-children="3" data-id="2" style="margin-bottom: 1em;"><table class="wide title" cellspacing="0"><tbody><tr><td class="block-title"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Education</p></td><td class="block-title"></td></tr></tbody></table><div class="block-inner"><div class="child" data-id="2c0" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">SSC</p><p class="sub-where">Navabharathi Vidyalayam</p><p class="sub-dates">2004 â€“ 2005</p><div class="html-content"></div></div><div class="child" data-id="2c1" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Intermediate</p><p class="sub-where">kakatiya High School</p><p class="sub-dates">2005 â€“ 2007</p><div class="html-content"></div></div><div class="last-child" data-id="2c2" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Graduation</p><p class="sub-where">Vaageswari College Of Engineering</p><p class="sub-dates">2007 â€“ 2011</p><div class="html-content"></div></div></div></div><div class="block" data-category="text" data-children="" data-id="3" style="margin-bottom: 1em;"><table class="wide title" cellspacing="0"><tbody><tr><td class="block-title"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p></td><td class="block-title"></td></tr></tbody></table><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></div></div>', 'Saved', '2016-10-01 16:28:15', 0, '', '', '', '', 1),
(10, 58, 1, '<style>#resume-viewer div.block p{line-height:1.4em;margin:0 0 .6em}#resume-viewer div.blocks *{line-height:1.4em}#resume-viewer div.block p.person{font-size:3em;margin-bottom:0;padding:0 .2em;line-height:1em}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:.5em 0 0;border-top:1px solid #a77;padding:.3em 10px 0 0}#resume-viewer div.block p.location{font-size:1em;color:#fff;padding-right:10px}#resume-viewer div.block p.title{font-size:1.3em;font-weight:bold;margin-bottom:.5em;color:#800}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.blocks{padding-top:13em}#resume-viewer div.block.person{margin-top:12mm;text-align:right;border-color:transparent}#resume-viewer div.block.contact{margin:12mm 8.13953488372093% 0 1em !important;border-color:transparent;font-size:1.2em;color:#555}#resume-viewer table.wide{position:absolute;width:168mm;border-collapse:collapse;margin:-12mm -8.13953488372093% 0 -8.13953488372093%}#resume-viewer table.wide > tbody{display:inline-table;width:168mm;padding-left:8.13953488372093%;padding-right:8.13953488372093%}#resume-viewer td.left{width:50%;vertical-align:top;background:#800;border-right:4px solid #000;color:#fff;padding-left:7%;padding-bottom:2em}#resume-viewer td.right{width:50%;vertical-align:top;background:#eee;border-left:4px solid #000;line-height:2em}#resume-viewer div.blocks{padding-top:168.32285px}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><p class="person">Nagendra Prasad</p><p class="jobtitle">PHP Developer</p><p class="location">Huzurabad</p></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div id="section-toolbar" class="section-toolbar" style="display: none; width: 267px; margin-top: -28.7px; margin-right: -54.9883px; right: 0px; left: 318.988px;"><button class="btn btn-mini btn-default edit">Edit</button><button class="btn btn-mini btn-default rename" style="display: none;">Edit Title</button><button class="btn btn-mini btn-default add-new" style="display: none;">Add Subsection</button><button class="btn btn-mini btn-default move-section" style="display: none;">Move</button><button class="btn btn-mini btn-default delete" style="display: none;"><i class="fa fa-trash-o"></i></button></div><div class="html-content">naresh@gmail.com<br>7894561230</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p><div class="block-inner"><div class="html-content">Object1</div></div></div><div class="block" data-category="experience" data-children="3" data-id="1" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Work Experience</p><div class="block-inner"><div class="child" data-id="1c0" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Bartronics India Ltd </span></p><p class="sub-dates">Jan 2011 â€“ Jan 2012</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="child" data-id="1c1" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Srisaas Technologies </span></p><p class="sub-dates">Jan 2012 â€“ Jan 2013</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="last-child" data-id="1c2" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">IQC </span></p><p class="sub-dates">Jan 2012 â€“ Feb 2015</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div></div></div><div class="block" data-category="education" data-children="3" data-id="2" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Education</p><div class="block-inner"><div class="child" data-id="2c0" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">SSC</p><p class="sub-where">Navabharathi Vidyalayam</p><p class="sub-dates">2004 â€“ 2005</p><div class="html-content"></div></div><div class="child" data-id="2c1" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Intermediate</p><p class="sub-where">kakatiya High School</p><p class="sub-dates">2005 â€“ 2007</p><div class="html-content"></div></div><div class="last-child" data-id="2c2" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Graduation</p><p class="sub-where">Vaageswari College Of Engineering</p><p class="sub-dates">2007 â€“ 2011</p><div class="html-content"></div></div></div></div><div class="block" data-category="text" data-children="" data-id="3" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></div></div>', 'Saved', '2016-10-09 06:24:52', 0, '', '', '', '', 1),
(12, 58, 4, '', 'Saved', '2016-10-14 06:25:18', 0, '', '', '', '', 1),
(13, 58, 5, '<style>#resume-viewer div.block p{line-height:1.4em;margin:0 0 .6em}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0;line-height:1.2em;margin-top:-.2em;}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:0}#resume-viewer div.block p.location{font-size:1em;color:#555;margin:0}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:1.3em;font-weight:bold;margin:0 0 .5em 0;padding:0 .5em .1em;text-transform:uppercase;background:#ddd;border:1px solid #ddd;-moz-border-radius:0 0 1.3em 0;-webkit-border-radius:0 0 1.3em 0;border-radius:0 0 1.3em 0;border-bottom-right-radius:1.3em}#resume-viewer div.blocks{margin-top:1em}#resume-viewer div.block-inner{margin-left:2em}#resume-viewer td.block-title{width:50%;padding:0;border-top:.2em solid #ddd}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer table.wide.title{page-break-inside:avoid;page-break-after:avoid}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><p class="person">Nagendra Prasad</p><p class="jobtitle">PHP Developer</p><p class="location">Huzurabad</p></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div id="section-toolbar" class="section-toolbar" style="display: none; width: 155px; margin-top: -27.3px; margin-right: -4px; right: 0px; left: 312px;"><button class="btn btn-mini btn-default edit" style="display: inline-block;">Edit</button><button class="btn btn-mini btn-default rename" style="display: none;">Edit Title</button><button class="btn btn-mini btn-default add-new" style="display: none;">Add Subsection</button><button class="btn btn-mini btn-default move-section" style="display: none;">Move</button><button class="btn btn-mini btn-default delete" style="display: none;"><i class="fa fa-trash-o"></i></button></div><div class="html-content">naresh@gmail.com<br>7894561230</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><table class="wide title" cellspacing="0"><tbody><tr><td class="block-title"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p></td><td class="block-title"></td></tr></tbody></table><div class="block-inner"><div class="html-content">Object1</div></div></div><div class="block" data-category="experience" data-children="3" data-id="1" style="margin-bottom: 1em;"><table class="wide title" cellspacing="0"><tbody><tr><td class="block-title"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Work Experience</p></td><td class="block-title"></td></tr></tbody></table><div class="block-inner"><div class="child" data-id="1c0" data-category="experience" style="margin-bottom: 1em;"><div id="subsection-toolbar" class="subsection-toolbar" style="display: none; top: 175.5px;"><button class="btn btn-mini btn-default edit">Edit</button><button class="btn btn-mini btn-default move-subsection">Move</button><button class="btn btn-mini btn-default delete"><i class="fa fa-trash-o"></i></button></div><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Bartronics India Ltd </span></p><p class="sub-dates">Jan 2011 â€“ Jan 2012</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="child" data-id="1c1" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Srisaas Technologies </span></p><p class="sub-dates">Jan 2012 â€“ Jan 2013</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="last-child" data-id="1c2" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">IQC </span></p><p class="sub-dates">Jan 2012 â€“ Feb 2015</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div></div></div><div class="block" data-category="education" data-children="3" data-id="2" style="margin-bottom: 1em;"><table class="wide title" cellspacing="0"><tbody><tr><td class="block-title"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Education</p></td><td class="block-title"></td></tr></tbody></table><div class="block-inner"><div class="child" data-id="2c0" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">SSC</p><p class="sub-where">Navabharathi Vidyalayam</p><p class="sub-dates">2004 â€“ 2005</p><div class="html-content"></div></div><div class="child" data-id="2c1" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Intermediate</p><p class="sub-where">kakatiya High School</p><p class="sub-dates">2005 â€“ 2007</p><div class="html-content"></div></div><div class="last-child" data-id="2c2" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Graduation</p><p class="sub-where">Vaageswari College Of Engineering</p><p class="sub-dates">2007 â€“ 2011</p><div class="html-content"></div></div></div></div><div class="block" data-category="text" data-children="" data-id="3" style="margin-bottom: 1em;"><table class="wide title" cellspacing="0"><tbody><tr><td class="block-title"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p></td><td class="block-title"></td></tr></tbody></table><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></div></div>', 'Saved', '2016-10-17 07:11:24', 0, '0', '', '', '', 1);
INSERT INTO `js_my_resumes` (`id`, `jsid`, `selected_template`, `resume_text`, `status`, `created_on`, `cwid`, `pdf_file`, `html_data`, `css_data`, `amount`, `jsread`) VALUES
(14, 65, 4, '<style>#resume-viewer div.block p{line-height:1.4em;margin:.5em 0 .6em}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0;line-height:1.2em;margin-top:-.2em;}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:0}#resume-viewer div.block p.location{font-size:1em;color:#555;margin:0}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:140%;font-weight:bold;margin:0 0 .5em 0;padding:.2em 0;text-transform:uppercase}#resume-viewer div.blocks{margin-top:1em}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}#resume-viewer td.left0{width:35%;vertical-align:top}#resume-viewer td.right0{width:65%;vertical-align:top}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><p class="person">Phani Sri Konte</p></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div class="html-content">naresh@gmail.com<br>7894561230</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><table class="wide"><tbody><tr><td class="left0"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p></td><td class="right0"><div class="block-inner"><div class="html-content">Object1</div></div></td></tr></tbody></table></div><div class="block" data-category="experience" data-children="3" data-id="1" style="margin-bottom: 1em;"><table class="wide"><tbody><tr><td class="left0"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Work Experience</p></td><td class="right0"><div class="block-inner"><div class="child" data-id="1c0" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">bat India Ltd </span></p><p class="sub-dates">Jan 2011 â€“ Jan 2012</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="child" data-id="1c1" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Srisaas Technologies </span></p><p class="sub-dates">Jan 2012 â€“ Jan 2013</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="last-child" data-id="1c2" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">IQC </span></p><p class="sub-dates">Jan 2012 â€“ Feb 2015</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div></div></td></tr></tbody></table></div><div class="block" data-category="education" data-children="3" data-id="2" style="margin-bottom: 1em;"><table class="wide"><tbody><tr><td class="left0"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Education1</p></td><td class="right0"><div class="block-inner"><div class="child" data-id="2c0" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">SSC</p><p class="sub-where">Navabharathi Vidyalayam1</p><p class="sub-dates">2004 â€“ 2005</p><div class="html-content"></div></div><div class="child" data-id="2c1" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Intermediate</p><p class="sub-where">kakatiya High School</p><p class="sub-dates">2005 â€“ 2007</p><div class="html-content"></div></div><div class="last-child" data-id="2c2" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Graduation</p><p class="sub-where">Vaageswari College Of Engineering</p><p class="sub-dates">2007 â€“ 2011</p><div class="html-content"></div></div></div></td></tr></tbody></table></div><div class="block" data-category="text" data-children="" data-id="3" style="margin-bottom: 1em;"><table class="wide"><tbody><tr><td class="left0"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p></td><td class="right0"><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></td></tr></tbody></table></div></div>', 'Saved', '2016-10-17 08:12:43', 0, '0', '<table class="wide"><tr><td class="left"><div class="block person" data-category="person"><p class="person">Phani Sri Konte</p></div></td><td class="right"><div class="block contact" data-category="contact"><div class="html-content">naresh@gmail.com<br/>7894561230</div></div></td></tr></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0"><table class="wide"><tr><td class="left0"><p class="title">Summary</p></td><td class="right0"><div class="block-inner"><div class="html-content">Object1</div></div></td></tr></table></div><div class="block" data-category="experience" data-children="3" data-id="1"><table class="wide"><tr><td class="left0"><p class="title">Work Experience</p></td><td class="right0"><div class="block-inner"><div class="child" data-id="1c0" data-category="experience"><p class="sub-title"> </p><p class="sub-where"><span class="company">bat India Ltd </p><p class="sub-dates">Jan 2011 â€“ Jan 2012</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="child" data-id="1c1" data-category="experience"><p class="sub-title"> </p><p class="sub-where"><span class="company">Srisaas Technologies </p><p class="sub-dates">Jan 2012 â€“ Jan 2013</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="last-child" data-id="1c2" data-category="experience"><p class="sub-title"> </p><p class="sub-where"><span class="company">IQC </p><p class="sub-dates">Jan 2012 â€“ Feb 2015</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div></div></td></tr></table></div><div class="block" data-category="education" data-children="3" data-id="2"><table class="wide"><tr><td class="left0"><p class="title">Education1</p></td><td class="right0"><div class="block-inner"><div class="child" data-id="2c0" data-category="education"><p class="sub-title">SSC</p><p class="sub-where">Navabharathi Vidyalayam1</p><p class="sub-dates">2004 â€“ 2005</p><div class="html-content"></div></div><div class="child" data-id="2c1" data-category="education"><p class="sub-title">Intermediate</p><p class="sub-where">kakatiya High School</p><p class="sub-dates">2005 â€“ 2007</p><div class="html-content"></div></div><div class="last-child" data-id="2c2" data-category="education"><p class="sub-title">Graduation</p><p class="sub-where">Vaageswari College Of Engineering</p><p class="sub-dates">2007 â€“ 2011</p><div class="html-content"></div></div></div></td></tr></table></div><div class="block" data-category="text" data-children="" data-id="3"><table class="wide"><tr><td class="left0"><p class="title">Additional Information</p></td><td class="right0"><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></td></tr></table></div></div>', '#resume-viewer div.block p{line-height:1.4em;margin:.5em 0 .6em}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0;line-height:1.2em;margin-top:-.2em;}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:0}#resume-viewer div.block p.location{font-size:1em;color:#555;margin:0}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:140%;font-weight:bold;margin:0 0 .5em 0;padding:.2em 0;text-transform:uppercase}#resume-viewer div.blocks{margin-top:1em}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}#resume-viewer td.left0{width:35%;vertical-align:top}#resume-viewer td.right0{width:65%;vertical-align:top}', '', 0),
(15, 62, 3, '<style>#resume-viewer div.block p{line-height:1.4em;margin:0 0 .6em}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0;line-height:1.2em;margin-top:-.2em;}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:0}#resume-viewer div.block p.location{font-size:1em;color:#555;margin:0}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:1.3em;font-weight:bold;margin:0 0 .5em 0;padding:.2em;text-transform:uppercase;border-top:.2em dotted #aaa}#resume-viewer div.blocks{margin-top:1em}#resume-viewer div.block-inner{margin-left:2em}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><div id="section-toolbar" class="section-toolbar" style="display: none; width: 346px; margin-top: -28px; margin-right: 185px; right: 0px; left: 0px;"><button class="btn btn-mini btn-default edit" style="display: inline-block;">Edit</button><button class="btn btn-mini btn-default rename" style="display: none;">Edit Title</button><button class="btn btn-mini btn-default add-new" style="display: none;">Add Subsection</button><button class="btn btn-mini btn-default move-section" style="display: none;">Move</button><button class="btn btn-mini btn-default delete" style="display: none;"><i class="fa fa-trash-o"></i></button></div><p class="person">Dinesh Yaganti</p><p class="jobtitle">Software Tester</p></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div class="html-content">dineshyaganti464@gmail.com<br>9676537345</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p><div class="block-inner"></div></div><div class="block" data-category="experience" data-children="1" data-id="1" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Work Experience</p><div class="block-inner"><div class="last-child" data-id="1c0" data-category="experience" style="margin-bottom: 1em;"><div id="subsection-toolbar" class="subsection-toolbar" style="display: none; top: 173.906px;"><button class="btn btn-mini btn-default edit">Edit</button><button class="btn btn-mini btn-default move-subsection">Move</button><button class="btn btn-mini btn-default delete"><i class="fa fa-trash-o"></i></button></div><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Virtuell Technologies </span></p><p class="sub-dates">Jun 2015 â€“ Oct 2016</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div></div></div><div class="block" data-category="education" data-children="3" data-id="2" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Education</p><div class="block-inner"><div class="child" data-id="2c0" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Graduation</p><p class="sub-where">Narsaraopet Engineering College</p><p class="sub-dates">2010 â€“ 2015</p><div class="html-content"></div></div><div class="child" data-id="2c1" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Intermediate</p><p class="sub-where">Sri Chaitanya junior college</p><p class="sub-dates">2008 â€“ 2010</p><div class="html-content"></div></div><div class="last-child" data-id="2c2" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">SSC</p><p class="sub-where">Alpha high school</p><p class="sub-dates">-0001 â€“ -0001</p><div class="html-content"></div></div></div></div><div class="block" data-category="text" data-children="" data-id="3" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></div></div>', 'Saved', '2016-10-20 04:35:28', 0, '0', '', '', '', 0),
(16, 62, 5, '<style>#resume-viewer div.block p{line-height:1.4em;margin:0 0 .6em}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0;line-height:1.2em;margin-top:-.2em;}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:0}#resume-viewer div.block p.location{font-size:1em;color:#555;margin:0}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:1.3em;font-weight:bold;margin:0 0 .5em 0;padding:0 .5em .1em;text-transform:uppercase;background:#ddd;border:1px solid #ddd;-moz-border-radius:0 0 1.3em 0;-webkit-border-radius:0 0 1.3em 0;border-radius:0 0 1.3em 0;border-bottom-right-radius:1.3em}#resume-viewer div.blocks{margin-top:1em}#resume-viewer div.block-inner{margin-left:2em}#resume-viewer td.block-title{width:50%;padding:0;border-top:.2em solid #ddd}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer table.wide.title{page-break-inside:avoid;page-break-after:avoid}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><p class="person">Dinesh Yaganti</p><p class="jobtitle">Software Tester</p></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div class="html-content">dineshyaganti464@gmail.com<br>9676537345</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><div id="section-toolbar" class="section-toolbar" style="display: none; width: 537px; margin-top: -28px; margin-right: -6px; right: 0px; left: 0px;"><button class="btn btn-mini btn-default edit">Edit</button><button class="btn btn-mini btn-default rename" style="display: none;">Edit Title</button><button class="btn btn-mini btn-default add-new" style="display: none;">Add Subsection</button><button class="btn btn-mini btn-default move-section" style="display: inline-block;">Move</button><button class="btn btn-mini btn-default delete" style="display: inline-block;"><i class="fa fa-trash-o"></i></button></div><table class="wide title" cellspacing="0"><tbody><tr><td class="block-title"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p></td><td class="block-title"></td></tr></tbody></table><div class="block-inner"></div></div><div class="block" data-category="experience" data-children="1" data-id="1" style="margin-bottom: 1em;"><table class="wide title" cellspacing="0"><tbody><tr><td class="block-title"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Work Experience</p></td><td class="block-title"></td></tr></tbody></table><div class="block-inner"><div class="last-child" data-id="1c0" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Virtuell Technologies </span></p><p class="sub-dates">Jun 2015 â€“ Oct 2016</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div></div></div><div class="block" data-category="education" data-children="3" data-id="2" style="margin-bottom: 1em;"><table class="wide title" cellspacing="0"><tbody><tr><td class="block-title"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Education</p></td><td class="block-title"></td></tr></tbody></table><div class="block-inner"><div class="child" data-id="2c0" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Graduation</p><p class="sub-where">Narsaraopet Engineering College</p><p class="sub-dates">2010 â€“ 2015</p><div class="html-content"></div></div><div class="child" data-id="2c1" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Intermediate</p><p class="sub-where">Sri Chaitanya junior college</p><p class="sub-dates">2008 â€“ 2010</p><div class="html-content"></div></div><div class="last-child" data-id="2c2" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">SSC</p><p class="sub-where">Alpha high school</p><p class="sub-dates">-0001 â€“ -0001</p><div class="html-content"></div></div></div></div><div class="block" data-category="text" data-children="" data-id="3" style="margin-bottom: 1em;"><table class="wide title" cellspacing="0"><tbody><tr><td class="block-title"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p></td><td class="block-title"></td></tr></tbody></table><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></div></div>', 'Saved', '2016-10-21 05:17:23', 0, '0', '', '', '', 0),
(17, 58, 3, '<style>#resume-viewer div.block p{line-height:1.4em;margin:0 0 .6em}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0;line-height:1.2em;margin-top:-.2em;}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:0}#resume-viewer div.block p.location{font-size:1em;color:#555;margin:0}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:1.3em;font-weight:bold;margin:0 0 .5em 0;padding:.2em;text-transform:uppercase;border-top:.2em dotted #aaa}#resume-viewer div.blocks{margin-top:1em}#resume-viewer div.block-inner{margin-left:2em}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><p class="person">Nagendra Prasad</p><p class="jobtitle">PHP Developer</p><p class="location">Huzurabad</p></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div class="html-content">naresh@gmail.com<br>7894561230</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p><div class="block-inner"><div class="html-content">Object1</div></div></div><div class="block" data-category="experience" data-children="3" data-id="1" style="margin-bottom: 1em;"><div id="section-toolbar" class="section-toolbar" style="display: none; width: 537px; margin-top: -28px; margin-right: -6px; right: 0px; left: 0px;"><button class="btn btn-mini btn-default edit" style="display: none;">Edit</button><button class="btn btn-mini btn-default rename" style="display: inline-block;">Edit Title</button><button class="btn btn-mini btn-default add-new" style="display: inline-block;">Add Subsection</button><button class="btn btn-mini btn-default move-section">Move</button><button class="btn btn-mini btn-default delete"><i class="fa fa-trash-o"></i></button></div><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Work Experience</p><div class="block-inner"><div class="child" data-id="1c0" data-category="experience" style="margin-bottom: 1em;"><div id="subsection-toolbar" class="subsection-toolbar" style="display: none; top: 202.906px;"><button class="btn btn-mini btn-default edit">Edit</button><button class="btn btn-mini btn-default move-subsection">Move</button><button class="btn btn-mini btn-default delete"><i class="fa fa-trash-o"></i></button></div><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">bat India Ltd </span></p><p class="sub-dates">Jan 2011 â€“ Jan 2012</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="child" data-id="1c1" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Srisaas Technologies </span></p><p class="sub-dates">Jan 2012 â€“ Jan 2013</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="last-child" data-id="1c2" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">IQC </span></p><p class="sub-dates">Jan 2012 â€“ Feb 2015</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div></div></div><div class="block" data-category="education" data-children="3" data-id="2" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Education1</p><div class="block-inner"><div class="child" data-id="2c0" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">SSC</p><p class="sub-where">Navabharathi Vidyalayam1</p><p class="sub-dates">2004 â€“ 2005</p><div class="html-content"></div></div><div class="child" data-id="2c1" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Intermediate</p><p class="sub-where">kakatiya High School</p><p class="sub-dates">2005 â€“ 2007</p><div class="html-content"></div></div><div class="last-child" data-id="2c2" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Graduation</p><p class="sub-where">Vaageswari College Of Engineering</p><p class="sub-dates">2007 â€“ 2011</p><div class="html-content"></div></div></div></div><div class="block" data-category="text" data-children="" data-id="3" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></div></div>', 'Saved', '2016-10-23 06:48:25', 0, '0', '<table class="wide"><tr><td class="left"><div class="block person" data-category="person"><p class="person">Nagendra Prasad</p><p class="jobtitle">PHP Developer</p><p class="location">Huzurabad</p></div></td><td class="right"><div class="block contact" data-category="contact"><div class="html-content">naresh@gmail.com<br/>7894561230</div></div></td></tr></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0"><p class="title">Summary</p><div class="block-inner"><div class="html-content">Object1</div></div></div><div class="block" data-category="experience" data-children="3" data-id="1"><p class="title">Work Experience</p><div class="block-inner"><div class="child" data-id="1c0" data-category="experience"><p class="sub-title"> </p><p class="sub-where"><span class="company">bat India Ltd </p><p class="sub-dates">Jan 2011 â€“ Jan 2012</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="child" data-id="1c1" data-category="experience"><p class="sub-title"> </p><p class="sub-where"><span class="company">Srisaas Technologies </p><p class="sub-dates">Jan 2012 â€“ Jan 2013</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="last-child" data-id="1c2" data-category="experience"><p class="sub-title"> </p><p class="sub-where"><span class="company">IQC </p><p class="sub-dates">Jan 2012 â€“ Feb 2015</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div></div></div><div class="block" data-category="education" data-children="3" data-id="2"><p class="title">Education1</p><div class="block-inner"><div class="child" data-id="2c0" data-category="education"><p class="sub-title">SSC</p><p class="sub-where">Navabharathi Vidyalayam1</p><p class="sub-dates">2004 â€“ 2005</p><div class="html-content"></div></div><div class="child" data-id="2c1" data-category="education"><p class="sub-title">Intermediate</p><p class="sub-where">kakatiya High School</p><p class="sub-dates">2005 â€“ 2007</p><div class="html-content"></div></div><div class="last-child" data-id="2c2" data-category="education"><p class="sub-title">Graduation</p><p class="sub-where">Vaageswari College Of Engineering</p><p class="sub-dates">2007 â€“ 2011</p><div class="html-content"></div></div></div></div><div class="block" data-category="text" data-children="" data-id="3"><p class="title">Additional Information</p><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></div></div>', '#resume-viewer div.block p{line-height:1.4em;margin:0 0 .6em}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0;line-height:1.2em;margin-top:-.2em;}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:0}#resume-viewer div.block p.location{font-size:1em;color:#555;margin:0}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:1.3em;font-weight:bold;margin:0 0 .5em 0;padding:.2em;text-transform:uppercase;border-top:.2em dotted #aaa}#resume-viewer div.blocks{margin-top:1em}#resume-viewer div.block-inner{margin-left:2em}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}', '', 1),
(18, 65, 2, '<style>#resume-viewer table.person{margin-left:-0.3em}#resume-viewer td.firstname{font-size:3em;height:.5em;padding:0}#resume-viewer td.lastname{font-size:5em;height:1em;padding:.05em 0;line-height:1em}#resume-viewer div.block p{line-height:1.2em;margin:0 0 .6em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0 0 .2em}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0 0 .2em}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:.6em 0 .2em}#resume-viewer div.block p.location{font-size:1em;color:#555}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:1.3em;font-weight:bold;margin-bottom:.5em;padding-bottom:.2em;border-bottom:.2em solid #ddd}#resume-viewer div.blocks *{line-height:1.4em;}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><div id="section-toolbar" class="section-toolbar" style="display: none; width: 346px; margin-top: -28px; margin-right: 185px; right: 0px; left: 0px;"><button class="btn btn-mini btn-default edit" style="display: inline-block;">Edit</button><button class="btn btn-mini btn-default rename" style="display: none;">Edit Title</button><button class="btn btn-mini btn-default add-new" style="display: none;">Add Subsection</button><button class="btn btn-mini btn-default move-section" style="display: none;">Move</button><button class="btn btn-mini btn-default delete" style="display: none;"><i class="fa fa-trash-o"></i></button></div><table class="person"><tbody><tr><td class="firstname">Phani Sri</td></tr><tr><td class="lastname">Konte</td></tr></tbody></table></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div class="html-content">phanisri1@gmail.com<br>9998921389</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p><div class="block-inner"></div></div><div class="block" data-category="education" data-children="1" data-id="1" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Education</p><div class="block-inner"><div class="last-child" data-id="1c0" data-category="education" style="margin-bottom: 1em;"><div id="subsection-toolbar" class="subsection-toolbar" style="display: none; top: 166.828px;"><button class="btn btn-mini btn-default edit">Edit</button><button class="btn btn-mini btn-default move-subsection">Move</button><button class="btn btn-mini btn-default delete"><i class="fa fa-trash-o"></i></button></div><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Post Graduation</p><p class="sub-where">ljkaskdfjql</p><p class="sub-dates">2016 â€“ 2016</p><div class="html-content"></div></div></div></div><div class="block" data-category="text" data-children="" data-id="2" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></div></div>', 'Saved', '2016-10-25 01:52:33', 0, '0', '', '', '', 0),
(19, 67, 2, '<style>#resume-viewer table.person{margin-left:-0.3em}#resume-viewer td.firstname{font-size:3em;height:.5em;padding:0}#resume-viewer td.lastname{font-size:5em;height:1em;padding:.05em 0;line-height:1em}#resume-viewer div.block p{line-height:1.2em;margin:0 0 .6em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0 0 .2em}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0 0 .2em}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:.6em 0 .2em}#resume-viewer div.block p.location{font-size:1em;color:#555}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:1.3em;font-weight:bold;margin-bottom:.5em;padding-bottom:.2em;border-bottom:.2em solid #ddd}#resume-viewer div.blocks *{line-height:1.4em;}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><div id="section-toolbar" class="section-toolbar" style="display: none; width: 346px; margin-top: -28px; margin-right: 185px; right: 0px; left: 0px;"><button class="btn btn-mini btn-default edit">Edit</button><button class="btn btn-mini btn-default rename" style="display: none;">Edit Title</button><button class="btn btn-mini btn-default add-new" style="display: none;">Add Subsection</button><button class="btn btn-mini btn-default move-section" style="display: none;">Move</button><button class="btn btn-mini btn-default delete" style="display: none;"><i class="fa fa-trash-o"></i></button></div><table class="person"><tbody><tr><td class="firstname">Ben</td></tr><tr><td class="lastname">10</td></tr></tbody></table></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div class="html-content">ben10@gmail.com<br>8888888888</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p><div class="block-inner"></div></div><div class="block" data-category="text" data-children="" data-id="1" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></div></div>', 'Saved', '2016-10-25 05:50:15', 0, '0', '', '', '', 0),
(20, 67, 2, '<style>#resume-viewer table.person{margin-left:-0.3em}#resume-viewer td.firstname{font-size:3em;height:.5em;padding:0}#resume-viewer td.lastname{font-size:5em;height:1em;padding:.05em 0;line-height:1em}#resume-viewer div.block p{line-height:1.2em;margin:0 0 .6em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0 0 .2em}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0 0 .2em}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:.6em 0 .2em}#resume-viewer div.block p.location{font-size:1em;color:#555}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:1.3em;font-weight:bold;margin-bottom:.5em;padding-bottom:.2em;border-bottom:.2em solid #ddd}#resume-viewer div.blocks *{line-height:1.4em;}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><div id="section-toolbar" class="section-toolbar" style="display: none; width: 346px; margin-top: -28px; margin-right: 185px; right: 0px; left: 0px;"><button class="btn btn-mini btn-default edit">Edit</button><button class="btn btn-mini btn-default rename" style="display: none;">Edit Title</button><button class="btn btn-mini btn-default add-new" style="display: none;">Add Subsection</button><button class="btn btn-mini btn-default move-section" style="display: none;">Move</button><button class="btn btn-mini btn-default delete" style="display: none;"><i class="fa fa-trash-o"></i></button></div><table class="person"><tbody><tr><td class="firstname">Ben</td></tr><tr><td class="lastname">10</td></tr></tbody></table></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div class="html-content">ben10@gmail.com<br>8888888888</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p><div class="block-inner"></div></div><div class="block" data-category="text" data-children="" data-id="1" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></div></div>', 'Saved', '2016-10-25 06:02:52', 0, '0', '', '', '', 0),
(21, 67, 2, '<style>#resume-viewer table.person{margin-left:-0.3em}#resume-viewer td.firstname{font-size:3em;height:.5em;padding:0}#resume-viewer td.lastname{font-size:5em;height:1em;padding:.05em 0;line-height:1em}#resume-viewer div.block p{line-height:1.2em;margin:0 0 .6em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0 0 .2em}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0 0 .2em}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:.6em 0 .2em}#resume-viewer div.block p.location{font-size:1em;color:#555}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:1.3em;font-weight:bold;margin-bottom:.5em;padding-bottom:.2em;border-bottom:.2em solid #ddd}#resume-viewer div.blocks *{line-height:1.4em;}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><div id="section-toolbar" class="section-toolbar" style="display: none; width: 346px; margin-top: -28px; margin-right: 185px; right: 0px; left: 0px;"><button class="btn btn-mini btn-default edit">Edit</button><button class="btn btn-mini btn-default rename" style="display: none;">Edit Title</button><button class="btn btn-mini btn-default add-new" style="display: none;">Add Subsection</button><button class="btn btn-mini btn-default move-section" style="display: none;">Move</button><button class="btn btn-mini btn-default delete" style="display: none;"><i class="fa fa-trash-o"></i></button></div><table class="person"><tbody><tr><td class="firstname">Ben</td></tr><tr><td class="lastname">10</td></tr></tbody></table></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div class="html-content">ben10@gmail.com<br>8888888888</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p><div class="block-inner"></div></div><div class="block" data-category="text" data-children="" data-id="1" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></div></div>', 'Saved', '2016-10-25 07:32:03', 0, '0', '', '', '', 0),
(22, 67, 2, '<style>#resume-viewer table.person{margin-left:-0.3em}#resume-viewer td.firstname{font-size:3em;height:.5em;padding:0}#resume-viewer td.lastname{font-size:5em;height:1em;padding:.05em 0;line-height:1em}#resume-viewer div.block p{line-height:1.2em;margin:0 0 .6em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0 0 .2em}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0 0 .2em}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:.6em 0 .2em}#resume-viewer div.block p.location{font-size:1em;color:#555}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:1.3em;font-weight:bold;margin-bottom:.5em;padding-bottom:.2em;border-bottom:.2em solid #ddd}#resume-viewer div.blocks *{line-height:1.4em;}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><table class="person"><tbody><tr><td class="firstname">Ben</td></tr><tr><td class="lastname">10</td></tr></tbody></table></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div id="section-toolbar" class="section-toolbar" style="display: none; width: 182px; margin-top: -28px; margin-right: -6px; right: 0px; left: 355px;"><button class="btn btn-mini btn-default edit">Edit</button><button class="btn btn-mini btn-default rename" style="display: none;">Edit Title</button><button class="btn btn-mini btn-default add-new" style="display: none;">Add Subsection</button><button class="btn btn-mini btn-default move-section" style="display: none;">Move</button><button class="btn btn-mini btn-default delete" style="display: none;"><i class="fa fa-trash-o"></i></button></div><div class="html-content">ben10@gmail.com<br>888999999</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p><div class="block-inner"></div></div><div class="block" data-category="text" data-children="" data-id="1" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></div></div>', 'Saved', '2016-10-25 07:33:09', 0, '0', '', '', '', 0);
INSERT INTO `js_my_resumes` (`id`, `jsid`, `selected_template`, `resume_text`, `status`, `created_on`, `cwid`, `pdf_file`, `html_data`, `css_data`, `amount`, `jsread`) VALUES
(23, 58, 5, '<style>#resume-viewer div.block p{line-height:1.4em;margin:0 0 .6em}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0;line-height:1.2em;margin-top:-.2em;}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:0}#resume-viewer div.block p.location{font-size:1em;color:#555;margin:0}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:1.3em;font-weight:bold;margin:0 0 .5em 0;padding:0 .5em .1em;text-transform:uppercase;background:#ddd;border:1px solid #ddd;-moz-border-radius:0 0 1.3em 0;-webkit-border-radius:0 0 1.3em 0;border-radius:0 0 1.3em 0;border-bottom-right-radius:1.3em}#resume-viewer div.blocks{margin-top:1em}#resume-viewer div.block-inner{margin-left:2em}#resume-viewer td.block-title{width:50%;padding:0;border-top:.2em solid #ddd}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer table.wide.title{page-break-inside:avoid;page-break-after:avoid}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><div id="section-toolbar" class="section-toolbar" style="display: none; width: 346px; margin-top: -28px; margin-right: 185px; right: 0px; left: 0px;"><button class="btn btn-mini btn-default edit" style="display: inline-block;">Edit</button><button class="btn btn-mini btn-default rename" style="display: none;">Edit Title</button><button class="btn btn-mini btn-default add-new" style="display: none;">Add Subsection</button><button class="btn btn-mini btn-default move-section" style="display: none;">Move</button><button class="btn btn-mini btn-default delete" style="display: none;"><i class="fa fa-trash-o"></i></button></div><p class="person">Nagendra Prasad</p><p class="jobtitle">PHP Developer</p><p class="location">Huzurabad</p></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div class="html-content">naresh@gmail.com<br>7894561230</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><table class="wide title" cellspacing="0"><tbody><tr><td class="block-title"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p></td><td class="block-title"></td></tr></tbody></table><div class="block-inner"><div class="html-content">Object1</div></div></div><div class="block" data-category="experience" data-children="3" data-id="1" style="margin-bottom: 1em;"><table class="wide title" cellspacing="0"><tbody><tr><td class="block-title"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Work Experience</p></td><td class="block-title"></td></tr></tbody></table><div class="block-inner"><div class="child" data-id="1c0" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Bartronics India Ltd </span></p><p class="sub-dates">Jan 2011 â€“ Jan 2012</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="child" data-id="1c1" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Srisaas Technologies </span></p><p class="sub-dates">Jan 2012 â€“ Jan 2013</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="last-child" data-id="1c2" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">IQC </span></p><p class="sub-dates">Jan 2012 â€“ Feb 2015</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div></div></div><div class="block" data-category="education" data-children="3" data-id="2" style="margin-bottom: 1em;"><table class="wide title" cellspacing="0"><tbody><tr><td class="block-title"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Education</p></td><td class="block-title"></td></tr></tbody></table><div class="block-inner"><div class="child" data-id="2c0" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">SSC</p><p class="sub-where">Navabharathi Vidyalayam</p><p class="sub-dates">2004 â€“ 2005</p><div class="html-content"></div></div><div class="child" data-id="2c1" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Intermediate</p><p class="sub-where">kakatiya High School</p><p class="sub-dates">2005 â€“ 2007</p><div class="html-content"></div></div><div class="last-child" data-id="2c2" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Graduation</p><p class="sub-where">Vaageswari College Of Engineering</p><p class="sub-dates">2007 â€“ 2011</p><div class="html-content"></div></div></div></div><div class="block" data-category="text" data-children="" data-id="3" style="margin-bottom: 1em;"><table class="wide title" cellspacing="0"><tbody><tr><td class="block-title"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p></td><td class="block-title"></td></tr></tbody></table><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></div></div>', 'Saved', '2016-10-25 08:58:15', 0, '0', '0', '0', '', 1),
(24, 62, 5, '<style>#resume-viewer div.block p{line-height:1.4em;margin:0 0 .6em}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0;line-height:1.2em;margin-top:-.2em;}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:0}#resume-viewer div.block p.location{font-size:1em;color:#555;margin:0}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:1.3em;font-weight:bold;margin:0 0 .5em 0;padding:0 .5em .1em;text-transform:uppercase;background:#ddd;border:1px solid #ddd;-moz-border-radius:0 0 1.3em 0;-webkit-border-radius:0 0 1.3em 0;border-radius:0 0 1.3em 0;border-bottom-right-radius:1.3em}#resume-viewer div.blocks{margin-top:1em}#resume-viewer div.block-inner{margin-left:2em}#resume-viewer td.block-title{width:50%;padding:0;border-top:.2em solid #ddd}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer table.wide.title{page-break-inside:avoid;page-break-after:avoid}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><p class="person">Dinesh Yaganti</p><p class="jobtitle">Business Analyst</p><p class="location">Cumbum</p></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div class="html-content">dineshyaganti464@gmail.com<br>9676537345</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><table class="wide title" cellspacing="0"><tbody><tr><td class="block-title"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p></td><td class="block-title"></td></tr></tbody></table><div class="block-inner"><div class="html-content">Aim to work in a challenging work environment where I can utilize my expertise in resolving the problems in test-plans and advocate my analytical skills towards the growth of the organization.</div></div></div><div class="block" data-category="experience" data-children="2" data-id="1" style="margin-bottom: 1em;"><div id="section-toolbar" class="section-toolbar" style="display: none; width: 537px; margin-top: -28px; margin-right: -6px; right: 0px; left: 0px;"><button class="btn btn-mini btn-default edit" style="display: none;">Edit</button><button class="btn btn-mini btn-default rename">Edit Title</button><button class="btn btn-mini btn-default add-new">Add Subsection</button><button class="btn btn-mini btn-default move-section">Move</button><button class="btn btn-mini btn-default delete"><i class="fa fa-trash-o"></i></button></div><table class="wide title" cellspacing="0"><tbody><tr><td class="block-title"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Work Experience</p></td><td class="block-title"></td></tr></tbody></table><div class="block-inner"><div class="child" data-id="1c0" data-category="experience" style="margin-bottom: 1em;"><div id="subsection-toolbar" class="subsection-toolbar" style="display: none; top: 213.156px;"><button class="btn btn-mini btn-default edit">Edit</button><button class="btn btn-mini btn-default move-subsection">Move</button><button class="btn btn-mini btn-default delete"><i class="fa fa-trash-o"></i></button></div><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Virtuell Technologies </span></p><p class="sub-dates">Jun 2015 â€“ Oct 2016</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="last-child" data-id="1c1" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Virtuell Technologies </span></p><p class="sub-dates">Feb 2015 â€“ Oct 2016</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div></div></div><div class="block" data-category="education" data-children="2" data-id="2" style="margin-bottom: 1em;"><table class="wide title" cellspacing="0"><tbody><tr><td class="block-title"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Education</p></td><td class="block-title"></td></tr></tbody></table><div class="block-inner"><div class="child" data-id="2c0" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Graduation</p><p class="sub-where">Narsaraopet Engineering College</p><p class="sub-dates">2010 â€“ 2015</p><div class="html-content"></div></div><div class="last-child" data-id="2c1" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Intermediate</p><p class="sub-where">Sri Chaitanya junior college</p><p class="sub-dates">2008 â€“ 2010</p><div class="html-content"></div></div></div></div><div class="block" data-category="text" data-children="" data-id="3" style="margin-bottom: 1em;"><table class="wide title" cellspacing="0"><tbody><tr><td class="block-title"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p></td><td class="block-title"></td></tr></tbody></table><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></div></div>', 'Saved', '2016-10-25 10:01:57', 0, '0', '0', '0', '', 0),
(25, 58, 6, '<style>#resume-viewer div.block p{line-height:1.4em;margin:.5em 0 .6em}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer p.person{font-size:4em;margin-bottom:0;line-height:1.2em;margin-top:-.2em;}#resume-viewer  p.jobtitle{font-size:1.2em;margin:0}#resume-viewer p.location{font-size:1em;color:#555;margin:0}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:140%;font-weight:bold;margin:0 0 .5em 0;padding:.2em 0;text-transform:uppercase}#resume-viewer div.blocks{margin-top:1em}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}#resume-viewer td.left0{width:35%;vertical-align:top}#resume-viewer td.right0{width:65%;vertical-align:top}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><p class="person">Nagendra Prasad</p><p class="jobtitle">PHP Developer</p><p class="location">Huzurabad</p></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div class="html-content">naresh@gmail.com<br>7894561230</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><table class="wide"><tbody><tr><td class="left0"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p></td><td class="right0"><div class="block-inner"><div class="html-content">Object1</div></div></td></tr></tbody></table></div><div class="block" data-category="experience" data-children="3" data-id="1" style="margin-bottom: 1em;"><table class="wide"><tbody><tr><td class="left0"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Work Experience</p></td><td class="right0"><div class="block-inner"><div class="child" data-id="1c0" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Bartronics India Ltd </span></p><p class="sub-dates">Jan 2011 â€“ Jan 2012</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="child" data-id="1c1" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Srisaas Technologies </span></p><p class="sub-dates">Jan 2012 â€“ Jan 2013</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="last-child" data-id="1c2" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">IQC </span></p><p class="sub-dates">Jan 2012 â€“ Feb 2015</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div></div></td></tr></tbody></table></div><div class="block" data-category="education" data-children="3" data-id="2" style="margin-bottom: 1em;"><table class="wide"><tbody><tr><td class="left0"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Education</p></td><td class="right0"><div class="block-inner"><div class="child" data-id="2c0" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">SSC</p><p class="sub-where">Navabharathi Vidyalayam</p><p class="sub-dates">2004 â€“ 2005</p><div class="html-content"></div></div><div class="child" data-id="2c1" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Intermediate</p><p class="sub-where">kakatiya High School</p><p class="sub-dates">2005 â€“ 2007</p><div class="html-content"></div></div><div class="last-child" data-id="2c2" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Graduation</p><p class="sub-where">Vaageswari College Of Engineering</p><p class="sub-dates">2007 â€“ 2011</p><div class="html-content"></div></div></div></td></tr></tbody></table></div><div class="block" data-category="text" data-children="" data-id="3" style="margin-bottom: 1em;"><table class="wide"><tbody><tr><td class="left0"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p></td><td class="right0"><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></td></tr></tbody></table></div></div>', 'Saved', '2016-10-25 11:07:39', 0, '0', '0', '0', '', 1),
(26, 65, 3, '<style>#resume-viewer div.block p{line-height:1.4em;margin:0 0 .6em}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0;line-height:1.2em;margin-top:-.2em;}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:0}#resume-viewer div.block p.location{font-size:1em;color:#555;margin:0}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:1.3em;font-weight:bold;margin:0 0 .5em 0;padding:.2em;text-transform:uppercase;border-top:.2em dotted #aaa}#resume-viewer div.blocks{margin-top:1em}#resume-viewer div.block-inner{margin-left:2em}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><p class="person">Phani Sri Konte</p></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div id="section-toolbar" class="section-toolbar" style="display: none; width: 182px; margin-top: -28px; margin-right: -6px; right: 0px; left: 355px;"><button class="btn btn-mini btn-default edit">Edit</button><button class="btn btn-mini btn-default rename" style="display: none;">Edit Title</button><button class="btn btn-mini btn-default add-new" style="display: none;">Add Subsection</button><button class="btn btn-mini btn-default move-section" style="display: none;">Move</button><button class="btn btn-mini btn-default delete" style="display: none;"><i class="fa fa-trash-o"></i></button></div><div class="html-content">phanisri1@gmail.com<br>9998921389</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p><div class="block-inner"></div></div><div class="block" data-category="education" data-children="1" data-id="1" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Education</p><div class="block-inner"><div class="last-child" data-id="1c0" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Post Graduation</p><p class="sub-where">ljkaskdfjql</p><p class="sub-dates">2016 â€“ 2016</p><div class="html-content"></div></div></div></div><div class="block" data-category="text" data-children="" data-id="2" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></div></div>', 'Saved', '2016-10-25 11:48:01', 0, '0', '0', '0', '', 0),
(27, 62, 5, '<style>#resume-viewer div.block p{line-height:1.4em;margin:0 0 .6em}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0;line-height:1.2em;margin-top:-.2em;}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:0}#resume-viewer div.block p.location{font-size:1em;color:#555;margin:0}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:1.3em;font-weight:bold;margin:0 0 .5em 0;padding:0 .5em .1em;text-transform:uppercase;background:#ddd;border:1px solid #ddd;-moz-border-radius:0 0 1.3em 0;-webkit-border-radius:0 0 1.3em 0;border-radius:0 0 1.3em 0;border-bottom-right-radius:1.3em}#resume-viewer div.blocks{margin-top:1em}#resume-viewer div.block-inner{margin-left:2em}#resume-viewer td.block-title{width:50%;padding:0;border-top:.2em solid #ddd}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer table.wide.title{page-break-inside:avoid;page-break-after:avoid}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><div id="section-toolbar" class="section-toolbar" style="display: none; width: 346px; margin-top: -28px; margin-right: 185px; right: 0px; left: 0px;"><button class="btn btn-mini btn-default edit">Edit</button><button class="btn btn-mini btn-default rename" style="display: none;">Edit Title</button><button class="btn btn-mini btn-default add-new" style="display: none;">Add Subsection</button><button class="btn btn-mini btn-default move-section" style="display: none;">Move</button><button class="btn btn-mini btn-default delete" style="display: none;"><i class="fa fa-trash-o"></i></button></div><p class="person">Dinesh Yaganti</p><p class="jobtitle">Business Analyst</p><p class="location">Cumbum</p></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div class="html-content">dineshyaganti464@gmail.com<br>9676537345</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><table class="wide title" cellspacing="0"><tbody><tr><td class="block-title"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p></td><td class="block-title"></td></tr></tbody></table><div class="block-inner"><div class="html-content">Aim to work in a challenging work environment where I can utilize my expertise in resolving the problems in test-plans and advocate my analytical skills towards the growth of the organization.</div></div></div><div class="block" data-category="experience" data-children="2" data-id="1" style="margin-bottom: 1em;"><table class="wide title" cellspacing="0"><tbody><tr><td class="block-title"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Work Experience</p></td><td class="block-title"></td></tr></tbody></table><div class="block-inner"><div class="child" data-id="1c0" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Virtuell Technologies </span></p><p class="sub-dates">Jun 2015 â€“ Oct 2016</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="last-child" data-id="1c1" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Virtuell Technologies </span></p><p class="sub-dates">Feb 2015 â€“ Oct 2016</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div></div></div><div class="block" data-category="education" data-children="2" data-id="2" style="margin-bottom: 1em;"><table class="wide title" cellspacing="0"><tbody><tr><td class="block-title"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Education</p></td><td class="block-title"></td></tr></tbody></table><div class="block-inner"><div class="child" data-id="2c0" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Graduation</p><p class="sub-where">Narsaraopet Engineering College</p><p class="sub-dates">2010 â€“ 2015</p><div class="html-content"></div></div><div class="last-child" data-id="2c1" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Intermediate</p><p class="sub-where">Sri Chaitanya junior college</p><p class="sub-dates">2008 â€“ 2010</p><div class="html-content"></div></div></div></div><div class="block" data-category="text" data-children="" data-id="3" style="margin-bottom: 1em;"><table class="wide title" cellspacing="0"><tbody><tr><td class="block-title"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p></td><td class="block-title"></td></tr></tbody></table><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></div></div>', 'Saved', '2016-10-25 11:48:38', 0, '0', '0', '0', '', 0),
(28, 62, 5, '<style>#resume-viewer div.block p{line-height:1.4em;margin:0 0 .6em}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0;line-height:1.2em;margin-top:-.2em;}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:0}#resume-viewer div.block p.location{font-size:1em;color:#555;margin:0}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:1.3em;font-weight:bold;margin:0 0 .5em 0;padding:0 .5em .1em;text-transform:uppercase;background:#ddd;border:1px solid #ddd;-moz-border-radius:0 0 1.3em 0;-webkit-border-radius:0 0 1.3em 0;border-radius:0 0 1.3em 0;border-bottom-right-radius:1.3em}#resume-viewer div.blocks{margin-top:1em}#resume-viewer div.block-inner{margin-left:2em}#resume-viewer td.block-title{width:50%;padding:0;border-top:.2em solid #ddd}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer table.wide.title{page-break-inside:avoid;page-break-after:avoid}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><p class="person">Dinesh Yaganti</p><p class="jobtitle">Business Analyst</p><p class="location">Cumbum</p></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div id="section-toolbar" class="section-toolbar" style="display: none; width: 182px; margin-top: -28px; margin-right: -6px; right: 0px; left: 355px;"><button class="btn btn-mini btn-default edit" style="display: inline-block;">Edit</button><button class="btn btn-mini btn-default rename" style="display: none;">Edit Title</button><button class="btn btn-mini btn-default add-new" style="display: none;">Add Subsection</button><button class="btn btn-mini btn-default move-section" style="display: none;">Move</button><button class="btn btn-mini btn-default delete" style="display: none;"><i class="fa fa-trash-o"></i></button></div><div class="html-content">dineshyaganti464@gmail.com<br>9676537345</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><table class="wide title" cellspacing="0"><tbody><tr><td class="block-title"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p></td><td class="block-title"></td></tr></tbody></table><div class="block-inner"><div class="html-content">Aim to work in a challenging work environment where I can utilize my expertise in resolving the problems in test-plans and advocate my analytical skills towards the growth of the organization.</div></div></div><div class="block" data-category="experience" data-children="2" data-id="1" style="margin-bottom: 1em;"><table class="wide title" cellspacing="0"><tbody><tr><td class="block-title"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Work Experience</p></td><td class="block-title"></td></tr></tbody></table><div class="block-inner"><div class="child" data-id="1c0" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Virtuell Technologies </span></p><p class="sub-dates">Jun 2015 â€“ Oct 2016</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="last-child" data-id="1c1" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Virtuell Technologies </span></p><p class="sub-dates">Feb 2015 â€“ Oct 2016</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div></div></div><div class="block" data-category="education" data-children="2" data-id="2" style="margin-bottom: 1em;"><table class="wide title" cellspacing="0"><tbody><tr><td class="block-title"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Education</p></td><td class="block-title"></td></tr></tbody></table><div class="block-inner"><div class="child" data-id="2c0" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Graduation</p><p class="sub-where">Narsaraopet Engineering College</p><p class="sub-dates">2010 â€“ 2015</p><div class="html-content"></div></div><div class="last-child" data-id="2c1" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Intermediate</p><p class="sub-where">Sri Chaitanya junior college</p><p class="sub-dates">2008 â€“ 2010</p><div class="html-content"></div></div></div></div><div class="block" data-category="text" data-children="" data-id="3" style="margin-bottom: 1em;"><table class="wide title" cellspacing="0"><tbody><tr><td class="block-title"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p></td><td class="block-title"></td></tr></tbody></table><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></div></div>', 'Saved', '2016-10-25 11:50:43', 0, '0', '0', '0', '', 0),
(29, 62, 3, '<style>#resume-viewer div.block p{line-height:1.4em;margin:0 0 .6em}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0;line-height:1.2em;margin-top:-.2em;}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:0}#resume-viewer div.block p.location{font-size:1em;color:#555;margin:0}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:1.3em;font-weight:bold;margin:0 0 .5em 0;padding:.2em;text-transform:uppercase;border-top:.2em dotted #aaa}#resume-viewer div.blocks{margin-top:1em}#resume-viewer div.block-inner{margin-left:2em}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><p class="person">Dinesh Yaganti</p><p class="jobtitle">Business Analyst</p><p class="location">Cumbum</p></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div class="html-content">dineshyaganti464@gmail.com<br>9676537345</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p><div class="block-inner"><div class="html-content">Aim to work in a challenging work environment where I can utilize my expertise in resolving the problems in test-plans and advocate my analytical skills towards the growth of the organization.</div></div></div><div class="block" data-category="experience" data-children="2" data-id="1" style="margin-bottom: 1em;"><div id="section-toolbar" class="section-toolbar" style="display: none; width: 537px; margin-top: -28px; margin-right: -6px; right: 0px; left: 0px;"><button class="btn btn-mini btn-default edit" style="display: none;">Edit</button><button class="btn btn-mini btn-default rename">Edit Title</button><button class="btn btn-mini btn-default add-new">Add Subsection</button><button class="btn btn-mini btn-default move-section">Move</button><button class="btn btn-mini btn-default delete"><i class="fa fa-trash-o"></i></button></div><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Work Experience</p><div class="block-inner"><div class="child" data-id="1c0" data-category="experience" style="margin-bottom: 1em;"><div id="subsection-toolbar" class="subsection-toolbar" style="display: none; top: 217.906px;"><button class="btn btn-mini btn-default edit">Edit</button><button class="btn btn-mini btn-default move-subsection">Move</button><button class="btn btn-mini btn-default delete"><i class="fa fa-trash-o"></i></button></div><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Virtuell Technologies </span></p><p class="sub-dates">Jun 2015 â€“ Oct 2016</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="last-child" data-id="1c1" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Virtuell Technologies </span></p><p class="sub-dates">Feb 2015 â€“ Oct 2016</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div></div></div><div class="block" data-category="education" data-children="2" data-id="2" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Education</p><div class="block-inner"><div class="child" data-id="2c0" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Graduation</p><p class="sub-where">Narsaraopet Engineering College</p><p class="sub-dates">2010 â€“ 2015</p><div class="html-content"></div></div><div class="last-child" data-id="2c1" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Intermediate</p><p class="sub-where">Sri Chaitanya junior college</p><p class="sub-dates">2008 â€“ 2010</p><div class="html-content"></div></div></div></div><div class="block" data-category="text" data-children="" data-id="3" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></div></div>', 'Saved', '2016-10-25 11:50:50', 0, '0', '0', '0', '', 0),
(30, 62, 6, '<style>#resume-viewer div.block p{line-height:1.4em;margin:.5em 0 .6em}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0;line-height:1.2em;margin-top:-.2em;}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:0}#resume-viewer div.block p.location{font-size:1em;color:#555;margin:0}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:140%;font-weight:bold;margin:0 0 .5em 0;padding:.2em 0;text-transform:uppercase}#resume-viewer div.blocks{margin-top:1em}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}#resume-viewer td.left0{width:35%;vertical-align:top}#resume-viewer td.right0{width:65%;vertical-align:top}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><p class="person">Dinesh Yaganti</p><p class="jobtitle">Business Analyst</p><p class="location">Cumbum</p></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div id="section-toolbar" class="section-toolbar" style="display: none; width: 182px; margin-top: -28px; margin-right: -6px; right: 0px; left: 355px;"><button class="btn btn-mini btn-default edit">Edit</button><button class="btn btn-mini btn-default rename" style="display: none;">Edit Title</button><button class="btn btn-mini btn-default add-new" style="display: none;">Add Subsection</button><button class="btn btn-mini btn-default move-section" style="display: none;">Move</button><button class="btn btn-mini btn-default delete" style="display: none;"><i class="fa fa-trash-o"></i></button></div><div class="html-content">dineshyaganti464@gmail.com<br>9676537345</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><table class="wide"><tbody><tr><td class="left0"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p></td><td class="right0"><div class="block-inner"><div class="html-content">Aim to work in a challenging work environment where I can utilize my expertise in resolving the problems in test-plans and advocate my analytical skills towards the growth of the organization.</div></div></td></tr></tbody></table></div><div class="block" data-category="experience" data-children="2" data-id="1" style="margin-bottom: 1em;"><table class="wide"><tbody><tr><td class="left0"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Work Experience</p></td><td class="right0"><div class="block-inner"><div class="child" data-id="1c0" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Virtuell Technologies </span></p><p class="sub-dates">Jun 2015 â€“ Oct 2016</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="last-child" data-id="1c1" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Virtuell Technologies </span></p><p class="sub-dates">Feb 2015 â€“ Oct 2016</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div></div></td></tr></tbody></table></div><div class="block" data-category="education" data-children="2" data-id="2" style="margin-bottom: 1em;"><table class="wide"><tbody><tr><td class="left0"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Education</p></td><td class="right0"><div class="block-inner"><div class="child" data-id="2c0" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Graduation</p><p class="sub-where">Narsaraopet Engineering College</p><p class="sub-dates">2010 â€“ 2015</p><div class="html-content"></div></div><div class="last-child" data-id="2c1" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Intermediate</p><p class="sub-where">Sri Chaitanya junior college</p><p class="sub-dates">2008 â€“ 2010</p><div class="html-content"></div></div></div></td></tr></tbody></table></div><div class="block" data-category="text" data-children="" data-id="3" style="margin-bottom: 1em;"><table class="wide"><tbody><tr><td class="left0"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p></td><td class="right0"><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></td></tr></tbody></table></div></div>', 'Saved', '2016-10-25 11:51:28', 0, '0', '0', '0', '', 0);
INSERT INTO `js_my_resumes` (`id`, `jsid`, `selected_template`, `resume_text`, `status`, `created_on`, `cwid`, `pdf_file`, `html_data`, `css_data`, `amount`, `jsread`) VALUES
(31, 62, 3, '<style>#resume-viewer div.block p{line-height:1.4em;margin:0 0 .6em}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0;line-height:1.2em;margin-top:-.2em;}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:0}#resume-viewer div.block p.location{font-size:1em;color:#555;margin:0}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:1.3em;font-weight:bold;margin:0 0 .5em 0;padding:.2em;text-transform:uppercase;border-top:.2em dotted #aaa}#resume-viewer div.blocks{margin-top:1em}#resume-viewer div.block-inner{margin-left:2em}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><p class="person">Dinesh Yaganti</p><p class="jobtitle">Business Analyst</p><p class="location">Cumbum</p></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div class="html-content">naresh@gmail.com<br>7894561230</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><div id="section-toolbar" class="section-toolbar" style="display: none; width: 537px; margin-top: -28px; margin-right: -6px; right: 0px; left: 0px;"><button class="btn btn-mini btn-default edit" style="display: inline-block;">Edit</button><button class="btn btn-mini btn-default rename" style="display: none;">Edit Title</button><button class="btn btn-mini btn-default add-new" style="display: none;">Add Subsection</button><button class="btn btn-mini btn-default move-section" style="display: inline-block;">Move</button><button class="btn btn-mini btn-default delete" style="display: inline-block;"><i class="fa fa-trash-o"></i></button></div><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p><div class="block-inner"><div class="html-content">Object1</div></div></div><div class="block" data-category="experience" data-children="3" data-id="1" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Work Experience</p><div class="block-inner"><div class="child" data-id="1c0" data-category="experience" style="margin-bottom: 1em;"><div id="subsection-toolbar" class="subsection-toolbar" style="display: none; top: 202.906px;"><button class="btn btn-mini btn-default edit">Edit</button><button class="btn btn-mini btn-default move-subsection">Move</button><button class="btn btn-mini btn-default delete"><i class="fa fa-trash-o"></i></button></div><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">bat India Ltd </span></p><p class="sub-dates">Jan 2011 â€“ Jan 2012</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="child" data-id="1c1" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> kuyfkjgjhgjh</p><p class="sub-where"><span class="company">Srisaas Technologies </span>, ljkgkukhkj</p><p class="sub-dates">Jan 2012 â€“ Jan 2013</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.<div><br></div><div>mgbcmgvhjghjb</div></div></div><div class="last-child" data-id="1c2" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">IQC </span></p><p class="sub-dates">Jan 2012 â€“ Feb 2015</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div></div></div><div class="block" data-category="education" data-children="3" data-id="2" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Education1</p><div class="block-inner"><div class="child" data-id="2c0" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">SSC</p><p class="sub-where">Navabharathi Vidyalayam1</p><p class="sub-dates">2004 â€“ 2005</p><div class="html-content"></div></div><div class="child" data-id="2c1" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Intermediate</p><p class="sub-where">kakatiya High School</p><p class="sub-dates">2005 â€“ 2007</p><div class="html-content"></div></div><div class="last-child" data-id="2c2" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Graduation</p><p class="sub-where">Vaageswari College Of Engineering</p><p class="sub-dates">2007 â€“ 2011</p><div class="html-content"></div></div></div></div><div class="block" data-category="text" data-children="" data-id="3" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></div></div>', 'Saved', '2016-10-25 11:56:33', 0, '0', '<table class="wide"><tr><td class="left"><div class="block person" data-category="person"><p class="person">Dinesh Yaganti</p><p class="jobtitle">Business Analyst</p><p class="location">Cumbum</p></div></td><td class="right"><div class="block contact" data-category="contact"><div class="html-content">naresh@gmail.com<br/>7894561230</div></div></td></tr></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0"><p class="title">Summary</p><div class="block-inner"><div class="html-content">Object1</div></div></div><div class="block" data-category="experience" data-children="3" data-id="1"><p class="title">Work Experience</p><div class="block-inner"><div class="child" data-id="1c0" data-category="experience"><p class="sub-title"> </p><p class="sub-where"><span class="company">bat India Ltd </p><p class="sub-dates">Jan 2011 â€“ Jan 2012</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="child" data-id="1c1" data-category="experience"><p class="sub-title"> kuyfkjgjhgjh</p><p class="sub-where"><span class="company">Srisaas Technologies </span>, ljkgkukhkj</p><p class="sub-dates">Jan 2012 â€“ Jan 2013</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.<div><br></div><div>mgbcmgvhjghjb</div></div></div><div class="last-child" data-id="1c2" data-category="experience"><p class="sub-title"> </p><p class="sub-where"><span class="company">IQC </p><p class="sub-dates">Jan 2012 â€“ Feb 2015</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div></div></div><div class="block" data-category="education" data-children="3" data-id="2"><p class="title">Education1</p><div class="block-inner"><div class="child" data-id="2c0" data-category="education"><p class="sub-title">SSC</p><p class="sub-where">Navabharathi Vidyalayam1</p><p class="sub-dates">2004 â€“ 2005</p><div class="html-content"></div></div><div class="child" data-id="2c1" data-category="education"><p class="sub-title">Intermediate</p><p class="sub-where">kakatiya High School</p><p class="sub-dates">2005 â€“ 2007</p><div class="html-content"></div></div><div class="last-child" data-id="2c2" data-category="education"><p class="sub-title">Graduation</p><p class="sub-where">Vaageswari College Of Engineering</p><p class="sub-dates">2007 â€“ 2011</p><div class="html-content"></div></div></div></div><div class="block" data-category="text" data-children="" data-id="3"><p class="title">Additional Information</p><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></div></div>', '#resume-viewer div.block p{line-height:1.4em;margin:0 0 .6em}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0;line-height:1.2em;margin-top:-.2em;}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:0}#resume-viewer div.block p.location{font-size:1em;color:#555;margin:0}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:1.3em;font-weight:bold;margin:0 0 .5em 0;padding:.2em;text-transform:uppercase;border-top:.2em dotted #aaa}#resume-viewer div.blocks{margin-top:1em}#resume-viewer div.block-inner{margin-left:2em}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}', '', 0),
(32, 65, 3, '<style>#resume-viewer div.block p{line-height:1.4em;margin:0 0 .6em}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0;line-height:1.2em;margin-top:-.2em;}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:0}#resume-viewer div.block p.location{font-size:1em;color:#555;margin:0}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:1.3em;font-weight:bold;margin:0 0 .5em 0;padding:.2em;text-transform:uppercase;border-top:.2em dotted #aaa}#resume-viewer div.blocks{margin-top:1em}#resume-viewer div.block-inner{margin-left:2em}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><p class="person">Phani Sri Konte</p></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div class="html-content">phanisri1@gmail.com<br>9998921389</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><div id="section-toolbar" class="section-toolbar" style="display: none; width: 537px; margin-top: -28px; margin-right: -6px; right: 0px; left: 0px;"><button class="btn btn-mini btn-default edit" style="display: inline-block;">Edit</button><button class="btn btn-mini btn-default rename" style="display: none;">Edit Title</button><button class="btn btn-mini btn-default add-new" style="display: none;">Add Subsection</button><button class="btn btn-mini btn-default move-section">Move</button><button class="btn btn-mini btn-default delete"><i class="fa fa-trash-o"></i></button></div><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p><div class="block-inner"></div></div><div class="block" data-category="education" data-children="1" data-id="1" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Education</p><div class="block-inner"><div class="last-child" data-id="1c0" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Post Graduation</p><p class="sub-where">ljkaskdfjql</p><p class="sub-dates">2016 â€“ 2016</p><div class="html-content"></div></div></div></div><div class="block" data-category="text" data-children="" data-id="2" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></div></div>', 'Saved', '2016-10-25 12:01:18', 0, '0', '0', '0', '', 0),
(33, 62, 3, '<style>#resume-viewer div.block p{line-height:1.4em;margin:0 0 .6em}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0;line-height:1.2em;margin-top:-.2em;}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:0}#resume-viewer div.block p.location{font-size:1em;color:#555;margin:0}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:1.3em;font-weight:bold;margin:0 0 .5em 0;padding:.2em;text-transform:uppercase;border-top:.2em dotted #aaa}#resume-viewer div.blocks{margin-top:1em}#resume-viewer div.block-inner{margin-left:2em}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><div id="section-toolbar" class="section-toolbar" style="display: none; width: 346px; margin-top: -28px; margin-right: 185px; right: 0px; left: 0px;"><button class="btn btn-mini btn-default edit" style="display: inline-block;">Edit</button><button class="btn btn-mini btn-default rename" style="display: none;">Edit Title</button><button class="btn btn-mini btn-default add-new" style="display: none;">Add Subsection</button><button class="btn btn-mini btn-default move-section" style="display: none;">Move</button><button class="btn btn-mini btn-default delete" style="display: none;"><i class="fa fa-trash-o"></i></button></div><p class="person">Dinesh Yaganti</p><p class="jobtitle">Business Analyst</p><p class="location">Cumbum</p></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div class="html-content">dineshyaganti464@gmail.com<br>9676537345</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p><div class="block-inner"><div class="html-content">Aim to work in a challenging work environment where I can utilize my expertise in resolving the problems in test-plans and advocate my analytical skills towards the growth of the organization.</div></div></div><div class="block" data-category="experience" data-children="2" data-id="1" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Work Experience</p><div class="block-inner"><div class="child" data-id="1c0" data-category="experience" style="margin-bottom: 1em;"><div id="subsection-toolbar" class="subsection-toolbar" style="display: none; top: 217.906px;"><button class="btn btn-mini btn-default edit">Edit</button><button class="btn btn-mini btn-default move-subsection">Move</button><button class="btn btn-mini btn-default delete"><i class="fa fa-trash-o"></i></button></div><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Virtuell Technologies </span></p><p class="sub-dates">Jun 2015 â€“ Oct 2016</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="last-child" data-id="1c1" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Virtuell Technologies </span></p><p class="sub-dates">Feb 2015 â€“ Oct 2016</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div></div></div><div class="block" data-category="education" data-children="2" data-id="2" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Education</p><div class="block-inner"><div class="child" data-id="2c0" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Graduation</p><p class="sub-where">Narsaraopet Engineering College</p><p class="sub-dates">2010 â€“ 2015</p><div class="html-content"></div></div><div class="last-child" data-id="2c1" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Intermediate</p><p class="sub-where">Sri Chaitanya junior college</p><p class="sub-dates">2008 â€“ 2010</p><div class="html-content"></div></div></div></div><div class="block" data-category="text" data-children="" data-id="3" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></div></div>', 'Saved', '2016-10-25 12:54:19', 0, '0', '0', '0', '', 0),
(34, 65, 3, '<style>#resume-viewer div.block p{line-height:1.4em;margin:0 0 .6em}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0;line-height:1.2em;margin-top:-.2em;}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:0}#resume-viewer div.block p.location{font-size:1em;color:#555;margin:0}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:1.3em;font-weight:bold;margin:0 0 .5em 0;padding:.2em;text-transform:uppercase;border-top:.2em dotted #aaa}#resume-viewer div.blocks{margin-top:1em}#resume-viewer div.block-inner{margin-left:2em}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><p class="person">Phani Sri Konte</p></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div class="html-content">phanisri1@gmail.com<br>9998921389</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><div id="section-toolbar" class="section-toolbar" style="display: none; width: 537px; margin-top: -28px; margin-right: -6px; right: 0px; left: 0px;"><button class="btn btn-mini btn-default edit" style="display: inline-block;">Edit</button><button class="btn btn-mini btn-default rename" style="display: none;">Edit Title</button><button class="btn btn-mini btn-default add-new" style="display: none;">Add Subsection</button><button class="btn btn-mini btn-default move-section">Move</button><button class="btn btn-mini btn-default delete"><i class="fa fa-trash-o"></i></button></div><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p><div class="block-inner"></div></div><div class="block" data-category="education" data-children="1" data-id="1" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Education</p><div class="block-inner"><div class="last-child" data-id="1c0" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Post Graduation</p><p class="sub-where">ljkaskdfjql</p><p class="sub-dates">2016 â€“ 2016</p><div class="html-content"></div></div></div></div><div class="block" data-category="text" data-children="" data-id="2" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></div></div>', 'Saved', '2016-10-25 14:14:20', 0, '0', '0', '0', '', 0),
(35, 65, 3, '<style>#resume-viewer div.block p{line-height:1.4em;margin:0 0 .6em}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0;line-height:1.2em;margin-top:-.2em;}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:0}#resume-viewer div.block p.location{font-size:1em;color:#555;margin:0}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:1.3em;font-weight:bold;margin:0 0 .5em 0;padding:.2em;text-transform:uppercase;border-top:.2em dotted #aaa}#resume-viewer div.blocks{margin-top:1em}#resume-viewer div.block-inner{margin-left:2em}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><div id="section-toolbar" class="section-toolbar" style="display: none; width: 346px; margin-top: -28px; margin-right: 185px; right: 0px; left: 0px;"><button class="btn btn-mini btn-default edit">Edit</button><button class="btn btn-mini btn-default rename" style="display: none;">Edit Title</button><button class="btn btn-mini btn-default add-new" style="display: none;">Add Subsection</button><button class="btn btn-mini btn-default move-section" style="display: none;">Move</button><button class="btn btn-mini btn-default delete" style="display: none;"><i class="fa fa-trash-o"></i></button></div><p class="person">Phani Sri Konte</p></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div class="html-content">phanisri1@gmail.com<br>9998921389</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p><div class="block-inner"></div></div><div class="block" data-category="education" data-children="1" data-id="1" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Education</p><div class="block-inner"><div class="last-child" data-id="1c0" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Post Graduation</p><p class="sub-where">ljkaskdfjql</p><p class="sub-dates">2016 â€“ 2016</p><div class="html-content"></div></div></div></div><div class="block" data-category="text" data-children="" data-id="2" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></div></div>', 'Saved', '2016-10-25 17:51:49', 0, '0', '0', '0', 'paid', 0),
(36, 65, 2, '<style>#resume-viewer table.person{margin-left:-0.3em}#resume-viewer td.firstname{font-size:3em;height:.5em;padding:0}#resume-viewer td.lastname{font-size:5em;height:1em;padding:.05em 0;line-height:1em}#resume-viewer div.block p{line-height:1.2em;margin:0 0 .6em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0 0 .2em}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0 0 .2em}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:.6em 0 .2em}#resume-viewer div.block p.location{font-size:1em;color:#555}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:1.3em;font-weight:bold;margin-bottom:.5em;padding-bottom:.2em;border-bottom:.2em solid #ddd}#resume-viewer div.blocks *{line-height:1.4em;}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><table class="person"><tbody><tr><td class="firstname">Phani Sri</td></tr><tr><td class="lastname">Konte</td></tr></tbody></table></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div class="html-content">phanisri1@gmail.com<br>9998921389</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p><div class="block-inner"></div></div><div class="block" data-category="education" data-children="1" data-id="1" style="margin-bottom: 1em;"><div id="section-toolbar" class="section-toolbar" style="display: none; width: 537px; margin-top: -28px; margin-right: -6px; right: 0px; left: 0px;"><button class="btn btn-mini btn-default edit" style="display: none;">Edit</button><button class="btn btn-mini btn-default rename">Edit Title</button><button class="btn btn-mini btn-default add-new">Add Subsection</button><button class="btn btn-mini btn-default move-section">Move</button><button class="btn btn-mini btn-default delete"><i class="fa fa-trash-o"></i></button></div><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Education</p><div class="block-inner"><div class="last-child" data-id="1c0" data-category="education" style="margin-bottom: 1em;"><div id="subsection-toolbar" class="subsection-toolbar" style="display: none; top: 166.828px;"><button class="btn btn-mini btn-default edit">Edit</button><button class="btn btn-mini btn-default move-subsection">Move</button><button class="btn btn-mini btn-default delete"><i class="fa fa-trash-o"></i></button></div><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Post Graduation</p><p class="sub-where">ljkaskdfjql</p><p class="sub-dates">2016 â€“ 2016</p><div class="html-content"></div></div></div></div><div class="block" data-category="text" data-children="" data-id="2" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></div></div>', 'Saved', '2016-10-25 20:18:52', 0, '0', '0', '0', '', 0),
(37, 65, 2, '<style>#resume-viewer table.person{margin-left:-0.3em}#resume-viewer td.firstname{font-size:3em;height:.5em;padding:0}#resume-viewer td.lastname{font-size:5em;height:1em;padding:.05em 0;line-height:1em}#resume-viewer div.block p{line-height:1.2em;margin:0 0 .6em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0 0 .2em}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0 0 .2em}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:.6em 0 .2em}#resume-viewer div.block p.location{font-size:1em;color:#555}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:1.3em;font-weight:bold;margin-bottom:.5em;padding-bottom:.2em;border-bottom:.2em solid #ddd}#resume-viewer div.blocks *{line-height:1.4em;}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><table class="person"><tbody><tr><td class="firstname">Phani Sri</td></tr><tr><td class="lastname">Konte</td></tr></tbody></table></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div id="section-toolbar" class="section-toolbar" style="display: none; width: 182px; margin-top: -28px; margin-right: -6px; right: 0px; left: 355px;"><button class="btn btn-mini btn-default edit" style="display: inline-block;">Edit</button><button class="btn btn-mini btn-default rename" style="display: none;">Edit Title</button><button class="btn btn-mini btn-default add-new" style="display: none;">Add Subsection</button><button class="btn btn-mini btn-default move-section" style="display: none;">Move</button><button class="btn btn-mini btn-default delete" style="display: none;"><i class="fa fa-trash-o"></i></button></div><div class="html-content">phanisri1@gmail.com<br>9998921389</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p><div class="block-inner"></div></div><div class="block" data-category="education" data-children="1" data-id="1" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Education</p><div class="block-inner"><div class="last-child" data-id="1c0" data-category="education" style="margin-bottom: 1em;"><div id="subsection-toolbar" class="subsection-toolbar" style="display: none; top: 166.828px;"><button class="btn btn-mini btn-default edit">Edit</button><button class="btn btn-mini btn-default move-subsection">Move</button><button class="btn btn-mini btn-default delete"><i class="fa fa-trash-o"></i></button></div><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Post Graduation</p><p class="sub-where">ljkaskdfjql</p><p class="sub-dates">2016 â€“ 2016</p><div class="html-content"></div></div></div></div><div class="block" data-category="text" data-children="" data-id="2" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></div></div>', 'Saved', '2016-10-26 02:16:03', 0, '0', '0', '0', '', 0),
(39, 62, 6, '<style>#resume-viewer div.block p{line-height:1.4em;margin:.5em 0 .6em}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0;line-height:1.2em;margin-top:-.2em;}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:0}#resume-viewer div.block p.location{font-size:1em;color:#555;margin:0}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:140%;font-weight:bold;margin:0 0 .5em 0;padding:.2em 0;text-transform:uppercase}#resume-viewer div.blocks{margin-top:1em}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}#resume-viewer td.left0{width:35%;vertical-align:top}#resume-viewer td.right0{width:65%;vertical-align:top}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><p class="person">Dinesh Yaganti</p><p class="jobtitle">Business Analyst</p><p class="location">Cumbum</p></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div class="html-content">dineshyaganti464@gmail.com<br>9676537345</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><div id="section-toolbar" class="section-toolbar" style="display: none; width: 537px; margin-top: -28px; margin-right: -6px; right: 0px; left: 0px;"><button class="btn btn-mini btn-default edit" style="display: inline-block;">Edit</button><button class="btn btn-mini btn-default rename" style="display: none;">Edit Title</button><button class="btn btn-mini btn-default add-new" style="display: none;">Add Subsection</button><button class="btn btn-mini btn-default move-section">Move</button><button class="btn btn-mini btn-default delete"><i class="fa fa-trash-o"></i></button></div><table class="wide"><tbody><tr><td class="left0"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p></td><td class="right0"><div class="block-inner"><div class="html-content">Aim to work in a challenging work environment where I can utilize my expertise in resolving the problems in test-plans and advocate my analytical skills towards the growth of the organization.</div></div></td></tr></tbody></table></div><div class="block" data-category="experience" data-children="2" data-id="1" style="margin-bottom: 1em;"><table class="wide"><tbody><tr><td class="left0"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Work Experience</p></td><td class="right0"><div class="block-inner"><div class="child" data-id="1c0" data-category="experience" style="margin-bottom: 1em;"><div id="subsection-toolbar" class="subsection-toolbar" style="display: none; top: 166.156px;"><button class="btn btn-mini btn-default edit">Edit</button><button class="btn btn-mini btn-default move-subsection">Move</button><button class="btn btn-mini btn-default delete"><i class="fa fa-trash-o"></i></button></div><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Virtuell Technologies </span></p><p class="sub-dates">Jun 2015 â€“ Oct 2016</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="last-child" data-id="1c1" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Virtuell Technologies </span></p><p class="sub-dates">Feb 2015 â€“ Oct 2016</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div></div></td></tr></tbody></table></div><div class="block" data-category="education" data-children="2" data-id="2" style="margin-bottom: 1em;"><table class="wide"><tbody><tr><td class="left0"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Education</p></td><td class="right0"><div class="block-inner"><div class="child" data-id="2c0" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Graduation</p><p class="sub-where">Narsaraopet Engineering College</p><p class="sub-dates">2010 â€“ 2015</p><div class="html-content"></div></div><div class="last-child" data-id="2c1" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Intermediate</p><p class="sub-where">Sri Chaitanya junior college</p><p class="sub-dates">2008 â€“ 2010</p><div class="html-content"></div></div></div></td></tr></tbody></table></div><div class="block" data-category="text" data-children="" data-id="3" style="margin-bottom: 1em;"><table class="wide"><tbody><tr><td class="left0"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p></td><td class="right0"><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></td></tr></tbody></table></div></div>', 'Saved', '2016-10-26 03:42:44', 0, '0', '0', '0', '', 0),
(40, 58, 4, '<style>#resume-viewer div.block p{line-height:1.4em;margin:0 0 .6em}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block p.person{font-size:4em;margin-bottom:0;line-height:1.2em;margin-top:-.2em;}#resume-viewer div.block p.jobtitle{font-size:1.2em;margin:0}#resume-viewer div.block p.location{font-size:1em;color:#555;margin:0}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:1.3em;font-weight:bold;margin:0 0 .5em 0;padding:0 .5em .1em;text-transform:uppercase;background:#ddd;border:1px solid #ddd;-moz-border-radius:0 0 1.3em 0;-webkit-border-radius:0 0 1.3em 0;border-radius:0 0 1.3em 0;border-bottom-right-radius:1.3em}#resume-viewer div.blocks{margin-top:1em}#resume-viewer div.block-inner{margin-left:2em}#resume-viewer td.block-title{width:50%;padding:0;border-top:.2em solid #ddd}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer table.wide.title{page-break-inside:avoid;page-break-after:avoid}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><p class="person">Phani Sri Konte</p></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div id="section-toolbar" class="section-toolbar" style="display: none; width: 182px; margin-top: -28px; margin-right: -6px; right: 0px; left: 355px;"><button class="btn btn-mini btn-default edit" style="display: inline-block;">Edit</button><button class="btn btn-mini btn-default rename" style="display: none;">Edit Title</button><button class="btn btn-mini btn-default add-new" style="display: none;">Add Subsection</button><button class="btn btn-mini btn-default move-section" style="display: none;">Move</button><button class="btn btn-mini btn-default delete" style="display: none;"><i class="fa fa-trash-o"></i></button></div><div class="html-content">phanisri1@gmail.com<br>9998921389</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><table class="wide title" cellspacing="0"><tbody><tr><td class="block-title"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p></td><td class="block-title"></td></tr></tbody></table><div class="block-inner"></div></div><div class="block" data-category="education" data-children="1" data-id="1" style="margin-bottom: 1em;"><table class="wide title" cellspacing="0"><tbody><tr><td class="block-title"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Education</p></td><td class="block-title"></td></tr></tbody></table><div class="block-inner"><div class="last-child" data-id="1c0" data-category="education" style="margin-bottom: 1em;"><div id="subsection-toolbar" class="subsection-toolbar" style="display: none; top: 152.156px;"><button class="btn btn-mini btn-default edit">Edit</button><button class="btn btn-mini btn-default move-subsection">Move</button><button class="btn btn-mini btn-default delete"><i class="fa fa-trash-o"></i></button></div><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Post Graduation</p><p class="sub-where">ljkaskdfjql</p><p class="sub-dates">2016 – 2016</p><div class="html-content"></div></div></div></div><div class="block" data-category="text" data-children="" data-id="2" style="margin-bottom: 1em;"><table class="wide title" cellspacing="0"><tbody><tr><td class="block-title"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p></td><td class="block-title"></td></tr></tbody></table><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></div></div>', 'Saved', '2016-10-26 06:23:15', 8, '0', '0', '0', 'paid', 1),
(41, 58, 2, '<style>#resume-viewer table.person{margin-left:-0.3em}#resume-viewer td.firstname{font-size:3em;height:.5em;padding:0}#resume-viewer td.lastname{font-size:5em;height:1em;padding:.05em 0;line-height:1em}#resume-viewer div.block p{line-height:1.2em;margin:0 0 .6em}#resume-viewer div.block.person p.person{font-size:4em;margin-bottom:0}#resume-viewer div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0 0 .2em}#resume-viewer div.block p.sub-where{font-size:1.1em;margin:0 0 .2em}#resume-viewer div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}#resume-viewer div.block.person p.jobtitle{font-size:1.2em;margin:.6em 0 .2em}#resume-viewer div.block.person p.location{font-size:1em;color:#555}#resume-viewer div.block span.company{color:#555;font-weight:bold}#resume-viewer div.block p.title{font-size:1.3em;font-weight:bold;margin-bottom:.5em;padding-bottom:.2em;border-bottom:.2em solid #ddd}#resume-viewer div.blocks *{line-height:1.4em;}#resume-viewer table.wide{width:100%;border-collapse:collapse}#resume-viewer td.left{width:65%;vertical-align:top}#resume-viewer td.right{width:35%;vertical-align:top;text-align:right}</style><table class="wide"><tbody><tr><td class="left"><div class="block person" data-category="person" style="font-family: &quot;Roboto Condensed&quot;; margin-bottom: 1em;"><table class="person"><tbody><tr><td class="firstname">Nagendra</td></tr><tr><td class="lastname">Prasad</td></tr></tbody></table><p class="jobtitle">PHP Developer</p><p class="location">Huzurabad</p></div></td><td class="right"><div class="block contact" data-category="contact" style="margin-bottom: 1em;"><div id="section-toolbar" class="section-toolbar" style="display: none; width: 180px; margin-top: -28px; margin-right: -5px; right: 0px; left: 356px;"><button class="btn btn-mini btn-default edit" style="display: inline-block;">Edit</button><button class="btn btn-mini btn-default rename" style="display: none;">Edit Title</button><button class="btn btn-mini btn-default add-new" style="display: none;">Add Subsection</button><button class="btn btn-mini btn-default move-section" style="display: none;">Move</button><button class="btn btn-mini btn-default delete" style="display: none;"><i class="fa fa-trash-o"></i></button></div><div class="html-content">naresh@gmail.com<br>7894561230</div></div></td></tr></tbody></table><div class="blocks"><div class="block" data-category="text" data-children="" data-id="0" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Summary</p><div class="block-inner"><div class="html-content">Object1</div></div></div><div class="block" data-category="experience" data-children="3" data-id="1" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Work Experience</p><div class="block-inner"><div class="child" data-id="1c0" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Bartronics India Ltd </span></p><p class="sub-dates">Jan 2011 â€“ Jan 2012</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="child" data-id="1c1" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">Srisaas Technologies </span></p><p class="sub-dates">Jan 2012 â€“ Jan 2013</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div><div class="last-child" data-id="1c2" data-category="experience" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;"> </p><p class="sub-where"><span class="company">IQC </span></p><p class="sub-dates">Jan 2012 â€“ Feb 2015</p><div class="html-content">Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</div></div></div></div><div class="block" data-category="education" data-children="3" data-id="2" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Education</p><div class="block-inner"><div class="child" data-id="2c0" data-category="education" style="margin-bottom: 1em;"><div id="subsection-toolbar" class="subsection-toolbar" style="display: none; top: 517.188px;"><button class="btn btn-mini btn-default edit">Edit</button><button class="btn btn-mini btn-default move-subsection">Move</button><button class="btn btn-mini btn-default delete"><i class="fa fa-trash-o"></i></button></div><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">SSC</p><p class="sub-where">Navabharathi Vidyalayam</p><p class="sub-dates">2004 â€“ 2005</p><div class="html-content"></div></div><div class="child" data-id="2c1" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Intermediate</p><p class="sub-where">kakatiya High School</p><p class="sub-dates">2005 â€“ 2007</p><div class="html-content"></div></div><div class="last-child" data-id="2c2" data-category="education" style="margin-bottom: 1em;"><p class="sub-title" style="font-family: &quot;Roboto Condensed&quot;;">Graduation</p><p class="sub-where">Vaageswari College Of Engineering</p><p class="sub-dates">2007 â€“ 2011</p><div class="html-content"></div></div></div></div><div class="block" data-category="text" data-children="" data-id="3" style="margin-bottom: 1em;"><p class="title" style="font-family: &quot;Roboto Condensed&quot;;">Additional Information</p><div class="block-inner"><div class="html-content">Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</div></div></div></div>', 'Saved', '2016-11-05 12:17:01', 0, '0', '0', '0', '', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=158 ;

--
-- Dumping data for table `js_skills`
--

INSERT INTO `js_skills` (`js_skills_id`, `js_skill_description`, `job_seeker_id`, `inserted_by`, `inserted_date`, `updated_by`, `updated_time`) VALUES
(5, 'PHP,Mysql,Html', 27, NULL, NULL, NULL, NULL),
(6, '                ZZZZZZZZZZZZZZZZZZZ                                                                                                                                                ', 42, NULL, NULL, NULL, NULL),
(7, '                              lskdjfakjfkjfkj\r\na;lksdjfklsdjfkljasdf\r\na;lksdjfaklsdf                                                  ', 49, NULL, NULL, NULL, NULL),
(8, '                                                                                ', 50, NULL, NULL, NULL, NULL),
(95, 'skill1', 60, NULL, NULL, NULL, NULL),
(136, 'Skill1', 58, NULL, NULL, NULL, NULL),
(137, 'Skill2', 58, NULL, NULL, NULL, NULL),
(153, 'Manual Testing', 62, NULL, NULL, NULL, NULL),
(154, 'Automation Testing', 62, NULL, NULL, NULL, NULL),
(155, 'Mobile Application Testing', 62, NULL, NULL, NULL, NULL),
(156, 'QA', 62, NULL, NULL, NULL, NULL),
(157, 'Business Analysis', 62, NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `js_work_experience`
--

INSERT INTO `js_work_experience` (`js_work_experience_id`, `Job_Title`, `Company_Name`, `Designation`, `Start_date`, `End_date`, `Location`, `Working_Period`, `Current_CTC`, `Expected_CTC`, `Job_Seeker_Id`, `inserted_by`, `inserted_date`, `updated_by`, `updated_date`) VALUES
(45, NULL, 'Bartronics India Ltd', 'Jr.Executive', '2011-01-01', '2012-01-01', NULL, NULL, '10000', '20000', 58, NULL, NULL, NULL, NULL),
(46, NULL, 'Srisaas Technologies', 'PHP Developer', '2012-01-01', '2013-01-01', NULL, NULL, '20000', '25000', 58, NULL, NULL, NULL, NULL),
(47, NULL, 'IQC', 'PHP Developer', '2012-01-01', '2015-02-02', NULL, NULL, '25000', '30000', 58, NULL, NULL, NULL, NULL),
(54, NULL, 'Virtuell Technologies', 'Software Tester', '2015-06-08', '2016-10-25', NULL, NULL, '2,25,000', '3,00,000', 62, NULL, NULL, NULL, NULL),
(55, NULL, 'Virtuell Technologies', 'Business Analyst', '2015-02-12', '2016-10-25', NULL, NULL, '2,25,000', '3,00,000', 62, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `payment_status` varchar(150) NOT NULL,
  `item_name` varchar(150) NOT NULL,
  `mc_currency` varchar(150) NOT NULL,
  `item_number` int(10) NOT NULL,
  `payment_gross` varchar(150) NOT NULL,
  `jsid` int(10) NOT NULL,
  `txn_id` varchar(50) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rtype` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_status`, `item_name`, `mc_currency`, `item_number`, `payment_gross`, `jsid`, `txn_id`, `created_on`, `rtype`) VALUES
(2, 'Completed', 'My Resume 25', 'USD', 25, '10.00', 58, '4W814206L20823539', '2016-10-25 11:09:55', ''),
(3, 'Completed', 'My Resume 3', 'USD', 3, '200.00', 65, '2W117788YR9234622', '2016-10-25 18:12:11', 'cw'),
(4, 'Completed', 'My Resume 6', 'USD', 6, '3.00', 58, '9CH0138434088194Y', '2016-10-25 19:54:08', 'cw'),
(7, 'Completed', 'My Resume 35', 'USD', 35, '10.00', 65, '6V989592JF766074J', '2016-10-25 20:21:15', 'self'),
(8, 'Completed', 'My Resume 10', 'USD', 10, '400.00', 65, '03B22254V06134909', '2016-10-25 20:52:12', 'cw');

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
-- Table structure for table `templates`
--

CREATE TABLE IF NOT EXISTS `templates` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `iid` int(10) NOT NULL,
  `template` longtext NOT NULL,
  `image1` varchar(500) NOT NULL,
  `did` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `name`, `iid`, `template`, `image1`, `did`) VALUES
(2, 'Template3', 2, 'stylesheet: ''%00 table.person{margin-left:-0.3em}'' + ''%00 td.firstname{font-size:3em;height:.5em;padding:0}'' + ''%00 td.lastname{font-size:5em;height:1em;padding:.05em 0;line-height:1em}'' + ''%00 div.block p{line-height:1.2em;margin:0 0 .6em}'' + ''%00 div.block.person p.person{font-size:4em;margin-bottom:0}'' + ''%00 div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0 0 .2em}'' + ''%00 div.block p.sub-where{font-size:1.1em;margin:0 0 .2em}'' + ''%00 div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}'' + ''%00 div.block.person p.jobtitle{font-size:1.2em;margin:.6em 0 .2em}'' + ''%00 div.block.person p.location{font-size:1em;color:#555}'' + ''%00 div.block span.company{color:#555;font-weight:bold}'' + ''%00 div.block p.title{font-size:1.3em;font-weight:bold;margin-bottom:.5em;padding-bottom:.2em;border-bottom:.2em solid #ddd}'' + ''%00 div.blocks *{line-height:1.4em;}'' + ''%00 table.wide{width:100%;border-collapse:collapse}'' + ''%00 td.left{width:65%;vertical-align:top}'' + ''%00 td.right{width:35%;vertical-align:top;text-align:right}'',\r\n    person: ''<table class="person"><tr><td class="firstname">[#firstName]</td></tr>'' + ''<tr><td class="lastname">[#lastName]</td></tr></table>'' + ''[<p class="jobtitle">|#jobTitle|</p>]'' + ''[<p class="location">|#location|</p>]'',\r\n    contact: ''<div class="html-content">[#html]</div>'',\r\n    experience: ''[<p class="sub-title">|#title|</p>]'' + ''[<p class="sub-where"><span class="company">|+where|</span>, |+location|</p>]'' + ''[<p class="sub-dates">|+fromMonth| |+fromYear|<_ â€“ _>|+toMonth| |+toYear|</p>]'' + ''<div class="html-content">[#html]</div>'',\r\n    education: ''[<p class="sub-title">|#title|</p>]'' + ''[<p class="sub-where">|+where|, |+location|</p>]'' + ''[<p class="sub-dates">|+fromYear| â€“ |+toYear|</p>]'' + ''<div class="html-content">[#html]</div>'',\r\n    html: ''<table class="wide"><tr><td class="left">[person]</td><td class="right">[contact]</td></tr></table><div class="blocks">[blocks]</div>''', '14748008138485_T3.png', 1),
(3, 'Template4', 2, 'stylesheet: ''%00 div.block p{line-height:1.4em;margin:0 0 .6em}'' + ''%00 div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}'' + ''%00 div.block p.sub-where{font-size:1.1em;margin:0}'' + ''%00 div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}'' + ''%00 div.block p.person{font-size:4em;margin-bottom:0;line-height:1.2em;margin-top:-.2em;}'' + ''%00 div.block p.jobtitle{font-size:1.2em;margin:0}'' + ''%00 div.block p.location{font-size:1em;color:#555;margin:0}'' + ''%00 div.block span.company{color:#555;font-weight:bold}'' + ''%00 div.block p.title{font-size:1.3em;font-weight:bold;margin:0 0 .5em 0;padding:.2em;text-transform:uppercase;border-top:.2em dotted #aaa}'' + ''%00 div.blocks{margin-top:1em}'' + ''%00 div.block-inner{margin-left:2em}'' + ''%00 table.wide{width:100%;border-collapse:collapse}'' + ''%00 td.left{width:65%;vertical-align:top}'' + ''%00 td.right{width:35%;vertical-align:top;text-align:right}'',\r\n    person: ''<p class="person">[#firstName] [#lastName]</p>'' + ''[<p class="jobtitle">|#jobTitle|</p>]'' + ''[<p class="location">|#location|</p>]'',\r\n    contact: ''<div class="html-content">[#html]</div>'',\r\n    experience: ''[<p class="sub-title">|#title|</p>]'' + ''[<p class="sub-where"><span class="company">|+where|</span>, |+location|</p>]'' + ''[<p class="sub-dates">|+fromMonth| |+fromYear|<_ â€“ _>|+toMonth| |+toYear|</p>]'' + ''<div class="html-content">[#html]</div>'',\r\n    education: ''[<p class="sub-title">|#title|</p>]'' + ''[<p class="sub-where">|+where|, |+location|</p>]'' + ''[<p class="sub-dates">|+fromYear| â€“ |+toYear|</p>]'' + ''<div class="html-content">[#html]</div>'',\r\n    html: ''<table class="wide"><tr><td class="left">[person]</td><td class="right">[contact]</td></tr></table><div class="blocks">[blocks]</div>''', '14748008583695_T4.png', 1),
(4, 'template5', 4, 'stylesheet: ''%00 div.block p{line-height:1.4em;margin:0 0 .6em}'' + ''%00 div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}'' + ''%00 div.block p.sub-where{font-size:1.1em;margin:0}'' + ''%00 div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}'' + ''%00 div.block p.person{font-size:4em;margin-bottom:0;line-height:1.2em;margin-top:-.2em;}'' + ''%00 div.block p.jobtitle{font-size:1.2em;margin:0}'' + ''%00 div.block p.location{font-size:1em;color:#555;margin:0}'' + ''%00 div.block span.company{color:#555;font-weight:bold}'' + ''%00 div.block p.title{font-size:1.3em;font-weight:bold;margin:0 0 .5em 0;padding:.2em;text-transform:uppercase;border-bottom:.25em solid #bbb}'' + ''%00 div.blocks{margin-top:1em}'' + ''%00 div.block-inner{margin-left:2em}'' + ''%00 table.wide{width:100%;border-collapse:collapse}'' + ''%00 td.left{width:65%;vertical-align:top}'' + ''%00 td.right{width:35%;vertical-align:top;text-align:right}'',\r\n    person: ''<p class="person">[#firstName] [#lastName]</p>'' + ''[<p class="jobtitle">|#jobTitle|</p>]'' + ''[<p class="location">|#location|</p>]'',\r\n    contact: ''<div class="html-content">[#html]</div>'',\r\n    experience: ''[<p class="sub-title">|#title|</p>]'' + ''[<p class="sub-where"><span class="company">|+where|</span>, |+location|</p>]'' + ''[<p class="sub-dates">|+fromMonth| |+fromYear|<_ â€“ _>|+toMonth| |+toYear|</p>]'' + ''<div class="html-content">[#html]</div>'',\r\n    education: ''[<p class="sub-title">|#title|</p>]'' + ''[<p class="sub-where">|+where|, |+location|</p>]'' + ''[<p class="sub-dates">|+fromYear| â€“ |+toYear|</p>]'' + ''<div class="html-content">[#html]</div>'',\r\n    html: ''<table class="wide"><tr><td class="left">[person]</td><td class="right">[contact]</td></tr></table><div class="blocks">[blocks]</div>''', '14748008899654_T5.png', 2),
(5, 'Template6', 4, ' stylesheet: ''%00 div.block p{line-height:1.4em;margin:0 0 .6em}'' + ''%00 div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}'' + ''%00 div.block p.sub-where{font-size:1.1em;margin:0}'' + ''%00 div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}'' + ''%00 div.block p.person{font-size:4em;margin-bottom:0;line-height:1.2em;margin-top:-.2em;}'' + ''%00 div.block p.jobtitle{font-size:1.2em;margin:0}'' + ''%00 div.block p.location{font-size:1em;color:#555;margin:0}'' + ''%00 div.block span.company{color:#555;font-weight:bold}'' + ''%00 div.block p.title{font-size:1.3em;font-weight:bold;margin:0 0 .5em 0;padding:0 .5em .1em;text-transform:uppercase;background:#ddd;border:1px solid #ddd;-moz-border-radius:0 0 1.3em 0;-webkit-border-radius:0 0 1.3em 0;border-radius:0 0 1.3em 0;border-bottom-right-radius:1.3em}'' + ''%00 div.blocks{margin-top:1em}'' + ''%00 div.block-inner{margin-left:2em}'' + ''%00 td.block-title{width:50%;padding:0;border-top:.2em solid #ddd}'' + ''%00 table.wide{width:100%;border-collapse:collapse}'' + ''%00 table.wide.title{page-break-inside:avoid;page-break-after:avoid}'' + ''%00 td.left{width:65%;vertical-align:top}'' + ''%00 td.right{width:35%;vertical-align:top;text-align:right}'',\r\n    person: ''<p class="person">[#firstName] [#lastName]</p>'' + ''[<p class="jobtitle">|#jobTitle|</p>]'' + ''[<p class="location">|#location|</p>]'',\r\n    contact: ''<div class="html-content">[#html]</div>'',\r\n    experience: ''[<p class="sub-title">|#title|</p>]'' + ''[<p class="sub-where"><span class="company">|+where|</span>, |+location|</p>]'' + ''[<p class="sub-dates">|+fromMonth| |+fromYear|<_ â€“ _>|+toMonth| |+toYear|</p>]'' + ''<div class="html-content">[#html]</div>'',\r\n    education: ''[<p class="sub-title">|#title|</p>]'' + ''[<p class="sub-where">|+where|, |+location|</p>]'' + ''[<p class="sub-dates">|+fromYear| â€“ |+toYear|</p>]'' + ''<div class="html-content">[#html]</div>'',\r\n    html: ''<table class="wide"><tr><td class="left">[person]</td><td class="right">[contact]</td></tr></table><div class="blocks">[blocks]</div>'',\r\n    blockTitleWrap: ''<table class="wide title" cellspacing="0"><tr><td class="block-title">%1</td><td class="block-title"></td></tr></table>''', '14748009224114_T6.png', 2),
(6, 'Template7', 4, 'stylesheet: ''%00 div.block p{line-height:1.4em;margin:.5em 0 .6em}'' + ''%00 div.block p.sub-title{font-size:1.2em;font-weight:bold;margin:0}'' + ''%00 div.block p.sub-where{font-size:1.1em;margin:0}'' + ''%00 div.block p.sub-dates{font-size:1em;color:#555;margin:0 0 .5em}'' + ''%00 div.block p.person{font-size:4em;margin-bottom:0;line-height:1.2em;margin-top:-.2em;}'' + ''%00 div.block p.jobtitle{font-size:1.2em;margin:0}'' + ''%00 div.block p.location{font-size:1em;color:#555;margin:0}'' + ''%00 div.block span.company{color:#555;font-weight:bold}'' + ''%00 div.block p.title{font-size:140%;font-weight:bold;margin:0 0 .5em 0;padding:.2em 0;text-transform:uppercase}'' + ''%00 div.blocks{margin-top:1em}'' + ''%00 table.wide{width:100%;border-collapse:collapse}'' + ''%00 td.left{width:65%;vertical-align:top}'' + ''%00 td.right{width:35%;vertical-align:top;text-align:right}'' + ''%00 td.left0{width:35%;vertical-align:top}'' + ''%00 td.right0{width:65%;vertical-align:top}'',\r\n    person: ''<p class="person">[#firstName] [#lastName]</p>'' + ''[<p class="jobtitle">|#jobTitle|</p>]'' + ''[<p class="location">|#location|</p>]'',\r\n    contact: ''<div class="html-content">[#html]</div>'',\r\n    experience: ''[<p class="sub-title">|#title|</p>]'' + ''[<p class="sub-where"><span class="company">|+where|</span>, |+location|</p>]'' + ''[<p class="sub-dates">|+fromMonth| |+fromYear|<_ â€“ _>|+toMonth| |+toYear|</p>]'' + ''<div class="html-content">[#html]</div>'',\r\n    education: ''[<p class="sub-title">|#title|</p>]'' + ''[<p class="sub-where">|+where|, |+location|</p>]'' + ''[<p class="sub-dates">|+fromYear| â€“ |+toYear|</p>]'' + ''<div class="html-content">[#html]</div>'',\r\n    html: ''<table class="wide"><tr><td class="left">[person]</td><td class="right">[contact]</td></tr></table><div class="blocks">[blocks]</div>'',\r\n    blockBegin: ''<table class="wide"><tr><td class="left0">'',\r\n    blockMiddle: ''</td><td class="right0">'',\r\n    blockEnd: ''</td></tr></table>''', '14748009558172_T7.png', 2);

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

-- --------------------------------------------------------

--
-- Table structure for table `vb_users`
--

CREATE TABLE IF NOT EXISTS `vb_users` (
  `iuid` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(75) NOT NULL,
  `email` varchar(75) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `icon` varchar(500) NOT NULL,
  PRIMARY KEY (`iuid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vb_users`
--

INSERT INTO `vb_users` (`iuid`, `name`, `email`, `username`, `password`, `role`, `icon`) VALUES
(1, 'Nagendra', 'nagprasad4u@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '14746395763203_14746312637252_Tulips.jpg');

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
