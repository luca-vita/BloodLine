$(document).ready(function(){
    $('#submit').click(function(e){
        if(!$("#cap").val()){
            $(".error-cap").html("Inserisci il CAP");
            $(".error-cap").css("display", "block");
            e.preventDefault();
            return false;
        }
        var patternCAP = new RegExp("^[0-9]{5}$");
        if($('#cap').val().match(patternCAP)==null){
            $(".error-cap").html("Il CAP non è valido");
            $(".error-cap").css("display", "block");
            e.preventDefault();
            return false;
        }
    });
});

var pre = document.querySelector('#pre');
var prenotazioniEffettuate = document.getElementById('prenotazioni_effettuate');

//viene eseguita una funzione di callback al click dell'elemento  
pre.addEventListener('click', function(event) {
  event.preventDefault(); //evita il comportamento predefinito del click (ricarica della pagina)
  if (prenotazioniEffettuate.innerHTML !== '') { //contenuto non vuoto
    prenotazioniEffettuate.innerHTML = '';
    return;
  }
  //contenuto vuoto -> viene effettuata una richiesta al file prenotazioni_effettuate.php
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.status === 200 && xhr.readyState === 4) {
      //assego il contenuto della risposta alla proprietà innerHTML dell'elemento 
      document.getElementById('prenotazioni_effettuate').innerHTML = xhr.responseText;
    }
    else {
      console.log('Errore durante il caricamento dei dati: ' + xhr.status);
    }
  };
  //apro la connessione per effettuare una richiesta GET asincrona
  xhr.open('GET', 'prenotazioni_effettuate.php');
  xhr.send();
});


