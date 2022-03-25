





<?php
include 'Gestion.php';
if (!empty($_POST)){
$Nom = $_POST['nom'];
$email = $_POST['email'];

    $gestion = new Gestion(); 

   if($data= $gestion->passwordOblie( $email,$Nom)){

    
}


foreach($data as $value){

   
    $message=  "Hello ".$value->getNom().' '. $value->getPrenom()." Your password is: ".$value->getpassword();
  

}


if(
mail($email, "Sujet",$message)
){
  echo "email envoyer";
}
}

?>

<a href="login.php">back</a>
<form action=""method='POST'>

  Nom    <input type="text" name="nom">
  Email <input type="email" name="email">
    <button type="submit"> afficher</button>
 

    
  
</form>
