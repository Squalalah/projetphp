<?php

require_once('Produit.php');
class Ligne
{
  private $quantite;
  private $ligne_id;
  private $refProd;
  
  public function __construct($quantite, $ligne_id='')
  {
    $this->setQuantite($quantite);
    $this->setLigneId($ligne_id);
  }

  //  LIGNE

  public function getQuantite()
  {
    return $this->quantite;
  }

  public function setQuantite($quantite)
  {
    $this->quantite = $quantite;
  }

  public function getLigneId()
  {
    return $this->ligne_id;
  }

  public function setLigneId($ligne_id)
  {
    $this->ligne_id = $ligne_id;
  }

  /**
   * @return mixed
   */
  public function getRefProd()
  {
    return $this->refProd;
  }

  public function getPrix() {
    /* @var Produit getRefProd() */
      return $this->getRefProd()->getPrixUnitaire()*$this->getQuantite();
  }

  /**
   * @param mixed $refProd
   */
  public function setProduit($produit): void
  {
    $this->refProd = $produit;
  }

  public function toString() {
    return ' "'.$this->quantite. '" "'. $this->ligne_id. '" "'. $this->refProd.'"';
  }

}

?>
