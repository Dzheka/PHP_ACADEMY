DROP TABLE IF EXISTS `rb_requests`;
DROP TABLE IF EXISTS `rb_users`;

CREATE TABLE `rb_users` (
    `username` VARCHAR(40) NOT NULL,
    `password` VARCHAR(64) NOT NULL,
    `first_name` VARCHAR(40) NOT NULL,
    `last_name` VARCHAR(40) NOT NULL,
    `photo` VARCHAR(100) NOT NULL,
    `phonenumber` VARCHAR(16) NOT NULL,
    `email` VARCHAR(60) NOT NULL,
    `bio` TEXT,
    PRIMARY KEY(`username`),
    INDEX(`username`)
) ENGINE=InnoDb;


CREATE TABLE `rb_requests` (
    `id` INT AUTO_INCREMENT NOT NULL,
    `title` VARCHAR(140) NOT NULL,
    `price` INT NOT NULL,
    `type` VARCHAR(40) NOT NULL,
    `image` VARCHAR(100) NOT NULL,
    `images` TEXT,
    `description` TEXT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    `username` VARCHAR(40) NOT NULL,
    PRIMARY KEY(`id`),
    FOREIGN KEY (`username`) REFERENCES `rb_users`(`username`) ON DELETE CASCADE,
    INDEX(`title`)
) ENGINE=InnoDb;