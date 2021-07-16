DROP TABLE IF EXISTS `atti_admin`;

CREATE TABLE `atti_admin`(
    `admin_idnum` TINYINT(4) AUTO_INCREMENT NOT NULL,
    `admin_id` CHAR(15) NOT NULL,
    `admin_pw` VARCHAR(127) NOT NULL,
    `admin_name` CHAR(10) NOT NULL,
    `admin_tel_num` CHAR(14) NOT NULL,
    `admin_photo` VARCHAR(200) NOT NULL,
    `admin_photo_filename` VARCHAR(200) NOT NULL,
    `admin_email` VARCHAR(200) NOT NULL,
    `admin_etc` TEXT,
    PRIMARY KEY(`admin_idnum`)
) AUTO_INCREMENT = 1;

INSERT INTO `atti_admin` VALUES ('', 'c11st25', password('c11st25'), '보라천사', '010-6511-1412', '../img/2.jpg', '2.jpg', 'murasaki0202@gmail.com', 'BORASAMA');