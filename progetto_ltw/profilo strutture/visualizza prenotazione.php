
<?php
    session_start();
    
    if (!isset($_SESSION['codice'])) {
        header("Location: ../login/indexStr.php");
        exit;
    }
    
    require("fetch_evento.php");
    require("stampa partecipanti.php");

?>

<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <script type="text/javascript" src="../bootstrap/js/bootstrap.js" defer></script>
        <script src="../jquery/jquery.js"></script>
        <link rel="stylesheet" href="../style.css" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
        <script type="application/javascript" src="../index.js" defer></script>
        <script type="application/javascript" src="./calendario.js" defer></script>

        <style>
            .circular-progress{
                position: relative;
                height:250px;
                width:250px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: conic-gradient(#ff0000 3.6deg, #ffffff 0deg);
;
            }
            .circular-progress::before{
                content: "";
                position: absolute;
                height: 210px;
                width: 210px;
                border-radius: 50%;
                background-color: white;
            }
            .progress-value{
                position: relative;
                font-size: 40px;
                font-weight: 600;
                color: red;
            }
            .text{
                font-size: 30px;
                font-weight: 500;
                color: black;
            }
        </style>
    </head>

    <body>
        
        <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."navbar.php")?>

        <?php $event_data = fetch_event_data($_GET['anno']."-".$_GET['mese']."-".$_GET['giorno']); ?>
        
        <div class="container pt-5 pb-5" id="profile banner">

            <div class="row">
                <h1>Dati <?php if($event_data['emergenza']=='t'){echo "Emergenza";}else{echo "Evento";} ?> del <?php echo date("d/m/Y", strtotime($event_data['data'])); ?></h1>
            </div>

            <div class="row shadow-1g pt-3 rounded-5" style="background-color: #fff; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class = "col-lg-5" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                        <?php if($event_data['emergenza']!='t'){
                            echo "
                        <div class='circular-progress'>
                            <span class='progress-value'>0%</span>
                        </div>

                        <span class='text'>Prenotati: <?php echo '$event_data[prenotati]/$event_data[capienza]';?></span>";
                        }
                        else{
                            echo '<img src="../immagini/siren.png" id="event_icon" class="image" alt="Responsive image" style="width: 200px; height:200px; object-fit:cover;">';
                        }?>
                </div>
                <script>
                    var prenotati = <?php echo $event_data['prenotati'] ?>;
                    var capienza = <?php echo $event_data['capienza'] ?>;
                    var percentuale = Math.round((prenotati / capienza) * 100);
                    let progressValue = document.querySelector(".progress-value");
                    let circularProgress = document.querySelector(".circular-progress");

                    let progressStartValue = 0;
                    let progressEndValue = percentuale;
                    let speed = 20;

                    let progress = setInterval(() => {
                        progressValue.textContent = `${progressStartValue}%`;
                        circularProgress.style.background = `conic-gradient(#ff0000 ${progressStartValue * 3.6}deg, #fff 0deg)`;
                        if (progressStartValue == progressEndValue) {
                            clearInterval(progress);
                        }
                        progressStartValue++;
                    }, speed);
                </script>

                <div class="col-lg-7">
                    <div class="h1">Evento</div>
                    <table class="table">
                        <tr><th><i class="bi bi-person-circle"></i>Codice:</th><td><?php echo $event_data["codice"]; ?></td></tr>
                        <tr><th><i class="bi bi-person-square"></i>Data e Ora:</th><td><?php echo date("d/m/Y", strtotime($event_data['data'])); ?></td></tr>                        
                        <tr><th><i class="bi bi-envelope"></i>Email:</th><td><?php echo $_SESSION["email"] ?></td></tr>
                        <tr><th><i class="bi bi-geo-alt"></i>Indirizzo:</th><td><?php echo $event_data["indirizzo"] ?></td></tr>
                        <tr><th><i class="bi bi-geo-alt"></i>CAP:</th><td><?php echo $_SESSION["cap"] ?></td></tr>
                        <tr><th><i class="bi bi-geo-alt"></i>Capienza:</th><td><?php echo $event_data["capienza"] ?></td></tr>
                        <tr><th><i class="bi bi-geo-alt"></i>Emergenza:</th><td><?php if($event_data["emergenza"]=='t') echo "Sì"; else echo "No"; ?></td></tr>

                    </table>
                </div>
            </div>
        </div>

        <div class="container pt-5 pb-5" id="profile banner">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                <?php stampaschede($event_data["codice"]); ?>
            </div>
        </div>

        <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."footer.html")?>

    </body>

</html>