<?php

require_once('produit.php');
class Pain extends Produit
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