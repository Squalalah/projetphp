<?php

// revoir le lien avec la table Ligne

require_once('../../BO/Panier.php');
require_once('InterfaceDTO.php');
class DTOPanier implements CUD
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

	public static function update($data)
	{
		try {
			$maCo=self::getBdd();
			$req="UPDATE panier set montant = ? WHERE id=?";
			$prep=$maCo->prepare($req);
			$id=$data->getPanierId();
			$montant=$data->getMontant();
			$prep->bindParam(1,$montant);
			$prep->bindParam(2,$id,PDO::PARAM_INT);  
			$prep->execute();
		} 
		catch (PDOException $e) 
		{
			echo 'Erreur avec la BD!: ' .$e->getMessage() .'<br/>';
			die();
		}
	}

	public static function delete($data)
	{
	try {
		$maCo=self::getBdd();
		$id=$data->getPanierId();
		$req="DELETE from panier WHERE id=?";
		$prep=$maCo->prepare($req);
		$prep->bindParam(1,$id,PDO::PARAM_INT); 
		$prep->execute(); 
		} 
	catch (PDOException $e) 
		{
		echo 'Erreur avec la BD!: ' .$e->getMessage() .'<br/>';
		die();
		}
	 }
	

}

?>
