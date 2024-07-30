<?php

require 'mail/invio email.php';

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
        session_start();
            $data = $_POST['data'];
            $ora = $data." ".$_POST['ora'];
            $indirizzo = $_POST['indirizzo'];
            $emergenza = $_POST['emergenza'];
            $capienza = $_POST['capienza'];
            $codice = $_SESSION['codice'];
            $email = $_SESSION['email'];
            
            if(isset($_POST['emergenza'])){
                $capienza = null;
            }
            else{
                $emergenza = 'false';
            }
            
            $query = "INSERT INTO evento(struttura, codice, data, orario, emergenza, capienza, indirizzo ) values($1, nextval('genera_codici_evento'), $2, $3, $4, $5, $6)";
            $result = pg_query_params($dbconn, $query, array($codice, $data, $ora, $emergenza, $capienza, $indirizzo));
            if ($result) {
                if(isset($_POST['emergenza'])){
                    allerta_emergenza($_SESSION, $_POST);
                }
                header("Location: ./area personale strutture.php");
            }
            else {
                echo "<h1>Errore nella modifica</h1>";
            }
        
        pg_close($dbconn);
    }

?>