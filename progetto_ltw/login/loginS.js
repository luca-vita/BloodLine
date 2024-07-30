document.forms['loginS'].onsubmit = function(e){
   
    if(this.email.value.trim() === ""){
       document.querySelector(".error-email").innerHTML = "Inserisci l'email";
       document.querySelector(".error-email").style.display = "block";
       e.preventDefault();
       return false;
    }
    if(this.password.value.trim() === ""){
        document.querySelector(".error-password").innerHTML = "Inserisci la passowrd";
        document.querySelector(".error-password").style.display = "block";
        e.preventDefault();
        return false;
    }
}
