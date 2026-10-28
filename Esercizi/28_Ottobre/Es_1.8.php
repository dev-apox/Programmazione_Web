<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Esercizio 1.8</title>
</head>
<body>
    <h2>Form Analisi Stringhe</h2>
    <form method="POST" action="">
        <label for="testo">Ampia porzione di testo:</label><br>
        <textarea name="testo" id="testo" rows="6" cols="50" required><?php echo htmlspecialchars($_POST['testo'] ?? ''); ?></textarea><br><br>

        <label for="cerca">Prima breve stringa (da cercare):</label><br>
        <input type="text" name="cerca" id="cerca" value="<?php echo htmlspecialchars($_POST['cerca'] ?? ''); ?>" required><br><br>

        <label for="sostituisci">Seconda breve stringa (da sostituire):</label><br>
        <input type="text" name="sostituisci" id="sostituisci" value="<?php echo htmlspecialchars($_POST['sostituisci'] ?? ''); ?>"><br><br>

        <input type="submit" value="Elabora">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $testo = $_POST['testo'] ?? '';
        $cerca = $_POST['cerca'] ?? '';
        $sostituisci = $_POST['sostituisci'] ?? '';

        echo "<h3>Risultati Elaborazione:</h3>";

        if (strlen($testo) > 5) {
            echo "<p><strong>Primi 5 caratteri (substr):</strong> " . htmlspecialchars(substr($testo, 0, 5)) . "</p>";
        } else {
            echo "<p><strong>Lunghezza del testo:</strong> minore o uguale a 5 caratteri.</p>";
        }

        if ($cerca !== '') {
            $occorrenze = substr_count($testo, $cerca);
            echo "<p><strong>Numero di occorrenze di '$cerca' (substr_count):</strong> $occorrenze</p>";

            $primaPos = strpos($testo, $cerca);
            if ($primaPos !== false) {
                echo "<p><strong>Posizione della prima occorrenza (strpos):</strong> $primaPos</p>";
            } else {
                echo "<p>La stringa '$cerca' non è presente nel testo.</p>";
            }

            $posizioni = [];
            $offset = 0;
            $lenCerca = strlen($cerca);

            while (($pos = strpos($testo, $cerca, $offset)) !== false) {
                $posizioni[] = $pos;
                $offset = $pos + $lenCerca; 
            }

            if (!empty($posizioni)) {
                echo "<p><strong>Posizioni di tutte le occorrenze:</strong> " . implode(', ', $posizioni) . "</p>";
            }

            
            $testoModificato = $testo;
            for ($i = count($posizioni) - 1; $i >= 0; $i--) {
                $testoModificato = substr_replace($testoModificato, $sostituisci, $posizioni[$i], $lenCerca);
            }

            echo "<p><strong>Testo con sostituzione (substr_replace):</strong><br>" . nl2br(htmlspecialchars($testoModificato)) . "</p>";
        }
    }
    ?>
</body>
</html>