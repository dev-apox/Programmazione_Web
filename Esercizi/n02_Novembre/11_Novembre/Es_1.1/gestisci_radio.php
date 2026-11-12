<?php
if (!isset($_POST['veicolo_id'])) {
    die("Nessun veicolo selezionato.");
}

$id = intval($_POST['veicolo_id']);

$conn = new mysqli("localhost", "root", "", "DBVeicoli");
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT Nome, Disponibilita FROM Veicoli WHERE Id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    if ($row['Disponibilita'] > 1) {
        $update = $conn->prepare("UPDATE Veicoli SET Disponibilita = Disponibilita - 1 WHERE Id = ?");
        $update->bind_param("i", $id);
        $update->execute();
        $update->close();
        echo "Conferma: hai prenotato il veicolo " . htmlspecialchars($row['Nome']) . " (ID: $id). Disponibilità aggiornata.";
    } else {
        echo "Operazione non consentita: disponibilità non superiore a 1 per il veicolo selezionato.";
    }
} else {
    echo "Veicolo non trovato.";
}

$stmt->close();
$conn->close();
?>