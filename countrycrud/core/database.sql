-- Создать таблицу стран с полями ( id, name)
CREATE TABLE `countries`(
    `id` INT AUTO_INCREMENT NOT NULL,
    `name` VARCHAR(80) NOT NULL,
    INDEX(`name`),
    PRIMARY KEY(`id`)
) ENGINE=INNODB;

-- Создать таблицу городов с полями ( id, name, population, country_id, area, is_active)
CREATE TABLE `cities`(
    `id` INT AUTO_INCREMENT NOT NULL,
    `name` VARCHAR(80) NOT NULL,
    `population` INT NOT NULL,
    `area` INT NOT NULL,
    `is_active` BOOLEAN NOT NULL DEFAULT TRUE,
    `country_id` INT NOT NULL,
    INDEX(`name`, `population`, `area`),
    PRIMARY KEY(`id`),
    FOREIGN KEY(`country_id`) REFERENCES `countries`(`id`) ON DELETE CASCADE
) ENGINE=INNODB;


-- Заполнить таблицы данными (10 стран, 40 городов)
INSERT INTO `countries`(`name`) VALUES
('Россия'), ('Америка'), ('Китай'), ('Индия');

INSERT INTO `cities`(`name`, `population`, `area`, `is_active`, `country_id`) VALUES
('Москва', 12455682, 2561500, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Россия')),
('Санкт-Петербург', 5384342, 1439000, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Россия')),
('Новосибирск', 1620162, 502700, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Россия')),
('Екатеринбург', 1495066, 495000, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Россия')),
('Нижний Новгород', 1244254, 460000, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Россия')),
('Казань', 1257341, 425300, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Россия')),
('Челябинск', 1187960, 530000, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Россия')),
('Самара', 1144759, 541382, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Россия')),
('Омск', 1139897, 572900, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Россия')),
('Уфа', 1125933, 707930, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Россия')),
('Нью Йорк', 8253213, 790000, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Америка')),
('Лос-Анджелес', 3970219, 1213900, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Америка')),
('Чикаго', 2677643, 588700, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Америка')),
('Хьюстон', 2316120, 1651100, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Америка')),
('Феникс', 1708127, 1340600, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Америка')),
('Филадельфия', 1578487, 347600, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Америка')),
('Сан Антонио', 1567118, 1194000, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Америка')),
('Сан Диего', 1422420, 842000, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Америка')),
('Даллас', 1343266, 882900, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Америка')),
('Сан Хосе', 1013616, 459700, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Америка')),
('Шанхай', 26917322, 3900000, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Китай')),
('Пекин', 20381745, 1300000, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Китай')),
('Чонгквинг', 15773658, 390000, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Китай')),
('Тианджин', 13552359, 1200000, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Китай')),
('Гуанджоу', 13238590, 2500000, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Китай')),
('Шенджен', 12313714, 6100000, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Китай')),
('Ченгду', 9104865, 1300000, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Китай')),
('Нанджин', 8789855, 1237000, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Китай')),
('Ухань', 8346205, 1528000, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Китай')),
('Ксиянь', 7480320, 1088000, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Китай')),
('Мумбай', 12442373, 603000, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Индия')),
('Дели', 11007835, 1484000, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Индия')),
('Бангалор', 8436675, 741000, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Индия')),
('Хайдарабад', 6809970, 650000, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Индия')),
('Ахмедабад', 5570585, 505000, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Индия')),
('Ченнай', 4681087, 426000, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Индия')),
('Калкути', 4486679, 206000, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Индия')),
('Сурат', 4467797, 474185, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Индия')),
('Джайпур', 3046163, 467000, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Индия')),
('Канпур', 2767031, 260000, TRUE, (SELECT `id` FROM `countries` WHERE `countries`.`name`='Индия'));

ALTER TABLE `cities` ADD `density` DOUBLE NOT NULL DEFAULT 0;
UPDATE `cities` SET `cities`.`density` = (cities.population / cities.area) ORDER BY cities.id;

UPDATE `cities` SET `cities`.`is_active` = FALSE ORDER BY `cities`.`density` ASC LIMIT 5;
DELETE FROM `cities` WHERE `cities`.`is_active` = FALSE;