<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up Struttura</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0 minimum-scale=0.9, maximum-scale=1.1">
    </head>
    <body>
        <?php 
            $email = $_POST['email'];
            $dbconn = pg_connect("host=localhost dbname=BloodLine user=postgres password=biar port=5432");
            $query = "SELECT * FROM struttura where email = $1";
            $result = pg_query_params($dbconn, $query, array($email));
            if ($line=pg_fetch_array($result)) {
                header("Location: signStr.php?error=2");
            }
            else {
                $nome = $_POST['nome'];
                $tipologia = $_POST['tipologia'];
                $pswrd = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $cap = $_POST['cap'];
                $indirizzo = $_POST['indirizzo'];
                $max_prenotazioni = $_POST['max_prenotazioni'];
                $query2 = "INSERT into struttura (codice, email, nome, tipologia, password, cap, indirizzo) values(nextval('genera_codici_struttura'), $1, $2, $3, $4, $5, $6)";
                $result = pg_query_params($dbconn, $query2, array($email, $nome, $tipologia, $pswrd, $cap, $indirizzo));
                if ($result) {
                    header("Location: ../login/indexStr.php");
                }
                else {
                    header("Location: signStr.php?error=1");
                }
            }
            pg_close($dbconn);
        ?>
    </body>
</html>