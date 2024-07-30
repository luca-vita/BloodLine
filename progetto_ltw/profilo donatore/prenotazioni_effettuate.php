<?php session_start(); 
    $cf = $_SESSION['cf'];
    $sesso = $_SESSION['sesso'];
    if (!isset($_SESSION['cf'])) {
        header("Location: ../login/indexUt.php");
        exit;
    }
?>
<!DOCTYPE html>
<html>
    <!-- vanno aggiunti collegamenti alle pagine -->
    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../style.css" type="text/css">
        <link rel="stylesheet" href="style_area_personale.css" type="text/css">
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js" defer></script>
        <script type="application/javascript" src="../index.js" defer></script>
    
    </head>

    <body>
        <div class="prenotazioni">
            <div class="prenotazioni-body">
                <?php 
                    $dbconn = pg_connect("host=localhost dbname=BloodLine user=postgres password=biar port=5432");
                    $query = "SELECT e.codice as codevento, p.codice as codprenotazione, e.data, e.indirizzo, s.nome as struttura
                                FROM prenotazione as p join evento as e on p.evento = e.codice join struttura as s on e.struttura = s.codice
                                WHERE p.donatore = $1 ";
                    $result = pg_query_params($dbconn, $query, array($cf));
                    if($result){
                        if (pg_num_rows($result) == 0){
                            echo "Non hai ancora effettuato nessuna prenotazione";
                        }
                        
                        else{
                            while($line = pg_fetch_array($result)){
                                echo $line["codicevento"];
                                if ($sesso == 'M') {
                                    echo 'Sei prenotato per l\'evento ' .$line["codevento"] . ' del giorno ' .date("d/m/Y", strtotime($line["data"])) . 
                                    ' in ' .$line["indirizzo"] . ' presso ' .$line["struttura"] . ', il codice della prenotazione è ' 
                                    .$line["codprenotazione"] . '.<br><br>';
                                }
                                else if ($sesso == 'F') {
                                echo 'Sei prenotata per l\'evento ' .$line["codevento"] . ' del giorno ' .date("d/m/Y", strtotime($line["data"])) . 
                                ' in ' .$line["indirizzo"] . ' presso ' .$line["struttura"] . ', il codice della prenotazione è ' 
                                .$line["codprenotazione"] . '.<br><br>';
                                }
                            }
                        }
                    }
                    else{
                        echo "Si è verificato un errore";
                    }

                    pg_close($dbconn);
                ?>
            </div>
        </div>
    </body>
</html>