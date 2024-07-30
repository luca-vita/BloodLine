<?php
$err=$_GET['error'];
if ($err==1) {
    $msg = "La registrazione non è andata a buon fine, riprova.";
}
else if ($err==2) {
    $msg = "Email già presente, se sei già registrato effettua il <a href='../login/indexUt.php'>login</a>!";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel=stylesheet href="../style.css" type="text/css">
        <script type="text/javascript" src="../index.js" defer></script>
        <script type="text/javascript" src="signUt.js" defer></script>
        <link rel=stylesheet href="style_sign.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css" defer>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js" defer></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0 minimum-scale=0.9, maximum-scale=1.1">
        <title>Sign Up</title>
    </head>
    <body>
        
        <?php include('../assets/navbar.php'); ?>

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <section class="sign">
                <form action="signupUt.php" name="signupUt" method="POST">
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
                                    <ion-icon name="accessibility-outline"></ion-icon>
                                    <input name="cognome" id="cognome" class="input-text" type="text">
                                    <label for="cognome" class="label">Cognome</label>
                                    <div class="error error-cognome"></div>
                                </div>
                                <div class="form-field col-lg-6">
                                    <ion-icon name="finger-print-outline"></ion-icon>
                                    <input name="cf" id="cf" class="input-text" type="text">
                                    <label for="cf" class="label">Codice Fiscale</label>
                                    <div class="error error-cf"></div>
                                </div>
                                <div class="form-field col-lg-6">
                                    <input name="datan" id="datan" class="input-text" type="date">
                                    <label for="datan" class="label">Data di Nascita</label>
                                    <div class="error error-datan"></div>
                                </div>
                                <div class="form-field col-lg-6">
                                    <ion-icon name="pin-outline"></ion-icon>
                                    <input name="luogon" id="luogon" class="input-text" type="text">
                                    <label for="luogon" class="label">Luogo di nascita</label>
                                    <div class="error error-luogon"></div>
                                </div>
                                <div class="form-field col-lg-6">
                                    <ion-icon name="male-female-outline"></ion-icon>
                                    <div class="sesso">
                                        <input type="radio" name="sesso" id="sessoM" value="M" >M
                                        <input type="radio" name="sesso" id="sessoF" value="F" >F
                                    </div>
                                    <label for="sesso" class="label">Sesso</label>
                                    <div class="error error-sesso"></div>
                                </div>
                                <div class="form-field col-lg-6">
                                    <ion-icon name="albums-outline"></ion-icon>
                                    <input name="cap" id="cap" class="input-text" type="text">
                                    <label for="cap" class="label">CAP</label>
                                    <div class="error error-cap"></div>
                                </div>
                                <div class="form-field col-lg-6">
                                    <ion-icon name="home-outline"></ion-icon>
                                    <input name="indirizzo" id="indirizzo" class="input-text" type="text">
                                    <label for="indirizzo" class="label">Indirizzo</label>
                                    <div class="error error-indirizzo"></div>
                                </div>
                                <div class="form-field col-lg-6">
                                    <ion-icon name="flag-outline"></ion-icon>
                                    <input name="nazionalita" id="nazionalita" class="input-text" type="text">
                                    <label for="nazionalita" class="label">Nazionalità</label>
                                    <div class="error error-nazionalita"></div>
                                </div>
                                <div class="form-field col-lg-6">
                                    <ion-icon name="call-outline"></ion-icon>
                                    <input name="telefono" id="telefono" class="input-text" type="text">
                                    <label for="telefono" class="label">Telefono</label>
                                    <div class="error error-telefono"></div>
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
                </form>
                <div>
                    <span class="messaggio"><?php echo $msg; ?></span>
                </div>
        </section>
        <?php include('../assets/footer.html'); ?>  
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>