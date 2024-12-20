<?php
class Level {
    private $id;
    private $hero_id;
    private $level;
    private $require_xp;
    private $pv_bonus;
    private $mana_bonus;
    private $strength_bonus;
    private $initiative_bonus;

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

    // Setter pour $hero_id
    public function setHeroId($hero_id) {
        $this->hero_id = $hero_id;
    }

    // Setter pour $level
    public function setLevel($level) {
        $this->level = $level;
    }

    // Setter pour $require_xp
    public function setRequireXp($require_xp) {
        $this->require_xp = $require_xp;
    }

    // Setter pour $pv_bonus
    public function setPvBonus($pv_bonus) {
        $this->pv_bonus = $pv_bonus;
    }

    // Setter pour $mana_bonus
    public function setManaBonus($mana_bonus) {
        $this->mana_bonus = $mana_bonus;
    }

    // Setter pour $strength_bonus
    public function setStrengthBonus($strength_bonus) {
        $this->strength_bonus = $strength_bonus;
    }

    // Setter pour $initiative_bonus
    public function setInitiativeBonus($initiative_bonus) {
        $this->initiative_bonus = $initiative_bonus;
    }
}
?>
