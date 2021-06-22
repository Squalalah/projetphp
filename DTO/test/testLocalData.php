<?php
require_once('../localData.php');
try {
  $bdd = new PDO($dns,$user,$mdp);
  echo 'Connexion OK';
}
catch (PDOException $e) {
    echo 'Connexion NOK';

}