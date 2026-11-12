<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Esercizio 1.9</title>
</head>
<body>
    <h2>Evidenziatore Testo</h2>
    <form method="POST" action="">
        <label for="testo">Testo:</label><br>
        <textarea name="testo" id="testo" rows="6" cols="50" required><?php echo htmlspecialchars($_POST['testo'] ?? ''); ?></textarea><br><br>

        <label for="cerca">Parola da cercare:</label><br>
        <input type="text" name="cerca" id="cerca" value="<?php echo htmlspecialchars($_POST['cerca'] ?? ''); ?>" required><br><br>

        <input type="submit" value="Evidenzia">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $testo = $_POST['testo'] ?? '';
        $cerca = $_POST['cerca'] ?? '';

        if ($cerca !== '') {
            $evidenziato = '<FONT style="BACKGROUND-COLOR: yellow">' . htmlspecialchars($cerca) . '</FONT>';
            $testoRisultato = str_replace($cerca, $evidenziato, htmlspecialchars($testo));

            echo "<h3>Risultato:</h3>";
            echo "<div style='border: 1px solid #ccc; padding: 10px;'>" . nl2br($testoRisultato) . "</div>";
        }
    }
    ?>
</body>
</html>