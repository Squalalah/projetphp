## Présentation contenu detailsCommande.php

Ce document permet de décrire le contenu de 'detailsCommande.php'

Contenu essentiel : 

+ Tableau listant toutes les lignes de produit inséré dans le Panier
+ Ajouter un bouton 'Valider le panier' pour envoyer le panier et les lignes dans la base de donnée.

Contenu non-prioritaire :

+ Rajouter un champ pour changer la quantité de chaque ligne, avec un bouton pour valider le changement
+ Rajouter un bouton 'Supprimer le produit' pour retirer la ligne de la commande
## Présentation contenu ServiceDetailsCommande.php

Contenu essentiel : 
+ Récupère le Panier en session et récupère chaque ligne pour les afficher en forme de tableau
+ Le montant du panier doit être calculé et envoyé à la vue 'detailsCommande.php'
<hr>

Nommage des variables :

+ $_SESSION['panier'] = pour récupérer le panier (contenant lesLignes)
<hr>

Conseils :

+ Il est possible de recupérer la variable SESSION 'panier' et de faire une boucle sur 'lesLignes' pour récupérer tous les produits ajoutés par le client.