<?php
require_once('../DTOPain.php');


$pain = DTOPain::selectById(1);

echo 'dateLimiteConso :'.$pain->getDateLimiteConso()."<br>";
echo 'Libelle :'.$pain->getLibelle()."<br>";
echo 'Marque :'.$pain->getMarque()."<br>";
echo 'prixUnitaire :'.$pain->getPrixUnitaire()."<br>";
echo 'qteStock :'.$pain->getQteStock()."<br>";
echo 'Poids :'.$pain->getPoids()."<br>";
echo 'type :'.$pain->getType()."<br>";
echo 'refProd :'.$pain->getRefprod()."<br>";
