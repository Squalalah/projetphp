<?php

require_once('produitPerissable.php');
class Pain extends ProduitPerissable
{
    private $poids;

    public function __construct($dateLimiteConso, $libelle, $marque, $prixUnitaire, $qteStock, $poids, $refProd = '')
    {
        parent::__construct($dateLimiteConso, $libelle, $marque, $prixUnitaire, $qteStock, $refProd);
        $this->poids = $poids;
    }

    // PAIN

    public function getPoids()
    {
        return $this->poids;
    }

    public function setPoids($poids)
    {
        $this->poids = $poids;
    }
}