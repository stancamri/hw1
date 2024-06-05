CREATE DATABASE LiceoLeonardo;
USE LiceoLeonardo;
CREATE TABLE circolari (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titolo VARCHAR(255),
    data DATE,
    testo TEXT,
	tipologia VARCHAR(255),
    docente VARCHAR(255),
    immagine_docente VARCHAR(255),
    file_pdf VARCHAR(255)
);

CREATE TABLE rassegna (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titolo VARCHAR(255),
    data DATE,
    testo TEXT,
    tipologia VARCHAR(255),
    docente VARCHAR(255),
    documentazione VARCHAR(255),
    immagine_docente VARCHAR(255),
    file_pdf VARCHAR(255)
);
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) UNIQUE,
    password VARCHAR(255),
    email VARCHAR(255),
    nome  VARCHAR(255),
    cognome VARCHAR(255)
);
CREATE TABLE likes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    rassegna_id INT,
    user_id INT,
    FOREIGN KEY (rassegna_id) REFERENCES rassegna (id),
    FOREIGN KEY (user_id) REFERENCES users (id)
    );

CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    circolare_id INT,
    utente_id INT,
    commento TEXT,
    data TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (circolare_id) REFERENCES circolari(id),
    FOREIGN KEY (utente_id) REFERENCES users(id)
);
INSERT INTO rassegna (titolo, data, testo, docente, tipologia, immagine_docente,documentazione, file_pdf) VALUES ("Ripartire per rinascere","2020-05-25", "Articolo di Ilenia Cardillo 5G – Liceo Scientifico “Leonardo” – Giarre (CT)","admin","Articoli","/mhw3/foto9.jpeg","Ripartire per rinascere è un articolo realizzato dalla studentessa Ilenia Cardillo sul tema del lavoro al tempo della pandemia. Per visualizzare l’articolo completa clicca sul link! https://newsicilia.it/cronaca/ripartire-per-rinascere/56245","/mhw3/rassegnepdf/BENI-DA-SCARICARE-PER-VENDITA.pdf");
INSERT INTO rassegna (titolo, data, testo, docente,tipologia, immagine_docente, documentazione,file_pdf) VALUES ("AVVISO DI VENDITA PER DISCARICO INVENTARIALE","2023-04-06", "AVVISO DI VENDITA PER DISCARICO INVENTARIALE","Nando Gulisano","Notizie","/mhw3/foto9.jpeg","AVVISO DI VENDITA AL PUBBLICO DI MATERIALE FUORI USO E/O BENI NON PIU’ UTILIZZABILI.","/mhw3/rassegnepdf/BENI-DA-SCARICARE-PER-VENDITA.pdf");
INSERT INTO rassegna (titolo, data, testo, docente,tipologia, immagine_docente,documentazione, file_pdf) VALUES ("AVVISO di consultazione pubblica dell’aggiornamento del Piano Triennale per la Prevenzione della Corruzione e della Trasparenza delle Istituzioni scolastiche della regione Sicilia 2023-2025","2023-03-30", "","Nando Gulisano","Notizie","/mhw3/foto9.jpeg","E’ pubblicato il Piano Triennale per la Prevenzione della Corruzione ", "/mhw3/rassegnepdf/BENI-DA-SCARICARE-PER-VENDITA.pdf");
INSERT INTO rassegna (titolo, data, testo, docente, tipologia,immagine_docente,documentazione, file_pdf) VALUES ("Modifica email d’accesso", "2021-01-05","","Sebastiano Pollicina","Notizie","/mhw3/foto9.jpeg","","/mhw3/rassegnepdf/BENI-DA-SCARICARE-PER-VENDITA.pdf");
INSERT INTO rassegna (titolo, data, testo, docente,tipologia, immagine_docente,documentazione, file_pdf) VALUES ("RICHIESTA CODICI DI ACCESSO FOTOCOPIATORI SEDE MAZZEI", "2022-10-11","","Sebastiano Pollicina","Notizie","/mhw3/foto9.jpeg","","/mhw3/rassegnepdf/Richiesta-codici-accesso-fotocopiatori.pdf");
INSERT INTO rassegna (titolo, data, testo, docente,tipologia, immagine_docente,documentazione, file_pdf) VALUES ("Modifica email d’accesso", "2021-01-05","Modifica all email d accesso per le utenze del sito."," Grazia Patrizia Raciti","Notizie","/mhw3/foto9.jpeg","Si comunica che in data 05/01/2021 le email per l’accesso al sito www.liceoleonardo.edu.it sono state riformattate da “cognome.nome@liceoleonardo.edu.it” a “nomecognome@liceoleonardo.edu.it”.","/mhw3/rassegnepdf/BENI-DA-SCARICARE-PER-VENDITA.pdf");
INSERT INTO rassegna (titolo, data, testo, docente, tipologia,immagine_docente,documentazione, file_pdf) VALUES ("Abilitazione pubblicazioni segreteria", "2020-06-03","Abilitazione profili di pubblicazione del personale di segreteria del Liceo Statale Leonardo.","admin","Notizie","/mhw3/foto9.jpeg","Sono abilitati i seguenti profili per la pubblicazione con le autorizzazioni da segreteria: Sig.ra Zappala’ Giuseppa; Sig.ra Palazzolo Concetta; Sig.ra Lantieri Carmela; Sig.ra Leotta Salvina; Sig.ra Di Bella Angela; Sig.ra Trovato Grazia.","/mhw3/rassegnepdf/BENI-DA-SCARICARE-PER-VENDITA.pdf");
INSERT INTO rassegna (titolo, data, testo, docente, tipologia,immagine_docente,documentazione, file_pdf) VALUES ("INFORMAZIONI FUNZIONAMENTO SITO – PERSONALE SCOLASTICO","2020-05-07", "Informazioni e FAQ sul funzionamento del nuovo sito al link www.liceoleonardo.edu.it per il personale scolastico del Liceo Statale Leonardo.","admin","Notizie","/mhw3/foto9.jpeg","Il sito del Liceo Statale “Leonardo” è stato rinnovato, rispettando appieno le linee guida del MIUR e del MID.","/mhw3/rassegnepdf/BENI-DA-SCARICARE-PER-VENDITA.pdf");
INSERT INTO rassegna (titolo, data, testo, docente,tipologia, immagine_docente,documentazione, file_pdf) VALUES ("Sito in lavorazione","2020-05-07", "Lavori al nuovo sito: novità e tempistiche","Nunzio Giglio","Notizie","/mhw3/foto9.jpeg","L’attuale sito del Liceo Statale “Leonardo” (link dominio*) è in lavorazione e a breve verrà ultimato.","/mhw3/rassegnepdf/BENI-DA-SCARICARE-PER-VENDITA.pdf");
INSERT INTO rassegna (titolo, data, testo, docente,tipologia, immagine_docente,documentazione, file_pdf) VALUES ("OPEN DAY A.S.2023-2024","2023-11-13", "APPUNTAMENTI ORIENTAMENTO IN ENTRATA LICEO LEONARDO Incontro con Vincenzo Schettini, Fibonacci day, Scuola aperta, Ministage laboratoriali","Francesca Licosi","OpenDay","/mhw3/foto9.jpeg","","/mhw3/rassegnepdf/depliant-2023-Leonardo-4.pdf");
INSERT INTO rassegna (titolo, data, testo, docente,tipologia, immagine_docente,documentazione, file_pdf) VALUES ("OPEN DAY A.S.2022-2023","2022-11-16", "OBIETTIVO ORIENTAMENTO ANNO SCOLASTICO 2022/2023","Nando Gulisano","OpenDay","/mhw3/foto9.jpeg","ORIENTAMENTO PER L’A.S.2022-2023. Il liceo “Leonardo” di Giarre promuove una serie di attività per presentare agli studenti delle classi terze delle scuole secondarie di primo grado e alle loro famiglie l’offerta formativa degli indirizzi attivati. ","/mhw3/rassegnepdf/BENI-DA-SCARICARE-PER-VENDITA.pdf");
INSERT INTO rassegna (titolo, data, testo, docente,tipologia, immagine_docente,documentazione, file_pdf) VALUES ("PTOF AGGIORNAMENTO A.S.2023-2024","2023-11-29","", "Francesca Licosi","PTOF", "/mhw3/foto9.jpeg","","/mhw3/rassegnepdf/BENI-DA-SCARICARE-PER-VENDITA.pdf");
INSERT INTO rassegna (titolo, data, testo, docente,tipologia, immagine_docente,documentazione, file_pdf) VALUES ("CHIUSURA AL PUBBLICO UFFICI DI SEGRETERIA","2023-06-19", "CHIUSURA AL PUBBLICO UFFICI DI SEGRETERIA","Francesca Licosi","Rassegnastampa","/mhw3/foto9.jpeg","","/mhw3/rassegnepdf/BENI-DA-SCARICARE-PER-VENDITA.pdf");
INSERT INTO rassegna (titolo, data, testo, docente,tipologia, immagine_docente,documentazione, file_pdf) VALUES ("Come riaprirà il Liceo Leonardo: intervista alla dirigente Tiziana D’Anna","2020-09-08", "La nostra dirigente, la dott.ssa Tiziana D Anna, in un intervista a La tecnica della scuola illustra le modalità di riapetura del nostro Liceo","Silavan La Porta","Rassegnastampa","/mhw3/foto9.jpeg","","/mhw3/rassegnepdf/timbro_PTOF-2022-2025-.pdf");
INSERT INTO rassegna (titolo, data, testo, docente,tipologia, immagine_docente,documentazione, file_pdf) VALUES ("Ecco i centisti della Maturità 2020!","2020-07-07", "Ecco i nomi dei centisti della Maturità 2020!!! Un grosso in n bocca al lupo ai nostri ragazzi!","Silvana La Porta","Rassegnastampa","/mhw3/foto9.jpeg","Ecco i nomi dei centisti della Maturità 2020!!! In bocca al lupo, ragazzi","/mhw3/rassegnepdf/BENI-DA-SCARICARE-PER-VENDITA.pdf");
INSERT INTO rassegna (titolo, data, testo, docente, tipologia,immagine_docente,documentazione, file_pdf) VALUES ("Progetto Matematica&Realtà: primo posto assoluto per il Liceo Leonardo","2020-06-15", "Anche quest’anno gli alunni del Leonardo si sono distinti all’interno del progetto M&R, conseguendo il primo posto assoluto con Nino Greco di 5 A","Silvana La Porta","Rassegnastampa","/mhw3/foto9.jpeg","Matematica&Realtà al Liceo Leonardo. La cerimonia di premiazione della competizione 2019-2020 si è svolta l’11 giugno 2020, ore 15.00  ","/mhw3/rassegnepdf/BENI-DA-SCARICARE-PER-VENDITA.pdf");
INSERT INTO rassegna (titolo, data, testo, docente, tipologia,immagine_docente,documentazione, file_pdf) VALUES ("RAV A.S.2023-2024","2023-11-29", "","Fracesca Licosi","RAV","/mhw3/foto9.jpeg","","/mhw3/rassegnepdf/RAV_202324_CTIS053002_20231123211953.pdf");


