-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2022 at 09:46 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vegetablemanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `carddetails`
--

CREATE TABLE `carddetails` (
  `userName` varchar(30) NOT NULL,
  `Mnth` int(11) NOT NULL,
  `Year` int(11) NOT NULL,
  `CVV` int(3) NOT NULL,
  `fName` text NOT NULL,
  `lName` text NOT NULL,
  `CardNumber` bigint(20) NOT NULL,
  `OrderID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carddetails`
--

INSERT INTO `carddetails` (`userName`, `Mnth`, `Year`, `CVV`, `fName`, `lName`, `CardNumber`, `OrderID`) VALUES
('megha', 10, 23, 451, 'Megha', 'Thilini', 1023654912567895, 43),
('megha', 11, 26, 145, 'Megha', 'Thilini', 1234568978544562, 73),
('Santhush', 3, 24, 896, 'Santhush', 'Gimhana', 1546235978541256, 45),
('megha', 12, 26, 214, 'Megha', 'Thilini', 8956321458569542, 75);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `Id` int(11) NOT NULL,
  `fName` text NOT NULL,
  `lName` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` text NOT NULL,
  `msg` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`Id`, `fName`, `lName`, `email`, `subject`, `msg`) VALUES
(8, 'Megha', 'thilini', 'kvmeghathilini@gmail.com', 'about vegetables', 'Sample message');

-- --------------------------------------------------------

--
-- Table structure for table `orderdelivery`
--

CREATE TABLE `orderdelivery` (
  `Name` text NOT NULL,
  `Mobilenumber` varchar(10) NOT NULL,
  `Address1` text NOT NULL,
  `Address2` text NOT NULL,
  `City` text NOT NULL,
  `OrderID` int(11) NOT NULL,
  `ordVegID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdelivery`
--

INSERT INTO `orderdelivery` (`Name`, `Mobilenumber`, `Address1`, `Address2`, `City`, `OrderID`, `ordVegID`) VALUES
('Megha Thilini', '0712712624', 'Susadi stores', 'blackpool junction', 'Nuwara eliya', 43, 102),
('Sumesh Akalanka', '0712712604', 'Susadi stores', 'blackpool junction', 'Nuwara eliya', 44, 103),
('Santhush Gimhana', '0712712678', 'Padiyapalalla', 'meelilimana', 'Nuwara eliya', 45, 104),
('Reshan Nuwanpriya', '0712712604', 'mahapathana', 'harasbaddha', 'Walapane', 64, 110),
('santhush gimhana', '0712712604', 'Susadi stores', 'blackpool junction', 'Nuwara eliya', 72, 114),
('Megha Thilini', '0712712604', 'Susadi stores', 'blackpool junction', 'Nuwara eliya', 73, 116),
('medha', '0712712604', 'Susadi stores', 'blackpool junction', 'Nuwara eliya', 75, 118),
('Reshan Nuwanpriya', '0712712478', 'mahapathana', 'harasbaddha', 'Walapane', 77, 119);

-- --------------------------------------------------------

--
-- Table structure for table `orderpayment`
--

CREATE TABLE `orderpayment` (
  `OrderID` int(11) NOT NULL,
  `paymethod` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderpayment`
--

INSERT INTO `orderpayment` (`OrderID`, `paymethod`) VALUES
(43, 'Card'),
(44, 'COD'),
(45, 'Card'),
(64, 'COD'),
(72, 'COD'),
(73, 'Card'),
(75, 'Card'),
(77, 'COD');

-- --------------------------------------------------------

--
-- Table structure for table `ordervegetable`
--

CREATE TABLE `ordervegetable` (
  `ordVegID` int(11) NOT NULL,
  `VegiID` int(11) NOT NULL,
  `instruction` longtext NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` float NOT NULL,
  `userName` varchar(30) NOT NULL,
  `OrderID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordervegetable`
--

INSERT INTO `ordervegetable` (`ordVegID`, `VegiID`, `instruction`, `qty`, `amount`, `userName`, `OrderID`) VALUES
(102, 6, 'I want to get my order before 15th january 2022', 60, 8700, 'megha', 43),
(103, 15, '', 42, 3360, 'Sumesh', 44),
(104, 7, 'I want to get fresh vegetables', 100, 12500, 'Santhush', 45),
(110, 2, '', 20, 2800, 'reshan', 64),
(114, 1, '', 50, 5000, 'Santhush', 72),
(116, 3, '', 40, 6000, 'megha', 73),
(118, 6, '', 90, 13050, 'megha', 75),
(119, 3, '', 45, 6750, 'reshan', 77);

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `userID` int(11) NOT NULL,
  `fName` text NOT NULL,
  `lName` text NOT NULL,
  `uname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `mno` int(10) NOT NULL,
  `pwd` varchar(12) NOT NULL,
  `rpwd` varchar(12) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`userID`, `fName`, `lName`, `uname`, `email`, `dob`, `mno`, `pwd`, `rpwd`, `is_admin`) VALUES
(0, 'reshan ', 'nuwanpriya', 'reshan', 'reshan@gmail.com', '1996-05-20', 712456789, 'qwe', 'qwe', 0),
(1, 'Megha', 'Thilini', 'megha', 'megha@gamil.com', '2000-07-11', 712751643, 'qwe', 'qwe', 0),
(2, 'Nipuni', 'Aradhana', 'Nipuni', 'nipuniaradhana@gmail.com', '2009-01-30', 714587984, 'qwe', 'qwe', 0),
(3, 'Sudesh', 'Anuradha', 'Sudesh', 'sudesh@gmail.com', '1993-11-22', 712524789, '789', '789', 0),
(4, 'Sumesh', 'Akalanka', 'Sumesh', '2018e003@eng.jfn.ac.lk', '1978-01-15', 712712604, '123', '123', 1),
(5, 'Anjana', 'Nuwansiri', 'anjana', 'anjananuwansiri@gmail.com', '1996-11-18', 712222227, '123', '123', 0),
(6, 'Munidhasa', 'Vithanage', 'Munidasa', 'munidhasa@gmail.com', '1968-07-31', 757094313, '654', '654', 0),
(7, 'Santhush', 'Gimhana', 'Santhush', 'santhu@gmail.com', '1999-10-25', 704133484, '4546', '4546', 0),
(8, 'Jithmini', 'Denethma', 'Jithmini', 'jithmini@gmail.com', '2061-01-11', 713528177, '1997', '1997', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usersession`
--

CREATE TABLE `usersession` (
  `ID` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usersession`
--

INSERT INTO `usersession` (`ID`, `userName`) VALUES
(78, 'Sumesh');

-- --------------------------------------------------------

--
-- Table structure for table `vegetable`
--

CREATE TABLE `vegetable` (
  `category` text NOT NULL,
  `type` text NOT NULL,
  `Image` varchar(500) NOT NULL,
  `VegiID` int(11) NOT NULL,
  `vegetableName` text NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vegetable`
--

INSERT INTO `vegetable` (`category`, `type`, `Image`, `VegiID`, `vegetableName`, `Price`) VALUES
('Carrot', 'Baby', 'Resources\\vegetables2\\carrot\\c1.jpg', 1, 'Baby Carrot(Small Carrot)', 100),
('Carrot', 'Large', 'Resources\\vegetables2\\carrot\\c2.jpg', 2, 'Large Carrot', 140),
('Carrot', 'Red', 'Resources\\vegetables2\\carrot\\c3.jpg', 3, 'Red Carrot', 150),
('Cabbage', 'Green', 'Resources\\vegetables2\\cabbage\\cb1.jpg', 4, 'Grenn Cabbage', 130),
('Cabbage', 'White', 'Resources\\vegetables2\\cabbage\\cb2.jpg', 5, 'White Cabbage', 135),
('Cabbage', 'Red', 'Resources\\vegetables2\\cabbage\\cb3.jpg', 6, 'Red Cabbage', 145),
('Leeks', 'Baby', 'Resources\\vegetables2\\leeks\\l1.jpg', 7, 'Baby Leeks(Small Leeks)', 125),
('Leeks', 'Large', 'Resources\\vegetables2\\leeks\\l2.jpg', 8, 'Large Leeks', 135),
('Leeks', 'Chinese', 'Resources\\vegetables2\\leeks\\l3.jpg', 9, 'Chinese Leeks', 150),
('Potato', 'White', 'Resources\\vegetables2\\potato\\p1.jpg', 10, 'White Potato', 170),
('Potato', 'Yellow', 'Resources\\vegetables2\\potato\\p2.jpg', 11, 'Yellow Potato', 160),
('Potato', 'Red', 'Resources\\vegetables2\\potato\\p3.jpg', 12, 'Red Potato', 200),
('Beans', 'Green', 'Resources\\vegetables2\\beans\\b1.jpg', 13, 'Green Beans', 90),
('Beans', 'White', 'Resources\\vegetables2\\beans\\b2.jpg', 14, 'White Bens', 105),
('Beans', 'Long', 'Resources\\vegetables2\\beans\\b3.jpg', 15, 'Long Beans', 80);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carddetails`
--
ALTER TABLE `carddetails`
  ADD PRIMARY KEY (`CardNumber`),
  ADD KEY `FK4` (`OrderID`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `orderdelivery`
--
ALTER TABLE `orderdelivery`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `FK5` (`ordVegID`);

--
-- Indexes for table `orderpayment`
--
ALTER TABLE `orderpayment`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `ordervegetable`
--
ALTER TABLE `ordervegetable`
  ADD PRIMARY KEY (`ordVegID`),
  ADD KEY `FK1` (`VegiID`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `usersession`
--
ALTER TABLE `usersession`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vegetable`
--
ALTER TABLE `vegetable`
  ADD PRIMARY KEY (`VegiID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ordervegetable`
--
ALTER TABLE `ordervegetable`
  MODIFY `ordVegID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `usersession`
--
ALTER TABLE `usersession`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carddetails`
--
ALTER TABLE `carddetails`
  ADD CONSTRAINT `FK4` FOREIGN KEY (`OrderID`) REFERENCES `orderpayment` (`OrderID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderdelivery`
--
ALTER TABLE `orderdelivery`
  ADD CONSTRAINT `FK5` FOREIGN KEY (`ordVegID`) REFERENCES `ordervegetable` (`ordVegID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderpayment`
--
ALTER TABLE `orderpayment`
  ADD CONSTRAINT `FK3` FOREIGN KEY (`OrderID`) REFERENCES `orderdelivery` (`OrderID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ordervegetable`
--
ALTER TABLE `ordervegetable`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`VegiID`) REFERENCES `vegetable` (`VegiID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
