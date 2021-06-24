<?php

    require_once('../../BO/CartePostale.php');

    class DTOCartePostale implements SELECT
    {
        public static function selectById($refProd) // function retournant la carte postale par rapport à l'id SQL renseigné ($refProd)
        {
            try {
                $maCo = self::getBdd(); //Créer une connexion à la BDD et la stocke dans $maCo
                $req = "select * from produit where refProd=? and type = 4"; // recherche de tous les produits par id et par type (4 = carte postale)
                $prep = $maCo->prepare($req); //Préparation de la requête car celle-ci dispose d'un élément inconnu '?'
                $prep->bindParam(1, $refProd,PDO::PARAM_INT);  // On assigne $refProd au 1er élément inconnu '?'
                $prep->execute();  // On execute la requête

                $mesDataProduit = $prep->fetchObject(); //On récupère une seule ligne, et on la stocke dans $mesDataProduit
                $cartePostale = new CartePostale($mesDataProduit->libelle, $mesDataProduit->marque, $mesDataProduit->prixUnitaire, $mesDataProduit->qteStock, $mesDataProduit->type, $mesDataProduit->refProd);
                //On créer la carte postale en renseignant les noms des colonnes de la table SQL ($mesDataProduit->libelle)
            }

            catch (PDOException $e) 
            {
                echo 'Erreur avec la BD ! : ' . $e->getMessage() . '<br/>';
                // A la moindre erreur, on affiche le message d'erreur SQL, et on tue le script pour ne pas executer le reste (die())
                die();
            }

            return $cartePostale;
        }

        public static function selectAll() // Retourne un tableau de toutes les cartes postales
        {          
            try {
                $maCo = self::getBdd();
                $req = "select * from produit where type = 4"; // Récupérer tout les produits où type = 4 (4 = Carte Postale)
                $resultat = $maCo->query($req); // On questionne la BDD (pas de 'execute' ni 'prepare' car aucune variable inconnu '?' inséré dans la requête)
                while($mesDataProduit = $resultat->fetchObject()) // tant qu'il y a des lignes à récupérer dans la requête, on les stocke dans $mesDataProduits
                {
                    $lesCartesPostales[] = new cartePostale($mesDataProduit->libelle, $mesDataProduit->marque, $mesDataProduit->prixUnitaire, $mesDataProduit->qteStock,
                    $mesDataProduit->type, $mesDataProduit->refProd);
                    //On créer la carte postale en renseignant les noms des colonnes de la table SQL ($mesDataProduit->libelle)
                    //Et on place la carte postale créer dans le tableau $lesCartesPostales[]
                }
                // La boucle s'arrete dès lors qu'il n'y a plus de ligne à récupérer, s'il y avait 7 cartes Postales, la boucle aurait donc été traité 7 fois.
            }

            catch (PDOException $e) 
            {
                echo 'Erreur avec la BD ! : ' . $e->getMessage() . '<br/>';
                die();
            }
            return $lesCartesPostales; // On retourne le tableau $lesCartesPostales, contenant toutes les cartes postales de la BDD
        }

        private static function getBdd() {
        require('localData.php');
        return new PDO($dns,$user,$mdp);
        }	
    }
?>
