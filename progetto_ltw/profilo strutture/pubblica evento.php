<?php

session_start();
    if (!isset($_SESSION['codice'])) {
        header("Location: ../login/indexStr.php");
        exit;
    }
$anno = $_GET['anno'];
$mese = $_GET['mese'];
$giorno = $_GET['giorno'];
$data = $giorno . "/" . $mese . "/" . $anno . "";
$datapsql = $anno . "-" . $mese . "-" . $giorno . "";

?>
<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <script type="text/javascript" src="../bootstrap/js/bootstrap.js" defer></script>
        <link rel="stylesheet" href="../style.css" type="text/css">
        <link rel="stylesheer" href="./style_area_personale.css" type="text/css">
        <link rel="stylesheet" href="pubblica evento.css" type="text/css">
    </head>

    <body>
        
        <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."navbar.php")?>

        <div class="row">
            <div class="col-md-12" style="padding-left: 3em">
                <h1>Inserisci i dettagli dell'evento</h1>
            </div>
        </div>
        
        <div class="container pt-5 pb-5" id="profile banner">

        <form action="pubblica.php" method="POST" name="modifica">

            <div class="row shadow-1g p-3 rounded-5" style="background-color: #fff; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <div class = "col-lg-5" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    <img src="../immagini/normal.png" id="event_icon" class="image" alt="Responsive image" style="width: 200px; height:200px; object-fit:cover;">
                    <div class="form-check form-switch pt-3">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="emergenza">
                        <label class="form-check-label" for="flexSwitchCheckDefault"><bold>Emergenza</bold></label>
                    </div> 
                    <script>
                        const switchButton = document.getElementById('flexSwitchCheckDefault');
                        const image = document.getElementById('event_icon');
                        
                        switchButton.addEventListener('change', function() {
                            if (switchButton.checked) {
                                image.classList.add('rotate'); // add rotation class
                                setTimeout(function() {
                                    image.src = "../immagini/siren.png";
                                    image.classList.remove('rotate'); // remove rotation class
                                }, 400); // wait for rotation to complete
                            } else {
                                image.classList.add('rotate'); // add rotation class
                                setTimeout(function() {
                                    image.src = "../immagini/normal.png";
                                    image.classList.remove('rotate'); // remove rotation class
                                }, 400); // wait for rotation to complete
                            }
                        });
                    </script>
                </div>

                <div class="col-lg-7">
                    <div class="h1">Evento</div>

                    <table class="table">
                        <input type="hidden" id="data" name="data" value="<?php echo $datapsql;?>">
                        <tr><th><i class="bi bi-person-circle"></i>Data:</th><td><input type="text" class="form-control" name="dataIt" value="<?php echo $data;?>" readonly></td></tr>
                        <tr><th><i class="bi bi-person-square"></i>Orario:</th><td><input class="form-control" id="timeStandard" name="ora" type="time" step="60"></td></tr>
                        <tr><th><i class="bi bi-envelope"></i>Capienza:</th><td><input min="1" type="text" id="typeNumber" class="form-control" name="capienza"></td></tr>
                        <tr><th><i class="bi bi-geo-alt"></i>Indirizzo:</th><td><input type="text" class="form-control" value="<?php echo $_SESSION['indirizzo']?>" name="indirizzo"></td></tr>
                    </table>
                    <div class="login_button">
                        <button name="" id="" class="submit-btn" type="submit">Salva e pubblica</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
        <?php include('../assets/footer.html'); ?>  
    </body>
</html>