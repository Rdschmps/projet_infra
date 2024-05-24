# Document d'architecture

## Infrastructure
L'infrastructure mise en place pour ce projet repose sur une architecture classique client-serveur. Le pc client utilise l'application web tandis que le pc serveur heberge la base de données stocke les données nécessaires au fonctionnement de l'application.



![Structure PhpMyAdmin](https://github.com/Rdschmps/projet_infra/blob/main/docs/client-serveur.png)

## Communication avec la Base de Données

L'application communique avec la base de données à l'aide de requêtes SQL. Pour assurer la sécurité et éviter les injections SQL, nous utilisons des requêtes préparées avec PDO (PHP Data Objects). Cela permet de séparer les données des instructions SQL et de réduire les risques d'attaques.

## Ports Alloués et Sécurité

Les ports utilisés dépendent de l'environnement d'exécution de l'application. Ici pour le communication avec la base de données nous utilisons le port par défaut de MySql : 3306


## Sécurité
- Création d'un utilisateur pour la base de donnée avec un mot de passe sécurisé.
- Utilisation du fichier '.env' afin de ne pas partager ses login sur git 

### Prévention des Injections SQL

#### Introduction

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

#### En suivant ces principes, notre application est mieux protégée contre les injections SQL en minimisant les chances qu'un attaquant puisse exploiter les failles de sécurité pour compromettre notre base de donnée
