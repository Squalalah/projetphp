<?php

require_once('Ligne.php');

class Achat
{
    private $montant;
    private $lesLignes;

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
}