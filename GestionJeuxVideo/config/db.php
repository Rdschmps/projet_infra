<?php

// informations de connexion à la base de données
$host = 'localhost'; 
$dbname = 'infrastructure'; 
$username = 'moanox'; 
$password = '$bU8i@hjhb)75!P-h70M5'; 

// tentative de connexion à la base de donnees
try {
    // creation d une nouvelle instance de PDO pour etablir la connexion
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // configuration  PDO pour signaler les erreurs sous forme d exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    $pdo->exec("SET NAMES 'utf8'");
} catch (PDOException $e) {
    // if erreur de connexion affichage  message erreur
    echo "Erreur de connexion : " . $e->getMessage();
    // Arrêt de execution du script
    die();
}
?>
