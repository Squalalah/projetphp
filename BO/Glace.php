<?php

require_once('ProduitPerissable.php.php');
class Glace extends ProduitPerissable
{
  private $parfum;
  private $temperatureConservation;
  
  public function __construct($dateLimiteConso, $libelle, $marque, $prixUnitaire, $qteStock, $type, $parfum, $temperatureConservation, $refProd='')
  {
    parent::__construct($dateLimiteConso, $libelle, $marque, $prixUnitaire, $qteStock, $type, $refProd,);
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
