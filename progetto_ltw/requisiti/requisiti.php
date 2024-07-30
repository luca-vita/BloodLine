<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js" defer></script>
        <link rel=stylesheet href="./requisiti.css" type="text/css">
        <script type="text/javascript" src="./requisiti.js" defer></script>
        <script type="application/javascript" src="../index.js" defer></script>
        <link rel=stylesheet href="../style.css" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

        <?php include('../assets/navbar.php'); ?>

        <div class="container-fluid p-1">
            <main>Requisiti per donare il sangue</main>
        </div>
            
        <div class="container pt-4 pb-4">
            <div class="row">
                <div class="col-lg-6 pt-4 d-flex justify-content-center align-items-center">
                    <img src="../immagini/donazione-cibi-si-no.png" class="img-cibi">
                </div>
                <div class="col-lg-6 pt-5">
                    <p class="fs-1 fw-bold text-center">COSA posso mangiare prima di donare?</p>
                    
                    <div class="liste">
                        <ul>
                            <li style="list-style-type: none;">cibi si</li>
                            <li>caffè</li> 
                            <li>the</li> 
                            <li>succo di frutta</li> 
                            <li>marmellata</li> 
                            <li>biscotti secchi</li> 
                            <li>biscotti salati</li> 
                            <li>miele</li> 
                            <li>fette biscottate</li> 
                        </ul>
                        <ul> 
                            <li style="list-style-type: none;">cibi no</li>
                            <li>latte</li> 
                            <li>latticini</li> 
                            <li>grassi</li> 
                            <li>patate</li> 
                            <li>cornetti</li> 
                            <li>burro</li> 
                            <li>uova</li> 
                            <li>salumi</li>
                        </ul></p>
                    </div>
                </div>
                    
            </div>
        </div>

        <div class="container pt-5 pb-4" id="container-quanto">
            <div class="row">

                <div class="col-lg-6 pt-4 order-lg-2 d-flex justify-content-center align-items-center">
                    <img src="../immagini/chi.png" class="img-fluid" alt="">
                </div>
                
                <div class="col-lg-6 pt-4 order-lg-1">
                    <p class="fs-1 fw-bold text-center">CHI può donare il sangue?</p>
                    <ul>
                        <li>Chi ha un'età compresa fra i 18 e i 65 anni.</li>
                        <li>Chi ha un peso non inferiore a 50 kg.</li>
                        <li>La pressione arteriosa sistolica deve essere compresa tra 110 e 180 mmHg e la pressione arteriosa diastolica tra 60 e 100 mmHg.</li>
                        <li>Il polso deve essere ritmico, regolare e le pulsazioni comprese tra 50 e 100/min.</li>
                        <li>Chi pratica allenamenti sportivi intensi può essere accettato anche con frequenza cardiaca inferiore.</li>
                        <li>Emoglobina non inferiore a 12,5 g/dL per le donne e a 13,5 d/dL per gli uomini.</li>
                    </ul>
                </div>
                
            </div>
        </div>

        <div class="container pt-4 pb-4" id="container-quanto">
            <div class="row">

                <div class="col-lg-7 pt-4 d-flex justify-content-center align-items-center">
                    <img src="../immagini/quando.png" class="img-fluid" alt="">
                </div>
                <div class="col-lg-5 pt-4">
                    <p class="fs-1 fw-bold text-center">QUANDO si può donare?</p>
                    <ul>
                        <li>I soggetti di sesso maschile possono donare fino a quattro volte l’anno con intervalli minimi di 90 giorni.</li> 
                        <li>Le donne, in età fertile, fino ad un massimo di due volte l’anno, anche loro con intervallo minimo di 90 giorni.</li> 
                        <li>Le donne non possono donare da due giorni prima del ciclo mestruale fino al quinto giorno dopo la fine del ciclo stesso.</li> 
                    </ul>
                </div>
            </div>
        </div>

             <div class="title-esclusione">Chi NON può donare il sangue?</div> 
             <div class="esclusione">
                <div class="esclusione-perm">
                    <div class="esclusione-perm-value">
                        <form action="">
                        <div class="header-perm">
                            <div class="title-perm" onclick="expandPerm()">Esclusione permanente</div>
                            <span class="close" onclick="expandPerm()">&times;</span>
                        </div> 
                            <div class="body-perm">
                                <ul>
                                    <li>malattie cardiovascolari (donatori con affezioni cardiovascolari in atto o pregresse ad accezione di anomalie congenite completamente curate);</li> 
                                    <li>malattie organiche del sistema nervoso centrale SNC (antecedenti di gravi malattie organiche del SNC);</li> 
                                    <li>neoplasie o malattie maligne (eccetto carcinoma in situ della cervice uterina dopo la rimozione della neoplasia);</li> 
                                    <li>malattie emorragiche (candidati donatori con antecedenti di coagulopatia congenita o acquisita);</li> 
                                    <li>crisi di svenimenti o convulsioni; affezioni gastrointestinali, epatiche, urogenitali, ematologiche, immunologiche, renali, metaboliche o respiratorie (candidati donatori con grave affezione attiva, cronica o recidivante);</li> 
                                    <li>epatite B, epatite C, epatite infettiva ad eziologia indeterminata, sieropositività per HIV, sifilide, babesiosi, lebbra, kala azar (leishmaniosi viscerale), tripanosoma Cruzi (malattia di Chagas);</li> 
                                    <li>malattia di Creutzfeldt-Jacob (candidati donatori che hanno soggiornato per più di 6 mesi cumulativi nel Regno Unito, dal 1980 al 1996; candidati che hanno ricevuto trasfusioni nel Regno Unito, dal 1980);</li> 
                                    <li>assunzione di ormoni ipofisari di origine umana (ormone della crescita o gonadotropine);</li> 
                                    <li>trapianto di cornea e/o dura madre; riceventi di xenotrapianti;</li>
                                    <li>instabilità mentale; alcoolismo cronico; assunzione di sostanze farmacologiche non prescritte (sostanze farmacologiche per via intramuscolare o endovenosa; stupefacenti; steroidi od ormoni a scopo di culturismo);</li> 
                                    <li>comportamento sessuale a rischio (candidati donatori il cui comportamento sessuale li espone ad alto rischio di contrarre gravi malattie infettive trasmissibili con il sangue).</li> 
                                    <br>
                                    <ion-icon name="information-circle-outline"></ion-icon><b>Per altre condizioni non citate, l’idoneità alla donazione spetta al medico responsabile della selezione.</b>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="esclusione-temp">
                    <div class="esclusione-temp-value">
                        <form action="">
                            <div class="header-temp">
                                <div class="title-temp" onclick="expandTemp()">Esclusione temporanea</div>
                                <span class="close" onclick="expandTemp()">&times;</span>
                            </div> 
                            <div class="body-temp">
                                <ul> 
                                    <li>per 2 settimane a decorrere dalla data della completa guarigione clinica di malattie infettive, affezioni di tipo influenzale e febbre maggiore di 38°C;</li> 
                                    <li>per 5 giorni dall’assunzione di farmaci antinfiammatori;</li> 
                                    <li>in caso di cure odontoiatriche: esclusione per 48 ore per cure di minore entità da parte di dentista o odontoigienista; esclusione per 1 settimana dopo estrazione, devitalizzazione ed interventi analoghi;</li> 
                                    <li>per 1 settimana da intervento chirurgico minore;</li> 
                                    <li>per 6 mesi dopo il parto; allergie a farmaci (dopo l’ultima esposizione con particolare riguardo per la penicillina);</li> 
                                    <li>per 4 mesi dall’ultima esposizione a rischio per: esame endoscopico con strumenti flessibili; spruzzo delle mucose con sangue o lesioni da ago; trasfusioni di emocomponenti o somministrazione di emoderivati; trapianto di tessuti o cellule di origine umana; tatuaggi o body piercing; agopuntura (se non eseguita da professionisti qualificati con ago “usa e getta”); persone a rischio dovuto a stretto contatto domestico con persone affette da epatite B; rapporti sessuali occasionali a rischio di trasmissione di malattie infettive; rapporti sessuali con persone infette o a rischio di infezione da HBV, HCV, HIV; intervento chirurgico maggiore;</li> 
                                    <li>per 3 mesi dal rientro da viaggi in zone endemiche per malattie tropicali;</li> 
                                    <li>in caso di vaccinazioni: 4 settimane per vaccini preparati con virus o batteri vivi attenuati; 48 ore per tutti gli altri tipi di vaccini;</li>
                                    <li>per 5 anni dopo la guarigione di glomerulonefrite acuta;</li>
                                    <li>per 2 anni dopo la guarigione di brucellosi, osteomielite, febbre Q, tubercolosi e febbre reumatica (in assenza di cardiopatia cronica);</li>
                                    <li>per 6 mesi dopo la guarigione di: toxoplasmosi, mononucleosi infettiva, M. di Lyme e interruzione di gravidanza;</li>
                                    <li>in caso di terapie: rinvio per un periodo variabile di tempo secondo il principio attivo dei medicinali prescritti e comunque considerando la malattia di base;</li>
                                    <li>in caso di malaria: esclusione dalla donazione di sangue intero per chi è vissuto in zona malarica nei primi 5 anni di vita o per 5 anni consecutivi di vita; emazie e piastrine per i 3 anni successivamente al ritorno dell’ultima visita in zona endemica a condizione che la persona resti asintomatica; è ammessa però la donazione di plasma, possono essere ammessi alla sola donazione di plasma anche gli individui con pregressa malaria 6 mesi dopo aver lasciato la zona di endemia e visitatori asintomatici di zone endemiche;</li>
                                    <li>in caso di Virus del Nilo Occidentale (WNV): 28 giorni dopo la risoluzione dei sintomi nel caso in cui il donatore abbia contratto tale infezione oppure 28 giorni dopo aver lasciato una zona con casi di malattia nell’uomo nell’anno in corso nei periodi di endemia.</li>
                                    <br>
                                    <ion-icon name="information-circle-outline"></ion-icon><b>Per altre condizioni non citate, l’idoneità alla donazione spetta al medico responsabile della selezione.</b>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        <?php include '../assets/footer.html'; ?>

    </body>
</html>
