<?php
class SecondaryObject {
    private $id;
    private $item_id;
    private $bonus_type;

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

    // Setter pour $item_id
    public function setItemId($item_id) {
        $this->item_id = $item_id;
    }

    // Setter pour $bonus_type
    public function setBonusType($bonus_type) {
        $this->bonus_type = $bonus_type;
    }
}
?>
