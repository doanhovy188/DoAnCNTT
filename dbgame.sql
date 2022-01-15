-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th1 15, 2022 lúc 07:58 AM
-- Phiên bản máy phục vụ: 10.5.12-MariaDB
-- Phiên bản PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `id17709912_dbgame`
--
CREATE DATABASE IF NOT EXISTS `id17709912_dbgame` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id17709912_dbgame`;

DELIMITER $$
--
-- Thủ tục
--
DROP PROCEDURE IF EXISTS `insertScore`$$
CREATE DEFINER=`id17709912_root`@`%` PROCEDURE `insertScore` (IN `INuserName` VARCHAR(30), IN `INidGame` INT(11), IN `INscore` INT(11))  BEGIN
	SELECT @tontai := COUNT(*) 
	FROM highscore 
	WHERE highscore.userName = INuserName COLLATE utf8_general_ci
    AND highscore.idGame = INidGame;
	IF @tontai > 0 THEN 
		SELECT @oldScore := Score 
    	FROM highscore 
    	WHERE highscore.userName = INuserName COLLATE utf8_general_ci AND highscore.idGame = INidGame;
    	IF @oldScore < INscore THEN
    		SET @date = (SELECT GETDATE());
            UPDATE highscore 
        	SET Score=INscore, date=@date
        	WHERE highscore.userName = INuserName COLLATE utf8_general_ci AND highscore.idGame = INidGame; 
    	END IF; 
	ELSE 
		SET @date = (SELECT GETDATE());
		INSERT INTO highscore(userName, idGame, Score,date) VALUES (INusername, INidGame, INscore, @date ); 
END IF;
END$$

DROP PROCEDURE IF EXISTS `profile`$$
CREATE DEFINER=`id17709912_root`@`%` PROCEDURE `profile` (IN `username` VARCHAR(30))  SELECT game.gameName, highscore.Score, highscore.rank 
FROM game, (SELECT *, rank() OVER ( partition by idGame order by Score desc ) as rank FROM highscore) as highscore
WHERE highscore.userName = username COLLATE utf8_general_ci
AND highscore.idGame = game.idGame$$

DROP PROCEDURE IF EXISTS `test`$$
CREATE DEFINER=`id17709912_root`@`%` PROCEDURE `test` (IN `INuserName` VARCHAR(30), IN `INidGame` INT)  SELECT @tontai := COUNT(*) 
	FROM highscore 
	WHERE highscore.userName = INuserName AND highscore.idGame = INidGame$$

DROP PROCEDURE IF EXISTS `testtt`$$
CREATE DEFINER=`id17709912_root`@`%` PROCEDURE `testtt` (IN `INuserName` INT(30), IN `INidGame` INT, IN `INscore` INT)  BEGIN
	SELECT @tontai := COUNT(*) 
	FROM highscore 
	WHERE highscore.userName = INuserName AND highscore.idGame = INidGame;
    SELECT @tontai;
	IF @tontai > 0 THEN 
		SELECT @oldScore := Score 
    	FROM highscore 
    	WHERE highscore.userName = INuserName AND highscore.idGame = INidGame;
    	IF @oldScore < INscore THEN
    		UPDATE highscore 
        	SET Score=INscore 
        	WHERE highscore.userName = INuserName AND highscore.idGame = INidGame; 
    	END IF; 
	ELSE 
		INSERT INTO highscore(userName, idGame, Score) VALUES (INusername, INidGame, INscore); 
END IF;
END$$

--
-- Các hàm
--
DROP FUNCTION IF EXISTS `GETDATE`$$
CREATE DEFINER=`id17709912_root`@`%` FUNCTION `GETDATE` () RETURNS VARCHAR(12) CHARSET utf8mb4 RETURN DATE_FORMAT(CURRENT_DATE(), "%d-%m-%Y")$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `userName` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `passWord` varchar(30) NOT NULL,
  `image` varchar(30) NOT NULL,
  PRIMARY KEY (`userName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`userName`, `name`, `passWord`, `image`) VALUES
