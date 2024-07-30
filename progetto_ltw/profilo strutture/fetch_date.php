<?php

    session_start();
    if (!isset($_SESSION['nome'])) {
        header("Location: ../login/indexStr.php");
        exit;
    }

    $dbconn = pg_connect("host=localhost port=5432 dbname=BloodLine user=postgres password=biar") 
    or die('Could not connect: ' . pg_last_error());

    if ($dbconn) {
        $struttura = $_GET['struttura'];

        $queryGiorni = "SELECT e.data AS dataP
                        FROM evento as e
                        WHERE e.struttura = $1";

        $resultGiorni = pg_query_params($dbconn, $queryGiorni, array($struttura));
        $giorni = array();
        while ($line = pg_fetch_array($resultGiorni, null, PGSQL_ASSOC)) {
            $giorni[] = $line['datap'];
        }

        //stampa codifica json dell'array giorniPieni";
        echo json_encode($giorni);
        exit();
    }
?>  