<?php
class Items{
    private $id;
    private $name;
    private $description;

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

    // Setter pour la description
    public function setDescription($description) {
        $this->description = $description;
    }    
}

?>