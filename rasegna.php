<?php 
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'LiceoLeonardo';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Assicurati di selezionare anche l'id
$sql = "SELECT id, titolo, testo, immagine_docente, docente FROM rassegna ORDER BY data DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div id='textras'>";
        // Correggi il link per includere l'id correttamente
        echo "<h2 class='titol'><a href='5pagina.php?id=" . $row["id"] . "'>" . $row["titolo"] . "</a></h2>";
        echo "<p class='test'>" . $row["testo"] . "</p>";  
        echo "<div id='contimm'>";
        echo "<img src='" . $row['immagine_docente'] . "' alt='Immagine del docente'>";          
        echo "<p>Da: " . $row['docente'] . "</p>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "Nessuna circolare trovata.";
}

$conn->close();
?>
