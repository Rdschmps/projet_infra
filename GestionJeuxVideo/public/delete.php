<?php
require_once __DIR__ . '/../config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM jeu_video WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        // Redirection vers index.php
        header("Location: index.php");
        exit(); // Assurez-vous de quitter le script après la redirection
    } else {
        echo "Erreur lors de la suppression du jeu vidéo.";
    }
} else {
    echo "ID non spécifié.";
}
?>
