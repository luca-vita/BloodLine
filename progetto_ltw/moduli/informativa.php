<?php
    session_start();
    if (!isset($_SESSION['cf'])) {
        header("Location: ../login/indexUt.php");
        exit;
    }
    $codiceStruttura = $_GET['struttura'];
    $giorno = $_GET['giorno'];
    $mese = $_GET['mese'];
    $anno = $_GET['anno'];
    if ($codiceStruttura == "" || $giorno == "" || $mese == "" || $anno == "") {
        header("Location: ../profilo donatore/area personale.php");
        exit;
    }
    $data = $anno . "-" . $mese . "-" . $giorno;

    //se torno indietro mi rimane segnato il flag acconsento
    $checkedA = '';
    $checkedN = '';

    if(isset($_GET['acconsento'])) {
        if($_GET['acconsento'] == "true") {
            $checkedA = 'checked';
        } else {
            $checkedN = 'checked';
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="modulo.css" type="text/css">
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js" defer></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="application/javascript" src="modulo.js" defer></script>
        <title>Informativa</title>
    
    </head>

    <body> 
    
    <form action="malattie.php" name="info" method="GET">
        
        <div class="informativa" id="info">
            <p class="fs-1 text-center">Informativa e consenso al trattamento dei dati personali relativi alla donazione di sangue</p>
                <p>
                    Ai sensi del "Codice in materia dei dati personali" (Codice), 
                    la informiamo che i suoi dati personali, anche sensibili, 
                    saranno utilizzati esclusivamente per finalità sanitarie volte 
                    alla valutazione dell' idoneità alla donazione di sangue ed emocomponenti
                    e per l'adempimento degli obblighi di legge. In particolare il servizio
                    trasfusionale esegue sul campione di sangue i i test prescritti dalla legge,
                    inclusi i test per HIV, o altri test per la sicurezza della donazione di sangue
                    introddi in rapporto a specifiche esigenze o a specifiche situazioni epidemiologiche,
                    e la informerà sugli esiti dei test.
                </p>
                <p>
                    Ove i suoi dati saranno utilizzati per studi e ricerche finalizzate 
                    alla tutela della sua salute, di terzi o della collettività in campo medico,
                    biomedico ed epidemiologico, anche in relazione all'eventuale trasferimento
                    del materiale donato e dei relativi dati ad altre strutture sanitarie,
                    enti o istituzioni di ricerca, le verrà fornita specifica informativa
                    per l'acquisizione del relativo consenso al trattamento dei dati.
                </p>
                <p>
                    L'indicazione del nome, data di nascita, indirizzo, recapiti telefonici
                    è necessaria per la sua rintracciabilità. 
                </p>
                <p>
                    Il trattamento dei dati sarà svolto in forma cartacea o elettronica, 
                    con adozione delle misure di sicurezza previste dalla legge.
                    I suoi dati personali non saranno diffusi. I suoi dati saranno
                    comunicati esclusivamente nei casi e nei modi indicati dalla legge
                    e dai regolamenti ai soggetti previsti, in particolare, in attuazione
                    della normativa sulle malattie infettive trasmissibli. Lei può in ogni 
                    momento esercitare i diritti di cui all'art. 7 del Codice (accesso, 
                    integrazione, opposizione per motivi leggittimi) rivolgendosi al personale
                    indicato nella struttura trasfusionale. 
                </p>    
                <p>
                    Il mancato consenso al trattamento dei dati personali comporta l'esclusione
                    dalla donazione di sangue ed emocomponenti.
                </p> 
                <p>
                    Acquisite le informazioni relative al trattamento dei dati personali e sensibili:
                </p>
                    <div class="spunta">
                        <label><input type="checkbox" class="radio" name="acconsento" id="acc" value="true" <?php echo $checkedA ?>>Acconsento</label>
                        <label><input type="checkbox" class="radio" name="acconsento" id="non" value="false" <?php echo $checkedN ?>>Non acconsento</label>
                    </div>
                    <div class="error error-acc"></div>
            </div>
            <input type="hidden" id="struttura" name="struttura" value="<?php echo $codiceStruttura; ?>">
            <input type="hidden" id="giorno" name="giorno" value="<?php echo $giorno; ?>">
            <input type="hidden" id="mese" name="mese" value="<?php echo $mese; ?>">
            <input type="hidden" id="anno" name="anno" value="<?php echo $anno; ?>">
        
            <div class="submit">
                <input name="informativa-succ" id="informativa-succ" value="Successivo" class="submit-btn" type="submit"/>
            </div>
        </form>
    </body>
</html>