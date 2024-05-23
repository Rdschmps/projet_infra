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

include '../includes/header.html';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un jeu vidéo</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        /* Styles pour la pop-up */
        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 40px; /* Agrandissement du padding */
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            z-index: 9999;
            color: black;
        }

        /* Styles pour le formulaire */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px; /* Agrandissement de la marge */
            font-weight: bold;
            font-size: 18px; /* Agrandissement de la taille de police */
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group input[type="url"],
        .form-group input[type="date"] {
            width: 100%;
            padding: 15px; /* Agrandissement du padding */
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px; /* Agrandissement de la taille de police */
        }

        .form-group button {
            padding: 15px 30px; /* Agrandissement du padding */
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 100px;
            cursor: pointer;
            text-align: center;
            font-size: 18px; /* Agrandissement de la taille de police */
        }

        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<div>
    <div class="container">
        <div class="popup">
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
        <a href="index.php"><button class="btn btn-secondary">Retour</button></a>
    </div>
</body>
</html>


<?php
include '../includes/footer.html';
?>