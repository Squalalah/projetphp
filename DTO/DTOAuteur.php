<?php

    require_once('../../BO/Auteur.php');

    class DTOAuteur
    {
        public static function selectById($id)
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

        public static function selectAll()
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

        public static function selectAllCartes($id)
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
        
        private static function getBdd() {
        require('localData.php');
        return new PDO($dns,$user,$mdp);
        }	
    }
?>
