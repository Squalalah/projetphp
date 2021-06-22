<?php

abstract class Produit
{
    protected $refProd; // stocke l'ID SQL
    protected $libelle;
    protected $marque;
    protected $prixUnitaire;
    protected $qteStock;
    protected $type;

    protected function __construct($libelle, $marque, $prixUnitaire, $qteStock, $type, $refProd)
    {
        $this->refProd = $refProd;
        $this->libelle = $libelle;
        $this->marque = $marque;
        $this->prixUnitaire = $prixUnitaire;
        $this->qteStock = $qteStock;
        $this->type = $type;
    }

    // LIBELLE

    public function getLibelle()
    {
        return $this->libelle;
    }

    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    // MARQUE

    public function getMarque()
    {
        return $this->marque;
    }

    public function setMarque($marque)
    {
        $this->marque = $marque;
    }

    // PRIX UNITAIRE

    public function getPrixUnitaire()
    {
        return $this->prixUnitaire;
    }

    public function setPrixUnitaire($prixUnitaire)
    {
        $this->prixUnitaire = $prixUnitaire;
    }

    // QUANTITE STOCK

    public function getQteStock()
    {
        return $this->qteStock;
    }

    public function setQteStock($qteStock)
    {
        $this->qteStock = $qteStock;
    }

    // REFERENCE PRODUIT

    public function getRefprod()
    {
        return $this->refProd;
    }

    public function setRefProd($refProd)
    {
        $this->refProd = $refProd;
    }

    // TYPE PRODUIT

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

}