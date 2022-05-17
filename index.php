<?php
session_start();

if (isset($_POST['profile'])) {
  if (isset($_SESSION['connexion'])) {
    header('location: profile.php');
  }else {
    header('location: register.php');
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>serv'drone</title>

    <!-- css de bootstrap + mon css + un google font pour la police d'écriture -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">

  </head>

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

        <div class="col-2 col-lg-4 col-xxl-4 btn-header">
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

    <!-- saut de 24px entre le header et la section -->
    <div class="row" style="height: 24px; margin-right: calc(0 * var(--bs-gutter-x));"></div>

    <!-- section pour le serv-drone de class 1 + lien qui raméne a l'achat des drones. -->
    <section class="container-fluid" style="background-image: url(img/drone-1.png); background-color: rgba(247, 245, 255, 1);">
      <div class="row" style=" min-height: 720px; max-height: 100%;">

        <div class="row">
          <div class="col-12" style="text-align: center;">
            <h2>Serv’Drone Class 1</h2>
            <h3>Le Premier drône de service à la personne</h3>
          </div>
        </div>

        <div class="row">
          <div class="col-6 offset-1">
            <h5>Oubliez tout ce que vous pensez savoir sur les drônes !</h5>
            <p>Avec Class 1, Serv’Drone réinvente ce qu’il était possible de faire avec un drone.
               Voici le premier drône qui vous aide dans vos tâches du quotidien. Un véritable assistant qui vous obéit au doigt et à l’oeil.</p>
            <p>Découvrez comment il changera votre quotidien dès maintenant.</p>
            <a href="drone.html" class="offset-9 btn-white">
            <button type="button" class="btn btn-w">En savoir plus</button>
          </a>
          </div>
        </div>

      </div>
    </section>

    <!-- saut de 24px entre le header et la section -->
    <div class="row" style="height: 24px; margin-right: calc(0 * var(--bs-gutter-x));"></div>

    <!-- section pour le début de l'histoir de serv'drone + lien qui raméne vers l'histoire de serv'drone complete. -->
    <section class="container-fluid" style="background-image: url(img/fond-ecran.png); background-size: cover;; background-position: 0%;">
      <div class="row" style="min-height: 571px; max-height: 100%;">

        <div class="row" style="flex-direction: row-reverse;">
          <div class="col-10" style="text-align: right; color: rgba(247, 245, 250, 1); margin-right: 6%;">
            <h2>Serv’Drone</h2>
            <h3>créateur de drône humanitaire</h3>
          </div>
        </div>

        <div class="row" style="flex-direction: row-reverse;">
          <div class="col-6" style="text-align: right; color: rgba(247, 245, 250, 1); margin-right: 6%;">
            <h5>Des produits faits par des humains,Pour des humains.</h5>
            <p>Dans un monde grandissant avec des responsabilités qui ne cessent de croitre elles aussi.
               Serv’Drone crée des produits fait pour vous assister.
               Avec en tête les besoins de nos utilisateurs avant toute chose.
               Chacune de nos offres à pour objectifs de vous simplifier la vie à moindre coût.</p>
            <p>Si vous désirez en savoir plus sur la façon dont nous imaginons chaque produit avec l’humain au cœur de chaque décision, c’est par ici !</p>
          </div>
          <div class="col-7">
            <a href="drone.html">
              <button type="button" class="btn btn-w" style="margin-left: 6%;">En savoir plus</button>
            </a>
          </div>
        </div>

      </div>
    </section>

    <!-- saut de 24px entre le header et la section -->
    <div class="row" style="height: 24px; margin-right: calc(0 * var(--bs-gutter-x));"></div>

    <!-- section pour le serv'drone de class 1 deluxe + lien vers achat des drone. -->
    <section class="container-fluid" style="background-image: url(img/drone-2.png); background-color: rgba(43, 30, 62, 1);">
      <div class="row" style=" min-height: 730px; max-height: 100%;">

        <div class="row">
          <div class="col-12" style="text-align: center; color: rgba(247, 245, 250, 1);">
            <h2>Serv’Drone Class 1 Deluxe</h2>
            <h3>Des limites sans cesse repoussées</h3>
          </div>
        </div>

        <div class="row">
          <div class="col-6 offset-1" style="color: rgba(247, 245, 250, 1);">
            <h5>Aventurez vous la ou aucun humain n’as jamais été !</h5>
            <p>Avec Class 1 Deluxe, découvrez un univers que vous n’aurez jamais imaginé possible.
               Certains vous diront qu’il faut être fou pour créer une telle machine. Et c’est exactement pourquoi nous l’avons fait.</p>
            <p>Découvrez le à vos risques et périls.</p>
            <a href="drone.html" class="offset-9">
            <button type="button" class="btn btn-v">Je veut voir!</button>
          </a>
          </div>
        </div>

      </div>
    </section>

    <!-- saut de 24px entre le header et la section -->
    <div class="row" style="height: 24px; margin-right: calc(0 * var(--bs-gutter-x));"></div>

<!-- footer qui vien de bootstrap (juste un copier-coller). -->
<footer container>
  <div class="container-fluid">
      <div class="row">
        <div class="col-md-2 p1">
          <p>Engagement de confidentialité </p>
        </div>
        <div class="col-md-2 p2">
          <p>Utilisation des cookies </p>
        </div>
        <div class="col-md-2 p3">
          <p>Conditions d’utilisation</p>
        </div>
        <div class="col-md-2 p4">
          <p>Ventes et remboursements</p>
        </div>
        <div class="col-md-2 p5">
          <p>Mentions légales</p>
        </div>
        <div class="col-md-2 p6">
          <p>Plan du site</p>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <img src="img/Réseaux Sociaux.png" class="offset-8 offset-xxl-9" alt="">
        </div>
      </div>
    </div>
</footer>
  </body>
</html>
