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
                //echo '<br>';
                $this->$method($value); 
                //echo 'Nom méthode : '.$method.'('.$value.')<br>';
            } else {
                /*echo '<br>';
                echo 'Ca existe pas : Nom méthode : '.$method.'('.$value.')<br>';*/
            }
        }
    }

    // Setter for $id
    public function setId($id) { $this->id = $id; }

    // Setter for $name
    public function setName($name) { $this->name = $name; }

    // Setter for $class_id
    public function  setClass_id($class_id) { $this->class_id = $class_id; }

    // Setter for $user_id
    public function setUser_id($user_id) { $this->user_id = $user_id; }

    // Setter for $link_image
    public function setImage($link_image) { $this->link_image = $link_image; }

    // Setter for $biography
    public function setBiography($biography) { $this->biography = $biography; }

    // Setter for $pv
    public function setPv($pv) { $this->pv = $pv; }

    // Setter for $mana
    public function setMana($mana) { $this->mana = $mana; }

    // Setter for $strength
    public function setStrength($strength) { $this->strength = $strength; }

    // Setter for $initiative
    public function setInitiative($initiative) { $this->initiative = $initiative; }

    // Setter for $armor
    public function setArmor($armor) { $this->armor = $armor; }

    // Setter for $primary_weapon
    public function setPrimary_weapon($primary_weapon) { $this->primary_weapon = $primary_weapon; }

    // Setter for $secondary_item_id
    public function setSecondary_item_id($secondary_item_id) { $this->secondary_item_id = $secondary_item_id; }

    // Setter for $xp
    public function setXp($xp) { $this->xp = $xp; }

    // Setter for $current_level
    public function setCurrent_level($current_level) { $this->current_level = $current_level; }

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getClassId()
    {
        return $this->class_id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getLinkImage()
    {
        return $this->link_image;
    }

    /**
     * @return mixed
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * @return mixed
     */
    public function getPv()
    {
        return $this->pv;
    }

    /**
     * @return mixed
     */
    public function getMana()
    {
        return $this->mana;
    }

    /**
     * @return mixed
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * @return mixed
     */
    public function getInitiative()
    {
        return $this->initiative;
    }

    /**
     * @return mixed
     */
    public function getArmor()
    {
        return $this->armor;
    }

    /**
     * @return mixed
     */
    public function getPrimaryWeapon()
    {
        return $this->primary_weapon;
    }

    /**
     * @return mixed
     */
    public function getSecondaryItemId()
    {
        return $this->secondary_item_id;
    }

    /**
     * @return mixed
     */
    public function getSpellId()
    {
        return $this->spell_id;
    }

    /**
     * @return mixed
     */
    public function getXp()
    {
        return $this->xp;
    }

    /**
     * @return mixed
     */
    public function getCurrentLevel()
    {
        return $this->current_level;
    }

}
?>