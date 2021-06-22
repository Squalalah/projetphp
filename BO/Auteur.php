<?php

require_once('CartePostale.php');

class Auteur
{
    private $prenom;
    private $nom;
    private $lesCartes;

    public function __construct($prenom, $nom)
    {
        $this->prenom = $prenom;
        $this->nom = $nom;
    }

    // PRENOM

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    // NOM

    public function getNom()
    {
        $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    // AJOUTER UNE CARTE
    
    public function ajouterCarte($lesCartes)
    {
        $this->lesCartes[] = $lesCartes;
    }
}