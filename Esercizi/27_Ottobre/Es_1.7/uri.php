// Esercizio 1.7
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>URI della Pagina</title>
</head>
<body>
<?php
    $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost';
    $script = isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : '';
    
    $protocollo = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http";
    
    $uri = $protocollo . "://" . $host . $script;
    
    echo "<h2>URI di questa pagina:</h2>";
    echo "<p><a href=\"$uri\">$uri</a></p>";
?>
</body>
</html>