// Esercizio 1.5
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Data e Ora</title> 
</head>
<body>
    <h1>Data e Ora Correnti</h1>
    <p>
        <?php
            date_default_timezone_set('Europe/Rome');
            
            echo date('D, d M Y H:i:s'); 
        ?>
    </p>
</body>
</html>
