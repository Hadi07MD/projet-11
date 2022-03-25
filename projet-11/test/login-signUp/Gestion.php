<?php
 include 'user.php';

class Gestion{
   



    private $Connection = Null;

    private function getConnection(){
      
            $this->Connection = mysqli_connect('localhost', 'hicham', 'mlikihii','site-e-commerce');
           
         
       
        
        return $this->Connection;
        
    }
   
    
    
 function ajouterUtilisateur($Utilisateur){

    $email = $Utilisateur->getemail();
    $nom = $Utilisateur->getNom();
    $password = $Utilisateur->getpassword();

    // requête SQL
    $insertRow="INSERT INTO `login`(Nom,`password`,email) 
                            VALUES('$nom','$password','$email')";

    mysqli_query($this->getConnection(),$insertRow);
}


function Login( $password,$Nom){

    $rowLogin="SELECT * FROM `login` where Nom='$Nom'and `password`='$password' ";
     $query=mysqli_query($this->getConnection(),$rowLogin);
    $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
    
  
    $user = new Utilisateur();

    $TableData = array();
    foreach ($data as $value_Data) {
        
        // $user->setmatricule($value_Data['Matricule']);
        $user->setpassword ($value_Data['password']);
        $user->setNom($value_Data['Nom']);
        $user->setemail($value_Data['email']);
        array_push($TableData, $user);


    }
    return $TableData;
}
function passwordOblie( $email,$Nom){

    $rowLogin="SELECT * FROM `login` where Nom='$Nom'and `email`='$email' ";
     $query=mysqli_query($this->getConnection(),$rowLogin);
    $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
    
  
    $user = new Utilisateur();

    $TableData = array();
    foreach ($data as $value_Data) {
        
        // $user->setmatricule($value_Data['Matricule']);
        $user->setpassword ($value_Data['password']);
        $user->setNom($value_Data['Nom']);
        $user->setemail($value_Data['email']);

        array_push($TableData, $user);


    }
    return $TableData;
}
}