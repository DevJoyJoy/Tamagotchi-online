CREATE DATABASE tamagotchi

CREATE TABLE tamagotchiUsers(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    userPassword VARCHAR(255)
);

CREATE TABLE pets(
    id INT AUTO_INCREMENT PRIMARY KEY,
    userID INT UNIQUE,
    petName VARCHAR(100),
    pet_img VARCHAR(255),
    toy_img VARCHAR(255),
    bed_img VARCHAR(255),

    FOREIGN KEY(userID)
    REFERENCES tamagotchiUsers(id)
);