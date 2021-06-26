<?php
session_start();
require_once('../autoload.php');

if(isset($_POST['indexLigne']) && isset($_SESSION['panier']) && isset($_POST['supprimeLigne'])) {

  $keyLigne=$_POST['indexLigne'];
  $panier=unserialize($_SESSION['panier']);
  /* @var Ligne $ligne */
  /* @var Panier $panier */
  $ligne = $panier->getLigne($keyLigne);
  DTOProduit::ajouterStock($ligne->getProduit()->getRefProd(), $ligne->getQuantite());
  $panier->supprimeLigne($keyLigne);
  if(count($panier->getLignes()) == 0) unset($_SESSION['panier']);
  else $_SESSION['panier']=serialize($panier);
}
elseif(isset($_POST['modifierQuantite']) && isset($_POST['quantite']) && isset($_SESSION['panier'])) {

  $keyLigne = $_POST['indexLigne'];
  $panier = unserialize($_SESSION['panier']);
  $ligne = $panier->getLigne($keyLigne);
  if($_POST['quantite'] < $ligne->getQuantite())
  {
    DTOProduit::ajouterStock($ligne->getProduit()->getRefProd(), $ligne->getQuantite()-$_POST['quantite']);
    $ligne->setQuantite($_POST['quantite']);
  }
  else if($_POST['quantite'] > $ligne->getQuantite())
  {
    DTOProduit::deduireStock($ligne->getProduit()->getRefProd(), $_POST['quantite']-$ligne->getQuantite());
    $ligne->setQuantite($_POST['quantite']);
  }
  $_SESSION['panier'] = serialize($panier);
}

header('Location: detailPanier.php');

?>
