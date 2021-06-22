<?php

require_once('CartePostale.php');

class Auteur
{
    private $prenom;
    private $nom;
    private $lesCartes;
    private $auteurId;

    public function __construct($prenom, $nom, $auteurId = '-1')
    {
        $this->setPrenom($prenom);
        $this->setNom($nom);
        $this->setAuteurId($auteurId);
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
        return $this->nom;
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

    // ID

    public function getAuteurId()
    {
        return $this->auteurId;
    }

    public function setAuteurId($auteurId)
    {
        $this->auteurId = $auteurId;
    }
}