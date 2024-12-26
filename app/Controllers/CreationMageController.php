<?php
class CreationMageController{

    public function index(){
        require_once 'app/views/creationMage.php';
    }

    public function creerMage() {
        session_start();


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


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['hero_name']) && isset($_POST['hero_biography'])) {

                $hero_name = htmlspecialchars($_POST['hero_name']);
                $hero_biography = htmlspecialchars($_POST['hero_biography']);
                $image = "/DungeonXplorer/public/images/mage.jpg";
                $class_id = $mage->getId();
                $userId = $_SESSION['userId'];
                $pv = $mage->getBasePv();
                $mana = $mage->getBaseMana();
                $strength = $mage->getStrength();
                $initiative = $mage->getInitiative();
                $armor = $mage->getBaseArmor();
                $primary_weapon = $mage->getPrimaryWeaponDefault();
                $xp = 0;


                require_once __DIR__ . '/../../config/databaseConnexion.php';
                $client = databaseConnexion::getConnection();

                $mainRequete = $client->prepare("INSERT INTO hero (name, class_id, user_id, image, biography, pv, mana, strength, initiative, armor, primary_weapon, xp)
                                                VALUES (:name, :class_id, :user_id, :image, :biography, :pv, :mana, :strength, :initiative, :armor, :primary_weapon, :xp)");
                $mainRequete->bindParam(':name', $hero_name);
                $mainRequete->bindParam(':class_id', $class_id);
                $mainRequete->bindParam(':user_id', $userId);
                $mainRequete->bindParam(':image', $image);
                $mainRequete->bindParam(':biography', $hero_biography);
                $mainRequete->bindParam(':pv', $pv);
                $mainRequete->bindParam(':mana', $mana);
                $mainRequete->bindParam(':strength', $strength);
                $mainRequete->bindParam(':initiative', $initiative);
                $mainRequete->bindParam(':armor', $armor);
                $mainRequete->bindParam(':primary_weapon', $primary_weapon);
                $mainRequete->bindParam(':xp', $xp);
                $mainRequete->execute();

                $requeteGetHerosId = $client->prepare("select id from hero where user_id = {$userId}");
                $requeteGetHerosId->execute();
                $hero_id = $requeteGetHerosId->fetchColumn();

                $requeteInitialisationProgressionHeros = $client->prepare("INSERT INTO quest (hero_id, chapter_id) VALUES (:hero_id, :chapter_id)");
                $requeteInitialisationProgressionHeros->bindParam(':hero_id', $hero_id);
                $requeteInitialisationProgressionHeros->bindValue(':chapter_id', 1);
                $requeteInitialisationProgressionHeros->execute();

                header("Location: /DungeonXplorer/chapter_view/1");
            }
        }


    }

}
