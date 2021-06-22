<?php

require_once('Produit.php');
class Stylo extends Produit
{
  private $couleur;
  private $typeMine;
  
  public function __construct($libelle, $marque, $prixUnitaire, $qteStock, $couleur, $typeMine, $refProd='')
  {
    parent::__construct($libelle, $marque, $prixUnitaire, $qteStock, $refProd = '');
    $this->setCouleur($couleur);
    $this->setTypeMine($typeMine);
  }

  //  STYLO

  public function getCouleur()
  {
    return $this->couleur;
  }

  public function setCouleur($couleur)
  {
    $this->couleur = $couleur;
  }

  public function getTypeMine()
  {
    return $this->typeMine;
  }

  public function setTypeMine($typeMine)
  {
    $this->typeMine = $typeMine;
  }

}

?>
