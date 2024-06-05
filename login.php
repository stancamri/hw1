<?php
session_start();
if (isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}
$errore = false;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"]) && isset($_POST["password"])) {
    // Connessione al database
    $conn = new mysqli("localhost", "root", "", "LiceoLeonardo");

    // Controllo connessione
    if ($conn->connect_error) {
        die("Connessione al database fallita: " . $conn->connect_error);
    }

    $username = $conn->real_escape_string($_POST["username"]);
    $password = $conn->real_escape_string($_POST["password"]);

    // Query per verificare l'username
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION["username"] = $username;
            header("Location: index.php");
            exit;
        } else {
            $errore = true;
        }
    } else {
        $errore = true;
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<div id="picture">
<a href="index.php"> <img src=https://upload.wikimedia.org/wikipedia/commons/2/2b/Emblem_of_Italy_%28black_and_white_without_striped_background%29.svg></a>
</div>
    <div class="container">
        <h2>Login</h2>
        <?php if (isset($errore) && $errore) ?>
        <form action="login.php" method="POST">
            <div class="form">
            <div class="form-group1">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group2">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Accedi</button>
        </form>
        <p>Non hai un account? <a href="register.php">Registrati qui</a></p>
    </div>
    </div>
</body>
</html>
