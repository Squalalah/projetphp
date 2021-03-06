<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="asset/css/header.css">
  <link rel="stylesheet" href="asset/css/listeProduits.css">

  <title>Les Pro du I.T.</title>
</head>

<?php
include('include/header.php'); ?>

<body>

  <?php
require_once('../autoload.php');
$lesStylos=DTOStylo::selectAll(); // L'autoloader voit qu'on appelle la classe statisque DTOStylo, il va donc tenter de la charger tout seul dans autoload.php
$lesGlaces=DTOGlace::selectAll();
$lesPains=DTOPain::selectAll();
$lesCartesPostales=DTOCartePostale::selectAll();

if(isset($_GET['radio']))
{
  $radio = $_GET['radio'];
}
else $radio = 'rd1';

if(isset($_GET['message']))
{
    switch($_GET['message'])
    {
        case 'erreur':
        {
            echo '<div class="alert">';
            echo 'ERREUR: Tentative d\'accès à une page non autorisé';
            echo '</div>';
            break;
        }
        case 'succes':
        {
            echo '<div class="succes">';
            echo 'SUCCES: Le panier a bien été validé avec succès!';
            echo '</div>';
            break;
        }
    }
}
?>

  <div class="row">
    <div class="col">
      <div class="tabs">
        <div class="tab">
          <input type="radio" id="rd1" class="inputAccordion" name="rd" <?php if($radio == 'rd1') { ?> checked <?php } ?>>
          <label class="tab-label" for="rd1">Les stylos</label>
          <div class="tab-content">
            <?php
            include('include/tableauStylo.php')
            ?>
          </div>
        </div>

        <div class="tab">
          <input type="radio" id="rd2" class="inputAccordion" name="rd" <?php if($radio == 'rd2') { ?> checked <?php } ?>>
          <label class="tab-label" for="rd2">Les glaces</label>
          <div class="tab-content">
            <?php
            include('include/tableauGlace.php')
            ?>
          </div>
        </div>

        <div class="tab">
          <input type="radio" id="rd3" class="inputAccordion" name="rd" <?php if($radio == 'rd3') { ?> checked <?php } ?>>
          <label class="tab-label" for="rd3">Les pains</label>
          <div class="tab-content">
            <?php
            include('include/tableauPain.php')
            ?>
          </div>
        </div>

        <div class="tab">
          <input type="radio" id="rd4" class="inputAccordion" name="rd" <?php if($radio == 'rd4') { ?> checked <?php } ?>>
          <label class="tab-label" for="rd4">Les cartes postales</label>
          <div class="tab-content">
            <?php
            include('include/tableauCartePostale.php')
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <br>

  <div class="row">
  </div>

</body>

</html>


