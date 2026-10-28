//script_1.2

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Risposta Form</title>
</head>
<body>
    <h3>Contenuto grezzo della variabile \$_POST[cite: 1]:</h3>
    <pre>
<?php
    print_r($_POST);
?>
    </pre>

    <hr>

    <h3>Informazione Elaborata[cite: 1]:</h3>
<?php
    if (isset($_POST['specie']) && isset($_POST['nome'])) {
        $specie = htmlspecialchars($_POST['specie']);
        $nome = htmlspecialchars($_POST['nome']);
        echo "<p>È stato ricevuto un animale di specie <strong>$specie</strong> il cui nome è <strong>$nome</strong>.</p>"; 
    } else {
        echo "<p>I dati richiesti non sono stati ricevuti correttamente.</p>";
    }
?>
</body>
</html>