<?php

// revoir le lien avec la table Ligne

require_once('../../BO/Panier.php');
require_once('InterfaceDTO.php');
class DTOPanier implements INSERT
{
	public static function insert($data)
	{
		try {
			$maCo=self::getBdd();
			$req="INSERT INTO panier (montant) VALUES(?)";
			$prep=$maCo->prepare($req);
			$montant = $data->getMontant();
			$prep->bindParam(1,$montant); 
			$prep->execute(); 
			$data->setPanierId($maCo->lastInsertId());
		} 
		catch (PDOException $e) 
		{
			echo 'Erreur avec la BD!: ' .$e->getMessage() .'<br/>';
			die();
		}
	}

	private static function getBdd() {
	require('localData.php');
	return new PDO($dns,$user,$mdp);
	}	
}

?>
