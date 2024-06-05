<?php
session_start();
if (!isset($_SESSION["username"])) {
    $isLoggedIn = false;
} else {
    $isLoggedIn = true;
}

// Connessione al database
$mysqli = new mysqli('localhost', 'root', '', 'LiceoLeonardo');

if ($mysqli->connect_errno) {
    echo "Connessione al database fallita: " . $mysqli->connect_error;
    exit();
}

// Inizializza la variabile del titolo della circolare
$circolare_titolo = "";

// Verifica se è stato passato un ID di circolare nella query string
if (isset($_GET['id'])) {
    // Recupera l'ID della circolare dalla query string
    $id_circolare = $_GET['id'];

    // Esegui una query per ottenere il titolo della circolare basata sull'ID
    $query = "SELECT titolo FROM circolari WHERE id = $id_circolare";
    $result = $mysqli->query($query);

    // Verifica se la query ha restituito dei risultati
    if ($result->num_rows > 0) {
        // Ottieni il titolo della circolare
        $row = $result->fetch_assoc();
        $circolare_titolo = $row["titolo"];
    }
}

// Chiudi la connessione al database
$mysqli->close();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $circolare_titolo; ?></title>
       <link rel="stylesheet" href="6pagina.css">
    <script src="6pagina.js" defer></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
   
</head>
<body>
          <!--  inizio 1 campo -->
  <header>
<div id="flex-container">
  <div class="flex-item it1">
  <a href="https://www.miur.gov.it/"> MIUR </a>
</div>
<div class="flex-item it2">
    <div id="flex-cont">
    <?php if(isset($_SESSION["username"])): ?>
      <p id="accesso" class="benvenuto">Benvenuto <?php echo $_SESSION["username"]?></p>
      <a href="logout.php" id="logout"class="logout">Esci</a>
      <?php else: ?>
      <a href="#" id="accediLink">Accedi</a>
      <div id="modale" class="modale">
            <!-- Contenuto del modale -->
            <div id="flex-contm">
              <div class="flex-itemm1">
                <h1>Accedi ai servizi</h1>
                <p>Da qui puoi accedere ai diversi servizi della scuola che richiedono una autenticazione personale.</p>
                <a href="https://www.portaleargo.it/auth/sso/login/?login_challenge=c0b95ca6e9a94b6ebfd65b4722553f1b">Registro elettronico- Famiglie (portale Argo)</a>
                <a href="https://www.portaleargo.it/auth/sso/login/?login_challenge=f491fc8db40f4cc5addc08c5c20f563b">Registro elettronico- Docenti(Argo Scuolanext)</a>
                <a href="https://www.liceoleonardo.edu.it/wp/404">Messa a disposizione (MAD)</a>
                <a href="http://www.leonardomoodle.it/">Piattaforma di formazione LEONARDO MOODLE</a>
              </div>
                 <div class="flex-itemm2">
                  <span id="chiudiModaleContainer"></span>
          
                 <p>Sei registrato? Entra nel sito della scuola con le tue credenziali per gestire contenuti, visualizzare circolari e altre funzionalità.</p>
                 <a href="login.php" class="btn">Accedi</a>
                 <p> Sei un nuovo utente? Inserisci i tuoi dati</p>
                 <a href="register.php" class="btn">Registrati</a>
               </div>
               <div class="modale-contenuto">
              </div>
            </div> 
        </div>
        <div class="fi12"> <a href="#"> <div class="fi112"><img src="foto1.jpeg"></div> </div></a>
   </div>
      <?php endif; ?>
      
  </div>
    
    </div>
</div>
</header>
  <!--  fine 1 campo -->
  <!--  inizio 2 campo -->
  <nav>
  <div id="flex-containe2">
    <div class="flex-item2 fi1">
    <a href="index.php">  <img id="logo" src="foto2.jpeg"> </a>
