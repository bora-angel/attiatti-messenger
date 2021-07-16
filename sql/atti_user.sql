DROP TABLE IF EXISTS `atti_user`;

CREATE TABLE `atti_user`(
    `user_idnum` TINYINT(4) AUTO_INCREMENT NOT NULL,
    `user_id` CHAR(15) NOT NULL,
    `user_pw` VARCHAR(127) NOT NULL,
    `user_name` VARCHAR(41) NOT NULL,
    `user_telnum` CHAR(14) NOT NULL,
    `user_photo` VARCHAR(200),
    `user_photo_filename` VARCHAR(200),
    `user_sex` ENUM('남자','여자'),
    `user_birth` DATE,
    `user_email` VARCHAR(100),
    `user_address` VARCHAR(100),
    `user_etc` TEXT,
    PRIMARY KEY(`user_idnum`)
)AUTO_INCREMENT = 2;

INSERT INTO `atti_user` VALUES (0, 'na1004', password('na1004'), '정나영', '010-1004-1004', '../img/1.jepg', '1.jepg', '여자', '2020-12-12', 'na1004@attiatti.co.kr', '경기도 안산시 상록구 부곡동 천사로 1004호', '아이 엠 에인젤.');
INSERT INTO `atti_user` VALUES (1, 'do1004', password('do1004'), '김동연', '010-1004-1004', '../img/1.jepg', '1.jepg', '남자', '2000-12-12', 'do1004@attiatti.co.kr', '경기도 안산시 단원구 선부3동 ', '아이 엠 에인젤3.');