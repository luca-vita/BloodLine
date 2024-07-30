<?php 
            $email = $_POST['email'];
            $pswrd = $_POST['password'];

            $dbconn = pg_connect("host=localhost dbname=BloodLine user=postgres password=biar port=5432");
            $query = "SELECT * FROM struttura where email = $1";
            $result = pg_query_params($dbconn, $query, array($email));
            if ($result) {
                if (!($line = pg_fetch_array($result))) {
                    header("Location: indexStr.php?error=2"); // email non registrata
                }
                else {
                    $password = $line['password'];
                    if (password_verify($pswrd, $password)) {
                        $codiceStruttura = $line['codice'];
                        $nome = $line['nome'];
                        session_start();
                        $_SESSION['codice'] = $codiceStruttura;
                        $_SESSION['nome'] = $nome;
                        $_SESSION['tipologia'] = $line['tipologia'];
                        $_SESSION['email'] = $email;
                        $_SESSION['indirizzo'] = $line['indirizzo'];
                        $_SESSION['cap'] = $line['cap'];
                        $_SESSION['pswrd'] = $password;
                        header("Location: ../profilo strutture/area personale strutture.php");
                    } 
                    else {
                        header("Location: indexStr.php?error=1"); // password errata
                    }
                }
            }
            else {
                die("Problema tecnico.");
                }
            pg_close($dbconn);
?>