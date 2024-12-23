<?php
// view/chapter.php

$chapterController = new ChapterController();
$chapter = $chapterController->getChapter($id);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo $chapter->getTitle(); ?></title>
</head>
<body>
    <h1><?php echo $chapter->getTitle(); ?></h1>
    <img src="../public/images/fond_ruine.jpg" alt="Image de chapitre" style="max-width: 300px; height: 300px;">
    <p><?php echo $chapter->getContent(); ?></p>

    <?php
        if($nbLinks != 0){
            echo '<h2>Choisissez votre chemin:</h2>';
            foreach ($AllLinks as $choice) {
                echo '<button><a href="'.$choice->getNextchapterId().'">'.$choice->getDescription().'</a></button>';
            }
        }
    ?>
</body>
</html>
