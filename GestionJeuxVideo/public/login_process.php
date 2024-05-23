<?php
require_once __DIR__ . '/../config/db.php';

session_start();

// Récupérer les données soumises par le formulaire
$email = $_POST['email'];
$mot_de_passe = $_POST['mot_de_passe'];

// Recherche de l'utilisateur dans la base de données
$sql = "SELECT * FROM utilisateurs WHERE email = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email]);
$user = $stmt->fetch();

if ($user && password_verify($mot_de_passe, $user['mot_de_passe'])) {
    // Authentification réussie, démarrer la session et rediriger vers une page protégée
    $_SESSION['user_id'] = $user['id'];
    header("Location: dashboard.php");
    exit;
} else {
    // Authentification échouée, rediriger vers la page de connexion avec un message d'erreur
    header("Location: login.php?error=1");
    exit;
}
?>
