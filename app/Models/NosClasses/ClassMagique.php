<?php
abstract class ClassMagique extends Classe{

    private $spell_id;
    private $base_mana;

    public function setSpell_id($spell_id) {
        $this->spell_id = $spell_id;
    }

    public function setBase_Mana($base_mana) {
        $this->base_mana = $base_mana;
    }

    /**
     * @return mixed
     */
    public function getSpell_id()
    {
        return $this->spell_id;
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