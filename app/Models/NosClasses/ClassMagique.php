<?php
abstract class ClassMagique extends Classe{
    private $base_mana;

    // Setter pour $base_mana
    public function setBase_mana($base_mana) {
        $this->base_mana = $base_mana;
    }


    /**
     * @return mixed
     */
    public function getBaseMana()
    {
        return $this->base_mana;
    }

}


?>