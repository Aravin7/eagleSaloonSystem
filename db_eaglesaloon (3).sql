-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2024 at 06:16 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_eaglesaloon`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address`
--

CREATE TABLE `tbl_address` (
  `UserId` int(11) NOT NULL,
  `HouseNumber` varchar(11) DEFAULT NULL,
  `StreetAddress` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `District` varchar(255) NOT NULL,
  `Province` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_address`
--

INSERT INTO `tbl_address` (`UserId`, `HouseNumber`, `StreetAddress`, `City`, `District`, `Province`) VALUES
(7, '98', 'New Moor Street', 'Colombo 12', 'Colombo', 'Western'),
(8, '359', 'Serpentine Road', 'Colombo 08', 'Colombo', 'Western'),
(9, '359', 'Serpentine Road', 'Colombo 08', 'Colombo', 'Western'),
(10, 'NULL', '1st Flr Mansoor Bldg 53 Main Street', 'Colombo 11', 'Colombo', 'Western'),
(11, '121', 'Manning Place', 'Colombo 06', 'Colombo', 'Western'),
(13, '64', 'School Avenue, Off Station Road', 'Dehiwala', 'Colombo', 'Western'),
(14, '49/15', 'NAGAHAMULLA ROAD', 'BATTARAMULLA', 'Colombo', 'Western'),
(18, '2A 1/1', 'Ranjan Road, Off Station Road', 'Dankotuwa', 'Gampha', 'Western'),
(21, '', 'Galle Road', 'Kalutara', 'Kalutara', 'Western'),
(26, '12', 'Queens Rd', 'Colombo', '5', '23'),
(30, '25', 'Main street', 'Colombo 7', '5', '23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointments`
--

CREATE TABLE `tbl_appointments` (
  `AppointmentId` int(11) NOT NULL,
  `CustomerId` int(11) DEFAULT NULL,
  `EmployeeId` int(11) DEFAULT NULL COMMENT 'UserId',
  `Date` date DEFAULT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `AppointmentStatus` enum('Pending','Approved','WorkInProgress','Finished','Cancelled') DEFAULT 'Pending',
  `ReservationNumber` varchar(100) NOT NULL,
  `TotalPrice` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_appointments`
--

INSERT INTO `tbl_appointments` (`AppointmentId`, `CustomerId`, `EmployeeId`, `Date`, `StartTime`, `EndTime`, `AppointmentStatus`, `ReservationNumber`, `TotalPrice`) VALUES
(6, 13, 3, '2023-07-03', '12:00:00', '13:15:00', 'Finished', 'R64909f4f4bfd02023619', 1000),
(9, 13, 16, '2023-07-06', '12:14:00', '16:14:00', 'Finished', 'R6490a376f09c320230619', 14000),
(10, 13, 3, '2023-07-18', '12:50:00', '14:35:00', 'Finished', 'R6490a9aca5eca20230619', 4000),
(19, 13, 3, '2023-07-10', '14:56:00', '16:41:00', 'Finished', 'R6490b9e53565920230619', 4000),
(20, 26, 16, '2023-07-31', '11:22:00', '12:37:00', 'Finished', 'R64b03a676bb0120230713', 1000),
(23, 26, 23, '2023-08-01', '13:47:00', '15:27:00', 'Finished', 'R64b03fea270ab20230713', 2500),
(24, 13, 0, '2023-08-28', '15:37:00', '17:22:00', 'Pending', 'R64baf39b31a1420230721', 4000),
(25, 13, NULL, '2023-08-11', '13:20:00', '14:35:00', 'Pending', 'R64c3c7c85813520230728', 3000),
(26, 30, 3, '2023-08-14', '10:10:00', '11:25:00', 'Pending', 'R64c68813637cf20230730', 3000),
(27, 30, 3, '2024-01-02', '10:10:00', '15:25:00', 'WorkInProgress', 'R64cddc550f22e20230805', 11000),
(28, 13, NULL, '2023-10-04', '11:10:00', '12:25:00', 'Pending', 'R650601cce0fd920230916', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment_services`
--

CREATE TABLE `tbl_appointment_services` (
  `AppointmentId` int(11) NOT NULL,
  `ServiceId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_appointment_services`
--

INSERT INTO `tbl_appointment_services` (`AppointmentId`, `ServiceId`) VALUES
(6, 5),
(9, 1),
(9, 9),
(10, 11),
(19, 11),
(20, 5),
(21, 5),
(22, 5),
(23, 5),
(23, 14),
(24, 11),
(25, 13),
(26, 13),
(27, 5),
(27, 9),
(28, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment_services_products`
--

CREATE TABLE `tbl_appointment_services_products` (
  `AppointmentId` int(11) NOT NULL,
  `Sku` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_appointment_services_products`
--

INSERT INTO `tbl_appointment_services_products` (`AppointmentId`, `Sku`) VALUES
(6, 'INH-OHM-100'),
(6, 'INH-SHS-001'),
(10, 'INH-CBC-100'),
(10, 'INH-MHS-001'),
(10, 'INH-SHS-001'),
(19, 'INH-OHM-100'),
(19, 'INH-SHS-001'),
(19, 'INH-WCF-HNB'),
(27, 'INH-MHS-001'),
(27, 'INH-SHS-001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment_status`
--

CREATE TABLE `tbl_appointment_status` (
  `StatusId` int(11) NOT NULL,
  `StatusDescription` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendence`
--

CREATE TABLE `tbl_attendence` (
  `AttendanceId` int(5) NOT NULL,
  `EmpId` int(11) DEFAULT NULL COMMENT 'User Id',
  `AttDate` date DEFAULT NULL,
  `InTime` time DEFAULT NULL,
  `OutTime` time DEFAULT NULL,
  `TotalHours` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_attendence`
--

INSERT INTO `tbl_attendence` (`AttendanceId`, `EmpId`, `AttDate`, `InTime`, `OutTime`, `TotalHours`) VALUES
(1, 2, '2023-07-02', '10:12:00', '17:12:00', '7.00'),
(2, 2, '2023-07-03', '10:00:00', '18:22:00', '8.22'),
(3, 3, '2023-06-01', '09:56:00', '18:58:00', '9.20'),
(4, 3, '2023-06-02', '10:00:00', '18:02:00', '8.20'),
(5, 3, '2023-06-03', '09:59:00', '18:59:00', '9.00'),
(13, 3, '2023-06-04', '09:51:00', '18:02:00', '8.11'),
(25, 10, '2023-08-03', '02:15:27', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking_status`
--

CREATE TABLE `tbl_booking_status` (
  `StatusId` int(11) NOT NULL,
  `StatusDescription` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_courier`
--

CREATE TABLE `tbl_courier` (
  `CourierId` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `PhoneNumber` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_courier`
--

INSERT INTO `tbl_courier` (`CourierId`, `Name`, `PhoneNumber`, `Email`) VALUES
(1, 'DHL Express ServicePoint', '0315227805', 'Express@gmail.com'),
(2, 'DHLE Seeduwa', '0717546485', 'dhl@gmail.com'),
(3, 'City Enterprise', '0781085849', 'cend@gmail.com'),
(4, 'Pronto Lanka (Pvt) Ltd - Negombo', '0717758085', 'Pronto@gmail.com'),
(5, 'Domestic Courier Service', '0765463258', 'dcs@gmail.com'),
(6, 'Domex', '0726548541', 'Domex@ymail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_courier_status`
--

CREATE TABLE `tbl_courier_status` (
  `StatusId` int(11) NOT NULL,
  `StatusDescription` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `CustomerId` int(11) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `CusRegDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`CustomerId`, `UserId`, `CusRegDate`) VALUES
(2, 7, '2023-03-25'),
(3, 8, '2023-03-25'),
(4, 9, '2023-03-25'),
(5, 10, '2023-03-25'),
(6, 11, '2023-03-26'),
(8, 13, '2023-04-02'),
(9, 14, '2023-04-02'),
(11, 18, '2023-04-22'),
(14, 21, '2023-04-22'),
(15, 24, '2023-06-06'),
(16, 25, '2023-06-06'),
(17, 26, '2023-07-13'),
(18, 30, '2023-07-30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `DistrictCode` int(10) NOT NULL,
  `DistrictName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`DistrictCode`, `DistrictName`) VALUES
(1, 'Ampara'),
(2, 'Anuradhapura'),
(3, 'Badulla'),
(4, 'Batticaloa'),
(5, 'Colombo'),
(6, 'Galle'),
(7, 'Gampaha'),
(8, 'Hambantota'),
(9, 'Jaffna'),
(10, 'Kalutara'),
(11, 'Kandy'),
(12, 'Kegalle'),
(13, 'Kilinochchi'),
(14, 'Kurunegala'),
(15, 'Mannar'),
(16, 'Matale'),
(17, 'Matara'),
(18, 'Moneragala'),
(19, 'Mullaitivu'),
(20, 'Nuwara Eliya'),
(21, 'Polonnaruwa'),
(22, 'Puttalam'),
(23, 'Ratnapura'),
(24, 'Trincomalee'),
(25, 'Vavuniya');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employees`
--

CREATE TABLE `tbl_employees` (
  `EmployeeId` int(11) NOT NULL,
  `Designation` varchar(255) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `Nic` varchar(255) DEFAULT NULL,
  `JoiningDate` date DEFAULT NULL,
  `TotalAnnualLeave` int(10) NOT NULL,
  `TotalCasualLeave` int(10) NOT NULL,
  `QrCode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employees`
--

INSERT INTO `tbl_employees` (`EmployeeId`, `Designation`, `UserId`, `Nic`, `JoiningDate`, `TotalAnnualLeave`, `TotalCasualLeave`, `QrCode`) VALUES
(1, 'Manager', 1, '781288788V', '2019-03-06', 14, 7, NULL),
(2, 'Store Clark', 2, '851578985V', '2021-08-19', 14, 7, NULL),
(3, 'Stylist', 3, '951871721V', '2022-02-09', 14, 7, NULL),
(4, 'Front Desk', 4, '931578985V', '2019-11-28', 14, 7, NULL),
(5, 'Stylist', 16, '991824568V', '2022-07-21', 14, 7, NULL),
(6, 'Store Clark', 17, '200045265478', '2021-12-15', 14, 7, NULL),
(7, 'Stylist', 23, '857456987V', '2023-04-12', 10, 4, NULL),
(10, 'Stylist', 34, '955487569V', '2023-08-02', 7, 2, 'Employee4c996e10d289006f4bcaf805245aad8c.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_emp_role`
--

CREATE TABLE `tbl_emp_role` (
  `DesignationCode` varchar(20) NOT NULL,
  `Designation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_emp_role`
--

INSERT INTO `tbl_emp_role` (`DesignationCode`, `Designation`) VALUES
('Front Desk', 'Front Desk'),
('Manager', 'Manager'),
('Store Clark', 'Store Clark'),
('Stylist', 'Stylist');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faq`
--

CREATE TABLE `tbl_faq` (
  `FaqId` int(10) NOT NULL,
  `Question` varchar(255) NOT NULL,
  `Answer` text NOT NULL,
  `Status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_faq`
--

INSERT INTO `tbl_faq` (`FaqId`, `Question`, `Answer`, `Status`) VALUES
(1, 'Which stylist should I see?', 'All of the stylists at Salon Eagle are experienced, highly educated and extremely talented. Our stylists specialize in specific services, such as Keratin treatments and hair extensions, and vary in prices. We recommend speaking to one of our receptionists who can match you with a stylist that will suit your needs depending on your hair and budget.', '1'),
(2, 'If I need more than one service how should I book the appointment?', 'Our friendly staff will be happy to accommodate all of your needs when you book an appointment at our salon. Just let our receptionist know that you would like multiple services. It is very common for our guests to book their spa and waxing services in coordination with their hair appointment(s).', '1'),
(3, 'How do I know what I need for my first appointment?', 'If you are looking to completely change your look, or you are unsure and want to discuss all of your options, we recommend scheduling a consultation before your first appointment. During your consultation, your stylist will help you determine the best services for your hair type and texture, and you can set up a hair color appointment after the consultation. Our receptionist will be happy to assist you with any questions or concerns.', '1'),
(4, 'What should I do if I know I am going to run late?', 'Please call our salon at 773-880-5033 if you are running late for your appointment. Our receptionist will check with your esthetician or hair stylist to ensure you will still be able to receive your desired services in full.', '1'),
(5, 'What is Salon Envy’s cancellation policy,?', 'We understand that unexpected circumstances arise, and are happy to accommodate your needs. As a courtesy to our stylists and other guests, please call our salon if you need to reschedule your appointment. If you fail to call and cancel and you do not show up at your appointment time, you could incur a charge of 50% of the service cost to the card on file.', '1'),
(6, 'How far in advance should I book my appointment?', 'To ensure that your get the date and time that you need, we recommend booking your next appointment before you leave our salon. We also offer pre-booking specials for an extra incentive! Schedule your appointment at least a week or two in advance if you are a first time client and have specific days and times that work best for you. For our guests who are more flexible, we may be able to arrange same-day appointments.', '1'),
(7, 'What are the differences in levels of Eagle Salon stylists?', 'Our team works on a Level System, which his measured by experience and education.', '1'),
(8, 'How do I book my appointment on-line?', 'Visit our On-line Booking page and follow the instructions to request your appointment. Our receptionist will ensure that your chosen time slot is available. If that appointment time is unavailable, we will email you with other time options for you to choose from.', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inhouse_products_inventory`
--

CREATE TABLE `tbl_inhouse_products_inventory` (
  `InhouseProductId` int(10) NOT NULL,
  `InhouseProductName` varchar(100) NOT NULL,
  `Sku` varchar(20) NOT NULL,
  `InhouseProductQty` int(10) NOT NULL,
  `Issued` int(255) NOT NULL DEFAULT 0,
  `InhouseProductImage` varchar(255) NOT NULL,
  `InhouseProductDescription` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_inhouse_products_inventory`
--

INSERT INTO `tbl_inhouse_products_inventory` (`InhouseProductId`, `InhouseProductName`, `Sku`, `InhouseProductQty`, `Issued`, `InhouseProductImage`, `InhouseProductDescription`) VALUES
(4, 'Olive Body Lotion / Pump 400ml', 'INH-OBL-400', 9, 0, '645f7de96fe728.67945258.jpg', 'Anti-Aging Body Lotion'),
(5, 'Cocoa Body Cream – 100gm', 'INH-CBC-100', 10, 0, '649ac6156938b3.94545438.jpg', 'Ideal for deep moisturization, including overnight'),
(11, 'L&#039;Oreal Shampoo 100ml', 'INH-LOS-100', 15, 0, '649ac95eb7eb59.86073900.jpg', 'Cleanses and nourishes hair'),
(12, 'Redken Conditioner 250ml', 'INH-RKC-250', 20, 0, '64660eda921a87.00226906.jpg', 'Provides moisture and detangles hair'),
(13, 'Schwarzkopf Hair Spray', 'INH-SHS-001', 25, 0, '646612a2c57127.78213747.jpg', 'Holds hairstyles in place'),
(14, 'Garnier Hair Gel', 'INH-GHG-001', 30, 0, '6466131d09f771.64473876.jpg', 'Provides strong hold and adds shine'),
(15, 'Moroccanoil Hair Serum', 'INH-MHS-001', 12, 0, '6466142d525f83.56167250.jpg', 'Smooths frizz and adds shine'),
(16, 'Olaplex Hair Mask - 100ml', 'INH-OHM-100', 12, 0, '64661662446885.63122646.jpg', 'Deeply conditions and repairs damaged hair'),
(17, 'Wella Professionals -Color Fresh - Hair Color-inifinite orange', 'INH-WCF-HIO', 10, 0, '64661cda7b6e18.42159840.jpg', 'Color Fresh Create is an ammonia-free hair color with a complete semi-permanent expressive color pal'),
(18, 'Wella Professionals -Color Fresh - Hair Color-New Blue', 'INH-WCF-HNB', 12, 0, '64661d3b02a9e3.89513860.jpg', 'Color Fresh Create is an ammonia-free hair color with a complete semi-permanent expressive color pal'),
(19, 'Wella Professionals -Color Fresh - Hair Color-Ultra purple', 'INH-WCF-HUP', 10, 0, '64661d854e5fa3.70452115.jpg', 'Color Fresh Create is an ammonia-free hair color with a complete semi-permanent expressive color pal');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inhouse_products_stock`
--

CREATE TABLE `tbl_inhouse_products_stock` (
  `Id` int(10) NOT NULL,
  `Sku` varchar(200) NOT NULL,
  `SupplierId` int(15) NOT NULL,
  `SupplierProductPrice` decimal(50,0) NOT NULL,
  `Qty` int(11) NOT NULL COMMENT 'Received stock Qty',
  `SalePrice` decimal(25,0) NOT NULL,
  `ExpiryDate` date DEFAULT NULL,
  `AddDate` date NOT NULL COMMENT 'stocks AddDate',
  `Status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0-instock,1-out stock',
  `IssueQty` int(11) NOT NULL DEFAULT 0,
  `IssueLastDate` date DEFAULT NULL COMMENT 'Last Date of this stock Issue'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_inhouse_products_stock`
--

INSERT INTO `tbl_inhouse_products_stock` (`Id`, `Sku`, `SupplierId`, `SupplierProductPrice`, `Qty`, `SalePrice`, `ExpiryDate`, `AddDate`, `Status`, `IssueQty`, `IssueLastDate`) VALUES
(1, 'INH-OBL-400', 5, '1100', 10, '1300', '2024-05-14', '2023-05-03', '1', 0, NULL),
(2, 'INH-WCF-HIO', 1, '1500', 10, '1800', '2024-09-10', '2023-04-03', '1', 3, '2023-07-07'),
(3, 'INH-LOS-100', 2, '3000', 15, '3500', '2024-01-15', '2023-05-04', '1', 0, NULL),
(4, 'INH-RKC-250', 2, '3500', 20, '4700', '2024-06-25', '2023-05-04', '1', 1, '2023-07-07'),
(5, 'INH-SHS-001', 3, '2500', 25, '3000', '2024-01-05', '2023-05-07', '1', 3, '2023-07-07'),
(6, 'INH-GHG-001', 5, '1750', 30, '2250', '2024-06-07', '2023-05-05', '1', 0, NULL),
(7, 'INH-MHS-001', 2, '4500', 12, '5000', '2024-11-25', '2023-05-04', '1', 0, NULL),
(8, 'INH-OHM-100', 3, '5400', 12, '6100', '2024-12-31', '2023-05-09', '1', 1, '2023-07-07'),
(9, 'INH-WCF-HIO', 3, '5500', 10, '6100', '2024-04-25', '2023-05-04', '1', 0, NULL),
(10, 'INH-WCF-HNB', 3, '5800', 12, '6250', '2024-07-05', '2023-05-14', '1', 0, NULL),
(11, 'INH-WCF-HUP', 2, '5400', 10, '6000', '2024-08-24', '2023-05-10', '1', 8, '2023-07-07'),
(12, 'INH-OBL-400', 4, '1000', 100, '1250', '2024-03-31', '2023-08-05', '1', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leave`
--

CREATE TABLE `tbl_leave` (
  `LeaveId` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date DEFAULT NULL,
  `LeaveType` varchar(30) DEFAULT NULL,
  `Reason` varchar(60) NOT NULL,
  `AppliedLeaves` float NOT NULL,
  `UserId` int(11) NOT NULL,
  `LeaveStatus` enum('Pending','Approved','Rejected','Cancelled') NOT NULL,
  `AppliedDate` date NOT NULL,
  `UpdatedBy` int(11) DEFAULT NULL,
  `UpdatedDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_leave`
--

INSERT INTO `tbl_leave` (`LeaveId`, `StartDate`, `EndDate`, `LeaveType`, `Reason`, `AppliedLeaves`, `UserId`, `LeaveStatus`, `AppliedDate`, `UpdatedBy`, `UpdatedDate`) VALUES
(39, '2023-05-23', '2023-06-06', '2', 'test', 7, 2, 'Cancelled', '2023-04-30', NULL, NULL),
(49, '2023-05-11', '2023-05-11', '2', 'fever', 0.5, 2, 'Cancelled', '2023-05-03', NULL, NULL),
(53, '2023-05-05', '2023-05-07', '2', 'fever', 2.5, 2, 'Cancelled', '2023-05-04', NULL, NULL),
(60, '2023-05-16', '2023-05-17', '1', 'test', 1, 2, 'Approved', '2023-05-05', NULL, NULL),
(61, '2023-05-17', '2023-05-18', '2', 'test', 1, 2, 'Rejected', '2023-05-05', NULL, NULL),
(62, '2023-05-23', '2023-05-24', '2', 'test', 1, 2, 'Rejected', '2022-05-05', NULL, NULL),
(63, '2023-05-24', '2023-05-25', '2', 'test', 1, 2, 'Rejected', '2023-05-05', NULL, NULL),
(64, '2023-07-12', '2023-07-13', '2', 'test', 1, 2, 'Approved', '2023-05-05', NULL, NULL),
(65, '2023-05-24', '2023-05-25', '2', 'test', 1, 2, 'Rejected', '2023-05-05', NULL, NULL),
(74, '2023-05-24', '2023-05-25', '2', 'test', 1, 2, 'Cancelled', '2023-05-05', NULL, NULL),
(79, '2023-08-27', '2023-08-29', '2', 'Personal Reason', 3, 3, 'Approved', '2023-07-26', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leave_status`
--

CREATE TABLE `tbl_leave_status` (
  `StatusId` int(11) NOT NULL,
  `StatusDescription` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leave_types`
--

CREATE TABLE `tbl_leave_types` (
  `Id` int(10) NOT NULL,
  `LeaveTypes` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_leave_types`
--

INSERT INTO `tbl_leave_types` (`Id`, `LeaveTypes`) VALUES
(1, 'Casual Leave'),
(2, 'Annual Leave');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_online_products_inventory`
--

CREATE TABLE `tbl_online_products_inventory` (
  `OnlineProductId` int(10) NOT NULL,
  `OnlineProductName` varchar(255) NOT NULL,
  `Sku` varchar(20) NOT NULL,
  `OnlineProductOldPrice` decimal(10,0) NOT NULL COMMENT 'price view on website',
  `OnlineProductCurrentPrice` decimal(10,0) NOT NULL,
  `ProductQty` int(11) NOT NULL DEFAULT 0 COMMENT 'Total available Product Qty',
  `Issued` int(100) NOT NULL DEFAULT 0 COMMENT 'Total available Issued Product Qty',
  `OnlineProductImage` varchar(255) NOT NULL,
  `OnlineProductDescription` varchar(255) NOT NULL,
  `OnlineProductsShortDescription` varchar(255) NOT NULL,
  `OnlineProductsIsActive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_online_products_inventory`
--

INSERT INTO `tbl_online_products_inventory` (`OnlineProductId`, `OnlineProductName`, `Sku`, `OnlineProductOldPrice`, `OnlineProductCurrentPrice`, `ProductQty`, `Issued`, `OnlineProductImage`, `OnlineProductDescription`, `OnlineProductsShortDescription`, `OnlineProductsIsActive`) VALUES
(3, 'Nail Polish Removers', 'ONL-NPR-001', '1950', '1700', 21, 0, '6463c0338f7e03.39951911.png', 'A precious blend containing Almond oil, efficiently removes nail polish without streaking or staining. This acetone free formula moisturizes the nail bed and helps to shine and improve the nail condition. Nail Polish Remover provides superior performance', 'Extra strength. Non-whitening.\r\nRemoves lacquer, gel, gel polish, Shellac fast from natural nails.', 1),
(4, 'Nail Care Tools Premium', 'ONL-NCT-001', '1950', '1850', 10, 1, '6463c234ed0a15.83648124.png', 'Suitable for finger care, beauty salons and salons.\r\nMaterial: matte strip\r\nStrong resistance to breakage and durability.\r\nIt can quickly repair your nails and create a beautiful curved shape.', 'The basic tool for cosmetic nails before nail treatment, extension, and manicure procedures', 1),
(7, 'Nail Oil nourishing', 'ONL-NON-001', '2800', '2700', 10, 2, '64652a1661d3e7.55443136.png', 'Nourish dry nails and cuticles with this conditioning oil featuring an effective blend of nut and seed oils including mongongo nut, sesame, macadamia and mays corn germ oil to help moisturise and leave nails in optimal condition.\r\n\r\nDue to the use of acti', 'Allow your nails to grow long and strong with a blend of precious oils, and nourish the skin around the nails, giving you manicure prepped nails no matter the occasion.', 0),
(9, 'Glitter Nail Polish', 'ONL-GNP-001', '950', '880', 20, 0, '64652e4fc2fc02.75780409.png', '21 Toxins FREE:\r\nThis Viana Nail Polish is the first 21 harsh toxins or chemicals Free in Sri Lanka (Formaldehyde, Toluene, Formaldehyde Resin, Dibutyl Phthalate (DBP), camphor, xylene, parabens,fragrances, phthalates and animal ingredients). Making it 10', 'A Viana Nail Polish with a Shimmery, Diamond Shine Effect', 1),
(10, 'Nail Care Clipper', 'ONL-NCC-011', '850', '800', 10, 0, '646530b12616b6.35391417.png', 'Viana Tools brings you a Nail Clipper designed for easy trimming of toenails and toenail care from the comfort of your home. This Nail Clipper is hand crafted at international standards to ensure high functionality, stability and resilience. Your Viana Na', 'Curved Edge for Effective Shaping\r\n\r\nComfortable Ergonomic Grip\r\n\r\nStainless Steel 402', 1),
(11, 'Nail Loose Glitter', 'ONL-NLG-001', '3650', '3600', 5, 0, '6465b26508d6c2.50293709.png', 'This beautiful holographic rose gold glitter mix is our best selling glitter for nails.  It has a gorgeous warm red gold hue that looks amazing with autumn nail colours as well as bright summer nail designs.\r\n\r\nColour: Holo Rose Gold Nail Glitter (Pinky h', 'This beautiful holographic rose gold glitter mix is our best selling glitter for nails.', 1),
(12, 'Nail Domed Pearls', 'ONL-NDP-014', '2150', '2100', 11, 0, '6465b44c205c83.92051926.png', 'Nail Brightness buffing cream contains cultured pearls powder. The mother of pearl is a mixture of calcium carbonate crystals (or aragonite, source of several trace elements and sea proteins), and “conchioline” an organic substance close to Keratin. When ', 'Buffing the nail is a “savoir être”. It sublimates the sparkle of the nails.', 1),
(13, 'HEEL RENAISSANCE – Mask for feet', 'ONL-HER-075', '4000', '3750', 22, 0, '6465ba7b7a89d0.59923354.jpg', 'A cream enriched with urea, a component found naturally in the skin, which favors the process of natural exfoliation and cellular renewal. Its acts together with cotton oil for optimal hydration and provides immediate relief for skin that is very dry, par', 'Reduces calluses and soothes dry skin', 1),
(14, 'LE TALC – Silky Talcum Powder', 'ONL-SLP-050', '4500', '4300', 9, 0, '6465c53c9a0613.64663769.png', 'An age-old gesture, a finely ground texture enriched with kaolin (a natural source of trace elements) creates a second skin over the epidermis layer and provides a double action: an antiseptic and parasite protection and an anti-inflammatory to soothe ove', 'Using the Talcum Powder is an elegant moment of intimacy…', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_online_products_stock`
--

CREATE TABLE `tbl_online_products_stock` (
  `Id` int(50) NOT NULL,
  `Sku` varchar(200) NOT NULL,
  `SupplierId` int(15) NOT NULL,
  `SupplierProductPrice` decimal(50,0) NOT NULL,
  `Qty` int(11) NOT NULL,
  `SalePrice` decimal(25,0) NOT NULL,
  `ExpiryDate` date DEFAULT NULL,
  `AddDate` date NOT NULL COMMENT 'stocks AddDate',
  `Status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0-instock,1-out stock	',
  `IssueQty` int(50) NOT NULL DEFAULT 0,
  `IssueLastDate` date DEFAULT NULL,
  `reorder` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_online_products_stock`
--

INSERT INTO `tbl_online_products_stock` (`Id`, `Sku`, `SupplierId`, `SupplierProductPrice`, `Qty`, `SalePrice`, `ExpiryDate`, `AddDate`, `Status`, `IssueQty`, `IssueLastDate`, `reorder`) VALUES
(1, 'ONL-NPR-001', 3, '2000', 15, '2500', '2024-08-01', '2023-07-04', '1', 4, '2023-08-05', NULL),
(2, 'ONL-NCT-001', 2, '1150', 10, '1850', '2024-05-10', '2023-07-04', '0', 10, '2023-08-05', 20),
(3, 'ONL-NON-001', 3, '2150', 10, '2700', '2024-07-25', '2023-07-04', '1', 4, '2023-08-03', 20),
(4, 'ONL-GNP-001', 4, '680', 20, '880', '2024-09-12', '2023-07-04', '0', 20, '2023-08-05', 15),
(5, 'ONL-NCC-011', 5, '760', 10, '800', '0000-00-00', '2023-07-04', '1', 0, NULL, 15),
(6, 'ONL-NLG-001', 1, '3000', 5, '3500', '0000-00-00', '2023-07-04', '1', 0, NULL, 10),
(7, 'ONL-NDP-014', 2, '2000', 5, '2100', '0000-00-00', '2023-07-04', '1', 3, NULL, 3),
(8, 'ONL-HER-075', 4, '3500', 10, '3750', '2024-09-20', '2023-07-04', '1', 1, '2023-07-29', 5),
(9, 'ONL-SLP-050', 3, '4000', 9, '4300', '2024-03-20', '2023-07-04', '1', 1, '2023-07-29', 5),
(13, 'ONL-HER-075', 2, '1800', 12, '2000', '2024-10-19', '2023-10-06', '1', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `OrderId` int(11) NOT NULL,
  `UserId` int(11) DEFAULT NULL COMMENT 'User ID',
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `HouseNumber` varchar(10) DEFAULT NULL,
  `StreetAddress` varchar(10) NOT NULL,
  `City` varchar(25) NOT NULL,
  `District` varchar(30) NOT NULL,
  `Province` varchar(30) NOT NULL,
  `Phone` int(12) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Notes` longtext DEFAULT NULL,
  `Date` date DEFAULT NULL COMMENT 'ordered date',
  `TotalQuantity` int(100) NOT NULL COMMENT 'total Quantity of product ordered',
  `TotalAmount` decimal(50,0) NOT NULL COMMENT 'Total price of the order',
  `OrderStatus` enum('OrderProcessing','Shipped','Completed','Cancelled','PendingReturn','ReturnInProgress','Returned') DEFAULT 'OrderProcessing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`OrderId`, `UserId`, `FirstName`, `LastName`, `HouseNumber`, `StreetAddress`, `City`, `District`, `Province`, `Phone`, `Email`, `Notes`, `Date`, `TotalQuantity`, `TotalAmount`, `OrderStatus`) VALUES
(1, 13, 'Gaya', 'Russell', '64', 'School Ave', 'Dehiwala', 'Colombo', 'Western', 726139988, 'smooth.aravinth@gmail.com', NULL, '2023-07-11', 0, '4550', 'Shipped'),
(5, 13, 'Gaya', 'Russell', '64', 'School Ave', 'Dehiwala', 'Colombo', 'Western', 726139988, 'smooth.aravinth@gmail.com', NULL, '2023-07-13', 0, '4550', 'OrderProcessing'),
(6, 13, 'Gaya', 'Russell', '64', 'School Ave', 'Dehiwala', 'Colombo', 'Western', 776139881, 'smooth.aravinth@gmail.com', '', '2023-07-28', 0, '8050', 'Cancelled'),
(7, 13, 'Gaya', 'Russell', '64', 'School Ave', 'Dehiwala', 'Colombo', 'Western', 776139881, 'smooth.aravinth@gmail.com', '', '2023-07-28', 0, '8050', 'Cancelled'),
(8, 13, 'Gaya', 'Russell', '64', 'School Ave', 'Dehiwala', 'Colombo', 'Western', 776139881, 'smooth.aravinth@gmail.com', '', '2023-07-28', 0, '8050', 'Shipped'),
(9, 13, 'Gaya', 'Russell', '64', 'School Ave', 'Dehiwala', 'Colombo', 'Western', 776139881, 'smooth.aravinth@gmail.com', '', '2023-07-29', 1, '4630', 'OrderProcessing'),
(10, 30, 'Nushra', 'Fatima', '25', 'Main stree', 'Colombo 7', '5', '23', 771587456, 'Nushra@gmail.com', '', '2023-08-05', 1, '3460', 'OrderProcessing'),
(11, 30, 'Nushra', 'Fatima', '25', 'Main stree', 'Colombo 7', '5', '23', 771587456, 'Nushra@gmail.com', '', '2023-08-05', 1, '5160', 'Shipped'),
(12, 30, 'Nushra', 'Fatima', '25', 'Main stree', 'Colombo 7', '5', '23', 771587456, 'Nushra@gmail.com', '', '2023-08-05', 1, '6040', 'Shipped'),
(13, 30, 'Nushra', 'Fatima', '25', 'Main stree', 'Colombo 7', '5', '23', 771587456, 'Nushra@gmail.com', '', '2023-08-05', 1, '7890', 'Shipped');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders_product`
--

CREATE TABLE `tbl_orders_product` (
  `OrderProductId` int(11) NOT NULL,
  `OrderId` int(11) DEFAULT NULL,
  `ProductId` int(11) DEFAULT NULL COMMENT 'Online inventory products SKU',
  `ItemQuantity` int(11) DEFAULT NULL COMMENT 'requested Item Quantity',
  `ItemPrice` decimal(65,0) NOT NULL,
  `SubTotal` decimal(18,2) DEFAULT NULL,
  `IssuedDate` date DEFAULT NULL,
  `IssueQty` int(11) DEFAULT NULL COMMENT 'Issued Item Quantity',
  `IssuedStatus` enum('Pending','Issued') NOT NULL DEFAULT 'Pending',
  `IssuedBy` int(100) DEFAULT NULL,
  `CreatedDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_orders_product`
--

INSERT INTO `tbl_orders_product` (`OrderProductId`, `OrderId`, `ProductId`, `ItemQuantity`, `ItemPrice`, `SubTotal`, `IssuedDate`, `IssueQty`, `IssuedStatus`, `IssuedBy`, `CreatedDate`) VALUES
(1, 1, 4, 1, '1850', '1850.00', '2023-07-13', 1, 'Issued', 2, '2023-07-11'),
(2, 1, 7, 2, '2700', '2700.00', '2023-07-13', 2, 'Issued', 2, '2023-07-11'),
(9, 5, 10, 1, '800', '800.00', NULL, NULL, 'Pending', NULL, '2023-07-13'),
(10, 5, 13, 1, '3750', '3750.00', NULL, NULL, 'Pending', NULL, '2023-07-13'),
(11, 6, 14, 1, '4300', '4300.00', NULL, NULL, 'Pending', NULL, '2023-07-28'),
(12, 6, 13, 1, '3750', '3750.00', NULL, NULL, 'Pending', NULL, '2023-07-28'),
(13, 7, 14, 1, '4300', '4300.00', NULL, NULL, 'Pending', NULL, '2023-07-28'),
(14, 7, 13, 1, '3750', '3750.00', NULL, NULL, 'Pending', NULL, '2023-07-28'),
(15, 8, 14, 1, '4300', '4300.00', '2023-07-29', 1, 'Issued', 2, '2023-07-28'),
(16, 8, 13, 1, '3750', '3750.00', '2023-07-29', 1, 'Issued', 2, '2023-07-28'),
(17, 9, 13, 1, '3750', '3750.00', NULL, NULL, 'Pending', NULL, '2023-07-29'),
(18, 10, 3, 1, '1700', '1700.00', NULL, NULL, 'Pending', NULL, '2023-08-05'),
(19, 11, 3, 17, '1700', '1700.00', '2023-08-05', 3, 'Issued', 2, '2023-08-05'),
(20, 12, 9, 20, '880', '880.00', '2023-08-05', 20, 'Issued', 2, '2023-08-05'),
(21, 13, 4, 9, '1850', '1850.00', '2023-08-05', 9, 'Issued', 2, '2023-08-05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_status`
--

CREATE TABLE `tbl_order_status` (
  `StatusId` int(11) NOT NULL,
  `StatusDescription` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order_status`
--

INSERT INTO `tbl_order_status` (`StatusId`, `StatusDescription`) VALUES
(1, 'ordered'),
(2, 'cancelled'),
(3, 'shipped');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payments`
--

CREATE TABLE `tbl_payments` (
  `PaymentId` int(11) NOT NULL,
  `OrderId` int(100) DEFAULT NULL,
  `AppointmentId` int(11) DEFAULT NULL,
  `PaymentAmount` decimal(50,0) DEFAULT NULL,
  `PaymentMethod` enum('cash','bankDeposit','front') DEFAULT NULL,
  `PaymentSlip` varchar(256) DEFAULT NULL,
  `PaidDate` date DEFAULT NULL,
  `Status` enum('Pending','Paid') NOT NULL DEFAULT 'Pending',
  `updatedBy` int(10) DEFAULT NULL COMMENT 'User Id',
  `updatedDate` date DEFAULT NULL COMMENT 'payment updated date'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_payments`
--

INSERT INTO `tbl_payments` (`PaymentId`, `OrderId`, `AppointmentId`, `PaymentAmount`, `PaymentMethod`, `PaymentSlip`, `PaidDate`, `Status`, `updatedBy`, `updatedDate`) VALUES
(1, 1, NULL, '4550', 'front', NULL, '0000-00-00', 'Paid', NULL, NULL),
(2, 5, NULL, '4550', 'bankDeposit', '64af81ed503e57.83446438.png', '2023-07-13', 'Paid', NULL, NULL),
(3, 6, NULL, '8050', 'cash', NULL, '0000-00-00', 'Paid', NULL, NULL),
(4, 7, NULL, '8050', 'front', NULL, '0000-00-00', 'Paid', NULL, NULL),
(5, 8, NULL, '8050', 'cash', NULL, '0000-00-00', 'Paid', NULL, NULL),
(6, 9, NULL, '4630', 'cash', NULL, '0000-00-00', 'Paid', NULL, NULL),
(7, 10, NULL, '3460', 'bankDeposit', '64cde3150521c2.55878415.jpg', '2023-08-05', 'Pending', NULL, NULL),
(8, 11, NULL, '5160', 'front', NULL, '0000-00-00', 'Pending', NULL, NULL),
(9, 12, NULL, '6040', 'front', NULL, '0000-00-00', 'Pending', NULL, NULL),
(10, 13, NULL, '7890', 'cash', NULL, '0000-00-00', 'Pending', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payments_history`
--

CREATE TABLE `tbl_payments_history` (
  `payment_history_id` int(100) NOT NULL COMMENT 'identifier for the payment history record',
  `payment_id` int(100) NOT NULL COMMENT 'Foreign key to the Payments table',
  `payment_status` enum('Pending','Completed','Declined') DEFAULT NULL COMMENT 'Payment status',
  `payment_notes` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_status`
--

CREATE TABLE `tbl_payment_status` (
  `StatusId` int(11) NOT NULL,
  `StatusDescription` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_privacy`
--

CREATE TABLE `tbl_privacy` (
  `PrivacyId` int(10) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Content` text NOT NULL,
  `AddDate` date NOT NULL,
  `AddUser` int(11) NOT NULL,
  `UpdateDate` date DEFAULT NULL,
  `UpdateUser` int(11) DEFAULT NULL,
  `Status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_privacy`
--

INSERT INTO `tbl_privacy` (`PrivacyId`, `Title`, `Content`, `AddDate`, `AddUser`, `UpdateDate`, `UpdateUser`, `Status`) VALUES
(1, 'The Ambit of Privacy Policy', 'While you are using website’s service, the website collects identifiable personal information. The privacy policy includes how the website processes these identifiable personal information, and does not apply to related linked websites outside the website, nor to those who are not entrusted or involved in the management of the website.', '2023-04-10', 1, '2023-07-27', 1, '1'),
(2, 'The Collection, Process and Use of Personal Data', 'When you visit the website or use the services provided by the website, we will ask you to provide necessary personal information with regards to the service essence, and only process and use your personal information within specific purpose and ambit; the website will not use your personal data for other purposes without your agreement.\r\n\r\nThe website will keep your name, email address, contact information and usage time while you use interactive functions such as service mailbox or questionnaires.\r\n\r\nDuring browsing, the website will automatically keep records of equipment’s IP address, usage time, browser type and browsing history, etc. All those records are for internal application traffic analysis only, will not be published, not be associated with specific individual, and will not be analyzed for specific record.\r\n\r\nIn order to provide accurate services, we will analyze collected questionnaires and data. Except for internal research, the analysis result of statistical data or explanatory will be published without involving any specific individual information if necessary.', '2023-04-10', 1, '2023-04-10', 1, '1'),
(3, 'The Protection of Data', 'We endeavor to protect the website and your personal information with reasonable technology, procedures and related information security equipment and necessary measures. Only authorized personnel can access your personal data. All of related personnel will sign confidentiality contract, and will be subject to related legal actions if violating the confidentiality obligations.\r\n\r\nWhen it is necessary to entrust other organizations to provide services due to business needs, the website will request those organizations to take appropriate security maintenance measures and comply the confidentiality obligations. We will take every necessary inspection procedures to ensure those measures and obligations will be complied.', '2023-04-11', 1, NULL, NULL, '1'),
(4, 'Link to Other Sites', 'This privacy policy and other notices of the website are only applicable to the website.The website provide links to other websites, and you can access other websites by clicking links from the website. However, the linked websites may not be subject to this privacy policy of the website, you must refer to the privacy policy of those linked websites', '2023-04-11', 1, NULL, NULL, '1'),
(5, 'Sharing Personal Information with Third Party', 'This website will never provide, exchange, rent or sell any of your personal data to other individuals, groups, private companies or public authorities, except where there is a legal basis or contractual obligations.\r\n\r\nThe circumstances of the preceding paragraph include but are not limited to:\r\n1.By your consent.\r\n2.By law obligations.\r\n3.To avoid the danger of your life, body, freedom or property.\r\n4.To collaborate with public agencies or academic research institutions, due to the necessary of statistical or academic research based on public interest, and the data which is processed by the provider or the collector cannot identify the particular party in the manner in which it is disclosed.\r\n5.To identify, contact or take legal actions through the website administrator’s analysis, due to your activities on the website violate the Terms of Service or may harm or hinder the website other user rights or cause harm to anyone.\r\n6.To conducive to your rights and interests.\r\n7.When the commissioned vendor of the website is asked to assist in the collection, processing or use of your personal data, it will be responsible for the supervision and management of the subcontractor or individual.', '2023-04-11', 1, NULL, NULL, '1'),
(6, 'Use of Cookies', 'In order to provide you with the best service, the website will place and access our cookies on your computer. If you do not accept cookies, you can set the privacy level in your browser privacy settings such as high, or through the browser&#039;s cancellation or limitation of this feature. You can refuse cookies, but may lead to some features of the website cannot be executed normally.', '2023-04-11', 1, NULL, NULL, '1'),
(7, 'Amendment to Privacy Policy', 'We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.', '2023-04-11', 1, NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_requests`
--

CREATE TABLE `tbl_product_requests` (
  `RequestId` int(100) NOT NULL,
  `RequestUser` int(255) NOT NULL COMMENT 'Employee User Id',
  `RequestedQty` int(100) NOT NULL DEFAULT 0 COMMENT 'The total quantity requested for the request',
  `IssuedQty` int(25) NOT NULL DEFAULT 0 COMMENT 'The total quantity Issued from the request till	',
  `OrderedDate` date NOT NULL,
  `RequestedDate` date DEFAULT NULL,
  `Status` enum('Pending','Issued') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product_requests`
--

INSERT INTO `tbl_product_requests` (`RequestId`, `RequestUser`, `RequestedQty`, `IssuedQty`, `OrderedDate`, `RequestedDate`, `Status`) VALUES
(1, 3, 0, 0, '2023-06-29', '2023-06-29', 'Issued'),
(4, 3, 0, 0, '2023-06-29', '2023-07-05', 'Issued'),
(5, 3, 0, 0, '2023-06-29', '2023-07-18', 'Pending'),
(6, 3, 2, 0, '2023-07-29', '2023-08-06', 'Pending'),
(7, 3, 1, 0, '2023-08-05', '2023-08-22', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_requests_products`
--

CREATE TABLE `tbl_product_requests_products` (
  `Id` int(50) NOT NULL,
  `RequestId` int(255) NOT NULL,
  `Sku` varchar(255) NOT NULL,
  `Qty` int(11) NOT NULL DEFAULT 0,
  `Status` enum('Pending','Issued') NOT NULL DEFAULT 'Pending',
  `IssueQty` int(11) DEFAULT NULL,
  `FulfilledDate` date DEFAULT NULL,
  `FulfilledBy` int(11) DEFAULT NULL COMMENT 'employee''s user id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product_requests_products`
--

INSERT INTO `tbl_product_requests_products` (`Id`, `RequestId`, `Sku`, `Qty`, `Status`, `IssueQty`, `FulfilledDate`, `FulfilledBy`) VALUES
(1, 1, 'INH-SHS-001', 1, 'Issued', 1, '2023-07-06', 2),
(2, 4, 'INH-OHM-100', 1, 'Issued', 1, '2023-07-07', 2),
(3, 4, 'INH-RKC-250', 1, 'Issued', 1, '2023-07-07', 2),
(4, 4, 'INH-SHS-001', 1, 'Issued', 1, '2023-07-07', 2),
(5, 4, 'INH-WCF-HIO', 1, 'Issued', 1, '2023-07-07', 2),
(6, 4, 'INH-WCF-HUP', 1, 'Issued', 1, '2023-07-07', 2),
(7, 5, 'INH-GHG-001', 1, 'Pending', NULL, NULL, NULL),
(8, 5, 'INH-MHS-001', 1, 'Pending', NULL, NULL, NULL),
(9, 5, 'INH-OBL-400', 1, 'Pending', NULL, NULL, NULL),
(10, 6, 'INH-SHS-001', 1, 'Pending', NULL, NULL, NULL),
(11, 6, 'INH-OHM-100', 1, 'Pending', NULL, NULL, NULL),
(12, 7, 'INH-CBC-100', 1, 'Pending', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_province`
--

CREATE TABLE `tbl_province` (
  `Id` int(20) NOT NULL,
  `ProvinceName` varchar(100) NOT NULL,
  `DistrictCode` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_province`
--

INSERT INTO `tbl_province` (`Id`, `ProvinceName`, `DistrictCode`) VALUES
(1, 'Central', 11),
(2, 'Central', 16),
(3, 'Central', 20),
(4, 'Eastern', 1),
(5, 'Eastern', 4),
(6, 'Eastern', 24),
(7, 'North Central', 2),
(8, 'North Central', 21),
(9, 'North Western', 14),
(10, 'North Western', 22),
(11, 'Northern', 9),
(12, 'Northern', 13),
(13, 'Northern', 19),
(14, 'Northern', 25),
(15, 'Northern', 15),
(16, 'Sabaragamuwa', 12),
(17, 'Sabaragamuwa', 23),
(18, 'Southern', 6),
(19, 'Southern', 17),
(20, 'Southern', 8),
(21, 'Uva', 3),
(22, 'Uva', 18),
(23, 'Western', 5),
(24, 'Western', 7),
(25, 'Western', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_refund`
--

CREATE TABLE `tbl_refund` (
  `RefundId` int(11) NOT NULL,
  `ProductId` int(10) DEFAULT NULL,
  `RequestedDate` date DEFAULT NULL COMMENT 'Refund RequestedDate',
  `OrderId` int(11) DEFAULT NULL,
  `Reason` varchar(255) DEFAULT NULL,
  `Qty` int(10) DEFAULT NULL,
  `ItemPrice` decimal(65,2) DEFAULT NULL,
  `Status` enum('Pending','Reject','Approved','Issued') NOT NULL DEFAULT 'Pending',
  `IssuedUser` int(20) DEFAULT NULL COMMENT 'User ID',
  `IssuedDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_refund`
--

INSERT INTO `tbl_refund` (`RefundId`, `ProductId`, `RequestedDate`, `OrderId`, `Reason`, `Qty`, `ItemPrice`, `Status`, `IssuedUser`, `IssuedDate`) VALUES
(1, 4, '2023-08-02', 1, 'Defective Product', 1, '1850.00', 'Reject', NULL, NULL),
(2, 7, '2023-08-02', 1, 'Defective Product', 2, '2700.00', 'Issued', 2, '2023-08-03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_refund_status`
--

CREATE TABLE `tbl_refund_status` (
  `StatusId` int(11) NOT NULL,
  `StatusDescription` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `ReviewId` int(11) NOT NULL,
  `CustomerId` int(11) DEFAULT NULL,
  `Message` varchar(255) DEFAULT NULL,
  `Ratings` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_saloon_contact`
--

CREATE TABLE `tbl_saloon_contact` (
  `ContactId` int(11) NOT NULL,
  `PhoneNumber` int(50) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `AddressLine` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_saloon_contact`
--

INSERT INTO `tbl_saloon_contact` (`ContactId`, `PhoneNumber`, `Email`, `AddressLine`, `City`) VALUES
(1, 774565470, 'admin@eagle.com', 'Sea street', 'Colomob 5');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `ServiceId` int(11) NOT NULL,
  `ServiceName` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Duration` int(11) NOT NULL,
  `ServiceImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`ServiceId`, `ServiceName`, `Description`, `Price`, `Duration`, `ServiceImage`) VALUES
(1, 'Basic Facial Treatment', 'If you&#039;re thinking about a standard facial—usually a deep cleaning, followed by some kind of pimple/blemish extraction, a massage and steam treatment, a mask or peel, and a final application of some type of.', 9000, 90, '64bea779213b50.42840491.jpg'),
(5, 'Nail art', 'Nail art is a creative way to paint, decorate, enhance, and embellish nails. It is a type of artwork that can be done on fingernails and toenails, usually after manicures or pedicures. As time progresses, some people no longer stick to one color on their', 1000, 45, '64315720d1c4e5.51009123.jpg'),
(9, 'makeup', 'This service only includes makeup that you can wear to a party, event, or other special occasion.\r\nPrices are mentioned here for working hours. Working hours are from 8 am to 7 pm.', 5000, 120, '64315d9119dd41.21545000.jpg'),
(11, 'Pedicure', 'A pedicure is a comprehensive treatment of your feet and is suitable for both men and women. It involves cutting, trimming and shaping your toenails, tending to your cuticles, exfoliating, hydrating and massaging your feet, and, if desired, painting your ', 4000, 75, '64315b38468ff9.16444920.jpg'),
(13, 'Full Leg waxing', 'This wax includes everything from mid-way up the thigh downwards. It also normally includes the feet and toes. Full leg wax. This wax includes everything from the tops of the thighs down to your toes! \r\n\r\nConsidered one of the most popular wax services am', 3000, 45, '64315c1de1ac56.54246775.jpg'),
(14, 'Full face Threading', 'Threading only removes hair, not skin, and because it is so exact, it can remove hairs that are finer than those that can be removed by waxing or plucking.Much like waxing, threading generally lasts two to four weeks, but this depends on your hair type.', 1500, 25, '64315c6a2528a3.87500526.jpg'),
(15, 'Full Dressing', 'Hair styling, make-up, and saree draping are all part of the full-service dressing experience. Prices are mentioned here for working hours. Working hours are from 8 am to 7 pm.', 10000, 165, '64315d31bfeac2.25321700.jpg'),
(16, 'French Manicure', 'The only difference is nail color application. We add french nail colour application at the end of your regular manicure.\r\n\r\nThis technique involves painting the tip of the nail white while the rest is left clear, and is typically applied to long nails fi', 3500, 45, '64315e8c221366.12117122.jpg'),
(17, 'Conditioner Treatment', 'Deep conditioning is a procedure in which your hair is coated and treated with nourishing products. It restores your hair&#039;s moisture, strengthens it and reduces the damage caused to it by chemicals and styling products.\r\n\r\nWhether you have dry hair, ', 4500, 60, '64315f2da8bbf4.88857746.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services_status`
--

CREATE TABLE `tbl_services_status` (
  `StatusId` int(11) NOT NULL,
  `StatusDescription` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipment`
--

CREATE TABLE `tbl_shipment` (
  `ShipmentId` int(11) NOT NULL,
  `CourierId` int(11) DEFAULT NULL,
  `CusId` int(11) DEFAULT NULL,
  `ShipmentDate` date DEFAULT NULL,
  `ShipmentTime` time DEFAULT NULL,
  `DeliveredDate` date DEFAULT NULL,
  `ProductsId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suppliers`
--

CREATE TABLE `tbl_suppliers` (
  `SupplierId` int(11) NOT NULL,
  `SupplierName` varchar(255) DEFAULT NULL,
  `SupplierPhone` varchar(255) DEFAULT NULL,
  `SupplierEmail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_suppliers`
--

INSERT INTO `tbl_suppliers` (`SupplierId`, `SupplierName`, `SupplierPhone`, `SupplierEmail`) VALUES
(1, 'AUSHADA LANKA PVT LTD', '0713245698', 'aushada@gmail.com'),
(2, 'B R MOTIVATION PVT LTD', '0355647565', 'brn@export.lk'),
(3, 'BIO EXTRACTS PVT LTD', '0118546327', 'extracts@sales.lk'),
(4, 'GAMPAHA WICKRAMARACHCHI SI.A.CO. PVT LTD', '0758542367', 'sia@sales.lk'),
(5, 'EURO COSMETICS PVT LTD', '0765647985', 'euro@sales.lk');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suppliers_products`
--

CREATE TABLE `tbl_suppliers_products` (
  `SupplierProductsId` int(10) NOT NULL,
  `SupplierId` int(11) DEFAULT NULL,
  `Sku` varchar(11) DEFAULT NULL,
  `SupplierProductPrice` decimal(65,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_suppliers_products`
--

INSERT INTO `tbl_suppliers_products` (`SupplierProductsId`, `SupplierId`, `Sku`, `SupplierProductPrice`) VALUES
(1, 5, 'INH-OBL-400', '3100'),
(3, 5, 'INH-CBC-100', '100'),
(9, 3, 'ONL-NPR-001', '1500'),
(10, 3, 'ONL-NCT-001', '1150'),
(11, 4, 'ONL-NON-001', '2150'),
(12, 2, 'ONL-GNP-001', '680'),
(13, 2, 'ONL-NCC-011', '760'),
(14, 5, 'ONL-NLG-001', '3200'),
(15, 4, 'ONL-NDP-014', '2000'),
(16, 2, 'ONL-HER-075', '3500'),
(17, 2, 'ONL-SLP-050', '4000'),
(18, 1, 'INH-LOS-100', '3000'),
(19, 1, 'INH-RKC-250', '3500'),
(20, 2, 'INH-SHS-001', '2500'),
(21, 5, 'INH-GHG-001', '1750'),
(22, 1, 'INH-MHS-001', '4500'),
(23, 1, 'INH-OHM-100', '5400'),
(24, 1, 'INH-WCF-HIO', '5500'),
(25, 1, 'INH-WCF-HNB', '5800'),
(26, 1, 'INH-WCF-HUP', '5400');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_terms`
--

CREATE TABLE `tbl_terms` (
  `TermId` int(10) NOT NULL,
  `TermTitle` varchar(100) NOT NULL,
  `TermContent` text NOT NULL,
  `Status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_terms`
--

INSERT INTO `tbl_terms` (`TermId`, `TermTitle`, `TermContent`, `Status`) VALUES
(1, 'Legal Disclaimer', 'The material provided on this site (www.lankaprincess.com) is provided by way of information only. It is not and does not purport to be legal or other advice. While we endeavor to ensure that the contents of the site are accurate, errors or omissions may occur and we do not accept any liability in respect of them.\r\n\r\nAny links provided on the site are provided for your convenience – their inclusion does not imply any approval or endorsement by us. We have no control over the content of those sites and accept no responsibility or liability in respect of them.', '1'),
(2, 'No Warrarnties', 'This website is provided “as is” without any representations or warranties, express or implied. The Salon makes no representations or warranties in relation to this website or the information and materials provided on this website. Without prejudice to the generality of the foregoing paragraph, The Salon does not warrant that:\r\nthis website will be constantly available, or available at all; or the information on this website is complete, true, accurate or non-misleading.\r\nNothing on this website constitutes, or is meant to constitute, advice of any kind. If you require advice in relation to any legal, financial or medical matter you should consult an appropriate professional.', '1'),
(3, 'Ownership of Site Agreement to Terms of Use', 'A terms of use agreement should state under which country and state or province laws the website aims to operate. In the event of a legal dispute, this can be especially important for websites representing businesses with international reach, as complications arise when a site facilitates transactions and other interactions among people from different countries.\r\n\r\nA “governing law clause” or “choice of law provision” in a terms of use agreement merely expresses a preference for which laws will apply to the website’s activity, but courts do tend to value these declarations and treat them favorably. While courts examine the issue from all angles in a dispute, a governing law clause can be an important factor.\r\n\r\n', '1'),
(4, 'Provision of Services', 'provision of services. Subject to the terms and conditions of this Agreement, MST will provide Customer with the Service, during the term of this Agreement. In addition, MST grants Customer a personal, non-sub licensable, nonexclusive, nontransferable, limited license to internally use the Service for the purposes for which they are provided. “End of Availability” MST may, at its discretion, decide to stop Software Services from time to time (“End of Availability”). MST shall post notice of End of Availability, including the last date of general commercial availability of the affected Software and the timeline for discontinuing Services. “Purchase Requirements” Customer may purchase initial Services only for the most current, generally available release of the Software. Except as otherwise provided in the applicable price list, the minimum term for any Services offering is one year. These Service and Subscription Terms and Conditions will automatically update to MST at xxxx://xxx.xx- technology/files/support_downloads/support_terms_conditions.pdf upon any renewal of Services. “Exclusions”', '1'),
(5, 'Accounts, Passwords and Security', ' You must be a registered user to access the Service. You are responsible for keeping your password secure. You will be solely responsible and liable for any activity that occurs under your user name. If you lose your password or the encryption key for your account, you may not be able to access your data. You must notify the Supplier immediately of any unauthorized use of your account or any other breach of security regarding the Service or the InsightCloud Website that comes to your attention. If Supplier concludes that there has been or is likely to be a breach of username or password security Supplier may. \r\n\r\nTo open an account to use the Service (an “Account“), you must complete the registration process by providing us with current, complete and accurate information as prompted by the registration form. You will also receive a password and a unique member identity. You are entirely responsible for maintaining the confidentiality of your password and Account. Furthermore, you are entirely responsible for any and all activities that occur under your Account. You agree to notify TeleMessage immediately of any unauthorized use of your Account or any other breach of security.\r\n\r\n', '1'),
(6, 'Legal Disclaimer', 'The material provided on this site (www.lankaprincess.com) is provided by way of information only. It is not and does not purport to be legal or other advice. While we endeavor to ensure that the contents of the site are accurate, errors or omissions may occur and we do not accept any liability in respect of them.\r\n\r\nAny links provided on the site are provided for your convenience – their inclusion does not imply any approval or endorsement by us. We have no control over the content of those sites and accept no responsibility or liability in respect of them.', '1'),
(7, 'limitation of liability', 'A copy of the Agreement and Declaration of Trust of the Trust is on file with the Secretary of the State of Delaware and notice is hereby given that this Plan is executed on behalf of the Trustees of the Trust as trustees and not individually and that the obligations of this Plan are not binding upon the Trustees, the shareholders of the Trust individually or, with respect to each Fund, the assets or property of any other series of the Trust, but are binding only upon the assets and property of each Fund, respectively.', '1'),
(8, 'Registration', 'Certain sections of, or offerings from, the Site may require you to register. If registration is requested, you agree to provide us with accurate, complete registration information. You must be at least 13 years old to use the Site. Your registration must be done using accurate information. Each registration is for your personal and family use only and not on behalf of any other person or entity. Other than your immediate family members do not permit \r\n(a) any other person using the registered sections under your name; or \r\nb) access through a single name being made available to multiple users on a network. You are responsible for preventing such unauthorized use, and you agree to accept all risks of unauthorized access to your registration data.', '1'),
(9, 'Restrictions and Prohibitions on Use.', 'Your license for access and use of the Site and any information, materials or documents (collectively defined as &quot;Content and Materials&quot;) therein are subject to the following restrictions and prohibitions on use: You may not (a) copy, print (except for the express limited purpose permitted by Section 3 above), republish, display, distribute, transmit, sell, rent, lease, loan or otherwise make available in any form or by any means all or any portion of the Site or any Content and Materials retrieved therefrom; (b) use the Site or any materials obtained from the Site to develop, of as a component of, any information, storage and retrieval system, database, information base, or similar resource (in any media now existing or hereafter developed), that is offered for commercial distribution of any kind, including through sale, license, lease, rental, subscription, or any other commercial distribution mechanism; (c) create compilations or derivative works of any Content and Materials from the Site; (d) use any Content and Materials from the Site in any manner that may infringe any copyright, intellectual property right, proprietary right, or property right of us or any third parties; (e) remove, change or obscure any copyright notice or other proprietary notice or terms of use contained in the Site; (f) remove, decompile, disassemble or reverse engineer any Site software or use any network monitoring or discovery software to determine the Site architecture; (g) use any automatic or manual process to harvest information from the Site; (h) use the Site for the purpose of gathering information for or transmitting (1) unsolicited commercial email; (2) email that makes use of headers, invalid or nonexistent domain names, or other means of deceptive addressing; and (3) unsolicited telephone calls or facsimile transmissions; (i) use the Site in a manner that violates any state or federal law regulating email, facsimile transmissions or telephone solicitations; and (j) export or re-export the Site or any portion thereof, or any software available on or through the Site, in violation of the export control laws or regulations of the United States.', '1'),
(10, 'Ownership of Site Agreement to Terms of Use', 'A terms of use agreement should state under which country and state or province laws the website aims to operate. In the event of a legal dispute, this can be especially important for websites representing businesses with international reach, as complications arise when a site facilitates transactions and other interactions among people from different countries.', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_title`
--

CREATE TABLE `tbl_title` (
  `TitleCode` varchar(5) NOT NULL,
  `TitleName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_title`
--

INSERT INTO `tbl_title` (`TitleCode`, `TitleName`) VALUES
('Miss', 'Miss'),
('Mr', 'Mr'),
('Mrs', 'Mrs'),
('Other', 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `UserId` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `ResetToken` varchar(255) DEFAULT NULL,
  `Title` varchar(10) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `TelNo` int(20) NOT NULL,
  `UserImage` varchar(255) NOT NULL,
  `UserRole` varchar(50) NOT NULL,
  `Status` enum('1','0') NOT NULL DEFAULT '0',
  `AddUser` int(11) NOT NULL,
  `AddDate` date NOT NULL,
  `UpdateUser` int(11) DEFAULT NULL,
  `UpdateDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`UserId`, `UserName`, `Password`, `Email`, `ResetToken`, `Title`, `FirstName`, `LastName`, `Gender`, `TelNo`, `UserImage`, `UserRole`, `Status`, `AddUser`, `AddDate`, `UpdateUser`, `UpdateDate`) VALUES
(1, 'kirk', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'kirk@eagle.com', NULL, 'Mr', 'Kirk', 'Charles', 'Male', 717626675, '', 'manager', '1', 1, '2023-03-11', NULL, NULL),
(2, 'nalaka', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Nalaka@gmail.com', NULL, 'Mr', 'Nalaka', 'Perera', 'Male', 752300577, '', 'storeClark', '1', 1, '2023-03-11', NULL, NULL),
(3, 'gajen', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'gajen@yahoo.com', NULL, 'Mr', 'Gajen', 'Dissanayaka', 'Male', 762556347, '64c67853d1e307.00117610.jpg', 'stylist', '1', 1, '2023-03-11', 1, '2023-07-24'),
(4, 'pirabu', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'pirabu@hotmail.com', NULL, 'Mr', 'Pirabu', 'Chandran', 'Male', 785647894, '', 'frontDesk', '1', 1, '2023-03-11', 1, '2023-07-29'),
(7, 'gaya213', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'gaya@lind.lk', NULL, 'Miss', 'Gayani', 'Senavirathna', 'Female', 112365248, '', 'customer', '1', 0, '2023-01-25', NULL, '2023-03-25'),
(9, 'laxi5463', '1b251f64571dbb68522f1a08d3fffde0e855a306', 'laxi@hotmail.com', NULL, 'Miss', 'pavithra', 'laxamn', 'Female', 116574193, '', 'customer', '1', 0, '2023-03-25', NULL, NULL),
(10, 'mad984', '1e27b17392dabae2f5ba2a767b36d2dfc8a17275', 'mad984@gmail.com', NULL, 'Miss', 'madona', 'perera', 'Female', 546578459, '', 'customer', '1', 0, '2023-03-25', NULL, NULL),
(11, 'Kamal07', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Kamal07@gmail.com', NULL, 'Mr', 'Kamal', 'Hettiyarachi', 'Male', 726165741, '', 'customer', '1', 0, '2023-03-26', NULL, NULL),
(13, 'Gaya13', '51beb0ccb2d6f1365ed1278c636dabcd8797db95', 'smooth.aravinth@gmail.com', NULL, 'Miss', 'Gaya', 'Russell', 'Female', 776139881, '', 'customer', '1', 0, '2023-04-02', NULL, NULL),
(14, '541Anu', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '541Anu@yahoo.com', NULL, 'Mrs', 'Anu', 'Raj', 'Female', 548546397, '', 'customer', '1', 0, '2023-04-02', NULL, NULL),
(16, 'sula19', '51beb0ccb2d6f1365ed1278c636dabcd8797db95', 'sula@gmail.com', NULL, 'Mr', 'Sulakshana', 'Perera', 'Male', 779845632, '643d4ab8ca7c70.08887223.jpg', 'stylist', '1', 1, '2023-04-17', NULL, NULL),
(17, 'Kalpana', '51beb0ccb2d6f1365ed1278c636dabcd8797db95', 'Kalpana@gmail.com', NULL, 'Mrs', 'Kalpana', 'Siriwardana', 'Female', 726547856, '643d526b248cd4.54156041.jpg', 'storeClark', '1', 1, '2023-04-17', NULL, NULL),
(18, 'Chamil21', '51beb0ccb2d6f1365ed1278c636dabcd8797db95', 'Chamil21@gmail.com', NULL, 'Mr', 'Chamil', 'Perera', 'Male', 756547824, '', 'customer', '1', 0, '2023-04-22', NULL, NULL),
(21, 'Lasitha421', '51beb0ccb2d6f1365ed1278c636dabcd8797db95', 'Lasitha421@gmail.com', NULL, 'Mr', 'Lasitha', 'Ranwala', 'Male', 777546987, '', 'customer', '1', 0, '2023-04-22', NULL, NULL),
(23, 'Selvi', '51beb0ccb2d6f1365ed1278c636dabcd8797db95', 'Selvi@gmail.com', NULL, 'Mrs', 'Selvi', 'Kirishna', 'Female', 786547896, '', 'stylist', '1', 1, '2023-04-27', 1, '2023-07-24'),
(26, 'Loga17', '51beb0ccb2d6f1365ed1278c636dabcd8797db95', 'Loga@gmail.com', NULL, 'Miss', 'Loga', 'Mithrah', 'Female', 784649745, '', 'customer', '1', 0, '2023-07-13', NULL, NULL),
(30, 'Nushra', '51beb0ccb2d6f1365ed1278c636dabcd8797db95', 'Nushra@gmail.com', NULL, 'Miss', 'Nushra', 'Fatima', 'Female', 771587456, '', 'customer', '1', 0, '2023-07-30', NULL, NULL),
(34, 'laxshan77', '51beb0ccb2d6f1365ed1278c636dabcd8797db95', 'laxshan@gmail.com', NULL, 'Mr', 'laxshan', 'mendis', 'Male', 712849165, '64cbe1be97c532.47460390.jpg', 'stylist', '1', 1, '2023-08-03', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_address`
--
ALTER TABLE `tbl_address`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `tbl_appointments`
--
ALTER TABLE `tbl_appointments`
  ADD PRIMARY KEY (`AppointmentId`);

--
-- Indexes for table `tbl_appointment_services`
--
ALTER TABLE `tbl_appointment_services`
  ADD PRIMARY KEY (`AppointmentId`,`ServiceId`);

--
-- Indexes for table `tbl_appointment_services_products`
--
ALTER TABLE `tbl_appointment_services_products`
  ADD PRIMARY KEY (`AppointmentId`,`Sku`);

--
-- Indexes for table `tbl_appointment_status`
--
ALTER TABLE `tbl_appointment_status`
  ADD PRIMARY KEY (`StatusId`);

--
-- Indexes for table `tbl_attendence`
--
ALTER TABLE `tbl_attendence`
  ADD PRIMARY KEY (`AttendanceId`),
  ADD UNIQUE KEY `uc_attendance` (`EmpId`,`AttDate`);

--
-- Indexes for table `tbl_booking_status`
--
ALTER TABLE `tbl_booking_status`
  ADD PRIMARY KEY (`StatusId`);

--
-- Indexes for table `tbl_courier`
--
ALTER TABLE `tbl_courier`
  ADD PRIMARY KEY (`CourierId`);

--
-- Indexes for table `tbl_courier_status`
--
ALTER TABLE `tbl_courier_status`
  ADD PRIMARY KEY (`StatusId`);

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`CustomerId`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`DistrictCode`);

--
-- Indexes for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  ADD PRIMARY KEY (`EmployeeId`),
  ADD UNIQUE KEY `Nic` (`Nic`);

--
-- Indexes for table `tbl_emp_role`
--
ALTER TABLE `tbl_emp_role`
  ADD PRIMARY KEY (`DesignationCode`);

--
-- Indexes for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`FaqId`);

--
-- Indexes for table `tbl_inhouse_products_inventory`
--
ALTER TABLE `tbl_inhouse_products_inventory`
  ADD PRIMARY KEY (`InhouseProductId`),
  ADD UNIQUE KEY `Sku` (`Sku`);

--
-- Indexes for table `tbl_inhouse_products_stock`
--
ALTER TABLE `tbl_inhouse_products_stock`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  ADD PRIMARY KEY (`LeaveId`);

--
-- Indexes for table `tbl_leave_status`
--
ALTER TABLE `tbl_leave_status`
  ADD PRIMARY KEY (`StatusId`);

--
-- Indexes for table `tbl_leave_types`
--
ALTER TABLE `tbl_leave_types`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_online_products_inventory`
--
ALTER TABLE `tbl_online_products_inventory`
  ADD PRIMARY KEY (`OnlineProductId`),
  ADD UNIQUE KEY `Sku` (`Sku`);

--
-- Indexes for table `tbl_online_products_stock`
--
ALTER TABLE `tbl_online_products_stock`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`OrderId`);

--
-- Indexes for table `tbl_orders_product`
--
ALTER TABLE `tbl_orders_product`
  ADD PRIMARY KEY (`OrderProductId`);

--
-- Indexes for table `tbl_order_status`
--
ALTER TABLE `tbl_order_status`
  ADD PRIMARY KEY (`StatusId`);

--
-- Indexes for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  ADD PRIMARY KEY (`PaymentId`);

--
-- Indexes for table `tbl_payments_history`
--
ALTER TABLE `tbl_payments_history`
  ADD PRIMARY KEY (`payment_history_id`),
  ADD KEY `fk_payments_history` (`payment_id`);

--
-- Indexes for table `tbl_payment_status`
--
ALTER TABLE `tbl_payment_status`
  ADD PRIMARY KEY (`StatusId`);

--
-- Indexes for table `tbl_privacy`
--
ALTER TABLE `tbl_privacy`
  ADD PRIMARY KEY (`PrivacyId`);

--
-- Indexes for table `tbl_product_requests`
--
ALTER TABLE `tbl_product_requests`
  ADD PRIMARY KEY (`RequestId`);

--
-- Indexes for table `tbl_product_requests_products`
--
ALTER TABLE `tbl_product_requests_products`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_province`
--
ALTER TABLE `tbl_province`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_tbl_province_districts` (`DistrictCode`);

--
-- Indexes for table `tbl_refund`
--
ALTER TABLE `tbl_refund`
  ADD PRIMARY KEY (`RefundId`),
  ADD UNIQUE KEY `unique_product_order_key` (`ProductId`,`OrderId`);

--
-- Indexes for table `tbl_refund_status`
--
ALTER TABLE `tbl_refund_status`
  ADD PRIMARY KEY (`StatusId`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`ReviewId`);

--
-- Indexes for table `tbl_saloon_contact`
--
ALTER TABLE `tbl_saloon_contact`
  ADD PRIMARY KEY (`ContactId`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`ServiceId`);

--
-- Indexes for table `tbl_services_status`
--
ALTER TABLE `tbl_services_status`
  ADD PRIMARY KEY (`StatusId`);

--
-- Indexes for table `tbl_shipment`
--
ALTER TABLE `tbl_shipment`
  ADD PRIMARY KEY (`ShipmentId`);

--
-- Indexes for table `tbl_suppliers`
--
ALTER TABLE `tbl_suppliers`
  ADD PRIMARY KEY (`SupplierId`);

--
-- Indexes for table `tbl_suppliers_products`
--
ALTER TABLE `tbl_suppliers_products`
  ADD PRIMARY KEY (`SupplierProductsId`),
  ADD UNIQUE KEY `Sku` (`Sku`);

--
-- Indexes for table `tbl_terms`
--
ALTER TABLE `tbl_terms`
  ADD PRIMARY KEY (`TermId`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD UNIQUE KEY `TelNo` (`TelNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_appointments`
--
ALTER TABLE `tbl_appointments`
  MODIFY `AppointmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_appointment_status`
--
ALTER TABLE `tbl_appointment_status`
  MODIFY `StatusId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_attendence`
--
ALTER TABLE `tbl_attendence`
  MODIFY `AttendanceId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_booking_status`
--
ALTER TABLE `tbl_booking_status`
  MODIFY `StatusId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_courier`
--
ALTER TABLE `tbl_courier`
  MODIFY `CourierId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_courier_status`
--
ALTER TABLE `tbl_courier_status`
  MODIFY `StatusId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `CustomerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `DistrictCode` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  MODIFY `EmployeeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `FaqId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_inhouse_products_inventory`
--
ALTER TABLE `tbl_inhouse_products_inventory`
  MODIFY `InhouseProductId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_inhouse_products_stock`
--
ALTER TABLE `tbl_inhouse_products_stock`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  MODIFY `LeaveId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `tbl_leave_status`
--
ALTER TABLE `tbl_leave_status`
  MODIFY `StatusId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_leave_types`
--
ALTER TABLE `tbl_leave_types`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_online_products_inventory`
--
ALTER TABLE `tbl_online_products_inventory`
  MODIFY `OnlineProductId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_online_products_stock`
--
ALTER TABLE `tbl_online_products_stock`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `OrderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_orders_product`
--
ALTER TABLE `tbl_orders_product`
  MODIFY `OrderProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_order_status`
--
ALTER TABLE `tbl_order_status`
  MODIFY `StatusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  MODIFY `PaymentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_payment_status`
--
ALTER TABLE `tbl_payment_status`
  MODIFY `StatusId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_privacy`
--
ALTER TABLE `tbl_privacy`
  MODIFY `PrivacyId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_product_requests`
--
ALTER TABLE `tbl_product_requests`
  MODIFY `RequestId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_product_requests_products`
--
ALTER TABLE `tbl_product_requests_products`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_province`
--
ALTER TABLE `tbl_province`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_refund`
--
ALTER TABLE `tbl_refund`
  MODIFY `RefundId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_refund_status`
--
ALTER TABLE `tbl_refund_status`
  MODIFY `StatusId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `ReviewId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_saloon_contact`
--
ALTER TABLE `tbl_saloon_contact`
  MODIFY `ContactId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `ServiceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_services_status`
--
ALTER TABLE `tbl_services_status`
  MODIFY `StatusId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_shipment`
--
ALTER TABLE `tbl_shipment`
  MODIFY `ShipmentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_suppliers`
--
ALTER TABLE `tbl_suppliers`
  MODIFY `SupplierId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_suppliers_products`
--
ALTER TABLE `tbl_suppliers_products`
  MODIFY `SupplierProductsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_terms`
--
ALTER TABLE `tbl_terms`
  MODIFY `TermId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_payments_history`
--
ALTER TABLE `tbl_payments_history`
  ADD CONSTRAINT `fk_payments_history` FOREIGN KEY (`payment_id`) REFERENCES `tbl_payments` (`PaymentId`);

--
-- Constraints for table `tbl_province`
--
ALTER TABLE `tbl_province`
  ADD CONSTRAINT `fk_tbl_province_districts` FOREIGN KEY (`DistrictCode`) REFERENCES `tbl_district` (`DistrictCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
