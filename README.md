
## Installation

- Installer la dernière version de Laravel (7)

- Installer la dernière version du composer

## Etapes pour démarer Apache Solr

Après le clone du Solr (https://github.com/Mohamed-Z/Search_Engine_Solr.git) :

-Naviguez jusqu'au dossier bin dans le répertoire d'accueil de Solr 
    
-Ouvrir la fenêtre PowerShell
    
-Démarrez Solr en utilisant la commande suivante
    >> .\solr start

## Etapes pour démarrer le projet

Après le clone du projet :

- Installer les dépendances nécessaires
    >> composer install

- Créer une base de données dans MySQL

- Créer un fichier .env et faire copier le contenu de .env.example dans le fichier crée .env

- Modifier le nom de la base de données dans le fichier .env crée dans la ligne 12

- Générer une clé du projet :
    >> php artisan key:generate

- Faire les migrations
    >> php artisan migrate:refresh --seed

- Démarrer le projet avec l commande:
    >> php artisan serve

## Connexion

- Se connecter avec un candidat normal (en cliquant sur connexion) ou bien route (/connexion) :
    - email : assia1@gmail.com
    - password : password

    - email : hind@gmail.com
    - password : password

- Se connecter avec admin :
    - email : admin@gmail.com
    - password : password

