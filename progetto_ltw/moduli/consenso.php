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

    $acconsento = $_GET['acconsento'];
    $v = $_GET['v'];

    $nome = $_SESSION['nome'];
    $cognome = $_SESSION['cognome'];
    $datan = $_SESSION['datan'];
    $indirizzo = $_SESSION['indirizzo'];
    $cap = $_SESSION['cap'];
    $cf = $_SESSION['cf'];
    $luogon = $_SESSION['luogon'];
    $sesso = $_SESSION['sesso'];
    $nazionalita = $_SESSION['nazionalita'];
    $telefono = $_SESSION['telefono'];


    if(isset($_GET['questionario-prec'])){
        $dest = 'Location: malattie.php?acconsento=' . $acconsento . '&struttura=' . $codiceStruttura . '&giorno=' . $giorno . '&mese=' . $mese . '&anno=' . $anno . '&v=' . $v;
        header($dest);
    exit;
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
        <title>Consenso</title>
    
    </head>

    <body> 
        <form action="../scegliMese/prenotazione.php" name="consenso" id="consenso" method="GET">
            <div class="consenso" id="consenso">
                <h2>Consenso alla donazione di sangue intero, emocomponenti mediante aferesi, cellule staminali periferiche</h2>
                <p>
                   <?php echo 'Il/la sottoscritto/a ' . $nome . ' ' . $cognome.
                   ' nato/a a ' . $luogon . ' il ' . $datan .
                    ' codice fiscale ' . $cf . ' dichiara di ' ?>
                    <ul>
                        <li>aver preso visione del materiale informativo e di averne compreso il significato;</li>
                        <li>aver risposto in maniera veritiera al questionario amnestico, essendo stato correttamente informato sul significato delle domande in esso contenute;</li>
                        <li>essendo consapevole che le informazioni fornite sul proprio stato di salute e sui propri stili di vita 
                            costituiscono un elemnto fondamentale per la propria sicurezza e per la sicurezza di chi riceverà il sangue donato;</li>
                        <li>aver ricevuto una spiegazione dettagliata e comprensibile sulla procedura di donazione proposta;</li>
                        <li>essere stato posto in condizione di fare domande ed eventualmente di rifiutare il consenso;</li>
                        <li>non aver donato nell'intervallo minimo di tempo previsto per la procedura di donazione proposta;</li>
                        <li>sottoporsi volontariamente alla donazione e che nelle 24 ore successive non svolgerà attività o hobby rischiosi;</li>
                    </ul> 
                </p>
            </div>
            <input type="hidden" id="struttura" name="struttura" value="<?php echo $codiceStruttura; ?>"/>
            <input type="hidden" id="giorno" name="giorno" value="<?php echo $giorno; ?>"/>
            <input type="hidden" id="mese" name="mese" value="<?php echo $mese; ?>"/>
            <input type="hidden" id="anno" name="anno" value="<?php echo $anno; ?>"/>
            <input type="hidden" id="acconsento" name="acconsento" value="<?php echo $acconsento; ?>"/>
            <input type="hidden" id="v" name="v" value="<?php echo $v; ?>"/>

            <div class="submit">
            <input name="consenso-prec" id="consenso-prec" value="Precedente" class="submit-btn" type="submit"/>
            <input name="consenso-succ" id="consenso-succ" value="Prenota" class="submit-btn" type="submit"/>
            </div>
        </form>
    </body>
</html>