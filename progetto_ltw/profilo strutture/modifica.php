<?php

    session_start();
    if (!isset($_SESSION['codice'])) {
        header("Location: ../login/indexStr.php");
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        header("Location: /");
    }
        $dbconn = pg_connect("host=localhost port=5432 dbname=BloodLine user=postgres password=biar") 
                    or die('Could not connect: ' . pg_last_error());

    if($dbconn){
            $email = $_POST['email'];
            $nome = $_POST['nome'];
            $tipologia = $_POST['tipologia'];
            $pswrd = $pswrd = password_hash($_POST['pswrd'], PASSWORD_DEFAULT);;
            $codice = $_POST['codice'];
            $indirizzo = $_POST['indirizzo'];
            $cap = $_POST['cap'];
            $query2 = "UPDATE struttura SET email=$1, password=$2, cap=$3,codice=$4, indirizzo=$5, nome=$6, tipologia=$7) where email = $8";
            $result = pg_query_params($dbconn, $query2, array($email, $pswrd, $cap, $codice, $indirizzo, $nome, $tipologia, $_SESSION('email')));
            if ($result) {
                $query = "SELECT * FROM struttura where email = $1";
                $result = pg_query_params($dbconn, $query, array($email));
                if ($result) {
                    if ($line=pg_fetch_array($result))
                        $_SESSION['codice'] = $line['codice'];
                        $_SESSION['nome'] = $line['nome'];
                        $_SESSION['tipologia'] = $line['tipologia'];
                        $_SESSION['pswrd'] = $line['password'];
                        $_SESSION['indirizzo'] = $line['indirizzo'];
                        $_SESSION['cap'] = $line['cap'];
                        $_SESSION['email'] = $line['email'];
                    header("Location: ../area personale.php");
                }
            }
            else {
                echo "<h1>Errore nella modifica</h1>";
            }
        
        pg_close($dbconn);
    }

?>