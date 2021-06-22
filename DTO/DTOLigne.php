<?php


require_once('../../BO/Ligne.php');
require_once('InterfaceDTO.php');
class DTOLigne implements CRD
{
    /* @var Ligne $data */
    public static function insert($data)
    {
        try {
            $maCo=self::getBdd();
            $req='INSERT INTO Ligne (quantite, produit_id, panier_id) VALUES (?,?,?)';
            $prep=$maCo->prepare($req);
            $quantite = $data->getQuantite();
            $panierId = $data->getPanierId();
            $produitId = $data->getRefProd();
            $prep->bindParam(1, $quantite, PDO::PARAM_INT);
            $prep->bindParam(2, $produitId, PDO::PARAM_INT);
            $prep->bindParam(3, $panierId, PDO::PARAM_INT);
            $prep->execute();
            $data->setLigneId($maCo->lastInsertId());
        }
        catch (PDOException $e)
        {
            echo 'Erreur avec la BD!: ' .$e->getMessage() .'<br/>';
            die();
        }
    }
    public static function delete($panierId, $refProd = '')
    {
        try {
            $maCo=self::getBdd();
            $req='DELETE from Ligne WHERE panier_id = ? AND produit_id = ?';
            $prep=$maCo->prepare($req);
            $prep->bindParam(1,$panierId,PDO::PARAM_INT);
            $prep->bindParam(2, $refProd, PDO::PARAM_INT);
            $prep->execute();

            
        }
        catch (PDOException $e) {
            echo 'Erreur avec la BD!: ' .$e->getMessage() .'<br/>';
            die();
        }
    }
    public static function selectAllByPanier($id)
    {
        try {
            $maCo=self::getBdd();
            $req="select * from Ligne where panier_id=?";
            $prep=$maCo->prepare($req);
            $prep->bindParam(1,$id,PDO::PARAM_INT);
            $prep->execute();
            while($mesDataProduit=$prep->fetchObject())
            {
                $lesLignes[] = new Ligne($mesDataProduit->quantite, $mesDataProduit->id);
            }
        }
        catch (PDOException $e)
        {
            echo 'Erreur avec la BD!: ' .$e->getMessage() .'<br/>';
            die();
        }
        return $lesLignes;
    }

    public static function selectAll()
    {
        try {
            $maCo=self::getBdd();
            $req="select * from Ligne";
            $resultat=$maCo->query($req);
            while($mesDataProduit=$resultat->fetchObject())
            {
                $lesLignes[] = new Ligne($mesDataProduit->quantite, $mesDataProduit->panier_id);
            }
        }
        catch (PDOException $e)
        {
            echo 'Erreur avec la BD!: ' .$e->getMessage() .'<br/>';
            die();
        }
        return $lesLignes;
    }

    private static function getBdd() {
        require('localData.php');
        return new PDO($dns,$user,$mdp);
    }
}

?>
