document.forms['modifica'].onsubmit = function(e) {
    if (this.cf.value.length!=16) {
        document.querySelector(".error-cf").innerHTML = "Il codice fiscale deve contenere 16 cifre";
        document.querySelector(".error-cf").style.display = "block";
        e.preventDefault();
        return false;
    }
    if (this.cap.value.length!=5) {
        document.querySelector(".error-cap").innerHTML = "Il cap deve contenere 5 cifre";
        document.querySelector(".error-cap").style.display = "block";
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