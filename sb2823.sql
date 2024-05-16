-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: sql1.njit.edu
-- Generation Time: Apr 11, 2024 at 12:11 AM
-- Server version: 8.0.17
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sb2823`
--

-- --------------------------------------------------------

--
-- Table structure for table `clientPersonalInfo`
--

CREATE TABLE IF NOT EXISTS `clientPersonalInfo` (
`id` int(11) NOT NULL,
  `clientId` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phoneNumber` varchar(255) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `insurancePlan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `clientPersonalInfo`
--

INSERT INTO `clientPersonalInfo` (`id`, `clientId`, `address`, `phoneNumber`, `dateOfBirth`, `insurancePlan`) VALUES
(1, 1, '123 Main St', '555-123-4567', '1990-05-15', 'ABC Insurance'),
(2, 2, '456 Elm St', '555-987-6543', '1985-08-20', 'XYZ Insurance'),
(3, 3, '789 Oak St', '555-321-7890', '1978-11-10', 'DEF Insurance'),
(4, 4, '101 Maple Ave', '555-555-5555', '1992-03-25', 'GHI Insurance'),
(5, 5, '202 Pine St', '555-111-2222', '1980-07-01', 'JKL Insurance'),
(6, 6, '303 Cedar St', '555-666-7777', '1989-01-30', 'MNO Insurance'),
(7, 7, '404 Birch St', '555-888-9999', '1975-09-18', 'PQR Insurance'),
(8, 8, '505 Walnut St', '555-999-8888', '1995-12-05', 'STU Insurance'),
(9, 9, '606 Ash St', '555-444-3333', '1987-04-22', 'VWX Insurance'),
(10, 10, '707 Cherry St', '555-777-0000', '1998-10-15', 'YZA Insurance');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
`id` int(11) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `firstName`, `lastName`) VALUES
(1, 'John', 'Doe'),
(2, 'Alice', 'Smith'),
(3, 'Michael', 'Johnson'),
(4, 'Emily', 'Brown'),
(5, 'David', 'Jones'),
(6, 'Sarah', 'Martinez'),
(7, 'Jennifer', 'Taylor'),
(8, 'Daniel', 'Clark'),
(9, 'Jessica', 'Rodriguez'),
(10, 'Matthew', 'Davis');

-- --------------------------------------------------------

--
-- Table structure for table `clientSchedule`
--

CREATE TABLE IF NOT EXISTS `clientSchedule` (
`id` int(11) NOT NULL,
  `clientId` int(11) DEFAULT NULL,
  `appointmentDate` date DEFAULT NULL,
  `appointmentTime` time DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `clientSchedule`
--

INSERT INTO `clientSchedule` (`id`, `clientId`, `appointmentDate`, `appointmentTime`) VALUES
(1, 1, '2024-03-22', '10:00:00'),
(2, 2, '2024-03-23', '11:00:00'),
(3, 3, '2024-03-24', '12:00:00'),
(4, 4, '2024-03-25', '13:00:00'),
(5, 5, '2024-03-26', '14:00:00'),
(6, 6, '2024-03-27', '15:00:00'),
(7, 7, '2024-03-28', '16:00:00'),
(8, 8, '2024-03-29', '17:00:00'),
(9, 9, '2024-03-30', '18:00:00'),
(10, 10, '2024-03-31', '19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `clientTreatmentPlan`
--

CREATE TABLE IF NOT EXISTS `clientTreatmentPlan` (
`id` int(11) NOT NULL,
  `clientId` int(11) DEFAULT NULL,
  `injuryType` varchar(255) DEFAULT NULL,
  `scriptForSessions` varchar(255) DEFAULT NULL,
  `devicesSuppliesNeeded` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `clientTreatmentPlan`
--

INSERT INTO `clientTreatmentPlan` (`id`, `clientId`, `injuryType`, `scriptForSessions`, `devicesSuppliesNeeded`) VALUES
(1, 1, 'Fractured Arm', 'Range of motion exercises, strengthening exercises', 'Arm sling, Theraband'),
(2, 2, 'Carpal Tunnel', 'Hand exercises, ergonomic adjustments', 'Wrist brace, Ergonomic keyboard'),
(3, 3, 'Spinal Injury', 'Core strengthening, gait training', 'Walker, Lumbar support'),
(4, 4, 'Rotator Cuff Tear', 'Shoulder exercises, modalities', 'Ice pack, Shoulder pulley'),
(5, 5, 'Stroke Recovery', 'Neuro-rehabilitation exercises, adaptive devices', 'Cane, Adaptive utensils'),
(6, 6, 'Traumatic Brain Injury', 'Cognitive exercises, sensory integration', 'Memory aids, Sensory toys'),
(7, 7, 'Arthritis', 'Joint protection techniques, aquatic therapy', 'Hot/cold packs, Pool noodles'),
(8, 8, 'Sports Injury', 'Sports-specific exercises, proprioceptive training', 'Knee brace, Balance board'),
(9, 9, 'Developmental Delay', 'Sensory integration activities, play therapy', 'Therapy ball, Sensory swings'),
(10, 10, 'Amputation', 'Prosthetic training, stump care', 'Prosthetic limb, Stump sock');

-- --------------------------------------------------------

--
-- Table structure for table `occupationalTherapist`
--

CREATE TABLE IF NOT EXISTS `occupationalTherapist` (
`id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `idNumber` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `occupationalTherapist`
--

