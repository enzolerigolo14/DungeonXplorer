<?php

require_once 'app/models/NosClasses/Chapter.php';
require_once 'app/models/NosClasses/Links.php';
require_once __DIR__ . '/../../config/databaseConnexion.php';
class ChapterController {

    private $AllChapters = [];

    public function __construct()
    {
        $client = databaseConnexion::getConnection();

        $requeteChapter = $client->prepare("SELECT * FROM chapter");
        $requeteChapter->execute();
        $chapters = $requeteChapter->fetchAll();

        foreach ($chapters as $OneChapter) {
            $chapter = new Chapter();
            $chapter->hydrate($OneChapter);
            $this->AllChapters[] = $chapter;
        }

    }


    public function show($id)
    {
        $client = databaseConnexion::getConnection();
        $chapter = $this->getChapter($id);

        $this->updateQuest($id, $client);

        $nbLinks = $this->getNbLinks($id, $client);

        $AllLinks = $this->getAllLinks($id, $client);

        if ($chapter) {
            include 'app/views/chapter_view.php'; // Charge la vue pour le chapitre
        } else {
            // Si le chapitre n'existe pas, redirige vers un chapitre par défaut ou affiche une erreur
            header('HTTP/1.0 404 Not Found');
            echo "Chapitre non trouvé!";
        }
    }

    public function updateQuest($chapter_id, $client){

        session_start();
        $user_id = $_SESSION['userId'];
        $requeteGetHerosId = $client->prepare("select id from hero where user_id = :id");
        $requeteGetHerosId->bindParam(':id', $user_id);
        $requeteGetHerosId->execute();
        $hero_id = $requeteGetHerosId->fetchColumn();

        $requeteUpdateQuest = $client->prepare("update quest set chapter_id = {$chapter_id} where hero_id = {$hero_id}");
        $requeteUpdateQuest->execute();

    }

    public function getAllLinks($id, $client) : array
    {
        $AllLinks = [];
        $requeteLinks = $client->prepare("select * from links li where chapter_id = :id;");
        $requeteLinks->bindParam(':id', $id);
        $requeteLinks->execute();
        $links = $requeteLinks->fetchAll();
        foreach ($links as $OneLink) {
            $link = new Links();
            $link->hydrate($OneLink);
            $AllLinks[] = $link;
        }
        return $AllLinks;
    }

    public function getNbLinks($id, $client) : int
    {
        $requeteNbLinks = $client->prepare("select count(*) from chapter ch join links li on ch.id = li.chapter_id where chapter_id = :id;");
        $requeteNbLinks->bindParam(':id', $id);
        $requeteNbLinks->execute();
        $nb = $requeteNbLinks->fetchColumn();
        return $nb;
    }

    public function getChapter($id)
    {
        foreach ($this->AllChapters as $chapter) {
            if ($chapter->getId() == $id) {
                return $chapter;
            }
        }
        echo 'chapitre introuvable !';
        return null; // Chapitre non trouvé
    }

}
