<?php
// view/chapter.php

$chapterController = new ChapterController();
$chapter = $chapterController->getChapter($id);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $chapter->getTitle(); ?></title>
    <link rel="stylesheet" href="/DungeonXplorer/public/css/chapter_styles.css">
</head>
<body>
    <div class="buttonNavbar-container">
        <button class="deco-button"><a href="deconnexion">Se déconnecter</a></button>
    </div>
    <p id="textTemp" style="display: none"><?php echo $chapter->getContent(); ?></p>
    <div id="chapter-container">
        <h1 id="chapter-title">Chapitre <?php echo $chapter->getId(); ?> : <?php echo $chapter->getTitle(); ?></h1> <!-- Le titre s'affichera ici -->
        <div id="container-image-text">
            <div id="textContainer">
                <p id="chapter-text" style="display: none;"></p>
            </div>
            <div id="image-container">
                <img src="/DungeonXplorer/public/images/image_chapter/chapter<?php echo $chapter->getId(); ?>.jpg" alt="Image illustrant le chapitre"> <!-- Image sur la droite -->
            </div>
        </div>
        <div>
            <?php if($nbEncounter != 0): ?>
                <div id="combatContainer" style="display: none">
                    <button class="event-button"><a href="combat">Lancer le combat !</a></button>
                </div>
            <?php endif; ?>
        </div>
    </div>



    <?php
    echo '<div id="buttonLinksFight-container" style="display: none">';
        echo '<button id="LinkToWinChapter" class="event-button" style="display: none"><a href="'.$idChapitreWin.'">Continuer sur votre chemin</a></button>';
        echo '<button id="LinkToDefeatChapter" class="event-button" style="display: none"><a href="'.$idChapitreDefeat.'">Continuer sur votre chemin</a></button>';
    echo '</div>';

    if($nbEncounter == 0){
        echo '<div id="buttonLinks-container" style="display: none">';
        if($nbLinks != 0){
            foreach ($AllLinks as $choice) {
                echo '<button class="event-button"><a href="'.$choice->getNextchapterId().'">'.$choice->getDescription().'</a></button>';
            }
        } else {
            echo '<button class="event-button"><a href="1">Recommencer l\'aventure</a></button>';
        }
        echo '</div>';
    }
    ?>

    <script src="/DungeonXplorer/public/js/chapter_scripts.js"></script>
</body>
</html>
