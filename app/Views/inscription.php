<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(isset($_POST["newUsername"]) && isset($_POST["newPassword"]) && isset($_POST["confirmPassword"])){
        $newUsername = htmlspecialchars($_POST["newUsername"]);
        $newPassword = $_POST["newPassword"];
        $newPasswordConfirm = $_POST["confirmPassword"];

        require_once __DIR__ . '/../../config/databaseConnexion.php';
        $client = databaseConnexion::getConnection();

        if($newPassword == $newPasswordConfirm){

            $checkUser = $client->prepare("SELECT COUNT(*) FROM user WHERE nom = :username");
            $checkUser->bindParam(':username', $newUsername);
            $checkUser->execute();
            $userExists = $checkUser->fetchColumn();

            if ($userExists > 0) {
                $error = "Ce nom d'utilisateur est déjà pris.";
                header("Location: /DungeonXplorer/choixHero");
            } else {
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                $insertUser = $client->prepare("INSERT INTO user (nom, mdp) VALUES (:username, :password)");
                $insertUser->bindParam(':username', $newUsername);
                $insertUser->bindParam(':password', $hashedPassword);
                $insertUser->execute();

                $requeteIdUser = $client->prepare("SELECT id FROM user WHERE nom = :username");
                $requeteIdUser->bindParam(':username', $newUsername);
                $requeteIdUser->execute();
                $idUser = $requeteIdUser->fetchColumn();
                $_SESSION["userId"] = $idUser;

                header("Location: /DungeonXplorer/choixHero");
                exit;
            }

        } else {
            $error = 'Les mots de passes ne correspondent pas';
            header("Location: /DungeonXplorer/");
        }
    } else {
        $error = 'Il faut remplir tous les champs du formulaire inscription';
        header("Location: /DungeonXplorer/");
    }

}
?>