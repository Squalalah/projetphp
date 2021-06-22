<?php
require_once('../DTOPain.php');

#region Récupération d'un pain + affichage de chaque variable
$pain = DTOPain::selectById(1);

echo 'dateLimiteConso :'.$pain->getDateLimiteConso()."<br>";
echo 'Libelle :'.$pain->getLibelle()."<br>";
echo 'Marque :'.$pain->getMarque()."<br>";
echo 'prixUnitaire :'.$pain->getPrixUnitaire()."<br>";
echo 'qteStock :'.$pain->getQteStock()."<br>";
echo 'Poids :'.$pain->getPoids()."<br>";
echo 'type :'.$pain->getType()."<br>";
echo 'refProd :'.$pain->getRefprod()."<br>";
#endregion

#region Récupération de tout les pains + affichage de chaque objet récupéré
$lesPains = DTOPain::selectAll();
foreach($lesPains as $value)
{
    echo 'dateLimiteConso :'.$value->getDateLimiteConso()."<br>";
    echo 'Libelle :'.$value->getLibelle()."<br>";
    echo 'Marque :'.$value->getMarque()."<br>";
    echo 'prixUnitaire :'.$value->getPrixUnitaire()."<br>";
    echo 'qteStock :'.$value->getQteStock()."<br>";
    echo 'Poids :'.$value->getPoids()."<br>";
    echo 'type :'.$value->getType()."<br>";
    echo 'refProd :'.$value->getRefprod()."<br>";
}
#endregion