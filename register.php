<?php
session_start();

// hash du mot de passe
function pwdHash($str){
  $str = sha1(md5($_POST['mdp'] .$str));
  return $str;
}

// connexion a la base de donner
try {
  $bdd = new PDO('mysql:host=localhost;dbname=servdrone;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
  // vérification de la base de donner
} catch (Exception $e) {
    die("impossible de se connecter : " . $e->getmessage());
}

// formulaire d'inscription
if (isset($_POST['register'])) {
  $prenom = $_POST['first-name'];
  $nom = $_POST['name'];
  $mail = $_POST['mail'];
  $mdp = $_POST['mdp'];
  $mdp2 = $_POST['mdp2'];

  // vérification si le formulaire est bien rempli
  if (!empty($prenom) AND !empty($nom) AND !empty($mail) AND !empty($mdp) AND !empty($mdp2)) {

    // vérification du mail
    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {

      // vérification si les 2 mot de passe sont identique
      if ($mdp == $mdp2) {

        //vérification si l'email existe ou pas
        $testEmail = $bdd->query('SELECT id FROM users WHERE mail = "'.$mail.'"');
        if ($testEmail->rowcount() < 1) {

          //remplacement du mot de passe par le mot de passe hasher
          $mdp = pwdHash($mdp);

          // entrez les donner dans base de donner de l'utilisateurs
          $bdd->query('INSERT INTO users (prenom, nom, mail, mdp) VALUES ("'.$prenom.'", "'.$nom.'", "'.$mail.'", "'.$mdp.'")');
          print "inscription reussi";
        }else $return = print "l'adresse mail existe déjâ";
      }else $return = print "les deux mot de passe corresponde pas";
    }else $return = print "email nom valide";
  }else $return = print "un ou plusieur champs ne sont pas rempli";
}

//formulaire de connexion
if (isset($_POST['login'])) {
  $mail = $_POST['mail'];
  $mdp = $_POST['mdp'];

  //vérification si le formulaire est bien rempli
  if (!empty($mail) AND !empty($mdp)) {

    //vérification de l'email
    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {

      $mdp = pwdHash($mdp);
      $userVerif = $bdd->query('SELECT id FROM users WHERE mail = "'.$mail.'" AND "'.$mdp.'"');
      $userData = $userVerif->fetch();
      if ($userVerif->rowcount() == 1) {
        $_SESSION['connexion'] = $userData['id'];
        header('location: index.php');
      }else $return = print "vos identifiant son invalide";
    }else $return = print "adresse mail non valide";
  }else $return = print "un ou plusieur champs manquant";
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>s'inscrire/s'enregistrer</title>

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

    <!-- saut de 80px. -->
    <div class="row" style="height: 80px; margin-right: calc(0 * var(--bs-gutter-x));"></div>

    <section>

      <!-- titre -->
        <h1 style="text-align: center;">SERV'DRONE</h1>

        <!-- saut de 80px. -->
        <div class="row" style="height: 80px; margin-right: calc(0 * var(--bs-gutter-x));"></div>

        <div class="container-fluid">

          <div class="row">

            <div class="col-12">

              <div class="col-6 offset-3 formulaire">
                <div class="col-8 container">

                <!-- sous titre -->
                <h3 id="h-titre">Crée un compte</h3>


                  <!-- formulaire d'inscription d'utilisateurs -->
                  <form action="" method="POST">

                    <div class="row">
                      <label><h5>Votre nom</h5></label>
                      <input type="text" name="first-name" placeholder="Prénom" autocomplete="off" id="name">
                      <input type="text" name="name" placeholder="nom" autocomplete="off">
                    </div>

                    <div class="row">
                      <label><h5>Adresse e-mail</h5></label>
                      <input type="email" name="mail" placeholder="Vôtre adresse mail" autocomplete="off">
                    </div>

                  <div class="row">
                    <label><h5>Mot de passe</h5></label>
                    <input type="password" name="mdp"  placeholder="Vôtre mot de passe" autocomplete="off" required>
                  </div>

                    <div class="row">
                      <label><h5>Confirmer vôtre mot de passe</h5></label>
                      <input type="password" name="mdp2" placeholder="Confirmer vôtre mot de passe" autocomplete="off" required>
                    </div>

                    <div class="row btn-size">
                      <input type="submit" name="register" value="s'inscrire">
                    </div>

                  </form>

                </div>


              </div>
            </div>

            <!-- saut de 80px. -->
            <div class="row" style="height: 80px; margin-right: calc(0 * var(--bs-gutter-x));"></div>

            <div class="col-12">


              <div class="col-6 offset-3 formulaire">

                <div class="col-8 container">

                <!-- sous titre -->
                <h3 id="h-titre">Sidentifier</h3>


                  <!-- formulaire de connexion d'utilisateur -->
                  <form action="" method="POST">

                    <div class="row">
                      <label><h5>Adresse e-mail</h5></label>
                      <input type="email" name="mail" placeholder="Vôtre adresse mail" autocomplete="off">
                    </div>

                    <div class="row">
                      <label><h5>Mot de passe</h5></label>
                      <input type="password" name="mdp" placeholder="Vôtre mot de passe" autocomplete="off" id="name">
                      <a href="recovery/password-recovery.php">mot de passe oublier </a>
                    </div>

                  <div class="row btn-size">
                      <input type="submit" name="login" value="se connecter">
                  </div>

                  </form>

                </div>

              </div>

            </div>
          </div>
          </div>



    </section>

  </body>
</html>
