<?php

require_once('../../BO/Glace.php');
require_once('InterfaceDTO.php');
class DTOGlace implements SELECT
{
	public static function selectById($refProd)
	{
		try {
			$maCo=self::getBdd();
			$req="select * from produit where refProd=? AND type=2";
			$prep=$maCo->prepare($req);
			$prep->bindParam(1,$refProd,PDO::PARAM_INT); 
			$prep->execute(); 
			$mesDataProduit=$prep->fetchObject();
			$glace=new Glace($mesDataProduit->dateLimiteConso, $mesDataProduit->libelle, $mesDataProduit->marque, $mesDataProduit->prixUnitaire, $mesDataProduit->qteStock,$mesDataProduit->type,
			$mesDataProduit->parfum,$mesDataProduit->temperature, $mesDataProduit->refProd);
		} 
		catch (PDOException $e) 
		{
			echo 'Erreur avec la BD!: ' .$e->getMessage() .'<br/>';
			die();
		}
		return $glace;
	}

	public static function selectAll()
	{
		try {
			$maCo=self::getBdd();
			$req="select * from produit where type = 2";
			$resultat=$maCo->query($req);
			while($mesDataProduit=$resultat->fetchObject())
			{
				$lesGlaces[]=new Glace($mesDataProduit->dateLimiteConso, $mesDataProduit->libelle, $mesDataProduit->marque, $mesDataProduit->prixUnitaire, $mesDataProduit->qteStock,$mesDataProduit->type,
				$mesDataProduit->parfum,$mesDataProduit->temperature, $mesDataProduit->refProd);	
			}
		}
		catch (PDOException $e) 
		{
			echo 'Erreur avec la BD!: ' .$e->getMessage() .'<br/>';
			die();
		}
		return $lesGlaces;
	}

	private static function getBdd() {
	require('localData.php');
	return new PDO($dns,$user,$mdp);
	}	
}

?>
