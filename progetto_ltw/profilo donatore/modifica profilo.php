
<?php
    session_start();
    if (!isset($_SESSION['cf'])) {
        header("Location: ../login/indexUt.php");
        exit;
    }
    $cf = $_SESSION['cf'];
    $nome = $_SESSION['nome'];
    $cognome = $_SESSION['cognome'];
    $email = $_SESSION['email'];
    $pswrd = $_SESSION['pswrd'];
    $dataNascita = $_SESSION['dataN'];
    $indirizzo = $_SESSION['indirizzo'];
    $cap = $_SESSION['cap'];
    $telefono = $_SESSION['telefono'];
    $sesso = $_SESSION['sesso'];
    $luogon = $_SESSION['luogon'];
    $nazionalita = $_SESSION['nazionalita'];
?>
<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <script type="text/javascript" src="../bootstrap/js/bootstrap.js" defer></script>
        <link rel="stylesheet" href="../style.css" type="text/css">
        <link rel="stylesheet" href="style_area_personale.css" type="text/css">
        <script type="application/javascript" src="modifica.js" defer></script>
    </head>

    <body>
        
        <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."navbar.php")?>

        <div class="modifica">Modifica Profilo</div>

        <div class="container pt-5 pb-5" style="padding: 1.5rem;" id="profile banner">
            <form action="modifica.php" method="POST" name="modifica" enctype="multipart/form-data">

                <div class="row shadow-1g pt-3 rounded-5" style="background-color: #fff;">
                    <div class = "col-lg-5" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                        <img src="./fotoprofilo" class="img-fluid rounded-circle" alt="Responsive image" style="width: 200px; height:200px; object-fit:cover;">
                        <div>
                            <input class="form-control form-control-lg" id="formFileLg" name="image" type="file" accept="image/*">
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="h1" style="padding: 1rem;">Profilo</div>
                        <table class="table">

                            <tr><th><i class="bi bi-person-circle"></i>Nome:</th><td><input type="text" class="form-control" name="nome" value="<?php echo $nome ?>"></td></tr>
                            <tr><th><i class="bi bi-person-square"></i>Cognome:</th><td><input type="text" class="form-control" name="cognome"  value="<?php echo $cognome ?>"></tr>
                            
                            <tr><th><i class="bi bi-gender-ambiguous"></i>Data di nascita:</th><td><input type="text" class="form-control" name="dataN"  value="<?php echo date("d/m/Y", strtotime($dataNascita)) ?>"></td></tr>
                            <td class="error error-datan"></td>
                            <tr><th><i class="bi bi-gender-ambiguous"></i>Luogo di nascita:</th><td><input type="text" class="form-control" name="luogon"  value="<?php echo $luogon ?>"></td></tr>
                            
                            <tr><th><i class="bi bi-gender-ambiguous"></i>Nazionalità:</th><td><input type="text" class="form-control" name="nazionalita"  value="<?php echo $nazionalita ?>"></td></tr>
                            
                            <tr><th><i class="bi bi-gender-ambiguous"></i>Sesso:</th><td><input type="text" class="form-control" name="sesso"  value="<?php echo $sesso ?>"></td></tr>
                            <td class="error error-sesso"></td>
                            <tr><th><i class="bi bi-geo-alt"></i>Indirizzo:</th><td><input type="text" class="form-control" name="indirizzo"  value="<?php echo $indirizzo ?>"></td></tr>
                            
                            <tr><th><i class="bi bi-geo-alt"></i>CAP:</th><td><input type="text" class="form-control" name="cap"  value="<?php echo $cap ?>"></td></tr>
                            <td class="error error-cap"></td>
                            <tr><th><i class="bi bi-geo-alt"></i>CF:</th><td><input type="text" class="form-control" name="cf"  value="<?php echo $cf ?>"></td></tr>
                            <td class="error error-cf"></td>
                            <tr><th><i class="bi bi-gender-ambiguous"></i>Telefono:</th><td><input type="text" class="form-control" name="telefono"  value="<?php echo $sesso ?>"></td></tr>
                            <td class="error error-telefono"></td>
                            <tr><th><i class="bi bi-envelope"></i>Email:</th><td><input type="email" class="form-control" name="email"  value="<?php echo $email ?>"></td></tr>
                  
                            <tr><th><i class="bi bi-envelope"></i>Password:</th><td><input type="text" class="form-control" name="pswrd"></td></tr>
                            <td class="error error-password"></td>
                            
                        </table>

                        <div class="submit">
                            <input name="" id="" value="Salva modifiche" class="submit-btn" type="submit"/>
                        </div>

                    </div>
                </div>
            </form>
        </div>

        <?php include('../assets/footer.html'); ?>  
    </body>
</html>