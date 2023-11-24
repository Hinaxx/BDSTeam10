-- MySQL dump 10.16  Distrib 10.1.48-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: db
-- ------------------------------------------------------
-- Server version	10.1.48-MariaDB-0+deb9u2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `dbo.Account`
--

DROP TABLE IF EXISTS `dbo.Account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dbo.Account` (
  `ID` tinyint(4) DEFAULT NULL,
  `Username` varchar(14) DEFAULT NULL,
  `Password` mediumint(9) DEFAULT NULL,
  `Full_Name` varchar(23) DEFAULT NULL,
  `Role` varchar(5) DEFAULT NULL,
  `IsActive` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dbo.Account`
--

LOCK TABLES `dbo.Account` WRITE;
/*!40000 ALTER TABLE `dbo.Account` DISABLE KEYS */;
INSERT INTO `dbo.Account` VALUES (1,'phanminhquang',123456,'Phan Minh Quang','ADMIN',1),(2,'nguyenduykhanh',123456,'Nguyễn Duy Khánh','SALE',1);
/*!40000 ALTER TABLE `dbo.Account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dbo.City`
--

DROP TABLE IF EXISTS `dbo.City`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dbo.City` (
  `ID` tinyint(4) DEFAULT NULL,
  `City_Name` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dbo.City`
--

LOCK TABLES `dbo.City` WRITE;
/*!40000 ALTER TABLE `dbo.City` DISABLE KEYS */;
INSERT INTO `dbo.City` VALUES (1,'Hồ Chí Minh'),(2,'Hà Nội'),(3,'Đà Nẵng'),(4,'Bình Dương'),(5,'Vũng Tàu'),(6,'Bắc Giang'),(7,'Đồng Nai'),(8,'Cà Mau'),(9,'Long An'),(10,'Cần Thơ');
/*!40000 ALTER TABLE `dbo.City` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dbo.District`
--

DROP TABLE IF EXISTS `dbo.District`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dbo.District` (
  `ID` tinyint(4) DEFAULT NULL,
  `City_ID` tinyint(4) DEFAULT NULL,
  `District_Name` varchar(21) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dbo.District`
--

LOCK TABLES `dbo.District` WRITE;
/*!40000 ALTER TABLE `dbo.District` DISABLE KEYS */;
INSERT INTO `dbo.District` VALUES (1,1,'Quận Bình Tân'),(2,1,'Quận Bình Thạnh'),(3,1,'Quận 1'),(4,1,'Quận 2'),(5,1,'Quận 3'),(6,1,'Quận 4'),(7,1,'Quận 5'),(8,1,'Quận 6'),(9,1,'Quận 7'),(10,1,'Quận 8'),(11,9,'Huyện Bến Lức'),(12,9,'Huyện Đức Hòa'),(14,9,'Huyện Đức Huệ'),(15,4,'Huyện Bến Cát'),(16,4,'Huyện Dầu Tiếng'),(17,4,'Huyện Thuận An'),(18,4,'');
/*!40000 ALTER TABLE `dbo.District` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dbo.Full_Contract`
--

DROP TABLE IF EXISTS `dbo.Full_Contract`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dbo.Full_Contract` (
  `ID` INT AUTO_INCREMENT PRIMARY KEY,
  `Full_Contract_Code` varchar(11) DEFAULT NULL,
  `Customer_Name` varchar(23) DEFAULT NULL,
  `Year_Of_Birth` smallint(6) DEFAULT NULL,
  `SSN` int(11) DEFAULT NULL,
  `Customer_Address` varchar(61) DEFAULT NULL,
  `Mobile` bigint(20) DEFAULT NULL,
  `Property_ID` tinyint(4) DEFAULT NULL,
  `Date_Of_Contract` varchar(10) DEFAULT NULL,
  `Price` bigint(20) DEFAULT NULL,
  `Deposit` int(11) DEFAULT NULL,
  `Remain` bigint(20) DEFAULT NULL,
  `Status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dbo.Full_Contract`
--

LOCK TABLES `dbo.Full_Contract` WRITE;
/*!40000 ALTER TABLE `dbo.Full_Contract` DISABLE KEYS */;
INSERT INTO `dbo.Full_Contract` VALUES (1,'FC22110001','Phan Minh Quang',1990,301198908,'45 Trần Hưng Đạo, Quận 5, Thành phố Hồ Chí Minh',919686576,1,'2019-11-11',1000000000,100000000,900000000,1),(2,'FC22110002','Nguyễn Duy Khánh',1989,404948494,'36 Lê Văn Sỹ, Quận 3, TP.HCM',967686878,2,'2019-11-12',2000000000,200000000,1800000000,1);
/*!40000 ALTER TABLE `dbo.Full_Contract` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dbo.Installment_Contract`
--

DROP TABLE IF EXISTS `dbo.Installment_Contract`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dbo.Installment_Contract` (
  `ID` tinyint(4) DEFAULT NULL,
  `Installment_Contract_Code` varchar(10) DEFAULT NULL,
  `Customer_Name` varchar(16) DEFAULT NULL,
  `Year_Of_Birth` smallint(6) DEFAULT NULL,
  `SSN` int(11) DEFAULT NULL,
  `Customer_Address` varchar(29) DEFAULT NULL,
  `Mobile` bigint(20) DEFAULT NULL,
  `Property_ID` tinyint(4) DEFAULT NULL,
  `Date_Of_Contract` varchar(10) DEFAULT NULL,
  `Installment_Payment_Method` varchar(6) DEFAULT NULL,
  `Payment_Period` tinyint(4) DEFAULT NULL,
  `Price` bigint(20) DEFAULT NULL,
  `Deposit` int(11) DEFAULT NULL,
  `Loan_Amount` bigint(20) DEFAULT NULL,
  `Taken` tinyint(4) DEFAULT NULL,
  `Remain` bigint(20) DEFAULT NULL,
  `Status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dbo.Installment_Contract`
--

LOCK TABLES `dbo.Installment_Contract` WRITE;
/*!40000 ALTER TABLE `dbo.Installment_Contract` DISABLE KEYS */;
INSERT INTO `dbo.Installment_Contract` VALUES (1,'IC22110001','Nguyễn Văn A',1980,123467647,'1 Lê Lợi, Quận 1, TP.HCM',918273378,3,'2019-10-23','A',12,5000000000,500000000,4500000000,0,4500000000,1);
/*!40000 ALTER TABLE `dbo.Installment_Contract` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dbo.Property`
--

DROP TABLE IF EXISTS `dbo.Property`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dbo.Property` (
  `ID` INT AUTO_INCREMENT PRIMARY KEY,
  `Property_Code` varchar(11) DEFAULT NULL,
  `Property_Name` varchar(31) DEFAULT NULL,
  `Property_Type_ID` tinyint(4) DEFAULT NULL,
  `Description` text,
  `District_ID` tinyint(4) DEFAULT NULL,
  `Address` varchar(91) DEFAULT NULL,
  `Area` varchar(3) DEFAULT NULL,
  `Bed_Room` varchar(1) DEFAULT NULL,
  `Bath_Room` varchar(1) DEFAULT NULL,
  `Price` varchar(10) DEFAULT NULL,
  `Installment_Rate` varchar(4) DEFAULT NULL,
  `Avatar` varchar(16) DEFAULT NULL,
  `Album` varchar(24) DEFAULT NULL,
  `Property_Status_ID` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dbo.Property`
--

LOCK TABLES `dbo.Property` WRITE;
/*!40000 ALTER TABLE `dbo.Property` DISABLE KEYS */;
INSERT INTO `dbo.Property` VALUES (1,'P220001','NHÀ PHỐ GARDEN KHANG ĐIỀN',3,'Nhà xây 1 trệt, 2 lầu, hoàn thiện bên ngoài kính cường lực, sơn nước chống rêu mốc chất lượng, có cửa kính cường lực, gara ô tô để xe thoải mái.',1,'Dự án Melosa Garden, Quận 9, Hồ Chí Minh','80','2','2','1000000000','7.99','ppc0001.jpg','ppc0002.jpg;ppc0003.jpg;',6),(3,'P220003','LAVITA CHARM',2,'Trong làn gió mát rượi, hương thơm cỏ cây tại Lavita Charm hòa theo từng bước chân sẽ đưa bạn trở về với không gian sống bình yên, tách biệt khỏi sự huyên náo của chốn phồn hoa. Lavita Charm như một nốt trầm yên ả của điệu nhạc du dương cho cảm xúc thăng hoa và nuôi dưỡng đam mê bất tận, đem đến nguồn vui, nguồn cảm hứng mới cho cuộc sống mỗi ngày.',2,'Dự án Lavita Charm, Đường 1, Phường Trường Thọ, Thủ Đức, Hồ Chí Minh','120','4','4','5000000000','7.99','ppc0007.jpg','ppc0008.jpg;',7),(11,'P220004','Văn Lang',1,'',1,'https://www.facebook.com/phanminhquang02','','','','','','91446ppc0006.jpg','43227ppc0003.jpg',1);
/*!40000 ALTER TABLE `dbo.Property` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dbo.Property_Service`
--

DROP TABLE IF EXISTS `dbo.Property_Service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dbo.Property_Service` (
  `ID` tinyint(4) DEFAULT NULL,
  `Service_ID` tinyint(4) DEFAULT NULL,
  `Property_ID` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dbo.Property_Service`
--

LOCK TABLES `dbo.Property_Service` WRITE;
/*!40000 ALTER TABLE `dbo.Property_Service` DISABLE KEYS */;
INSERT INTO `dbo.Property_Service` VALUES (1,1,1),(2,2,1),(3,3,1),(4,4,1),(5,1,2),(6,2,2),(7,1,3),(8,3,3),(9,4,3),(15,1,11),(16,2,11);
/*!40000 ALTER TABLE `dbo.Property_Service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dbo.Property_Status`
--

DROP TABLE IF EXISTS `dbo.Property_Status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dbo.Property_Status` (
  `ID` tinyint(4) DEFAULT NULL,
  `Property_Status_Name` varchar(33) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dbo.Property_Status`
--

LOCK TABLES `dbo.Property_Status` WRITE;
/*!40000 ALTER TABLE `dbo.Property_Status` DISABLE KEYS */;
INSERT INTO `dbo.Property_Status` VALUES (1,'Đang bán'),(2,'Đã bán thanh toán một lần'),(3,'Đã bán trả góp'),(4,'Không hiển thị'),(5,'Hết hạn để bán'),(6,'Đang cọc đầy đủ'),(7,'Đang cọc trả góp');
/*!40000 ALTER TABLE `dbo.Property_Status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dbo.Property_Type`
--

DROP TABLE IF EXISTS `dbo.Property_Type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dbo.Property_Type` (
  `ID` tinyint(4) DEFAULT NULL,
  `Property_Type_Name` varchar(21) DEFAULT NULL,
  `Property_Amount` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dbo.Property_Type`
--

LOCK TABLES `dbo.Property_Type` WRITE;
/*!40000 ALTER TABLE `dbo.Property_Type` DISABLE KEYS */;
INSERT INTO `dbo.Property_Type` VALUES (1,'Chung cư',1),(2,'Căn hộ dịch vụ',1),(3,'Nhà riêng',1),(4,'Villa',0),(5,'Studio',0),(6,'Office',0);
/*!40000 ALTER TABLE `dbo.Property_Type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dbo.Service`
--

DROP TABLE IF EXISTS `dbo.Service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dbo.Service` (
  `ID` tinyint(4) DEFAULT NULL,
  `Service_Name` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dbo.Service`
--

LOCK TABLES `dbo.Service` WRITE;
/*!40000 ALTER TABLE `dbo.Service` DISABLE KEYS */;
INSERT INTO `dbo.Service` VALUES (1,'Ban công'),(2,'Thang máy'),(3,'Nhà bếp'),(4,'Hồ bơi'),(5,'Wifi'),(6,'Chỗ đậu xe');
/*!40000 ALTER TABLE `dbo.Service` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-09-18 10:46:28
