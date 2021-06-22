<?php

require_once('ProduitPerissable.php');
class Pain extends ProduitPerissable
{
    private $poids;

    public function __construct($dateLimiteConso, $libelle, $marque, $prixUnitaire, $qteStock, $type, $poids, $refProd = '')
    {
        parent::__construct($dateLimiteConso, $libelle, $marque, $prixUnitaire, $qteStock, $type, $refProd);
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