<?php
$conn = new mysqli("localhost", "root", "", "DBVeicoli");
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

$result = $conn->query("SELECT Id, Nome, Costo, Disponibilita FROM Veicoli WHERE Disponibilita > 0");
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Selezione Veicolo</title>
</head>
<body>
    <form action="gestisci_radio.php" method="POST">
        <table border="1" cellpadding="5">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Costo</th>
                <th>Disponibilità</th>
                <th>Seleziona</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['Id']; ?></td>
                <td><?php echo htmlspecialchars($row['Nome']); ?></td>
                <td><?php echo $row['Costo']; ?> €</td>
                <td><?php echo $row['Disponibilita']; ?></td>
                <td>
                    <input type="radio" name="veicolo_id" value="<?php echo $row['Id']; ?>" required>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
        <br>
        <input type="submit" value="Conferma Scelta">
    </form>
</body>
</html>
<?php
$conn->close();
?>