<?php
if (!isset($_POST['veicoli_id']) || !is_array($_POST['veicoli_id'])) {
    die("Nessun veicolo selezionato.");
}

$conn = new mysqli("localhost", "root", "", "DBVeicoli");
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

$stmtSelect = $conn->prepare("SELECT Nome, Disponibilita FROM Veicoli WHERE Id = ?");
$stmtUpdate = $conn->prepare("UPDATE Veicoli SET Disponibilita = Disponibilita - 1 WHERE Id = ?");

foreach ($_POST['veicoli_id'] as $idRaw) {
    $id = intval($idRaw);
    $stmtSelect->bind_param("i", $id);
    $stmtSelect->execute();
    $result = $stmtSelect->get_result();

    if ($row = $result->fetch_assoc()) {
        if ($row['Disponibilita'] > 1) {
            $stmtUpdate->bind_param("i", $id);
            $stmtUpdate->execute();
            echo "Conferma: prenotato " . htmlspecialchars($row['Nome']) . " (ID: $id).<br>";
        } else {
            echo "Errore per " . htmlspecialchars($row['Nome']) . " (ID: $id): disponibilità non superiore a 1.<br>";
        }
    }
}

$stmtSelect->close();
$stmtUpdate->close();
$conn->close();
?>