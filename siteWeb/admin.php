<!DOCTYPE html>
<html lang="en">
<?php
session_start();    

  // On inclus notre fichier de connexion à la bdo
  // =============================================,================================================
  include('DataLayer/BusinessLayer/connection.php');
  // =============================================================================================
  // On fait certain si le user est deja login de le redirect tout de suite à sign out
  // =============================================================================================
  if(!isset($_SESSION['admin_utilisateur'])) {
  header("location: connexionForm.php");
  } 
  // =============================================================================================
?>

  <head>

    <!-- Meta -->
    <!-- ================================================================================================================================ -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- ================================================================================================================================ -->

    <!-- Titre -->
    <!-- ================================================================================================================================ -->
    <title>Admin</title>
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
    <div class="tagline-upper text-center text-heading text-shadow text-white mt-5 d-none d-lg-block">Comit&eacute de loisirs d'Ivaco</div>
    <div class="tagline-lower text-center text-expanded text-shadow text-uppercase text-white mb-5 d-none d-lg-block">
      1040 County Rd 17 | L'Orignal, ON K0B 1K0 | 613-675-4671</div>
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
              <span class="sr-only">(current)</span>
            </li>
            <li class="nav-item px-lg-2">
              <a class="nav-link text-uppercase text-expanded" href="achats.php">Achats</a>
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
                  <li class="nav-item active px-lg-2">
                    <a class="nav-link text-uppercase text-expanded" href="admin.php">Admin</a>
                  </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- ================================================================================================================================ -->

    <!-- Container nouvelles -->
    <!-- ================================================================================================================================ -->
    <div class="container">

      <div class="bg-faded p-4 my-4">
        <hr class="divider">
        <h2 class="text-center text-lg text-uppercase my-0">
          <strong>Voici vos activités dans la base de données : </strong>
        </h2>
        <hr class="divider">
        <div class="row">
          <div class="col-lg-6" style="border-right: 1px solid black">
            <?php
    
        
        // On selectionne les activites 
        // *****************************************************************************************
        $query1 = "SELECT * FROM Activites WHERE ActiviteID = 1";
        $activitesSelect1 = mysqli_query($db,$query1);
        $arrayActivites1 = mysqli_fetch_array ( $activitesSelect1 );

        $query2 = "SELECT * FROM Activites WHERE ActiviteID = 2";
        $activitesSelect2 = mysqli_query($db,$query2);
        $arrayActivites2 = mysqli_fetch_array ( $activitesSelect2 );

        $query3 = "SELECT * FROM Activites WHERE ActiviteID = 3";
        $activitesSelect3 = mysqli_query($db,$query3);
        $arrayActivites3 = mysqli_fetch_array ( $activitesSelect3 );

        $query4 = "SELECT * FROM Activites WHERE ActiviteID = 4";
        $activitesSelect4 = mysqli_query($db,$query4);
        $arrayActivites4 = mysqli_fetch_array ( $activitesSelect4 );
        // *****************************************************************************************
        
        // On affiche les deux premieres activites dans le div
        // *****************************************************************************************
         echo "<p>ID : ";
         echo $arrayActivites1[0];
         echo "<br><br> NOM : ";
         echo $arrayActivites1[1];
         echo "<br><br> DESCRIPTION : ";
         echo $arrayActivites1[2];
         echo "</p>";

         echo "<p>ID : ";
         echo $arrayActivites2[0];
         echo "<br><br> NOM : ";
         echo $arrayActivites2[1];
         echo "<br><br> DESCRIPTION : ";
         echo $arrayActivites2[2];
         echo "</p>";
         // *****************************************************************************************
        

    // =============================================================================================
?>
          </div>
          <div class="col-lg-6">
            <?php

          // On affiche les deux dernies activites dans le div
          // *****************************************************************************************
          echo "<p>ID : ";
          echo $arrayActivites3[0];
          echo "<br><br> NOM : ";
          echo $arrayActivites3[1];
          echo "<br><br> DESCRIPTION:";
          echo $arrayActivites3[2];
          echo "</p>";
 
         ?>
              <?php
        echo "<p style=margin-top:31%>ID : ";
         echo $arrayActivites4[0];
         echo "<br><br> NOM : ";
         echo $arrayActivites4[1];
         echo "<br><br> DESCRIPTION : ";
         echo $arrayActivites4[2];
         echo "</p>";
         // *****************************************************************************************
         ?>
          </div>
        </div>
      </div>

    </div>
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

  </body>

</html>