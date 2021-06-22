<?php

require_once('../DTOAuteur.php');

// TEST FONCTION SELECTBYID

echo 'Test de la fonction "selectById" :<br>';
echo '<br>';

$auteur = DTOAuteur::selectById(1); // recherche dans DTOAuteur tous les auteurs puis affichage

echo 'Prénom : ' . $auteur->getPrenom() . '<br>';
echo 'Nom : ' . $auteur->getNom() . '<br>';

echo 'Id de l\'auteur : ' . $auteur->getAuteurId() . '<br>';
echo '<br>';

// TEST FONCTION SELECTALL

echo 'Test de la fonction "selectAll" :<br>';
echo '<br>';

$tousLesAuteurs = DTOAuteur::selectAll(); 

foreach ($tousLesAuteurs as $unAuteur) {              // recherche un unique auteur puis affichage
    echo 'Prénom : ' . $unAuteur->getPrenom() . '<br>';
    echo 'Nom : ' . $unAuteur->getNom() . '<br>';
    echo 'Id de l\'auteur : ' . $unAuteur->getAuteurId() . '<br>';
    echo '<br>';
}

//TEST FONCTION selectAllCartes

echo 'Test de la fonction "selectAllcartes" :<br>';
echo '<br>';

$auteurEtCarte = DTOAuteur::selectAllCartes($auteur->getAuteurId()); 

echo 'Prénom : ' . $auteur->getPrenom() . '<br>';
echo 'Nom : ' . $auteur->getNom() . '<br>';
echo 'Id de l\'auteur : ' . $auteur->getAuteurId() . '<br>';
echo '<br>';

foreach ($auteurEtCarte as $carte) {
    echo 'Référence : ' . $carte->getRefProd() . '<br>';
    echo 'Libellé : ' . $carte->getLibelle() . '<br>';
    echo 'Marque : ' . $carte->getMarque() . '<br>';
    echo 'Prix unitaire : ' . $carte->getPrixUnitaire() . '<br>';
    echo 'Stock: ' . $carte->getQteStock() . '<br>';
    echo 'Type : ' . $carte->getType() . '<br>';
    echo '<br>';
}



