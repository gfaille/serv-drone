<?php
session_start();

// detruit la session
if (isset($_POST['logout'])) {
  $_session = array();
  session_destroy();
  header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <!-- css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">

  </head>
  <body>

    <body>
      <!-- saut de 80px. -->
      <div class="row" style="height: 80px; margin-right: calc(0 * var(--bs-gutter-x));"></div>

      <!-- barre de navigation + logo + profile de connexion et d'inscription + panier. -->
      <header class="container-fluid" style="background: #4491E4;">
        <div class="row align-items-center" style="min-height: 56px; max-height: 100%;">

          <div class="col-auto align-self-center" style="text-align: center;">
            <img src="img/logo.svg" alt="">
          </div>

          <div class="col-auto btn-header">
            <a href="index.php">
              <button type="button" class="btn btn-link">Accueil</button>
            </a>
          </div>

          <div class="col-auto btn-header">
            <a href="drone.php">
              <button type="button" class="btn btn-link">Nos Drônes</button>
            </a>
          </div>

          <div class="col-auto  btn-header">
            <a href="actualité.php">
              <button type="button" class="btn btn-link">Actus</button>
            </a>
          </div>

          <div class="col-auto btn-header">
            <a href="historique.php">
              <button type="button" class="btn btn-link">Histoire</button>
            </a>
          </div>

          <div class="col-auto  btn-header">
            <a href="contact.php">
              <button type="button" class="btn btn-link">Contact</button>
            </a>
          </div>

          <div class="col-2 col-lg-4 col-xxl-5 btn-header">
            <a href="FAQ.php">
              <button type="button" class="btn btn-link">FAQ</button>
            </a>
          </div>

          <div class="col-auto col-xxl-1" style="text-align: center;">

            <form action="" method="POST">
              <button class="btn" type="submit" name="profile"><img src="img/profile.svg" alt=""> </button>
            </form>

          </div>

          <div class="col-auto col-xxl-1" style="text-align: center;">
            <a href="#">
              <img src="img/panier.svg" alt="">
            </a>
          </div>

        </div>
      </header>

      <section>

        <div class="">

          <h3>vous êtes sur le point de vous déconnectez</h3>
          <form action="" method="POST">
            <input type="submit" name="logout" value="déconnexion">
          </form>

        </div>

      </section>

  </body>
</html>
