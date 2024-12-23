<?php
class Chapter{
    private $id;
    private $title;
    private $content;
    private $image;
    private $treasure_id;

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

    public function setTitle($title) {
        $this->title = $title;
    }

    // Setter pour le contenu
    public function setContent($content) {
        $this->content = $content;
    }

    // Setter pour l'image
    public function setImage($image) {
        $this->image = $image;
    }

    // Setter pour le treasure_id
    public function setTreasure_id($treasure_id) {
        $this->treasure_id = $treasure_id;
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getTreasureId()
    {
        return $this->treasure_id;
    }

}

?>