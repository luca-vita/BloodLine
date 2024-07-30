<?php

    if (!isset($_SESSION['cf'])) {
        header("Location: ../login/indexUt.php");
        exit;
    }

    function stampa_per_cap($cap){

        $dbconn = pg_connect("host=localhost dbname=BloodLine user=postgres password=biar port=5432");
        if (!isset($cap)){
            $query = "SELECT distinct s.nome, s.codice as codstruttura, s.cap
                        FROM struttura s join evento e on s.codice=e.struttura WHERE s.cap = $1";
            $result = pg_query_params($dbconn, $query, array($_SESSION["cap"]));                            
        }
        else {
            $query = "SELECT distinct s.nome, s.codice as codstruttura, s.cap
                        FROM struttura s join evento e on s.codice=e.struttura WHERE s.cap = $1";
            $result = pg_query_params($dbconn, $query, array($cap));
        }

        if ($result) {
            if (pg_num_rows($result) == 0 && $cap != "") {
                echo '<div class="errore">Siamo spiacenti, non ci sono eventi disponibili a questo cap.</div>';
            }
            else {
                while ($line=pg_fetch_array($result)) {
                    echo "
                        <div class='accordion-item'>
                            <h2 class='accordion-header'>
                            <button class='accordion-button' type='button' data-bs-toggle='collapse' 
                                    data-bs-target='#_$line[codstruttura]' aria-expanded='false' aria-controls='collapseOne'>
                                    $line[nome] <span class='nascondi'>$line[codstruttura]</span>
                            </button>
                            </h2>
                            <div id='_$line[codstruttura]' class='accordion-collapse collapse' data-bs-parent='#accordionExample'>
                                <div class='accordion-body'>
                                    <form action='area personale strutture.php' name='sceglimese' method='GET'>
                                        <input type='hidden' id='struttura' name='struttura' value='$line[codstruttura]'/>
                                        <div class='mese'> Seleziona una data e procedi con la prenotazione </div>
                                            <div class='wrapper'>
                                                <header>   
                                                    <p class='current-' id='current-date-$line[codstruttura]'></p>
                                                    <div class='icons'>
                                                        <span id='prev-$line[codstruttura]' class='material-symbols-rounded'>chevron_left</span>
                                                        <span id='next-$line[codstruttura]' class='material-symbols-rounded'>chevron_right</span>
                                                    </div>
                                                </header>
                                                <div class='calendario'>
                                                    <ul class='settimana'>
                                                        <li>Lun</li>
                                                        <li>Mar</li>
                                                        <li>Mer</li>
                                                        <li>Gio</li>
                                                        <li>Ven</li>
                                                        <li>Sab</li>
                                                        <li>Dom</li>
                                                    </ul>
                                                    <ul class='giorni' id='giorni-$line[codstruttura]'></ul>
                                                </div>      
                                            </div>
                                </form>
                            </div>
                            </div>
                        </div>";
                
                }
            }
        }                            
        pg_close($dbconn);
    }

?>