</div>
<div id="f-i-1">
 <div class="flex-item2 item1"> <a href="#" id="apriModaleCerca"> <p>Cerca</p> </a> </div> 
 <div id="modaleCerca" class="modale2">
  <div class="cont-modale2">
    <span id="chiudiModaleCerca">&times;</span>
    <h2>Cerca</h2>
      <form> <input type="text" id="cercainfo" placeholder="Cerca informazioni, servizi, notizie o documenti">
        <hr>
      </form>
      <br>
        <div class="modalemen1"><a href="https://www.liceoleonardo.edu.it/wp/?s=&type=school">Cerca nella sezione <strong> SCUOLA</strong></a></div>
        <div class="modalemen2"> <a href="https://www.liceoleonardo.edu.it/wp/?s=&type=news">Cerca tra le <strong> NOVITA'</strong></a> </div>
        <div class="modalemen3"><a href="https://www.liceoleonardo.edu.it/wp/?s=&type=service">Cerca nei <strong> SERVIZI</strong></a></div> 
        <div class="modalemen4"><a href="https://www.liceoleonardo.edu.it/wp/?s=&type=education">Cerca nella <strong> DIDATTICA</strong></a> </div>
        <div class="modalemen5"><a href="https://www.liceoleonardo.edu.it/wp/?s=&type=any">Cerca in tutto il <strong> SITO</strong></a> </div>
        <h3> POTREBBERO INTERESSARTI</h3>
        <div class="modalelement1"><a href="">Liceo Leonardo</a> </div>
        <div class="modalelement2"><a href="">Orientamento </a> </div>
        <div class="modalelement3"><a href="">Iscrizione</a>  </div>
        <div class="modalelement4"><a href="">Matematica&Realtà </a> </div>
        <div class="modalelement5"><a href="">Riapertura</a> </div>
        <div class="modalelement6"><a href="">Intervista Tiziana'Anna</a>  </div>
        <div class="modalelement7"><a href="">La tecnica della scuola</a>  </div>


  </div>
</div>
 <div class="flex-item2 item11"> <a href=""><img src="foto3.jpeg"> </a></div> 

</div>
 <div class="flex-item2 item2"> <a  href="https://www.facebook.com/liceoleonardo.giarre/">  <img src="foto4.png" > </a> </div> 
 <div class="flex-item2 item3"> <a  href="https://www.instagram.com/liceo.leonardo.giarre/">  <img src="foto5.png" > </a> </div> 
 <div class="flex-item2 item4"> <a  href="https://www.instagram.com/liceo.leonardo.giarre/">  <img src="foto6.png" > </a> </div> 
<div id="login-btn"> <img src="git.png"></imga> </div>
  </div>
<div id="flex-containe3">
     <div class="flex-item3 n1">
      <div class="dropdown ">
   <a  class="drop" href="#"> Scuola</a>
   <div class="dropdown-content">
    <a href="2pagina.php">Panoramica</a>
    <hr>
    <a id="link-tend" href="#">Presentazione</a>
    <a id="link-tend" href="#">I luoghi della scuola</a>
    <a id="link-tend" href="#">Le  carte della scuola</a>
    <a id="link-tend" href="#">Organizzazione</a>
    <a id="link-tend" href="#">Le persone </a>
    <a id="link-tend" href="#">I numeri della scuola</a>
    <a id="link-tend" href="#">La storia</a>
    <a id="link-tend" href="#">Aggiornamento PTOF a.s.2023-2024</a>
    <a id="link-tend" href="#"> RAV a.s. 2023-2024</a>
  </div>
   </div>
  </div>
   <div class="flex-item3 n2">
    <div class="dropdown ">
   <a class="drop" href="#">Servizi</a>
   <div class="dropdown-content">
    <a href="#">Panoramica</a>
    <hr>
    <a id="link-tend" href="#">Servizi per il personale scolastico</a>
    <a id="link-tend" href="#">Servizi per famiglie e studenti</a>
    <a id="link-tend" href="#">Indirizzi di studio</a>
    <a id="link-tend" href="#">Tutti i servizi</a>
    <a id="link-tend" href="#">Argo MAD</a>
   </div>
  </div>
</div>
   <div class="flex-item3 n3">
    <div class="dropdown">
   <a class="drop" href="#">Novità</a>
   <div class="dropdown-content">
    <a id="link-tend" href="#">Panoramica</a>
    <hr>
    <a id="link-tend" href="#">Le notizie</a>
    <a id="link-tend" href="#">Le circolari</a>
    <a id="link-tend" href="#">Calendario eventi</a>
    <a id="link-tend" href="#">Albo online </a>
   </div>
  </div>
</div>
   <div class="flex-item3 n4">
    <div class="dropdown">
   <a class="drop" href="#">Didattica</a>
   <div class="dropdown-content">
    <a id="link-tend" href="#">Panoramica</a>
    <hr>
    <a id="link-tend" href="#">Le schede didattiche</a>
    <a id="link-tend" href="#">I progetti delle classi</a>
    <a id="link-tend" href="#">Curvatura biomedica</a>

 </div>
</div>
</div>
</div>

</nav>

