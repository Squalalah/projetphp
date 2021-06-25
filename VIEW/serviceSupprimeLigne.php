<?php
session_start();
require_once('../BO/Produit.php');
require_once('../BO/Glace.php');
require_once('../BO/Stylo.php');
require_once('../BO/Pain.php');
require_once('../BO/ProduitPerissable.php');
require_once('../BO/Panier.php');
require_once('../BO/Ligne.php');
require_once('../BO/CartePostale.php');
require_once('../BO/Auteur.php');
require_once('../DTO/DTOPanier.php');
require_once('../DTO/DTOLigne.php');


if(isset($_POST['supprLigne'])||isset($_SESSION['panier'])) {
  $keyLigne=$_POST['supprLigne'];
  $panier=unserialize($_SESSION['panier']);
  $panier->supprimeLigne($keyLigne);
  $_SESSION['panier']=serialize($panier);
}

header('Location:detailPanier.php');

?>
