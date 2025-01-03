<?php
class Spell {
    private $id;
    private $name;
    private $manaRequired;
    private $damage;

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

    // Setter pour $manaRequired
    public function setManaRequired($manaRequired) {
        $this->manaRequired = $manaRequired;
    }

    // Setter pour $damage
    public function setDamage($damage) {
        $this->damage = $damage;
    }
}
?>
