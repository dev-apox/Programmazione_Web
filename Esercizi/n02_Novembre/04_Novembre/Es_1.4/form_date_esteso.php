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
    <title>Disponibilità Date ed Inserimento</title>
    <style>
        table, th, td { border: 1px solid #000; border-collapse: collapse; padding: 8px; }
        th { background-color: #d9edf7; }
        .new-row { background-color: #fff9e6; }
    </style>
</head>
<body>

    <h2>Gestione Date e Nuovi Inserimenti</h2>

    <form action="elabora_date_esteso.php" method="POST">
        <table>
            <tr>
                <th>Data</th>
                <th>Disponibilità</th>
            </tr>
            
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['Data']) ?></td>
                    <td>
                        <select name="disponibilita[<?= $row['id'] ?>]">
                            <option value="Disponibile" <?= $row['Dispon'] === 'Disponibile' ? 'selected' : '' ?>>Disponibile</option>
                            <option value="Non disponibile" <?= $row['Dispon'] === 'Non disponibile' ? 'selected' : '' ?>>Non disponibile</option>
                        </select>
                    </td>
                </tr>
            <?php endwhile; ?>

            <?php for ($i = 0; $i < 3; $i++): ?>
                <tr class="new-row">
                    <td>
                        <input type="text" name="nuove_date[]" placeholder="es. 01/12/2026">
                    </td>
                    <td>
                        <select name="nuove_dispon[]">
                            <option value="Disponibile">Disponibile</option>
                            <option value="Non disponibile">Non disponibile</option>
                        </select>
                    </td>
                </tr>
            <?php endfor; ?>

        </table>
        <br>
        <input type="submit" value="Salva Tutto">
    </form>

</body>
</html>
<?php $conn->close(); ?>