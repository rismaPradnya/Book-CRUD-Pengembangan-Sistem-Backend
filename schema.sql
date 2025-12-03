CREATE DATABASE book_crud;

USE book_crud;


CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    year_published INT NOT NULL,
    category VARCHAR(100),
    pages INT,
    cover_path VARCHAR(255)
);

DESCRIBE books;

ALTER TABLE books
ADD COLUMN status ENUM('active','inactive') NOT NULL DEFAULT 'active';

