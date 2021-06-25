<table border=1>
  <caption>LES PAINS</caption>
  <thead>
    <tr>
      <th>Libelle</th>
      <th>Marque</th>
      <th>Prix /u</th>
      <th>Stock</th>
      <th>Poids</th>
      <th>Date limite conso.</th>
      <th>Panier</th>
    </tr>
  </thead>

  <tbody>
    <?php
      foreach($lesPains as $pain){
        echo '<tr>';
          echo '<td>' . $pain->getLibelle() . '</td>';
          echo '<td>' . $pain->getMarque() . '</td>';
          echo '<td>' . $pain->getPrixUnitaire() . '€</td>';
          if($pain->getQteStock() == 0) echo '<td id="zerostock">' . $pain->getQteStock() . '</td>';
          else echo '<td>' . $pain->getQteStock() . '</td>';
          echo '<td>' . $pain->getPoids() . '</td>';
          echo '<td>' . $pain->getDateLimiteConso() . '</td>';
          echo '<td>';
            echo '<form method="post" action="serviceListeProduits.php">
                <input type="number" name="quantite" value="1" min="1" max="' . $pain->getQteStock() . '">
                <input type="submit" name="ajouter" value="ajouter">
                <input type="hidden" name="refProd" value="' . $pain->getRefprod() . '">
                <input type="hidden" name="type" value="' . $pain->getType() . '">
            </form>';
          echo '</td>';
        echo '</tr>';
      }
    ?>
  </tbody>
</table>