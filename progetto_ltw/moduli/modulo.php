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
    $dbconn = pg_connect("host=localhost dbname=BloodLine user=postgres password=biar port=5432");
    $query = "SELECT nome FROM struttura WHERE codice = $1";
    $result = pg_query_params($dbconn, $query, array($codiceStruttura));
    $row = pg_fetch_row($result);
    $nomeStruttura = $row[0];
?>
<!DOCTYPE html>
<html>
    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../style.css" type="text/css">
        <link rel="stylesheet" href="modulo.css" type="text/css">
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js" defer></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="application/javascript" src="../index.js" defer></script>
        <script type="application/javascript" src="modulo.js" defer></script>
        <title>Modulo</title>
    
    </head>

    <body>

        <?php include('../assets/navbar.php'); ?>

        <div class="moduli">
            <div class="immagine">
                <img src="../immagini/modulo.png">
            </div>
            <div class="testo-moduli">
                <?php echo '<p>Per procedere alla prenotazione dell\'evento selezionato è necessario 
                seguire alcune semplici procedure, che richiederanno solo pochi minuti del tuo tempo. 
                Prima di tutto, sarà necessario prendere visione di alcuni moduli, che contengono importanti 
                informazioni sulla donazione. Non preoccuparti, ti guideremo passo dopo passo per completare 
                l\'intero processo senza alcuna difficoltà.</p>
                <p>Una volta che avrai completato la lettura dei moduli, dovrai procedere con la firma degli
                stessi, una volta arrivato in sede. Il personale in struttura sarà a tua disposizione per fornirti 
                ogni chiarimento di cui avrai bisogno, in modo da garantire una donazione sicura e confortevole.</p>
                <p>Troverai anche una sezione in cui ricontrollare i tuoi dati anagrafici e in caso fossero errati modificali.</p>
                <p>Ti ricordiamo che è di fondamentale importanza leggere attentamente tutte le informazioni 
                contenute nei moduli, senza tralasciare alcun dettaglio. In questo modo potrai partecipare 
                all\'evento in modo consapevole e responsabile, fornendo il tuo contributo per una
                causa importante.</p>
                <div class="file" id="inizio"><a href="informativa.php?struttura=' 
                . $codiceStruttura . '&mese=' . $mese . '&giorno=' 
                . $giorno  . '&anno=' . $anno . '">Clicca qui per procedere!</a></div>' ?>
            </div>
        </div>

        <?php include('../assets/footer.html'); ?>

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>