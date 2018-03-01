<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>
<head>

  <!-- Meta -->
  <!-- ================================================================================================================================ -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- ================================================================================================================================ -->

  <!-- Achats -->
  <!-- ================================================================================================================================ -->
  <title>Achats</title>
  <!-- ================================================================================================================================ -->


  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript"></script>
  <script src="js/achats.js"></script>
  <!-- Bootstrap core CSS -->
  <!-- ================================================================================================================================ -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- ================================================================================================================================ -->

  <!-- Custom fonts for this template -->
  <!-- ================================================================================================================================ -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
    rel="stylesheet" type="text/css">
  <!-- ================================================================================================================================ -->

  <!-- Custom fonts for this template -->
  <!-- ================================================================================================================================ -->
  <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic"
    rel="stylesheet" type="text/css">
  <!-- ================================================================================================================================ -->

  <!-- Custom styles for this template -->
  <!-- ================================================================================================================================ -->
  <link href="css/business-casual.css" rel="stylesheet">
  <link rel="icon" href="img/committee.png">
  <!-- ================================================================================================================================ -->

</head>
<!-- Script pour show hide -->
<!-- ================================================================================================================================ -->
<script>
  function creditPaiement() {
    var isActive = true;
    $("#creditcomplet").show();
    $("#numero").attr("disabled", false);
    $("#date").attr("disabled", false);
    $("#cv").attr("disabled", false);
    document.getElementById('identification').action = "carteAchat.php";
  }
  function paypalPaiement() {
    var isActive = false;
    document.getElementById('identification').action = "https://www.sandbox.paypal.com/cgi-bin/webscr";
    $("#creditcomplet").hide();
    $("#numero").attr("disabled", "disabled");
    $("#date").attr("disabled", "disabled");
    $("#cv").attr("disabled", "disabled");
  }
 </script>
<!-- ================================================================================================================================ -->

