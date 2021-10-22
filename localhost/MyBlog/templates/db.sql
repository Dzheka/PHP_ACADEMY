CREATE
DATABASE `MyBlog`;
USE MyBlog;
CREATE TABLE `signIn`
(
    `id`    INT AUTO_INCREMENT NOT NULL,
    `name`  VARCHAR(180) NOT NULL unique,
    `email` VARCHAR(255) NOT NULL,
    `pass`  VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
 ) ENGINE = InnoDB;

SELECT * FROM signIn;
INSERT INTO signIn(name, email, pass) values ('Fara','faramateo@gmail.com','1234f');