INSERT INTO `occupationalTherapist` (`id`, `firstName`, `lastName`, `password`, `idNumber`, `phoneNumber`, `email`) VALUES
(1, 'sara', 'khan', '020', '123456', '7778889999', 'sadia.barlas@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `SampleTable`
--

CREATE TABLE IF NOT EXISTS `SampleTable` (
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `SSN` int(9) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Employer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `SampleTable`
--

INSERT INTO `SampleTable` (`FirstName`, `LastName`, `SSN`, `Address`, `Employer`) VALUES
('Sadia', 'Barlas', 123456789, '210 Royal Road ', 'Walmart'),
('Sana', 'Mustafa', 456789123, '139 Royal Drive ', 'Wellsfargo');

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE IF NOT EXISTS `Student` (
  `StudentId` int(11) DEFAULT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `Major` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`StudentId`, `Name`, `Major`) VALUES
(1234, 'sara', 'Maths'),
(8945, 'jhon', 'Computer Science'),
(6987, 'Jose', 'English'),
(1212, 'Ali', 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `therapistClientMapping`
--

CREATE TABLE IF NOT EXISTS `therapistClientMapping` (
`id` int(11) NOT NULL,
  `therapistId` int(11) DEFAULT NULL,
  `clientId` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `therapistClientMapping`
--

INSERT INTO `therapistClientMapping` (`id`, `therapistId`, `clientId`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 3, 4),
(5, 1, 5),
(6, 2, 6),
(7, 3, 7),
(8, 1, 8),
(9, 2, 9),
(10, 3, 10);

-- --------------------------------------------------------

--
-- Table structure for table `therapists`
--

CREATE TABLE IF NOT EXISTS `therapists` (
`id` int(11) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phoneNumber` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `therapists`
--

INSERT INTO `therapists` (`id`, `firstName`, `lastName`, `password`, `phoneNumber`, `email`) VALUES
(1, 'abc', 'abc', 'sarah123', '000-000-0000', 'abc@gmail.com'),
(2, 'Michael', 'Smith', 'mike@ot123', '555-987-6543', 'michael.s@example.com'),
(3, 'Emily', 'Davis', 'emily.ot', '555-321-7890', 'emily.d@example.com'),
(4, 'David', 'Brown', 'david456', '555-555-5555', 'david.b@example.com'),
(5, 'Jennifer', 'Martinez', 'jennifer789', '555-789-7890', 'jennifer.m@example.com'),
(6, 'Daniel', 'Garcia', 'daniel123', '555-456-7890', 'daniel.g@example.com'),
(7, 'Jessica', 'Lee', 'jessica.ot', '555-111-2222', 'jessica.l@example.com'),
(8, 'Matthew', 'Taylor', 'matt456', '555-222-3333', 'matthew.t@example.com'),
(9, 'Emma', 'Lopez', 'emma.ot', '555-333-4444', 'emma.l@example.com'),
(10, 'William', 'Clark', 'william123', '555-444-5555', 'william.c@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `Transcript`
--

CREATE TABLE IF NOT EXISTS `Transcript` (
  `StudentId` int(11) DEFAULT NULL,
  `Cource` varchar(250) DEFAULT NULL,
  `Grade` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Transcript`
--

INSERT INTO `Transcript` (`StudentId`, `Cource`, `Grade`) VALUES
(1234, 'Math303', 'A+'),
(1234, 'Math101', 'B+'),
(8945, 'IT201', 'A+'),
(8945, 'IT202', 'B+'),
(6987, 'ENG301', 'C+'),
(6987, 'ENG302', 'A+'),
(1212, 'phy201', 'C+'),
(1212, 'Bio201', 'A+');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientPersonalInfo`
--
ALTER TABLE `clientPersonalInfo`
 ADD PRIMARY KEY (`id`), ADD KEY `clientId` (`clientId`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientSchedule`
--
ALTER TABLE `clientSchedule`
 ADD PRIMARY KEY (`id`), ADD KEY `clientId` (`clientId`);

--
-- Indexes for table `clientTreatmentPlan`
--
ALTER TABLE `clientTreatmentPlan`
 ADD PRIMARY KEY (`id`), ADD KEY `clientId` (`clientId`);

--
-- Indexes for table `occupationalTherapist`
--
ALTER TABLE `occupationalTherapist`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `SampleTable`
--
ALTER TABLE `SampleTable`
 ADD PRIMARY KEY (`SSN`);

--
-- Indexes for table `therapistClientMapping`
--
ALTER TABLE `therapistClientMapping`
 ADD PRIMARY KEY (`id`), ADD KEY `therapistId` (`therapistId`), ADD KEY `clientId` (`clientId`);

--
-- Indexes for table `therapists`
--
ALTER TABLE `therapists`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientPersonalInfo`
--
ALTER TABLE `clientPersonalInfo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `clientSchedule`
--
ALTER TABLE `clientSchedule`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `clientTreatmentPlan`
--
ALTER TABLE `clientTreatmentPlan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `occupationalTherapist`
--
ALTER TABLE `occupationalTherapist`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `therapistClientMapping`
--
ALTER TABLE `therapistClientMapping`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `therapists`
--
ALTER TABLE `therapists`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `clientPersonalInfo`
--
ALTER TABLE `clientPersonalInfo`
ADD CONSTRAINT `clientPersonalInfo_ibfk_1` FOREIGN KEY (`clientId`) REFERENCES `clients` (`id`);

--
-- Constraints for table `clientSchedule`
--
ALTER TABLE `clientSchedule`
ADD CONSTRAINT `clientSchedule_ibfk_1` FOREIGN KEY (`clientId`) REFERENCES `clients` (`id`);

--
-- Constraints for table `clientTreatmentPlan`
--
ALTER TABLE `clientTreatmentPlan`
ADD CONSTRAINT `clientTreatmentPlan_ibfk_1` FOREIGN KEY (`clientId`) REFERENCES `clients` (`id`);

--
-- Constraints for table `therapistClientMapping`
--
ALTER TABLE `therapistClientMapping`
ADD CONSTRAINT `therapistClientMapping_ibfk_1` FOREIGN KEY (`therapistId`) REFERENCES `therapists` (`id`),
ADD CONSTRAINT `therapistClientMapping_ibfk_2` FOREIGN KEY (`clientId`) REFERENCES `clients` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
