-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 25, 2018 at 05:35 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `signup_token` varchar(10) NOT NULL,
  `isvalidated` tinyint(1) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `fn` varchar(100) DEFAULT NULL,
  `mn` varchar(100) DEFAULT NULL,
  `ln` varchar(100) DEFAULT NULL,
  `dob` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `pincode` varchar(10) DEFAULT NULL,
  `s_passed` varchar(100) DEFAULT NULL,
  `s_spec` varchar(100) DEFAULT NULL,
  `s_board` varchar(100) DEFAULT NULL,
  `s_year` varchar(100) DEFAULT NULL,
  `s_marks` varchar(100) DEFAULT NULL,
  `s_type` varchar(100) DEFAULT NULL,
  `u_passed` varchar(100) DEFAULT NULL,
  `u_spec` varchar(100) DEFAULT NULL,
  `u_board` varchar(100) DEFAULT NULL,
  `u_year` varchar(100) DEFAULT NULL,
  `u_marks` varchar(100) DEFAULT NULL,
  `u_type` varchar(100) DEFAULT NULL,
  `p_passed` varchar(100) DEFAULT NULL,
  `p_spec` varchar(100) DEFAULT NULL,
  `p_board` varchar(100) DEFAULT NULL,
  `p_year` varchar(100) DEFAULT NULL,
  `p_marks` varchar(100) DEFAULT NULL,
  `p_type` varchar(100) DEFAULT NULL,
  `e1_org` varchar(100) DEFAULT NULL,
  `e1_desg` varchar(100) DEFAULT NULL,
  `e1_from` varchar(100) DEFAULT NULL,
  `e1_to` varchar(100) DEFAULT NULL,
  `e1_payscale` varchar(100) DEFAULT NULL,
  `e1_reason` varchar(500) DEFAULT NULL,
  `e1_exp` varchar(100) DEFAULT NULL,
  `e1_nature` varchar(100) DEFAULT NULL,
  `e2_org` varchar(100) DEFAULT NULL,
  `e2_desg` varchar(100) DEFAULT NULL,
  `e2_from` varchar(100) DEFAULT NULL,
  `e2_to` varchar(100) DEFAULT NULL,
  `e2_payscale` varchar(100) DEFAULT NULL,
  `e2_reason` varchar(500) DEFAULT NULL,
  `e2_exp` varchar(100) DEFAULT NULL,
  `e2_nature` varchar(100) DEFAULT NULL,
  `e3_org` varchar(100) DEFAULT NULL,
  `e3_desg` varchar(100) DEFAULT NULL,
  `e3_from` varchar(100) DEFAULT NULL,
  `e3_to` varchar(100) DEFAULT NULL,
  `e3_payscale` varchar(100) DEFAULT NULL,
  `e3_reason` varchar(500) DEFAULT NULL,
  `e3_exp` varchar(100) DEFAULT NULL,
  `e3_nature` varchar(100) DEFAULT NULL,
  `e4_org` varchar(100) DEFAULT NULL,
  `e4_desg` varchar(100) DEFAULT NULL,
  `e4_from` varchar(100) DEFAULT NULL,
  `e4_to` varchar(100) DEFAULT NULL,
  `e4_payscale` varchar(100) DEFAULT NULL,
  `e4_reason` varchar(500) DEFAULT NULL,
  `e4_exp` varchar(100) DEFAULT NULL,
  `e4_nature` varchar(100) DEFAULT NULL,
  `cv` varchar(100) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `sign` varchar(100) DEFAULT NULL,
  `personal_form` varchar(50) DEFAULT 'n',
  `edu_form` varchar(50) DEFAULT 'n',
  `exp_form` varchar(50) DEFAULT 'n',
  `final` varchar(10) NOT NULL DEFAULT 'n',
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `signup_token`, `isvalidated`, `contact`, `qualification`, `fn`, `mn`, `ln`, `dob`, `address`, `city`, `state`, `pincode`, `s_passed`, `s_spec`, `s_board`, `s_year`, `s_marks`, `s_type`, `u_passed`, `u_spec`, `u_board`, `u_year`, `u_marks`, `u_type`, `p_passed`, `p_spec`, `p_board`, `p_year`, `p_marks`, `p_type`, `e1_org`, `e1_desg`, `e1_from`, `e1_to`, `e1_payscale`, `e1_reason`, `e1_exp`, `e1_nature`, `e2_org`, `e2_desg`, `e2_from`, `e2_to`, `e2_payscale`, `e2_reason`, `e2_exp`, `e2_nature`, `e3_org`, `e3_desg`, `e3_from`, `e3_to`, `e3_payscale`, `e3_reason`, `e3_exp`, `e3_nature`, `e4_org`, `e4_desg`, `e4_from`, `e4_to`, `e4_payscale`, `e4_reason`, `e4_exp`, `e4_nature`, `cv`, `photo`, `sign`, `personal_form`, `edu_form`, `exp_form`, `final`) VALUES
('ds', 'asda', '', 0, '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'him@gm_photo', 'him@gm_sign', NULL, NULL, NULL, 'n'),
('s', '', '', 0, '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'him@gm_photo', 'him@gm_sign', NULL, NULL, NULL, 'n'),
('as', 'as', 'pV9j810RUJ', 0, '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'him@gm_photo', 'him@gm_sign', NULL, NULL, NULL, 'n'),
('sundriyald1994@gmail.com', 'ds', 'FBwVunD2Ll', 0, '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'him@gm_photo', 'him@gm_sign', NULL, NULL, NULL, 'n'),
('sundriyalh1994@gmail.com', 'ds', 'zec13ZDvow', 0, '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'him@gm_photo', 'him@gm_sign', NULL, NULL, NULL, 'n'),
('asd', 'asd', 'G48UftXeWZ', 0, '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'him@gm_photo', 'him@gm_sign', NULL, NULL, NULL, 'n'),
('asdf', 'as', 'C5Z10zzL4M', 0, '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'him@gm_photo', 'him@gm_sign', NULL, NULL, NULL, 'n'),
('sund@gm', 'ds', 'FeelT5jzXR', 0, '123', 'BTech', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'him@gm_photo', 'him@gm_sign', NULL, NULL, NULL, 'n'),
('sund@', 'ds', 'TmDEga5vuz', 0, '1234', 'Mtech', 'divyanshu', '', 'sundriyal', '14/7', 'P28', 'Dle', 'Delhi', '110054', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'him@gm_photo', 'him@gm_sign', NULL, NULL, NULL, 'n'),
('sundh', 'hs', 'EuYJh6f8Gx', 0, '1234', 'BTech', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'him@gm_photo', 'him@gm_sign', NULL, NULL, NULL, 'n'),
('q', 'q', 'Vyjfusz3UO', 0, '878', 'b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'him@gm_photo', 'him@gm_sign', NULL, NULL, NULL, 'n'),
('him@gm', '123', 'FLcQtPab4G', 0, '878', 'b', 'ds', '', 'sund', '14', 'P28', 'Dle', 'Delhi', '110052', 'Yes', 'Maths , Science', 'CBSE', '2012', '99', 'Regular', 'Yes', 'CSE', 'IIIT', '2016', '98', 'Regular', 'Yes', 'Computer graphics 2', 'IIIT', '2018', '90', 'Regular', 'o1', 'engg', '2015', '2016', '10000', 'uu', '12', 'engg', 'o22', 'data scienctisit', '2016', '2017', '20000', 'uui', '12', 'data', 'o31', 'proffessors', '2017', '2018', '5000', 'qq', '12', 'teaching', '', '', '', '', '', '', '', '', 'him@gm_cv.pdf', 'him@gm_photo.jpg', 'him@gm_sign.jpg', 'y', 'y', 'y', 'y'),
('SD@DSF', 'SDF', 'aA3cWdJ0aS', 0, '3432', 'ASDFDS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'him@gm_photo', 'him@gm_sign', NULL, NULL, NULL, 'n'),
('SF@VC', 'HIMU', 'BSHwfxSDNe', 0, '3432', 'ASDSA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'him@gm_photo', 'him@gm_sign', NULL, NULL, NULL, 'n'),
('sv@sv', 'abc', 'I1TC4u5AqA', 0, '453543', 'hg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'him@gm_photo', 'him@gm_sign', NULL, NULL, NULL, 'n'),
('s@s', '123', 'SCn2Db14ce', 0, '64564', 'cgb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'him@gm_photo', 'him@gm_sign', NULL, NULL, NULL, 'n'),
('a@s', '1', 'NbpRJfoIgw', 0, '12', 'Btech', 'ds', '', 'sundriyal', '12', 'P28', 'Dle', 'Delhi', '110053', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'him@gm_photo', 'him@gm_sign', NULL, NULL, NULL, 'n'),
('h@s', '1', 'tiNnpe6Av8', 0, '1123', 'btech', 'Himanshu', '', 'Sundriyal', '14/07', 'P28', 'Delhi', 'Delhi', '110053', 'y', 'c', 'CBSE', '2012', '99', 'Regular', 'y', 'c', 'IIIT', '2016', '98', 'Regular', 'y', 'c', 'IIIT', '2018', '90', 'Regular', 'o1', 'engg', '2015', '2016', '10000', 'uu', '12', 'engg', 'o2', 'w', '2017', '2018', '100000', 'ii', '12', 'engg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'h@s_cv.pdf', 'h@s_photo.JPG', 'h@s_sign.JPG', NULL, NULL, NULL, 'n'),
('him@him', 'him', 'Y8SVDRzRqZ', 0, '234', 'kasjd', 'sfdd', '', 'asd', 'Sep 10, 2018', 'sdf', 'sdfg', 'sdg', 'dfg', 'm', 'm', 'm', 'm', 'mm', 'm', 'm', 'm', 'm', 'm', 'm', 'm', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'him@him_cv.pdf', 'him@him_photo.JPG', 'him@him_sign.png', NULL, NULL, NULL, 'n'),
('hi@terr', 'him', 'xfkGTyl4n8', 0, '56567', 'hi@terr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, 'n', 'y', 'y', 'n'),
('g@g', 'him', 'BoybToyMAk', 0, '67890', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', 'n'),
('d@d', 'him', 'QYMoeJ5j5v', 0, '345678', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', 'n'),
('j@j', '678', '078YzNbqt1', 0, '56789', 'Assistant Manager/Junior Manager (Accounts)', 'kjk', '', 'kjk', 'Sep 10, 2018', 'lk;lk', 'lk', 'lk', '7890', 'Yes', 'Maths , Science', 'bnm', '89', '8', 'Regular', 'B.Com', 'CSE', 'ghj', '89', '89', 'Distance', 'Yes', 'ghj', 'ghj', '78', '78', 'Distance', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'j@j_cv.JPG', 'j@j_photo.JPG', 'j@j_sign.JPG', 'y', 'y', 'y', 'y'),
('j@p', 'yup', 'evz1i1u1f6', 0, '890', 'Junior Research Engineer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'j@p_photo.JPG', 'j@p_sign.jpeg', 'n', 'n', 'n', 'n'),
('him@h', 'him', 'ASjqMh4eEx', 0, '5678', 'Assistant Manager/Junior Manager (Accounts)', 'hima', '', 'sun', 'Sep 15, 1999', 'hdd', 'delhi', 'delhi', '110054', 'Yes', '', '', '', '', 'Regular', 'BBA', '', '', '', '', 'Regular', '', '', '', '', '', 'Regular', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'him@h_cv.pdf', 'him@h_photo.jpg', 'him@h_sign.PNG', 'y', 'y', 'y', 'y');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
