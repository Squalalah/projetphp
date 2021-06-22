<?php

require_once('../DTOLigne.php');
require_once('../DTOPanier.php');
require_once('../DTOPain.php');
require_once('../DTOGlace.php');
require_once('../DTOStylo.php');
require_once('../DTOCartePostale.php');

/*
 * Etant donné que cette classe dépend de Produit qui a plusieurs enfants.
 * Je dois tester chaque enfant de Produit afin d'être sur qu'ils fonctionnent tous.
 * Je suis donc 4 étapes
 *
 */

#region Récupération des 4 produits enfants
$pain = DTOPain::selectById(1);
$glace = DTOGlace::selectById(2);
$stylo = DTOStylo::selectById(3);
$CP = DTOCartePostale::selectById(4);
#endregion

#region Création du panier
$panier = new Panier(0);
DTOPanier::insert($panier);
echo 'Création du Panier ID : '. $panier->getPanierId().'<br>';
#endregion

#region Création des 4 lignes correspondant aux 4 produits
$lignePain = new Ligne(10, $panier, $pain);
DTOLigne::insert($lignePain);
echo 'Libelle : '. $pain->getLibelle().'<br>';
echo 'Quantité : '. $lignePain->getQuantite().'<br>';

$ligneGlace = new Ligne(5, $panier, $glace);
DTOLigne::insert($ligneGlace);
echo 'Libelle : '. $glace->getLibelle().'<br>';
echo 'Quantité : '. $ligneGlace->getQuantite().'<br>';

$ligneStylo = new Ligne(5, $panier, $stylo);
DTOLigne::insert($ligneStylo);
echo 'Libelle : '. $stylo->getLibelle().'<br>';
echo 'Quantité : '. $ligneStylo->getQuantite().'<br>';

$ligneCP = new Ligne(5, $panier, $CP);
DTOLigne::insert($ligneCP);
echo 'Libelle : '. $CP->getLibelle().'<br>';
echo 'Quantité : '. $ligneCP->getQuantite().'<br>';
#endregion

#region Ajout des 4 lignes dans le panier
$panier->ajouteLigne($lignePain);
$panier->ajouteLigne($ligneGlace);
$panier->ajouteLigne($ligneStylo);
$panier->ajouteLigne($ligneCP);
#endregion

#region Calcul du montant du panier + mise à jour de celui-ci dans la BDD
echo 'Nb de lignes dans panier : ' . count($panier->getLignes()).'<br>';
echo 'montant Panier AVANT modification : '. $panier->getMontant().'<br>';
$panier->calculMontant();
echo 'Montant total : '. $panier->getMontant().'<br>';
DTOPanier::update($panier);
#endregion

#region Suppression des 4 lignes testés + Suppression du Panier
echo 'Suppression des lignes/panier <br>';
DTOLigne::delete($lignePain->getPanier(), $lignePain->getProduit());
$panier->supprimeLigne($lignePain);
unset($lignePain);
DTOLigne::delete($ligneGlace->getPanier(), $ligneGlace->getProduit());
$panier->supprimeLigne($ligneGlace);
unset($ligneGlace);
DTOLigne::delete($ligneStylo->getPanier(), $ligneStylo->getProduit());
$panier->supprimeLigne($ligneStylo);
unset($ligneStylo);
DTOLigne::delete($ligneCP->getPanier(), $ligneCP->getProduit());
$panier->supprimeLigne($ligneCP);
unset($ligneCP);
DTOPanier::delete($panier);
#endregion