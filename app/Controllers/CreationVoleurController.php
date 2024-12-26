<?php
class CreationVoleurController {

    public function index() {
        require_once 'app/views/creationVoleur.php';
    }

    public function creerVoleur() {
        session_start();


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


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['hero_name']) && isset($_POST['hero_biography'])) {

                $hero_name = htmlspecialchars($_POST['hero_name']);
                $hero_biography = htmlspecialchars($_POST['hero_biography']);
                $image = "/DungeonXplorer/public/images/voleur.jpg";
                $class_id = $voleur->getId();
                $userId = $_SESSION['userId'];
                $pv = $voleur->getBasePv();
                $mana = $voleur->getBaseMana();
                $strength = $voleur->getStrength();
                $initiative = $voleur->getInitiative();
                $armor = $voleur->getBaseArmor();
                $primary_weapon = $voleur->getPrimaryWeaponDefault();
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

                header("Location: /DungeonXplorer/chapter_view/1");
            }
        }


    }

}
