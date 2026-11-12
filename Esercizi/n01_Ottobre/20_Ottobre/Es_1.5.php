<?php
print_r($_GET);

$specie = isset($_GET['specie']) ? htmlspecialchars($_GET['specie']) : '';
$nome = isset($_GET['nome']) ? htmlspecialchars($_GET['nome']) : '';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Esercizio 1.5</title>
</head>
<body>
    <p>La specie ricevuta è: <?php echo $specie; ?></p>
    <p>Il nome ricevuto è: <?php echo $nome; ?></p>
</body>
</html>