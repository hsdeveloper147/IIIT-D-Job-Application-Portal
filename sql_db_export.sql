-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 14, 2018 at 09:54 PM
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
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `signup_token`, `isvalidated`, `contact`, `qualification`, `fn`, `mn`, `ln`, `dob`, `address`, `city`, `state`, `pincode`, `s_passed`, `s_spec`, `s_board`, `s_year`, `s_marks`, `s_type`, `u_passed`, `u_spec`, `u_board`, `u_year`, `u_marks`, `u_type`, `p_passed`, `p_spec`, `p_board`, `p_year`, `p_marks`, `p_type`, `e1_org`, `e1_desg`, `e1_from`, `e1_to`, `e1_payscale`, `e1_reason`, `e1_exp`, `e1_nature`, `e2_org`, `e2_desg`, `e2_from`, `e2_to`, `e2_payscale`, `e2_reason`, `e2_exp`, `e2_nature`, `e3_org`, `e3_desg`, `e3_from`, `e3_to`, `e3_payscale`, `e3_reason`, `e3_exp`, `e3_nature`, `e4_org`, `e4_desg`, `e4_from`, `e4_to`, `e4_payscale`, `e4_reason`, `e4_exp`, `e4_nature`, `cv`, `photo`, `sign`) VALUES
('ds', 'asda', '', 0, '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'him@gm_photo', 'him@gm_sign'),
('s', '', '', 0, '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'him@gm_photo', 'him@gm_sign'),
('as', 'as', 'pV9j810RUJ', 0, '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'him@gm_photo', 'him@gm_sign'),
('sundriyald1994@gmail.com', 'ds', 'FBwVunD2Ll', 0, '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'him@gm_photo', 'him@gm_sign'),
('sundriyalh1994@gmail.com', 'ds', 'zec13ZDvow', 0, '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'him@gm_photo', 'him@gm_sign'),
('asd', 'asd', 'G48UftXeWZ', 0, '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'him@gm_photo', 'him@gm_sign'),
('asdf', 'as', 'C5Z10zzL4M', 0, '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'him@gm_photo', 'him@gm_sign'),
('sund@gm', 'ds', 'FeelT5jzXR', 0, '123', 'BTech', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'him@gm_photo', 'him@gm_sign'),
('sund@', 'ds', 'TmDEga5vuz', 0, '1234', 'Mtech', 'divyanshu', '', 'sundriyal', '14/7', 'P28', 'Dle', 'Delhi', '110054', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'him@gm_photo', 'him@gm_sign'),
('sundh', 'hs', 'EuYJh6f8Gx', 0, '1234', 'BTech', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'him@gm_photo', 'him@gm_sign'),
('q', 'q', 'Vyjfusz3UO', 0, '878', 'b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'him@gm_photo', 'him@gm_sign'),
('him@gm', '123', 'FLcQtPab4G', 0, '878', 'b', 'ds', '', 'sund', '14', 'P28', 'Dle', 'Delhi', '110052', 'Yes', 'Maths , Science', 'CBSE', '2012', '99', 'Regular', 'Yes', 'CSE', 'IIIT', '2016', '98', 'Regular', 'Yes', 'Computer graphics', 'IIIT', '2018', '90', 'Regular', 'o1', 'engg', '2015', '2016', '10000', 'uu', '12', 'engg', 'o22', 'data scienctisit', '2016', '2017', '20000', 'uui', '12', 'data', 'o31', 'proffessor', '2017', '2018', '5000', 'qq', '12', 'teaching', '', '', '', '', '', '', '', '', 'him@gm_cv.pdf', 'him@gm_photo.jpg', 'him@gm_sign.jpg'),
('SD@DSF', 'SDF', 'aA3cWdJ0aS', 0, '3432', 'ASDFDS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'him@gm_photo', 'him@gm_sign'),
('SF@VC', 'HIMU', 'BSHwfxSDNe', 0, '3432', 'ASDSA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'him@gm_photo', 'him@gm_sign'),
('sv@sv', 'abc', 'I1TC4u5AqA', 0, '453543', 'hg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'him@gm_photo', 'him@gm_sign'),
('s@s', '123', 'SCn2Db14ce', 0, '64564', 'cgb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'him@gm_photo', 'him@gm_sign'),
('a@s', '1', 'NbpRJfoIgw', 0, '12', 'Btech', 'ds', '', 'sundriyal', '12', 'P28', 'Dle', 'Delhi', '110053', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'him@gm_photo', 'him@gm_sign'),
('h@s', '1', 'tiNnpe6Av8', 0, '1123', 'btech', 'Himanshu', '', 'Sundriyal', '14/07', 'P28', 'Delhi', 'Delhi', '110053', 'y', 'c', 'CBSE', '2012', '99', 'Regular', 'y', 'c', 'IIIT', '2016', '98', 'Regular', 'y', 'c', 'IIIT', '2018', '90', 'Regular', 'o1', 'engg', '2015', '2016', '10000', 'uu', '12', 'engg', 'o2', 'w', '2017', '2018', '100000', 'ii', '12', 'engg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'h@s_cv.pdf', 'h@s_photo.JPG', 'h@s_sign.JPG');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
