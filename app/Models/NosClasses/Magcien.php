<?php
class Magicien extends ClassMagique{
    private $listeSpell;
    
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

    public function setListeSpell($listeSpell) {
        $this->listeSpell = $listeSpell;
    }
}

?>