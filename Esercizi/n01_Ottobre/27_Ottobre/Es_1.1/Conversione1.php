<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Tabella di Conversione</title>
    <style>
        table, th, td { border: 1px solid black; border-collapse: collapse; padding: 6px; }
    </style>
</head>
<body>
<?php
if (isset($_POST['cm_min']) && isset($_POST['cm_max'])) {
    $cm_min = intval($_POST['cm_min']);
    $cm_max = intval($_POST['cm_max']);

    if ($cm_min > $cm_max) {
        echo "<p>Errore: il valore minimo deve essere minore o uguale al valore massimo.</p>";
    } else {
        echo "<h2>Tabella Conversione da $cm_min cm a $cm_max cm</h2>";
        echo "<table>";
        echo "<tr><th>Centimetri (cm)</th><th>Valore Calcolato</th></tr>";
        
        for ($cm = $cm_min; $cm <= $cm_max; $cm++) {
            $risultato = $cm * 2.54;
            echo "<tr><td>$cm</td><td>$risultato</td></tr>";
        }
        
        echo "</table>";
    }
} else {
    echo "<p>Nessun dato inviato dal form.</p>";
}
?>
</body>
</html>