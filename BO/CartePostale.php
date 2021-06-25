<?php

require_once('Produit.php');

class CartePostale extends Produit
{
    private $typeCP;
    private $lesAuteurs;

    public function __construct($libelle, $marque, $prixUnitaire, $qteStock, $type, $typeCP, $refProd = '')
    {
        parent::__construct($libelle, $marque, $prixUnitaire, $qteStock, $type, $refProd);
        $this->typeCP = $typeCP;
    }

    // type

    public function getTypeCP()
    {
        return $this->typeCP;
    }

    public function setTypeCP($typeCP)
    {
        $this->typeCP = $typeCP;
    }

    public function ajouterAuteur($lesAuteurs)
    {
        $this->lesAuteurs[] = $lesAuteurs;
    }
}