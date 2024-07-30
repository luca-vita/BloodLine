<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../home.php");
}
else {
    $dbconn = pg_connect("host=localhost port=5432 dbname=BloodLine user=postgres password=biar") 
                or die('Could not connect: ' . pg_last_error());
}
?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <?php 
            if($dbconn){
                $email = $_POST['email'];
                $query = "SELECT * FROM donatore where email = $1";
                $result = pg_query_params($dbconn, $query, array($email));
                if ($tupla = pg_fetch_array($result, null, PGSQL_ASSOC)) {
                    header("Location: signUt.php?error=2");
                }
                else {
                    $nome = $_POST['nome'];
                    $cognome = $_POST['cognome'];
                    $pswrd = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $dataN = $_POST['datan'];
                    $cf = $_POST['cf'];
                    $indirizzo = $_POST['indirizzo'];
                    $cap = $_POST['cap'];
                    $nazionalita = $_POST['nazionalita'];
                    $telefono = $_POST['telefono'];
                    $sesso = $_POST['sesso'];
                    $luogon = $_POST['luogon'];
                    $query2 = "INSERT INTO donatore(email, nome, cognome, password, datan, cf, indirizzo, cap, luogon, sesso, telefono, nazionalita) VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11, $12)";
                    $result = pg_query_params($dbconn, $query2, array($email, $nome, $cognome, $pswrd, $dataN, $cf, $indirizzo, $cap, $luogon, $sesso, $telefono, $nazionalita));
                    if ($result) {
                        header("Location: ../login/indexUt.php");
                    }
                    else {
                        header("Location: signUt.php?error=1");
                    }
                }
                pg_close($dbconn);
            }
        ?>
    </body>
</html>