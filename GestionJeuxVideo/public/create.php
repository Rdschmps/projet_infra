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
?>
