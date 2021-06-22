<?php

    require_once('../../BO/CartePostale.php');

    class DTOCartePostale
    {
        public static function selectById($refProd)
        {
            try {
                $maCo = self::getBdd();
                $req = "select * from produit where refProd=? and type = 4"; // recherche de tous les produits par id et par type (4 = carte postale)
                $prep = $maCo->prepare($req);
                $prep->bindParam(1, $refProd,PDO::PARAM_INT); 
                $prep->execute(); 

                $mesDataProduit = $prep->fetchObject();
                $cartePostale = new CartePostale($mesDataProduit->libelle, $mesDataProduit->marque, $mesDataProduit->prixUnitaire, $mesDataProduit->qteStock,
                $mesDataProduit->type, $mesDataProduit->refProd);
            }

            catch (PDOException $e) 
            {
                echo 'Erreur avec la BD ! : ' . $e->getMessage() . '<br/>';
                die();
            }

            return $cartePostale;
        }

        public static function selectByType()
        {          
            try {
                $maCo = self::getBdd();
                $req = "select * from produit where type = 4";
                $resultat = $maCo->query($req);

                while($mesDataProduit = $resultat->fetchObject())
                {
                    $lesCartesPostales[] = new cartePostale($mesDataProduit->libelle, $mesDataProduit->marque, $mesDataProduit->prixUnitaire, $mesDataProduit->qteStock,
                    $mesDataProduit->type, $mesDataProduit->refProd);	
                }
            }

            catch (PDOException $e) 
            {
                echo 'Erreur avec la BD ! : ' . $e->getMessage() . '<br/>';
                die();
            }

            return $lesCartesPostales;
        }

        private static function getBdd() {
        require('localData.php');
        return new PDO($dns,$user,$mdp);
        }	
    }
?>
