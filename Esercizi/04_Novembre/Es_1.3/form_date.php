<?php
$conn = new mysqli("localhost", "root", "", "date_db");
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM MieDate");
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Richiesta Disponibilità Date</title>
    <style>
        table, th, td { border: 1px solid #000; border-collapse: collapse; padding: 10px; }
        th { background-color: #e0e0e0; }
    </style>
</head>
<body>

    <h2>Verifica e Aggiorna Disponibilità Date</h2>

    <form action="elabora_date.php" method="POST">
        <table>
            <tr>
                <th>Data</th>
                <th>Disponibilità</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td>
                        <?= htmlspecialchars($row['Data']) ?>
                    </td>
                    <td>
                        <select name="disponibilita[<?= $row['id'] ?>]">
                            <option value="Disponibile" <?= $row['Dispon'] === 'Disponibile' ? 'selected' : '' ?>>Disponibile</option>
                            <option value="Non disponibile" <?= $row['Dispon'] === 'Non disponibile' ? 'selected' : '' ?>>Non disponibile</option>
                        </select>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
        <br>
        <input type="submit" value="Salva Modifiche">
    </form>

</body>
</html>
<?php $conn->close(); ?>