-- Create database
CREATE DATABASE IF NOT EXISTS realestate;
USE realestate;

-- Users Table
CREATE TABLE users (
   id INT AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(100) NOT NULL,
   email VARCHAR(100) NOT NULL UNIQUE,
   password VARCHAR(255) NOT NULL,
   role ENUM('admin', 'user') DEFAULT 'user',
   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Properties Table
CREATE TABLE properties (
   id INT AUTO_INCREMENT PRIMARY KEY,
   user_id INT NOT NULL,
   title VARCHAR(255) NOT NULL,
   location VARCHAR(255) NOT NULL,
   price INT NOT NULL,
   type VARCHAR(100) NOT NULL,
   description TEXT,
   image VARCHAR(255),
   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Saved Properties Table
CREATE TABLE saved_properties (
   id INT AUTO_INCREMENT PRIMARY KEY,
   user_id INT NOT NULL,
   property_id INT NOT NULL,
   saved_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   FOREIGN KEY (user_id) REFERENCES users(id),
   FOREIGN KEY (property_id) REFERENCES properties(id)
);

-- Property Images Table
CREATE TABLE property_images (
   id INT AUTO_INCREMENT PRIMARY KEY,
   property_id INT NOT NULL,
   image VARCHAR(255) NOT NULL,
   uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   FOREIGN KEY (property_id) REFERENCES properties(id)
);
