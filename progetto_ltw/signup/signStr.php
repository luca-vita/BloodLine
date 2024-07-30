<?php
$err=$_GET['error'];
if ($err==1) {
    $msg = "La registrazione non è andata a buon fine, riprova.";
}
else if ($err==2) {
    $msg = "Struttura già registrata, effettua il <a href='../login/indexUt.php'>login</a>!";
}
?>

<!DOCTYPE html>
<html>
    <head>
    <link rel=stylesheet href="../style.css" type="text/css">
        <script type="text/javascript" src="../index.js" defer></script>
        <script type="text/javascript" src="signStr.js" defer></script>
        <link rel=stylesheet href="style_sign.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css" defer>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js" defer></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0 minimum-scale=0.9, maximum-scale=1.1">
    </head>
    <body>
        <?php include('../assets/navbar.php'); ?>
        </div>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <section class="sign">
                <form action="signupStr.php" name="signupStr" method="POST">
                    <div class="title">Registrati</div>
                        <div class="container">
                            <div class="contact-form row">
                                <div class="form-field col-lg-6">
                                    <ion-icon name="person-outline"></ion-icon>
                                    <input name="nome" id="nome" class="input-text" type="text">
                                    <label for="nome" class="label">Nome</label>
                                    <div class="error error-nome"></div>
                                </div>
                                <div class="form-field col-lg-6">
                                    <ion-icon name="home-outline"></ion-icon>
                                    <input name="indirizzo" id="indirizzo" class="input-text" type="text">
                                    <label for="indirizzo" class="label">Indirizzo</label>
                                    <div class="error error-indirizzo"></div>
                                </div>
                                <div class="form-field col-lg-6">
                                    <ion-icon name="albums-outline"></ion-icon>
                                    <input name="cap" id="cap" class="input-text" type="text">
                                    <label for="cap" class="label">CAP</label>
                                    <div class="error error-cap"></div>
                                </div>
                                <div class="form-field col-lg-6">
                                    <ion-icon name="business-outline"></ion-icon>
                                    <input name="tipologia" id="tipologia" class="input-text" type="text">
                                    <label for="tipologia" class="label">Tipologia</label>
                                    <div class="error error-tipologia"></div>
                                </div>
                                <div class="form-field col-lg-6">
                                    <ion-icon name="mail-outline"></ion-icon>
                                    <input name="email" id="email" class="input-text" type="email">
                                    <label for="email" class="label">Email</label>
                                    <div class="error error-email"></div>
                                </div>
                                <div class="form-field col-lg-6">
                                    <ion-icon name="lock-closed-outline"></ion-icon>
                                    <input name="password" id="password" class="input-text" type="password">
                                    <label for="password" class="label">Password</label>
                                    <div class="error error-password"></div>
                                </div>
                                <div class="form-field col-lg-6">
                                    <input name="" id="" value="Registrati" class="submit-btn" type="submit">
                                </div>
                            </div>
                        </div>
                <div>
                    <span class="messaggio"><?php echo $msg; ?></span>
                </div>
                </form>
        </section>
        
        <?php include '../assets/footer.html'; ?>
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>