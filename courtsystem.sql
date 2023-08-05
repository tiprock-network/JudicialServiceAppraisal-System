-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2023 at 12:47 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courtsystem`
--
CREATE courtsystem;
USE courtsystem;
-- --------------------------------------------------------

--
-- Table structure for table `casetbl`
--

CREATE TABLE `casetbl` (
  `CaseId` varchar(15) NOT NULL,
  `DeptId` varchar(10) NOT NULL,
  `PlaintId` varchar(15) NOT NULL,
  `ResId` varchar(15) NOT NULL,
  `JudgeId` varchar(15) NOT NULL,
  `LawyerId` varchar(15) NOT NULL,
  `CaseName` varchar(255) NOT NULL,
  `CaseDesc` varchar(255) NOT NULL,
  `Start_date` varchar(50) NOT NULL,
  `End_date` varchar(50) DEFAULT NULL,
  `No_of_hearings` int(11) DEFAULT NULL,
  `No_of_complete_hearings` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `casetbl`
--

INSERT INTO `casetbl` (`CaseId`, `DeptId`, `PlaintId`, `ResId`, `JudgeId`, `LawyerId`, `CaseName`, `CaseDesc`, `Start_date`, `End_date`, `No_of_hearings`, `No_of_complete_hearings`) VALUES
('CAS123C/22', 'DEPTCH', 'PL004', 'RES004', 'JU-1102-12', 'ADV-051-07', 'Custody: Miss Anne versus Mr. Antony', ' Grace Ann pushes for custody over one Bernard Samson, 4 years old, after divorce against Barry Antony', '4/02/2023', '', 1, 3),
('CAS123D/22', 'DEPTCH', 'PL07', 'RES004', 'JU-1102-12', 'ADV-1102-12', 'Witness party in custody case', '\n Grace Ann pushes for custody over one Bernard Samson; witness Mr.Owiti Testifies', '4/02/2023', '', 1, 3),
('CAS440L/21', 'DEPTL', 'PL001', 'RES002', 'JU-101-12', 'ADV-101-12', 'Humphrey Wine & Dine Demolition', 'Agnes Miller defends her restaurant\nfrom demolition by alleged unfair claims from Mr. Githu Charles', '12/11/2022', '', 4, 6),
('CAS440L/23', 'DEPTL', 'PL08', 'RES001', 'JU-091-19', 'ADV-091-19', 'Magadi Land Pollution', 'Mr. Owiti protests againsts the acts of \r\n Magadi Mining company as irresponsible where land is heavily polluted and left without strategies for reclamation.', '23/01/2022', '', 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `departmenttbl`
--

CREATE TABLE `departmenttbl` (
  `DeptId` varchar(10) NOT NULL,
  `DeptName` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departmenttbl`
--

INSERT INTO `departmenttbl` (`DeptId`, `DeptName`) VALUES
('DEPTCH', 'Children'),
('DEPTF', 'Family'),
('DEPTK', 'Kadhis'),
('DEPTL', 'Land'),
('DEPTMIL', 'Military');

-- --------------------------------------------------------

--
-- Table structure for table `judgetbl`
--

