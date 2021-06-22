<?php

require_once('../DTOStylo.php');

$tousLesStylos=DTOStylo::selectByType();

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

$unStylo=DTOStylo::selectById(3);
echo 'Stylo numéro ' .$stylo->getRefProd(). '<br>';
echo 'Libelle : ' .$stylo->getLibelle().
', marque : ' .$stylo->getMarque().
', prix : ' .$stylo->getPrixUnitaire().
', stock : ' .$stylo->getQteStock().
', couleur : ' .$stylo->getCouleur().
', type mine : '.$stylo->getTypeMine();
