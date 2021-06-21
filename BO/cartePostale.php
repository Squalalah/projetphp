<?php

require_once('produit.php');

class CartePostale extends Produit
{
    private $type;

    public function __construct($libelle, $marque, $prixUnitaire, $qteStock, $type, $refProd = '')
    {
        parent::__construct($libelle, $marque, $prixUnitaire, $qteStock, $refProd = '');
        $this->type = $type;
    }

    // TYPE

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }
}