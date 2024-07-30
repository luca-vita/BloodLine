document.forms['signupUt'].onsubmit = function(e){
   
    if(this.nome.value.trim() === ""){
       document.querySelector(".error-nome").innerHTML = "Inserisci il tuo nome";
       document.querySelector(".error-nome").style.display = "block";
       e.preventDefault();
       return false;
    }
    if(this.cognome.value.trim() === ""){
        document.querySelector(".error-cognome").innerHTML = "Inserisci il tuo cognome";
        document.querySelector(".error-cognome").style.display = "block";
        e.preventDefault();
        return false;
     }
     if(this.cf.value.trim() === ""){
        document.querySelector(".error-cf").innerHTML = "Inserisci il tuo codice fiscale";
        document.querySelector(".error-cf").style.display = "block";
        e.preventDefault();
        return false;
     }
     if(this.datan.value.trim() === ""){
        document.querySelector(".error-datan").innerHTML = "Inserisci la tua data di nascita";
        document.querySelector(".error-datan").style.display = "block";
        e.preventDefault();
        return false;
     }
     if(this.luogon.value.trim() === ""){
        document.querySelector(".error-luogon").innerHTML = "Inserisci il tuo luogo di nascita";
        document.querySelector(".error-luogon").style.display = "block";
        e.preventDefault();
        return false;
     }
     if(this.nazionalita.value.trim() === ""){
        document.querySelector(".error-nazionalita").innerHTML = "Inserisci la tua nazionalità";
        document.querySelector(".error-nazionalita").style.display = "block";
        e.preventDefault();
        return false;
     }
     if(this.telefono.value.trim() === ""){
        document.querySelector(".error-telefono").innerHTML = "Inserisci il tuo numreo di telefono";
        document.querySelector(".error-telefono").style.display = "block";
        e.preventDefault();
        return false;
    }
     if(this.indirizzo.value.trim() === ""){
        document.querySelector(".error-indirizzo").innerHTML = "Inserisci il tuo indirizzo";
        document.querySelector(".error-indirizzo").style.display = "block";
        e.preventDefault();
        return false;
    }
    if(this.cap.value.trim() === ""){
        document.querySelector(".error-cap").innerHTML = "Inserisci il tuo cap";
        document.querySelector(".error-cap").style.display = "block";
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
    if (this.cf.value.length!=16) {
        document.querySelector(".error-cf").innerHTML = "Il codice fiscale deve contenere 16 cifre";
        document.querySelector(".error-cf").style.display = "block";
        e.preventDefault();
        return false;
    }

    var patternCF = new RegExp("^[A-Z]{6}[0-9]{2}[A-Z][0-9]{2}[A-Z][0-9]{3}[A-Z]$");
    if (this.cf.value.match(patternCF)==null) {
        document.querySelector(".error-cf").innerHTML = "Il codice fiscale non è valido";
        document.querySelector(".error-cf").style.display = "block";
        e.preventDefault();
        return false;
    }
    // Verifica se la password contiene almeno 8 caratteri e un numero

    var patternPassword = new RegExp("[A-Za-z]){8,}$");
    if (this.password.value.match(patternPassword)==null) {
        document.querySelector(".error-password").innerHTML = "Password non valida, deve contenere almeno 8 caratteri e un numero";
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
    var dataNascita = new Date(this.datan.value);
    var oggi = new Date();
    var eta = oggi.getFullYear() - dataNascita.getFullYear();
    
    // Verifica se il compleanno deve ancora arrivare quest'anno
    var compleArrivato = (oggi.getMonth() < dataNascita.getMonth()) || (oggi.getMonth() == dataNascita.getMonth() && oggi.getDate() < dataNascita.getDate());
    
    if (eta < 18 || (eta == 18 && !compleArrivato)) {
        document.querySelector(".error-datan").innerHTML = "Devi essere maggiorenne per registrarti";
        document.querySelector(".error-datan").style.display = "block";
        e.preventDefault();
        return false;
    }
    var radioM = document.getElementById("radioM");
    var radioF = document.getElementById("radioF");
    if (!radioM.checked && !radioF.checked) {
        document.querySelector(".error-sesso").innerHTML = "Seleziona il tuo sesso";
        document.querySelector(".error-sesso").style.display = "block";
        e.preventDefault();
        return false;
    }
    var t = this.telefono.value;
    if (isNaN(t)) {
        document.querySelector(".error-telefono").innerHTML = "Il telefono deve essere un intero";
        document.querySelector(".error-telefono").style.display = "block";
        e.preventDefault();
        return false;
    }
}

if (sessionStorage.getItem('nome')) {
    // se il valore esiste, impostalo come valore dell'input
    document.getElementById('nome').value = sessionStorage.getItem('nome');
}
  // aggiungi un listener per l'evento di input e salva il valore nel sessionStorage
  document.getElementById('nome').addEventListener('input', function() {
    sessionStorage.setItem('nome', this.value);
});

if (sessionStorage.getItem('cognome')) {
    // se il valore esiste, impostalo come valore dell'input
    document.getElementById('cognome').value = sessionStorage.getItem('cognome');
}
  // aggiungi un listener per l'evento di input e salva il valore nel sessionStorage
  document.getElementById('cognome').addEventListener('input', function() {
    sessionStorage.setItem('cognome', this.value);
});

if (sessionStorage.getItem('cf')) {
    // se il valore esiste, impostalo come valore dell'input
    document.getElementById('cf').value = sessionStorage.getItem('cf');
}
  // aggiungi un listener per l'evento di input e salva il valore nel sessionStorage
  document.getElementById('cf').addEventListener('input', function() {
    sessionStorage.setItem('cf', this.value);
});

if (sessionStorage.getItem('indirizzo')) {
    // se il valore esiste, impostalo come valore dell'input
    document.getElementById('indirizzo').value = sessionStorage.getItem('indirizzo');
}
  // aggiungi un listener per l'evento di input e salva il valore nel sessionStorage
  document.getElementById('indirizzo').addEventListener('input', function() {
    sessionStorage.setItem('indirizzo', this.value);
});

if (sessionStorage.getItem('cap')) {
    document.getElementById('cap').value = sessionStorage.getItem('cap');
}
  document.getElementById('cap').addEventListener('input', function() {
    sessionStorage.setItem('cap', this.value);
});

if (sessionStorage.getItem('email')) {
    document.getElementById('email').value = sessionStorage.getItem('email');
} 
    document.getElementById('email').addEventListener('input', function() {
    sessionStorage.setItem('email', this.value);
});

if (sessionStorage.getItem('nazionalita')) {
    document.getElementById('nazionalita').value = sessionStorage.getItem('nazionalita');
} 
    document.getElementById('nazionalita').addEventListener('input', function() {
    sessionStorage.setItem('nazionalita', this.value);
});

if (sessionStorage.getItem('telefono')) {
    document.getElementById('telefono').value = sessionStorage.getItem('telefono');
}
    document.getElementById('telefono').addEventListener('input', function() {
    sessionStorage.setItem('telefono', this.value);
});

if (sessionStorage.getItem('sesso')) {
    document.getElementById('sesso' + sessionStorage.getItem('sesso')).checked = true;
}

document.getElementById('sessoM').addEventListener('change', function() {
    sessionStorage.setItem('sesso', 'M');
});

document.getElementById('sessoF').addEventListener('change', function() {
    sessionStorage.setItem('sesso', 'F');
});

if (sessionStorage.getItem('datan')) {
    document.getElementById('datan').value = sessionStorage.getItem('datan');
}   
    document.getElementById('datan').addEventListener('input', function() {
    sessionStorage.setItem('datan', this.value);
});

if (sessionStorage.getItem('luogon')) {
    document.getElementById('luogon').value = sessionStorage.getItem('luogon');
}   
    document.getElementById('luogon').addEventListener('input', function() {
    sessionStorage.setItem('luogon', this.value);
});
