<?php
$conn = new mysqli("localhost", "root", "", "date_db");
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_POST['disponibilita']) && is_array($_POST['disponibilita'])) {
        $stmt_update = $conn->prepare("UPDATE MieDate SET Dispon = ? WHERE id = ?");
        foreach ($_POST['disponibilita'] as $id => $stato) {
            $id_clean = intval($id);
            $stmt_update->bind_param("si", $stato, $id_clean);
            $stmt_update->execute();
        }
        $stmt_update->close();
    }

    if (isset($_POST['nuove_date']) && isset($_POST['nuove_dispon'])) {
        $stmt_insert = $conn->prepare("INSERT INTO MieDate (Data, Dispon) VALUES (?, ?)");
        
        foreach ($_POST['nuove_date'] as $index => $nuova_data) {
            $data_clean = trim($nuova_data);
            if (!empty($data_clean)) {
                $stato = $_POST['nuove_dispon'][$index];
                $stmt_insert->bind_param("ss", $data_clean, $stato);
                $stmt_insert->execute();
            }
        }
        $stmt_insert->close();
    }

    echo "<p>Database aggiornato ed eventuali nuove date inserite con successo!</p>";
    echo "<a href='form_date_esteso.php'>Torna al form completo</a>";
}

$conn->close();
?>