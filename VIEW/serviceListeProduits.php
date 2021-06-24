<?php
// echo '<form method="post" action="serviceListeProduits.php">
// <input type="submit" name="ajouter" value="ajouter">
// <input type="hidden" name="produit" value="' . serialize($stylo) . '">
// </form>';

if(isset($_POST['ajouter'])){
  $stylo = unserialize($_POST['produit']);
  echo $stylo->getLibelle();
}

// $_POST['produit'] = serialize($stylo); 
?>
