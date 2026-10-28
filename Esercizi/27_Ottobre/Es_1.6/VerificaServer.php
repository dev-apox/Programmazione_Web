// Esercizio 1.6
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Verifica Server</title>
</head>
<body>
    <h2>Contenuto della superglobale \$_SERVER</h2> 
    <pre>
<?php
foreach ($_SERVER as $chiave => $valore) {
    
    if (is_array($valore)) {
        $valore = implode(", ", $valore);
    }
    echo "CHIAVE: $chiave\nVALORE: $valore\n";
    echo "--------------------------------------------------\n"; 
}
?>
    </pre>
</body>
</html>