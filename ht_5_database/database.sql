
--1 Создать БД my_counties
CREATE DATABASE `coutries_db`;

--2 Создать таблицу стран с полями ( id, name)
CREATE TABLE `countries` (`id` INT AUTO_INCREMENT PRIMARY KEY, `name` VARCHAR(255));

--3 Создать таблицу городов с полями ( id, name, population, country_id, площадь, is_active)
CREATE TABLE `cities` (
                          `id` INT AUTO_INCREMENT PRIMARY KEY,
                          `name` VARCHAR(255) NOT NULL,
                          `population` INT NOT NULL,
                          `country_id` INT NOT NULL,
                          `area` DOUBLE NOT NULL,
                          `is_active` BOOLEAN NOT NULL DEFAULT true,
                          FOREIGN KEY (`country_id`) REFERENCES `coutries`(`id`) ON DELETE CASCADE
);

--4 Заполнить таблицы данными (10 стран, 40 городов)
INSERT INTO `coutries` (`id`, `name`) VALUES (null, 'Tajikistan'),
                                             (null, 'Russian'),
                                             (null, 'Germany'),
                                             (null, 'America'),
                                             (null, 'Australia'),
                                             (null, 'India'),
                                             (null, 'Uzbekistan'),
                                             (null, 'France'),
                                             (null, 'England'),
                                             (null, 'Kazakhstan');



INSERT INTO `cities` (name, population, country_id, area, is_active) VALUES ('Dushanbe', 843400, 1, 124.60, true),
                                                                            ('Khujand', 183600, 1, 35, true),
                                                                            ('Panjakent', 43300, 1, 30, true),
                                                                            ('Bokhtar', 111800, 1, 26, true),

                                                                            ('Moskva', 11514330, 2, 2561.50, true),
                                                                            ('St Peterburg',4848742, 2, 1403.00, true),
                                                                            ('Samara', 1164900, 2, 382.00, true),
                                                                            ('Omsk', 1154000, 2, 572.90, true),

                                                                            ('Berlin', 3479740, 3, 891.68, true),
                                                                            ('Hamburg', 1794450, 3, 755.30, true),
                                                                            ('Munchen', 1410260, 3, 310.70, true),
                                                                            ('Bonn', 324900, 3, 141.06, true),

                                                                            ('New-York', 8336817, 4, 141.30, true),
                                                                            ('Missisipi', 2978512, 4, 125.44, true),
                                                                            ('Arizona', 6482505, 4, 295.25, true),
                                                                            ('Washington', 705749, 4, 184.82, true),

                                                                            ('Canberra', 410301, 5, 805.60, true),
                                                                            ('Sidney', 4504470, 5, 121.44, true),
                                                                            ('Darwin', 148564, 5, 112.01, true),
                                                                            ('Bendigo', 95587, 5, 160.00, true),

                                                                            ('Mumbai', 12442373, 6, 603.00, true),
                                                                            ('Delhi', 11007835, 6, 148.30, true),
                                                                            ('Hayderabad', 6809970, 6, 650.00, true),
                                                                            ('Jaipur', 3046163, 6, 200.40, true),

                                                                            ('Tashkent', 2220700, 7, 334.80, true),
                                                                            ('Samarqand', 388600, 7, 108.00, true),
                                                                            ('Farghona', 234070, 7, 70.00, true),
                                                                            ('Quand', 216070, 7, 40.00, true),

                                                                            ('Paris', 2232083, 8, 105.40, true),
                                                                            ('Lion', 480066, 8, 47.87, true),
                                                                            ('Marsel', 839004, 8, 240.62, true),
                                                                            ('Tuluza', 398000, 8, 118.30, true),

                                                                            ('London', 7825020, 9, 1706.80, true),
                                                                            ('Manchester', 535500, 9, 367.94, true),
                                                                            ('Liverpool', 441400, 9, 111.84, true),

                                                                            ('Nursultan', 743000, 10, 710.00, true),
                                                                            ('Shimkent', 657100, 10, 347.00, true),
                                                                            ('Alma-Ata', 14347600, 10, 682, true);


--5 Вывести 5 самых многонаселенных городов отсортировать в порядке убывания
SELECT * FROM `cities` ORDER BY `population` DESC LIMIT 5;

--6 Вывести 5 самых больших городов отсортировать по возрастанию
SELECT * FROM (SELECT * FROM `cities` ORDER BY `area` DESC LIMIT 5) AS `5city` ORDER BY `area` DESC;

--7 Вывести 5 самых многонаселенных стран с вычисленным средним значение (человека на квадратный метр)
ALTER TABLE `cities` ADD COLUMN `people_den` DOUBLE NOT NULL DEFAULT 0;

UPDATE `cities` SET `cities`.`people_den` = ROUND(`cities`.`population` / `cities`.`area`, 4) WHERE `id`;

SELECT countries.name AS `coubtry`, SUM(cities.population) / SUM(cities.area) AS `density` FROM `countries` JOIN `cities` ON cities.country_id = countries.id GROUP BY countries.id ORDER BY `density` LIMIT 5;

--8 у 5 городов с меньшим значением нового поля обновить значения поля   is_active на false
UPDATE `cities` SET `cities`.is_active = FALSE ORDER BY cities.people_den DESC LIMIT 5;

--9 удалить 2 страны с наименьшим количеством городов

ALTER TABLE `countries` ADD COLUMN `cities_quantity` VARCHAR(255) NOT NULL DEFAULT 0;

UPDATE countries SET countries.cities_quantity = (SELECT COUNT(cities.name) AS city_name FROM cities WHERE cities.country_id = countries.id) WHERE id; #COUNT(cities.name) INNER JOIN cities C ON cities.country_id = countries.id;
SELECT * FROM `countries`;

DELETE FROM countries WHERE id ORDER BY cities_quantity LIMIT 2;
