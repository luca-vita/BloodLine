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

    if(isset($_GET['malattie-prec'])){
            $dest = 'Location: informativa.php?acconsento=' . $acconsento . '&struttura=' . $codiceStruttura . '&giorno=' . $giorno . '&mese=' . $mese . '&anno=' . $anno;
            header($dest);
        exit;
    }

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
    $email = $_SESSION['email'];

    $v = $_GET['v'];
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
        <title>Questionario</title>
    
    </head>

    <body>
    <form action="consenso.php" name="questionario" id="questionario" method="GET">
        <div class="questionario" id="quest">
            <div class="titolo">Riepilogo Dati</div>
                <div class="f">
                    <div name="cognome" id="cognome" class="dati"><b>Cognome</b> <?php echo $cognome ?></div>
                </div>
                <div class="f">
                    <div name="nome" id="nome" class="dati"><b>Nome</b> <?php echo $nome ?></div>
                </div>
                <div class="f">
                    <div name="luogon" id="luogon" class="dati"><b>Luogo di Nascita</b> <?php echo $luogon ?></div>
                </div>
                <div class="f">
                    <div name="datan" id="datan" class="dati"><b>Data di Nascita</b> <?php echo $datan ?></div>
                </div>
                <div class="f">
                    <div name="nazionalita" id="nazionalita" class="dati"><b>Nazionalità</b> <?php echo $nazionalita?></div>
                </div>
                <div class="f">
                    <div name="indirizzo" id="indirizzo" class="dati"><b>Indirizzo</b>  <?php echo $indirizzo?></div>
                </div>
                <div class="f">
                    <div name="cap" id="cap" class="dati"><b>Cap</b>  <?php echo $cap?></div>
                </div>
                <div class="f">
                    <div name="telefono" id="telefono" class="dati"><b>Telefono</b>  <?php echo $telefono?></div>
                </div>
                <div class="f">
                    <div name="email" id="email" class="dati"><b>Email</b>  <?php echo $email?></div>
                </div>
                <div class="f">
                    <div name="cf" id="cf" class="dati"><b>Codice Fiscale</b>  <?php echo $cf?></div>
                </div>
                <input type="hidden" id="struttura" name="struttura" value="<?php echo $codiceStruttura; ?>">
                <input type="hidden" id="giorno" name="giorno" value="<?php echo $giorno; ?>">
                <input type="hidden" id="mese" name="mese" value="<?php echo $mese; ?>">
                <input type="hidden" id="anno" name="anno" value="<?php echo $anno; ?>">
                <input type="hidden" id="acconsento" name="acconsento" value="<?php echo $acconsento; ?>">
                <input type="hidden" id="v" name="v" value="<?php echo $v; ?>">
        </div>
            <div class="profilo">Se i dati non dvessero essere corretti <a href="../profilo donatore/modifica profilo.php">clicca qui</a> per modificarli.</div>
            <div class="submit">
            <input name="questionario-prec" id="questionario-prec" value="Precedente" class="submit-btn" type="submit"/>
            <input name="questionario-succ" id="questionario-succ" value="Successivo" class="submit-btn" type="submit"/>
            </div>
        </form>
    </body>
</html>