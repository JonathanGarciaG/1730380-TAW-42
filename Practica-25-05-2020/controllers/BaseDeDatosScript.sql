CREATE DATABASE inventario;

USE inventario;

CREATE TABLE users(
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(20),
    lastname VARCHAR(20),
    user_name VARCHAR(45),
    user_password VARCHAR(255),
    user_email VARCHAR(64),
    date_added DATETIME
);

CREATE TABLE categories(
    id_category INT PRIMARY KEY AUTO_INCREMENT,
    name_category VARCHAR(255),
    description_category VARCHAR(255),
    date_added DATETIME
);