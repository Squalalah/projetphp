<?php
session_start();
/*
require_once('../../BO/Glace.php');
require_once('../../DTO/DTOGlace.php');

$produit = DTOGlace::selectById(2);

$hello = "tes";
var_dump($$hello=2);


    ?>
<form method="POST" action="testValidationProduit.php">
    <?php
    echo '<input type="hidden" name="produit" value="'.$produit->getRefprod().'">';
    echo '<input type="submit" name="submit">';
    ?>
</form>
*/

require_once('../../../BO/Panier.php');

$panier = new Panier();
echo serialize($panier);


