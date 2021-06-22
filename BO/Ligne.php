<?php

require_once('Ligne.php');
class Ligne
{
  private $quantite;
  private $panierId;
  private $ligneId;
  private $refProd;
  
  public function __construct($quantite, $panierId='', $ligneId='', $refProd='')
  {
    $this->setQuantite($quantite);
    $this->setPanierId($panierId);
  }

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
    return $this->ligneId;
  }

  public function setLigneId($ligneId)
  {
    $this->ligneId = $ligneId;
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
    return ' "'.$this->quantite. '" "'. $this->ligneId. '" "'. $this->refProd.'"';
  }

  /**
   * @return mixed
   */
  public function getPanierId()
  {
    return $this->panierId;
  }

  /**
   * @param mixed $panierId
   */
  public function setPanierId($panierId): void
  {
    $this->panierId = $panierId;
  }

}

?>
