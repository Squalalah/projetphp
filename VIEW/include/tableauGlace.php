<table border=1>
  <caption>LES GLACES</caption>
  <thead>
    <tr>
      <th>Libelle</th>
      <th>Parfum</th>
      <th>Marque</th>
      <th>Prix /u</th>
      <th>Stock</th>
      <th>°C conservation</th>
      <th>Date limite conso.</th>
      <th>Panier</th>
    </tr>
  </thead>

  <tbody>
    <?php
      foreach($lesGlaces as $glace){
        echo '<tr>';
          echo '<td>' . $glace->getLibelle() . '</td>';
          echo '<td>' . $glace->getParfum() . '</td>';
          echo '<td>' . $glace->getMarque() . '</td>';
          echo '<td>' . $glace->getPrixUnitaire() . '€</td>';
          echo '<td>' . $glace->getQteStock() . '</td>';
          echo '<td>' . $glace->getTemperatureConservation() . '</td>';
          echo '<td>' . $glace->getDateLimiteConso() . '</td>';
          echo '<td>';
            echo '<form method="post" action="serviceListeProduits.php">
                <input type="number" name="quantite" value="1" min="1" max="' . $glace->getQteStock() . '">
                <input type="submit" name="ajouter" value="ajouter">
                <input type="hidden" name="refProd" value="' . $glace->getRefprod() . '">
                <input type="hidden" name="type" value="' . $glace->getType() . '">
            </form>';
          echo '</td>';
        echo '</tr>';
      }
    ?>
  </tbody>
</table>