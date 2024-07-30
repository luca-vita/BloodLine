<?php

    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        header("Location: /");
    }
        $dbconn = pg_connect("host=localhost port=5432 dbname=BloodLine user=postgres password=biar") 
                    or die('Could not connect: ' . pg_last_error());

    if($dbconn){
        session_start();
        
        $propic = $_SESSION['propic'];
        $email = $_SESSION['email'];
        $nome = $_SESSION['nome'];
        $cognome = $_SESSION['cognome'];
        $pswrd = $_SESSION['pswrd'];
        $dataN = $_SESSION['datan'];
        $cf = $_SESSION['cf'];
        $luogon = $_SESSION['luogon'];
        $nazionalita = $_SESSION['nazionalita'];
        $telefono = $_SESSION['telefono'];
        $sesso = $_SESSION['sesso'];
        $indirizzo = $_SESSION['indirizzo'];
        $cap = $_SESSION['cap'];

        if (isset($_FILES['image']) && $_FILES['image']['error']==0){
            $upload_dir = './fotoprofilo/';
            $temp_file = $_FILES['image']['tmp_name'];
            $propic = $upload_dir . uniqid().  $_FILES['image']['name'];
            move_uploaded_file($temp_file, $propic);
        }
        if (!empty($_POST['email']))
            $email = $_POST['email'];
        if (!empty($_POST['nome']))
            $nome = $_POST['nome'];
        if (!empty($_POST['cognome']))
            $cognome = $_POST['cognome'];
        if (!empty($_POST['pswrd']))
            $pswrd = password_hash($_POST['pswrd'], PASSWORD_DEFAULT);
        if (!empty($_POST['dataN']))
            $dataN = $_POST['dataN'];
        if (!empty($_POST['cf']))
            $cf = $_POST['cf'];
        if (!empty($_POST['indirizzo']))
            $indirizzo = $_POST['indirizzo'];
        if (!empty($_POST['cap']))
            $cap = $_POST['cap'];
        if (!empty($_POST['sesso']))
            $sesso = $_POST['sesso'];
        if (!empty($_POST['telefono']))
            $telefono = $_POST['telefono'];
        if (!empty($_POST['nazionalita']))
            $nazionalita = $_POST['nazionalita'];
        if (!empty($_POST['luogon']))
            $luogon = $_POST['luogon'];
        
        $query2 = "UPDATE donatore SET email=$1, password=$2, cap=$3, cf=$4, indirizzo=$5, nome=$6, cognome=$7, datan=$8, fotoprofilo=$9, nazionalita=$11, telefono=$12, luogon=$13, sesso=$14 where email = $10";
        $result = pg_query_params($dbconn, $query2, array($email, $pswrd, $cap, $cf, $indirizzo, $nome, $cognome, $dataN, $propic, $_SESSION['email'], $nazionalita, $telefono, $luogon, $sesso));
        if ($result) {
            $query = "SELECT * FROM donatore where email = $1";
            $result = pg_query_params($dbconn, $query, array($email));
            if ($result) {
                if ($line=pg_fetch_array($result))
                    $_SESSION['cf'] = $line['cf'];
                    $_SESSION['nome'] = $line['nome'];
                    $_SESSION['cognome'] = $line['cognome'];
                    $_SESSION['pswrd'] = $line['password'];
                    $_SESSION['dataN'] = $line['dataN'];
                    $_SESSION['indirizzo'] = $line['indirizzo'];
                    $_SESSION['cap'] = $line['cap'];
                    $_SESSION['email'] = $line['email'];
                    $_SESSION['propic'] = $line['fotoprofilo'];
                    $_SESSION['sesso'] = $line['sesso'];
                    $_SESSION['telefono'] = $line['telefono'];
                    $_SESSION['nazionalita'] = $line['nazionalita'];
                    $_SESSION['luogon'] = $line['luogon'];

                header("Location: ./area personale.php");
            }
        }
            else {
                echo "<h1>Errore nella modifica</h1>";
            }
        
        pg_close($dbconn);
    }

?>