CREATE TABLE `judgetbl` (
  `JudgeId` varchar(15) NOT NULL,
  `PosItId` varchar(5) NOT NULL,
  `JudgeName` varchar(120) NOT NULL,
  `DeptId` varchar(10) NOT NULL,
  `AppraisalPerf` double NOT NULL,
  `JudgeRoomKey` varchar(100) NOT NULL,
  `JudgeEmail` varchar(50) NOT NULL,
  `Gender` char(1) NOT NULL,
  `checks` int(11) DEFAULT 0,
  `Score` int(11) NOT NULL DEFAULT 0,
  `timeliness` double NOT NULL DEFAULT 0,
  `serious` double NOT NULL DEFAULT 0,
  `integrity` double NOT NULL DEFAULT 0,
  `respect` double NOT NULL DEFAULT 0,
  `administration` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `judgetbl`
--

INSERT INTO `judgetbl` (`JudgeId`, `PosItId`, `JudgeName`, `DeptId`, `AppraisalPerf`, `JudgeRoomKey`, `JudgeEmail`, `Gender`, `checks`, `Score`, `timeliness`, `serious`, `integrity`, `respect`, `administration`) VALUES
('JU-051-07', '002J', 'Nancy Chepkorir', 'DEPTK', 2.6666666666667, '25d55ad283aa400af464c76d713c07ad', 'nancychep@jscke.ac.ke', 'F', 3, 8, 1.8333333333333, 1.6666666666667, 1.3333333333333, 1.1666666666667, 2.6666666666667),
('JU-078-12', '002J', 'Gen. Dr. Hellen Miriam Nafula', 'DEPTMIL', 4.25, 'BpL13HHK4', 'nafulamir@jscke.ac.ke', 'F', 2, 7, 0, 0, 0, 0, 0),
('JU-091-12', '003J', 'Martin Oloo Henry', 'DEPTL', 3.625, '34588OPisX', 'martin@jscke.ac.ke', 'M', 2, 6, 0, 0, 0, 0, 0),
('JU-091-19', '003J', 'Martin Oloo Henry', 'DEPTL', 0, '44APs#10aS', 'martinhen@jscke.ac.ke.com', 'M', 0, 0, 0, 0, 0, 0, 0),
('JU-101-12', '001J', 'Dr. Robin Nelson Okumu', 'DEPTL', 3.875, '1090ioKABT', 'nelsonok@jscke.ac.ke', 'M', 2, 6, 0, 0, 0, 0, 0),
('JU-1102-12', '001J', 'Dr. Mwangi Ronald', 'DEPTCH', 3.75, '34588OPisX', 'mwangiron@jscke.ac.ke', 'M', 4, 14, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lawyertbl`
--

CREATE TABLE `lawyertbl` (
  `LawyerId` varchar(15) NOT NULL,
  `PosItId` varchar(5) NOT NULL,
  `DeptId` varchar(10) NOT NULL,
  `LawyerName` varchar(120) NOT NULL,
  `AppraisalPerf` double NOT NULL,
  `LawyerRoomKey` varchar(100) NOT NULL,
  `LawyerEmail` varchar(50) NOT NULL,
  `Gender` char(1) NOT NULL,
  `checks` int(11) NOT NULL DEFAULT 0,
  `Score` double NOT NULL DEFAULT 0,
  `timeliness` double NOT NULL DEFAULT 0,
  `serious` double NOT NULL DEFAULT 0,
  `integrity` double NOT NULL DEFAULT 0,
  `respect` double NOT NULL DEFAULT 0,
  `administration` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lawyertbl`
--

INSERT INTO `lawyertbl` (`LawyerId`, `PosItId`, `DeptId`, `LawyerName`, `AppraisalPerf`, `LawyerRoomKey`, `LawyerEmail`, `Gender`, `checks`, `Score`, `timeliness`, `serious`, `integrity`, `respect`, `administration`) VALUES
('ADV-051-07', 'SR001', 'DEPTCH', 'Dr. Emilly Korir Kiptoo', 4.6, '25d55ad283aa400af464c76d713c07ad', 'moses@jscke.ac.ke', 'F', 1, 4.6, 5, 5, 4, 4, 5),
('ADV-078-12', 'JR002', 'DEPTF', 'Jeremy Oswald Wachira', 0, 'BpL13AAAA', 'jeremy@jscke.ac.ke', 'M', 0, 0, 0, 0, 0, 0, 0),
('ADV-091-12', 'SR001', 'DEPTK', 'Hassan Suleiman Mohammed', 0, '345LOPPisX', 'suleimanh@jscke.ac.ke', 'M', 0, 0, 0, 0, 0, 0, 0),
('ADV-091-19', 'SR001', 'DEPTL', 'Oloo Henry Nyikal', 0, '44APs#10', 'oloo@jscke.ac.ke.com', 'M', 0, 0, 0, 0, 0, 0, 0),
('ADV-101-12', 'JR002', 'DEPTL', 'Otieno Marcus Odii', 0, '1090ioKSWE', 'odiimarcus@jscke.ac.ke', 'M', 0, 0, 0, 0, 0, 0, 0),
('ADV-1102-12', 'JR002', 'DEPTCH', 'Prof. Fridman Abishek Varma', 0, 'AFRTi88OPisX', 'abishekvarm@jscke.ac.ke', 'M', 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `plaintifftbl`
--

CREATE TABLE `plaintifftbl` (
  `PlaintId` varchar(15) NOT NULL,
  `PlaintName` varchar(120) NOT NULL,
  `Gender` char(1) NOT NULL,
  `PlaintRoomKey` varchar(120) DEFAULT NULL,
  `PlaintEmail` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plaintifftbl`
--

INSERT INTO `plaintifftbl` (`PlaintId`, `PlaintName`, `Gender`, `PlaintRoomKey`, `PlaintEmail`) VALUES
('PL001', 'Agnes Miller', 'F', '234As#', 'agnesmiller@gmail.com'),
('PL002', 'Jackson Imani', 'M', '12345TY', 'jackson@outlook.com'),
('PL003', 'Antony Matendo', 'M', '9088IOp', 'antony@gmail.com'),
('PL004', 'Grace Anne Moraa', 'F', 'faku8T34Fq', NULL),
('PL005', 'Timothy Fred', 'M', 'snG678', 'timothy@yahoo.com'),
('PL006', 'Wilson Omondi', 'M', 'DN34abt', NULL),
('PL07', 'Theophilus Lincoln Owiti', 'M', '050248cd2efad770e194ca0e12d44264', 'lincolntheop@gmail.com'),
('PL08', 'Theophilus Owiti', 'M', '2da7a748f681b93462e173702cf5d119', 'theophiluslowiti@gmail.com'),
('PL09', 'ABC', 'F', '4a7d1ed414474e4033ac29ccb8653d9b', 'name@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `positiontbl`
--

CREATE TABLE `positiontbl` (
  `PosItId` varchar(10) NOT NULL,
  `PosIt` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `positiontbl`
--

INSERT INTO `positiontbl` (`PosItId`, `PosIt`) VALUES
('001J', 'Chief Justice'),
('002J', 'Judge'),
('003J', 'Magistrate'),
('JR002', 'Junior Advocate'),
('SR001', 'Senior Advocate');

-- --------------------------------------------------------

--
-- Table structure for table `respondenttbl`
--

CREATE TABLE `respondenttbl` (
  `ResId` varchar(15) NOT NULL,
  `ResName` varchar(120) NOT NULL,
  `Gender` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `respondenttbl`
--

INSERT INTO `respondenttbl` (`ResId`, `ResName`, `Gender`) VALUES
('RES001', 'Paul Nickson', 'M'),
('RES002', 'Ambrose Charles Githu', 'M'),
('RES003', 'Mwaniki Mwikali', 'F'),
('RES004', 'Tommy Odhiambo', 'M'),
('RES005', 'Faith Jepchumba', 'F'),
('RES006', 'Barry Antony', 'M');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `casetbl`
--
ALTER TABLE `casetbl`
  ADD PRIMARY KEY (`CaseId`),
  ADD KEY `DeptId` (`DeptId`),
  ADD KEY `PlaintId` (`PlaintId`),
  ADD KEY `ResId` (`ResId`),
  ADD KEY `JudgeId` (`JudgeId`),
  ADD KEY `LawyerId` (`LawyerId`);

--
-- Indexes for table `departmenttbl`
--
ALTER TABLE `departmenttbl`
  ADD PRIMARY KEY (`DeptId`);

--
-- Indexes for table `judgetbl`
--
ALTER TABLE `judgetbl`
  ADD PRIMARY KEY (`JudgeId`),
  ADD KEY `PosItId` (`PosItId`);

--
-- Indexes for table `lawyertbl`
--
ALTER TABLE `lawyertbl`
  ADD PRIMARY KEY (`LawyerId`),
  ADD KEY `DeptId` (`DeptId`),
  ADD KEY `PosItId` (`PosItId`);

--
-- Indexes for table `plaintifftbl`
--
ALTER TABLE `plaintifftbl`
  ADD PRIMARY KEY (`PlaintId`);

--
-- Indexes for table `positiontbl`
--
ALTER TABLE `positiontbl`
  ADD PRIMARY KEY (`PosItId`);

--
-- Indexes for table `respondenttbl`
--
ALTER TABLE `respondenttbl`
  ADD PRIMARY KEY (`ResId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `casetbl`
--
ALTER TABLE `casetbl`
  ADD CONSTRAINT `casetbl_ibfk_1` FOREIGN KEY (`DeptId`) REFERENCES `departmenttbl` (`DeptId`),
  ADD CONSTRAINT `casetbl_ibfk_2` FOREIGN KEY (`PlaintId`) REFERENCES `plaintifftbl` (`PlaintId`),
  ADD CONSTRAINT `casetbl_ibfk_3` FOREIGN KEY (`ResId`) REFERENCES `respondenttbl` (`ResId`),
  ADD CONSTRAINT `casetbl_ibfk_4` FOREIGN KEY (`JudgeId`) REFERENCES `judgetbl` (`JudgeId`),
  ADD CONSTRAINT `casetbl_ibfk_5` FOREIGN KEY (`LawyerId`) REFERENCES `lawyertbl` (`LawyerId`);

--
-- Constraints for table `judgetbl`
--
ALTER TABLE `judgetbl`
  ADD CONSTRAINT `judgetbl_ibfk_1` FOREIGN KEY (`PosItId`) REFERENCES `positiontbl` (`PosItId`);

--
-- Constraints for table `lawyertbl`
--
ALTER TABLE `lawyertbl`
  ADD CONSTRAINT `lawyertbl_ibfk_1` FOREIGN KEY (`DeptId`) REFERENCES `departmenttbl` (`DeptId`),
  ADD CONSTRAINT `lawyertbl_ibfk_2` FOREIGN KEY (`PosItId`) REFERENCES `positiontbl` (`PosItId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
