# Documentation Technique / Architecture

## Table des Matières

1. [Introduction](#i-introduction)
2. [Infrastructure du Projet](#ii-infrastructure-du-projet)
   - 1. [Serveur Local](#1-serveur-local)
   - 2. [Base de Données](#2-base-de-données)
   - 3. [Frontend](#3-frontend)
   - 4. [Backend](#4-backend)
   - 5. [WAMP](#5-wamp)
3. [Communication avec la Base de Données](#iii-communication-avec-la-base-de-données)
   - 1. [Configuration](#1-configuration)
   - 2. [Gestion des Erreurs](#2-gestion-des-erreurs)
   - 3. [Illustration du Fonctionnement](#3-illustration-du-fonctionnement)
4. [Ports et Sécurité](#iv-ports-et-sécurité)
   - 1. [Ports Utilisés](#1-ports-utilisés)
   - 2. [Sécurité](#2-sécurité)
5. [Détails de l'Utilisation des Outils Proposés](#v-détails-de-lutilisation-des-outils-proposés)
   - 1. [MariaDB](#1-mariadb)
   - 2. [PHP](#2-php)
   - 3. [HTML/CSS](#3-htmlcss)
   - 4. [WAMP](#4-wamp)
6. [Conclusion](#vi-conclusion)

## I. Introduction

Cette documentation technique fournit une vue d'ensemble détaillée de l'architecture, des composants, des fonctionnalités et des aspects techniques du projet. Elle vise à fournir une compréhension approfondie du fonctionnement du projet pour les développeurs et les administrateurs système.

## II. Infrastructure du Projet


L'infrastructure mise en place pour ce projet repose sur une architecture classique client-serveur. Le pc client utilise l'application web tandis que le pc serveur heberge la base de données stocke les données nécessaires au fonctionnement de l'application.



![Structure PhpMyAdmin](https://github.com/Rdschmps/projet_infra/blob/main/docs/client-serveur.png)


### 1. Serveur Local

Le projet peut être exécuté sur un serveur local à l'aide de WAMP. WAMP est un environnement de développement web populaire qui fournit Apache comme serveur web, MySQL comme base de données et PHP comme langage de script côté serveur. Il est facile à installer et à configurer sur les systèmes d'exploitation Windows.

### 2. Base de Données

La base de données du projet est gérée à l'aide de MySQL, qui est un système de gestion de base de données relationnelle open source. MySQL est largement utilisé dans les applications web pour stocker et gérer les données de manière sécurisée et efficace.

### 3. Frontend

Le frontend de l'application est développé en utilisant HTML, CSS. Il est conçu pour offrir une expérience utilisateur conviviale et réactive sur une variété d'appareils et de tailles d'écran, en utilisant des techniques de conception modernes et des principes d'UX/UI.

### 4. Backend

Le backend de l'application est développé en PHP. Il gère la logique de l'application, communique avec la base de données, et fournit des données au frontend. Le code est organisé de manière modulaire et extensible pour faciliter la maintenance et l'évolutivité.

### 5. WAMP

WAMP fournit un environnement de développement complet pour exécuter des applications web sur un serveur local. Il comprend Apache comme serveur web, MySQL comme base de données, PHP comme langage de programmation, ainsi que d'autres outils et bibliothèques nécessaires pour le développement web.

## III. Communication avec la Base de Données

### 1. Configuration

La communication avec la base de données est gérée à l'aide de PDO (PHP Data Objects), une extension PHP qui fournit une interface uniforme pour accéder à des bases de données relationnelles. La configuration de la connexion à la base de données est définie dans un fichier de configuration séparé pour faciliter la maintenance et la portabilité.

### 2. Gestion des Erreurs

La gestion des erreurs est mise en œuvre pour gérer les situations où la connexion à la base de données échoue ou lorsque des requêtes SQL échouent. Des messages d'erreur appropriés sont renvoyés à l'utilisateur pour l'informer du problème rencontré.

### 3. Illustration du Fonctionnement

L'interaction entre l'application et la base de données est illustrée par des exemples de requêtes SQL et de résultats retournés. Cela permet de comprendre comment les données sont extraites, manipulées et affichées dans l'application.

## IV. Ports et Sécurité

### 1. Ports Utilisés

Le port par défaut utilisé pour la communication avec la base de données MySQL est 3306. Ce port doit être ouvert sur le serveur pour permettre à l'application d'établir une connexion avec la base de données.

### 2. Sécurité

Des mesures de sécurité sont mises en place pour protéger l'application et la base de données contre les attaques et les failles de sécurité. Cela inclut la sécurisation des paramètres de connexion à la base de données, la validation et l'échappement des données utilisateur, ainsi que la gestion des erreurs de manière sécurisée.

### Prévention des Injections SQL

#### Introduction injections sql

Les injections SQL sont l'une des vulnérabilités les plus courantes et les plus dangereuses pour les applications web. Elles surviennent lorsqu'un attaquant insère du code SQL malveillant dans des champs de saisie d'une application, exploitant ainsi les failles de sécurité pour accéder, modifier ou supprimer des données dans la base de données.

### Principes de Sécurité dans le Projet

#### Utilisation de Requêtes Préparées

Les requêtes SQL sont préparées en utilisant des déclarations préparées PDO. Cela sépare les données des instructions SQL, réduisant ainsi les risques d'injections SQL. Les données utilisateur sont liées aux paramètres de la requête plutôt que d'être concaténées directement dans la requête.

Exemple :

```
$sql = "INSERT INTO jeu_video (nom, maison_edition, note, image, date_evaluation) VALUES (?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$nom, $maison_edition, $note, $image, $date_evaluation]);
```
#### Nettoyage des Données Utilisateur

Les données fournies par l'utilisateur sont nettoyées pour éliminer les caractères spéciaux potentiellement dangereux. Cela est réalisé en utilisant des fonctions telles que htmlspecialchars() pour les valeurs textuelles et intval() pour les valeurs numériques.

Exemple : 
```
$nom = htmlspecialchars($_POST['nom'] ?? '');
```

#### Validation des Entrées Utilisateur

Les données fournies par l'utilisateur sont validées pour s'assurer qu'elles respectent les règles attendues. Par exemple, pour la note d'un jeu vidéo, on vérifie qu'elle est numérique et qu'elle se situe dans une plage spécifique (par exemple, entre 1 et 10).

Exemple : 
```
if (!is_numeric($note) || $note < 1 || $note > 10) {
    $error_message = "La note doit être un nombre entre 1 et 10.";
}
```

#### Gestion des Erreurs

En cas d'erreur ou de violation des règles, des messages d'erreur appropriés sont renvoyés à l'utilisateur sans exposer de détails sur la structure de la base de données ou les requêtes SQL. Cela évite de divulguer des informations sensibles qui pourraient être exploitées par des attaquants.

Exemple :
```
$error_message = "Veuillez remplir tous les champs du formulaire.";
```

#### En suivant ces principes, notre application est mieux protégée contre les injections SQL en minimisant les chances qu'un attaquant puisse exploiter les failles de sécurité pour compromettre notre base de donnée



## V. Détails de l'Utilisation des Outils Proposés

### 1. MariaDB

MariaDB est utilisé comme système de gestion de base de données pour stocker et gérer les données de l'application. Il offre des performances élevées, une grande fiabilité et une compatibilité avec les applications web modernes.

### 2. PHP

PHP est le langage de programmation principal utilisé pour développer le backend de l'application. Il est bien adapté au développement web grâce à sa facilité d'utilisation, sa grande flexibilité et sa vaste communauté de développeurs.

### 3. HTML/CSS

HTML et CSS sont utilisés pour créer l'interface utilisateur de l'application. HTML est utilisé pour structurer le contenu de la page, tandis que CSS est utilisé pour styliser et mettre en forme l'interface utilisateur, offrant ainsi une expérience visuelle attrayante et intuitive.

### 4. WAMP

WAMP est utilisé comme environnement de développement local pour exécuter l'application sur un serveur local. Il fournit tous les outils nécessaires pour le développement web, y compris un serveur web, une base de données et un langage de programmation, dans un seul package facile à installer et à utiliser.

## VI. Conclusion

En conclusion, ce projet offre une introduction pratique au développement web en utilisant PHP, MySQL et d'autres technologies connexes.Ce fut notre premier projet utilisant une base de données. Cela nous a donc appris à créer une base de données, communiquer avec, découvrir de nouveaux langages tels que le php, développer des applications web design, UX/UI, reponsive... Cela nous a aussi permis d'apprendre à gérer des erreurs et à faire communiquer un pc client avec un pc serveur pour envoyer et récupérer des informations avec la base de données. 
En conclusion, ce projet a été très intéressant et instructif, il nous a permis d'apprendre beaucoup de choses et était très plaisant à réaliser !
