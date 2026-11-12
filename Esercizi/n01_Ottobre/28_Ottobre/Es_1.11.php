<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Esercizio 1.11</title>
</head>
<body>
    <h2>Form con Validazione Eccezioni</h2>

    <form method="POST" action="">
        <label for="nome">Nome utente:</label><br>
        <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($_POST['nome'] ?? ''); ?>"><br><br>

        <label for="email">Email:</label><br>
        <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>"><br><br>

        <label>Interessi (selezionare almeno uno):</label><br>
        <input type="checkbox" name="interessi[]" value="Programmazione"> Programmazione<br>
        <input type="checkbox" name="interessi[]" value="Design"> Design<br>
        <input type="checkbox" name="interessi[]" value="Marketing"> Marketing<br><br>

        <input type="submit" value="Invia dati">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            $nome = trim($_POST['nome'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $interessi = $_POST['interessi'] ?? [];

            if (empty($nome)) {
                throw new Exception("Il campo 'Nome' non può essere vuoto.");
            }

            if (empty($email)) {
                throw new Exception("Il campo 'Email' non può essere vuoto.");
            }

            if (empty($interessi)) {
                throw new Exception("Selezionare almeno un'opzione tra gli 'Interessi'.");
            }

            echo "<h3 style='color:green;'>Dati inviati con successo!</h3>";
            echo "<p><strong>Nome:</strong> " . htmlspecialchars($nome) . "</p>";
            echo "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
            echo "<p><strong>Interessi scelti:</strong> " . htmlspecialchars(implode(', ', $interessi)) . "</p>";

        } catch (Exception $e) {
            echo "<h3 style='color:red;'>Errore nella compilazione del form:</h3>";
            echo "<p style='color:red;'>" . htmlspecialchars($e->getMessage()) . "</p>";
        }
    }
    ?>
</body>
</html>