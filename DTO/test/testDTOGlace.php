<?php

require_once('../DTOGlace.php');


// Test pour selectionner toutes les glaces

$toutesLesGLaces=DTOGlace::selectAll();

foreach($toutesLesGLaces as $glace)
{
  echo 'Libelle : ' .$glace->getLibelle().
  ', date limite de conso : ' .$glace->getDateLimiteConso().
  ', marque : ' .$glace->getMarque().
  ', prix : ' .$glace->getPrixUnitaire().
  ', stock : ' .$glace->getQteStock().
  ', parfum : ' .$glace->getParfum().
  ', temperature : '.$glace->getTemperatureConservation().
  ', ref : '.$glace->getRefProd();
  echo '<br>';
  echo '----------------------------------------------- <br> ';
}


// Test pour selectionner un glace par ID

$uneGlace=DTOGLace::selectById(2);
echo 'Stylo numéro ' .$glace->getRefProd(). '<br>';
echo 'Libelle : ' .$glace->getLibelle().
', date limite de conso : ' .$glace->getDateLimiteConso().
  ', marque : ' .$glace->getMarque().
  ', prix : ' .$glace->getPrixUnitaire().
  ', stock : ' .$glace->getQteStock().
  ', parfum : ' .$glace->getParfum().
  ', temperature : '.$glace->getTemperatureConservation();
