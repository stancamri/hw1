<?php
$mysqli = new mysqli('localhost', 'root', '', 'LiceoLeonardo');

if ($mysqli->connect_errno) {
    echo "Connessione al database fallita: " . $mysqli->connect_error;
    exit();
}

$tipologia = $_GET['tipologia'];

if ($tipologia === 'tutte') {
    $query = "SELECT * FROM rassegna ORDER BY data DESC";
    $stmt = $mysqli->prepare($query);
} else {
    $query = "SELECT * FROM rassegna WHERE tipologia = ? ORDER BY data DESC";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('s', $tipologia);
}

$stmt->execute();
$result = $stmt->get_result();

$rassegna = array();

while ($row = $result->fetch_assoc()) {
    $rassegna[] = $row;
}

echo json_encode($rassegna);

$stmt->close();
$mysqli->close();
?>
