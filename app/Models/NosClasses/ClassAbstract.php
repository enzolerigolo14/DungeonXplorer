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
    public function setBase_Pv($base_pv) {
        $this->base_pv = $base_pv;
    }

    // Setter pour $base_armor
    public function setBase_armor($base_armor) {
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
    public function setMax_items($max_item) {
        $this->max_item = $max_item;
    }

    // Setter pour $primary_weapon_default
    public function setPrimary_weapon_default_id($primary_weapon_default) {
        $this->primary_weapon_default = $primary_weapon_default;
    }

    // Setter pour $secondary_object_id
    public function setSecondary_object_id($secondary_object_id) {
        $this->secondary_object_id = $secondary_object_id;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getBasePv()
    {
        return $this->base_pv;
    }

    /**
     * @return mixed
     */
    public function getBaseMana()
    {
        return $this->base_mana;
    }

    /**
     * @return mixed
     */
    public function getBaseArmor()
    {
        return $this->base_armor;
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
    public function getMaxItem()
    {
        return $this->max_item;
    }

    /**
     * @return mixed
     */
    public function getPrimaryWeaponDefault()
    {
        return $this->primary_weapon_default;
    }

    /**
     * @return mixed
     */
    public function getSecondaryObjectId()
    {
        return $this->secondary_object_id;
    }



}
?>
