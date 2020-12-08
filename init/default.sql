
CREATE TABLE user (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255),
    `lastname` VARCHAR(255),
    `admin_role` BOOLEAN DEFAULT 0,
    `user_ip` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
    `user_last_login` DATE,
    PRIMARY KEY (`id`)
);

INSERT INTO user(name, lastname, admin_role, user_ip, user_last_login) VALUES
('Jorge','Aguilera',1,'192.168.1.1','2020-01-01');