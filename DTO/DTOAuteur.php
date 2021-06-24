<?php

    class DTOAuteur implements SELECT
    {
        public static function selectById($id) // Renvoit un objet de type "Auteur" correspondant à l'ID SQL indiqué ($id)
        {
            try {
                $maCo = self::getBdd();
                $req = "select * from auteur where id = ?"; 
                $prep = $maCo->prepare($req);
                $prep->bindParam(1, $id,PDO::PARAM_INT); 
                $prep->execute(); 

                $mesDataAuteur = $prep->fetchObject();
                if($mesDataAuteur !== false)
                { 
                    $auteur = new Auteur($mesDataAuteur->prenom, $mesDataAuteur->nom, $mesDataAuteur->id);
                }
                else $auteur = new Auteur('ERREUR', 'ERREUR');
            }

            catch (PDOException $e) 
            {
                echo 'Erreur avec la BD ! : ' . $e->getMessage() . '<br/>';
                die();
            }

            return $auteur;
        }

        public static function selectAll() // Renvoit un tableau de type "Auteur" contenant tout les auteurs
        {          
            try {
                $maCo = self::getBdd();
                $req = "select * from auteur";
                $resultat = $maCo->query($req);

                while($mesDataAuteur = $resultat->fetchObject())
                {
                    $lesAuteurs[] = new Auteur($mesDataAuteur->prenom, $mesDataAuteur->nom, $mesDataAuteur->id);	
                }
            }

            catch (PDOException $e) 
            {
                echo 'Erreur avec la BD ! : ' . $e->getMessage() . '<br/>';
                die();
            }

            return $lesAuteurs;
        }

        //Renvoit un tableau de type 'CartePostale' contenant toutes les cartesPostale créer par l'auteur avec l'ID SQL $id.
        public static function selectAllCartes($id)
        {
            try {
                $maCo = self::getBdd();
                $req = "select produit.* from auteur inner join Auteur_has_CP on auteur.id = Auteur_has_CP.auteur_id inner join produit on Auteur_has_CP.produit_id = produit.refProd where auteur.id = ?"; 
                $prep = $maCo->prepare($req);
                $prep->bindParam(1, $id,PDO::PARAM_INT); 
                $prep->execute(); 

                while($auteurEtCartes = $prep->fetchObject())
                {
                    $lesCartes[] = new CartePostale($auteurEtCartes->libelle, $auteurEtCartes->marque, $auteurEtCartes->prixUnitaire, $auteurEtCartes->qteStock, $auteurEtCartes->typeCP, $auteurEtCartes->refProd);
                }
            }

            catch (PDOException $e) 
            {
                echo 'Erreur avec la BD ! : ' . $e->getMessage() . '<br/>';
                die();
            }

            return $lesCartes;
        }

        private static function getBdd() {
        require('localData.php');
        return new PDO($dns,$user,$mdp);
        }	
    }
?>