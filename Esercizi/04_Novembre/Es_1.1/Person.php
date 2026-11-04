<?php
$host = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password);

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

$sql_db = "CREATE DATABASE IF NOT EXISTS person_db";
if ($conn->query($sql_db) === TRUE) {
    echo "Database 'person_db' creato o già esistente.<br>";
} else {
    echo "Errore nella creazione del database: " . $conn->error . "<br>";
}

$conn->select_db("person_db");

$sql_table = "CREATE TABLE IF NOT EXISTS Persons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(50) NOT NULL,
    Cognome VARCHAR(50) NOT NULL,
    Eta INT NOT NULL
)";

if ($conn->query($sql_table) === TRUE) {
    echo "Tabella 'Persons' creata con successo o già esistente.<br>";
} else {
    echo "Errore nella creazione della tabella: " . $conn->error . "<br>";
}

$conn->close();
?>