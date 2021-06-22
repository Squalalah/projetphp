<?php

require_once('../../BO/Stylo.php');
class DTOStylo
{
	public static function selectById($refProd)
	{
		try {
			$maCo=self::getBdd();
			$req="select * from produit where refProd=? AND type=1";
			$prep=$maCo->prepare($req);
			$prep->bindParam(1,$refProd,PDO::PARAM_INT); 
			$prep->execute(); 
			$mesDataProduit=$prep->fetchObject();
			$stylo=new Stylo($mesDataProduit->libelle, $mesDataProduit->marque, $mesDataProduit->prixUnitaire, $mesDataProduit->qteStock,$mesDataProduit->type,
			$mesDataProduit->couleur,$mesDataProduit->typeMine,$mesDataProduit->refProd);
		} 
		catch (PDOException $e) 
		{
			echo 'Erreur avec la BD!: ' .$e->getMessage() .'<br/>';
			die();
		}
		return $stylo;
	}

	public static function selectByType()
	{
		try {
			$maCo=self::getBdd();
			$req="select * from produit where type = 1";
			$resultat=$maCo->query($req);
			while($mesDataProduit=$resultat->fetchObject())
			{
				$lesStylos[]=new Stylo($mesDataProduit->libelle, $mesDataProduit->marque, $mesDataProduit->prixUnitaire, $mesDataProduit->qteStock, $mesDataProduit->type,
				$mesDataProduit->couleur,$mesDataProduit->typeMine,$mesDataProduit->refProd);	
			}
		}
		catch (PDOException $e) 
		{
			echo 'Erreur avec la BD!: ' .$e->getMessage() .'<br/>';
			die();
		}
		return $lesStylos;
	}

	private static function getBdd() {
	require('localData.php');
	return new PDO($dns,$user,$mdp);
	}	
}

?>
