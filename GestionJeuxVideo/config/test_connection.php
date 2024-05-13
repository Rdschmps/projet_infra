<?php
// Inclure le fichier de configuration de la base de données
require_once 'db.php';

// Essayez de sélectionner une donnée quelconque de la base de données
try {
    // Exécutez une requête SQL simple pour sélectionner une donnée
    $result = $pdo->query("SELECT 'Connexion réussie !' AS message")->fetch(PDO::FETCH_ASSOC);
    // Affichez le message récupéré
    echo $result['message'];
} catch (PDOException $e) {
    // En cas d'erreur de connexion, afficher le message d'erreur
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
