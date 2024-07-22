SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+03:00";


CREATE DATABASE IF NOT EXISTS `kfms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kfms`;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('farmer', 'officer', 'admin', 'guest') NOT NULL,
    language VARCHAR(10) DEFAULT 'en'
);

CREATE TABLE crops (
    id INT AUTO_INCREMENT PRIMARY KEY,
    farmer_id INT,
    crop_name VARCHAR(255),
    growth_stage VARCHAR(255),
    health_status VARCHAR(255),
    medicine TEXT,
    manure TEXT,
    chemical TEXT,
    production_amount DECIMAL(10,2),
    sell_amount DECIMAL(10,2),
    profit_loss DECIMAL(10,2),
    crop_type ENUM('seedling', 'mature'),
    image_path VARCHAR(255),
    FOREIGN KEY (farmer_id) REFERENCES users(id)
);

CREATE TABLE livestock (
    id INT AUTO_INCREMENT PRIMARY KEY,
    farmer_id INT,
    livestock_name VARCHAR(255),
    health_status VARCHAR(255),
    medicine TEXT,
    food TEXT,
    production_amount DECIMAL(10,2),
    sell_amount DECIMAL(10,2),
    profit_loss DECIMAL(10,2),
    production_type TEXT,
    image_path VARCHAR(255),
    FOREIGN KEY (farmer_id) REFERENCES users(id)
);

CREATE TABLE resources (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    type VARCHAR(255),
    quantity INT
);

CREATE TABLE reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(255),
    generation_date DATE,
    farmer_id INT,
    FOREIGN KEY (farmer_id) REFERENCES users(id)
);

CREATE TABLE market (
    id INT AUTO_INCREMENT PRIMARY KEY,
    commodity VARCHAR(255),
    price DECIMAL(10,2)
);

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    task_name VARCHAR(255),
    description TEXT,
    due_date DATE,
    status ENUM('pending', 'completed') DEFAULT 'pending',
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE calendar (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    event_name VARCHAR(255),
    event_date DATE,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE disease_pest (
    id INT AUTO_INCREMENT PRIMARY KEY,
    crop_id INT,
    disease_name VARCHAR(255),
    symptoms TEXT,
    treatment TEXT,
    FOREIGN KEY (crop_id) REFERENCES crops(id)
);
