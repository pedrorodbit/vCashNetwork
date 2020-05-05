SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `peers` (
  `id` int(11) UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `ip` varchar(45) NOT NULL,
  `port` int(11) NOT NULL,
  `services` int(11) NOT NULL,
  `lastsend` int(11) NOT NULL,
  `lastrecv` int(11) NOT NULL,
  `conntime` int(11) NOT NULL,
  `version` int(11) NOT NULL,
  `subver` varchar(64) NOT NULL,
  `inbound` enum('0','1') NOT NULL,
  `releasetime` int(11) NOT NULL,
  `startingheight` int(11) NOT NULL,
  `banscore` int(11) NOT NULL,
  KEY `peers` (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
