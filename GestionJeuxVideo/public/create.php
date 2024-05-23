<?php
require_once __DIR__ . '/../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $maison_edition = $_POST['maison_edition'];
    $note = $_POST['note'];
    $image = $_POST['image'];
    $date_evaluation = $_POST['date_evaluation'];

    $sql = "INSERT INTO jeu_video (nom, maison_edition, note, image, date_evaluation) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $maison_edition, $note, $image, $date_evaluation]);

    header("Location: index.php");
    exit();
}

include '../includes/header.html'
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un jeu vidéo</title>
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        
    </style>
</head>
<body>
    <div class="container">
        <h2>Ajouter un nouveau jeu vidéo</h2>
        <form action="create.php" method="post">
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="maison_edition">Maison d'édition:</label>
                <input type="text" id="maison_edition" name="maison_edition" required>
            </div>
            <div class="form-group">
                <label for="note">Note:</label>
                <input type="number" id="note" name="note" min="1" max="10" required>
            </div>
            
            <div class="form-group">
                <label for="image">Image URL:</label>
                <input type="url" id="image" name="image" required>
            </div>
            <div class="form-group">
                <label for="date_evaluation">Date d'évaluation:</label>
                <input type="date" id="date_evaluation" name="date_evaluation" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Ajouter</button>
            </div>
        </form>
        
        <a href="index.php"><button class="btn btn-secondary">Retour</button></a>
    </div>

</body>
</html>

<?php
include '../includes/footer.html'
?>
