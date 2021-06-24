<?php

require_once("../BO/Produit.php");
require_once("../BO/Stylo.php");
require_once("../BO/Panier.php");
require_once("../DTO/DTOStylo.php");

$lesStylos=DTOStylo::selectAll();

?>

<table border = 1>
  <thead>
    <tr>
      <th>Libelle</th>
      <th>Marque</th>
      <th>Prix Unitaire</th>
      <th>Stock</th>
      <th>Couleur</th>
      <th>Type Mine</th>
      <TH>Panier</TH>
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
                  <input type="submit" name="ajouter" value="ajouter">
                  <input type="hidden" name="produit" value="' . serialize($stylo) . '">
              </form>';
          echo '</tr>';
        }
      ?>
    </tr>
  </tbody>
</table>
