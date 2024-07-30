<?php
    session_start();
    if (!isset($_SESSION['codice'])) {
        header("Location: ../login/indexStr.php");
        exit;
    }
    $codice = $_SESSION['codice'];
    $email = $_SESSION['email'];
    $nome = $_SESSION['nome'];
    $pswrd = $_SESSION['password'];
    $tipologia = $_SESSION['tipologia'];
    $indirizzo = $_SESSION['indirizzo'];
    $cap = $_SESSION['cap'];
?>
<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <script type="text/javascript" src="../bootstrap/js/bootstrap.js" defer></script>
        <link rel="stylesheet" href="../style.css" type="text/css">
        <link rel="stylesheer" href="style_area_personale.css" type="text/css">
        <script type="application/javascript" src="modifica.js" defer></script>
    </head>

    <body>
        
        <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."navbar.php")?>

        <div class="modifica" style="font-size: 3rem; margin-left: 1.5em;">Modifica Profilo</div>

        <div class="container d-flex justify-content-center" style="padding: 1.5rem; max-width: 1300px;" id="profile banner">
            <form action="modifica.php" method="POST" name="modifica" enctype="multipart/form-data">

            <div class="row shadow-1g pt-6 rounded-5" style="background-color: #fff; padding: 1.5rem">
                    <!--div class = "col-lg-5" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                        <img src="./fotoprofilo" class="img-fluid rounded-circle" alt="Responsive image" style="width: 200px; height:200px; object-fit:cover;">
                    <div>
                            <input class="form-control form-control-lg" id="formFileLg" name="image" type="file" accept="image/*">
                        </div>
                    </div-->

                        <div class="h1" style="padding: 1rem;">Profilo</div>
                        <table class="table" style="padding: 1.5rem;">

                            <tr><th><i class="bi bi-person-circle"></i>Nome:</th><td><input type="text" class="form-control" name="nome" value="<?php echo $nome ?>"></td></tr>
                            <tr><th><i class="bi bi-person-square"></i>Tipologia:</th><td><input type="text" class="form-control" name="tipologia"  value="<?php echo $tipologia ?>"></tr>
                            <tr><th><i class="bi bi-envelope"></i>Email:</th><td><input type="text" class="form-control" name="email"  value="<?php echo $email ?>"></td></tr>
                            <tr><th><i class="bi bi-geo-alt"></i>Password:</th><td><input type="text" class="form-control" name="pswrd"  value="<?php echo $pswrd ?>"></td></tr>
                            <td class="error error-password"></td>
                            <tr><th><i class="bi bi-geo-alt"></i>Indirizzo:</th><td><input type="text" class="form-control" name="indirizzo"  value="<?php echo $indirizzo ?>"></td></tr>
                            <tr><th><i class="bi bi-geo-alt"></i>CAP:</th><td><input type="text" class="form-control" name="cap"  value="<?php echo $cap ?>"></td></tr>
                            <td class="error error-cap"></td>
                            <tr><th><i class="bi bi-geo-alt"></i>Codice:</th><td><input type="text" class="form-control" name="codice"  value="<?php echo $codice ?>"></td></tr>
                            
                        </table>

                        <div class="submit" style="display: flex; flex-direction: row; justify-content: center; 
                                align-items: center; margin-top: 1.5em; margin-bottom: 1.5em;">
                            <input name="" id="" value="Salva modifiche" class="submit-btn" type="submit" 
                            style="background-color: #d1001f; color: #ffeeee; font-size: 1rem; line-height: 1.5rem;
                            font-weight: 700; cursor: pointer; text-align: center; padding: 8px 16px; border: none;
                            border-radius: 20rem; text-transform: uppercase;"/>
                        </div>
                </div>
            </form>
        </div>

        <?php include('../assets/footer.html'); ?>  
    </body>
</html>