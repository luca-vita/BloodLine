<?php

    session_start();
    if (!isset($_SESSION['codice'])) {
        header("Location: ../login/indexStr.php");
        exit;
    }

    function fetch_event_data($data){

        $dbconn = pg_connect("host=localhost port=5432 dbname=BloodLine user=postgres password=biar") 
        or die('Could not connect: ' . pg_last_error());

        if ($dbconn) {
            
            $codiceStruttura = $_SESSION['codice'];
            $query = "SELECT * from evento 
                      WHERE struttura = '$codiceStruttura' and data='$data'";

            $result = pg_query($dbconn, $query);
            if($result){
                $line = pg_fetch_array($result, null, PGSQL_ASSOC);
                if($line){
                    $query = "SELECT count(distinct donatore) as prenotati from prenotazione
                              WHERE evento = '$line[codice]'";
                    $result = pg_query($dbconn, $query);
                    if($result){
                        $line['prenotati'] = pg_fetch_array($result, null, PGSQL_ASSOC)['prenotati'];
                    }
                    else{
                        echo "Errore nella query";
                    }
                    return $line;
                }
                else{
                    echo "Nessun evento trovato";
                }
            }
            else{
                echo "Errore nella query";
            }

        }
        else{
            echo "Errore nella connessione al database";
        }
        return;

    }

?>