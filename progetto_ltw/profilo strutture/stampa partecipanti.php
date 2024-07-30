<?php

session_start();
if (!isset($_SESSION['codice'])) {
    header("Location: ../login/indexStr.php");
    exit;
}


function stampaschede($codice){
    $dbconn = pg_connect("host=localhost port=5432 dbname=BloodLine user=postgres password=biar") 
                    or die('Could not connect: ' . pg_last_error());

    if ($dbconn) {

        $query = "select d.* from prenotazione p join donatore d on p.donatore=d.cf where p.evento = '$codice' order by (d.cognome, d.nome)";
        $result = pg_query($dbconn, $query);
        if ($result) {
            while ($line=pg_fetch_array($result)) {
                    echo "
                        <div class='col-md-3'>
                            <div class='card' style='padding: 10px; display:flex; flex-direction:column; align-items:center;background-color: #d7d7f9; border: none; border-radius:30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)inset , 0 6px 20px 0 rgba(0, 0, 0, 0.19); '>
                           ";
                    if($line['fotoprofilo']!=null){
                                echo "<img src='../profilo donatore/$line[fotoprofilo]' class='img-fluid rounded-circle' alt='profile pic' style='width: 200px; height:200px; object-fit:cover;'>";
                    }else if($line['sesso']=='F'){
                                echo "<img src='../profilo donatore/fotoprofilo/femmina mora.jpg' class='img-fluid rounded-circle' alt='profile pic' style='width: 200px; height:200px; object-fit:cover;'>";
                    }else{
                                echo "<img src='../profilo donatore/fotoprofilo/biondo maschio.jpg' class='img-fluid rounded-circle' alt='profile pic' style='width: 200px; height:200px; object-fit:cover;'>";
                    }
                    echo "
                                    <h5 class='card-title'> Nome: $line[nome] $line[cognome]</h5>
                                    <div class='accordion' id='accordion'>
                                        <div class='accordion-item'>
                                            <h2 class='accordion-header'>
                                            <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapse-$line[cf]' aria-expanded='false' aria-controls='collapse-$line[cf]'>
                                                Info donatore
                                            </button>
                                            </h2>
                                            <div id='collapse-$line[cf]' class='accordion-collapse collapse' data-bs-parent='#accordionExample'>
                                                <div class='accordion-body'>
                                                    <strong>Cf:</strong> $line[cf];<br>
                                                    <strong>Nato il:</strong> $line[datan];<br>
                                                    <strong>Indirizzo:</strong> $line[indirizzo];<br>
                                                    <strong>Email:</strong> $line[email];<br>
                                                    <strong>Telefono:</strong> $line[telefono];
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>";
            }
        }
        else {
            die("Problema tecnico.");
        }
    }
}


?>