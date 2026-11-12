<?php
$conn = new mysqli("localhost", "root", "", "date_db");
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['disponibilita'])) {
    $stmt = $conn->prepare("UPDATE MieDate SET Dispon = ? WHERE id = ?");
    
    foreach ($_POST['disponibilita'] as $id => $stato) {
        $id_clean = intval($id);
        $stmt->bind_param("si", $stato, $id_clean);
        $stmt->execute();
    }
    
    $stmt->close();
    echo "<p>Disponibilità aggiornate con successo!</p>";
    echo "<a href='form_date.php'>Torna al form</a>";
} else {
    echo "<p>Nessun dato inviato.</p>";
}

$conn->close();
?>