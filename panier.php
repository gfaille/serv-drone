<?php
session_start();

// fonction pour crée le panier si il n'existe pas dans la session panier
function CreationPanier() {
  if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
    $_SESSION['panier'] ['libelleProduit'] = array();
    $_SESSION['panier'] ['quantiteProduit'] = array();
    $_SESSION['panier'] ['prixProduit'] = array();
    $_SESSION['panier'] ['verrou'] = false;
  }return true;
}


// fonction pour ajouter un article dans le panier.
function ajouterArticle($libelleProduit, $quantiteProduit, $prixProduit) {

  //si le panier existe et qui n'est pas vérrouiller
  if (CreationPanier() AND !isVerouille()) {

    // si le produit existe déjà on ajoute seulement la quantité
    $positionProduit = array_search($libelleProduit, $_SESSION['panier'] ['libelleProduit']);

    // si le $positionProduit n'est pas égal a faux on ajoute
    if ($positionProduit !== false) {
      $_SESSION['panier'] ['quantiteProduit'] ['$positionProduit'] += $quantiteProduit;
    }else {

      //sinon on ajoute le produit au panier
      array_push($_SESSION['panier'] ['libelleProduit'], $libelleProduit);
      array_push($_SESSION['panier'] ['quantiteProduit'], $quantiteProduit);
      array_push($_SESSION['panier'] ['prixProduit'], $prixProduit);
    }
  }else $return = print "Un probleme est survenu";
}

// fonction pour supprimer un article
function supprArticle($libelleProduit) {

  // vérifier que le panier existe
  if (CreationPanier() AND !isVerouille()) {

    $temp = array();
    $temp['libelleProduit'] = array();
    $temp['quantiteProduit'] = array();
    $temp['prixProduit'] = array();
    $temp['verrou'] = $_session['panier'] ['verrou'];

    for ($i = 0; $i < count($_SESSION['panier'] ['libelleProduit']) ; $i++) {

      if ($_SESSION['panier'] ['libelleProduit'] [$i !== $libelleProduit]) {

        array_push($temp['libelleProduit'], $_SESSION['panier'] ['libelleProduit'] [$i]);
        array_push($temp['quantiteProduit'], $_SESSION['panier'] ['quantiteProduit'] [$i]);
        array_push($temp['prixProduit'], $_SESSION['panier'] ['prixProduit'] [$i]);
      }
    }
    // remplacement du panier en session par le panier temporaire à jour
    $_SESSION['panier'] = $temp;

    // puis on efface le panier temporaire
    unset($temp);
  }else $return = print "un probleme est survenu";
}

// fonction pour modifer la quantité d'un article du panier
function modifierArticle($libelleProduit, $quantiteProduit) {

  // vérifier si le panier existe
  if (CreationPanier() AND !isVerouille()) {

    // si la quantité est positive alors on modifie sinon on supprime l'article
    if ($quantiteProduit > 0) {

      //rechercher le produit dans le panier
      $positionProduit = array_search($libelleProduit, $_SESSION['panier'] ['libelleProduit']);

      if ($positionProduit !== false) {
        $_SESSION['panier'] ['quantiteProduit'] ['$positionProduit'] = $quantiteProduit;
      }
    }else supprArticle($libelleProduit);
  }else $return = print "un probleme est survenu";
}

// montant total du panier
function montantTotal(){
  $total = 0;
  for ($i = 0; $i  < count($_session['panier'] ['libelleProduit']); $i++) {
    $total += $_SESSION['panier'] ['quantiteProduit'] [$i] *  $_SESSION['panier'] ['prixProduit'] [$i];
  }return $total;
}

// fonction pour vérifier le verrouillage
function isVerouille() {
  if (isset($_SESSION['panier']) AND $_SESSION['panier'] ['verrou']) {
    return true;
  }else return false;
}

// fonction pour compter les article
function compterArticle() {
  if (isset($_session['panier'])) {
    return count($_session['panier'] ['libelleProduit']);
  }else return 0;
}

// fonction pour supprimer le panier
function supprPanier(){
  unset($_SESSION['panier']);
}

$erreur = false;
var_dump($erreur);

$action = (isset($_POST['action']) ? $_POST['action']:null);
var_dump($action);
var_dump($_POST['action']);
if ($action !== null) {
  if (!in_array($action, array('ajout', 'suppression', 'refresh'))) {
    $erreur = true;
    var_dump($erreur);
    $l = (isset($_POST['l']) ? $_POST['l']:null);
    $p = (isset($_POST['p']) ? $_POST['p']:null);
    $q = (isset($_POST['q']) ? $_POST['q']:null);
    var_dump($_POST['l'], $_POST['p'], $_POST['q']);
    $l = preg_replace('#\v#', '',$l);

    $p = floatval($p);

    if (is_array($p)) {
      $quantiteProduit = array();
      $i = 0;
      foreach ($q as $contenu) {
        $quantiteProduit[$i++] = intval($contenu);
      }
    }
  }else {
    $p = intval($p);
  }
  if (!$erreur) {
    switch ($action) {
      case 'ajout':
        ajouterArticle($l, $p, $q);
        break;

      case 'suppression':
        supprPanier($l);
        break;
      case 'refresh':
        for ($i = 0; $i < count($quantiteProduit); $i++) {
          modifierArticle($_SESSION['panier'] ['libelleProduit'] ['$i'], round($quantiteProduit['$i']));
        }
        break;

      default:
        break;
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>panier</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
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

        <div class="col-2 col-lg-2 col-xl-4 col-xxl-4 btn-header">
          <a href="FAQ.php">
            <button type="button" class="btn btn-link">FAQ</button>
          </a>
        </div>

        <div class="col-auto col-xxl-auto no-gutters" style="text-align: center;">

          <form action="" method="POST">
            <button class="btn" type="submit" name="profile"><img src="img/profile.svg" alt=""> </button>
          </form>

        </div>

        <div class="col-auto col-xxl-auto no-gutters" style="text-align: center;">
          <a href="#">
            <img src="img/panier.svg" alt="">
          </a>
        </div>

      </div>
    </header>

<section>

  <form action="" method="POST">

    <table>

      <tr>
        <td>votre Panier</td>
      </tr>

      <tr>
        <td>Libellé</td>
        <td>quantité</td>
        <td>Prix</td>
        <td>Action</td>
      </tr>

      <?php

      if (CreationPanier()) {
        $nbArticles = count($_SESSION['panier'] ['libelleProduit']);
        if ($nbArticles <= 0) {
          echo "<tr><td>Votre panier est vide </td></tr>";
        }else {
          for ($i = 0; $i < $nbArticle; $i++) {

             echo "<tr>";
             echo "<td>".htmlspecialchars($_SESSION['panier'] ['libelleProduit'] ['$i'])."</td>";
             echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['quantiteProduit'][$i])."\"/></td>";
             echo "<td>".htmlspecialchars($_SESSION['panier']['prixProduit']['$i'])."</td>";
             echo "<td><a href=\"".htmlspecialchars("panier.php?action=suppression&l=".rawurlencode($_SESSION['panier']['libelleProduit'][$i]))."\">XX</a></td>";
             echo "</tr>";

          }

          echo "<tr><td colspan=\"2\"> </td>";
           echo "<td colspan=\"2\">";
           echo "Total : ".MontantGlobal();
           echo "</td></tr>";

           echo "<tr><td colspan=\"4\">";
           echo "<input type=\"submit\" value=\"Rafraichir\"/>";
           echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";

           echo "</td></tr>";
        }
      }

      ?>
    </table>

  </form>

</section>
  </body>
</html>
