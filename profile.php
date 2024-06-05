<?php
session_start();

// Verifica se l'utente è loggato
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

// Connessione al database
$conn = new mysqli("localhost", "root", "", "mysite_db");

// Controllo connessione
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Recupero le informazioni dell'utente dal database
$username = $_SESSION["username"];
$stmt = $conn->prepare("SELECT nome, cognome, email FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($nome, $cognome, $email);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profilo Utente</title>
</head>
<body>
    <div class="container">
        <h2>Benvenuto, <?php echo htmlspecialchars($nome); ?>!</h2>
        <p><strong>Nome:</strong> <?php echo htmlspecialchars($nome); ?></p>
        <p><strong>Cognome:</strong> <?php echo htmlspecialchars($cognome); ?></p>
        <p><strong>E-mail:</strong> <?php echo htmlspecialchars($email); ?></p>
        <p><strong>Username:</strong> <?php echo htmlspecialchars($username); ?></p>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
