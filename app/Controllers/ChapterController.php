<?php
session_start();
require_once 'app/models/NosClasses/Chapter.php';
require_once 'app/models/NosClasses/Links.php';
require_once 'app/models/NosClasses/Monster.php';
require_once 'app/models/NosClasses/Encounter.php';
require_once 'app/models/NosClasses/Hero.php';
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

        if(is_numeric($id)){
            $this->updateQuest($id, $client);
        }

        $nbLinks = $this->getNbLinks($id, $client);

        $AllLinks = $this->getAllLinks($id, $client);

        $nbEncounter = $this->getNbEncounter($id, $client);

        if($nbEncounter != 0){
            $_SESSION['chapterId'] = $id;
        }

        if ($chapter) {
            if($id == 24){
                include 'app/views/game-over.php';
            } else {
                include 'app/views/chapter_view.php';// Charge la vue pour le chapitre
            }

        } else if($id == "deconnexion") {
            session_destroy();
            echo 'Deconnexion !!!';

            header("Location: /DungeonXplorer/home");
        } else if($id == "combat") {
            $fightId = $_SESSION['chapterId'];
            $monsterToFight = $this->getMonsterToFight($fightId, $client);
            $heroToUse = $this->getHero($client);
            $classHeroName = $this->getNameClassHero($client, $heroToUse);
            $idChapitreWin = $this->getChapterWin($fightId, $client);
            $idChapitreDefeat = $this->getChapterDefeat($fightId, $client);
            include 'app/views/combat.php';
        }
        else {
            // Si le chapitre n'existe pas, redirige vers un chapitre par défaut ou affiche une erreur
            echo "Chapitre non trouvé!";
            header('HTTP/1.0 404 Not Found');
        }
    }

    public function getChapterWin($chapter_id, $client) : int{
        $requeteGetChapterWin = $client->prepare("select next_chapter_id from links where upper(description) = upper('VICTOIRE') and chapter_id = :chapter_id;");
        $requeteGetChapterWin->bindParam(':chapter_id', $chapter_id);
        $requeteGetChapterWin->execute();
        $idChapitre = $requeteGetChapterWin->fetchColumn();

        return $idChapitre;
    }

    public function getChapterDefeat($chapter_id, $client) : int{
        $requeteGetChapterDefeat = $client->prepare("select next_chapter_id from links where upper(description) = upper('DEFAITE') and chapter_id = :chapter_id;");
        $requeteGetChapterDefeat->bindParam(':chapter_id', $chapter_id);
        $requeteGetChapterDefeat->execute();
        $idChapitre = $requeteGetChapterDefeat->fetchColumn();

        return $idChapitre;
    }

    public function getNameClassHero($client, $hero) : string{

        $classIdHero = $hero->getClassId();
        $requeteGetNameClassHeros = $client->prepare("select name from class where id  = :class_id;");
        $requeteGetNameClassHeros->bindParam(':class_id', $classIdHero);
        $requeteGetNameClassHeros->execute();
        $nameClassHero = $requeteGetNameClassHeros->fetchColumn();

        return $nameClassHero;
    }

    public function getHero($client) : Hero{

        $user_id = $_SESSION['userId'];
        $requeteGetHeroId = $client->prepare("select * from hero where user_id = :user_id");
        $requeteGetHeroId->bindParam(':user_id', $user_id);
        $requeteGetHeroId->execute();
        $getHero = $requeteGetHeroId->fetch();
        $hero = new Hero();
        $hero->hydrate($getHero);

        return $hero;
    }

    public function getMonsterToFight($id, $client) : Monster{

        $requeteGetMonsterId = $client->prepare("select monster_id from encounter where chapter_id = :ch_id;");
        $requeteGetMonsterId->bindParam(':ch_id', $id);
        $requeteGetMonsterId->execute();
        $monster_id = $requeteGetMonsterId->fetchColumn();

        $requeteGetMonster = $client->prepare("select * from monster where id = :monster_id;");
        $requeteGetMonster->bindParam(':monster_id', $monster_id);
        $requeteGetMonster->execute();
        $getmonster = $requeteGetMonster->fetch();
        $monster = new Monster();
        $monster->hydrate($getmonster);

        return $monster;
    }

    public function getNbEncounter($chapter_id, $client) : int{
        $requeteEncounter = $client->prepare("select count(*) from encounter en join chapter ch on en.chapter_id = ch.id where chapter_id = :chapter_id;");
        $requeteEncounter->bindParam(':chapter_id', $chapter_id);
        $requeteEncounter->execute();
        $nb = $requeteEncounter->fetchColumn();
        return $nb;
    }

    public function updateQuest($chapter_id, $client){
        $user_id = $_SESSION['userId'];
        $requeteGetHerosId = $client->prepare("select id from hero where user_id = :id");
        $requeteGetHerosId->bindParam(':id', $user_id);
        $requeteGetHerosId->execute();
        $hero_id = $requeteGetHerosId->fetchColumn();

        $requeteUpdateQuest = $client->prepare("update quest set chapter_id = :chapter_id where hero_id = :hero_id");
        $requeteUpdateQuest->bindParam(':chapter_id', $chapter_id);
        $requeteUpdateQuest->bindParam(':hero_id', $hero_id);
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
        //echo 'chapitre introuvable !';
        return null; // Chapitre non trouvé
    }

}
