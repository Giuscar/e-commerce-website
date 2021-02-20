CREATE DATABASE IF NOT EXISTS ecommerce charset=utf8mb4;
CREATE USER IF NOT EXISTS 'giuse'@'localhost' IDENTIFIED BY 'giuse';
GRANT ALL ON `ecommerce`.* TO 'giuse'@'localhost';

