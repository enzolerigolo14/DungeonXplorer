<?php
class Hero {
    private $id;
    private $name;
    private $class_id;
    private $user_id;
    private $link_image;
    private $biography;
    private $pv;
    private $mana;
    private $strength;
    private $initiative;
    private $armor;
    private $primary_weapon;
    private $secondary_item_id;
    private $spell_id;
    private $xp;
    private $current_level;

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

    // Setter pour $class_id
    public function setClassId($class_id) {
        $this->class_id = $class_id;
    }

    // Setter pour $user_id
    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    // Setter pour $link_image
    public function setLinkImage($link_image) {
        $this->link_image = $link_image;
    }

    // Setter pour $biography
    public function setBiography($biography) {
        $this->biography = $biography;
    }

    // Setter pour $pv
    public function setPv($pv) {
        $this->pv = $pv;
    }

    // Setter pour $mana
    public function setMana($mana) {
        $this->mana = $mana;
    }

    // Setter pour $strength
    public function setStrength($strength) {
        $this->strength = $strength;
    }

    // Setter pour $initiative
    public function setInitiative($initiative) {
        $this->initiative = $initiative;
    }

    // Setter pour $armor
    public function setArmor($armor) {
        $this->armor = $armor;
    }

    // Setter pour $primary_weapon
    public function setPrimaryWeapon($primary_weapon) {
        $this->primary_weapon = $primary_weapon;
    }

    // Setter pour $secondary_item_id
    public function setSecondaryItemId($secondary_item_id) {
        $this->secondary_item_id = $secondary_item_id;
    }

    // Setter pour $spell_id
    public function setSpellId($spell_id) {
        $this->spell_id = $spell_id;
    }

    // Setter pour $xp
    public function setXp($xp) {
        $this->xp = $xp;
    }

    // Setter pour $current_level
    public function setCurrentLevel($current_level) {
        $this->current_level = $current_level;
    }
}
?>
