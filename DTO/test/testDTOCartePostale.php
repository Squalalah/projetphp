<?php

require_once('../DTOCartePostale.php');

// TEST FONCTION SELECTBYID

echo 'Test de la fonction "selectById" :<br>';
echo '<br>';


$CartePostale = DTOCartePostale::selectById(4); // recherche dans DTOCartePostale toutes les cartes postales puis affichage

echo 'libelle : ' . $CartePostale->getLibelle() . '<br>';
echo 'marque : ' . $CartePostale->getMarque() . '<br>';
echo 'prix hunitaire : ' . $CartePostale->getPrixUnitaire() . '<br>';
echo 'stock : ' . $CartePostale->getQteStock() . '<br>';
echo 'type de produit : ' . $CartePostale->getType() . '<br>';
echo 'Id de la carte postale : ' . $CartePostale->getRefProd() . '<br>';
echo '<br>';

// TEST FONCTION SELECTBYID

echo 'Test de la fonction "selectByType" :<br>';
echo '<br>';


$toutesLesCP = DTOCartePostale::selectAll(); 

foreach ($toutesLesCP as $carte) {              // recherche pour chaque carte postale dans toutes les cartes postales puis affichage
    echo 'libelle : ' . $carte->getLibelle() . '<br>';
    echo 'marque : ' . $carte->getMarque() . '<br>';
    echo 'prix hunitaire : ' . $carte->getPrixUnitaire() . '<br>';
    echo 'stock : ' . $carte->getQteStock() . '<br>';
    echo 'type de produit : ' . $carte->getType() . '<br>';
    echo 'Id de la carte postale : ' . $carte->getRefProd() . '<br>';
    echo '<br>';
}

