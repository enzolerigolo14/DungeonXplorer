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
            <form id="loginForm" method = "post" action = "">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" placeholder="Choisi un nom digne d'un guerrier" required>
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Aucun sorcier ne pourra le déchiffrer"required>
                <button type="submit">Se connecter</button>
            </form>
        </div>
    </div>
    <script src="/DungeonXplorer/public/js/script_index.js"></script>
</body>
</html>

<?php if (!isset($_POST['username']) || (!isset($_POST['password']))) {
        // echo ' Le formulaire doit être complété avant d\'être soumis';
        // Puis je vérifie si elles ne sont pas vides
    } elseif ($_POST['username'] === "" || empty($_POST['password'])) {
        // echo ' Les données du formulaires ne doivent pas être vides';
        // Enfin je les affiche
    } else {
        // Nettoyage des données passées en Post
        $username = strip_tags($_POST['username']);
        $password = strip_tags($_POST['password']);

        echo '
        <h1> Bienvenue à toi </h1>' . $username . ' ' . $password;
    }

    require_once 'Views/chapitres.php';
require_once 'Controllers/ChapterController.php';
require_once 'Models/ClassesDuProf/Chapter.php';

// Connexion à la base de données
try {
    $db = new PDO('mysql:host=localhost;dbname=dungeonxplorer;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Instanciation du modèle et du contrôleur
$chapitresModel = new Chapter($db);
$controller = new ChapterController($chapitresModel);

// Gestion des actions
if (isset($_GET['action'])) {
    if ($_GET['action'] === 'login') {
        $controller->login();
    } elseif ($_GET['action'] === 'viewChapter' && isset($_GET['id'])) {
        // Affichage futur d'un chapitre individuel
    } else {
        echo "Action non reconnue.";
    }
} else {
    // Par défaut, affiche la page d'accueil ou une liste des chapitres
    $controller->showChapters();
}


    ?>