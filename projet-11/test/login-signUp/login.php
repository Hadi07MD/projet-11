<?php
include 'Gestion.php';
if (!empty($_POST)){
$Nom = $_POST['nom'];
$password = $_POST['password'];

    $gestion = new Gestion(); 

   if($data= $gestion->Login( $password,$Nom)){

    header("Location: Message.php");
  
}
}
else{
    $message ;
}


?>

<a href="signup.php">sign</a>
<a href="mots de passe oublie.php">mots de passe oublié</a>
<form action=""method='POST'>

  Nom    <input type="text" name="nom">
   Password <input type="Password" name="password">
    <button type="submit"> login</button>
    
    <?php if(isset($_POST['nom'])){
     echo $message = "Mauvais Nom ou mot de passe , réessayez"; 
  } ?></p>
</form>