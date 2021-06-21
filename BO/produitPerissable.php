<?php
require_once('produit.php');
abstract class ProduitPerissable extends Produit {

    protected string $dateLimiteConso;

    public function __construct($dateLimiteConso, $libelle, $marque, $prixUnitaire, $qteStock, $refProd) {
        parent::__construct($libelle, $marque, $prixUnitaire, $qteStock, $refProd);
        $this->dateLimiteConso = $dateLimiteConso;
    }
}