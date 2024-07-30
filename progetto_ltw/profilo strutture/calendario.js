const currentDate = document.querySelector('.current-date'),
tagGiorni = document.querySelector('.giorni'),
prevNextIcon = document.querySelectorAll('.icons span'),
//creo una costante con il codice della struttura
struttura = document.getElementById('struttura').value;

//recupero le date piene della struttura
var dateOccupate = [];

const xhttp = new XMLHttpRequest();
xhttp.open('GET', "fetch_date.php?struttura=" + struttura , false); // false forza la chiamata sincrona
xhttp.setRequestHeader('Content-type', 'application/json');
xhttp.onload = function() {
    if (xhttp.status === 200 && xhttp.readyState === 4) {
        dateOccupate = JSON.parse(xhttp.responseText);
        console.log(dateOccupate);
    }
    else {
        console.log("state="+ xhttp.status)
        console.log('error');
    }
}

xhttp.send();
console.log(dateOccupate);

//recupero la data corrente
let date = new Date(),
annoCurr = date.getFullYear(),
giornoStr = '',
meseCurr = date.getMonth();

const mesi = ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'];

//funzione per renderizzare il calendario
const renderCalendar = () => {
    let firstDayofMonth = new Date(annoCurr, meseCurr, 1).getDay(),
    lastDateofMonth = new Date(annoCurr, meseCurr + 1, 0).getDate(),
    lastDayofMonth = new Date(annoCurr, meseCurr, lastDateofMonth).getDay(),
    lastDateofPrevMonth = new Date(annoCurr, meseCurr, 0).getDate();
    let liTag = '';

var meseStr = meseCurr + 1;
meseStr = ''+meseStr;
if (meseCurr<10)
    meseStr = '0' + meseStr;

    //se il primo giorno del mese è domenica
    if (firstDayofMonth === 0) {
        firstDayofMonth = 7;
    }

    //se il primo giorno del mese non è lunedì, allora aggiungo i giorni precedenti fino a lunedì
    for (let i = firstDayofMonth; i > 1; i--) {
        liTag += `<li class="inactive">${lastDateofPrevMonth - i + 2}</li>`;
    }

    for (let i = 1; i <= lastDateofMonth; i++) {

        var str_i = '';
        if (i < 10)
            str_i = '0' + i;
        else
            str_i = ''+i;

        //se la data è presente nell'array delle date donanti, allora aggiungo la classe prenotabile
        var data = "" + annoCurr + "-" + meseStr + "-" + str_i + "";
       

        if (dateOccupate.includes(data)) {
            annoStr = ''+annoCurr;
            liTag += `<li class="prenotabile"><a href="visualizza prenotazione.php?mese=${meseStr}&anno=${annoStr}&giorno=${str_i}&struttura=${struttura}">${i}</a></li>`;
        }

        else {

            //se il giorno è uguale al giorno corrente, allora aggiungo la classe active
            if (i === date.getDate() && meseCurr === new Date().getMonth() 
                    && annoCurr === new Date().getFullYear()) {
                liTag += `<li class="active">${i}</li>`;   
            }
            //se il giorno è il giorno corrente di un mese successivo || un giorno successivo ad oggi || anno successivo, allora aggiungo la classe 
            if ((i === date.getDate() && meseCurr > new Date().getMonth() 
                    && annoCurr >= new Date().getFullYear()) ||  
                    (i > date.getDate() && meseCurr >= new Date().getMonth() 
                    && annoCurr >= new Date().getFullYear()) || (annoCurr > new Date().getFullYear()) 
                    || (meseCurr > new Date().getMonth() && annoCurr >= new Date().getFullYear()) ) {
                
                annoStr = '' + annoCurr;

                liTag += `<li class="non-prenotabile" onclick="showPopup(${i})">${i}</li>
                <div class="popup-giorno" id="popup-${i}">
                    <div class="popup-header">
                        <div class="title">Vuoi pubblicare un evento per questo giorno?</div>
                        <form><button type="submit" class="btn-close" aria-label="Close" onclick="closePopup(${i})"></button> </form>                   
                    </div>
                    <div class="popup-body">
                        <p>Clicca il tasto in basso per proseguire o chiudi il pop-up per annullare</p>
                        <button type="button">
                            <a href="pubblica evento.php?mese=${meseStr}&anno=${annoStr}&giorno=${str_i}">Prosegui</a>
                        </button>
                        
                    </div>
                </div>`;
            }

            //se il giorno è un giorno precedente ad oggi || mese precedente ad oggi || anno precedente ad oggi, allora aggiungo la classe inactive
            if ((i < date.getDate() && meseCurr <= new Date().getMonth() 
                    && annoCurr <= new Date().getFullYear()) || (meseCurr < new Date().getMonth() 
                    && annoCurr <= new Date().getFullYear()) || (annoCurr < new Date().getFullYear()) ) {
                liTag += `<li class="inactive">${i}</li>`;
            }
        }
    }

    //se l'ultimo giorno del mese non è domenica, allora aggiungo i giorni successivi fino a domenica
    if (lastDayofMonth != 0) {
        for (let i = lastDayofMonth; i <= 6; i++) {
            liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`;
        }
    }

    currentDate.innerText = `${mesi[meseCurr]} ${annoCurr}` ;
    tagGiorni.innerHTML = liTag;
}
renderCalendar();

//aggiungo un evento click per le icone (pulsanti) per cambiare mese
prevNextIcon.forEach(icon => {
    icon.addEventListener('click', () => {
        //se l'icona è prev, allora decremento mese, altrimenti incremento
        meseCurr = icon.id === "prev" ? meseCurr - 1 : meseCurr + 1;
        
        if (meseCurr < 0 || meseCurr > 11) {
            date = new Date(annoCurr, meseCurr);
            annoCurr = date.getFullYear();
            meseCurr = date.getMonth();
        } 
        else {
            date = new Date();
        }
        renderCalendar();
    });
});

function showPopup(day) {
    // get the popup element for the clicked day
    let popup = document.getElementById(`popup-${day}`);
    
    // show the popup
    popup.style.display = "block";
  }
function closePopup(day) {
    let popup = document.getElementById(`popup-${day}`);
        popup.style.display = 'none';

}

//effetti grafici per i pulsanti di prenotazione
$(document).ready(function(){
    $('button').hover(function(){
      $(this).css('background-color', 'red');
    }, function(){
      $(this).css('background-color', '');
    });
    $('button a').hover(function(){
      $(this).css('color', 'white');
    },
    function(){
        $(this).css('color', '');
    });
});