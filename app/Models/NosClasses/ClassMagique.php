<?php
abstract class ClassMagique extends Classe{
    private $base_mana;
    private $spell_id;

    // Setter pour $base_mana
    public function setBase_mana($base_mana) {
        $this->base_mana = $base_mana;
    }

    public function setSpell_id($spell_id) {
        $this->spell_id = $spell_id;
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
    public function getSpellId()
    {
        return $this->spell_id;
    }



}


?>