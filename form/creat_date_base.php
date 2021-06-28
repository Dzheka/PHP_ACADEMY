create database form;

create table client
(
id      INT          NOT NULL PRIMARY KEY AUTO_INCREMENT,
name    VARCHAR(255) NOT NULL,
surname VARCHAR(255) NOT NULL,
avatar  VARCHAR(2048),
bio     TEXT,
ip      VARCHAR(255) NOT NULL,
browser VARCHAR(255) NOT NULL
);