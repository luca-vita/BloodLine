<div class="topnav">
  <ul>
    <li class="topnav-logo"><b><a href='../home.php'>BloodLine</a></b></li>
    <li class="topnav-toggle"><ion-icon name="menu-outline"></ion-icon></li>
      <li class="topnav-links"><a href="../home.php">Home</a></li>
      <li class="topnav-links"><a href="../requisiti/requisiti.php">Requisiti</a></li>
      <li class="topnav-links"><a href="../info/info.php">Sulla Donazione</a></li>
      <li class="topnav-links"><a href="../faq/faq.php">Faq</a></li>
      <li class="topnav-links">
        <div class="login_button">
            <?php session_start(); ?>
            <?php if (!isset($_SESSION['nome'])) {
                   echo' <div class="login_button">
                            <button onclick="showPopUp()">Login</button>
                        </div>
                        <div class="popup" id="popup">
                            <div class="popup-header">
                                <div class="title">Che tipo di utente sei?</div>
                                <span class="close" onclick="closePopUp()">&times;</span>
                            </div>
                            <div class="popup-body">
                                <button>
                                    <img src="../immagini/donatore login.png">
                                    <a href="../login/indexUt.php">Donatore</a>
                                </button>
                                <button>
                                    <img src="../immagini/struttura login.png">
                                    <a href="../login/indexStr.php">Struttura</a>
                                </button>
                            </div>
                        </div>';
                } else {
                    if(isset($_SESSION['cf'])){
                        echo '<div class="login_button">
                            <button><a href="../profilo donatore/area personale.php">' .$_SESSION["nome"] . '</a></button>
                            </div>';
                    }
                    else if(isset($_SESSION['codice'])){
                        echo '<div class="login_button">
                            <button><a href="../profilo strutture/area personale strutture.php">' .$_SESSION["nome"] . '</a></button>
                            </div>';
                    }
            }
            ?>
        </div>
      </li>
  </ul>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</div>