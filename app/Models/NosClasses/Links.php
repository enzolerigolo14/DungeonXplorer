<?php
class Links{
    private $id;
    private $chapter_id;
    private $next_chapter_id;
    private $description;

    public function hydrate(array $donnes){
        foreach($donnes as $key => $value){
            $method = 'set'.ucfirst($key);

            if(method_exists($this, $method)){
                echo '<br>';
                $this->$method($value); 
                echo 'Nom méthode : '.$method.'('.$value.')<br>';
            } else {
                echo 'Ca existe pas : Nom méthode : '.$method.'('.$value.')<br>';
            }
        }
    }
    // Setter pour l'id
    public function setId($id) {
        $this->id = $id;
    }

    // Setter pour le chapter_id
    public function setChapterId($chapter_id) {
        $this->chapter_id = $chapter_id;
    }

    // Setter pour le next_chapter_id
    public function setNextChapterId($next_chapter_id) {
        $this->next_chapter_id = $next_chapter_id;
    }

    // Setter pour la description
    public function setDescription($description) {
        $this->description = $description;
    }
}

?>