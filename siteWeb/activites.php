<!DOCTYPE html>
<html lang="fr">
<?php
session_start();
?>
<head>

  <!-- Navigation -->
  <!-- ================================================================================================================================ -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- ================================================================================================================================ -->

  <!-- Titre -->
  <!-- ================================================================================================================================ -->
  <title>Activit&eacutes</title>
  <!-- ================================================================================================================================ -->

  <!-- Bootstrap core CSS -->
  <!-- ================================================================================================================================ -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- ================================================================================================================================ -->

  <!-- Custom fonts for this template -->
  <!-- ================================================================================================================================ -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
    rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic"
    rel="stylesheet" type="text/css">
    <!-- ================================================================================================================================ -->

  <!-- Custom styles for this template -->
  <!-- ================================================================================================================================ -->
  <link href="css/business-casual.css" rel="stylesheet">
  <link rel="icon" href="img/committee.png">
  <!-- ================================================================================================================================ -->

</head>

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
          <li class="nav-item px-lg-2">
            <a class="nav-link text-uppercase text-expanded" href="achats.php">Achats</a>
          </li>
          <li class="nav-item active px-lg-2">
            <a class="nav-link text-uppercase text-expanded" href="activites.php">Activit&eacutes</a>
            <span class="sr-only">(current)</span>
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


  <!-- Container avec le formulaire de ajax (activites) -->
  <!-- ================================================================================================================================ -->
  <div class="container"align="center">

    <div class="bg-faded p-4 my-4">
      <hr class="divider" >
      <h2 class="text-center text-lg text-uppercase my-0" >
        <strong>Information sur les activit&eacutes</strong>
      </h2>
      <hr class="divider">
      <form>
        <div class="row">
          <div class="clearfix"></div>
          <div class="form-group col-lg-4">
            <label class="text-heading">Repas</label>
            </br>
            <select class="form-group-sm" style="min-width: 100px;" name="dropDownRepas" id="dropDownRepas">
              <option>Aucun</option>
              <option>Oui</option>
              <option>Non</option>
            </select>
          </div>
          <div class="form-group col-lg-4">
            <label class="text-heading">Cat&eacutegorie</label>
            </br>
            <select class="form-group-sm" style="min-width: 100px;" name="dropDownCategorie" id="dropDownCategorie" disabled>
              <option>Aucune</option>
              <option>Buffet</option>
              <option>Sports</option>
              <option>Soirée</option>
              <option>Sports</option>
            </select>
          </div>
          <div class="form-group col-lg-4">
            <label class="text-heading">Activit&eacute</label>
            </br>
            <select class="form-group-sm" style="min-width: 100px;" name="dropDownActivite" id="dropDownActivite" disabled>
              <option>Aucune</option>
              <option>Tournoi de Golf</option>
              <option>Soirée Théâtre</option>
              <option>Cabane à Sucre</option>
              <option>Tirs au Pigeon d'Argile</option>
            </select>
          </div>
          <div class="form-group col-lg-12" style="min-width: 100px;">
            </br>
  
            <hr>
            <textarea id="description" rows="6" disabled></textArea>
          </div>
        </div>
      </form>
    </div>

  </div>
  <!-- ================================================================================================================================ -->
  
  <!-- Faire certain que le footer est en bas de la page -->
  <!-- ================================================================================================================================ -->
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

  <!-- Bootstrap core JavaScript -->
  <!-- ================================================================================================================================ -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/popper/popper.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <!-- ================================================================================================================================ -->

  <!-- jQuery -->
  <!-- ================================================================================================================================ -->
  <script src="js/jquery.js"></script>
  <!-- ================================================================================================================================ -->

  <!-- Bootstrap Core JavaScript -->
  <!-- ================================================================================================================================ -->
  <script src="js/bootstrap.min.js"></script>
  <!-- ================================================================================================================================ -->

  <!-- jquery script pour les combo box (select) -->
  <!-- ================================================================================================================================ -->
  <script src="js/activites.js"></script>
  <!-- ================================================================================================================================ -->

  <!-- Script to Activate the Carousel -->
  <!-- ================================================================================================================================ -->
  <script>
    $('.carousel').carousel({
      interval: 5000 //changes the speed
    })
  </script>
  <!-- ================================================================================================================================ -->

</body>

</html>