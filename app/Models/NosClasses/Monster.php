<?php
class Monster{
    private $id;
    private $name;
    private $pv;
    private $mana;
    private $initiative;
    private $strength;
    private $attack;
    private $loot_id;
    private $xp;
    private $armor;

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

    // Setter pour le nom
    public function setName($name) {
        $this->name = $name;
    }

    // Setter pour les points de vie (pv)
    public function setPv($pv) {
        $this->pv = $pv;
    }

    // Setter pour le mana
    public function setMana($mana) {
        $this->mana = $mana;
    }

    // Setter pour l'initiative
    public function setInitiative($initiative) {
        $this->initiative = $initiative;
    }

    // Setter pour la force (strength)
    public function setStrength($strength) {
        $this->strength = $strength;
    }

    // Setter pour l'attaque
    public function setAttack($attack) {
        $this->attack = $attack;
    }

    // Setter pour l'ID du loot
    public function setLoot_id($loot_id) {
        $this->loot_id = $loot_id;
    }

    // Setter pour l'XP
    public function setXp($xp) {
        $this->xp = $xp;
    }

    // Setter pour l'armure
    public function setArmor($armor) {
        $this->armor = $armor;
    }
}

?>