<?php

require_once('../DTOCartePostale.php');

$CartePostale = DTOCartePostale::selectById(4);

echo 'test libelle : '. $CartePostale->getLibelle();


//$tableau = DTOCartePostale::selectByType();


echo '<br>';

echo 'libelle : ' . $CartePostale->getLibelle() . '<br>';
echo 'marque : ' . $CartePostale->getMarque() . '<br>';
echo 'prix hunitaire : ' . $CartePostale->getPrixUnitaire() . '<br>';
echo 'stock : ' . $CartePostale->getQteStock() . '<br>';
echo 'type de produit : ' . $CartePostale->getType() . '<br>';
echo 'Id de la carte postale : ' . $CartePostale->getRefProd() . '<br>';
