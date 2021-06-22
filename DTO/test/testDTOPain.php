<?php
require_once('../DTOPain.php');


$pain = DTOPain::selectById(1);


//private $poids;
//
//    public function __construct($dateLimiteConso, $libelle, $marque, $prixUnitaire, $qteStock, $type, $poids, $refProd = '')
echo 'dateLimiteConso :'.$pain->getDateLimiteConso()."<br>";
echo 'Libelle :'.$pain->getLibelle()."<br>";
echo 'Marque :'.$pain->getMarque()."<br>";
echo 'prixUnitaire :'.$pain->getPrixUnitaire()."<br>";
echo 'qteStock :'.$pain->getQteStock()."<br>";
echo 'Poids :'.$pain->getPoids()."<br>";
echo 'type :'.$pain->getType()."<br>";
echo 'refProd :'.$pain->getRefprod()."<br>";
