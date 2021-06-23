<?php
session_start();
require_once('../../BO/Ligne.php');
require_once('../../BO/Produit.php');
require_once('../../BO/Panier.php');
require_once('../../BO/Glace.php');
require_once('../../BO/Pain.php');
require_once('../../BO/Stylo.php');
require_once('../../BO/CartePostale.php');

/*
 *
 * $_SESSION['produits'][] = serialize($produit);
 * $_SESSION['quantite'][] = 10;
 *
 */

/* @var Panier $panier */
foreach($_SESSION['cart'] as $produit)
{
    $prod = unserialize($produit['produit']);
    $quant = $produit['quantite'];
    $produits[] = $prod;
    $quantites[] = $quant;
    $lesLignes[] = new Ligne($quant, $prod);
    /* @var Glace $prod */
    echo 'Libelle : '.$prod->getLibelle().'<br>';
    echo 'Marque : '.$prod->getMarque().'<br>';
}





require_once('../../DTO/localData.php');
function getBDD() : PDO {
    return $myCO = new PDO($dns, $user, $mdp);
}



?>