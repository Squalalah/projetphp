<?php
session_start();
require_once('../BO/Panier.php');
require_once("../BO/Produit.php");
require_once("../BO/Stylo.php");
require_once("../BO/Glace.php");
require_once("../BO/Pain.php");
require_once("../BO/CartePostale.php");
require_once("../BO/Auteur.php");
require_once("../BO/ProduitPerissable.php");

if(!isset($_SESSION['panier']))
{
    header('Location: listeProduits.php');
}

$panier = unserialize($_SESSION['panier']);
$panier->calculMontant();

?>

<!DOCTYPE html>
<html>
<head>
  <title>Panier</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta charset="utf-8">
  <title>Les Pro du I.T.</title>
  <link rel="stylesheet" href="asset/css/header.css">
  <link rel="stylesheet" href="asset/css/detailPanier.css">
</head>

<?php include('include/header.php'); ?>

<table border = 1>
  <thead>
    <tr>
      <th>Quantité</th>
      <th>Libelle</th>
      <th>Marque</th>
      <th>Prix Unitaire</th>
      <th>Total</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $lesLignes=$panier->getLignes();
        foreach($lesLignes as $keyLigne=>$ligne){
            /* @var Ligne $ligne */
          echo '<tr>';
            echo '<td>' . $ligne->getQuantite() . '</td>';
            echo '<td>' . $ligne->getProduit()->getLibelle() . '</td>';
            echo '<td>' . $ligne->getProduit()->getMarque() . '</td>';
            echo '<td>' . $ligne->getProduit()->getPrixUnitaire() . ' €</td>';
            echo '<td>' . $ligne->getPrix() . ' €</td>';
            echo '<td> <form method="post" action="serviceSupprimeLigne.php">';
            echo '<input type="number" class="modifierInput" name="quantite" value="'. $ligne->getQuantite() .'" min="1" max="' . $ligne->getProduit()->getQteStock() . '">';
            echo '<input type="submit" name="modifierQuantite" value="modifier">';
            echo '<input type="image" name="supprimeLigne" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAmklEQVRIS+2V2xFAMBBFTypQAiXQgVKojFJ0QAs60AGTGa8Jscvgh3xmNvfs3iS7hoeXeVgfDSADCk8iOVAeJSkBYqAWqkyAxhfjAvqbLJt1XwfcVMAi47uDq1Zt9L4BmKp0bdvbv2TRD9h9+mu/f4s+YNGZBqj+aB0QnFEGWiByz/iaXTqOwlAJseJ2tFZagFJXDpNmsqwgRAx/AyoZAQW7RAAAAABJRU5ErkJggg==">
            <input type="hidden" name="indexLigne" id="supprLigne" value="'. $keyLigne .'">
            </form> </td>';
          echo '</tr>';
        }
    ?>
  </tbody>
  <tfoot>
    <tr>
      <th colspan="4">
        Montant total
      </th>
      <td>
        <?php
          echo $panier->getMontant();
        ?>
      </td>
    </tr>
  </tfoot>
</table>
<div class="bouton">
  <form method="POST" action="serviceAjoutePanier.php">
      <input class="valider" type="submit" name="valider" value="Valider le panier">
  </form>
</div>

</html>
<?php

$_SESSION['panier'] = serialize($panier);

?>