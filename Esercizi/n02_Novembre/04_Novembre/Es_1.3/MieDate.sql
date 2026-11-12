CREATE DATABASE IF NOT EXISTS date_db;
USE date_db;

CREATE TABLE IF NOT EXISTS MieDate (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Data VARCHAR(50) NOT NULL,
    Dispon VARCHAR(20) NOT NULL DEFAULT 'Non disponibile'
);

INSERT INTO MieDate (Data, Dispon) VALUES
('15/11/2026', 'Disponibile'),
('20/11/2026', 'Non disponibile'),
('25/11/2026', 'Disponibile');