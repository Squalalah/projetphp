<?php

require_once('../DTOProduit.php');

$produit = DTOProduit::selectById(2);
echo $produit->getMarque();
