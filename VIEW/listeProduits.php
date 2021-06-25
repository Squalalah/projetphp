<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="asset/css/listeProduits.css">

  <title>Les Pro du I.T.</title>
</head>

<?php include('header.php'); ?>

<body>

  <?php

require_once("../BO/Produit.php");
require_once("../BO/Stylo.php");
require_once("../BO/Glace.php");
require_once("../BO/Pain.php");
require_once("../BO/CartePostale.php");
require_once("../BO/Auteur.php");
require_once("../BO/ProduitPerissable.php");
require_once("../BO/Panier.php");
require_once("../DTO/DTOStylo.php");
require_once("../DTO/DTOGlace.php");
require_once("../DTO/DTOPain.php");
require_once("../DTO/DTOCartePostale.php");
require_once("../DTO/DTOAuteur.php");

$lesStylos=DTOStylo::selectAll();
$lesGlaces=DTOGlace::selectAll();
$lesPains=DTOPain::selectAll();
$lesCartesPostales=DTOCartePostale::selectAll();

if(isset($_GET['radio']))
{
  $radio = $_GET['radio'];
}
else $radio = 'rd1';

if(isset($_GET['message']))
{
    switch($_GET['message'])
    {
        case 'error':
        {
            $text =  'Une erreur a eu lieu lors de la suppression du panier.<br>';
            break;
        }
        case 'succes':
        {
            $text = 'Votre panier a bien été ajouté en base de donnée.<br>';
            break;
        }
    }
}
?>

  <div class="row">
    <div class="col">
      <div class="tabs">
        <div class="tab">
          <input type="radio" id="rd1" class="inputAccordion" name="rd" <?php if($radio == 'rd1') { ?> checked <?php } ?>>
          <label class="tab-label" for="rd1">Les stylos</label>
          <div class="tab-content">
            <?php
            include('include/tableauStylo.php')
            ?>
          </div>
        </div>

        <div class="tab">
          <input type="radio" id="rd2" class="inputAccordion" name="rd" <?php if($radio == 'rd2') { ?> checked <?php } ?>>
          <label class="tab-label" for="rd2">Les glaces</label>
          <div class="tab-content">
            <?php
            include('include/tableauGlace.php')
            ?>
          </div>
        </div>

        <div class="tab">
          <input type="radio" id="rd3" class="inputAccordion" name="rd" <?php if($radio == 'rd3') { ?> checked <?php } ?>>
          <label class="tab-label" for="rd3">Les pains</label>
          <div class="tab-content">
            <?php
            include('include/tableauPain.php')
            ?>
          </div>
        </div>

        <div class="tab">
          <input type="radio" id="rd4" class="inputAccordion" name="rd" <?php if($radio == 'rd4') { ?> checked <?php } ?>>
          <label class="tab-label" for="rd4">Les cartes postales</label>
          <div class="tab-content">
            <?php
            include('include/tableauCartePostale.php')
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <br>

  <div class="row">
    <form method="post" action="detailPanier.php">
      <input type="submit" name="panierTotal" value="voir le panier">
    </form>
  </div>

</body>

</html>


