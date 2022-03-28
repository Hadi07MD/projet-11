<?php
class Person implements JsonSerializable {
    private $Nom;
    private $Prenom;
    private $Email;
      

    public function setNom($Nom){
        $this->Nom = $Nom;
    }
    public function getNom(){
        return $this->Nom;
    }

    public function setPrenom($Prenom){
        $this->Prenom = $Prenom;
    }
    public function getPrenom(){
        return $this->Prenom;
    }


    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }

}
?>