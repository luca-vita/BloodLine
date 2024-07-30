document.forms['signupStr'].onsubmit = function(e){
   
    if(this.nome.value.trim() === ""){
       document.querySelector(".error-nome").innerHTML = "Inserisci il nome";
       document.querySelector(".error-nome").style.display = "block";
       e.preventDefault();
       return false;
    }
    if(this.indirizzo.value.trim() === ""){
        document.querySelector(".error-indirizzo").innerHTML = "Inserisci l' indirizzo";
        document.querySelector(".error-indirizzo").style.display = "block";
        e.preventDefault();
        return false;
     }
     if(this.cap.value.trim() === ""){
        document.querySelector(".error-cap").innerHTML = "Inserisci il cap";
        document.querySelector(".error-cap").style.display = "block";
        e.preventDefault();
        return false;
     }
     if(this.tipologia.value.trim() === ""){
        document.querySelector(".error-tipologia").innerHTML = "Inserisci la tipologia di struttura";
        document.querySelector(".error-tipologia").style.display = "block";
        e.preventDefault();
        return false;
     }
     if(this.email.value.trim() === ""){
        document.querySelector(".error-email").innerHTML = "Inserisci la tua email";
        document.querySelector(".error-email").style.display = "block";
        e.preventDefault();
        return false;
     }
    if(this.password.value.trim() === ""){
        document.querySelector(".error-password").innerHTML = "Inserisci la tua passowrd";
        document.querySelector(".error-password").style.display = "block";
        e.preventDefault();
        return false;
    }
    if (this.cap.value.length!=5) {
        document.querySelector(".error-cap").innerHTML = "Il cap deve contenere 5 cifre";
        document.querySelector(".error-cap").style.display = "block";
        e.preventDefault();
        return false;
    }
    var patternPassword = new RegExp("[A-Za-z0-9]{8,}$");
    if (this.password.value.match(patternPassword)==null) {
        document.querySelector(".error-password").innerHTML = "Password non valida, deve contenere almeno 8 caratteri";
        document.querySelector(".error-password").style.display = "block";
        e.preventDefault();
        return false;
    }
    var c = parseInt(this.cap.value);
    if (isNaN(c)) {
        document.querySelector(".error-cap").innerHTML = "Il cap deve essere un intero";
        document.querySelector(".error-cap").style.display = "block";
        e.preventDefault();
        return false;
    }
    var p = parseInt(this.max_prenotazioni.value);
    if (isNaN(p)) {
        document.querySelector(".error-max_prenotazioni").innerHTML = "Il numero di posti disponibili deve essere un intero";
        document.querySelector(".error-max_prenotazioni").style.display = "block";
        e.preventDefault();
        return false;
    }
}
if (sessionStorage.getItem('nome')) {
    // se il valore esiste, impostalo come valore dell'input
    document.getElementById('nome').value = sessionStorage.getItem('nome');
}
  // aggiungi un listener per l'evento di input e salva il valore nel localStorage
    document.getElementById('nome').addEventListener('input', function() {
        sessionStorage.setItem('nome', this.value);
});

if (sessionStorage.getItem('tipologia')) {
    // se il valore esiste, impostalo come valore dell'input
    document.getElementById('tipologia').value = sessionStorage.getItem('tipologia');
}
  // aggiungi un listener per l'evento di input e salva il valore nel localStorage
  document.getElementById('tipologia').addEventListener('input', function() {
    sessionStorage.setItem('tipologia', this.value);
});

if (sessionStorage.getItem('email')) {
    // se il valore esiste, impostalo come valore dell'input
    document.getElementById('email').value = sessionStorage.getItem('email');
}
  // aggiungi un listener per l'evento di input e salva il valore nel localStorage
  document.getElementById('email').addEventListener('input', function() {
    sessionStorage.setItem('email', this.value);
});

if (sessionStorage.getItem('indirizzo')) {
    // se il valore esiste, impostalo come valore dell'input
    document.getElementById('indirizzo').value = sessionStorage.getItem('indirizzo');
}
  // aggiungi un listener per l'evento di input e salva il valore nel localStorage
  document.getElementById('indirizzo').addEventListener('input', function() {
    sessionStorage.setItem('indirizzo', this.value);
});

if (sessionStorage.getItem('cap')) {
    document.getElementById('cap').value = sessionStorage.getItem('cap');
}
  document.getElementById('cap').addEventListener('input', function() {
    sessionStorage.setItem('cap', this.value);
});