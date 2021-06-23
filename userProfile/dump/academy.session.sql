CREATE TABLE clients(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    avatar VARCHAR(256),
    biography TEXT NOT NULL,
    ip VARCHAR(50) NOT NULL,
    browser VARCHAR(50) NOT NULL
);