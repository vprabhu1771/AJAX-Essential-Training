CREATE DATABASE shop_db;

USE shop_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(15) NOT NULL,
    role ENUM('Admin', 'User', 'Moderator') NOT NULL
);

-- Insert sample data
INSERT INTO users (name, email, phone, role)
VALUES
('John Doe', 'johndoe@example.com', '123-456-7890', 'Admin'),
('Jane Smith', 'janesmith@example.com', '987-654-3210', 'User');
