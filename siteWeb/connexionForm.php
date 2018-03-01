<!DOCTYPE html>
<html lang="en">

<?php

    // On inclus notre fichier de connexion à la bdo
    // =============================================================================================
    include('DataLayer/BusinessLayer/connection.php');
    // =============================================================================================
    
    // On start la session
    // =============================================================================================
    session_start();
    // =============================================================================================
    
    // On fait certain si le user est deja login de le redirect tout de suite à sign out
    // =============================================================================================
    if(isset($_SESSION['admin_utilisateur'])) {
    header("location: deconnexionForm.php");
    } 
    // =============================================================================================
    
    // On recoit la requête (le login)
    // =============================================================================================
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Le username et password d'entré
        // *****************************************************************************************
        $utilisateur = mysqli_real_escape_string($db,$_POST['username']);
        $motdepasse = mysqli_real_escape_string($db,$_POST['password']); 
        // *****************************************************************************************
        
        // On selectionne le user selon les donnees entree et on fait la query, on rend la session
        // active si les donnees entrees sont bonne
        // *****************************************************************************************
        $query = "SELECT UserID FROM User WHERE Username = '$utilisateur' and Password = '$motdepasse'";
        $utilisateurSelect = mysqli_query($db,$query);
        $arrayUtilisateur = mysqli_fetch_array($utilisateurSelect,MYSQLI_ASSOC);
        $active = $arrayUtilisateur['active'];
        // *****************************************************************************************
        
        // Si le user etait un bon user, une session est active
        // *****************************************************************************************
        $sessionPourAdmin = mysqli_num_rows($utilisateurSelect);
        // *****************************************************************************************
      
        // Les donnees etait entre
        // *****************************************************************************************
        if($sessionPourAdmin == 1) {
          $_SESSION['admin_utilisateur'] = $utilisateur;
          header("location: deconnexionForm.php");
        }
        // *****************************************************************************************
        
        // Les données entrées par le user etait pas bonne
        // *****************************************************************************************
        else {
          $error = "Vos données entrées sont invalides.";
          echo "<script type='text/javascript'>alert('Données Invalides');</script>";
        }
        // *****************************************************************************************
    }
    // =============================================================================================
?>

<head>

  <!-- Meta -->
  <!--===============================================================================================-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!--===============================================================================================-->

  <!-- Titre -->
  <!--===============================================================================================-->
  <title>Connexion</title>
  <!--===============================================================================================-->

  <!-- Bootstrap core CSS -->

  <!-- Custom fonts for this template -->
  <!--===============================================================================================-->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
    rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic"
    rel="stylesheet" type="text/css">
  <!--===============================================================================================-->
  <!-- Custom styles for this template -->
  <!--===============================================================================================-->
  <link href="css/business-casual.css" rel="stylesheet">
  <link rel="icon" href="img/committee.png">
  <!--===============================================================================================-->

</head>

<body>

  <!-- Titre et adresse -->
  <!--===============================================================================================-->
  <div class="tagline-upper text-center text-heading text-shadow text-white mt-5 d-none d-lg-block">Comit&eacute de Loisirs d'Ivaco</div>
  <div class="tagline-lower text-center text-expanded text-shadow text-uppercase text-white mb-5 d-none d-lg-block">
    1040 COUNTY RD 17 | L'ORIGNAL, ON K0B 1K0 | 613-675-4671</div>
  <!--===============================================================================================-->

  <!-- Navigation -->
  <!--===============================================================================================-->
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
          <li class="nav-item px-lg-2">
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
         <li class="nav-item active px-lg-2">
         <a class="nav-link text-uppercase text-expanded" href="connexionForm.php">Déconnexion</a>
         </a>
         </li>
         <?php
           }
           else {
             ?>
          <li class="nav-item active px-lg-2">
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
  <!--===============================================================================================-->

  <!-- CSS pour la page -->
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!--===============================================================================================-->

  <!-- Container contenant le login form -->
  <!--===============================================================================================-->
  <link href="css/business-casual.css" rel="stylesheet">
  <div class="limiter">
    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100">
          <form id="login" class="login100-form validate-form" onsubmit="connexion()" method="POST">
            <span class="login100-form-logo" style="background-image: URL(img/committee3.png)">
            </span>

            <span class="login100-form-title p-b-34 p-t-27">
              Connexion
            </span>

            <div class="wrap-input100 validate-input" data-validate="Enter username">
              <input id="user" class="input100" type="text" name="username" placeholder="Nom d'utilisateur">
              <span class="focus-input100" data-placeholder="&#xf207;"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Enter password">
              <input id="password" class="input100" type="password" name="password" placeholder="Mot de Passe">
              <span class="focus-input100" data-placeholder="&#xf191;"></span>
            </div>

            <div class="container-login100-form-btn">
              <button class="login100-form-btn">
                Se connecter
              </button>
            </div>

            <div class="text-center p-t-90">
              <a class="txt1" href="#">
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--===============================================================================================-->


    <!--===============================================================================================-->
    <div id="dropDownSelect1"></div>
    <!--===============================================================================================-->


    <!-- Javascript -->
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
    <!--===============================================================================================-->

    <!-- Footer -->
    <!--===============================================================================================-->
    <footer class="bg-faded text-center py-5">
      <div class="container">
        <p class="m-0">Copyright &copy; Ivaco Loisirs 2017</p>
      </div>
    </footer>
    <!--===============================================================================================-->

    <!-- Bootstrap core JavaScript -->
    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->

</body>

</html>