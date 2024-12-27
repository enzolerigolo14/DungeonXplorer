<?php
require_once __DIR__ . '/../../config/databaseConnexion.php';
require_once 'app/models/NosClasses/User.php';
class PlayerHandlerAdminController {

    public function index(){
        $client = databaseConnexion::getConnection();

        $AllUsers = [];
        $requeteGetAllUsers = $client->prepare("SELECT * FROM user");
        $requeteGetAllUsers->execute();
        $users = $requeteGetAllUsers->fetchAll();

        foreach ($users as $oneUser) {
            $user = new User();
            $user->hydrate($oneUser);
            $AllUsers[] = $user;
        }

        require_once 'app/views/players.php';
    }

}