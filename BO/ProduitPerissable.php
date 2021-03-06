<?php
require_once('Produit.php');
abstract class ProduitPerissable extends Produit {

    protected $dateLimiteConso;

    public function __construct($dateLimiteConso, $libelle, $marque, $prixUnitaire, $qteStock, $type, $refProd) {
        parent::__construct($libelle, $marque, $prixUnitaire, $qteStock, $type, $refProd);
        $this->setDateLimiteConso($dateLimiteConso);
    }
    public function getDateLimiteConso()
    {
        return $this->dateLimiteConso;
    }

    public function setDateLimiteConso($dateLimiteConso)
    {
        $this->dateLimiteConso = $dateLimiteConso;
    }
}