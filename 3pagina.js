
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
const immagineFissa = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUEiY-4OoH9DTxZsCRuM6EZkyBCbrNVC6194qp5maJj-dEI4Lb';
const baseUrl = '6pagina.php?id='
// Funzione per filtrare le circolari
function filtraCircolari(tipologia) {
    fetch('get_circolari.php?tipologia=' + tipologia)
    .then(response => response.json())
    .then(data => {
        const circolariDiv = document.getElementById('circolariVisualizzate');
        circolariDiv.innerHTML = '';
        data.forEach(circolare => {
            const circolareElement = document.createElement('a');
            circolareElement.href =baseUrl + circolare.id;
            circolareElement.classList.add('avviso');

            const contenutoAvviso = document.createElement('div');
            contenutoAvviso.classList.add('contenuto-avviso');

            const immagine = document.createElement('img');
            immagine.src = immagineFissa;
            immagine.alt = 'Immagine avviso';

            const testoAvviso = document.createElement('div');
            testoAvviso.classList.add('testo-avviso');
            testoAvviso.innerHTML = `<h2>${circolare.titolo}</h2><p>${circolare.testo}</p>`;

            contenutoAvviso.appendChild(immagine);
            contenutoAvviso.appendChild(testoAvviso);
            circolareElement.appendChild(contenutoAvviso);

            circolariDiv.appendChild(circolareElement);
        });
    });
}

// Funzione per mostrare tutte le circolari
function mostraTutteCircolari() {
    fetch('get_circolari.php?tipologia=tutte')
    .then(response => response.json())
    .then(data => {
        const circolariDiv = document.getElementById('circolariVisualizzate');
        circolariDiv.innerHTML = '';
        data.forEach(circolare => {
            const circolareElement = document.createElement('a');
            circolareElement.href = baseUrl + circolare.id
            circolareElement.classList.add('avviso');

            const contenutoAvviso = document.createElement('div');
            contenutoAvviso.classList.add('contenuto-avviso');

            const immagine = document.createElement('img');
            immagine.src = immagineFissa;
            immagine.alt = 'Immagine avviso';

            const testoAvviso = document.createElement('div');
            testoAvviso.classList.add('testo-avviso');
            testoAvviso.innerHTML = `<h2>${circolare.titolo}</h2><p>${circolare.testo}</p>`;

            contenutoAvviso.appendChild(immagine);
            contenutoAvviso.appendChild(testoAvviso);
            circolareElement.appendChild(contenutoAvviso);

            circolariDiv.appendChild(circolareElement);
        });
    });
}

// Funzione per gestire i checkbox
function handleCheckboxChange(name, showAllFunction, filterFunction) {
    const checkboxes = document.querySelectorAll(`input[name="${name}"]`);
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                checkboxes.forEach(box => {
                    if (box !== this) {
                        box.checked = false;
                    }
                });

                if (this.value === 'tutte') {
                    showAllFunction();
                } else {
                    filterFunction(this.value);
                }
            }
        });
    });
}

document.addEventListener('DOMContentLoaded', function() {
    mostraTutteCircolari();

    handleCheckboxChange('circolari', mostraTutteCircolari, filtraCircolari);
});



document.addEventListener("DOMContentLoaded", function() {
    const navbar = document.querySelector('nav');
    const navbarPosition = navbar.offsetTop;
    const flexContainer3 = document.querySelector("#flex-containe3");
    const logoo = document.querySelector('#logo');
    const tipologiaSection = document.querySelector('.tipologia');
    const footer = document.querySelector('footer');

    // Altezza desiderata per bloccare la sezione tipologia
    const altezzaBloccoTipologia = 200; // Sostituisci con l'altezza desiderata in pixel

    function gestisciScroll() {
        // Posizione dello scroll rispetto alla cima della finestra
        const scrollPosition = window.scrollY;

        // Calcola la posizione del footer rispetto alla cima della pagina
        const footerTop = footer.offsetTop - window.innerHeight;

        // Condizione per verificare se la sezione tipologia deve bloccarsi
        if (scrollPosition > navbarPosition + altezzaBloccoTipologia && scrollPosition < footerTop) {
            tipologiaSection.classList.add('fixed-tipologia');
        } else {
            tipologiaSection.classList.remove('fixed-tipologia');
        }

        // Aggiornamento degli stili della navbar in base allo scroll
        if (scrollPosition > navbarPosition) {
            navbar.classList.add('scrolled');
            flexContainer3.style.display = "none";
            logoo.classList.add('logo-nav');
        } else {
            navbar.classList.remove('scrolled');
            flexContainer3.style.display = "";
            logoo.classList.remove('logo-nav');
        }
    }

    // Aggiunge l'evento di scroll alla finestra
    window.addEventListener('scroll', gestisciScroll);

    // Esegue la funzione una volta al caricamento per verificare lo stato iniziale
    gestisciScroll();
});
