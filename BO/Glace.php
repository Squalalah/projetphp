<?php

require_once('Produit.php');
class Glace extends Produit
{
  private $parfum;
  private $temperatureConservation;
  
  public function __construct($libelle, $marque, $prixUnitaire, $qteStock, $parfum, $temperatureConservation, $refProd='')
  {
    parent::__construct($libelle, $marque, $prixUnitaire, $qteStock, $refProd);
    $this->setParfum($parfum);
    $this->setTemperatureConservation($temperatureConservation);
  }

  //  GLACE

  public function getParfum()
  {
    return $this->parfum;
  }

  public function setParfum($parfum)
  {
    $this->parfum = $parfum;
  }

  public function getTemperatureConservation()
  {
    return $this->temperatureConservation;
  }

  public function setTemperatureConservation($temperatureConservation)
  {
    $this->temperatureConservation = $temperatureConservation;
  }

}

?>
