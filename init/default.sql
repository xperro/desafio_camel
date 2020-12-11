
CREATE TABLE user (
    `id` INT NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(255) UNIQUE,
    `name` VARCHAR(255),
    `lastname` VARCHAR(255),
    `user_pass` VARCHAR(255),
    `admin_role` BOOLEAN DEFAULT 0,
    `user_last_login` DATETIME,
    PRIMARY KEY (`id`)
);

INSERT INTO user(email,name, lastname, user_pass, admin_role, user_last_login) VALUES
('jorge@aguilera.cl','Jorge','Aguilera','$2y$12$0fBY64yhOyZ000elLY6Ipe/a4ILCu8ONnHT3zgei1hWJMvYE0/Y2u',1,'2020-12-09 19:30:13');