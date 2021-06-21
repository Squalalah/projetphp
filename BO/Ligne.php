<?php

class Ligne
{
  private $quantite;
  private $ligne_id;
  
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
}

?>
