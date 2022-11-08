-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.5-10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2021-12-09 21:05:40
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for db_eventplaning_catering
DROP DATABASE IF EXISTS `db_eventplaning_catering`;
CREATE DATABASE IF NOT EXISTS `db_eventplaning_catering` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_eventplaning_catering`;


-- Dumping structure for table db_eventplaning_catering.tb_booking_payment
DROP TABLE IF EXISTS `tb_booking_payment`;
CREATE TABLE IF NOT EXISTS `tb_booking_payment` (
  `payment_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `payment_code` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `paid_amount` varchar(255) DEFAULT NULL,
  `trx_id` varchar(255) DEFAULT NULL,
  `payment_acc_number` varchar(255) DEFAULT NULL,
  `payment_date` varchar(255) DEFAULT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `booking_code` int(11) DEFAULT NULL,
  `paid_by` varchar(255) DEFAULT NULL,
  `company_owner` varchar(255) DEFAULT NULL,
  `is_accepted` int(11) DEFAULT '0',
  `entry_time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='payment_code,name,contact,paid_amount,trx_id,payment_acc_number,payment_date,booking_id,booking_code,paid_by,company_owner,entry_time';

-- Dumping data for table db_eventplaning_catering.tb_booking_payment: ~0 rows (approximately)
DELETE FROM `tb_booking_payment`;
/*!40000 ALTER TABLE `tb_booking_payment` DISABLE KEYS */;
INSERT INTO `tb_booking_payment` (`payment_id`, `payment_code`, `name`, `contact`, `paid_amount`, `trx_id`, `payment_acc_number`, `payment_date`, `booking_id`, `booking_code`, `paid_by`, `company_owner`, `is_accepted`, `entry_time`) VALUES
	(1, 446403, 'Jahirul Rifat', '01865846522', '500', '8DX9RT5ZQJ', '0186584685', '2021-12-09', 1, 854074, 'Rifat', 'Arif', 1, '2021-12-09 19:25:09');
/*!40000 ALTER TABLE `tb_booking_payment` ENABLE KEYS */;


-- Dumping structure for table db_eventplaning_catering.tb_caterer
DROP TABLE IF EXISTS `tb_caterer`;
CREATE TABLE IF NOT EXISTS `tb_caterer` (
  `caterer_id` bigint(10) NOT NULL AUTO_INCREMENT,
  `caterer_code` int(11) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_image` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `opening_hour` varchar(255) DEFAULT NULL,
  `about_company` varchar(255) DEFAULT NULL,
  `company_address` varchar(255) DEFAULT NULL,
  `company_services` varchar(255) DEFAULT NULL,
  `company_established_on` varchar(255) DEFAULT NULL,
  `way_of_payment` varchar(255) DEFAULT NULL,
  `bkash_acc_number` varchar(255) DEFAULT NULL,
  `nagad_acc_number` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `is_verified` int(11) DEFAULT '0',
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`caterer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='event_planner_id,event_panner_code,company_name,company_image,contact_number,email_address,opening_hour,about_company,company_address,company_services,company_established_on,way_of_payment,bkash_acc_number,nagad_acc_number,added_by,is_verified,entry_time';

-- Dumping data for table db_eventplaning_catering.tb_caterer: ~1 rows (approximately)
DELETE FROM `tb_caterer`;
/*!40000 ALTER TABLE `tb_caterer` DISABLE KEYS */;
INSERT INTO `tb_caterer` (`caterer_id`, `caterer_code`, `company_name`, `company_image`, `contact_number`, `email_address`, `opening_hour`, `about_company`, `company_address`, `company_services`, `company_established_on`, `way_of_payment`, `bkash_acc_number`, `nagad_acc_number`, `added_by`, `is_verified`, `entry_time`) VALUES
	(2, 199443, 'Reliable Catering', 'catering_company_img/ee6a00bf6775337c1051156378f3f518bg-2.jpg', '01854365899', 'reliablecatering@gmail.com', 'Saturday - Wednesday (8:00 AM - 10:00 PM)', 'An event planner who works in-house at a catering company will project manage the event from a food, beverage, and service perspective.', 'A/27 Zia Building, Lalchand Road, Kornelhat, Chattogram, Bangladesh', '<ul><li>Muslim Food Caterers</li><li>Caterers for Weding</li></ul>', '2021-12-08', 'Cash / Bkash / Nagad', '01854365899', '01854365899', 'Arif', 1, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tb_caterer` ENABLE KEYS */;


