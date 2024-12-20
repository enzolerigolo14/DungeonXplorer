<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chapitres</title>
</head>
<body>
    <h1>Liste des chapitres</h1>
    <ul>
        <?php foreach ($chapters as $chapter): ?>
            <li>
                <h2><?= htmlspecialchars($chapter['title']) ?></h2>
                <p><?= htmlspecialchars($chapter['description']) ?></p>
                <a href="index.php?action=viewChapter&id=<?= $chapter['id'] ?>">Voir ce chapitre</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
