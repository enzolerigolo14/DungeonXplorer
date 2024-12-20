<?php
abstract class ClassMagique extends Classe{
    private $base_mana;
    
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

    public function setBaseMana($base_mana){
        $this->base_mana = $base_mana;
    }
}


?>