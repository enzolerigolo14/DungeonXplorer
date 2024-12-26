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
    <div>
        <h1 id="chapter-title"><?php echo $chapter->getTitle(); ?></h1> <!-- Le titre s'affichera ici -->
        <div id="textContainer">
            <p id="chapter-text" style="display: none;"></p> <!-- Le texte s'affichera ici -->
        </div>
    </div>

    <?php
        echo '<div class="buttonEvent-container">';
        if($nbLinks != 0){
            foreach ($AllLinks as $choice) {
                echo '<button class="event-button"><a href="'.$choice->getNextchapterId().'">'.$choice->getDescription().'</a></button>';
            }
        } else {
            echo '<button class="event-button"><a href="1">Recommencer l\'aventure</a></button>';
        }
    ?>
    <script src="/DungeonXplorer/public/js/chapter_scripts.js"></script>
</body>
</html>
