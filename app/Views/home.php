<?php
    session_start();
    $error = "";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST["username"]) && isset($_POST["password"])){
            // Récupération des variables d'environnement
            /*$dbHost = "localhost";
            $dbName = "dx12_bd";
            $dbUser = "dx12";
            $dbPassword = "oovohZe4oNg9Eing";
            
            try {
                // Créer la connexion PDO avec tes paramètres
                $client = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPassword);
            } catch (PDOException $e) {
                // Afficher une erreur si la connexion échoue
                echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
                exit;
            }*/

            require_once __DIR__ . '/../../config/databaseConnexion.php';
            $client = databaseConnexion::getConnection();
    
            $username = $_POST['username'];
            $password = $_POST['password'];
            $requete = $client->prepare("SELECT * from user where nom = '$username'");
            $requete->execute();
            $result = $requete->fetch();
            if ($result && password_verify($password, $result['mdp'])) { // Vérification du mot de passe (non sécurisé sans hash)
                header("Location: /DungeonXplorer/chapter_view/2");
                // Redirection ou traitement ici
            } else {
                $error = "Nom d'utilisateur ou mot de passe incorrect.";
            }
        
            /*'<pre>';
            var_dump($result);
            '</pre>';*/
        }
    }
?>

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
        <?php if (!empty($error)): ?>
                <p style="color : red"><?= $error ?></p>
        <?php endif; ?>
        <button class="start-button" onclick="openLoginPopup()">Jouer</button>
    </div>

    <!-- Popup de connexion -->
    <div id="loginPopup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closeLoginPopup()">&times;</span>
            <h2>Connecte-toi pour commencer l'aventure</h2>
            <form id="loginForm" action="" method="POST">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" placeholder="Choisis un nom digne d'un guerrier" required>
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Aucun sorcier ne pourra le déchiffrer" required>
                <button type="submit">Se connecter</button>
                <p style="color: gray; font-size: 0.7em; margin-top: 10px;">
                    Pas de compte ? Inscrivez-vous !
                </p>
                <button class="signup-button" onclick="openSignupPopup()">S'inscrire</button>
            </form>
        </div>
    </div>

    <div id="signupPopup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closeSignupPopup()">&times;</span>
            <h2>Inscris-toi pour rejoindre l'aventure</h2>
            <form id="signupForm" action="inscription" method="POST">
                <label for="newUsername">Nom d'utilisateur</label>
                <input type="text" id="newUsername" name="newUsername" placeholder="Choisis un nom héroïque" required>

                <label for="newPassword">Mot de passe</label>
                <input type="password" id="newPassword" name="newPassword" placeholder="Garde-le secret !" required>

                <label for="confirmPassword">Confirme ton mot de passe</label>
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Retape ton mot de passe" required>

                <button type="submit">S'inscrire</button>
            </form>
            <p style="color: gray; font-size: 0.8em; margin-top: 10px; cursor: pointer">
                Déjà un compte ? <a onclick="openLoginPopup()" style="color: gray; text-decoration: underline;">Connecte-toi ici !</a>
            </p>
        </div>
    </div>

    <script src="/DungeonXplorer/public/js/script_index.js"></script>
</body>
</html>


