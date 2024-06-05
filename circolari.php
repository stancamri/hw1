<?php
// Connessione al database
$servername = "localhost";
$username = "root"; // Inserisci il tuo username del database
$password = ""; // Inserisci la tua password del database
$dbname = "LiceoLeonardo";

// Crea la connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la connessione
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Query per recuperare l'ultima circolare
$sql = "SELECT id, titolo, testo FROM circolari ORDER BY data DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output dei dati dell'ultima circolare
    while($row = $result->fetch_assoc()) {
        echo "<div id='textra'>";
        // Utilizza un link completo con l'ID incluso come parametro nella query string
        echo "<a href='6pagina.php?id=" . $row["id"] . "'>" . $row["titolo"] . "</a>";
        echo "<p class='testo'>" . $row["testo"] . "</p>";        
        echo "</div>";
    }
} else {
    echo "Nessuna circolare trovata.";
}


// Chiudi la connessione al database
$conn->close();
?>
