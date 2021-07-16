drop table if exists `atti_user_telbook`;

create table `atti_user_telbook`(
    `tb_idnum` TINYINT(4) AUTO_INCREMENT NOT NULL,
    `tb_user_name` VARCHAR(41) NOT NULL,
    `tb_name` VARCHAR(41) NOT NULL,
    `tb_telnum` CHAR(14) NOT NULL,
    `tb_photo` VARCHAR(200),
    `tb_photo_filename` VARCHAR(200),
    `tb_sex` ENUM('남자','여자'),
    `tb_birth` DATE,
    `tb_email` VARCHAR(100),
    `tb_address` VARCHAR(100),
    `tb_etc` TEXT,
    PRIMARY KEY(`tb_idnum`)
)AUTO_INCREMENT = 5;

INSERT INTO `atti_user_telbook` VALUES (0, '정나영', '한임정', '010-1234-1234', '../img/3.png', '3.png', '여자', '2012-12-12', 'im1004@attiatti.co.kr', '경기도 안양시', '아이 엠 에인젤2.');
INSERT INTO `atti_user_telbook` VALUES (1, '정나영', '한임정', '010-1234-1234', '../img/3.png', '3.png', '여자', '2012-12-12', 'im1004@attiatti.co.kr', '경기도 안양시', '아이 엠 에인젤2.');
INSERT INTO `atti_user_telbook` VALUES (2, '정나영', '한임정', '010-1234-1234', '../img/3.png', '3.png', '여자', '2012-12-12', 'im1004@attiatti.co.kr', '경기도 안양시', '아이 엠 에인젤2.');
INSERT INTO `atti_user_telbook` VALUES (3, '정나영', '한임정', '010-1234-1234', '../img/3.png', '3.png', '여자', '2012-12-12', 'im1004@attiatti.co.kr', '경기도 안양시', '아이 엠 에인젤2.');
INSERT INTO `atti_user_telbook` VALUES (4, '김동연', '한임정', '010-1234-1234', '../img/3.png', '3.png', '여자', '2012-12-12', 'im1004@attiatti.co.kr', '경기도 안양시', '아이 엠 에인젤2.');
