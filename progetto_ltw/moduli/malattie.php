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

    //se torno indietro mi rimane segnato il flag acconsento
    $checked = '';

    if(isset($_GET['v'])) {
        if($_GET['v'] == "true") {
            $checked = 'checked';
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
    <form action="questionario.php" name="malattie" method="GET">
        <div class="malattie" id="malattie">
        <p class="fs-1 text-center">Modulo informativo malattie infettive</p>
                <p> La lettura attenta del presente materiale informativo, nel suo interesse e nell’interesse dei pazienti, le permetterà di
                    rispondere in modo CONSAPEVOLE E RESPONSABILE alle domande del QUESTIONARIO che le verrà somministrato prima
                    della sua donazione di sangue. In tal modo la sua donazione risulterà sicura per le persone alle quali essa sarà destinata.
                    I più aggiornati dati epidemiologici ci informano che in Europa stanno riemergendo alcune infezioni sessualmente
                    trasmesse; tra queste, particolare rilevanza assume l’HIV (virus responsabile dell’AIDS).
                </p>
                <p>
                    Sebbene in Italia l’incidenza dell’infezione da HIV sia in lenta ma costante diminuzione, ogni anno nuove diagnosi vengono
                    ancora registrate con maggiore incidenza nelle popolazioni a rischio, cioè le persone che si espongono a comportamenti a
                    rischio, soprattutto nella fascia d’età compresa tra 25 e 50 anni (fonte Centro operativo AIDS, CoA-ISS).
                    La trasmissione sessuale rappresenta la modalità principale di diffusione dell’HIV in Italia. Inoltre, una parte significativa di
                    persone scopre tardivamente di essere HIV positiva, quando è già in fase avanzata di malattia; questo può accadere perché
                    le persone non ritengono di essersi esposte ad un contatto a rischio di trasmissione dell’HIV.
                </p>
                <div class="sub-title">Le Modalità di trasmissione del virus HIV sono:</div>
                <ul>
                    <li>i rapporti sessuali non protetti da preservativo;</li>
                    <li>il passaggio del virus da madre HIV positiva a feto/neonato (durante la gravidanza, il parto, l’allattamento);</li>
                    <li>l’utilizzo di materiale per iniezione non monouso contaminato da sangue infetto.</li>
                </ul>
                Analoghe modalità di trasmissione sono responsabili della trasmissione della sifilide, di epatite B ed epatite C.
                <p class="fs-1">Comportamenti sessuali a rischio</p>
                    <p>
                    La trasmissione del virus avviene attraverso il contatto tra liquidi biologici infetti (secrezioni vaginali, liquido precoitale,
                    sperma, sangue) e mucose orali, vaginali ed anali, anche integre, durante i rapporti sessuali. Ulcerazioni e lesioni dei genitali
                    causate da altre malattie possono far aumentare il rischio di contagio. Sono quindi a rischio di trasmissione HIV e di altre
                    infezioni sessualmente trasmesse i rapporti sessuali (vaginali, anali, oro-genitali) non protetti dal preservativo, nonché il
                    contatto diretto tra genitali in presenza di secrezioni. L’uso corretto del preservativo protegge dalla trasmissione dell’HIV e
                    di altre infezioni sessualmente trasmesse. L’uso improprio o la rottura accidentale del preservativo riduce l’efficacia della
                    protezione.
                    </p>
                <p class="fs-1">Cosa succede dopo la sua donazione: i test per la sicurezza del sangue </p>
                    <p>
                    Per la sicurezza del paziente a cui è destinato, dopo ogni donazione, sul sangue donato vengono eseguiti i test per l’HIV,
                    l’epatite B, l’epatite C e la sifilide. Questi test sono assolutamente sicuri ed accurati, purché il donatore non si trovi nel
                    “periodo finestra” (cioè quel lasso di tempo che intercorre dal momento dell’infezione alla positivizzazione dei test di
                    laboratorio). Durante questo periodo il test può essere negativo pur essendo la persona infetta e quindi già in grado di
                    trasmettere l’infezione.
                    </p>
                    <p>
                    Le chiediamo, pertanto, di rispondere in modo consapevole e responsabile al questionario pre-donazione e qualora si
                    riconoscesse in uno dei comportamenti a rischio precedentemente illustrati, le raccomandiamo di sottoporsi al test per
                    l’HIV in una delle strutture sanitarie accreditate dedicate.
                    </p>
                    <p>
                    Per saperne di più sull’infezione da HIV, sulle altre infezioni sessualmente trasmesse e sulle strutture dove effettuare i
                    test la invitiamo a consultare il sito web del Ministero della Salute <a href="http://www.salute.gov.it/hiv-aids">http://www.salute.gov.it/hiv-aids</a>
                    vi troverà informazioni dettagliate e potrà usufruire di ulteriori strumenti informativi come il Telefono Verde AIDS e
                    Infezioni Sessualmente Trasmesse: 800 861061, che offre un servizio di counselling telefonico, anonimo e gratuito,
                    attivo dal lunedì al venerdì, dalle 13.00 alle 18.00
                    </p>
                    <p>
                    Le ricordiamo che tutte le informazioni che fornirà sono riservate e la stessa riservatezza è garantita in ogni momento del
                    percorso della donazione. Ulteriori chiarimenti potranno essere richiesti al personale sanitario del Servizio Trasfusionale e
                    dei Punti di Raccolta dove effettuerà la donazione. 
                    </p>
                    <p>
                    Il/la sottoscritto/a dichiara di aver visionato il materiale informativo in tutte le sue parti, di aver compreso
                    compiutamente le informazioni fornite in merito in merito alle malattie infettive trasmissibili con 
                    particolare riguardo alle epatiti B e C e all'AIDS.
                    </p>
                <div class="spunta">
                    <label><input type="checkbox" name="v" id="v" value="true" <?php echo $checked; ?>>Ho visionato il materiale informativo in tutte le sue parti</label>
                </div>
                <div class="error error-v"></div>
            </div>
            <input type="hidden" id="struttura" name="struttura" value="<?php echo $codiceStruttura; ?>">
            <input type="hidden" id="anno" name="anno" value="<?php echo $anno; ?>">
            <input type="hidden" id="mese" name="mese" value="<?php echo $mese; ?>">
            <input type="hidden" id="giorno" name="giorno" value="<?php echo $giorno; ?>">
            <input type="hidden" id="acconsento" name="acconsento" value="<?php echo $acconsento; ?>">

        <div class="submit">
        <input name="malattie-prec" id="malattie-prec" value="Precedente" class="submit-btn" type="submit"/>
        <input name="malattie-succ" id="malattie-succ" value="Successivo" class="submit-btn" type="submit"/>
        </div>
        </form> 
    </body>
</html>