<body>




  <!-- Titre et adresse -->
  <!-- ================================================================================================================================ -->
  <div class="tagline-upper text-center text-heading text-shadow text-white mt-5 d-none d-lg-block">Comit&eacute de Loisirs d'Ivaco</div>
  <div class="tagline-lower text-center text-expanded text-shadow text-uppercase text-white mb-5 d-none d-lg-block">
    1040 COUNTY RD 17 | L'ORIGNAL, ON K0B 1K0 | 613-675-4671</div>
  <!-- ================================================================================================================================ -->

  <!-- Navigation -->
  <!-- ================================================================================================================================ -->
  <nav class="navbar navbar-expand-lg navbar-light bg-faded py-lg-4 row">
    <div class="container col-12">
      <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Ivaco Loisirs</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item px-lg-2">
            <a class="nav-link text-uppercase text-expanded" href="index.php">Accueil
            </a>
          </li>
          <li class="nav-item px-lg-2">
            <a class="nav-link text-uppercase text-expanded" href="nouvelles.php">Nouvelles</a>
          </li>
          <li class="nav-item active px-lg-2">
            <a class="nav-link text-uppercase text-expanded" href="achats.php">Achats</a>
            <span class="sr-only">(current)</span>
          </li>
          <li class="nav-item px-lg-2">
            <a class="nav-link text-uppercase text-expanded" href="activites.php">Activit&eacutes</a>
          </li>
          <li class="nav-item px-lg-2">
            <a class="nav-link text-uppercase text-expanded" href="contact.php">Contact</a>
          </li>
          <?php
          if(isset($_SESSION['admin_utilisateur'])) {
         ?>
         <li class="nav-item px-lg-2">
         <a class="nav-link text-uppercase text-expanded" href="connexionForm.php">Déconnexion</a>
         </a>
         </li>
         <?php
           }
           else {
             ?>
          <li class="nav-item px-lg-2">
           <a class="nav-link text-uppercase text-expanded" href="connexionForm.php">Connexion</a>
         </a>
         </li>
         <?php
           }
         ?>
          <li class="nav-item px-lg-2">
            <a class="nav-link text-uppercase text-expanded" href="admin.php">Admin</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- ================================================================================================================================ -->

  <!-- Container pour le formulaire d'achat -->
  <!-- ================================================================================================================================ -->
  <div class="container" align="center">

    <div class="bg-faded p-4 my-4">
      <hr class="divider">
      <h2 class="text-center text-lg text-uppercase my-0">
        <strong>Inscription</strong>
      </h2>
      <hr class="divider">
      <form id="identification" action="" onsubmit="return validerFormulaireAchat()" method="post">
        <div class="row">
          <div class="form-group col-lg-4">
            <label class="text-heading">Nom</label>          
            <?php
          if(isset($_SESSION['admin_utilisateur'])) {
         ?>
            <input type="text" class="form-control" value="Cédric Léveillé" id="nomText">
         <?php
           }
           else {
             ?>
            <input type="text" class="form-control" placeholder="Ex: Cédric Léveillé" id="nomText">
         <?php
           }
         ?>
          </div>
          <div class="form-group col-lg-4">
            <label class="text-heading"># de t&eacutel&eacutephone</label>
            
            <?php
          if(isset($_SESSION['admin_utilisateur'])) {
         ?>
            <input type="text" class="form-control" value="819-664-1549" id="telephoneText" name="telephoneText"
         <?php
           }
           else {
             ?>
            <input type="text" class="form-control" placeholder="123-456-7890" id="telephoneText" name="telephoneText"
         <?php
           }
         ?>>
          </div>
          <div class="form-group col-lg-4">
            <label class="text-heading">Activit&eacute</label>
            </br>
            <select name="dropDownMenu" style="height: 37px" id="dropDownMenu">
              <option value="Aucune">Aucune</option>
              <option value="theatre">Soir&eacutee th&eacute&acirctre - 1.00$</option>
              <option value="cabane">Cabane &agrave sucre - 1.00$</option>
              <option value="pigeon">Tirs au pigeon d'argile - 1.00$</option>
              <option value="golf">Tournoi de golf - 1.00$</option>
            </select>
          </div>

          <div class="form-group col-lg-12">
            <img src="img/mastercard.png" onclick="creditPaiement()" id="mastercard" />
            <img src="img/paypal2222.png" onclick="paypalPaiement()" id="paypal" />
          </div>


          <div id="paypal">
            <input type='hidden' value="1" name="amount" />
            <input name="currency_code" type="hidden" value="CAD" />
            <input name="shipping" type="hidden" value="0.00" />
            <input name="tax" type="hidden" value="0.00" />
            <input name="return" type="hidden" value="http://localhost/ProjetFinSessionWeb2/carteAchat.php" />
            <input name="cancel_return" type="hidden" value="http://localhost/ProjetFinSessionWeb2/index.php" />
            <input name="notify_url" type="hidden" value="http://localhost/ProjetFinSessionWeb2/carteAchat.php" />
            <input name="cmd" type="hidden" value="_xclick" />
            <input name="business" type="hidden" value="dalapoi@lacitec.on.ca" />
            <input name="item_name" type="hidden" value="TestAchat1" />
            <input name="no_note" type="hidden" value="1" />
            <input name="lc" type="hidden" value="FR" />
            <input name="bn" type="hidden" value="PP-BuyNowBF" />
            <input name="custom" type="hidden" value="ID_ACHETEUR" />
          </div>

          <div id="creditcomplet" class="container" align="center" id="showHide" style="display:none;">
            <div id="divBorder" class="form-group col-lg-2" align="center">
              <div class="panel panel-default credit-card-box" align="center">
                <div class="panel-heading display-table" align="center">
                  <div class="row display-tr">
                    <h3 class="panel-title display-td">D&eacutetails de paiement </h3>
                    <div class="display-td">
                    </div>
                  </div>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-xs-12">
                      <div class="form-group">
                        <label for="cardNumber">CARD NUMBER</label>
                        <div class="input-group">
                          <input id="numero" disabled type="tel" class="form-control" name="numero" placeholder="Valid Card Number" autocomplete="cc-number"
                            required autofocus />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <div class="form-group">
                        <label for="cardExpiry">
                          <span class="hidden-xs">EXPIRATION</span>
                          <span class="visible-xs-inline"></span> DATE</label>
                        <input id="date" disabled type="tel" class="form-control" name="cardExpiry" placeholder="MM / YY" autocomplete="cc-exp" required
                        />
                      </div>
                    </div>
                    <div class="col-xs-12">
                      <div class="form-group">
                        <label for="cardCVC">CV CODE</label>
                        <input id="cv" disabled type="tel" class="form-control" name="cardCVC" placeholder="CVC" autocomplete="cc-csc" required />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row" style="display:none;">
                  <div class="col-xs-12">
                    <p class="payment-errors"></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-6" style="text-align:center; margin:auto" align="center">
            <input id="Payer" value="Payer" class="subscribe btn btn-success btn-lg btn-block" type="submit" />
          </div>
          <div class="clearfix"></div>
        </div>
      </form>
    </div>
  </div>
  <!-- ================================================================================================================================ -->

  <!-- On distance le footer dans le bas de l'écran -->
  <!-- ================================================================================================================================ -->
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  <!-- ================================================================================================================================ -->

  <!-- Footer -->
  <!-- ================================================================================================================================ -->
  <footer class="bg-faded text-center py-5">
    <div class="container">
      <p class="m-0">Copyright &copy; Ivaco Loisirs 2017</p>
    </div>
  </footer>
  <!-- ================================================================================================================================ -->

  <!-- Fichier js pour le formulaire achat -->
  <!-- ================================================================================================================================ -->
  <!-- ================================================================================================================================ -->

  <!-- Bootstrap core JavaScript -->
  <!-- ================================================================================================================================ -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/popper/popper.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <!-- ================================================================================================================================ -->

</body>

</html>