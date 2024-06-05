<?php
// Connessione al database
$conn = new mysqli("localhost", "root", "", "LiceoLeonardo");

// Controllo connessione
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Prendi l'username dall'URL
$username = $_GET["username"];

// Query per verificare se l'username esiste già
$stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();
$response = array("exists" => $stmt->num_rows > 0);
echo json_encode($response);

$stmt->close();
$conn->close();
?>
