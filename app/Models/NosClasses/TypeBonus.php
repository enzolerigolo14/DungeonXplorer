<?php
class TypeBonus {
    private $id;
    private $libelle;
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


    // Setter pour $id
    public function setId($id) {
        $this->id = $id;
    }

    // Setter pour $libelle
    public function setLibelle($libelle) {
        $this->libelle = $libelle;
    }

    // Setter pour $description
    public function setDescription($description) {
        $this->description = $description;
    }
}
?>
