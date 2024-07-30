
<?php 
    session_start();
    if (!isset($_SESSION['codice'])) {
        header("Location: ../login/indexStr.php");
        exit;
    }
?>

<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js" defer></script>
        <script src="../jquery/jquery.js"></script>
        <link rel="stylesheet" href="../style.css" type="text/css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
        <script type="application/javascript" src="../index.js" defer></script>
        <script type="application/javascript" src="./calendario.js" defer></script>
        <link rel="stylesheer" href="./style_area_personale.css" type="text/css">
        <link rel="stylesheet" href="./style_calendario.css">
    </head>

    <body>
        
    <?php include('../assets/navbar.php'); ?>

        <div class="container pt-4 pb-4" id="profile banner">

            <div class="row">
                <div class="col-md-12">
                    <h1>Benvenuto, <?php echo $_SESSION["nome"] ?></h1>
                </div>
            </div>
    
            <div class="row shadow-1g pt-3 rounded-5" style="background-color: #fff; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class = "col-lg-5" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    <div class="btn-group btn-group-lg mt-2" role="group" aria-label="Large button group">
                        <button type="button" class="btn btn-outline-danger"><a href="modifica profilo.php" style="text-decoration: none; color: red;">Modifica</a></button>
                        <button type="button" class="btn btn-outline-danger"><a href="elimina.php">Elimina</a></button>
                        <button type="button" class="btn btn-outline-danger"><a href="../profilo donatore/logout.php" style="text-decoration: none; color: red;">Log Out</a></button>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="h1">Profilo</div>
                    <table class="table">
                        <tr><th><i class="bi bi-person-circle"></i>Nome:</th><td><?php echo $_SESSION["nome"] ?></td></tr>
                        <tr><th><i class="bi bi-person-square"></i>Tipologia:</th><td><?php echo $_SESSION["tipologia"] ?></td></tr>                        <tr><th><i class="bi bi-envelope"></i>Email:</th><td><?php echo $_SESSION["email"] ?></td></tr>
                        <tr><th><i class="bi bi-geo-alt"></i>Indirizzo:</th><td><?php echo $_SESSION["indirizzo"] ?></td></tr>
                        <tr><th><i class="bi bi-geo-alt"></i>CAP:</th><td><?php echo $_SESSION["cap"] ?></td></tr>
                        <tr><th><i class="bi bi-geo-alt"></i>Codice:</th><td><?php echo $_SESSION["codice"] ?></td></tr>
                    </table>
                </div>

            </div>
        </div>

        <div class="container d-flex flex-column justify-content-center align-items-center p-5" id="event banner">
            <h1>Gestisci gli eventi di donazione presso di te</h1>        
                
            <form action="area personale strutture.php" name="sceglimese" method="GET">
                <input type="hidden" id="struttura" name="struttura" value="<?php echo $_SESSION['codice']; ?>">
                    <div class="mese"> Seleziona una data e procedi con la pubblicazione dell'evento </div>
                        <div class="wrapper">
                            <header>   
                                <p class="current-date"></p>
                                <div class="icons">
                                    <span id="prev" class="material-symbols-rounded">chevron_left</span>
                                    <span id="next" class="material-symbols-rounded">chevron_right</span>
                                </div>
                            </header>

                            <div class="calendario">
                                <ul class="settimana">
                                    <li>Lun</li>
                                    <li>Mar</li>
                                    <li>Mer</li>
                                    <li>Gio</li>
                                    <li>Ven</li>
                                    <li>Sab</li>
                                    <li>Dom</li>
                                </ul>
                                <ul class="giorni"></ul>
                                
                            </div>      
                        </div>
                    </div>
            </form>
        </div>
        <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."footer.html")?>
    
    </body>

</html>
