CREATE TABLE IF NOT EXISTS countries(
  id BIGINT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS cities(
  id BIGINT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  population FLOAT,
  country_id BIGINT,
  square FLOAT,
  is_active BOOLEAN DEFAULT TRUE,
  FOREIGN KEY (country_id)
    REFERENCES countries(id)
  ON DELETE CASCADE
);

INSERT INTO countries(name) VALUES ('USA'),
('China'), ('Japan'), ('Germany'), ('India'),
('Greate Britain'), ('France'), ('Italy'), ('Brazil'),
('Canada');

INSERT INTO cities(name, population, country_id, square) VALUES
  ('New-York', 8491079, 1, 783.8),
  ('Los-Angeles', 3928864, 1, 1302),
  ('Chicago', 2722389, 1, 606.1),
  ('Huston', 2239558, 1, 1733),
  ('Chongqing', 34000000, 2, 82300),
  ('Shanqai', 24200000, 2, 6341),
  ('Pekin', 21700000, 2, 16800),
  ('Tienzinensis', 15700000, 2, 11760),
  ('Yokogama', 3697894, 3, 437.38),
  ('Osaka', 2668586, 3, 222.30),
  ('Nagoya', 2283289, 3, 326.45),
  ('Sapporo', 1918096, 3, 1710.00),
  ('Berlin', 3644826, 4, 891.8),
  ('Hamburg', 1841179, 4, 755.2),
  ('Munich', 1471508, 4, 310.7),
  ('Koln', 1085664, 4, 405.2),
  ('Mumbai', 12478447, 5, 603.4),
  ('Deli', 11007835, 5, 1484),
  ('Bangalor', 8425970, 5, 741),
  ('Haidarabad', 6809970, 5, 650),
  ('London', 8173900, 6, 1572),
  ('Birmingham', 1028700, 6, 267.8),
  ('Leeds', 751485, 6, 551.7),
  ('Sheffield', 551800, 6, 367.9),
  ('Paris', 2249975, 7, 367.9),
  ('Marsel', 850636, 7, 240.6),
  ('Lion', 491268, 7, 47.87),
  ('Toulouse', 447360, 7, 118.3),
  ('Roma', 2867078, 8, 1285),
  ('Milan', 1350487, 8, 181.8),
  ('Napoli', 972212, 8, 119),
  ('Torino', 889600, 8, 130.2),
  ('São Paulo', 12176866, 9, 1521),
  ('Rio de Janeiro', 6688927, 9, 1255),
  ('Brazilia', 2974703, 9, 5802),
  ('Salvador', 2857329, 9, 693.8),
  ('Toronto', 2503281, 10, 630.2),
  ('Monreal', 1620693, 10, 431.5),
  ('Calgary', 988193, 10, 825.3),
  ('Ottawa', 812129, 10, 2790);

SELECT c.id, c.name, c.square, c.population, c.is_active, ctrs.name FROM cities c
  INNER JOIN countries ctrs ON ctrs.id = c.country_id
ORDER BY c.population DESC
LIMIT 5;

SELECT c.id, c.name, c.square, c.population, c.is_active, ctrs.name FROM cities c
  INNER JOIN countries ctrs ON ctrs.id = c.country_id
ORDER BY c.square DESC
LIMIT 5;

SELECT c.id, c.name, c.square, c.population, c.is_active, round((c.population / c.square), 2) AS density, ctrs.name FROM cities c
  INNER JOIN countries ctrs ON ctrs.id = c.country_id
ORDER BY density DESC
LIMIT 5;

ALTER TABLE cities ADD COLUMN density FLOAT(10, 2);
UPDATE cities SET density=ROUND((cities.population / cities.square), 2)

UPDATE cities SET is_active=false
WHERE cities.id IN (40, 5, 35, 12, 39);

SELECT ctrs.name, count(*) FROM cities c
  INNER JOIN countries ctrs ON ctrs.id = c.country_id
GROUP BY ctrs.name;
DELETE countries WHERE id IN (5, 9);