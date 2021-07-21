CREATE DATABASE alifshop;

USE alifshop;

select database();

CREATE TABLE `products`
(
    id            INT PRIMARY KEY AUTO_INCREMENT,
    product_name  VARCHAR(255) NOT NULL,
    product_image VARCHAR(2048),
    category      VARCHAR(255) NOT NULL,
    description   TEXT         NOT NULL,
    price         INT          NOT NULL,
    guarantee     INT,
    manufacturer  VARCHAR(255) NOT NULL,
    model         VARCHAR(255) NOT NULL,
    year_of_issue INT          NOT NULL,
    created_at    TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP
);

DESC products;


CREATE TABLE `users`
(
    id       INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL UNIQUE ,
    password VARCHAR(255) NOT NULL,
    email    VARCHAR(255) NOT NULL,
    is_admin BOOLEAN DEFAULT FALSE
);

select *
from products;

update users set is_admin = 1 where id = 2;

insert into products(product_name, product_image, category, description, price, guarantee, manufacturer, model, year_of_issue)
VALUES('Samurai', '../images/unnamed.png', 'test', '1001 y.o Samurai', 1200, 1, 'Japan', 'Classic', 1998);