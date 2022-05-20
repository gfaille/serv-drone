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
    </header>

    <!-- saut de 24px entre le header et la section -->
    <div class="row" style="height: 24px; margin-right: calc(0 * var(--bs-gutter-x));"></div>

    <!-- section pour acheter le serv'drone classe 1. -->
    <section class="container-fluid bg-color-w">
      <div class="row" style=" min-height: 520px; max-height: 100%;">

        <div class="row">
          <div class="col-5 p-text">
            <h4>Class 1</h4>
            <p id="P1">Ses fonctions vont vous surprendre.Son prix Aussi</p>
            <p id="P1">Découvrez ce que la gamme Class 1 peut faire pour vous dès aujourd’hui.</p>
            <form action="panier.php" method="post">
              <a href="panier.php?action=ajout&amp;l=libelleProduit&amp;q=quantiteProduit&amp;p=prixProduit">
                <button type="submit" class="btn btn-w" name="action">J'achète</button>
              </a>
            </form>
          </div>
          <div class="col-7 align-self-center">
            <img src="img/drone-chien.png" class="img" alt="">
          </div>
        </div>

      </div>
    </section>

    <!-- saut de 24px entre le header et la section -->
    <div class="row" style="height: 24px; margin-right: calc(0 * var(--bs-gutter-x));"></div>

    <!-- section pour acheté serv-drone class 1 plus -->
    <section class="container-fluid bg-color-b">
      <div class="row" style=" min-height: 520px; max-height: 100%;">

        <div class="row">
          <div class="col-6 p-text">
            <h4>Class 1 plus</h4>
            <p id="P1">Ce texte est aussi à remplacer</p>
            <p id="P1">Parce que je ne sais pas quoi écrire dans ce second paragraphe.</p>
            <a href="#">
              <button type="button" class="btn btn-w" name="button">Jachète</button>
            </a>
          </div>
          <div class="col-6 align-self-center">
            <img src="img/drone-meuble.png" class="img" alt="">
          </div>
        </div>

      </div>
    </section>

    <!-- saut de 24px entre le header et la section -->
    <div class="row" style="height: 24px; margin-right: calc(0 * var(--bs-gutter-x));"></div>

    <!-- section pour acheté serv-drone class 1 plus -->
    <section class="container-fluid bg-color-v" style="background-image: url(img/drone-2.png);">
      <div class="row" style=" min-height: 520px; max-height: 100%;">

        <div class="row">
          <div class="col-6 p-text" style="color: rgba(247, 245, 250, 1);">
            <h4>Class 1 Deluxe</h4>
            <p id="P1">Repoussez les limites de ce que vous pensiez possible avec un drône.</p>
            <p id="P1">Class 1 Deluxe condense toutes nos prouesses technologique en un seul produit révolutionnaire.</p>
            <a href="#">
              <button type="button" class="btn btn-v" name="button">J'achète</button>
            </a>
          </div>
        </div>

      </div>
    </section>

    <!-- saut de 24px entre le header et la section -->
    <div class="row" style="height: 24px; margin-right: calc(0 * var(--bs-gutter-x));"></div>

    <!-- section tableau serv'drone -->
    <section class="container-fluid">
          <div class="row" style=" min-height: 520px; max-height: 100%;">

            <div class="row">
              <div class="col-12" style="text-align: center;">
                <h2>Comparer les modèles de drones</h2>
              </div>
            </div>

            <div class="row pos">
              <div class="col-12 col-xxl-12">
                <img src="img/tableau.png" class="img" alt="">
              </div>
            </div>

            <div class="row justify-content-center btn-pos">
              <div class="col-auto">
                  <button type="submit" class="btn btn-primary" name="button">ajouter au panier</button>
              </div>

              <div class="col-auto pos">
                  <button type="button" class="btn btn-primary" name="button">ajouter au panier</button>
              </div>

              <div class="col-auto pos">
                  <button type="button" class="btn btn-primary" name="button">ajouter au panier</button>
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
