<?php
 include "gestion.php";
 if(!empty($_POST)){


     $Utilisateur= new Utilisateur();
     $gestion = new Gestion();
    
     $Utilisateur->setNom($_POST['nom']);
     $Utilisateur->setemail($_POST['email']);
     $Utilisateur->setdate_de_naissance($_POST['Date']);
     $Utilisateur->setpassword($_POST['password']);
     



     $gestion->ajouterUtilisateur($Utilisateur);
        header("Location: login.php");
     }
 


?>
<a href="login.php">back</a>
<form action="" method="POST">
Nom      <input type="text" name="nom">
email <input type="email" name="email">
Date     <input type="date" name="Date">
Password <input type="Password" name="password">

    <button type="submit"> login</button>
    </form>