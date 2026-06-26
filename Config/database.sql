CREATE DATABASE tamagotchi;
USE tamagotchi;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    userPassword VARCHAR(255) NOT NULL,
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE pets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    userId INT NOT NULL,
    petName VARCHAR(50) NOT NULL,
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (userId) REFERENCES users(id) ON DELETE CASCADE
);

INSERT INTO users (username, email, userPassword) VALUES 
('jogador1', 'jogador1@gmail.com', 'senha1234');

INSERT INTO pets (userId, petName) VALUES 
(1, 'Cocada');