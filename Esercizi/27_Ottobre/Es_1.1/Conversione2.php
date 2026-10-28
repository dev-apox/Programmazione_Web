<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Tabella di Conversione (con Funzione)</title>
    <style>
        table, th, td { border: 1px solid black; border-collapse: collapse; padding: 6px; }
    </style>
</head>
<body>
<?php
function genera_tabella_conversione($min, $max) {
    if ($min > $max) {
        return "<p>Errore: il valore minimo deve essere minore o uguale al valore massimo.</p>";
    }
    
    $html = "<h2>Tabella Conversione da $min cm a $max cm</h2>";
    $html .= "<table><tr><th>Centimetri (cm)</th><th>Valore Calcolato</th></tr>";
    
    for ($cm = $min; $cm <= $max; $cm++) {
        $risultato = $cm * 2.54; 
        $html .= "<tr><td>$cm</td><td>$risultato</td></tr>";
    }
    
    $html .= "</table>";
    return $html;
}

if (isset($_POST['cm_min']) && isset($_POST['cm_max'])) {
    $cm_min = intval($_POST['cm_min']);
    $cm_max = intval($_POST['cm_max']);
    echo genera_tabella_conversione($cm_min, $cm_max);
} else {
    echo "<p>Nessun dato inviato dal form.</p>";
}
?>
</body>
</html>