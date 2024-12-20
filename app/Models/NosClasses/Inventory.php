<?php
class Inventory{
    private $id;
    private $hero_id;
    private $item_id;
    
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

    // Setter pour le hero_id
    public function setHeroId($hero_id) {
        $this->hero_id = $hero_id;
    }

    // Setter pour le item_id
    public function setItemId($item_id) {
        $this->item_id = $item_id;
    }
}

?>