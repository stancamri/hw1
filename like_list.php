<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'LiceoLeonardo');
if ($mysqli->connect_errno) {
    echo json_encode(["error" => "Connessione al database fallita: " . $mysqli->connect_error]);
    exit();
}

if (isset($_GET['rassegna_id'])) {
    $rassegna_id = $_GET['rassegna_id'];

    $query = "SELECT u.username 
              FROM likes l  JOIN users u ON l.user_id = u.id 
              WHERE l.rassegna_id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('i', $rassegna_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $user = [];
    while ($row = $result->fetch_assoc()) {
        $user[] = $row['username']; // Modifica qui per ottenere solo il nome utente
    }

    echo json_encode($user);
    exit();
} else {
    echo json_encode(["error" => "ID della rassegna non specificato."]);
    exit();
}
?>
