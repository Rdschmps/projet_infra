# Gestion de Jeux Vidéos

Ce projet est une application de gestion de jeux vidéos qui permet d'ajouter, de supprimer, de mettre à jour et de visualiser des informations sur différents jeux vidéos.

## Présentation

Ce projet fait partie du cours d'Infrastructure à l'école YNOV. Il s'agit d'une application développée en PHP avec une base de données MySQL, utilisant également Composer pour la gestion des dépendances et Dotenv pour la gestion des variables d'environnement

## Fonctionnalités

- Ajout, suppression, mise à jour et visualisation des informations sur les jeux vidéos.
- Connexion sécurisée à la base de données en utilisant PDO.
- Utilisation de fichiers de configuration `.env` pour stocker les variables sensibles.

- ## Installation

1. Clonez le dépôt GitHub vers votre machine locale.
2. Exécutez `composer install` à la racine du projet pour installer les dépendances.
3. Renommez le fichier `.env.example` en `.env` et configurez les variables d'environnement selon vos besoins.
4. Assurez-vous que votre serveur web (par exemple Apache) est configuré pour pointer vers le dossier `public/` comme dossier racine.


## Auteurs

- [Deschamps Rayan & Hardy Guillaume]([lien vers votre profil GitHub](https://github.com/Rdschmps)(https://github.com/Yupaiii)) - Développeurs principaux


# Sécurité
# Prévention des Injections SQL

## Introduction

Les injections SQL sont l'une des vulnérabilités les plus courantes et les plus dangereuses pour les applications web. Elles surviennent lorsqu'un attaquant insère du code SQL malveillant dans des champs de saisie d'une application, exploitant ainsi les failles de sécurité pour accéder, modifier ou supprimer des données dans la base de données.

## Principes de Sécurité dans le Projet

### Utilisation de Requêtes Préparées

Les requêtes SQL sont préparées en utilisant des déclarations préparées PDO. Cela sépare les données des instructions SQL, réduisant ainsi les risques d'injections SQL. Les données utilisateur sont liées aux paramètres de la requête plutôt que d'être concaténées directement dans la requête.

Exemple :

```
$sql = "INSERT INTO jeu_video (nom, maison_edition, note, image, date_evaluation) VALUES (?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$nom, $maison_edition, $note, $image, $date_evaluation]);
```
### Nettoyage des Données Utilisateur

Les données fournies par l'utilisateur sont nettoyées pour éliminer les caractères spéciaux potentiellement dangereux. Cela est réalisé en utilisant des fonctions telles que htmlspecialchars() pour les valeurs textuelles et intval() pour les valeurs numériques.

Exemple : 
```
$nom = htmlspecialchars($_POST['nom'] ?? '');
```

### Validation des Entrées Utilisateur

Les données fournies par l'utilisateur sont validées pour s'assurer qu'elles respectent les règles attendues. Par exemple, pour la note d'un jeu vidéo, on vérifie qu'elle est numérique et qu'elle se situe dans une plage spécifique (par exemple, entre 1 et 10).

Exemple : 
```
if (!is_numeric($note) || $note < 1 || $note > 10) {
    $error_message = "La note doit être un nombre entre 1 et 10.";
}
```

### Gestion des Erreurs

En cas d'erreur ou de violation des règles, des messages d'erreur appropriés sont renvoyés à l'utilisateur sans exposer de détails sur la structure de la base de données ou les requêtes SQL. Cela évite de divulguer des informations sensibles qui pourraient être exploitées par des attaquants.

Exemple :
```
$error_message = "Veuillez remplir tous les champs du formulaire.";
```

### En suivant ces principes, notre application est mieux protégée contre les injections SQL en minimisant les chances qu'un attaquant puisse exploiter les failles de sécurité pour compromettre notre base de donnée