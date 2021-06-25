<table border=1>
  <caption>LES STYLOS</caption>
  <thead>
    <tr>
      <th>Libelle</th>
      <th>Marque</th>
      <th>Prix /u</th>
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
          echo '<td>' . $stylo->getPrixUnitaire() . '€</td>';
          echo '<td>' . $stylo->getQteStock() . '</td>';
          echo '<td>' . $stylo->getCouleur() . '</td>';
          echo '<td>' . $stylo->getTypeMine() . '</td>';
          echo '<td>';
            echo '<form method="post" action="serviceListeProduits.php">
                <input type="number" name="quantite" value="1" min="1" max="' . $stylo->getQteStock() . '">
                <input type="submit" name="ajouter" value="ajouter">
                <input type="hidden" name="refProd" value="' . $stylo->getRefprod() . '">
                <input type="hidden" name="type" value="' . $stylo->getType() . '">
            </form>';
          echo '</td>';
        echo '</tr>';
      }
    ?>
  </tbody>
</table>