-- Dumping structure for table db_eventplaning_catering.tb_caterer_payment
DROP TABLE IF EXISTS `tb_caterer_payment`;
CREATE TABLE IF NOT EXISTS `tb_caterer_payment` (
  `payment_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `payment_code` int(11) DEFAULT NULL,
  `caterer_id` int(11) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_code` int(11) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `trx_id` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_acc_number` varchar(255) DEFAULT NULL,
  `payment_screenshot` varchar(255) DEFAULT NULL,
  `payment_date` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `is_accepted` int(11) DEFAULT '0',
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='payment_code,caterer_id,company_name,company_code,contact_number,email_address,paid_amount,trx_id,payment_method,payment_acc_number,payment_screenshot,payment_date,added_by,entry_time';

-- Dumping data for table db_eventplaning_catering.tb_caterer_payment: ~0 rows (approximately)
DELETE FROM `tb_caterer_payment`;
/*!40000 ALTER TABLE `tb_caterer_payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_caterer_payment` ENABLE KEYS */;


-- Dumping structure for table db_eventplaning_catering.tb_catering_package
DROP TABLE IF EXISTS `tb_catering_package`;
CREATE TABLE IF NOT EXISTS `tb_catering_package` (
  `catering_service_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `catering_service_code` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_code` int(11) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `package_name` varchar(255) DEFAULT NULL,
  `package_price` varchar(255) DEFAULT NULL,
  `package_details` varchar(255) DEFAULT NULL,
  `package_added_on` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`catering_service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='catering_service_code,company_id,company_name,company_code,contact_number,email_address,package_name,package_price,package_details,package_added_on,added_by,entry_time';

-- Dumping data for table db_eventplaning_catering.tb_catering_package: ~1 rows (approximately)
DELETE FROM `tb_catering_package`;
/*!40000 ALTER TABLE `tb_catering_package` DISABLE KEYS */;
INSERT INTO `tb_catering_package` (`catering_service_id`, `catering_service_code`, `company_id`, `company_name`, `company_code`, `contact_number`, `email_address`, `package_name`, `package_price`, `package_details`, `package_added_on`, `added_by`, `entry_time`) VALUES
	(1, 304269, 1, 'Reliable Catering', 787853, '01854365899', 'reliablecatering@gmail.com', 'WEDDING PACKAGE', '120000', '<ul><li><span style="color: rgb(102, 102, 102); font-family: Poppins, sans-serif; font-size: 16px; text-align: center;">Muslim Food Caterers</span><br></li></ul>', '2021-12-07', 'Arif', '2021-12-07 19:43:44');
/*!40000 ALTER TABLE `tb_catering_package` ENABLE KEYS */;


-- Dumping structure for table db_eventplaning_catering.tb_event_catering_booking
DROP TABLE IF EXISTS `tb_event_catering_booking`;
CREATE TABLE IF NOT EXISTS `tb_event_catering_booking` (
  `booking_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `booking_code` int(11) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `event_name` varchar(255) DEFAULT NULL,
  `service_details` varchar(255) DEFAULT NULL,
  `event_date` varchar(255) DEFAULT NULL,
  `event_time` varchar(255) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_code` int(11) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `company_address` varchar(255) DEFAULT NULL,
  `customer_msg` varchar(255) DEFAULT NULL,
  `booked_by` varchar(255) DEFAULT NULL,
  `company_owner` varchar(255) DEFAULT NULL,
  `is_verified` int(11) DEFAULT '0',
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='booking_code,customer_name,email,phone,address,event_name,service_details,event_date,event_time,company_id,company_name,company_code,contact_number,company_address,customer_msg,booked_by,entry_time';

-- Dumping data for table db_eventplaning_catering.tb_event_catering_booking: ~2 rows (approximately)
DELETE FROM `tb_event_catering_booking`;
/*!40000 ALTER TABLE `tb_event_catering_booking` DISABLE KEYS */;
INSERT INTO `tb_event_catering_booking` (`booking_id`, `booking_code`, `customer_name`, `email`, `phone`, `address`, `event_name`, `service_details`, `event_date`, `event_time`, `company_id`, `company_name`, `company_code`, `contact_number`, `company_address`, `customer_msg`, `booked_by`, `company_owner`, `is_verified`, `entry_time`) VALUES
	(1, 854074, 'Jahirul Rifat', 'rifat@gmail.com', '01865846522', 'Muradpur, Chattogram', 'Wedding Ceremony', '<blockquote><b><font color="#ff9c00"><u>All Decoration</u></font></b></blockquote>', '2021-12-09', 'Day Event', 1, 'The Eventor', 338662, '01854365899', 'A/27 Zia Building, Lalchand Road, Kornelhat, Chattogram, Bangladesh', 'Nothing', 'Rifat', 'Arif', 1, '2021-12-09 08:02:22'),
	(2, 575909, 'Jahirul Rifat', 'rifat@gmail.com', '01865846522', 'Muradpur, Chattogram', 'Wedding Program', 'Caterer for Wedding', '2021-12-09', 'Night Event', 2, 'Reliable Catering', 199443, '01854365899', 'A/27 Zia Building, Lalchand Road, Kornelhat, Chattogram, Bangladesh', 'Nothing', 'Rifat', 'Arif', 1, '2021-12-09 18:19:36');
/*!40000 ALTER TABLE `tb_event_catering_booking` ENABLE KEYS */;


-- Dumping structure for table db_eventplaning_catering.tb_event_package
DROP TABLE IF EXISTS `tb_event_package`;
CREATE TABLE IF NOT EXISTS `tb_event_package` (
  `event_package_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `event_package_code` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_code` int(11) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `package_name` varchar(255) DEFAULT NULL,
  `package_price` varchar(255) DEFAULT NULL,
  `package_details` varchar(255) DEFAULT NULL,
  `package_added_on` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`event_package_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='event_package_id,event_package_code,company_id,company_name,company_code,contact_number,email_address,package_name,package_price,package_details,package_added_on,added_by,entry_time';

-- Dumping data for table db_eventplaning_catering.tb_event_package: ~0 rows (approximately)
DELETE FROM `tb_event_package`;
/*!40000 ALTER TABLE `tb_event_package` DISABLE KEYS */;
INSERT INTO `tb_event_package` (`event_package_id`, `event_package_code`, `company_id`, `company_name`, `company_code`, `contact_number`, `email_address`, `package_name`, `package_price`, `package_details`, `package_added_on`, `added_by`, `entry_time`) VALUES
	(1, 761394, 1, 'The Eventor', 338662, '01854365899', 'eventor.ctg@gmail.com', 'WEDDING PACKAGE', '25,000', '<ul><li><span style="color: rgb(102, 102, 102); font-family: Poppins, sans-serif; font-size: 16px; text-align: center;">Stylish makeup for the bride</span></li><li><span style="color: rgb(102, 102, 102); font-family: Poppins, sans-serif; font-size: 16px; ', '2021-12-07', 'Arif', '2021-12-07 15:44:06');
/*!40000 ALTER TABLE `tb_event_package` ENABLE KEYS */;


-- Dumping structure for table db_eventplaning_catering.tb_event_planner
DROP TABLE IF EXISTS `tb_event_planner`;
CREATE TABLE IF NOT EXISTS `tb_event_planner` (
  `event_planner_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `event_panner_code` int(11) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_image` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `opening_hour` varchar(255) DEFAULT NULL,
  `about_company` varchar(255) DEFAULT NULL,
  `company_address` varchar(255) DEFAULT NULL,
  `company_services` varchar(255) DEFAULT NULL,
  `company_established_on` varchar(255) DEFAULT NULL,
  `way_of_payment` varchar(255) DEFAULT NULL,
  `bkash_acc_number` varchar(255) DEFAULT NULL,
  `nagad_acc_number` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `is_verified` int(11) DEFAULT '0',
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`event_planner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='event_planner_id,event_panner_code,company_name,company_image,contact_number,email_address,opening_hour,about_company,company_address,company_services,company_established_on,way_of_payment,bkash_acc_number,nagad_acc_number,added_by,is_verified,entry_time';

-- Dumping data for table db_eventplaning_catering.tb_event_planner: ~1 rows (approximately)
DELETE FROM `tb_event_planner`;
/*!40000 ALTER TABLE `tb_event_planner` DISABLE KEYS */;
INSERT INTO `tb_event_planner` (`event_planner_id`, `event_panner_code`, `company_name`, `company_image`, `contact_number`, `email_address`, `opening_hour`, `about_company`, `company_address`, `company_services`, `company_established_on`, `way_of_payment`, `bkash_acc_number`, `nagad_acc_number`, `added_by`, `is_verified`, `entry_time`) VALUES
	(1, 338662, 'The Eventor', 'company_img/465aa1b6590b6a2daa4de1c0743ffe4cbg-3.jpg', '01854365899', 'eventor.ctg@gmail.com', 'Saturday - Wednesday (8:00 AM - 10:00 PM)', 'An event planner who works in-house at a catering company will project manage the event from a food, beverage, and service perspective.', 'A/27 Zia Building, Lalchand Road, Kornelhat, Chattogram, Bangladesh', '<ul><li>Wedding Party</li><li>Birthday Party</li><li>Office Meeting</li><li>Any Kind of Party</li></ul>', '2021-12-07', 'Cash / Bkash / Nagad', '01854365899', '01854365897', 'Arif', 1, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tb_event_planner` ENABLE KEYS */;


-- Dumping structure for table db_eventplaning_catering.tb_event_planner_payment
DROP TABLE IF EXISTS `tb_event_planner_payment`;
CREATE TABLE IF NOT EXISTS `tb_event_planner_payment` (
  `payment_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `payment_code` int(11) DEFAULT NULL,
  `event_planner_id` int(11) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_code` int(11) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `trx_id` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_acc_number` varchar(255) DEFAULT NULL,
  `payment_screenshot` varchar(255) DEFAULT NULL,
  `payment_date` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `is_accepted` int(11) DEFAULT '0',
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='payment_code,event_planner_id,company_name,company_code,contact_number,email_address,paid_amount,trx_id,payment_method,payment_acc_number,payment_screenshot,payment_date,added_by,entry_time';

-- Dumping data for table db_eventplaning_catering.tb_event_planner_payment: ~0 rows (approximately)
DELETE FROM `tb_event_planner_payment`;
/*!40000 ALTER TABLE `tb_event_planner_payment` DISABLE KEYS */;
INSERT INTO `tb_event_planner_payment` (`payment_id`, `payment_code`, `event_planner_id`, `company_name`, `company_code`, `contact_number`, `email_address`, `paid_amount`, `trx_id`, `payment_method`, `payment_acc_number`, `payment_screenshot`, `payment_date`, `added_by`, `is_accepted`, `entry_time`) VALUES
	(2, 168430, 1, 'The Eventor', 338662, '01854365899', 'eventor.ctg@gmail.com', 500, '8DX9RT5ZQU', 'Bkash', '01865421556', 'event_panner_payment_img/70472df13182d191a89447dd069f150ffd747bf4cfd97a78a3ec5f242b4693e1bkash.jpg', '2021-12-09', 'Arif', 0, '2021-12-09 19:56:53');
/*!40000 ALTER TABLE `tb_event_planner_payment` ENABLE KEYS */;


-- Dumping structure for table db_eventplaning_catering.tb_review
DROP TABLE IF EXISTS `tb_review`;
CREATE TABLE IF NOT EXISTS `tb_review` (
  `review_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_code` int(11) DEFAULT NULL,
  `rating_value` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `company_owner` varchar(255) DEFAULT NULL,
  `reviewed_by` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_eventplaning_catering.tb_review: ~2 rows (approximately)
DELETE FROM `tb_review`;
/*!40000 ALTER TABLE `tb_review` DISABLE KEYS */;
INSERT INTO `tb_review` (`review_id`, `company_id`, `company_name`, `company_code`, `rating_value`, `comment`, `company_owner`, `reviewed_by`, `entry_time`) VALUES
	(1, 1, 'The Eventor', 338662, 4, 'Good Services.', 'Arif', 'Rifat', '2021-12-09 08:42:08'),
	(2, 2, 'Reliable Catering', 199443, 4, 'Service is very good.', 'Arif', 'Rifat', '2021-12-09 18:28:54');
/*!40000 ALTER TABLE `tb_review` ENABLE KEYS */;


-- Dumping structure for table db_eventplaning_catering.tb_user
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE IF NOT EXISTS `tb_user` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_eventplaning_catering.tb_user: ~3 rows (approximately)
DELETE FROM `tb_user`;
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` (`user_id`, `name`, `email`, `phone`, `address`, `user_name`, `password`, `user_type`, `entry_time`) VALUES
	(1, 'Md Ariful Islam', 'arifulislam@gmail.com', '01856895882', 'Muradpur, Chattogram', 'Arif', '12345', 'Event Planner', '2021-12-06 13:02:56'),
	(2, 'Md Admin', 'admin@gmail.com', '01894215488', 'Muradpur, Chattogram', 'Md Parvez', '12345', 'Admin', '2021-12-06 13:02:56'),
	(3, 'Jahirul Rifat', 'rifat@gmail.com', '01865846522', 'Muradpur, Chattogram', 'Rifat', '12345', 'Customer', '2021-12-06 13:02:56');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
