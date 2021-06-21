<?php

require_once('produitPerissable.php');
class Pain extends produitPerissable
{
    private $poids;

    public function __construct($libelle, $marque, $prixUnitaire, $qteStock, $poids, $refProd = '')
    {
        parent::__construct($libelle, $marque, $prixUnitaire, $qteStock, $refProd = '');
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