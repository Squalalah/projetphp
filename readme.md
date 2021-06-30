Projet PHP d'Aurelie, Vincent et Anthony, car nous avons une passion pour la collaboration.

***
## 1/ Documentation SQL
Type : 
+ 1 = Stylo
+ 2 = Glace
+ 3 = Pain
+ 4 = Carte Postal
***

## 2/ Documentation GIT

### 0.5 - Récupérer un repository
+ Se placer à l'endroit (dans le terminal) où l'on veut que le repository soit installé
+ git clone [URL_repository.git] (sans les [])


### 1- Récupérer les modifications du serveur : 
+ git pull

### 2- Envoyer ses données sur le serveur :

+ git add .
+ git commit -m "description du commit"
+ git push

### 3- Créer une branche

+ git branch "nom de la branche à créer"

### 4- Se positionner sur une branche 

+ git checkout "nom de la branche à rejoindre"

### 5- Créer une branche ET se positionner dessus :

+ git checkout -b "nom de la branche à créer"

### 6- Annuler les modifications en cours (en cas de conflit de pull)

+ git merge --abort
+ faire le point ensemble sur la situation

<p>Pour push une branche, suivre la méthode pour "Envoyer ses données sur le serveur"</p>
<p>La pull request se créera toute seule, et sera gérable depuis GitHub directement.</p>
