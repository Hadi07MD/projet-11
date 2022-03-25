<?php 
class Commande{

private $id ; 
private $quntite ; 


public function getId() {
    return $this->id;
}
public function setId($id) {
    $this->id = $id;
}
public function getQnt() {
    return $this->quntite;
}
public function setQnt($quntite) {
    $this->quntite = $quntite;
}
}