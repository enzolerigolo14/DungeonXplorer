<?php
class User {
    private $id;
    private $nom;
    private $mdp;
    private $admin;

    public function hydrate(array $donnes){
        foreach($donnes as $key => $value){
            $method = 'set'.ucfirst($key);

            if(method_exists($this, $method)){
                //echo '<br>';
                $this->$method($value); 
                //echo 'Nom méthode : '.$method.'('.$value.')<br>';
            } else {
                //echo 'Ca existe pas : Nom méthode : '.$method.'('.$value.')<br>';
            }
        }
    }
    // Setter pour $id
    public function setId($id) {
        $this->id = $id;
    }

    // Setter pour $nom
    public function setNom($nom) {
        $this->nom = $nom;
    }

    // Setter pour $mdp
    public function setMdp($mdp) {
        $this->mdp = $mdp;
    }

    // Setter pour $admin
    public function setAdmin($admin) {
        $this->admin = $admin;
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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @return mixed
     */
    public function getAdmin()
    {
        return $this->admin;
    }

}
?>
