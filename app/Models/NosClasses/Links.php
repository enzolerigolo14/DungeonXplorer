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
                //echo '<br>';
                $this->$method($value); 
                //echo 'Nom méthode : '.$method.'('.$value.')<br>';
            } else {
                //echo 'Ca existe pas : Nom méthode : '.$method.'('.$value.')<br>';
            }
        }
    }
    // Setter pour l'id
    public function setId($id) {
        $this->id = $id;
    }

    // Setter pour le chapter_id
    public function setChapter_id($chapter_id) {
        $this->chapter_id = $chapter_id;
    }

    // Setter pour le next_chapter_id
    public function setNext_chapter_id($next_chapter_id) {
        $this->next_chapter_id = $next_chapter_id;
    }

    // Setter pour la description
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getChapterId()
    {
        return $this->chapter_id;
    }

    /**
     * @return mixed
     */
    public function getNextChapterId()
    {
        return $this->next_chapter_id;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

}

?>