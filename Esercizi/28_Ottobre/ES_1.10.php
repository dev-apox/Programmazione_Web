<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Esercizio 1.10</title>
</head>
<body>
    <h2>Confronta e Ordina Stringhe</h2>
    <form method="POST" action="">
        <label>Stringa 1:</label><br>
        <input type="text" name="stringhe[]" value="<?php echo htmlspecialchars($_POST['stringhe'][0] ?? ''); ?>"><br><br>
        
        <label>Stringa 2:</label><br>
        <input type="text" name="stringhe[]" value="<?php echo htmlspecialchars($_POST['stringhe'][1] ?? ''); ?>"><br><br>
        
        <label>Stringa 3:</label><br>
        <input type="text" name="stringhe[]" value="<?php echo htmlspecialchars($_POST['stringhe'][2] ?? ''); ?>"><br><br>
        
        <label>Stringa 4:</label><br>
        <input type="text" name="stringhe[]" value="<?php echo htmlspecialchars($_POST['stringhe'][3] ?? ''); ?>"><br><br>

        <input type="submit" value="Confronta">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['stringhe'])) {
        // Rimuove eventuali stringhe vuote
        $stringhe = array_filter($_POST['stringhe'], function($value) {
            return trim($value) !== '';
        });

        if (count($stringhe) < 2) {
            echo "<p style='color:red;'>Inserire almeno due stringhe valide.</p>";
        } else {
            $tutteUguali = (count(array_unique($stringhe)) === 1);

            if ($tutteUguali) {
                echo "<h3>Le stringhe sono tutte UGUALE tra loro.</h3>";
            } else {
                echo "<h3>Le stringhe sono DIVERSE.</h3>";
                
                usort($stringhe, function($a, $b) {
                    return strlen($a) - strlen($b);
                });

                echo "<p><strong>Stringhe ordinate per lunghezza:</strong></p><ol>";
                foreach ($stringhe as $str) {
                    echo "<li>" . htmlspecialchars($str) . " (Lunghezza: " . strlen($str) . ")</li>";
                }
                echo "</ol>";
            }
        }
    }
    ?>
</body>
</html>