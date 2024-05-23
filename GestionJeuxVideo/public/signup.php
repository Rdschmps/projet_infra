<!-- signup.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
    <h2>Inscription</h2>
    <form action="signup_process.php" method="post">
        <label for="nom">Nom:</label><br>
        <input type="text" id="nom" name="nom"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="mot_de_passe">Mot de passe:</label><br>
        <input type="password" id="mot_de_passe" name="mot_de_passe"><br>
        <input type="submit" value="S'inscrire">
    </form>
</body>
</html>
