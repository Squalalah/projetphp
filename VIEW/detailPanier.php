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
    </tr>
  </thead>
  <tbody> 
    <?php
        $lesLignes=$panier->getLignes();
        foreach($lesLignes as $keyLigne=>$ligne){
          echo '<tr>';
            echo '<td>' . $ligne->getQuantite() . '</td>';
            echo '<td>' . $ligne->getProduit()->getLibelle() . '</td>';
            echo '<td>' . $ligne->getProduit()->getMarque() . '</td>';
            echo '<td>' . $ligne->getProduit()->getPrixUnitaire() . '</td>';
            echo '<td>' . $ligne->getPrix() . '</td>';
            echo '<td> <form method="post" action="serviceSupprimeLigne.php">
            <input type="image" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAmklEQVRIS+2V2xFAMBBFTypQAiXQgVKojFJ0QAs60AGTGa8Jscvgh3xmNvfs3iS7hoeXeVgfDSADCk8iOVAeJSkBYqAWqkyAxhfjAvqbLJt1XwfcVMAi47uDq1Zt9L4BmKp0bdvbv2TRD9h9+mu/f4s+YNGZBqj+aB0QnFEGWiByz/iaXTqOwlAJseJ2tFZagFJXDpNmsqwgRAx/AyoZAQW7RAAAAABJRU5ErkJggg==">
            <input type="hidden" name="supprLigne" id="supprLigne" value="'. $keyLigne .'">
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
<form method="POST" action="serviceAjoutePanier.php">
    <input type="submit" name="valider" value="Valider le panier">
</form>

</html>
<?php

$_SESSION['panier'] = serialize($panier);

?>