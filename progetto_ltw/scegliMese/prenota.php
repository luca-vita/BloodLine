<?php
    session_start();
    if (!isset($_SESSION['cf'])) {
        header("Location: ../login/indexUt.php");
        exit;
    }

    $giorno = $_GET['giorno'];
    $anno = $_GET['anno'];
    $mese = $_GET['mese'];
    $codiceStruttura = $_GET['struttura'];
    $dbconn = pg_connect("host=localhost port=5432 dbname=BloodLine user=postgres password=biar") 
                or die('Could not connect: ' . pg_last_error());
    $query = "SELECT nome, indirizzo FROM struttura WHERE codice = $1";
    $result = pg_query_params($dbconn, $query, array($codiceStruttura));
    if ($result) {
        $line = pg_fetch_array($result);
        $nomeStruttura = $line['nome'];
        $indirizzoStruttura = $line['indirizzo'];
    }

    if ($codiceStruttura == "" || $giorno == "" || $mese == "" || $anno == "") {
        header("Location: ../profilo donatore/area personale.php");
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
        
        <?php include('../assets/navbar.php'); ?>    

        <div class="prenotazione">
            <?php
            echo "<div class='testo'>Vuoi prenotarti per il giorno " . $giorno . "/" . $mese . "/" . $anno . 
            " presso la struttura " . $nomeStruttura . " in via " . $indirizzoStruttura . "?</div>";
            echo '<button><a href="../moduli/modulo.php?struttura=' . $codiceStruttura .'&mese=' . $mese . '&giorno=' . $giorno  . '&anno=' . $anno . '"> SI </a></button>';
            echo '<button><a href="../profilo donatore/area personale.php?struttura=' . $codiceStruttura . '&mese=' . $mese. '"> NO </a></button>';
            ?>
        </div>
            <?php include('../assets/footer.html'); ?>  
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>