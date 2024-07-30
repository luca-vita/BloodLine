<?php
$err=$_GET['error'];
if ($err==1) {
    $msg = "Password errata.";
}
else if ($err==2) {
    $msg = "Email non registrata.";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0 minimum-scale=0.9, maximum-scale=1.1">
        <link rel=stylesheet href="../style.css" type="text/css">
        <script type="text/javascript" src="../index.js" defer></script>
        <script type="text/javascript" src="loginU.js" defer></script>
        <link rel=stylesheet href="style_login.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css" defer>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js" defer></script>
    </head>
    
    <body>
        
        <?php include('../assets/navbar.php'); ?>   

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <section class="login">
        <form action="loginUt.php" name="loginU" method="POST">
            <div class="title">Accedi</div>
            <div class="container">
                <div class="contact-form row">
                    <div class="form-field col-lg-6">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input name="inputEmail" id="email" class="input-text" type="email">
                        <label for="email" class="label">Email</label>
                        <div class="error error-email"></div>
                    </div>
                    <div class="form-field col-lg-6">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="inputPassword" id="password" class="input-text">
                        <label for="password" class="label">Password</label>
                        <div class="error error-password"></div>
                    </div>
                    <div class="form-field col-lg-12">
                        <input name="" id="" value="Log In" class="submit-btn" type="submit">
                    </div>
                    <div class="register">
                        <p>Non hai ancora un account? <a href="../signup/signUt.php">Registrati!</a></p>
                    </div>
                    </form>
                    <div>
                        <span><?php echo $msg; ?></span>
                    </div>
                <div>
            </div>
        </section>
        
        <?php include('../assets/footer.html'); ?>
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>



       