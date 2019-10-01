/*
Navicat MySQL Data Transfer

Source Server         : LOCAL
Source Server Version : 100130
Source Host           : localhost:3306
Source Database       : penjualan_db

Target Server Type    : MYSQL
Target Server Version : 100130
File Encoding         : 65001

Date: 2019-10-01 18:44:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `alamat` text,
  `kode` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES ('1', 'Toko Krajcik Ltd', '1374 Nitzsche Tunnel Suite 040\r\nCormiershire, HI 00144-9305                                        ', 'CS-001');
INSERT INTO `customer` VALUES ('2', 'Toko Bailey, Hessel and Stiedemann', '17651 Marvin Locks\nSonyaberg, NV 99141-3221', 'CS-002');
INSERT INTO `customer` VALUES ('3', 'Toko Rosenbaum-Lowe Inc', '3712 Lauren Parks\r\nCarrollville, MN 99891-5689  ', 'CS-003');
INSERT INTO `customer` VALUES ('4', 'Toko Effertz Group', '578 Rolfson Heights\nBreitenbergborough, ID 58483-2236', 'CS-004');
INSERT INTO `customer` VALUES ('5', 'Toko Schulist and Sons', '2461 Prohaska Roads Apt. 298\nLake Elizabeth, MA 72354-2862', 'CS-005');
INSERT INTO `customer` VALUES ('6', 'Toko Goodwin, Ruecker and Heaney', '81703 Brandi Motorway\nNorth Pearliebury, SC 66600', 'CS-006');

-- ----------------------------
-- Table structure for faktur
-- ----------------------------
DROP TABLE IF EXISTS `faktur`;
CREATE TABLE `faktur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_transaksi` varchar(255) NOT NULL,
  `tanggal` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `customer_id` int(11) unsigned NOT NULL,
  `total` int(20) DEFAULT '0',
  `diskon` int(20) DEFAULT '0',
  `status_bayar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of faktur
-- ----------------------------
INSERT INTO `faktur` VALUES ('16', '201909001', '2019-09-28 16:54:24', '1', '750000', '15000', 'Lunas');
INSERT INTO `faktur` VALUES ('17', '201909002', '2019-09-28 16:54:33', '4', '1150000', '57500', 'Lunas');
INSERT INTO `faktur` VALUES ('18', '201909003', '2019-09-28 16:54:33', '1', '5000000', '250000', 'Lunas');
INSERT INTO `faktur` VALUES ('19', '201909004', '2019-09-28 16:54:33', '3', '5900000', '295000', 'Lunas');
INSERT INTO `faktur` VALUES ('20', '201909005', '2019-09-28 16:54:33', '1', '3600000', '180000', 'Lunas');
INSERT INTO `faktur` VALUES ('21', '201909006', '2019-09-28 16:54:33', '4', '2500000', '125000', 'Lunas');
INSERT INTO `faktur` VALUES ('22', '201909007', '2019-09-28 16:54:33', '4', '2330000', '116500', 'Lunas');
INSERT INTO `faktur` VALUES ('23', '201909008', '2019-09-30 19:13:38', '1', '180000', '0', 'Lunas');
INSERT INTO `faktur` VALUES ('24', '201909009', '2019-09-30 19:14:14', '1', '2160000', '108000', 'Lunas');

-- ----------------------------
-- Table structure for faktur_detail
-- ----------------------------
DROP TABLE IF EXISTS `faktur_detail`;
CREATE TABLE `faktur_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faktur_id` int(11) unsigned NOT NULL,
  `helm_id` int(11) unsigned NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `merk` varchar(255) DEFAULT NULL,
  `jumlah` int(11) NOT NULL DEFAULT '1',
  `harga` int(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of faktur_detail
-- ----------------------------
INSERT INTO `faktur_detail` VALUES ('11', '16', '2', 'Predator', 'NHK', '3', '250000');
INSERT INTO `faktur_detail` VALUES ('12', '17', '1', 'Gladiator', 'NHK', '5', '230000');
INSERT INTO `faktur_detail` VALUES ('13', '18', '1', 'Gladiator', 'NHK', '5', '230000');
INSERT INTO `faktur_detail` VALUES ('14', '18', '2', 'Predator', 'NHK', '5', '250000');
INSERT INTO `faktur_detail` VALUES ('15', '18', '7', 'R6', 'NHK', '10', '260000');
INSERT INTO `faktur_detail` VALUES ('16', '19', '1', 'Gladiator', 'NHK', '5', '230000');
INSERT INTO `faktur_detail` VALUES ('17', '19', '2', 'Predator', 'NHK', '19', '250000');
INSERT INTO `faktur_detail` VALUES ('18', '20', '3', 'Vint Edit', 'GM', '10', '180000');
INSERT INTO `faktur_detail` VALUES ('19', '20', '4', 'Evolution', 'GM', '15', '120000');
INSERT INTO `faktur_detail` VALUES ('20', '21', '9', 'Terminator', 'NHK', '5', '500000');
INSERT INTO `faktur_detail` VALUES ('21', '22', '1', 'Gladiator', 'NHK', '4', '230000');
INSERT INTO `faktur_detail` VALUES ('22', '22', '2', 'Predator', 'NHK', '3', '250000');
INSERT INTO `faktur_detail` VALUES ('23', '22', '3', 'Vint Edit', 'GM', '3', '180000');
INSERT INTO `faktur_detail` VALUES ('24', '22', '4', 'Evolution', 'GM', '1', '120000');
INSERT INTO `faktur_detail` VALUES ('25', '23', '11', 'Aerosos', 'MDS', '2', '90000');
INSERT INTO `faktur_detail` VALUES ('26', '24', '10', 'DJ Maru', 'KYT', '10', '80000');
INSERT INTO `faktur_detail` VALUES ('27', '24', '12', 'Extream', 'VOG', '6', '200000');
INSERT INTO `faktur_detail` VALUES ('28', '24', '13', 'Siprit Solid', 'GAG', '8', '20000');

-- ----------------------------
-- Table structure for helm
-- ----------------------------
DROP TABLE IF EXISTS `helm`;
CREATE TABLE `helm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `harga` int(20) NOT NULL DEFAULT '0',
  `stok` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of helm
-- ----------------------------
INSERT INTO `helm` VALUES ('1', 'Gladiator', 'NHK', '230000', '16');
INSERT INTO `helm` VALUES ('2', 'Predator', 'NHK', '250000', '17');
INSERT INTO `helm` VALUES ('3', 'Vint Edit', 'GM', '180000', '17');
INSERT INTO `helm` VALUES ('4', 'Evolution', 'GM', '120000', '34');
INSERT INTO `helm` VALUES ('7', 'R6', 'NHK', '260000', '20');
INSERT INTO `helm` VALUES ('9', 'Terminator', 'NHK', '500000', '5');
INSERT INTO `helm` VALUES ('10', 'DJ Maru', 'KYT', '80000', '10');
INSERT INTO `helm` VALUES ('11', 'Aerosos', 'MDS', '90000', '8');
INSERT INTO `helm` VALUES ('12', 'Extream', 'VOG', '200000', '4');
INSERT INTO `helm` VALUES ('13', 'Siprit Solid', 'GAG', '20000', '12');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'ismail', 'mail', '123456', 'Administator');
INSERT INTO `user` VALUES ('2', 'coba', 'coba', '1234', 'Produksi');
INSERT INTO `user` VALUES ('5', 'admin', 'admin', '1234', 'Administator');
INSERT INTO `user` VALUES ('8', 'coba', 'admincoba', '1234', 'Produksi');
INSERT INTO `user` VALUES ('9', 'Nama', 'nama', '1234', 'Produksi');
INSERT INTO `user` VALUES ('10', 'burhan', 'burhan', '123456', 'Produksi');
INSERT INTO `user` VALUES ('11', 'tes', 'testing', '123456', 'Staff');
INSERT INTO `user` VALUES ('12', 'Nayla', 'produksi', 'produksi', 'Produksi');
INSERT INTO `user` VALUES ('13', 'Nafi', 'staff', 'staff', 'Staff');
INSERT INTO `user` VALUES ('15', 'baru', 'baru', '1234', 'Produksi');
