<?php
require_once __DIR__ . '/../config/db.php';

// Récupérer les données soumises par le formulaire
$nom = $_POST['nom'];
$email = $_POST['email'];
$mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

// Insertion des informations de l'utilisateur dans la base de données
$sql = "INSERT INTO utilisateurs (nom, email, mot_de_passe) VALUES (?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$nom, $email, $mot_de_passe]);

// Redirection vers une page de confirmation
header("Location: signup_success.php");
exit;
?>
