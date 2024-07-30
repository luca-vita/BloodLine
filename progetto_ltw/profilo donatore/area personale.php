
<?php
    session_start();
    if (!isset($_SESSION['cf'])) {
        header("Location: ../login/indexUt.php");
        exit;
    }
    $sesso = $_SESSION['sesso'];
    require("stampa strutture.php");
?>

<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <script type="text/javascript" src="../bootstrap/js/bootstrap.js" defer></script>
        <link rel="stylesheet" href="../style.css" type="text/css">
        <link rel="stylesheer" href="./style_area_personale.css" type="text/css">
        <script type="application/javascript" src="cercaCap.js" defer></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
        <link rel="stylesheet" href="cercaCap.css" type="text/css">
        <script type="application/javascript" src="./calendario.js" defer></script>
        <link rel="stylesheet" href="./style_calendario.css">
        <script type="application/javascript" src="../index.js" defer></script>

    </head>

    <body>
        
    <?php include('../assets/navbar.php'); ?>

        <div class="container pt-4 pb-4" id="profile banner">
            <div class="row">
                <div class="col-md-12">
                    <?php 
                        if($sesso=='M') echo "<h1>Benvenuto, ".$_SESSION["nome"]."</h1>";
                        else echo "<h1>Benvenuta, ".$_SESSION["nome"]."</h1>";
                    ?>
                </div>
            </div>
        </div>
        
        <div class="container pt-5 pb-5" id="profile banner">

            <div class="row shadow-1g p-3 rounded-5" style="background-color: #fff; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class = "col-lg-5" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    <img src= "<?php if($_SESSION['propic']==NULL && $_SESSION['sesso'] == 'F') 
                                    echo "./fotoprofilo/femmina mora.jpg";
                                    else if($_SESSION['propic']==NULL && $_SESSION['sesso'] == 'M') 
                                    echo "./fotoprofilo/biondo maschio.jpg";
                                    else
                                    echo $_SESSION['propic']?>" class="img-fluid rounded-circle" alt="Responsive image" style="width: 200px; height:200px; object-fit:cover;">
                    <div class="btn-group btn-group-lg mt-2" role="group" aria-label="Large button group">
                        <button type="button" class="btn btn-outline-danger"><a href="modifica profilo.php" style="text-decoration: none; color: red;">Modifica</a></button>
                        <button type="button" class="btn btn-outline-danger"><a href="elimina.php" style="text-decoration: none; color: red;">Elimina</button>
                        <button type="button" class="btn btn-outline-danger"><a href="logout.php" style="text-decoration: none; color: red;">Log Out</a></button>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="h1">Profilo</div>
                    <table class="table">
                        <tr><th><i class="bi bi-person-circle"></i>Nome:</th><td><?php echo $_SESSION["nome"] ?></td></tr>
                        <tr><th><i class="bi bi-person-square"></i>Cognome:</th><td><?php echo $_SESSION["cognome"] ?></td></tr>
                        <tr><th><i class="bi bi-gender-ambiguous"></i>Data di nascita:</th><td><?php echo $_SESSION["datan"] ?></td></tr>
                        <tr><th><i class="bi bi-gender-ambiguous"></i>Luogo di nascita:</th><td><?php echo $_SESSION["luogon"] ?></td></tr>
                        <tr><th><i class="bi bi-envelope"></i>Sesso:</th><td><?php echo $_SESSION["sesso"] ?></td></tr>
                        <tr><th><i class="bi bi-geo-alt"></i>Indirizzo:</th><td><?php echo $_SESSION["indirizzo"] ?></td></tr>
                        <tr><th><i class="bi bi-geo-alt"></i>CAP:</th><td><?php echo $_SESSION["cap"] ?></td></tr>
                        <tr><th><i class="bi bi-geo-alt"></i>Nazionalità:</th><td><?php echo $_SESSION["nazionalita"] ?></td></tr>
                        <tr><th><i class="bi bi-geo-alt"></i>CF:</th><td><?php echo $_SESSION["cf"] ?></td></tr>
                        <tr><th><i class="bi bi-envelope"></i>Email:</th><td><?php echo $_SESSION["email"] ?></td></tr>
                        <tr><th><i class="bi bi-geo-alt"></i>Telefono:</th><td><?php echo $_SESSION["telefono"] ?></td></tr>
                        
                    </table>
                </div>

            </div>
        </div>

        <div class="container pt-5 pb-5" id="event banner">
            <h1>Eventi disponibili nella tua zona</h1>
           
            <section>
            <div class="form-box">
                <div class="form-value">
                    <form name="cercaCap" id="cercaCap" method="GET">
                        <div class="cerca"> Inserisci il Cap per trovare una struttura vicina a te</div>
                        <div class="search-form row">
                                <div class="form-field">
                                    <ion-icon name="search-outline"></ion-icon>
                                    <input name="cap" id="cap" class="input-text" type="text">
                                    <div class="error error-cap"></div>
                                </div>
                                <div class="form-field">
                                    <input name="" id="submit" value="Cerca" class="submit-btn" type="submit">
                                </div>
                        </div>  

                    </form>
                    <hr>    
                </div>
                <div class="cerca"> Seleziona una struttura e vedi le disponibilità </div>
                    <div class='accordion' id='accordionPanelsStayOpenExample' style="height: 80vh; overflow: scroll">

                        <?php
                            stampa_per_cap($_GET['cap']);
                        ?>

                    </div>
                </div>
                <hr>  
                <div class="pre">
                <div id="pre">Visualizza le tue prenotazioni</div>
                </div>
                <p id="prenotazioni_effettuate"></p>
            </div>
        </section>
            
        </div>

        <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."footer.html")?>
        </div>

    </body>
</html>