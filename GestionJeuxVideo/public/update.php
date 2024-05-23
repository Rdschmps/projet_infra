<?php
require_once __DIR__ . '/../config/db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM jeu_video WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$jeu = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $maison_edition = $_POST['maison_edition'];
    $note = $_POST['note'];
    $image = $_POST['image'];
    $date_evaluation = $_POST['date_evaluation'];

    $sql = "UPDATE jeu_video SET nom = ?, maison_edition = ?, note = ?, image = ?, date_evaluation = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $maison_edition, $note, $image, $date_evaluation, $id]);
    
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un jeu vidéo</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Modifier un jeu vidéo</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($jeu['nom']); ?>" required>
            </div>
            <div class="form-group">
                <label for="maison_edition">Maison d'édition:</label>
                <input type="text" id="maison_edition" name="maison_edition" value="<?php echo htmlspecialchars($jeu['maison_edition']); ?>" required>
            </div>
            <div class="form-group">
                <label for="note">Note:</label>
                <input type="number" id="note" name="note" min="1" max="10" value="<?php echo htmlspecialchars($jeu['note']); ?>" required>
            </div>
            <div class="form-group">
                <label for="image">Image URL:</label>
                <input type="url" id="image" name="image" value="<?php echo htmlspecialchars($jeu['image']); ?>" required>
            </div>
            <div class="form-group">
                <label for="date_evaluation">Date d'évaluation:</label>
                <input type="date" id="date_evaluation" name="date_evaluation" value="<?php echo htmlspecialchars($jeu['date_evaluation']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
    <a href="index.php"><button>Retour</button></a>
</body>
</html>