<div id="flex-container3">
  <div class="flex-item4">
    <a href="https://www.liceoleonardo.edu.it/wp/tipologia-documento/modulistica/">Modulistica</a>
  </div>
  <div class="flex-item4 ">
    <a href="https://www.liceoleonardo.edu.it/wp/servizio/accesso-civico/">Accesso Civico</a>
  </div>
  <div class="flex-item4 ">
    <a href="https://www.liceoleonardo.edu.it/wp/tipologia-documento/albo-online/">Albo Pretorio fino al 24/10/2022 </a>
  </div>
  <div class="flex-item4">
    <a href="https://www.portaleargo.it/albopretorio/online/#/?customerCode=SG29065">Albo Pretorio fino al 25/10/2022</a>
  </div>
  <div class="flex-item4">
    <a href="https://www.liceoleonardo.edu.it/wp/amministrazione-trasparente/">Amministratore Trasparente fino al 25/10/2022</a>
  </div>
  <div class="flex-item4">
    <a href="https://trasparenza-pa.net/?codcli=SG29065">Amministratore Trasparente fino al 24/10/22</a>
  </div>
  <div class="flex-item4">
    <a href="https://www.liceoleonardo.edu.it/wp/evento/">Calendario Evento </a>
  </div>
  <div class="flex-item4">
    <a href="https://www.liceoleonardo.edu.it/wp/servizio/blog-del-liceo-statale/">Blog</a>
    </div>
    <div class="flex-item4">
      <a href="https://www.liceoleonardo.edu.it/wp/albo-pretorio/sicurezza/"> Sicurezza</a>
    </div>
  </div>
  <!--  fine 2 campo -->
  <div class="container">

  <?php
        // Controlla se è stato passato un parametro "id" tramite GET
        if (isset($_GET['id'])) {
            // Recupera l'ID della rassegna dalla query string
            $id_circolare = $_GET['id'];

            // Connessione al database
            $mysqli = new mysqli('localhost', 'root', '', 'LiceoLeonardo');

            // Verifica la connessione
            if ($mysqli->connect_errno) {
                echo "Connessione al database fallita: " . $mysqli->connect_error;
                exit();
            }

            // Query per recuperare i dettagli della rassegna
            $query = "SELECT * FROM circolari WHERE id = $id_circolare";
            $result = $mysqli->query($query);

            // Verifica se sono presenti risultati
            if ($result->num_rows > 0) {
                // Cicla sui risultati e mostra i dettagli della rassegna
                while ($row = $result->fetch_assoc()) {
                    echo "<div id='rassegna'>";
                    echo "<h2 class='titol'><a href='6pagina.php?id=" . $row["id"] . "'>" . $row["titolo"] . "</a></h2>";
                    echo "<p class='testo'> " . $row['testo'] . "</p>";
                    echo "<div id='secz'>";
                    echo "<img src='" . $row['immagine_docente'] . "' class='img' >";
                    echo "<p>Da: " . $row['docente'] . "</p>";
                    echo "</div>";
                    echo "<div id='doc'>";
                    echo "<h3> Documenti</h3>";  
                    echo "<p ><a href=' " . $row['file_pdf'] . "'>" . basename($row['file_pdf']) . "</a></p>";  // Usare basename direttamente nell'echo
                    echo "</div>";
                    echo "<hr>";
                    echo "<p class='datas'>Pubblicato: " . $row['data'] . "</p>";
                }
            } else {
                echo "Nessuna rassegna trovata con questo ID.";
            }

            // Chiudi la connessione al database
            $mysqli->close();
        } else {
            echo "ID della rassegna non specificato.";
        }
        ?>

  </div>

</div>

<footer>
  <div id="ifooter">
  <div class="logofooter">
