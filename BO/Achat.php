<?php

require_once('Ligne.php');

class Achat
{
    private $montant;
    private $lesLignes;
    private $achatId;

    public function __construct($montant)
    {
        $this->montant = $montant;
    }

    // MONTANT

    public function getMontant()
    {
        return $this->montant;
    }

    public function setMontant($montant)
    {
        $this->montant = $montant;
    }

    // LIGNE

    public function getLignes()
    {
        return $this->lesLignes;
    }

    public function getLigne($index)
    {
        if (array_key_exists($index, $this->lesLignes))
        {
            return $this->lesLignes[$index];
        }
    }

    public function ajouteLigne($ligne) {
        $this->lesLignes[] = $ligne;
    }

    public function modifieLigne($index,$quantite) {
        if(array_key_exists($index,$this->lesLignes)) {
            $this->lesLignes[$index] = $quantite;
        }
    }

    public function supprimeLigne($index) {
        if(array_key_exists($index, $this->lesLignes))
            unset($this->lesLignes[$index]);
    }

    public function calculMontant() {
        $total = 0;
        /* @var Ligne $ligne */
        foreach($this->lesLignes as $ligne)
        {
            $total += $ligne->getQuantite()*$ligne->getRefProd()->getPrixUnitaire();
        }
        return $total;
    }

    /**
     * @return mixed
     */
    public function getAchatId()
    {
        return $this->achatId;
    }

    /**
     * @param mixed $achatId
     */
    public function setAchatId($achatId): void
    {
        $this->achatId = $achatId;
    }

    public function toString() {
        
    }
}