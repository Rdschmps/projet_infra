# Gestion de Jeux Vidéos

## Présentation
Ce projet est une application de gestion de jeux vidéos qui permet d'ajouter, de supprimer, de mettre à jour et de visualiser (crud) des informations sur différents jeux vidéos sur l'application coté client, stocké dans une base de donnée sur un pc serveur.


![back-><-front](https://github.com/Rdschmps/projet_infra/blob/main/docs/serveur.png)


## Cadre

Ce projet fait partie du cours d'Infrastructure de B1 informatique à l'école Rennes Ynov Campus. 

## Stack Technique
Il s'agit d'une application développée en PHP avec une base de données MySQL, utilisant également Composer pour la gestion des dépendances et Dotenv pour la gestion des variables d'environnement.
Pour le seveur nous utilisons Xampp ou Wamp avec PhpMyAdmin pour gérer la base de donnée.

#### Fonctionnalités
- Ajout, suppression, mise à jour et visualisation des informations sur les jeux vidéos.
- Connexion sécurisée à la base de données en utilisant PDO.
- Utilisation de fichiers de configuration `.env` pour stocker les variables sensibles.
 


 # Prérequis 
 - Installer un serveur (Xampp, Wamp...).
 - lancer les serveurs web (Apache, MySql)
 - Installer PHP
 
# Installation

1. Clonez le dépôt GitHub vers votre machine locale.
2. Importer la base de donnée sur PhpMyAdmin grâce à la structure de la base de donnée qui est dans le dossier docs (fichier : structure_bdd.sql).
3. Créer un nouvel utilisateur dans la base de donnée.
4. . Exécutez `composer install` à la racine du projet pour installer les dépendances.
5. Renommez le fichier `.env.example` en `.env` dans le dossier config et configurez les variables d'environnement selon vos besoins.
6. Enfin vous pouvez accéder à l'application avec l'url : http://localhost/chemin/vers/le/repo/GestionsJeuxVideo/public/index.php

## Page de jeu
![Page de jeu](https://github.com/Rdschmps/projet_infra/blob/main/docs/Accueil_site.png)

## Structure dans PhpMyAdmin
![Structure PhpMyAdmin](https://github.com/Rdschmps/projet_infra/blob/main/docs/bdd.png)



## Auteurs

- [Deschamps Rayan & Hardy Guillaume] https://github.com/Rdschmps - https://github.com/Yupaiii - Développeurs principaux


