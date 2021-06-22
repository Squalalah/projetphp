<?php


require_once('../../BO/Ligne.php');
require_once('InterfaceDTO.php');
class DTOLigne implements CRD
{
    public static function insert($data)
    {

    }
    public static function delete($id)
    {

    }
    public static function selectById($refProd)
    {
        try {
            $maCo=self::getBdd();
            $req="select * from produit where refProd=? AND type = 3";
            $prep=$maCo->prepare($req);
            $prep->bindParam(1,$refProd,PDO::PARAM_INT);
            $prep->execute();
            $mesDataProduit=$prep->fetchObject();
            //($dateLimiteConso, $libelle, $marque, $prixUnitaire, $qteStock, $type, $poids, $refProd = '')
            $pain=new Pain($mesDataProduit->dateLimiteConso, $mesDataProduit->libelle, $mesDataProduit->marque, $mesDataProduit->prixUnitaire, $mesDataProduit->qteStock,$mesDataProduit->type,
                $mesDataProduit->poids, $mesDataProduit->refProd);
        }
        catch (PDOException $e)
        {
            echo 'Erreur avec la BD!: ' .$e->getMessage() .'<br/>';
            die();
        }
        return $pain;
    }

    public static function selectAll()
    {
        try {
            $maCo=self::getBdd();
            $req="select * from produit where type = 3";
            $resultat=$maCo->query($req);
            while($mesDataProduit=$resultat->fetchObject())
            {
                $lesPains[]=new Pain($mesDataProduit->dateLimiteConso, $mesDataProduit->libelle, $mesDataProduit->marque, $mesDataProduit->prixUnitaire, $mesDataProduit->qteStock,$mesDataProduit->type,
                    $mesDataProduit->poids, $mesDataProduit->refProd);
            }
        }
        catch (PDOException $e)
        {
            echo 'Erreur avec la BD!: ' .$e->getMessage() .'<br/>';
            die();
        }
        return $lesPains;
    }

    private static function getBdd() {
        require('localData.php');
        return new PDO($dns,$user,$mdp);
    }
}

?>
