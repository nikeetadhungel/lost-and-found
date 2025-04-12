-- Create the Database
CREATE DATABASE IF NOT EXISTS lost_and_found;

-- Select the Database
USE lost_and_found;

-- Create the 'users' table to store user information
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL
);

-- Create the 'items' table to store lost and found items
CREATE TABLE IF NOT EXISTS items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    item_type ENUM('lost', 'found') NOT NULL,
    contact VARCHAR(100) NOT NULL,
    posted_by VARCHAR(50) NOT NULL,
    date_posted TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Sample Insert into users table (optional)
INSERT INTO users (username, password, email) VALUES
('john_doe', 'password123', 'john@example.com'),
('jane_doe', 'password456', 'jane@example.com');

-- Sample Insert into items table (optional)
INSERT INTO items (title, description, item_type, contact, posted_by) VALUES
('Lost Wallet', 'Black leather wallet with ID and credit cards inside.', 'lost', '555-1234', 'john_doe'),
('Found Phone', 'iPhone found on the street near the park.', 'found', '555-5678', 'jane_doe');
