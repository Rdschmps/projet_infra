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
    <h2>Liste des jeux vidéos</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Maison d'édition</th>
                <th>Note</th>
                <th>Image</th>
                <th>Date d'évaluation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jeux_videos as $jeu): ?>
                <tr>
                    <td><?php echo htmlspecialchars($jeu['nom']); ?></td>
                    <td><?php echo htmlspecialchars($jeu['maison_edition']); ?></td>
                    <td><?php echo htmlspecialchars($jeu['note']); ?></td>
                    <td><img src="<?php echo htmlspecialchars($jeu['image']); ?>" alt="Image" width="100"></td>
                    <td><?php echo htmlspecialchars($jeu['date_evaluation']); ?></td>
                    <td>
                        <a href="update.php?id=<?php echo $jeu['id']; ?>" class="btn btn-success">Modifier</a>
                        <a href="delete.php?id=<?php echo $jeu['id']; ?>" class="btn btn-secondary">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="container">
        <a href="create.php" class="btn btn-success">Ajouter un nouveau jeu</a>
    </div>
</body>
</html>

<?php
include '../includes/footer.html';
?>
