<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'LiceoLeonardo');
if ($mysqli->connect_errno) {
    echo "Connessione al database fallita: " . $mysqli->connect_error;
    exit();
}

if (isset($_POST['like']) && isset($_POST['rassegna_id']) && isset($_SESSION['username'])) {
    $rassegna_id = $_POST['rassegna_id'];
    $username = $_SESSION['username'];

    // Controlla se l'utente ha già messo "mi piace"
    $query = "SELECT * FROM likes WHERE rassegna_id = ? AND user_id = (SELECT id FROM users WHERE username = ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('is', $rassegna_id, $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // Aggiungi il "mi piace"
        $query = "INSERT INTO likes (rassegna_id, user_id) VALUES (?, (SELECT id FROM users WHERE username = ?))";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('is', $rassegna_id, $username);
        $stmt->execute();
    }

    // Conta i "mi piace" aggiornati
    $query = "SELECT COUNT(*) as like_count FROM likes WHERE rassegna_id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('i', $rassegna_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    echo $row['like_count'];
    exit();
} else {
    echo "Errore: Parametri non validi o utente non autenticato.";
    exit();
}
?>
