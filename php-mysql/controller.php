<?php
  if ( isset( $_post['submit'])) {

    // identifiants mysql
    $host = "localhost";
    $username = "root";
    $password = "password";
    $database = "servdrone";

    // code...
    $name = $_post["user_name"];
    $mail = $_post["user_mail"];
    $pass = $_post["user_pass"];

    if (!isset($name)) {
      // code...
      die("entrez votre nom");
    }
    if (!isset($mail) || !filter_var($mail, filter_validate_mail)) {
      // code...
      die("entrez votre adresse mail");
    }
    //ouverture d'une nouvelle connexion au serveur mysql
    $mysqli = new mysqli($host, $username, $password, $database);

    //préparation de la requete d'insertion sql
    $statement =  $mysqli->prepare("insert into users (name, mail) value(?, ?)");

    //Associer les valeurs et exécuter la requête d'insertion
    $statement->bind_param('ss', $name, $mail, $pass);

    if($statement->execute()){
      print "Salut " . $name . "!, votre adresse mail est ". $mail;
    }else{
      print $mysqli->error;
    }
  }
?>
