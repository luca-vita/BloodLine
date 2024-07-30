<?php 

    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        header("Location: /");
    }
    else {
        $dbconn = pg_connect("host=localhost port=5432 dbname=BloodLine user=postgres password=biar") 
                    or die('Could not connect: ' . pg_last_error());
    }

    if ($dbconn) {
        $email = $_POST['inputEmail'];
        $pswrd = $_POST['inputPassword'];
        $q1 = "select * from donatore where email= $1";
        $result = pg_query_params($dbconn, $q1, array($email));
        if (!($line=pg_fetch_array($result, null, PGSQL_ASSOC))) {
            header("Location: indexUt.php?error=2"); // email non registrata
        }
        else {
            $password = $line['password'];
            if (password_verify($pswrd, $password)) {
                $cf = $line['cf'];
                $nome = $line['nome'];
                $cognome = $line['cognome'];
                $email = $line['email'];
                $datan = $line['datan'];
                $indirizzo = $line['indirizzo'];
                $cap = $line['cap'];
                $nazionalita = $line['nazionalita'];
                $telefono = $line['telefono'];
                $sesso = $line['sesso'];
                $luogon = $line['luogon'];
                $fotoprofilo = $line['fotoprofilo'];
                
                session_start();
                $_SESSION['cf'] = $cf;
                $_SESSION['nome'] = $nome;
                $_SESSION['cognome'] = $cognome;
                $_SESSION['pswrd'] = $password;
                $_SESSION['datan'] = $datan;
                $_SESSION['indirizzo'] = $indirizzo;
                $_SESSION['cap'] = $cap;
                $_SESSION['email'] = $email;
                $_SESSION['sesso'] = $sesso;
                $_SESSION['propic'] = $fotoprofilo;  
                $_SESSION['nazionalita'] = $nazionalita;
                $_SESSION['telefono'] = $telefono;
                $_SESSION['luogon'] = $luogon;  
                header("Location: ../profilo donatore/area personale.php");
                }
                else {
                    header("Location: indexUt.php?error=1");
                }
            }
        }
        else {
            die("Problema tecnico.");
        }
    pg_close($dbconn);
?> 