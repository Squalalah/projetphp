<?php
require_once('Produit.php');
abstract class ProduitPerissable extends Produit {

    protected $dateLimiteConso;

    public function __construct($dateLimiteConso, $libelle, $marque, $prixUnitaire, $qteStock, $refProd, $produitId) {
        parent::__construct($libelle, $marque, $prixUnitaire, $qteStock, $refProd, $produitId);
        $this->dateLimiteConso = $dateLimiteConso;
    }
}