<!DOCTYPE html>
<html>
    <!-- vanno aggiunti collegamenti alle pagine -->
    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="./style.css" type="text/css">
        <script type="text/javascript" src="./bootstrap/js/bootstrap.min.js" defer></script>
        <script type="application/javascript" src="./index.js" defer></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="../bootstrap-5.2.3/dist/js/bootstrap.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    </head>

    <body>

        <?php include('./assets/navbar.php'); ?>

        <div class="hero-section">
            <div class="hero-grid">
                <div class="hero-text">
                    <h1>BloodLine</h1>
                    <p>La vita scorre nelle nostre vene - unisciti a BloodLine per condividerla.</p>
                </div>
                <div class="foto_copertina">
                    <img width="100%" src="https://thancguide.org/wp-content/uploads/2022/02/blood-work-illustration@3x.png">
                </div>
            </div>
        </div>
        <div class="instructions">
                <h1>Come funziona:</h1>
                <div class="instructions-content">
                    <div class="instructions-step" id="titoli">
                        <div class="donor-step"><h2>Sei un donatore</h2></div>
                        <div class="step-number"></div>
                        <div class="structure-step"><h2>Sei una struttura</h2></div> 
                    </div>
                    <div class="instructions-step">
                        <div class="donor-step">
                            <p>Accedi alla piattaforma come donatore</p>
                            <img src="../immagini/Mobile login-amico.png">
                        </div>
                        <div class="step-number">1</div>
                        <div class="structure-step">
                            <p>Accedi alla piattaforma come struttura</p>
                            <img src="../immagini/Doctors-amico.png">
                        </div> 
                    </div>
                    <div class="instructions-step">
                        <div class="donor-step">
                            <p>Cerca l'occasione giusta per te</p>
                            <img src="../immagini/Calendar-amico.png">
                        </div>
                        <div class="step-number">2</div>
                        <div class="structure-step">
                            <p>Pubblica un evento</p>
                            <img src="../immagini/Mobile Marketing-amico.png" alt="foto evento">
                        </div> 
                    </div>
                    <div class="instructions-step">
                        <div class="donor-step">
                            <p>Compila il form con i tuoi dati</p>
                            <img src="../immagini/Personal data-amico.png">
                        </div>
                        <div class="step-number">3</div>
                        <div class="structure-step">
                            <p>Compila il form con i dati dell'evento</p>
                            <img src="../immagini/Fill out-amico.png" alt="foto dati evento">
                        </div> 
                    </div>
                    <div class="instructions-step">
                        <div class="donor-step">
                            <p>Prenotati e salva delle vite</p>
                            <img src="../immagini/Blood donation-amico.png">
                        </div>
                        <div class="step-number">4</div>
                        <div class="structure-step">
                            <p>Potrai visualizzare chi si è prenotato al tuo evento</p>
                            <img src="../immagini/People search-amico.png">
                        </div> 
                    </div>
                </div>                  
            </div>

            <div class="container pt-5 pb-5" id="emails-banner">
                <div class="row">
                    <div class="col-lg-4 pt-5 ">
                        <p class="fs-1">Informazione costante</p>
                        <p class="fs-3">Con il sistema di email, i donatori registrati ricevono una notifica quando un evento di donazione viene postato nella loro area. Così le emergenze non saranno inattese</p>
                    </div>
                    <div class="col-lg-7 pt-5">
                        <img src="https://www.avisanguillara.it/wp-content/uploads/2021/01/Prenotazione-01-1-768x489.png" class="img-fluid">
                    </div>
                </div>
            </div>

            <div class="pt-5 pb-5">
                <div class="container pb-3">
                    <div class="row">
                        <div class="col-lg-8">
                            <img src="../immagini/registrati.png" alt="ready to save lives" class="img-fluid">
                        </div>
                        <div class="col-lg-4 pt-5" id="call-to-action-text">
                            <p class="fs-1"> Che aspetti?</p>
                            <p class="fs-3">Registrati subito e contribuisci alle preziose cure di qualcuno</p>
                            <div class="login_button">
                                <button onclick="location.href='../signup/signUt.php'">Registrati</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include('./assets/footer.html'); ?>    

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>

