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

    $data = $giorno . "/" . $mese . "/" . $anno . "";
    $datapsql = $anno . "-" . $mese . "-" . $giorno . "";
    $cfutente = $_SESSION['cf'];
    $nome = $_SESSION['nome'];
    $cognome = $_SESSION['cognome'];
    $datan = $_SESSION['datan'];
    $email = $_SESSION['email'];
    $luogon = $_SESSION['luogon'];
    $indirizzo = $_SESSION['indirizzo'];
    $cap = $_SESSION['cap'];
    $sesso = $_SESSION['sesso'];
    $nazionalita = $_SESSION['nazionalita'];
    $telefono = $_SESSION['telefono'];
    $acconsento = $_GET['acconsento'];
    $v = $_GET['v'];

    if(isset($_GET['consenso-prec'])){
        $dest = 'Location: ../moduli/questionario.php?acconsento=' . $acconsento . '&struttura=' . $codiceStruttura . 
                '&codiceEvento=' . $codiceEvento . '&giorno=' . 
                $giorno . '&mese=' . $mese . '&anno=' . $anno . '&v=' . $v . '&luogon=' . $luogon . '&sesso=' . 
                $sesso . '&nazionalita=' . $nazionalita . '&telefono=' . $telefono;
        header($dest);
        exit;
    }
?>
<!DOCTYPE html>
<html>
    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../style.css" type="text/css">
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js" defer></script>
        <script type="application/javascript" src="../index.js" defer></script>
        <script type="application/javascript" src="../profilo donatore/calendario.js" defer></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </head>

    <body>
        <?php

            include('../assets/navbar.php');

                $dbconn = pg_connect("host=localhost dbname=BloodLine user=postgres password=biar port=5432");
                $queryCodiceEvento = "SELECT e.codice as codice, s.nome as nomestruttura 
                                    FROM evento as e join struttura as s on e.struttura = s.codice
                                     WHERE struttura = $1 and data = $2";
                $resultCodiceEvento = pg_query_params($dbconn, $queryCodiceEvento, array($codiceStruttura, $datapsql));
                $row = pg_fetch_assoc($resultCodiceEvento);
                $codiceEvento = $row['codice'];
                $nomeStruttura = $row['nomestruttura'];
                //prendo donatore ed evento dalle prenotazioni, se già esiste la combinazione messaggio sei già prenotato
                $queryControllo = "SELECT * FROM prenotazione WHERE donatore = $1 and evento = $2";
                $resultControllo = pg_query_params($dbconn, $queryControllo, array($cfutente, $codiceEvento));
                if (pg_num_rows($resultControllo) > 0) {
                    echo '<div class="prenota"><div class="title">Sei già prenotato per questo evento!</div>';
                    echo '<div class="testo">Clicca <a href="../profilo donatore/area personale.php">qui</a> per tornare al tuo profilo</div></div>';
                    exit;
                }
                
                $query = "INSERT into prenotazione(codice, donatore, evento) values(nextval('genera_codici_prenotazione'), $1, $2)";

                $result = pg_query_params($dbconn, $query, array($cfutente, $codiceEvento));
                if ($result) {
                    echo '<div class="prenota"> <div class="title">Prenotazione effettuata con successo!</div>';
                    echo '<div class="testo">Ti sei prenotato per il giorno ';
                    echo  $data . ' presso la struttura ' . $nomeStruttura . ' per l\'evento ' . $codiceEvento . '</div></div>';                       
                    echo '<div class="profilo">Clicca <a href="../profilo donatore/area personale.php">qui</a> per tornare al tuo profilo</div>';
                }
                else {
                    echo '<div class="prenota"><div class="title">La prenotazione non è andata a buon fine!</div>';
                    echo '<div class="testo">Clicca <a href="../profilo donatore/area personale.php">qui</a> per riprovare.</div></div>';
                }
            pg_close($dbconn);

            include('../assets/footer.html');
        ?>
    </body>
</html>
