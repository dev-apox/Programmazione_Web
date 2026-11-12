<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Conversione Centimetri / Pollici</title>
</head>
<body>
    <h2>Inserisci l'intervallo di centimetri</h2>
    <form action="converti_1_1.php" method="post">
        <label for="cm_min">Valore Minimo (cm):</label>
        <input type="number" id="cm_min" name="cm_min" required><br><br>
        
        <label for="cm_max">Valore Massimo (cm):</label>
        <input type="number" id="cm_max" name="cm_max" required><br><br>
        
        <input type="submit" value="Genera Tabella">
    </form>
</body>
</html>