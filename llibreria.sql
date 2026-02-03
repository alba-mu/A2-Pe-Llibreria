-- Create the database
CREATE DATABASE IF NOT EXISTS llibreria
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

-- Create user with access from any IP
CREATE USER IF NOT EXISTS 'llibreria_user'@'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON llibreria.* TO 'llibreria_user'@'%';
FLUSH PRIVILEGES;

USE llibreria;

-- Drop tables if they exist to avoid errors
DROP TABLE IF EXISTS llibres;
DROP TABLE IF EXISTS autors;

-- Authors table
CREATE TABLE autors (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(150) NOT NULL,
  nacionalitat VARCHAR(100) NOT NULL,
  any_naixement INT(4)
) ENGINE=InnoDB;

-- Books table
CREATE TABLE llibres (
  id INT AUTO_INCREMENT PRIMARY KEY,
  isbn CHAR(13) NOT NULL UNIQUE,
  titol VARCHAR(255) NOT NULL,
  any_publicacio INT(4),
  autor_id INT NOT NULL
) ENGINE=InnoDB;

-- Foreign key constraints
ALTER TABLE llibres
  ADD CONSTRAINT fk_llibres_autors
    FOREIGN KEY (autor_id)
    REFERENCES autors(id);

-- Insert test data for Authors
INSERT INTO autors (nom, nacionalitat, any_naixement) VALUES
('Mercè Rodoreda', 'Catalana', 1908),
('Gabriel García Márquez', 'Colombiana', 1927),
('George Orwell', 'Britànica', 1903);

-- Inserció de dades de prova (Llibres verídics)
-- Recorda: 1=Rodoreda, 2=Gabo, 3=Orwell
INSERT INTO llibres (isbn, titol, any_publicacio, autor_id) VALUES
('9788473292245', 'La plaça del Diamant', 1962, 1),
('9788415642541', 'Mirall trencat', 1974, 1),
('9788439728368', 'Cien años de soledad', 1967, 2),
('9788497592208', 'Crónica de una muerte anunciada', 1981, 2),
('9780141036144', '1984', 1949, 3);
 

