CREATE DATABASE my_countries;


CREATE TABLE countries(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255)
);


INSERT INTO countries(`name`) 
VALUES  ('Tajikistan'),
	('Russia'),
	('USA'),
	('Canada'),
	('Germany'),
	('Australia'),
	('England'),
	('Switzerland'),
	('China'),
	('India');


CREATE TABLE cities(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name NOT NULL VARCHAR(255),
    population BIGINT,
    country_id INT NOT NULL,
    square FLOAT,
    is_active boolean DEFAULT true,
    FOREIGN KEY (country_id) REFERENCES countries(id) ON DELETE CASCADE
);


INSERT INTO cities(`name`, `population`, `country_id`, `square`)
VALUES 	('Душанбе', 1000000, 1, 127),
        ('Худжанд', 181600, 1, 40),
       	('Кулоб', 214700, 1, 35),
      	('Хоруг', 30500, 1, 64100),
	('Москва', 12678080, 2, 2511),
        ('Санкт-Петербург', 539806, 2, 1439),
        ('Казан', 125739, 2, 515.8),
        ('Новосибирск', 162531, 2, 502.7),
	('Toronto',2731571, 4,  630.2),
	('Montreal',1704694, 4,  365.1),
	('Calgary',1239220, 4,  825.3),
	('Ottawa',934243, 4,  790.2),
	('Nagoya',2283289, 9, 326.45),
	('Toyohashi',377045, 9, 261.35),
	('Okazaki',371380, 9, 387.24),
	('Ichinomiya',375939, 9, 113.9),
	('Berlin',260000, 5, 891.1),
	('Stuttgart',634000, 5, 207.4),
	('Hamburg',1686100, 5, 755.3),
	('München',1185400, 5, 310.7),
	('London',7074265, 7, 49.12),	
	('Birmingham',1020589, 7, 49.42),
	('Leeds',726939, 7, 49.43),
	('Glasgow',616430, 7, 47.73),
	('Mumbai', 12442373, 10, 603.4),
        ('Delhi', 11034555, 10, 1484),
        ('Bangalore', 8443675, 10, 741),
        ('Chennai', 4646732, 10, 426),
	('Zurich',341730, 8, 47.367 ),
	('Geneva', 183981, 8, 46.202),
	('Basel‑City', 164488, 8, 47.558),
	('Bern', 121631, 8, 46.948),
	('Sydney',4741874, 6, 433.750),
	('Melbourne',4677157, 6, 557.346),
	('Brisbane', 2326656, 6, 203.040),
	('Perth', 2004696, 6, 141.620);


// Вывести 5 самых многонаселенных городов отсортировать в порядке убывания
SELECT * FROM cities ORDER BY population DESC LIMIT 5;

//Вывести 5 самых больших городов отсортировать по возрастанию
SELECT * FROM (SELECT * FROM cities ORDER BY square DESC LIMIT 5) AS tmp ORDER BY square ASC;

//Вывести 5 самых многонаселенных стран с вычисленным средним значение (человека на квадратный метр)
SELECT countries.id as ID, countries.name as Country_Name,
SUM(cities.population) as POPULATION,
ROUND(SUM(cities.population) / SUM(cities.square)) as AVG
FROM countries
INNER JOIN cities on countries.id = country_id
GROUP BY countries.id ORDER BY POPULATION desc LIMIT 5;

//Добавить в таблицу городов поле и записать туда среднее значение (человека на квадратный метр)
ALTER TABLE cities ADD density FLOAT(10, 2);
UPDATE cities SET density=ROUND(population/square, 2) WHERE 1;


//у 5 городов с меньшим значением нового поля обновить значения поля   is_active на false
UPDATE cities SET is_active = false ORDER BY density ASC LIMIT 5;

//Удалить 2 страны с наименьшим количеством городов
DELETE FROM countries ORDER BY name DESC LIMIT 2;

