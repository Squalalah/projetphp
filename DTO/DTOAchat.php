<?php

// revoir le lien avec la table Ligne

require_once('../../BO/Achat.php');
require_once('InterfaceDTO.php');
class DTOAchat implements INSERT
{
	public static function insert($data)
	{
		try {
			$maCo=self::getBdd();
			$req="INSERT INTO achat (montant) VALUES(?)";
			$prep=$maCo->prepare($req);
			$montant = $data->getMontant();
			$prep->bindParam(1,$montant); 
			$prep->execute(); 
			$data->setAchatId($maCo->lastInsertId());
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
