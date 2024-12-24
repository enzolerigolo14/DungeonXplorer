<?php
class CreationGuerrierController {

    public function index() {
        require_once __DIR__ . '/../../config/databaseConnexion.php';
        require_once __DIR__ . '/../models/NosClasses/ClassAbstract.php';
        require_once __DIR__ . '/../models/NosClasses/Guerrier.php';

        $client = databaseConnexion::getConnection();

        $requete = $client->prepare("select * from class where name = 'Guerrier'");
        $requete->execute();
        $classes = $requete->fetchAll();

        $guerrier = new Guerrier();
        $guerrier->hydrate($classes["0"]);

        require_once 'app/views/creationGuerrier.php';

    }

}