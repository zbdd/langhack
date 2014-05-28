/*
 Source Host           : localhost
 Source Database       : langhack
 File Encoding         : utf-8

 Date: 05/28/2014 16:04:37 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `User`
-- ----------------------------
DROP TABLE IF EXISTS `User`;
CREATE TABLE `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `interest` varchar(255) DEFAULT NULL,
  `native` varchar(255) DEFAULT NULL,
  `learn` varchar(255) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT '3',
  `role` varchar(255) DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `User`
-- ----------------------------
BEGIN;
INSERT INTO `User` VALUES ('7', 'agileup@gmail.com', 'ae948619eebb9a3dcd33e33409592c22.jpg', 'Minki', 'Choi', '$2y$10$TddsUBPfiUYUY9mwmSl4pOxNmjhebvJcz/pl1d9EnfBWbagefB6jC', 'Hacking, Dancing', 'Korean', 'English', '37.56568', '127.007058', '2', null, '2014-05-27 16:16:38', '2014-05-21 17:57:22'), ('8', 'schpeltor@seoul.go.kr', 'bed1d1a2d473717a3dec36467635f823.jpg', '용현', '조', '$2y$10$A2lywrE4D4ad8v10RzA/Y.TyCaiZ0txAUSqhvPR3m2IxpVRqBFVO6', 'Movie', 'Korean', 'English', '37.565612', '127.015041', '4', null, '2014-05-22 09:31:25', '2014-05-21 18:20:06'), ('9', 'gsongnyc@gmail.com', '18600a1644e40793bde228e75e3c5ebb.jpg', 'George', 'Song', '$2y$10$2.ZLpQpoWEg3YieulbX8A.toWUxn2gmmzeHv5QD2V8b2D6nG5gV/i', 'Sports, Basketball, Travel', 'English', 'Korean', '37.564227', '127.009185', '5', null, '2014-05-21 18:39:29', '2014-05-21 18:30:45'), ('10', 'leo@gmail.com', '11.png', 'Leo', 'DiCap', '$2y$10$2.ZLpQpoWEg3YieulbX8A.toWUxn2gmmzeHv5QD2V8b2D6nG5gV/i', 'Acting, Cigar, Cocaine, Fashion', 'English', 'Korean', '37.568129', '127.008389', '4', null, null, '2014-05-21 18:30:45'), ('11', 'durber.zac@about.me', '22.png', 'Zac', 'Durber', '$2y$10$2.ZLpQpoWEg3YieulbX8A.toWUxn2gmmzeHv5QD2V8b2D6nG5gV/i', 'AFL, Dancing, Coffee, Running', 'English', 'Korean', '37.566802', '127.011243', '5', null, null, '2014-05-21 18:30:45'), ('12', 'Ziyi@gmail.com', '33.png', 'Ziyi', 'Zang', '$2y$10$2.ZLpQpoWEg3YieulbX8A.toWUxn2gmmzeHv5QD2V8b2D6nG5gV/i', 'Shopping, Singing, Acting, Make up', 'Chinese', 'Korean, English', '37.569353', '127.001501', '1', null, null, '2014-05-21 18:30:45'), ('13', 'auge4235@gmail.com', '5c404102c96f1cfcef61ecee17618a41.jpg', '영재', '조', '$2y$10$1CqKHBaQq9TWMrjtHZ3Tp.144rKmdfaSQfAB90GX/agQdem40Leq6', 'Shouting', 'Korean', 'Korean', '37.564063', '127.012832', '3', null, '2014-05-21 19:30:29', '2014-05-21 19:28:49'), ('14', 'bingbing@baidu.com', '44.png', 'Bingbing', 'Fan', '$2y$10$2.ZLpQpoWEg3YieulbX8A.toWUxn2gmmzeHv5QD2V8b2D6nG5gV/i', 'TV shows, Drama', 'Chinese', 'Korean, English', '37.563145', '127.006436', '4', null, null, '2014-05-21 18:30:45'), ('15', 'vincent@yahoo.com', '55.png', 'Vincent', 'Cassel', '$2y$10$2.ZLpQpoWEg3YieulbX8A.toWUxn2gmmzeHv5QD2V8b2D6nG5gV/i', '', 'French', 'Korean, English', '37.569609', '127.014955', '5', null, null, '2014-05-21 18:30:45'), ('16', 'scarlette@gmail.com', '66.png', 'Scarlette', 'Smith', '$2y$10$2.ZLpQpoWEg3YieulbX8A.toWUxn2gmmzeHv5QD2V8b2D6nG5gV/i', '', 'English', 'Korean', '37.566326', '126.996415', '2', null, null, '2014-05-21 18:30:45'), ('17', 'jina@paran.com', '77.png', 'Jieun', 'Lee', '$2y$10$2.ZLpQpoWEg3YieulbX8A.toWUxn2gmmzeHv5QD2V8b2D6nG5gV/i', 'singing', 'Korean', 'English', '37.567823', '127.010277', '5', null, null, '2014-05-21 18:30:45'), ('18', 'miguel@gmail.com', '88.jpg', 'Miguel', 'Cabrera', '$2y$10$2.ZLpQpoWEg3YieulbX8A.toWUxn2gmmzeHv5QD2V8b2D6nG5gV/i', '', 'Spanish', 'Korean', '37.566632', '127.011929', '2', null, null, '2014-05-21 18:30:45'), ('20', 'doyoujin@gmail.com', '25d308e9d8e55e39d03fc5ac4508f8d8.jpg', 'Youjin', 'Do', '$2y$10$aQOHXnA6oNdxUsPZN.1NVOzUigGZKQN4ckkuraFMVG7W7ys/idI72', 'Surfing, Writing', 'Korean', 'English', null, null, '0', null, null, '2014-05-22 09:56:40');
COMMIT;

-- ----------------------------
--  Table structure for `sessions`
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `session_id` varchar(40) NOT NULL,
  `ip_address` varchar(16) NOT NULL,
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) NOT NULL,
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

SET FOREIGN_KEY_CHECKS = 1;
