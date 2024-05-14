<?php
// Charger les variables d'environnement à partir du fichier .env
require_once 'vendor/autoload.php';

// Load .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Informations de connexion à la base de données
$host = $_ENV['DB_HOST'];
$dbname = $_ENV['DB_NAME'];
$username = $_ENV['DB_USER'];
$password = $_ENV['DB_PASS'];

// Tentative de connexion à la base de données
try {
    // Création d'une nouvelle instance de PDO pour établir la connexion
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Configuration de PDO pour signaler les erreurs sous forme d'exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Définition du jeu de caractères des échanges avec la base de données en UTF-8
    $pdo->exec("SET NAMES 'utf8'");
    
    // Test de la connexion à la base de données
    $result = $pdo->query("SELECT 'Connexion réussie !' AS message")->fetch(PDO::FETCH_ASSOC);
    // Affichage du message récupéré
    echo $result['message'];
} catch (PDOException $e) {
    // En cas d'erreur de connexion, affichage du message d'erreur
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
