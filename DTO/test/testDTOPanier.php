<?php

require_once('../DTOPanier.php');

// Test pour selectionner insérer un panier

$panierTest = new Panier(159);
DTOPanier::insert($panierTest);
echo 'Le montant ' .$panierTest->getMontant(). ' a été ajouté au panier. <br> ';

// Test pour modifier un panier

$panierTest->setMontant(500);
DTOPanier::update($panierTest);
echo 'Le nouveau montnant est ' .$panierTest->getMontant(). '. <br> ' ;

// Test pour supprimer un panier

DTOPanier::delete($panierTest);
echo 'Le panier numéro ' .$panierTest->getPanierId(). ' avec un montant de ' .$panierTest->getMontant(). ' a été supprimé. <br> ';
