<?php
class Event {
    private $id;
    private $chapter_id;
    private $event_type_id;

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
    // Setter pour $id
    public function setId($id) {
        $this->id = $id;
    }

    // Setter pour $chapter_id
    public function setChapterId($chapter_id) {
        $this->chapter_id = $chapter_id;
    }

    // Setter pour $event_type_id
    public function setEventTypeId($event_type_id) {
        $this->event_type_id = $event_type_id;
    }
}
?>
