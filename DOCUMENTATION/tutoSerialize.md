### Tuto serialize() unserialize()


<p>La Sérialization permet de convertir une variable en chaine de caractère, afin de mieux la transférer d'un script à un autre.
</p>

##### Exemple :
#### page1.php
````
session_start();
$nombre = 55555; 
$_SESSION['contenu'] = serialize($nombre);
````
$_SESSION['contenu'] vaudra "i:55555;"
#### page2.php
````
session_start();
$nombre = unserialize($_SESSION['contenu']);
````

$nombre vaudra à nouveau 55555

<hr>

<p>Alors, l'exemple n'a pas trop d'intérêts, on peut juste faire $_SESSION['contenu'] = 55555; que cela fonctionnerait pareil.</p>

<p>L'interet de ces fonctions est de transférer des variables très complexes comme... des objets et des tableaux !</p>

##### Exemple :

#### page1.php
````
session_start();
require_once('Panier.php');
$panier = new Panier(0);
$_SESSION['panier'] = serialize($panier);
````
$_SESSION['panier’] contiendra 
````
O:6:"Panier":3:{s:15:"Paniermontant";i:0;s:17:"PanierlesLignes";N;s:16:"PanierpanierId";N;}
````
#### page2.php
````
session_start();
require_once('Panier.php');
$panier = unserialize($_SESSION['panier']);
echo $panier->getMontant();
````

$panier redeviendra l'objet Panier de la page1, et l'echo affichera bien '0'.

<hr>

<p>Serialize/Unserialize permet donc de réduire une struture complexe en une simple chaine de caractère, car une chaine est tout à fait compréhensible par n'importe quel script. Par contre, aucun script ne peut comprendre la structure d'un objet qu'elle ne connait pas.</p>

<p>Ces fonctions nous serviront dans 2 cas :</p>

+ Transférer des objets
+ Transférer des array (tableau)

<hr>

Note : Dans tout les cas, il faudra ajouter 'require_once('Panier.php');' si l'on veut manipuler l'objet transmit en session.