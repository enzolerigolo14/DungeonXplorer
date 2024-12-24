<?php
class CreationVoleurController {

    public function index() {
        require_once __DIR__ . '/../../config/databaseConnexion.php';
        require_once __DIR__ . '/../models/NosClasses/ClassAbstract.php';
        require_once __DIR__ . '/../models/NosClasses/ClassMagique.php';
        require_once __DIR__ . '/../models/NosClasses/Voleur.php';

        $client = databaseConnexion::getConnection();

        $requete = $client->prepare("select * from class where name = 'Voleur'");
        $requete->execute();
        $classes = $requete->fetchAll();

        $voleur = new Voleur();
        $voleur->hydrate($classes["0"]);

        require_once 'app/views/creationVoleur.php';
    }

}
