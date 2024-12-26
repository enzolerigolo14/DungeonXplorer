<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/DungeonXplorer/public/css/style_creation_hero.css">
    <title>Création de votre Voleur</title>
</head>
<body>
    <div class="container">
        <h1>Créer votre Voleur</h1>
        <div class="display-form-image">
            <div class="class-card-form-img">
                <img src="/DungeonXplorer/public/images/voleur.jpg" alt="Voleur">
                <h2>Voleur</h2>
            </div>
            <form action="creationVoleur" method="POST" class="class-selection">
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