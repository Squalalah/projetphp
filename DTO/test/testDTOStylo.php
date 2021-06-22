<?php

require_once('../DTOStylo.php');


// Test pour selectionner tous les stylos

$tousLesStylos=DTOStylo::selectAll();

foreach($tousLesStylos as $stylo)
{
  echo 'Libelle : ' .$stylo->getLibelle().
  ', marque : ' .$stylo->getMarque().
  ', prix : ' .$stylo->getPrixUnitaire().
  ', stock : ' .$stylo->getQteStock().
  ', couleur : ' .$stylo->getCouleur().
  ', type mine : '.$stylo->getTypeMine().
  ', ref : '.$stylo->getRefProd();
  echo '<br>';
  echo '----------------------------------------------- <br> ';
}


// Test pour selectionner un stylo par ID

$unStylo=DTOStylo::selectById(3);
echo 'Stylo numéro ' .$stylo->getRefProd(). '<br>';
echo 'Libelle : ' .$stylo->getLibelle().
', marque : ' .$stylo->getMarque().
', prix : ' .$stylo->getPrixUnitaire().
', stock : ' .$stylo->getQteStock().
', couleur : ' .$stylo->getCouleur().
', type mine : '.$stylo->getTypeMine();
