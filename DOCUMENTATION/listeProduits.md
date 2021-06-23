## Présentation contenu listeProduits.php

Ce document permet de décrire le contenu de 'listeProduits.php'

Contenu essentiel : 

+ Tableau listant tout les produits de la base de donnée
+ Bouton "Ajouter au panier" à coté de chaque produit pour les ajouter


## Présentation contenu ServiceListProduits.php

Contenu essentiel : 
+ Récupère la ligne produit sur laquelle le bouton a été cliqué
+ Créer un panier s'il n'existe pas déjà, et le stocker en SESSION
+ Créer une Ligne grace au produit
+ Ajouter la Ligne dans le Panier

<hr>

Nommage des variables :

+ $_SESSION['panier'] = stockage du panier
+ $_POST['produit'] = stockage du produit à ajouter au panier dans la page ServiceListProduits.php

<hr>

Conseils :

+ Pour ajouter un bouton à chaque ligne de produit, il suffit de créer un formulaire par ligne, avec un champ invisible (input type=hidden) qui contient l'objet Produit.

