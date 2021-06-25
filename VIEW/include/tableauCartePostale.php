<table border=1>
  <caption>LES CARTES POSTALES</caption>
  <thead>
    <tr>
      <th>Libelle</th>
      <th>Marque</th>
      <th>Prix /u</th>
      <th>Stock</th>
      <th>Catégorie</th>
      <th>Panier</th>
    </tr>
  </thead>

  <tbody>
    <?php
      foreach($lesCartesPostales as $cartePostale){
        echo '<tr>';
          echo '<td>' . $cartePostale->getLibelle() . '</td>';
          echo '<td>' . $cartePostale->getMarque() . '</td>';
          echo '<td>' . $cartePostale->getPrixUnitaire() . '€</td>';
          echo '<td>' . $cartePostale->getQteStock() . '</td>';
          echo '<td>' . $cartePostale->getTypeCP() . '</td>';
          echo '<td>';
            echo '<form method="post" action="serviceListeProduits.php">
                <input type="number" name="quantite" value="1" min="1" max="' . $cartePostale->getQteStock() . '">
                <input type="submit" name="ajouter" value="ajouter">
                <input type="hidden" name="refProd" value="' . $cartePostale->getRefprod() . '">
                <input type="hidden" name="type" value="' . $cartePostale->getType() . '">
            </form>';
          echo '</td>';
        echo '</tr>';
      }
    ?>
  </tbody>
</table>