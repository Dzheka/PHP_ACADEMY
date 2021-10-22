/*Создать БД*/
CREATE DATABASE `home_work3`;
/*Использовать ту БД, которую мы создали*/
USE home_work3;
/*Создать таблицу Countries*/
    CREATE TABLE `Countries`(
    `id` INT AUTO_INCREMENT NOT NULL,
    `NAME` VARCHAR(100) NOT NULL,
    INDEX (`NAME`),
    primary key (`id`)
 )ENGINE = INNODB;
/*Создать таблицу Cities*/
CREATE TABLE `Cities`(
    `id` INT AUTO_INCREMENT NOT NULL,
    `name` VARCHAR(100) NOT NULL,
    `population` INT NOT NULL,
    `area` INT NOT NULL,
    `active` BOOLEAN NOT NULL DEFAULT TRUE,
    `country_id` INT NOT NULL,
    INDEX (`name`, `population`, `area`),
    primary key (`id`),
    foreign key (`country_id`) REFERENCES `countries`(`id`) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE = INNODB;
INSERT INTO `countries`(`name`) VALUES ('Tajikistan'), ('Russia'), ('Germany'), ('USA');
INSERT INTO `cities` (`name`,`population`,`area`, `active`, `country_id`) VALUES
('Dushanbe', 1212434, 7346746, true, (SELECT `id` FROM `countries` WHERE `countries` . `name` = 'Tajikistan')),
('Kulob', 7575765, 122121, true, (SELECT `id` FROM `countries` WHERE `countries` . `name` = 'Tajikistan')),
('Hujand', 7667, 1787, true, (SELECT `id` FROM `countries` WHERE `countries` . `name` = 'Tajikistan')),
('Moscva', 78287246, 90005, true, (SELECT `id` FROM `countries` WHERE `countries` . `name` = 'Russia')),
('Kazan', 87384728, 92093, true, (SELECT `id` FROM `countries` WHERE `countries` . `name` = 'Russia')),
('Sochi', 8374843, 27366, true, (SELECT `id` FROM `countries` WHERE `countries` . `name` = 'Russia')),
('Ufa', 384874, 7478, true, (SELECT `id` FROM `countries` WHERE `countries` . `name` = 'Russia')),
('Berlin', 28732873, 32323, true, (SELECT `id` FROM `countries` WHERE `countries` . `name` = 'Germany')),
('Gamburg', 28732873, 32323, true, (SELECT `id` FROM `countries` WHERE `countries` . `name` = 'Germany')),
('Vashington', 28732873, 32323, true, (SELECT `id` FROM `countries` WHERE `countries` . `name` = 'USA'));

/*Вывести 5 самых многонаселенных городов отсортировать в порядке убывания*/
SELECT * FROM `cities` ORDER BY `cities`.`population` DESC LIMIT 5;

/*Вывести 5 самых больших городов отсортировать по возрастанию*/
SELECT * FROM (
                  SELECT * FROM cities ORDER BY area DESC LIMIT 5
              ) AS S ORDER BY area;

/*Удалить 2 страны с наименьшим количеством городов*/
ELECT `countries`.`name`, COUNT(`cities`.`name`) AS `citiesCount` FROM `countries` INNER JOIN `cities` ON `countries`.`id`=`cities`.`country_id` GROUP BY `countries`.`id` ORDER BY `citiesCount` ASC LIMIT 2;
ALTER TABLE `cities` ADD CONSTRAINT fk_name FOREIGN KEY(`country_id`) REFERENCES `countries`(`id`) ON DELETE CASCADE;
DELETE FROM `countries` WHERE id IN (SELECT `countries`.`id` FROM `countries` INNER JOIN `cities` ON `countries`.`id`=`cities`.`country_id` GROUP BY `countries`.`id` ORDER BY COUNT(`cities`.`name`) ASC LIMIT 2);