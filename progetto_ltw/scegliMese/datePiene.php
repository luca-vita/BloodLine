<?php

    session_start();
    if (!isset($_SESSION['cf'])) {
        header("Location: ../login/indexUt.php");
        exit;
    }
    $codStruttura = $_GET['struttura'];
    if ($codStruttura == "") {
        header("Location: ../profilo donatore/area personale.php");
        exit;
    }

    $dbconn = pg_connect("host=localhost dbname=BloodLine user=postgres password=biar port=5432");
    $queryEventoPieno = "SELECT e.data AS datap, COUNT(*) AS num_prenotazioni, e.codice
                            FROM evento as e, prenotazione as p, struttura as s
                            WHERE e.emergenza = false and e.codice = p.evento
                                and s.codice = $1 and s.codice = e.struttura
                            GROUP BY e.data, e.codice
                            HAVING COUNT(*) = (SELECT capienza FROM evento WHERE codice = e.codice)";
    $resultEventoPieno = pg_query_params($dbconn, $queryEventoPieno, array($codStruttura));
    $eventoPieno = array();
    while ($line = pg_fetch_array($resultEventoPieno, null, PGSQL_ASSOC)) {
        $eventoPieno[] = $line['datap'];
    }
    //stampa codifica json dell'array giorniPieni
    echo json_encode($eventoPieno);
    exit();
?>  