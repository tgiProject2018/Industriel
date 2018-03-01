<!DOCTYPE html>
<html lang="en">
<?php
session_start();

?>
<head>

  <!-- Navigation -->
  <!--===============================================================================================-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!--===============================================================================================-->

  <!-- Titre -->
  <!--===============================================================================================-->
  <title>Contact</title>
  <!--===============================================================================================-->

  <!-- Bootstrap core CSS -->
  <!--===============================================================================================-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--===============================================================================================-->

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

  <!-- Navigation -->
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
          </li>
          <li class="nav-item px-lg-2">
            <a class="nav-link text-uppercase text-expanded" href="activites.php">Activit&eacutes</a>
          </li>
          <li class="nav-item active px-lg-2">
            <a class="nav-link text-uppercase text-expanded" href="contact.php">Contact</a>
            <span class="sr-only">(current)</span>
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
  <!--===============================================================================================-->

  <!-- Container avec informations sur Ivaco -->
  <!--===============================================================================================-->
  <div class="container">

    <div class="bg-faded p-4 my-4">
      <hr class="divider">
      <h2 class="text-center text-lg text-uppercase my-0">Contact
        <strong></strong>
      </h2>
      <hr class="divider">
      <div class="row">
        <div class="col-lg-8">
          <div class="embed-responsive embed-responsive-16by9 map-container mb-4 mb-lg-0">
            <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=45.6120794,-74.7025155&amp;spn=45.6120794,-74.7025155&amp;t=m&amp;z=4&amp;output=embed"></iframe>
          </div>
        </div>
        <div class="col-lg-4">
          <h5 class="mb-0">Phone:</h5>
          <div class="mb-4">613-676-3203</div>
          <h5 class="mb-0">Email:</h5>
          <div class="mb-4">
            <a href="mailto:name@example.com">ivacoloisirscomit&eacute@gmail.com</a>
          </div>
          <h5 class="mb-0">Address:</h5>
          <div class="mb-4">
            1040 County Rd 17
            <br> L'Orignal, ON K0B 1K0
          </div>
        </div>
      </div>
    </div>
    <!--===============================================================================================-->

    <!-- Div du personnel -->
    <!--===============================================================================================-->
    <div class="bg-faded p-4 my-4">
      <hr class="divider">
      <h2 class="text-center text-lg text-uppercase my-0">Notre
        <strong>&Eacutequipe</strong>
      </h2>
      <hr class="divider">
      <div class="row">
        <div class="col-md-4 mb-4 mb-md-0">
          <div class="card h-100">
            <img class="img-fluid mb-4 mb-lg-0" src="img/pedro.jpeg" alt="">
            <div class="card-body text-center">
              <h4 class="card-title m-0">Pedro Smith
                <small class="text-muted">
                  <br>Pr&eacutesident</small>
              </h4>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4 mb-md-0">
          <div class="card h-100">
            <img class="img-fluid mb-4 mb-lg-0" src="img/pablo.jpeg" alt="">
            <div class="card-body text-center">
              <h4 class="card-title m-0">Picasso Smith
                <small class="text-muted">Contrema&icirctre</small>
              </h4>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100">
            <img class="img-fluid mb-4 mb-lg-0" src="img/picasso.jpeg" alt="">
            <div class="card-body text-center">
              <h4 class="card-title m-0">Pablo Smith
                <small class="text-muted">Contrema&icirctre</small>
              </h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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

  <!-- Zoom when clicked function for Google Map -->
  <!--===============================================================================================-->
  <script>
    $('.map-container').click(function () {
      $(this).find('iframe').addClass('clicked')
    }).mouseleave(function () {
      $(this).find('iframe').removeClass('clicked')
    });
  </script>
  <!--===============================================================================================-->

</body>

</html>