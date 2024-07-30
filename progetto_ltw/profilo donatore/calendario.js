//Utilizzo il selettore di query per selezionare tutti gli elementi span
//che si trovano all'interno di elementi con la classe accordion-button 
const strutture = document.querySelectorAll('.accordion-button span');
let prevIcon = [];
let nextIcon = [];
let meseCurr = [];
let annoCurr = [];
let date = [];
let tagGiorni = [];
let currentDate = [];
let eventiPieni = [];
let eventiLiberi = [];


for (let s = 0; s < strutture.length; s++) {
    codStruttura = strutture[s].innerText;
    //memorizzo in variabili diversi elementi del DOM associati a ciascuna struttura 
    currentDate[s] = document.getElementById('current-date-' + codStruttura);
    tagGiorni[s] = document.getElementById('giorni-' + codStruttura);
    prevIcon[s] = document.getElementById('prev-' + codStruttura);
    nextIcon[s] = document.getElementById('next-' + codStruttura);

    //recupero le date della struttura tramite una chiamata XMLHttpRequest al server 
    var eventiPieniStruttura = [];
    var eventiLiberiStruttura = [];

    const xhttp = new XMLHttpRequest();
    xhttp.open('GET', '../profilo strutture/fetch_date.php?struttura=' + codStruttura, false); // false forza la chiamata sincrona
    xhttp.setRequestHeader('Content-type', 'application/json');
    xhttp.onload = function() {
        //controllo stato della richiesta e stato di completamento 
        if (xhttp.status === 200 && xhttp.readyState === 4) {
            eventiLiberiStruttura = JSON.parse(xhttp.responseText);
        }
        else {
            console.log('errore');
        }
    }
    xhttp.send();

    const xhttp1 = new XMLHttpRequest();
    xhttp1.open('GET', '../scegliMese/datePiene.php?struttura=' + codStruttura, false); // false forza la chiamata sincrona
    xhttp1.setRequestHeader('Content-type', 'application/json');
    xhttp1.onload = function() {
        if (xhttp1.status === 200 && xhttp1.readyState === 4) {
            eventiPieniStruttura = JSON.parse(xhttp1.responseText);
        }
        else {
            console.log('errore');
        }
    }
    xhttp1.send();

    eventiPieni[s] = eventiPieniStruttura;
    eventiLiberi[s] = eventiLiberiStruttura;

    //recupero la data corrente
    date[s] = new Date();
    annoCurr[s] = date[s].getFullYear();
    meseCurr[s] = date[s].getMonth();

    const mesi = ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'];

    //funzione per renderizzare il calendario
    const renderCalendar = () => {
        let firstDayofMonth = new Date(annoCurr[s], meseCurr[s], 1).getDay(),
        lastDateofMonth = new Date(annoCurr[s], meseCurr[s] + 1, 0).getDate(),
        lastDayofMonth = new Date(annoCurr[s], meseCurr[s], lastDateofMonth).getDay(),
        lastDateofPrevMonth = new Date(annoCurr[s], meseCurr[s], 0).getDate();
        let liTag = '';

    var meseStr = meseCurr[s] + 1;
    meseStr = '' + meseStr;

    if (meseCurr[s] < 10)
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
            if (i < 10)
                str_i = '0' + i;
            else
                str_i = i;

            var data = "" + annoCurr[s] + "-" + (meseStr) + "-" + str_i + "";
            
            if (eventiPieni[s].includes(data) || ( eventiLiberi[s].includes(data) && ((i < date[s].getDate() && meseCurr[s] <= new Date().getMonth() 
                        && annoCurr[s] <= new Date().getFullYear()) || (meseCurr[s] < new Date().getMonth() 
                        && annoCurr[s] <= new Date().getFullYear()) || (annoCurr[s] < new Date().getFullYear()) ))) {
                liTag += `<li class="pieno">${i}</li>`;
            }

            else if (eventiLiberi[s].includes(data)) {
                liTag += `<li class="prenotabile"><a href="../scegliMese/prenota.php?mese=${meseStr}&anno=${annoCurr[s]}&giorno=${str_i}&struttura=${codStruttura}">${str_i}</a></li>`;
            }
            
            //se il giorno è uguale al giorno corrente, allora aggiungo la classe active
            else if (i === date[s].getDate() && meseCurr[s] === new Date().getMonth() 
                        && annoCurr[s] === new Date().getFullYear()) {
                    liTag += `<li class="active">${i}</li>`;   
                }
            //altrimenti aggiungo la classe normal
            else {
                liTag += `<li>${i}</li>`;
            }
        }
        //se l'ultimo giorno del mese non è domenica, allora aggiungo i giorni successivi fino a domenica
        if (lastDayofMonth !== 0) {
            for (let i = lastDayofMonth; i <= 6; i++) {
                liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`;
            }
        }
        currentDate[s].innerText = `${mesi[meseCurr[s]]} ${annoCurr[s]}` ;
        tagGiorni[s].innerHTML = liTag;
    }
    renderCalendar();

    //aggiungo un evento click per le icone (pulsanti) per cambiare mese
        prevIcon[s].addEventListener('click', () => {
            //se l'icona è prev, allora decremento mese, altrimenti incremento
            meseCurr[s]--;
            if (meseCurr[s] < 0 || meseCurr[s] > 11) {
                date[s] = new Date(annoCurr, meseCurr[s]);
                annoCurr[s] = date.getFullYear();
                meseCurr[s] = date.getMonth();
            } 
            else {
                date[s] = new Date();
            }
            renderCalendar();
        });
        nextIcon[s].addEventListener('click', () => {
                meseCurr[s]++;
            if (meseCurr[s] < 0 || meseCurr[s] > 11) {
                date[s] = new Date(annoCurr, meseCurr[s]);
                annoCurr[s] = date.getFullYear();
                meseCurr[s] = date.getMonth();
            } 
            else {
                date[s] = new Date();
            }
            renderCalendar();
        });      
};    

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
