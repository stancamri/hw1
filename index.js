
const bottone = document.querySelector("#accediLink");
if(bottone){
bottone.addEventListener("click", cliccato);
}
function cliccato(){
    modale.style.display ="block"
}

const imgChiudiModale = document.createElement("img");
imgChiudiModale.src ="fotox-1.jpeg";
imgChiudiModale.classList.add("img-chiudi-modale");
imgChiudiModale.addEventListener("click", chiudix);
function chiudix(){
    modale.style.display ="none"
}
const chiudiModale = document.getElementById("chiudiModaleContainer");
if(chiudiModale){
  chiudiModale.appendChild(imgChiudiModale);
}


const apriModaleCerca = document.getElementById('apriModaleCerca');
const modaleCerca = document.getElementById('modaleCerca');
const chiudiModaleCerca=document.getElementById("chiudiModaleCerca");


apriModaleCerca.addEventListener("click", cliccat);
function cliccat(){
    modaleCerca.style.display="block";
}
chiudiModaleCerca.addEventListener("click", clic);
function clic(){
    modaleCerca.style.display="none"
}






// Funzione per cercare i libri
function searchBooks() {
    var searchTerm = document.getElementById('searchInput').value;
    var url = `https://openlibrary.org/search.json?q=${searchTerm}`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            displayResults(data.docs);
        })
        .catch(error => {
            console.error('Errore durante la ricerca dei libri:', error);
        });
}

// Funzione per visualizzare i risultati della ricerca
function displayResults(books) {
    var resultsContainer = document.getElementById('resultsContainer');
    resultsContainer.innerHTML = '';

    books.forEach(book => {
        var bookElement = document.createElement('div');
        bookElement.classList.add('book');
        bookElement.innerHTML = `
            <h3>${book.title}</h3>
            <p>Autore: ${book.author_name ? book.author_name.join(', ') : 'Non disponibile'}</p>
            <button class="addToFavoritesButton" data-title="${book.title}" data-author="${book.author_name ? book.author_name.join(', ') : 'Non disponibile'}">Aggiungi ai Preferiti</button>
        `;
        resultsContainer.appendChild(bookElement);
    });

    // Aggiungi il listener ai pulsanti "Aggiungi ai Preferiti"
    addFavoritesButtonListeners();
}

// Funzione per aggiungere un listener ai pulsanti "Aggiungi ai Preferiti"
function addFavoritesButtonListeners() {
    var addToFavoritesButtons = document.querySelectorAll('.addToFavoritesButton');
    addToFavoritesButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var title = this.getAttribute('data-title');
            var author = this.getAttribute('data-author');
            addToFavorites(title, author);
        });
    });
}

// Funzione per aggiungere un libro ai preferiti
function addToFavorites(title, author) {
    var formData = new FormData();
    formData.append('title', title);
    formData.append('author', author);

    fetch('addToFavorites.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
    })
    .catch(error => {
        console.error('Errore durante l\'aggiunta ai preferiti:', error);
    });
}









const nav = document.querySelector('nav');
const navPosition=nav.offsetTop;
const flexContaine3 = document.querySelector("#flex-containe3");
const logo = document.querySelector('#logo');

window.addEventListener('scroll', scendi);
   
function scendi(){
    if (window.scrollY > navPosition) {
      nav.classList.add('scrolled');
      flexContaine3.style.display="none";
      logo.classList.add('logo-nav');

    } else {
      nav.classList.remove('scrolled');    
      flexContaine3.style.display="";
      logo.classList.remove('logo-nav');
    }
  }


  document.addEventListener('DOMContentLoaded', () => {
    const drop = document.querySelector('.drop');
    const dropdownContent = document.querySelector('.dropdown-content');

    drop.addEventListener('click', (event) => {
        event.preventDefault();
        event.stopPropagation();
        dropdownContent.classList.toggle('show');
    });

    document.addEventListener('click', (event) => {
        if (!drop.contains(event.target) && !dropdownContent.contains(event.target)) {
            dropdownContent.classList.remove('show');
        }
    });

    dropdownContent.addEventListener('click', (event) => {
        event.stopPropagation();
    });
});

