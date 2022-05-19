<?php
//fonction de hashache de mot de passe
function pwdHash($str){
  $str = sha1(md5($_POST['mdp'] .$str));
  return $str;
}
// connéxion a la base de donner mysql (mariadb).
try {
  $bdd = new PDO('mysql:host=localhost;dbname=servdrone;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
  // vérification de la connexion a la base de donner
} catch (Exception $e) {
    die("Impossible de se connecter : " . $e->getMessage());
}

//récuperation des information par rapport au token dans la base de donner
if (!empty($_GET['token'])) {
  $mdpReset = $bdd->prepare('SELECT date_mdp_perdu FROM users WHERE mdp_token = ?');
  $mdpReset->bindValue(1, $_GET['token']);
  $mdpReset->execute();
  $tokenRecup = $mdpReset->fetch(PDO::FETCH_ASSOC);

  //vérification si l'information et associé au tokenRecup
  if (!empty($tokenRecup)) {

    //calcule la date de génération du token + 1h
    $dateToken = strtotime('+1hours', strtotime($tokenRecup['date_mdp_perdu']));
    $dateToday = time();

    if ($dateToday < $dateToken) {
      if (!empty($_POST['passwordchanged'])) {
        $mdp = $_POST['mdp'];
        $mdp2 = $_POST['mdp2'];

        //vérification des champs
        if (!empty($mdp) AND !empty($mdp2)) {
          //vérification si les 2 mot de passe sont les même
          if ($mdp == $mdp2) {
            $mdp = pwdHash($mdp);
            $upmdp = $bdd->prepare('UPDATE users set mdp = ?, mdp_token = "" WHERE mdp_token = ?');
            $upmdp->bindValue(1, $mdp);
            $upmdp->bindValue(2, $_GET['token']);
            $upmdp->execute();
            header('location: ../register.php');
          }else $return = print "les deux mot de passe ne sont pas identique";
        }else $return = print "veuillez remplir tous les champs";
      }
    }else {
      print "token expirer";
      exit();
    }
  }else $return = print "Ce token n\'a pas était trouver";
}else $return = print "aucun token n\'a était spécifier";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Réinitisalisation</title>
  </head>
  <body>

    <form action="" method="POST">

      <input type="password" name="mdp" placeholder="saisir votre nouveau mot de passe" autocomplete="off">
      <br>
      <input type="password" name="mdp2" placeholder="confirmer votre nouveau mot de passe" autocomplete="off">
      <br>
      <input type="submit" name="passwordchanged" value="changer le mot de passe">
    </form>
  </body>
</html>
