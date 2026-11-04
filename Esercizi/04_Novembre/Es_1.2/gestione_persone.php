<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "person_db";

function myFun_createDB($conn, $dbname) {
    if (!$conn->select_db($dbname)) {
        // Il DB non esiste, lo creiamo
        $sql_create_db = "CREATE DATABASE `$dbname`";
        if ($conn->query($sql_create_db) === TRUE) {
            $conn->select_db($dbname);
            $sql_table = "CREATE TABLE Persons (
                id INT AUTO_INCREMENT PRIMARY KEY,
                Nome VARCHAR(50) NOT NULL,
                Cognome VARCHAR(50) NOT NULL,
                Eta INT NOT NULL
            )";
            $conn->query($sql_table);
        } else {
            die("Impossibile creare il database: " . $conn->error);
        }
    }
}

$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) {
    die("Connessione al server fallita: " . $conn->connect_error);
}

myFun_createDB($conn, $dbname);

$messaggio = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['inserisci'])) {
    $nome = trim($_POST['nome']);
    $cognome = trim($_POST['cognome']);
    $eta = intval($_POST['eta']);

    if (!empty($nome) && !empty($cognome) && $eta > 0) {
        $stmt = $conn->prepare("INSERT INTO Persons (Nome, Cognome, Eta) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $nome, $cognome, $eta);
        if ($stmt->execute()) {
            $messaggio = "Nuovo record inserito con successo!";
        } else {
            $messaggio = "Errore nell'inserimento: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $messaggio = "Compilare tutti i campi correttamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Gestione Anagrafica Persone</title>
    <style>
        table, th, td { border: 1px solid #333; border-collapse: collapse; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h2>Inserimento Dati Anagrafici</h2>
    <?php if ($messaggio) echo "<p><strong>$messaggio</strong></p>"; ?>

    <form action="" method="POST">
        <label>Nome: <input type="text" name="nome" required></label><br><br>
        <label>Cognome: <input type="text" name="cognome" required></label><br><br>
        <label>Età: <input type="number" name="eta" min="1" max="120" required></label><br><br>
        <input type="submit" name="inserisci" value="Salva Dati">
    </form>

    <hr>

    <h2>Contenuto del Database Aggiornato</h2>
    <?php
    $res = $conn->query("SELECT * FROM Persons ORDER BY id DESC");
    if ($res && $res->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Nome</th><th>Cognome</th><th>Età</th></tr>";
        while ($row = $res->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . htmlspecialchars($row['Nome']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Cognome']) . "</td>";
            echo "<td>" . $row['Eta'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Nessun dato presente nel database.</p>";
    }
    $conn->close();
    ?>

</body>
</html>