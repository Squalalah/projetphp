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

?>

<table border = 1>
<caption>LES STYLOS</caption>
  <thead>
    <tr>
      <th>Libelle</th>
      <th>Marque</th>
      <th>Prix Unitaire</th>
      <th>Stock</th>
      <th>Couleur</th>
      <th>Type Mine</th>
      <th>Panier</th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach($lesStylos as $stylo){
        echo '<tr>';
          echo '<td>' . $stylo->getLibelle() . '</td>';
          echo '<td>' . $stylo->getMarque() . '</td>';
          echo '<td>' . $stylo->getPrixUnitaire() . '</td>';
          echo '<td>' . $stylo->getQteStock() . '</td>';
          echo '<td>' . $stylo->getCouleur() . '</td>';
          echo '<td>' . $stylo->getTypeMine() . '</td>';
          echo '<td>';
            echo '<form method="post" action="serviceListeProduits.php">
                <input type="number" name="quantite" value="quantite">
                <input type="submit" name="ajouter" value="ajouter">
                <input type="hidden" name="refProd" value="' . $stylo->getRefprod() . '">
                <input type="hidden" name="type" value="' . $stylo->getType() . '">
            </form>';
        echo '</tr>';
      }
    ?>
  </body>
</table>

<br>

<table border = 1>
<caption>LES PAINS</caption>
  <thead>
    <tr>
      <th>Libelle</th>
      <th>Marque</th>
      <th>Prix Unitaire</th>
      <th>Stock</th>
      <th>Type</th>
      <th>Poids</th>
      <th>Date limite de consommation</th>
      <th>Panier</th>
    </tr>
  </thead>

  <tbody>
    <?php
      foreach($lesPains as $pain){
        echo '<tr>';
          echo '<td>' . $pain->getLibelle() . '</td>';
          echo '<td>' . $pain->getMarque() . '</td>';
          echo '<td>' . $pain->getPrixUnitaire() . '</td>';
          echo '<td>' . $pain->getQteStock() . '</td>';
          echo '<td>' . $pain->getType() . '</td>';
          echo '<td>' . $pain->getPoids() . '</td>';
          echo '<td>' . $pain->getDateLimiteConso() . '</td>';
          echo '<td>';
            echo '<form method="post" action="serviceListeProduits.php">
                <input type="number" name="quantite" value="quantite">
                <input type="submit" name="ajouter" value="ajouter">
                <input type="hidden" name="refProd" value="' . $stylo->getRefprod() . '">
                <input type="hidden" name="type" value="' . $stylo->getType() . '">
            </form>';
        echo '</tr>';
      }
    ?>
  </tbody>
</table>

<br>

<table border = 1>
<caption>LES GLACES</caption>
  <thead>
    <tr>
      <th>Libelle</th>
      <th>Marque</th>
      <th>Prix Unitaire</th>
      <th>Stock</th>
      <th>Type</th>
      <th>Parfum</th>
      <th>Température de conservation</th>
      <th>Date limite de consommation</th>
      <th>Panier</th>
    </tr>
  </thead>

  <tbody>
    <?php
      foreach($lesGlaces as $glace){
        echo '<tr>';
          echo '<td>' . $glace->getLibelle() . '</td>';
          echo '<td>' . $glace->getMarque() . '</td>';
          echo '<td>' . $glace->getPrixUnitaire() . '</td>';
          echo '<td>' . $glace->getQteStock() . '</td>';
          echo '<td>' . $glace->getType() . '</td>';
          echo '<td>' . $glace->getParfum() . '</td>';
          echo '<td>' . $glace->getTemperatureConservation() . '</td>';
          echo '<td>' . $glace->getDateLimiteConso() . '</td>';
          echo '<td>';
            echo '<form method="post" action="serviceListeProduits.php">
                <input type="number" name="quantite" value="quantite">
                <input type="submit" name="ajouter" value="ajouter">
                <input type="hidden" name="refProd" value="' . $stylo->getRefprod() . '">
                <input type="hidden" name="type" value="' . $stylo->getType() . '">
            </form>';
        echo '</tr>';
      }
    ?>
  </tbody>
</table>

<br>

<table border = 1>
<caption>LES GLACES</caption>
  <thead>
    <tr>
      <th>Libelle</th>
      <th>Marque</th>
      <th>Prix Unitaire</th>
      <th>Stock</th>
      <th>Type de carte postale</th>
      <th>Panier</th>
    </tr>
  </thead>

  <tbody>
    <?php
      foreach($lesCartesPostales as $cartePostale){
        echo '<tr>';
          echo '<td>' . $cartePostale->getLibelle() . '</td>';
          echo '<td>' . $cartePostale->getMarque() . '</td>';
          echo '<td>' . $cartePostale->getPrixUnitaire() . '</td>';
          echo '<td>' . $cartePostale->getQteStock() . '</td>';
          echo '<td>' . $cartePostale->getTypeCP() . '</td>';
          echo '<td>';
            echo '<form method="post" action="serviceListeProduits.php">
                <input type="number" name="quantite" value="quantite">
                <input type="submit" name="ajouter" value="ajouter">
                <input type="hidden" name="refProd" value="' . $stylo->getRefprod() . '">
                <input type="hidden" name="type" value="' . $stylo->getType() . '">
            </form>';
        echo '</tr>';
      }
    ?>
  </tbody>
</table>

