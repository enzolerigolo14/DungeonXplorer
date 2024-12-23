<?php
class ChoixHeroController {

    public function index(){
        require_once __DIR__ . '/../../config/databaseConnexion.php';
        require_once __DIR__ . '/../models/NosClasses/ClassAbstract.php';
        require_once __DIR__ . '/../models/NosClasses/ClassMagique.php';
        require_once __DIR__ . '/../models/NosClasses/Guerrier.php';
        require_once __DIR__ . '/../models/NosClasses/Magicien.php';
        require_once __DIR__ . '/../models/NosClasses/Voleur.php';

        $client = databaseConnexion::getConnection();

        $requete = $client->prepare("select * from class");
        $requete->execute();
        $allClasses = $requete->fetchAll();

        $guerrier = new Guerrier();
        $guerrier->hydrate($allClasses["2"]);

        $magicien = new Magicien();
        $magicien->hydrate($allClasses["1"]);

        $voleur = new Voleur();
        $voleur->hydrate($allClasses["0"]);

        require_once 'app/views/choixHero.php';
    }

}
?>