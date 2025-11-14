/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 8.0.30 : Database - db_karyawan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_karyawan` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `db_karyawan`;

/*Table structure for table `tb_gaji` */

DROP TABLE IF EXISTS `tb_gaji`;

CREATE TABLE `tb_gaji` (
  `id_gaji` int NOT NULL AUTO_INCREMENT,
  `id_karyawan` int NOT NULL,
  `bulan` varchar(20) DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `total_gaji` decimal(15,2) DEFAULT NULL,
  `tanggal_input` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_gaji`),
  KEY `id_karyawan` (`id_karyawan`),
  CONSTRAINT `tb_gaji_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tb_gaji` */

insert  into `tb_gaji`(`id_gaji`,`id_karyawan`,`bulan`,`tahun`,`total_gaji`,`tanggal_input`) values 
(1,1,'Januari',2025,1300000.00,'2025-10-27 23:35:06'),
(2,2,'Januari',2025,7500000.00,'2025-10-27 23:35:06'),
(4,4,'November',2025,8000000.00,'2025-11-05 13:30:46'),
(5,5,'OKTOBER',2025,5000000.00,'2025-11-05 22:58:50'),
(7,9,'NOVEMBER',2025,4000000.00,'2025-11-06 09:48:45');

/*Table structure for table `tb_karyawan` */

DROP TABLE IF EXISTS `tb_karyawan`;

CREATE TABLE `tb_karyawan` (
  `id_karyawan` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `alamat` text,
  `no_hp` varchar(20) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `gaji_pokok` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tb_karyawan` */

insert  into `tb_karyawan`(`id_karyawan`,`nama`,`jabatan`,`alamat`,`no_hp`,`tanggal_masuk`,`gaji_pokok`) values 
(1,'EFRA MUSING','Manager','Jl. Merpati No.10','081234567890','2020-03-15',13000000.00),
(2,'INDRY MAGUL','Staff','Jl. Kenanga No.5','081298765432','2021-07-01',6000000.00),
(3,'SELA AKONG','HRD','Jl. Melati No.7','081322334455','2019-11-20',8000000.00),
(4,'NOFRISIA','STAFF','jalan kenangan','088283487564','2025-05-14',4000000.00),
(5,'HANY','STAFF','JALAN CITARUM','0855828586','2025-04-17',5000000.00),
(7,'AMBAR','SEKERTARIS','JALAN BATANGHARI','08746572357','2024-07-19',14000000.00),
(9,'JOYCE','STAFF','JALAN GIANYAR','08361738724','2025-10-02',4000000.00),
(11,'PAULA','STAFF','JALAN MELATI','08754854','2025-11-01',5000000.00);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
