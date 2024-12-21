
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DungeonXplorer</title>
    <link rel="stylesheet" href="/DungeonXplorer/public/css/styles.css">
</head>
<body>

    <div class="hero-section">
        <h1 class="game-title">DungeonXplorer</h1>
        <p class="game-description">Un jeu où chaque choix peut changer ton destin</p>
        <button class="start-button" onclick="openLoginPopup()">Jouer</button>
    </div>

    <!-- Popup de connexion -->
    <div id="loginPopup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closeLoginPopup()">&times;</span>
            <h2>Connecte-toi pour commencer l'aventure</h2>
            <form id="loginForm" method="POST" action="">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" placeholder="Choisis un nom digne d'un guerrier" required>
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Aucun sorcier ne pourra le déchiffrer" required>
                <button type="submit">Se connecter</button>
            </form>
            <?php if (isset($error)): ?>
                <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>
        </div>
    </div>

    <script src="/DungeonXplorer/public/js/script_index.js"></script>
</body>
</html>
