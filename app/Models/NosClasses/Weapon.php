<?php
class Weapon {
    private $id;
    private $name;
    private $item_id;
    private $slot;
    private $stat_attaque;
    private $stat_bonus;
    
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

    // Setter pour $name
    public function setName($name) {
        $this->name = $name;
    }

    // Setter pour $item_id
    public function setItem_id($item_id) {
        $this->item_id = $item_id;
    }

    // Setter pour $slot
    public function setSlot($slot) {
        $this->slot = $slot;
    }

    // Setter pour $stat_attaque
    public function setStat_attaque($stat_attaque) {
        $this->stat_attaque = $stat_attaque;
    }

    // Setter pour $stat_bonus
    public function setStat_bonus($stat_bonus) {
        $this->stat_bonus = $stat_bonus;
    }
}
?>
