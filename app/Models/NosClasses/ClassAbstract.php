<?php
abstract class Classe {
    private $id;
    private $name;
    private $description;
    private $base_pv;
    private $base_mana;
    private $base_armor;
    private $strength;
    private $initiative;
    private $max_item;
    private $primary_weapon_default;
    private $secondary_object_id;

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

    // Setter pour $description
    public function setDescription($description) {
        $this->description = $description;
    }

    // Setter pour $base_pv
    public function setBasePv($base_pv) {
        $this->base_pv = $base_pv;
    }

    // Setter pour $base_mana
    public function setBaseMana($base_mana) {
        $this->base_mana = $base_mana;
    }

    // Setter pour $base_armor
    public function setBaseArmor($base_armor) {
        $this->base_armor = $base_armor;
    }

    // Setter pour $strength
    public function setStrength($strength) {
        $this->strength = $strength;
    }

    // Setter pour $initiative
    public function setInitiative($initiative) {
        $this->initiative = $initiative;
    }

    // Setter pour $max_item
    public function setMaxItem($max_item) {
        $this->max_item = $max_item;
    }

    // Setter pour $primary_weapon_default
    public function setPrimaryWeaponDefault($primary_weapon_default) {
        $this->primary_weapon_default = $primary_weapon_default;
    }

    // Setter pour $secondary_object_id
    public function setSecondaryObjectId($secondary_object_id) {
        $this->secondary_object_id = $secondary_object_id;
    }
}
?>
