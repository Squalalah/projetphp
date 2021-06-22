<?php

require_once('Ligne.php');
class Ligne
{
  private $quantite;
  private $Panier;
  private $Produit;
  
  public function __construct($quantite, $panier, $produit)
  {
    $this->setQuantite($quantite);
    $this->setPanier($panier);
    $this->setProduit($produit);
  }

  public function getQuantite()
  {
    return $this->quantite;
  }

  public function setQuantite($quantite)
  {
    $this->quantite = $quantite;
  }

  /**
   * @return mixed
   */
  public function getProduit()
  {
    return $this->Produit;
  }

  public function getPrix() {
    /* @var Produit getRefProd() */
      return $this->getProduit()->getPrixUnitaire()*$this->getQuantite();
  }

  /**
   * @param mixed $refProd
   */
  public function setProduit($produit): void
  {
    $this->Produit = $produit;
  }

  public function toString() {
    return ' "'.$this->quantite. '" "'. $this->ligneId. '" "'. $this->Produit.'"';
  }

  /**
   * @return mixed
   */
  public function getPanier()
  {
    return $this->Panier;
  }

  /**
   * @param mixed $Panier
   */
  public function setPanier($Panier): void
  {
    $this->Panier = $Panier;
  }

}

?>
