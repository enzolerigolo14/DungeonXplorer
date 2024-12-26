<?php
class ConnexionController{

    public function index()
    {
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
                    header("Location: /DungeonXplorer/chapter_view/{$currentChapterId}");
                    exit;
                    // Redirection ou traitement ici
                } else {
                    $error = "Nom d'utilisateur ou mot de passe incorrect.";
                    require_once "app/views/home.php";
                }
            }
        }
    }

}