/*
  document.addEventListener('DOMContentLoaded', function() {
    const apiKey = '9R2QCpIwPnQ1u1dzC7BFMAbURErx8IJm'; // Inserisci la tua chiave API
    const country = 'IT'; // Codice del paese per l'Italia, puoi cambiarlo se necessario
    const year = new Date().getFullYear(); // Ottieni l'anno corrente
    const url = `https://calendarific.com/api/v2/holidays?api_key=${apiKey}&country=${country}&year=${year}`;

// Effettua la richiesta GET all'API di Calendarific
fetch(url)
.then(response => {
  // Controlla se la risposta è OK (200)
  if (!response.ok) {
    throw new Error('Errore nella richiesta API: ' + response.status);
  }
  // Parsifica la risposta come JSON
  return response.json();
})
.then(data => {
  // Gestisci i dati ricevuti
  console.log('Risposta API:', data);

  // Esempio di come si potrebbero manipolare i dati
  const holidays = data.response.holidays
  
  // Visualizza tutti i giorni festivi 
  displayHolidays(holidays);
})
.catch(error => {
  // Gestisci gli errori di rete o dell'API
  console.error('Si è verificato un errore:', error);
});

// Definisci la funzione per aggiungere i giorni festivi al DOM
function displayHolidays(holidays) {
// Seleziona l'elemento HTML dove vuoi visualizzare i giorni festivi
const holidayList = document.getElementById('holiday-list');
// Svuota la lista prima di aggiungere gli elementi
holidayList.innerHTML = '';
// Itera attraverso ogni giorno festivo e crea un elemento HTML per ciascuno
holidays.forEach(holiday => {
  const holidayItem = document.createElement('li');
  holidayItem.innerHTML = `
    <strong class="holiday">Holiday name:</strong> ${holiday.name}<br>
    <strong class="holiday">Date:</strong>  ${holiday.date.iso}<br>
    <strong class="holiday">Description:</strong>${holiday.description}<br>
  `;
  holidayList.appendChild(holidayItem);
});
}
  });
*/


document.addEventListener('DOMContentLoaded', function() {
  const loginBtn = document.getElementById('login-btn');
  if (loginBtn) {
      loginBtn.addEventListener('click', function() {
        // Costruiamo l'URL di autorizzazione includendo il parametro "code"
      const redirectUri = encodeURIComponent('https://github.com/stancamri');
      const authorizationUrl = `https://github.com/login/oauth/authorize?client_id=Ov23liRdRC4gb4joPQLa&redirect_uri=${redirectUri}&scope=public_repo`;

      // Reindirizziamo l'utente all'URL di autorizzazione
      window.location.href = authorizationUrl;
      });
  } else {
      console.error('Elemento con ID "login-btn" non trovato.');
  }

// Controlliamo se il parametro "code" è presente nell'URL e lo passiamo alla funzione di scambio solo se è presente
const code = getCodeFromUrl();
if (code) {
  exchangeCodeForToken(code);
} else {
  console.log('Codice di autorizzazione non trovato nella query string dell\'URL.');
}
});

// Funzione per ottenere il codice di autorizzazione dalla query string dell'URL
function getCodeFromUrl() {
  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);
  const code = urlParams.get('code');
  return code; // Restituisci il valore del parametro "code"

}
// Funzione per scambiare il codice di autorizzazione con un token di accesso
async function exchangeCodeForToken(code) {

  const response = await fetch('https://github.com/login/oauth/access_token', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json'
      },
      body: JSON.stringify({
          client_id: 'Ov23liRdRC4gb4joPQLa',
          client_secret: 'd713ccb25f73e85164d8858f5e7edae1154b14d7',
          code: code
      })
  });

  const data = await response.json();
  const accessToken = data.access_token;
  // Ora che abbiamo il token di accesso, possiamo fare richieste all'API di GitHub per ottenere informazioni sull'utente
  getUserInfo(accessToken);
}

