
![img.png](img.png)
# ** SITE DYNAMIQUE - BIENVENUE **

## Prérequis & installation:

&#x2666; Avoir un serveur local (exemple: WAMP) 

    * Version minimale de votre serveur de base de données (ex: MySQL):
    --> Votre serveur local doit être compatible avec une version minimum de MySQL de 8.0.33

    * Version minimale de PHP:
    --> Vérifez que votre serveur dispose d'une version minimale de PHP 8.2

&#x2666; Clonez ce dépôt GitHub sur votre serveur local dans le dossier "www" 

&#x2666; Importez le ficher de base de données ("web_ex.sql") qui se trouve dans le dossier "db" de ce projet dans votre système de gestion de base de données (exemple: MySQL)

&#x2666; Ouvrez le fichier 'config.php' dans un éditeur de code (exemple: VSCode, PhpStorm,...) et configurez les paramètres de connexion à la base de données

## Configuration de la base de données: 

&#x2666; `DB_NAME` = Le nom de la base de données<br><br>
&#x2666; `DB_HOST` = L'adresse du serveur de base de données<br>  
&#x2666; `DB_USER` = Le nom d'utilisateur de la base de données<br>  
&#x2666; `DB_PWD` = Le mot de passe de la base de données <br>


## Utilisation - Accès au site:

Pour acceder au site, ouvrez la page d'un navigateur et taper dans l'url: <br>
&#x25B6;&#x25B6; "http://localhost/Le_cheminement_de_votre_dossier_pour_acceder_au_projet/"

<b>Exemple</b> : le projet se trouve dans le dossier de votre serveur local: <br>
&#x25B6;&#x25B6;"wamp64/www/NOM_DU_PROJET "<br><br>
Alors on mettra cette adresse url dans notre navigateur: <br>
&#x25B6;&#x25B6; "http://localhost/NOM_DU_PROJET/"

## Utilisation - L'administrateur du site:

Vous pouvez désormais procéder à la création du premier utilisateur de ce site. Le premier utilisateur qui sera 
inscrit sur le site et également inséré dans la base de données, sera l'administrateur de ce site et aura la 
possibilité d'accéder à la page "admin" une fois connecté. 

Les autres utilisateurs qui viendront créé un compte, ne seront pas admin et n'auront donc pas la possibilité 
d'acceder à cet onglet "admin".


Pour la suite, je vous souhaite une bonne découverte ! 