INSERT INTO circolari (titolo, testo,tipologia, data, docente,immagine_docente, file_pdf) VALUES ("V edizione catanese di “Orienta Sicilia Aster Sicilia” Sedi Mazzei-Sabin","V edizione catanese di “Orienta Sicilia Aster Sicilia” Sedi Mazzei-Sabin", "alunni","2023-05-01","Fracesca Licosi","/mhw3/foto9.jpeg","/mhw3/rassegnepdf/BENI-DA-SCARICARE-PER-VENDITA.pdf");
INSERT INTO circolari (titolo, testo,tipologia, data, docente,immagine_docente, file_pdf) VALUES ("Partecipanti torneo scacchi","", "alunni","2023-05-01","Fracesca Licosi","/mhw3/foto9.jpeg","/mhw3/rassegnepdf/BENI-DA-SCARICARE-PER-VENDITA.pdf");
INSERT INTO circolari (titolo, testo,tipologia, data, docente,immagine_docente, file_pdf) VALUES ("Restituzione IPAD in comodato d’uso","Restituzione IPAD in comodato d’uso-quinte classi", "alunni","2023-04-30 ","Fracesca Licosi","/mhw3/foto9.jpeg","/mhw3/rassegnepdf/BENI-DA-SCARICARE-PER-VENDITA.pdf");
INSERT INTO circolari (titolo, testo,tipologia, data, docente,immagine_docente, file_pdf) VALUES ("Corso di preparazione al test di ammissione in Architettura. Università KORE di ENNA."," Corso di preparazione al test di ammissione in Architettura. Università KORE di ENNA.","alunni","2023-04-26","Fracesca Licosi","/mhw3/foto9.jpeg","");
INSERT INTO circolari (titolo, testo,tipologia, data, docente,immagine_docente, file_pdf) VALUES ("Premiazione concorso “UN MESSAGGIO AL FUTURO PER L’AMBIENTE”","Premiazione concorso “UN MESSAGGIO AL FUTURO PER L’AMBIENTE”", "genitori","2023-05-01","Fracesca Licosi","/mhw3/foto9.jpeg","");
INSERT INTO circolari (titolo, testo,tipologia, data, docente,immagine_docente, file_pdf) VALUES ("Progetto 1 nessuno 100 giga: Comunicazione Numero Verde 800 280 000","Progetto 1 nessuno 100 giga: Comunicazione Numero Verde 800 280 000", "genitori","2023-05-27 ","Fracesca Licosi","/mhw3/foto9.jpeg","/mhw3/rassegnepdf/BENI-DA-SCARICARE-PER-VENDITA.pdf");
INSERT INTO circolari (titolo, testo,tipologia, data, docente,immagine_docente, file_pdf) VALUES ("Seminario Orientamento La responsabilità civile e penale dei medici e di altre figure sanitarie","Seminario Orientamento La responsabilità civile e penale dei medici e di altre figure sanitarie", "genitori","2023-03-29","Fracesca Licosi","/mhw3/foto9.jpeg","");
INSERT INTO circolari (titolo, testo,tipologia, data, docente,immagine_docente, file_pdf) VALUES ("BANCHETTO DI LIBRI PER LA MEMORIA, 30 GENNAIO","", "docenti","2023-01-11","Fracesca Licosi","/mhw3/foto9.jpeg","");
INSERT INTO circolari (titolo, testo,tipologia, data, docente,immagine_docente, file_pdf) VALUES ("INCONTRO PRESSO IL SALONE DEGLI SPECCHI DEL COMUNE DI GIARRE (CT)","", "docenti","2023-05-26 ","Fracesca Licosi","/mhw3/foto9.jpeg","/mhw3/rassegnepdf/BENI-DA-SCARICARE-PER-VENDITA.pdf");
INSERT INTO circolari (titolo, testo,tipologia, data, docente,immagine_docente, file_pdf) VALUES ("GARA DELLA SELEZIONE PER LA NAZIONALE D’ISTITUTO DELLE OLIMPIADI DELLA CITTADINANZA","Fracesca Licosi", "docenti","2023-03-01 ","","/mhw3/foto9.jpeg","");
INSERT INTO circolari (titolo, testo,tipologia, data, docente,immagine_docente, file_pdf) VALUES ("Fruizione ferie maturate e non godute a. s. 2022/2023","", "ATA","2023-05-03 ","Fracesca Licosi","/mhw3/foto9.jpeg","");
INSERT INTO circolari (titolo, testo,tipologia, data, docente,immagine_docente, file_pdf) VALUES ("Giovedì 19 Maggio Palestra inagibile per esami Cambridge","", "ATA","2023-05-16","Fracesca Licosi","/mhw3/foto9.jpeg","/mhw3/rassegnepdf/BENI-DA-SCARICARE-PER-VENDITA.pdf");
INSERT INTO circolari (titolo, testo,tipologia, data, docente,immagine_docente, file_pdf) VALUES ("Sciopero varie sigle 20 maggio","", "ATA","2023-03-13","Fracesca Licosi","/mhw3/foto9.jpeg","");


