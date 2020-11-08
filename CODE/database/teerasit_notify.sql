/*
 Date: 08/11/2020 14:52:13
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for userLine
-- ----------------------------
DROP TABLE IF EXISTS `userLine`;
CREATE TABLE `userLine` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `appId` varchar(25) DEFAULT NULL,
  `cid` varchar(13) DEFAULT NULL,
  `accessToken` varchar(255) DEFAULT NULL,
  `active` char(1) DEFAULT NULL,
  `addwhen` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
