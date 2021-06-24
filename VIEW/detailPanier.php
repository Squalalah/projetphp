<?php
session_start();
require_once('../BO/Panier.php');
require_once('../BO/Stylo.php');
require_once('../BO/Ligne.php');


$panier = unserialize($_SESSION['panier']);
$panier->calculMontant();

echo $panier->getMontant();
?>


