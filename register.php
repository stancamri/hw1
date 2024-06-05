<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_GET['action'] == 'register') {

    // Connessione al database
    $conn = new mysqli("localhost", "root", "", "LiceoLeonardo");

    // Controllo connessione
    if ($conn->connect_error) {
        die("Connessione al database fallita: " . $conn->connect_error);
    }

    // Prendo i dati dal form
    $nome = $conn->real_escape_string($_POST["nome"]);
    $cognome = $conn->real_escape_string($_POST["Cognome"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $username = $conn->real_escape_string($_POST["username"]);
    $password = $_POST["password"];
    
// Controllo se l'username esiste già
$stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    echo "Username già in uso";
    exit();
}
$stmt->close();

    // Hash della password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Query per inserire i dati nel database usando prepared statements
    $stmt = $conn->prepare("INSERT INTO users (nome, cognome, email, username, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nome, $cognome, $email, $username, $hashed_password);

    if ($stmt->execute() === TRUE) {
        header("Location: /mhw3/login.php");
        exit();
    } else {
        echo "Errore durante la registrazione: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione</title>
    <link rel="stylesheet" href="register.css">
    <script src="register_validation.js" defer></script>

</head>
<body>
<div id="picture">
<a href="https://www.liceoleonardo.edu.it/wp/"> <img src=https://upload.wikimedia.org/wikipedia/commons/2/2b/Emblem_of_Italy_%28black_and_white_without_striped_background%29.svg></a>
</div>
    <div class="container">
        <h2>Registrazione utente </h2>
        <h3>Registrati subito per ottenere l'accesso ai contenuti riservati </h3>
        <form action="register.php?action=register" method="POST">
        <div class="form">
        <div class="form-group1">
       <label for="Nome">Nome: </label><input type="text" id="Nome" name="nome"  required>
        </div>
       <div class="form-group2">
                <label for="Cognome">Cognome:</label>
                <input type="text" id="Cognome" name="Cognome" required>
       </div>
            <div class="form-group3">
                <label for="E-mail">E-mail:</label>
                <input type="text" id="E-mail" name="email" required>
            </div>
            <div class="form-group4">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username"  required>
            </div>
            <div class="form-group5">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password"  required>
            </div>
            <button type="submit">Registrati</button>
        </form>
        <p>Sei già registrato? <a href="login.php">Accedi qui</a></p>
    </div>
    </div>
</body>
</html>

