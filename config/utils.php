<?php

$dbHost = $env['DB_HOST'];
$dbName = $env['DB_NAME'];
$dbUser = $env['DB_USER'];
$dbPassword = $env['DB_PASSWORD'];

try {
    // Créer la connexion PDO avec tes paramètres
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPassword);
    // Configurer PDO pour lever des exceptions en cas d'erreur
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Afficher une erreur si la connexion échoue
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
    exit;
}
?>
