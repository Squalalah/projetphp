<?php

require_once('../DTOAuteur.php');

// TEST FONCTION SELECTBYID

echo 'Test de la fonction "selectById" :<br>';
echo '<br>';

$Auteur = DTOAuteur::selectById(2); // recherche dans DTOAuteur tous les auteurs puis affichage

echo 'Prénom : ' . $Auteur->getPrenom() . '<br>';
echo 'Nom : ' . $Auteur->getNom() . '<br>';

echo 'Id de l\'auteur : ' . $Auteur->getAuteurId() . '<br>';
echo '<br>';

// TEST FONCTION SELECTALL

echo 'Test de la fonction "selectAll" :<br>';
echo '<br>';

$toutesLesAuteurs = DTOAuteur::selectAll(); 

foreach ($toutesLesAuteurs as $unAuteur) {              // recherche un unique auteur puis affichage
    echo 'Prénom : ' . $unAuteur->getPrenom() . '<br>';
    echo 'Nom : ' . $unAuteur->getNom() . '<br>';
    echo 'Id de l\'auteur : ' . $unAuteur->getAuteurId() . '<br>';
    echo '<br>';
}

//TEST FONCTION selectAllCartes()
