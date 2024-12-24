<?php

// controllers/ChapterControllerProf.php

//require_once 'models/ClassesDuProf/ChapterProf.php';
require_once 'app/models/ClassesDuProf/ChapterProf.php';

class ChapterControllerProf
{
    private $chapters = [];

    public function __construct()
    {
        $this->chapters[] = new ChapterProf(
            1,
            "La Forêt Enchantée",
            "Vous vous trouvez dans une forêt sombre et enchantée. Deux chemins se présentent à vous.",
            "../public/images/Forest_Spirit.jpg", // Chemin vers l'image
            [
                ["text" => "Aller à gauche", "chapter" => 2],
                ["text" => "Aller à droite", "chapter" => 3]
            ]
        );

        $this->chapters[] = new ChapterProf(
            2,
            "Le Lac Mystérieux",
            "Vous arrivez à un lac aux eaux limpides. Une créature vous observe.",
            "../public/images/fond_ruine.jpg", // Chemin vers l'image
            [
                ["text" => "Nager dans le lac", "chapter" => 4],
                ["text" => "Faire demi-tour", "chapter" => 1]
            ]
        );

    }

    public function show($id)
    {
        $chapter = $this->getChapter($id);

        if ($chapter) {
            include 'app/views/chapter_view.php'; // Charge la vue pour le chapitre
        } else {
            // Si le chapitre n'existe pas, redirige vers un chapitre par défaut ou affiche une erreur
            header('HTTP/1.0 404 Not Found');
            echo "Chapitre non trouvé!";
        }
    }

    public function getChapter($id)
    {
        foreach ($this->chapters as $chapter) {
            if ($chapter->getId() == $id) {
                return $chapter;
            }
        }
        return null; // Chapitre non trouvé
    }

  
}