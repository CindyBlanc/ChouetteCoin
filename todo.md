1. Créer une page d'accueil avec un lien vers la page de connexion.
2. Créer une connexion à la base de données (avec PDO) dans un config.php dans le dossier includes, qui contient tous les fichiers qui seront inclus sur des pages. 
3. Créer une base de données qui représente la structure de notre projet [chouette_coin>users, products, categories].
========================================================================================================
4. Créer un formulaire pour l'inscription/ la connexion des utilisateurs qui reprend les informations de connexion. 
    -> Ne pas oublier l'action et la méthode POST du formulaire.
    -> Ne pas oublier les name sur les input (pour les retrouver lors du $_POST).
    -> ** Rajouter des vérification en front ** 
5. Récupérer les données du formulaire en prenant soin de les sécuriser : 
    -> htlmspecialchars sur nos variables POST
    -> ** On peut aussi utiliser strip_tags **
6. Créer une logique pour l'ajout d'utilisateurs dans la base de données. 
    -> Un utilisateur doit forcément posséder un email, un password, un username et avoir cliqué sur le bouton d'inscription (1er if : avec !empty et isset).
    -> Un utilisateur ne peut pas avoir le même username ou la même adresse mail que quelqu'un d'autre. Pour ce faire, nous allons compter le nombre de fois que l'email ou le username sera trouvé dans la base de données (2ème if pour l'email et le 3ème if pour l'username).
    -> Un utilisateur doit être sûr de son mot de passe (4ème if avec la vérification de la concordance des mots de passe entrés "$pass1 === $pass2")
    -> LES MOTS DE PASSE SONT TOUJOURS CRYPTES DANS LA BASE DE DONNEES (RGPD 2018) - Le mot de passe doit être crupté avec la fonction password_hash (la clé PASSWORD_DEFAULT suffit, mais vous pouvez explorer les autres ! A savoir : les clés de hashage md5 (et les autres md) et sha1 sont faciles à décrypter donc à eviter).
    -> Créer une requête d'insertion avec la preparation de requête en PDO et des marqueurs nommées. (prepare(), :value et bindValue(:value))
7. Factoriser le code en créant une focntion qui réalise l'ajout d'utilisateurs à partir des variables nécessaires pour chaque utilisateur. 
8. Ajuster le formulaire pour la connexion. 
    -> Uniquement 2 champs, email et mot de passe
    -> changer les name
9. Créer une fonction connexion et l'imcrémenter
    -> Vérification de l'existence de l'email dans la base de données (1er if, avec une requête SELECT et un fetch())
    -> Vérification du mot de passe hashed (2ème if avec password_verify())
    -> Lancement d'une cession (avec $_SESSION).
10. **AJOUTER LA VARIABLE $conn EN GLOBAL A CHAQUE FONCTION PLUTOT QUE COMME ARGUMENT**
11. Création d'une fonction d'affichage des données depuis la BDD
    -> Faire une requête SELEC à la base de données avec les pramètres de notre choix (en l'occurance aucune pour l'instant)
    -> Faire un array qui contien le fetchAll sur les données récupérées.
    -> Crées une boucle foreach qui passe chaque ligne des données récupérées depuis la base de données dans un tableau html
