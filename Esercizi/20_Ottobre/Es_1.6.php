<?php
$nome = isset($_POST['nome']) ? htmlspecialchars($_POST['nome']) : '';
$eta = isset($_POST['eta']) ? htmlspecialchars($_POST['eta']) : '';
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Esercizio 1.6</title>
</head>
<body>
    <p>Il tuo nome e cognome è: <?php echo $nome; ?></p>
    <p>La tua età è: <?php echo $eta; ?></p>
    <p>La tua email è: <?php echo $email; ?></p>
    <p>La tua password è: <?php echo $password; ?></p>
</body>
</html>