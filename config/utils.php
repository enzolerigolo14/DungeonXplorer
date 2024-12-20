<?php
// Informations de connexion
$mysql_user   = 'dx12';          // Ton utilisateur MySQL
$mysql_pass   = 'oovohZe4oNg9Eing'; // Ton mot de passe MySQL
$mysql_db     = 'dx12_bd';       // Le nom de ta base de données
$mysql_server = 'localhost';     // L'adresse du serveur MySQL

try {
    // Créer la connexion PDO avec tes paramètres
    $pdo = new PDO("mysql:host=$mysql_server;dbname=$mysql_db;charset=utf8", $mysql_user, $mysql_pass);
    // Configurer PDO pour lever des exceptions en cas d'erreur
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Afficher une erreur si la connexion échoue
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
    exit;
}
?>
