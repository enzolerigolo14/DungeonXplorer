<?php

class HomeController {

    public function index(){
        require 'app/views/home.php';
    }

    public function inscription(){
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (isset($_POST["newUsername"]) && isset($_POST["newPassword"]) && isset($_POST["confirmPassword"])) {
                $newUsername = htmlspecialchars($_POST["newUsername"]);
                $newPassword = $_POST["newPassword"];
                $newPasswordConfirm = $_POST["confirmPassword"];

                require_once __DIR__ . '/../../config/databaseConnexion.php';
                $client = databaseConnexion::getConnection();

                if ($newPassword == $newPasswordConfirm) {

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
                        $_SESSION["admin"] = false;

                        header("Location: /DungeonXplorer/choixHero");
                        //require_once "app/views/choixHero.php";
                        exit;
                    }

                } else {
                    $error = 'Les mots de passes ne correspondent pas';
                    require_once "app/views/home.php";
                    //header("Location: /DungeonXplorer/");
                    exit;
                }
            } else {
                $error = 'Il faut remplir tous les champs du formulaire inscription';
                require_once "app/views/home.php";
                exit;
                //header("Location: /DungeonXplorer/");
            }

        }
    }

    public function connexion()
    {
        session_start();
        $error = "";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_POST["username"]) && isset($_POST["password"])){

                require_once __DIR__ . '/../../config/databaseConnexion.php';
                $client = databaseConnexion::getConnection();

                $username = $_POST['username'];
                $password = $_POST['password'];
                $requete = $client->prepare("SELECT * from user where nom = '$username'");
                $requete->execute();
                $result = $requete->fetch();
                if ($result && password_verify($password, $result['mdp'])) {

                    $requeteIdUser = $client->prepare("SELECT id FROM user WHERE nom = :username");
                    $requeteIdUser->bindParam(':username', $username);
                    $requeteIdUser->execute();
                    $idUser = $requeteIdUser->fetchColumn();
                    $_SESSION["userId"] = $idUser;

                    $requeteGetCurrentChapterId = $client->prepare("select chapter_id from quest
                                                                            where hero_id = (
                                                                            select hero_id from hero
                                                                            where user_id = :id
                                                                        );");
                    $requeteGetCurrentChapterId->bindParam(':id', $idUser);
                    $requeteGetCurrentChapterId->execute();
                    $currentChapterId = $requeteGetCurrentChapterId->fetchColumn();

                    $requeteAdmin = $client->prepare('select admin from user where id = :user_id;');
                    $requeteAdmin->bindParam(':user_id', $idUser);
                    $requeteAdmin->execute();
                    $admin = $requeteAdmin->fetchColumn();

                    if($admin == 1){
                        $_SESSION["admin"] = true;
                    } else {
                        $_SESSION["admin"] = false;
                    }

                    echo $idUser;
                    header("Location: /DungeonXplorer/chapter_view/{$currentChapterId}");
                    exit;
                } else {
                    $error = "Nom d'utilisateur ou mot de passe incorrect.";
                    require_once "app/views/home.php";
                }
            }
        }
    }

}

?>