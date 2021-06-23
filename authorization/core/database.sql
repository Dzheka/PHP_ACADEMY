CREATE TABLE users(
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    uname VARCHAR(80) NOT NULL,
    usurname VARCHAR(80) NOT NULL,
    ubio TEXT,
    uphoto VARCHAR(120),
    INDEX(uname, usurname)
) ENGINE=InnoDB;

SELECT COUNT(id) as howmany FROM users;

SELECT uphoto FROM users WHERE id IN(:first, :second, :third, :fourth, :fifth);

INSERT INTO users(uname, usurname, ubio, uphoto) VALUES
(':uname', ':usurname', ':ubio', ':uphoto');