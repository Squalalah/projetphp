<?php

class Stylo

{
  private $couleur;
  private $typeMine;
  
  public function __construct(string $uneCouleur, string $unTypeMine)
  {
    $this->setCouleur($uneCouleur);
    $this->setTypeMine($unTypeMine);
  }

  public function getCouleur()
  {
    return $this->couleur;
  }

  public function setCouleur(string $uneCouleur)
  {
    $this->couleur = $uneCouleur;
  }

  public function getTYpeMine()
  {
    return $this->typeMine;
  }

  public function setTypeMine(string $unTypeMine)
  {
    $this->typeMine = $unTypeMine;
  }

}

?>
