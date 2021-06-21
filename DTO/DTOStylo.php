<?php

parent::__construct($libelle, $marque, $prixUnitaire, $qteStock, $refProd = '');
    $this->setCouleur($couleur);
    $this->setTypeMine($typeMine);

require_once('Stylo.php');
class DTOStylo
{
	public static function insert(Stylo $data)
	{
	try {
		$maCo=self::getBdd();
		$req="INSERT INTO produit (libelle, marque, prixUnitaire, qteStock, couleur, typeMine) VALUES (?, ?, ?, ?, ?, ?)";
		$prep=$maCo->prepare($req);
		$libelle=$data->getLibelle();
		$marque=$data->getMarque();
		$prixUnitaire=$data->getPrixUnitaire();
		$qteStock=$data->getQteStock();
		$couleur=$data->getCouleur();
		$typeMine=$data->getTypeMine();
		$prep->bindParam(1,$libelle);
		$prep->bindParam(2,$marque);
		$prep->bindParam(3,$prixUnitaire);
		$prep->bindParam(4,$qteStock);
		$prep->bindParam(5,$couleur);
		$prep->bindParam(6,$typeMine);
		$prep->execute();
		$data->setRefProd($maCo->lastInsertId());
		} 
	catch (PDOException $e) 
		{
		echo 'Erreur avec la BD!: ' .$e->getMessage() .'<br/>';
		die();
		}
	}
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
