<?php
class CreationMageController{

    public function index(){
        require_once __DIR__ . '/../../config/databaseConnexion.php';
        require_once __DIR__ . '/../models/NosClasses/ClassAbstract.php';
        require_once __DIR__ . '/../models/NosClasses/ClassMagique.php';
        require_once __DIR__ . '/../models/NosClasses/Magicien.php';

        $client = databaseConnexion::getConnection();

        $requete = $client->prepare("select * from class where name = 'Mage'");
        $requete->execute();
        $classes = $requete->fetchAll();

        $mage = new Magicien();
        $mage->hydrate($classes["0"]);

        require_once 'app/views/creationMage.php';
    }

}
