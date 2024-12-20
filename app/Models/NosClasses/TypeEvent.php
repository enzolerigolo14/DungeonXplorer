<?php
class TypeEvent {
    private $id;
    private $description;
    private $bonus_type_id;
    private $malus_type_id;
    private $item_id;
    private $stat_event;

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

    // Setter pour $description
    public function setDescription($description) {
        $this->description = $description;
    }

    // Setter pour $bonus_type_id
    public function setBonusTypeId($bonus_type_id) {
        $this->bonus_type_id = $bonus_type_id;
    }

    // Setter pour $malus_type_id
    public function setMalusTypeId($malus_type_id) {
        $this->malus_type_id = $malus_type_id;
    }

    // Setter pour $item_id
    public function setItemId($item_id) {
        $this->item_id = $item_id;
    }

    // Setter pour $stat_event
    public function setStatEvent($stat_event) {
        $this->stat_event = $stat_event;
    }
}
?>
