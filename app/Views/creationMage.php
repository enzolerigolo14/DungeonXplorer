<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/DungeonXplorer/public/css/styles_character_choice.css">
    <title>Création de votre Mage</title>
</head>
<body>
<div class="container">
    <h1>Créer votre Mage</h1>
    <div class="display-form-image">
        <div class="class-card-form-img">
            <img src="/DungeonXplorer/public/images/mage.jpg" alt="Mage">
            <h2>Mage</h2>
        </div>
        <form action="" method="POST" class="class-selection">
            <div class="class-card-form">
                <h2>Nom du Héros</h2>
                <input type="text" name="hero_name" placeholder="Entrez un nom héroïque" required>
            </div>
            <div class="class-card-form">
                <h2>Biographie</h2>
                <textarea name="hero_biography" placeholder="Écrivez votre biographie légendaire" rows="5"></textarea>
            </div>
            <button type="submit" class="class-card-form">Créer le Héros</button>
        </form>
    </div>
</div>

</body>
</html>
<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['hero_name']) && isset($_POST['hero_biography'])){

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

    }
}

?>