// Funzione per ottenere informazioni sull'utente utilizzando il token di accesso
async function getUserInfo(accessToken) {
  const response = await fetch('https://api.github.com/user', {
      headers: {
          'Authorization': 'Bearer ' + accessToken
      }
  });

  const userData = await response.json();
  console.log(userData);
}


const registrationForm = document.getElementById('registration-form');

if (registrationForm) {
    registrationForm.addEventListener('submit', function() {
        // Il tuo codice per gestire la sottomissione del modulo di registrazione
   
  var username = document.getElementById('username').value;
  var password = document.getElementById('password').value;

  // Check password strength
  var passwordPattern = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
  if (!passwordPattern.test(password)) {
      alert('La password deve avere almeno 8 caratteri, includere una maiuscola, un numero e un simbolo.');
      e.preventDefault();
  }

  // Check if username is already taken (this should ideally be done via an AJAX call to the server)
  fetch(`server.php?action=check_username&username=${username}`)
      .then(response => response.json())
      .then(data => {
          if (data.exists) {
              alert('Username già in uso.');
              e.preventDefault();
          }
      })
      .catch(error => {
          console.error('Errore durante la verifica del nome utente:', error);
          e.preventDefault();
      });
});
}


document.addEventListener('DOMContentLoaded', function() {
  var isLoggedIn = document.body.getAttribute('data-logged-in') === 'true';
  if (isLoggedIn) {
      var accediLink = document.getElementById('accediLink');
      if (accediLink) {
          accediLink.style.display = 'none';
      }
  }

  var accediLink = document.getElementById('accediLink');
  var modale = document.getElementById('modale');
  var chiudiModaleContainer = document.getElementById('chiudiModaleContainer');

  if (accediLink) {
      accediLink.addEventListener('click', function(event) {
          event.preventDefault();
          modale.style.display = 'block';
      });
  }

  if (chiudiModaleContainer) {
      chiudiModaleContainer.addEventListener('click', function() {
          modale.style.display = 'none';
      });
  }

  window.addEventListener('click', function(event) {
      if (event.target == modale) {
          modale.style.display = 'none';
      }
  });
});

//circolari
document.addEventListener('DOMContentLoaded', function () {
    const isHomePage = document.getElementById('ultima-circolare-container') !== null;
  
    if (isHomePage) {
        fetch('circolari.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Errore nel recupero dell\'ultima circolare: ' + response.statusText);
                }
                // Controlliamo se la risposta è in formato JSON
                const contentType = response.headers.get('content-type');
                if (contentType && contentType.includes('application/json')) {
                    return response.json();
                } else {
                    // Se la risposta non è in formato JSON, la trattiamo come testo
                    return response.text();
                }
            })
            .then(ultimaCircolare => {
                if (ultimaCircolare.error) {
                    console.error('Errore nel recupero dell\'ultima circolare:', ultimaCircolare.error);
                    return;
                }
  
                const container = document.getElementById('ultima-circolare-container');
                const div = document.createElement('div');
                const link = document.createElement('a');
                const paragraph = document.createElement('p');
  
                link.href = ultimaCircolare.link;
                link.textContent = ultimaCircolare.title;
  
                paragraph.textContent = ultimaCircolare.description;
  
                div.classList.add('booxx');
                div.appendChild(link);
                div.appendChild(paragraph);
                container.appendChild(div);
            })
            .catch(error => {
                console.error('Errore nel recupero dell\'ultima circolare:', error);
            });
    } else {
        fetch('circolari.php')
            .then(response => response.json())
            .then(circolari => {
                const container = document.getElementById('ultima-circolare-container');
                container.innerHTML = ''; // Svuotiamo il contenitore
                circolari.forEach(circolare => {
                    const div = document.createElement('div');
                    const link = document.createElement('a');
                    const paragraph = document.createElement('p');
  
                    link.href = circolare.link;
                    link.textContent = circolare.title;
  
                    paragraph.textContent = circolare.description;
  
                    div.classList.add('circolare');
                    div.appendChild(link);
                    div.appendChild(paragraph);
                    container.appendChild(div);
                });
            })
            .catch(error => {
                console.error('Errore nel recupero delle circolari:', error);
            });
    }
  });
  