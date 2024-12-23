<?php
class databaseConnexion {

    private static $bdd;

    public function __construct() {}

    public static function getConnection() : PDO {
        if(!isset(databaseConnexion::$bdd)){
            databaseConnexion::connection();
        }
        return databaseConnexion::$bdd;
    }

    private static function connection() {
        // Chemin vers le fichier .env
        //$envFile = __DIR__ . '/../.env';
        $envFile = dirname(__DIR__) . DIRECTORY_SEPARATOR . '.env';

        // Vérification de l'existence du fichier .env
        if (!file_exists($envFile)) {
            die("Le fichier .env n'existe pas.");
        }

        // Lecture du fichier .env et récupération des variables d'environnement
        $env = parse_ini_file($envFile);

        // Récupération des variables d'environnement
        $dbHost = $env['DB_HOST'];
        $dbName = $env['DB_NAME'];
        $dbUser = $env['DB_USER'];
        $dbPassword = $env['DB_PASSWORD'];

        try {
            // Connexion à la base de données
            databaseConnexion::$bdd = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPassword);
        } catch (PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
            exit;
        }
    }

}
