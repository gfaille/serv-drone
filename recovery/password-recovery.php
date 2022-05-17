<?php

try {
  $bdd = new PDO('mysql:host=localhost;dbname=servdrone;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
  // vérification de la connexion a la base de donner
} catch (Exception $e) {
  die("Impossible de se connecter : " . $e->getMessage());
}

// vérifier si le formulaire est bien soumis
if (isset($_POST['recovery'])) {
  $mail = $_POST['mail'];
  //vérifier si le formulaire est bien rempli
  if (!empty($mail)) {
    //vérifier que l'email et valide
    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $TestEmail = $bdd->query('SELECT id FROM users WHERE mail = "'.$mail.'"');
      // tester que l'email et bien valide
      if ($TestEmail->rowCount() > 0) {
        //générer un token aléatoire
        $string = implode('', array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9')));
        $token = substr(str_shuffle($string), 0, 20);

        //on insert  la date et le token  dans la base de donner
        $upToken = $bdd->prepare('UPDATE users SET date_mdp_perdu = NOW(), mdp_token = ? WHERE mail = ?');
        $upToken->bindValue(1, $token);
        $upToken->bindValue(2, $mail);
        $upToken->execute();

        //préparation de l'envoi du mail
        $link = 'localhost\serv-drone\recovery\passwordreset.php?token=' .$token;
        $to = $mail;
        $subject = 'Réinitisalisation de votre mot de passe';
        $message = '<h1> Réinitisalisation de votre mot de passe</h1><p>Pour réinitialiser votre mot de passe, veuillez  suivre se lien : <a href="'.$link.'">'.$link.'</a></p>';
        $header[] = 'MIME-Version: 1.0';
        $header[] = 'content-type: text/html; charset=iso-8859-1';

        //envoi du mail
        mail($to, $subject, $message, implode("\r\n", $header));
      }else $return = print "le compte n'éxiste pas";
    }else $return = print "email non valide";
  }else $return = print "le champs manquant";
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>reinitialisation de mot de passe</title>
  </head>
  <body>
    <h3>changer de mot de passe</h3>
    <form action="" method="POST">

      <input type="email" name="mail" placeholder="votre e-mail">
      <br>
      <input type="submit" name="recovery" value="reinitialisez votre mot de passe">

    </form>
  </body>
</html>
