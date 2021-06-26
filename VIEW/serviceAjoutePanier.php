<?php
session_start();
require_once('../autoload.php');

if(!isset($_POST['valider']) || !isset($_SESSION['panier'])) // Si on accepte à la page sans passer par le bouton "Valider le panier" ou que le panier n'existe pas
{
    header('Location: listeProduits.php?message=erreur');
    die(); //on redirige vers la page detailPanier.php puis on tue l'interpréteur pour ne pas executer le reste
}

/* @var Panier $panier */
$panier = unserialize($_SESSION['panier']);
DTOPanier::insert($panier); //Insere le panier dans la BDD (la fonction donne à $panier son ID SQL en meme temps)
foreach($panier->getLignes() as $ligne)
{
    /* @var Ligne $ligne */
    $ligne->setPanier($panier);
    DTOLigne::insert($ligne);
}

session_destroy();
header('Location: listeProduits.php?message=succes');

