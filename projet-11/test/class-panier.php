<?php 

class Panier{

    public $name ;

    
    public function __construct($name){
        $this->name = $name ;
    }
    // pour ajouter session
    public function set($key,$value){
        $_SESSION["paniers"][$this->name][$key] = $value ;

    }

        // pour ajouter session

    // public function setAll($value){
    //     $_SESSION["paniers"][$this->name] = $value;

    // }

    // pour afficher  session 
    public function get($key){
        if(isset($_SESSION["paniers"][$this->name][$key])){
            return $_SESSION["paniers"][$this->name][$key];
            return null ; 
        }
    }

    // //pour afficher touts
    // public function getAll(){
    //     if(isset($_SESSION["paniers"][$this->name])){
    //         return $_SESSION["paniers"][$this->name];
    //         return null ; 
    //     }
    // }
    
    //supprimer session
    public function delete($key){
        if(isset($_SESSION["paniers"][$this->name][$key])){
            unset($_SESSION["paniers"][$this->name][$key]);
        }
    }

    // afficher touts
    public function getPanier(){
        if(isset($_SESSION["paniers"][$this->name])){
            return $_SESSION["paniers"][$this->name];
            return array();
        }

    }
    //supprimer touts
    public function clear(){
        if(isset($_SESSION["paniers"][$this->name])){
           unset( $_SESSION["paniers"][$this->name]);
        }
    }

}