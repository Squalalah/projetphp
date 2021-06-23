<?php
session_start();
require_once('../../BO/Ligne.php');
require_once('../../BO/Panier.php');
require_once('../../BO/Glace.php');
require_once('../../BO/Pain.php');
require_once('../../BO/Stylo.php');
require_once('../../BO/CartePostale.php');




function getBDD() : PDO
{
    $user='root';//root
    $mdp='root';//root
    $serveur='localhost';//
    $bd='projetphp';
    $dns="mysql:host=$serveur;dbname=$bd;charset=utf8";
    return $myCO = new PDO($dns, $user, $mdp);
}
function getProduitById($id) {
    try {
        $maCo = getBDD();
        $req="select * from produit where refProd=?";
        $prep=$maCo->prepare($req);
        $prep->bindParam(1,$id,PDO::PARAM_INT);
        $prep->execute();
        $mesDataProduit=$prep->fetchObject();
        switch($mesDataProduit->type) {
            case 1: {
                return new Stylo($mesDataProduit->libelle, $mesDataProduit->marque, $mesDataProduit->prixUnitaire, $mesDataProduit->qteStock, $mesDataProduit->type, $mesDataProduit->couleur, $mesDataProduit->typeMine, $mesDataProduit->refProd);
            }
            case 2: {
                return new Glace($mesDataProduit->dateLimiteConso, $mesDataProduit->libelle, $mesDataProduit->marque, $mesDataProduit->prixUnitaire, $mesDataProduit->qteStock, $mesDataProduit->type, $mesDataProduit->parfum, $mesDataProduit->temperature, $mesDataProduit->refProd);
            }
            case 3: {
                return new Pain($mesDataProduit->dateLimiteConso, $mesDataProduit->libelle, $mesDataProduit-> marque, $mesDataProduit->prixUnitaire, $mesDataProduit->qteStock, $mesDataProduit->type, $mesDataProduit->poids, $mesDataProduit->refProd);
            }
            case 4: {
                return new CartePostale($mesDataProduit->libelle, $mesDataProduit->marque, $mesDataProduit->prixUnitaire, $mesDataProduit->qteStock, $mesDataProduit->typeCP, $mesDataProduit->refProd);
            }
        }
    }
    catch (PDOException $e) {
    }
}

$produit = getProduitById($_POST['produit']);
$_SESSION['cart'][] = ['produit' => serialize($produit), 'quantite' => 10 ];

$panier = new Panier(0);
$ligne = new Ligne(10, $produit);
$panier->ajouteLigne($ligne);
$_SESSION['panier'] = serialize($panier);
?>
<form method="POST" action="testPanier.php">
    <input type="submit" name="submitPanier">
</form>



?>