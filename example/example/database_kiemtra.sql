CREATE DATABASE IF NOT EXISTS db_Nguyen_tien_viet;
USE db_Nguyen_tien_viet;

CREATE TABLE Course (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Tittle VARCHAR(255),
    Description TEXT,
    ImageUrl VARCHAR(255)
);
