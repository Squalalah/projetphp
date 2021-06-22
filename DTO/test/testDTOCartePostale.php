<?php

require_once('../DTOCartePostale.php');

self::selectById($refProd);



echo '<br>';

echo 'libelle : ' . $test->getLibelle() . '<br>';
echo 'marque : ' . $test->getMarque() . '<br>';
echo 'prix hunitaire : ' . $test->getPrixUnitaire() . '<br>';
echo 'stock : ' . $test->getQteStock() . '<br>';
echo 'type de produit : ' . $test->getType() . '<br>';
echo 'Id de la carte postale : ' . $test->getRefProd() . '<br>';
