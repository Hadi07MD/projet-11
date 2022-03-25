<?php
include "produit.php";
class GestionP{

    private $Connection = Null;

    private function getConnection(){
      
            $this->Connection = mysqli_connect('localhost', 'hicham', 'mlikihii', 'site-e-commerce');
           
         
       
        
        return $this->Connection;
    }


    public function afficher(){
        $SelctRow = 'SELECT id, Nom,Prix  FROM produits';
        $query = mysqli_query($this->getConnection() ,$SelctRow);
        $produits_data = mysqli_fetch_all($query, MYSQLI_ASSOC);

        $TableData = array();
        foreach ($produits_data as $value_Data) {
            $produit = new Produit();
            $produit->setId($value_Data['id']);
            $produit->setNom($value_Data['Nom']);
            $produit->setPrix($value_Data['Prix']);
           
            array_push($TableData, $produit);
        }
          return $TableData;
 
        }
    public function afficherCommande(){
        $SelctRow = 'SELECT Prix  FROM commande';
        $query = mysqli_query($this->getConnection() ,$SelctRow);
        $produits_data = mysqli_fetch_all($query, MYSQLI_ASSOC);

        $TableData = array();
        foreach ($produits_data as $value_Data) {
            $produit = new Produit();
            $produit->setId($value_Data['id']);
            $produit->setNom($value_Data['Nom']);
            $produit->setPrix($value_Data['Prix']);
           
            array_push($TableData, $produit);
        }
          return $TableData;
 
        }


        public function afficherProduit($id){
            $SelctRow = "SELECT * FROM produits WHERE id =$id";
            $query = mysqli_query($this->getConnection() ,$SelctRow);
            $produits_data = mysqli_fetch_all($query, MYSQLI_ASSOC);
    
            $TableData = array();
            foreach ($produits_data as $value_Data) {
                $produit = new Produit();
                $produit->setId($value_Data['id']);
                $produit->setNom($value_Data['Nom']);
                $produit->setPrix($value_Data['Prix']);
               
                array_push($TableData, $produit);
            }
              return $TableData;
        }
        public function afficherPanier($id){
            $SelctRow = "SELECT * FROM produits WHERE id =$id";
            $query = mysqli_query($this->getConnection() ,$SelctRow);
            $produits_data = mysqli_fetch_all($query, MYSQLI_ASSOC);
    
            $TableData = array();
            foreach ($produits_data as $value_Data) {
                $produit = new Produit();
                $produit->setId($value_Data['id']);
                $produit->setNom($value_Data['Nom']);
                $produit->setPrix($value_Data['Prix']);
               
                array_push($TableData, $produit);
            }
              return $TableData;
        }
    



    }