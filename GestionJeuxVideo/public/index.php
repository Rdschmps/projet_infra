<?php
require_once __DIR__ . '/../config/db.php';

$sql = "SELECT * FROM jeu_video";
$stmt = $pdo->query($sql);
$jeux_videos = $stmt->fetchAll(PDO::FETCH_ASSOC);

include '../includes/header.html';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des jeux vidéos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h2 class="page-title">Liste des jeux vidéos</h2>
        <div class="games-grid">
            <?php foreach ($jeux_videos as $jeu): ?>
                <div class="game-card">
                    <img src="<?php echo htmlspecialchars($jeu['image']); ?>" alt="Image de <?php echo htmlspecialchars($jeu['nom']); ?>" class="game-image">
                    <div class="game-info">
                        <h3 class="game-title"><?php echo htmlspecialchars($jeu['nom']); ?></h3>
                        <p class="game-edition"><strong>Maison d'édition:</strong> <?php echo htmlspecialchars($jeu['maison_edition']); ?></p>
                        <p class="game-note"><strong>Note:</strong> <?php echo htmlspecialchars($jeu['note']); ?>/10</p>
                        <p class="game-date"><strong>Date d'évaluation:</strong> <?php echo htmlspecialchars($jeu['date_evaluation']); ?></p>
                        <div class="game-actions">
                            <a href="update.php?id=<?php echo $jeu['id']; ?>" class="btn btn-success">Modifier</a>
                            <a href="delete.php?id=<?php echo $jeu['id']; ?>" class="btn btn-secondary">Supprimer</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="add-game">
            <a href="create.php" class="btn btn-success">Ajouter un nouveau jeu</a>
        </div>
    </div>
</body>
</html>

<?php
include '../includes/footer.html';
?>
