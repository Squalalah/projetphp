<?php

require_once('Ligne.php');

class Panier
{
    private $montant;
    private $lesLignes;
    private $panierId;

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

    public function supprimeLigne($objet) {
        foreach($this->lesLignes as $ligne)
        {
            if($ligne === $objet)
            {
                unset($ligne);
            }
        }
    }

    public function calculMontant() {
        $total = 0;
        /* @var Ligne $ligne */
        foreach($this->lesLignes as $ligne)
        {
            $total += $ligne->getPrix();
        }
        $this->setMontant($total);
    }

    /**
     * @return mixed
     */
    public function getPanierId()
    {
        return $this->panierId;
    }

    /**
     * @param mixed $panierId
     */
    public function setPanierId($panierId): void
    {
        $this->panierId = $panierId;
    }

    public function toString() {
        return '"'.$this->montant.'" "'.$this->lesLignes. '" "'.$this->panierId.'"';
    }
}