('admin', 'admin', 'admin', 'avatar1.png'),
('admin1', 'admin1', 'admin', 'avatar3.png'),
('doanhovy188', 'vivip123', 'doanhovy', 'avatar1.png'),
('doanhovy1882001', 'vivip', 'doanhovy', 'avatar5.png'),
('huuthanh', 'huuthanh', 'huuthanh', 'avatar6.png'),
('taikhoantest1', 'tktest', 'doanhovy', 'avatar4.png'),
('thanh', 'thanh', 'thanh123', 'avatar12.png'),
('vippro', 'vippro', 'vippro', 'avatar4.png'),
('vippro123', 'vippro123', 'vippro123', 'avatar6.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `game`
--

DROP TABLE IF EXISTS `game`;
CREATE TABLE IF NOT EXISTS `game` (
  `idGame` int(11) NOT NULL,
  `gameName` varchar(30) NOT NULL,
  PRIMARY KEY (`idGame`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `game`
--

INSERT INTO `game` (`idGame`, `gameName`) VALUES
(1, 'Snake'),
(2, '2048'),
(3, 'PaperPlane');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `highscore`
--

DROP TABLE IF EXISTS `highscore`;
CREATE TABLE IF NOT EXISTS `highscore` (
  `userName` varchar(30) NOT NULL,
  `idGame` int(11) NOT NULL,
  `Score` int(11) NOT NULL,
  `date` varchar(30) NOT NULL,
  PRIMARY KEY (`userName`,`idGame`),
  KEY `idGame` (`idGame`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `highscore`
--

INSERT INTO `highscore` (`userName`, `idGame`, `Score`, `date`) VALUES
('admin', 1, 25, '13-12-2021'),
('admin', 2, 400, '30-10-2021'),
('admin', 3, 13, '19-11-2021'),
('doanhovy188', 1, 31, '15-11-2021'),
('doanhovy188', 2, 800, '19-11-2021'),
('doanhovy188', 3, 0, '13-12-2021'),
('doanhovy1882001', 1, 6, '11-12-2021'),
('doanhovy1882001', 2, 1548, '12-12-2021'),
('doanhovy1882001', 3, 6, '11-12-2021'),
('huuthanh', 1, 7, '13-12-2021'),
('huuthanh', 2, 948, '13-12-2021'),
('huuthanh', 3, 0, '13-12-2021'),
('taikhoantest1', 1, 9, '13-12-2021'),
('taikhoantest1', 2, 1428, '13-12-2021'),
('taikhoantest1', 3, 3, '13-12-2021'),
('thanh', 3, 3, '13-12-2021'),
('vippro', 1, 29, '3-12-2021'),
('vippro', 2, 1004, '27-11-2020'),
('vippro', 3, 24, '27-11-2021'),
('vippro123', 1, 25, '13-12-2021'),
('vippro123', 2, 784, '12-12-2021'),
('vippro123', 3, 4, '12-12-2021');

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `top_2048`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `top_2048`;
CREATE TABLE IF NOT EXISTS `top_2048` (
`rank` bigint(21)
,`image` varchar(30)
,`name` varchar(30)
,`Score` int(11)
,`date` varchar(30)
);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `top_paperPlane`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `top_paperPlane`;
CREATE TABLE IF NOT EXISTS `top_paperPlane` (
`rank` bigint(21)
,`image` varchar(30)
,`name` varchar(30)
,`Score` int(11)
,`date` varchar(30)
);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `top_snake`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `top_snake`;
CREATE TABLE IF NOT EXISTS `top_snake` (
`rank` bigint(21)
,`image` varchar(30)
,`name` varchar(30)
,`Score` int(11)
,`date` varchar(30)
);

-- --------------------------------------------------------

--
-- Cấu trúc cho view `top_2048`
--
DROP TABLE IF EXISTS `top_2048`;

CREATE ALGORITHM=UNDEFINED DEFINER=`id17709912_root`@`%` SQL SECURITY DEFINER VIEW `top_2048`  AS  select `highscore`.`rank` AS `rank`,`account`.`image` AS `image`,`account`.`name` AS `name`,`highscore`.`Score` AS `Score`,`highscore`.`date` AS `date` from (`account` join (select `highscore`.`userName` AS `userName`,`highscore`.`idGame` AS `idGame`,`highscore`.`Score` AS `Score`,`highscore`.`date` AS `date`,rank() over ( partition by `highscore`.`idGame` order by `highscore`.`Score` desc) AS `rank` from `highscore` where `highscore`.`idGame` = 2) `highscore`) where `account`.`userName` = `highscore`.`userName` order by `highscore`.`rank` ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `top_paperPlane`
--
DROP TABLE IF EXISTS `top_paperPlane`;

CREATE ALGORITHM=UNDEFINED DEFINER=`id17709912_root`@`%` SQL SECURITY DEFINER VIEW `top_paperPlane`  AS  select `highscore`.`rank` AS `rank`,`account`.`image` AS `image`,`account`.`name` AS `name`,`highscore`.`Score` AS `Score`,`highscore`.`date` AS `date` from (`account` join (select `highscore`.`userName` AS `userName`,`highscore`.`idGame` AS `idGame`,`highscore`.`Score` AS `Score`,`highscore`.`date` AS `date`,rank() over ( partition by `highscore`.`idGame` order by `highscore`.`Score` desc) AS `rank` from `highscore` where `highscore`.`idGame` = 3) `highscore`) where `account`.`userName` = `highscore`.`userName` order by `highscore`.`rank` ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `top_snake`
--
DROP TABLE IF EXISTS `top_snake`;

CREATE ALGORITHM=UNDEFINED DEFINER=`id17709912_root`@`%` SQL SECURITY DEFINER VIEW `top_snake`  AS  select `highscore`.`rank` AS `rank`,`account`.`image` AS `image`,`account`.`name` AS `name`,`highscore`.`Score` AS `Score`,`highscore`.`date` AS `date` from (`account` join (select `highscore`.`userName` AS `userName`,`highscore`.`idGame` AS `idGame`,`highscore`.`Score` AS `Score`,`highscore`.`date` AS `date`,rank() over ( partition by `highscore`.`idGame` order by `highscore`.`Score` desc) AS `rank` from `highscore` where `highscore`.`idGame` = 1) `highscore`) where `account`.`userName` = `highscore`.`userName` order by `highscore`.`rank` ;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `highscore`
--
ALTER TABLE `highscore`
  ADD CONSTRAINT `highscore_ibfk_1` FOREIGN KEY (`idGame`) REFERENCES `game` (`idGame`),
  ADD CONSTRAINT `highscore_ibfk_2` FOREIGN KEY (`userName`) REFERENCES `account` (`userName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