<img src=https://upload.wikimedia.org/wikipedia/commons/2/2b/Emblem_of_Italy_%28black_and_white_without_striped_background%29.svg>
</div>
<div class="scrittafooter">
<div class="sc1"><a href="https://www.liceoleonardo.edu.it/wp/"><p>Liceo Statale</p></a></div>
<a href="https://www.liceoleonardo.edu.it/wp/"><h3>Leonardo</a></h3>
<a href="https://www.liceoleonardo.edu.it/wp/"><p>Giarre</a></p>
</div>
</div>
<div id="blocco">
  <div class="blocco1">
    <h3> Link esterni</h3>
    <ul>
      <div class="spa"><li><a href="https://www.miur.gov.it/" target="_blank" >MIUR</a></li></div>
      <li><a href="https://www.usr.sicilia.it/" target="_blank" >Ufficio Scolastico Regionale</a></li>
      <li><a href="https://ct.usr.sicilia.it/"target="_blank">Ufficio Scolastico Territoriale</a></li>
      <li><a href="https://cercalatuascuola.istruzione.it/cercalatuascuola/errore/scuola-non-trovata"target="_blank">Scuola in Chiaro</a></li>
      <li><a href="https://unica.istruzione.gov.it/it/orientamento/iscrizioni"target="_blank">Iscrizioni On LIne</a></li>
      <li><a href="https://www.invalsi.it/"target="_blank">Invalsi</a></li>
      <li><a href="http://www.comune.giarre.ct.it/"target="_blank">Comune</a></li>
    </ul>
  </div>
  <div class="blocco2">
    <h3> La Scuola</h3>
    <ul>
      <div class="spa"> <li><a href="https://www.liceoleonardo.edu.it/wp/luogo/">I luoghi della scuola</a></li> </div>
      <li><a href="https://www.liceoleonardo.edu.it/wp/documento/">Le carte della scuola</a></li>
      <li><a href="https://www.liceoleonardo.edu.it/wp/struttura/">Organizzazione</a></li>
      <li><a href="https://www.liceoleonardo.edu.it/wp/persone/">Le persone</a></li>
      <li><a href="https://www.liceoleonardo.edu.it/wp/i-numeri-della-scuola/">I numeri della scuola</a></li>
      <li><a href="https://www.liceoleonardo.edu.it/wp/la-storia/">La storia</a></li>
    </ul>
  </div>
  <div class="blocco3">
    <h3> I servizi</h3>
    <ul>
      <div class="spa"> <li><a href="https://www.liceoleonardo.edu.it/wp/tipologia-servizio/personale-scolastico/">Servizi per il personale scolastico</a></li> </div>
      <li><a href="https://www.liceoleonardo.edu.it/wp/tipologia-servizio/famiglie-e-studenti/">Servizi per famiglie e studenti</a></li>
      <li><a href="https://www.liceoleonardo.edu.it/wp/indirizzo-di-studio/">Indirizzi di studio</a></li>
      <li><a href="https://www.liceoleonardo.edu.it/wp/servizio/">Tutti i servizi </a></li>
      <li><a href="https://mad.portaleargo.it/#/">Argo MAD</a></li>
    </ul>
  </div>
  <div class="blocco4">
    <h3> Novità</h3>
    <ul>
      <div class="spa"><li><a href="https://www.liceoleonardo.edu.it/wp/tipologia-articolo/notizie/">Le novizie</a></li> </div>
      <li><a href="https://www.liceoleonardo.edu.it/wp/circolare/">Le circolari</a></li>
      <li><a href="https://www.liceoleonardo.edu.it/wp/evento/">Calendario eventi</a></li>
      <li><a href="https://www.liceoleonardo.edu.it/wp/tipologia-documento/albo-online/"> Albo online </a></li>
    </ul>
  </div>
</div>
<div id="blocco2">
  <div class="blox1">
   <a href="https://www.liceoleonardo.edu.it/wp/tipologia-documento/modulistica/">Modulistica</a> 
   <a href="mailto:destinatario@example.com?subject=Oggetto%20del%20messaggio&body=Corpo%20del%20messaggio">FeedBack e Reclami</a>
  <a href="https://www.liceoleonardo.edu.it/wp/amministrazione-trasparente/">Amministrazione Trasparente</a>
 <a href="https://form.agid.gov.it/view/6071b2af-7552-41f0-8de1-907f540f8fd5">Valutazione Accessibilità AGID</a> 
   <a href="https://form.agid.gov.it/view/d431bd27-2fcd-4755-b4d1-9fe6ced3f8f4">Obiettivi di accessibilità</a>
   <a href="https://www.liceoleonardo.edu.it/wp/tipologia-documento/albo-online/">Albo online</a>
  <a href="https://www.liceoleonardo.edu.it/wp/privacy-policy/">Privacy Policy</a> 
   <a href="https://www.liceoleonardo.edu.it/wp/cicli-scolastici/">Cicli Scolastici </a> 
  </div>
  <div class="blox2">
    Seguici su:
     <a  href="https://www.facebook.com/liceoleonardo.giarre/">  <img src="foto4.png" > </a> 
    <a  href="https://www.instagram.com/liceo.leonardo.giarre/">  <img src="foto5.png" > </a> 
    <a  href="https://www.instagram.com/liceo.leonardo.giarre/">  <img src="foto6.png" > </a> 
    </div>
  </div>
  <br/>
  <hr>
  <div id="fin1">
  <div class="fini1"><p> LICEO STATALE "LEONARDO" <br>
Liceo Scientifico - Liceo Linguistico - ESA BAC - Liceo Scientifico opzionale Scienze Applicate<br>
Giarre (CT) - Via Veneto, Via Trieste - Tel 0956136865 - Cod. Mecc.: CTIS053002 - <br>
Cod. Univoco: NZ0XO6 - C.F.: 92038480874 <br>
www.liceoleonardo.edu.it - E-mail: ctis053002@istruzione.it - PEC: ctis053002@pec.istruzione.it <br>
  </p></div>

</div>
<hr>
<div class="fini1"><p> Powered by Nunzio Giglio | Concept & Design by Designers Italia
</p>

</footer>


  </body>
</html>
</body>
</html>