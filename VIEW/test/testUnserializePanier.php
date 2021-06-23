<?php
session_start();
require_once('../../BO/Panier.php');
require_once('../../BO/Ligne.php');
var_dump($_SESSION['panier']);
/* @var Panier $panier */
$panier = unserialize($_SESSION['panier']);

echo '<br><br><br>';

foreach($panier->getLignes() as $ligne)
{
    /* @var Ligne $ligne */
    echo $ligne->getQuantite();
}

