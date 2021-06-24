<?php
session_start();
require_once('../BO/Ligne.php');
require_once("../BO/Produit.php");
require_once("../BO/Stylo.php");
require_once('../BO/Pain.php');
require_once('../BO/Glace.php');
require_once('../BO/CartePostale.php');
require_once('../BO/Auteur.php');
require_once("../BO/Panier.php");
require_once("../DTO/DTOStylo.php");
require_once("../DTO/DTOPain.php");
require_once("../DTO/DTOGlace.php");
require_once("../DTO/DTOCartePostale.php");
require_once('../DTO/DTOProduit.php');

if(isset($_POST['ajouter'])) {

  $refProd = $_POST['refProd'];
  $type = $_POST['type'];
  $quantite = $_POST['quantite'];

  switch($type)
  {
    case 1:{
      $typeObjet=DTOStylo::selectById($refProd);
      break;
    }
    case 2: {
      $typeObjet=DTOGlace::selectById($refProd);
      break;
    }
    case 3: {
      $typeObjet=DTOPain::selectById($refProd);
      break;
    }
    case 4: {
      $typeObjet=DTOCartePostale::selectById($refProd);
      break;
    }
  }

  if(isset($_SESSION['panier']) == false) {
    $panier=new panier();
  }
  else { 
    $panier = unserialize($_SESSION['panier']);
  }

  if($panier->ProduitExisteDeja($typeObjet->getRefprod())) {
    $panier->setQuantiteLigneDejaExistante($typeObjet->getRefprod(), $quantite);
  }
  else {
    $ligne = new ligne($quantite, $typeObjet);
    $panier->ajouteLigne($ligne);
  }
  DTOProduit::deduireStock($refProd, $quantite);
  $_SESSION['panier']=serialize($panier);
  //echo $_SESSION['panier'];

  header('Location:listeProduits.php');

  /*
  echo $_POST['produit'];
  $stylo = unserialize($_POST['produit']);
  echo $stylo->getLibelle();
  */
}

// $_POST['produit'] = serialize($stylo); 
?>
