CREATE DATABASE chocolaterie;

USE chocolaterie;

CREATE TABLE categories (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(255) NOT NULL
);

CREATE TABLE produits (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(255) NOT NULL,
  description TEXT,
  prix DECIMAL(10,2) NOT NULL,
  categorie_id INT NOT NULL,
  stock INT NOT NULL,
  FOREIGN KEY (categorie_id) REFERENCES categories(id)
);
