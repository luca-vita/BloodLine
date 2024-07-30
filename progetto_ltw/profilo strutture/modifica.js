document.forms['modifica'].onsubmit = function(e) {

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
}