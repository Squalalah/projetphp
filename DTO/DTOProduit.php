<?php
// revoir le lien avec la table Ligne

require_once('../BO/Stylo.php');
require_once ('../BO/CartePostale.php');
require_once ('../BO/Pain.php');
require_once ('../BO/Glace.php');
require_once('InterfaceDTO.php');

class DTOPanier implements SELECT
{
    public static function selectById($id)
    {
        try {
            $maCo = getBDD();
            $req="select * from produit where refProd=?";
            $prep=$maCo->prepare($req);
            $prep->bindParam(1,$id,PDO::PARAM_INT);
            $prep->execute();
            $mesDataProduit=$prep->fetchObject();
            switch($mesDataProduit->type) {
                case 1:
                {
                    return new Stylo($mesDataProduit->libelle, $mesDataProduit->marque, $mesDataProduit->prixUnitaire, $mesDataProduit->qteStock, $mesDataProduit->type, $mesDataProduit->couleur, $mesDataProduit->typeMine, $mesDataProduit->refProd);
                }
                case 2:
                {
                    return new Glace($mesDataProduit->dateLimiteConso, $mesDataProduit->libelle, $mesDataProduit->marque, $mesDataProduit->prixUnitaire, $mesDataProduit->qteStock, $mesDataProduit->type, $mesDataProduit->parfum, $mesDataProduit->temperature, $mesDataProduit->refProd);
                }
                case 3:
                {
                    return new Pain($mesDataProduit->dateLimiteConso, $mesDataProduit->libelle, $mesDataProduit->marque, $mesDataProduit->prixUnitaire, $mesDataProduit->qteStock, $mesDataProduit->type, $mesDataProduit->poids, $mesDataProduit->refProd);
                }
                case 4:
                {
                    return new CartePostale($mesDataProduit->libelle, $mesDataProduit->marque, $mesDataProduit->prixUnitaire, $mesDataProduit->qteStock, $mesDataProduit->typeCP, $mesDataProduit->refProd);
                }
            }
        }
        catch (PDOException $e) {
            echo 'Erreur avec la BD!: ' .$e->getMessage() .'<br/>';
            die();
        }
    }

    public static function selectAll()
    {

    }

    private static function getBdd() {
        require('localData.php');
        return new PDO($dns,$user,$mdp);
    }


}