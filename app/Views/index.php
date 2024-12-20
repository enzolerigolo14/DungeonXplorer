<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DungeonXplorer</title>
    <link rel="stylesheet" href="styles.css">
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
            <form id="loginForm" method = "post" action = "">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" placeholder="Choisi un nom digne d'un guerrier" required>
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Aucun sorcier ne pourra le déchiffrer"required>
                <button type="submit">Se connecter</button>
            </form>
        </div>
    </div>
    <script src="script_index.js"></script>
</body>
</html>

<?php if (!isset($_POST['username']) || (!isset($_POST['password']))) {
        echo ' Le formulaire doit être complété avant d\'être soumis';
        // Puis je vérifie si elles ne sont pas vides
    } elseif ($_POST['username'] === "" || empty($_POST['password'])) {
        echo ' Les données du formulaires ne doivent pas être vides';
        // Enfin je les affiche
    } else {
        // Nettoyage des données passées en Post
        $username = strip_tags($_POST['username']);
        $password = strip_tags($_POST['password']);

        echo '
        <h1> Bienvenue à toi </h1>' . $username . ' ' . $password;
    }
    ?>