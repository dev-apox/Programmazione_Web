<?php
$host = "localhost";
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

$conn->query("CREATE DATABASE IF NOT EXISTS DBVeicoli");
$conn->select_db("DBVeicoli");

$sqlTable = "CREATE TABLE IF NOT EXISTS Veicoli (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(50) NOT NULL,
    Costo INT NOT NULL,
    Disponibilita INT NOT NULL
)";
$conn->query($sqlTable);

$conn->query("TRUNCATE TABLE Veicoli");

$nomi = ["Auto", "Camion", "Caravan", "Moto"];
$stmt = $conn->prepare("INSERT INTO Veicoli (Nome, Costo, Disponibilita) VALUES (?, ?, ?)");

for ($i = 0; $i < 20; $i++) {
    $nome = $nomi[array_rand($nomi)];
    $costo = rand(1000, 10000);
    $disponibilita = rand(0, 20);
    $stmt->bind_param("sii", $nome, $costo, $disponibilita);
    $stmt->execute();
}

echo "Database e tabella creati e popolati con successo.";

$stmt->close();
$conn->close();
?>