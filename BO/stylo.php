<?php

require_once('produit.php');
class Stylo extends Produit
{
  private $couleur;
  private $typeMine;
  
  public function __construct(string $couleur, string $typeMine, $refProd='')
  {
    $this->setCouleur($couleur);
    $this->setTypeMine($typeMine);
    $this->setRefProd($refProd);
  }

  public function getCouleur()
  {
    return $this->couleur;
  }

  public function setCouleur(string $couleur)
  {
    $this->couleur = $couleur;
  }

  public function getTYpeMine()
  {
    return $this->typeMine;
  }

  public function setTypeMine(string $typeMine)
  {
    $this->typeMine = $typeMine;
  }

  public function getRefprod()
  {
      return $this->refProd;
  }

  public function setRefProd($refProd)
  {
      $this->refProd = $refProd;
  }

}

?>
