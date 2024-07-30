<?php

    $dbconn = pg_connect("host=localhost port=5432 dbname=BloodLine user=postgres password=biar") 
                or die('Could not connect: ' . pg_last_error());

if($dbconn){
    session_start();
    $email = $_SESSION['email'];
    $query = "DELETE FROM struttura where email = $1";
    $result = pg_query_params($dbconn, $query, array($email));
    if ($result) {
        session_destroy();
        header("Location: ../login/indexStr.php");
    }
    else {
        echo "<h1>Errore nella cancellazione</h1>";
    }

    pg_close($dbconn);
}

?>