<?php 

    require 'vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    //connecting to the db
    
    
    function allerta_emergenza($struttura_info, $event_info){

        $dbconn = pg_connect("host=localhost port=5432 dbname=BloodLine user=postgres password=biar") 
                or die('Could not connect: ' . pg_last_error());

        $message = "<div>
                        <h1 style='color:coral;'>Emergenza sangue<h1><br>
                        <h2 style='color:black;'>$struttura_info[nome] ha pubblicato una richiesta urgente di sangue nella tua zona.</h2>
                        <h2> C'è bisogno di te, <a href='http://localhost:3000/profilo%20donatore/area%20personale.php'>prenotati</a></h2><br>
                        <h2 style='color:black;'>Dettagli:</h2><br>
                    </div>
                    <table style='width:100%; text-align:left;'>
                        <tr style='background:#fee;'><th>Nome:</th><td>$struttura_info[nome]</td></tr>
                        <tr><th>Tipologia:</th><td>$struttura_info[tipologia]</td></tr>
                        <tr style='background:#fee;'><th>Email:</th></td>$struttura_info[email]</td></tr>
                        <tr><th>Indirizzo:</th><td>$event_info[indirizzo]</td></tr>
                        <tr style='background:#fee;'><th>CAP:</th><td>$struttura_info[cap]</td></tr>
                        <tr><th>Data:</th><td>$event_info[data]</td></tr>
                        <tr style='background:#fee;'><th>Ora:</th></td>$event_info[ora]</td></tr>
                    </table>";

        $mail = new PHPMailer(true);

        $mail->isSMTP();
        
        $mail->SMTPAuth = true;
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->Username = "vitaternaluca@gmail.com";
        $mail->Password = "wioujuckjqyqgsks";

        $mail->isHTML(true);
        $mail->Subject = "Allerta emergenza";
        $mail->Body = $message;
        
        $query = "SELECT email FROM donatore WHERE cap=$1";
        $result = pg_query_params($dbconn, $query, array($struttura_info['cap']));
        if($result){
            while($row = pg_fetch_assoc($result)){
                $mail->addAddress($row['email']);
                echo "email sent to ".$row['email']."<br>";
            }
            $mail->setFrom('example@gmail.com', 'Bloodline-'.$nome);
            $mail->send();
        }
        else{
            echo "Errore nella ricerca dei donatori";
        }
    }

?>