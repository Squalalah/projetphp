<?php

require_once('Stylo.php');
class DTOStylo
{
	public static function selectById($refProd)
	{
	try {
		$maCo=self::getBdd();
	  $req="select * from produit where produit_id=?";
		$prep=$maCo->prepare($req);
		$prep->bindParam(1,$refProd,PDO::PARAM_INT); 
		$prep->execute(); 
		$mesDataProduit=$prep->fetchObject();
		$stylo=new Stylo($mesDataProduit->libelle, $mesDataProduit->marque, $mesDataProduit->prixUnitaire, $mesDataProduit->qteStocknom,
		$mesDataProduit->couleur,$mesDataProduit->typeMine,$mesDataProduit->refProd);
		} 
	catch (PDOException $e) 
		{
		echo 'Erreur avec la BD!: ' .$e->getMessage() .'<br/>';
		die();
		}
	  return $stylo;
	}
	private static function getBdd() {
	require('./localData.php');
	return new PDO($dns,$user,$mdp);
	}
}

?>
