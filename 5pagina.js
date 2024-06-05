
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
  
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.like-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            var rassegnaId = this.dataset.id;
            var likeBtn = this;

            fetch('like.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'like=true&rassegna_id=' + rassegnaId
            })
            .then(response => response.text())
            .then(data => {
                if (!isNaN(data)) {
                    likeBtn.querySelector('.like-count').innerText = data;
                    likeBtn.disabled = true;
                } else {
                    alert(data);
                }
            });
        });
    });

});

document.querySelectorAll('.like-count').forEach(function(likeCount) {
    likeCount.addEventListener('click', function() {
        var rassegnaId = this.dataset.id;
        var modal = document.getElementById('likeModal');
        var likeList = document.getElementById('likeList');
        var closeModal = document.querySelector('.close');


        // Clear the list
        likeList.innerHTML = '';

        // Fetch the list of users who liked the post
        fetch('like_list.php?rassegna_id=' + rassegnaId)
        .then(response => {
            if (!response.ok) {
                throw new Error('Errore nella richiesta');
            }
            return response.json();
        })
        .then(data => {
            console.log(data); // Aggiungi questa linea per verificare i dati ricevuti

            data.forEach(function(user) {
                var li = document.createElement('li');
                li.textContent = user.username;
                likeList.appendChild(ul);
            });

            // Show the modal
            modal.style.display = 'block';
        })
        .catch(error => {
            console.error('Errore durante il recupero della lista di like:', error);
            // Gestisci l'errore in modo appropriato
        });
        // Close modal when user clicks on 'x'
        closeModal.addEventListener('click', function() {
            modal.style.display = 'none';
        });
    });
});
